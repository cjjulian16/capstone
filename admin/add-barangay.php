<?php

include('includes/config.php');

if(isset($_POST['del'])) {
    $baID = $_POST['brgy-id'];

    $sql_delete = mysqli_query($connection, "DELETE FROM tblba WHERE baID='$baID'");

    echo "<script>window.alert('Barangay deleted successfully!')</script>";
    echo "<script>window.location.href='add-barangay.php'</script>";
}

if(isset($_POST['save'])){
    $brgy = $_POST['brgy'];
   

    $sql = mysqli_query($connection, "INSERT INTO tblba (Barangay) VALUES ('$brgy')");
    
    header("location: add-barangay.php");
    
     }

?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>MMSG | Add Barangay</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
       <!-- DATATABLE STYLE  -->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
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
            <h4 class="header-line">Add Barangay</h4>
        </div>
    </div>

<div class="row">
    <div class="col-md-5">
        <div class="panel panel-success">
            <div class="panel-heading">Barangay Info</div>
                <div class="panel-body">
                    <form role="form" method="post">
                        <div class="form-group">
                            <label>Barangay</label>
                            <input class="form-control" type="text" name="brgy" autocomplete="off"  required />
                        </div>

                            <button type="submit" name="save" class="btn btn-success">Save </button>
                    </form>
                </div>
        </div>
    </div>



      <div class="col-md-7">
                    <!-- Advanced Tables -->
        <div class="panel panel-success">
            <div class="panel-heading">Barangay Listing</div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Barangay</th>    
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                                        
                            <tbody>
                                        
                                <?php 
                                    $count = 1;

                                    $sql = mysqli_query($connection, "SELECT * FROM tblba");

                                    while($row = mysqli_fetch_assoc($sql)){
                                                 ?>

                                    <tr class="text-center bg-white">
                                        <td><?php echo $count;?></td>
                                        <td><?php echo $row['Barangay']; ?></td>


                                                    
                                    <td class="text-center"> 
                                        <div class="adjust-btn">
                                            <div style="padding-right: 5px;">    
                                                <a href="edit-barangay.php?ba_id=<?php echo $row['baID'];?>">
                                                    <button name="upd" class="btn btn-primary"><i class="fa fa-edit "></i> Edit</button>
                                                </a>
                                            </div>


                                            <div>  
                                                <form method="post" action="add-barangay.php">
                                                    <input type="hidden" name="brgy-id" value="<?php echo $row['baID']; ?>">
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
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
        <!-- DATATABLE SCRIPTS  -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
</body>
</html>

