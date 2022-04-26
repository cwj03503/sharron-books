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
    require_once ('config.php');
    require_once ('sanitize.php');
    require_once ('delete-book.php');
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
    
    <!-- 
        The following php exclusivesly READS from the books table in the library database.
        It does not create, update, or delete entries, only displays information about them.
    -->
    <?php
        # Generate Search bar with genres from database
    
        echo "<form class = \"big-searchbar\"";
        echo "action = \"";
        echo htmlspecialchars($_SERVER["PHP_SELF"]); // improves reload speed, avoids redirect
        echo "\" ";
        echo "method=\"post\">";   

        # Genre Selection
        echo "<label for=\"genres\"> Genres: </label>";
        echo "<select name=\"genres\" class=\"genres-dropdown\">";
        echo "<option autofocus selected value=\"All\">All</option>";
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
        echo "</select>";

        # Title Search Bar
        echo "<label for=\"search\"> Search by Title: </label>";
        echo "<input type=\"text\" name=\"search\" placeholder=\"Moby Dick\">";

        # Sort By Selection 
        echo "<label for=\"sort-by\"> Sort by: </label>";
        echo "<select name=\"sort-by\" class=\"sort-by-dropdown\">";
        echo "<option autofocus selected value=\"Title\">Title</option>";
        echo "<option value=\"Author\"> Author </option>";
        echo "<option value=\"Title\"> Title </option>";
        echo "<option value=\"Genre\"> Genre </option>";
        echo "<option value=\"Year Published\"> Year Published </option>";
        echo "</select>";

        echo "<button type=\"submit\">Search</button>";
        echo "</form>";

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
    
        $result = mysqli_query($db, $sql);
        # check for results
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0)
        {
            if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == "true")
            {
                $displayAdminColumns = "true";
            }
            else
            {
                $displayAdminColumns = "false";
            }
            echo "<table class=\"results-table\">";
            
            # update table headers manually
            echo "<th> Title </th>";
            echo "<th> Author </th>";
            echo "<th> Publisher </th>";
            echo "<th> Genre </th>";
            echo "<th> Year Published </th>";
            echo "<th> Description </th>";
            echo "<th> Availability </th>";
            echo "<th>  </th>";
            echo "<th> Book Cover </th>";
            if ($displayAdminColumns == "true")
            {
                echo "<th> Held by </th>";
                echo "<th> Delete </th>";
            }
            
            while ($row = mysqli_fetch_assoc($result))
            {
                # Each attribute of the $row array will be processed as a 
                # row in a table.
                echo "<tr>";
                
                #Book title
                echo "<td>";
                echo $row['Title'];
                echo "</td>";
                
                #Book author
                echo "<td>";
                echo $row['Author'];
                echo "</td>";
                
                #Book Publisher (Fix Issue for no publisher)
                echo "<td>";
                echo $row['Publisher'];
                echo "</td>";
                
                #Book Genre
                echo "<td>";
                echo $row['Genre'];
                echo "</td>";
                
                #Year of Publication
                echo "<td>";
                echo $row['YearPubbed'];
                echo "</td>";
                
                #Book desription
                echo "<td>";
                echo $row['Description'];
                echo "</td>";
                
                #Book availability
                echo "<td>";
                if ($row['CheckedOut'] == 0)
                {
                    echo "available";
                }
                else
                {
                    echo "unavailable";
                }
                
                #Buttons
                #Contains a hidden form that will send info to reserve.php
                echo "<td>";
                echo "<form action=\"reserve.php\" method=\"GET\">";
                echo "<input type=\"hidden\" name=\"bookID\" value=\"" . $row['BookID'] . "\">";
                echo "<input type=\"submit\" value=\"reserve\" name=\"reserve\">";
                echo "</form>";
                #Contains a hidden form that will send bookID to details.php
                echo "<form action=\"details.php\" method=\"GET\">";
                echo "<input type=\"hidden\" name=\"bookID\" value=\"" . $row['BookID'] . "\">";
                echo "<input type=\"submit\" value=\"view details\" name=\"details\">";
                echo "</form>";

                echo "</td>";
                    
                #Cover image
                echo "<td>";
                echo "<img ";
                echo "src=\"../images/covers/" . $row['ImageLocation'] . "\"";
                # If the image isn't found in images/covers, replace image with none.jpg
                echo "onerror=\"if (this.src != '../images/covers/none.jpg') this.src = '../images/covers/none.jpg';\" ";
                echo "alt=\"" . $row['ImageLocation'] . "\"";
                echo "width=\"100\"";
                echo "height=\"120\"";
                echo ">";
                echo "</td>";

                #Admin Only Columns
                if ($displayAdminColumns == "true")
                {
                    # Book Holder
                    echo "<td>";
                    if ($row['userID'] == "NULL")
                    {
                        # Nobody has this book checked out
                        echo "<p> None (Not checked out) </p>"; 
                    }
                    else
                    {
                        $users = mysqli_query($db, "SELECT * FROM users HAVING UserID=\"" . $row['userID'] . "\";");
                        $userRow = mysqli_fetch_assoc($result);
                        echo "<p> " . $userRow["FirstName"] . " " . $userRow["LastName"] . "</p>"; 
                    }

                    # Delete book button
                    echo "<td>";
                    echo "<form action=\"" . htmlspecialchars($_SERVER["PHP_SELF"]) . "\" method=\"POST\">";
                    echo "<input type=\"hidden\" name=\"bookID\" value=\"" . $row['BookID'] . "\">";
                    echo "<input type=\"submit\" value=\"delete\" name=\"delete\">";
                    echo "</form>";
                    echo "</td>";
                }
            }
            echo "</table>";
        }
        else
        {
            echo "<h3 class = \"alert error\"> No results found for this query. </h3>";
        }
    ?>
    
</body>
</html>