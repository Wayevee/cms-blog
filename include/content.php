



                <?php 
                    
                    $post = "SELECT * FROM post WHERE Post_status = 'published' ORDER BY Post_it DESC";
                    $result = mysqli_query($conn, $post);
    
                    while($row = mysqli_fetch_assoc($result)){
                    $id = $row["Post_it"];
                    $title = $row["Post_title"];
                    $date = $row["Post_date"];
                    $author = $row["Post_author"];
                    $tags = $row["Post_tags"];
                    $content = substr($row["Post_content"], 0, 300);
                    $img = $row["Post_img"];
                           ?>


                <h2> <a href="post.php?id=<?php echo $id ?>"><?php echo $title ?></a> </h2>

                <p class="lead">
                    by <a href="index.php"><?php echo $author ?></a>
                </p>

                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $date ?> at 10:00 PM</p>

                <hr>

                <img class="img-responsive" src="images/<?php echo $img; ?>" alt="">

                <hr>

                <p><?php echo $content ?>.</p>
                
                <a class="btn btn-primary" href="post.php?id=<?php echo $id ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
                 <?php   }   ?>


               