<?php

if(isset($_GET['p_id'])){
$p_id = $_GET['p_id'];

 $categotries  = "SELECT Post_content,Post_it, Post_title,Post_author,Post_Status,Post_img,post_tags,Post_comment_count,Post_date,categories.cat_title AS categories
 FROM post
 JOIN categories ON post.Post_category_id = categories.cat_id WHERE Post_it = $p_id";
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
     $post_content = $row['Post_content']
?>







<div class="col-xs-12">
<!--  enctype="multipart/form-data"  is used to send diffrent form data -->

<form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="title">Post Title</label>
            <input type="text" class="form-control" name="title" value="<?php echo $post_title?>">
        </div>


        <div class="form-group">
            <label for="category">Post Category</label><br>
           <select name="Category" id="Category" >
           <?php 
           $query = "SELECT *FROM categories WHERE cat_id != 5";
           $result = mysqli_query($conn, $query);

           while($row = mysqli_fetch_assoc($result)){
            $Cat = $row['cat_title'];
            $cate_id = $row['cat_id'];?>
           <option value="<?php echo $cate_id; ?>"><?php echo $Cat; ?></option>";
           <?php }
           
           ?>
           </select>
        </div>

        <div class="form-group">
            <label for="post-author">Post Author</label>
            <input type="text" class="form-control" name="post-author"  value="<?php echo $post_author?>">
        </div>
        
        
        <div class="form-group">
            <label for="post-status">Post Status</label>
            <input type="text" class="form-control" name="post-status"  value="<?php echo $post_status?>">
        </div>

        <div class="form-group">
            <label for="Image">Post Image</label><br>
            <img width="100" src="../images/<?php echo $post_img?>" alt="" class="image-responsive">
            <input type="file" name="image" class="form-control">
        </div>

        <div class="form-group">
            <label for="post-tags">Post Tags</label>
            <input type="text" class="form-control" name="post-tags"  value="<?php echo $post_tag?>">
        </div>

        <div class="form-group">
            <label for="post-contents">Post Contents</label>
            <textarea type="text" class="form-control" name="post-content" id="" cols="30" rows="10" > <?php echo  $post_content?></textarea>
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

    $Title= $_POST['title'];
    $Category= $_POST['Category'];
    $Status= $_POST['post-status'];
     
    $author = $_POST['post-author'];
    $Img= $_FILES['image']['name'];
    $Img_temp = $_FILES['image']['tmp_name'];
 
    $Tags= $_POST['post-tags'];
    $Content= $_POST['post-content'];
    move_uploaded_file($Img_temp,"../images/$Img");
   
    if(empty($Img)){
       $IMG_Q = "SELECT Post_img FROM post WHERE Post_it = $p_id"; 
       $result = mysqli_query($conn, $IMG_Q);
       while ($row = mysqli_fetch_assoc($result)) {
           $Img = $row['Post_img'];
           header("Location: Post.php");
       }
       $update_query = "UPDATE post SET Post_title='$Title',Post_category_id = $Category,Post_Status='$Status'
       ,Post_img='$Img',Post_author='$author',Post_tags='$Tags',Post_content='$Content',Post_date=now() WHERE Post_it = $p_id";
       $result_UPDATE = mysqli_query($conn, $update_query);
       header("Location: Post.php");
   }}
  
?>