<?php

include('includes/config.php');

$in_id = $_GET['in_id'];
$sql_new = mysqli_query($connection, "SELECT * FROM tblinventory WHERE invID='$in_id'");
$res_new = mysqli_fetch_assoc($sql_new);

if(isset($_POST['update']))
{

// $in_id_f=$_POST['in_id_f'];


    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $sname = $_POST['sname'];
    $muni = $_POST['muni'];
    $brgy = $_POST['brgy'];
    $lat = $_POST['lat'];
    $lng = $_POST['lng'];
  

$sql = mysqli_query($connection, "UPDATE tblinventory SET FamilyName='$fname',LocalName='$lname',ScientificName='$sname',Municipality='$muni',Barangay='$brgy',Latitude='$lat',Longitude='$lng' WHERE invID='$in_id'");

echo "<script>alert('Data updated successfully');</script>";
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
    <title>MMSG | Edit Inventory </title>
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
            <h4 class="header-line">Edit Inventory</h4>
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

                             <?php 

                               $in_id = $_GET['in_id'];

                                $sql = mysqli_query($connection, "SELECT FamilyName FROM tblinventory WHERE invID='$in_id'");
                                while($row = mysqli_fetch_assoc($sql)){  
                                     
                            ?> 

                              
                             <select class="form-control" name="fname">
                                <option value="<?php echo $res_new['FamilyName']; ?>"><?php echo $res_new['FamilyName']; ?></option>
                                <option></option>

                            <?php  

                                $sql = mysqli_query($connection, "SELECT Famname FROM tblps ");
                                while($row = mysqli_fetch_assoc($sql)){
                                ?>

                                <option value="<?php echo $row['Famname'];  ?>"> <?php echo $row['Famname'];  ?></option>
                            <?php } ?>

                                </select>

                            <?php }?>
                            </div>
                        </div>





                   <!--  <div class="col-md-6">
                        <div class="form-group">
                            <label>Family Name</label>

                            <?php 

                                $in_id = $_GET['in_id'];

                                $sql = mysqli_query($connection, "SELECT FamilyName FROM tblinventory WHERE invID='$in_id'");
                                while($row = mysqli_fetch_assoc($sql)){  
                                     
                            ?> 

                             <select class="form-control" name="fname"  name="in_id_f" value="<?php echo $in_id; ?>">
                                <option value="<?php echo $row['FamilyName'];  ?>"></option>

                            <?php  

                                $sql = mysqli_query($connection, "SELECT Famname FROM tblps ");
                                while($row = mysqli_fetch_assoc($sql)){
                                ?>

                                <option value="<?php echo $row['Famname'];  ?>"> <?php echo $row['Famname'];  ?></option>
                            <?php } ?>

                                </select>

                            <?php }?>
                        </div>
                    </div> -->



                    <div class="col-md-6">
                            <div class="form-group">
                                <label>Local Name</label>

                             <?php 

                               $in_id = $_GET['in_id'];

                                $sql = mysqli_query($connection, "SELECT LocalName FROM tblinventory WHERE invID='$in_id'");
                                while($row = mysqli_fetch_assoc($sql)){  
                                     
                            ?> 

                              
                             <select class="form-control" name="lname">
                                <option value="<?php echo $res_new['LocalName']; ?>"><?php echo $res_new['LocalName']; ?></option>
                                <option></option>

                            <?php  

                                $sql = mysqli_query($connection, "SELECT LocName FROM tblls ");
                                while($row = mysqli_fetch_assoc($sql)){
                                ?>

                                <option value="<?php echo $row['LocName'];  ?>"> <?php echo $row['LocName'];  ?></option>
                            <?php } ?>

                                </select>

                            <?php }?>
                            </div>
                        </div>



                   
                    <div class="col-md-6">
                            <div class="form-group">
                                <label>Scientific Name</label>

                             <?php 

                               $in_id = $_GET['in_id'];

                                $sql = mysqli_query($connection, "SELECT ScientificName FROM tblinventory WHERE invID='$in_id'");
                                while($row = mysqli_fetch_assoc($sql)){  
                                     
                            ?> 

                              
                             <select class="form-control" name="sname">
                                <option value="<?php echo $res_new['ScientificName']; ?>"><?php echo $res_new['ScientificName']; ?></option>
                                <option></option>

                            <?php  

                                $sql = mysqli_query($connection, "SELECT SciName FROM tblss ");
                                while($row = mysqli_fetch_assoc($sql)){
                                ?>

                                <option value="<?php echo $row['SciName'];  ?>"> <?php echo $row['SciName'];  ?></option>
                            <?php } ?>

                                </select>

                            <?php }?>
                            </div>
                        </div>


                 
                   
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Municipality</label>

                             <?php 

                               $in_id = $_GET['in_id'];

                                $sql = mysqli_query($connection, "SELECT Municipality FROM tblinventory WHERE invID='$in_id'");
                                while($row = mysqli_fetch_assoc($sql)){  
                                     
                            ?> 

                              
                             <select class="form-control" name="muni">
                                <option value="<?php echo $res_new['Municipality']; ?>"><?php echo $res_new['Municipality']; ?></option>
                                <option></option>

                            <?php  

                                $sql = mysqli_query($connection, "SELECT Municipality FROM tblmu ");
                                while($row = mysqli_fetch_assoc($sql)){
                                ?>

                                <option value="<?php echo $row['Municipality'];  ?>"> <?php echo $row['Municipality'];  ?></option>
                            <?php } ?>

                                </select>

                            <?php }?>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Barangay</label>

                             <?php 

                               $in_id = $_GET['in_id'];

                                $sql = mysqli_query($connection, "SELECT Barangay FROM tblinventory WHERE invID='$in_id'");
                                while($row = mysqli_fetch_assoc($sql)){  
                                     
                            ?> 

                              
                             <select class="form-control" name="brgy">
                                <option value="<?php echo $res_new['Barangay']; ?>"><?php echo $res_new['Barangay']; ?></option>
                                <option></option>

                            <?php  

                                $sql = mysqli_query($connection, "SELECT Barangay FROM tblba ");
                                while($row = mysqli_fetch_assoc($sql)){
                                ?>

                                <option value="<?php echo $row['Barangay'];  ?>"> <?php echo $row['Barangay'];  ?></option>
                            <?php } ?>

                                </select>

                            <?php }?>
                            </div>
                        </div>



                          <div class="col-md-6">
                            <div class="form-group">
                                <label>Latitude</label>

                             <?php 

                               $in_id = $_GET['in_id'];

                                $sql = mysqli_query($connection, "SELECT Latitude FROM tblinventory WHERE invID='$in_id'");
                                while($row = mysqli_fetch_assoc($sql)){  
                                     
                            ?> 

                              
                             <select class="form-control" name="lat">
                                <option value="<?php echo $res_new['Latitude']; ?>"><?php echo $res_new['Latitude']; ?></option>
                                <option></option>

                            <?php  

                                $sql = mysqli_query($connection, "SELECT lat FROM tblmarker ");
                                while($row = mysqli_fetch_assoc($sql)){
                                ?>

                                <option value="<?php echo $row['lat'];  ?>"> <?php echo $row['lat'];  ?></option>
                            <?php } ?>

                                </select>

                            <?php }?>
                            </div>
                        </div>



                  
                          <div class="col-md-6">
                            <div class="form-group">
                                <label>Longitude</label>

                             <?php 

                               $in_id = $_GET['in_id'];

                                $sql = mysqli_query($connection, "SELECT Longitude FROM tblinventory WHERE invID='$in_id'");
                                while($row = mysqli_fetch_assoc($sql)){  
                                     
                            ?> 

                              
                             <select class="form-control" name="lng">
                                <option value="<?php echo $res_new['Longitude']; ?>"><?php echo $res_new['Longitude']; ?></option>
                                <option></option>

                            <?php  

                                $sql = mysqli_query($connection, "SELECT lng FROM tblmarker ");
                                while($row = mysqli_fetch_assoc($sql)){
                                ?>

                                <option value="<?php echo $row['lng'];  ?>"> <?php echo $row['lng'];  ?></option>
                            <?php } ?>

                                </select>

                            <?php }?>
                            </div>
                        </div>

                            <button style="margin-top: 30px; margin-left: 17px;" type="submit" name="update" class="btn btn-success">Update </button>
                            <a href="manage-inventory.php"><button style="margin-top: 30px;" type="button" class="btn btn-info">Cancel</button></a>
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