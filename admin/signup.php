<?php include '../classes/adminloging.php'; ?>
<?php
 $admin=new adminloging();
if ($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['registration'])) {
     $userLog=$admin->adminRegtration($_POST);
 }
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<!-- Mirrored from learnplus-bootstrap.frontendmatter.com/guest-signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 24 Oct 2019 13:31:19 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Signup</title>
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
                    <h4 class="card-title">Sign Up</h4>
                    <p class="card-subtitle">Create a new account</p>
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
                    <form action="" method="post">
                        <div class="form-group">
                            <label class="form-label" for="name">Name:</label>
                            <div class="input-group input-group-merge">
                                <input id="name" type="text"  class="form-control form-control-prepended" name="name" placeholder="Your name" required="required">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <span class="far fa-user"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="name">Mobile:</label>
                            <div class="input-group input-group-merge">
                                <input id="name" type="tel"  class="form-control form-control-prepended" name="mobile" placeholder="Your mobile" required="required">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <span class="far fa-user"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="name">Designation:</label>
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
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="name">Gender:</label>
                            <div class="input-group input-group-merge">
                                <select class="form-control" id="sel1" name="gender" required="required">
                                    <option value="">Select your gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <span class="fa fa-venus"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="email">Email address:</label>
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
                            <label class="form-label" for="password">Password:</label>
                            <div class="input-group input-group-merge">
                                <input id="password" type="password"  class="form-control form-control-prepended" name="password" placeholder="Choose a password" required="required">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <span class="far fa-key"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="password2">Password:</label>
                            <div class="input-group input-group-merge">
                                <input id="password2" type="password"  class="form-control form-control-prepended" name="confirm-password" placeholder="Confirm password" required="required">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <span class="far fa-key"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="form-label" for="name">Address:</label>
                            <div class="input-group input-group-merge">
                                <textarea class="form-control" rows="5" id="comment" name="address" required="required"></textarea>
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <span class="far fa-address-book"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block mb-3" name="registration">Sign Up</button>
                        <div class="form-group text-center mb-0">
                            <div class="custom-control custom-checkbox">
                                <input id="terms" type="checkbox" class="custom-control-input" checked >
                                <label for="terms" class="custom-control-label text-black-70">I agree to the <a href="#" class="text-black-70" style="text-decoration: underline;">Terms of Use</a></label>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center text-black-50">Already signed up? <a href="login.php">Login</a></div>
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
<!-- Mirrored from learnplus-bootstrap.frontendmatter.com/guest-signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 24 Oct 2019 13:31:19 GMT -->

</html>