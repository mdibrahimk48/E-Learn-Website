<?php include_once("inc/inc/header.php"); ?>
 <!-- Header Layout Content -->
 <?php 
if (isset($_GET['reid'])) {
    // $id=$_GET['delete'];
    $id=preg_replace('/[^-a-zA-Z0-9]/', '', $_GET['reid']);
   $course->restart($id);
}
?>
  ?>
<div class="mdk-header-layout__content">
<div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
    <div class="mdk-drawer-layout__content page ">
        <div class="container-fluid page__container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item active">My Courses</li>
            </ol>
            <div class="media mb-headings align-items-center">
                <div class="media-body">
                    <h1 class="h2">My Courses</h1>
                </div>
            </div>
            <div class="card-columns">
                  <?php 
                    $getCourses=$course->getStudentCourseList();
                    if ($getCourses) {
                   while ($result=$getCourses->fetch_assoc()) {
                   //var_dump($result);
                   //die();
                ?>
                <div class="card">
                    <div class="card-header">
                        <div class="media">
                            <div class="media-left">
                                <a href="view-course.php?courseID=<?php echo($result['id']);?>">
                                    <img src="admin/<?php echo($result['image']);?>" alt="Card image cap" width="100" class="rounded">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="card-title m-0"><a href="view-course.php?courseID=<?php echo($result['id']);?>"><?php echo($result['title']);?></a></h4>
                                <?php 
                                $status=0;
                                    $lesson=$course->getStudentCourseLessonList($result['id']);
                                    if ($lesson) {
                                   $status=$lesson->fetch_assoc();
                                ?>
                                <small class="text-muted">Lessons: <?php echo($status['complete']); ?> of  <?php echo($status['row']); ?></small>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="progress rounded-0">
                        <div class="progress-bar progress-bar-striped bg-<?php echo $status['row'] != $status['complete'] ? 'primary' : 'success';?>" role="progressbar" style="width: <?php echo(100*($status['complete']/$status['row'])); ?>%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="card-footer bg-white">
                        <a
                        <?php if ($status['row'] == $status['complete']) { ?>
                         <?php echo ' '; ?>
                         <?php }else{?>
                         href="view-course.php?courseID=<?php echo($result['id']);?>" 
                         <?php } ?>
                            class="btn btn-<?php echo $status['row'] != $status['complete'] ? 'primary' : 'success';?> btn-sm"><?php echo $status['row'] != $status['complete']  ? $status['complete']!=0? 'Continue':'Start' : 'Completed';?>  <i class="material-icons btn__icon--right"><?php echo $status['row'] != $status['complete']  ? $status['complete']!=0? 'play_circle_outline':'launch' : 'check';?></i></a>
                        <?php if ($status['row'] == $status['complete']) { ?>
                        <a href="?reid=<?php echo($result['id']);?>" class="btn btn-white btn-sm">Restart <i class="material-icons btn__icon--right">replay</i> </a>
                        <?php } ?>
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
<?php include_once("inc/inc/sidebar.php"); ?>
  </div>
         
    </div>
</div>
<?php include_once("inc/inc/footer.php"); ?>
  