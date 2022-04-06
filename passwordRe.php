<!-- 
    Author - Drew Jenkins  Created Mar 28,22
    Basic page to reset the users password
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
        if ($_SERVER["REQUEST_METHOD"] == "POST") // form submission
        {          
            $userIn = $_POST['username'];
            $passOld = $_POST['password'];
            $passNew = $_POST['new-password'];
            
            if( $passNew == $passOld ) //verify user input
                die( 'Passwords cannot match.');
                
            $sql = $db->prepare("SELECT * FROM users WHERE username = ?"); // find user match
            $sql->bind_param( "s", $userIn ); //binding to prevent sql injection
            $sql->execute();
            if ( $result = $sql->get_result() ) // check if matched
            {      
                $ver = $result->fetch_assoc();
                $check = $ver['password']; // store the relevant password
                if ( password_verify( $passOld, $check ) ) // verify their match
                {
                    $sql = $db->prepare("UPDATE users SET password =? WHERE username = ?");
                    $hash = password_hash($passNew, PASSWORD_DEFAULT); //hash with php
                    $sql->bind_param( "ss", $hash, $userIn ); //binding to prevent sql injection
                    $sql->execute();
                    header("location:Login.php"); // head to login
                }
                else {
                    $error = "Your Old password does not match our records";
                }
            } // if
            else 
            {
         		 $error = "Your Login Name is invalid";
            } // else
        } // if
        ?>
        
        <h3 class = "heading"> Password Reset </h3>
        <form method = "POST">
            <label ><b>Please enter a username</b></label>
            <input type="text" name="username" required>
            
            <label ><b>Please enter old password</b></label>
            <input type="password" name="password" required>
            
            <label ><b>Please enter new password</b></label>
            <input type="password" name="new-password" required>
            
            <button type="submit">Reset Password</button>
        </form>
	</div>
	
	<div class="main-footer">
		<p> Sharron Books </p>
		<p> 2022 </p>
		<p> Carson, Kylie, Joseph, Drew </p>
	</div>
	
</body>
</html> 