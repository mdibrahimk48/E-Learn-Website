<?php ob_start(); ?>
<?php 
include 'lib/Session.php'; 
Session::init();
include_once 'lib/Database.php';
include_once 'helpers/Format.php'; 

spl_autoload_register(function($class){
include_once"classes/".$class.".php";
});
$db=new Database();
$fm=new Format();
$course=new Course();
$cart=new Cart();	
$ur=new User();
$notice=new Notice();

 ?>
<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>
<!doctype html>
<html class="no-js" lang="en">
<!-- Mirrored from preview.hasthemes.com/educan/courses-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 03 Nov 2019 17:29:43 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>LearnPLUS</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="images/img/favicon.ico">
    <link rel="apple-touch-icon" href="images/img/apple-touch-icon.png">
    <!-- All css files are included here. -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Owl Carousel fremwork main css -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="css/core.css">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="css/shortcode/shortcodes.css">
    <!-- Theme main style -->
    <link rel="stylesheet" href="style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- User style -->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Modernizr JS -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
<!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<!-- Body main wrapper start -->
<div class="wrapper">
    <!-- Start Header Style -->
    <div id="htc__header" class="htc-header header--one">
        <!-- Start Header Top -->
        <div class="htc__header__top bg__theme hidden-xs">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                        <div class="header__top__left">
                            <ul class="header__address">
                                <li><a href="tel:+00123456789"><i class="icon ion-android-call"></i>(+00) 123 456 789</a></li>
                                <li><a href="mailto:www.yourmail.com"><i class="icon ion-android-mail"></i>support@yourmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                        <div class="header__top__right">
                            <ul class="social__icon">
                                <?php
                                 $login= Session::get("userlogin");
                                if ($login!=false) {?>
                                <li><a href="dashboard.php"><i class="icon ion-ios-home"></i></a></li>
                                <?php } ?>
                            </ul>
                             <?php 
                              if (isset($_GET['uid'])) {
                                $userid= Session::get("userId");
                                $deldata=$cart->delUserCart();
                                //$delCom=$pd->delCompareData($userid);
                                Session::destroy();
                              }

                         ?>
                            <ul class="login__register">
                                <li><a href="register.php">Register</a></li>
                                <?php
                                 $login= Session::get("userlogin");
                                if ($login==false) {?>
                                <li class="drop"><a href="login.php">Login</a></li>
                              <?php }else{?>
                                   <li>
                                <a title="logout" href="?uid=<?php Session::get('userId') ?>">
                            <img style=" border-radius: 50%;" width="30" height="30" alt="" src="<?php echo(Session::get("userImg")); ?>">
                            <?php echo(Session::get("userName")); ?>
                               </a></li>
                               <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header Top -->