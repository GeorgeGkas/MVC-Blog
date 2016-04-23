<?php

    namespace Members;
    use PDO;
    class userAuth {
        private $CONN    =   NULL;

        function __construct() {
           global $DB;
           $this->CONN = $DB;

        }

        public function isLogin() {
            if ($_SESSION['login']) {
                return true;
            }
            return false;
        }

        public function verify($UserEmail, $Pass) {
            try {

                $STH = $this->CONN->prepare('SELECT password FROM blog_members WHERE email = :email');
                $STH->execute(array('email' => $UserEmail));
                
                $row = $STH->fetch(PDO::FETCH_ASSOC);

                if ($row && $Pass == $row['password']) {
                    return true;
                }

                return false;

            } catch(PDOException $e) {
                echo $e->getMessage();
            }
        }

        public function isAdmin() {
            global $adminEmail;
            if ($_SESSION['login'] == $adminEmail) {
                return true;
            } else {
                return true;
            }
        }
    }



?>