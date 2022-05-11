<!-- 
    Author - Drew Jenkins  Created Mar 28,22
    Showing the current user their homepage with account details and registered books
-->
<?php
	include_once ('includes/create-home-header.php');
	include_once ('includes/create-hotbar.php');
	include_once ('includes/start-session.php');
    require_once ('includes/config.php');
    include_once ('includes/create-footer.php');
	include_once ('includes/create-books-display.php');
	require_once ('includes/cookie-login.php');


    if ( !isset($_SESSION['login_user']) && $_SESSION['login_admin'] == false )
    {
        header('Location:login-form.php');
        exit;
    } // if
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <title>Profile | Sharron Books</title>
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
        	/* Hotbar at the top of each page that will display a searchbar and login info */
        	create_home_header();
    	?>

		<div class="content">
			<h3 class = "heading" style="text-decoration: underline;"> Profile </h3>
			<div class="centered-box">
				<p>Your account details are below:</p>
				<table>
					<tr>
						<td>Username:</td>
						<td><?=$_SESSION['login_username']?></td>
					</tr>
					<tr>
						<td>User ID:</td>
						<td><?=$_SESSION['login_user']?></td>
					</tr>
					<tr>
						<td>Email:</td>
						<td><?=$_SESSION['login_email']?></td>
					</tr>
					<tr>
						<td>Name:</td>
						<td><?=$_SESSION['login_firstname']?> <?=$_SESSION['login_lastname']?></td>
					</tr>
				</table>
			</div> <!-- Centered Box -->
			<br>
			<div class="centered-box">
				<?php
					if(isset($_SESSION['login_user']))
					{
						echo "<p>Your reserved books are below:</p>";
						echo "<br><br>";
						
						$Query = $db->Query(sprintf("SELECT books.BookID, books.Title 
														FROM bookreserve 
														INNER JOIN books 
														ON bookreserve.BookID=books.BookID 
														WHERE bookreserve.UserID = '%s'", $_SESSION['login_user']));
						
						if ($Query->num_rows == 0) 
						{
							echo "<h2> You don't have any reserved books.</h2>"; 
						} // if
						
						
						//If books match with what the user wants, then display the results.
						while($Row = mysqli_fetch_array($Query))
						{
							echo "<table border=\"2\"align=\"center\"width=\"600\">";
							echo("</td><td>");
							echo "<div class=\"Form2\">";
							echo '<br /> Book Title: ' .$Row['Title'];
							echo '<br /> BookID:       ' .$Row['BookID'];    
							echo '<br /> <br />';
							echo("</tr>\n");
							echo "</div>";
							echo "<br>";
						} // while
						echo "</table>\n";
						
						echo "</select><br><br>";
						
						echo "<div class=\"Form2\">";
						echo "<form action=\"Unreserve.php\" method=\"POST\">";
						echo "To unreserve a book, please enter the reserved book's ID:<br>";
						echo "<input type=\"text\" name=\"BookID\" required ><br>";
						echo "<input type=\"submit\" value=\"Submit\">";
						echo "</form>";
						echo "</div>";
					} // if
				?>
			</div> <!-- Centered box --> 

			<p> 
				<a href="password-reset.php" class="link"> Click here to reset password. </a>
			</p>
			<br>

			<p> 
			<a href="includes/logout.php" class="link"> Click here to log out </a>
			</p>

		</div> <!-- Content-->
	</div> <!-- LinedUp -->

	<?php
		/* Footer at the end of the page that displays some basic website info */
		create_footer();
	?>
	
</body>
</html> 
