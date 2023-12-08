<div class="col-xs-12">
                <table class="table table-bordered table-hover ">
                    <thead>
                        <tr>
                            
                            <th>Author</th>
                            <th>Comment</th>
                            <th> e-mail</th>
                            <th >Status</th>
                            <th>In Response To</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                                <?php 
                                $cmt = "SELECT Commn_id,commnet_author,comment_email,comment_content,comment_status,comment_date,post.Post_title AS IRT,post.Post_it as p_id
                                FROM comments
                                JOIN post ON post.Post_it = comments.comment_post_id"; 
                                $result = mysqli_query($conn, $cmt);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $cmt_id = $row['Commn_id'];
                                    $cmt_author = $row['commnet_author'];
                                    $cmt_status = $row['comment_status'];
                                    $cmt_email = $row['comment_email'];
                                    $cmt_content = $row['comment_content'];
                                    $cmt_irt = $row['IRT'];
                                    $cmt_date = $row['comment_date'];
                                    $post_id = $row['p_id'];
                                    echo " <tr>"; 
                                    echo  "<td> {$cmt_author} </td> ";
                                    echo  "<td> {$cmt_content} </td> ";
                                    echo  "<td> {$cmt_email} </td> ";
                                    echo  "<td> {$cmt_status} </td> ";
                                    echo  "<td><a href='../post.php?id=$post_id'> {$cmt_irt} </td> ";
                                    echo  "<td> {$cmt_date} </td> ";
                                    echo  "<td><a href = 'comment.php?unapprove={$cmt_id}' class = 'btn btn-info'>Unapprove</a</td> ";
                                    echo  "<td><a href = 'comment.php?approve={$cmt_id}' class = 'btn btn-success'>Approve</a</td> ";
                                    echo  "<td><a href = 'comment.php?source=edit_comment&cmt_id={$cmt_id}' class = 'btn btn-primary'>Edit</a</td> ";
                                    echo  "<td><a href = 'comment.php?delete={$cmt_id}' class = 'btn btn-danger'>Delete</a</td> ";
                                    echo "</tr>" ;}
                            ?>

                            <!--Deleting Post  -->

                            <?php

                            if(isset($_GET['delete'])){
                                $delete_cmt = $_GET['delete'];
                                $delete_query = "DELETE FROM comments WHERE Commn_id = {$delete_cmt}";
                                $delete_request = mysqli_query($conn,$delete_query);

                                $update_ccount = "UPDATE post SET Post_comment_count = (SELECT COUNT(Commn_id) FROM comments WHERE post.Post_it = comments.comment_post_id)";
                                $ccount_result = mysqli_query($conn, $update_ccount);
                               
                                header("Location: comment.php");
                            }

                           if(isset($_GET['unapprove'])){
                                $unapprove_cmt = $_GET['unapprove'];
                                $unapprove_query = "UPDATE comments SET comment_status = 'unapproved' WHERE Commn_id = {$unapprove_cmt}";
                                $unapprove_request = mysqli_query($conn,$unapprove_query);
                                header("Location: comment.php");
                            }

                            if(isset($_GET['approve'])){
                                $approve_cmt = $_GET['approve'];
                                $approve_query = "UPDATE comments SET comment_status = 'approved' WHERE Commn_id = {$approve_cmt}";
                                $approve_request = mysqli_query($conn,$approve_query);
                                header("Location: comment.php");
                            }                            ?>
                           
                    </tbody>
                </table> 
                

               
                    </div>