<!-- 
    Author - Joseph Zheng  Created Apr 18,22
    Allows the user to unreserve any of the reserved books that 
    are associated with their account, and will make the books
    available to be reserved again by anyone.
    This page READS and DELETES from the database.
-->

<?php
	include_once ('includes/create-home-header.php');
	include_once ('includes/create-hotbar.php');
	include_once ('includes/create-footer.php');
	include_once ('includes/start-session.php');
	require_once ('includes/config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    	<title>Unreserve | Sharron Books</title>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="css/main.css">
	<title>Unreserve</title>
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

		
		<div class="content">
		<?php

			// check if user is logged in
			if(!isset($_SESSION['login_user'])) 
			{
				echo  "<h2> You must be logged in to view this page </h2>";
				echo "<p> Log in <a href=\"login-form.php\"> here </a>.";
				exit;
			} // if

			// check if book exists
			$reservationCheckQuery = $db->Query(sprintf("SELECT * FROM bookreserve WHERE BookID='%s' HAVING UserID='%s'", $_POST['BookID'], $_SESSION['login_user']));
			if ($reservationCheckQuery->num_rows < 1)
			{
				// Reservation has already been made
				echo "<h3> Reservation removal unsuccessful </h3>";
				echo "<p> The book you selected ( ID number: " . $_POST['BookID'] . " ) has not been reserved by you. </p>";
				echo "<p> Click <a href='profile.php'> here </a> to view your active reservations. </p>";
			}
			else
			{
				// Reservation can be completed
				$Query = $db->Query(sprintf("DELETE FROM bookreserve WHERE (BookId,UserID)=('%s','%s');", $_POST['BookID'], $_SESSION['login_user']));
				echo "<h3> Reservation removal successful </h3>";
				echo "<p> The book you selected ( ID number: " . $_POST['BookID'] . " ) has  been removed from your reservations. </p>";
				echo "<p> Click <a href='profile.php'> here </a> to view your active reservations. </p>";
			}

		?>
		</div>
		</div> <!-- Lined up -->
	<?php
		/* Footer at the end of the page that displays some basic website info */
		create_footer();
	?>
	
</body>
</html>
