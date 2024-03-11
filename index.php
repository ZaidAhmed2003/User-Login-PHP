<?php
require_once 'session.php';
require 'includes/header.php';
?>

<body>
    <div class="container">
        <h1>Welcome</h1>
        <h2>
            <?php
            if (isset($_SESSION['username'])) {
                echo $_SESSION['username'];
            } else {
                header("location: login.php");
                exit();
            } ?>
        </h2>

        <form action="logout.php" method="post">
            <div class="btndiv">
                <button type="submit">Logout</button>
            </div>
        </form>

    </div>
</body>

</html>