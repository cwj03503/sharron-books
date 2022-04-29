# Sharron Books
## CSCI 4300 - Final Group Assignment - Spring 2022


### Description
This is a website for a fictional library that features systems for searching 
through a database of books, reserving books, and scheduling pick-up and drop off
of these books. This website also feautures admin tools for adding and removing books
from the database, and viewing details about which users have which books reserved.

### Functionality
All of the rows in the "books" table of our database (library.sql) was either entered
through phpMyAdmin or added through our website by an administrator. Because the data is entered manually,
we decided to have a relatively small number of books and limit the number of generes in order to
make testing more effecient and showcase our search functionality. However, new genres can be added easily
by administartors. Below is a list of the genres used in our database.

Genres:
* Biography
* Graphic Novel
* Mystery
* Drama
* Horror
* Fantasy
* Mythology
* Science Fiction
* Realistic Fiction
* Poetry
* Epic

### User Guide
#### Entry Point
Assuming the project has been installed and set up correctly, accessing the 
website should be as simple as navigating to "localhost/sharron-books/index.html" in your browser. This is the Sharron Books home page, which provides basic information about our site and navigational links. 

This home page can be accessed in several ways. After downloading the folder from our Github and placing the sharron-books directory in your "htdocs/" subdirectory of "xampp/", you can access the page just by double clicking the "index.html" file. Additionally, you can copy and paste "localhost/sharron-books" into your browser.

#### Starting the application
You will need to have XAMPP installed on your local maachine. You can install XAMPP via the folloeing link: https://www.apachefriends.org/download.html. XAMPP contains several tools needed to run Sharron Books locally, being Apache, mySQL, Perl, and MariaDB. Download the isntaller that's relevant to your system. 

Once XAMPP has been successfully installed on your system, you'll need to run it as an administrator. Then, start running Apache and MySQL. ...

### Attribution
Contributors:
* Carson Jones
* Andrew Jenkins
* Joseph Zheng
* Kylie Sengpiel