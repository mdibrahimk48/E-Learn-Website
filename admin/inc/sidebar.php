<div class="mdk-drawer js-mdk-drawer" id="default-drawer">
                    <div class="mdk-drawer__content ">
                        <div class="sidebar sidebar-left sidebar-dark bg-dark o-hidden" data-perfect-scrollbar>
                            <div class="sidebar-p-y">
                                <ul class="sidebar-menu sm-active-button-bg">
                                    <li class="sidebar-menu-item active">
                                        <a class="sidebar-menu-button" href="dashboard.php">
                                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">school</i>
                                         <?php echo(Session::get("user_deg"));?>
                                        </a>
                                    </li>
                                </ul>
                                
                                <div class="sidebar-heading"><?php echo(Session::get("user_deg"));?></div>
                                <ul class="sidebar-menu sm-active-button-bg">
                                     <?php if (Session::get("user_role")==0) {?>
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button" href="manage-course.php">
                                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">import_contacts</i> Course Manager
                                        </a>
                                    </li>
                                    <?php } ?>
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button" href="manage-lession.php">
                                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">import_contacts</i> Lession Manager
                                        </a>
                                    </li>
                                    <?php if (Session::get("user_role")==0) {?>
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button" href="notice-board.php">
                                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">receipt</i> Notice Board
                                        </a>
                                    </li>
                                    <?php } ?>
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button" href="manage-quizze.php">
                                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">help</i> Quiz Manager
                                        </a>
                                    </li>
                                     <?php 
                                   if (isset($_GET['action'])&&$_GET['action']=="logout") {
                                        Session::destroy();
                                    }
                                   ?>
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button" href="?action=logout">
                                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">lock_open</i> Logout
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>