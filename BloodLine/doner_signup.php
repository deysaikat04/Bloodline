<?php session_start(); ?>
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
       <link rel="stylesheet" href="css/bootstrap.min.css" />    <!-- The styles -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" >
        <link href="css/animate.css" rel="stylesheet" type="text/css" >
        <link href="css/owl.carousel.css" rel="stylesheet" type="text/css" >
        <link href="css/venobox.css" rel="stylesheet" type="text/css" >
        <link rel="stylesheet" href="css/styles.css" />
        <link rel="stylesheet" href="assets/style.css" />
         <script src="https://www.google.com/recaptcha/api.js" async defer></script>
				 <script>
				 function onSubmit(token) {
					 document.getElementById("contact-form").submit();
				 }
				function submitForm(){
						document.forms["signUpForm"].submit();
				}
			 </script>
    </head>
    <body> 
        <div id="preloader">
            <span class="margin-bottom"><img src="images/loader.gif" alt="" /></span>
        </div>
         <?php include("header.php"); ?> <!--header part  -->
        <section class="page-header" data-stellar-background-ratio="1.2">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <h3> Sign Up </h3>
                    </div>
                </div> <!-- end .row  -->
            </div> <!-- end .container  -->
        </section> <!-- end .page-header  -->
        <section class="section-content-block section-contact-block">
            <div class="container">
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
                            <h2 class="contact-title">Add Your Details Below</h2>   
                            <form action="php/addDoner/donerData.php" method="post" id="contact-form" class="donerSignup" 										name="signUpForm" enctype="multipart/form-data">
                                <div class="form-group col-md-6">
                                   <label>Name</label><span class="text-danger"> *</span>
                                    <input type="text" class="form-control" id="pname" name="pname" placeholder="" data-msg="Please Write Your Name" required autofocus/>
                                    <p id="nameErr"></p>
                                </div>
									<div class="form-group col-md-6">
									  <label>Contact No.</label><span class="text-danger"> *</span>
									  <input type="text" class="form-control"  name="mob"  onkeyUp="mobCheck()" required>
									<p id="mobErr"></p>																		
									</div>
									<div class="form-group col-md-6">
								      <label>Reference Contact No.</label>
									  <input type="text" class="form-control"  name="rmob"  onkeyUp="mobCheck()">
									  <p id="mobErr"></p>															
                                    </div>
									<div class="form-group col-md-6">
								      <label>Email Id</label><span class="text-danger"> *</span>
								      <input type="text" class="form-control"  name="mail" id="mail" onkeyUp="mailCheck()" required>
										 <p id="mailErr"></p>														
                                </div>
                                <div class="form-group col-md-6">
                                  <label>Gender</label>
                                   <select style="margin-bottom:2%; padding:5px; width: 100%;"name="gender" 
                                   	id="gender" class="selectpicker" data-width="100%">
									<option value="0">-Select-</option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
									<option value="Other">Other</option>
                                   </select>
                                </div>                               
								<div class="form-group col-md-6" style="margin-bottom:2%; ">
									<label>Display Picture</label><span class="text-danger"> *</span>
									<input type="file" name="file" id="dp" onkeyUp="dpCheck()" required>
									<p id="helper_text">Upload images under <label class="code">200kb </label></p>	
                                </div>  
								<div id="form">
									<div class="form-group col-md-6">
										<label>Address: </label><span class="text-danger"> *</span>
										<input class="form-control" type='text' id='address'/>
									</div>														
								</div>
								<div class="col-md-12"><p>Choose your location by clicking on the map.</p></div>
								<div class="col-md-12" id="map" style="width:100%; height:300px;margin-bottom:20px;"></div>
									<h2 class="contact-title col-md-12">Physical Information</h2> 
                                    <div class="form-group col-md-6">
										<label>Blood Group</label>
										<select name="bgrp" style=" margin-top:-2px;padding:4px; width: 100%;"
											class="selectpicker" data-width="100%">
											<option value="0">SELECT</option>
											<option value="A+" > A+		
                                            <option value="A-" > A-						
                                            <option value="B+" > B+			
                                            <option value="B-" > B-			
                                            <option value="AB+" > AB+			
                                            <option value="AB-" > AB-			
                                            <option value="O+" > O+			
                                            <option value="O-" > O-			
                                        </select>																	
									</div>
                                <div class="form-group col-md-6">
								    <label>Last Donate Date</label>
								    <input type="date" class="form-control" name="lastDonatedate" id="l1"/>			
                                </div>
								<div class="form-group col-md-6">
								    <label>Date of Birth</label>  
									<input type="date" class="form-control" name="dob" id="dob1" onkeyUp="dobCheck()"/>		<p id="dobErr"></p>			
								</div>
								<div class="form-group col-md-6">
								    <label>Weight</label>
								    <input type="text" class="form-control" name="weight" id="w1">
								</div>
                                <h2 class="contact-title col-md-12">Create a Profile</h2>  
								<div class="form-group col-md-6">
									<label>Username</label><span class="text-danger"> *</span>
									<input type="text" class="form-control" name="name" id="name" onkeyUp="userCheck()" required>
									<p id="unameErr"></p>																	
								</div>
                                <div class="form-group col-md-6">
									<label>Password</label><span class="text-danger"> *</span>
									<input type="password" class="form-control" name="pass" id="pass" onkeyup="passCheck()" required>
								</div>
                                <div class="form-group col-md-6">
									<label>Confirm Password</label><span class="text-danger"> *</span>
									<input type="password" class="form-control"  name="cpass" id="cpass" onkeyup="passCheckConfirm()" required>
									<p id="passErr"></p>
								</div> 
								<div class="col-md-6"></div>
									<div class="form-group col-md-6 col-md-offset-5">
										<button type="submit" class="btn_save g-recaptcha"  name="save" 
											onClick="saveData()" data-sitekey="6LdM_FYUAAAAAKfTVUo4Sn9c80Tnct30fVV5J7Oy" 
												data-callback='onSubmit'>Submit</button>	 
										<input type="hidden" name="save"  value="hiddenbtn" />
										<button type="reset" class="btn_reset" onClick="document.location.reload(true)">Reset</button>
									</div>

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
	function activatePlaceSearch(){
		//var input=document.getElementById('address');
		//var autocomplete =new google.maps.places.Autocomplete(input);
	}
	</script>
	<!--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDxSSl7Nc8sTh54PFALrPA4D30IM1ytBzc&libraries=places&callback=activatePlaceSearch"></script>
	<script type="text/javascript">
	document.write(input)</script>-->
   <script>
														var map;
														var marker;
														var infowindow;
														var messagewindow;
														
														function initMap() {
															var california = {lat: 22.5726, lng: 88.3639};
															map = new google.maps.Map(document.getElementById('map'), {
																center: california,
																zoom: 13
															});
															infowindow = new google.maps.InfoWindow({
																content: document.getElementById('form')
															});
															messagewindow = new google.maps.InfoWindow({
																content: document.getElementById('message')
															});
															google.maps.event.addListener(map, 'click', function(event) {
																marker = new google.maps.Marker({
																	position: event.latLng,
																	map: map
																});
																google.maps.event.addListener(marker, 'click', function() {
																	infowindow.open(map, marker);
																});
															});
														}
														function saveData() {
															var name = escape(document.getElementById('name').value);
															var address = escape(document.getElementById('address').value);
															var type = document.getElementById('address').value;
															var latlng = marker.getPosition();
															var url = 'marker/addData.php?name=' + name + '&address=' + address +
																				'&type=' + type + '&lat=' + latlng.lat() + '&lng=' + latlng.lng();
															downloadUrl(url, function(data, responseCode) {
																if (responseCode == 200 && data.length <= 1) {
																	infowindow.close();
																	messagewindow.open(map, marker);
																}
															});
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
														function doNothing () {
														}
													</script>
													<script async defer
													src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBmkWyY2E81g0P4PU-n9ZbDqsqxGGZWsr8&callback=initMap">
													</script>
    </body>
</html>
<?php session_unset(); 
			session_destroy(); 
			?>