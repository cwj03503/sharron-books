<!--
	Author - Carson Jones
	Displays some information about the website.
	This page doesn't interact with the database at all.
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
			
			<h3 style="text-decoration: underline;"> About Sharron Books</h3>
			<p>
				Sharron Books is a fictional library created for Dr. Mario's Web Programming class by Carson Jones, Kylie Sengpiel, Andrew Jenkins, and Joseph Zheng. Carson and Drew did much of the PHP and HTML, Kylie handled the visuals of the website including most of the CSS, and Joseph handled reservation and Javascript. It's main feature is a dynamic database of books and users which interact with eachother through the website's interface. The catalog page displays a list of search results from the database, which can be filtered and modified by the catalog form. Registered users will be able to select any of the books on this page and view more information on them or reserve them.
				<br>
				This website features a multi-level login system which allows for administrators and ordinary users to have access to different features. As an admin, you can add and delete from the books table, and view who has each book reserved. Ordinary users are able to reserve books, unlike admins.
				<br>
				
			</p>
		</div>
	</div>
	
	<?php
		/* Footer at the end of the page that displays some basic website info */
		create_footer();
	?>
	
</body>
</html> 