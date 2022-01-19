<?php include("inc/header-top.php"); ?>
            <!-- Start Mainmenu Area -->
<?php include("inc/header-nav.php"); ?>
            <!-- End Mainmenu Area -->
            <!-- Mobile-menu-area start -->
<?php //include("inc/mobile-nav.php"); ?>
            <!-- Mobile-menu-area End -->
        </div>
        <!-- End Header Style -->
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" data--black__overlay="4" style="background: rgba(0, 0, 0, 0) url(images/bg/4.jpg) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner text-center">
                                <h2 class="bradcaump-title">Courses List</h2>
                                <nav class="bradcaump-inner">
                                    <a class="breadcrumb-item" href="index.php">Home</a>
                                    <span class="brd-separetor"><i class="icon ion-ios-arrow-right"></i></span>
                                    <span class="breadcrumb-item active">Courses List</span>
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
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="courses__tab__wrap">
                            <div class="courses__grid__inner">
                                <!-- Start Tab -->
                                <div class="view-mode-wrap">
                                    <ul class="view-mode" role="tablist">
                                        <li role="presentation" class="grid-view active"><a href="#grid-view" role="tab" data-toggle="tab"><i class="icon ion-grid"></i></a></li>
                                    </ul>
                                    <span class="show__result">Showing 12- of results</span>
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
                                    <?php 
                                        $getCourses=$course->getCourseList();
                                        if ($getCourses) {
                                       while ($result=$getCourses->fetch_assoc()) {
                                       //var_dump($result);
                                       //die();
                                    ?>
                                    <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                                        <div class="courses">
                                            <div class="courses__thumb">
                                                <a href="courses-details.php?courseID=<?php echo(urlencode(base64_encode($result['id'])));?>"><img src="admin/<?php echo($result['image']);?>" alt="courses images"></a>
                                                <div class="courses__hover__info">
                                                    <div class="courses__hover__action">
                                                        <div class="courses__hover__thumb">
                                                            <img style="border-radius: 50%; height="42" width="42" src="admin/<?php echo($result['img']);?>" alt="small images">
                                                        </div>
                                                        <h4><a ><?php echo($result['name']);?></a></h4> 
                                                        <span class="crs__separator">/</span>
                                                        <p><?php echo($result['subject']);?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="courses__details">
                                                <div class="courses__details__inner">
                                                    <h2><a href="courses-details.php?courseID=<?php echo(urlencode(base64_encode($result['id'])));?>"><?php echo($result['title']);?></a></h2>
                                                    <p><?php echo($result['content']);?></p>
                                                </div>
                                                <ul class="courses__meta">
                                                    <li><i class="icon ion-person-stalker"></i><?php echo($result['students']);?> Students</li>
                                                    <li class="crs__free">TK <?php echo($result['price']);?></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <?php }} ?>
                                    <!-- End Single Courses -->
                                   
                                </div>
                            </div>
                            <!-- End Single Content -->
                            
                        </div>
                    </div>
                    
<?php include("inc/sidebar.php"); ?>
                   
                </div>
                <!-- End Tab Content -->
                <!-- Start Pagenation Area 
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <ul class="htc-pagination clearfix">
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#"><i class="icon ion-ios-arrow-right"></i></a></li>
                        </ul>
                    </div>
                </div>-->
                <!-- End Pagenation Area -->
            </div>
        </section>
        <!-- End Courses Grid Area -->
        <!-- Start Footer Area -->
<?php include("inc/footer.php"); ?>