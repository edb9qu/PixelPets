<?php
    class PixelPetsController {
        public function __construct($input) {
            session_start();
            $this->input = $input;

           
            $this->db = new Database();
            // print_r($input);
        }
        public function run() {
            // Get the command
            $command = "home";

            if (isset($this->input["command"]))
                $command = $this->input["command"];
    
            switch($command) {
                case "loginchoice":
                    if(!isset($_SESSION["username"])) {
                        $this->showLoginChoice();
                        break;
                    }
                case "play":
                    $this->showPlay();
                    break;
                case "signup":
                    $this->signup();
                    break;
                case "signuppage":
                    $this->showSignup();
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
        public function showLogin($errorMessage = "") {

            include("templates/login.php");
        }
        
        public function signup() {
            if($_POST["username"] =="" || $_POST["email"] == "") {
                $message = "You must have a name and/or email!";
                $this->showSignup($message, $_POST["username"],$_POST["email"],$_POST["selection"]);
                return;
            }
            if($_POST["pass"] != $_POST["pass2"]) {
                $message = "Your passwords must match!";
                $this->showSignup($message, $_POST["username"],$_POST["email"],$_POST["selection"]);
                return;
            }
            if($_POST["selection"] == 3) {
                $message = "You're not old enough and approved enough! We've contacted your parents and called the police.";
                $this->showSignup($message, $_POST["username"],$_POST["email"],$_POST["selection"]);
                return;
            }
            $res = $this->db->query("select * from users where email = $1;", $_POST["email"]);
            if (empty($res)) {
                // User was not there, so insert them
                $this->db->query("insert into users (username, email, password) values ($1, $2, $3);",
                    $_POST["username"], $_POST["email"],
                    password_hash($_POST["pass"], PASSWORD_DEFAULT));
                
                $_SESSION["email"] = $_POST["email"];
                $_SESSION["username"] = $_POST["username"];
                
                // Send user to the appropriate page (question)
                // header("Location: ?command=question");
                // echo "CREATED USER";
                include("templates/play.php");
                return;
            }
            else {
                
                $this->showSignup("This user already exists.", $_POST["username"],$_POST["email"],$_POST["selection"]);
                return;
            }
        }
        public function login() {
            // need a name, email, and password
            $errorMessage = "";
            if( isset($_POST["username"]) && !empty($_POST["username"]) && isset($_POST["email"]) && !empty($_POST["email"]) &&
                isset($_POST["pass"]) && !empty($_POST["pass"])) {
                    
                
                    // Check if user is in database
                    $res = $this->db->query("select * from users where email = $1;", $_POST["email"]);

                    // if (!preg_match("^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$",($_POST["email"]))){
                    //     $errorMessage = "Invalid email";
                    // }

                    if (!empty($res)) {
                        // print_r($res);
                        // User was in the database, verify password
                        if (password_verify($_POST["pass"], $res[0]["password"])) {
                            // Password was correct
                            $_SESSION["username"] = $res[0]["username"];
                            $_SESSION["email"] = $res[0]["email"];
                            $_SESSION["username"] = $res[0]["username"];
                            // header("Location: ?command=play");
                            $errorMessage = "GOOD!:D";
                            $this->showPlay();
                            return;
                        } 
    
                        else {
                            $errorMessage = "Incorrect password.";
                        }
                    }
                    else {
                        $errorMessage = "User not found.";
                        
                    }
            } else {
                
                $errorMessage = "email, and password are required.";
            }
            // If something went wrong, show the welcome page again
            // $errorMessage = "something went wrong";
            
            $this->showLogin($errorMessage);
        }
        public function showPlay(){
            include("templates/play.php");
        }
        public function showLoginChoice() {
            
            include("templates/loginchoice.php");
        }
        public function showSignup($errorMessage = "", $uname = "", $email = "", $selec = 0) {
            
            include("templates/signup.php");
        }
        public function showHome($errorMessage = "") {
            // print_r($_SESSION);
            include("templates/mainpage.php");
        }
        public function logout() {
            session_destroy();
    
            session_start();
        }
    }

?>
