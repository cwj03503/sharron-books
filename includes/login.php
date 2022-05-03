<!-- 
    Author - Drew Jenkins  Created Apr 21, 22
    Split from the login form in html to better encapsulate the code.
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
              
        $sql = $db->prepare("SELECT * FROM users WHERE Username = ?"); // statement to check username exists
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
                    // extract user information
                    $uID = $ver['UserID']; 
                    $username = $ver['Username']; 
                    $firstname = $ver['FirstName']; 
                    $lastname = $ver['LastName'];
                    $email = $ver['Email']; 
                    
                    // set session varibles to extracted database information
                    $_SESSION['login_username'] = $username; 
                    $_SESSION['login_user'] = $uID; 
                    $_SESSION['login_firstname'] = $firstname;
                    $_SESSION['login_lastname'] = $lastname;
                    $_SESSION['login_admin'] = "false"; // user-status
                    $_SESSION['login_email'] = $email;
					echo "about to redirect: ";
                    if( isset($_POST['cookies']))
                    {
                        setcookie("user", $uID, time() + (30*24*3600) );
                    } // if 
                    header("location:../profile.php"); // redirect only temporary
                } // if
				else
				{
					$error = "Your Login Name or Password is invalid";
            		header( 'location:../login-form.php');
				} // else
      		} // if
			else
			{
				$error = "Your Login Name or Password is invalid";
            	header( 'location:../login-form.php');
			}
        } // if
        else 
        {
            $error = "Your Login Name or Password is invalid";
            header( 'location:../login-form.php');
        } // else
	} // if
?>