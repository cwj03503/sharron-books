<!-- 
    Author - Drew Jenkins  Created Apr 21, 22
    Admin PHP Login similar to the regular login but specifically for the use of admin privileges
-->
<?php
    require("config.php");
    session_start();

	if ( $_SERVER["REQUEST_METHOD"] == "POST" )
	{
		$userIn = $_POST['username'];
		$passIn = $_POST['password']; 
              
        $sql = $db->prepare("SELECT * FROM Administrators WHERE Username = ?"); // statement to check username exists
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
                    $_SESSION['login_user'] = $aID; // set adminID for session
                    $_SESSION['user_type'] = "true"; // set admin status
         
                    header("location: welcome.php"); // redirect only temporary
                } // if
      		} // if
        } // if
        else 
        {
            $error = "Your Login Name or Password is invalid";
        } // else
	} // if
?>