<?php

include('includes/config.php');

if(isset($_POST['save'])){
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
  
   

    $sql = mysqli_query($connection, "INSERT INTO tblimportance_value (Municipality, Barangay, Species, NOSO, TONT, TBA, Frequency, RelativeFrequency, RelativeDensity, RelativeDominance, ImportanceValue) VALUES ('$muni','$brgy','$species','$noso','$tont','$tba','$freq','$rf','$rden','$rdom','$iv')");
    
    echo "<script>alert('Data inserted successfully');</script>";
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
    <title>MMSG | Add Importance Value</title>
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
            <h4 class="header-line">Add Importance Value</h4>
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
                            <label>Species</label>
                              <select class="form-control" name="species">
                                <option value="" >Select Species</option>

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
                            <label># of Segments Occurence</label>
                             <input class="form-control" type="text" name="noso" autocomplete="off"  required />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Total # of Trees</label>
                             <input class="form-control" type="text" name="tont" autocomplete="off"  required />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Total Basal Area (m2)</label>
                             <input class="form-control" type="text" name="tba" autocomplete="off"  required />
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Frequency</label>
                             <input class="form-control" type="text" name="freq" autocomplete="off"  required />
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Relative Frequency</label>
                             <input class="form-control" type="text" name="rf" autocomplete="off"  required />
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Relative Density</label>
                             <input class="form-control" type="text" name="rden" autocomplete="off"  required />
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Relative Dominance</label>
                             <input class="form-control" type="text" name="rdom" autocomplete="off"  required />
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Importance Value</label>
                             <input class="form-control" type="text" name="iv" autocomplete="off"  required />
                        </div>
                    </div>


                            <button style="margin-top: 30px; margin-left: 17px;" type="submit" name="save" class="btn btn-success">Save </button>
                            <a href="manage-importance-value.php"><button style="margin-top: 30px;" type="button" class="btn btn-info">Back</button></a>
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

