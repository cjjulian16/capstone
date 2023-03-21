<?php

session_start();
include('includes/config.php');

if(($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}

else{ 
// code for block user    
if(isset($_GET['inactive_id']))
{
$id=$_GET['inactive_id'];
$status=0;
$sql = mysqli_query($connection, "UPDATE tblusers SET Status = '$status'  WHERE id = '$id'");

header('location:reg-users.php');
}



//code for active users
if(isset($_GET['id']))
{
$id=$_GET['id'];
$status=1;
$sql = mysqli_query($connection, "UPDATE tblusers SET Status = '$status'  WHERE id = '$id'");

header('location:reg-users.php');
}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>MMSG | Manage Reg Users</title>
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
                <h4 class="header-line">Manage Reg Users</h4>
    </div>


        </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-success">
                        <div class="panel-heading">
                          Reg Users
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">User ID</th>
                                            <th class="text-center">First Name</th>
                                            <th class="text-center">Middle Name</th>
                                            <th class="text-center">Last Name</th>
                                            <th class="text-center">Email id </th>
                                            <th class="text-center">Mobile Number</th>
                                            <th class="text-center">Reg Date</th>
                                            <!-- <th class="text-center">Status</th>
                                            <th class="text-center">Action</th>
 -->                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $sql = mysqli_query($connection, "SELECT * FROM tblusers");
                                         $count = 1;
                                                while($row = mysqli_fetch_assoc($sql)){
                                                 ?>
                                                                                  
                                          <tr class="text-center bg-white">
                                            <td><?php echo $count;?></td>
                                            <td><?php echo $row['UserID']; ?></td>
                                            <td><?php echo $row['userFname']; ?></td>
                                            <td><?php echo $row['userMname']; ?></td>
                                            <td><?php echo $row['userLname']; ?></td>
                                            <td><?php echo $row['EmailId']; ?></td>
                                            <td><?php echo $row['MobileNumber']; ?></td>
                                            <td><?php echo $row['RegDate']; ?></td>
                                                      
                                            <!-- <td class="center"><?php if('Status==1')
                                            {
                                                echo ("Active");
                                            } else {
                                                echo ("Blocked");
                                            }

                                            ?></td> -->
                                            
                                            <!-- <td class="center"><?php if('Status==1')
                                             { 
                                                ?>
                                            <a href="reg-users.php?inactive_id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure you want to block this user?');" >  <button class="btn btn-danger"> Inactive</button>
                                            <?php } 

                                            else {?>

                                            <a href="reg-users.php?id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure you want to active this user?');"><button class="btn btn-primary"> Active</button> 
                                            <?php }?>



                                          
                                            </td> -->
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
<?php }?>
