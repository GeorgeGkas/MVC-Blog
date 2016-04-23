<?php
    namespace admin;
    function update_post($ID, $T, $D, $C) {
        try {
            global $DB;
            $STH = $DB->prepare('UPDATE blog_posts SET postTitle = :postTitle, postDesc = :postDesc, postCont = :postCont WHERE postID = :postID') ;
            $STH->execute(array(
                ':postTitle' => $T,
                ':postDesc' => $D,
                ':postCont' => $C,
                ':postID' => $ID
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