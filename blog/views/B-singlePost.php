<div class="singlePostSeparator"></div>
<div class="singlePostClearSeparator"></div>

<div class="SinglePost">
    <div class="postBox">
        <div class="postHead">
            <div class="postTitle">
                <?php echo  $post['postTitle']; ?>
            </div>
        </div>
        <div class="postDescriptionMain">
            <?php echo $post['postCont'];?>
        </div>

        <p>&nbsp;</p>
        <div class="postDate">
            <?php echo  'Added on '.date('j M Y', strtotime($post['postDate'])).' from '.$post['writer']; ?>
        </div>

    </div>


</div>

