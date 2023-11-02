<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> 
        <link rel="stylesheet" type="text/css" href="styles/style.css">
        <meta name="author" content="Asher Saunders, Lain Bowman (we used the Visual Studio Code Live Share addon to work together)">
        
        <!--We may still need to add bootstrap? or is it at the bottom-->
        <title>Login</title>
    </head>
    <body>
        <?php include("navbar.php");
        
        if($errorMessage != "") {
            echo "<div class=\"alert alert-danger\" role=\"alert\">$errorMessage</div>";
        }
        ?>
        
        <div class="m-5 container-f justify-content-center flex-column window">
            <div class = "display"></div>
                <header class="h1">Account Log In</header>
                <header class="h2"></header>
                <form method="post" action="?command=login">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
                        <label for="floatingInput">Email address</label>
                    </div>
                    
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name = "pass">
                        <label for="floatingPassword">Password</label>
                        
                    </div>
                    
                    <button class="btn btn-primary" type="submit">Let's Play!</button>
                    <br>

                    
                </form>
                  <i>Don't have an account?</i>
                    <form method="post" action="?command=signuppage">
                        <button type="submit" class=" text-primary p-0" style="text-decoration: none ;">Sign Up</button>
                    </form>
                
              </div>
        <?php include("footer.php");?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    </body>
</html>
<!--NEEDS FOOTER-->