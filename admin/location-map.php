<?php

include('includes/config.php');

?>


<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>MMSG | Admin Location Map</title>
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
        #mapCanvas {
        width: 100%;
        height: 650px;
        margin-right: 20px;
        margin-left: 20px;
        margin-bottom: 20px;
    }

    span{
        font-weight: bold;
        font-size: 12px;
    }

    p{
        font-size: 12px;
    }


    </style>

</head>
<body>

    <a href="manage-location.php"><button style="margin: 20px;" class="btn btn-info" type="button">Back</button></a>

<?php

$result = mysqli_query($connection, "SELECT * FROM tbllocation");

$result2 = mysqli_query($connection, "SELECT * FROM tbllocation");

?>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAm3WtCdIYJ4MPgn0csow-QUkU5OD4oCM0&callback=myMap"></script>

<script>
function initMap() {
    var map;
    var bounds = new google.maps.LatLngBounds();
    var mapOptions = {
        zoom: 10,
        center: new google.maps.LatLng(10.59287, 122.63251),
        mapTypeId: 'satellite'
    };
                    
    // Display a map on the web page
    map = new google.maps.Map(document.getElementById("mapCanvas"), mapOptions);
    map.setTilt(50);
        
    // Multiple markers location, latitude, and longitude
    var markers = [

        <?php if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                echo '["'.$row['FamilyName'].'", '.$row['Latitude'].', '.$row['Longitude'].'],';
            }
        }
        ?>
    ];
                        
    // Info window content
    var infoWindowContent = [
        <?php if(mysqli_num_rows($result2) > 0){
            while($row = mysqli_fetch_assoc($result2)){ ?>
                ['<div class="info_content">' +
                '<p><img style="height: 140px; width: 210px;" src="locationimage/<?php echo $row['mangroveimg'];?>"></p>' +
                '<p><span>FamilyName: </span><?php echo $row['FamilyName'];?></p>' + 
                '<p><span>LocalName: </span><?php echo $row['LocalName'];?></p>' + 
                '<p><span>ScientificName: </span><i><?php echo $row['ScientificName'];?></i></p>' + 
                '<p><span>Category: </span><?php echo $row['Category'];?></p>' + 
                '<p><span>Barangay: </span><?php echo $row['Barangay'];?></p>' + 
                '<p><span>Municipality: </span><?php echo $row['Municipality'];?></p>' + 
                '</div>'],
        <?php }
        }
        ?>
    ];
        
    // Add multiple markers to map
    var infoWindow = new google.maps.InfoWindow(), marker, i;
    
    // Place each marker on the map  
    for( i = 0; i < markers.length; i++ ) {
        var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
        bounds.extend(position);
        marker = new google.maps.Marker({
            position: position,
            map: map,
            title: markers[i][0]
        });
        
        // Add info window to marker    
        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infoWindow.setContent(infoWindowContent[i][0]);
                infoWindow.open(map, marker);
            }
        })(marker, i));

        // Center the map to fit all markers on the screen

        // map.fitBounds(bounds);
    }

    // Set zoom level
    var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
        this.setZoom(10);
        google.maps.event.removeListener(boundsListener);
    });
    
}

// Load initialize function
google.maps.event.addDomListener(window, 'load', initMap);
</script>


<div id="mapCanvas"></div>

</body>
</html>