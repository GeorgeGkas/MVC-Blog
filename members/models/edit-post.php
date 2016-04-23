<?php
    namespace admin;
    use PDO;
    function get_post($ID) {
        global $DB;
        try {
            $STH = $DB->prepare('SELECT postID, postTitle, postDesc, postCont FROM blog_posts WHERE postID = :postID');
            $STH->execute(array(':postID' => $ID));
            $row = $STH->fetch(PDO::FETCH_ASSOC); 
            return $row;

        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }



?>