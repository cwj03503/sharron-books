<!-- 
    Author - Drew Jenkins  Created Apr 21,22
    Form to process the admin's login and begin their session
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
    <title>Admin Login | Sharron Books</title>
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
			<h3 style="text-decoration: underline;">Admin Login</h3>
		
			<form method="POST" action="includes/login-admin.php">
				<label><b>Username</b></label>
				<input type="text" name="username" required>
					
					<label><b>Password</b></label>
					<input type="password" name="password" required>
					
					<button type="submit">Login</button>
				</form>
			</div> 
		</div>

		<?php
			/* Footer at the end of the page that displays some basic website info */
			create_footer();
		?>

	</div>
	
</body>
</html> 