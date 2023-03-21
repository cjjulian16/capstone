
<?php
session_start();
include('includes/config.php');

if(isset($_POST['login']))
{


$email=$_POST['emailid'];
$password=md5($_POST['password']);

$sql = mysqli_query($connection, "SELECT EmailId, Password, UserID, Status FROM tblusers WHERE EmailId='$email' and Password='$password'");


$total = mysqli_num_rows($sql);

$row = mysqli_fetch_assoc($sql);

if ($total > 0) 
{

    $_SESSION['usid']= $row['UserID'];

    if('Status==1')
{
$_SESSION['ulogin']=$_POST['emailid'];
echo "<script type='text/javascript'> document.location ='user/dashboard.php'; </script>";
} else {
echo "<script>alert('Your Account Has been blocked .Please contact admin');</script>";

}
}

else{
echo "<script>alert('Username or Password is invalid');</script>";
}
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>MMSG</title>
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
<h4 class="header-line">USER LOGIN FORM</h4>
</div>
</div>

<!-- SIDE BACKGROUND START-->           
<div class="row">
<div class="col-md-12" >
<!-- <div class="col-md-6" >      
<img style="margin-top: -10px; margin-bottom: 50px;" src="assets/img/side_background.png" />
</div> -->
<!-- SIDE BACKGROUND END--> 
<div class="col-md-3"></div>
<!--LOGIN PANEL START-->           
<div style="align-content: center;" class="col-md-" >
<div class="panel panel-success">
<div class="panel-heading">
 LOGIN FORM
</div>
<div class="panel-body">
<form role="form" action="index.php" method="post">

<div class="form-group">
<label>Enter Email</label>
<input class="form-control" type="text" name="emailid" required autocomplete="off" />
</div>
<div class="form-group">
<label>Password</label>
<input class="form-control" type="password" name="password" required autocomplete="off"  />
<!-- <p class="help-block"><a href="user-forgot-password.php">Forgot Password</a></p> -->
</div>


 <button type="submit" name="login" class="btn btn-success">LOGIN </button>
</form>
 </div>
</div>
</div>
<div class="col-md-3"></div>
</div>  
</div>  
<!---LOGIN PABNEL END-->            
             
 
    </div>

 <?php include('includes/footer.php');?>
      <!-- FOOTER SECTION END-->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>

</body>
</html>
