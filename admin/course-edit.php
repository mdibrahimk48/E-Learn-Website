<?php
include 'inc/header.php';
include_once'../classes/adminloging.php';
include_once'../classes/Course.php';
$admin= new adminloging();
$course= new Course();
 ?>
<?php 
if (!isset($_GET['courseEdit'])||$_GET['courseEdit']==NULL ||$_GET['courseEdit']!=$_GET['courseEdit']) {
    echo "<script>window.location = 'manage-course.php';</script>";
}else{
    // $id=$_GET['courseEdit'];
    $id=preg_replace('/[^-a-zA-Z0-9]/', '', $_GET['courseEdit']);
}
if ($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['courseInfoUpdate'])) {
    $course->coursesInfoUpdate($_POST,$_FILES,$id);
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
                            <li class="breadcrumb-item active">Edit Course</li>
                        </ol>
                        <h1 class="h2">Edit Course</h1>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Course Update</h4>
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
                                <?php 
                                $getCourse=$course->getCourseById($id);
                                if ($getCourse) {
                                   while ($result=$getCourse->fetch_assoc()) {

                                 ?>
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <input type="hidden" name="id" value="<?php echo($result['id']);?>">
                                        <label for="course_title" class="col-sm-3 col-form-label form-label">Classes:</label>
                                        <div class="col-sm-9 col-md-4">
                                            <select id="course_title" class="custom-select form-control" name="class" required="required">
                                               <?php
                                                 $classes=[
                                                 'six'=>'Six',
                                                 'seven'=>'Seven',
                                                 'eight'=>'Eight',
                                                 'nine'=>'Nine',
                                                 'ten'=>'Ten',
                                                 'eleven'=>'Eleven',
                                                 'twelve'=>'Twelve',
                                                 ];
                                                 foreach ($classes as $key => $class) {
                                                 if($result['class']==$key){
                                                ?>
                                                <option value="<?php echo($key);?>" selected> <?php echo($class);?></option>
                                                <?php }else{ ?>
                                                <option value="<?php echo($key);?>"> <?php echo($class);?></option>

                                                <?php }} ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="quiz_title" class="col-sm-3 col-form-label form-label">Course Title:</label>
                                        <div class="col-sm-9">
                                            <input id="quiz_title" type="text" class="form-control" value="<?php echo($result['title']);?>" name="title" required="required">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="cmn-toggle" class="col-sm-3 col-form-label form-label">Course Duration</label>
                                        <div class="col-sm-9">
                                            
                                            <div class="form-inline">
                                                <div class="form-group mr-2">
                                                    <?php $dration=explode('-',$result['duration']);
                                                    ?>
                                                   <input type="time" name="start" id="teacher-entry-exit-form-exit-input" class="form-control text-center" value="<?php echo($dration[1]);?>" required="required">
                                                
                                                </div>
                                                 &nbsp To &nbsp
                                                <div class="form-group mr-2">
                                                    <input type="time" class="form-control text-center"  value="<?php echo($dration[1]);?>" name="end" required="required">
                                                </div>
                                                
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="cmn-toggle" class="col-sm-3 col-form-label form-label">Course Period:</label>
                                        <div class="col-sm-9">
                                            <div class="form-inline">
                                                <div class="form-group mr-2">
                                                    <?php $priod=explode(' ',$result['period']);?>
                                                    <input type="number" class="form-control text-center" name="period" value="<?php echo($priod[0]);?>" style="width:50px;" required="required">
                                                </div>
                                                <div class="form-group">
                                                    <select class="custom-select" name="p_time" required="required">
                                                         <?php 
                                                         if($priod[1]=='month'){
                                                         ?>
                                                        <option value="month" selected>Month</option>
                                                        <option value="year">Year</option>
                                                        <?php 
                                                         }else{
                                                         ?>
                                                        <option value="year" selected>Year</option>
                                                         <option value="month">Month</option>
                                                         <?php 
                                                         }
                                                         ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="course_title" class="col-sm-3 col-form-label form-label">Teachers:</label>
                                        <div class="col-sm-9 col-md-4">
                                            <select id="course_title" class="custom-select form-control" name="teacher_id" required="required">
                                                 <?php 
                                                $getTeachers=$admin->getTeachersInfo();
                                                if ($getTeachers) {
                                                    while ($re=$getTeachers->fetch_assoc()) {
                                                    if($result['admin_id']==$re['id']){
                                                 ?>
                                                <option value="<?php echo($result['id']);?>" selected="selected"><?php echo($re['name']." ( ".$re['subject'])." )";?></option>
                                                 <?php }else{ ?>
                                                <option value="<?php echo($result['id']);?>"><?php echo($re['name']." ( ".$re['subject'])." )";?></option>
                                                <?php }}}else{ ?>
                                                <option value="null" selected="selected"><?php echo "None"; ?></option>
                                                <?php } ?>
                                               
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="quiz_title" class="col-sm-3 col-form-label form-label">Students:</label>
                                        <div class="col-sm-9">
                                            <input id="quiz_title" type="number" class="form-control" min="10" max="100" placeholder="Maximum student" name="students" value="<?php echo($result['students']);?>" required="required">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="quiz_title" class="col-sm-3 col-form-label form-label">Course Price:</label>
                                        <div class="col-sm-9">
                                            <input id="quiz_title" type="text" class="form-control" placeholder="Course price" name="price" value="<?php echo($result['price']);?>" required="required">
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label class="form-label" for="start">Start Date</label>
                                        <input id="start" type="text" class="form-control" name="started_at" placeholder="Start Date" data-toggle="flatpickr" value="<?php echo($result['started_at']);?>" required="required">
                                    </div>
                                    <div class="form-group ">
                                        <label class="form-label">Description</label>
                                        
                                    <textarea class="form-control" rows="5" name="content" required="required"><?php echo($result['content']);?></textarea>
                                    </div>
                                    <div class="form-group row">
                                        <label for="quiz_image" class="col-sm-3 col-form-label form-label">Course Image:</label>
                                        <div class="col-sm-9 col-md-4">
                                        <label class="form-label">Old Image</label>
                                            <p><img id="blah" src="<?php echo($result['image']);?>" alt="" width="150" class="rounded"></p>
                                            <div class="custom-file">
                                                <input type="file" id="quiz_image" class="custom-file-input" name="image"  onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                                <label for="quiz_image" class="custom-file-label">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row mb-0">
                                        <div class="col-sm-9 offset-sm-3">
                                            <button type="submit" class="btn btn-success" name="courseInfoUpdate">Update</button>
                                        </div>
                                    </div>
                                </form>
                                <?php }}else{echo("catagory not found");} ?>
                            </div>
                        </div>
                        
                    </div>

                </div>
<?php include 'inc/sidebar.php';?>
            </div>
        </div>
    </div>

<?php include 'inc/footer.php';?> 