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
 if (!isset($_GET['editQuestion'])||$_GET['editQuestion']==NULL ||$_GET['editQuestion']!=$_GET['editQuestion']) {
    echo "<script>window.location = 'colorlist.php';</script>";
}else{
    // $id=$_GET['editQuestion'];
    $id=preg_replace('/[^-a-zA-Z0-9]/', '', $_GET['editQuestion']);
}
if ($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['updateQuizInfo'])) {
    $quiz->updateQuizInfo($_POST,$id);
}
 ?>
<style type="text/css">
    #clr{
        color: black;
    }
</style>
  <!-- Header Layout Content -->
<div class="mdk-header-layout__content">

<div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
    <div class="mdk-drawer-layout__content page ">

        <div class="container-fluid page__container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item"><a href="manage-quizze.php">Quiz Manager</a></li>
                <li class="breadcrumb-item active">Edit Quiz</li>
            </ol>
            <h1 class="h2">Add Quiz</h1>
            <div class="card">
                <div class="card-header">
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
                <div class="card-body">
                     <?php 
                    $editQuiz=$quiz->editQuestionById($id);
                    if ($editQuiz) {
                     $editQuiz=$editQuiz->fetch_assoc();
                     
                     ?>
                    <form action="" method="POST">
                        <div class="form-group row">
                            <label for="quiz_title" id="clr" class="col-sm-3 col-form-label form-label">Quiz Title:</label>
                            <div class="col-sm-9">
                                <input id="quiz_title" type="text" class="form-control" value="<?php echo($editQuiz['question']);?>" name="question" required="required">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="course_title" id="clr" class="col-sm-3 col-form-label form-label">Course:</label>
                            <div class="col-sm-9 col-md-4">
                                <select id="course_title" class="custom-select form-control" name="course_id" required="required">
                                     <option value="" selected>Select Course</option>
                                     <?php 
                                    $getCourse=$course->getAllCourses();
                                    if ($getCourse) {
                                       while ($result=$getCourse->fetch_assoc()) {
                                        if ($result['id']==$editQuiz['course_id']) {
                                     ?>
                                    <option value="<?php echo($result['id']);?>" selected><?php echo($result['title']);?></option>
                                    <?php }else{ ?>
                                    <option value="<?php echo($result['id']);?>"><?php echo($result['title']);?></option>
                                    <?php }}} ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="quiz_title" id="clr" class="col-sm-3 col-form-label form-label">Answer-1</label>
                            <div class="col-sm-9">
                                <input id="quiz_title" type="text" class="form-control" value="<?php echo($editQuiz['ans1']);?>" name="ans1" required="required">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="quiz_title" id="clr" class="col-sm-3 col-form-label form-label">Answer-2</label>
                            <div class="col-sm-9">
                                <input id="quiz_title" id="clr" type="text" class="form-control" value="<?php echo($editQuiz['ans2']);?>" name="ans2" required="required">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="quiz_title" id="clr" class="col-sm-3 col-form-label form-label">Answer-3</label>
                            <div class="col-sm-9">
                                <input id="quiz_title" type="text" class="form-control" value="<?php echo($editQuiz['ans3']);?>" name="ans3" required="required">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="quiz_title" id="clr" class="col-sm-3 col-form-label form-label">Answer-4</label>
                            <div class="col-sm-9">
                                <input id="quiz_title" type="text" class="form-control" value="<?php echo($editQuiz['ans4']);?>" name="ans4" required="required">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="course_title" id="clr" class="col-sm-3 col-form-label form-label">Corrret Answer:</label>
                            <div class="col-sm-9 col-md-4">
                                <select id="course_title" class="custom-select form-control" name="ans" required="required">
                                     <?php
                                     $answer=[
                                     '1'=>'Answer-1',
                                     '2'=>'Answer-2',
                                     '3'=>'Answer-3',
                                     '4'=>'Answer-4',
                                     ];
                                     foreach ($answer as $key => $ans) {
                                     if($key==$editQuiz['ans']){
                                    ?>
                                    <option value="<?php echo($key);?>" selected><?php echo($ans);?></option>
                                    <?php }else{?>
                                    <option value="<?php echo($key);?>"><?php echo($ans);?></option>
                                    <?php }} ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-sm-9 offset-sm-3">
                                <button type="submit" class="btn btn-success" name="updateQuizInfo">Update</button>
                            </div>
                        </div>
                    </form>
                    <?php } ?>
                </div>
            </div>
           
        </div>

    </div>




<?php include 'inc/sidebar.php';?>
                
            </div>
        </div>
    </div>
<?php include 'inc/footer.php';?> 
  <div class="modal fade" id="editQuiz">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title text-white">Edit Question</h4>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="#">
                        <div class="form-group row">
                            <label for="qtitle" class="col-form-label form-label col-md-3">Title:</label>
                            <div class="col-md-9">
                                <input id="qtitle" type="text" class="form-control" value="Database Access">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="type" class="col-form-label form-label col-md-3">Type:</label>
                            <div class="col-md-4">
                                <select id="type" class="custom-control custom-select form-control">
                                    <option value="1">Input</option>
                                    <option value="2">Textarea</option>
                                    <option value="3">Checkbox</option>
                                    <option value="3">Radio</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label form-label col-md-3">Answers:</label>
                            <div class="col-md-9">
                                <a href="#" class="btn btn-default"><i class="material-icons">add</i> Add Answer</a>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="touch-spin-2" class="col-form-label form-label col-md-3">Question Score:</label>
                            <div class="col-md-4">
                                <input id="touch-spin-2" data-toggle="touch-spin" data-min="0" data-max="100" data-step="5" type="text" value="50" name="demo2" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-3">
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
