<?php
session_start(); 
if(isset($_SESSION['currentuser']))
	{
		$con=mysqli_connect("localhost","root","","db_donor");
		if($con)
		{
			$sql = "SELECT * FROM user WHERE name = '".$_SESSION['currentuser']."'";
			$result = mysqli_query($con,$sql);	
			$uid = 0;
			if(mysqli_num_rows($result) == 1 ){
				$row = mysqli_fetch_assoc($result);
				$uid = $row["d_id"]; 
			}
			$sql_donor = "SELECT * FROM `donor_detail` d, markers m WHERE d.id = '$uid' AND d.name = m.name";
			$result = mysqli_query($con,$sql_donor);	
			while($data = mysqli_fetch_array($result)){
?>
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
        <link rel="stylesheet" href="css/bootstrap.min.css" />            <!-- The styles -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" >
        <link href="css/animate.css" rel="stylesheet" type="text/css" >
        <link href="css/owl.carousel.css" rel="stylesheet" type="text/css" >
        <link href="css/venobox.css" rel="stylesheet" type="text/css" >
        <link rel="stylesheet" href="css/styles.css" />
         <link rel="stylesheet" href="assets/style.css" />
     </head>
    <body> 
        <header class="main-header sticky-header clearfix" data-sticky_header="true">  <!--  HEADER -->
            <div class="top-bar clearfix">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-sm-12">
                            <p>Welcome to BloodLine</p>
                        </div>
                        </div>
                </div> <!--  end .container -->
            </div> <!--  end .top-bar  -->
    <section class="header-wrapper navgiation-wrapper">
        <div class="navbar navbar-default">			
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="logo" href="index.php"><img alt="" src="images/logo1.png"></a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="drop"><a href="index.php" class="active">Home</a></li>
                        <li><a href="commentShow.php">Comments</a></li>
                        <li><a href="searchDonor.php">Search For Donor</a></li>
                        <li><a href="doner_signup.php">Register</a></li>
                        <li><a href="donor_logout.php">Log Out</a></li>                                
                    </ul>
                </div>
            </div>
        </div>
    </section>
</header> <!-- end main-header  -->
        <section class="page-header" data-stellar-background-ratio="1.2">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <h3>View Your Profile</h3>
                    </div>
                </div> <!-- end .row  -->
            </div> <!-- end .container  -->
        </section> <!-- end .page-header  -->
        <section class="section-content-block" >
            <div class="container">
                <div class="row section-heading-wrapper">
                    <div class="col-md-12 col-sm-12 text-center">
                        <h2 class="section-heading">
                        	<?php   echo "Welcome ".$data['pname']." in your profile..."; ?> </h2>
                        <p class="section-subheading">You can update your details here.</p>
                    </div> <!-- end .col-sm-12  -->                       
                </div> <!-- end .row  -->
				<div class="row"> <!-- doner grid started  -->
                	<?php
						if(isset($_SESSION["message"]))
						{
							echo '<div class="alert alert-info alert-dismissible">';
							echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
							echo $_SESSION["message"];
							echo '</div>';
						}
					?>
					<form action="php/updateDoner/updateDoner.php" method="post" id="contact-form" class="donerSignup" enctype="multipart/form-data">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="event-latest card">
                            <div class="row"> 
                                <div class="col-lg-5 col-md-5  hidden-sm hidden-xs">
                                    <div class="event-latest-thumbnail">
                                        <a href="#">
                                            <?php
												echo '<img src="data:'.$data[12].';base64,'.$data[11].'"  /><br>';
											?> 
                                        </a>
                                    </div>
                                </div> <!--  col-sm-5  -->
                                <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                                      <div class="event-details">
                                            <div class="form-group col-md-6">
                                                 <h4 class="event-latest-title">Name: </h4>
                                                    <input type="text" class="form-control" id="name" name="pname" value="<?php echo $data['pname']; ?>" disabled />
                                                    <p id="nameErr"></p>
                                            </div>
                                        
                                            <div class="form-group col-md-6">
                                                 <h4 class="event-latest-title">
                                                    Blood Group: </h4>
                                                    <input type="text" class="form-control" name="bgrp" value="<?php echo $data['bGroup']; ?>"  disabled/>
                                                    <p id="nameErr"></p>
                                            </div>
                                             <div class="form-group col-md-6">
                                                 <h4 class="event-latest-title">
                                                    Primary Contact No: </h4>
                                                    <input type="number" class="form-control" name="mob" maxlength="10" value="<?php echo $data['contact']; ?>"  />
                                                    <p id="nameErr"></p>
                                            </div>
                                            <div class="form-group col-md-6">
                                                 <h4 class="event-latest-title">
                                                    Secondary Contact No: </h4>
                                                    <input type="number" class="form-control" name="rmob" maxlength="10" value="<?php echo $data['rContact']; ?>"  />
                                                    <p id="nameErr"></p>
                                            </div>
                                             <div class="form-group col-md-6">
													<h4 class="event-latest-title">Gender: </h4>
													<input type="text" class="form-control" name="gender" value="<?php echo $data['gender']; ?>" disabled />
													<p id="nameErr"></p>
											</div>	
																					
                                            <div class="form-group col-md-6">
                                                 <h4 class="event-latest-title">
                                                    Age: </h4>
                                                    <input type="text"  class="form-control" value="<?php
                                                                $today = date("Y-m-d");
                                                                $dob = $data['DOB'];
                                                                $diff = date_diff(date_create($dob), date_create($today));
                                                                echo $diff->format('%y Years');
                                                    ?>"  disabled/>
                                                    <p id="nameErr"></p>
                                            </div>
                                            <div class="form-group col-md-6">
                                                 <h4 class="event-latest-title">
                                                    Weight: </h4>
                                                    <input type="text" name="weight" class="form-control" value="<?php echo $data['weight']; ?>"  />
                                                    <p id="nameErr"></p>
                                            </div> 
                                            <div class="form-group col-md-6">
                                                <h4 class="event-latest-title">Last Donate Date</h4>
                                                    <input type="date" class="form-control" name="lastDonatedate" id="l1" value="<?php echo $data['LDD']; ?>"  />
                                            </div>	
                                    </div>
                                </div> <!--  col-sm-7  -->
                            </div>
                        </div> <!-- card ends -->
                        <div class="row">
                        	<div class="col-md-12">
                        		<!-- Map Starts -->
                                	<div id="form">
                                        <div class="form-group col-md-6">
								            <h4 class="event-latest-title">Add Your Comment:</h4>
                                            <!--<input type="text" class="form-control" id="msg" name="msg" placeholder="">-->
                                            <textarea class="form-control" rows="5" name="msg" id="msg"></textarea>
                                        </div>
                                        <div class="form-group col-md-8">
                                            <h4 class="event-latest-title">Present Address:</h4>
                                            <i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $data['address']; ?>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <h4 class="event-latest-title">Change Address:</h4>
                                            <input class="form-control" type='text' id='address'/>
                                        </div>													
                                        <div class="col-md-12"><p>Choose your location by clicking on the map.</p></div>
                                        <div class="col-md-12" id="map" style="width:100%; height:300px;margin-bottom:20px;"></div><!-- Map Ends -->
                                    </div>
                            </div>
                    </div> <!--  col-sm-12  -->      
                    <div class="row">
                    <div class="col-sm-12 col-md-4 col-md-offset-4 text-center">
                        <input type="submit" class="btn_save" value="Update" type="submit" name="save" onClick="saveData()"> 
                        <input type="hidden" name="id"  value="<?php echo $data[0]; ?>" />
                        <input type="hidden" name="name"  id="userName" value="<?php echo $data['name']; ?>" />
                    </div>
                </div>
            </form>
        </div> <!--  end .row  -->
    </div> <!--  end .container  --> 
</section>
<!--FOOTER START-->
<footer>            
    <section class="footer-widget-area footer-widget-area-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="about-footer">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <img src="images/logo1.png" alt="" />
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                <p>
                                     We are a trustful blood donation center.We have been working with a prestigious vision to helping the people who are in need of blood by giving them all details of blood group availability or regarding the donors with the same blood group.
                                </p>
                            </div> <!--  end .col-lg-9  -->
                        </div> <!--  end .row -->
                    </div> <!--  end .about-footer  -->
                </div> <!--  end .col-md-12  -->
            </div> <!--  end .row  -->
            <section class="footer-contents">
                <div class="container">
                    <div class="row clearfix">
                        <div class="col-md-6 col-sm-12">
                            <p class="copyright-text"> BloodLine Group. All right reserved. </p>
                        </div>  <!-- end .col-sm-6  -->
                        <div class="col-md-6 col-sm-12 text-right">
                            <div class="footer-nav">
                                <nav>
                                    <ul>
                                        <li><a href="index.php">Home</a></li>
                                        <li><a href="commentShow.php">Comments</a> </li>
                                        <li><a href="searchDonor.php">Search For Donor</a></li>
                                        <li><a href="doner_signup.php">Register</a></li>
                                        <li><a href="donor_logout.php">Log Out</a></li>
                                    </ul>
                                </nav>
                            </div> <!--  end .footer-nav  -->
                        </div> <!--  end .col-lg-6  -->
                    </div> <!-- end .row  -->                                    
                </div> <!--  end .container  -->
            </section> <!--  end .footer-content  -->
        </div>
    </section>
</footer> <!-- END FOOTER -->
<!-- Back To Top Button  -->
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
	//var name = escape(document.getElementById('name').value);
	var name = escape(document.getElementById('userName').value);
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
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBmkWyY2E81g0P4PU-n9ZbDqsqxGGZWsr8&callback=initMap"></script> 
        <!----comment section ---->
        <script>       
        function checkMessage()
{
    if(document.getElementById("message").value.byteLength == 0 ){
			document.getElementById("message").style.border = "1px solid #ed143d";
			document.getElementById("messageErr").innerHTML="Con't Post Blanck";
        echo "header('Location: ../doner_profile.php')".window.alert("Post can,t be null");
        return false;
		}
else {
    //window.alert("Post can,t be null");
    return true;
}}</script>
<!------end-->
  </body>
</html>
<?php
	/*echo "Welcome ".$_SESSION['currentuser']." in your profile...";
		echo "<a href=logout.php style='text-decoration:none;'>Log out</a>";*/
			}//while
		}// connection if
	}
?>
<!--?php session_unset(); 
			session_destroy(); 
			?>