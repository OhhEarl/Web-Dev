<?php
require 'functions/functions.php';
$conn = connect();

if (isset($_POST['addUser'])) {

    $firstName =  htmlspecialchars($_POST["firstName"]);
    $lastName =  htmlspecialchars($_POST["lastName"]);
    $email =  htmlspecialchars($_POST["email"]);
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $gender =  htmlspecialchars($_POST["gender"]);
    $dob =  htmlspecialchars($_POST["dob"]);
    $country = $_POST['country'];
    $nickname = $_POST['nickname'];



    $errors = array();

    // Validate email
    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    // Check if email is unique (example code)
    // Replace with your own logic to check uniqueness in the database
    $query = "SELECT * FROM users WHERE user_email = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 's', $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Check if email exists
    if (mysqli_num_rows($result) > 0) {
        // Email already exists, handle the error
        $errors[] = "Email already exists.";
        header("Location:signup.php");
    }

    // Validate password
    if (empty($password)) {
        $errors[] = "Password is required.";
    } elseif (strlen($password) < 6) {
        $errors[] = "Password must be at least 6 characters long.";
    }

    // Check if password and confirm password match
    if ($password !== $confirmPassword) {
        $errors[] = "Passwords do not match.";
    } else {
        $hashedPassword = md5($password);
    }

    // Check for errors
    if (!empty($errors)) {
        // Errors occurred, redirect back to signup form with errors
        session_start();
        $_SESSION['errors'] = $errors;
        header("Location: signup.php");
        exit();
    } else {
        // Prepare the INSERT statement

        $insertQuery = "INSERT INTO users (user_firstname, user_lastname, user_nickname,user_password, user_email, user_gender, user_birthdate, user_hometown) VALUES (?, ?, ?, ? ,? ,? ,? ,?)";
        $insertStmt = mysqli_prepare($conn, $insertQuery);
        mysqli_stmt_bind_param($insertStmt, 'ssssssss', $firstName, $lastName, $nickname, $hashedPassword, $email, $gender, $dob, $country);
        mysqli_stmt_execute($insertStmt);

        header("Location:login.php");
        exit();
    }
}

// Close the database connection
mysqli_close($conn);
