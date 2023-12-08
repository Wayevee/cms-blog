<div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" method="post">
                        <div class="form-group">
                            <textarea class="form-control" rows="3" name="comment"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name = "submit">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
            <?php
            $cmt_query = "SELECT * FROM comments where comment_post_id = $id AND comment_status = 'approved'";
            $cmt_result = mysqli_query($conn, $cmt_query);
            while ($row = mysqli_fetch_assoc($cmt_result)) {
                $cmt_author = $row['commnet_author'];
                $cmt_content = $row['comment_content'];
                $cmt_date = $row['comment_date'];

                ?>
            


                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" width="64" src="images/<?php echo $img ?>" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $title ?>
                            <small><?php echo $cmt_date?> at 9:30 PM</small>
                        </h4>
                        <?php echo $cmt_content?>
                    </div>
                </div>

         
                <?php }
            ?>




<div class="media">
           

            


<?php 
if(isset($_POST['submit'])){
    $insert_info = $_POST['comment'];
    $Date= date('d-m-y');
$insert_comment = "INSERT INTO comments (comment_post_id,commnet_author, comment_email, comment_content, comment_status, comment_date)
 VALUES ($id, 'vee', 'vee@gmail.com', '$insert_info', 'unapproved', '$Date')";
 $insert_values = mysqli_query($conn, $insert_comment);
 
 $update_ccount = "UPDATE post SET Post_comment_count = (SELECT COUNT(Commn_id) FROM comments WHERE post.Post_it = comments.comment_post_id)";
 $ccount_result = mysqli_query($conn, $update_ccount);

}

?>