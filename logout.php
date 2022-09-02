<?php
    session_start();
    
    // Eeeeeeeeeeeeevil!!!!!!!!
    //session_destroy();

    foreach($_SESSION as $key => $value)
    {
        if(str_starts_with($key, "login_"))
        {
            unset($_SESSION[$key]);
        }
    }

    unset($_SESSION['action']);

    header("Location: index.php");
    exit;