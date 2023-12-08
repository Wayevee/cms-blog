<!-- Header and Navigation -->
<?php   include("include/header.php");?>
<?php 
                 if(isset($_GET['id'])){
                    $PID = $_GET['id'];

                    
                    
                    $post = "SELECT * FROM post WHERE Post_it = $PID AND Post_status = 'published' ORDER BY Post_it DESC";
                    $result = mysqli_query($conn, $post);
    
                    while($row = mysqli_fetch_assoc($result)){
                    $id = $row["Post_it"];
                    $title = $row["Post_title"];
                    $date = $row["Post_date"];
                    $author = $row["Post_author"];
                    $tags = $row["Post_tags"];
                    $content = $row["Post_content"];
                    $img = $row["Post_img"];
                ?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                <!-- Blog Post -->
         




                <!-- Title -->
                <h1><?php echo $title ?></h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#"><?php echo $author ?></a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $date ?></p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="images/<?php echo $img ?>" alt="">

                <hr>

                <!-- Post Content -->
                <p class="lead"><?php echo $title?></p>
                <p><?php echo $title?></p>
                <?php
}

}
?>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos, doloribus, dolorem iusto blanditiis unde eius illum consequuntur neque dicta incidunt ullam ea hic porro optio ratione repellat perspiciatis. Enim, iure!</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, nostrum, aliquid, animi, ut quas placeat totam sunt tempora commodi nihil ullam alias modi dicta saepe minima ab quo voluptatem obcaecati?</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum, dolor quis. Sunt, ut, explicabo, aliquam tenetur ratione tempore quidem voluptates cupiditate voluptas illo saepe quaerat numquam recusandae? Qui, necessitatibus, est!</p>
               
                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->
              
           
                <!-- Comment -->
                <?php include("include/coment.php");?>
                
                </div>

            </div>
            
   
                <!-- /.row -->
            <!-- side bar -->
    <?php     include("include/sidebar.php");    ?>
        <hr>
        </div>
            <!-- Footer -->
    <?php     include("include/footer.php");    ?>
   

