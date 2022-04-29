<!-- 
    Author - Drew Jenkins  Created Mar 28,22
    Form to process the user's login and begin their session
-->

<?php
	include_once ('includes/create-home-header.php');
	include_once ('includes/create-hotbar.php');
	include_once ('includes/start-session.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <title>About | Sharron Books</title>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="main.css">
</head>
<script src=""></script>
<body>
	<?php
        /* Hotbar at the top of each page that will display a searchbar and login info */
        create_hotbar();
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
            <br><br>
            <button type="submit">Login</button>
        </form>

		<p> 
			Don't have an account? <a href="create-user-account-form.php" class="link"> Create one. </a>
		</p>
	</div> 
	
	<br>
	
	<div class="main-footer">
		<p> Sharron Books | 2022 </p>
		<p> Carson, Kylie, Joseph, Drew </p>
	</div>
	
</body>
</html> 