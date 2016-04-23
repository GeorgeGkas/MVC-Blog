<?php 
    //database credentials
    define('DBHOST','host');
    define('DBUSER','user');
    define('DBPASS','password');
    define('DBNAME','name');


    $DB = new PDO("mysql:host=".DBHOST.";port=8889;dbname=".DBNAME, DBUSER, DBPASS);
    $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //set timezone
    date_default_timezone_set('Europe/Athens');
    
?>
