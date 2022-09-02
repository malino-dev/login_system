<?php
    $username = $_POST['username'];
    $email = $_POST['email'];
    $firstname = $_POST['firstname'];
    $surname = $_POST['surname'];
    $password = $_POST['password'];
    $password_repeat = $_POST['password_repeat'];

    if($password != $password_repeat)
    {
        $_SESSION['message'] = "Passw&ouml;rter sind ungleich.";
        $_SESSION['action'] = "mm_register";

        $_SESSION['username'] = $username;
        $_SESSION['firstname'] = $firstname;
        $_SESSION['surname'] = $surname;
        $_SESSION['email'] = $email;

        header("Location: index.php");
        exit;
    }
    else
    {
        require BASE_DIR. "/classes/DBHandler.php";
        $dbHandler = new DBHandler();
        $dbHandler->InsertNewUser($username, $email, $firstname, $surname, $password);

        $_SESSION['message'] = "Erfolgreich registriert";
        header("Location: index.php");
        exit;
    }