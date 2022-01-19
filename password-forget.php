<?php 
include 'lib/Session.php'; 
Session::init();
include_once 'lib/Database.php';
include_once 'helpers/Format.php'; 
include_once'classes/User.php';

$db=new Database();
$fm=new Format();
$ur=new User();
 ?>
<?php
$login= Session::get("userlogin");
if ($login==true) {
   header("Location:order.php");
}
 ?>
 <?php
    if ($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['login'])) {
     $userLog=$ur->userLogin($_POST);
       }
    if ($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['passwordRecovery'])) {
     $userReg=$ur->passRecovery($_POST);
       }

  ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <title>LearnPLUS | Learning Management System HTML Template</title>
    <link rel="shortcut icon" href="images/img/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/img/apple-touch-icon.png" />
    <link rel="apple-touch-icon" sizes="57x57" href="images/img/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="images/img/xapple-touch-icon-72x72.png.pagespeed.ic.lf5d8kCpOf.png" />
    <link rel="apple-touch-icon" sizes="76x76" href="images/img/xapple-touch-icon-76x76.png.pagespeed.ic.ATZZpSeito.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="images/img/xapple-touch-icon-114x114.png.pagespeed.ic.Fi5O5s2tzL.png" />
    <link rel="apple-touch-icon" sizes="120x120" href="images/img/xapple-touch-icon-120x120.png.pagespeed.ic.uPQH0sygdV.png" />
    <link rel="apple-touch-icon" sizes="144x144" href="images/img/xapple-touch-icon-144x144.png.pagespeed.ic.yZ9-_sm5OF.png" />
    <link rel="apple-touch-icon" sizes="152x152" href="images/img/xapple-touch-icon-152x152.png.pagespeed.ic.gThaVrKtXF.png" />
    <link rel="apple-touch-icon" sizes="180x180" href="images/img/xapple-touch-icon-180x180.png.pagespeed.ic.Q8Pmsj5fQM.png" />
    <link rel="stylesheet" type="text/css" href="css/css/A.settings.css.pagespeed.cf.xeOyGChsgq.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/css/A.fonts%2c%2c_font-awesome-4.3.0%2c%2c_css%2c%2c_font-awesome.min.css%2bcss%2c%2c_bootstrap.css%2bcss%2c%2c_animate.css%2cMcc.kSNwpaaMDX.css.pagespeed.cf.w2G3xGgFf0.css" />
    <link rel="stylesheet" type="text/css" href="css/css/A.menu.css.pagespeed.cf.0_hLwXzYkZ.css">
    <link rel="stylesheet" type="text/css" href="css/css/carousel.css%2bbbpress.css.pagespeed.cc.aXsJ7_Y__m.css" />
    <link rel="stylesheet" type="text/css" href="css/css/A.style.css%2bcss%2c%2c_custom.css%2cMcc.HvWh1qoob-.css.pagespeed.cf.pWH5huNcWh.css" />
  
</head>

<body class="login">
    <div id="loader">
        <div class="loader-container">
            <img src="images/img/site.gif" alt="" class="loader-site">
        </div>
    </div>
    <div id="wrapper">
        <div class="container">
            <div class="row login-wrapper">
                <div class="col-md-6 col-md-offset-3">
                    <div class="logo logo-center">
                        <a href="index.html"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAUEAAAAoCAMAAABXXLglAAAAZlBMVEXjSxH////jSxH////jSxH////jSxH////jSxH////jSxH////jSxH////jSxH////jSxH////jSxH////jSxH////jSxH////jSxH////jSxH////jSxH////jSxH////jSxH///+ej/WgAAAAIHRSTlMAABAQICAwMEBAUFBgYHBwf4CPkJ+gr7C/wM/Q3+Dv8AiED/kAAAXVSURBVGje7ZvpdrI6FIbBGDEixYiIESly/zd5CGTYGcCKscM63/7TVQKUPGRPb2gUGxZBW39cP0/7FTwU/zPboimCm+PtPtp5v/4CQUwI+UdQEdydJL7Rrh/rRwRp13X/A179QqE0JXiO4Gp3+ry7dj1ufjdB1kFrGSsyDMfFAPVcKoaI734MHCJlo+5fpn6Cq/35Pmm34+7PEBTTJwEJJtZfaIhDsM8c9wf2edr9JYJdV6FQBDP35oVBcHN4iE9lltXfIdjVKAxB6rt5qQhuj7f7M3b5WP8VggrhawRT/83zgaA/czyy68fmVxJs2GCt5WuvElQppMwJySuVUHAcHZbgE5ll/QsJKkJpLaeJXycog2CbiKKmVreLDosB3j83TxLkVTdBvhHER5Kp6xKnWkfunZhDqDIW4UsES3GKekQkFnnde/FsATNX2myf82JEhSfUuQURF9JHqgweLxhL1HXDSO+e/E65WAF1NktQzrJ5naD4pdLDubhIZJJnQ+H1sHk2k+StU0n5slydGHMgcdKA6Q1/I2nA6XiGYFzIWYYiCC5OZIhQ1cz2+vUcsn6+mhncoCkpHWN8Zo9UlJY1jDSCYCLBI0kwbXnHUdBqANmgGYIE+l4IgiUcHy1RBNf9Kvy8LiwGHxLkmGoivNngVOiRGPPI1UImtKdaJnCqpO0awZ80cFIzBEkogl0yoyycejzbvi25zDYkq2VdXW68P76uGJgkeLMZnGP/2E3XEnOqra6RY1SrTPtmgjLqtWSaYL8ET6Oy4M8st9NusbKAW7NDz/XjltARx+dujTkk9lRrZAajYppgHiwOYt2G4AmCux7SRqpbjjxzG4SZxQTLofQE1qiFx4a6XlsKoDFnwg7SSr8aD8EmWC5WSYkfyZCP4LHH1P/QirSWCJU4GEWb7RKCyHnwXK00Zj84mAmTCQQOlk54mCRYdjD+v0YQ1YZeASBKgpfBieOh5YUy9dn89bCEYAailfY+7D+504uS2bz4YGocIBqyTRCr1ouEUBaQ1Xer/BbpMHgYCI4tb2Sb8OvzEoIlL93jqZXmjlCQix9clugjZl/MdNHIAumDtLWEM2wQ7OnsJEEY+IawuFdh8bKEYO2spWAEY4egYy0KRDDGpXXnHBDk3fF5FW+d5ButjdS8iCBYGdI6K4G8j6CqPAOo/DGmzYQ+uB/wHA2CvAA8H60aeylBj+mpoKyqfSMhCOouMQRBXiyUralSRzKPcGA2QU9VGJ6g7RshCTZZ0J0mD0TyLMH7QoI5cUzk4qwdt9YKOlowgg2jSeC9OqAz6TQ1EvwY6JyEN7+B4ORm/CBdViRcHKTxvCcEITh2poY2w7vi62roTOZF1YUE04khXs+1achM8gLB1EewUtKwKQFL1ToVBLn78nrwkTizqKJupudVOXrHDxI0h1pwkHrWo7wIVjN8z3Me4WlRX8wMcXe+3/sRglLytmv1ThZd1HOCRfAoKpVoNbNvctstUxZyp7+FTpz8PMHSEwgrqAjmxp6VevmQ4EXEON6BHG4T2upSbQaborRF0D3y7QRTe3deh7nGWJCefRIZB68iz8oPB0+mN1+Ou9UL6hazRMDpNYianyCodoOlWK73bjLzBPURifoGBEWqLeYSNfwCc73d7g+Hw267XX3lC8w5gsRRpVDij4Nl926Cdn+ZmF8kMEpIVqiKubGBdWXWJ+VcFZ+VqAfXHoJeW0ZwAFPAMF03KoYD7ZXvY7dvJmgbMSLhVFM92XVj+d2MLFXeRHDQJysM+7hcvVu594C5fJSxHyHoR9hm5gxcy2xl4UWCHjMegNE8o0UNO/5h3nUh9zozWPp8J0Eo4ysXhiEalROEI1UODuXMuwjGyHzCAvmkX74TX+jg860EY2I5akut5Gef0DGs9cFRAry+kSD/hFaBKqDCn6lEmLk7H99I0PjIt2O5p3hICn2CmgQkeHuF4FeMZJRS4myQ4NR7+CcMj484/V8JiAwPC756+g/dEzbzIUydegAAAABJRU5ErkJggg==" alt=""></a>
                    </div>
                    <div class="panel panel-login">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-6">
                                    <a href="#" class="active" id="login-form-link">Recover Password</a>
                                </div>
                                <div class="col-xs-6">
                                    <a href="#" id="register-form-link">Login</a>
                                </div>
                                <div class="col-xs-12">
                                <?php if(isset($_SESSION['error'])) {?>
                                  <div class="alert alert-warning alert-dismissible" data-auto-dismiss="2000" role="alert">
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
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form id="login-form" action="" method="post" role="form" style="display: block;">
                                        <div class="form-group">
                                            <input type="email" name="email" id="username" tabindex="1" class="form-control" placeholder="Enter your email" required="required">
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <button type="submit" class="form-control btn btn-default" name="passwordRecovery">Recover</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <form id="register-form" action="" method="post" role="form" style="display: none;">
                                       <div class="form-group">
                                            <input type="text" name="student_id" id="username" tabindex="1" class="form-control" placeholder="Enter your ID" required="required">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" required="required">
                                        </div>
                                        <div class="form-group text-center">
                                            <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                                            <label for="remember"> &nbsp; Remember Me</label>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <button type="submit" class="form-control btn btn-default" name="login">Login Account</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="text-center">
                                                        <a href="login.php" tabindex="5" class="forgot-password">Registration?</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/js/jquery.min.js.pagespeed.jm.iDyG3vc4gw.js"></script>
    <script src="js/js/bootstrap.min.js%2bretina.js%2bwow.js.pagespeed.jc.pMrMbVAe_E.js"></script>
   
    <script>
    eval(mod_pagespeed_gFRwwUbyVc);
    </script>
    <script>
    eval(mod_pagespeed_rQwXk4AOUN);
    </script>
    <script>
    eval(mod_pagespeed_U0OPgGhapl);
    </script>
    <script src="js/js/carousel.js%2bcustom.js.pagespeed.jc.nVhk-UfDsv.js"></script>
    <script>
    eval(mod_pagespeed_6Ja02QZq$f);
    </script>
    <script>
    eval(mod_pagespeed_KxQMf5X6rF);
    </script>
</body>
<!-- Mirrored from templatevisual.com/demo/learnplus/course-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 03 Nov 2019 17:40:14 GMT -->

</html>