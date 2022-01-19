<?php include_once("inc/header-top.php"); ?>
            <!-- Start Mainmenu Area -->
<?php include("inc/header-nav.php"); ?>
            <!-- End Mainmenu Area -->
            <!-- Mobile-menu-area start -->
<?php include("inc/mobile-nav.php"); ?>
            <!-- Mobile-menu-area End -->
        </div>
        <!-- End Header Style -->
<?php 
if (isset($_GET['delCatItem'])) {
    $delId=preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['delCatItem']);
    $cart->delProductByCart($delId);
}
 ?>
 <?php 
 if (!isset($_GET['id'])) {
    echo("<meta http-equiv='refresh' content='0;URL=?id=live'/>");
 }
  ?>
<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area" data--black__overlay="4" style="background: rgba(0, 0, 0, 0) url(images/bg/4.jpg) no-repeat scroll center center / cover ;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner text-center">
                        <h2 class="bradcaump-title">Cart Page</h2>
                        <nav class="bradcaump-inner">
                          <a class="breadcrumb-item" href="index.html">Home</a>
                          <span class="brd-separetor"><i class="icon ion-ios-arrow-right"></i></span>
                          <span class="breadcrumb-item active">Cart</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->
<!-- cart-main-area start -->
<div class="cart-main-area ptb--80">
    <div class="container">
        <?php if(isset($_SESSION['error'])) {?>
          <div class="alert alert-warning alert-dismissible text-center" data-auto-dismiss="2000" role="alert" id="error-alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong style="color: red;">Warning!</strong>
               <?php echo($_SESSION['error']);

               unset($_SESSION['error']);
               ?>
          </div>
        <?php }?>
        <?php if(isset($_SESSION['success'])) {?>
        <div class="alert alert-success alert-dismissible text-center" data-auto-dismiss="2000" role="alert" id="success-alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong style="color: green;">Success!</strong> 
            <?php echo($_SESSION['success']);

               unset($_SESSION['success']);
               ?>
          </div>
        <?php }?>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                
                <form action="#">               
                    <div class="table-content table-responsive">
                        <table>
                            <?php 
                             $getCart=$cart->getCartProduct();
                                if ($getCart) {
                             ?>
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">Image</th>
                                    <th class="product-name">Product</th>
                                    <th class="product-price">Class</th>
                                    <th class="product-quantity">Period</th>
                                    <th class="product-subtotal">Price</th>
                                    <th class="product-remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                 $total=0;
                                 $qty=0;
                                   while ($result=$getCart->fetch_assoc()) {
                                   //var_dump($result);
                                ?>
                                <tr>
                                    <td class="product-thumbnail"><a href="#"><img src="admin/<?php echo($result['image']);?>" alt="product img" /></a></td>
                                    <td class="product-name"><a href="#"><?php echo($result['title']);?></a></td>
                                    <td class="product-price"><span class="amount"><?php echo($result['class']);?></span></td>
                                    <td class="product-quantity"><?php echo($result['period']);?></td>
                                    <td class="product-subtotal">TK <?php echo($result['price']);?></td>
                                    <td class="product-remove"><a href="?delCatItem=<?php echo($result['course_id']);?>">X</a></td>
                                </tr>
                                <?php 
                                $total= $total+$result['price'];
                                Session::set("sum",$total);
                                ++$qty;
                                Session::set("qty",$qty);
                                 ?>
                                <?php }}else{?>
                                <tr>
                                    <td><span class="text-center"><h1>Cart is Empty</h1></span></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-8 col-sm-7 col-xs-12">
                            <div class="buttons-cart">
                               <!-- <input type="submit" value="Update Cart" />-->
                                <a href="#">Continue Shopping</a>
                            </div>
                            
                        </div>
                        <div class="col-md-4 col-sm-5 col-xs-12">
                            <div class="cart_totals">
                                <h2>Cart Totals</h2>
                                <table>
                                    <tbody>
                                        <tr class="shipping">
                                            <th>Other cost</th>
                                            <td>
                                                <ul id="shipping_method">
                                                    <li>
                                                        <input type="radio" /> 
                                                        <label>
                                                            Free 
                                                        </label>
                                                    </li>
                                                    <li></li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr class="order-total">
                                            <th>Total</th>
                                            <td>
                                                <strong><span class="amount"> <?php echo $getCart != false ?'TK '. Session::get("sum",$total) : 0;?></span></strong>
                                            </td>
                                        </tr>                                           
                                    </tbody>
                                </table>
                                <div class="wc-proceed-to-checkout">
                                    <a href="checkout.php">Proceed to Checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form> 
            </div>
        </div>
    </div>
</div>
<!-- cart-main-area end -->
<?php include("inc/footer.php"); ?>
