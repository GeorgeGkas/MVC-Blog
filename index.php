<?php
    header('Content-Type: text/html; charset=utf-8');
    session_start();

    # Configure dependancies
    require_once 'config/includes.php';

    get_header();

    if (isset($_GET['Blog'])) {
        include 'blog/index.php';

    } else if (isset($_GET['About'])) {
        include 'views/about.html';

    } else if (isset($_GET['Contact'])) {
        include 'views/contact.php';

    } else if (isset($_GET['Members'])){
        include 'members/index.php';
    }
    else {
        include 'views/start.html';
    }

    get_footer();
?>
