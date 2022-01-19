    <?php include_once("inc/inc/header.php"); ?>
     <!-- Header Layout Content -->
     <?php 
    if (isset($_GET['reid'])) {
        // $id=$_GET['delete'];
        $id=preg_replace('/[^-a-zA-Z0-9]/', '', $_GET['reid']);
       $course->restart($id);
    }
    ?>
    
     <!-- Header Layout Content -->
    <div class="mdk-header-layout__content">

    <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
        <div class="mdk-drawer-layout__content page ">

            <div class="container-fluid page__container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                    <li class="breadcrumb-item active">My Quizes</li>
                </ol>
                <div class="media mb-headings align-items-center">
                    <div class="media-body">
                        <h1 class="h2">My Quizes</h1>
                    </div>
                </div>
                <div class="card-columns">
                    <?php 
                    $getQuestions=$quiz->getUserQuestionCourseList();
                    if ($getQuestions) {
                   while ($result=$getQuestions->fetch_assoc()) {
                ?>
                    <div class="card">
                        <div class="card-header">
                            <div class="media">
                                <div class="media-left">
                                    <a href="student-student-take-course.html">
                                        <img src="admin/<?php echo($result['image']);?>" alt="Card image cap" width="100" class="rounded">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="card-title m-0"><a href="quiz-start.php?courseID=<?php echo($result['id']);?>"><?php echo($result['title']);?></a></h4>
                                    <small class="text-muted">Number of questions: <?php echo($result['ques']);?></small>
                                </div>
                            </div>
                        </div>
                        <div class="progress rounded-0">
                            <div class="progress-bar progress-bar-striped bg-primary" role="progressbar" style="width: 100%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="card-footer bg-white">
                            <a href="quiz-start.php?courseID=<?php echo($result['id']);?>" class="btn btn-primary btn-sm">Start <i class="material-icons btn__icon--right">play_circle_outline</i></a>
                        </div>
                    </div>
                    <?php }} ?>
                </div>
            </div>

        </div>

    <?php include_once("inc/inc/sidebar.php"); ?>
      </div>
             
        </div>
    </div>
    <?php include_once("inc/inc/footer.php"); ?>
      