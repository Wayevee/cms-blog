<?php

if(isset($_GET['cmt_id'])){
$cmt_id = $_GET['cmt_id'];

$cmt = "SELECT Commn_id,commnet_author,comment_email,comment_content,comment_status,comment_date,post.Post_title AS IRT
FROM comments
JOIN post ON post.Post_it = comments.comment_post_id
WHERE Commn_id = $cmt_id"; 
$result = mysqli_query($conn, $cmt);
while ($row = mysqli_fetch_assoc($result)) {
    $cmt_id = $row['Commn_id'];
    $cmt_author = $row['commnet_author'];
    $cmt_status = $row['comment_status'];
    $cmt_email = $row['comment_email'];
    $cmt_content = $row['comment_content'];
    $cmt_irt = $row['IRT'];
    $cmt_date = $row['comment_date'];
    echo " <tr>"; 
    
?>







<div class="col-xs-12">
<!--  enctype="multipart/form-data"  is used to send diffrent form data -->

<form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="cmt_author">Comment Post Tile</label>
            <input type="" class="form-control" name="cmt_author" value="<?php echo $cmt_irt?>" readonly>
        </div>


        <div class="form-group">
            <label for="cmt_author">Comment Author</label>
            <input type="text" class="form-control" name="cmt_author" value="<?php echo $cmt_author?>">
        </div>


        <div class="form-group">
            <label for="cmt_content">Comment_contenet</label>
            <textarea type="text" class="form-control" name="cmt-content" id="" cols="20" rows="10" > <?php echo  $cmt_content?></textarea>
        </div>
        
        
        <div class="form-group">
            <label for="cmt_email">Comment Email</label>
            <input type="text" class="form-control" name="cmt_email"  value="<?php echo $cmt_email?>">
        </div>

        <div class="form-group">
            <label for="cmt_date">Comment Date</label><br>
            <input type="text" name="cmt_date" class="form-control" value="<?php echo $cmt_date?>">
        </div>

    

        


        <div class="form-group">
            <input type="submit" class="btn btn-primary" name="submit" value="Update Post">
        </div>
</form>
</div>


<?php
 }

}

?>
<!-- Upateing our Posts -->
<?php

if(isset($_POST['submit'])){

    $author= $_POST['cmt_author'];
    $content= $_POST['cmt-content'];
    $email= $_POST['cmt_email'];
    $date = $_POST['cmt_date'];
   
   
   
       $update_query = "UPDATE comments SET commnet_author='$author',comment_content = '$content',comment_email='$email',comment_date='$date'
        WHERE commn_id = $cmt_id";
       $result_UPDATE = mysqli_query($conn, $update_query);
       header("Location: comment.php");
   }
  
?>