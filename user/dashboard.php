<?php

include('includes/config.php');

session_start();

if(($_SESSION['ulogin'])==0)
  { 
header('location: ../index.php');
}


?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>MMSG | User Dash Board</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   
    <style type="text/css">
        .dshb_card {
            height: 250px;

            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
    </style>




</head>
<body>
      <!------MENU SECTION START-->
<?php include('includes/header.php');?>
<!-- MENU SECTION END-->
    <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">User DASHBOARD</h4>
            </div>

        </div>
             
    <div class="row">



            <div class="col-md-3 col-sm-3 col-xs-6">
                <div class="dshb_card alert alert-success back-widget-set text-center">
                    <i class="fa fa-tree fa-5x"></i>
                        <h3>
                        <?php 

                        $sql = mysqli_query($connection, "SELECT mangroveID FROM tblmangrove");
                        $count = mysqli_num_rows($sql);
                        echo $count;
                         ?>
                        </h3>

                        <h4>Mangrove Species</h4>

                        <a href="listed-mangrove-species.php"><button class="btn btn-success">View</button></a>

                </div>
            </div>


            <div class="col-md-3 col-sm-3 col-xs-6">
                <div class="dshb_card alert alert-danger back-widget-set text-center">
                    <i class="fa fa-list-alt fa-5x"></i>
                    <h3>
                         <?php 

                        $sql = mysqli_query($connection, "SELECT locID FROM tbllocation");
                        $count = mysqli_num_rows($sql);
                        echo $count;
                         ?>

                    </h3>
                        <h4>Inventory</h4>

                         <a href="mangrove-inventory.php"><button class="btn btn-danger">View</button></a>
                </div>
            </div>


            <div class="col-md-3 col-sm-3 col-xs-6">
                <div class="dshb_card alert alert-success back-widget-set text-center">
                    <i class="fa fa-list fa-5x"></i>
                    <h3>
                         <?php 

                        $sql = mysqli_query($connection, "SELECT ivID FROM tblimportance_value");
                        $count = mysqli_num_rows($sql);
                        echo $count;
                         ?>

                    </h3>
                        <h4>Importance Value</h4>

                         <a href="importance_value.php"><button class="btn btn-success">View</button></a>
                </div>
            </div>


            <div class="col-md-3 col-sm-3 col-xs-6">
                <div class="dshb_card alert alert-info back-widget-set text-center">
                    <i class="fa fa-globe fa-5x"></i>
                        <h3>
                        <?php 

                        $sql = mysqli_query($connection, "SELECT locID FROM tbllocation");
                        $count = mysqli_num_rows($sql);
                        echo $count;
                         ?>
                        </h3>

                        <h4>Mangrove Map</h4>

                        <a href="mangrove-location.php"><button class="btn btn-info">View</button></a>

                </div>
            </div>

            

            <div class="col-md-3 col-sm-3 col-xs-6">
                <div class="dshb_card alert alert-info back-widget-set text-center">
                    <i class="fa fa-map-marker fa-5x"></i>
                        <h3>
                        <?php 

                        $sql = mysqli_query($connection, "SELECT id FROM tblmarker");
                        $count = mysqli_num_rows($sql);
                        echo $count;
                         ?>
                        </h3>

                        <h4>Marker</h4>

                        <a href="manage-marker.php"><button class="btn btn-info">Access</button></a>

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

