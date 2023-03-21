<?php

include('includes/config.php');

$loc_id = $_GET['loc_id'];
$sql_new = mysqli_query($connection, "SELECT * FROM tbllocation WHERE locID='$loc_id'");
$res_new = mysqli_fetch_assoc($sql_new);

if(isset($_POST['update']))
{

 
$loc_id_f = $_POST['loc_id_f'];
$s_name = $_POST['s_name'];
$l_name = $_POST['l_name'];
$sc_name = $_POST['sc_name'];
$cat = $_POST['cat'];
$lat = $_POST['lat'];
$brgy = $_POST['brgy'];
$muni = $_POST['muni'];
$lng = $_POST['lng'];

$sql = mysqli_query($connection, "UPDATE tbllocation SET FamilyName='$s_name', LocalName='$l_name', ScientificName='$sc_name', Category='$cat', Barangay='$brgy', Municipality='$muni', Latitude='$lat', Longitude='$lng' WHERE locID='$loc_id_f'");

echo "<script>alert('Location info updated successfully');</script>";
echo "<script>window.location.href='manage-location.php'</script>";


}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>MMSG | Edit Location</title>
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
            <h4 class="header-line">Edit Location</h4>
        </div>
    </div>

<div class="row">
    <div class="col-md12 col-sm-12 col-xs-12">
        <div class="panel panel-success">
            <div class="panel-heading">Location Info</div>
                <div class="panel-body">
                    <form method="post" >

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Mangrove Image</label>

                            <?php 

                                $loc_id = $_GET['loc_id'];

                                $sql = mysqli_query($connection, "SELECT * FROM tbllocation WHERE locID='$loc_id'");
                                while($row = mysqli_fetch_assoc($sql)){  
                                     
                            ?> 
                                <input type="hidden" name="loc_id" value="<?php echo $loc_id; ?>">
                                <img src="locationimage/<?php echo $row['mangroveimg'];?>" height="100" width="100">
                                <a href="edit-mangrove-image.php?loc_l_id=<?php echo $row['locID'];?>">Change Mangrove Image</a>
                           
                            <?php }?>


                            </div>
                        </div>



                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Family Name</label>

                             <?php 

                                $loc_id = $_GET['loc_id'];

                                $sql = mysqli_query($connection, "SELECT FamilyName FROM tbllocation WHERE locID='$loc_id'");
                                while($row = mysqli_fetch_assoc($sql)){  
                                     
                            ?> 

                              
                             <select class="form-control" name="s_name">
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

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Local Name</label>

                         
                             <?php 

                                $loc_id = $_GET['loc_id'];

                                $sql = mysqli_query($connection, "SELECT LocalName FROM tbllocation WHERE locID='$loc_id'");
                                while($row = mysqli_fetch_assoc($sql)){  
                                     
                            ?> 
                                <select class="form-control" name="l_name">
                                    <option value="<?php echo $res_new['LocalName']; ?>"><?php echo $res_new['LocalName']; ?></option>
                                    <option></option>

                                <?php  

                                    $sql = mysqli_query($connection, "SELECT LocName FROM tblls ");
                                    while($row = mysqli_fetch_assoc($sql)){
                                    ?>

                                    <option value="<?php echo $row['LocName']; ?>"> <?php echo $row['LocName'];  ?></option>
                                <?php } ?>

                                </select>

                            <?php }?>

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Scientific Name</label>

                        
                             <?php 

                                $loc_id = $_GET['loc_id'];

                                $sql = mysqli_query($connection, "SELECT ScientificName FROM tbllocation WHERE locID='$loc_id'");
                                while($row = mysqli_fetch_assoc($sql)){  
                                     
                            ?> 
                            <select class="form-control" name="sc_name">
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
                                <label>Mangrove Category</label>

                        
                             <?php 

                                $loc_id = $_GET['loc_id'];

                                $sql = mysqli_query($connection, "SELECT Category FROM tbllocation WHERE locID='$loc_id'");
                                while($row = mysqli_fetch_assoc($sql)){  
                                     
                            ?> 
                            <select class="form-control" name="cat">
                                <option value="<?php echo $res_new['Category']; ?>"><?php echo $res_new['Category']; ?></option>
                                    <option></option>

                                <?php  

                                    $sql = mysqli_query($connection, "SELECT Category FROM tblcat ");
                                    while($row = mysqli_fetch_assoc($sql)){
                                    ?>

                                    <option value="<?php echo $row['Category'];  ?>"> <?php echo $row['Category'];  ?></option>
                                <?php } ?>

                                </select>

                            <?php }?>

                            </div>
                        </div>



                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Barangay</label>

                        
                             <?php 

                                $loc_id = $_GET['loc_id'];

                                $sql = mysqli_query($connection, "SELECT Barangay FROM tbllocation WHERE locID='$loc_id'");
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
                                <label>Municipality</label>

                        
                             <?php 

                                $loc_id = $_GET['loc_id'];

                                $sql = mysqli_query($connection, "SELECT Municipality FROM tbllocation WHERE locID='$loc_id'");
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
                                <label>Latitude</label>

                            <?php 

                                $loc_id = $_GET['loc_id'];

                                $sql = mysqli_query($connection, "SELECT * FROM tbllocation WHERE locID='$loc_id'");
                                while($row = mysqli_fetch_assoc($sql)){  
                                     
                            ?> 
                            <input type="hidden" name="loc_id_f" value="<?php echo $loc_id; ?>">
                            <input class="form-control" type="text" name="lat" value="<?php echo $row['Latitude'];?>" required >
                            <?php }?>

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Longitude</label>

                            <?php 

                                $loc_id = $_GET['loc_id'];

                                $sql = mysqli_query($connection, "SELECT * FROM tbllocation WHERE locID='$loc_id'");
                                while($row = mysqli_fetch_assoc($sql)){  
                                     
                            ?> 
                            <input type="hidden" name="loc_id_f" value="<?php echo $loc_id; ?>">
                            <input class="form-control" type="text" name="lng" value="<?php echo $row['Longitude'];?>" required >
                            <?php }?>

                            </div>
                        </div>


                        <div class="col-md-12">
                            <button type="submit" name="update" class="btn btn-success">Update </button>
                            <a href="manage-location.php"><button type="button" class="btn btn-info">Cancel</button></a>
                        </div>
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
