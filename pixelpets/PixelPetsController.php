<?php
    class PixelPetsController {
        public function __construct($input) {
            session_start();
            $this->input = $input;
        }
        public function run() {
            // Get the command
            $command = "welcome";
            if (isset($this->input["command"]))
                $command = $this->input["command"];
    
            switch($command) {
                case "signuppage":
                    $this->showSignup();
                    break;
                case "loginchoice":
                    $this->showLoginChoice();
                    break;
                case "loginpage":
                    $this->showLogin();
                    break;
                case "login":
                    $this->login();
                    break;
                case "logout":
                    $this->logout();
                case "home":
                default:
                    $this->showHome();
                    break;
            }
            
        }
        public function showLogin() {
            include("templates/login.php");
        }
        public function login() {

            if(isset($_POST["name"])) {
                $_SESSION["name"] = $_POST["name"];
            }
    
            if(isset($_POST["email"])) {
                $_SESSION["email"] = $_POST["email"];
            }
            
            // echo "made new playing";
    
        }
        public function showLoginChoice() {
            
            include("templates/loginchoice.php");
        }
        public function showSignup() {
            
            include("templates/signup.php");
        }
        public function showHome() {
            
            include("templates/mainpage.php");
        }
        public function logout() {
            session_destroy();
    
            session_start();
        }
    }

?>
