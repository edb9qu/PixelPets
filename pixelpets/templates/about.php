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
                <header class="h1">About PixelPets!</header>
                <header class="h2">The Digital World of Furry Friends Made Just for You!</header>
 
        <div class="m-5 container-f justify-content-center flex-column window">    
            <h2>What is Pixel Pets? </h2>
            <h4> PixelPets is an online game where players can design and adopt their very own digital pets: Pixel Pets! Players can create TONS of unique pets, and the user can visit them in their virtual yard: Pixel Pets love playing outside!
                PixelPets is also a social community! You can see others pets, become Pixel Pals, and have fun together! Pixel Pets love playing together, and meeting new friends!
                When or if a player decide's of of their Pixel Pets is ready, they can send the Pixel Pet onto an adventure into the World Wide Web! Your Pixel Pet will miss you, but the magical digital creatures love exploring and having adventures in the vast universe of the internet!
            </h4>
            <h2>Behind the Pixels </h2>
            <h4> PixelPets was started in 2023 by developers Asher Saunders and Lain Bowman. The two founded the site while in their college course "Programming Languages for Web Applications" at the University of Virginia.
                They were inspired by games of their childhoods like Club Penguine, Webkinz, DigiPets, Moshi Monsters, and Ninten-Dogs+Cats. Asher and Lain had been best friends and roommates for years, and when they were deciding on what project
                to collaborate on, Lain's Tomagatchi- a tiny virtual pet keychain toy- had been a point of despute between the five other roommates, as it consistenly beeped for care throughout the day and night in the living room. 
                Asher and Lain wanted to bring the magic and fun of old virtual pet games into their project, as well as add modern and internet age features to create their own unique site! </h4>
            
        </div>

          <?php include("footer.php");?>
    
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>