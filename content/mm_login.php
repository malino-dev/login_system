<?php
    $message = "";

    if(isset($_SESSION['message']))
    {
        $message = "<p>". $_SESSION['message']. "</p>";
        unset($_SESSION['message']);
    }

    $username = "";
    $email = "";
    $firstname = "";
    $surname = "";

    // action in session gets set when login has failed
    if(isset($_SESSION['action']))
    {
        $username = $_SESSION['username'];

        unset($_SESSION['action']);
        unset($_SESSION['username']);
    }
?>
<?= $message; ?>
<h1>Login</h1>
<form method="post">
    <span>Username:</span>
    <input type="text" name="username" value="<?= $username; ?>" required>
    <br>

    <span>Password:</span>
    <input type="password" name="password" value="" required>
    <br>
    
    <input type="hidden" name="action" value="login">

    <input type="submit">
</form>