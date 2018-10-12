<html lang="en">
<head>
    <?php include 'head.php';
    ?>
    <title>Welcome To Drumcondra FC: One Club - One Community</title>
</head>
<body>
    
    <div class="findus-container">
    
    <?php include 'banner.php'; ?>

    <?php include 'header.php'; ?>

    <section class="findus-header">
    <h1>Our Locations</h1>
    <i class="far fa-compass"></i>
    
    </section>
    <section class="locations">


        <div class="locations-intro">
            <h2>Drumcondra A.F.C Pitch Locations</h2>
            <p>The club uses 5 locations around Drumcondra</p>
        </div>

        <div class="locations-loc1">
            <div id="map1">
              
            </div>
        </div>

        <div class="locations-loc2">
            <div id="map2">

            </div>
        </div>

        <div class="locations-loc3">
            <div id="map3">

            </div>
        </div>

        <div class="locations-loc4">
            <div id="map4">

            </div>
        </div>

        <div class="locations-loc5">
            <div id="map5">

            </div>
        </div>

    
    
    </section>


        
<?php include 'footer.php'; ?>
        




    </div>
    
  
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script src="js/carousel.js"></script>
        <script>
    function initMap() {
      // The location of Larry's DIY
      var lar = { lat: 53.368928, lng: -6.249790 };
      // The map, centered at Uluru
      var map = new google.maps.Map(
        document.getElementById('map1'), { zoom: 14, center: lar });
      // The marker, positioned at Larrys
      var marker = new google.maps.Marker({ position: lar, map: map });
    }
  </script>
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDtbJayjrxT9C_mqWSebyR4DxEIi7cRl3g&callback=initMap">
  </script>
  
    
  
</body>
</html>