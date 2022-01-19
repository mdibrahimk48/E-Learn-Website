<?php 
ob_start();
 ?>
 <?php 
include_once '../lib/Session.php'; 
Session::checkSession();
include_once '../lib/Database.php';
include_once '../helpers/Format.php';
include_once'../classes/Employee.php';  
include_once'../classes/Report.php'; 
include_once'../classes/Product.php';
include_once'../classes/Catagory.php';
/*
spl_autoload_register(function($class){
include_once"../classes/".$class.".php";
});
*/
$db=new Database();
$fm=new Format();
$em=new Employee(); 
$report=new Report();
$pd=new Product(); 
$cat=new Catagory(); 


 ?>
<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<!-- Mirrored from learnplus-bootstrap.frontendmatter.com/student-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 24 Oct 2019 13:26:16 GMT -->

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Student - Dashboard</title>
<!-- Prevent the demo from appearing in search engines (REMOVE THIS) -->
<meta name="robots" content="noindex">
<!-- Perfect Scrollbar -->
<link type="text/css" href="assets/vendor/perfect-scrollbar.css" rel="stylesheet">
<!-- Material Design Icons -->
<link type="text/css" href="assets/css/material-icons.css" rel="stylesheet">
<link type="text/css" href="assets/css/material-icons.rtl.css" rel="stylesheet">
<!-- Font Awesome Icons -->
<link type="text/css" href="assets/css/fontawesome.css" rel="stylesheet">
<link type="text/css" href="assets/css/fontawesome.rtl.css" rel="stylesheet">
<!-- App CSS -->
<link type="text/css" href="assets/css/app.css" rel="stylesheet">
<link type="text/css" href="assets/css/app.rtl.css" rel="stylesheet">
</head>

<body class=" layout-fluid">
<div class="preloader">
    <div class="sk-double-bounce">
        <div class="sk-child sk-double-bounce1"></div>
        <div class="sk-child sk-double-bounce2"></div>
    </div>
</div>
<!-- Header Layout -->
<div class="mdk-header-layout js-mdk-header-layout">
    <!-- Header -->
    <div id="header" data-fixed class="mdk-header js-mdk-header mb-0">
        <div class="mdk-header__content">
            <!-- Navbar -->
            <nav id="default-navbar" class="navbar navbar-expand navbar-dark bg-primary m-0">
                <div class="container-fluid">
                    <!-- Toggle sidebar -->
                    <button class="navbar-toggler d-block" data-toggle="sidebar" type="button">
                        <span class="material-icons">menu</span>
                    </button>
                    <!-- Brand -->
                    <a href="student-dashboard.html" class="navbar-brand">
                        <img src="assets/images/logo/white.svg" class="mr-2" alt="LearnPlus" />
                        <span class="d-none d-xs-md-block">LearnPlus</span>
                    </a>
                    <!-- Search -->
                    <form class="search-form d-none d-md-flex">
                        <input type="text" class="form-control" placeholder="Search">
                        <button class="btn" type="button"><i class="material-icons font-size-24pt">search</i></button>
                    </form>
                    <!-- // END Search -->
                    <div class="flex"></div>
                    <!-- Menu -->
                    <ul class="nav navbar-nav flex-nowrap d-none d-lg-flex">
                        <li class="nav-item">
                            <a class="nav-link" href="student-forum.html">Forum</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="student-help-center.html">Get Help</a>
                        </li>
                    </ul>
                    <!-- Menu -->
                    <ul class="nav navbar-nav flex-nowrap">
                        <li class="nav-item d-none d-md-flex">
                            <a href="student-cart.html" class="nav-link">
                                <i class="material-icons">shopping_cart</i>
                            </a>
                        </li>
                        <!-- Notifications dropdown -->
                        <li class="nav-item dropdown dropdown-notifications dropdown-menu-sm-full">
                            <button class="nav-link btn-flush dropdown-toggle" type="button" data-toggle="dropdown" data-dropdown-disable-document-scroll data-caret="false">
                                <i class="material-icons">notifications</i>
                                <span class="badge badge-notifications badge-danger">2</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div data-perfect-scrollbar class="position-relative">
                                    <div class="dropdown-header"><strong>Messages</strong></div>
                                    <div class="list-group list-group-flush mb-0">
                                        <a href="student-messages.html" class="list-group-item list-group-item-action unread">
                                            <span class="d-flex align-items-center mb-1">
                                                <small class="text-muted">5 minutes ago</small>
                                                <span class="ml-auto unread-indicator bg-primary"></span>
                                            </span>
                                            <span class="d-flex">
                                                <span class="avatar avatar-xs mr-2">
                                                    <img src="assets/images/people/110/woman-5.jpg" alt="people" class="avatar-img rounded-circle">
                                                </span>
                                                <span class="flex d-flex flex-column">
                                                    <strong>Michelle</strong>
                                                    <span class="text-black-70">Clients loved the new design.</span>
                                                </span>
                                            </span>
                                        </a>
                                        <a href="student-messages.html" class="list-group-item list-group-item-action unread">
                                            <span class="d-flex align-items-center mb-1">
                                                <small class="text-muted">5 minutes ago</small>
                                                <span class="ml-auto unread-indicator bg-primary"></span>
                                            </span>
                                            <span class="d-flex">
                                                <span class="avatar avatar-xs mr-2">
                                                    <img src="assets/images/people/110/woman-5.jpg" alt="people" class="avatar-img rounded-circle">
                                                </span>
                                                <span class="flex d-flex flex-column">
                                                    <strong>Michelle</strong>
                                                    <span class="text-black-70">🔥 Superb job..</span>
                                                </span>
                                            </span>
                                        </a>
                                    </div>
                                    <div class="dropdown-header"><strong>System notifications</strong></div>
                                    <div class="list-group list-group-flush mb-0">
                                        <a href="student-messages.html" class="list-group-item list-group-item-action border-left-3 border-left-danger">
                                            <span class="d-flex align-items-center mb-1">
                                                <small class="text-muted">3 minutes ago</small>
                                            </span>
                                            <span class="d-flex">
                                                <span class="avatar avatar-xs mr-2">
                                                    <span class="avatar-title rounded-circle bg-light">
                                                        <i class="material-icons font-size-16pt text-danger">account_circle</i>
                                                    </span>
                                                </span>
                                                <span class="flex d-flex flex-column">
                                                    <span class="text-black-70">Your profile information has not been synced correctly.</span>
                                                </span>
                                            </span>
                                        </a>
                                        <a href="student-messages.html" class="list-group-item list-group-item-action">
                                            <span class="d-flex align-items-center mb-1">
                                                <small class="text-muted">5 hours ago</small>
                                            </span>
                                            <span class="d-flex">
                                                <span class="avatar avatar-xs mr-2">
                                                    <span class="avatar-title rounded-circle bg-light">
                                                        <i class="material-icons font-size-16pt text-success">group_add</i>
                                                    </span>
                                                </span>
                                                <span class="flex d-flex flex-column">
                                                    <strong>Adrian. D</strong>
                                                    <span class="text-black-70">Wants to join your private group.</span>
                                                </span>
                                            </span>
                                        </a>
                                        <a href="student-messages.html" class="list-group-item list-group-item-action">
                                            <span class="d-flex align-items-center mb-1">
                                                <small class="text-muted">1 day ago</small>
                                            </span>
                                            <span class="d-flex">
                                                <span class="avatar avatar-xs mr-2">
                                                    <span class="avatar-title rounded-circle bg-light">
                                                        <i class="material-icons font-size-16pt text-warning">storage</i>
                                                    </span>
                                                </span>
                                                <span class="flex d-flex flex-column">
                                                    <span class="text-black-70">Your deploy was successful.</span>
                                                </span>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!-- // END Notifications dropdown -->
                        <!-- User dropdown -->
                        <li class="nav-item dropdown ml-1 ml-md-3">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"><img src="assets/images/people/50/guy-6.jpg" alt="Avatar" class="rounded-circle" width="40"></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="student-account-edit.html">
                                    <i class="material-icons">edit</i> Edit Account
                                </a>
                                <a class="dropdown-item" href="student-profile.html">
                                    <i class="material-icons">person</i> Public Profile
                                </a>
                                <a class="dropdown-item" href="guest-login.html">
                                    <i class="material-icons">lock</i> Logout
                                </a>
                            </div>
                        </li>
                        <!-- // END User dropdown -->
                    </ul>
                    <!-- // END Menu -->
                </div>
            </nav>
            <!-- // END Navbar -->
        </div>
    </div>
    <!-- // END Header -->