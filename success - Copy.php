<?php include_once("inc/header-top.php"); ?>
            <!-- Start Mainmenu Area -->
<?php include("inc/header-nav.php"); ?>
            <!-- End Mainmenu Area -->
            <!-- Mobile-menu-area start -->
<?php include("inc/mobile-nav.php"); ?>
            <!-- Mobile-menu-area End -->
        </div>
        <!-- End Header Style -->
<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area" data--black__overlay="4" style="background: rgba(0, 0, 0, 0) url(images/bg/4.jpg) no-repeat scroll center center / cover ;">
  <div class="ht__bradcaump__wrap">
      <div class="container">
          <div class="row">
              <div class="col-xs-12">
                  <div class="bradcaump__inner text-center">
                      <h2 class="bradcaump-title">Success</h2>
                      <nav class="bradcaump-inner">
                        <a class="breadcrumb-item" href="index.php">Home</a>
                        <span class="brd-separetor"><i class="icon ion-ios-arrow-right"></i></span>
                        <span class="breadcrumb-item active">Success</span>
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
          <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 sm-mt-40 xs-mt-40">
              <div class="htc__contact__form__wrap" style="background: #EBF3FE; padding: 20px;">
                  <h2 class="contact__title text-center">Your Order</h2>
                  <div class="table-content table-responsive">
                    <table class="table table-borderless">
                        <thead>
                          <tr>
                            <th scope="col">SN</th>
                            <th scope="col">Product</th>
                            <th scope="col">Total</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                          </tr>
                          <tr>
                            <th colspan="2">Order Total</th>
                            <td >Larry the Bird</td>
                          </tr>
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
                      <input id="transaction" class="form-control" type="text" placeholder="Enter transaction ID here " name="transactionid" required="required">
                      </p>
                      </div>
                  </p>
                  </div>
                  <div class="contact-btn">
                        <button type="submit" class="htc__btn btn--theme">Order Now</button>
                  </div>
                </form>
              </div>
          </div>
      </div>
  </div>
</section>

<?php include("inc/footer.php"); ?>
