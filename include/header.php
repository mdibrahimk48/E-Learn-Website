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
$faq=new FAQ();
$course=new Course();
$cart=new Cart();   
$user=new User();
$notice=new Notice();
 ?>
<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from templates.scriptsbundle.com/knowledge/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 23 Nov 2019 14:42:49 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="ScriptsBundle">
    <title>Knowledge Q&A Page</title>
    <!-- =-=-=-=-=-=-= Favicons Icon =-=-=-=-=-=-= -->
    <link rel="icon" href="images/favicon.ico" type="image/x-icon" />
    <!-- =-=-=-=-=-=-= Mobile Specific =-=-=-=-=-=-= -->
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <!-- =-=-=-=-=-=-= Bootstrap CSS Style =-=-=-=-=-=-= -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- =-=-=-=-=-=-= Template CSS Style =-=-=-=-=-=-= -->
    <link rel="stylesheet" href="css/style.css">
    <!-- =-=-=-=-=-=-= Font Awesome =-=-=-=-=-=-= -->
    <link rel="stylesheet" href="css/font-awesome.css">
    <!-- =-=-=-=-=-=-= Et Line Fonts =-=-=-=-=-=-= -->
    <link rel="stylesheet" href="css/et-line-fonts.css">
    <!-- =-=-=-=-=-=-= Google Fonts =-=-=-=-=-=-= -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic|Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css">
    <!-- =-=-=-=-=-=-= Owl carousel =-=-=-=-=-=-= -->
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="css/owl.style.css">
    <!-- =-=-=-=-=-=-= Highliter Css =-=-=-=-=-=-= -->
    <link type="text/css" rel="stylesheet" href="css/styles/shCoreDefault.css" />
    <!-- =-=-=-=-=-=-= Css Animation =-=-=-=-=-=-= -->
    <link type="text/css" rel="stylesheet" href="css/animate.min.css" />
    <!-- =-=-=-=-=-=-= Hover Dropdown =-=-=-=-=-=-= -->
    <link type="text/css" rel="stylesheet" href="css/bootstrap-dropdownhover.min.css" />
    <!-- JavaScripts -->
    <script src="js/modernizr.js"></script>
</head>

<body>
    
    <!-- =-=-=-=-=-=-= HEADER =-=-=-=-=-=-= -->
    <div class="top-bar" style="background-color: #005691">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-4">
                <ul class="top-nav nav-left">
                    <li><a href="index.php">Home</a>
                    </li>
                    <li  class="hidden-xs"><a href="contact.php">Contact Us</a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-6 col-xs-8">
                <ul class="top-nav nav-right">
                    <?php
                     $login= Session::get("userlogin");
                    if ($login==false) {?>
                    <li><a href="login.php"><i class="fa fa-lock" aria-hidden="true"></i>Login</a>
                    </li>
                    <li><a href="login.php"><i class="fa fa-user-plus" aria-hidden="true"></i>Signup</a>
                        <?php } ?>
                    </li>
                     <?php
                     $login= Session::get("userlogin");
                    if ($login==true) {?>
                    <li class="dropdown"> 
                        <a class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown" data-animations="fadeInUp">
                            <img class="img-circle resize" alt="" src="<?php echo(Session::get("userImg")); ?>">
                            <span class="hidden-xs small-padding">
                               
                                <span><?php echo(Session::get("userName")); ?></span>
                                  
                             <i class="fa fa-caret-down"></i>
                            </span>
                        </a>
                        <?php 
                              if (isset($_GET['uid'])) {
                                $userid= Session::get("userId");
                                $deldata=$cart->delUserCart();
                                //$delCom=$pd->delCompareData($userid);
                                Session::destroy();
                              }

                         ?>
                        <ul class="dropdown-menu ">
                             
                            <li><a href="dashboard.php"><i class=" icon-bargraph"></i> Dashboard</a></li>
                            <li><a href="?uid=<?php Session::get('userId') ?>"><i class="icon-lock"></i> Logout</a></li>
                           
                        </ul>
                     </li>
                      <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div>