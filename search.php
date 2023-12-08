<?php  include("include/header.php");?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <?php

if(isset($_POST["submit"])){
    $search = $_POST["search"];
    
               
    $sql = "SELECT * FROM post WHERE Post_tags LIKE '%$search%' AND Post_status = 'published'";
    $search_result = mysqli_query($conn, $sql);
    if(!$search_result){
    die("Query Failed". mysqli_error($conn));
    }

        if(mysqli_num_rows($search_result) == 0){
            echo "<h4>No matching result found!</h4>";
        } else{





                        while($row = mysqli_fetch_assoc($search_result)){
                        $pid = $row['Post_it'];
                        $title = $row["Post_title"];
                        $date = $row["Post_date"];
                        $author = $row["Post_author"];
                        $tags = $row["Post_tags"];
                        $content = substr($row["Post_content"],0, 300);
                        $img = $row["Post_img"];
                            ?>


                    <h2> <a href="post.php?id=<?php echo $pid ?>"><?php echo $title ?></a> </h2>

                    <p class="lead">
                        by <a href="index.php"><?php echo $author ?></a>
                    </p>

                    <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $date ?> at 10:00 PM</p>

                    <hr>

                    <img class="img-responsive" src="images/<?php echo $img; ?>" alt="">

                    <hr>

                    <p><?php echo $content ?>.</p>
                    
                    <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                    <hr>
                 <?php   } } } ?>


                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

            </div>

        <?php     include("include/sidebar.php");    ?>

        <hr>

        <!-- Footer -->
        <?php   include("include/footer.php");?>

