<?php
    /*
     * Author - Carson Jones
     * Displays the hours of the library.
	 * This page doesn't interact with the database at all.
     */
    require_once ('includes/start-session.php');
    include_once ('includes/create-hotbar.php');
    include_once ('includes/create-home-header.php');
	include_once ('includes/create-footer.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <title>Hours | Sharron Books</title>
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
			<hr>
				<div class="todays=hours">
					<?php
						#Displays the date and today's hours
						date_default_timezone_set('America/New_York');
						echo "<b>" . date("l, m/d/y") . "</b> <br>";
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
				</div>
			<hr>
			<h3> Regular Hours:</h3>
			<div class="centered-box">
				<table>
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
			
			<p> 
				Library may be closed on holidays. Please call us at <b>(706) 542-3251</b> for our holiday hours.
			</p>

			<br>
		</div>
	</div>
	
	<?php
		/* Footer at the end of the page that displays some basic website info */
		create_footer();
	?>
	
</body>
</html> 