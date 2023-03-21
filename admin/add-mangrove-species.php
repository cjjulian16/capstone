<?php

include('includes/config.php');


if(isset($_POST['add']))
{
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$sname=$_POST['sname'];
$cat=$_POST['cat'];

$mangroveimage=$_FILES["mangrovepic"]["name"];

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

$sql = mysqli_query($connection, "INSERT INTO  tblmangrove(FamilyName, LocalName, ScientificName, Category, mangroveimg) VALUES('$fname','$lname','$sname','$cat','$imgnewname')");

echo "<script>alert('Mangrove Species inserted successfully');</script>";
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
    <title>MMSG | Add Mangrove Species</title>
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
                <h4 class="header-line">Add Mangrove Species </h4>
            </div>
        </div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-success">
            <div class="panel-heading">Mangrove Species Info</div>
                <div class="panel-body">
                    <form role="form" method="post" enctype="multipart/form-data">




                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Family Name</label>
                              <select class="form-control" name="fname">
                                <option value="" >Select Family Name</option>

                            <?php  

                                $sql = mysqli_query($connection, "SELECT Famname FROM tblps ");
                                while($row = mysqli_fetch_assoc($sql)){
                                ?>

                                <option> <?php echo $row['Famname'];  ?></option>
                            <?php } ?>

                                </select>
                        </div>
                    </div>


                     <div class="col-md-6">
                        <div class="form-group">
                            <label>Local Name</label>
                              <select class="form-control" name="lname">
                                <option value="" >Select Local Name</option>

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
                            <label>Scientific Name</label>
                              <select class="form-control" name="sname">
                                <option value="" >Select Scientific Name</option>

                            <?php  

                                $sql = mysqli_query($connection, "SELECT SciName FROM tblss ");
                                while($row = mysqli_fetch_assoc($sql)){
                                ?>

                                <option> <?php echo $row['SciName'];  ?></option>
                            <?php } ?>

                                </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Mangrove Category</label>
                              <select class="form-control" name="cat">
                                <option value="" >Select Mangrove Category</option>

                            <?php  

                                $sql = mysqli_query($connection, "SELECT Category FROM tblcat ");
                                while($row = mysqli_fetch_assoc($sql)){
                                ?>

                                <option> <?php echo $row['Category'];  ?></option>
                            <?php } ?>

                                </select>
                        </div>
                    </div>


<div class="col-md-6">  
    <div class="form-group">
        <label>Mangrove Picture<span style="color:red;">*</span></label>
        <input class="form-control" type="file" name="mangrovepic" autocomplete="off"   required="required" />
    </div>
</div>

<button style="margin-left: 16px; margin-top: 30px;" type="submit" name="add" id="add" class="btn btn-success">Submit </button>
<a href="manage-mangrove-species.php"><button style="margin-top: 30px;" type="button" class="btn btn-info">Back</button></a>
 
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
         <?php?> 