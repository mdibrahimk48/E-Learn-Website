<?php
include 'inc/header.php';
include_once'../classes/adminloging.php';
include_once'../classes/Course.php';
$admin= new adminloging();
$course= new Course();
 ?>
  <?php
        
if (isset($_GET['courseDelete'])) {
    // $id=$_GET['delete'];
    $id=preg_replace('/[^-a-zA-Z0-9]/', '', $_GET['courseDelete']);
    $course->delCourseById($id);
}
?>
<!-- Header Layout Content -->
        <div class="mdk-header-layout__content">

            <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
                <div class="mdk-drawer-layout__content page ">

                    <div class="container-fluid page__container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                            <li class="breadcrumb-item active">Courses</li>
                        </ol>

                        <div class="d-flex flex-column flex-sm-row flex-wrap mb-headings align-items-start align-items-sm-center">
                            <div class="flex mb-2 mb-sm-0">
                                <h1 class="h2">Manage Courses</h1>
                            </div>
                            <a href="course-add.php" class="btn btn-success">Add course</a>
                        </div>
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
                       
                        <div class="row">
                             <?php 
                        $getCourses=$course->getAllCourses();
                        if ($getCourses) {
                           while ($result=$getCourses->fetch_assoc()) {
                         
                         ?>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="d-flex flex-column flex-sm-row">
                                            <a href="course-edit.php?courseEdit=<?php echo($result['id']);?>" class="avatar avatar-lg avatar-4by3 mb-3 w-xs-plus-down-100 mr-sm-3">
                                                <img src="<?php echo($result['image']);?>" alt="Card image cap" class="avatar-img rounded">
                                            </a>
                                            <div class="flex" style="min-width: 200px;">
                                                <!-- <h5 class="card-title text-base m-0"><a href="instructor-course-edit.html"><strong>Learn Vue.js</strong></a></h5> -->
                                                <h4 class="card-title mb-1"><a href="course-edit.php?courseEdit=<?php echo($result['id']);?>"><?php echo($result['title']);?></a></h4>
                                                <p class="text-black-70"><?php echo($result['content']);?></p>
                                                <div class="d-flex align-items-end">
                                                    <div class="d-flex flex flex-column mr-3">
                                                        <div class="d-flex align-items-center py-1 border-bottom">
                                                            <small class="text-black-70 mr-2">TK <?php echo($result['price']);?></small> &nbsp
                                                            <small class="text-black-70 mr-2"> Class: <?php echo($result['class']);?></small>&nbsp
                                                            <small class="text-black-50">34 SALES</small>
                                                        </div>
                                                        <div class="d-flex align-items-center py-1">
                                                            <small class="text-black-50">Teacher: </small> &nbsp
                                                            <small class="text-black-50">Students: <?php echo($result['students']);?></small>
                                                        </div>
                                                    </div>
                                                    <div class="text-center">
                                                        <a href="course-edit.php?courseEdit=<?php echo($result['id']);?>" class="btn btn-sm btn-white">Edit</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="card__options dropdown right-0 pr-2">
                                        <a href="#" class="dropdown-toggle text-muted" data-caret="false" data-toggle="dropdown">
                                            <i class="material-icons">more_vert</i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="course-edit.php?courseEdit=<?php echo($result['id']);?>">Edit course</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item text-danger" onclick="return confirm('are you sure delect course!')" href="?courseDelete=<?php echo($result['id']) ;?>">Delete course</a>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <?php }} ?>
                        </div>

                        <!-- Pagination 
                        <ul class="pagination justify-content-center pagination-sm">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true" class="material-icons">chevron_left</span>
                                    <span>Prev</span>
                                </a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link" href="#" aria-label="1">
                                    <span>1</span>
                                </a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="1">
                                    <span>2</span>
                                </a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span>Next</span>
                                    <span aria-hidden="true" class="material-icons">chevron_right</span>
                                </a>
                            </li>
                        </ul>-->
                    </div>

                </div>
<?php include 'inc/sidebar.php';?>
                
            </div>
        </div>
    </div>
<?php include 'inc/footer.php';?> 
