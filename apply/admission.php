<?php
session_start();
error_reporting(1);
include 'header.php';
include('../connect.php');

if (mysqli_query($conn, $sqli)) {
}

$current_date = date('Y-m-d');

if (isset($_POST["btnsubmit"])) {

  //Get application ID
  function applicationID()
  {
    $string = (uniqid(rand(), true));
    return substr($string, 0, 5);
  }

  $applicationID =  applicationID();


  $fullname = mysqli_real_escape_string($conn, $_POST['txtfullname']);
  $sex = mysqli_real_escape_string($conn, $_POST['cmdsex']);
  $phone = mysqli_real_escape_string($conn, $_POST['txtphone']);
  $email = mysqli_real_escape_string($conn, $_POST['txtemail']);
  $sscgpa = mysqli_real_escape_string($conn, $_POST['sscgpa']);
  $hscgpa = mysqli_real_escape_string($conn, $_POST['hscgpa']);
  $faculty = mysqli_real_escape_string($conn, $_POST['txtfaculty']);
  $dept = mysqli_real_escape_string($conn, $_POST['txtdept']);

  $photo='upload/default.jpg';

  $status = '0';


  $sql_u = "SELECT * FROM admission WHERE email='$email'";
  $res_u = mysqli_query($conn, $sql_u);
  if (mysqli_num_rows($res_u) > 0) {
    $msg_error = "Email already exist";
  } else {
    $sql = "INSERT INTO admission (fullname,sex,phone,email,sscgpa,hscgpa,faculty,dept,status,photo,date_admission,
    applicationID)VALUES( '$fullname','$sex','$phone','$email','$sscgpa','$hscgpa','$faculty','$dept','$status'
    ,'$photo','$current_date','$applicationID')";

    if ($conn->query($sql) === TRUE) {

      $_SESSION['email'] = $email;
      $_SESSION['fullname'] = $fullname;
      $_SESSION['ApplicationID'] = $applicationID;

      header("Location: upload.php");
    } else {
?>
      <script>
        alert('Problem Occured , Try Again');
      </script>
<?php
    }
  }
}
?>


<title>Application Form| Online student admission system</title>
<?php if ($msg <> "") { ?>
  <style type="text/css">
    <!--
    .style1 {
      font-size: 12px;
      color: #FF0000;
    }
    -->
  </style>
  <div class="alert alert-dismissable alert-<?php echo $msgType; ?>">
    <button data-dismiss="alert" class="close" type="button">x</button>
    <p><?php echo $msg; ?></p>
  </div>
<?php } ?>
<p>
<h4><?php echo "<p> <font color=red font face='arial' size='3pt'>$msg_error</font> </p>"; ?></h4>
</p>
<h4><?php echo "<p> <font color=green font face='arial' size='3pt'>$msg_success</font> </p>"; ?></h4>
</p>
<div class="container">
  <div class="row">
    <div class="col-lg-6">
      <div class="well contact-form-container">
        <form class="form-horizontal contactform" action="" method="post" name="f">
          <fieldset>

            <div class="form-group">
              <label class="col-lg-12 control-label" for="pass1">Fullname:
                <input type="text" id="pass1" class="form-control" name="txtfullname" value="<?php if (isset($_POST['txtfullname'])) ?><?php echo $_POST['txtfullname']; ?>" required="">
              </label>
            </div>
            <div class="form-group">
              <label class="col-lg-12 control-label" for="pass1">Sex:
                <select name="cmdsex" id="gender" class="form-control" required="">
                  <option value=" ">--Select Gender--</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
              </label>
            </div>
            <div class="form-group">
              <label class="col-lg-12 control-label" for="pass1">phone:
                <input type="text" id="pass1" class="form-control" name="txtphone" value="<?php if (isset($_POST['txtphone'])) ?><?php echo $_POST['txtphone']; ?>" required="">
              </label>
            </div>
            <div class="form-group">
              <label class="col-lg-12 control-label" for="uemail">Email:
                <input type="email" name="txtemail" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" value="<?php if (isset($_POST['txtemail'])) ?><?php echo $_POST['txtemail']; ?>" required>
              </label>
            </div>
            <div class="form-group">
              <label class="col-lg-12 control-label" for="pass1">SSC GPA:
                <input type="number" step="any" id="pass1" class="form-control" name="sscgpa" value="<?php if (isset($_POST['txtlga'])) ?><?php echo $_POST['txtlga']; ?> " required="">
              </label>
            </div>
            <div class="form-group">
              <label class="col-lg-12 control-label" for="pass1">HSC GPA:
                <input type="number" step="any" id="pass1" class="form-control" name="hscgpa" value="<?php if (isset($_POST['txtstate'])) ?><?php echo $_POST['txtstate']; ?>" required="">
              </label>
            </div>

            <div class="form-group">
              <label class="col-lg-12 control-label" for="pass1">Faculty:
                <input type="text" id="pass1" class="form-control" name="txtfaculty" value="<?php if (isset($_POST['txtfaculty'])) ?><?php echo $_POST['txtfaculty']; ?>" required="">
              </label>
            </div>
            <div class="form-group">
              <label class="col-lg-12 control-label" for="pass1">Department:
                <input type="text" id="pass1" class="form-control" name="txtdept" value="<?php if (isset($_POST['txtdept'])) ?><?php echo $_POST['txtdept']; ?>" required="">
              </label>
            </div>



            <div style="height: 10px;clear: both"></div>

            <div class="form-group">


              <div class="col-lg-10">
                <button class="btn btn-primary" type="submit" name="btnsubmit">Submit</button>
              </div>
            </div>
          </fieldset>
        </form>
      </div>
    </div>
  </div>
</div>

<p>
</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p data-v-6f398a90="">&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
