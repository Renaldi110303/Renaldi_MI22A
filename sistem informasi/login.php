<?php
session_start();
require 'db.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="login-container">
    <h2>Login</h2>
    <form method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="login">Login</button>
        <p>want to create an account? <a href="register.php">Register here</a></p>
        <p>
            <?php
            if (isset($_SESSION['error'])) {
                echo "<span style='color:red'>" . $_SESSION['error'] . "</span>";
                unset($_SESSION['error']);
            }
            ?>
        </p>

        <?php 
        if(isset($_POST["login"])){
            $username = $_POST['username'];
            $password = $_POST['password'];

            $sql = "SELECT username, password FROM users WHERE username = '$username' AND password = sha1('$password');";
            $result = mysqli_query($koneksi, $sql);

            $user = mysqli_fetch_assoc($result);
            if ($user) {
                $_SESSION['users'] = $username;
                header('location: dashboard.php');
                exit();
            } else {
                $_SESSION['error'] = "Username / Password tidak sesuai";
                header('location: login.php');
                exit();
            }
        }
        ?>
    </form>
</div>
</body>
</html>
