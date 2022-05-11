<!-- 
    Author - Drew Jenkins  Created Mar 28,22
    Basic page to reset the users password
-->

<?php
	include_once ('includes/create-home-header.php');
	include_once ('includes/create-footer.php');
	include_once ('includes/start-session.php');
    require_once ('includes/config.php');

    if ( !isset($_SESSION['login_user']) && $_SESSION['login_admin'] == false )
    {
        header('Location:login-form.php');
        exit;
    } // if
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <title>password Reset | Sharron Books</title>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="css/main.css">
</head>
<script src=""></script>
<body>
	
	<div class="linedUp">
        
        <?php
        /* Hotbar at the top of each page that will display a searchbar and login info */
        create_home_header();

        if ($_SERVER["REQUEST_METHOD"] == "POST") // form submission
        {          
            $userIn = $_SESSION['login_username'];
            $passOld = $_POST['password'];
            $passNew = $_POST['new-password'];
            
            if( $passNew == $passOld ) //verify user input
                die( 'Passwords cannot match.');
                
            $sql = $db->prepare("SELECT * FROM users WHERE Username = ?"); // find user match
            $sql->bind_param( "s", $userIn ); //binding to prevent sql injection
            $sql->execute();
            if ( $result = $sql->get_result() ) // check if matched
            {      
                $ver = $result->fetch_assoc();
                $check = $ver['Password']; // store the relevant password
                if ( password_verify( $passOld, $check ) ) // verify their match
                {
                    $sql = $db->prepare("UPDATE users SET Password =? WHERE Username = ?");
                    $hash = password_hash($passNew, PASSWORD_DEFAULT); //hash with php
                    $sql->bind_param( "ss", $hash, $userIn ); //binding to prevent sql injection
                    $sql->execute();
                    header("location:profile.php"); // head to login
                }
                else {
                    $error = "Your Old password does not match our records";
                    echo "<p> .$error </p>";
                }
            } // if
            else 
            {
         		 $error = "Your Login Name is invalid";
                echo "<p> .$error </p>";
            } // else
        } // if
        ?>
        
        <div class="content">

            <h3 class = "heading" style="text-decoration: underline;"> Password Reset </h3>
            <div class="centered-box">
                <form method = "POST">
                    <label ><b>Please enter your old password</b></label>
                    <input type="password" name="password" required>
                
                    <label ><b>Please enter your new password</b></label>
                    <input type="password" name="new-password" required>
                
                    <button type="submit">Reset Password</button>
                </form>
            </div>
        </div>
	</div>
	
    <?php
		/* Footer at the end of the page that displays some basic website info */
		create_footer();
	?>
	
</body>
</html> 
