<?php
require_once 'config.php';
require_once 'session.php';
require 'includes/header.php';

if (isset($_SESSION['username'])) {
    header("location: index.php");
    exit();
}
?>

<body>

    <div class="container">
        <h1>Signup</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div>
                <label for="formName">Name</label>
                <input type="text" name="formName" id="formName" placeholder="Enter your name">
            </div>
            <div>
                <label for="formEmail">Email</label>
                <input type="email" name="formEmail" id="formEmail" placeholder="Enter your email">
            </div>
            <div>
                <label for="formPassword">Password</label>
                <input type="password" name="formPassword" id="formPassword" placeholder="Enter your password">
            </div>

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                // Get Data from Form

                $username = htmlspecialchars($_POST["formName"]);
                $email = htmlspecialchars($_POST["formEmail"]);
                $password = htmlspecialchars($_POST["formPassword"]);
                $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

                // Validate Email

                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    echo "<span class='error'>Invalid email format.</span>";
                } else {
                    $checkEmailQuery = "SELECT * FROM users WHERE user_email = '$email'";

                    $result = mysqli_query($conn, $checkEmailQuery);

                    if (mysqli_num_rows($result) > 0) {
                        echo "<span class='error'>email already exists.</span>";
                    } else {
                        $insertQuery = "INSERT INTO users (user_name, user_email, user_password) VALUES ('$username', '$email', '$hashedPassword')";

                        $results = mysqli_query($conn, $insertQuery);

                        if ($results) {
                            header("location:login.php");
                        }
                    }
                }
            }

            mysqli_close($conn);
            ?>

            <div class="btndiv"><button type="submit">Sign Up</button></div>
        </form>
        <p>Already have an account? <a href="./login.php">LogIn</a></p>
    </div>


</body>


</html>