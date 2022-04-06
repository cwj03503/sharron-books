<!-- 
    Author - Drew Jenkins  Created Mar 28,22
    Form to process the user's login and begin their session
-->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <title>About | Sharron Books</title>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="css">
</head>
<script src=""></script>
<body>
	
	<div class="content">
        <?php
	require("Config.php");
        session_start();

	if ( $_SERVER["REQUEST_METHOD"] == "POST" )
	{
		$userIn = $_POST['username'];
		$passIn = $_POST['password']; 
              
        $sql = $db->prepare("SELECT * FROM users WHERE username = ?");
        $sql->bind_param( "s", $userIn ); //binding to prevent sql injection
        $sql->execute();
        if ( $result = $sql->get_result() )
        {
      		$count = $result->num_rows;
            
      		// If result matched $myusername and $mypassword, table row must be 1 row
      		if($count == 1) { 
                $ver = $result->fetch_assoc();
                $check = $ver['password']; // pull password from db
                if ( password_verify( $passIn, $check ) ) // check for correctness
                {
         		 $_SESSION['login_user'] = $userIn; // new session
                    
         
         		 header("location: welocme.php"); // redirect
                } // if
      		} // if
        } // if
        else 
        {
            $error = "Your Login Name or Password is invalid";
        } // else
	} // if
        ?>
        <form method="POST">
            <label><b>Username</b></label>
            <input type="text" name="username" required>
            
            <label><b>Password</b></label>
            <input type="password" name="password" required>
            
            <button type="submit">Login</button>
            
            <a href="passwordRe.php">Reset Password?</a>
        </form>
	</div>
    
    
	
	<div class="main-footer">
		<p> Sharron Books </p>
		<p> 2022 </p>
		<p> Carson, Kylie, Joseph, Drew </p>
	</div>
	
</body>
</html> 