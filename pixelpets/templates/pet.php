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

<body class="grassy">
    <?php

    include("navbar.php");
    ?>
    <div class="container-fluid grassy d-flex justify-content-center">
        
        <?php
        $res = $this->db->query("select * from pets where owneremail = $1;", $email);

        $pet = $res[$id];

        ?>

        <div class="card col-7 p-2 m-4 cardoutline">
            <div class="align-self-center">
                <h5 class="petname">
                    <?php echo $pet["name"]; ?>
                </h5>
                
            </div>
            <div class="align-self-center text-centered" id="message"></div>
            <div class="card-body">

            </div>
            <div>
                <!-- <img src="static/food.png" class="pet-actions crisp" id="food" style="display:none;" alt="food bowl">
                <img src="static/ball.png" class="pet-actions crisp" id="ball" style="display:none;" alt="ball">
                <img src="static/heart.png" class="pet-actions crisp" id="heart" style="display:none;" alt="heart"> -->
                <div class="play-render" id="<?php echo $pet["name"]; ?>">

                </div>

                <div>
                    <button id="feed" class="btn feedbutton">Feed
                        <?php echo $pet["name"]; ?>
                    </Button>

                    <script>
                        document.getElementById('feed').addEventListener("click", () => {
                            $('#food').show();
                            setTimeout(function () { $('#food').hide(); }, 750);
                        });
                    </script>
                    
                    <button id="play" class="btn ballbutton">Play with
                        <?php echo $pet["name"]; ?>
                    </Button>
                    <script>
                        document.getElementById('play').addEventListener("click", () => {
                            $('#ball').show();
                            setTimeout(function () { $('#ball').hide(); }, 750);

                        });
                    </script>
                    <!-- <form class="w-auto" style="width:auto; display:inline-block;" method="post" action="?command=addpet&name=<?php echo $pet["name"];
                    echo "&email=";
                    echo $email; ?>"> -->
                    <button id="pet_btn" href="#" class="btn petbutton">Pet
                        <?php echo $pet["name"]; ?>
                    </Button>
                    <script>

                        $(document).ready(function (data) {
                            $("#pet_btn").on("click", function () {
                                $('#heart').show();
                                setTimeout(function () { $('#heart').hide(); }, 750);

                                var comm = "?command=addpet&name=<?php echo $pet["name"];
                                echo "&email=";
                                echo $email; ?>";
                                $.get(comm, {}, function (data) {
                                    // alert("Data Loaded: " + data);
                                    console.log(data);
                                    
                                    // alert(data);
                                    $("#message").text(data);

                                })

                            }
                            )
                        });
                    </script>

                    <!-- </form> -->
                </div>
                <script>
                    var ajax = new XMLHttpRequest();
                    var comm = "?command=data&name=<?php echo $pet["name"];
                    echo "&email=";
                    echo $email; ?>";
                    ajax.open("GET", comm, true);
                    ajax.responseType = "json"
                    ajax.send(null);
                    ajax.addEventListener("load", function () {
                        if (this.status == 200) {
                            json = this.response;
                            render(document.getElementById("<?php echo $pet["name"] ?>"), JSON.parse(json["json"]));
                            for (const i of ["food", "ball", "heart"]) {
                                var im = document.createElement("img");
                                im.src = "static/" + i + ".png";
                                im.className = "pet-actions crisp";
                                im.id = i;
                                im.style.display = "none";
                                alt = i + "picture";
                                document.getElementById("<?php echo $pet["name"]?>").appendChild(im);
                            }

                            console.log(json);
                        }
                    });

                </script>

                <?php
                if (isset($_SESSION["email"]) && $_SESSION["email"] == $email) {
                    ?>
                    <!-- Button trigger modal -->
                    <div class="md-auto">
                        <button type="button" class="btn freebutton" data-bs-toggle="modal" data-bs-target="#confirm">
                            Free
                            <?php echo $pet["name"]; ?>
                        </button>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="confirm" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Free
                                        <?php echo $pet["name"]; ?>?
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Are you sure? This action cannot be undone...!
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <form id="free" method="post" action=<?php echo "?command=release&";
                                    echo "email=";
                                    echo $_SESSION["email"];
                                    echo "&name=";
                                    echo urlencode($pet["name"]); ?>>
                                        <button href="#" class="btn btn-danger">Yes, free
                                            <?php echo $pet["name"]; ?>
                                        </Button>
                                        <input type="hidden" name="email" value=<?php echo $_SESSION["email"]; ?>>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>




                    <?php
                }
                ?>
            </div>


        </div>
    </div>
    <script src="scripts/pet.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <?php
    include("footer.php");
    ?>
</body>


</html>