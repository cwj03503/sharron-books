<!-- 
    Author - Carson Jones  Created Apr 13,22
    Displays the contents of the books table, and handles search form.
    Reads from Database ONLY. Does not Update, Delete, Create.
-->

<!--
    TODO
    Handle a search form
    Fix image display (currently, a book cover will only display properly
    if it's stored locally.)
-->
<?php
    include_once 'config.php';
    include_once 'sanitize.php';
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
		<a href="login.html"> Login/Register </a>
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
                <a href="../html/hours.html" class="header-link"> Hours </a>
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
        echo "<select name=\"genres\" class=\"genres-dropdown\">";
        echo "<option autofocus value=\"All\">All</option>";
    
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
        echo "<input type=\"text\" name=\"search\" placeholder=\"Search...\">";
        echo "<button type=\"submit\">Search</button>";
        echo "</form>";
    
        # Process Search Query
    
        # Some form data has been inputted
        $search = $genreSearch = ""; // sets defaults for search variables
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $search = sanitize_input($_POST["search"]);
            $genreSearch = $_POST["genres"];
        }
        else
        {
            # No form data has been inputted, process default request
            $sql = "SELECT * FROM books;";
        }

        # Populate Table based on query
        $result = mysqli_query($db, $sql);
        # check for results
        $resultCheck = mysqli_num_rows($result);
    
        if ($resultCheck > 0)
        {
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
                
                #Reservation button
                #Contains a hidden form that will send info to reserve.php
                echo "<td>";
                echo "<form action=\"reserve.php\" method=\"GET\">";
                echo "<input type=\"hidden\" name=\"bookID\" value=\"" . $row['BookID'] . "\">";
                echo "<input type=\"submit\" value=\"reserve\" name=\"submit\">";
                echo "</form>";

                echo "</td>";
                    
                #Cover image
                echo "<td>";
                echo "<img ";
                echo "src=\"http://localhost/sharron-books/images/covers/" . $row['ImageLocation'] . "\"";
                # If the image isn't found in images/covers, replace image with none.jpg
                echo "onerror=\"if (this.src != 'http://localhost/sharron-books/images/covers/none.jpg') this.src = 'http://localhost/sharron-books/images/covers/none.jpg';\" ";
                echo "alt=\"" . $row['ImageLocation'] . "\"";
                echo "width=\"100\"";
                echo "height=\"120\"";
                echo ">";
                echo "</td>";
            }
            echo "</table>";
        }
        else
        {
            echo "<h3 class = \"heading error\"> No results found for this query. </h3>";
        }
    ?>
    
</body>
</html>