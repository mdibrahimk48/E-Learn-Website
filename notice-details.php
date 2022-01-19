 <?php include("inc/header-top.php"); ?>
            <!-- Start Mainmenu Area -->
<?php include("inc/header-nav.php"); ?>
            <!-- End Mainmenu Area -->
            <!-- Mobile-menu-area start -->
<?php include("inc/mobile-nav.php"); ?>
            <!-- Mobile-menu-area End -->
        </div>
<?php 
if (!isset($_GET['noticeID'])||$_GET['noticeID']==NULL ||$_GET['noticeID']!=$_GET['noticeID']) {
    echo "<script>window.location = '404.php';</script>";
}else{
    // $id=$_GET['noticeID'];
    $noticeid=preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['noticeID']);
}
 ?>
<!-- End Header Style -->
<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area" data--black__overlay="4" style="background: rgba(0, 0, 0, 0) url(images/bg/4.jpg) no-repeat scroll center center / cover ;">
<div class="ht__bradcaump__wrap">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="bradcaump__inner text-center">
                    <h2 class="bradcaump-title">Notice Board</h2>
                    <nav class="bradcaump-inner">
                        <a class="breadcrumb-item" href="index.php">Home</a>
                        <span class="brd-separetor"><i class="icon ion-ios-arrow-right"></i></span>
                        <span class="breadcrumb-item active">Notice Board</span>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- End Bradcaump area -->
<!-- Start Courses Grid Area -->
<section class="htc__courses__grid bg__white ptb--80">
<div class="container">
    <!-- Start Tab Menu -->
    <?php 
    $getCourses=$notice->getNoticeById($noticeid);
    if ($getCourses) {
   while ($result=$getCourses->fetch_assoc()) {
   
?>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <div class="courses__tab__wrap">
                <div class="courses__grid__inner">
                    <!-- Start Tab -->
                    <div class="view-mode-wrap" >
                        <ul class="view-mode" role="tablist">
                        </ul>
                        <span class="show__result text-center">
                            <?php 
                                echo($result['title']);
                            ?>
                        </span>
                    </div>
                    <!-- Start Tab -->
                   
                </div>
            </div>
        </div>
    </div>
    <!-- End Tab Menu -->
    <!-- Start Tab Content -->
    <div class="row">
        
        <div class="col-md-9 col-lg-9 col-sm-12 col-xs-12">
            <div class="courses__content__wrap mt--20 list__view__page">
                <!-- Start Single Content -->
                <div role="tabpanel" class="single__grid__view clearfix tab-pane fade in active" id="grid-view">
                    <div class="row">
                        <!-- Start Single Courses -->
                        
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <div class="courses">
                                
                                <div class="courses__details">
                                    <div class="courses__details__inner">
                                        <p class="text-justify">
                                            <?php echo($result['description']); ?>
                                                
                                            </p>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <?php }}else{ ?>
                        <div class="col-md-9 col-lg-9 col-sm-6 col-xs-12">
                            <h2 class="text-center"><span > Course related data not found. </span></h2>
                        </div>
                        <?php } ?>
                        <!-- End Single Courses -->
                       
                    </div>
                </div>
                <!-- End Single Content -->
                
            </div>
        </div>
        
<?php include("inc/noticebar.php"); ?>
       
    </div>
    <!-- End Tab Content -->
</div>
</section>
<!-- End Courses Grid Area -->
<!-- Start Footer Area -->
<?php include("inc/footer.php"); ?>
