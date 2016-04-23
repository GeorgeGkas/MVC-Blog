<?php 
    function get_all_posts() {
        try {
            global $DB;
            $STH = $DB->query("SELECT postID, postTitle, postDesc, postDate, postCont, writer FROM blog_posts ORDER BY postID DESC");
            $res = $STH->fetchAll();
            return $res;

        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    function get_post_with_id($ID) {
        try {
            global $DB;
            $STH = $DB->prepare('SELECT postTitle, postDesc, postCont, postDate, writer FROM blog_posts WHERE postID = :id');
            $STH->bindParam(':id', $ID);
            $STH->execute();

            $res = $STH->fetch(PDO::FETCH_ASSOC);
            return $res;

        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    function post_exist($ID) {
        try {
            global $DB;
            $STH = $DB->prepare('SELECT * FROM blog_posts WHERE postID = :id');
            $STH->bindParam(':id', $ID);
            $STH->execute();

            $row = $STH->fetch(PDO::FETCH_ASSOC);

            if (!$row) {
                return false;
            }
            return true;

        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    function get_member_posts() {
        try {
            global $DB;
            $STH = $DB->prepare("SELECT postID, postTitle, postDesc, postDate, postCont FROM blog_posts WHERE writer = :email ORDER BY postID DESC");
            $STH->execute(array(':email' => $_SESSION['login']));
            $res = $STH->fetchAll();
            return $res;

        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    function post_belongs_to_user($ID) {
        try {
            global $DB;
            $STH = $DB->prepare("SELECT writer FROM blog_posts WHERE postID = :postID");
            $STH->execute(array(':postID' => $ID));
            $res = $STH->fetch(PDO::FETCH_ASSOC);

            if ($res['writer'] == $_SESSION['login']) {
               return true;
            }
            return false;

        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

?>