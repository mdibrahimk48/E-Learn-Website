<?php include("inc/header.php"); ?>
<?php 

$login= Session::get("userlogin");
if ($login==false) {
   header("Location:login.php");
}
$uid= Session::get("userId");
 ?>
 <div class="ps-hero bg--cover" data-background="images/hero/about.jpg">
      <div class="ps-hero__content">
        <h1>Compare Products</h1>
        <div class="ps-breadcrumb">
          <ol class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li class="active">compare</li>
          </ol>
        </div>
      </div>
    </div>
    <div class="ps-content pt-40 pb-40">
      <div class="ps-container">
        <div class="table-responsive">
          <table class="table ps-table--compare">
            <tbody>
              <tr>
                <td>Product</td>
                <?php 
				 $uid= Session::get("userId");
				 $getCom=$pd->getComparedData($uid);
				 if ($getCom) {
				 	$i=0;
				 	while ($result=$getCom->fetch_assoc()) {
				 		$i++;
				 
				 ?>
                <td><a class="ps-product--table" href="details.php?pdId=<?php echo($result['productId']); ?>"><img src="admin/<?php echo($result['image']); ?>" alt=""> <?php echo($result['productName']); ?></a></td>
                <?php }} ?>
              </tr>
              <tr>
                <td>Pricing</td>
                <td><span class="price">$450</span></td>
                <td><span class="price">$450</span></td>
              </tr>
              <tr>
                <td>Rating</td>
                <td>
                  <select class="ps-rating ps-shoe__rating">
                    <option value="1">1</option>
                    <option value="1">2</option>
                    <option value="1">3</option>
                    <option value="1">4</option>
                    <option value="2">5</option>
                  </select>
                </td>
                <td>
                  <select class="ps-rating ps-shoe__rating">
                    <option value="1">1</option>
                    <option value="1">2</option>
                    <option value="1">3</option>
                    <option value="1">4</option>
                    <option value="2">5</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td>Available</td>
                <td><span class="status in-stock">In stock</span></td>
                <td><span class="status">Out of stock</span></td>
              </tr>
              <tr>
                <td>Size</td>
                <td>125 cm, 30gr</td>
                <td>125 cm, 30gr</td>
              </tr>
              <tr>
                <td>Color</td>
                <td>Red</td>
                <td>Yellow</td>
              </tr>
              <tr>
                <td>Order</td>
                 <?php 
                 $uid= Session::get("userId");
                 $getCom=$pd->getComparedData($uid);
                 if ($getCom) {
                  $i=0;
                  while ($result=$getCom->fetch_assoc()) {
                    $i++;
                 
                 ?>
                <td><a class="ps-btn ps-btn--yellow" href="details.php?pdId=<?php echo($result['productId']); ?>">Add to cart</a><a class="ps-btn--favorite ml-10" href="details.php?pdId=<?php echo($result['productId']); ?>"><i class="ba-heart"></i></a></td>
                <td><a class="ps-btn ps-btn--yellow" href="details.php?pdId=<?php echo($result['productId']); ?>">Add to cart</a><a class="ps-btn--favorite ml-10" href="details.php?pdId=<?php echo($result['productId']); ?>"><i class="ba-heart"></i></a></td>
                <?php }} ?>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

<?php include("inc/footer.php"); ?>