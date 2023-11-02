<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> 
        <link rel="stylesheet" type="text/css" href="styles/style.css">
        
        <meta name="author" content="Asher Saunders, Lain Bowman (we used the Visual Studio Code Live Share addon to work together)">
        
        <!--We may still need to add bootstrap? or is it at the bottom-->
        <title>Signup</title>
    </head>
    <body>
        <?php include("navbar.php");
        ?>
        <div class="row">
                <div class="col-xs-12">
                    <?=$message?>
                    
                </div>
            </div>
        <div class="m-5 container-f justify-content-center flex-column window">
            <div class = "display"></div>
              <form method="post" action="?command=signup">
                <header class="h1">Create a new Account</header>
                <header class="h2"></header>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput1" placeholder="admin" name="username">
                    <label for="floatingInput1">Create a Username</label>
                  </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput2" placeholder="name@example.com" name="email">
                    <label for="floatingInput2">Email address</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingPassword1" placeholder="Password" name="pass">
                    <label for="floatingPassword1">Your Password</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingPassword2" placeholder="Password" name="pass2">
                    <label for="floatingPassword2">Retype Password</label>
                  </div>
                <div class="form-floating mb-3">
                  <select class="form-select" aria-label="Default select example" name="selection">
                    <option selected>Select</option>
                    <option value="1">I am over the age of 13</option>
                    <option value="2">I have an adult's permission to join PixelPet</option>
                    <option value="3">I am under 13 and do not have adult permission</option>
                  </select>
                  </div>
                  <button class="btn btn-primary"  type="submit">Create Account</button>
              </form>
                <br>
                <i>Already have an account?</i>
                <form method="post" action="?command=loginpage">
                    <button type="submit" style="text-decoration: none;">Log in!</button>
                </form>
                
              </div>
        
      
        <?php include("footer.php");?>
              
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>
    <!--needs footer?-->