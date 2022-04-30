<!-- 
    Author - Drew Jenkins  Created Mar 28,22
    Split from the html for better encapsulation. Simple account creation with error checking.
-->
<?php
    require("config.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {           
        $userIn = $_POST['username'];
        $passIn = $_POST['password']; 
        $chkPass = $_POST['confirm-password'];
        $firstnameIn = $_POST['firstname'];
        $lastnameIn = $_POST['lastname'];
        $emailIn = $_POST['email'];
            
        if( $chkPass != $passIn ) //verify user input
            die( 'Password mismatch');
                
        $sql = $db->prepare("SELECT Username FROM users WHERE Username = ? OR Email = ?");
        $sql->bind_param( "ss", $userIn, $emailIn ); //binding to prevent sql injection
        $sql->execute();
        $result = $sql->get_result();
        $count = $result->num_rows;
        if ( $count != 0 ) // if count is not 0 there was a user with the name
        {                
            $error = "Username or Email is already in use.";
        } // if
        else // no discovered user safe to make
        {
            $sql = $db->prepare( "INSERT INTO users (Username, Password, Email, FirstName, Lastname) VALUES (?,?,?,?,?)" );
            $hash = password_hash( $passIn, PASSWORD_DEFAULT ); //hashing
            $sql->bind_param( "sssss", $userIn, $hash, $emailIn, $firstnameIn, $lastnameIn);
            $sql->execute();
            header("location:../login-form.php");
            } // else
        } // if
    ?>