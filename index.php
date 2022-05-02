<!-- 
    Author - Carson Jones  Created  Feb 15,22
    Homepage for Sharron Books.
    Reads from the database ONLY.
-->

<!--
    TODO
    Update forms for catalog.php
    Fix books display, events display
-->

<?php
    include_once ('includes/config.php');
    include_once ('includes/create-books-display.php');
    include_once ('includes/create-home-header.php');
    include_once ('includes/create-hotbar.php');
	include_once ('includes/create-footer.php');
    include_once ('includes/start-session.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <title>Home | Sharron Books</title>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/home.css">
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

		<!-- Contains the main content of the page -->
		<div class="content">
			
			<!-- Contains some text and a search bar centered on top of a large background image -->
			<div class="image-container">
				<img class="home-image" src="images/stock/hand-grabbing-book.jpg" width="60%">
				<!-- A large search box that allows the user to search for books -->
				<div class = "search-box centered">
				<h3 class="home-heading"> Welcome to Sharron Books </h3>
					<form action="catalog.php" method="POST">
						<input type="text" class="big-searchbar" name="search" placeholder="Search our catalog...">
        				<button type="submit" class="big-searchbar-button">Search</button>
					</form>
				</div>
			</div>
			
			<br>
			
			<div class="info-blurb" >
				<p>
					Sharron Books is a fictional library created for Dr. Mario's Web Programming class by Carson Jones, Kylie Sengpiel, Andrew Jenkins, and Joseph Zheng. It's main feature is a dynamic database of books and users which interact with eachother through the website's interface. To begin browsing, use the search bar above, or click on the "catalog" link to the left. As a registered user, you may reserve up to two books for checkout, create a list of favorite books for easy reference, and view details on every book in our collection. <a href="create-user-account-form.php"> Click here to register now! </a>
				</p> 
			</div>

			<!-- contains a website introduction and a group of staff picks -->
			<div class="horizontal-block">
				<!-- A brief statement about what this website is -->
				<div class="vertical-block outlined" style="width: 40%; ">
					<h2> Hours </h2>
					<b> Today's Hours: 
						<?php
							#Displays the date and today's hours
							date_default_timezone_set('America/New_York');
							switch (date("l"))
							{
								case "Sunday": echo "CLOSED"; break;
								case "Monday": echo "7:30 AM - 9:00 PM"; break;
								case "Tuesday": echo "7:30 AM - 9:00 PM"; break;
								case "Wednesday": echo "7:30 AM - 9:00 PM"; break;
								case "Thursday": echo "7:30 AM - 9:00 PM"; break;
								case "Friday": echo "7:30 AM - 5:00 PM"; break;
								case "Saturday": echo "12:00 PM - 9:00 PM"; break;
							}
						?>
					<br>
					</b>
						<table class="home-table" >
							<tr>
								<td>Monday</td>
								<td>7:30 AM - 9:00 PM</td>
							</tr>
							<tr>
								<td>Tuesday</td>
								<td>7:30 AM - 9:00 PM</td>
							</tr>
							<tr>
								<td>Wednesday</td>
								<td>7:30 AM - 9:00 PM</td>
							</tr>
							<tr>
								<td>Thursday</td>
								<td>7:30 AM - 9:00 PM</td>
							</tr>
							<tr>
								<td>Friday</td>
								<td>7:30 AM - 5:00 PM</td>
							</tr>
							<tr>
								<td>Saturday</td>
								<td>12:00 PM - 9:00 PM</td>
							</tr>
							<tr>
								<td>Sunday</td>
								<td>CLOSED</td>
							</tr>
						</table>
				</div>
				
				<br>
				
				<!-- Staff Picks -->
				<div class="books-view" style="width:60%">
					<h2> Staff Picks </h2>
					<?php
						require_once("includes/config.php");
						$sql = "SELECT * FROM books WHERE bookID in (1231623814238,1230000000000,1237582659510)";
						create_books_display_short($db,$sql);
					?>
				</div>
			</div>
			
		</div>
	</div>
	
    <?php
		/* Footer at the end of the page that displays some basic website info */
		create_footer();
	?>
	
</body>
</html> 