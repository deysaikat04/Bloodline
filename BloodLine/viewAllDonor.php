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
        <link rel="stylesheet" href="css/bootstrap.min.css" /> <!-- The styles -->
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
                        <h3>Search Donors By Blood Group</h3>
                    </div>
                </div> <!-- end .row  -->
            </div> <!-- end .container  -->
        </section> <!-- end .page-header  -->
        <section class="section-content-block" ><!--  MAIN CONTENT  -->
            <div class="container">
                <div class="row section-heading-wrapper">
                    <div class="col-md-12 col-sm-12 text-center">
                        <h2 class="section-heading">Doner List</h2>
                        <p class="section-subheading"></p>
                    </div> <!-- end .col-sm-12  -->
                    <div class="col-md-12 col-sm-12 text-center">
                        <form action="" method="post" id="contact-form" class="donerSignup" name="signUpForm" enctype="multipart/form-data">
                        	<div class="form-group col-md-4 col-md-offset-4">
								<label>Search By Blood Group.</label>
                                <select style="margin-bottom:2%; padding:5px; width: 100%;" name="bgrp" id="gender" class="selectpicker" data-width="100%">
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
				            <div class="form-group col-md-4 col-md-offset-4">
								<input type="submit" id="seeAll" name="search" value="Search" class="btn_load_all" style="margin-top:1%;" />
				            </div>
				        </form>
                    </div> <!-- end .col-sm-12  -->                        
                </div> <!-- end .row  -->
                <div class="row">
					<?php 
						if(isset($_REQUEST['search']))
							{
								$con=mysqli_connect("localhost","root","","db_donor");									
								if($con)
								{			
									$bgrp=$_POST["bgrp"];
									$sql_donor = "SELECT * FROM `donor_detail` d, markers m WHERE d.status = 1 AND d.name = m.name AND d.bGroup ='".$bgrp."'";
									$result = mysqli_query($con,$sql_donor);	
									$count=mysqli_num_rows($result);
									if($count>0){
										while($data = mysqli_fetch_array($result)){
								?>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="event-latest card">
                            <div class="row"> 
                                <div class="col-lg-5 col-md-5 hidden-sm hidden-xs">
                                    <div class="event-latest-thumbnail">
                                        <a href="#">
                                            <?php
												echo '<img src="data:'.$data[12].';base64,'.$data[11].'"  />';
								            ?>
                                        </a>
                                    </div>
                                </div> <!--  col-sm-5  -->
                                <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                                    <div class="event-details">
                                        <a class="latest-date" href="#"><?php echo $data['pname']; ?></a>
                                        <h4 class="event-latest-title">
                                            Blood Group: <a href="#"><?php echo $data['bGroup']; ?></a>
                                        </h4>
                                        <p><strong>Gender: </strong><?php echo $data['gender']; ?></p>
                                        <p><strong>Age: </strong>
                                        <?php 
												$today = date("Y-m-d");
												$dob = $data['DOB'];
												$diff = date_diff(date_create($dob), date_create($today));
												echo $diff->format('%y');
								        ?></p>
                                        <div class="event-latest-details">
                                            <a class="comments" href="#"> <i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $data['address']; ?></a>
                                            <a class="comments" href="#"> <i class="fa fa-phone" aria-hidden="true"></i> <?php echo $data['contact']; ?></a>
                                        </div>
                                        <input class="btn btn-default find" value="Contact" type="submit">
                                    </div>
                                </div> <!--  col-sm-7  -->
                            </div>
                        </div>
                    </div> <!--  col-sm-6  -->
                    <?php } ?>
                  <?php }else{ ?>
								<div class="alert alert-danger text-center" role="alert">
								<h4 class="alert-heading">We are Sorry!</h4>
								<hr>
									<p style="padding:20px 20px;">There Has <strong>No Blood Donor</strong> To Display.</p>
								</div>
				<?php		} ?>
                <?php } ?>
               <?php } ?>
        </section>
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
    </body>
</html>
<?php	
	
?>