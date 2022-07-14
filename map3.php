<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
       /* Set the size of the div element that contains the map */
      #map {
         height: 800px;  /* The height is 400 pixels */
         width: 70%;  /* The width is the width of the web page */
         float: left;
         position: absolute;
       }

       .cont{
        height: 800px;
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
          <label>Icons</label>
          <select class="input-group" name="icon">
            <option value="parking_lot_maps.png">Parking</option>
            <option value="library_maps.png">Library</option>
            <option value="info-i_maps.png">information center</option>
            <option value="beachflag.png">Beach</option>
          </select>
        </div>
        <div class="input-group">
          <label>Latitude</label>
          <input type="text" name="latitudine"placeholder="latitudine" required>
        </div>
        <div class="input-group">
          <label>Longitudine</label>
          <input type="text" name="longitudine"placeholder="longitudine" required>
        </div>
        <div class="input-group">
          <label>Description</label>
          <input type="text" name="descriere"placeholder="Description" required>
        </div>

        <div class="input-group">
        <label>upload</label>
        <input type="file" name="file" value="" required>
        </div>
        <div class="input-group">

          <input type="submit" class="btn" name="submit" value="trimite">
        </div>
      </form>
  </div>
  <input type="button" value="Logout" class="logout" onClick="document.location.href='logout.php'" />
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
    //establishing the data base connection
        require 'new.php';
    //select eveything from the coo table
        $sql_read = "SELECT * FROM coo";
              $result = mysqli_query($con, $sql_read);
              //check if it's empty or if an error occured
              if(! $result )
                {
                  //does close the connection with the database
                  die('Could not read data: ' . mysqli_error());
                }
                //retrive the icon images from the google maps servers
                echo "var iconBase ='https://developers.google.com/maps/documentation/javascript/examples/full/images/';";
                //as far as there are rows to retrive from the database , create new markers
                while($row = mysqli_fetch_array($result)) {
                  $lat=$row['latitudine'];
                  $lng=$row['longitudine'];
                  $des=$row['descriere'];
                  $icon=$row['icon'];
                //displays a marker with specific coordonates from the database and a custom icon
                  echo "var marker = new google.maps.Marker({position:{lat:$lat,lng:$lng},map: map,icon: iconBase + '$icon'});";
                  // echo "var infowindow = new google.maps.InfoWindow({content: '<div>Location latitude : $lat</div><br /> <div>Location latitude : $lng</div> <br /> <div>Location latitude : $des</div> <br /> <div>Location latitude : $icon</div>'});";
                  // echo "google.maps.event.addListener(marker , 'click', function() {infowindow.open(map, marker);});";
                  
                }
            ?>
}
    </script>
    <!--Load the API from the specified URL
    * The async attribute allows the browser to render the page while the API loads
    * The key parameter will contain your own API key (which is not needed for this tutorial)
    * The callback parameter executes the initMap() function
    -->
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAd3EoT7b9JQqcAbk9cTwQzu7xf3lcbXhg&callback=initMap">
    </script>
  </body>
</html>
