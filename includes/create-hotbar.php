<?php
    /* Author - Carson Jones
     * Generates a Sharron Books Header bar with search and session information.
     * This script doesn't inteact with the database.
     */
    function create_hotbar()
    {
        echo "<div class = \"hotbar\">"; 
		echo "<h2>Sharron Books</h2>";
		if ( isset($_SESSION['login_username']) )
        {
            // check login type
            if ($_SESSION['login_admin'] == "true")
            {
                // user is an admin
                echo "<a class=\"hotbar-link\" href=\"profile-admin.php\">" . $_SESSION['login_username'] . "</a>";
            }
            else
            {
                // user is a regular user
                echo "<a class=\"hotbar-link\" href=\"profile.php\">" . $_SESSION['login_username'] . "</a>";
            }
        } 
        else 
        {
            // user is not logged in, display login link
            echo "<a class=\"hotbar-link\" href=\"login-form.php\"> Login / Register </a>"; 
        }
		echo "<form action=\"catalog.php\" method=\"POST\">";
        echo "<input type=\"text\" name=\"search\" placeholder=\"Search our catalog...\">";
        echo "<button type=\"submit\">Search</button>";
        echo "</form>";
	    echo "</div>";
		echo "<br>";
    }
?>