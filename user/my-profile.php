<?php 

  session_start();
  include('includes/config.php');

  if(($_SESSION['ulogin'])==0)
    {   
header('location: ../index.php');
}


  if(isset($_POST['update'])) {

    $u_id=$_SESSION['usid'];  
    $userFname = $_POST['userFname'];
    $userMname = $_POST['userMname'];
    $userLname = $_POST['userLname'];
    $mobileno = $_POST['mobileno'];
    $email = $_POST['email'];

    $query = "UPDATE tblusers SET userFname = '$userFname', userMname = '$userMname', userLname = '$userLname', MobileNumber = '$mobileno', EmailId = '$email' WHERE UserId='$u_id'";

  
    if($result = mysqli_query($connection, $query)) {

      echo "<script>alert('My Profile updated successfully');</script>";


    } else {

      echo "<script>alert('something went wrong. please try again');</script>";


    }

  }



?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>MMSG | User Signup</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' /> 

</head>
<body>
    <!------MENU SECTION START-->
<?php include('includes/header.php');?>
<!-- MENU SECTION END-->
<div class="container">
    <div class="row pad-botm">
        <div class="col-md-12">
            <h4 class="header-line">My Profile</h4>
        </div>
    </div>

<div class="row">           
    <div class="col-md-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                My Profile
            </div>
                <div class="panel-body">
                    <form name="signup" method="post" action="my-profile.php">


<?php 
 $u_id=$_SESSION['usid']; 
$sql = mysqli_query($connection, "SELECT UserID, userFname, userMname, userLname, EmailId, MobileNumber, Status FROM  tblusers WHERE UserId='$u_id'");

$row = mysqli_fetch_assoc($sql);
             
?> 
<div class="col-md-6">
<div class="form-group">
<label>UserID : </label>
<b><u><?php echo $row['UserID'];?></u></b>
</div>

<div class="form-group">
<label>First Name : </label>
<b><u><?php echo $row['userFname'];?></u></b>
</div>

<div class="form-group">
<label>Middle Name : </label>
<b><u><?php echo $row['userMname'];?></u></b>
</div>

<div class="form-group">
<label>Last Name : </label>
<b><u><?php echo $row['userLname'];?></u></b>
</div>

<div class="form-group">
<label>Mobile Number : </label>
<b><u><?php echo $row['MobileNumber'];?></u></b>
</div>

<div class="form-group">
<label>Email Address: </label>
<b><u><?php echo $row['EmailId'];?></u></b>
</div>


<div class="form-group">
<label>Profile Status : </label>
<?php if('Status==1'){?>
<span style="color: green">Active</span>
<?php } else { ?>
<span style="color: red">Blocked</span>
<?php }?>
</div>

<div class="form-group">
<label>Mobile Number :</label>
<input class="form-control" type="text" name="mobileno" maxlength="11" value="<?php echo $row['MobileNumber'];?>"  autocomplete="off" required />
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>Enter First Name:</label>
<input class="form-control" type="text" name="userFname" value="<?php echo $row['userFname'];?>"  autocomplete="off" required />
</div>

<div class="form-group">
<label>Enter Middle Name:</label>
<input class="form-control" type="text" name="userMname" value="<?php echo $row['userMname'];?>"  autocomplete="off" required />
</div>

<div class="form-group">
<label>Enter Last Name:</label>
<input class="form-control" type="text" name="userLname" value="<?php echo $row['userLname'];?>"  autocomplete="off" required />
</div>
                                        
<div class="form-group">
<label>Enter Email:</label>
<input class="form-control" type="email" name="email" id="emailid"  value="<?php echo $row['EmailId'];?>"  autocomplete="off" required />
</div>
</div>
                              
<button style="margin-left: 16px; margin-top: 42px;" type="submit" name="update" class="btn btn-success" id="submit">Update Now</button>


                    </form>
                </div>

        </div>
    </div>
</div>

</div>


    <?php include('includes/footer.php');?>
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
