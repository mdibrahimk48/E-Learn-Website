<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include 'inc/header-nav.php';?>
<?php 
$role=Session::get("adminRole");
if ($role!='0') {
$id=Session::get("adminId");
$name=Session::get("adminName");
}
 ?>
<?php
$getsalsstatic=$report->getAllSaleStatic();
  ?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css" />
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(function() {
      $("#datepicker").datepicker({
        dateFormat: "yy-mm-dd"
    }).datepicker("setDate", new Date());
   });
  </script>
<?php
$y=0;
$month=array('','Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nob','Dec');
for ($x=1; $x<=12 ; $x++) { 
  $sal[$x]=0;
}

    if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['month_static'])) {
   $dd=$_POST['date'];
  echo  $year= date("Y",strtotime($dd));
 
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
<main class="main-content bgc-grey-100">
    <div id="mainContent">
        <div class="row gap-20 masonry pos-r">
            <div class="masonry-sizer col-md-12"></div>
            <div class="masonry-item col-md-12">
                <div class="bgc-white p-20 bd">
                    <h6 class="c-grey-900">Sales Report</h6>

                    <form class="form-inline" method="post">
                        <div class="form-group">
                            <label for="email">Date:</label>
                            <input type="date" class="form-control" id="datepicker" name="date">
                        </div>
                        <button type="submit" name="month_static" class="btn btn-default">Monthly report</button>
                       
                    </form>
                    <?php
                    if (isset($getattend) && $y!==$year){
                      echo("Data not found");
                    } 
                    ?>
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
                            hAxis: {title: 'Sales 2014-2017',titleTextStyle: {color: 'red'}
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
</main>
<?php include 'inc/footer.php';?>