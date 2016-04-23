<?php
    namespace admin;
    function add_post($T, $D, $C, $Admin = false) {
        global $adminEmail;
        if ($Admin && $_SESSION['login'] == $adminEmail) {
            $arr = explode("@", $adminEmail, 2);
            $first = $arr[0];
            $W = $first.'@epost.com';
        }
        else {
            $W = $_SESSION['login'];
        }
        try {
            global $DB;
            $STH = $DB->prepare('INSERT INTO blog_posts (postTitle,postDesc,postCont,postDate, writer) VALUES (:postTitle, :postDesc, :postCont, :postDate, :writer)') ;
            $STH->execute(array(
                ':postTitle' => $T,
                ':postDesc' => $D,
                ':postCont' => $C,
                ':postDate' => date('Y-m-d H:i:s'),
                ':writer' => $W,
            ));

            if ($STH->rowCount() > 0) {
                return true;
            }
            return false;

        } catch(PDOException $e) {
             echo $e->getMessage();
        }
    }


?>