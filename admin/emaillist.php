<?php
include 'inc/header.php';
include_once'../classes/adminloging.php';
include_once'../classes/FAQ.php';
$admin= new adminloging();
$faq= new FAQ();
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

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">All Email List</h4>
                            </div>
                            
                            <div class="nestable" id="nestable">
                                <ul class="list-group list-group-fit nestable-list-plain mb-0">
                                    <?php 
                                $getCmnt=$faq->getAllComments();
                                if ($getCmnt) {
                                  while ($result=$getCmnt->fetch_assoc()) {
                                       
                                 ?>
                                    <li class="list-group-item nestable-item">
                                        <div class="media align-items-center">
                                            <div class="media-left">
                                                <a href="#" class="btn btn-default nestable-handle"><i class="material-icons">menu</i></a>
                                            </div>
                                            <div class="media-body">
                                                <?php echo($result['subject']); ?>
                                            </div>
                                            <div class="media-right text-right">
                                                <div style="width:100px">
                                                    <a href="view-msg.php?viewid=<?php echo($result['id']); ?>" class="btn btn-primary btn-sm"><i class="material-icons">visibility</i></a>
                                                    <a href="replymsg.php?rmsgid=<?php echo($result['id']); ?>"  class="btn btn-primary btn-sm"><i class="material-icons">reply</i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <?php }}else{ ?>
                                    <li class="list-group-item nestable-item">
                                        <div class="media align-items-center">
                                            
                                            <div class="media-body">
                                                Completed
                                            </div>
                                            
                                        </div>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
<?php include 'inc/sidebar.php';?>
            </div>
        </div>
    </div>

<?php include 'inc/footer.php';?> 