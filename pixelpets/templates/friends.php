<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <meta name="author"
        content="Asher Saunders, Lain Bowman (we used the Visual Studio Code Live Share addon to work together)">

    <!--We may still need to add bootstrap? or is it at the bottom-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js"
        integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Play</title>

</head>

<body>
    <?php

    include("navbar.php");
    if ($errorMessage != "") {
        $type = "danger";
        if ($good) {
            $type = "success";
        }

        echo "<div class=\"alert alert-$type\" role=\"alert\">$errorMessage</div>";
    }
    ?>
    <div id="error"> </div>
    <div class="container-fluid grassy">
        <div class="textbacking">
        <h1> PixelPals! </h1>
        </div>
        <img class="align-self-end crisp" src="static/friends.png" alt="PixelPals Icon"
            width="200"
            height="200"/>
        <h3> My Pals: </h3>
        <?php
        $res = $this->db->query("select * from users where email = $1", $email);
        // print_r(json_decode($res[0]["friends"]));
        if (isset($res[0]["friends"])) {
            print_r($res[0]["friends"]);
            foreach(json_decode($res[0]["friends"]) as $friend) {
                echo $friend;
            }
        } else {
            echo "You have no PixelPals...yet! Add some!";
        }
        ?>
        <h2> Add Pals by Username </h2>
        <form id="friendform" method="post" action="?command=addfriend">
            <input type="text" name="username" placeholder="username">
            <button id="friendbutton" type="submit">Add Friend</button>
        </form>
        <?php
        
        
        $res = $this->db->query("select * from frequests where requester = $1", $username);

        if (!empty($res)) {
            echo "<h2>Outgoing</h2>";
            foreach ($res as $reqs) {
                echo "<div class = \"row\">";
                echo "<div class=\"col\"><p>",$reqs["requestee"],"<p></div>";
                echo "<div class=\"col\">Pending...</div>";
                echo "</div>";

            }
            
        }


        $res = $this->db->query("select * from frequests where requestee = $1", $username);
        if (!empty($res)) {
            echo "<h2>Incoming</h2>";
            foreach ($res as $reqs) {

                ?>
                <div class="row">
                    <div class="col">
                        <p>
                            <?php echo $reqs["requester"]; ?>
                        </p>
                    </div>
                    <div class="col">
                        <form method="post" action="?command=accept">
                            <input type="hidden" name="acceptedusername" value="<?php echo $reqs["requester"] ?>">
                            <button type="submit">Accept
                                <?php echo $reqs["requester"] ?>
                            </button>
                        </form>
                    </div>
                    <div class="col">
                        <form method="post" action="?command=ignore">
                            <input type="hidden" name="ignoredusername" value="<?php echo $reqs["requester"] ?>">
                            <button type="submit">Ignore
                                <?php echo $reqs["requester"] ?>
                            </button>
                        </form>
                    </div>
                </div>
                <?php
            }

        }

        ?>

        <!-- <form method="post" action="?command=addfriend"> -->

        <!-- </form> -->
    </div>
    <script>


        $(document).ready(function (data) {
            $("#friendform").on("submit", function () {
                username = $("input[type=text][name=username]").val();
                // console.log("<?php echo $_SESSION["username"] ?>", username);
                if (username != "<?php echo $_SESSION["username"] ?>") {
                    
                    return true;
                }
                else {
                    console.log("BAOIUDWNOIWAD");
                    $("#error").html("<div class=\"alert alert-warning\" role=\"alert\">You can't befriend yourself silly.</div>");
                    return false;
                }

            })

        });
    </script>
</body>
<?php
include("footer.php");
?>

</html>