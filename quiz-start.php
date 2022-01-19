<?php include_once("inc/inc/header.php"); ?>
<?php
SESSION::init();
   $getlesson=false; 
if (!isset($_GET['courseID'])||$_GET['courseID']==NULL ||$_GET['courseID']!=$_GET['courseID']) {
    echo "<script>window.location = 'take-quiz.php';</script>";
}else{
    // $id=$_GET['courseID'];
    $id=preg_replace('/[^-a-zA-Z0-9]/', '',$_GET['courseID']);
    $_SESSION['course_id']= $id;
$quiz_start=$quiz->getQuestionById($id);
   
}
    $time=false;
    $questions=false;
  if ($quiz_start['quiz_time']) {
    $time= mysqli_fetch_assoc($quiz_start['quiz_time']);
  }
  if ($quiz_start['questions']) {
    $questions= mysqli_fetch_assoc($quiz_start['questions']);
  }
 ?>
 <style>
    .container {
        margin-top: 110px;
    }
    .error {
        color: #B94A48;
    }
    .form-horizontal {
        margin-bottom: 0px;
    }
    .hide{display: none;}
</style>
  <!-- Header Layout Content -->
<div class="mdk-header-layout__content">

<div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
    <div class="mdk-drawer-layout__content page ">

        <div class="container-fluid page__container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item"><a href="take-quiz.php">Take Quiz</a></li>
                <li class="breadcrumb-item active">Quiz</li>
            </ol>
            <div class="card-group">
                <div class="card">
                    <div class="card-body text-center">
                        <h4 class="mb-0"><strong>25</strong></h4>
                        <small class="text-muted-light">TOTAL</small>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body text-center">
                        <h4 class="text-success mb-0"><strong>3</strong></h4>
                        <small class="text-muted-light">CORECT</small>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body text-center">
                        <h4 class="text-danger mb-0"><strong>5</strong></h4>
                        <small class="text-muted-light">WRONG</small>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body text-center">
                        <h4 class="text-primary mb-0"><strong>17</strong></h4>
                        <small class="text-muted-light">LEFT</small>
                    </div>
                </div>
            </div>
            <form class="form-horizontal" role="form" id='login' method="post" action="quiz-result.php">
            <?php 
             $i=1;
            $qui=$quiz->getQuestion($id);
            $rows = mysqli_num_rows($qui);
            while ($result= mysqli_fetch_array($qui)) {?>
            <?php if($i==1){?> 

            <div id="question<?php echo $i;?>" class="cont">
            <div class="card">
                <div class="card-header">
                    <div class="media align-items-center">
                        <div class="media-left">
                            <h4 class="mb-0"><strong>#<?php echo $i;?></strong></h4>
                        </div>
                        <div class="media-body">
                            <h4 class="card-title">
                    <p class='questions' id="qname<?php echo $i;?>"> <?php echo $i?>.<?php echo($result['question']);?></p>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                          <label><input type="radio" id='radio1_<?php echo($result['id']);?>' name="<?php echo($result['id']);?>" value="1">  <?php echo($result['ans1']);?></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                           <label><input type="radio" id='radio1_<?php echo($result['id']);?>' name="<?php echo($result['id']);?>" value="2">  <?php echo($result['ans2']);?></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <label><input type="radio" id='radio1_<?php echo($result['id']);?>' name="<?php echo($result['id']);?>" value="3"> <?php echo($result['ans3']);?></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <label><input type="radio" id='radio1_<?php echo($result['id']);?>' name="<?php echo($result['id']);?>" value="4"> <?php echo($result['ans4']);?></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <label><input type="radio" id='radio1_<?php echo($result['id']);?>' name="<?php echo($result['id']);?>" value="5" checked> Option 5</label>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button id="<?php echo $i;?>" type="button" class="btn btn-success float-right next">Next <i class="material-icons btn__icon--right">send</i></button>
                </div>
            </div>
            </div>
            <?php }elseif($i<1 || $i<$rows){?>
            <div id="question<?php echo $i;?>" class="cont">
            <div class="card">
                <div class="card-header">
                    <div class="media align-items-center">
                        <div class="media-left">
                            <h4 class="mb-0"><strong>#<?php echo $i;?></strong></h4>
                        </div>
                        <div class="media-body">
                            <h4 class="card-title">
                    <p class='questions' id="qname<?php echo $i;?>"> <?php echo $i?>.<?php echo($result['question']);?></p>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                          <label><input type="radio" id='radio1_<?php echo($result['id']);?>' name="<?php echo($result['id']);?>" value="1">  <?php echo($result['ans1']);?></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                           <label><input type="radio" id='radio1_<?php echo($result['id']);?>' name="<?php echo($result['id']);?>" value="2">  <?php echo($result['ans2']);?></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <label><input type="radio" id='radio1_<?php echo($result['id']);?>' name="<?php echo($result['id']);?>" value="3"> <?php echo($result['ans3']);?></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <label><input type="radio" id='radio1_<?php echo($result['id']);?>' name="<?php echo($result['id']);?>" value="4"> <?php echo($result['ans4']);?></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <label><input type="radio" id='radio1_<?php echo($result['id']);?>' name="<?php echo($result['id']);?>" value="5" checked> Option 5</label>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button id='<?php echo $i;?>' type="button" class="btn btn-white previous">Previous</button>
                    <button id="<?php echo $i;?>" type="button" class="btn btn-success float-right next">Next <i class="material-icons btn__icon--right">send</i></button>
                </div>
            </div>
            </div>
             <?php }elseif($i==$rows){?>
             <div id="question<?php echo $i;?>" class="cont">
            <div class="card">
                <div class="card-header">
                    <div class="media align-items-center">
                        <div class="media-left">
                            <h4 class="mb-0"><strong>#<?php echo $i;?></strong></h4>
                        </div>
                        <div class="media-body">
                            <h4 class="card-title">
                    <p class='questions' id="qname<?php echo $i;?>"> <?php echo $i?>.<?php echo($result['question']);?></p>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                          <label><input type="radio" id='radio1_<?php echo($result['id']);?>' name="<?php echo($result['id']);?>" value="1">  <?php echo($result['ans1']);?></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                           <label><input type="radio" id='radio1_<?php echo($result['id']);?>' name="<?php echo($result['id']);?>" value="2">  <?php echo($result['ans2']);?></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <label><input type="radio" id='radio1_<?php echo($result['id']);?>' name="<?php echo($result['id']);?>" value="3"> <?php echo($result['ans3']);?></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <label><input type="radio" id='radio1_<?php echo($result['id']);?>' name="<?php echo($result['id']);?>" value="4"> <?php echo($result['ans4']);?></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <label><input type="radio" id='radio1_<?php echo($result['id']);?>' name="<?php echo($result['id']);?>" value="5" checked> Option 5</label>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button id='<?php echo $i;?>' type="button" class="btn btn-white previous">Previous</button>
                    <button id="<?php echo $i;?>" type="submit" class="btn btn-success float-right next">Submit <i class="material-icons btn__icon--right">send</i></button>
                </div>
            </div>
            </div>
            <?php } $i++;} ?>

        </form>


        </div>

    </div>


<div class="mdk-drawer js-mdk-drawer" data-align="end">
<div class="mdk-drawer__content ">
    <div class="sidebar sidebar-right sidebar-light bg-white o-hidden" data-perfect-scrollbar>
        <div class="sidebar-p-y">
            <div class="sidebar-heading">Time left</div>
            <div class="countdown sidebar-p-x" data-value="<?php echo($time['timer']) ?>" data-unit="second"></div>
            <div class="sidebar-heading">Pending</div>
            <ul class="list-group list-group-fit">
                <li class="list-group-item active">
                    <a href="#">
                        <span class="media align-items-center">
                            <span class="media-left">
                                <span class="btn btn-white btn-circle">#9</span>
                            </span>
                            <span class="media-body">
                                Github command to deploy comits?
                            </span>
                        </span>
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="#">
                        <span class="media align-items-center">
                            <span class="media-left">
                                <span class="btn btn-white btn-circle">#10</span>
                            </span>
                            <span class="media-body">
                                What's the difference between private and public repos?
                            </span>
                        </span>
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="#">
                        <span class="media align-items-center">
                            <span class="media-left">
                                <span class="btn btn-white btn-circle">#11</span>
                            </span>
                            <span class="media-body">
                                What is the purpose of a branch?
                            </span>
                        </span>
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="#">
                        <span class="media align-items-center">
                            <span class="media-left">
                                <span class="btn btn-white btn-circle">#12</span>
                            </span>
                            <span class="media-body">
                                Final Question?
                            </span>
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
</div>

<?php include_once("inc/inc/sidebar.php"); ?>
  </div>
         
    </div>
</div>
<?php include_once("inc/inc/footer.php"); ?>

<script>
        $('.cont').addClass('hide');
        count=$('.questions').length;
        console.log(count);
         $('#question'+1).removeClass('hide');
         
         $(document).on('click','.next',function(){
             last=parseInt($(this).attr('id'));     
             nex=last+1;
             $('#question'+last).addClass('hide');
             
             $('#question'+nex).removeClass('hide');
         });
         
         $(document).on('click','.previous',function(){
             last=parseInt($(this).attr('id'));     
             pre=last-1;
             $('#question'+last).addClass('hide');
             
             $('#question'+pre).removeClass('hide');
         });
         var time ="<?php echo $time['timer']*1000;?>";
        // console.log(time);
            setTimeout(function() {
             $("form").submit();
          }, time);
         
        </script>
  