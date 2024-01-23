<?php
include 'config.php';
session_start();

if (isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if (isset(&_POST['register'])) {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = hash('sha256', $_POST['password']);
    $cpassword = hash('sha256', $_POST['cpassword']);

    if ($password == $cpassword) {
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($mysqli, $sql);
        if (!$result->num_rows > 0) {
            $sql = "INSERT INTO users (name, username, email, password)
                    VALUES ('$name', '$username', '$email', '$password')"; 
            $result = mysqli_query($mysqli, $sql);
            if (result) {
                header("Location: login.php");
                echo "<script>alert(' Kerja Bgus!')</script>";
                $name = "";
                $username = "";
                $email = "";
                $_POST['password'] = "";
                $_POST['cpassword'] = "";
            } else {
                echo "<script>alert('Waduh...')</script>";
            }
        } else {
            echo "<script>alert('Waduh, Email sudah terdaftar')</script>";
        }
    } else {
        echo "<script>alert('Password salah')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        
    </style>
</head>
<body>
    
</body>
</html>