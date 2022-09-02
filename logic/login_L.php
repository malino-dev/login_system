<?php
    $username = $_POST['username'];
    $password = $_POST['password'];

    require BASE_DIR. "/classes/DBHandler.php";
    $dbHandler = new DBHandler();
    $id = -1;
    $loginResult = $dbHandler->Login($username, $password, $id);

    switch($loginResult)
    {
        case "OK":
            $_SESSION['message'] = "Login success";
            $_SESSION['action'] = "home";
            $_SESSION['login_username'] = $username;
            $_SESSION['login_id'] = $id;
            break;
        case "UserNotFound":
            $_SESSION['message'] = "Login data not matching";
            $_SESSION['action'] = "mm_login";
            $_SESSION['username'] = $username;
            break;
    }

    header("Location: index.php");
    exit;