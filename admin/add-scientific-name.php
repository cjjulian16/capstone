<?php

include('includes/config.php');


if(isset($_POST['del'])) {
    $ssID = $_POST['msn-id'];

    $sql_delete = mysqli_query($connection, "DELETE FROM tblss WHERE ssID='$ssID'");

    echo "<script>window.alert('Scientific Name deleted successfully!')</script>";
    echo "<script>window.location.href='add-scientific-name.php'</script>";
}

if(isset($_POST['save'])){
    $sname = $_POST['sname'];
   

    $sql = mysqli_query($connection, "INSERT INTO tblss (SciName) VALUES ('$sname')");

    header("location: add-scientific-name.php?action=insert");
    
     }
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>MMSG | Add Scientific Name</title>
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
                <h4 class="header-line">Add Scientific Name</h4>
            </div>
        </div>

<div class="row">
    <div class="col-md-5">
        <div class="panel panel-success">
            <div class="panel-heading">Scientific Name Info</div>
                <div class="panel-body">
                    <form role="form" method="post">
                        <div class="form-group">
                            <label>Scientific Name</label>
                            <input class="form-control" type="text" name="sname" autocomplete="off"  required />
                        </div>

                            <button type="submit" name="save" class="btn btn-success">Save </button>
                    </form>
                </div>
        </div>
    </div>




   <div class="col-md-7">
                    <!-- Advanced Tables -->
        <div class="panel panel-success">
            <div class="panel-heading">Scientific Name Listing</div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Scientific Name</th>    
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                                        
                            <tbody>
                                        
                                <?php 
                                    $count = 1;

                                    $sql = mysqli_query($connection, "SELECT * FROM tblss");

                                    while($row = mysqli_fetch_assoc($sql)){
                                                 ?>

                                    <tr class="text-center bg-white">
                                        <td><?php echo $count;?></td>
                                        <td><i><?php echo $row['SciName']; ?></i></td>


                                                    
                                    <td class="text-center"> 
                                        <div class="adjust-btn">
                                            <div style="padding-right: 5px;">
                                                <a href="edit-scientific-name.php?sn_id=<?php echo $row['ssID'];?>">      
                                                    <button name="upd" class="btn btn-primary"><i class="fa fa-edit "></i> Edit</button> 
                                                </a>
                                            </div>


                                            <div>  
                                                <form method="post" action="add-scientific-name.php">
                                                    <input type="hidden" name="msn-id" value="<?php echo $row['ssID']; ?>">
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

