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
    Fix issue where a substring search with spaces causes php crash
    Fix image display (currently, a book cover will only display properly
    if it's stored locally.)
-->
<?php
    require_once ('config.php');
    require_once ('sanitize.php');
    require_once ('delete-book.php');
    include_once ('create-books-display.php');
    include_once ('create-hotbar.php');
?>
<?php
    if (session_status() == PHP_SESSION_NONE) // start session if not started already
        {
            session_start();
        }
?>
<!DOCTYPE html>
<html>
<head>
    <title>
        Catalog | Sharron Books
    </title>
</head>
<body>
    
    <!-- Navigation bar that will be at the top of the screen on all pages -->
	<div class = "hotbar">
		<p> Sharron Books <p>
		<a href="../html/login.html"> Login/Register </a>
        <form action="catalog.php" method="POST">
            <input type="text" name="search" placeholder="Search...">
            <button type="submit">Search</button>
        </form>
	</div>
    
    <!-- Header bar at the top of the home page containing a series of links and the logo -->
	<?php create_hotbar(); ?>

    <!-- Detailed searchbar just for this page -->
    <form class = "big-searchbar"
    action = "<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
    method="post">   

        <!-- Genre Selection -->
        <label for="genres"> Genres: </label>
        <select name="genres\" class="genres-dropdown">"
        <option autofocus selected value="All">All</option>"
        <?php
            /* The options in this selection menu are read from the "Genre" column of 
            * the library database */
            $sql = "SELECT * FROM books;";
            $result = mysqli_query($db, $sql);
            $resultCheck = mysqli_num_rows($result); 
            if ($resultCheck > 0) // check if there are results from query
            {
                while ($genre = mysqli_fetch_column($result,3))
                {
                    echo "<option value=\"" . $genre . "\">" . $genre . "</option>";
                }
            }
        ?>
        </select>

        <!-- Title Search Bar -->
        <label for=\"search\"> Search by Title: </label>
        <input type=\"text\" name=\"search\" placeholder=\"Moby Dick\">

        <!-- Sort By Selection -->
        <label for="sort-by"> Sort by: </label>
            <select name="sort-by" class="sort-by-dropdown">
            <option autofocus selected value=\"Title\">Title</option>
            <option value="Author"> Author </option>
            <option value="Title"> Title </option>
            <option value="Genre"> Genre </option>
            <option value="Year Published"> Year Published </option>
        </select>
        <button type="submit">Search</button>
    </form>

    <?php
        # Process Search Query
    
        # sets defaults for search variables
        $sql = "SELECT * FROM books";
        $search = $sqlGenreCondition = $sqlSubstringCondition = $sqlSortBy = ""; 
        $genreSearch = "All";
        $sortBy = "Title";
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            # Handle deletion
            if (isset($_POST["delete"]))
            {
                if (delete_book($_POST("BookID")) == True)
                {
                    echo "<p class=\"alert\" Entry successfully removed from database. <\p> <br>";
                }
                else
                {
                    echo "<p class=\"alert error\" Failed to remove entry from database. <\p> <br>";
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

            # set Sorting condition
                if ($sortBy == "Year Published") # manually correct option so it matched DB column name
                    $sortBy = "YearPubbed"; 
                $sqlSortBy = " ORDER BY " . $sortBy . " ASC";
        }
    
        #construct SQL query based on responses
    
        $sql = $sql . $sqlSubstringCondition . $sqlGenreCondition . $sqlSortBy . ";";
    
        # Populate Table based on query
        create_books_display($db,$sql);
    ?>
    
</body>
</html>