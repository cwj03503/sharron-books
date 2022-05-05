<!-- 
    Author - Joseph Zheng  Created Apr 18,22
    Allows the user to reserve any of the unreserved books that 
    are available within the catalog into their account, and will 
    make the books unavailable to be reserved by anyone.
    This page READS and DELETES from the database.
-->

<?php
	include_once ('includes/create-home-header.php');
	include_once ('includes/create-hotbar.php');
	include_once ('includes/create-footer.php');
	require_once ('includes/config.php');
	include_once ('includes/start-session.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    	<title>Reserve | Sharron Books</title>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="css/main.css">
	<title>Reserve</title>
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
			<!-- Start of PHP -->
			<?php
				
				if(!isset($_SESSION['login_user'])) 
				{
					echo  "<h2> You must be logged in to view this page </h2>";
					echo "<p> Log in <a href=\"login-form.php\"> here </a>.";
					exit;
				} // if

				//Check to see if the user entered something.
				if($_SERVER['REQUEST_METHOD'] != 'POST' || empty($_POST)) 
				{
					echo "<h3> An error has occured </h3>";
					echo "<p> Please return to the previous page to try again </p>" ;
					exit;
				}
				
				//Check if book exists.
				$Query = $db->Query(sprintf("SELECT * 
												FROM books 
												WHERE BookID = '%s'", 
												$db->escape_string($_POST['bookID'])
											)
									);
						
				if ($Query->num_rows < 1) 
				{
					echo "<h3> The book you selected is no longer available. <\h3>";
					exit;
				}
									
				if($Query) 
				{
					// Check if the user has already made this reservation:
					$reservationCheckQuery = $db->Query(sprintf("SELECT * FROM bookreserve WHERE BookID='%s' HAVING UserID='%s'", $_POST['bookID'], $_SESSION['login_user']));
					if ($reservationCheckQuery->num_rows > 0)
					{
						// Reservation has already been made
						echo "<h3> Book Reservation Unsuccessful </h3>";
						echo "<p> The book you selected ( ID number: " . $_POST['bookID'] . " ) has already been reserved by you. </p>";
						echo "<p> Click <a href='profile.php'> here </a> to view your active reservations. </p>";
					}
					else
					{
						// Make the reservation.
						$Query = $db->Query(sprintf("SELECT BookID 
									From books 
									WHERE BookID = '%s'",
									$db->escape_string($_POST['bookID'])
									));
						$Result = $Query->fetch_assoc();
						$Query = $db->Query(sprintf("INSERT INTO bookreserve(BookID, UserID, ReservedDate) 
													VALUES ('%s', '%s', '%s')", $Result['BookID'], $_SESSION['login_user'],date('Y-m-d H:i:s')
													));

						// Display success message
						echo "<h3> The book you selected ( ID number: " . $_POST['bookID'] . " ) was successfully reserved. </h3>";
						echo "<p> Click <a href='profile.php'> here </a> to view your active reservations  </p>";
					}
					
				}
			?>
		</div>
	</div>

<?php
/* Footer at the end of the page that displays some basic website info */
create_footer();
?>
	
</body>
</html>
