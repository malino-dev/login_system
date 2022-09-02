<?php
    class Renderer
    {
        private $map;

        public function __construct()
        {
            $this->map = array(
                "mainmenu" => "/content/mainmenu.php",
                "mm_login" => "/content/mm_login.php",
                "mm_register" => "/content/mm_register.php",    
                "login" => "/logic/login_L.php",
                "register" => "/logic/register_L.php",
                "home" => "/content/home.php",
                "logout" => "/logout.php",
                "u_showusers" => "/content/u_showusers.php",
                "u_editprofile" => "/content/u_editprofile.php",
                "editprofile" => "/logic/editprofile_L.php",
            );
        }

        public function RenderView($action)
        {
            include BASE_DIR. $this->map[$action];
        }
    }