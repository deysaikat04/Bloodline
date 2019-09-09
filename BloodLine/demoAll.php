<?php
		$con=mysqli_connect("localhost","root","","db_donor");
		if($con)
		{			
			$rows = array();
			$sql_donor = "SELECT * FROM `donor_detail` d WHERE d.status = 1";
			$result = mysqli_query($con,$sql_donor);	
			while($data = mysqli_fetch_array($result)){
				echo "<pre>";
				echo '<img src="data:'.$data[11].';base64,'.$data[10].'" width=100 height=100 /><br>';
				exit;
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
        <link rel="stylesheet" href="css/bootstrap.min.css" />     <!-- The styles -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" >
        <link href="css/animate.css" rel="stylesheet" type="text/css" >
        <link href="css/owl.carousel.css" rel="stylesheet" type="text/css" >
        <link href="css/venobox.css" rel="stylesheet" type="text/css" >
        <link rel="stylesheet" href="css/styles.css" />
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
                <h3>Campaign Lists</h3>
                    <p class="page-breadcrumb">
                         <a href="#">Home</a> / All Campaigns
                    </p>
            </div>

                </div> <!-- end .row  -->

            </div> <!-- end .container  -->

        </section> <!-- end .page-header  -->

        <!--  MAIN CONTENT  -->

        <!--  SECTION CAMPAIGNS   -->

        <section class="section-content-block" >

            <div class="container">

                <div class="row section-heading-wrapper">

                    <div class="col-md-12 col-sm-12 text-center">
                        <h2 class="section-heading">Doner List</h2>
                        <p class="section-subheading">Campaigns to encourage new donors to join and existing to continue to give blood.</p>
                    </div> <!-- end .col-sm-12  -->                       

                </div> <!-- end .row  -->
								
							
								<!-- doner grid started  -->
                <div class="row">
									<?php 
									
									?>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="event-latest card">
                            <div class="row"> 
															
                                <div class="col-lg-5 col-md-5 hidden-sm hidden-xs">
                                    <div class="event-latest-thumbnail">
                                        <a href="#">
                                            <?php
																							echo '<img src="data:'.$data[11].';base64,'.$data[10].'"  />';
																						?>
                                        </a>
                                    </div>
                                </div> <!--  col-sm-5  -->

                                <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                                    <div class="event-details">
                                        <a class="latest-date" href="#"><?php echo $data['name']; ?></a>
                                        <h4 class="event-latest-title">
                                            Blood Group: <a href="#"><?php echo $data['bGroup']; ?></a>
                                        </h4>
                                        <p><strong>Sex: </strong><?php echo $data['gender']; ?></p>
                                        <p><strong>Age: </strong>53</p>
                                        
                                        <div class="event-latest-details">
                                            <a class="comments" href="#"> <i class="fa fa-map-marker" aria-hidden="true"></i> HWH, WB</a>
                                        </div>
                                        <input class="btn btn-default find" value="Contact" type="submit">
                                    </div>
                                </div> <!--  col-sm-7  -->
															
                            </div>

                        </div>
                    </div> <!--  col-sm-6  -->
                    <?php //} ?>

                    

                              

                <div class="row">
                    <div class="col-sm-12 col-md-4 col-md-offset-4 text-center">
                        <a class="btn btn-load-more" href="#">Load All Campaigns</a>
                    </div>
                </div>

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
 <?php include("footeer.php"); ?> <!--footer part  -->
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
		}
	}
else
{
	header("location:searchDonor.php");
}
?>