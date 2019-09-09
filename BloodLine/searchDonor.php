<!DOCTYPE html>
 <html lang="en"> 
<meta http-equiv="content-type" content="text/html;charset=iso-8859-1" />
<head>
        <meta charset="utf-8">
        <title>BloodLine</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="description" content="Blood Donation">
        <meta name="author" content="xenioushk">
        <link rel="shortcut icon" href="images/logo1.png" />
        <link rel="stylesheet" href="assets/form-basic.css">
  <script type="text/javascript" src="assets/js/script.js"></script>
        <link rel="stylesheet" href="css/bootstrap.min.css" /><!-- The styles -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" >
        <link href="css/animate.css" rel="stylesheet" type="text/css" >
        <link href="css/owl.carousel.css" rel="stylesheet" type="text/css" >
        <link href="css/venobox.css" rel="stylesheet" type="text/css" >
        <link rel="stylesheet" href="css/styles.css" />
         <link rel="stylesheet" href="assets/style.css" />
     </head>
    <body> 
        <div id="preloader">
            <span class="margin-bottom"><img src="images/loader.gif" alt="" /></span>
        </div>
 <?php include("header.php"); ?> <!--header part  --><!--  PAGE HEADING -->
        <section class="page-header" data-stellar-background-ratio="1.2">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <h3>Search Your Nearest Donor</h3>
                        <p class="page-breadcrumb">
                            <a href="#"></a>  
                        </p>
                    </div>
                </div> <!-- end .row  -->
            </div> <!-- end .container  -->
        </section> <!-- end .page-header  -->
        <section class="section-content-block section-contact-block">
            <div class="container-fluid">
                <div class="row">   
                    <div class="col-sm-6 col-md-12 wow fadeInLeft">								
						<?php
							if(isset($_SESSION["message"]))
							{
								echo '<div class="alert alert-info alert-dismissible">';
								echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
								echo $_SESSION["message"];
								echo '</div>';
							}
						?>
                        <div class="contact-form-block">
                            <h2 class="contact-title">Add Location To Find Nearest Donor</h2>   
                            <form action="viewAllDonor.php" method="post" id="contact-form" class="donerSignup" 										enctype="multipart/form-data">
                             		<div class="form-group col-md-5">
                                   <label for="raddressInput">Search location:</label><span class="text-danger"> *</span>
                                   <input type="text" class="form-control" id="addressInput" size="15" required />
                                </div>
				            <div class="form-group col-md-5">
                                  <label for="radiusSelect">Radius:</label>
                                   <select id="radiusSelect" label="Radius" style="margin-bottom:2%; padding:5px; width: 100%;" name="gender" class="selectpicker" data-width="100%">
									<option value="50" selected>50 kms</option>
									<option value="30">30 kms</option>
									<option value="20">20 kms</option>
									<option value="10">10 kms</option></select>
                                </div>     
									<div class="form-group col-md-2">
										<input type="button" id="searchButton" value="Search" class="btn_save"style="margin-top:5%;"/>
										<input type="submit" id="seeAll" value="View By Blood Group" class="btn btn-danger" style="padding:20px;margin-top:1%;" disabled/>
										<input type="hidden" name="addr" value="<script type='text/javascript'>document.getElementById('addressInput').value;</script>" />
                                    </div>
									<div class="form-group col-md-6">
										<select id="locationSelect" style="margin-bottom:10%; padding:5px; width: 100%; visibility: hidden"></select>
									</div>
									<div id="map" style="width:100%; height:500px"></div>
								</form>
                        </div> <!-- end .contact-form-block  -->
                    </div> <!--  end col-sm-6  -->               
				</div>
			</div>
        </section> <!-- end .section-content-block  -->
 <?php include("footer.php"); ?> <!--footer part  -->
        <a id="backTop">Back To Top</a>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/jquery.backTop.min.js"></script>
        <script src="js/waypoints.min.js"></script>
        <script src="js/waypoints-sticky.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/jquery.stellar.min.js"></script>
        <script src="js/jquery.counterup.min.js"></script>
        <script src="js/venobox.min.js"></script>
        <!--<script src="https://maps.google.com/maps/api/js?sensor=true"></script>-->
        <script src="js/jquery.gmap.min.js"></script>
        <script src="js/custom-scripts.js"></script>   
   <script>
      var map;
      var markers = [];
      var infoWindow;
      var locationSelect;
		  var customLabel = {
        Male: {
          label: 'M'
        },
        Female: {
          label: 'F'
        }
      };
        function initMap() {
          var kolkata = {lat: 22.522821, lng: 88.363953};
          map = new google.maps.Map(document.getElementById('map'), {
            center: kolkata,
            zoom: 11,
            mapTypeId: 'roadmap',
            mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU}
          });
          infoWindow = new google.maps.InfoWindow();
          searchButton = document.getElementById("searchButton").onclick = searchLocations;
          locationSelect = document.getElementById("locationSelect");
          locationSelect.onchange = function() {
            var markerNum = locationSelect.options[locationSelect.selectedIndex].value;
            if (markerNum != "none"){
              google.maps.event.trigger(markers[markerNum], 'click');
            }
          };
        }
       function searchLocations() {
         var address = document.getElementById("addressInput").value;
         var geocoder = new google.maps.Geocoder();
         geocoder.geocode({address: address}, function(results, status) {
           if (status == google.maps.GeocoderStatus.OK) {
            searchLocationsNear(results[0].geometry.location);
           } else {
             alert(address + ' not found');
           }
         });
       }
       function clearLocations() {
         infoWindow.close();
         for (var i = 0; i < markers.length; i++) {
           markers[i].setMap(null);
         }
         markers.length = 0;
         locationSelect.innerHTML = "";
         var option = document.createElement("option");
         option.value = "none";
         option.innerHTML = "See all results:";
         locationSelect.appendChild(option);
       }
       function searchLocationsNear(center) {
         clearLocations();
         var radius = document.getElementById('radiusSelect').value;
         var searchUrl = 'marker/storelocator.php?lat=' + center.lat() + '&lng=' + center.lng() + '&radius=' + radius;
         downloadUrl(searchUrl, function(data) {
           var xml = parseXml(data);
           var markerNodes = xml.documentElement.getElementsByTagName("marker");
           var bounds = new google.maps.LatLngBounds();
           for (var i = 0; i < markerNodes.length; i++) {
             var id = markerNodes[i].getAttribute("id");
             var name = markerNodes[i].getAttribute("name");
             var address = markerNodes[i].getAttribute("address");
             var distance = parseFloat(markerNodes[i].getAttribute("distance"));
             var latlng = new google.maps.LatLng(
                  parseFloat(markerNodes[i].getAttribute("lat")),
                  parseFloat(markerNodes[i].getAttribute("lng")));
             createOption(name, distance, i);
             createMarker(id,latlng, name, address);
             bounds.extend(latlng);
           }
           map.fitBounds(bounds);
           locationSelect.style.visibility = "visible";
           document.getElementById('seeAll').disabled = false; 
             locationSelect.onchange = function() {
             var markerNum = locationSelect.options[locationSelect.selectedIndex].value;
             google.maps.event.trigger(markers[markerNum], 'click');
           };
         });
       }
       function createMarker(id,latlng, name, address) {
          var html = "<font size='3%'><a href='getDonor.php?no=" + id+"'>" + name + "</a></font> <br/>" + address;
				 // map marker display
          var marker = new google.maps.Marker({
              map: map,
              animation: google.maps.Animation.DROP,
              position: latlng
						//label: icon.label
          });
          google.maps.event.addListener(marker, 'click', function() {
            infoWindow.setContent(html);
            infoWindow.open(map, marker);
          });
          markers.push(marker);
        }
       function createOption(name, distance, num) {
          var option = document.createElement("option");
          option.value = num;
          option.innerHTML = name;
          locationSelect.appendChild(option);
       }
       function downloadUrl(url, callback) {
          var request = window.ActiveXObject ?
              new ActiveXObject('Microsoft.XMLHTTP') :
              new XMLHttpRequest;
          request.onreadystatechange = function() {
            if (request.readyState == 4) {
              request.onreadystatechange = doNothing;
              callback(request.responseText, request.status);
            }
          };
          request.open('GET', url, true);
          request.send(null);
       }
       function parseXml(str) {
          if (window.ActiveXObject) {
            var doc = new ActiveXObject('Microsoft.XMLDOM');
            doc.loadXML(str);
            return doc;
          } else if (window.DOMParser) {
            return (new DOMParser).parseFromString(str, 'text/xml');
          }
       }
       function doNothing() {}
  </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBmkWyY2E81g0P4PU-n9ZbDqsqxGGZWsr8&callback=initMap">
    </script>
    </body>
</html>
