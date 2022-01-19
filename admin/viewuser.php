<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include 'inc/header-nav.php';?>
<?php
 $usersid=Session::get("adminId");
  $userRole=Session::get("adminRole");
 ?>
 <?php
 if (!isset($_GET['vuserid']) || $_GET['vuserid']==NULL) {
   echo("<script>window.location='employeelist.php';</script>");
   // header("Location: catlist.php");
}else{
    $vuserid=$_GET['vuserid'];
}
 ?>
 <?php 
 if ($_SERVER['REQUEST_METHOD']=='POST') {
      echo("<script>window.location='employeelist.php';</script>");  
      
   }
 ?>
 <main class="main-content bgc-grey-100">
    <div id="mainContent">
        <div class="row gap-20 masonry pos-r">
            <div class="masonry-sizer col-md-12"></div>
            <div class="masonry-item col-md-12">
                <div class="bgc-white p-20 bd">
                    <h6 class="c-grey-900">Update Employee</h6>
                     <?php if(isset($updateCat)) {?>
                    <div class="alert alert-success alert-dismissible" data-auto-dismiss="2000" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Success!</strong> <?php echo($updateCat);?>
                    </div>
                  <?php }?>
                
                    <div class="mT-30">
                         <?php 
                       $em=new Employee(); 
                     $viewusers=$em->viewEmployee($vuserid);
                     if ($viewusers) {
                     while ($result=$viewusers->fetch_assoc()) {
                         
                         ?>
                        <form  method="post">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name </label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" value="<?php echo($result['name']); ?>" readonly="readonly"> 
                            </div>
                           <div class="form-group">
                                <label for="exampleInputEmail1">UserName </label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" value="<?php echo($result['typeofuser']); ?>" readonly="readonly"> 
                            </div>
                             <div class="form-group">
                                <label for="exampleInputEmail1">UserName </label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" value="<?php echo($result['email']); ?>" readonly="readonly"> 
                            </div>
                             <div class="form-group">
                                <label for="exampleInputEmail1">Content</label>
                                <textarea class="form-control" rows="5" id="comment" name="details">
                                     <?php echo($result['address']); ?>
                                </textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                        <?php }}else{echo("User info not found");} ?>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
</main>
<?php include 'inc/footer.php';?>