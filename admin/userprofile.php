<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include 'inc/header-nav.php';?>
<?php include_once'../classes/User.php';?>

<?php
$ur= new User();
 $adminid=Session::get("adminId");
  $adminRole=Session::get("adminRole");
 ?>
 <?php 
 
if ($_SERVER['REQUEST_METHOD']=='POST') {

   $updateUser=$ur->updateUserProfile($_POST);  
    
 }
?>
 <main class="main-content bgc-grey-100">
    <div id="mainContent">
        <div class="row gap-20 masonry pos-r">
            <div class="masonry-sizer col-md-12"></div>
            <div class="masonry-item col-md-12">
                <div class="bgc-white p-20 bd">
                    <h6 class="c-grey-900">Update User Profile</h6>
                     <?php if(isset($updateUser)) {?>
                    <div class="alert alert-success alert-dismissible" data-auto-dismiss="2000" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Success!</strong> <?php echo($updateUser);?>
                    </div>
                  <?php }?>
                
                    <div class="mT-30">
                         <?php 
                         $viewusers=$ur->getUserProfileData();
	                     if ($viewusers) {
	                     while ($result=$viewusers->fetch_assoc()) {
                                
                         ?>  
                        <form  method="post">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name </label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" value="<?php echo($result['name']); ?>" > 
                            </div>
                           <div class="form-group">
                                <label for="exampleInputEmail1">UserName </label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="typeofuser" value="<?php echo($result['typeofuser']); ?>" > 
                            </div>
                             <div class="form-group">
                                <label for="exampleInputEmail1">Email </label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="<?php echo($result['email']); ?>" > 
                            </div>
                             <div class="form-group">
                                <label for="exampleInputEmail1">Address</label>
                                <textarea class="form-control" rows="5" id="comment" name="details">
                                     <?php echo(strip_tags($result['address'])); ?>
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