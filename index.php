<?php

include('includes/config.php');

session_start();



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
echo "<script>alert('Email or Password is invalid');</script>";
}
}



// ADMIN LOG IN

if(isset($_POST['login'])){

	$emailid = mysqli_real_escape_string($connection, $_POST['emailid']);
	$password = md5($_POST['password']);

	$select = "SELECT EmailId, Password, adminID, Status FROM admin WHERE EmailId='$emailid' and Password='$password'";

	$result = mysqli_query($connection, $select);

	if(mysqli_num_rows($result) > 0){
		$row = mysqli_fetch_array($result);

		if($row['EmailId'] == 'admin@gmail.com'){
			$_SESSION['alogin']=$row['adminID'];

			header('location: admin/dashboard.php');

			// echo "<script type='text/javascript'> document.location ='admin/dashboard.php'; </script>";
		}

		else{
		echo "<script>alert('Email or Password is invalid');</script>";
	}
}
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>MMSG | Landing Page</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>

	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

	<link href="assets/fonts/icon-font.min.css" rel="stylesheet" />

	<link rel="stylesheet" type="text/css" href="assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="assets/css/main.css">

</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form" role="form" action="index.php" method="post">
					
					<span class="login100-form-title p-b-10">
						Sign Into Your Account
						<hr>
					</span>

					
					
					<div class="wrap-input100">
						<input class="input100" type="text" name="emailid" placeholder="Email Address" required>	
					</div>
					
					
					<div class="wrap-input100">
						<input class="input100" type="password" name="password" placeholder="Password" required>	
					</div>

					<div class="signup-u">
						<p>Don't have an account? <a class="signup" href="signup.php"> Register Here!</a></p>
					</div>
			

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" name="login">
							Login
						</button>
					</div>

				</form>

				<div class="login100-more" style="background-image: url('assets/img/mangrove.jpg');">
				</div>
			</div>
		</div>
	</div>
	
	

</body>
</html>