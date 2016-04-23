<div class="blogPage">    
    <?php 
        require_once 'config/B-includes.php';
        if (isset($_GET['postID']) && is_numeric($_GET['postID']) && post_exist($_GET['postID'])) {
            # get_post($_GET['postID']);
            $post = get_post_with_id($_GET['postID']);

            include 'views/B-singlePost.php';

            exit;

        }
    ?>


    <div class="viewposts">
        <?
            $posts = get_all_posts();

            foreach ($posts as $single_post) {
                ?>
                <div class="postBox">
                    <div class="postHead">
                        <div class="postDate">
                            <?php echo  date('j M Y', strtotime($single_post['postDate'])); ?>
                        </div>
                        <div class="postTitle">
                            <?php echo  $single_post['postTitle']; ?>
                        </div>
                    </div>
                    <div class="postDescription">
                        <?php 
                            if ($single_post['postDesc'] == NULL) echo $single_post['postCont'];
                            else echo $single_post['postDesc'];
                        ?>
                    </div>
                    <div class="postBottom"><a href="index.php?Blog&postID=<?php echo  $single_post['postID']; ?>">Read More</a></div>
                </div>
                <?
            }
        ?>

    </div>
</div>