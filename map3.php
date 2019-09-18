<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="sty.css">
    <style>
       /* Set the size of the div element that contains the map */
      #map {
         height: 800px;  /* The height is 400 pixels */
         width: 70%;  /* The width is the width of the web page */
         float: left;
         position: absolute;
       }

       .cont{
         margin-top: 200px;
         height: 800px;  /* The height is 400 pixels */
         width: 30%;
         float: right;
       }

       .logout{
        float: right;
        position: absolute;
        left: 95%;;
        padding: 10px;
	      font-size: 15px;
	      color: white;
      	background: black;
      	border: none;
	      border-radius: 5px;
       }

    </style>


  </head>
  <body>
    <!-- COO Insert ---------------------->
    <div class="cont">
    <form action="myphp.php" method="POST" enctype="multipart/form-data">


      <div class="input-group">
        <label>Icon</label>
        <select class="input-group" name="icon">
    <option value="parking_lot_maps.png">Parcare</option>
    <option value="library_maps.png">Librarie</option>
    <option value="info-i_maps.png">Centru de informatii</option>
    </select>
      </div>
      <div class="input-group">
        <label>latitudine</label>
        <input type="text" name="latitudine"placeholder="latitudine">
      </div>
      <div class="input-group">
        <label>longitudine</label>
        <input type="text" name="longitudine"placeholder="longitudine">
      </div>
      <div class="input-group">
        <label>Description</label>
        <input type="text" name="descriere"placeholder="Description">
      </div>

      <div class="input-group">
       <label>upload</label>
      <input type="file" name="file" value="">
  </div>
      <div class="input-group">

        <input type="submit" class="btn" name="submit" value="trimite">
      </div>

    </form>
  </div>
  <input type="button" value="Logout" class="logout"
onClick="document.location.href='logout.php'" />
    <!---------------------------------------------------------->

    <!--The div element for the map -->
    <div id="map"></div>
    <script>

function initMap() {

  var map = new google.maps.Map(
      document.getElementById('map'), {
	  zoom: 8,
	  center: new google.maps.LatLng(44.4267674 , 26.102538390000063),
    });

    <?php
require 'new.php';

$sql_read = "SELECT * FROM coo";
			$result = mysqli_query($con, $sql_read);
			if(! $result )
				{
					die('Could not read data: ' . mysqli_error());
				}

        echo "  var iconBase =
                              'https://developers.google.com/maps/documentation/javascript/examples/full/images/';
              ";

        while($row = mysqli_fetch_array($result)) {
          $lat=$row['latitudine'];
          $lng=$row['longitudine'];
          $des=$row['descriere'];
          $icon=$row['icon'];

          echo "var marker = new google.maps.Marker({position:{lat:$lat,lng:$lng},map: map,icon: iconBase + '$icon'});";
        //  echo "

        //  marker.addListener('click', function() {
        //  infowindow.open(map, marker);
          //  });";
        }

        //   echo "
      //  var infowindow = new google.maps.InfoWindow({
      //  content: 'awd'
        // });";

     ?>

}
    </script>
    <!--Load the API from the specified URL
    * The async attribute allows the browser to render the page while the API loads
    * The key parameter will contain your own API key (which is not needed for this tutorial)
    * The callback parameter executes the initMap() function
    -->
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyByKEo-eVV5YXXbbpGUsL7_Leuxb8c543U&callback=initMap">
    </script>
  </body>
</html>
