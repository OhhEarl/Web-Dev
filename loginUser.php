<?php
include 'functions/functions.php';
$conn = connect();
if (isset($_POST["signIn"])) {
    $email = $_POST["email"];
    $pass =  $_POST["password"];
    $password = md5($pass);

    if (empty($email) && empty($password)) {
        echo '<script>alert("Incorrect Password or Email")</script>';
    } else {
        $query = "SELECT * FROM `users` WHERE user_email = '$email' and user_password = '$password'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['user_name'] = $row['user_firstname'] . " " . $row['user_lastname'];
            header("location:home.php");
        } else {
            header("location:login.php");
            exit();
        }
    }
}
