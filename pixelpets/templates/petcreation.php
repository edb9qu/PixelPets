
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> 
        <link rel="stylesheet" type="text/css" href="styles/style.css">
        <meta name="author" content="Asher Saunders, Lain Bowman (we used the Visual Studio Code Live Share addon to work together)">
        
        <title>Pet Creation</title>
    </head>
    <body>
        <?php
            
            include("navbar.php");
            if($errorMessage != "") {
                echo "<div class=\"alert alert-danger\" role=\"alert\">$errorMessage</div>";
            }
        ?>
        <h2>Make a new pet! <br></h2>
        <div class="row">
            <div class="col">
            <div id="render" class="creation-render"></div>
            </div>
            <div class=" col container-fluid d-flex justify-content-center mx-auto">
                
            
                <form id="char" method="post" action = "?command=create">
                    <!-- change these to categories, provide buttons that are photos (of the traits) -->
                    <!-- <input type="button" onclick="alert('Coming Soon')" value="Bodies">
                    <input type="button" onclick="alert('Coming Soon')" value="Heads">
                    <input type="button" onclick="alert('Coming Soon')" value="Ears">
                    <input type="button" onclick="alert('Coming Soon')" value="Tail"> -->
                    
                    <input type="text" name="name" placeholder ="name" required>
                    <div class="col-2">  
                    <input type="text" name="body" placeholder ="body" required>
                    
                    <input type="range" class ="form-range" value = "0" name = "bodycolor" min="0" max="360" required>
                    </div>
                    <div class="col-2"> 
                    <input type="text" name="head" placeholder ="head" required>
                    
                    <input type="range" class ="form-range" value = "0" name = "headcolor" min="0" max="360" required>
                    </div>
                    <div class="col-2"> 
                    <input type="text" name="leftear" placeholder ="leftear" required>
                    
                    <input type="range" class ="form-range" value = "0" name = "leftearcolor" min="0" max="360" required>
                    </div>
                    <div class="col-2"> 
                    <input type="text" name="rightear" placeholder ="rightear" required>
                    
                    <input type="range" class ="form-range" value = "0" name = "rightearcolor" min="0" max="360" required>
                    </div>
                    <div class="col-2"> 
                    <input type="text" name="tail" placeholder ="tail" required>
                    
                    <input type="range" class ="form-range" value = "0" name = "tailcolor" min="0" max="360" required>
                    </div>

                    
                    <button class="btn btn-primary" type="submit">Finish and Save Pet</button>
                    
                    <!--- in the future, when we have pet images, these can be written to JSON as atributites-->
                </form>
                
            </div>
        </div>
        
    <script src="scripts/pet.js"></script>
    <script> 
        var form = document.getElementById("char");
        var rend = document.getElementById("render");
        var pet = {"body":"fluffy","head":"fluffy","leftear":"dog","rightear":"dog","tail":"cat"};
        render(rend,pet);
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