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
                <header class="h1">Need Help?</header>
                <header class="h2">You've clicked to the right place!</header>
                <div class="m-5 container-f justify-content-center flex-column window">    
                <h4>FAQ</h4>
                    <div class="row">
                        <div class="col-sm-6">
                          <div class="card">
                            <div class="card-body">
                              <h5 class="card-title">Is PixelPets safe for kids?</h5>
                              <p class="card-text">Yes! We are a safe websites meant for people of all ages. Just get an adults permission and help to sign up so they can oversee!</p>
                              
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="card">
                            <div class="card-body">
                              <h5 class="card-title">Why won't the sign up page let me sign up?</h5>
                              <p class="card-text">You may be under 13. Try to ask an adult for permission or wait until you're 13.</p>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card">
                              <div class="card-body">
                                <h5 class="card-title">Why is PixelPets so fun?</h5>
                                <p class="card-text">Because Pixel Pets just wanna have fun!</p>
                              </div>
                            </div>
                          </div>
                      </div>
        <div class="m-5 container-f justify-content-center flex-column window">    
            <h2>Still need help?</h2>
            <h4> Give us a call and we will answer your question! <h4>
            <h5>Developer Lain Bowman: 540-247-9203 </h5>
            </h4>
        </div>
        </div>

          <?php include("footer.php");?>
    
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>