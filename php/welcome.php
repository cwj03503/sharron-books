<!-- 
    Author - Drew Jenkins  Created Mar 28,22
    Skeleton page to show the login sucessa and lock out users who are not logged in.
-->
<?php
    session_start(); // connect to session
    require('Config.php');
    if( !isset($_SESSION['login_user']) && !array_key_exists('cookie_name', $_COOKIE) ) // check if session and cookie are unpopulated
    {
        header( 'location:../html/login.html'); // if not go to login
    }
    else if ( !array_key_exists('cookie_name', $_COOKIE) && isset($_SESSION['login_user']) ) // session enabled but cookie not
    {
        $cookie_name = "user";
        $cookie_value = $_SESSION['login_user'];
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // cookie initialization
    }
?>
<html>
   
   <head>
      <title>Welcome </title>
   </head>
   
   <body>
      <h1>Welcome,  <?php 
          if( isset($_SESSION['login_user']) )
          {
            echo $_SESSION['login_firstname'] . " " . $_SESSION['login_lastname']; 
            echo "<br>";
            echo "Admin?: " . $_SESSION['login_admin']; 
          } // if
          ?></h1> 
      <h2><a href = "logout.php">Sign Out</a></h2>
   </body>
   
</html>