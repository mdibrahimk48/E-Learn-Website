 <footer class="htc__footer__area bg__theme">
            <div class="container">
                <!-- Start Footer Top Area -->
                <div class="htc__footer__top">
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <div class="htc__footer__inner">
                                <div class="footer__logo">
                                    <a href="index.html">
                                        <img src="images/logo/footer.png" alt="footer logo">
                                    </a>
                                </div>
                                <ul class="htc__footer__address">
                                    <li>
                                        <p><i class="icon ion-ios-location"></i> 11st Floor Newt World Tower Miami</p>
                                    </li>
                                    <li><a href="mailto:www.yourmail.com"><i class="icon ion-android-mail"></i> support@yourmail.com</a></li>
                                    <li><a href="tel:+00123456789"><i class="icon ion-android-call"></i> (801) 2345 - 6789</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Footer Top Area -->
                <!-- Start Foooter Menu Area -->
                <div class="htc__footer__container pt--80 pb--70">
                    <div class="row">
                        <div class="col-md-2 col-lg-2 col-sm-3 col-xs-12">
                            <!-- Start Footer Widget -->
                            <div class="footer">
                                <div class="footer__widget">
                                    <h2 class="footer__title">our school</h2>
                                    <ul class="htc__ft__list">
                                        <li><a href="about.php">About Us</a></li>
                                        <li><a href="login.php">Login</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- End Footer Widget -->
                        </div>
                        <div class="col-md-1 col-md-offset-1 col-lg-1 col-lg-offset-1 col-sm-2 col-xs-12 xs-mt-40">
                            <!-- Start Footer Widget -->
                            <div class="footer">
                                <div class="footer__widget">
                                    <h2 class="footer__title">links</h2>
                                    <ul class="htc__ft__list">
                                        <li><a href="#">Events</a></li>
                                        <li><a href="course-list.php">Courses</a></li>
                                        <li><a href="#">Forums</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- End Footer Widget -->
                        </div>
                        <div class="col-md-2 col-md-offset-2 col-lg-2 col-lg-offset-2 col-sm-3 col-xs-12 xs-mt-40">
                            <!-- Start Footer Widget -->
                            <div class="footer">
                                <div class="footer__widget">
                                    <h2 class="footer__title">support</h2>
                                    <ul class="htc__ft__list">
                                        <li><a href="#">Documentation</a></li>
                                        <li><a href="#">Update Status</a></li>
                                        <li><a href="#">Language Packs</a></li>
                                        <li><a href="#">Release Status</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- End Footer Widget -->
                        </div>
                        <div class="col-md-3 col-md-offset-1 col-lg-3 col-lg-offset-1 col-sm-4 col-xs-12 xs-mt-40">
                            <!-- Start Footer Widget -->
                            <div class="footer">
                                <div class="footer__widget">
                                    <h2 class="footer__title">About us</h2>
                                    <p class="footer__details">Subscribe now and receive weekly
                                        newsletter with educational materials,
                                        new courses, interesting posts, popular
                                        books and much more! Subscribe now
                                        and receive weekly newsletter with
                                        educational</p>
                                </div>
                            </div>
                            <!-- End Footer Widget -->
                        </div>
                    </div>
                </div>
                <!-- End Foooter Menu Area -->
                <!-- Start Copyright Area -->
                <div class="htc__copyright__area">
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <div class="copyright__inner">
                                <div class="copyright">
                                    <p>© 2017<a href="#">Kawser</a>
                                        All Right Reserved.</p>
                                </div>
                                <ul class="footer__menu">
                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="#">Help</a></li>
                                    <li><a href="#">Sitemap</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Copyright Area -->
            </div>
        </footer>
        <!-- End Footer Area -->
    </div>
    <!-- Body main wrapper end -->
    <!-- Placed js at the end of the document so the pages load faster -->
    <!-- jquery latest version -->
    <script src="js/vendor/jquery-1.12.0.min.js"></script>
    <!-- Bootstrap framework js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- All js plugins included in this file. -->
    <script src="js/plugins.js"></script>
    <script src="js/slick.min.js"></script>
    <!-- Owl Carousel Min Js. -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- Waypoints Min Js. -->
    <script src="js/waypoints.min.js"></script>
    <!-- Main js file that contents all jQuery plugins activation. -->
    <script src="js/main.js"></script>
    <style type="text/css">
    #success-alert{
    position: fixed;
    top: 80%; 
    right: 2%;
    width: 70%;
}
#error-alert{
    position: fixed;
    top: 80%; 
    right: 2%;
    width: 70%;
}
</style>
<script type="text/javascript">
    $(document).ready(function() {
        $("#success-alert").hide();
        $("#error-alert").hide();
        if($('#success-alert').is(':hidden'))
        {  
        $("#success-alert").fadeTo(3000, 500).slideUp(500, function() {
          $("#success-alert").slideUp(500);
        });     
        }else{
           $("#error-alert").fadeTo(3000, 500).slideUp(500, function() {
          $("#error-alert").slideUp(500);
        });
        }
    
        
      
    });
</script>
</body>
<!-- Mirrored from preview.hasthemes.com/educan/courses-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 03 Nov 2019 17:29:49 GMT -->

</html>