<div class="col-xs-12">
                <table class="table table-bordered table-hover ">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Category</th>
                            <th> Status</th>
                            <th style="width: 10%;">Images</th>
                            <th>Tags</th>
                            <th>Commments</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                                <?php 
                                $categotries  = "SELECT Post_it, Post_title,Post_author,Post_Status,Post_img,post_tags,Post_comment_count,Post_date,categories.cat_title AS categories
                                FROM post
                                JOIN categories ON post.Post_category_id = categories.cat_id";
                                $result = mysqli_query($conn, $categotries);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $post_id = $row['Post_it'];
                                    $post_title = $row['Post_title'];
                                    $post_author = $row['Post_author'];
                                    $post_cc = $row['categories'];
                                    $post_status = $row['Post_Status'];
                                    $post_img = $row['Post_img'];
                                    $post_tag = $row['post_tags'];
                                    $post_comment = $row['Post_comment_count'];
                                    $post_date = $row['Post_date'];
                                    echo " <tr>"; 
                                    echo  "<td> {$post_title} </td> ";
                                    echo  "<td> {$post_author} </td> ";
                                    echo  "<td> {$post_cc} </td> ";
                                    echo  "<td> {$post_status} </td> ";
                                    echo  "<td><img width = '60' src =../images/$post_img alt='images' class ='img-responsive'> </td> ";
                                    echo  "<td> {$post_tag} </td> ";
                                    echo  "<td> {$post_comment} </td> ";
                                    echo  "<td> {$post_date} </td> ";
                                    echo  "<td><a href = 'Post.php?publish={$post_id}' class = 'btn btn-success'>Publish</a</td> ";
                                    echo  "<td><a href = 'Post.php?withdraw={$post_id}' class = 'btn btn-info'>Recall Post</a</td> ";
                                    echo  "<td><a href = 'Post.php?source=edit_post&p_id={$post_id}' class = 'btn btn-primary'>Edit</a</td> ";
                                    echo  "<td><a href = 'Post.php?delete={$post_id}' class = 'btn btn-danger'>Delete</a</td> ";
                                    echo "</tr>" ;}
                            ?>

                            <!--Deleting Post  -->

                            <?php

                            if(isset($_GET['delete'])){
                                $delete_post = $_GET['delete'];
                                $delete_query = "DELETE FROM post WHERE Post_it = {$delete_post}";
                                $delete_request = mysqli_query($conn,$delete_query);
                                header("Location: Post.php");

                            }
                            if(isset($_GET['publish'])){
                                $publish_post = $_GET['publish'];
                                $publish_query = "UPDATE post SET Post_status = 'published' WHERE Post_it = {$publish_post}";
                                $publish_request = mysqli_query($conn,$publish_query);
                                header("Location: Post.php");
                            }

                            if(isset($_GET['withdraw'])){
                                $withdraw_post = $_GET['withdraw'];
                                $withdraw_query = "UPDATE post SET Post_status = 'draft' WHERE Post_it = {$withdraw_post}";
                                $withdraw_request = mysqli_query($conn,$withdraw_query);
                                header("Location: Post.php");}
                           
                            ?>
                           
                    </tbody>
                </table> 
                

               
                    </div>