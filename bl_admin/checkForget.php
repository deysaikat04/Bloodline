<?php session_start(); ?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BloodLine Admin</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="assets/scss/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body class="bg-dark">

    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                 <div class="login-form">
                     <div class="login-logo">
                        <a href="index.html">
                            <img class="align-content" src="images/bloodline2.png" alt="">
                        </a>
                    </div>
                    <?php
                        if(isset($_SESSION["message"]))
                        {
                            echo '<div class="alert alert-danger alert-dismissible">';
                            echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
                            echo $_SESSION["message"];
                            echo '</div>';
                        }
                    ?>
                    <?php
                        $con=mysqli_connect("localhost","root","","db_donor");
                        $name=$_POST['name'];
                        $umail=$_POST['mail'];
                        $check = "select * from admin_user where uname='".$name."' AND umail='$umail'";
                       // echo $check;
                        $res=mysqli_query($con,$check);

                        $count = mysqli_num_rows($res); 
                       
                        if($count==1){
                            while ($row = mysqli_fetch_array($res)) 
                            {
                    ?>
                    <p class="text-center">Enter Your New Password</p>
                    <form method="post" action="newpass.php" id="myform">
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="pass" id="pass" onkeyup="passCheck()" required>
                            <input type="hidden" value="<?php echo $row['umail']; ?>" name="umail">

                        </div>
                        <input type="submit" 
                               class="btn btn-primary btn-flat m-b-30 m-t-30" 
                               name="save" 
                               onClick="return validate();"
                               value="SUBMIT">
                        </form>
                </div>
            </div>
        </div>
    </div>
<?php
       }
    }
   
?>
    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>
<?php session_unset(); 
    session_destroy(); 
?>