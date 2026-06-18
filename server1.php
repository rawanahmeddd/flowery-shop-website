<?php
if (!isset($_SESSION)) {
    session_start();
}

$error = array();


$db = mysqli_connect('localhost', 'root', '', 'ia-2026');


if (isset($_POST['register'])) {

    $username = mysqli_real_escape_string($db, $_POST['un']);
    $email = mysqli_real_escape_string($db, $_POST['em']);
    $password1 = mysqli_real_escape_string($db, $_POST['psw1']);
    $password2 = mysqli_real_escape_string($db, $_POST['psw2']);

    if (empty($username)) {
        array_push($error, "Username is required");
    }

    if (empty($email)) {
        array_push($error, "Email is required");
    }

    if (empty($password1)) {
        array_push($error, "Password is required");
    }

    if (empty($password2)) {
        array_push($error, "Confirm password is required");
    }

    if ($password1 != $password2) {
        array_push($error, "Passwords do not match");
    }

    if (count($error) == 0) {
       
        $sql = "INSERT INTO user (name, email, password) 
                VALUES ('$username', '$email', '$password1')";
        mysqli_query($db, $sql);
        
        
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "Registration successful!";
        header("Location: homepage.html");
        exit();
    }
}


if (isset($_POST['login'])) {

    $username = mysqli_real_escape_string($db, $_POST['un']);
    $password = mysqli_real_escape_string($db, $_POST['psw1']);

    if (empty($username)) {
        array_push($error, "Username is required");
    }

    if (empty($password)) {
        array_push($error, "Password is required");
    }

    if (count($error) == 0) {
        $query = "SELECT * FROM user WHERE name='$username' AND password='$password'";
        $result = mysqli_query($db, $query);

        if (mysqli_num_rows($result) == 1) {

            $_SESSION['username'] = $username;
            $_SESSION['success'] = "Welcome, you are logged in";

            header("Location: homepage.html");
            exit();
        } else {
            array_push($error, "Wrong username or password");
        }
    }
}


if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("Location: login.php");
    exit();
}
?>