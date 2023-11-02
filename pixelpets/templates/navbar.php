<nav class="navbarnavbar-light bg-light flex-wrap p-0">
            
           
    <ul class="navbar-nav flex-row container-fluid flex-nowrap">
        <li class="p-1 nav-item d-flex flex-column justify-content-center align-self-start">
            <img class= "icon align-self-center" src="static/account.png" alt ="home picture">
            <form action="?command=home" method="post">
                <button class="nav-link text-center"  type="submit">Home</button>
            </form>
        </li>
        <li class="p-1 nav-item d-flex flex-column align-items-start">
            <div>
                <img class = "icon align-self-center" src="static/account.png" alt="help picture">
                <form action="?command=help" method="post">
                    <button class="nav-link text-center"  type="submit">Help</button>
                </form>

            </div>
        </li>
        <li class="p-1 nav-item d-flex flex-column align-items-start w-100">
            <div>
                <img class = "icon align-self-center" src="static/account.png" alt="about picture">
                
                <form action="?command=about" method="post">
                    <button class="nav-link text-center"  type="submit">About</button>
                </form>
            </div>
        </li>
        
        
        
        <li class="nav-item username ">
            <div class="align-self-center d-flex align-middle ">
                <?php
                    if(!isset($_SESSION["username"])) {
                        ?>
                            <form method="post" action="?command=loginpage">
                                <button class="nav-link d-inline text-info m-auto " type="submit">Sign In</button>
                            </form>
                            <img  class= "d-inline" style="height:30px;" src="static/account.png" alt="account picture">
                        <?php
                        
                    }
                    else {
                        
                        ?>
                        <li class="p-1 nav-item d-flex flex-column align-items-start w-100">
                            <div>
                                <img class = "icon align-self-center" src="static/account.png" alt="about picture">
                                
                                <form action="?command=play" method="post">
                                    <button class="nav-link text-center"  type="submit">My Pets</button>
                                </form>
                            </div>
                        </li>
                        <span class = "align-baseline"> <?php echo $_SESSION["username"]; ?> </span>
                        <form method="post" action="?command=logout">
                            <button class="nav-link d-inline text-info " type="submit">Log out</button>
                        </form>
                        <?php
                    }

                ?>
                
            
            </div>
        </li>
    </ul>
    
        
</nav>