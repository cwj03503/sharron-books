<!--
	Author - Carson Jones
	Displays some information about the website
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
				Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Tortor vitae purus faucibus ornare suspendisse sed nisi. Scelerisque fermentum dui faucibus in ornare quam viverra. Lorem ipsum dolor sit amet consectetur adipiscing elit ut. Nulla malesuada pellentesque elit eget gravida. Quis ipsum suspendisse ultrices gravida. Diam ut venenatis tellus in metus vulputate. Magna etiam tempor orci eu lobortis elementum nibh. <br>
				<br>
				Erat nam at lectus urna. In eu mi bibendum neque. Ipsum faucibus vitae aliquet nec ullamcorper. Aliquet nec ullamcorper sit amet risus nullam. Sapien et ligula ullamcorper malesuada proin libero nunc. Mattis ullamcorper velit sed ullamcorper morbi. Blandit cursus risus at ultrices mi tempus imperdiet. Tempor nec feugiat nisl pretium. Et ultrices neque ornare aenean euismod elementum nisi quis. Mauris rhoncus aenean vel elit. Aliquet sagittis id consectetur purus ut faucibus pulvinar elementum integer. Condimentum mattis pellentesque id nibh tortor id.
			</p>
		</div>
	</div>
	
	<?php
		/* Footer at the end of the page that displays some basic website info */
		create_footer();
	?>
	
</body>
</html> 