<!-- 
    Author - Drew Jenkins  Created Apr 21, 22
    Admin PHP Login similar to the regular login but specifically for the use of admin privileges
-->
<?php
    require("config.php");
    if (session_status() == PHP_SESSION_NONE) // start session if not started already
    {
        session_start();
    }

	if ( $_SERVER["REQUEST_METHOD"] == "POST" )
	{
		$userIn = $_POST['username'];
		$passIn = $_POST['password']; 
              
        $sql = $db->prepare("SELECT * FROM administrators WHERE Username = ?"); // statement to check username exists
        $sql->bind_param( "s", $userIn ); //binding to prevent sql injection
        $sql->execute();
        if ( $result = $sql->get_result() )
        {
      		$count = $result->num_rows;
            
      		// If result matched $myusername the result  must have 1 row
      		if($count == 1) 
            { 
                $ver = $result->fetch_assoc();
                $check = $ver['Password']; // pull password from db
                if ( password_verify( $passIn, $check ) ) // check for correctness
                {
                    $aID = $ver['UserID']; // grab uID from result
                    $username = $ver['Username']; 
                    $firstname = $ver['FirstName']; 
                    $lastname = $ver['LastName'];
                    $email = $ver['Email']; 
                    
                    // set session varibles to extracted database information
                    $_SESSION['login_username'] = $username; 
                    $_SESSION['login_user'] = $aID; 
                    $_SESSION['login_firstname'] = $firstname;
                    $_SESSION['login_lastname'] = $lastname;
                    $_SESSION['login_email'] = $email;
    
                    $_SESSION['login_user'] = $aID; // set adminID for session
                    $_SESSION['login_admin'] = "true"; // set admin status
         
                    header("location: ../profile-admin.php"); // redirect only temporary
                } // if
                else
                {
                    $error = "Your Login Name or Password is invalid";
                    header( 'location:../login-admin-form.php'); 
                }
      		} // if
            else
            {
                $error = "Your Login Name or Password is invalid";
                header( 'location:../login-admin-form.php');
            }
        } // if
        else 
        {
            $error = "Your Login Name or Password is invalid";
            header( 'location:../login-admin-form.php');
        } // else
	} // if
?>