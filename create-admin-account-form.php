<!-- 
    Author - Drew Jenkins  Created Mar 28,22
    Simple form for passing a desired credentials for an account to be made.
	This page CREATES an entry in the administrators database.
-->
<?php
	include_once ('includes/create-home-header.php');
	include_once ('includes/create-hotbar.php');
	include_once ('includes/create-footer.php');
	include_once ('includes/start-session.php');

   /* if ( !isset($_SESSION['login_admin']) || $_SESSION['login_admin'] != true)
    {
        header('Location:login-admin-form.php');
        exit;
    } // if */
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <title>Create Admin Account | Sharron Books</title>
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
			<h3 class = "heading" style="text-decoration: underline;"> Create Account </h3>
			<!-- This form will send username and password to create-user-account.php -->
			<form method="POST" action="includes/create-admin-account.php">
				<!-- First Name -->
				<label for "firstname"><b>Enter your first name:</b></label>
				<input type="text" name="firstname" required minlength="1" maxlength="256"
				pattern="^[a-zA-Z0-9'-]+$" title="field does not allow special characters other than: ' and -">
				<br><br>
				<!-- Last name-->
				<label for "lastname"><b>Enter your last name:</b></label>
				<input type="text" name="lastname" required minlength="1" maxlength="256"
				pattern="^[a-zA-Z0-9'-]+$" title="field does not allow special characters other than: ' and -">
				<br><br>
				<!-- email -->
				<label for "email"><b>Please enter a valid email address for this account:</b></label>
				<input type="text" name="email" required minlength="3" maxlength="256"
				pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Must be a valid email address">
				<br><br>
				<!-- username -->
				<label for "username"><b>Please enter a username</b></label>
				<input type="text" name="username" required minlength="3" maxlength="24"
				pattern="^[a-z0-9._%=-]+$" title="Username must be between 3 and 24 characters">
				<br><br>
				<!-- password -->
				<label for "password"><b>Please enter a valid password</b></label>
				<input type="password" name="password" required
				pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}"
				title="Password must be at least 6 characters long, contain at least one number, and contain both upper-case and lower-case letters.">
				<br><br>
				<!-- confirm password -->
				<label for "confirm-password"><b>Confirm password</b></label>
				<input type="Password" name="confirm-password" required
				pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}">
				<br><br>
				<button type="submit">Create Admin Account</button>
			</form>
		</div>
	</div>
	
	<?php
		/* Footer at the end of the page that displays some basic website info */
		create_footer();
	?>
	
</body>
</html> 