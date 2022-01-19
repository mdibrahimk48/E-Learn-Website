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
$ct=new Cart(); 
$ur=new User();
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
                    <a href="index.html"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAKEAAAAVCAMAAAAZ1H7nAAAAaVBMVEU2OkfjSxH///82OkfjSxE2OkfjSxE2OkfjSxE2OkfjSxE2OkfjSxE2OkfjSxE2OkfjSxHjSxE2OkfjSxE2OkfjSxE2OkfjSxE2OkfjSxE2OkfjSxE2OkfjSxE2OkfjSxE2Okc2OkfjSxGcp1oMAAAAIXRSTlMAAAAQECAgMDBAQFBQYGBwcH+Aj5CfoK+wv8DP0N/g7/A/LrU9AAAC8UlEQVRIx8WWC9eiIBCGTTIjU4vMDMmA//8jlxkukie177K7c04FQswjM7xMkka2q27P63ETGz7PaZiS/GMzHke8U6+t3artKyFXPyOkzFlBQj8Lo6ZTjvMotoqGc94UEeH+8tCx3U+7XyRkKlhDXJ+GUdPh4zxmfnPhZg+5JTxO8Kz1p/1fIFSCrBJmMsyWeZocrk89Z4/L7tcIWxPBVlmEFUKYNjS0GWAkTapez9tt/5aQ1B3vSptT2OEuraj5pQ03XywhJUwKnpGohG1ZJZRuOIcXgiibE/yOzp7qd4S5VJJDkriO4uZTWhfUDKjcNIhQcrBBjYjAebZGCGD4+gLXArdnfZvE+nE5zp6UXEqDQ5gSCeZMDZsn0aV5NjQ5Nrgw25oJzPyRSGBrhRCi27yqzeMB5yVA9pf9ktpwVeCfO/it3eqtaq0L6nxJjDuBoI5EGWzPapTxYHGbRZZwry9pdXSa04PObKvjLGHu16PwopRhrN1ThpzYqG2Dq+jslpACYpWQOLHpgh4edJX2kHfbNDVQmJfnWcLaO0/8wmOHeceh0UIjVhvY+DU9TJjTG+70sNfX1N8mB3ez3GYJI3e4MCnxupghZFPC8gPFBoEQQQ9hC7XeTk/yfYFQcGeNe1148BHh0GbJR4SQs7iRAxBun7pPv0JIo+A2ShZLUQ6EdKLg84SEUpqFc4Vqc9bn9DohPC4QlqMvonzvR4SDT1p4TsNO2r7xejOEaRXfzffDZuEsd1HVgqKIjW8TQsbVXvyNntOwqYMnvOs71jen6x3sUu02S3o4+NVBklHvULi/SNi6gizDq1C1lNYA2DowXtCa28vFeDUaHQg2E3tDSJUEd1ln3tes1phvKsRXCb1RG0xfy4BMF9EwSy2hXiMc/wHCK9UAVzHUerCakOb6lerbhOa4eflyFe4wAnq1WSYsWTB7edUgNdZnZqphKGFK5mqbUOSMjdeaOqq5/fMM6iPurqdQY3c18XfK4bBM+F/tD656li+hdmVsAAAAAElFTkSuQmCC" alt=""></a>
                </div>
                <ul class="sidebar-nav clearfix">
                    <li class="active"><a href="index.html">Home</a></li>
                    <li><a href="page-about.html">About Us</a></li>
                    <li><a href="course-list.php">Courses</a></li>
                    <li><a href="forum.html">Community</a></li>
                    <li><a href="blog.html">Blog & News</a></li>
                    <li><a href="page-contact.html">Get In Touch</a></li>
                    <li><a href="course-faqs.html">Ask a Questions</a></li>
                    <li><a href="login.php">Log In</a></li>
                </ul>
                
            </div>
            <div id="main">
                <div class="visible-md visible-xs visible-sm mobile-menu">
                    <button type="button" class="btn btn-default btn-sm" data-toggle="offcanvas"><i class="fa fa-bars"></i></button>
                </div>
                <section class="slider-section">
                    <div class="tp-banner-container">
                        <div class="tp-banner">
                            <ul>
                                <li data-transition="fade" data-slotamount="1" data-masterspeed="500" data-thumb="images/upload/slider_new_03.jpg" data-saveperformance="off" data-title="Slide">
                                    <img src="images/upload/main.jpg" alt="fullslide1" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
                                    <div class="tp-caption slider_layer_05 text-center lft tp-resizeme" data-x="center" data-y="240" data-speed="1000" data-start="600" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="1000" style="z-index: 9; max-width: auto; max-height: auto; white-space: nowrap;"><i class="fa fa-graduation-cap"></i>
                                    </div>
                                    <div class="tp-caption slider_layer_01 text-center lft tp-resizeme" data-x="center" data-y="350" data-speed="1000" data-start="600" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="1000" style="z-index: 9; max-width: auto; max-height: auto; white-space: nowrap;">Learning Management System
                                    </div>
                                    <div class="tp-caption slider_layer_02 text-center lft tp-resizeme" data-x="center" data-y="460" data-speed="1000" data-start="800" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="1000" style="z-index: 9; max-width: auto; max-height: auto; white-space: nowrap;">Great Theme For Education, University Learning Websites<br> with tons of options and custom sections!
                                    </div>
                                    <div class="tp-caption text-center lft tp-resizeme" data-x="center" data-y="540" data-speed="1000" data-start="800" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="1000" style="z-index: 9; max-width: auto; max-height: auto; white-space: nowrap;"> <a target="_blank" href="#" class="btn btn-primary">Purchase Now</a> <a target="_blank" href="#" class="btn btn-default">Read More About</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </section>
                <section class="white section">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="section-title text-center">
                                    <h4>Why Learning Template?</h4>
                                    <p>Listed Below Why Our Template Are Powerful and Easy to Use?</p>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </section>
                <section class="grey section">
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
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="visible-buttons">
                                        <a title="Add to Cart" href="page-shop-cart.html"><span class="fa fa-cart-arrow-down"></span></a>
                                        <a title="Read More" href="course-single.html"><span class="fa fa-search"></span></a>
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
                            <div class="col-md-9">
                                <div class="section-title text-center">
                                    <h4>Meet Our Team</h4>
                                    <p>We build LearnPLUS with professional and love</p>
                                </div>

                                <div class="content-widget">
                                    <div class="team-members row">
                                        
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="team">
                                                <img src="images/upload/xteam_02.jpg.pagespeed.ic.Foo3PN64df.jpg" alt="" class="img-responsive wow fadeInUp">
                                                <div class="team-hover-content">
                                                    <h5>Adam DEO</h5>
                                                    <span>SEO Manager</span>
                                                    <p>Curabitur ultrices nec est nec vestibulum. Maecenas tincidunt pretium lacinia. Nullam purus dolor, tempor et lacinia quis, viverra quis erat.</p>
                                                    <div class="social">
                                                        <a href="#" title="Facebook"><i class="fa fa-facebook"></i></a>
                                                        <a href="#" title="Twitter"><i class="fa fa-twitter"></i></a>
                                                        <a href="#" title="Google Plus"><i class="fa fa-google-plus"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="team">
                                                <img src="images/upload/xteam_03.jpg.pagespeed.ic.Mw22RnI1eL.jpg" alt="" class="img-responsive wow fadeInUp">
                                                <div class="team-hover-content">
                                                    <h5>Jenny Kennedy</h5>
                                                    <span>Advertising Manager</span>
                                                    <p>Curabitur ultrices nec est nec vestibulum. Maecenas tincidunt pretium lacinia. Nullam purus dolor, tempor et lacinia quis, viverra quis erat.</p>
                                                    <div class="social">
                                                        <a href="#" title="Facebook"><i class="fa fa-facebook"></i></a>
                                                        <a href="#" title="Twitter"><i class="fa fa-twitter"></i></a>
                                                        <a href="#" title="Google Plus"><i class="fa fa-google-plus"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="team">
                                                <img src="images/upload/xteam_04.jpg.pagespeed.ic.equz9NTtM1.jpg" alt="" class="img-responsive wow fadeInUp">
                                                <div class="team-hover-content">
                                                    <h5>Jennifer DEO</h5>
                                                    <span>Social Manager</span>
                                                    <p>Curabitur ultrices nec est nec vestibulum. Maecenas tincidunt pretium lacinia. Nullam purus dolor, tempor et lacinia quis, viverra quis erat.</p>
                                                    <div class="social">
                                                        <a href="#" title="Facebook"><i class="fa fa-facebook"></i></a>
                                                        <a href="#" title="Twitter"><i class="fa fa-twitter"></i></a>
                                                        <a href="#" title="Google Plus"><i class="fa fa-google-plus"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="section-title text-center">
                                    <h4>Notice Board</h4>
                                </div>
                                <div class="content-widget">
                                <div class="team-members row">
                                    <div class="col-md-12 col-sm-6 col-xs-12">
                                        <div class="team text-center">
                                            <p>dfsgdfgdf</p>
                                            <p>dfsgdfgdf</p>
                                            <p>dfsgdfgdf</p>
                                        </div>
                                    </div>
                                 </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="grey section">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="section-title text-center">
                                    <h4>Happy Students</h4>
                                    <p>What Our Students Say About LearnPLUS</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="testimonial">
                                    <img class="alignleft img-circle" src="images/upload/xstudent_01.png.pagespeed.ic.756JwMcqdq.jpg" alt="">
                                    <p>Lorem Ipsum is simply dummy text of the printing and industry. </p>
                                    <div class="testimonial-meta">
                                        <h4>John DOE <small><a href="#">envato.com</a></small></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="testimonial">
                                    <img class="alignleft img-circle" src="images/upload/xstudent_02.png.pagespeed.ic.y-PM-y4pVj.jpg" alt="">
                                    <p>Lorem Ipsum is simply dummy text of the most popular items.</p>
                                    <div class="testimonial-meta">
                                        <h4>Jenny Anderson <small><a href="#">photodune.com</a></small></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="testimonial">
                                    <img class="alignleft img-circle" src="images/upload/xstudent_03.png.pagespeed.ic.uCQY3WNMCJ.jpg" alt="">
                                    <p>Lorem Ipsum is simply dummy text of the printing.</p>
                                    <div class="testimonial-meta">
                                        <h4>Mark BOBS <small><a href="#">tutsplus.com</a></small></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="button-wrapper text-center">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since<br> the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
                            <a href="#" class="btn btn-default border-radius"><i class="fa fa-sign-in"></i> Join Us Today</a> &nbsp;&nbsp;&nbsp;&nbsp; <a href="#" class="btn btn-primary"><i class="fa fa-download"></i> Download PDF</a>
                        </div>
                    </div>
                </section>
              
                <footer class="dark footer section">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-3 col-md-6 col-xs-12">
                                <div class="widget">
                                    <div class="widget-title">
                                        <h4>About LearnPLUS</h4>
                                        <hr>
                                    </div>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took...</p>
                                    <a href="#" class="btn btn-default">Read More</a>
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
                                        <li>
                                            <a href="single-course.html" title=""><img class="img-thumbnail" src="images/upload/xservice_01.png.pagespeed.ic.2iuJZT3CaV.png" alt=""></a>
                                        </li>
                                        <li>
                                            <a href="single-course.html" title=""><img class="img-thumbnail" src="images/upload/xservice_02.png.pagespeed.ic.c6RThoxSWC.png" alt=""></a>
                                        </li>
                                        <li>
                                            <a href="single-course.html" title=""><img class="img-thumbnail" src="images/upload/xservice_03.png.pagespeed.ic.E_Ew4wn4ZP.png" alt=""></a>
                                        </li>
                                        <li>
                                            <a href="single-course.html" title=""><img class="img-thumbnail" src="images/upload/xservice_04.png.pagespeed.ic.NGi9jRXTXk.png" alt=""></a>
                                        </li>
                                        <li>
                                            <a href="single-course.html" title=""><img class="img-thumbnail" src="images/upload/xservice_05.png.pagespeed.ic.2iuJZT3CaV.png" alt=""></a>
                                        </li>
                                        <li>
                                            <a href="single-course.html" title=""><img class="img-thumbnail" src="images/upload/xservice_06.png.pagespeed.ic.o2Uniwq-y5.png" alt=""></a>
                                        </li>
                                        <li>
                                            <a href="single-course.html" title=""><img class="img-thumbnail" src="images/upload/xservice_07.png.pagespeed.ic.H-fRTeeP8u.png" alt=""></a>
                                        </li>
                                        <li>
                                            <a href="single-course.html" title=""><img class="img-thumbnail" src="images/upload/xservice_08.png.pagespeed.ic.76ek5JLaEY.png" alt=""></a>
                                        </li>
                                        <li>
                                            <a href="single-course.html" title=""><img class="img-thumbnail" src="images/upload/xservice_09.png.pagespeed.ic.FJcG938KC-.png" alt=""></a>
                                        </li>
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
                <section class="copyright">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 text-left">
                                <p>© 2015 LearnPLUS Pty Ltd. by <a href="#">Template Visual</a></p>
                            </div>
                            <div class="col-md-6 text-right">
                                <ul class="list-inline">
                                    <li><a href="#">Terms of Usage</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                    <li><a href="#">Sitemap</a></li>
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