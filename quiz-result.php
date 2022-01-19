<?php include_once("inc/inc/header.php"); ?>
<?php
   $getlesson=false; 
if (!$_SERVER['REQUEST_METHOD']=='POST' && !empty($_SESSION['course_id'])){

    echo "<script>window.location = 'take-quiz.php';</script>";
}else{
  $right_answer=0;
    $wrong_answer=0;
    $unanswered=0; 
  
   $keys=array_keys($_POST);
   $order=join(",",$keys);
   $total=count($keys);
   
}
   
 ?>
  <?php 
    $check=$quiz->checkQuiz($order);
       while($result=mysqli_fetch_assoc($check)){
           if($result['ans']==$_POST[$result['id']]){
                   $right_answer++;
           }else if($_POST[$result['id']]==5){
               $unanswered++;
           }
           else{
               $wrong_answer++;
           }
        }
        $quiz->insertResult($right_answer,$_SESSION['course_id']);
     ?>
  <!-- Header Layout Content -->
        <div class="mdk-header-layout__content">

            <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
                <div class="mdk-drawer-layout__content page ">

                    <div class="container-fluid page__container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="take-quiz.php">Take Quiz</a></li>
                            <li class="breadcrumb-item active">Result</li>
                        </ol>
                        <div class="card-group">
                            <div class="card">
                                <div class="card-body text-center">
                                    <h4 class="mb-0"><strong><?php echo($total);?></strong></h4>
                                    <small class="text-muted-light">TOTAL</small>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body text-center">
                                    <h4 class="text-success mb-0"><strong><?php echo($right_answer);?></strong></h4>
                                    <small class="text-muted-light">CORECT</small>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body text-center">
                                    <h4 class="text-danger mb-0"><strong><?php echo($wrong_answer);?></strong></h4>
                                    <small class="text-muted-light">WRONG</small>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body text-center">
                                    <h4 class="text-primary mb-0"><strong><?php echo($unanswered);?></strong></h4>
                                    <small class="text-muted-light">LEFT</small>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <div class="media align-items-center">
                                    <div class="media-left">
                                        <h4 class="mb-0"><strong>#</strong></h4>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="card-title">
                                            Result
                                           
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                       <a href="view-result.php">view all Result</a>
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

  