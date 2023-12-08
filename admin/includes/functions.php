
     <?php 
     function insertinto(){
        global $conn;
                If(isset($_POST["submit"])){
                    $Categoryadd = $_POST["cat_title"];
                    $updatecat = "INSERT INTO `categories` (`cat_title`) VALUES ('$Categoryadd')";
                    if (empty($Categoryadd) || $Categoryadd =="") {echo "<p>Input Field Cannot Be Empty <b>THANKS</b></p>";}
                    else {
                    $result = mysqli_query($conn, $updatecat);
                    if(!$result){
                        die("Query Failed". mysqli_error($conn));
                    }
                    echo "<p> {$Categoryadd} Category Was Created Successfully</p>";
                    }
                    }
                ?>

                        <div class="col-xs-6">
                    <form action="Categories.php" method="post">
                            <div class="form-group">
                                <label for="cat_title">Add Category</label>
                                <input type="text" name = "cat_title" class = "form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" name = "submit" value = "Add Category" class = "btn btn-primary">
                            </div>
                        </form>

                      
                        </div>

              <?php  } ?>


<?php

function displayingtables(){ 
         global $conn;
    ?>
               
              <div class="col-xs-6">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Categoty Title</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                       
                                <?php 
                                $categotries  = "SELECT * FROM categories WHERE cat_id != 5";
                                $result = mysqli_query($conn, $categotries);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $category = $row['cat_title'];
                                    $id = $row['cat_id'];
                                    echo " <tr>"; 
                                    echo  "<td> {$category} </td> ";
                                    echo" <td> <a href = 'Categories.php?delete={$id}'> Delete </a></td>"; 
                                    echo" <td> <a href = 'Categories.php?edit={$id}'> Edit </a></td>";
                                    echo "</tr>" ;}
                            ?>

                            <!--Deleting Categories  -->
                            <?php 
                            if(isset($_GET['delete'])){

                               $delete = $_GET['delete'];
                                $query = "DELETE FROM categories WHERE cat_id = {$delete}";
                                $result_delete = mysqli_query($conn, $query);
                                header("Location: Categories.php");
                            }
                            
                            ?>

                          
                                <?php include("includes/update.php")?>
                        
                        
                        
                    </tbody>
                </table> 
                

               
                    </div>

                    <?php } ?>



        <?php
function checkerror($result){
    global $conn;
    if(!$result){
        die("Error Executing Request".mysqli_error($conn));
    }


}

?>