<?php
include 'inc/header.php';
include_once'../classes/adminloging.php';
include_once'../classes/Course.php';
include_once'../classes/Quiz.php';
$admin= new adminloging();
$course= new Course();
$quiz= new Quiz();
 ?>
  <?php
  if (!isset($_GET['courseReview'])||$_GET['courseReview']==NULL ||$_GET['courseReview']!=$_GET['courseReview']) {
    echo "<script>window.location = 'colorlist.php';</script>";
}else{
    // $id=$_GET['courseReview'];
    $id=preg_replace('/[^-a-zA-Z0-9]/', '', $_GET['courseReview']);
}
        
if (isset($_GET['deleteQuiz'])) {
    // $id=$_GET['delete'];
    $delid=preg_replace('/[^-a-zA-Z0-9]/', '', $_GET['deleteQuiz']);
    $quiz->delQestionById($delid);
}
?>
<!-- Header Layout Content -->
<div class="mdk-header-layout__content">

    <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
        <div class="mdk-drawer-layout__content page ">

            <div class="container-fluid page__container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="manage-quizze.php">Quiz Manager</a></li>
                    <li class="breadcrumb-item active">Quiz Review</li>
                </ol>
                <?php 
                $getCourse=$quiz->getAllQuizzesById($id);
                if ($getCourse['admin']) {
                $admin=$getCourse['admin']->fetch_assoc();
                 ?>
                <div class="media flex-wrap align-items-center mb-headings">
                    <div class="media-left avatar avatar-lg avatar-4by3">
                        <img src="<?php echo($admin['image']); ?>" alt="" class="avatar-img rounded">
                    </div>
                    <div class="media-body mb-3 mb-sm-0">
                        <h1 class="h2 mb-0"><?php echo($admin['title']); ?> Quiz</h1>
                        <span class="text-muted">submited by</span> <a href="teacher-profile.php?profileId=<?php echo($admin['id']); ?>"><?php echo($admin['name']); ?></a> Expertise In <?php echo($admin['subject']); ?>
                    </div>
                </div>
                <?php } ?>
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
                <div class="card">
                    <ul class="nav nav-tabs nav-tabs-card">
                        <li class="nav-item">
                            <a class="nav-link active" href="#first" data-toggle="tab">Review</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#second" data-toggle="tab">All Questions</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="first">
                            <ul class="list-group mb-0 list-group-fit">
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4>Review History</h4>
                                            <div class="table-responsive">
                                                <table class="table table-sm table-middle">
                                                    <thead>
                                                        <tr>
                                                            <th style="width: 120px">Submitted</th>
                                                            <th class="text-center">Student</th>
                                                            <th class="text-center">Mobile</th>
                                                            <th class="text-center"> Score</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php 
                                                        $getCourseResult=$quiz->getCourseResultById($id);
                                                        if ($getCourseResult) {
                                                            while ( $coureresul=mysqli_fetch_array($getCourseResult)) {
                                                         ?>
                                                        <tr>
                                                            <td><span class="badge badge-light "><?php echo(date('d M Y', strtotime($coureresul['created_at']))); ?></span></td>
                                                            <td class="text-center"><a ><?php echo($coureresul['name']);?></a></td>
                                                            <td class="text-center"><span class="text-muted"><?php echo($coureresul['mobile']);?></span></td>
                                                            <td class="text-center"><span ><?php echo($coureresul['result']);?></span></td>
                                                        </tr>
                                                        <?php }}else{?>
                                                        <tr>
                                                            <td colspan="4">
                                                                <h2 class="text-center">No student attend quiz</h2>
                                                            </td>
                                                        </tr>
                                                        <?php } ?>
                                                        
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                        
                                    </div>
                                </li>
                                <li class="list-group-item">
                                </li>
                            </ul>
                        </div>
                        <div class="tab-pane" id="second">
                            <ul class="list-group mb-0 list-group-fit">
                                 <?php 
                                    $total=0;
                                    if ($getCourse['questions']) {
                                    $total=mysqli_num_rows($getCourse['questions']);
                                        $i=0;
                                       while ($quiz_result=$getCourse['questions']->fetch_assoc()) {
                                        $i++;
                                     ?>
                                <li class="list-group-item">
                                    <div class="media">
                                        <div class="media-left">
                                            <div class="text-muted-light"><?php echo($i);?>.</div>
                                        </div>
                                        <div class="media-body"><a href="quiz-edit.php?editQuestion=<?php echo($quiz_result['quiz_id']);?>"><?php echo($quiz_result['question']);?>.</a></div>
                                        <div class="media-right">
                                            <strong class="text-primary">
                                                 <a onclick="return confirm('Are you sure to delete question')" href="?deleteQuiz=<?php echo($quiz_result['quiz_id']);?>" class="btn btn-default btn-sm float-right"><i class="material-icons btn__icon--left">delete</i>Delete </a>&nbsp&nbsp
                                                <a href="quiz-edit.php?editQuestion=<?php echo($quiz_result['quiz_id']);?>" class="btn btn-default btn-sm float-right"><i class="material-icons btn__icon--left">edit</i>Edit</a>
                                            </strong>
                                        </div>
                                    </div>
                                </li>
                              <?php }} ?>
                            </ul>
                            <div class="card card-footer">
                                Total Question: <span class="h5 text-primary"><strong><?php echo($total); ?></strong></span>
                            </div>
                        </div>
                    </div>
                </div>

                
            </div>

        </div>
<?php include 'inc/sidebar.php';?>
                
            </div>
        </div>
    </div>
<?php include 'inc/footer.php';?> 
