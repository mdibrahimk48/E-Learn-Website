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
  $getlesson=false;
  if (isset($_GET['courseID'])) {
      if (!isset($_GET['courseID'])||$_GET['courseID']==NULL ||$_GET['courseID']!=$_GET['courseID']) {
      echo "<script>window.location = 'course-list.php';</script>";
  }else{
      // $id=$_GET['courseID'];
      $id=preg_replace('/[^-a-zA-Z0-9]/', '', base64_decode(urldecode($_GET['courseID'])));
     // echo($id);
      //die();
  $getlesson=$course->getSingleCourseById($id);

  }
  } else {
    if (isset($_GET['getcourseID'])||$_GET['getcourseID']==NULL ||$_GET['getcourseID']!=$_GET['getcourseID']) {
      $cid=preg_replace('/[^-a-zA-Z0-9]/', '', $_GET['getcourseID']);
      echo(base64_decode(urldecode($cid)));
      $cart->addToCart($cid);
  }
  }



  $course=false;
  $lesson=false;
  $rating=false;
  if ($getlesson['course']) {
    $course= Mysqli_fetch_object($getlesson['course']);
  }
  if ($getlesson['lesson']) {
    $lesson= mysqli_fetch_assoc($getlesson['lesson']);
  }
  if ($getlesson['ratings']) {
    $rating= mysqli_fetch_assoc($getlesson['ratings']);
  }

   if ($_SERVER['REQUEST_METHOD']=='POST'&& isset($_POST['usercourseRating'])) {
      $login= Session::get("userlogin");
      if ($login==false) {
          header("Location:login.php");
      }else{
          
      $cart->courseRating($_POST);

      }

     }
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
                              <span class="breadcrumb-item active"><?php if ($course) {
                                echo($course->title);
                              }else{echo("data not found");}?></span>
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
                        <h2>
                         <?php if ($course) {
                                echo($course->title);
                          }else{echo("data not found");}?>
                        </h2>
                        <p class="text-center">
                            <?php if(isset($_SESSION['error'])) {?>
                            <div class="alert alert-danger alert-dismissible" data-auto-dismiss="2000" role="alert" id="error-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <strong style="color: red;">Warning!</strong>
                                 <?php echo($_SESSION['error']);

                                 unset($_SESSION['error']);
                                 ?>
                            </div>
                          <?php }?>
                          <?php if(isset($_SESSION['success'])) {?>
                          <div class="alert alert-success alert-dismissible" data-auto-dismiss="2000" role="alert" id="success-alert">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <strong style="color: green;">Success!</strong> 
                              <?php echo($_SESSION['success']);

                                 unset($_SESSION['success']);
                                 ?>
                            </div>
                          <?php }?>

                        </p>
                      <div class="courses__rating__price">
                          <!-- Start Courses Top Left-->
                          <div class="courses__top--left">
                              <div class="courses__teacher">
                                  <div class="crs__teacher__images">
                                      <img style="border-radius: 50%;"height="50" width="50" src="admin/<?php echo $course != false ? $course->img : 'Data not exist';?>" alt="courses teacher images">
                                  </div>
                                  <h4><a >Teacher: <?php if ($course) {
                                echo($course->name);
                          }else{echo("data not found");}?> </a></h4>
                                  <span>/</span>
                                  <h6>
                                    <?php if ($course) {
                                    echo($course->subject);
                                  }else{echo("data not found");}?>
                                  </h6>
                              </div>
                              <ul class="rating">
                                  <?php 
                                  if ($rating) {
                                      $ratings=round($rating['avg_rating']);
                                      
                                      for ($i=1; $i <=5 ; $i++) { 
                                      if ($i<=$ratings) {
                                  
                                  ?>
                                  <li><i class="icon ion-android-star"></i></li>
                                  <?php }else{?>
                                  <li ><i style="color: #C0C0C0;" class="icon ion-android-star"></i></li>
                                  <?php }}?>
                                  <li class="crs__review">Reviews (<?php echo($rating['user_rating']); ?>)</li>
                                  <?php } ?>
                              </ul>
                          </div>
                          <!-- End Courses Top Left-->
                          <!-- Start Courses Top Right-->
                          <div class="courses__top--right">
                              <span class="cres__price">TK <?php echo $course != false ? $course->price : '0.0';?></span>
                              <div class="crs__btn">
                                  <a class="htc__btn btn--theme" target="_blank" <?php echo $lesson != false ?'href="admin/'.$lesson['pdfpath'].'#toolbar=0"' : '';?>>Open file</a>
                              </div>
                              &nbsp
                              <div class="crs__btn"> 
                                  <a class="htc__btn btn--theme" <?php echo $course != false ? 'href="?getcourseID='.urlencode(base64_encode($course->id)).'"' : '';?>>Take this course</a>
                              </div>
                          </div>
                          <!-- End Courses Top Right-->
                      </div>
                  </div>
              </div>
          </div>
          
          <div class="row pt--50">
              <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
                  <div class="htc__courses__leftsidebar">
                      <!-- Start Courses Details Images -->
                      <div class="courses__details__thumb">
                          <div class="embed-responsive embed-responsive-16by9">
                              <iframe height="450" src="https://www.youtube.com/embed/<?php echo $lesson != false ? $lesson['videourl'] : 'aDm5WZ3QiIE';?>" allowfullscreen="allowfullscreen"></iframe>
                          </div>
                      </div>
                      <!-- End Courses Details Images -->
                      <div class="htc__crs__tab__wrap">
                          <!-- Start Courses Details TAb -->
                          <ul class="courses__view mt--50" role="tablist">
                              <li role="presentation" class="description active"><a href="#description" role="tab" data-toggle="tab"><i class="icon ion-ios-copy"></i>Description</a></li>
                              <li role="presentation" class="week"><a href="#week" role="tab" data-toggle="tab"><i class="icon ion-ios-list-outline"></i>Courses Schedule</a></li>
                              <li role="presentation" class="reviews"><a href="#reviews" role="tab" data-toggle="tab"><i class="icon ion-ios-chatboxes-outline"></i> Reviews (<?php echo $rating != false ? $rating['user_rating'] : 0;?>)</a></li>
                          </ul>
                          <!-- End Courses Details TAb -->
                          <!-- Start Courses Details Content -->
                          <div class="courses__tab__content">
                              <!-- Start Single Content -->
                              <div id="description" role="tabpanel" class="single__crs__content tab-pane fade in active clearfix">
                                  <div class="single__crs__details">
                                      <h2>COURSE DESCRIPTION</h2>
                                      <?php echo $course != false ?'<p>'.$course->content.'</p>': '<p>Not available</p>';?>
                                  <p></p>
                                  </div>
                                  <div class="single__crs__details">
                                      <h2>LESSON DESCRIPTION</h2>
                                      <?php echo $lesson != false ?'<p>'.$lesson['content'].'</p>': '<p>Not available</p>';?>

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
                                          <?php 
                                          if ($getlesson['lessons']) {
                                           ?>
                                      <tr>
                                      <th>Type</th>
                                      <th>Lesson Title</th>
                                      <th>Time</th>
                                      <th>Status</th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                         <?php 
                                         $lac=0;
                                         $i=1;
                                        
                                           $lactures=mysqli_num_rows($getlesson['lessons']);
                                           while ($result=mysqli_fetch_array($getlesson['lessons'])) {
                                        
                                         ?>
                                      <tr>
                                      <td><i class="fa fa-play-circle"></i></td>
                                      <td>Lesson Name : <?php echo($result['title']);?></td>
                                      <td>20 Min</td>
                                      <td><i class="<?php echo $i ==1 ? 'fa fa-check' : 'fa fa-close';$i=2;?>"></i></td>
                                      </tr>
                                        <?php }}else{ ?>
                                        <tr>
                                            <td><h1>No lesson exist</h1></td>
                                        </tr>
                                        <?php } ?>
                                      
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
                                     <?php 
                                     if ($getlesson['user_rating']) {
                                      $count_rating=mysqli_num_rows($getlesson['user_rating']);
                                      while ($result=mysqli_fetch_array($getlesson['user_rating'])) {
                                        
                                         ?>
                                      <div class="review" style="margin-bottom: 5%;">
                                          <div class="review__thumb">
                                              <img src="admin/<?php echo($result['img']); ?>" alt="review images">
                                          </div>
                                          <div class="review__details">
                                              <div class="review__info">
                                                  <h4><a ><?php echo($result['name']);?></a></h4>
                                                  <ul class="ht__rating">
                                                      <?php 
                                                       $urating=round($result['avg']);
                                                          for ($i=1; $i <=5 ; $i++) { 
                                                          if ($i<=$urating) {
                                                       ?>
                                                      <li><i class="icon ion-ios-star"></i></li>
                                                      <?php }else{ ?>
                                                      <li><i style="color: #C0C0C0;" class="icon ion-ios-star"></i></li>
                                                      <?php }}?>
                                                  </ul>
                                                  
                                              </div>
                                              <div class="review__date">
                                                  <span><?php echo(date('d M Y', strtotime($result['created_at']))); ?> at <?php echo(date('g:i A', strtotime($result['created_at']))); ?></span>
                                              </div>
                                              <?php echo($result['review']); ?>
                                          </div>
                                      </div>
                                      <?php }} ?>
                                      <!-- End Single Review -->
                                      <!-- Start Comment Form -->
                                      <div class="ht__review__form">
                                          <h2>Write A Review</h2>
                                          <?php if(isset($_SESSION['error-rating'])) {?>
                                            <div class="alert alert-danger alert-dismissible" data-auto-dismiss="2000" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <strong style="color: red;">Warning!</strong>
                                                 <?php echo($_SESSION['error-rating']);

                                                 unset($_SESSION['error-rating']);
                                                 ?>
                                            </div>
                                          <?php }?>
                                          <?php if(isset($_SESSION['success-rating'])) {?>
                                          <div class="alert alert-success alert-dismissible" data-auto-dismiss="2000" role="alert">
                                              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                              <strong style="color: green;">Success!</strong> 
                                              <?php echo($_SESSION['success-rating']);

                                                 unset($_SESSION['success-rating']);
                                                 ?>
                                            </div>
                                          <?php }?>
                                          <div class="ht__review__inner" style="background-color: #FFFFFF;">
                                              <form  action="" method="post">
                                                  <div class="single__form">
                                                      <input type="hidden" value="<?php echo $course != false ?$course->id: '';?>" name="course_id">
                                                  </div>
                                              <div class="single__form">
                                                   <select id="course_title" class="custom-select form-control" name="rating">
                                                 <?php
                                                   $ratings=[
                                                   '1'=>'Bad',
                                                   '2'=>'Better',
                                                   '3'=>'Good',
                                                   '4'=>'Very Good',
                                                   '5'=>'Excelent'
                                                   ];
                                                   foreach ($ratings as $key => $rating) {
                                                  ?>
                                                  <option value="<?php echo($key);?>"> <?php echo($rating);?></option>
                                                  <?php } ?>
                                                  <option value="" selected> Give your Rating</option>
                                              </select>
                                              </div>
                                              <div class="single__form">
                                                  <textarea placeholder="Write your review" class="form-control is-valid" name="review"></textarea>
                                              </div>
                                              <div class="ht__review__btn mt--20">
                                               <button class="htc__btn btn--transparent" name="usercourseRating">Submit Reviews</button>
                                              </div>
                                              </form>

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
                          <h2 class="title__style--2">All Classes</h2>
                          <ul class="blog__courses">
                                 <?php 
                                $classes=[
                                    'six'    =>'Six',
                                    'seven'  =>'Seven',
                                    'eight'  =>'Eight',
                                    'nine'   =>'Nine',
                                    'ten'    =>'Ten',
                                    'eleven' =>'Eleven',
                                    'twelve' =>'Twelve'
                                ];
                                foreach ($classes as $key => $class) {
                                ?>
                               <li><a href="searchbyclass.php?classId=<?php echo($key); ?>"><?php echo($class); ?></a></li>
                                <?php }?>
                          </ul>
                      </div>
                      <!-- End All Courses -->
                      <!-- Start Courses Features -->
                      <div class="cres__features">
                          <h2 class="title__style--2">COURSE FEATURES</h2>
                          <div class="crs__features__list">
                              <ul class="feature__duration">
                                <?php if ($course) {
                                 ?>
                                  <li><i class="icon ion-android-calendar"></i> Start Date:</li>
                                  <li><i class="icon ion-android-train"></i> Lectures: </li>
                                  <li><i class="icon ion-android-people"></i> Class Size:</li>
                                  <li><i class="icon ion-android-time"></i> Time: </li>
                                  <li><i class="icon ion-android-stopwatch"></i> Duration:</li>
                             <?php }?>
                              </ul>
                              <ul class="feature__time">
                                <?php if ($course) {
                                 ?>
                                  <li><?php echo(date('d M Y', strtotime($course->started_at))); ?></li>
                                  <li><?php echo($lactures);?></li>
                                  <li><?php echo($course->students); ?></li>
                                  <li><?php echo($course->duration) ?></li>
                                  <li><?php echo($course->period); ?></li>
                                  <?php }else{?>
                                  <li>Not available</li>
                                  <?php } ?>
                              </ul>
                          </div>
                      </div>
                      <!-- End Courses Features -->
                      
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!-- End Courses Details Area -->
  <!-- Start popular Courses Area -->
  <?php  if ($getlesson['classes']) { ?>
  <section class="popular__courses__area pb--80 bg__white">
      <div class="container">
          <div class="row">
              <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                  <!-- Start Section Title -->
                  <div class="section__title text-center">
                      <h2 class="title__line">Other Courses</h2>
                      <p>The Best In Our School</p>
                  </div>
                  <!-- End Section Title -->
              </div>
          </div>
          <div class="row">
              <div class="popular__courses__wrap indicator__style--1 owl-carousel owl-theme clearfix mt--30 xs-mt-0">
                  <!-- Start Single Courses -->
                  <?php 
                 
                   $lactures=mysqli_num_rows($getlesson['classes']);
                   while ($result=mysqli_fetch_array($getlesson['classes'])) {
                
                   ?>
                  <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                      <div class="courses">
                          <div class="courses__thumb">
                              <a href="courses-details.php?courseID=<?php echo(urlencode(base64_encode($result['id'])));?>"><img src="admin/<?php echo($result['image']) ?>" alt="courses images"></a>
                              <div class="courses__hover__info">
                                  <div class="courses__hover__action">
                                      <div class="courses__hover__thumb">
                                      </div>
                                      <h4><a >teacher : <?php echo($result['name']);?></a></h4> 
                                      <span class="crs__separator">/</span>
                                      <p>Expertise In : <?php echo($result['subject']);?></p>
                                  </div>
                              </div>
                          </div>
                          <div class="courses__details">
                              <div class="courses__details__inner">
                                  <h2><a href="courses-details.php?courseID=<?php echo(urlencode(base64_encode($result['id'])));?>"><?php echo($result['title']);?></a></h2>
                                  <p><?php echo($result['content']);?></p>
                              </div>
                              <ul class="courses__meta">
                                  <li><i class="icon ion-person-stalker"></i><?php echo($result['students']);?> Students</li>
                                  <li class="crs__free">TK <?php echo($result['price']);?></li>
                              </ul>
                          </div>
                      </div>
                  </div>
                  <?php } ?>
                  <!-- End Single Courses -->
              </div>
          </div>
      </div>
  </section>
  <?php } ?>
  <!-- End popular Courses Area -->
  <?php include("inc/footer.php"); ?>
