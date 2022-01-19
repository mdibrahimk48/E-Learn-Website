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
include_once'../classes/FAQ.php';

/*
spl_autoload_register(function($class){
include_once"../classes/".$class.".php";
});
*/
$db=new Database();
$fm=new Format();
$em=new Employee(); 
$report=new Report();
$faq=new FAQ(); 



 ?>
<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
<!-- Mirrored from learnplus-bootstrap.frontendmatter.com/instructor-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 24 Oct 2019 13:30:55 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Instructor Dashboard</title>
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
    <!-- Flatpickr -->
    <link type="text/css" href="assets/css/flatpickr.css" rel="stylesheet">
    <link type="text/css" href="assets/css/flatpickr.rtl.css" rel="stylesheet">
    <link type="text/css" href="assets/css/flatpickr-airbnb.css" rel="stylesheet">
    <link type="text/css" href="assets/css/flatpickr-airbnb.rtl.css" rel="stylesheet">

    <!-- Quill Theme -->
    <link type="text/css" href="assets/css/quill.css" rel="stylesheet">
    <link type="text/css" href="assets/css/quill.rtl.css" rel="stylesheet">

    <!-- Nestable -->
    <link rel="stylesheet" href="assets/css/nestable.css">
    <link rel="stylesheet" href="assets/css/nestable.rtl.css">

</head>

<body class=" layout-fluid">
    
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
                        <a href="dashboard.php" class="navbar-brand">
                            <img src="assets/images/logo/white.svg" class="mr-2" alt="LearnPlus" />
                            <span class="d-none d-xs-md-block">LearnPlus</span>
                        </a>
                        <div class="flex"></div>
                        <ul class="nav navbar-nav flex-nowrap">
                            <!-- Notifications dropdown -->
                            <li class="nav-item dropdown dropdown-notifications dropdown-menu-sm-full">
                                <button class="nav-link btn-flush dropdown-toggle" type="button" data-toggle="dropdown" data-dropdown-disable-document-scroll data-caret="false">
                                    <i class="material-icons">email</i>
                                    <?php 
                                    $countMail=0;
                                        $getCmnt=$faq->getAllComments();
                                        if ($getCmnt) {
                                        $countMail = $getCmnt->num_rows;
                                        }
                                     ?>
                                    <span class="badge badge-notifications badge-danger"><?php echo( $countMail); ?></span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <div data-perfect-scrollbar class="position-relative">
                                        <div class="dropdown-header"><strong>Messages</strong></div>
                                        <div class="list-group list-group-flush mb-0">
                                            <?php 
                                             $i=0;
                                            $getCmnt=$faq->getAllComments();
                                            if ($getCmnt) {
                                              while ($result=$getCmnt->fetch_assoc()) {
                                                $i++;
                                                if ($i==4) {
                                                   break;
                                                }
                                             ?>
                                            <a href="replymsg.php?rmsgid=<?php echo($result['id']); ?>" class="list-group-item list-group-item-action unread">
                                                <span class="d-flex align-items-center mb-1">
                                                    <small class="text-muted"><?php echo(date('d M Y', strtotime($result['date']))); ?> at <?php echo(date('g:i A', strtotime($result['date']))); ?></small>
                                                    <span class="ml-auto unread-indicator bg-primary"></span>
                                                </span>
                                                <span class="d-flex">
                                                    <span class="avatar avatar-xs mr-2">
                                                        <img src="upload/user/user.png" alt="people" class="avatar-img rounded-circle">
                                                    </span>
                                                    <span class="flex d-flex flex-column">
                                                        <strong><?php echo($result['subject']);?></strong>
                                                        <span class="text-black-70"><?php echo($fm->textShorten($result['body'],20)); ?></span>
                                                    </span>
                                                </span>
                                            </a>
                                             <?php }}else{ ?>
                                            <a href="instructor-messages.html" class="list-group-item list-group-item-action unread">
                                                <span class="d-flex">
                                                    <span class="flex d-flex flex-column">
                                                        <span class="text-black-70" style="text-align: center;">Superb job..</span>
                                                    </span>
                                                </span>
                                            </a>
                                             <?php } ?>
                                        </div>
                                        <div class="dropdown-header"><a href="emaillist"><strong>View all</strong></a></div>
                                    </div>
                                </div>
                            </li>
                            <!-- // END Notifications dropdown -->
                            <!-- User dropdown -->
                            <li class="nav-item dropdown ml-1 ml-md-3">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"><img src="<?php echo(Session::get("user_img"));?>" alt="Avatar" class="rounded-circle" width="40"></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="change-profile.php">
                                        <i class="material-icons">edit</i> Change Profile
                                    </a>
                                    <?php 
                                   if (isset($_GET['action'])&&$_GET['action']=="logout") {
                                        Session::destroy();
                                    }
                                   ?>
                                    <a class="dropdown-item" href="?action=logout">
                                        <i class="material-icons">lock</i> Logout
                                    </a>
                                </div>
                            </li>
                            <!-- // END User dropdown -->
                        </ul>
                    </div>
                </nav>
                <!-- // END Navbar -->
            </div>
        </div>
        <!-- // END Header -->
        <!-- Header Layout Content -->
        