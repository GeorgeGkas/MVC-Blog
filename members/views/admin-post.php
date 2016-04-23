<?php
    if (isset($_POST['submitPost'])) {
        $_POST = array_map( 'stripslashes', $_POST);

        # collect form data
        extract($_POST);

        # save the contents to session var so we can't loose the data
        # after submitting
        $_SESSION['title'] = $postTitle;
        $_SESSION['des'] = $postDesc;
        $_SESSION['cont'] = $postCont;


        if($postTitle ==''){
            $error = 'Please enter the title.';
        } else if($postDesc ==''){
            $error = 'Please enter the description.';
        } else if($postCont ==''){
            $error = 'Please enter the content.';
        } else {
            require_once 'members/models/add-post.php';
            $state = admin\add_post($postTitle, $postDesc, $postCont, true);

            if ($state) {
                $_SESSION['title'] = NULL;
                $_SESSION['des'] = NULL;
                $_SESSION['cont'] = NULL;
                echo "<script>location.href= 'index.php?Members';</script>";
            }
            else {
                $error = 'Could not upload your post. Please try again.';
            }
        }
    }


    require_once 'members/js/tinyMCE.js';
?>

<form action='' method='post'>

    <p><label>Title</label><br />
    <input type='text' name='postTitle' value="<?php echo $_SESSION['title'];?>"></p>

    <p><label>Description</label><br />
    <textarea name='postDesc' cols='60' rows='10'><?php echo $_SESSION['des'];?></textarea></p>

    <p><label>Content</label><br />
    <textarea name='postCont' cols='60' rows='10'><?php echo $_SESSION['cont'];?></textarea></p>
    <?php if ($error) echo '<p id="err" class="ContactErr" style="text-align: left;">'.$error.'</p>' ?>
    <p><button type='submit' name='submitPost'>Submit</button></p>

</form>