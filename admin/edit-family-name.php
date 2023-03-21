<?php

include('includes/config.php');

$ps_id = $_GET['ps_id'];
if(isset($_POST['update']))
{

$ps_id_f=$_POST['ps_id_f'];
$fname=$_POST['fname'];
$sql = mysqli_query($connection, "UPDATE tblps SET FamName='$fname' WHERE psID='$ps_id_f'");

header('location:add-family-name.php?action=update');


}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>MMSG | Edit Family Name</title>
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
            <h4 class="header-line">Edit Family Name</h4>
        </div>
    </div>

<div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
        <div style="margin-bottom: 100px;" class="panel panel-success">
            <div class="panel-heading">Family Name Info</div>
                <div class="panel-body">
                    <form role="form" method="post">
                        <div class="form-group">
                            <label>Family Name</label>

                            <?php 

                                $ps_id = $_GET['ps_id'];

                                $sql = mysqli_query($connection, "SELECT * FROM tblps WHERE psID='$ps_id'");
                                while($row = mysqli_fetch_assoc($sql)){  
                                     
                            ?> 

                             <input type="hidden" name="ps_id_f" value="<?php echo $ps_id; ?>">
                            <input class="form-control" type="text" name="fname" value="<?php echo $row['FamName'];?>" required >
                            <?php }?>
                        </div>

                            <button type="submit" name="update" class="btn btn-success">Update </button>
                             <a href="add-family-name.php"><button type="button" class="btn btn-info">Cancel</button></a>
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

