<!-- 
    Author - Carson Jones  Created  Feb 15,22
    Homepage for Sharron Books.
    Reads from the database ONLY.
-->

<!--
    TODO
    Update forms for catalog.php
    Fix books display, events display
-->

<?php
    include_once ('includes/config.php');
    include_once ('includes/create-books-display.php');
    include_once ('includes/create-hotbar.php');
    include_once ('includes/start-session.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <title>Home | Sharron Books</title>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="css/main.css">
</head>
<body>

    <?php
        /* Hotbar at the top of each page that will display a searchbar and login info */
        create_hotbar();
        /* Header bar at the top of the each page containing a series of links and the logo */
        create_home_header();
    ?>
    
    <!-- Navigation bar that will be at the top of the screen on all pages -->
	<div class = "hotbar"> 
		<h2>Some Library</h2>
		<a href="login.html">Login/Register</a>
		<p style="display: inline"> | Search </p>
		<input type="text" placeholder="Search..." style="display: inline">
	</div>
	
	<br>
    
    <!-- Header bar at the top of the home page containing a series of links and the logo -->
	<div class="home-header"> 
		<img src="logo" alt="Library Logo">
		<br>
		<header>
            <nav>
                <a href="../php/catalog.php" class="header-link"> Catalog </a><br>
                <a href="about.html" class="header-link"> About </a><br>
                <a href="../php/hours.php" class="header-link"> Hours </a><br>
                <a href="contact.html" class="header-link"> Contact </a><br>
            </nav>
		</header>
	</div>
	
    <!-- Contains the main content of the page -->
	<div class="content">
        
        <!-- A large search box that allows the user to search for books -->
        <!-- Will link to some catalog page -->
		<div class = "search box">
            <form action="search_page.php">
                <label for "catalog-search">
                    Search our collection:
                </label>
                <input type="search" id="catalog-search" placeholder="Search...">
                <input type="submit" value="Search">
            </form>
		</div>
        
		<br>
		
        <!-- Upcoming Events -->
        <div class="upcoming-events">
            <div class = "event">
                <time> 3/29</time>
                <br>
                <time datetime="2022-03-29 14:00"> March 29th at 2:00pm</time>
            </div>
        </div>
		
		<br>
        
        <!-- Staff Picks -->
        <!-- Ideally, this <div> will scroll horizontally. -->
        <div>
            <h2> Staff Picks </h2>
            <div class = "books-list">
                <div class = "book">
                    <img src="images/covers/Moby-Dick.jpg" alt="Moby-Dick Cover">
                    <p class="book-author">
                        by Herman Mellvile 
                    </p>
                </div>
                <div class = "book">
                    <img src="images/covers/The-Lord-of-the-Rings-The-Fellowship-of-the-Ring.jpg" alt="The Lord of the Rings: The Fellowship of the Ring Cover">
                    <p class="book-author">
                        by J.R.R Tolkien
                    </p>
                </div>
            </div>
        </div>
        
	</div>
	
	<br>
	
    <!-- Contains a small blurb at the bottom of the page with copyright and other information -->
	<div class="main-footer">
		<p> Sharron Books | 2022 </p>
		<p> Carson, Kylie, Joseph, Drew </p>
	</div>
	
</body>
</html> 