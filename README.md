# Sharron Books
## CSCI 4300 - Final Group Assignment - Spring 2022

### Description
This is a website for a fictional library that features systems for searching 
through a database of books and reserving them.
This website also feautures admin tools for adding and removing books
from the database, and viewing details about which users have which books reserved.

Contributors:
* Carson Jones
* Andrew Jenkins
* Joseph Zheng
* Kylie Sengpiel

### User Guide
#### Entry Point
The entry point of the application is the home page: sharron-books/index.php. Once the project directory has been placed in the htdocs/ subfolder of XAMPP/, this webpage can be accessed by simply typing in the file address : localhost/sharron-books/ (This path may be different depending on where you placed the project directory within htdocs/.) 

#### Starting the Application
Before anything else, you should download the project directory sharron-books/ from our Github: https://github.com/cwj03503/sharron-books. This contains the necessary files to run our application.
    In order to run Sharron Books locally, you will need to have XAMPP installed on your local machine. XAMPP includes several components necessary to run this application including phpMyAdmin, mySQL, and Apache. You can download XAMPP here: https://www.apachefriends.org/download.html. After successful installation, boot up XAMPP and use the action buttons to start Apache and MySQL. 

From here, you can create the local database that’s needed to run Sharron Books. Navigate to localhost/phpmyadmin in your browser, then press the “New” button underneath the logo on the left. From here you will be brought to a new database menu. Enter “library” in the text field and press “Create”. Now that the database has been created, it can be populated using our sql file. Click “Import” on the header bar at the top. Then click “browse” and navigate to sharron-books/sql/library.sql. Don’t change any of the other options on the page and import this file.

Now that the library database has been created and populated by our sql file, you can place the project directory (sharron-books/) into the htdocs/ subdirectory of xampp/, which you can find wherever you chose to install XAMPP. Then, follow the steps listed in 11.1 Entry Point 

#### Opening the application
Open the application by navigation to localhost/sharron-books/ in your browser after placing the project directory in xampp/htdocs/.

#### Using the application
The main pages of the site can be navigated using the links underneath the website logo on the left. You can log in and create an account using the link at the top of the home page. To search our database, you can type a book title into any of the search bars of the site. From the catalog page, you can refine your search, read book descriptions, and view details of each book.

Once logged in, a user will be able to reserve books and view which books they have reserved via their profile page. If an administrator is logged in, they will be able to delete books from the database, and view which books have been reserved by which users. 

#### Functionality
Sharron Books supports the following:

Account related functionality
* Separate administrator accounts and user accounts
* User and Admin registration
* User and Admin login
* User and Admin logout from profile page
* User and Admin profile pages with distinct features
* Sessions that keep a user logged in on all pages
* Reset password option

Profile Related Functionality
* View profile information, like name, username, and registered email
* On user profile page, view books reserved by your account
* On admin profile page, view all reserved books

Browsing and database interactions
* Search through a catalog of books using the search bar on any page
* Navigate a search query using filters and sorting on the catalog page
* As an administrator, add and remove books from the library catalog
* Accessed a detailed view of each book
* As a user, reserve an unlimited number of books

Security Features
* Client and server-side input validation
* HTML regular expression validation on all forms
* All form data sanitized
* SQL prepared statements used to avoid injection.

#### Supported browsers
Sharron Books has been tested on the following browsers:
* Firefox 99.0.1 for Windows 10
* Chrome for macOS

#### Libraries and tools used
This application was developed using HTML5, CSS3, MySQL, PHP, Javascript, XAMPPP, phpMyAdmin, and mySQLi.

#### Code and resource attribution
There was no starter code used. Our database features quite a bit of content lifted from Wikipedia. All book information was taken from Wikipedia, with the exception of book description, which was lifted from Google Books. All images not found in images/covers/ are in the public domain.

