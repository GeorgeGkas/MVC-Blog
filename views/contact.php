<div class="contactPage">

    <form method="post" name="contactForm" action="#" class="contactForm">
        <p>Email:</p>
        <input name="email" type="text" style="margin-left: 25px;" /> <br />
        <p >Subject:</p>
        <input name="subject" type="text" /> <br />
        <p>Message:</p>
        <textarea name="comment"  cols="30"></textarea>


          <?php
            if(isset($_POST["submit"])){
                // Checking For Blank Fields..
                if($_POST["email"] == "" || $_POST["subject"] == "" || $_POST["comment"] == "") {
                    echo "<div class='ContactErr' id='err'>Please, fill out all the Fields.</div>";
                } else {
                    require_once 'models/email.php';
                    
                    if (!checkEmailAddress($_POST['email'])) {
                        echo "<div class='ContactErr' id='err'>Invalid Sender's Email.</div>";
                    }
                    else{
                        $email = $_POST["email"];
                        $subject = $_POST['subject'];
                        $message = nl2br($_POST['comment']);

                        if (send_email($email, $subject, $message)) {
                            echo "<div class='ContactErr' id='succ'>Your email has been sent.</div>";
                        }
                        else {
                            echo "<div class='ContactErr' id='err'>We had problems to sent your email.</div>";
                        }
                    }
                }
            }
        ?>


        <div class="subBtn"> <input name="submit" type="submit" value="Submit" /><div>
    </form>


</div>