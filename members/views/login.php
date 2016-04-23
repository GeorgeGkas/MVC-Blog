<?php
    if (isset($_POST['login-btn'])) {
        if ($_POST['userEmail'] != NULL &&  $_POST['password'] != NULL) {
            if ($User->verify($_POST['userEmail'],$_POST['password'])) {
                $_SESSION['login'] = $_POST['userEmail'];
                echo "<script>location.href= 'index.php?Members';</script>";
            }
            else {
                $error = 'Error login credentials.';
            }
        }
        else {
            $error = 'Please, fill out all the Fields.';
        }
    }
?>

<div class="Members">
         <div class="Login">
            <p>Connect to your blog account:</p>
            <form method="post" name="login-form">
            <p><input type="email" name="userEmail" placeholder="Email"  /></p>
            <p><input type="password" name="password" placeholder="Password"  /></p>
            <?
                if ($error) echo '<p id="err" class="ContactErr">'.$error.'</p>';
            ?>
            <p><button type="submit" name="login-btn">Login</button></p>
            </form>
        </div>
    </div>