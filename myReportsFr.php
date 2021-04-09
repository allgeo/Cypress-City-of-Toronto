<?php
session_start();
// connects to database
$dbServerName = "sql200.epizy.com";
$dbUsername = "epiz_28227108";
$dbPassword = "oHMwN1a0Xu";
$dbName = "epiz_28227108_cypress";

$conn = new mysqli($dbServerName, $dbUsername, $dbPassword, $dbName);

if ($conn->connect_error) {
    die('Database connection error: ' . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@1,600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"/>
    <script src="https://api.tiles.mapbox.com/mapbox-gl-js/v2.2.0/mapbox-gl.js"></script>
    <link href="https://api.tiles.mapbox.com/mapbox-gl-js/v2.2.0/mapbox-gl.css" rel="stylesheet" />
    <title>Mes Rapports</title>
    <style>
        body {
        margin: 0;
        padding: 0;
        }
        #map {
        position: relative;
        margin-left: 60px;
        margin-top: 15px;
        margin-bottom: 50px;
        width: 75%;
        height: 300px;
        }
        .marker {
        background-image: url('mapbox-icon.png');
        background-size: cover;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        cursor: pointer;
        }
        .mapboxgl-popup {
        max-width: 200px;
        }
        .mapboxgl-popup-content {
        text-align: center;
        font-family: 'Open Sans', sans-serif;
        }
    </style>
  </head>
  <body>
    <div class="inner-reg">
        <nav class="nav">
            <a href="/" class="cypress-logo">
                <img src="./images/cypress-logo.png" alt="">
            </a>
            <a href="/" class="toronto-logo">
                <img src="./images/toronto-logo.png" alt="">
            </a>
            <hr>
        </nav>

        <div class="register-content">
          <a href="reportsHomeFr.html" style="float: left; margin: 4%">Retournez</a>
          <a href="logoutFr.php" style="float: right; margin: 4%">Se Déconnecter</a>
          <br>
            
           <div class="inner-reg-2">
                <h2 style="margin-left: 1%"> Le plus de rapports: le centre-ville de Toronto </h2>  
                <div id="map">cszczcxz</div>
                <script>
                  mapboxgl.accessToken = 'pk.eyJ1IjoidHVyamEyMCIsImEiOiJja240cm9jMnIwMGdhMnZsOG5ta3JyN29kIn0.eHftLsKhf3GNOAoZY-4SbQ';



                  var map = new mapboxgl.Map({
                  container: 'map',
                  style: 'mapbox://styles/turja20/ckn4t27pa21iq17mv2o520vfc',
                  center: [-79.3575411167036,43.65649083874243],
                  zoom: 11
                  });

                  // add markers to map
                  geojson.features.forEach(function (marker) {
                  // create a HTML element for each feature
                  var el = document.createElement('div');
                  el.className = 'marker';

                  // make a marker for each feature and add it to the map
                  new mapboxgl.Marker(el)
                  .setLngLat(marker.geometry.coordinates)
                  .setPopup(
                  new mapboxgl.Popup({ offset: 25 }) // add popups
                  .setHTML(
                  '<h3>' +
                  marker.properties.title +
                  '</h3><p>' +
                  marker.properties.description +
                  '</p>'
                  )
                  )
                  .addTo(map);
                  });
                </script>
                </div> 
            
          <?php
          $command = "";
          if (isset($_SESSION['user_id'])) {
            $uid = $_SESSION['user_id'];
            $command = "SELECT * FROM `reports` WHERE `username` LIKE '$uid' ORDER BY `reports`.`date` DESC";
          } else {
            $command = "SELECT * FROM `reports` ORDER BY `reports`.`date` DESC";
          }
               $result = $conn->query($command);

               while ($report = mysqli_fetch_row($result)) { ?>

              <div class="inner-reg-2">
                <h2 style="margin-left: 1%"><?php echo "$report[4]"; ?></h2>

                <form class="" action="confirmDeleteFr.php" method="post" style="float: right; margin: 2%">
                  <button type="submit" name="delButton" id="delButton" value=<?php echo "$report[0]"; ?>>Effacez</button>
                </form>
                <form class="" action="reportFr.php" method="post" style="float: right; margin: 2%">
                  <button type="submit" name="editButton" id="editButton" value=<?php echo "$report[0]"; ?>>Éditez</button>
                </form>

                <small style="margin-left: 1%"><?php echo "$report[2]"; ?></small><br>
                <i style="margin-left: 1%"><?php echo "$report[3]"; ?></i>
                <p style="margin-left: 1%"><?php echo "$report[5]"; ?></p>
              </div>

          <?php } ?>
        </div>
        <a href="faqFr.html" style="float: right; margin: 4%">QFP</a>
    </div>


  </body>
</html>
