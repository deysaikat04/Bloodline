<!DOCTYPE html>
 <html lang="en">
><meta http-equiv="content-type" content="text/html;charset=iso-8859-1" />
<head>
       <meta charset="utf-8">
        <title>BloodLine</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="description" content="Blood Donation">
        <meta name="author" content="xenioushk">
        <link rel="shortcut icon" href="images/logo1.png" />
        <link rel="stylesheet" href="css/bootstrap.min.css" />
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
        <?php include("header.php");?>
        <section class="page-header" data-stellar-background-ratio="1.2">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <h3> Donor Details </h3>
                    </div>
                </div> <!-- end .row  -->
            </div> <!-- end .container  -->
        </section> <!-- end .page-header  -->
        <section class="section-content-block" >
            <div class="container">
                <div class="row section-heading-wrapper">
                    <div class="col-md-12 col-sm-12 text-center">
                        <h2 class="section-heading"> Welcome </h2>
                        <p class="section-subheading">You can see Donor details here.</p>
                    </div> <!-- end .col-sm-12  -->                       
                </div> <!-- end .row  -->
				<?php
					$con=mysqli_connect("localhost","root","","db_donor");
					if($con){
						$id=$_GET['no'];
						$sql = "SELECT name FROM markers WHERE id = '$id'";
						$result = mysqli_query($con,$sql);	
						if(mysqli_num_rows($result) == 1 ){
							$row = mysqli_fetch_assoc($result);
							$uname = $row["name"];
							$sql_donor = "SELECT * FROM `donor_detail` d, markers m WHERE d.name = '$uname' AND d.name = m.name";
							$result = mysqli_query($con,$sql_donor);
							while($data = mysqli_fetch_array($result)){
				?>
                <div class="row">              	
		            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="event-latest card">
                            <div class="row"> 
                                <div class="col-lg-5 col-md-5  hidden-sm hidden-xs">
                                    <div class="event-latest-thumbnail">
                                        <a href="#">
                                            <?php
                                                echo '<img src="data:'.$data[11].';base64,'.$data[10].'"  /><br>';
                                            ?> 
                                        </a>
                                    </div>
                                </div> <!--  col-sm-5  -->
                                <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                                   <div class="event-details" style="margin-top:50px;">
										<div class="form-group col-md-6">
											<p class="list_title">Name :</p>
											<p class="list_title_info"><?php echo $data['name']; ?></p>
										</div>	
									<div class="form-group col-md-6">
										<p class="list_title">Sex :</p>
										<p class="list_title_info"><?php echo $data['gender']; ?></p>
									</div>
									<div class="form-group col-md-6">
										<p class="list_title">Blood Group :</p>
										<p class="list_title_info"><a href=""><?php echo $data['bGroup']; ?></a></p>
									</div>	
									<div class="form-group col-md-6">
										<p class="list_title">Contact :</p>
										<p class="list_title_info"><?php echo $data['contact']; ?></p>
								    </div>	
									<div class="form-group col-md-6">
										<p class="list_title">Weight :</p>
										<p class="list_title_info"><?php echo $data['weight']; ?></p>
									</div>
									<div class="form-group col-md-6">
										<p class="list_title">Age :</p>
										<p class="list_title_info"><?php 
										$today = date("Y-m-d");
										$dob = $data['DOB'];
										$diff = date_diff(date_create($dob), date_create($today));
										echo $diff->format('%y');
										?></p>
									</div>	
									<div class="form-group col-md-6">
										<p class="list_title">Address :</p>
										<p class="list_title_info"><?php echo $data['address']; ?></p>
								    </div>	
									<div class="form-group col-md-6">	
										<input class="btn btn-default find" value="Contact" type="submit">			
                                    </div>							
								</div>																	
                            </div> <!--  col-sm-7  -->
                         </div>
                    </div> <!-- card ends -->                        
                </div> <!--  col-sm-12  --> 
            </div> <!--  end .row  -->
<?php
	}//while 
  }// connection if one row found
else{ ?>
	<div class="alert alert-danger text-center" role="alert">
	<h4 class="alert-heading">We are Sorry!</h4>
	<hr><p style="padding:20px 20px;">There Has <strong>No Blood Donor</strong> To Display.</p>                             </div>
<?php		}    }   ?>
            </div> <!--  end .container  --> 
        </section>

        <!-- SECTION CTA  -->   

        <section class="cta-section-2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
                        <h2>We are helping people from 40 years</h2>
                        <p>
                            You can give blood at any of our blood donation venues all over the world. We have total sixty thousands donor centers and visit thousands of other venues on various occasions.                            
                        </p>
                        <a class="btn btn-cta-2" href="#">BECOME VOLUNTEER</a>
                    </div> <!--  end .col-md-8  -->
                </div> <!--  end .row  -->
            </div>
        </section> 
        <!-- CLIENT LOGO SECTION  -->
        <section class="section-client-logo section-secondary-bg">
            <div class="container wow fadeInUp">
                <div class="row">
                    <div class="logo-items logo-layout-1 text-center">
                        <div class="client-logo">
                            <img src="images/logo_1.jpg" alt="" />
                        </div>
                        <div class="client-logo">
                            <img src="images/logo_2.jpg" alt="" />
                        </div>
                        <div class="client-logo">
                            <img src="images/logo_3.jpg" alt="" />
                        </div>
                        <div class="client-logo">
                            <img src="images/logo_4.jpg" alt="" />
                        </div>
                        <div class="client-logo">
                            <img src="images/logo_5.jpg" alt="" />
                        </div>
                        <div class="client-logo">
                            <img src="images/logo_6.jpg" alt="" />
                        </div>
                        <div class="client-logo">
                            <img src="images/logo_7.jpg" alt="" />
                        </div>
                        <div class="client-logo">
                            <img src="images/logo_8.jpg" alt="" />
                        </div>
                    </div> <!-- end .testimonial-container  -->
                </div> <!-- end row  -->
            </div> <!-- end .container  -->
        </section> <!--  end .section-client-logo -->
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
        <script src="js/custom-scripts.js"></script>
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
															var url = 'marker/updateData.php?name=' + name + '&address=' + address +
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