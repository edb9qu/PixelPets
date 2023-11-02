<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> 
        <link rel="stylesheet" type="text/css" href="styles/style.css">
        <meta name="author" content="Asher Saunders, Lain Bowman (we used the Visual Studio Code Live Share addon to work together)">
        
        <title>Login or Signup</title>
        <!--We may still need to add bootstrap? or is it at the bottom-->

    </head>
    <body>
        <?php include("navbar.php");
        ?>
        
        <div class="m-5 container-f justify-content-center flex-column window">
            <div class = "display"></div>
                <header class="h1">Your PixelPet Awaits!</header>
                <div class="row signinupcards">
                    <div class="card ms-3" style="width: 18rem;">
                        <div class="card-body">
                        <i class="card-title i">Been here before?</i>
                        <h2 class="card-subtitle mb-2">Welcome Back!</h2>
                        <p class="card-text">Your PixelPet will be so excited to see you!</p>
                        <form method="post" action="?command=loginpage">
                            <button type="submit" class="btn btn-primary">LOG IN</button>
                        </form>
                        </div>
                    </div>
                    
                    <div class="card ms-3" style="width: 18rem;">
                        <div class="card-body">
                        <i class="card-title i">New to PixelPets?</i>
                        <h2 class="card-subtitle mb-2">Come Adopt Your Very Own Pet!</h2>
                        <p class="card-text">Get started by signing up, and designing your new PixelPet!</p>
                        <form method="post" action="?command=signuppage">
                            <button type="submit" class="btn btn-danger">SIGN UP</button>
                        </form>
                       
                        
                        </div>
                    </div>
                </div>    
            <i>Remember to get a parent's permission to play PixelPet!</i>

        </div>

        <?php include("footer.php");?>
    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>