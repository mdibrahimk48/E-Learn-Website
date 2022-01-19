<?php include_once("inc/header-top.php"); ?>
            <!-- Start Mainmenu Area -->
<?php include("inc/header-nav.php"); ?>
            <!-- End Mainmenu Area -->
            <!-- Mobile-menu-area start -->
<?php include("inc/mobile-nav.php"); ?>
        </div>
<?php 
 if ($_SERVER['REQUEST_METHOD']=='POST'&& isset($_POST['sendproblem'])) {
        $addcontact=$ur->contactUs($_POST);
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
                                <h2 class="bradcaump-title">contact</h2>
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.html">Home</a>
                                  <span class="brd-separetor"><i class="icon ion-ios-arrow-right"></i></span>
                                  <span class="breadcrumb-item active">contact</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start Contact Area -->
        <section class="htc__contact__area ptb--80 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="contact__wrap">
                            <h2 class="title__style--2">Contact Info</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                            <div class="htc__contact__inner">
                                <!-- Start Single Address -->
                                <div class="contact__address">
                                    <div class="cont__icon">
                                        <i class="icon ion-ios-location"></i>
                                        <span>address</span>
                                    </div>
                                    <p>11st Floor New World Tower Miami</p>
                                </div>
                                <!-- End Single Address -->
                                <!-- Start Single Address -->
                                <div class="contact__address">
                                    <div class="cont__icon">
                                        <i class="icon ion-android-call"></i>
                                        <span>phone</span>
                                    </div>
                                    <p><a href="tel:+00123456789">(801) 2345 - 6789</a></p>
                                </div>
                                <!-- End Single Address -->
                                <!-- Start Single Address -->
                                <div class="contact__address">
                                    <div class="cont__icon">
                                        <i class="icon ion-android-mail"></i>
                                        <span>Email</span>
                                    </div>
                                    <p><a href="mailto:www.yourmail.com">support@yourmail.com</a></p>
                                </div>
                                <!-- End Single Address -->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 sm-mt-40 xs-mt-40">
                        <div class="htc__contact__form__wrap">
                            <h2 class="contact__title">Send A Message</h2>
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
                            <div class="contact-form-wrap">
                                <form  action="" method="post">
                                    <div class="single-contact-form name">
                                        <div class="contact-box name_email">
                                            <input type="text" name="name" placeholder="Your Name*" name="name">
                                            <input type="email" name="email" placeholder="Your Email *" name="email">
                                        </div>
                                    </div>
                                    <div class="single-contact-form">
                                        <div class="contact-box subject">
                                            <input type="text" name="subject" placeholder="Subject*" name="subject">
                                        </div>
                                    </div>
                                    <div class="single-contact-form">
                                        <div class="contact-box message">
                                            <textarea name="message"  placeholder="Message"></textarea>
                                        </div>
                                    </div>
                                    <div class="contact-btn">
                                        <button type="submit" class="htc__btn btn--theme" name="sendproblem">Submit</button>
                                    </div>
                                </form>
                            </div>
                            <div class="form-output">
                                <p class="form-messege"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Contact Area -->
 
<?php include("inc/footer.php"); ?>
