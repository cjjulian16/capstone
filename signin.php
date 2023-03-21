
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
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>MMSG | Sign In Page</title>
	
	<!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
</head>
<body>
<img src="assets/img/bac.jpg">

<div>
	<a href="index.php"><button type="button" class="btnhome">Home</button></a>
</div>

 <form method="post" action="signin.php">
 	<div class="headingsContainer">
 		<h3>Sign In User</h3>
 		<hr>
 	</div>

 	<div class="mainContainer">
 		<label for="Email">Enter Email:</label>
 		<input type="text" name="emailid" placeholder="Enter Email">

 		<br><br>

 		<label for="password">Enter Password:</label>
 		<input type="password" name="password" placeholder="Enter Password">

 		<button class="log" name="login" type="submit">Log In</button>

 		<p class="register">Don't have an Account? <a href="signup.php">Register Here!</a></p>

 	</div>
 </form>

</body>
</html>