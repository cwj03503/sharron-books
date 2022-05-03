<!-- 
    Author - Drew Jenkins  Created Mar 28,22
    Closes out current session of logged in user
-->
<?php
    require( 'config.php' );
    if (session_status() == PHP_SESSION_NONE) // start session if not started already
    {
        session_start();
    }
   
    session_destroy(); // close
    if(isset($_COOKIE['user']))
    {
        setcookie("user", "", time() - (30*24*3600) );
    } // if
    header("location: ../catalog.php"); // go to index page
?>