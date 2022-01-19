<?php include_once("inc/inc/header.php"); ?>
  <!-- Header Layout Content -->
<div class="mdk-header-layout__content">

<div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
<div class="mdk-drawer-layout__content page ">

    <div class="container-fluid page__container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <h1 class="h2">Dashboard</h1>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="media align-items-center">
                            <div class="media-body">
                                <h4 class="card-title">Courses</h4>
                                <p class="card-subtitle">Your recent courses</p>
                            </div>
                            <div class="media-right">
                                <a class="btn btn-sm btn-primary" href="my-courses.php">My courses</a>
                            </div>
                        </div>
                    </div>

                    <ul class="list-group list-group-fit mb-0" style="z-index: initial;">
                        <?php 
                        $getCourses=$course->getStudentCourseList();
                        if ($getCourses) {
                       while ($result=$getCourses->fetch_assoc()) {
                        ?>
                        <li class="list-group-item" style="z-index: initial;">
                            <div class="d-flex align-items-center">
                                <a href="view-course.php?courseID=<?php echo($result['id']);?>" class="avatar avatar-4by3 avatar-sm mr-3">
                                    <img src="admin/<?php echo($result['image']);?>" alt="course" class="avatar-img rounded">
                                </a>
                                <div class="flex">
                                    <a href="view-course.php?courseID=<?php echo($result['id']);?>" class="text-body"><strong><?php echo($result['title']);?></strong></a>
                                    <?php 
                                    $status=0;
                                        $lesson=$course->getStudentCourseLessonList($result['id']);
                                        if ($lesson) {
                                       $status=$lesson->fetch_assoc();
                                   
                                    }
                                    ?>
                                    <?php 
                                    $rating=0;
                                    $rating=round(100*($status['complete']/($status['row'] != 0? $status['row'] :'1'))); 
                                    ?>
                                    <div class="d-flex align-items-center">
                                        <div class="progress" style="width: 100px;">
                                            <div class="progress-bar bg-<?php echo $rating <50 ? 'primary' : ($rating >50 && $rating <99?'warning':'success');?>" role="progressbar" style="width: <?php echo(100*($status['complete']/$status['row'])); ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <small class="text-muted ml-2"><?php echo($rating); ?>%</small>
                                    </div>
                                </div>
                                <div class="dropdown ml-3">
                                    <a href="#" class="dropdown-toggle text-muted" data-caret="false" data-toggle="dropdown">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="student-take-course.html">Continue</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php }}else{?>
                        <li class="list-group-item" style="z-index: initial;">
                            <h3 class="text-center">You have no enroll any courses yet</h3>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="media align-items-center">
                            <div class="media-body">
                                <h4 class="card-title">Questions</h4>
                                <p class="card-subtitle">Your Performance</p>
                            </div>
                            <div class="media-right">
                                <a class="btn btn-sm btn-primary" href="question-post.php">Ask Question</a>
                            </div>
                        </div>
                    </div>
                    <ul class="list-group list-group-fit mb-0">
                        <?php 
                        $getQuestions=$faq->getMyQuestions();
                        $i=0;
                        if ($getQuestions) {
                           while ($result=$getQuestions->fetch_assoc()) {
                         $i++;
                         ?>
                        <li class="list-group-item">
                            <div class="media align-items-center">
                                <div class="media-body">
                                   <?php echo($i);?>. <a class="text-body" href="question-details.php?quesId=<?php echo($result['id']);?>"><strong><?php echo($result['title']);?></strong></a><br>
                                </div>
                                <div class="media-right text-center d-flex align-items-center">
                                    <a data-toggle="tooltip" data-placement="bottom" data-original-title="Answers"><h4 class="mb-0 text-success"><?php echo($result['ans']);?></h4></a>
                                </div>
                            </div>
                        </li>
                        <?php }}else{?>
                        <li class="list-group-item">
                            <h3 class="text-center">You have no question</h3>
                        </li>
                        <?php } ?>
                    </ul>
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
  