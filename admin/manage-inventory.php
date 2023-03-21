<?php

include('includes/config.php');

?>





<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>MMSG | Manage Inventory</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- DATATABLE STYLE  -->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
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

    <div>
        <a href="generate-inventory-report.php"><button style="margin-top: 20px; padding: 10px; " class="btn btn-success btn-md"><strong>Generate Report</strong></button></a>
        <a href="dashboard.php"><button style="margin-top: 20px; padding: 10px; " class="btn btn-info btn-md"><strong>Back</strong></button></a>
    </div>

    <hr>

   <!--  <div class="row pad-botm">
        <div class="col-md-12">
            <h4 class="header-line">Manage Inventory</h4>
        </div>
    </div> -->
            
<div class="row">
    <div class="col-md-12">
                    <!-- Advanced Tables -->
        <div class="panel panel-success">
            <div class="panel-heading">Mangrove Inventory Listing</div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr style="font-size: 12px;">
                                    <th class="text-center">#</th>
                                    <th class="text-center">Mangrove Image</th>
                                    <th class="text-center">Family Name</th>
                                    <th class="text-center">Local Name</th>
                                    <th class="text-center">Scientific Name</th>
                                    <th class="text-center">Category</th>
                                    <th class="text-center">Barangay</th>
                                    <th class="text-center">Municipality</th>
                                    <th class="text-center">Latitude</th>
                                    <th class="text-center">Longitude</th>
                                </tr>
                            </thead>
                                        
                            <tbody>
                                        
                                <?php 

                                    $sql = mysqli_query($connection, "SELECT * FROM tbllocation");

                                    $count = 1;
                                    
                                    while($row = mysqli_fetch_assoc($sql)){
                                                 ?>

                                    <tr class="text-center bg-white" style="font-size: 11px;">

                                        <td><?php echo $count;?></td>
                                        <td width="150"><img style="height: 80px; width: 100px;" src="locationimage/<?php echo $row['mangroveimg'];?>"></td>
                                        <td><?php echo $row['FamilyName'];?></td>
                                        <td><?php echo $row['LocalName'];?></td>
                                        <td><i><?php echo $row['ScientificName'];?></i></td>
                                        <td><?php echo $row['Category'];?></td>
                                        <td><?php echo $row['Barangay'];?></td>
                                        <td><?php echo $row['Municipality'];?></td>
                                        <td><?php echo $row['Latitude'];?></td>
                                        <td><?php echo $row['Longitude'];?></td>
                                             
                                    </tr>

                                <?php 
                                     $count++;
                                 } ?>
                                        
                                     
                            </tbody>
                    </table>
                </div>
                            
            </div>
        </div>
    <!--End Advanced Tables -->
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
    <!-- DATATABLE SCRIPTS  -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>

</body>
</html>
