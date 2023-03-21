<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
</head>
<body>

<style type="text/css">
    
     #map {
        height: 100%;
    }
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<img style="width: 250px; height: 70px; margin-left: 100px;" src="assets/img/mmsg_logo.png" />
    <div class="navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
        </div>
    </div>

    <!-- LOGO HEADER END-->
    <section class="menu-section">
        <div class="container">
            <div class="row ">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a href="dashboard.php" class="menu-top-active">DASHBOARD</a></li>
                           


                            <li>
                                <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Species<i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="add-family-name.php">Add Family Name</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="add-local-name.php">Add Local Name</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="add-scientific-name.php">Add Scientific Name</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="add-mangrove-category.php">Add Category</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Mangrove <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                   <!--  <li role="presentation"><a role="menuitem" tabindex="-1" href="add-mangrove-species.php">Add Mangrove Species</a></li> -->
                                     <li role="presentation"><a role="menuitem" tabindex="-1" href="manage-mangrove-species.php">Mangrove Species</a></li>
                                </ul>
                            </li>

                              <li>
                                <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Location <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="add-barangay.php">Add Barangay</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="add-municipality.php">Add Municipality</a></li>
                                     
                                </ul>
                            </li>



                             <li>
                                <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Inventory <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                    <!-- <li role="presentation"><a role="menuitem" tabindex="-1" href="add-inventory.php">Add Inventory</a></li> -->

                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="manage-inventory.php">Generate Inventory</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="manage-importance-value.php">Importance Value</a></li>
                                </ul>
                            </li>


                            <li>
                                <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Map <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                     <li role="presentation"><a role="menuitem" tabindex="-1" href="manage-marker.php">Manage Marker</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="confirm-user-marker.php">Confirm User Marker</a></li>
                                     <li role="presentation"><a role="menuitem" tabindex="-1" href="manage-location.php">Manage Location</a></li>
                                </ul>
                            </li>


                            <li>
                                <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Setting <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="user-feedback.php">User Feedback</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="reg-users.php">Reg Users</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="change-password.php">Change Password</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="logout.php"><i class="fa fa-sign-out"> </i> Log Out</a></li>
                                     
                                </ul>
                            </li>

                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>