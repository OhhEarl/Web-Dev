<?php
require 'functions/functions.php';
session_start();
if (isset($_SESSION['user_id'])) {
    header("location:home.php");
}
session_destroy();
session_start();
ob_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Social Network</title>
    <link rel="stylesheet" type="text/css" href="resources/css/main.css">
    <style>
        .container {
            width: 500px;
            margin-top: 50px;
            border-radius: 15px;
            padding: 25px;
            padding-top: 50px;
            padding-bottom: 50px;
            box-shadow: rgba(0, 0, 0, 0.25) 0px 0.0625em 0.0625em, rgba(0, 0, 0, 0.25) 0px 0.125em 0.5em, rgba(255, 255, 255, 0.1) 0px 0px 0px 1px inset;
        }

        input {
            height: 40px;
            border-radius: 10px;
            border: none;
            outline: none;
        }

        label {
            font-size: 50;
            margin-left: 5px;
            color: black;
        }


        .submit {
            border-radius: 20px;
            font-weight: 700;
        }

        a {
            text-decoration: none;
            display: flex;
            justify-content: center;
        }
    </style>
</head>

<body>
    <h1>Welcome Back User</h1>
    <div class="container">
        <div class="container-fluid">
            <form method="post" onsubmit="return validateLogin()">
                <div class="form-group">
                    <label for="">Enter Email</label>
                    <input class="form-control" type="text" name="useremail" id="loginuseremail" class="required">
                    </class=>
                </div>

                <br>
                <label for="">Enter Password</label>
                <input type="password" name="userpass" id="loginuserpass">
                <div class="required"></div>
                <br><br>
                <input class="submit" type="submit" value="LOGIN" name="login">
            </form>
            <p><a href="signup.php">Create New Account!</a></p>
        </div>

    </div>
    <script src="resources/js/main.js"></script>
</body>

</html>

<?php
$conn = connect();
if ($_SERVER['REQUEST_METHOD'] == 'POST') { // A form is posted
    if (isset($_POST['login'])) { // Login process
        $useremail = $_POST['useremail'];
        $userpass = md5($_POST['userpass']);
        $query = mysqli_query($conn, "SELECT * FROM users WHERE user_email = '$useremail' AND user_password = '$userpass'");
        if ($query) {
            if (mysqli_num_rows($query) == 1) {
                $row = mysqli_fetch_assoc($query);
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['user_name'] = $row['user_firstname'] . " " . $row['user_lastname'];
                header("location:home.php");
            } else {
?> <script>
                    document.getElementsByClassName("required")[0].innerHTML = "Invalid Login Credentials.";
                    document.getElementsByClassName("required")[1].innerHTML = "Invalid Login Credentials.";
                </script> <?php
                        }
                    } else {
                        echo mysqli_error($conn);
                    }
                }
            }
                            ?>