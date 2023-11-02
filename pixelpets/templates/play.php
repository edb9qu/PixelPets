
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> 
        <link rel="stylesheet" type="text/css" href="styles/style.css">
        <meta name="author" content="Asher Saunders, Lain Bowman (we used the Visual Studio Code Live Share addon to work together)">
        
        <!--We may still need to add bootstrap? or is it at the bottom-->
        <title>Play</title>
    </head>
    <body>
        <?php
            
            include("navbar.php");
        ?>
        <div class="container-fluid grassy">
            <h1>My Pixel Pets!</h1>
                <form class = "col-md-auto" method="post" action = "?command=petcreation">
                    <button type="submit" class = "btn btn-primary">New Pet</button>
                    
                </form>
            <div class ="container-fluid justify-content-center g-3  row w-100">
                
                <?php 
                    $res = $this->db->query("select * from pets where owneremail = $1;", $_SESSION["email"]);
                    
                    foreach($res as $key => $pet) {
                        ?>
                            <div class="card p-2 m-4" style="width: 18rem;">
                                <h5 class="card-title"><?php echo $pet["name"];?></h5>
                                <img src="..." class="card-img-top" alt="...">
                                <div class="card-body">
                            
                                </div>
                                <p class="card-text"><?php echo $pet["json"];?></p>
                                <form method="post" action=<?php echo "?command=visit&"; echo "email=";echo $_SESSION["email"];echo "&id=";echo $key;?> >
                                    <button href="#" class="btn btn-primary">Visit <?php echo $pet["name"]?></Button>
                                </form>
                            </div>
                            
                        <?php
                            
                    }
                ?>
            </div>
        </div>
        </div>
    </body>
    <?php
        include("footer.php");
    ?>
</html>