<?php include("inc/header.php"); ?>
<?php
if (!isset($_GET['pdId'])||$_GET['pdId']==NULL ||$_GET['pdId']!=$_GET['pdId']) {
    echo "<script>window.location = '404.php';</script>";
}else{
    // $id=$_GET['catid'];
    $id=preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['pdId']);
}

if ($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['submit'])) {
    $quantity=$_POST['quantity'];
    $addCart=$ct->addToCart($quantity,$id);
}


 ?>
 <?php
     $userId=Session::get("userId");
    if ($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['compare'])) {
        $productId=$_POST['productId'];
       $insertCompare= $pd->insertCompareData($productId,$userId);

       }
  ?>
  <?php
     // $userId=Session::get("userId");
    if ($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['wlistid'])) {
        // $productId=$_POST['productId'];
       $saveWlist= $pd->saveWlistData($id,$userId);

       }
  ?>
<style >
	.mybutton{
		width: 100px;float: left; margin-right: 40px;
	}
</style>
 <div class="main">
    <div class="content">
    	<div class="section group">
				<div class="cont-desc span_1_of_2">				
					<div class="grid images_3_of_2">
						<img src="images/preview-img.jpg" alt="" />
					</div>
				<div class="desc span_3_of_2">
					<h2>Lorem Ipsum is simply dummy text </h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>					
					<div class="price">
						<p>Price: <span>$500</span></p>
						<p>Category: <span>Laptop</span></p>
						<p>Brand:<span>Samsnumg</span></p>
					</div>
				<div class="add-cart">
					<form action="cart.html" method="post">
						<input type="number" class="buyfield" name="" value="1"/>
						<input type="submit" class="buysubmit" name="submit" value="Buy Now"/>
					</form>				
				</div>
			</div>
			<div class="product-desc">
			<h2>Product Details</h2>
			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
	        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
	    </div>
				
	</div>
				<div class="rightsidebar span_3_of_1">
					<h2>CATEGORIES</h2>
					<ul>
				      <li><a href="productbycat.html">Mobile Phones</a></li>
				      <li><a href="productbycat.html">Desktop</a></li>
				      <li><a href="productbycat.html">Laptop</a></li>
				      <li><a href="productbycat.html">Accessories</a></li>
				      <li><a href="productbycat.html#">Software</a></li>
					   <li><a href="productbycat.html">Sports & Fitness</a></li>
					   <li><a href="productbycat.html">Footwear</a></li>
					   <li><a href="productbycat.html">Jewellery</a></li>
					   <li><a href="productbycat.html">Clothing</a></li>
					   <li><a href="productbycat.html">Home Decor & Kitchen</a></li>
					   <li><a href="productbycat.html">Beauty & Healthcare</a></li>
					   <li><a href="productbycat.html">Toys, Kids & Babies</a></li>
    				</ul>
    	
 				</div>
 		</div>
 	</div>
<?php include("inc/footer.php"); ?>