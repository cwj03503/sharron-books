<!-- 
    Author - Drew Jenkins  Created Mar 28,22
    Showing the current user their homepage with account details and registered books
-->
<?php
	include_once ('includes/create-home-header.php');
	include_once ('includes/create-hotbar.php');
	include_once ('includes/start-session.php');

    if ( !isset($_SESSION['login_user']) && $_SESSION['login_admin'] == false )
    {
        header('Location:login-form.php');
        exit;
    } // if

    // find user for checking their reserved books
    $sql = $db->prepare("SELECT * FROM users WHERE Username = ?");
    $sql->bind_param( "s", $_SESSION['login_username'] ); //binding to prevent sql injection
    $sql->execute();
    $result = $sql->get_result();
    $count = $result->num_rows;
    if ( $count != 0 ) // if count is not 0 there was a user with the name
    {                
        $error = "does not exist";
    } // if
    else 
    {
        // find the title of the first book
        $book1 = $result -> fetch_column(6);
        $book2 = $result -> fetch_column(7);

        $sql = "SELECT Title FROM books WHERE BookId = $book1;";
        $result = mysqli_query($db, $sql);
        $count = mysqli_num_rows($result); 
        if ( $count != 0 ) // if count is not 0 there was a user with the name
        {                
            $title1 = "no registered book";
        } // if
        else 
        {
            $title1 = mysqli_fetch_column( $result, 0 );
        } // else
        
        // find the title of the second book
        $sql = "SELECT Title FROM books WHERE BookId = $book2;";
        $result = mysqli_query($db, $sql);
        $count = mysqli_num_rows($result); 
        if ( $count != 0 ) // if count is not 0 there was a user with the name
        {                
            $title2 = "no registered book";
        } // if
        else 
        {
            $title2 = mysqli_fetch_column( $result, 0 );
        } // else
    } // else
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

    <div class="content">
        <h3 class = "heading" style="text-decoration: underline;"> Reserved List </h3>
            <div>
				<p>Your reserved books are below:</p>
				<table>
					<tr>
						<td>Book 1:</td>
						<td><?=$title1?></td>
					</tr>
                    <tr>
						<td>Book 2:</td>
						<td><?=$title2?></td>
					</tr>
				</table>
			</div>
        </form>
	</div>
    
    <br>
	
	<div class="main-footer">
		<p> Sharron Books | 2022 </p>
		<p> Carson, Kylie, Joseph, Drew </p>
	</div>
	
</body>
</html> 