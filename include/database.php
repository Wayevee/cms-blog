<?php
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "cmsblog");




 $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);

  if(!$conn){
     echo "<h1>419|Connection failed</h1>";
 }







?>
