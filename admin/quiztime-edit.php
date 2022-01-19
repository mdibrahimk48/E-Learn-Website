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
 if (!isset($_GET['editTime'])||$_GET['editTime']==NULL ||$_GET['editTime']!=$_GET['editTime']) {
    echo "<script>window.location = 'colorlist.php';</script>";
}else{
    // $id=$_GET['editTime'];
    $id=preg_replace('/[^-a-zA-Z0-9]/', '', $_GET['editTime']);
}
if ($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['updateQuizTime'])) {
    $quiz->updateQuizTime($_POST,$id);
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
            <h1 class="h2">Add Quiz Time</h1>
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
                    $getCourses=$quiz->editQuizTimeById($id);
                    if ($getCourses) {
                     $quiztime=$getCourses->fetch_assoc();
                     
                     ?>
                    <form action="" method="POST">
                        <div class="form-group row">
                            <label for="quiz_title" id="clr" class="col-sm-3 col-form-label form-label">Quiz Limit:</label>
                            <?php 
                            $getCourses=$quiz->getNumberOfQuestions($id);
                            if ($getCourses) {
                             $result=$getCourses->fetch_assoc();
                             }
                             ?>
                            <div class="col-sm-9">
                                <input id="quiz_title" type="number" min="1" max="<?php echo($result['quiz_id']);?>" class="form-control" value="<?php echo($quiztime['quiz_limit']);?>" name="quiz_limit" required="required">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cmn-toggle" class="col-sm-3 col-form-label form-label">Course Duration</label>
                            <div class="col-sm-9">
                                
                                <div class="form-inline">
                                    Minute &nbsp
                                    <div class="form-group mr-2">
                                       <input type="number" id="teacher-entry-exit-form-exit-input" class="form-control text-center" name="minu" list="limittimeslist" value="<?php echo(gmdate('i',$quiztime['timer']));?>" required="required">
                                    </div>
                                   &nbsp&nbsp Second &nbsp
                                    <div class="form-group mr-2">
                                       <input type="number" id="teacher-entry-exit-form-exit-input" class="form-control text-center" name="sec" value="<?php echo(gmdate('s',$quiztime['timer']));?>">
                                    </div>
                                    <!--
                                    <datalist id="limittimeslist">

                                      <option value="06:40">

                                      <option value="08:24">

                                      <option value="12:31:30">

                                      <option value="23:59:59">

                                    </datalist>
                                -->
                                                                                    
                                </div>

                            </div>
                        </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-sm-9 offset-sm-3">
                                <button type="submit" class="btn btn-success" name="updateQuizTime">Update</button>
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
 
