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
    <title>MMSG | Importance Value</title>
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


    <div class="row pad-botm">
        <div class="col-md-12">
            <h4 class="header-line">Importance Value</h4>
        </div>
    </div>
            
<div class="row">
    <div class="col-md-12">
                    <!-- Advanced Tables -->
        <div class="panel panel-success">
            <div class="panel-heading">Importance Value</div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr style="font-size: 11px;">
                                    <th class="text-center">#</th>
                                    <th class="text-center">Municipality</th>    
                                    <th class="text-center">Barangay</th>
                                    <th class="text-center">Species</th>
                                    <th class="text-center"># of Segments Occurence</th>    
                                    <th class="text-center">Total # of Trees</th>
                                    <th class="text-center">Total Basal Area (m2)</th>  
                                    <th class="text-center">Frequency</th> 
                                    <th class="text-center">Relative Frequency</th>
                                    <th class="text-center">Relative Density</th> 
                                    <th class="text-center">Relative Dominance</th>
                                    <th class="text-center">Importance Value</th>
                                </tr>
                            </thead>
                                        
                            <tbody>
                                        
                                <?php 

                                    $sql = mysqli_query($connection, "SELECT * FROM tblimportance_value");

                                    $count = 1;
                                    
                                    while($row = mysqli_fetch_assoc($sql)){
                                                 ?>

                                    <tr class="text-center bg-white" style="font-size: 10px;">
                                        <td><?php echo $count;?></td>
                                        <td><?php echo $row['Municipality']; ?></td>
                                        <td><?php echo $row['Barangay']; ?></td>
                                        <td><?php echo $row['Species']; ?></td>
                                        <td><?php echo $row['NOSO']; ?></td>
                                        <td><?php echo $row['TONT']; ?></td>
                                        <td><?php echo $row['TBA']; ?></td>
                                        <td><?php echo $row['Frequency']; ?></td>
                                        <td><?php echo $row['RelativeFrequency']; ?></td>
                                        <td><?php echo $row['RelativeDensity']; ?></td>
                                        <td><?php echo $row['RelativeDominance']; ?></td>
                                        <td><?php echo $row['ImportanceValue']; ?></td>  

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
