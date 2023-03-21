<?php

include('includes/config.php');

// $ms_id = $_GET['ms_id'];
if(isset($_POST['update']))
{

$ms_id_f = $_POST['ms_id_f'];

$mangroveimage=$_FILES["mangrovepic"]["name"];

$cimage=$_POST['curremtimage'];
$cpath="mangroveimage"."/".$cimage;

$extension = substr($mangroveimage,strlen($mangroveimage)-4,strlen($mangroveimage));

$allowed_extensions = array(".jpg","jpeg",".png",".gif");

$imgnewname=md5($mangroveimage.time()).$extension;


if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else
{
    move_uploaded_file($_FILES["mangrovepic"]["tmp_name"],"mangroveimage/".$imgnewname);

$sql = mysqli_query($connection, "UPDATE  tblmangrove SET mangroveimg='$imgnewname' WHERE mangroveID='$ms_id_f'");

echo "<script>alert('Mangrove image updated successfully');</script>";
echo "<script>window.location.href='manage-mangrove-species.php'</script>";

}
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>MMSG | Edit Mangrove Image</title>
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
            <h4 class="header-line">Change Mangrove Image</h4>
        </div>
    </div>

<div class="row">
    <div class="col-md12 col-sm-12 col-xs-12">
        <div class="panel panel-success">
            <div class="panel-heading">Mangrove Info</div>
                <div class="panel-body">
                    <form role="form" method="post" enctype="multipart/form-data" action="change-mangrove-image.php">

                         <?php 

                                $ms_id = $_GET['ms_id'];

                                $sql = mysqli_query($connection, "SELECT mangroveimg FROM tblmangrove WHERE mangroveID='$ms_id'");
                                while($row = mysqli_fetch_assoc($sql)){  
                                     
                            ?> 
                                <img src="mangroveimage/<?php echo $row['mangroveimg'];?>" height="100" width="100">


                    
                          
                
       
               <?php } ?>            


                    <input type="hidden" name="ms_id_f" value="<?php echo $ms_id; ?>">
                    <input type="hidden" name="curremtimage" value="<?php echo $row['$mangroveimg'];?>">

        <div class="col-md-6">  
            <div class="form-group">
                <label>Mangrove Picture<span style="color:red;">*</span></label>
                <input class="form-control" type="file" name="mangrovepic" autocomplete="off" required="required">
            </div>
        </div>


         <div class="col-md-12">
            <button type="submit" name="update" class="btn btn-success">Update </button>
        </div>
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

