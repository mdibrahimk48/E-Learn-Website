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
   $id=Session::get("userId");
  if ($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['orderNow'])) {
     $updateData= $cart->insertBillingAddress($_POST,$id);
     }

  ?>
<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area" data--black__overlay="4" style="background: rgba(0, 0, 0, 0) url(images/bg/4.jpg) no-repeat scroll center center / cover ;">
  <div class="ht__bradcaump__wrap">
      <div class="container">
          <div class="row">
              <div class="col-xs-12">
                  <div class="bradcaump__inner text-center">
                      <h2 class="bradcaump-title">checkout</h2>
                      <nav class="bradcaump-inner">
                        <a class="breadcrumb-item" href="index.html">Home</a>
                        <span class="brd-separetor"><i class="icon ion-ios-arrow-right"></i></span>
                        <span class="breadcrumb-item active">checkout</span>
                      </nav>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
<!-- End Bradcaump area -->
<!-- Start Contact Area -->
<section class="htc__contact__area ptb--80 bg__white">
  <div class="container">
      <div class="row">
          <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
              <div class="contact__wrap">
                <?php if(isset($_SESSION['error'])) {?>
                  <div class="alert alert-danger alert-dismissible text-center" data-auto-dismiss="2000" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <strong style="color: red;">Warning!</strong>
                       <?php echo($_SESSION['error']);
                       unset($_SESSION['error']);
                       ?>
                  </div>
                <?php }?>
                  <h2 class="title__style--2">Billing Details</h2>
                  
                  <p>Please give your valid Shipping address</p>
                  <form action="" method="post">
                  <div class="htc__contact__inner">
                      <div class="form-group form-group--inline">
                      <label> Name<span>*</span>
                      </label>
                      <div class="form-group__content">
                        <input class="form-control" type="text" name="name" required="required">
                      </div>
                    </div>
                    <div class="form-group form-group--inline">
                      <label>Phone<span>*</span>
                      </label>
                      <div class="form-group__content">
                        <input class="form-control" type="text" name="mobile" required="required">
                      </div>
                    </div>
                    <div class="form-group form-group--inline">
                      <label>Email Address<span>*</span>
                      </label>
                      <div class="form-group__content">
                        <input class="form-control" type="email" name="email" required="required">
                      </div>
                    </div>
                    <div class="form-group form-group--inline">
                      <label>City<span>*</span>
                      </label>
                      <div class="form-group__content">
                        <input class="form-control" type="text" name="city" required="required">
                      </div>
                    </div>
                    
                    <div class="form-group form-group--inline">
                      <label>Zip Code<span>*</span>
                      </label>
                      <div class="form-group__content">
                        <input class="form-control" type="text" name="zipcode" required="required">
                      </div>
                    </div>
                    
                    <div class="form-group form-group--inline">
                      <label>Address<span>*</span>
                      </label>
                      <div class="form-group__content">
                       <div class="contact-box message">
                          <textarea name="address"  placeholder="Message" required="required"></textarea>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
          </div>
          <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 sm-mt-40 xs-mt-40">
              <div class="htc__contact__form__wrap" style="background: #EBF3FE; padding: 20px;">
                  <h2 class="contact__title">Your Order</h2>
                  <div class="table-content table-responsive">
                    <table class="table table-borderless">
                       <?php 
                         $getCart=$cart->getCartProduct();
                            if ($getCart) {
                         ?>
                        <thead>
                          <tr>
                            <th scope="col">Item</th>
                            <th scope="col">Product</th>
                            <th scope="col">Total</th>
                          </tr>
                        </thead>
                        <tbody>
                           <?php 
                           $total=0;
                           $qty=0;
                            $i=0;
                             while ($result=$getCart->fetch_assoc()) {
                            $i++;
                          ?>
                          <tr>
                            <th scope="row"><?php echo($i); ?></th>
                            <td><?php echo($result['title']);?></td>
                            <td>TK <?php echo($result['price']);?></td>
                          </tr>
                           <?php 
                            $total= $total+$result['price'];
                            Session::set("sum",$total);
                            ++$qty;
                            Session::set("qty",$qty);
                             ?>
                            <?php }?>
                          <tr>
                            <th colspan="2">Total Amount</th>
                            <td >TK <?php echo(Session::get("sum",$total)); ?></td>
                            <input type="hidden" name="amount" value="<?php echo(Session::get("sum",$total)); ?>">
                          </tr>
                        <?php }else{?>
                         <tr>
                              <td><span class="text-center"><h1>Cart is Empty</h1></span></td>
                        </tr>
                         <?php } ?>
                        </tbody>
                      </table>
                  </div>
                  <div class="form-output">
                    <h2 class="contact__title">PAYMENT METHOD</h2>
                      <p class="form-messege">
                      <div class="radio">
                        <label><input type="radio"  name="payment" value="Cash" checked><h3>Cash Payment</h3></label>
                       <p>Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                      </div>
                      <div class="radio">
                        <label><input type="radio" name="payment" value="Bkash"><h3>Bkash Payment</h3></label>
                        <p>
                      Bkash Payment<br/>
                      Bkash No : 017512383336<br/>
                      Account Type: Personal

                      Please send the above money to this Bkash No and write your transaction code below there..<br/><br/>
                      <input id="transaction" class="form-control" type="text" placeholder="Enter transaction ID here " name="transactionid">
                      </p>
                      </div>
                  </p>
                  </div>
                  <div class="contact-btn">
                        <button type="submit" class="htc__btn btn--theme" name="orderNow">Order Now</button>
                  </div>
                </form>
              </div>
          </div>
      </div>
  </div>
</section>
<!-- End Contact Area -->

<?php include("inc/footer.php"); ?>
<script type="text/javascript">
  $(document).ready(function(){
    $("#transaction").hide();
    $('input[type="radio"]').click(function(){
      if($(this).val() == "Bkash") {
             $("#transaction").show();
        }
        else {
             $("#transaction").hide();
        }
      
    });
});
</script>