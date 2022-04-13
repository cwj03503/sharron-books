<?php
    include_once 'connect.php';
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
		<input type="text" placeholder="Search...">
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
    
    <!-- The following php exclusivesly READS from the books table in the library database.
         It does not create, update, or delete entries, only displays information about them.
    -->
    <?php
        # SQL statement
        $sql = "SELECT * FROM books;";
        $result = mysqli_query($conn, $sql);
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
                # now we can handle each row as an array
                echo "<tr>";
                
                #book title
                echo "<td>";
                echo $row['Title'];
                echo "</td>";
                
                #book author
                echo "<td>";
                echo $row['Author'];
                echo "</td>";
                
                #book Publisher (Fix Issue for no publisher)
                echo "<td>";
                echo $row['Publisher'];
                echo "</td>";
                
                #book Genre
                echo "<td>";
                echo $row['Genre'];
                echo "</td>";
                
                #Year of Publication
                echo "<td>";
                echo $row['YearPubbed'];
                echo "</td>";
                
                #book desription
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
                
                #Link to reservation form
                echo "<td>";
                echo "<form action=\"reserve.php\" method=\"POST\">";
                echo "<input type=\"hidden\" name=\"bookID\" value=\"" . $row['BookID'] . "\">";
                echo "<input type=\"submit\" value=\"reserve\" name=\"submit\">";
                echo "</form>";

                echo "</td>";
                    
                #Cover image
                echo "<td>";
                echo "<img ";
                echo "src=\"http://localhost/sharron-books/images/covers/" . $row['ImageLocation'] . "\"";
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
            # no result, display some error.
        }
    ?>
    
</body>
</html>