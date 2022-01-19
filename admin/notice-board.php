<?php include_once("inc/header.php"); ?>
<?php 
include_once'../classes/Notice.php';
$notice= new Notice();
        
if (isset($_GET['noticeDelete'])) {
    // $id=$_GET['delete'];
    $id=preg_replace('/[^-a-zA-Z0-9]/', '', $_GET['noticeDelete']);
    $notice->delNoticeById($id);
}
 ?>
<div class="mdk-header-layout__content">
<div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
<div class="mdk-drawer-layout__content page ">
    <div class="container-fluid page__container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Notice Board</li>
        </ol>
        

     <div class="row">
        <div class="col-lg-12">
            <div class="card">
              <div class="card-header d-flex align-items-center">
              <div class="flex">
                <h1 class="h2">Notice Board</h1>
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
              <a class="btn btn-sm btn-primary" href="notice-add.php"><i class="material-icons">add</i></a>
          </div>
        <div data-toggle="lists" class="table-responsive">
            <table class="table table-nowrap m-0">
                <thead class="thead-light">
                    <tr class="text-uppercase small">
                        <th>
                            <a >Title</a>
                        </th>
                        <th class="text-center">
                            <a >Description</a>
                        </th>
                        <th class="text-center">
                            <a >Started_At</a>
                        </th>
                        <th class="text-center">
                            <a >Action</a>
                        </th>
                    </tr>
                </thead>
                <tbody class="list">
                    <?php 
                        $notices=$notice->getAllNotices();
                        if ($notices) {
                          while ($ecourse=$notices->fetch_assoc()) {
                    ?>
                    <tr>
                        <td>
                        <span class="js-lists-values-fees"><?php echo($ecourse['title']);?></span> 
                            
                        </td>
                        <td class="text-center text-black-70">

                        <span class="js-lists-values-fees"><?php echo($ecourse['description']);?></span> 

                        </td>
                        <td class="text-center text-black-70">
                        <span class="js-lists-values-revenue"><?php echo(date('d M Y', strtotime($ecourse['started_at']))); ?></span>
                        </td>
                        <td class="text-center text-black-70">

                        <span class="js-lists-values-fees">
                          <div class="media-right">
                            <a href="notice-edit.php?noticeEdit=<?php echo($ecourse['id']);?>" class="btn btn-white btn-sm"><i class="material-icons">edit</i></a><br>
                            <a onclick="return confirm('are you sure delect course!')" href="?noticeDelete=<?php echo($ecourse['id']) ;?>" class="btn btn-white btn-sm"><i class="material-icons">delete</i></a>
                        </div>                       
                        </span> 

                        </td>
                    </tr>
                    <?php }}else{?>
                    <tr>
                        <td>
                           <h3 class="text-center">No enroll yet</h3> 
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
        </div>
         
     </div>
    </div>
</div>


    <?php include_once("inc/sidebar.php"); ?>
      </div>
             
        </div>
    </div>
    <?php include_once("inc/footer.php"); ?>
      