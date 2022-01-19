<?php include("inc/header.php"); ?>
<?php
$login= Session::get("userlogin");
if ($login==false) {
   header("Location:login.php");
}
 ?>
  <?php
     $id=Session::get("userId");
    if ($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['submit'])) {
        echo("save");
       $updateData= $ur->updateUserData($_POST,$id);

       }
  ?>
 <style>
 	.tblone{width: 550px;margin: 0 auto;border: 2px solid #ddd;}
 	.tblone tr td{text-align: justify;}
 </style>
 <div class="main">
    <div class="content">
    
    <?php 
      $id=Session::get("userId");
      $getUdata=$ur->getUserData($id);
      if ($getUdata) {
      	while ($result=$getUdata->fetch_assoc()) {
      	
     ?>
    <form action="" method="post">
        <table class="tblone">
        <?php 
        if (isset($updateData)) {
        echo("<tr><td colspan='2'>".$updateData."</td></tr>");
      }
       ?>
       <tr>
        
            <td colspan="2">Update profile details</td>
        </tr
        <tr>
            <td width="20%">Name</td>
            
            <td><input type="text" name="name" value="<?php echo($result['name']); ?>"></td>
        </tr>
        <tr>
            <td>Phone</td>
            <td><input type="text" name="phone" value="<?php echo($result['phone']); ?>"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="email" value="<?php echo($result['email']); ?>"></td>
        </tr>
        <tr>
            <td>Address</td>
            <td><input type="text" name="address" value="<?php echo($result['address']); ?>"></td>
        </tr>
        <tr>
            <td>City</td>
            <td><input type="text" name="city" value="<?php echo($result['city']); ?>"></td>
        </tr>
        <tr>
            <td>Zip code</td>
            <td><input type="text" name="zip" value="<?php echo($result['zip']); ?>"></td>
        </tr>
        <tr>
            <td>country</td>
            <td><input type="text" name="country" value="<?php echo($result['country']); ?>"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="submit" value="Save"></td>
        </tr>
      </table>
    </form>
    <?php }} ?>
 		</div>
        
 	</div>
	</div>
   <?php include("inc/footer.php"); ?>
