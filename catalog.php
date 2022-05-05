<!-- 
    Author - Carson Jones  Created Apr 13,22
    Displays the contents of the books table, and handles search form.
    Primarily this page is for users to view the catalog, but it may also
    be used by admins to view who has checked out each book and delete
    entries.
    This page READS and DELETES from the database.
-->

<!--
    TODO
    Fix issue where form info disappears on search
    Fix image display (currently, a book cover will only display properly
    if it's stored locally.)
-->
<?php
    require_once ('includes/config.php');
    require_once ('includes/sanitize.php');
    require_once ('includes/delete-book.php');
    include_once ('includes/create-books-display.php');
    include_once ('includes/create-hotbar.php');
    include_once ('includes/create-home-header.php');
	include_once ('includes/create-footer.php');
    require_once ('includes/start-session.php');
	require_once ('includes/cookie-login.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>
        Catalog | Sharron Books
    </title>
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

		<!-- Detailed searchbar just for this page -->
		<div class="content">
			<form class = "big-searchbar"
			action = "<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
			method="post">   

				<!-- Genre Selection -->
				<label for="genres"> Genres: </label>
				<select name="genres" class="genres-dropdown">"
				<option autofocus selected value="All">All</option>"
				<?php
					/* The options in this selection menu are read from the "Genre" column of 
					* the library database */
					$sql = "SELECT DISTINCT Genre FROM books;";
					$result = mysqli_query($db, $sql);
					$resultCheck = mysqli_num_rows($result); 
					if ($resultCheck > 0) // check if there are results from query
					{
						while ($row = mysqli_fetch_assoc($result))
						{
							echo $row;
							echo "<option value=\"" . $row['Genre'] . "\">" . $row['Genre'] . "</option>";
						}
					}
				?>
				</select>

				<!-- This would be a good place on the form to add filtering by favorites -->

				<!-- Title Search Bar -->
				<label for="search"> Search by Title: </label>
				<input type="text" name="search" placeholder="Moby Dick">

				<!-- Sort By Selection -->
				<label for="sort-by"> Sort by: </label>
					<select name="sort-by" class="sort-by-dropdown">
					<option autofocus selected value="Title">Title</option>
					<option value="Author"> Author </option>
					<option value="Title"> Title </option>
					<option value="Genre"> Genre </option>
					<option value="Year Published"> Year Published </option>
				</select>
				<button type="submit">Search</button>
			</form>
			
			<hr style="border: none; border-top: 2px dotted black; color: #F2F2F2; background-color: #F2F2F2; height: 4px; width: 50%;">

			<?php
				# Process Search Query
			
				# sets defaults for search variables
				$sql = "SELECT * FROM books";
				$search = $sqlGenreCondition = $sqlSubstringCondition = $sqlSortBy = ""; 
				$genreSearch = "All";
				$sortBy = "Author";

				if ($_SERVER["REQUEST_METHOD"] == "POST")
				{
					# Handle deletion
					if (isset($_POST["delete"]) && isset($_POST["BookID"]))
					{
						if (delete_book($db, $_POST["BookID"]) == True)
						{
							echo "<h3 class=\"alert\"> Entry (ID: " . $_POST["BookID"] . ") successfully removed from database. </h3> <br>";
						}
						else
						{
							echo "<h3 class=\"alert\"> Failed to remove entry from database. </h3> <br>";
						}
					}

					#check if values are posted
					if (isset($_POST["genres"]))
						$genreSearch = $_POST["genres"];
					if (isset($_POST["search"]))
						$search = sanitize_input($_POST["search"]);
					if (isset($_POST["sort-by"]))
						$sortBy = sanitize_input($_POST["sort-by"]);
		
					# something has been entered in the search form text box 
					if ($search != "")
					{
						$sqlSubstringCondition = " WHERE Title LIKE '%" . $search . "%'";
					}
					
					# some genre has been selected in the search form
					if ($genreSearch != "All")
					{
						$sqlGenreCondition = " HAVING Genre='" . $genreSearch . "'";
					}
					
				}

				# set Sorting condition
				if ($sortBy == "Year Published") # manually correct option so it matched DB column name
					$sortBy = "YearPubbed"; 
				$sqlSortBy = " ORDER BY " . $sortBy . " ASC";
			
				#construct SQL query based on responses
			
				$sql = $sql . $sqlSubstringCondition . $sqlGenreCondition . $sqlSortBy . ";";
				
				# Populate Table based on query
				create_books_display($db,$sql);
			?>
		</div>
	</div>
	
	<?php
		/* Footer at the end of the page that displays some basic website info */
		create_footer();
	?>
    
</body>
</html>