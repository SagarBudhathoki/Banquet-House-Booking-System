<?php
require '/xampp/htdocs/Banquet-house/connection/config.php';

if (($_POST["action"] ?? null) == "signup") {
    signup();
} elseif (($_POST["action"] ?? null) == "signin") {
    signin();
} else {
    return false;
}

// REGISTER
function signup()
{
    global $conn;
    $name = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['useremail']);
    $password = mysqli_real_escape_string($conn, md5($_POST['password']));
    $confirm =  mysqli_real_escape_string($conn, md5($_POST['confirm']));
    $duplicate = mysqli_query($conn, "SELECT * FROM user WHERE name = '$name' OR email = '$email'");
    if (mysqli_num_rows($duplicate) > 0) {
        echo "username or email already taken";
    } else {
        if ($password == $confirm) {
            $query = "INSERT INTO user VALUES('','$name','$email','$password','user')";
            if (mysqli_query($conn, $query)) {
                echo "success";
            }
        } else {
            echo "password doesnot match";
        }
    }
    exit;
}
// LOGIN
function signin()
{
    global $conn;
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, md5($_POST['password']));

    $result = mysqli_query($conn, "SELECT * FROM user WHERE email= '$email'");
    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) > 0) {
        if ($password == $row['password']) {
            if ($row['type'] == 'admin') {

                $_SESSION['admin_name'] = $row['name'];
                $_SESSION['admin_email'] = $row['email'];
                $_SESSION['admin_id'] = $row['id'];
                echo "Admin Login Successful";
            } elseif ($row['type'] == 'user') {

                $_SESSION['user_name'] = $row['name'];
                $_SESSION['user_email'] = $row['email'];
                $_SESSION['user_id'] = $row['id'];
                echo "User Login Successful";
            } elseif ($row['type'] == 'superadmin') {

                $_SESSION['super_name'] = $row['name'];
                $_SESSION['super_email'] = $row['email'];
                $_SESSION['super_id'] = $row['id'];
                echo "super admin login sucessful";
            }
        } else {
            echo "incorrect username or password";
            exit;
        }
    } else {
        echo 'user not registered';
        exit;
    }
}
