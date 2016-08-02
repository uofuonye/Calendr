<?php
	
	include("databaseHW8S16.php");
	session_start();
	if(!isset($_SESSION['user'])){
		header("location:login.php");
	}
	$username = $_SESSION['user']['name'];
	
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title> My Calendar </title>
		<link rel= "stylesheet" type = "text/css" href = "AdRotator.css"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	</head>
	<body>
		<script type="text/javascript" src= "AdRotator.js"></script>
		<div>
			<nav>
				<a href= "ofuon001calendar.php"> Calendar</a> &nbsp;
				<a href= "input.php"> Input</a>&nbsp;
				<a href= "admin.php"> Admin</a>  
			</nav>
		</div>
		<div >
			<h1>Uche's Calendar</h1>
		</div>
		<h2 style="color:gold; text-align:center;" >Welcome <?php echo $username; ?> <br> 
			<a href = "logout.php">Sign Out</a>
		</h2>
		<div>
			<div>
				<table>
					<tr>
						<th><span>Monday</span></th>
						<td>
							<p class ='italic'>11:15am-12:15pm</p>
							<p>CSCI 4131</p>
							<p id="anderson1" onMouseOver="show('anderson1')" onMouseOut="removeDiv()">Anderson hall</p>
						</td>
						<td>
							<p class ='italic'>4:00pm-5:15pm</p>
							<p>CSCI 4511W</p>
							<p id="bruininks1" onMouseOver="show('bruininks1')" onMouseOut="removeDiv()">Bruininks Hall</p>
						</td>
					</tr>
					<tr>
						<th><span>Tuesday</span></th>
						<td>
							<p class ='italic'>9:05am-9:44am</p>
							<p>EE 3102</p>
							<p id="mech1" onMouseOver="show('mech1')" onMouseOut="removeDiv()">Mech Hall</p>
						</td>
						<td>
							<p class ='italic'>9:45am-11:00am</p>
							<p>EE 3025</p>
							<p id="keller1" onMouseOver="show('keller1')" onMouseOut="removeDiv()">Keller Hall</p>
						</td>
						<td>
							<p class ='italic'>11:15am-12:30pm</p>
							<p><a href= "http://www-users.cselabs.umn.edu/classes/Spring-2016/csci4011/" target= "_blank"> CSCI 4011</a></p>
							<p id="fraser1" onMouseOver="show('fraser1')" onMouseOut="removeDiv()">Fraser Hall</p>
						</td>
						<td>
							<p class ='italic'>1:25pm-12:10pm</p>
							<p>EE 3025</p>
							<p id="keller2" onMouseOver="show('keller2')" onMouseOut="removeDiv()">Keller Hall</p>
						</td>
						<td>
							<p class ='italic'>2:30pm-3:45pm</p>
							<p>CSCI 4707</p>
							<p id="keller3" onMouseOver="show('keller3')" onMouseOut="removeDiv()">Keller Hall</p>
						</td>
					</tr>
					<tr>
						<th><span>Wednesday</span></th>
						<td>
							<p class ='italic'>11:15am-12:15pm</p>
							<p>CSCI 4131</p>
							<p id="anderson2" onMouseOver="show('anderson2')" onMouseOut="removeDiv()">Anderson Hall</p>
						</td>
						<td>
							<p class ='italic'>4:00pm-5:15pm</p>
							<p>CSCI 4511W</p>
							<p id="bruininks2" onMouseOver="show('bruininks2')" onMouseOut="removeDiv()">Bruininks Hall</p>
						</td>
						<td>
							<p class ='italic'>5:45pm-8:45pm</p>
							<p>EE 3102</p>
							<p id="keller4" onMouseOver="show('keller4')" onMouseOut="removeDiv()">Keller Hall</p>
						</td>
					</tr>
					<tr>
						<th><span>Thursday</span></th>
						<td>
							<p class ='italic'>9:45am-11:00am</p>
							<p>EE 3025</p>
							<p id="keller5" onMouseOver="show('keller5')" onMouseOut="removeDiv()">Keller Hall</p>
						</td>
						<td>
							<p class ='italic'>11:15am-12:30pm</p>
							<p><a href= "http://www-users.cselabs.umn.edu/classes/Spring-2016/csci4011/" target= "_blank"> CSCI 4011</a></p>
							<p id="fraser2" onMouseOver="show('fraser2')" onMouseOut="removeDiv()">Fraser Hall</p>
						</td>
						<td>
							<p class ='italic'>2:30pm-3:45pm</p>
							<p>CSCI 4707</p>
							<p id="keller6" onMouseOver="show('keller6')" onMouseOut="removeDiv()">Keller Hall</p>
						</td>
					</tr>
					<tr>
						<th><span>Friday</span></th>
						<td>
							<p class ='italic'>10:10am-11:15pm</p>
							<p>CSCI 4011</p>
							<p id="keller7" onMouseOver="show('keller7')" onMouseOut="removeDiv()">Keller Hall</p>
						</td>
					</tr>
				</table>
			</div>
		</div>
		<div >	
				<p> Calendar was tested on a Firefox browser <br>
					*Please note that the images where gotten from the following site //https://campusmaps.umn.edu/
				</p>
		</div>

		<div id="search">
				<input id="address" name = "Search" type = "text" value="Minneapolis, MN" required>
				<input id="submit" type = "submit" value = "Search">
		</div>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBniqx_yPZuyye_MnRq2rpfnxD6VG_E-oI&signed_in=true&callback=initMap" async defer>
		</script>
		<script type="text/javascript">
			//mp vars
			var map;
			var queryMarker;
			var markersArray = [];
			var latlong;
			var API_KEY = "AIzaSyBniqx_yPZuyye_MnRq2rpfnxD6VG_E-oI";
			var directionsDisplay;
  			var directionsService;

			//MAP
			function initMap() {

				//markers for different locations
				var minneapolis = new google.maps.LatLng(44.97399,-93.22772850000001);
				var keller = new google.maps.LatLng(44.9745476,-93.23223189999999);
				var bruininks = new google.maps.LatLng(44.9740944,-93.23735920000001);
				var mech = new google.maps.LatLng(44.97527700000001,-93.2330624);
				var anderson = new google.maps.LatLng(44.9719622,-93.24229660000003);
				var fraser = new google.maps.LatLng(44.9755702,-93.2373867);
				//Create Map
				var mapOptions= {zoom: 13, center: minneapolis};
				map = new google.maps.Map(document.getElementById('map'), mapOptions);
				var geocoder = new google.maps.Geocoder();

				document.getElementById('submit').addEventListener('click', function() {
				  geocodeAddress(geocoder, map);
				});
				//add direction service
				directionsDisplay = new google.maps.DirectionsRenderer;
  	         	directionsService = new google.maps.DirectionsService;
  	         	directionsDisplay.setMap(map);
  	         	//ass makers
				var marker1 = new google.maps.Marker({position: keller, map: map, title:"Keller"});
				var marker2 = new google.maps.Marker({position: bruininks, map: map, title:"Bruininks"});
				var marker3 = new google.maps.Marker({position: mech, map: map, title:"Mech"});
				var marker4 = new google.maps.Marker({position: anderson, map: map, title:"Anderson"});
				var marker5 = new google.maps.Marker({position: fraser, map: map, title:"Fraser"});

				//make content strings for markers
				var contentString1 = '<div id="infobox">'+'<b>Keller Hall: </b>'+'<div>'+'<p><i>EE 3025, CSCI 4707, EE 3102</i></p>'+'</div>'+'</div>';
				var contentString2 = '<div id="infobox">'+'<b>Bruininks Hall: </b>'+'<div>'+'<p><i>CSCI 4011</i></p>'+'</div>'+'</div>';
				var contentString3 = '<div id="infobox">'+'<b>Mech Hall: </b>'+'<div>'+'<p><i>EE 3102</i></p>'+'</div>'+'</div>';
				var contentString4 = '<div id="infobox">'+'<b>Anderson Hall: </b>'+'<div>'+'<p><i>CSCI 4131</i></p>'+'</div>'+'</div>';
				var contentString5 = '<div id="infobox">'+'<b>Fraser Hall: </b>'+'<div>'+'<p><i>CSCI 4011</i></p>'+'</div>'+'</div>';

				//Make Info windows for Markers
				//Note most of the markers code was gotten from: https://developers.google.com/maps/documentation/javascript/examples/infowindow-simple
				var infowindow1 = new google.maps.InfoWindow({
					content: contentString1
				});
				var infowindow2 = new google.maps.InfoWindow({
					content: contentString2
				});
				var infowindow3 = new google.maps.InfoWindow({
					content: contentString3
				});
				var infowindow4 = new google.maps.InfoWindow({
					content: contentString4
				});
				var infowindow5 = new google.maps.InfoWindow({
					content: contentString5
				});
				//Add listeners for the markers
				marker1.addListener('click', function() {
					infowindow1.open(map, marker1); 
				});
				marker2.addListener('click', function() {
					infowindow2.open(map, marker2); 
				});
				marker3.addListener('click', function() {
					infowindow3.open(map, marker3); 
				});
				marker4.addListener('click', function() {
					infowindow4.open(map, marker4); 
				});
				marker5.addListener('click', function() {
					infowindow5.open(map, marker5); 
				});

				//Add query marker: click to place query marker
				google.maps.event.addListener(map, 'click', function(event) {
				   placeQueryMarker(event.latLng);
				});

			}

			function placeQueryMarker(location) {
			    if(queryMarker== null)
			    {	//make new  maker if null
			    	queryMarker = new google.maps.Marker({
				        position: location,
				        draggable:true, 
				        icon: 'query_marker.png',
				        map: map
				    });
				    latlong=location.lat() + "," + location.lng();
				    map.panTo(location);

				    //remove on click
					google.maps.event.addListener(queryMarker, 'click', function() {
				   		queryMarker.setMap(null);
				   		queryMarker=null;
				   		latlong = null;
				   		directionsDisplay.set('directions', null);
				   		deleteMarkers();
					});
					//change position when dragged
					google.maps.event.addListener(queryMarker, 'dragend', function (event) {
						queryMarker.setPosition(event.latLng);
						latlong=event.latLng.lat() + "," + event.latLng.lng();
						map.panTo(event.latLng);
						directionsDisplay.set('directions', null);
						deleteMarkers();
					});
				}
				else
				{
					

				}
			}
			//Note this code was gotten grom Google API tutorial
			function geocodeAddress(geocoder, resultsMap) {
				var address = document.getElementById('address').value;
				geocoder.geocode({'address': address}, function(results, status) {
				  if (status === google.maps.GeocoderStatus.OK) {
				    resultsMap.setCenter(results[0].geometry.location);
				    var marker = new google.maps.Marker({
				      map: resultsMap,
				      position: results[0].geometry.location
				    });
				  } else {
				    alert('Geocode was not successful for the following reason: ' + status);
				  }
				});
			}

			function changeValue(newValue)
			{
				document.getElementById("radius").value=newValue;
			}

			function search() {
				if (queryMarker!=null)
				{
					deleteMarkers();
					directionsDisplay.set('directions', null);
					var radius= document.getElementById("radius").value;
					var place = document.querySelector('input[name = "place"]:checked').value;
					var url= "http://www-users.cselabs.umn.edu/~ofuon001/googlemaps.php" + "?location=" +latlong + "&radius=" + radius + "&place=" + place;
					$.ajax({
		                type : 'GET',
		                url : url,
		                dataType: 'json',
		                success : function (d) {
		                	str = JSON.stringify(d, null, 4);
		                	var array = d.results;
		                	for (var i = 0; i < array.length; i++) {
		                		var obj= array[i];
		                		var icon= obj.icon;
		                		var name = obj.name;
								var lon= obj.geometry.location.lng;
								var lat= obj.geometry.location.lat;
		                		createMarker(lat, lon, name, icon, i);
		                	};
		                },
		                error : errorHandler
		            });
	
				}
				else
				{
					alert("Please place query Marker by clicking on a location and try again!");
				}
			}
			function createMarker(lat, lon, name, icon, i) {
				var position = new google.maps.LatLng(lat,lon);
				var marker= new google.maps.Marker({
				    position: position,
				    map: map,
				    title: name,
				    icon: icon
				  });
				markersArray.push(marker);

				//make content strings for markers
				var contentString1 = '<div id="infobox">'+'<b>'+name+ '<br>' +lat+ '<br>'+lon+'</b>'+'</div>';
				var infowindow= new google.maps.InfoWindow({
					content: contentString1
				});

				//add event listenedr to marker
				marker.addListener('click', function() {
					infowindow.open(map, marker);
					addDirection(marker); 
				});
		    }
		    function addDirection(marker) {
				var selectedMode = "TRANSIT";
				directionsService.route({
				origin: queryMarker.getPosition(),  
				destination: marker.getPosition(),
				travelMode: google.maps.TravelMode[selectedMode]
				}, function(response, status) {
				if (status == google.maps.DirectionsStatus.OK) {
				  directionsDisplay.setDirections(response);
				} else {
				  window.alert('Directions request failed due to ' + status);
				}
				});
			}
			function errorHandler(jqXHR, exception) {
			    if (jqXHR.status === 0) {
			        alert('Network Error');
			    } else if (jqXHR.status == 404) {
			        alert('Requested page not found. [404]');
			    } else if (jqXHR.status == 500) {
			        alert('Internal Server Error [500].');
			    } else if (exception === 'parsererror') {
			        alert('Requested JSON parse failed.');
			    } else if (exception === 'timeout') {
			        alert('Time out error.');
			    } else if (exception === 'abort') {
			        alert('Ajax request aborted.');
			    } else {
			        alert('Uncaught Error.\n' + jqXHR.responseText);
			    }
			}
			function deleteMarkers() {
			  if (markersArray) {
			    for (i in markersArray) {
			      markersArray[i].setMap(null);
			    }
			    markersArray.length = 0;
			  }
			}
		</script>
		<div><p id="info">Click on location to place query marker. Marker can also be dragged</p></div>
		<div id="container">
			<div id="map"></div>
			<div id="selector">	
				<form >
				  <input type="radio" id="art" name="place" value="art_gallery" checked> Art Gallery<br>
				  <input type="radio" id="resturant" name ="place" value="restaurant"> Restaurant<br>
				  <input type="radio" id="doctor" name="place" value="doctor"> Doctor<br>
				  <input type="radio" id="clothing" name="place" value="clothing_store"> Clothing Store<br>
				  <input type="radio" id="shopping" name= "place" value="shopping_mall"> Shopping Mall<br>
				  <input type="radio" id="travel" name="place" value="travel_agency"> Travel<br>
				  <input type="radio" id="university" name="place" value="university"> University <br><br>
				  Radius(M):<br>
				  <input type="range" id="slider" min="0" max="3000" value="0" step="100" onchange="changeValue(this.value)"> <br>
				  <input type= "text" id= "radius" name="radius" value="0" readonly="true"> <br>
				  <button type= "button" id="find" onclick="search()"> Submit</button>
				</form>
			</div>
  		</div>

	</body>
</html>
