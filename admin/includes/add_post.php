

<?php

if(isset($_POST["submit"])){

   $Title= $_POST['title'];
   $Category= $_POST['post-category'];
   $Status= $_POST['post-status'];
    
   $author = $_POST['post-author'];
   $Img= $_FILES['post-img']['name'];
   $Img_temp = $_FILES['post-img']['tmp_name'];

   $Tags= $_POST['post-tags'];
   $Content= $_POST['post-content'];
   $Date= date('d-m-y');
   $post_comment_count = 4;


             move_uploaded_file($Img_temp, "../images/$Img");

    
             $Updateinputs = "INSERT INTO post (Post_title,Post_category_id,Post_status,Post_tags,Post_content,Post_date,Post_comment_count,Post_img,Post_author) ";
             $Updateinputs .= "VALUES(' $Title','$Category','$Status','$Tags','$Content','$Date','$post_comment_count','$Img','$author')";

             $result_inserts = mysqli_query($conn, $Updateinputs);

            checkerror($result_inserts);
};?>


<div class="col-xs-12">
<!--  enctype="multipart/form-data"  is used to send diffrent form data -->

<form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="title">Post Title</label>
            <input type="text" class="form-control" name="title">
        </div>


        <div class="form-group ">
            <label for="post-category">Post Category</label><br>
           <select name="post-category" id="post-category" >
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
            <input type="text" class="form-control" name="post-author">
        </div>
        
        
        <div class="form-group">
            <label for="post-status">Post Status</label>
            <input type="text" class="form-control" name="post-status">
        </div>

        <div class="form-group">
            <label for="post-img">Post Image </label>
            <input type="file" class="form-control" name="post-img">
        </div>

        <div class="form-group">
            <label for="post-tags">Post Tags</label>
            <input type="text" class="form-control" name="post-tags">
        </div>

        <div class="form-group">
            <label for="post-contents">Post Contents</label>
            <textarea type="text" class="form-control" name="post-content" id="" cols="30" rows="10"></textarea>
        </div>

        


        <div class="form-group">
            <input type="submit" class="btn btn-primary" name="submit" value="Publish Post">
        </div>
</form>
</div>