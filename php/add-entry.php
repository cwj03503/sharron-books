<!-- 
    Author - Drew Jenkins  Created Apr 12, 22
    Basic entry for adding books in to make our admins lives easier.
-->
<?php
    require("config.php"); // require server connection
        
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
        echo <p> $error </p>;
    } // if
    else // no match found
    {
        // add into the database the new book
        $sql = $db->prepare( "INSERT INTO books ( Title, Author, Publisher, Genre, YearPubbed, Description, BookID, ImageLocation ) VALUES ( ?,?,?,?,?,?,?,? )" );
        $sql->bind_param( "ssssisds", $title, $author, $publisher, $genre, $yearPubbed, $description, $bookID, $imageLocation );
        $sql->execute();
    } // else
?>