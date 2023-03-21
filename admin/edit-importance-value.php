<?php

include('includes/config.php');

$iv_id = $_GET['iv_id'];
$sql_new = mysqli_query($connection, "SELECT * FROM tblimportance_value WHERE ivID='$iv_id'");
$res_new = mysqli_fetch_assoc($sql_new);

if(isset($_POST['update']))
{

// $in_id_f=$_POST['in_id_f'];


    $muni = $_POST['muni'];
    $brgy = $_POST['brgy'];
    $species = $_POST['species'];
    $noso = $_POST['noso'];
    $tont = $_POST['tont'];
    $tba = $_POST['tba'];
    $freq = $_POST['freq'];
    $rf = $_POST['rf'];
    $rden = $_POST['rden'];
    $rdom = $_POST['rdom'];
    $iv = $_POST['iv'];
  

$sql = mysqli_query($connection, "UPDATE tblimportance_value SET Municipality='$muni',Barangay='$brgy',Species='$species',NOSO='$noso',TONT='$tont',TBA='$tba',Frequency='$freq',RelativeFrequency='$rf',RelativeDensity='$rden',RelativeDominance='$rdom',ImportanceValue='$iv' WHERE ivID='$iv_id'");

echo "<script>alert('Data updated successfully');</script>";
echo "<script>window.location.href='manage-importance-value.php'</script>";


}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>MMSG | Edit Importance Value </title>
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
            <h4 class="header-line">Edit Importance Value</h4>
        </div>
    </div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-success">
            <div class="panel-heading">Importance Value Info</div>
                <div class="panel-body">
                    <form role="form" method="post">


                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Municipality</label>


                             <?php 

                               $iv_id = $_GET['iv_id'];

                                $sql = mysqli_query($connection, "SELECT Municipality FROM tblimportance_value WHERE ivID='$iv_id'");
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

                               $iv_id = $_GET['iv_id'];

                                $sql = mysqli_query($connection, "SELECT Barangay FROM tblimportance_value WHERE ivID='$iv_id'");
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
                                <label>Species</label>

                             <?php 

                               $iv_id = $_GET['iv_id'];

                                $sql = mysqli_query($connection, "SELECT Species FROM tblimportance_value WHERE ivID='$iv_id'");
                                while($row = mysqli_fetch_assoc($sql)){  
                                     
                            ?> 

                              
                             <select class="form-control" name="species">
                                <option value="<?php echo $res_new['Species']; ?>"><?php echo $res_new['Species']; ?></option>
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
                            <label># of Segments Occurence</label>

                            <?php 

                                $iv_id = $_GET['iv_id'];

                                $sql = mysqli_query($connection, "SELECT * FROM tblimportance_value WHERE ivID='$iv_id'");
                                while($row = mysqli_fetch_assoc($sql)){  
                                     
                            ?> 
                            <input type="hidden" name="iv_id" value="<?php echo $iv_id; ?>">
                            <input class="form-control" type="text" name="noso" value="<?php echo $row['NOSO'];?>" required >
                            <?php }?>

                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Total # of Trees</label>

                            <?php 

                                $iv_id = $_GET['iv_id'];

                                $sql = mysqli_query($connection, "SELECT * FROM tblimportance_value WHERE ivID='$iv_id'");
                                while($row = mysqli_fetch_assoc($sql)){  
                                     
                            ?> 
                            <input type="hidden" name="iv_id" value="<?php echo $iv_id; ?>">
                            <input class="form-control" type="text" name="tont" value="<?php echo $row['TONT'];?>" required >
                            <?php }?>

                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Total Basal Area (m2)</label>

                            <?php 

                                $iv_id = $_GET['iv_id'];

                                $sql = mysqli_query($connection, "SELECT * FROM tblimportance_value WHERE ivID='$iv_id'");
                                while($row = mysqli_fetch_assoc($sql)){  
                                     
                            ?> 
                            <input type="hidden" name="iv_id" value="<?php echo $iv_id; ?>">
                            <input class="form-control" type="text" name="tba" value="<?php echo $row['TBA'];?>" required >
                            <?php }?>

                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Frequency</label>

                            <?php 

                                $iv_id = $_GET['iv_id'];

                                $sql = mysqli_query($connection, "SELECT * FROM tblimportance_value WHERE ivID='$iv_id'");
                                while($row = mysqli_fetch_assoc($sql)){  
                                     
                            ?> 
                            <input type="hidden" name="iv_id" value="<?php echo $iv_id; ?>">
                            <input class="form-control" type="text" name="freq" value="<?php echo $row['Frequency'];?>" required >
                            <?php }?>

                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Relative Frequency</label>

                            <?php 

                                $iv_id = $_GET['iv_id'];

                                $sql = mysqli_query($connection, "SELECT * FROM tblimportance_value WHERE ivID='$iv_id'");
                                while($row = mysqli_fetch_assoc($sql)){  
                                     
                            ?> 
                            <input type="hidden" name="iv_id" value="<?php echo $iv_id; ?>">
                            <input class="form-control" type="text" name="rf" value="<?php echo $row['RelativeFrequency'];?>" required >
                            <?php }?>

                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Relative Density</label>

                            <?php 

                                $iv_id = $_GET['iv_id'];

                                $sql = mysqli_query($connection, "SELECT * FROM tblimportance_value WHERE ivID='$iv_id'");
                                while($row = mysqli_fetch_assoc($sql)){  
                                     
                            ?> 
                            <input type="hidden" name="iv_id" value="<?php echo $iv_id; ?>">
                            <input class="form-control" type="text" name="rden" value="<?php echo $row['RelativeDensity'];?>" required >
                            <?php }?>

                        </div>
                    </div>

                     <div class="col-md-6">
                        <div class="form-group">
                            <label>Relative Dominance</label>

                            <?php 

                                $iv_id = $_GET['iv_id'];

                                $sql = mysqli_query($connection, "SELECT * FROM tblimportance_value WHERE ivID='$iv_id'");
                                while($row = mysqli_fetch_assoc($sql)){  
                                     
                            ?> 
                            <input type="hidden" name="iv_id" value="<?php echo $iv_id; ?>">
                            <input class="form-control" type="text" name="rdom" value="<?php echo $row['RelativeDominance'];?>" required >
                            <?php }?>

                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Importance Value</label>

                            <?php 

                                $iv_id = $_GET['iv_id'];

                                $sql = mysqli_query($connection, "SELECT * FROM tblimportance_value WHERE ivID='$iv_id'");
                                while($row = mysqli_fetch_assoc($sql)){  
                                     
                            ?> 
                            <input type="hidden" name="iv_id" value="<?php echo $iv_id; ?>">
                            <input class="form-control" type="text" name="iv" value="<?php echo $row['ImportanceValue'];?>" required >
                            <?php }?>

                        </div>
                    </div>
                    

                            <button style="margin-top: 30px; margin-left: 17px;" type="submit" name="update" class="btn btn-success">Update </button>
                            <a href="manage-importance-value.php"><button style="margin-top: 30px;" type="button" class="btn btn-info">Cancel</button></a>
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