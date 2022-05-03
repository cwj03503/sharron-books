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
        /* Header bar at the top of the each page containing a series of links and the logo */
        create_home_header();
    ?>
	
	<div class="content">
        <h3 class = "heading" style="text-decoration: underline;"> Profile </h3>
            <div>
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
			</div>
        </form>
	</div>
	
	<br>

	<?php
		/* Footer at the end of the page that displays some basic website info */
		create_footer();
	?>
	
</body>
</html> 