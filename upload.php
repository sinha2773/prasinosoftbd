<?php 
    include "inc/header.php"; 
    include "config.php";
 include "database.php";

?>

<?php 

    $file_name    =date("Y-m-d-H-i-s").sha1($_FILES['image']['name'])
    $destination  = "img/".$file_name;
    $filename     = $_FILES['image']['tmp_name'];

    if(move_uploaded_file($filename, $destination))
?> 

 <?php include "inc/footer.php" ?>