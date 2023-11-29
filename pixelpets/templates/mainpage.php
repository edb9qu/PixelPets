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
            <div class = "display d-flex justify-content-center ">
                <img src=static/logo.png alt="PixelPets!" class="mx-auto align-self-center crisp"
                height = "320"
                width = "300">
        </div></div>
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
                      <h5 class="card-title">Need Some Help?</h5>
                      <p class="card-text">Never fear- team Pixel is here! We'll find a way to get you where you need to go and playing with your PixelPets in no time</p>
                      <form action="?command=help" method="post">
                        <button class="btn btn-primary"type="submit">Question Corner</button>
                    </form>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Hey Parents!</h5>
                      <p class="card-text">Come what PixelPets is all about and if it is right for your child! We're here to have fun, but most importantly, we're here to have SAFE fun!</p>
                      <form action="?command=about" method="post">
                        <button class="btn btn-primary"type="submit">Info on PixelPets</button>
                    </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          <?php include("footer.php");?>
    
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>
