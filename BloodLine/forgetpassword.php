<?php session_start(); ?>
<!DOCTYPE html>
 <html lang="en"> <!--<![endif]-->
><meta http-equiv="content-type" content="text/html;charset=iso-8859-1" />
<head>
        <meta charset="utf-8">
        <title>BloodLine</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="description" content="Blood Donation">
        <meta name="author" content="xenioushk">
        <link rel="shortcut icon" href="images/logo1.png" />
        <link rel="stylesheet" href="assets/form-basic.css">
  <script type="text/javascript" src="assets/js/script.js"></script>
       <link rel="stylesheet" href="css/bootstrap.min.css" />   <!-- The styles -->
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
          <?php include("header.php"); ?> <!--header part  -->
        <section class="page-header" data-stellar-background-ratio="1.2">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 ">
                        <p class="page-breadcrumb"></p>
				<section class="section-content-block section-contact-block">
				<div class="container">
					<div class="row">   
						<div class="col-sm-6 col-md-6 col-md-offset-3 wow fadeInLeft">								
							<div class="contact-form-block">
								<?php
									if(isset($_SESSION["message"]))
									{
										echo '<div class="alert alert-danger alert-dismissible">';
										echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
										echo $_SESSION["message"];
										echo '</div>';
									}
								?>
								<h2 class="contact-title">Enter Your User Id And Email Id</h2>   
								<form action="checkForget.php" method="post" id="contact-form" 
										class="donerSignup" enctype="multipart/form-data">
                                    <div class="form-group col-md-12">
										<label>Username Id</label><span class="text-danger"> *</span>
										<input type="text" class="form-control" name="name" id="name" onkeyUp="userCheck()" required>
                                    </div>
                                    <div class="form-group col-md-12">
									   <label>Email Id</label><span class="text-danger"> *</span>
										<input type="text" class="form-control" name="mail" id="mail" required>
										<!--<meter max="4" id="password-strength-meter"></meter><p id="passEmpty"></p>-->
								    </div>
										<div class="form-group col-md-6 col-md-offset-8">
										<input type="submit" class="btn_save" name="save" onClick="return validate();">
										<input type="reset" class="btn_reset" onClick="document.location.reload(true)">
									</div>
                                    </form>
								</div>
							</div>
						</div>
					</div>
             </div>
        </div> <!-- end .row  -->
    </div> <!-- end .container  -->
</section> <!-- end .page-header  -->
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
<?php session_unset(); 
			session_destroy(); 
			?>