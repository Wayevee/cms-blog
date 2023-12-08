                    

                        <?php
                        if(isset($_GET['edit'])){
                            $catid = $_GET['edit'];?>
                    
                            <form action="Categories.php" method="post">
                            <div class="form-group">
                               

                                       
                            <?php
                            if(isset($_GET["edit"])){
                            $catid = $_GET["edit"];
                            $edit_query  = "SELECT * FROM categories WHERE cat_id != 5 and cat_id = $catid";
                            $results = mysqli_query($conn, $edit_query);
                            while ($row = mysqli_fetch_assoc($results)) {
                                $category = $row['cat_title'];
                                $id = $row['cat_id'];?>

                                <label for="cat_title2">Update Category</label>
                            <input value="<?php if(isset($category)){echo $category; }?>"   type="text" name = "cattitle2" class = "form-control" >
                            <input   value="<?php echo $id?>" name = "catid" type = "hidden">
                            </div>
                                    <div class="form-group">
                                        <input type="submit" name = "updateCAT" value = "Update" class = "btn btn-primary"></div>
                             <?php  } }}?>

                             <?php
                             if(isset($_POST["updateCAT"])){
                                $values = $_POST["cattitle2"];
                                $catid = $_POST["catid"];
                                 $query2 = "UPDATE categories SET cat_title = '{$values}' WHERE cat_id = {$catid}";
                                 $result_update = mysqli_query($conn,$query2);
                                 header("Location: Categories.php");
                             }
                             ?>
                            
                             
                        </form>

