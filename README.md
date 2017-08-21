MVC Personal Blog
========================

## Prologue

**MVC  (Model - View - Controller)** is a software architectural pattern for implementing user interfaces on computers. As someone gets deep in web (or software)  development, he/she should understand the principles that come from MVC. 

This blog app is based on the above pattern.


## Technical details

Requirements:

 1. PHP version 5.5 and above.

Third party modules:

 1. [PHPMailer](https://github.com/PHPMailer/PHPMailer) ( used in contact form )
 
## Project Set Up

To test the project in your machine you have to make the following changes:



- email.php ( under models )

Set 

   

     $mail->Username = "your_email@gmail.com";
     $mail->Password = "your_application_password";
     $mail->addAddress("your_email@gmail.com");

To get a Gmail application password [follow the official guide](https://support.google.com/mail/answer/185833?hl=en).


----------
 - dependences.php ( under config )

Change the `$_Title` variable according to your preference. This will be the main title of the blog.

## Admin & Members accounts

The project uses many-accounts relationship. There is one admin account which can edit the posts of all the other members. 

### Members

To register an account (as there is no such thing as register form) you have to contact to admin by contact page and request one member account. 

### Admin

The administrator of the website needs to change the follwoing line to grant access in the server. 

 - admin.variables.com ( under members/config )

Change `$adminEmail` variable with your own domain. 

For better security use a custom domain.

> Example:
> administrator@secretdomain.com


## Writers and domains

The domain of each user is shown in the footer area of each post in this format:

> Added on ***Day*** ***Month*** ***Year*** from ***member's email*** 

For administator's posts the `member's email` section is filled with the following account :

> some_name **@epost.com**

## Database

You have to change the following files to be able to connect to Mysql database.

 - db.php ( under config )

Change the following lines with your credentials:

    define('DBHOST','host');
    define('DBUSER','user');
    define('DBPASS','password');
    define('DBNAME','name');

The database uses two tables. One is called `blog_members`  and the other `blog_post`.

### Blog Members

The members table contains the users account (including administrator's). To set a new account you have to type manually an SQL Insert comand like so:

    INSERT INTO `blog_members`(`username`, `password`, `email`) VALUES ('someUserName','somePassword','comeEmail')

  *For Member Database Schema see:  **members/members_schema.sql***

### Posts

The post table contains the following columns: the title, a description and the main content of each post as well as the date of creation.

  *For Posts Database Schema see:  **blog/posts_schema.sql***

## Safety

We add a helper php script called **bcrypt.php** under root directory. This script takes as input a text value and returned the hashed one. 
The feature adds some security to our members as we verify now their passwords using [bcrypt](https://secure.php.net/manual/en/function.password-hash.php).

You have to use `password_verify()` to verify passwords from the database.
