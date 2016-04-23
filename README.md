MVC Personal Blog
========================

##Prologue

**MVC  (Model - View - Controller)** is a software architectural pattern for implementing user interfaces on computers. As someone gets deep in web (or software)  development, he/she should understand the principles that come from MVC. 

This project uses the above idea. With that in mind, I created a simple blog style personal website, mainly for study purposes and better understanding of modern web development.


##Technical details

Requirements:

 1. PHP version 5.5 and above.

Third party modules:

 1. [PHPMailer](https://github.com/PHPMailer/PHPMailer) ( used in contact form )
 
## Project Set Up

To test the project in your machine you have to change the following options in files:



- email.php ( under models )

Set 

   

     $mail->Username = "your_email@gmail.com";
     $mail->Password = "your_application_password";
     $mail->addAddress("your_email@gmail.com");

To get a Gmail application password [follow the official guide](https://support.google.com/mail/answer/185833?hl=en).


----------
 - dependences.php ( under config )

In this file the only you want to change is the `$_Title` variable that holds the title of each page.

##Admin & Members accounts

The project uses many-accounts relationship. This means that there is only one admin account which can edit-delete all the other members posts as well to write his/her own. All the other accounts are personal and can manipulate only their posts. 

###Members

To register an account (as there is no such thing as register form) you have to contact to admin by contact page and request one member account. 

###Admin

The administrator of the website needs to change a line so the server can recognize him. 

 - admin.variables.com ( under members/config )

Change `$adminEmail` variable with your own domain. 

For better security use a custom domain.

> Example:
> administrator@secretdomain.com


##Blog writers and domains

The domain of each user is shown in the footer area of each post in this format:

> Added on ***Day*** ***Month*** ***Year*** from ***member's email*** 

For administator posts the `member's email` section is filled with the following account :

> some_name **@epost.com**

##Database

You have to change the following files to be able to connect to Mysql database.

 - db.php ( under config )

Set the following options with your credentials:

    define('DBHOST','host');
    define('DBUSER','user');
    define('DBPASS','password');
    define('DBNAME','name');

The database uses two tables. One is called `blog_members`  and the other `blog_post`.

### Blog Members

The members table holds the admin account as well as all the other users. To set a new account you have to type manually an SQL Insert comand like so:

    INSERT INTO `blog_members`(`username`, `password`, `email`) VALUES ('someUserName','somePassword','comeEmail')

If you are new to Mysql, please install [phpMyAdmin](http://docs.phpmyadmin.net/en/latest/setup.html) for better command support.

  *For Member Database Schema see:  **members/members_schema.sql***

###Blog Posts

The post table holds the title, a description and the main content of each post as well as the date of creation.

  *For Posts Database Schema see:  **blog/posts_schema.sql***





