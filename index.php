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
			
			<!-- A large search box that allows the user to search for books -->
			<!-- Will link to some catalog page -->
			<div class = "search box">
				<form action="search_page.php">
					<label for "catalog-search">
						Search our collection:
					</label>
					<input type="search" id="catalog-search" placeholder="Search...">
					<input type="submit" value="Search">
				</form>
			</div>
			
			<br>
			
			<!-- Upcoming Events -->
			<div class="upcoming-events">
				<div class = "event">
					<time> 3/29</time>
					<br>
					<time datetime="2022-03-29 14:00"> March 29th at 2:00pm</time>
				</div>
			</div>
			
			<br>
			
			<!-- Staff Picks -->
			<div>
				<h2> Staff Picks </h2>
				<?php
					require_once("includes/config.php");
					$sql = "SELECT * FROM books WHERE bookID in (1231623814238,1230000000000,1237582659510)";
					create_books_display_short($db,$sql);
				?>
			</div>
			
		</div>
	</div>
	
    <?php
		/* Footer at the end of the page that displays some basic website info */
		create_footer();
	?>
	
</body>
</html> 