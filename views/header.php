<?php
    function get_header() {
        ?>

        <!DOCTYPE html>
        <html>
        <head>
            <title><? functions\_Title(); ?></title>

            <meta name="viewport" content="width=device-width, user-scalable=yes">

            <? functions\_IncludeDependances(); ?>
        </head>
        <body>

        <div class="header">
            <div class="logo">My e-post</div>
            <div class="menu">
                <ul>
                    <li><a href="index.php">Index</a></li>
                    <li><a href="index.php?Blog">Blog</a></li>
                    <li><a href="index.php?About">About</a></li>
                    <li><a href="index.php?Contact">Contact</a></li>
                </ul>
                 <div class="membersMenu">
                    <p><img src="img/user.png" width="20px" height="20px" title="Users area"> <a href="index.php?Members">Members</a></p>
                </div>
            </div>

            <div class="spacer"></div>
        </div>

        <div class="wrapper">
            <div class="container">
            
        <?
    }


?>