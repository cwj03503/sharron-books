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
    // setcookie("user", "", time() - 3600 );
    header("location: ../html/Index.html"); // go to index page
?>