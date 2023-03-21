<?php

include('includes/config.php');

if(isset($_POST['del'])) {
    $conID = $_POST['cont-id'];

    $sql_delete = mysqli_query($connection, "DELETE FROM tblcontact WHERE conID='$conID'");

    echo "<script>window.alert('Data deleted successfully!')</script>";
    echo "<script>window.location.href='user-feedback.php'</script>";
}

?>





<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>MMSG | Manage User Feedback</title>
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
                <h4 class="header-line">Manage User Feedback</h4>
    </div>

   <!--  <div class="row pad-botm">
        <div class="col-md-12">
            <h4 class="header-line">Manage Inventory</h4>
        </div>
    </div> -->
            
<div class="row">
    <div class="col-md-12">
                    <!-- Advanced Tables -->
        <div class="panel panel-success">
            <div class="panel-heading">Manage User Feedback</div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Full Name</th>    
                                    <th class="text-center">Mobile No.</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Message</th>    
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                                        
                            <tbody>
                                        
                                <?php 

                                    $sql = mysqli_query($connection, "SELECT * FROM tblcontact");

                                    $count = 1;
                                    
                                    while($row = mysqli_fetch_assoc($sql)){
                                                 ?>

                                    <tr class="text-center bg-white">
                                        <td><?php echo $count;?></td>
                                        <td><?php echo $row['Name']; ?></td>
                                        <td><?php echo $row['Mobile']; ?></td>
                                        <td><?php echo $row['Email']; ?></td>
                                        <td><?php echo $row['Message']; ?></td>
                                                    
                                    <td class="text-center"> 
                                        <div class="adjust-btn">
                                        
                                            <div>  
                                                <form method="post" action="user-feedback.php">
                                                    <input type="hidden" name="cont-id" value="<?php echo $row['conID']; ?>">
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
