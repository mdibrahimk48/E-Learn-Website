<?php
include 'inc/header.php';
include_once'../classes/adminloging.php';
include_once'../classes/Course.php';
include_once'../classes/Quiz.php';
$admin= new adminloging();
$quiz= new Quiz();
$course= new Course();
 ?>
  <?php
        
if (isset($_GET['deleteQuiz'])) {
    // $id=$_GET['delete'];
    $id=preg_replace('/[^-a-zA-Z0-9]/', '', $_GET['deleteQuiz']);
    $deleteQuiz=$quiz->deleteQuizTimeById($id);
}
?>
<!-- Header Layout Content -->
<div class="mdk-header-layout__content">

    <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
        <div class="mdk-drawer-layout__content page ">

            <div class="container-fluid page__container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="instructor-dashboard.html">Home</a></li>
                    <li class="breadcrumb-item active">Quizzes</li>
                </ol>

                <div class="media align-items-center mb-headings">
                    <div class="media-body">
                        <h1 class="h2">Quizzes</h1>
                         <h4 class="card-title">Basic</h4>
                    <?php if(isset($_SESSION['error'])) {?>
                      <div class="alert alert-danger alert-dismissible" data-auto-dismiss="2000" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <strong style="color: red;">Warning!</strong>
                           <?php echo($_SESSION['error']);

                           unset($_SESSION['error']);
                           ?>
                      </div>
                    <?php }?>
                    <?php if(isset($_SESSION['success'])) {?>
                    <div class="alert alert-success alert-dismissible" data-auto-dismiss="2000" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong style="color: green;">Success!</strong> 
                        <?php echo($_SESSION['success']);

                           unset($_SESSION['success']);
                           ?>
                      </div>
                    <?php }?>
                    </div>
                    <div class="media-right d-flex align-items-center">
                        <a href="quiz-add.php" class="btn btn-success mr-2">Add quiz</a>
                    </div>
                </div>



                <div class="card-columns">
                     <?php 
                    $getCourses=$quiz->getAllQuizzes();
                    if ($getCourses) {
                       while ($result=$getCourses->fetch_assoc()) {
                     
                     ?>
                    <div class="card card-sm">
                        <div class="card-body media">
                            <div class="media-left">
                                <a href="review-quiz.php?courseReview=<?php echo($result['id']);?>" class="avatar avatar-lg avatar-4by3">
                                    <img src="<?php echo($result['image']);?>" alt="Card image cap" class="avatar-img rounded">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="card-title mb-0"><a href="review-quiz.php?courseReview=<?php echo($result['id']);?>"><?php echo($result['title']);?></a></h4>
                                <small class="text-muted">Added <?php echo($result['quiz_id']); ?> quizes</small>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <a href="review-quiz.php?courseReview=<?php echo($result['id']);?>" class="btn btn-white btn-sm float-left"><i class="material-icons btn__icon--left">playlist_add_check</i> Review </a>
                            <?php if ($result['quiz_time_id']!='') {
                            ?>
                            <a href="quiztime-edit?editTime=<?php echo($result['id']);?>" class="btn btn-default btn-sm float-right"><i class="material-icons btn__icon--left">edit</i> Edit Time </a>
                            <?php }else{?>
                            <a href="quiztime-add?addTime=<?php echo($result['id']);?>" class="btn btn-default btn-sm float-right"><i class="material-icons btn__icon--left">add</i> Add Time </a>
                           <?php } ?>
                            <a onclick="return confirm('Are you sure to delete all question')" href="?deleteQuiz=<?php echo($result['id']);?>" class="btn btn-default btn-sm float-right"><i class="material-icons btn__icon--left">delete</i>Delete </a>

                            <div class="clearfix"></div>
                        </div>
                    </div>
                        
                    <?php }} ?>
                </div>
                 
                <!-- Pagination 
                <ul class="pagination justify-content-center pagination-sm">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true" class="material-icons">chevron_left</span>
                            <span>Prev</span>
                        </a>
                    </li>
                    <li class="page-item active">
                        <a class="page-link" href="#" aria-label="1">
                            <span>1</span>
                        </a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="1">
                            <span>2</span>
                        </a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span>Next</span>
                            <span aria-hidden="true" class="material-icons">chevron_right</span>
                        </a>
                    </li>
                </ul>-->
            </div>

        </div>
<?php include 'inc/sidebar.php';?>
                
            </div>
        </div>
    </div>
<?php include 'inc/footer.php';?>
<!-- Modal -->





