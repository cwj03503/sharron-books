<?php
function sanitize_input($data) 
{
    /*
     * Author - Carson Jones
     * This utility function makes a given string safe for use in PHP
     * by removing unneccesary whitespace, slashes, and escaping special
     * characters.
     * This function has no interaction with the database
     */
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>