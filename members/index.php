<?php
    require_once 'config/M-includes.php';

    $User = new Members\userAuth;
    if ($User->isLogin()) {
        if ($User->isAdmin()) {
            include 'views/admin.php';
        }
        else {
            include 'views/member.php';
        }

    }
    else {
        include 'views/login.php';
        
    }

?>
