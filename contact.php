<?php
	include_once ('includes/create-home-header.php');
	include_once ('includes/create-hotbar.php');
	include_once ('includes/start-session.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <title>Contact | Sharron Books</title>
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
        <h3>
            Contact Information
        </h3>
		<p> 
            Call us anytime during regular hours at <b>(706) 542-3251</b>
        </p>
        <img src="images/building.jpg" alt="The front of the library"> 
        <p>
            123 Sesame St. <br>
            Athens GA, 30602
        </p>
	</div>
	
	<br>
	
	<div class="main-footer">
		<p> Sharron Books | 2022 </p>
		<p> Carson, Kylie, Joseph, Drew </p>
	</div>
	
</body>
</html> 