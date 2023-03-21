<?php

session_start();
include('includes/config.php');

if(isset($_POST['signup']))
{

$count_my_page = ("user/userid.txt");
$hits = file($count_my_page);
$hits[0] ++;
$fp = fopen($count_my_page , "w");
fputs($fp , "$hits[0]");
fclose($fp); 
$UserID= $hits[0];   

$userFname = $_POST['userFname'];
$userMname = $_POST['userMname'];
$userLname = $_POST['userLname'];
$mobileno = $_POST['mobileno'];
$email = $_POST['email']; 
$password=md5($_POST['password']); 
$status=1;

$select = "SELECT * FROM tblusers WHERE EmailId = '$email' && Password = '$password'";
$result = mysqli_query($connection, $select);

if (mysqli_num_rows($result) > 0) {
       echo "<script>alert('User already exist');</script>";

    }

    else
    {
         $insert = "INSERT INTO tblusers (UserID, userFname, userMname, userLname, MobileNumber, EmailId, Password, Status) VALUES ('$UserID', '$userFname', '$userMname', '$userLname','$mobileno','$email','$password','$status')";
         mysqli_query($connection, $insert);
    
         echo '<script>alert("Your Registration successfull and your id is  "+"'.$UserID.'")</script>';
    }


}


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>MMSG |  Registration Form</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <style type="text/css">
    .card-registration{
            backdrop-filter: blur(10px) saturate(180%);
            -webkit-backdrop-filter: blur(10px) saturate(180%);
            background-color: rgba(11, 15, 13, 0.582);
            color: white;
            display: flex;
            flex-direction: row;
            align-items: center;
    }

    body{
        background-image: url('assets/img/mangrove.jpg');
        background-size: cover;
        background-attachment: fixed;
        background-repeat: no-repeat;
    }


    </style>

        <script type="text/javascript">
function valid()
{
if(document.signup.password.value!= document.signup.confirmpassword.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.signup.confirmpassword.focus();
return false;
}
return true;
}
</script>

</head>
<body>


<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-12 col-lg-12 col-xl-7">
        <div class="card shadow-2-strong card-registration mt-4" style="border-radius: 15px;">
          <div class="card-body pl-4 pr-4 pt-4 pb-4 md-5">
            <h3 class="mb-1 pb-1 pb-md-0 mb-md-4 text-center">Registration Form</h3>
            <hr style="background-color: white;">
            <form name="signup" action="signup.php" method="post" onSubmit="return valid();">

              <div class="row">
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <input type="text" name="userFname" class="form-control form-control-lg" placeholder="First Name:" required />
                  
                  </div>

                </div>
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <input type="text" name="userMname" class="form-control form-control-lg" placeholder="Middle Name:" required  />
                   
                  </div>

                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-4 pb-2">

                  <div class="form-outline">
                    <input type="text" name="userLname" class="form-control form-control-lg" placeholder="Last Name:" required  />
                   
                  </div>

                </div>
                <div class="col-md-6 mb-4 pb-2">

                  <div class="form-outline">
                    <input type="email" name="email" id="emailid" class="form-control form-control-lg" placeholder="Email Address:" required  />
                  
                  </div>

                </div>
              </div>


               <div class="row">
                <div class="col-md-6 mb-4 pb-2">

                  <div class="form-outline">
                    <input type="text" name="mobileno" class="form-control form-control-lg" placeholder="Mobile Number:" required  />
                   
                  </div>

                </div>
                <div class="col-md-6 mb-4 pb-2">

                  <div class="form-outline">
                    <input type="password" name="password" class="form-control form-control-lg" placeholder="Password:" required  />
                  
                  </div>

                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-2 pb-2">

                  <div class="form-outline">
                    <input type="password" name="confirmpassword" class="form-control form-control-lg" placeholder="Confirm Password:" required  />
                  </div>
                </div>

                <div class="col-md-6 mb-0 pb-0">
                <div class="mt-1 pt-1">
                <input style="margin-top: -11px;" class="btn btn-success btn-lg" name="signup" id="submit" type="submit" value="Register"/>
                <a href="index.php"><button style="margin-top: -11px;" type="button" class="btn btn-info btn-lg">Back</button></a>
              </div>
                  
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

</body>
</html>