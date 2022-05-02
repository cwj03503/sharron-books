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
         
                    header("location:../profile.php"); // redirect only temporary
                } // if
      		} // if
        } // if
        else 
        {
            $error = "Your Login Name or Password is invalid";
            header( 'location:../login-form.php');
        } // else
	} // if

		if(isset($_SESSION['Username']))
		{
			$username = $_SESSION['Username'];
			echo "<br><br>";
			echo "<div class='Form'><h1>Hello " . $Username . "<br></h1></div>";
			echo "<div class='Form'><h2>You have successfully logged in. <br></h2></div>";
			echo "<div class='Form'><h2>What would you like to do? <br></h2></div>";
			echo "<div class='Form'><h3><a href='logout.php'>Not you? Logout.</a> <br></h3></div>";
			echo "<br><br>";
			
			$Query = $Connection->Query(sprintf("SELECT books.BookID, books.Title 
											FROM BookReserve 
											INNER JOIN books 
											ON BookReserve.BookID=books.BookID 
											WHERE BookReserve.Username = '%s'", $_SESSION['Username']));
			
			if ($Query->num_rows == 0) 
			{
				echo "<div class='Form2'><h2>No books have been reserved.</h2></div>"; 
			} // if
			
			
			//If books match with what the user wants, then display the results.
			while($Row = mysqli_fetch_array($Query, MYSQL_BOTH))
			{
				echo "<table border=\"2\"align=\"center\"width=\"600\">";
				echo("</td><td>");
				echo "<div class=\"Form2\">";
				echo '<br /> BookID:       ' .$Row['BookID'];  
				echo '<br /> Book Title: ' .$Row['Title'];  
				echo '<br /> <br />';
				echo("</tr>\n");
				echo "</div>";
				echo "<br>";
			} // while
			echo "</table>\n";
			
			echo "</select><br><br>";
			
			echo "<div class=\"Form2\">";
			echo "<form action=\"Unreserve.php\" method=\"POST\">";
			echo "The Book's ID:<br>";
			echo "<input type=\"text\" name=\"BookID\" placeholder=\"434-343-23\" required ><br>";
			echo "<input type=\"submit\" value=\"Submit\">";
			echo "</form>";
			echo "</div>";
		} // if
?>
