<?php
    /*
     * Author - Carson Jones
     * Displays the details of some book in the library database.
     * This file READS from the database only.
     */
    require_once 'config.php';
    include_once 'sanitize.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <title>Book Details | Sharron Books</title>
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
        <?php
    
            // Set form variables
            if (isset($_GET["bookID"]))
            {
                $bookID = sanitize_input($_GET["bookID"]);
                $stmt = $db->prepare("SELECT * FROM books WHERE BookID = ?");
                $stmt->bind_param("i", $bookID); //binding to prevent sql injection

                # process query
                $stmt->execute();
                $stmt->store_result();
                $stmt->bind_result($title,
                                $author,
                                $publisher,
                                $genre,
                                $yearPubbed,
                                $description,
                                $bookID,
                                $checkedOut,
                                $reserved,
                                $userID,
                                $imageLocation);
                
                
                # Process and display results
                $stmt->fetch();
                echo "<h3 class=\"heading\"> \"" . $title . "\" </h1>";
                echo "<h3 class=\"subheading\">" . $author . "</h3>";
                
                echo "<img ";
                echo "src=\"../images/covers/" . $imageLocation . "\"";
                # If the image isn't found in images/covers, replace image with none.jpg
                echo "onerror=\"if (this.src != '../images/covers/none.jpg') this.src = '../images/covers/none.jpg';\" ";
                echo "alt=\"" . $imageLocation . "\"";
                echo "width=\"300\"";
                echo ">";

                # Reservation button
                echo "<form action=\"reserve.php\" method=\"GET\">";
                echo "<input type=\"hidden\" name=\"bookID\" value=\"" . $bookID . "\">";
                echo "<input type=\"submit\" value=\"reserve\" name=\"reserve\">";
                echo "</form>";

                # Book Description
                echo "<p class = \"book-description\">" . $description . "</p>";

                # Info
                echo "<p class=\"book-info\">";
                echo "Publisher: " . $publisher . "<br>";
                echo "Year of original publication: " . $yearPubbed . "<br>";
                echo "Barcode Number: " . $bookID . "<br>";
                echo "</p>";

            }
            else
            {
                # bookID variable is not set 
                echo("<p class=\"error\"> error: no book selected. <p>");
            }
        ?>
	</div>
	
	<div class="main-footer">
		<p> Sharron Books </p>
		<p> 2022 </p>
		<p> Carson, Kylie, Joseph, Drew </p>
	</div>
	
</body>
</html> 