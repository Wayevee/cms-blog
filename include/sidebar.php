         <!-- Blog Sidebar Widgets Column -->
         <div class="col-md-4">
<?php

?>


<!-- Blog Search Well -->
<div class="well">
    <h4>Blog Search</h4>
    <form action="search.php" method ="post"> 
    <div class="input-group">
        <!-- Form -->
         

        <input  name = "search" type="text" class="form-control">
        <span class="input-group-btn">
            <button name="submit" class="btn btn-default" type="submit">
                <span class="glyphicon glyphicon-search"></span>
        </button>
        </span>
     
    </div>
    </form>


    <!-- /.input-group -->
</div>



<!-- Blog Categories Well -->
<div class="well">
    <h4>Blog Categories</h4>
    <div class="row">
        <div class="col-lg-12">
            <ul class="list-unstyled">
                <?php    $categotries  = "SELECT * FROM categories";
                $result = mysqli_query($conn, $categotries);
                while ($row = mysqli_fetch_assoc($result)) {
                    $category = $row['cat_title'];
                    $cid = $row['cat_id'];
        ?> 
        <div class="col-lg-6">
        <ul class="list-unstyled">
            <li><a href="Sidebarprop.php?pc_id=<?php echo $cid?>"><?php echo $category?></a>
            </li>
           
        </ul>
    </div><?php
}

?>
            </ul>
        </div>
     
    </div>
    <!-- /.row -->
</div>




<!-- Side Widget Well -->
<?php include("widget.php");?>

</div>

<!-- </div> -->