
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
    <body class="grassy">
        <?php
            
            include("navbar.php");
        ?>
        <div class="container-fluid grassy">
                
            <?php 
                $res = $this->db->query("select * from pets where owneremail = $1;", $email);
                $pet= $res[$id];
                
            ?>
        
                    <div class="card p-2 m-4" style="width: 18rem;">
                        <h5 class="card-title"><?php echo $pet["name"];?></h5>
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                    
                        </div>
                        <p class="card-text"><?php echo $pet["json"];?></p>
                        
                        <?php 
                            if(isset($_SESSION["email"]) && $_SESSION["email"] == $email) {
                        ?>
                            <form method="post" action=<?php echo "?command=release&"; echo "email=";echo $_SESSION["email"];echo "&name=";echo urlencode($pet["name"]);?> >
                                <button href="#" class="btn btn-danger">Free <?php echo urlencode($pet["name"]);?></Button>
                                <input type="hidden" name = "email" value=<?php echo $_SESSION["email"];?>>
                                
                            </form>
                            <form method="get" action="" >
                                <input type="hidden" name = "command" value = "data">
                                <input type="hidden" name = "name" value= <?php echo urlencode($pet["name"]);?>>
                                <button href="#" class="btn btn-danger">Get data for <?php echo urlencode($pet["name"]);?></Button>
                                <input type="hidden" name = "email" value=<?php echo $_SESSION["email"];?>>
                                
                            </form>
                        <?php
                            }
                        ?>
                    </div>
                    
                <?php
                        
                
            ?>
        </div>
        
    </body>
    <?php
        include("footer.php");
    ?>
</html>