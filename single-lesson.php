<?php include_once("inc/inc/header.php"); ?>
<?php
$getlesson=false; 
if ((!isset($_GET['courseID'])||$_GET['courseID']==NULL ||$_GET['courseID']!=$_GET['courseID'])&&(!isset($_GET['lessonId'])||$_GET['lessonId']==NULL ||$_GET['lessonId']!=$_GET['lessonId'])) {
    echo "<script>window.location = 'my-courses.php';</script>";
}else{
    // $id=$_GET['courseID'];
    $id=preg_replace('/[^-a-zA-Z0-9]/', '',$_GET['courseID']);
    $lid=preg_replace('/[^-a-zA-Z0-9]/', '',$_GET['lessonId']);
$getlesson=$course->viewSingleLessonById($id,$lid);
   
}
$course=false;
  $lesson=false;
  $rating=false;
  if ($getlesson['course']||$getlesson['lesson']||$getlesson['ratings']) {
    $course= Mysqli_fetch_object($getlesson['course']);
    $lesson= mysqli_fetch_assoc($getlesson['lesson']);
    $rating= mysqli_fetch_assoc($getlesson['ratings']);

  }
 ?>
 <!-- Header Layout Content -->
<div class="mdk-header-layout__content">

<div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
    <div class="mdk-drawer-layout__content page ">

        <div class="container-fluid page__container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item"><a href="my-courses.php">Courses</a></li>
                <li class="breadcrumb-item active"><?php echo($lesson['title']); ?></li>
            </ol>
            <h1 class="h2"><?php echo($lesson['title']); ?></h1>
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $lesson != false ? $lesson['videourl'] : 'aDm5WZ3QiIE';?>" allowfullscreen=""></iframe>
                        </div>
                        <div class="card-body">
                            <p>
                                <?php echo($lesson['content']); ?>
                            </p>
                        </div>
                    </div>

                    <!-- Lessons -->
                    <ul class="card list-group list-group-fit">
                         <?php 
                         $lac=0;
                         $i=1;
                        if ($getlesson['lessons']) {
                       $lactures=mysqli_num_rows($getlesson['lessons']);
                       while ($result=mysqli_fetch_array($getlesson['lessons'])) {
                         ?>
                        <li class="list-group-item">
                            <div class="media">
                                <div class="media-left">
                                    <div class="text-muted"><?php echo($i);?></div>
                                </div>
                                <div class="media-body">
                                    <a href="single-lesson.php?lessonId=<?php echo($result['id']);?>&courseID=<?php echo($result['course_id']);?>"><?php echo($result['title']);?></a>
                                </div>
                                <div class="media-right">
                                    <small class="text-muted-light"><?php echo($result['duration']);?></small>
                                </div>
                            </div>
                        </li>
                        <?php }} ?>
                    </ul>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <a  target="_blank" href="admin/<?php echo $lesson != false ? $lesson['pdfpath'] : '';?>#toolbar=0" class="btn btn-primary btn-block flex-column">
                                <i style="font-size: 30px;" class="material-icons" >picture_as_pdf</i> Open File
                            </a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <div class="media align-items-center">
                                <div class="media-left">
                                    <img src="admin/<?php echo $course != false ? $course->img : 'Data not exist';?>" alt="About Adrian" width="50" class="rounded-circle">
                                </div>
                                <div class="media-body">
                                    <h4 class="card-title"><a ><?php echo $course != false ? $course->name : '';?></a></h4>
                                    <p class="card-subtitle">Instructor</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <p>Expertise In <strong><?php echo $course != false ? $course->subject : '';?></strong> </p>
                            
                        </div>
                    </div>

                    <div class="card">
                        <ul class="list-group list-group-fit">
                            <li class="list-group-item">
                                <div class="media align-items-center">
                                    <div class="media-left">
                                        <i class="material-icons text-muted-light">schedule</i>
                                    </div>
                                    <div class="media-body">
                                         <small class="text-muted">Lenght: </small><?php echo($lesson['duration']); ?>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="media align-items-center">
                                    <div class="media-left">
                                        <i class="material-icons text-muted-light">assessment</i>
                                    </div>
                                    <div class="media-body">Beginner</div>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Ratings</h4>
                        </div>
                        <div class="card-body">
                            <div class="rating">
                                <?php 
                                  if ($rating) {
                                      $ratings=round($rating['avg_rating']);
                                      for ($i=1; $i <=5 ; $i++) { 
                                      if ($i<=$ratings) {
                                  ?>
                                <i class="material-icons">star</i>
                                 <?php }else{?>
                                <i class="material-icons">star_border</i>
                                <?php }}?>
                            </div>
                            <small class="text-muted"><?php echo($rating['user_rating']); ?> ratings</small>
                       <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>




<?php include_once("inc/inc/sidebar.php"); ?>
  </div>
         
    </div>
</div>
<?php include_once("inc/inc/footer.php"); ?>
  