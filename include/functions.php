<?php
include("database.php");

// To call category for header
function callcategories(){
    global $conn;
    $categotries  = "SELECT * FROM categories";
    $result = mysqli_query($conn, $categotries);
    while ($row = mysqli_fetch_assoc($result)) {
        $category[] = $row['cat_title'];  
}
foreach($category as $cat){
    echo "  <li><a href='$cat'>$cat</a></li>";         
        } 
}


?>

 

<!-- To Call category for sidebar -->
<?php
function callcategories2(){
    global $conn;
    $categotries  = "SELECT * FROM categories";
    $result = mysqli_query($conn, $categotries);
    while ($row = mysqli_fetch_assoc($result)) {
        $category = $row['cat_title'];
        
        
        ?> 
        <div class="col-lg-6">
        <ul class="list-unstyled">
            <li><a href="#"><?php echo $category?></a>
            </li>
           
        </ul>
    </div><?php
}
}
?>