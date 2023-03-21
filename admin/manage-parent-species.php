<?php

include('includes/config.php');

if(isset($_POST['del'])) {
    $id = $_POST['mps-id'];

    $sql_delete = mysqli_query($connection, "DELETE FROM tblparent_species WHERE id='$id'");

    echo "<script>window.alert('Parent Species deleted successfully!')</script>";
}

$action = $_GET['action'];

if($action == 'insert') {
    echo "<div class='alert role='alert'>
    Data inserted successfully!
    <span id='btn_close'>x</span>
    </div>";
} else if($action == 'update') {
    echo "<div class='alert role='alert'>
    Data updated successfully!
    <span id='btn_close'>x</span>
    </div>";
}

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>MMSG | Manage Parent Species</title>
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

    <style type="text/css">
        .alert {
            z-index: 1000;
            width: 300px;
            padding: 5px 15px;
            background-color: green;
            color: white;
            position: fixed;
            top: 0;
            right: 0;
            margin-top: 20px;
            margin-right: 30px;
            cursor: pointer;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
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
            <h4 class="header-line">Manage Parent Species</h4>
        </div>
  <!--    <div class="row">
 
<div class="col-md-6">
<div class="alert alert-danger" >
 <strong>Error :</strong> 

</div>
</div>

<div class="col-md-6">
<div class="alert alert-success" >
 <strong>Success :</strong> 

</div>
</div>

<div class="col-md-6">
<div class="alert alert-success" >
 <strong>Success :</strong> 

</div>
</div>

<div class="col-md-6">
<div class="alert alert-success" >
 <strong>Success :</strong> 

</div>
</div>


</div> -->


    </div>


<div class="row">
    <div class="col-md-12">
                    <!-- Advanced Tables -->
        <div class="panel panel-success">
            <div class="panel-heading">Parent Species Listing</div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Parent Species</th>    
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                                        
                            <tbody>
                                        
                                <?php 

                                    $sql = mysqli_query($connection, "SELECT * FROM tblparent_species");

                                    while($row = mysqli_fetch_assoc($sql)){
                                                 ?>

                                    <tr class="text-center bg-white">
                                        <td><?php echo $row['id']; ?></td>
                                        <td><?php echo $row['ParentSpecies']; ?></td>


                                                    
                                    <td class="text-center"> 
                                        <div class="adjust-btn">
                                             <div style="padding-right: 5px;">  
                                                <a href="edit-parent-species.php?ps_id=<?php echo $row['id'];?>">  
                                                    <button name="upd" class="btn btn-primary"><i class="fa fa-edit "></i> Edit</button> 
                                                </a>
                                            </div>

                                            <div>  
                                                <form method="post" action="manage-parent-species.php">
                                                    <input type="hidden" name="mps-id" value="<?php echo $row['id']; ?>">
                                                    <button type="submit" name="del" class="btn btn-danger"><i class="fa fa-pencil"></i> Delete</button>
                                                </form>
                                            </div>   
                                        </div>
                                    </td>
                                             

                                    </tr>

                                <?php  } ?>
                                        
                                     
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

    <script type="text/javascript">
        $(document).ready(function () {
            $('#btn_close').click(function() {
                $('.alert').hide();
            });
        });
    </script>
</body>
</html>
