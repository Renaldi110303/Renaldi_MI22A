<?php
session_start();
include 'db.php';

if (isset($_POST["register"])) {
    $username = mysqli_real_escape_string($koneksi, trim($_POST['username']));
    $password = trim($_POST['password']);
    $password_confirm = trim($_POST['password_confirm']);

    if (empty($username) || empty($password) || empty($password_confirm)) {
        $_SESSION['error'] = "Semua bidang harus diisi.";
        header('location: register.php');
        exit();
    }

    if ($password !== $password_confirm) {
        $_SESSION['error'] = "Password dan konfirmasi password tidak cocok.";
        header('location: register.php');
        exit();
    }

    $sql_check_user = "SELECT * FROM users WHERE username = '$username'";
    $result_check = mysqli_query($koneksi, $sql_check_user);

    if (!$result_check) {
        $_SESSION['error'] = "Kesalahan query: " . mysqli_error($koneksi);
        header('location: register.php');
        exit();
    }

    if (mysqli_num_rows($result_check) > 0) {
        $_SESSION['error'] = "Username sudah terdaftar.";
        header('location: register.php');
        exit();
    }

    $hashed_password = sha1($password);
    $sql_register = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";

    if (mysqli_query($koneksi, $sql_register)) {
        $_SESSION['success'] = "Registrasi berhasil. Silakan login.";
        header('location: login.php');
        exit();
    } else {
        $_SESSION['error'] = "Terjadi kesalahan saat menyimpan data: " . mysqli_error($koneksi);
        header('location: register.php');
        exit();
    }
}
?>

<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Register</title>
            <link rel="stylesheet" href="style.css">
        </head>
        <body>
        <div class="login-container">
            <h2>Register</h2>
            <form method="POST">
                <input class="form-control" id="username" name="username" type="text" placeholder="Username" required />
                <input class="form-control" id="password" name="password" type="password" placeholder="Password" required />
                <input class="form-control" id="password_confirm" name="password_confirm" type="password" placeholder="Confirm Password" required />
                <button type="submit" name="register" class="btn btn-primary">Register</button>
                <p>Already have an account? <a href="login.php">Login here</a></p>
                <p>
                <?php
                if (isset($_SESSION['error'])) {
                    echo "<span style='color:red'>" . $_SESSION['error'] . "</span>";
                    unset($_SESSION['error']);
                }
                if (isset($_SESSION['success'])) {
                    echo "<span style='color:green'>" . $_SESSION['success'] . "</span>";
                    unset($_SESSION['success']);
                }
                ?>
            </p>
            </form>
        </div>
    </body>
</html>

