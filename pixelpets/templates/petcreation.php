<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <meta name="author"
        content="Asher Saunders, Lain Bowman (we used the Visual Studio Code Live Share addon to work together)">

    <title>Pet Creation</title>
</head>

<body>
    <?php

    include("navbar.php");
    if ($errorMessage != "") {
        echo "<div class=\"alert alert-danger\" role=\"alert\">$errorMessage</div>";
    }
    ?>
    <h2>Make a new pet! <br></h2>
    <div class="row">
        <div class="col">
            <div id="render" class="creation-render"></div>
        </div>
        <div class=" col container-fluid d-flex justify-content-center mx-auto">


            <form id="char" method="post" action="?command=create">
                <!-- change these to categories, provide buttons that are photos (of the traits) -->
                <!-- <input type="button" onclick="alert('Coming Soon')" value="Bodies">
                    <input type="button" onclick="alert('Coming Soon')" value="Heads">
                    <input type="button" onclick="alert('Coming Soon')" value="Ears">
                    <input type="button" onclick="alert('Coming Soon')" value="Tail"> -->
                <h5> New Pet's Name: </h5>
                <input type="text" name="name" placeholder="name" required>
                <div class="col">
                    <h5> Fur Type:: </h5>
                    <select class="form-select form-control" required aria-label="Default select example" name="body"
                        value="fluffy" required="required">
                        <option value="fluffy">Fluffy</option>
                        <option value="smooth">Short</option>
                    </select>
                    <h5> Body Fur Color: </h5>
                    <input type="range" class="form-range" value="0" name="bodycolor" min="0" max="360" required>
                </div>
                <div class="col">
                    <h5> Head Shape:</h5>
                    <select class="form-select form-control" required aria-label="Default select example" name="head"
                        value="fluffy" required="required">
                        <option value="fluffy">Fluffy</option>
                        <option value="smooth">Round</option>
                    </select>
                    <h5> Head Fur Color: </h5>
                    <input type="range" class="form-range" value="0" name="headcolor" min="0" max="360" required>
                </div>
                <div class="col">
                    <h5> Left Ear: </h5>
                    <select class="form-select form-control" required aria-label="Default select example" name="leftear"
                        value="cat" required="required">
                        <option value="cat">Pointed</option>
                        <option value="bear">Round</option>
                        <option value="dog">Floppy</option>
                    </select>
                    <h5> Left Ear Color: </h5>
                    <input type="range" class="form-range" value="0" name="leftearcolor" min="0" max="360" required>
                </div>
                <div class="col">
                    <select class="form-select form-control" required aria-label="Default select example" name="rightear" value="cat" required="required">
                    <h5> Right Ear: </h5>
                        
                        <option value="cat">Pointed</option>
                        <option value="bear">Round</option>
                        <option value="dog">Floppy</option>
                    </select>
                    <h5> Right Ear Color: </h5>
                    <input type="range" class="form-range" value="0" name="rightearcolor" min="0" max="360" required>
                </div>
                <div class="col">
                    <h5> Eyes: </h5>
                    <select class="form-select form-control" required aria-label="Default select example" name="eyes"
                        value="plain" required="required">
                        <option value="plain">Normal Pet Eyes</option>
                        <option value="tall">Tall Pet Eyes</option>
                        <option value="shades">Cool</option>
                        <option value="happy">Happy</option>
                        <option value="glisten">Glistening</option>
                        <option value="bored">Bored</option>
                        <option value="mandela">Big</option>
                        <option value="glasses">Glasses</option>
                        <option value="squint">Silly</option>
                        <option value="wink">Winky</option>
                        <option value="star">Star Sunglasses</option>
                        <option value="heart">Heart Sunglasses</option>
                    </select>
                </div>
                <div class="col">
                    <h5> Mouth: </h5>
                    <select class="form-select form-control" required aria-label="Default select example" name="mouth"
                        value="neutral" required="required">
                        <option value="neutral">Pet Mouth</option>
                        <option value="cat">Smile</option>
                        <option value="dog">Wide Smile</option>
                        <option value="open">Happy</option>
                        <option value="wide">Wide Happy</option>
                        <option value="tongue">Tongue Out</option>
                        <option value="carrot">Curious</option>
                        <option value="mrow">Mrow</option>
                        
                    </select>
                </div>
                <div class="col">
                    <select class="form-select form-control" required aria-label="Default select example" name="tail"
                        value="cat" required="required">
                        <option value="cat">Long</option>
                        <option value="longdog">Fluffy</option>
                        <option value="short">Ball</option>
                        <option value="shortdog">Short</option>
                        
                    </select>
                    <h5> Tail Color: </h5>
                    <input type="range" class="form-range" value="0" name="tailcolor" min="0" max="360" required>
                </div>


                <button class="btn btn-primary" type="submit">Finish and Save Pet!</button>

                <!--- in the future, when we have pet images, these can be written to JSON as atributites-->
            </form>

        </div>
    </div>

    <script src="scripts/pet.js"></script>
    <script>
        var form = document.getElementById("char");
        var rend = document.getElementById("render");
        var pet = { "body": "fluffy", "head": "fluffy", "leftear": "cat", "rightear": "cat", "tail": "cat", "mouth": "neutral", "eyes": "plain" };
        render(rend, pet);
        pet["bodycolor"] = "";
        form.addEventListener("input", function (i) {
            // console.log(i.target.name,i.target.value);
            pet[i.target.name] = i.target.value;
            console.log(pet);
            render(rend, pet);
        });


    </script>
</body>
<?php
include("footer.php");
?>

</html>