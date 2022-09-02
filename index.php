<?php
    session_start();

    define("BASE_DIR", __DIR__);

    function make_button_link($action, $text, $btnClass)
    {
        return <<<A
<form method="post">
    <input type="hidden" name="action" value="$action">
    <input type="submit" value="$text" class="btn btn-$btnClass">
</form>
A;
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>sog_dbengineering_gp21</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
    </head>
    <body>
        <?php
            if(isset($_SESSION['message']))
            {
                echo "<p>". $_SESSION['message']. "</p>";
                unset($_SESSION['message']);
            }

            require_once "classes/Renderer.php";
            $renderer = new Renderer();
            $key = "NO KEY FOUND";

            if(isset($_POST['action']))
            {
                //$_SESSION['action'] = $_POST['action'];
                //header("Location: index.php");
                $key = $_POST['action'];
            }
            else if(isset($_SESSION['action']))
            {
                $key = $_SESSION['action'];
            }
            else
            {
                $key = "mainmenu";
            }

            //print_r($_POST); print_r($_SESSION); echo "<p>Key = $key</p>";
            $renderer->RenderView($key);
        ?>
    </body>
</html>