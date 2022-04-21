<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <title>Add Entry | Sharron Books</title>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="css">
</head>
<script src=""></script>
<body>
    
    <!-- 
    Author - Drew Jenkins  Created Apr 12, 22
    Basic entry for adding books in to make our admins lives easier.
    -->
    <?php
        require("config.php"); // require server connection
        
        // Check if form has been submitted
        if (!empty($_POST))
        {
            // Process submitted form 
            // take posted values from the add-entry html form
            $title = $_POST['title'];
            $author = $_POST['author']; 
            $publisher = $_POST['publisher'];
            $genre = $_POST['genre'];
            $yearPubbed = $_POST['yearPubbed']; 
            $description = $_POST['description'];
            $bookID = $_POST['bookID'];
            $imageLocation = $_POST['imageLocation']; 

            // check the bookID in case the user tried to enter a repeated book        
            $sql = $db->prepare("SELECT BookID FROM books WHERE BookID = ? OR Title = ?");
            $sql->bind_param( "ds", $bookID, $title ); //binding to prevent sql injection
            $sql->execute();

            // get result & row ct for checking existence
            $result = $sql->get_result();
            $count = $result->num_rows;
            if ( $count != 0 ) // if count is not 0 there was a book with the ISBN13
            {                
                $error = "Book with matching ISBN exists.";
                echo "<b class=\"error-message\"> error: " . $error . "</b>";
            } // if
            else // no match found
            {
                // add into the database the new book
                $sql = $db->prepare( "INSERT INTO books ( Title, Author, Publisher, Genre, YearPubbed, Description, BookID, ImageLocation ) VALUES ( ?,?,?,?,?,?,?,? )" );
                $sql->bind_param( "ssssisds", $title, $author, $publisher, $genre, $yearPubbed, $description, $bookID, $imageLocation );
                $sql->execute();
                echo "<b class=\"success-message\"> Entry successfully added with ID " . $bookID . ".</b>"; 
            } // else
        }
    ?>
    
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
                <a href="hours.php" class="header-link"> Hours </a>
                <a href="../html/contact.html" class="header-link"> Contact </a>
            </nav>
		</header>
	</div>
	
    <h3 class="heading">Add an Entry</h3>
    
    <p> To generate a new entry in the library database, please enter all required information, then click "submit". For "Book Cover Image" Please provide an image URL or a location on the filesystem.</p>
    
	<div class="content">
        <!-- This form will be used to add an entry to the books table -->
        <form method="POST" action=<?php echo "\"" . htmlspecialchars($_SERVER["PHP_SELF"]) . "\"";?>>
            <div class="input required-input">
                <label for "title"><b>Title</b></label>
                <input type="text" maxLength="256" name="title" required>
            </div>
            
            <div class="input required-input text-input">
                <label for "author"><b>Author</b></label>
                <input type="text" maxLength="256" name="author" required>
            </div>
            
            <div class="input required-input text-input">
                <label for "publisher"><b>Publisher</b></label>
                <input type="text" maxLength="256" name="publisher" required>
            </div>
            
            <div class="input required-input text-input">
                <label for "genre"><b>Genre</b></label>
                <input type="text" maxLength="256" name="genre" required>
            </div>
            
            <div class="input required-input number-input">
                <label for "yearPubbed"><b>Year of orginal publication</b></label>
                <input type="number" min="1000" max="2099" step="1" name="yearPubbed" required>
            </div>
            
            <div class="input required-input number-input">
                <label for "bookID"><b>ISPN-13 barcode number</b></label>
                <input type="number" minlength="13" maxlength="13" min="1000000000000" value ="1230000000000" name="bookID" required>
            </div>
            
            <div class="input text-input long-text-input">
                <label for "description"><b>Description</b></label>
                <input type="text" maxLength="1024" name="description">
            </div>
            
            <div class="input text-input">
                <label for "imageLocation"><b>Book Cover Image (image URL)</b></label>
                <input type="text" maxLength="1024" name="imageLocation">
            </div>
                
            <button type="submit">Submit</button>
        </form>
	</div>
	
	<div class="main-footer">
		<p> Sharron Books </p>
		<p> 2022 </p>
		<p> Carson, Kylie, Joseph, Drew </p>
	</div>
	
</body>
</html> 