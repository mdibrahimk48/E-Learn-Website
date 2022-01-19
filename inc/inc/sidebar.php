<div class="mdk-drawer js-mdk-drawer" id="default-drawer">
<div class="mdk-drawer__content ">
    <div class="sidebar sidebar-left sidebar-dark bg-dark o-hidden" data-perfect-scrollbar>
        <div class="sidebar-p-y">
            <!-- Account menu -->
            <div class="sidebar-heading">Student</div>
            <ul class="sidebar-menu sm-active-button-bg">
                <li class="sidebar-menu-item">
                    <a class="sidebar-menu-button" href="index.php">
                        <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">search</i> Browse Courses
                    </a>
                </li>
                <li class="sidebar-menu-item">
                    <a class="sidebar-menu-button" href="course-list.php">
                        <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">import_contacts</i> View Course
                    </a>
                </li>
                <li class="sidebar-menu-item">
                    <a class="sidebar-menu-button" href="my-courses.php">
                        <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">school</i> My Courses
                    </a>
                </li>
                <li class="sidebar-menu-item">
                    <a class="sidebar-menu-button" href="take-quiz.php">
                        <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">dvr</i> Take a Quiz
                    </a>
                </li>
                <li class="sidebar-menu-item">
                    <a class="sidebar-menu-button" href="view-result.php">
                        <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">poll</i> Quiz Results
                    </a>
                </li>
                <li class="sidebar-menu-item">
                    <a class="sidebar-menu-button" href="question-post.php">
                        <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">live_help</i> Ask Question
                    </a>
                </li>
                 <?php 
                  if (isset($_GET['uid'])) {
                    $userid= Session::get("userId");
                    $deldata=$cart->delUserCart();
                    //$delCom=$pd->delCompareData($userid);
                        Session::destroy();
                      }
                 ?>
                <li class="sidebar-menu-item">
                    <a class="sidebar-menu-button" href="?uid=<?php Session::get('userId');?>">
                        <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">lock_open</i> Logout
                    </a>
                </li>
            </ul>
           
        </div>
    </div>
</div>
</div>
