<?php

include('includes/config.php');

if(isset($_POST['del'])) {
    $id = $_POST['locdel-id'];

    $sql_delete = mysqli_query($connection, "DELETE FROM tblmarker WHERE id='$id'");

    echo "<script>window.alert('Data deleted successfully!')</script>";
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
    <title>MMSG | Manage Marker</title>
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
        <a href="add-marker.php"><button style="margin-top: 20px; padding: 10px; " class="btn btn-success btn-md"><strong>Add Marker</strong></button></a>
    </div>

    <hr>

   <!--  <div class="row pad-botm">
        <div class="col-md-12">
            <h4 class="header-line">Manage Marker</h4>
        </div>


    </div> -->
            
<div class="row">
    <div class="col-md-12">
                    <!-- Advanced Tables -->
        <div class="panel panel-success">
            <div class="panel-heading">Manage Marker</div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Mangrove Name</th>    
                                    <th class="text-center">Location Latitude</th>
                                    <th class="text-center">Location Longitude</th> 
                                    <th class="text-center">Insertion Date</th>    
                                    <th class="text-center">Action</th>  
                                </tr>
                            </thead>
                                        
                            <tbody>
                                        
                                <?php 

                                    $sql = mysqli_query($connection, "SELECT * FROM tblmarker");

                                    $count = 1;

                                    while($row = mysqli_fetch_assoc($sql)){
                                                 ?>

                                    <tr class="text-center bg-white">
                                        <td><?php echo $count;?></td>
                                        <td><?php echo $row['mangrovename']; ?></td>
                                        <td><?php echo $row['lat']; ?></td>
                                        <td><?php echo $row['lng']; ?></td>
                                        <td><?php echo $row['InsertionDate']; ?></td>

                                                    
                                    <td class="text-center"> 
                                        <div class="adjust-btn">
                                            <div style="padding-right: 5px;">    
                                                <a href="edit-marker.php?loc_id=<?php echo $row['id'];?>">
                                                    <button name="upd" class="btn btn-primary"><i class="fa fa-edit "></i> Edit</button>
                                                </a>
                                            </div>


                                            <div>  
                                                <form method="post" action="manage-marker.php">
                                                    <input type="hidden" name="locdel-id" value="<?php echo $row['id']; ?>">
                                                    <button type="submit" name="del" class="btn btn-danger"><i class="fa fa-pencil"></i> Delete</button>
                                                </form>
                                            </div> 
                                        </div>
                                    </td>
                                             

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
