<?php include("inc/header.php"); ?>
<?php 
if (!isset($_GET['city_id'])||$_GET['city_id']==NULL ||$_GET['city_id']!=$_GET['city_id']) {
    echo "<script>window.location = '404.php';</script>";
}else{
    // $id=$_GET['catId'];
    $id=preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['city_id']);
    
}
 ?>
 <!-- bannar-->
    <div class="ps-hero bg--cover" data-background="images/hero/product.jpg">
        <div class="ps-hero__content">
            <h1> Shop Page</h1>
            <div class="ps-breadcrumb">
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li class="active">Search by city</li>
                </ol>
            </div>
        </div>
    </div>
   
    <!-- home-2 product-->
    <main class="ps-shop">
        <div class="ps-shop__wrapper">
            <div class="ps-shop__banners">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                        <div class="ps-collection"><a class="ps-collection__overlay" href="#"></a><img src="images/collection/product-1.jpg" alt=""></div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                        <div class="ps-collection"><a class="ps-collection__overlay" href="#"></a><img src="images/collection/product-2.jpg" alt=""></div>
                    </div>
                </div>
            </div>
            <div class="ps-shop__sort">
                <p>Show 1-12 of 35 result</p>
                <select class="ps-select" title="Default Sorting">
                    <option value="1">Option 1</option>
                    <option value="2">Option 2</option>
                    <option value="3">Option 3</option>
                </select>
            </div>
            <div class="ps-row">
                <?php 
              $getNpd=$pd->productByCity($id);
              if ($getNpd) {
                while ($result=$getNpd->fetch_assoc()) {
               ?>

                <div class="ps-column">
                    <div class="ps-product">
                        <div class="ps-product__thumbnail"><img src="admin/<?php echo($result['image']); ?>" alt=""><a class="ps-product__overlay" href="details.php?pdId=<?php echo($result['id']); ?>"></a>
                            <ul class="ps-product__actions">
                                <li><a href="<?php echo($result['id']); ?>" class="quick_look"  data-id="<?php echo($result['id']); ?>" data-tooltip="Quick View"><i class="ba-magnifying-glass"></i></a></li>
                                <li><a href="#" data-tooltip="Favorite"><i class="ba-heart"></i></a></li>
                                <li><a href="details.php?pdId=<?php echo($result['id']); ?>" data-tooltip="Add to Cart"><i class="ba-shopping"></i></a></li>
                            </ul>
                        </div>
                        <div class="ps-product__content"><a class="ps-product__title" href="details.php?pdId=<?php echo($result['id']); ?>"><?php echo($result['productName']); ?></a>
                            <select class="ps-rating">
                                <option value="1">1</option>
                                <option value="1">2</option>
                                <option value="1">3</option>
                                <option value="1">4</option>
                                <option value="2">5</option>
                            </select>
                            <p class="ps-product__price">TK <?php echo($result['price']); ?></p>
                        </div>
                    </div>
                </div>
  <?php }}else{echo("Product Not found");} ?>
  </div>
 
</div>
<?php include_once 'inc/sidebar.php';?>
        
    </main>
<?php include("inc/footer.php"); ?>