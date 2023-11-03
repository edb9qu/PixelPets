
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
            <h4>We're still working on what your pet will look like...but you can use the provided fields to write how you imagine your new friend! <br></h2>
        <div class="container-fluid d-flex justify-content-center mx-auto">
            
        
            <form method="post" action = "?command=create">
                <!-- change these to categories, provide buttons that are photos (of the traits) -->
                <input type="button" onclick="alert('Coming Soon')" value="Bodies">
                <input type="button" onclick="alert('Coming Soon')" value="Heads">
                <input type="button" onclick="alert('Coming Soon')" value="Ears">
                <input type="button" onclick="alert('Coming Soon')" value="Tail">
                
                <input type="text" name="name" placeholder ="name" required>

                <input type="text" name="body" placeholder ="body" required>
                <input type="text" name="head" placeholder ="head" required>
                <input type="text" name="ears" placeholder ="ears" required>
                <input type="text" name="tail" placeholder ="tail" required>

                
                <button class="btn btn-primary" type="submit">Finish and Save Pet</button>
                
                <!--- in the future, when we have pet images, these can be written to JSON as atributites-->
            </form>
            
        </div>
    </body>
    <?php
        include("footer.php");
    ?>
</html>