<!-- 
    Author - Drew Jenkins  Created May 2,22
    Re-establish sessions from the cookie
-->
<?php
    require_once ('includes/config.php');
    if(!isset($_SESSION['login-user']) && isset($_COOKIE['user']))
    {
        $temp = $_COOKIE['user'];
        $sql = "SELECT * FROM users WHERE UserID = .$temp";
        $result = mysqli_query($db, $sql);   
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck == 1)
        {
            $row = mysqli_fetch_assoc(result);

            // extract user information
            $username = $row['Username']; 
            $firstname = $row['FirstName']; 
            $lastname = $row['LastName'];
            $email = $row['Email']; 
            
            // set session varibles to extracted database information
            $_SESSION['login_username'] = $username; 
            $_SESSION['login_user'] = $temp; 
            $_SESSION['login_firstname'] = $firstname;
            $_SESSION['login_lastname'] = $lastname;
            $_SESSION['login_admin'] = "false"; // user-status
            $_SESSION['login_email'] = $email;
        } // if
    } // if
?>