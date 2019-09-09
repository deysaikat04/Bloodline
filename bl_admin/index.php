<?php
     $con = mysqli_connect("localhost","root","","db_donor");//database connection
?>
<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BloodLine Admin</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="">
    <link rel="shortcut icon" href="">
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/scss/style.css">
    <link href="assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>
<body>
     <?php include("leftpanel.php"); ?> <!--left part  -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
 <?php include("header.php"); ?> <!--header part  -->
        <div class="breadcrumbs">
            <div class="col-sm-6">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Welcome To The Admin Page Of BloodLine</h1>
                    </div>
                </div>
            </div>
        </div>
<div class="content mt-3">
     <?php      
    $query1 = "SELECT * from donor_detail";
    $result1 = mysqli_query($con,$query1);
    $count1 = mysqli_num_rows($result1);
?>
           <div class="col-sm-6 col-lg-12">
                <div class="card text-white bg-flat-color-1">
                    <div class="card-body pb-0">                        
                        <h4 class="mb-0">
                            <span class="count"><center><?php echo $count1; ?></center></span>
                        </h4>
                        <p class="text-light">Number Of Donors</p>                       
                    </div>
                </div>
            </div><!--/.col-->
 <?php      
    $query1 = "SELECT * from donor_detail where bGroup='A+'";
    $result1 = mysqli_query($con,$query1);
    $count1 = mysqli_num_rows($result1);
?>
           <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-1">
                    <div class="card-body pb-0">                        
                        <h4 class="mb-0">
                            <span class="count"><?php echo $count1; ?></span>
                        </h4>
                        <p class="text-light">A+ Donors</p>                       
                    </div>
                </div>
            </div><!--/.col-->
 <?php      
    $query1 = "SELECT * from donor_detail where bGroup='A-'";
    $result1 = mysqli_query($con,$query1);
    $count1 = mysqli_num_rows($result1);
?>
           <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-1">
                    <div class="card-body pb-0">                        
                        <h4 class="mb-0">
                            <span class="count"><?php echo $count1; ?></span>
                        </h4>
                        <p class="text-light">A- Donors</p>                       
                    </div>
                </div>
            </div><!--/.col-->
 <?php      
    $query1 = "SELECT * from donor_detail where bGroup='B+'";
    $result1 = mysqli_query($con,$query1);
    $count1 = mysqli_num_rows($result1);
?>
           <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-1">
                    <div class="card-body pb-0">                        
                        <h4 class="mb-0">
                            <span class="count"><?php echo $count1; ?></span>
                        </h4>
                        <p class="text-light">B+ Donors</p>                       
                    </div>
                </div>
            </div><!--/.col-->
 <?php      
    $query1 = "SELECT * from donor_detail where bGroup='B-'";
    $result1 = mysqli_query($con,$query1);
    $count1 = mysqli_num_rows($result1);
?>
           <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-1">
                    <div class="card-body pb-0">                        
                        <h4 class="mb-0">
                            <span class="count"><?php echo $count1; ?></span>
                        </h4>
                        <p class="text-light">B- Donors</p>                       
                    </div>
                </div>
            </div><!--/.col-->
<?php      
    $query1 = "SELECT * from donor_detail where bGroup='AB+'";
    $result1 = mysqli_query($con,$query1);
    $count1 = mysqli_num_rows($result1);
?>
           <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-1">
                    <div class="card-body pb-0">                        
                        <h4 class="mb-0">
                            <span class="count"><?php echo $count1; ?></span>
                        </h4>
                        <p class="text-light">AB+ Donors</p>                       
                    </div>
                </div>
            </div><!--/.col-->
<?php      
    $query1 = "SELECT * from donor_detail where bGroup='AB-'";
    $result1 = mysqli_query($con,$query1);
    $count1 = mysqli_num_rows($result1);
?>
           <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-1">
                    <div class="card-body pb-0">                        
                        <h4 class="mb-0">
                            <span class="count"><?php echo $count1; ?></span>
                        </h4>
                        <p class="text-light">AB- Donors</p>                       
                    </div>
                </div>
            </div><!--/.col-->
<?php      
    $query1 = "SELECT * from donor_detail where bGroup='O+'";
    $result1 = mysqli_query($con,$query1);
    $count1 = mysqli_num_rows($result1);
?>
           <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-1">
                    <div class="card-body pb-0">                        
                        <h4 class="mb-0">
                            <span class="count"><?php echo $count1; ?></span>
                        </h4>
                        <p class="text-light">O+ Donors</p>                       
                    </div>
                </div>
            </div><!--/.col-->
<?php      
    $query1 = "SELECT * from donor_detail where bGroup='O-'";
    $result1 = mysqli_query($con,$query1);
    $count1 = mysqli_num_rows($result1);
?>
           <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-1">
                    <div class="card-body pb-0">                        
                        <h4 class="mb-0">
                            <span class="count"><?php echo $count1; ?></span>
                        </h4>
                        <p class="text-light">O- Donors</p>                       
                    </div>
                </div>
            </div>
        </div><!--/.col-->
    </div><!-- /#right-panel -->
    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/lib/chart-js/Chart.bundle.js"></script>
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/widgets.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.min.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="assets/js/lib/vector-map/country/jquery.vmap.world.js"></script>
    <script>
        ( function ( $ ) {
            "use strict";
            jQuery( '#vmap' ).vectorMap( {
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: [ '#1de9b6', '#03a9f5' ],
                normalizeFunction: 'polynomial'
            } );
        } )( jQuery );
    </script>

</body>
</html>
<?php 
?>