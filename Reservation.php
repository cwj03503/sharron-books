<!-- 
    Author - Joseph Zheng  Created Apr 18,22
    Allows the user to reserve any of the unreserved books that 
    are available within the catalog into their account, and will 
    make the books unavailable to be reserved by anyone.
    This is the method that uses the reserve feature and sends
    the result to the library's database.
    This page READS and DELETES from the database.
-->

<?php
	include_once ('includes/create-home-header.php');
	include_once ('includes/create-hotbar.php');
	include_once ('includes/create-footer.php');
	include_once ('includes/start-session.php');
	require_once ('includes/cookie-login.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    	<title>About | Sharron Books</title>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="css/main.css">
	<title>Reservation</title>
</head>
	
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
	
	<div class="backgroundfixReserve">
		<div class="container">  
			<div class="main">
				<h1>Reserve a Book</h1>
				<p class="btn-primary">The place where to reserve the books that you want.</p>
			</div>
		</div>
	</div>
	
	<br>
	
	<div class="Form2">
		<form action="Reserve.php" method="POST">
		  ID of Book:<br>
	 	 <input type="text" name="BookID" required><br>
	  
	 	 <input type="submit" value="Submit">
		</form>
	</div>
	
	<br><br>
					
	<?php
		/* Footer at the end of the page that displays some basic website info */
		create_footer();
	?>
	
</body>
</html>
