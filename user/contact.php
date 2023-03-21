<?php

include('includes/config.php');

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $message = $_POST['message'];
  
   
    $sql = mysqli_query($connection, "INSERT INTO tblcontact (Name, Mobile, Email, Message) VALUES ('$name','$number','$email','$message')");
    
    echo "<script>alert('Sent Message');</script>";
    echo "<script>window.location.href='contact.php'</script>";
     }

?>
<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>MMSG | Feedback</title>

	<link href="assets/css/bootstrap.min1.css" rel="stylesheet">			
	 <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.min3.css" rel="stylesheet" />
	<link rel="stylesheet" href="assets/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<style type="text/css">
		body{
			
		}
	</style>


</head>
<body>
	<!--Section: Contact v.2-->
<section class="mb-4">

    <!--Section heading-->
    <h2 class="h1-responsive font-weight-bold text-center my-4">Feedback Form</h2>
    <!--Section description-->
    <p class="text-center w-responsive mx-auto mb-5">We would love to hear your thoughts, suggestions, concerns or problem with anything so we can improve!</p>

    <div class="row">

       
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-4 text-center">
            <ul class="list-unstyled mb-0">
                <li><i class="fa fa-map-marker fa-2x"></i>
                    <p>San Miguel, Jordan, Guimaras</p>
                </li>

                <li><i class="fa fa-phone mt-4 fa-2x"></i>
                    <p>09504027566</p>
                </li>

                <li><i class="fa fa-envelope mt-4 fa-2x"></i>
                    <p>guimarasmangrove@gmail.com</p>
                </li>
            </ul>
        </div>

         <!--Grid column-->
        <div class="col-md-7 mb-md-0 mb-5 ml-5 mt-4">
            <form id="" name="" action="" method="post">

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-5">
                        <div class="md-form mb-0">
                        	<label for="name" class="">Your name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                        	<label for="email" class="">Your number</label>
                            <input type="text" name="number" class="form-control" required>
                        </div>
                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->

                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-11">

                        <div class="md-form">
                        	<label for="message">Your email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>

                    </div>
                </div>

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-11">

                        <div class="md-form">
                        	<label for="message">Your message</label>
                            <textarea type="text" name="message" rows="4" class="form-control md-textarea" required></textarea>
                        </div>

                    </div>
                </div>
                <!--Grid row-->

            

            <div class="text-center text-md-left mt-2">
                <button class="btn btn-warning" type="submit" name="submit">Send Message</button>
                <a href="dashboard.php"><button type="button" class="btn btn-info">Back</button></a>
            </div>
            
        </div>

        </form>

        <!-- Grid Column -->

    </div>

</section>
<!--Section: Contact v.2-->
</body>
</html>