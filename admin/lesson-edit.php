<?php 
include 'inc/header.php';
include_once'../classes/Course.php';
include_once'../classes/Lesson.php';
$course= new Course();
$lesson= new Lesson();

?>
<?php 
if (!isset($_GET['lessonEdit'])||$_GET['lessonEdit']==NULL ||$_GET['lessonEdit']!=$_GET['lessonEdit']) {
    echo "<script>window.location = 'manage-course.php';</script>";
}else{
    // $id=$_GET['lessonEdit'];
    $id=preg_replace('/[^-a-zA-Z0-9]/', '', $_GET['lessonEdit']);
}
if ($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['lessonInfo'])) {
    $lesson->updateLessonInfo($_POST,$_FILES,$id);
}

 ?>
        <!-- Header Layout Content -->
        <div class="mdk-header-layout__content">

            <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
                <div class="mdk-drawer-layout__content page ">

                    <div class="container-fluid page__container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                            <li class="breadcrumb-item active">Lessons</li>
                        </ol>
                        <h1 class="h2">Edit Lesson</h1>
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
                            	<?php 
                                $getlesson=$lesson->getLessionById($id);
                                if ($getlesson) {
                                   while ($result=$getlesson->fetch_assoc()) {
                                 ?>
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <label for="title" class="col-md-3 col-form-label form-label">Title</label>
                                        <div class="col-md-6">
                                            <input id="title" type="text" class="form-control" value="<?php echo($result['title']);?>" name="title" required="required">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="course" class="col-md-3 col-form-label form-label">Course</label>
                                        <div class="col-md-4">
                                            <select id="course" class="custom-control custom-select form-control" name="course_id" required="required">
                                               <?php 
                                                $courses=$course->getAllCourses();
                                                if ($courses) {
                                                    while ($re=$courses->fetch_assoc()) {
                                                    	if ($re['id']==$result['course_id']) {
                                                 ?>
                                                  <option value="<?php echo($re['id']);?>" selected="selected"><?php echo($re['title']);?></option>
                                                <?php }else{ ?>
                                                <option value="<?php echo($re['id']);?>" ><?php echo($re['title']);?></option>
                                                <?php }}} ?>
                                               
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label form-label">Upload Video</label>
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="videourl" required="required"/>
                                                        <small class="form-text text-muted d-flex align-items-center">
                                                            <i class="material-icons font-size-16pt mr-1">ondemand_video</i>
                                                            <span class="icon-text">Paste Video Url</span>
                                                        </small>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="embed-responsive embed-responsive-16by9">
						                                    <iframe height="450" src="https://www.youtube.com/embed/<?php echo($result['videourl']);?>" allowfullscreen="allowfullscreen"></iframe>
						                                </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="avatar" class="col-sm-3 col-form-label form-label">Keep Existing PDF File <span style="color: red; font-weight: bold;">OR</span></label>
                                        <div class="col-sm-9">
                                            <div class="media align-items-center">

                                                <div class="media-body">
                                                    <div class="custom-file" style="width: auto;">
                                                        <input type="file" id="avatar" class="custom-file-input" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" name="filepath">
                                                        <label for="avatar" class="custom-file-label">Choose New PDF file</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="title" class="col-md-3 col-form-label form-label">Description</label>
                                        <div class="col-md-9">
                                            <textarea id="mytextarea" name="content"><?php echo($result['content']);?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-sm-9 offset-sm-3">
                                            <button type="submit" class="btn btn-success" name="lessonInfo">Update</button>
                                        </div>
                                    </div>
                                </form>
                                <?php }} ?>
                            </div>
                        </div>
                        
                    </div>

                </div>
<?php include 'inc/sidebar.php';?>
            </div>
        </div>
    </div>
<?php include 'inc/footer.php';?> 
