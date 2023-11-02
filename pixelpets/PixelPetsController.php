<?php
    class PixelPetsController {
        public function __construct($input) {
            session_start();
            $this->input = $input;
            // print_r($input);
        }
        public function run() {
            // Get the command
            $command = "home";

            if (isset($this->input["command"]))
                $command = $this->input["command"];
    
            switch($command) {
                case "signup":
                    $this->signup();
                    break;
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

            // print_r($_POST);
            
            // echo "made new playing";
    
        }
        public function signup() {
            // print_r($_POST);
            if($_POST["pass"] != $_POST["pass2"]) {
                $message = "<div class=\"alert alert-danger\" role=\"alert\">Your passwords must match!</div>";
                $this->showSignup($message);
                return;
            }
            if($_POST["selection"] == 3) {
                $message = "<div class=\"alert alert-danger\" role=\"alert\">You're not old enough to play!</div>";
                $this->showSignup($message);
                return;
            }
            
        }
        public function showLoginChoice() {
            
            include("templates/loginchoice.php");
        }
        public function showSignup($message = "") {
            
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
