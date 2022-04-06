<!-- 
    Author - Drew Jenkins  Created Mar 28,22
    Allows users to create accounts for using with this test website
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
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {           
            $userIn = $_POST['username'];
            $passIn = $_POST['password']; 
            $chkPass = $_POST['confirm-password'];
            
            if( $chkPass != $passIn ) //verify user input
                die( 'Password mismatch');
                
            $sql = $db->prepare("SELECT username FROM users WHERE username = ?");
            $sql->bind_param( "s", $userIn ); //binding to prevent sql injection
            $sql->execute();
            $result = $sql->get_result();
            $count = $result->num_rows;
            if ( $count != 0 ) // if count is not 0 there was a user with the name
            {                
                $error = "Username is already in use.";
            }
            else
            {
                $sql = $db->prepare( "INSERT INTO users (username, password) VALUES (?,?)" );
                $hash = password_hash( $passIn, PASSWORD_DEFAULT ); //hashing
                $sql->bind_param( "ss", $userIn, $hash );
                $sql->execute();
                header("location:Login.php");
            } // else
        } // if
        ?>
        
        <h3 class = "heading"> Create Account </h3>
        <!-- This form will send username and password to CreateAccount.php -->
        <form method="Post">
            <label ><b>Please enter a username</b></label>
            <input type="text" name="username" required>
            
            <label ><b>Please enter a valid password</b></label>
            <input type="password" name="password" required>
            
            <label ><b>Confirm password</b></label>
            <input type="password" name="confirm-password" required>
            
            <button type="submit">Create Account</button>
        </form>
	</div>
	
	<div class="main-footer">
		<p> Sharron Books </p>
		<p> 2022 </p>
		<p> Carson, Kylie, Joseph, Drew </p>
	</div>
	
</body>
</html> 