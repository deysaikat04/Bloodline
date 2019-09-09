<?php session_start(); ?>
<!doctype html>
<html class="no-js" lang="">
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
    <link rel="stylesheet" href="assets/scss/style.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
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
                    <p class="text-center">Enter Your User Id And Email Id</p>
                    <form method="post" action="checkForget.php" id="myform">
                       <div class="form-group">
                            <label>User Id</label>
                            <input type="text" class="form-control" placeholder="User Name" name="name" id="name" onkeyUp="userCheck()" required>
                        </div>
                        <div class="form-group">
                            <label>Email Id</label>
                             <input type="email" class="form-control" placeholder="Email" name="mail" id="mail" onkeyUp="mailCheck()" required>
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
    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>
<?php session_unset(); 
    session_destroy(); 
?>