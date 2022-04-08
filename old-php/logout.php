<!-- 
    Author - Drew Jenkins  Created Mar 28,22
    Closes out current session of logged in user
-->
<?php
    require( 'Config.php' );
   session_start(); // open session
   
    session_unset(); // close
    setcookie("user", "", time() - 3600 );
    header("location: Login.php"); // go to login again
?>