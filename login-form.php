<!-- 
    Author - Drew Jenkins  Created Mar 28,22
    Form to process the user's login and begin their session.
	This page READS from the users table.
-->

<?php
	include_once ('includes/create-home-header.php');
	include_once ('includes/create-hotbar.php');
	include_once ('includes/create-footer.php');
	include_once ('includes/start-session.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <title>Login | Sharron Books</title>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="css/main.css">
</head>
<script src=""></script>
<body>
	<?php
        /* Hotbar at the top of each page that will display a searchbar and login info */
        create_hotbar();
    ?>
	
	<div class="linedUp">
		<?php
			/* Header bar at the top of the each page containing a series of links and the logo */
			create_home_header();
		?>
	
		<div class="content">
			<form method="POST" action="includes/login.php">
				<label for="username"><b>Username</b></label>
				<input type="text" name="username" required>
				<br><br>
				<label for="password"><b>Password</b></label>
				<input type="password" name="password" required>
				<br>
				<input type="checkbox" id="cookies" name="cookies" value="true">
  				<label for="cookies"> Enable Cookies</label><br>
				<br>
				<button type="submit">Login</button>
			</form>

			<p> 
				Don't have an account? <a href="create-user-account-form.php" class="link"> Create one. </a>
			</p>
			<br> <br> <br> <br> <br>
			<a href="login-admin-form.php"> Admin Login </a>
		</div> 
	</div>
	
	<?php
		/* Footer at the end of the page that displays some basic website info */
		create_footer();
	?>
	
</body>
</html> 