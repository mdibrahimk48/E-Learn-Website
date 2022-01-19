<?php 
include '../lib/Session.php';
Session::checkLogin();
?>
<?php include '../classes/User.php';?>
<?php 
$ur=new User();
?>
<!DOCTYPE html>
<html>
<!-- Mirrored from colorlib.com/polygon/adminator/signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 16 Oct 2019 01:51:16 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <title>Sign In</title>
    <style>#loader{transition:all .3s ease-in-out;opacity:1;visibility:visible;position:fixed;height:100vh;width:100%;background:#fff;z-index:90000}#loader.fadeOut{opacity:0;visibility:hidden}.spinner{width:40px;height:40px;position:absolute;top:calc(50% - 20px);left:calc(50% - 20px);background-color:#333;border-radius:100%;-webkit-animation:sk-scaleout 1s infinite ease-in-out;animation:sk-scaleout 1s infinite ease-in-out}@-webkit-keyframes sk-scaleout{0%{-webkit-transform:scale(0)}100%{-webkit-transform:scale(1);opacity:0}}@keyframes sk-scaleout{0%{-webkit-transform:scale(0);transform:scale(0)}100%{-webkit-transform:scale(1);transform:scale(1);opacity:0}}</style>
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="app">
    <div id="loader">
        <div class="spinner"></div>
    </div>
    <script type="e52c4ca98ca1cd1c43801a11-text/javascript">
    window.addEventListener('load', () => {
        const loader = document.getElementById('loader');
        setTimeout(() => {
            loader.classList.add('fadeOut');
        }, 300);
    });
    </script>
    <div class="peers ai-s fxw-nw h-100vh">
        <div class="d-n@sm- peer peer-greed h-100 pos-r bgr-n bgpX-c bgpY-c bgsz-cv" style="background-image:url(assets/static/images/bg.jpg)">
            <div class="pos-a centerXY">
                <div class="bgc-white bdrs-50p pos-r" style="width:120px;height:120px">
                    <script type="text/javascript" style="display:none">
                    //<![CDATA[
                    window.__mirage2 = { petok: "c66f3374e4bcf172936d065c3ac00a009b0a9beb-1571190668-86400" };
                    //]]>
                    </script>
                    <script type="text/javascript" src="js/mirage2.min.js"></script>
                    <img class="pos-a centerXY" data-cfsrc="assets/static/images/logo.png" alt="" style="display:none;visibility:hidden;"><noscript><img class="pos-a centerXY" src="assets/static/images/logo.png" alt=""></noscript>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 peer pX-40 pY-80 h-100 bgc-white scrollable pos-r" style="min-width:320px">
            <h4 class="fw-300 c-grey-900 mB-40">Password Recovery</h4>
            <?php 
          if ($_SERVER['REQUEST_METHOD']=='POST') {
             
              $passrecover=$ur->passRecovery($_POST);
          }
           ?>
        <?php if(isset($passrecover) && $passrecover!='success') {?>
              <div class="alert alert-warning alert-dismissible" data-auto-dismiss="2000" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <strong style="color: red;">Warning!</strong> <?php echo($passrecover);?>
              </div>
            <?php }?>
            <?php if(isset($passrecover)&& $passrecover=='success') {?>
            <div class="alert alert-success alert-dismissible" data-auto-dismiss="2000" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong style="color: green;">Success!</strong> <?php echo('Message has been sent to your mail.Please check mail to login');?>
              </div>
            <?php }?>
            <form action="" method="post">
                <div class="form-group">
                    <label class="text-normal text-dark">
                    Username
                </label>
                <input type="email" class="form-control" name="email" placeholder="admin@gmail.com">
            </div>
                <div class="form-group">
                    <div class="peers ai-c jc-sb fxw-nw">
                        <div class="peer">
                            <div class="checkbox checkbox-circle checkbox-info peers ai-c">
                                <label for="inputCall1" class="peers peer-greed js-sb ai-c">
                                    <a href="login.php" class="peer peer-greed">LogIn</a>
                                </label>
                            </div>
                        </div>
                        <div class="peer"><button class="btn btn-primary">Send Mail</button></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script type="e52c4ca98ca1cd1c43801a11-text/javascript" src="js/vendor.js"></script>
    <script type="e52c4ca98ca1cd1c43801a11-text/javascript" src="js/bundle.js"></script>
    <script src="js/rocket-loader.min.js" data-cf-settings="e52c4ca98ca1cd1c43801a11-|49" defer=""></script>
</body>
<!-- Mirrored from colorlib.com/polygon/adminator/signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 16 Oct 2019 01:51:16 GMT -->

</html>