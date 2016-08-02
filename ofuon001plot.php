<?php
	//header( 'Content-Type: application/json');
	
	function calculateDistance($a, $b)
	{
		$x1= floatval($a[lat]);
		$y1= floatval($a[long]);
		$x2= floatval($b[lat]);
		$y2= floatval($b[long]);
		return sqrt(pow($x2- $x1, 2) + pow($y2-$y1, 2));
	}

	$string1= file_get_contents("pointA.json");
	$string2 = file_get_contents("pointB.json");

	$jsonA = json_decode($string1, true);
	$jsonB = json_decode($string2, true);
	$count =0;

	$A= array();
	$B= array();
	$paired= array();
	$x=0;

	//Parse points
	foreach ($jsonA[locations] as $x=>$l) {
		$A[$x]= $l;
		$x++;
	}
	$y=0;
	foreach ($jsonB[locations] as $y=>$l) {
		$B[$y]= $l;
		$paired[$y] = false;
		$y++;
	}
	$count= $y;	
	$pairs= array();
	//Create pairs of points from A and B
	$output = array();
	foreach ($A as $i => $a) 
	{
		$index= 0;
		$j=0;
		$smallest= PHP_INT_MAX;
		foreach ($B as $j => $b) {
			if($paired[$j]== false)
			{
				$distance=calculateDistance($a, $b);
				if( $distance <= $smallest)
				{	
					$smallest= $distance;
					$index= $j;
				}
			}
		}
		//pair locations
		$paired[$index]= true;
		$pointA= $a;
		$pointB=$B[$index];
		$output[$i] = array(
			"lat1" => $pointA[lat],
			"long1" => $pointA[long],
			"name1" => $pointA[name],
			"lat2" => $pointB[lat],
			"long2" => $pointB[long],
			"name2" => $pointB[name]
			);
	}
	$i +=1;
	$string3 = file_get_contents("center.json");
	$jsonC = json_decode($string3, true);
	$output[$i] =  array(
			"lat" => $jsonC[center][lat],
			"long" => $jsonC[center][long],
			"zoom" => $jsonC[zoom]
			);

	//var_dump($output);
	
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Map Polylines</title>
    <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
      }
    </style>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  </head>
  <body>
    <div id="map"></div>
    <script>
		jvalues = <?php echo json_encode($output) ?>;
		var len= jvalues.length;
		function initMap() {

			//get center
			var z = parseInt(jvalues[len-1]['zoom']);
			var la= parseFloat(jvalues[len-1]['lat']);
			var lo= parseFloat(jvalues[len-1]['long']);
			var map = new google.maps.Map(document.getElementById('map'), {
			  zoom: z,
			  center: {lat: la, lng: lo},
			  mapTypeId: google.maps.MapTypeId.TERRAIN
			});

			//get points
			for (var i = 0; i <len-1; i++) {
				var la1 = parseFloat(jvalues[i]['lat1']);
				var lo1 = parseFloat(jvalues[i]['long1']);
				var la2 = parseFloat(jvalues[i]['lat2']);
				var lo2 = parseFloat(jvalues[i]['long2']);
				var marker1 = new google.maps.Marker({position: new google.maps.LatLng(la1,lo1), map: map, title: jvalues[i]['name1']});
    			var marker2 = new google.maps.Marker({position: new google.maps.LatLng(la2,lo2), map: map, title: jvalues[i]['name2']});

				var coordinates = [

			      {lat: la1, lng: lo1},
			      {lat: la2, lng: lo2},
			    ];
			     var path = new google.maps.Polyline({
			          path: coordinates,
			          geodesic: true,
			          strokeColor: '#FF0000',
			          strokeOpacity: 1.0,
			          strokeWeight: 2
			    });
			    path.setMap(map);
			};
		}
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBniqx_yPZuyye_MnRq2rpfnxD6VG_E-oI&callback=initMap">
    </script>
  </body>
</html>
</html>