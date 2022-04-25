<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <title>Hours | Sharron Books</title>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="css">
</head>
<script src=""></script>
<body>
	<div class = "hotbar"> <!-- Navigation bar that will be at the top of the screen on all pages -->
		<p> Some Library <p>
		<a href="login"> Login/Register </a>
		<input type="text" placeholder="Search...">
	</div>
    
    <!-- Header bar at the top of the home page containing a series of links and the logo -->
	<div class="home-header"> 
		<img src="logo" alt="Library Logo">
		<header>
            <nav>
                <a href="catalog.php" class="header-link"> Catalog </a>
                <a href="../html/about.html" class="header-link"> About </a>
                <a href="hours.php" class="header-link"> Hours </a>
                <a href="../html/contact.html" class="header-link"> Contact </a>
            </nav>
		</header>
	</div>

	
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
                <td>Wedneday</td>
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
        
		<p> 
            Library may be closed on holidays. Please call us at <b>(706) 542-3251</b> for our holiday hours.
        </p>
	</div>
	
	<div class="main-footer">
		<p> Sharron Books </p>
		<p> 2022 </p>
		<p> Carson, Kylie, Joseph, Drew </p>
	</div>
	
</body>
</html> 