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

    // action in session gets set when the submission failed so we grab those values for the input fields again
    if(isset($_SESSION['action']))
    {
        $username = $_SESSION['username'];
        $email = $_SESSION['email'];
        $firstname = $_SESSION['firstname'];
        $surname = $_SESSION['surname'];

        unset($_SESSION['action']);
        unset($_SESSION['username']);
        unset($_SESSION['email']);
        unset($_SESSION['firstname']);
        unset($_SESSION['surname']);
    }
?>
<?= $message; ?>
<h1>Register</h1>
<form method="post">
    <span>Username:</span>
    <input type="text" name="username" value="<?= $username; ?>" required>
    <br>

    <span>First name:</span>
    <input type="text" name="firstname" value="<?= $firstname; ?>" required>
    <br>

    <span>Surname:</span>
    <input type="text" name="surname" value="<?= $surname; ?>" required>
    <br>

    <span>Email:</span>
    <input type="text" name="email" value="<?= $email; ?>" required>
    <br>

    <span>Password:</span>
    <input type="password" name="password" value="" required>
    <br>
    
    <span>Repeat password:</span>
    <input type="password" name="password_repeat" value="" required>
    <br>

    <input type="hidden" name="action" value="register">

    <input type="submit">
</form>