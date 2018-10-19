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
            <p>The club uses 5 locations around Drumcondra. You will see these indicated on the map below. Click each of the markers on the map for more information and to get directions to the relevant pitch.</p>
        </div>

        <div class="locations-map" id="map">

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
	
	var clonturk = {
		info: '<strong>Clonturk Park</strong><br>\
                157 Richmond Rd, Drumcondra, Dublin<br>\
					<a href="https://goo.gl/maps/n2oFmVgT92E2" target="_blank">Get Directions</a>',
        lat: 53.367940, 
        long: -6.251151
	};

	var dominican = {
		info: '<strong>Dominican College</strong><br>\
                    204 Griffith Ave, Drumcondra, Dublin 9<br>\
					<a href="https://goo.gl/maps/qYf1cZCVtks" target="_blank">Get Directions</a>',
        lat: 53.374430,
        long: -6.249513
	};

	var griffith = {
		info: '<strong>Griffith Park</strong><br>\r\
                27 St Michael\'s Rd, Drumcondra, Dublin 9<br>\
					<a href="https://goo.gl/maps/XzYG8ejjJDU2" target="_blank">Get Directions</a>',
        lat: 53.370231,
        long: -6.262120
	};

    var albert = {
		info: '<strong>Albert College Park</strong><br>\r\
                Whitehall Dublin 9<br>\
					<a href="https://goo.gl/maps/6NxhvE2GxVM2" target="_blank">Get Directions</a>',
        lat: 53.382877,
        long: -6.264600
	};



	var locations = [
      [clonturk.info, clonturk.lat, clonturk.long, 0],
      [dominican.info, dominican.lat, dominican.long, 1],
      [griffith.info, griffith.lat, griffith.long, 2],
      [albert.info, albert.lat, albert.long, 2],
    ];

	var map = new google.maps.Map(document.getElementById('map'), {
		zoom: 14,
		center: new google.maps.LatLng(53.377517, -6.258740),
		mapTypeId: google.maps.MapTypeId.ROADMAP
	});

	var infowindow = new google.maps.InfoWindow({});

	var marker, i;

	for (i = 0; i < locations.length; i++) {
		marker = new google.maps.Marker({
			position: new google.maps.LatLng(locations[i][1], locations[i][2]),
			map: map
		});

		google.maps.event.addListener(marker, 'click', (function (marker, i) {
			return function () {
				infowindow.setContent(locations[i][0]);
				infowindow.open(map, marker);
			}
		})(marker, i));
	}
}
  </script>


  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDtbJayjrxT9C_mqWSebyR4DxEIi7cRl3g&callback=initMap"
    async defer></script>
  
    
  
</body>
</html>