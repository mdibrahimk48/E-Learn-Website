<?php include_once("inc/header.php"); ?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css" />
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<?php
include_once'../classes/Course.php';
include_once'../classes/FAQ.php';
$course= new Course();
$faq= new FAQ();
$y=0;
$month=array('','Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nob','Dec');
for ($x=1; $x<=12 ; $x++) { 
  $sal[$x]=0;
}

if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['month_static'])) {
   $year=$_POST['year'];
    $getattend=$report->getMonthStatic($year);
    if ($getattend==true) {
      while ($result=$getattend->fetch_assoc()) {
  $y=date("Y",strtotime($result['date']));
   $mon=(int)date("m",strtotime($result['date']));
  if ($y==$year) {
    $sal[$mon]=$sal[$mon]+$result['Year'];
  }
}
      
    }
  }else{
    $year= date("Y");
    $getattend=$report->getMonthStatic($year);
        if ($getattend==true) {
      while ($result=$getattend->fetch_assoc()) {
  $y=date("Y",strtotime($result['date']));
   $mon=(int)date("m",strtotime($result['date']));
  if ($y==$year) {
    $sal[$mon]=$sal[$mon]+$result['Year'];
  }
}
      
    }

  }
  ?>
            <div class="mdk-header-layout__content">
                <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
                    <div class="mdk-drawer-layout__content page ">
                        <div class="container-fluid page__container">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                            <h1 class="h2">Dashboard</h1>
                            <?php if (Session::get("user_role")==0) {?>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header d-flex align-items-center">
                                            <div class="flex">
                                                <h4 class="card-title">Earnings
                                                   
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <form  method="post">
                                             <div class="form-group float-md-right">
                                             <button type="submit" name="month_static" class="btn btn-default">Monthly report</button>
                                            </div>
                                            <div class="form-group float-md-right">
                                            <select class="custom-select" name="year">
                                                <?php 
                                                    $getyear=$report->getYearStatic();
                                                    if ($getyear) {
                                                      while ($re=$getyear->fetch_assoc()) {
                                                 ?>
                                                <option value="<?php echo($re['date']); ?>"><?php echo($re['date']); ?></option>
                                                <?php }}else{?>
                                                <option value="1111">year not found</option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        </form>

                                            <div class="clearfix"></div>
                                               <?php
                                 if (isset($getattend) && $y==$year ) {?>
                                  <script type="text/javascript" src="https://www.google.com/jsapi"></script>
                                    <script type="text/javascript">
                                      google.load("visualization","1", {packages:['corechart']});
                                      google.setOnLoadCallback(drawChart);

                                      function drawChart() {
                                        var data = google.visualization.arrayToDataTable([
                                          <?php 
                                          for ($x=1; $x<=12 ; $x++) {
                                           ?>
                                          ['', 'Sales'],
                                          ['<?php echo($month[$x]); ?>', <?php echo($sal[$x]); ?>],
                                         <?php } ?>
                                        ]);

                                        var options = {
                                         
                                            title: 'Company Performance',
                                            hAxis: {title: 'Sales Report',titleTextStyle: {color: 'red'}
                                          }
                                        };

                                        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));

                                        chart.draw(data, options);
                                      }
                                    </script>
                                    <div id="chart_div" style="width: 98%; height: 500px;"></div>
                                     <?php } ?>
                                        </div>
                                    </div>
                                    
                                </div>
                                
                                </div>
                                <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header d-flex align-items-center">
                                            <div class="flex">
                                                <h4 class="card-title">Sales today</h4>
                                                <p class="card-subtitle">by course</p>
                                            </div>
                                        </div>
                                        <ul class="list-group list-group-fit mb-0">
                                            <?php 
                                            $getyear=$report->todaySalesReport();
                                            if ($getyear) {
                                              while ($sale=$getyear->fetch_assoc()) {
                                        ?>
                                            <li class="list-group-item">
                                                <div class="media align-items-center">
                                                    <div class="media-body">
                                                        <a  class="text-body"><strong><?php echo($sale['title']); ?></strong></a>
                                                       <!-- Transac-ID: <a  class="text-body"><strong><?php //echo $sale['transaction_id'] != false ? $sale['transaction_id'] : 'N/A';?></strong></a> -->
                                                    </div>
                                                    <div class="media-right">
                                                        <div class="text-center">
                                                            <span class="badge badge-pill badge-primary"><?php echo($sale['sales']) ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <?php }}else{?>
                                            <li class="list-group-item">
                                                 <h2 class="text-center">No Sales today</h2>
                                            </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                         </div>
                         <?php }else{?>
                         <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                  <div class="card-header">
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            <h4 class="card-title text-center">Courses</h4>
                                        </div>
                                    </div>
                                </div>
                            <div data-toggle="lists" class="table-responsive">
                                <table class="table table-nowrap m-0">
                                    <thead class="thead-light">

                                        <tr class="text-uppercase small">
                                            <th>
                                                <a >Course</a>
                                            </th>
                                            <th class="text-center">
                                                <a >Class</a>
                                            </th>
                                            <th class="text-center">
                                                <a >Duration</a>
                                            </th>
                                            <th class="text-center">
                                                <a >Period</a>
                                            </th>
                                            <th class="text-center">
                                                <a >Started_at</a>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="list">
                                        <?php 
                                            $teachecoures=$course->getTeacherEnrollCourese();
                                            if ($teachecoures) {
                                              while ($ecourse=$teachecoures->fetch_assoc()) {
                                        ?>
                                        <tr>
                                            <td>
                                                <div class="media align-items-center">
                                                    <a href="course-edit.php?courseEdit=<?php echo($ecourse['id']);?>" class="avatar avatar-4by3 avatar-sm mr-3">
                                                        <img src="<?php echo($ecourse['image']);?>" alt="course" class="avatar-img rounded">
                                                    </a>
                                                    <div class="media-body">
                                                        <a class="text-body js-lists-values-course" href="course-edit.php?courseEdit=<?php echo($ecourse['id']);?>"><strong><?php echo($ecourse['title']);?></strong></a>
                                                        <div class="text-muted small">Student: <?php echo $ecourse['take_course'] !=0 ? $ecourse['take_course'] : 'N/A';?> </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center text-black-70">

                                            <span class="js-lists-values-fees"><?php echo($ecourse['class']);?></span> 

                                            </td>
                                            <td class="text-center text-black-70">

                                            <span class="js-lists-values-fees"><?php $time=explode('-',$ecourse['duration']); echo(date('h:i:s a', strtotime($time[0])).' - '.date('h:i:s a', strtotime($time[1])));?></span> 

                                            </td>
                                            <td class="text-center text-black-70">

                                            <span class="js-lists-values-fees"><?php echo($ecourse['period']);?></span> 

                                            </td>
                                            <td class="text-center text-black-70">
                                            <span class="js-lists-values-revenue"><?php echo(date('d M Y', strtotime($ecourse['started_at']))); ?></span>
                                            </td>
                                        </tr>
                                        <?php }}else{?>
                                        <tr>
                                            <td>
                                               <h3 class="text-center">No enroll yet</h3> 
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
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
                            <!--
                            <div class="media-right">
                                <a class="btn btn-sm btn-primary" href="../question-post.php">Ask Question</a>
                            </div>-->
                        </div>
                    </div>
                    <ul class="list-group list-group-fit mb-0">
                        <?php 
                        $getQuestions=$faq->getCourseByQuestions();
                        $i=0;
                        if ($getQuestions) {
                           while ($result=$getQuestions->fetch_assoc()) {
                         $i++;
                         ?>
                        <li class="list-group-item">
                            <div class="media align-items-center">
                                <div class="media-body">
                                   <?php echo($i);?>. <a class="text-body" <!--href="../question-details.php?quesId=<?php //echo($result['id']);?>"--><strong><?php echo($result['title']);?> (courseName: <?php echo($result['ctitle']);?>)</strong></a><br>
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
                         <?php } ?>
                        </div>
                    </div>


    <?php include_once("inc/sidebar.php"); ?>
      </div>
             
        </div>
    </div>
    <?php include_once("inc/footer.php"); ?>
      