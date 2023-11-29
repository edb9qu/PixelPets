<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <meta name="author"
        content="Asher Saunders, Lain Bowman (we used the Visual Studio Code Live Share addon to work together)">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js"
        integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!--We may still need to add bootstrap? or is it at the bottom-->
    <title>Play</title>
</head>

<body>
    <?php

    include("navbar.php");
    ?>
    <div class="container-fluid grassy">
        <h1>My Pixel Pets!</h1>
        <form class="col-md-auto" method="post" action="?command=petcreation">
            <button type="submit" class="btn btn-primary">New Pet</button>

        </form>
        <div class="container-fluid justify-content-center g-3  row w-100">

            <?php
            $res = $this->db->query("select * from pets where owneremail = $1;", $_SESSION["email"]);
            $delay = 0;
            foreach ($res as $key => $pet) {
                ?>

                <div class="card p-2 m-4" style="width: 18rem;">
                    <h5 class="card-title">
                        <?php echo $pet["name"]; ?>
                    </h5>
                    <img src="..." class="card-img-top" alt="...">
                    <div class="display-render" style="<?php echo "animation-delay:",$delay, "ms"; $delay += 200;?>" id="<?php echo $pet["name"]; ?>">
                        
                    </div>
                    <script>
                        var ajax = new XMLHttpRequest();
                        var comm = "?command=data&name=<?php echo $pet["name"]; echo "&email="; echo $_SESSION["email"];?>";
                        ajax.open("GET", comm, true);
                        ajax.responseType = "json"
                        ajax.send(null);
                        ajax.addEventListener("load", function () {
                            if (this.status == 200) {
                                json = this.response;
                                render(document.getElementById("<?php echo $pet["name"]?>"),json);
                                console.log(json);
                            }
                        });

                    </script>
                    <!-- <p class="card-text">
                        <?php echo $pet["json"]; ?>
                    </p> -->
                    <form method="post" action=<?php echo "?command=visit&";
                    echo "email=";
                    echo $_SESSION["email"];
                    echo "&id=";
                    echo $key; ?>>
                        <button href="#" class="btn btn-primary">Visit
                            <?php echo $pet["name"] ?>
                        </Button>
                    </form>
                </div>

                <?php

            }
            ?>
        </div>
    </div>
    </div>
    <script src="scripts/pet.js"></script>

</body>
<?php
include("footer.php");
?>

</html>