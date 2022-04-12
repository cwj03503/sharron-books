<!-- 
    Author - Drew Jenkins  Created Mar 28,22
    Basic connection for the websites to connect or DIE
-->
<?php
    // variables for easy changes
    $servername = "localhost";
    $username = "root";
    $password = "";
    $conn = "library";

    $db = new mysqli($servername, $username, $password, $conn); // mysqli connection

    if ($db->connect_error) // lock out if database fails
    { 
        die("Connection failed: " . $db->connect_error);
    } // if
?>