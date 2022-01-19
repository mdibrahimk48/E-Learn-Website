<?php include("inc/header.php"); ?>
<?php
$login= Session::get("userlogin");
if ($login==false) {
   header("Location:login.php");
}
 ?>
  <?php
 if (isset($_GET['conId'])) {
    $id=$_GET['conId'];
    $time=$_GET['time'];
    $price=$_GET['price'];
    $confirm=$ct->productShiftConfirm($id,$time,$price);
  }  
  ?>
 <div class="ps-hero bg--cover" data-background="images/hero/about.jpg">
      <div class="ps-hero__content">
        <h1>Order Details</h1>
        <div class="ps-breadcrumb">
          <ol class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li class="active">order</li>
          </ol>
        </div>
      </div>
    </div>
    <main class="ps-main">
      <div class="ps-container">
        <div class="ps-cart-listing">
          <div class="table-responsive">
            <h1 class="text-center">Your Order</h1>
            <table class="table ps-table ps-table--listing">
              <thead>
                <tr>
                  <th>All Products</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Total</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $uid= Session::get("userId");
                
                 $getOrdet=$ct->getOrderProduct($uid);
                 if ($getOrdet) {
                    $i=0;
                    while ($result=$getOrdet->fetch_assoc()) {
                        $i++;
                 
                 ?>
                <tr>
                  <td><a class="ps-product--table" href="#"><img class="mr-15" src="admin/<?php echo($result['image']);?>" alt=""> <?php echo($result['productName']);?></a></td>
                  <td>TK <?php echo($result['price']) ;?></td>
                  <td>
                    <div class="form-group--number">
                      
                      <input class="form-control" type="text" value="<?php echo($result['quantity']); ?>">
                      
                    </div>
                  </td>
                  <td>
                    <strong>
                    TK <?php 
                     $price =$result['price'];
                     $qty=$result['quantity']; 
                    echo($price*$qty);
                    ?>
                    </strong>
            </td>
                  <td>
                    <?php 
                    if ($result['status']=='0') {
                        echo("Pending");
                    }elseif ($result['status']=='1') {
                        echo("On the way");
                    }else{
                        echo("Completed");
                    }
                    ?>
                  </td>
                </tr>
               <?php }}else{ ?>
               <tr>
                   You have no order yet
               </tr>
               <?php } ?>
              </tbody>
            </table>
          </div>
         
        </div>
      </div>
    </main>

<?php include("inc/footer.php"); ?>