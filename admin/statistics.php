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
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> 
 <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Gender', 'Number'],  
                          <?php  
                          $aa='<div>Brand : <b>$row["productName"]</b><br/>Total Revenue : <b>';
                          $ss="";
                          $dd=0;
                          while($row = $getsalsstatic->fetch_assoc())  
                          {  
                            $ss=$row["productName"];
                            $dd=$row["number"];
                               echo "['name :".$ss."',". $dd."],"; 
                             // echo("$ss."".$dd"); 
                              // echo('<div>Brand : <b>$row["productName"]</b><br/>Total Revenue : <b>$row['number']</b></div>');
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Percentage of porducts and their sales qualtity',  
                      is3D:true,  
                     // pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  
           </script>  
<main class="main-content bgc-grey-100">
    <div id="mainContent">
        <div class="row gap-20 masonry pos-r">
            <div class="masonry-sizer col-md-12"></div>
            <div class="masonry-item col-md-12">
                <div class="bgc-white p-20 bd">
                    <h6 class="c-grey-900">Sales Report</h6>

                    <div id="piechart" style="width: 900px; height: 500px;"></div>

                </div>
            </div>
           
        </div>
    </div>
</main>
<?php include 'inc/footer.php';?> 
