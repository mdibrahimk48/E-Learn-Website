<?php
include 'inc/header.php';
include_once'../classes/adminloging.php';
include_once'../classes/Course.php';
$admin= new adminloging();
$course= new Course();
 ?>
<?php 
if ($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['changeAccount'])) {
    $admin->changeUserAccount($_POST,$_FILES);
}
if ($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['changePassword'])) {
    $admin->changePassword($_POST);
}
 ?>

<!-- Header Layout Content -->
<div class="mdk-header-layout__content">

  <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
      <div class="mdk-drawer-layout__content page ">

          <div class="container-fluid page__container">
              <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                  <li class="breadcrumb-item active">Edit Profile</li>
              </ol>
              <h1 class="h2">Edit Profile</h1>
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
              <div class="card">
                  <ul class="nav nav-tabs nav-tabs-card">
                      <li class="nav-item">
                          <a class="nav-link active" href="#first" data-toggle="tab">Account</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="#second" data-toggle="tab">Password</a>
                      </li>
                  </ul>
                  <div class="tab-content card-body">
                      <div class="tab-pane active" id="first">
                        <form action="" class="form-horizontal" method="post" enctype="multipart/form-data">
                              <div class="form-group row">
                                  <label for="avatar" class="col-sm-3 col-form-label form-label">Avatar (optional)</label>
                                  <div class="col-sm-9">
                                      <div class="media align-items-center">
                                          <div class="media-left">
                                              <div class="icon-block rounded">
                                                <img id="blah" alt="" width="120" height="80" class="rounded" title="preview image">
                                              </div>
                                          </div>
                                          <div class="media-body">
                                              <div class="custom-file" style="width: auto;">
                                                  <input type="file" id="avatar" class="custom-file-input" name="image" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                                  <label for="avatar" class="custom-file-label">Choose file</label>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label for="name" class="col-sm-3 col-form-label form-label">Full Name</label>
                                  <div class="col-sm-8">
                                      <div class="row">
                                          <div class="col-md-9">
                                              <input id="name" type="text" class="form-control" placeholder="Enter Name" name="name">
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label for="email" class="col-sm-3 col-form-label form-label">Email (optional)</label>
                                  <div class="col-sm-6 col-md-6">
                                      <div class="input-group">
                                          <div class="input-group-prepend">
                                              <div class="input-group-text">
                                                  <i class="material-icons md-18 text-muted">mail</i>
                                              </div>
                                          </div>
                                          <input type="email" id="email" class="form-control" placeholder="Email Address" name="email">
                                      </div>
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label for="email" class="col-sm-3 col-form-label form-label">Mobile</label>
                                  <div class="col-sm-6 col-md-6">
                                      <div class="input-group">
                                          <div class="input-group-prepend">
                                              <div class="input-group-text">
                                                  <i class="material-icons md-18 text-muted">phone</i>
                                              </div>
                                          </div>
                                          <input type="tel" id="email" class="form-control" placeholder="Mobile Number" name="mobile">
                                      </div>
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <div class="col-sm-8 offset-sm-3">
                                      <div class="media align-items-center">
                                          <div class="media-left">
                                              <button type="submit" class="btn btn-success" name="changeAccount">Save Changes</button>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </form>
                      </div>

                      <div class="tab-pane" id="second">
                          <form action="" class="form-horizontal" method="POST">
                               <div class="form-group row">
                                  <label for="email" class="col-sm-3 col-form-label form-label">Old Password</label>
                                  <div class="col-sm-6 col-md-6">
                                      <div class="input-group">
                                          <div class="input-group-prepend">
                                              <div class="input-group-text">
                                                  <i class="material-icons md-18 text-muted">lock</i>
                                              </div>
                                          </div>
                                          <input type="password" id="email" class="form-control" placeholder="Old Password" name="old-pass">
                                      </div>
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label for="email" class="col-sm-3 col-form-label form-label">New Password</label>
                                  <div class="col-sm-6 col-md-6">
                                      <div class="input-group">
                                          <div class="input-group-prepend">
                                              <div class="input-group-text">
                                                  <i class="material-icons md-18 text-muted">lock</i>
                                              </div>
                                          </div>
                                          <input type="password" id="email" class="form-control" placeholder="New Password" name="new-pass">
                                      </div>
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <div class="col-sm-6 col-md-4 offset-sm-3">
                                    <button type="submit" class="btn btn-success" name="changePassword"> Update Password</button>
                                  </div>
                              </div>
                          </form>
                          
                      </div>
                  </div>
              </div>
          </div>

      </div>

<?php include 'inc/sidebar.php';?>
            </div>
        </div>
    </div>

<?php include 'inc/footer.php';?> 