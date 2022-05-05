<?php
    function create_home_header()
    {
        echo "<div class=\"home-header\">"; 
        echo "<img src=\"images/logo.png\" alt=\"Library Logo\" width=\"100px\">";
        echo "<br>";
        echo "<header>";
            echo "<nav>";
                echo "<a href=\"index.php\" class=\"header-link\"> Home </a><br>";
                echo "<a href=\"catalog.php\" class=\"header-link\"> Catalog </a><br>";
                echo "<a href=\"about.php\" class=\"header-link\"> About </a><br>";
                echo "<a href=\"hours.php\" class=\"header-link\"> Hours </a><br>";
                echo "<a href=\"contact.php\" class=\"header-link\"> Contact </a><br>";
            echo "</nav>";
        echo "</header>";
        echo "</div>";
    }
?>