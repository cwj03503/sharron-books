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
	include_once ('includes/start-session.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    	<title>About | Sharron Books</title>
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
	
	<div class="backgroundfixReserve">
		<div class="container">  
			<div class="main">
				<h1>Reserve a Book</h1>
				<p class="btn-primary">The place where to reserve the books that you want.</p>
			</div>
		</div>
	</div>
	
	<!-- Start of PHP -->
	<?php
	
		//Check to see if the user entered something.
		if($_SERVER['REQUEST_METHOD'] != 'POST' || empty($_POST)) 
		{
			echo "<br>";
			echo "<div class='Form2'><h2>You must enter a Book ID into the form.</h2></div>";
			echo "<br>";
			echo "<div class='Form'><h3><a href='Reservation.php'>Try again</a> <br></h3></div>";
			echo "<div class='Form'><h3><a href='includes/logout.php'>Want to log out?</a> <br></h3></div>";
			echo "<div class=\"clearfix\"></div>";
			echo "<div  class=\"footer\">";
			echo "<div class=\"container\">";
			echo "</div>";
			echo "</div>";
			exit;
		}
		
			
		//Check if session is good.
		session_start();
		

		if(!isset($_SESSION['Username'])) 
		{
			echo "<br>";
			echo "<div class='Form2'><h2>You're not logged in, please log in.</h2></div>";
			echo "<br>";
			echo "<div class='Form'><h3><a href='includes/login.php'>Log into your account</a> <br></h3></div>";
			echo "<div class=\"clearfix\"></div>";
			echo "<div  class=\"footer\">";
	        echo "<div class=\"container\">";
			echo "</div>";
			echo "</div>";
			exit;
		}

		
		require('includes/config.php');
		
		//Check if book exists.
		$Query = $Connection->Query(sprintf("SELECT * 
										FROM books 
										WHERE BookID = '%s'", 
										$Connection->escape_string($_POST['BookID'])
									 )
							 );
		
		//Check if book isn't reserved.
		$Query = $Connection->Query(sprintf("SELECT * 
										FROM books
										WHERE BookID = '%s'
										AND Reserved = 'N'",
										$Connection->escape_string($_POST['BookID'])
									 )
							 );
				
		if ($Query->num_rows == 0) 
		{
			echo "<br>";
			echo "<div class='Form2'><h2>The book is already reserved by a member, try another book.</h2></div>";
			echo "<div class='Form2'><h2>Or the Book ID you have entered didn't match.</h2></div>";
			echo "<br>";
			
			echo "<div class='Form'><h3><a href='Reservation.php'>Try again?</a> <br></h3></div>";
			echo "<div class='Form'><h3><a href='includes/logout.php'>Want to log out?</a> <br></h3></div>";
			
			echo "<div class=\"clearfix\"></div>";
			echo "<div  class=\"footer\">";
			echo "<div class=\"container\">";
			echo "</div>";
			echo "</div>";
			exit;
		}
		
		$Query = $Connection->Query(sprintf("UPDATE books 
										SET Reserved = 'Y' 
										WHERE BookID = '%s'",
										$Connection->escape_string($_POST['BookID'])
									 )
							 );
							 
		if($Query) 
		{
			echo "<br>";
			echo "<div class='Form2'><h2>The book you have selected was reserved successfully.</h2></div>";
			echo "<br><br>";
			
			echo "<div class='Form'><h3><a href='includes/login.php'>View your account</a> <br></h3></div>";
			echo "<div class='Form'><h3><a href='includes/logout.php'>Want to log out?</a> <br></h3></div>";
		} 
		
		//Record the reservation made.
		$Query = $Connection->Query(sprintf("SELECT BookID 
										From books 
										WHERE BookID = '%s'",
										$Connection->escape_string($_POST['BookID'])
									 )
							 );
							 
		$Result = $Query->fetch_assoc();
		
		//Record the reservation made.
		$Query = $Connection->Query(sprintf("INSERT INTO BookReserve(BookID, Username, ReservedDate) 
										VALUES ('%s', '%s', '%s')", $Result['BookID'], $_SESSION['Username'],date('Y-m-d H:i:s')
									 )
							 );
	?>
	
	<br><br>

    	<?php
		/* Footer at the end of the page that displays some basic website info */
		create_footer();
	?>
	
</body>
</html>