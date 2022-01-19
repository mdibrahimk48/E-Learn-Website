<?php include("inc/header.php"); ?>
<?php 
$login= Session::get("userlogin");
if ($login==false) {
   header("Location:login.php");
}
$uid= Session::get("userId");
if (isset($_GET['delwlistid'])) {
 	$productId=$_GET['delwlistid'];
 	
 	$delwlist=$pd->delwlistData($uid,$productId);
 } ?>
 <div class="ps-hero bg--cover" data-background="images/hero/about.jpg">
      <div class="ps-hero__content">
        <h1>Whishlist</h1>
        <div class="ps-breadcrumb">
          <ol class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li class="active">Whishlist</li>
          </ol>
        </div>
      </div>
    </div>
    <div class="ps-content pt-80 pb-80">
      <div class="ps-container">
        <div class="table-responsive">
          <table class="table ps-table ps-table--whishlist">
            <thead>
              <tr>
                <th>All Products</th>
                <th>Price</th>
                <th>View</th>
                <th>Remove</th>
              </tr>
            </thead>
            <tbody>
            	<?php 
				 
				 $getCom=$pd->getkWlistData($uid);
				 if ($getCom) {
				 	$i=0;
				 	while ($result=$getCom->fetch_assoc()) {
				 		$i++;
				 
				 ?>
              <tr>
                <td><a class="ps-product--table" href="details.php?pdId=<?php echo($result['productId']);?>"><img class="mr-15" src="admin/<?php echo($result['image']); ?>" alt=""><?php echo($result['productName']);?></a></td>
                <td><strong>Tk. <?php echo($result['price']); ?></strong></td>
                <td><a class="ps-product-link" href="details.php?pdId=<?php echo($result['productId']);?>">View Product</a></td>
                <td>
                <a href="?delwlistid=<?php echo($result['productId']); ?>"><div class="ps-remove"></div></a>
                  
                </td>
              </tr>
  				<?php }}else{ ?>
  				<tr>
  					<td><?php echo("Your whishlist is empty"); ?></td>
  				</tr>
  				<?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
<?php include("inc/footer.php"); ?>