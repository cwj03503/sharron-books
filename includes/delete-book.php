
<?php
    /*
     * Author - Carson Jones
     * This function deletes the book with the provided bookID from
     * the library database. Note that a connection to the database is
     * assumed and should be handled by the caller.
     * When called, this function DELETES from the database.
     */
    function delete_book($db, $bookID)
    {
        require_once('sanitize.php');
        $bookID = sanitize_input($bookID);
        $stmt = $db->prepare("DELETE FROM books WHERE BookID = ?");
        $stmt->bind_param("i", $bookID); //binding to prevent sql injection

        # process query
        $executed = $stmt->execute();
        return $executed;
    }
?>