<?php
session_start();
error_reporting(0);
include 'header.php';
include('../connect.php');



$sql = "select * from admission where email='".$_SESSION['email']."'"; 
$result = $conn->query($sql);
$row = mysqli_fetch_array($result);
$photo=$row['photo'];


if(isset($_POST['btnupload'])){
$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
	$image_name= addslashes($_FILES['image']['name']);
	$image_size= getimagesize($_FILES['image']['tmp_name']);
	move_uploaded_file($_FILES["image"]["tmp_name"],"../upload/" . $_FILES["image"]["name"]);			
			$location="upload/" . $_FILES["image"]["name"];

 $sql = " update admission set ssce='$location' where email='".$_SESSION['email']."'";
   $_SESSION['reg_success']=$location;
   if (mysqli_query($conn, $sql)) {

    ?>
									
<script>
alert('SSCE has been Uploaded successfully ');
window.location = "upload.php";

</script>

	<?php	
}
}

?>

<title>Upload Image| </title>
	<style type="text/css">
<!--
.style1 {
	color: #0000FF;
	font-weight: bold;
}
.style2 {color: #FF0000}
-->
    </style>
	<div class="container">
  <div class="row">
    <div class="col-lg-6">
      <div class="well contact-form-container">
       	<form  class="wizard-big" method="post"  enctype="multipart/form-data">
          <fieldset>
            
			  <div class="form-group">
              <br />
              Fullname: <?php echo $_SESSION['fullname']; ?>
              </label>
            </div>
			
            <div class="form-group">
              <label class="col-lg-12 control-label" for="uemail">Email: <?php echo $_SESSION['email']; ?>
             
              </label>
            </div>

<div class="form-group">
              <label class="col-lg-12 control-label" for="uemail">Application ID: <?php echo $_SESSION['ApplicationID']; ?>
             
              </label>
            </div>
		  <div class="form-group">
             
			 
		    <label class="col-lg-12 control-label" for="pass1"></label>
		  </div>
           


            <div style="height: 10px;clear: both"></div>




           
                <p>&nbsp;</p>
                <table width="233" border="0">
                  <tr>
                    <td width="81">&nbsp; 
					  <div align="center"><a href="../user/login.php">Log IN</a></div></td>
                  </tr>
          </table> 
             
          </fieldset>
        </form>
      </div>
    </div>
  </div>
</div>

