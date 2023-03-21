<?php

include('includes/config.php');

if(isset($_POST['save'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $sname = $_POST['sname'];
    $muni = $_POST['muni'];
    $brgy = $_POST['brgy'];
    $lat = $_POST['lat'];
    $lng = $_POST['lng'];
  
   

    $sql = mysqli_query($connection, "INSERT INTO tblinventory (FamilyName, LocalName, ScientificName, Municipality, Barangay, Latitude, Longitude) VALUES ('$fname','$lname','$sname','$muni','$brgy','$lat','$lng')");
    
    echo "<script>alert('Data inserted successfully');</script>";
    echo "<script>window.location.href='manage-inventory.php'</script>";

    
     }

?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>MMSG | Add Inventory</title>
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
            <h4 class="header-line">Add Inventory</h4>
        </div>
    </div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-success">
            <div class="panel-heading">Inventory Info</div>
                <div class="panel-body">
                    <form role="form" method="post">

                     <div class="col-md-6">
                        <div class="form-group">
                            <label>Family Name</label>
                              <select class="form-control" name="fname">
                                <option value="" >Select Family Name</option>

                            <?php  

                                $sql = mysqli_query($connection, "SELECT Famname FROM tblps ");
                                while($row = mysqli_fetch_assoc($sql)){
                                ?>

                                <option> <?php echo $row['Famname'];  ?></option>
                            <?php } ?>

                                </select>
                        </div>
                    </div>

                    
                    <div class="col-md-6">
                      <div class="form-group">
                            <label>Local Name</label>
                              <select class="form-control" name="lname">
                                <option value="" >Select Local Name</option>

                            <?php  

                                $sql = mysqli_query($connection, "SELECT LocName FROM tblls ");
                                while($row = mysqli_fetch_assoc($sql)){
                                ?>

                                <option> <?php echo $row['LocName'];  ?></option>
                            <?php } ?>

                                </select>
                        </div>
                    </div>



                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Scientific Name</label>
                              <select class="form-control" name="sname">
                                <option value="" >Select Scientific Name</option>

                            <?php  

                                $sql = mysqli_query($connection, "SELECT SciName FROM tblss ");
                                while($row = mysqli_fetch_assoc($sql)){
                                ?>

                                <option> <?php echo $row['SciName'];  ?></option>
                            <?php } ?>

                                </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Municipality</label>
                              <select class="form-control" name="muni">
                                <option value="" >Select Municipality</option>

                            <?php  

                                $sql = mysqli_query($connection, "SELECT Municipality FROM tblmu ");
                                while($row = mysqli_fetch_assoc($sql)){
                                ?>

                                <option> <?php echo $row['Municipality'];  ?></option>
                            <?php } ?>

                                </select>
                        </div>
                    </div>


                    <div class="col-md-6">
                      <div class="form-group">
                            <label>Barangay</label>
                              <select class="form-control" name="brgy">
                                <option value="" >Select Barangay</option>

                            <?php  

                                $sql = mysqli_query($connection, "SELECT Barangay FROM tblba ");
                                while($row = mysqli_fetch_assoc($sql)){
                                ?>

                                <option> <?php echo $row['Barangay'];  ?></option>
                            <?php } ?>

                                </select>
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Latitude</label>
                              <select class="form-control" name="lat">
                                <option value="" >Select Latitude</option>

                            <?php  

                                $sql = mysqli_query($connection, "SELECT lat FROM tblmarker ");
                                while($row = mysqli_fetch_assoc($sql)){
                                ?>

                                <option> <?php echo $row['lat'];  ?></option>
                            <?php } ?>

                                </select>
                        </div>
                    </div>



                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Longitude</label>
                              <select class="form-control" name="lng">
                                <option value="" >Select Longitude</option>

                            <?php  

                                $sql = mysqli_query($connection, "SELECT lng FROM tblmarker ");
                                while($row = mysqli_fetch_assoc($sql)){
                                ?>

                                <option> <?php echo $row['lng'];  ?></option>
                            <?php } ?>

                                </select>
                        </div>
                    </div>

                            <button style="margin-top: 30px; margin-left: 17px;" type="submit" name="save" class="btn btn-success">Save </button>
                            <a href="manage-inventory.php"><button style="margin-top: 30px;" type="button" class="btn btn-info">Back</button></a>
                    </form>
                </div>
        </div>
    </div>
</div>
   
</div>


  <?php include('includes/footer.php');?>
      <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>
</html>

