<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Generate Inventory Report</title>
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

    <style type="text/css" media="print">
    	@media print{
    		.noprint, .noprint *{
    			display: none; !important
    		}

    		.lay2{
    			text-align: center;
    			margin-top: -80px;
    		}

    		.lay3{
    			text-align: right;
    				margin-top: -55px;
    		}
    	}
    </style>
</head>
<body >
	<div class="container">
		<img style="width: 100%; height: 150px; margin-top: 40px;" src="assets/img/denr_header.PNG">

		<center>
			<h3 style="margin-top: 30px;">Inventory List</h3>
			<hr>
		</center>



	<div class="col-md-12 ">
			<div class="col-md-5">
		<div>
			Month of: <b><u><?php echo date('F, Y');?></u></b> 
		</div>

		<!-- Nueva Valencia Couting  -->

		<div>
			Sibunag:
			<b><u><?php 

			   include('includes/config.php');

         $sql = mysqli_query($connection, "SELECT locID FROM tbllocation WHERE Municipality='Sibunag'");
         $count = mysqli_num_rows($sql);
         echo $count;
          ?></u></b> 
		</div>

		<div>
			Jordan:
			<b><u><?php 

			   include('includes/config.php');

         $sql = mysqli_query($connection, "SELECT locID FROM tbllocation WHERE Municipality='Jordan'");
         $count = mysqli_num_rows($sql);
         echo $count;
          ?></u></b> 
		</div>
	</div>

				<div class="col-md-5 lay2">

		<div>
			Nueva Valencia:
			   <b><u><?php 

			   include('includes/config.php');

         $sql = mysqli_query($connection, "SELECT locID FROM tbllocation WHERE Municipality='Nueva Valencia'");
         $count = mysqli_num_rows($sql);
         echo $count;
          ?></u></b> 
		</div>

		<div>
			San Lorenzo:
			     <b><u><?php 

			   include('includes/config.php');

         $sql = mysqli_query($connection, "SELECT locID FROM tbllocation WHERE Municipality='San Lorenzo'");
         $count = mysqli_num_rows($sql);
         echo $count;
          ?></u></b> 
		</div>
	</div>

				<div class="col-md-2 lay3">

		<div>
			Buenavista:
			    <b><u><?php 

			   include('includes/config.php');

         $sql = mysqli_query($connection, "SELECT locID FROM tbllocation WHERE Municipality='Buenavista'");
         $count = mysqli_num_rows($sql);
         echo $count;
          ?></u></b> 


		</div>

		<div>
			Total:
			    <b><u><?php 

			   include('includes/config.php');

         $sql = mysqli_query($connection, "SELECT locID FROM tbllocation");
         $count = mysqli_num_rows($sql);
         echo $count;
          ?></u></b> 


		</div>
		</div>
</div>






 <div class="row">
   <div class="col-md-12">
		<table style="margin-top: 40px;" id="ready" class="table table-striped table-bordered" style="width: 100%;">
			<thead>
				<tr>
					  <th class="text-center">ID</th>
            <th class="text-center">Mangrove Image</th>
            <th class="text-center">Family Name</th>
            <th class="text-center">Local Name</th>
            <th class="text-center">Scientific Name</th>
            <th class="text-center">Category</th>
            <th class="text-center">Barangay</th>
            <th class="text-center">Municipality</th>
            <th class="text-center">Latitude</th>
            <th class="text-center">Longitude</th> 
				</tr>
			</thead>

			<tbody>
				<?php

					include('includes/config.php');

					$get_inventory_list = mysqli_query($connection, "SELECT * FROM tbllocation");

						$count = 1;

					while($row = mysqli_fetch_array($get_inventory_list)){

				 ?>

				 <tr class="text-center">
				 	  <td><?php echo $count;?></td>
            <td width="200"><img style="height: 80px; width: 100px;" src="locationimage/<?php echo $row['mangroveimg'];?>"></td>
            <td><?php echo $row['FamilyName'];?></td>
            <td><?php echo $row['LocalName'];?></td>
            <td><i><?php echo $row['ScientificName'];?></i></td>
            <td><?php echo $row['Category'];?></td>
            <td><?php echo $row['Barangay'];?></td>
            <td><?php echo $row['Municipality'];?></td>
            <td><?php echo $row['Latitude'];?></td>
            <td><?php echo $row['Longitude'];?></td>
				 </tr>

				<?php 
            $count++;
        } ?>

			</tbody>
		</table>
	</div>
</div>


	</div>


<div class="col-md-12">
	<div style="margin-bottom: 30px;" class="container">
		<div class="col-md-6">
			<button type="" class="btn btn-info noprint" style="width: 100%;" onclick="window.location.replace('manage-inventory.php');" >
				Cancel Printing
			</button>
		</div>
		<div class="col-md-6">
			<button type="" class="btn btn-success noprint"  style="width: 100%; margin-bottom: 50px;" onclick="window.print()"><i class="fa fa-print"> </i> 
				Print
			</button>
		</div>
	</div>
</div>


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