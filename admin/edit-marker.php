<?php

include('includes/config.php');

$loc_id = $_GET['loc_id'];
if(isset($_POST['update']))
{

$loc_id_f=$_POST['loc_id_f'];
    $mangrovename = $_POST['mangrovename'];
    $lat = $_POST['lat'];
    $lng = $_POST['lng'];

$sql = mysqli_query($connection, "UPDATE tblmarker SET mangrovename='$mangrovename',lat='$lat',lng='$lng' WHERE id='$loc_id_f'");

echo "<script>alert('Data updated successfully');</script>";
echo "<script>window.location.href='manage-marker.php'</script>";


}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>MMSG | Edit Marker </title>
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
            <h4 class="header-line">Edit Marker</h4>
        </div>
    </div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-success">
            <div class="panel-heading">Marker Info</div>
                <div class="panel-body">
                    <form role="form" method="post">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Mangrove Name</label>

                            <?php 

                                $loc_id = $_GET['loc_id'];

                                $sql = mysqli_query($connection, "SELECT mangrovename FROM tblmarker WHERE id='$loc_id'");
                                while($row = mysqli_fetch_assoc($sql)){  
                                     
                            ?> 
                            <input type="hidden" name="loc_id_f" value="<?php echo $loc_id; ?>">
                            <input class="form-control" type="text" name="mangrovename" value="<?php echo $row['mangrovename'];?>">
                            <?php }?>

                        </div>
                    </div>


                     <div class="col-md-6">
                        <div class="form-group">
                            <label>Location Latitude</label>

                            <?php 

                                $loc_id = $_GET['loc_id'];

                                $sql = mysqli_query($connection, "SELECT lat FROM tblmarker WHERE id='$loc_id'");
                                while($row = mysqli_fetch_assoc($sql)){  
                                     
                            ?> 
                            <input type="hidden" name="loc_id_f" value="<?php echo $loc_id; ?>">
                            <input class="form-control" type="text" name="lat" value="<?php echo $row['lat'];?>">
                            <?php }?>

                        </div>
                    </div>

                    
                     <div class="col-md-6">
                        <div class="form-group">
                            <label>Location Longitude</label>

                            <?php 

                                $loc_id = $_GET['loc_id'];

                                $sql = mysqli_query($connection, "SELECT lng FROM tblmarker WHERE id='$loc_id'");
                                while($row = mysqli_fetch_assoc($sql)){  
                                     
                            ?> 
                            <input type="hidden" name="loc_id_f" value="<?php echo $loc_id; ?>">
                            <input class="form-control" type="text" name="lng" value="<?php echo $row['lng'];?>">
                            <?php }?>

                        </div>
                    </div>

                            <button style="margin-top: 30px; margin-left: 17px;" type="submit" name="update" class="btn btn-success">Update </button>
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
<?php?>