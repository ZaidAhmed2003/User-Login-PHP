<?php
require 'includes/header.php';
require_once 'config.php';
session_start();

if (isset($_SESSION['username'])) {
    header("location: index.php");
    exit();
}
?>

<body>

    <div class="container">
        <h1>LogIn</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
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

                $email = htmlspecialchars($_POST["formEmail"]);
                $password = htmlspecialchars($_POST["formPassword"]);

                // Validate Email

                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    echo "<span class='error'>Invalid email format.</span>";
                } else {
                    $checkEmailQuery = "SELECT * FROM users WHERE user_email = '$email'";
                    $result = mysqli_query($conn, $checkEmailQuery);

                    if (!mysqli_num_rows($result) > 0) {
                        echo "<span class='error'>email not exists.</span>";
                    } else {

                        $fetchData = mysqli_fetch_array($result);
                        $encryptedPassword = $fetchData['user_password'];
                        $decodePassword = password_verify($password, $encryptedPassword);

                        if ($decodePassword) {
                            $_SESSION['username'] = $fetchData['user_name'];
                            header("location:index.php");
                        } else {
                            echo "<span class='error'>Password not match.</span>";
                        }
                    }
                }
            }

            mysqli_close($conn);
            ?>

            <div class="btndiv"><button type="submit">Log In</button></div>
        </form>
        <p>Dont have an account? <a href="./signup.php">SignUp</a></p>
    </div>

</body>

</html>