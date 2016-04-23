<?php
    if (isset($_GET['Logout'])) {
        unset($_SESSION['login']); 
        session_destroy();
        echo "<script>location.href= 'index.php';</script>";
    }

    if(isset($_GET['delpost'])){ 
        require_once 'blog/models/B-posts.php';
        if (post_belongs_to_user($_GET['delpost'])) {
            require_once 'members/models/delete-post.php';
            if (admin\delete_post($_GET['delpost'])) { 
                $message = 'Post deleted.';
            }
            else {
                $message = 'Could not delete the post.';
            }
        }
    } 

    if (isset($_GET['AddPost'])) {
        include 'members/views/admin-post.php';
        exit;
    }

    if (isset($_GET['EditPostId'])) {
        require_once 'blog/models/B-posts.php';
        if (post_belongs_to_user($_GET['EditPostId'])) {
            include 'members/views/admin-edit.php';
            exit;
        }
    }

?>


<div class="Admin">
<ul>
    <li><a href="index.php?Members&Logout">Logout</a></li>

</ul> 

<hr style="max-width: 100px;"></hr>
<? if ($message) echo '<p class="AdminMsg">'.$message.'</p>';?>
    <table>
        <tr>
            <th>Title</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
        <?php
            require_once 'blog/models/B-posts.php';
            $posts = get_member_posts();
            foreach ($posts as $single_post) {

                echo '<tr>';
                echo '<td>'.$single_post['postTitle'].'</td>';
                echo '<td>'.date('jS M Y', strtotime($single_post['postDate'])).'</td>';

                
                ?>
                    <td>
                        <a href="index.php?Members&EditPostId=<?php echo $single_post['postID'];?>">Edit</a> | 
                        <a href="javascript:delpost('<?php echo $single_post['postID'];?>','<?php echo $single_post['postTitle'];?>')">Delete</a>
                    </td>
                    <?
                
                echo '</tr>';
             }
        ?>
    </table>

    <a href="index.php?Members&AddPost" style="font-size: 18px;">Add post</a>
</div>