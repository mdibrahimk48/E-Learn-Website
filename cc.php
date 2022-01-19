<?php include_once("inc/header-top.php"); ?>
            <!-- Start Mainmenu Area -->
<?php include("inc/header-nav.php"); ?>
            <!-- End Mainmenu Area -->
            <!-- Mobile-menu-area start -->
<?php include("inc/mobile-nav.php"); ?>
            <!-- Mobile-menu-area End -->
        </div>
        <!-- End Header Style -->
<?php 
if (!isset($_GET['courseID'])||$_GET['courseID']==NULL ||$_GET['courseID']!=$_GET['courseID']) {
    echo "<script>window.location = 'course-list.php';</script>";
}else{
    // $id=$_GET['courseID'];
    $id=preg_replace('/[^-a-zA-Z0-9]/', '', base64_decode(urldecode($_GET['courseID'])));
   // echo($id);
    //die();
}
$getlesson=$course->getSingleCourseById($id);
$course= Mysqli_fetch_object($getlesson['course']);
 ?>
<!-- End Header Style -->
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" data--black__overlay="4" style="background: rgba(0, 0, 0, 0) url(images/bg/4.jpg) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner text-center">
                                <h2 class="bradcaump-title">Courses Details</h2>
                                <nav class="bradcaump-inner">
                                    <a class="breadcrumb-item" href="index.php">Home</a>
                                    <span class="brd-separetor"><i class="icon ion-ios-arrow-right"></i></span>
                                    <a class="breadcrumb-item" href="course-list.php">courses</a>
                                    <span class="brd-separetor"><i class="icon ion-ios-arrow-right"></i></span>
                                    <span class="breadcrumb-item active"><?php echo($course->title);?></span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start Courses Details Area -->
        <section class="htc__courses__details__page bg__white ptb--80">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="courses__details__top">
                            <h2><?php echo($course->title);?></h2>
                            <div class="courses__rating__price">
                                <!-- Start Courses Top Left-->
                                <div class="courses__top--left">
                                    <div class="courses__teacher">
                                        <div class="crs__teacher__images">
                                            <img style="border-radius: 50%;"height="50" width="50" src="admin/<?php echo($course->img);?>" alt="courses teacher images">
                                        </div>
                                        <h4><a ><?php echo($course->name);?> </a></h4>
                                        <span>/</span>
                                        <h6><?php echo($course->subject);?></h6>
                                    </div>
                                    <ul class="rating">
                                        <li><i class="icon ion-android-star"></i></li>
                                        <li><i class="icon ion-android-star"></i></li>
                                        <li><i class="icon ion-android-star"></i></li>
                                        <li><i class="icon ion-android-star"></i></li>
                                        <li><i class="icon ion-android-star"></i></li>
                                        <li class="crs__review">Reviews (2)</li>
                                    </ul>
                                </div>
                                <!-- End Courses Top Left-->
                                <!-- Start Courses Top Right-->
                                <div class="courses__top--right">
                                    <span class="cres__price">TK <?php echo($course->price);?></span>
                                    <div class="crs__btn">
                                        <a class="htc__btn btn--theme" target="_blank" href="http://demo.designing-world.com/educamp-bbo/dummy-data/worksheet.pdf#toolbar=0">Open file</a>
                                    </div>
                                    &nbsp
                                    <div class="crs__btn">
                                        <a class="htc__btn btn--theme" href="#">Take this course</a>
                                    </div>
                                </div>
                                <!-- End Courses Top Right-->
                            </div>
                        </div>
                    </div>
                </div>
                 <?php 
                
                 
                //$re=json_encode($result);
                //var_dump($lesson);
               // echo($lesson->title);
                if ($getlesson['lessons']) {
                   while ($result=mysqli_fetch_array($getlesson['lessons'])) {
                  // var_dump($result);

                 }
                 //die();
                }

                 ?>
                <div class="row pt--50">
                    <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
                        <div class="htc__courses__leftsidebar">
                            <!-- Start Courses Details Images -->
                            <div class="courses__details__thumb">
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe height="450" src="https://www.youtube.com/embed/UalTfOIDQ7M"></iframe>
                                </div>
                            </div>
                            <!-- End Courses Details Images -->
                            <div class="htc__crs__tab__wrap">
                                <!-- Start Courses Details TAb -->
                                <ul class="courses__view mt--50" role="tablist">
                                    <li role="presentation" class="description active"><a href="#description" role="tab" data-toggle="tab"><i class="icon ion-ios-copy"></i>Description</a></li>
                                    <li role="presentation" class="week"><a href="#week" role="tab" data-toggle="tab"><i class="icon ion-ios-list-outline"></i>Courses Schedule</a></li>
                                    <li role="presentation" class="reviews"><a href="#reviews" role="tab" data-toggle="tab"><i class="icon ion-ios-chatboxes-outline"></i> Reviews (2)</a></li>
                                </ul>
                                <!-- End Courses Details TAb -->
                                <!-- Start Courses Details Content -->
                                <div class="courses__tab__content">
                                    <!-- Start Single Content -->
                                    <div id="description" role="tabpanel" class="single__crs__content tab-pane fade in active clearfix">
                                        <div class="single__crs__details">
                                            <h2>COURSE DESCRIPTION</h2>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                                        </div>
                                        <div class="single__crs__details">
                                            <h2>CERTIFICATION</h2>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                                        </div>
                                        <div class="single__crs__details">
                                            <h2>LEARNING OUTCOMES</h2>
                                            <ul>
                                                <li><i class="icon ion-android-checkbox-outline"></i>Over 37 lectures and 55.5 hours of content!</li>
                                                <li><i class="icon ion-android-checkbox-outline"></i>LIVE PROJECT End to End Software Testing Training Included.</li>
                                                <li><i class="icon ion-android-checkbox-outline"></i>Learn Software Testing and Automation basics from a professional trainer from your own desk.</li>
                                                <li><i class="icon ion-android-checkbox-outline"></i>Information packed practical training starting from basics to advanced testing techniques.</li>
                                                <li><i class="icon ion-android-checkbox-outline"></i>Best suitable for beginners to advanced level users and who learn faster when demonstrated.</li>
                                                <li><i class="icon ion-android-checkbox-outline"></i>Course content designed by considering current software testing technology and the job.</li>
                                                <li><i class="icon ion-android-checkbox-outline"></i>Practical assignments at the end of every session.</li>
                                                <li><i class="icon ion-android-checkbox-outline"></i>Practical learning experience with live project work and examples.</li>
                                            </ul>
                                        </div>
                                        <div class="single__crs__details">
                                            <p>Pellentesque lacus vamus lorem arcu semper duiac Cras ornare arcu avamus nda leo. Etiam ind arcu. Morbi justo mauri segtempus pharetra interdum congue semper purus. Lorem ipsum dolor sit amet sed consectetur adipisicing elit sed eiusmod tempor incididunt Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                        </div>
                                    </div>
                                    <!-- End Single Content -->
                                    <!-- Start Single Content -->
                                    <div id="week" role="tabpanel" class="single__crs__content tab-pane fade clearfix">
                                        <div class="single__crs__details">
                                            <div class="course-table">
                                            <h4>Course Lessons</h4>
                                            <table class="table">
                                            <thead>
                                            <tr>
                                            <th>Type</th>
                                            <th>Lesson Title</th>
                                            <th>Time</th>
                                            <th>Status</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                            <td><i class="fa fa-play-circle"></i></td>
                                            <td><a href="#">Introduction</a></td>
                                            <td>12 Min</td>
                                            <td><i class="fa fa-check"></i></td>
                                            </tr>
                                            <tr>
                                            <td><i class="fa fa-play-circle"></i></td>
                                            <td>Lesson One - What is Photoshop</td>
                                            <td>20 Min</td>
                                            <td><i class="fa fa-close"></i></td>
                                            </tr>
                                            <tr>
                                            <td><i class="fa fa-play-circle"></i></td>
                                            <td>Lesson Two - How to Use Tools</td>
                                            <td>41 Min</td>
                                            <td><i class="fa fa-close"></i></td>
                                            </tr>
                                            <tr>
                                            <td><i class="fa fa-play-circle"></i></td>
                                            <td>Lesson Three - Creating First Homepage</td>
                                            <td>15 Min</td>
                                            <td><i class="fa fa-close"></i></td>
                                            </tr>
                                            <tr>
                                            <td><i class="fa fa-play-circle"></i></td>
                                            <td>Lesson Four - Understanding Colors</td>
                                            <td>29 Min</td>
                                            <td><i class="fa fa-close"></i></td>
                                            </tr>
                                            <tr>
                                            <td><i class="fa fa-play-circle"></i></td>
                                            <td>Lesson Five - International Sizes</td>
                                            <td>31 Min</td>
                                            <td><i class="fa fa-close"></i></td>
                                            </tr>
                                            <tr>
                                            <td><i class="fa fa-question-circle"></i></td>
                                            <td><a href="#">Quiz Time - Your First Quiz</a></td>
                                            <td>31 Min</td>
                                            <td><i class="fa fa-close"></i></td>
                                            </tr>
                                            </tbody>
                                            </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Content -->
                                    <!-- Start Single Content -->
                                    <div id="reviews" role="tabpanel" class="single__crs__content tab-pane fade clearfix">
                                        <div class="riview__wrap mt--30">
                                            <!-- Start Single Review -->
                                            <div class="review">
                                                <div class="review__thumb">
                                                    <img src="images/team/1.jpg" alt="review images">
                                                </div>
                                                <div class="review__details">
                                                    <div class="review__info">
                                                        <h4><a href="#">Nipa Bali</a></h4>
                                                        <ul class="ht__rating">
                                                            <li><i class="icon ion-ios-star"></i></li>
                                                            <li><i class="icon ion-ios-star"></i></li>
                                                            <li><i class="icon ion-ios-star"></i></li>
                                                            <li><i class="icon ion-ios-star"></i></li>
                                                            <li><i class="icon ion-ios-star"></i></li>
                                                        </ul>
                                                        <div class="rating__send">
                                                            <a href="#"><i class="icon ion-reply"></i></a>
                                                            <a href="#"><i class="icon ion-android-close"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="review__date">
                                                        <span>27 Jun, 2016 at 2:30pm</span>
                                                    </div>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan egestas elese ifend.</p>
                                                </div>
                                            </div>
                                            <!-- End Single Review -->
                                            <!-- Start Single Review -->
                                            <div class="review rev__reply">
                                                <div class="review__thumb">
                                                    <img src="images/team/2.jpg" alt="review images">
                                                </div>
                                                <div class="review__details">
                                                    <div class="review__info">
                                                        <h4><a href="#">Gerald Barnes</a></h4>
                                                        <ul class="ht__rating">
                                                            <li><i class="icon ion-ios-star"></i></li>
                                                            <li><i class="icon ion-ios-star"></i></li>
                                                            <li><i class="icon ion-ios-star"></i></li>
                                                            <li><i class="icon ion-ios-star"></i></li>
                                                            <li><i class="icon ion-ios-star"></i></li>
                                                        </ul>
                                                        <div class="rating__send">
                                                            <a href="#"><i class="icon ion-reply"></i></a>
                                                            <a href="#"><i class="icon ion-android-close"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="review__date">
                                                        <span>27 Jun, 2016 at 2:30pm</span>
                                                    </div>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan egestas elese</p>
                                                </div>
                                            </div>
                                            <!-- End Single Review -->
                                            <!-- Start Comment Form -->
                                            <div class="ht__review__form">
                                                <h2>Write A Review</h2>
                                                <div class="ht__review__inner">
                                                    <div class="single__form">
                                                        <input type="text" placeholder="Type your name">
                                                    </div>
                                                    <div class="single__form">
                                                        <input type="text" placeholder="Type your email">
                                                    </div>
                                                    <div class="single__form">
                                                        <textarea placeholder="Write your review"></textarea>
                                                    </div>
                                                    <div class="ht__review__btn mt--20">
                                                        <a class="htc__btn btn--transparent" href="#">Submit Review</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Comment Form -->
                                        </div>
                                    </div>
                                    <!-- End Single Content -->
                                </div>
                                <!-- End Courses Details Content -->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12 sm-mt-40 xs-mt-40">
                        <div class="htc__courses__rightsidebar">
                            <!-- Start All Courses -->
                            <div class="htc__blog__courses">
                                <h2 class="title__style--2">All Courses</h2>
                                <ul class="blog__courses">
                                    <li><a href="#">Art Course</a></li>
                                    <li><a href="#">Sports Course</a></li>
                                    <li><a href="#">Math Course</a></li>
                                    <li><a href="#">Art Course</a></li>
                                    <li><a href="#">Sports Course</a></li>
                                    <li><a href="#">Math Course</a></li>
                                </ul>
                            </div>
                            <!-- End All Courses -->
                            <!-- Start Courses Features -->
                            <div class="cres__features">
                                <h2 class="title__style--2">COURSE FEATURES</h2>
                                <div class="crs__features__list">
                                    <ul class="feature__duration">
                                        <li><i class="icon ion-android-calendar"></i> Start Date:</li>
                                        <li><i class="icon ion-android-train"></i> Lectures: </li>
                                        <li><i class="icon ion-android-people"></i> Class Size:</li>
                                        <li><i class="icon ion-android-time"></i> Time: </li>
                                        <li><i class="icon ion-android-stopwatch"></i> Duration:</li>
                                        <li><i class="icon ion-android-bus"></i> Transportation:</li>
                                        <li><i class="icon ion-android-checkbox-outline"></i> Assessments:</li>
                                    </ul>
                                    <ul class="feature__time">
                                        <li>June 15, 2016</li>
                                        <li>9</li>
                                        <li>30</li>
                                        <li>07pm - 09 pm</li>
                                        <li>55 hours</li>
                                        <li>Available</li>
                                        <li>Self</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- End Courses Features -->
                            <!-- Start Recent Post -->
                            <div class="blog__recent__courses">
                                <h2 class="title__style--2">More Courses by Derek spafford</h2>
                                <div class="recent__courses__inner">
                                    <!-- Start Single POst -->
                                    <div class="single__courses">
                                        <div class="recent__post__thumb">
                                            <a href="blog-details.html">
                                                <img src="images/blog/sm-img/1.jpg" alt="recent post images">
                                            </a>
                                        </div>
                                        <div class="recent__post__details">
                                            <h2><a href="blog-details.html">Mathematics and Statistics</a></h2>
                                            <span class="post__price">$60.00</span>
                                        </div>
                                    </div>
                                    <!-- End Single POst -->
                                    <!-- Start Single POst -->
                                    <div class="single__courses">
                                        <div class="recent__post__thumb">
                                            <a href="blog-details.html">
                                                <img src="images/blog/sm-img/1.jpg" alt="recent post images">
                                            </a>
                                        </div>
                                        <div class="recent__post__details">
                                            <h2><a href="blog-details.html">Mathematics and Statistics</a></h2>
                                            <span class="post__price">$60.00</span>
                                        </div>
                                    </div>
                                    <!-- End Single POst -->
                                    <!-- Start Single POst -->
                                    <div class="single__courses">
                                        <div class="recent__post__thumb">
                                            <a href="blog-details.html">
                                                <img src="images/blog/sm-img/1.jpg" alt="recent post images">
                                            </a>
                                        </div>
                                        <div class="recent__post__details">
                                            <h2><a href="blog-details.html">Mathematics and Statistics</a></h2>
                                            <span class="post__price">$60.00</span>
                                        </div>
                                    </div>
                                    <!-- End Single POst -->
                                    <!-- Start Single POst -->
                                    <div class="single__courses">
                                        <div class="recent__post__thumb">
                                            <a href="blog-details.html">
                                                <img src="images/blog/sm-img/1.jpg" alt="recent post images">
                                            </a>
                                        </div>
                                        <div class="recent__post__details">
                                            <h2><a href="blog-details.html">Mathematics and Statistics</a></h2>
                                            <span class="post__price">$60.00</span>
                                        </div>
                                    </div>
                                    <!-- End Single POst -->
                                </div>
                                <div class="ctrs__dtl__btn mt--30">
                                    <a class="htc__btn btn--transparent" href="#">View Details</a>
                                </div>
                            </div>
                            <!-- End Recent Post -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Courses Details Area -->
<!-- Start popular Courses Area -->
        <section class="popular__courses__area pb--80 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <!-- Start Section Title -->
                        <div class="section__title text-center">
                            <h2 class="title__line">related COURSES</h2>
                            <p>The Best In Our School</p>
                        </div>
                        <!-- End Section Title -->
                    </div>
                </div>
                <div class="row">
                    <div class="popular__courses__wrap indicator__style--1 owl-carousel owl-theme clearfix mt--30 xs-mt-0">
                        <!-- Start Single Courses -->
                        <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                            <div class="courses">
                                <div class="courses__thumb">
                                    <a href="#"><img src="images/course/1.jpg" alt="courses images"></a>
                                    <div class="courses__hover__info">
                                        <div class="courses__hover__action">
                                            <div class="courses__hover__thumb">
                                                <img src="images/course/sm-img/1.png" alt="small images">
                                            </div>
                                            <h4><a href="#">Derek Spafford</a></h4>
                                            <span class="crs__separator">/</span>
                                            <p>Professor</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="courses__details">
                                    <div class="courses__details__inner">
                                        <h2><a href="courses-details.html">Mathematics and Statistics</a></h2>
                                        <p>All over the world, human beings create an immense and ever-increasing volume of data, with new kinds of data regularly...</p>
                                    </div>
                                    <ul class="courses__meta">
                                        <li><i class="icon ion-person-stalker"></i>50 Students</li>
                                        <li class="crs__price">$60.00</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Courses -->
                        <!-- Start Single Courses -->
                        <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                            <div class="courses">
                                <div class="courses__thumb">
                                    <a href="#"><img src="images/course/2.jpg" alt="courses images"></a>
                                    <div class="courses__hover__info">
                                        <div class="courses__hover__action">
                                            <div class="courses__hover__thumb">
                                                <img src="images/course/sm-img/2.png" alt="small images">
                                            </div>
                                            <h4><a href="#">Derek Spafford</a></h4>
                                            <span class="crs__separator">/</span>
                                            <p>Professor</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="courses__details">
                                    <div class="courses__details__inner">
                                        <h2><a href="courses-details.html">History and Modern Languages</a></h2>
                                        <p>All over the world, human beings create an immense and ever-increasing volume of data, with new kinds of data regularly...</p>
                                    </div>
                                    <ul class="courses__meta">
                                        <li><i class="icon ion-person-stalker"></i>50 Students</li>
                                        <li class="crs__price">$60.00</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Courses -->
                        <!-- Start Single Courses -->
                        <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                            <div class="courses">
                                <div class="courses__thumb">
                                    <a href="#"><img src="images/course/3.jpg" alt="courses images"></a>
                                    <div class="courses__hover__info">
                                        <div class="courses__hover__action">
                                            <div class="courses__hover__thumb">
                                                <img src="images/course/sm-img/1.png" alt="small images">
                                            </div>
                                            <h4><a href="#">Derek Spafford</a></h4>
                                            <span class="crs__separator">/</span>
                                            <p>Professor</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="courses__details">
                                    <div class="courses__details__inner">
                                        <h2><a href="courses-details.html">Mathematics and Statistics</a></h2>
                                        <p>All over the world, human beings create an immense and ever-increasing volume of data, with new kinds of data regularly...</p>
                                    </div>
                                    <ul class="courses__meta">
                                        <li><i class="icon ion-person-stalker"></i>50 Students</li>
                                        <li class="crs__price">$60.00</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Courses -->
                        <!-- Start Single Courses -->
                        <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                            <div class="courses">
                                <div class="courses__thumb">
                                    <a href="#"><img src="images/course/4.jpg" alt="courses images"></a>
                                    <div class="courses__hover__info">
                                        <div class="courses__hover__action">
                                            <div class="courses__hover__thumb">
                                                <img src="images/course/sm-img/2.png" alt="small images">
                                            </div>
                                            <h4><a href="#">Derek Spafford</a></h4>
                                            <span class="crs__separator">/</span>
                                            <p>Professor</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="courses__details">
                                    <div class="courses__details__inner">
                                        <h2><a href="courses-details.html">History and Modern Languages</a></h2>
                                        <p>All over the world, human beings create an immense and ever-increasing volume of data, with new kinds of data regularly...</p>
                                    </div>
                                    <ul class="courses__meta">
                                        <li><i class="icon ion-person-stalker"></i>50 Students</li>
                                        <li class="crs__price">$60.00</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Courses -->
                        <!-- Start Single Courses -->
                        <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                            <div class="courses">
                                <div class="courses__thumb">
                                    <a href="#"><img src="images/course/5.jpg" alt="courses images"></a>
                                    <div class="courses__hover__info">
                                        <div class="courses__hover__action">
                                            <div class="courses__hover__thumb">
                                                <img src="images/course/sm-img/3.png" alt="small images">
                                            </div>
                                            <h4><a href="#">Nipa Bali</a></h4>
                                            <span class="crs__separator">/</span>
                                            <p>Professor</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="courses__details">
                                    <div class="courses__details__inner">
                                        <h2><a href="courses-details.html">Physics and Philosophy</a></h2>
                                        <p>All over the world, human beings create an immense and ever-increasing volume of data, with new kinds of data regularly...</p>
                                    </div>
                                    <ul class="courses__meta">
                                        <li><i class="icon ion-person-stalker"></i>50 Students</li>
                                        <li class="crs__free">Free</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Courses -->
                        <!-- Start Single Courses -->
                        <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                            <div class="courses">
                                <div class="courses__thumb">
                                    <a href="#"><img src="images/course/6.jpg" alt="courses images"></a>
                                    <div class="courses__hover__info">
                                        <div class="courses__hover__action">
                                            <div class="courses__hover__thumb">
                                                <img src="images/course/sm-img/3.png" alt="small images">
                                            </div>
                                            <h4><a href="#">Nipa Bali</a></h4>
                                            <span class="crs__separator">/</span>
                                            <p>Professor</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="courses__details">
                                    <div class="courses__details__inner">
                                        <h2><a href="courses-details.html">Physics and Philosophy</a></h2>
                                        <p>All over the world, human beings create an immense and ever-increasing volume of data, with new kinds of data regularly...</p>
                                    </div>
                                    <ul class="courses__meta">
                                        <li><i class="icon ion-person-stalker"></i>50 Students</li>
                                        <li class="crs__free">Free</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Courses -->
                    </div>
                </div>
            </div>
        </section>
        <!-- End popular Courses Area -->
<?php include("inc/footer.php"); ?>