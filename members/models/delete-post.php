<?php

    namespace admin;
    function delete_post($ID) {
        if (!is_numeric($ID) || empty($ID) || is_null($ID)) {
            return false;
        }
        try {
            global $DB;
            $STH = $DB->prepare('DELETE FROM blog_posts WHERE postID = :postID');
            $STH->execute(array(':postID' => $_GET['delpost']));

            if ($STH->rowCount() > 0) {
                return true;
            }

            return false;

        } catch(PDOException $e) {
             echo $e->getMessage();
        }
    }


?>