<?php 
include 'inc/header.php';
include_once'../classes/Notice.php';
$notice= new Notice();

?>
<?php 
if ($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['save'])) {
    $notice->addNotice($_POST);
}

 ?>
        <!-- Header Layout Content -->
        <div class="mdk-header-layout__content">

            <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
                <div class="mdk-drawer-layout__content page ">

                    <div class="container-fluid page__container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="notice-board.php">Notice Board</a></li>
                            <li class="breadcrumb-item active">Notice</li>
                        </ol>
                        <h1 class="h2">Add Notice</h1>
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
                        <div class="card">
                            <div class="card-body">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <label for="title" class="col-md-3 col-form-label form-label">Title</label>
                                        <div class="col-md-9">
                                            <input id="title" type="text" class="form-control" placeholder="Notice title" name="title" required="required">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="title" class="col-md-3 col-form-label form-label">Description</label>
                                        <div class="col-md-9">
                                            <textarea id="mytextarea" name="description"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="title" class="col-md-3 col-form-label form-label">Started_at</label>
                                        <div class="col-md-9">
                                        <input id="start" type="text" class="form-control" name="started_at" placeholder="Start Date" data-toggle="flatpickr" required="required">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-sm-9 offset-sm-3">
                                            <button type="submit" class="btn btn-success" name="save">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                    </div>

                </div>
<?php include 'inc/sidebar.php';?>
            </div>
        </div>
    </div>
<?php include 'inc/footer.php';?> 
