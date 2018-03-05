<?php 
    include "inc/header.php"; 
    include "config.php";
 include "database.php";

?>




<div class="clearfix"></div>
<div class="page_title3">
<div class="container">

</div>
</div><!-- end page title --> 


<div class="clearfix"></div>

 <?php 
    $db = new Database();
    if(isset($_POST['submit'])){
        $name=mysqli_real_escape_string($db->link, $_POST['name']);
        $details=mysqli_real_escape_string($db->link, $_POST['details']);
        

        $file_name    =$_FILES['image']['name'];

         $destination  = "img/".$file_name;
        
         $file     = $_FILES['image']['tmp_name'];

    move_uploaded_file($file, $destination);

        if($name == '' || $details == '' || $file_name == ''){
            $error = "Field must not be Empty !";
        }

        else{
            $insert_data = "INSERT INTO portfolios(name,details,image) values ('$name', '$details', '$file_name')";
            $create=$db->insert($insert_data);
        }
      }

?>

<?php 
    if(isset($error)){
        echo "<span style='color:red'>".$error."</span>";
    }
?>

 <?php 

    
?> 
 
    

<div class="content_fullwidth less2">
<div class="container">

	<div class="logregform two insert_data_table">
    
        
        <div class="title">
        
			<h3>Insert Data</h3>
        		
			
            
        </div>
        
        <div class="feildcont">
        
            <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="name" id="inputEmail3" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Details</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" name="details" rows="3"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Image</label>
                    <div class="col-sm-10">
                      <input type="file" name="image">
                    </div>
                  </div>
                                    
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                  </div>
                </form>
        
        </div>

	</div>


</div>
</div><!-- end content area -->



<?php include "inc/footer.php" ?>