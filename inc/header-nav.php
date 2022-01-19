<?php 
include_once 'classes/Cart.php';
$ct=new Cart(); 

 ?>
<div id="sticky-header-with-topbar" class="mainmenu__area bg__white hidden-xs hidden-sm sticky__header">
    <div class="container">
        <div class="row">
            <div class="mainmenu__wrap clearfix">
                <div class="col-md-2 col-lg-2 col-sm-12">
                    <div class="logo">
                        <a href="index.php">
                            <img src="images/logo/larn.png" alt="logo">
                        </a>
                    </div>
                </div>
                <!-- Start MAinmenu Ares -->
                <div class="col-md-10 col-lg-10 col-sm-12">
                    <nav class="mainmenu__nav">
                        <ul class="main__menu">
                            <li > <a href="index.php">Home</a></li>
                            <li class="drop">
                                <a href="course-list.php">Courses</a>
                                <ul class="dropdown">
                                    <li><a href="course-list.php">courses list</a></li>
                                </ul>
                            </li>
                            <li class="drop"><a href="#">Pages</a>
                                <ul class="dropdown">
                                    <li><a href="contact.php">Contact</a></li>
                                    <li><a href="about.php">about</a></li>
                                </ul>
                            </li>
                            <li><a href="question-list.php">Questions</a></li>
                            <?php 
                            $getData=$ct->checkCartTable();
                                if ($getData) {
                             ?>
                            <li>
                                <a href="cart.php"><i style="font-size: 20px;" class="icon ion-ios-cart">
                                    <span style="left: 20px;">
                                    <?php 
                                        $getData=$cart->checkCartTable();
                                        if ($getData) {
                                           $qty=session::get("qty");
                                        echo($qty);
                                        }else{
                                          echo("");
                                        }
                                     ?>
                                    </span></i>
                                </a>
                        </li>
                        <?php } ?>
                        </ul>
                        <!-- Start Cart Search -->
                        <div class="cart__search">
                            <ul class="cart__search__list">
                                <li class="search search__open"><a href="#"><i class="icon ion-ios-search-strong"></i></a></li>
                            </ul>
                        </div>
                        <!-- End Cart Search -->
                    </nav>
                </div>
                <!-- End MAinmenu Ares -->
            </div>
        </div>
    </div>
    <!-- Start Search Popap -->
    <div class="search__area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="search__inner">
                        <form action="search.php" method="post">
                            <input placeholder="Search here... " type="text" name="search">
                            <button type="submit"></button>
                        </form>
                        <div class="search__close__btn">
                            <span class="search__close__btn_icon"><i class="icon ion-android-close"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Search Popap -->
</div>