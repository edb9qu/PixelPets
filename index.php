<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

spl_autoload_register(function ($classname) {
    // echo getcwd();
    include "pixelpets/$classname.php";
    

});
        

$pp = new PixelPetsController($_GET);

$pp->run();
