<?php

include('includes/config.php');

session_start();
if(isset($_POST['login']))
{
$username=$_POST['username'];
$password=md5($_POST['password']);

$sql = mysqli_query($connection, "SELECT UserName, Password FROM admin WHERE UserName = '$username' and Password = '$password'");

$total = mysqli_num_rows($sql);

if ($total > 0) 
{

$_SESSION['alogin']=$_POST['username'];
echo "<script type='text/javascript'> document.location ='admin/dashboard.php'; </script>";
} else{
echo "<script>alert('Username or Password is invalid');</script>";
}


}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MMSG | Admin Log In Page</title>
    
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
</head>
<body>
<img src="assets/img/bac.jpg">

<div>
    <a href="index.php"><button type="button" class="btnhome">Home</button></a>
</div>

 <form style="margin-top: 40px;" method="post" action="adminlogin.php">
    <div class="headingsContainer">
        <h3>Sign In Admin</h3>
        <hr>
    </div>

    <div class="mainContainer">
        <label for="username">Enter Username:</label>
        <input type="text" name="username" placeholder="Enter Username">

        <br><br>

        <label for="password">Enter Password:</label>
        <input type="password" name="password" placeholder="Enter Password">

        <button class="log" name="login" type="submit">Log In</button>

    </div>
 </form>