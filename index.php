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
$pd=new Product();
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
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->
<!-- Mirrored from templatevisual.com/demo/learnplus/index1.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 03 Nov 2019 17:36:23 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <title>LearnPLUS | Learning Management System HTML Template</title>
    <link rel="shortcut icon" href="images/img/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/img/apple-touch-icon.png" />
    <link rel="apple-touch-icon" sizes="57x57" href="images/img/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="images/img/xapple-touch-icon-72x72.png.pagespeed.ic.lf5d8kCpOf.png" />
    <link rel="apple-touch-icon" sizes="76x76" href="images/img/xapple-touch-icon-76x76.png.pagespeed.ic.ATZZpSeito.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="images/img/xapple-touch-icon-114x114.png.pagespeed.ic.Fi5O5s2tzL.png" />
    <link rel="apple-touch-icon" sizes="120x120" href="images/img/xapple-touch-icon-120x120.png.pagespeed.ic.uPQH0sygdV.png" />
    <link rel="apple-touch-icon" sizes="144x144" href="images/img/xapple-touch-icon-144x144.png.pagespeed.ic.yZ9-_sm5OF.png" />
    <link rel="apple-touch-icon" sizes="152x152" href="images/img/xapple-touch-icon-152x152.png.pagespeed.ic.gThaVrKtXF.png" />
    <link rel="apple-touch-icon" sizes="180x180" href="images/img/xapple-touch-icon-180x180.png.pagespeed.ic.Q8Pmsj5fQM.png" />
    <link rel="stylesheet" type="text/css" href="css/css/A.settings.css.pagespeed.cf.xeOyGChsgq.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/css/A.fonts%2c%2c_font-awesome-4.3.0%2c%2c_css%2c%2c_font-awesome.min.css%2bcss%2c%2c_bootstrap.css%2bcss%2c%2c_animate.css%2cMcc.kSNwpaaMDX.css.pagespeed.cf.w2G3xGgFf0.css" />
    <link rel="stylesheet" type="text/css" href="css/css/A.menu.css.pagespeed.cf.0_hLwXzYkZ.css">
    <link rel="stylesheet" type="text/css" href="css/css/carousel.css%2bbbpress.css.pagespeed.cc.aXsJ7_Y__m.css" />
    <link rel="stylesheet" type="text/css" href="css/css/A.style.css%2bcss%2c%2c_custom.css%2cMcc.HvWh1qoob-.css.pagespeed.cf.pWH5huNcWh.css" />
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div id="loader">
        <div class="loader-container">
            <img src="images/img/site.gif" alt="" class="loader-site">
        </div>
    </div>
    <div id="wrapper">
        <div class="row-offcanvas row-offcanvas-left">
            <div id="sidebar-fix" class="sidebar-offcanvas">
                <div class="side-logo clearfix">
                    <a href="index.php"><img  src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAKEAAAAVCAMAAAAZ1H7nAAAAaVBMVEU2OkfjSxH///82OkfjSxE2OkfjSxE2OkfjSxE2OkfjSxE2OkfjSxE2OkfjSxE2OkfjSxHjSxE2OkfjSxE2OkfjSxE2OkfjSxE2OkfjSxE2OkfjSxE2OkfjSxE2OkfjSxE2Okc2OkfjSxGcp1oMAAAAIXRSTlMAAAAQECAgMDBAQFBQYGBwcH+Aj5CfoK+wv8DP0N/g7/A/LrU9AAAC8UlEQVRIx8WWC9eiIBCGTTIjU4vMDMmA//8jlxkukie177K7c04FQswjM7xMkka2q27P63ETGz7PaZiS/GMzHke8U6+t3artKyFXPyOkzFlBQj8Lo6ZTjvMotoqGc94UEeH+8tCx3U+7XyRkKlhDXJ+GUdPh4zxmfnPhZg+5JTxO8Kz1p/1fIFSCrBJmMsyWeZocrk89Z4/L7tcIWxPBVlmEFUKYNjS0GWAkTapez9tt/5aQ1B3vSptT2OEuraj5pQ03XywhJUwKnpGohG1ZJZRuOIcXgiibE/yOzp7qd4S5VJJDkriO4uZTWhfUDKjcNIhQcrBBjYjAebZGCGD4+gLXArdnfZvE+nE5zp6UXEqDQ5gSCeZMDZsn0aV5NjQ5Nrgw25oJzPyRSGBrhRCi27yqzeMB5yVA9pf9ktpwVeCfO/it3eqtaq0L6nxJjDuBoI5EGWzPapTxYHGbRZZwry9pdXSa04PObKvjLGHu16PwopRhrN1ThpzYqG2Dq+jslpACYpWQOLHpgh4edJX2kHfbNDVQmJfnWcLaO0/8wmOHeceh0UIjVhvY+DU9TJjTG+70sNfX1N8mB3ez3GYJI3e4MCnxupghZFPC8gPFBoEQQQ9hC7XeTk/yfYFQcGeNe1148BHh0GbJR4SQs7iRAxBun7pPv0JIo+A2ShZLUQ6EdKLg84SEUpqFc4Vqc9bn9DohPC4QlqMvonzvR4SDT1p4TsNO2r7xejOEaRXfzffDZuEsd1HVgqKIjW8TQsbVXvyNntOwqYMnvOs71jen6x3sUu02S3o4+NVBklHvULi/SNi6gizDq1C1lNYA2DowXtCa28vFeDUaHQg2E3tDSJUEd1ln3tes1phvKsRXCb1RG0xfy4BMF9EwSy2hXiMc/wHCK9UAVzHUerCakOb6lerbhOa4eflyFe4wAnq1WSYsWTB7edUgNdZnZqphKGFK5mqbUOSMjdeaOqq5/fMM6iPurqdQY3c18XfK4bBM+F/tD656li+hdmVsAAAAAElFTkSuQmCC" alt=""></a>
                </div>
                <ul class="sidebar-nav clearfix">
                    <li class="active"><a href="index.php">Home</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="course-list.php">Courses</a></li>
                    <li><a href="question-list.php">Ask a Questions</a></li>
                     <?php 
                          if (isset($_GET['uid'])) {
                            $userid= Session::get("userId");
                            $deldata=$cart->delUserCart();
                            //$delCom=$pd->delCompareData($userid);
                            Session::destroy();
                          }
                     ?>
                    <?php
                     $login= Session::get("userlogin");
                    if ($login==false) {?>
                   <li><a href="login.php">Log In</a></li>
                     <?php }else{?>
                   <li><a title="logout" href="?uid=<?php Session::get('userId') ?>">Log Out</a></li>
                    <?php } ?>
                </ul>
                
            </div>
            <div id="main">
                <!--
                <div class="visible-md visible-xs visible-sm mobile-menu">
                    <button type="button" class="btn btn-default btn-sm" data-toggle="offcanvas"><i class="fa fa-bars"></i></button>
                </div>-->
                <section class="slider-section">
                    <div class="tp-banner-container">
                        <div class="tp-banner">
                            <ul>
                                <li data-transition="fade" data-slotamount="1" data-masterspeed="500" data-thumb="images/upload/slider_new_03.jpg" data-saveperformance="off" data-title="Slide">
                                    <img src="images/upload/main.jpg" height="50" alt="fullslide1" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
                                    <div class="tp-caption slider_layer_05 text-center lft tp-resizeme" data-x="center" data-y="240" data-speed="1000" data-start="600" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="1000" style="z-index: 9; max-width: auto; max-height: auto; white-space: nowrap;"><i class="fa fa-graduation-cap"></i>
                                    </div>
                                    <div class="tp-caption slider_layer_01 text-center lft tp-resizeme" data-x="center" data-y="350" data-speed="1000" data-start="600" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="1000" style="z-index: 9; max-width: auto; max-height: auto; white-space: nowrap;">Learn<strong>PLUS</strong>
                                    </div>
                                    <div style="color: white;" class="tp-caption slider_layer_02 text-center lft tp-resizeme" data-x="center" data-y="460" data-speed="1000" data-start="800" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="1000" style="z-index: 9; max-width: auto; max-height: auto; white-space: nowrap;">Great Theme For Education, University Learning Websites<br> with tons of options and custom sections!
                                    </div>
                                    <div class="tp-caption text-center lft tp-resizeme" data-x="center" data-y="540" data-speed="1000" data-start="800" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="1000" style="z-index: 9; max-width: auto; max-height: auto; white-space: nowrap;"> <a target="_blank" href="about.php" class="btn btn-primary">About Us</a> <a target="_blank" href="contact" class="btn btn-default">Contact Us</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </section>
                <section class="white section" style="padding-bottom: 0px;">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="section-title text-center">
                                    <h4>Why Learning ?</h4>
                                    <p style="text-align: justify;">LearnPlus helps teachers inspire better STEM education in their classroom STEAM resources with lesson plans, e-books, videos, and more. We are dedicated to advancing the STEM to STEAM movement by providing high quality materials and art integration kits across many content areas for grade levels from elementary through early middle school. As Learn It By Art's product offerings evolve and grow, so will our dedication to delivering project-based resources for teachers who want to adopt a 21st century approach to teaching science, technology, engineering and math problem solving through art. Please feel free to contact us if your organization or school district has additional STEAM resources to share.</p>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </section>
                <section class="grey section" style="padding-top: 0px;">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="section-title text-center">
                                    <h4>Popular Courses</h4>
                                    <p>Listed Below Our Most Popular Courses</p>
                                </div>
                            </div>
                        </div>
                        <div id="owl-featured" class="owl-custom">
                            <?php 
                            $getCourses=$course->getAllCourses();
                            if ($getCourses) {
                           while ($result=$getCourses->fetch_assoc()) {
                         ?>
                            <div class="owl-featured">
                                <div class="shop-item-list entry">
                                    <div class="">
                                        <img src="admin/<?php echo($result['image']);?>" alt="">
                                        <div class="magnifier">
                                        </div>
                                    </div>
                                    <div class="shop-item-title clearfix">
                                        <h4><a href="courses-details.php?courseID=<?php echo($result['id']);?>"><?php echo($result['title']);?></a></h4>
                                        <div class="shopmeta">
                                            <span class="pull-left"><?php echo($result['students']);?> Student</span>
                                            <div class="rating pull-right">
                                                <?php 
                                                    $courseratings=$course->avg_rating($result['id']);
                                                   $avgratings=$courseratings->fetch_assoc();
                                                   $ratings=round($avgratings['user_rating']);
                                                   for ($i=1; $i <=5 ; $i++) { 
                                                    if ($i<=$ratings) {
                                                 ?>
                                                <i class="fa fa-star"></i>
                                                  <?php }else{?>
                                                <i style="color: #C0C0C0;" class="fa fa-star"></i>
                                                 <?php }} ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="visible-buttons">
                                        <a title="Read More" href="courses-details.php?courseID=<?php echo($result['id']);?>"><span class="fa fa-search"></span></a>
                                    </div>
                                </div>
                            </div>
                            <?php }} ?>
                        </div>
                    </div>
                </section>
                
                
                <section class="white section">
                    <div class="container-fluid">
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="section-title text-center">
                                    <h4>Meet Our Team</h4>
                                    <p>We build LearnPLUS with professional and love</p>
                                </div>

                                <div class="content-widget">
                                    <div class="team-members row">
                                        <?php 
                                            $getTeachers=$course->getAllTeachers();
                                            if ($getTeachers) {
                                           while ($teacher=$getTeachers->fetch_assoc()) {
                                         ?>
                                        <div class="col-md-6 col-sm-6 col-xs-12" style="margin-bottom: 10px;">
                                            <div class="team">
                                                <img  src="admin/<?php echo($teacher['image']);?>" height="250" alt="" >
                                                <div class="team-hover-content">
                                                    <h5>Teacher : <?php echo($teacher['name']);?></h5>
                                                    <span><?php if ($teacher['subject']) {?>
                                                        Expertise In <?php echo($teacher['subject']);?>
                                                        <?php } ?>
                                                     </span>
                                                </div>
                                            </div>
                                        </div>
                                        <?php }} ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="section-title text-center">
                                    <h4>Notice Board</h4>
                                    <p>All Notice</p>

                                </div>
                                <div class="content-widget">
                                     <?php 
                                        $notices=$notice->getNotices();
                                        if ($notices) {
                                       while ($result=$notices->fetch_assoc()) {
                                     ?>
                                <div class="team-members row hh">
                                    <div class="col-md-4 col-sm-4 col-xs-4" style="background-color:#428992;color: white;height: 100px;width: 100px; padding: 1px;">
                                      <div style="height: 50%" class="text-center"><span style="font-weight: bold;font-size: 25px;"><?php echo(date('d', strtotime($result['created_at']))); ?></span></div>
                                      <div style="height: 50%" class="text-center"><?php echo(date('M Y', strtotime($result['created_at']))); ?></div>
                                     
                                    </div>
                                    <div class="col-md-8 col-sm-8 col-xs-8">
                                      <p><a href="notice-details.php?noticeID=<?php echo($result['id']) ; ?>"><span style="font-weight: bold;font-size: 25px;"><?php echo($result['title']) ;?></span></a></p>
                                    </div>
                                    
                                 </div>
                                 <?php }} ?>
                                 </div>

                              </div>
                            </div>
                        </div>
                    </div>
                </section>
                <style type="text/css">
                    .hh:hover{
                        background-color:#C7C6C9;
                        margin-bottom: 5px;
                    }
                    .hh{
                        margin-bottom: 5px;
                    }
                </style>
                
              
                <footer class="dark footer section" style="background-color: #005691">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-3 col-md-6 col-xs-12">
                                <div class="widget">
                                         </div>
                            </div>
                            <div class="col-md-3 col-md-6 col-xs-12">
                                <div class="widget">
                                    <div class="widget-title">
                                        <h4>Recent Tweets</h4>
                                        <hr>
                                    </div>
                                    <div class="twitter-widget">
                                        <ul class="latest-tweets">
                                            <li>
                                                <p><a href="#" title="">@Mark</a> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer lorem quam.</p>
                                                <span>2 hours ago</span>
                                            </li>
                                            <li>
                                                <p><a href="#" title="">@Envato</a> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer lorem quam.</p>
                                                <span>2 hours ago</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-md-6 col-xs-12">
                                <div class="widget">
                                    <div class="widget-title">
                                        <h4>Popular Courses</h4>
                                        <hr>
                                    </div>
                                    <ul class="popular-courses">
                                        <?php 
                                        $popularCourse=$course->getAllPopularCourses();
                                        if ($popularCourse) {
                                       while ($popular=$popularCourse->fetch_assoc()) {
                                        ?>
                                        <li>
                                            <a href="courses-details.php?courseID=<?php echo($popular['id']);?>" title=""><img class="img-thumbnail" src="admin/<?php echo($popular['image']);?>" alt=""></a>
                                        </li>
                                        <?php }}else{?>
                                        <li><h3>Comming soon</h3></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-3 col-md-6 col-xs-12">
                                <div class="widget">
                                    <div class="widget-title">
                                        <h4>Contact Details</h4>
                                        <hr>
                                    </div>
                                    <ul class="contact-details">
                                        <li><i class="fa fa-link"></i> <a href="#">www.yoursite.com</a></li>
                                        <li><i class="fa fa-envelope"></i> <a href="mailto:info@yoursite.com">info@yoursite.com</a></li>
                                        <li><i class="fa fa-phone"></i> +90 123 45 67</li>
                                        <li><i class="fa fa-fax"></i> +90 123 45 68</li>
                                        <li><i class="fa fa-home"></i> Envato INC 22 Elizabeth Str. Melbourne. Victoria 8777.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
                <section class="copyright" style="background-color: #005691">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-8 text-center">
                                <ul class="list-inline ">
                                <p>© 2019 LearnPLUS Pty Ltd. by <a >Kawser</a></p>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>
            </div>>
        </div>
    </div>
    <script src="js/js/jquery.min.js.pagespeed.jm.iDyG3vc4gw.js"></script>
    <script src="js/js/bootstrap.min.js%2bretina.js%2bwow.js.pagespeed.jc.pMrMbVAe_E.js"></script>
    <script>
    eval(mod_pagespeed_gFRwwUbyVc);
    </script>
    <script>
    eval(mod_pagespeed_rQwXk4AOUN);
    </script>
    <script>
    eval(mod_pagespeed_U0OPgGhapl);
    </script>
    <script src="js/js/carousel.js%2bparallax.min.js%2bcustom.js.pagespeed.jc.lVSvRd9-tY.js"></script>
    <script>
    eval(mod_pagespeed_6Ja02QZq$f);
    </script>
    <script>
    eval(mod_pagespeed_AZ_gON44eP);
    </script>
    <script>
    eval(mod_pagespeed_KxQMf5X6rF);
    </script>
    <script src="js/js/jquery.themepunch.tools.min.js.pagespeed.jm.0PLSBOOLZa.js"></script>
    <script src="js/js/jquery.themepunch.revolution.min.js"></script>
    <script>
    jQuery(document).ready(function() { jQuery('.tp-banner').show().revolution({ dottedOverlay: "none", delay: 16000, startwidth: 1170, startheight: 820, hideThumbs: 200, thumbWidth: 100, thumbHeight: 50, thumbAmount: 5, navigationType: "none", navigationArrows: "solo", navigationStyle: "preview3", touchenabled: "on", onHoverStop: "on", swipe_velocity: 0.7, swipe_min_touches: 1, swipe_max_touches: 1, drag_block_vertical: false, parallax: "mouse", parallaxBgFreeze: "on", parallaxLevels: [10, 7, 4, 3, 2, 5, 4, 3, 2, 1], parallaxDisableOnMobile: "off", keyboardNavigation: "off", navigationHAlign: "center", navigationVAlign: "bottom", navigationHOffset: 0, navigationVOffset: 20, soloArrowLeftHalign: "left", soloArrowLeftValign: "center", soloArrowLeftHOffset: 20, soloArrowLeftVOffset: 0, soloArrowRightHalign: "right", soloArrowRightValign: "center", soloArrowRightHOffset: 20, soloArrowRightVOffset: 0, shadow: 0, fullWidth: "on", fullScreen: "off", spinner: "spinner4", stopLoop: "off", stopAfterLoops: -1, stopAtSlide: -1, shuffle: "off", autoHeight: "off", forceFullWidth: "off", hideThumbsOnMobile: "off", hideNavDelayOnMobile: 1500, hideBulletsOnMobile: "off", hideArrowsOnMobile: "off", hideThumbsUnderResolution: 0, hideSliderAtLimit: 0, hideCaptionAtLimit: 0, hideAllCaptionAtLilmit: 0, startWithSlide: 0, fullScreenOffsetContainer: "" }); });
    </script>
    <script type="text/javascript">
    (function($) { "use strict";
        $('[data-toggle=offcanvas]').click(function() { $('.row-offcanvas').toggleClass('active'); }); })(jQuery);
    </script>
</body>
<!-- Mirrored from templatevisual.com/demo/learnplus/index1.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 03 Nov 2019 17:37:45 GMT -->

</html>