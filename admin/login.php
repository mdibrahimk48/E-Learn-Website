<?php include '../classes/adminloging.php'; ?>
<?php
 $admin=new adminloging();
if ($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['login'])) {
     $userLog=$admin->adminLogin($_POST);
 }
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<!-- Mirrored from learnplus-bootstrap.frontendmatter.com/guest-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 24 Oct 2019 13:30:40 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- Prevent the demo from appearing in search engines (REMOVE THIS) -->
    <meta name="robots" content="noindex">
    <!-- Perfect Scrollbar -->
    <link type="text/css" href="assets/vendor/perfect-scrollbar.css" rel="stylesheet">
    <!-- Material Design Icons -->
    <link type="text/css" href="assets/css/material-icons.css" rel="stylesheet">
    <link type="text/css" href="assets/css/material-icons.rtl.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link type="text/css" href="assets/css/fontawesome.css" rel="stylesheet">
    <link type="text/css" href="assets/css/fontawesome.rtl.css" rel="stylesheet">
    <!-- App CSS -->
    <link type="text/css" href="assets/css/app.css" rel="stylesheet">
    <link type="text/css" href="assets/css/app.rtl.css" rel="stylesheet">
</head>

<body class="login">
    <div class="d-flex align-items-center" style="min-height: 100vh">
        <div class="col-sm-8 col-md-6 col-lg-4 mx-auto" style="min-width: 300px;">
            <div class="text-center mt-5 mb-1">
                <div class="avatar avatar-lg">
                    <img src="assets/images/logo/primary.svg" class="avatar-img rounded-circle" alt="LearnPlus" />
                </div>
            </div>
            <div class="d-flex justify-content-center mb-5 navbar-light">
                <a href="student-dashboard.html" class="navbar-brand m-0">LearnPlus</a>
            </div>
            <div class="card navbar-shadow">
                <div class="card-header text-center">
                    <h4 class="card-title">Login</h4>
                    <p class="card-subtitle">Access your account</p>
                </div>
                <div class="card-body">
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
                    <form action=""  method="post">
                        <div class="input-group input-group-merge">
                            <select class="form-control" id="sel1" name="designation" required="required">
                                <option value="">Select your acceess type</option>
                                <option value="admin">Admin</option>
                                <option value="teacher">Teacher</option>
                            </select>
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <span class="far fa-user"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="email">Your email address:</label>
                            <div class="input-group input-group-merge">
                                <input id="email" type="email"  class="form-control form-control-prepended" name="email" placeholder="Your email address" required="required">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <span class="far fa-envelope"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="password">Your password:</label>
                            <div class="input-group input-group-merge">
                                <input id="password" type="password"  class="form-control form-control-prepended" name="password" placeholder="Your password" required="required">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <span class="far fa-key"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <button type="submit" class="btn btn-primary btn-block" name="login">Login</button>
                        </div>
                        <div class="text-center">
                            <a href="password-forget.php" class="text-black-70" style="text-decoration: underline;">Forgot Password?</a>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center text-black-50">
                    Not yet a student? <a href="signup.php">Sign Up</a>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="assets/vendor/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="assets/vendor/popper.min.js"></script>
    <script src="assets/vendor/bootstrap.min.js"></script>
    <!-- Perfect Scrollbar -->
    <script src="assets/vendor/perfect-scrollbar.min.js"></script>
    <!-- MDK -->
    <script src="assets/vendor/dom-factory.js"></script>
    <script src="assets/vendor/material-design-kit.js"></script>
    <!-- App JS -->
    <script src="assets/js/app.js"></script>
    <!-- Highlight.js -->
    <script src="assets/js/hljs.js"></script>
    <!-- App Settings (safe to remove) -->
    <script src="assets/js/app-settings.js"></script>
</body>
<!-- Mirrored from learnplus-bootstrap.frontendmatter.com/guest-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 24 Oct 2019 13:30:41 GMT -->

</html>