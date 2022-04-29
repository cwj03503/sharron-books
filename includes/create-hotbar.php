<?php
    /* Author - Carson Jones
     * Generates a Sharron Books Header bar with search and session information
     */
    function create_hotbar()
    {
        echo "<div class = \"hotbar\">"; 
		echo "<h2>Sharron Books</h2>";
		if ( isset($_SESSION['login_username']) )
        {
            // user is logged in, display link to profile page 
            echo "<a href=\"profile.php\">" . $_SESSION['login_username'] . "</a>";
        } 
        else 
        {
            // user is not logged in, display login link
            echo "<a href=\"login-form.php\"> Log in / Register </a>"; // fix this path later
        }
		echo "<form action=\"catalog.php\" method=\"POST\">";
        echo "<input type=\"text\" name=\"search\" placeholder=\"Search our catalog...\">";
        echo "<button type=\"submit\">Search</button>";
        echo "</form>";
	    echo "</div>";
    }
?>