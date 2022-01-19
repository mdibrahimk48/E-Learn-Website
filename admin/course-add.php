<?php
include 'inc/header.php';
include_once'../classes/adminloging.php';
include_once'../classes/Course.php';
$admin= new adminloging();
$course= new Course();
 ?>
<?php 
if ($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['courseInfo'])) {
    $insertProduct=$course->insertCoursesInfo($_POST,$_FILES);
}

 ?>
 <!-- Header Layout Content -->
        <div class="mdk-header-layout__content">

            <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
                <div class="mdk-drawer-layout__content page ">

                    <div class="container-fluid page__container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="manage-course.php">Course Manager</a></li>
                            <li class="breadcrumb-item active">Add Course</li>
                        </ol>
                        <h1 class="h2">Add Course</h1>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Course Details</h4>
                                <span class="pull-right">
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
                                </span>
                            </div>
                            <div class="card-body">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <label for="course_title" class="col-sm-3 col-form-label form-label">Classes:</label>
                                        <div class="col-sm-9 col-md-4">
                                            <select id="course_title" class="custom-select form-control" name="class" required="required">
                                                <option value="">Select a class</option>
                                                <option value="six">Six</option>
                                                <option value="seven">Seven</option>
                                                <option value="eight">Eight</option>
                                                <option value="nine">Nine</option>
                                                <option value="ten">Ten</option>
                                                <option value="eleven">Eleven</option>
                                                <option value="twelve">Twelve</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="quiz_title" class="col-sm-3 col-form-label form-label">Course Title:</label>
                                        <div class="col-sm-9">
                                            <input id="quiz_title" type="text" class="form-control" placeholder="Title" name="title" required="required">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="cmn-toggle" class="col-sm-3 col-form-label form-label">Course Duration</label>
                                        <div class="col-sm-9">
                                            
                                            <div class="form-inline">
                                                <div class="form-group mr-2">
                                                   <input type="time" name="start" id="teacher-entry-exit-form-exit-input" class="form-control text-center" value="20:56" required="required">
                                                </div>
                                                 &nbsp To &nbsp
                                                <div class="form-group mr-2">
                                                    <input type="time" class="form-control text-center"  value="6" name="end" required="required">
                                                </div>
                                                
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="cmn-toggle" class="col-sm-3 col-form-label form-label">Course Period:</label>
                                        <div class="col-sm-9">
                                            <div class="form-inline">
                                                <div class="form-group mr-2">
                                                    <input type="number" class="form-control text-center" name="period" value="4" style="width:50px;" required="required">
                                                </div>
                                                <div class="form-group">
                                                    <select class="custom-select" name="p_time" required="required">
                                                        <option value="month" selected>Month</option>
                                                        <option value="year">Year</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="course_title" class="col-sm-3 col-form-label form-label">Teachers:</label>
                                        <div class="col-sm-9 col-md-4">
                                            <select id="course_title" class="custom-select form-control" name="teacher_id" required="required">
                                                <option value="">Assign Teacher</option>
                                                <?php 
                                                $getTeachers=$admin->getTeachersInfo();
                                                if ($getTeachers) {
                                                    while ($result=$getTeachers->fetch_assoc()) {
                                                 ?>
                                                <option value="<?php echo($result['id']);?>"><?php echo($result['name']." ( ".$result['subject'])." )";?></option>
                                                <?php }}else{ ?>
                                                <option value="null" selected="selected"><?php echo "None"; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="quiz_title" class="col-sm-3 col-form-label form-label">Students:</label>
                                        <div class="col-sm-9">
                                            <input id="quiz_title" type="number" class="form-control" min="10" max="100" placeholder="Maximum student" name="students" required="required">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="quiz_title" class="col-sm-3 col-form-label form-label">Course Price:</label>
                                        <div class="col-sm-9">
                                            <input id="quiz_title" type="text" class="form-control" placeholder="Course price" name="price" required="required">
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label class="form-label" for="start">Start Date</label>
                                        <input id="start" type="text" class="form-control" name="started_at" placeholder="Start Date" data-toggle="flatpickr" value="01/28/2016" required="required">
                                    </div>
                                    <div class="form-group mb-0">
                                        <label class="form-label">Description</label>
                                        
                                        <textarea class="form-control" rows="5" name="content" required="required"></textarea>
                                    </div>
                                    <div class="form-group row">
                                        <label for="quiz_image" class="col-sm-3 col-form-label form-label">Course Image:</label>
                                        <div class="col-sm-9 col-md-4">
                                            <p><img id="blah" alt="" width="150" class="rounded"></p>
                                            <div class="custom-file">
                                                <input type="file" id="quiz_image" class="custom-file-input" name="image"  onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" required="required">
                                                <label for="quiz_image" class="custom-file-label">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row mb-0">
                                        <div class="col-sm-9 offset-sm-3">
                                            <button type="submit" class="btn btn-success" name="courseInfo">Save</button>
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