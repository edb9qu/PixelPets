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
    <title>Gallery</title>
</head>

<body>
    <?php

    include("navbar.php");
    ?>
    <div class="container-fluid grassy">
        <h1>Gallery</h1>

        <div class="container-fluid justify-content-center g-3  row w-100">

            <?php
            $res = $this->db->query("select * from pets where pets_count > 1;");
            $delay = 0;
            // $keys = array_keys($res);
            // $pets = array();
            // foreach ($res as $key => $pet) {
            //     $pets[$key] = $pet['pets_count'];
            // }
            // // print_r($pets);
            // array_multisort($pets, SORT_DESC, $res);
            uasort($res, function ($a, $b ) {return $b["pets_count"] - $a["pets_count"]; });
            // print_r($res);
            foreach ($res as $key => $pet) {
                ?>

                <div class="card p-2 m-4" style="width: 18rem;">
                    <h5 class="card-title">
                        <?php echo $pet["name"]; ?>
                    </h5>
                    <p>Owner: <?php echo $this->db->query("select * from users where email = $1;", $pet["owneremail"])[0]["username"];?> </p>
                    <div>
                        <?php echo $pet["name"]; ?> has been pet
                        <p style="display:inline;" id="<?php echo $pet["name"] ?>count"></p> times
                    </div>
                    <div class="display-render" style="<?php echo "animation-delay:", $delay, "ms";
                    $delay += 200; ?>"
                        id="<?php echo $pet["name"]; ?>">

                    </div>
                    <script>
                        var ajax = new XMLHttpRequest();
                        var comm = "?command=data&name=<?php echo $pet["name"];
                        echo "&email=";
                        echo $pet["owneremail"]; ?>";
                        ajax.open("GET", comm, true);
                        ajax.responseType = "json"
                        ajax.send(null);
                        ajax.addEventListener("load", function () {
                            if (this.status == 200) {
                                json = this.response;
                                console.log(JSON.parse(json["json"]));
                                console.log(json["pets_count"]);
                                render(document.getElementById("<?php echo $pet["name"] ?>"), JSON.parse(json["json"]));
                                $("#<?php echo $pet["name"] ?>count").text(json["pets_count"]);

                            }
                        });

                    </script>
                    <!-- <p class="card-text">
                        <?php echo $pet["json"]; ?>
                    </p> -->
                    <?php 
                    $res = $this->db->query("select * from pets where owneremail = $1;", $pet["owneremail"]);
                    $arr = [];
                    foreach($res as $p) {
                        array_push($arr, $p["name"]);
                    }
                    $id = array_search($pet["name"],$arr);
                    ?>
                    <form method="post" action=<?php echo "?command=visit&";
                    echo "email=";
                    echo $pet["owneremail"];
                    ;
                    echo "&id=";
                    echo $id; ?>>
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