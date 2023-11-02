<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <!--https://cs4640.cs.virginia.edu/aas9x/sprint2/PixelPets/-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> 
        <link rel="stylesheet" type="text/css" href="styles/style.css">
        <title>PixelPets</title>
        <meta name="author" content="Asher Saunders, Lain Bowman (we used the Visual Studio Code Live Share addon to work together)">
        <!--We may still need to add bootstrap? or is it at the bottom-->
    </head>
    <body>
        
        <?php include("navbar.php");
        echo $errorMessage;
        ?>
        
        <div class="m-5 container-f justify-content-center flex-column window">
            <div class = "display d-flex"></div>
                <header class="h1 text-center">PixelPets!</header>
                <header class="h2 text-center">The Digital World of Furry Friends Made Just for You!</header>
                <div class="text-center">
                  <form method ="post" action="?command=loginchoice">
                    <button type="submit" class="btn btn-info btn-warning" role="button"><h2 class="playbutton">PLAY!</h2></a>
                  </form>
                </div>
            </div>    
        <div class="m-5 container-f justify-content-center flex-column window">    
            <div class="row">
                <div class="col-sm-6">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Check out what's NEW!</h5>
                      <p class="card-text">There are so many new ways to customize your PixelPet, as well as the new "PixelFriends List"!</p>
                      <a href="#" class="btn btn-primary">See New Features</a>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Hey Parents!</h5>
                      <p class="card-text">Come see the Friend-Features your child has accesss to, and what PixelPets is all about!</p>
                      <a href="#" class="btn btn-primary">PixelParents Info</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          <?php include("footer.php");?>
    
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>
