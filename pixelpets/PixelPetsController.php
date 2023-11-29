<?php
    class PixelPetsController {
        public function __construct($input) {
            session_start();
            $this->input = $input;
            // print_r($input); 
           
            $this->db = new Database();
            // print_r($input);
        }
        public function run() {
            // Get the command
            $command = "home";

            if (isset($this->input["command"]))
                $command = $this->input["command"];
    
            switch($command) {
                case "data":
                    $this->getPetData();
                    break;
                case "loginchoice":
                    if(!isset($_SESSION["username"])) {
                        $this->showLoginChoice();
                        break;
                    }
                case "play":
                    $this->showPlay();
                    break;
                case "profile":
                    $this->showProfile();
                    break;
                case "addpet":
                    $this->addpet();
                    break;
                case "gallery":
                    $this->showGallery();
                    break;
                case "addfriend":
                    $this->addFriend();
                    break;
                case "friends":
                    $this->showFriends();
                    break;
                case "visit":
                    $this->showVisit();
                    break;
                case "signup":
                    $this->signup();
                    break;
                case "signuppage":
                    $this->showSignup();
                    break;
                case "petcreation":
                    $this->showPetCreation();
                    break;
                case "accept":
                    $this->accept();
                    break;
                case "ignore":
                    $this->ignore();
                    break;
                case "create":
                    $this->create();
                    break;
                case "release":
                    $this->release();
                    break;
                case "loginpage":
                    $this->showLogin();
                    break;
                case "login":
                    $this->login();
                    break;
                case "about":
                    $this->showAbout();
                    break;
                case "help":
                    $this->showHelp();
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
        public function showFriends($errorMessage = "", $good = false) {
            $email = $_SESSION["email"];
            $username = $_SESSION["username"];
            include("templates/friends.php");
        }
        public function showGallery() {
            
            include("templates/gallery.php");
        }
        public function showVisit() {
            if (isset($this->input["email"]))
                $email = $this->input["email"];
            if (isset($this->input["id"]))
                $id = $this->input["id"];
            
            include("templates/pet.php");
        }
        public function addpet() {
            if (isset($this->input["email"]))
                $email = $this->input["email"];
            if (isset($this->input["name"]))
                $name = $this->input["name"];

            $res = $this->db->query("select * from pets where owneremail = $1 and name = $2;", $email, $name);
            $count = 0;
            if(!empty($res))
                // print_r($res[0]);
                // echo $res[0]["json"];
                $count = $res[0]["pets_count"] + 1;
            $this->db->query("update pets set pets_count = $1 where owneremail = $2 and name = $3;", $count, $email, $name);

            echo "$name has been pet $count times.";
        }
        public function accept() {
            // echo $_POST["acceptedusername"];
            $res = $this->db->query("select * from users where username = $1", $_SESSION["username"]);
            if(isset($res[0]["friends"])) {
                // print_r($res[0]["friends"]);
                $friends = json_decode($res[0]["friends"]);
                array_push($friends, $_POST["acceptedusername"]);
                // echo "HERE\n";
                // print_r($friends);
                $this->db->query("update users set friends = $1 where username = $2", json_encode($friends), $_SESSION["username"]);

            }
            else {
                $friends = array($_POST["acceptedusername"]);
                echo json_encode($friends);
                $this->db->query("update users set friends = $1 where username = $2", json_encode($friends), $_SESSION["username"]);
            }
            $res = $this->db->query("select * from users where username = $1", $_POST["acceptedusername"]);
            if(isset($res[0]["friends"])) {
                // print_r($res[0]["friends"]);
                $friends = json_decode($res[0]["friends"]);
                array_push($friends, $_SESSION["username"]);
                // echo "HERE\n";
                // print_r($friends);
                $this->db->query("update users set friends = $1 where username = $2", json_encode($friends), $_POST["acceptedusername"]);

            }
            else {
                $friends = array($_SESSION["username"]);
                echo json_encode($friends);
                $this->db->query("update users set friends = $1 where username = $2", json_encode($friends), $_POST["acceptedusername"]);
            }
            
            // echo $res[0]["friends"]; 
            $this->db->query("delete from frequests where requester = $1 and requestee = $2", $_POST["acceptedusername"], $_SESSION["username"]);
            $this->showFriends("Successfully accepted " . $_POST["acceptedusername"]  . "!", true);
        }
        public function ignore() {
            
            // echo $_POST["ignoredusername"];
            $this->db->query("delete from frequests where requester = $1 and requestee = $2", $_POST["ignoredusername"], $_SESSION["username"]);
            $this->showFriends("Successfully ignored " . $_POST["ignoredusername"]  . "...");
        }
        public function addFriend() {
            if($_POST["username"] == $_SESSION["username"]) {
                $message = "You can't befriend yourself, silly.";
                $this->showFriends($message);
                return;
            }

            $res = $this->db->query("select * from users where username = $1;", $_POST["username"]);

            if (!empty($res)) {
                $res = $this->db->query("select * from users where username = $1", $_POST["username"]);

                if(in_array($_SESSION["username"],json_decode($res[0]["friends"]))) {
                    $this->showFriends("This user is already on your friends list!");
                    return;
                } 
                $res = $this->db->query("select * from frequests where requester = $1 and requestee = $2;", $_SESSION["username"], $_POST["username"]);

                if(!empty($res)) {
                    $message= "You've already sent this user a friend request! Be patient!";
                    $this->showFriends($message);
                    return;
                }
                else {
                    $res = $this->db->query("select * from frequests where requester = $1 and requestee = $2;", $_POST["username"],$_SESSION["username"]);
                    if(!empty($res)) {
                        $this->showFriends("This person has already requested to be friends with you. Accept their request!", true);
                        return;
                    }
                    

                    $this->db->query("insert into frequests (requester, requestee) values ($1, $2);",
                    $_SESSION["username"],
                    $_POST["username"],
                    );
                }
                // echo "Friend request sent!";
                $message =  "Friend request sent!";
                $this->showFriends($message, true);
                return;
            }
            else {
                // echo "Ah! We had trouble finiding a user by that name. Are you sure you typed it right?";
                $message= "Ah! We had trouble finiding a user by that name. Are you sure you typed it right?";
                $this->showFriends($message);
                return;
            }
                
        }
        public function getPetData() {
            $email = $_GET["email"];
            $name = $_GET["name"];
            // if (isset($this->input["email"]))
            //     $email = $this->input["email"];
            // if (isset($this->input["id"]))
            //     $id = $this->input["id"];
            $res = $this->db->query("select * from pets where owneremail = $1 and name = $2;", $_GET["email"], $_GET["name"]);
            if(!empty($res))
                // print_r($res[0]);
                // echo $res[0]["json"];
                // echo(($res[0]["json"]));
                echo json_encode(array("json"=>$res[0]["json"], "pets_count"=>$res[0]["pets_count"]));

            // $json = json_decode(array($_GET["body"], $_GET["head"], $_GET["ears"], $_GET["tail"]));
            // include($json);
        }
        
        public function release() {
            if (isset($this->input["email"]))
                $email = $this->input["email"];
            if (isset($this->input["name"]))
                $name = $this->input["name"];

            if($email == $_POST["email"] ) {
                $this->db->query("delete from pets where owneremail = $1 and name = $2;", $email, $name);
                $this->showPlay();
            }
            else {
                $this->showVisit();
            }
            
        }
        public function signup() {
            if (!preg_match("/^([a-z0-9-_+]+.?[a-z0-9-_+]+)+?@([-a-z0-9]+\.[-a-z0-9]+)+$/i",$_POST["email"])){
                $errorMessage = "Invalid email";
                
                $this->showSignup($errorMessage, $_POST["username"],$_POST["email"],$_POST["selection"]);
                return;
            }
            if($_POST["username"] =="" || $_POST["email"] == "") {
                $message = "You must have a name and/or email!";
                $this->showSignup($message, $_POST["username"],$_POST["email"],$_POST["selection"]);
                return;
            }
            if($_POST["pass"] != $_POST["pass2"]) {
                $message = "Your passwords must match!";
                $this->showSignup($message,$_POST["username"],$_POST["email"],$_POST["selection"]);
                return;
            }
            if($_POST["selection"] == 3) {
                $message = "You're not old enough and approved enough! We've contacted your parents and called the police.";
                $this->showSignup($message, $_POST["username"],$_POST["email"],$_POST["selection"]);
                return;
            }
            $res = $this->db->query("select * from users where username = $1;", $_POST["username"]);
            if (!empty($res)) {
                $message = "A user by this email already exists!";
                $this->showSignup($message, $_POST["username"],$_POST["email"],$_POST["selection"]);
                return;
            }
            $res = $this->db->query("select * from users where email = $1;", $_POST["email"]);
            if (empty($res)) {
                // User was not there, so insert them
                $this->db->query("insert into users (username, email, password, friends) values ($1, $2, $3, $4);",
                    $_POST["username"], $_POST["email"],
                    password_hash($_POST["pass"], PASSWORD_DEFAULT),json_encode([]));
                
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
        public function create() {
            $res = $this->db->query("select * from pets where owneremail = $1 and name = $2;", $_SESSION["email"], $_POST["name"]);
            
            if (empty($res)) {
                // User was not there, so insert them
                
                $json = "[\"skin\" = \"blue\"]";
                // print_r($_POST);
                // $json = json_encode(array("body" => $_POST["body"], "head" => $_POST["head"], "ears" => $_POST["ears"], "tail" => $_POST["tail"]));
                $json = json_encode($_POST);
                $this->db->query("insert into pets (name, owneremail, json, pets_count) values ($1, $2, $3, $4);",
                    $_POST["name"], $_SESSION["email"],$json, 0);
                
                include("templates/play.php");
                return;
            }
            else {
                
                $this->showPetCreation("You already have a pet with this name!");
                return;
            }
        }
        public function login() {
            // need a name, email, and password
            $errorMessage = "";
            
            
            if( isset($_POST["email"]) && !empty($_POST["email"]) &&
                isset($_POST["pass"]) && !empty($_POST["pass"])) {
                    
                    
                    // Check if user is in database
                    $res = $this->db->query("select * from users where email = $1;", $_POST["email"]);


                    
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
        public function showProfile(){
            $email="null";
            if (isset($this->input["email"]))
                $email = $this->input["email"];
            include("templates/profile.php");
        }
        public function showAbout($errorMessage=""){
            include("templates/about.php");
        }
        public function showHelp($errorMessage=""){
            include("templates/help.php");
        }
        public function showLoginChoice() {
            
            include("templates/loginchoice.php");
        }
        public function showPetCreation($errorMessage = "") {
            
            include("templates/petcreation.php");
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
