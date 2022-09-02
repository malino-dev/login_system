<?php
    require_once BASE_DIR. "/classes/DBHandler.php";

    $firstname = $_POST['firstname'];
    $surname = $_POST['surname'];

    $dbHandler = new DBHandler();
    $dbHandler->EditProfile($_SESSION['login_id'], $firstname, $surname);

    $_SESSION['message'] = "Erfolgreich ge&auml;ndert";
    $_SESSION['action'] = "home";

    header("Location: index.php");
    exit;   