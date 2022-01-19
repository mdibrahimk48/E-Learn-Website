<?php 
include 'inc/header.php';
include_once'../classes/Lesson.php';
$lesson= new Lesson();
if (isset($_GET['lessonDelete'])) {
    // $id=$_GET['delete'];
    $id=preg_replace('/[^-a-zA-Z0-9]/', '', $_GET['lessonDelete']);
    $lesson->delLessonById($id);
}
?>

<!-- Header Layout Content -->
        <div class="mdk-header-layout__content">

            <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
                <div class="mdk-drawer-layout__content page ">

                    <div class="container-fluid page__container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Lessons</h4>
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
                                    <div class="card-body">
                                        <p><a href="lesson-add.php" class="btn btn-primary">Add Lesson <i class="material-icons">add</i></a></p>
                                        <div class="nestable" id="nestable-handles-primary">
                                            <ul class="nestable-list">
                                              <?php 
                                                $getLessons=$lesson->getAllLesson();
                                                if ($getLessons) {
                                                   while ($result=$getLessons->fetch_assoc()) {
                                               ?>
                                                <li class="nestable-item nestable-item-handle" data-id="2">
                                                    <div class="nestable-handle"><i class="material-icons">menu</i></div>
                                                    <div class="nestable-content">
                                                        <div class="media align-items-center">
                                                            <div class="media-left">
                                                                <img src="<?php echo($result['image']);?>" alt="" width="100" class="rounded">
                                                            </div>
                                                            <div class="media-body">
                                                                <h5 class="card-title h6 mb-0">
                                                                    <a href="instructor-lesson-add.html"><?php echo($result['title']);?></a>
                                                                </h5>
                                                                <small class="text-muted">Subject: <?php echo($result['name']);?>  created <?php echo(get_timeago(strtotime($result['created_at']))); ?> </small>
                                                            </div>
                                                            <div class="media-right">
                                                                <a href="lesson-edit.php?lessonEdit=<?php echo($result['id']);?>" class="btn btn-white btn-sm"><i class="material-icons">edit</i></a><br>
                                                                <a onclick="return confirm('are you sure delect course!')" href="?lessonDelete=<?php echo($result['id']) ;?>" class="btn btn-white btn-sm"><i class="material-icons">delete</i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <?php }} ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                               <?php
                            function get_timeago( $ptime )
                            {
                                //diffForHumans()
                                $estimate_time = time() - $ptime;

                                if( $estimate_time < 1 )
                                {
                                    return 'less than 1 second ago';
                                }

                                $condition = array(
                                            12 * 30 * 24 * 60 * 60  =>  'year',
                                            30 * 24 * 60 * 60       =>  'month',
                                            24 * 60 * 60            =>  'day',
                                            60 * 60                 =>  'hour',
                                            60                      =>  'minute',
                                            1                       =>  'second'
                                );

                                foreach( $condition as $secs => $str )
                                {
                                    $d = $estimate_time / $secs;

                                    if( $d >= 1 )
                                    {
                                        $r = round( $d );
                                        return 'about ' . $r . ' ' . $str . ( $r > 1 ? 's' : '' ) . ' ago';
                                    }
                                }
                            }
                            ?>
                          
                        </div>
                    </div>
                </div>
<?php include 'inc/sidebar.php';?>
            </div>
        </div>
    </div>

<?php include 'inc/footer.php';?> 



