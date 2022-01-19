 <?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>        
<?php include 'inc/header-nav.php';?>
<?php include_once '../classes/Catagory.php'; ?>
<?php include_once'../classes/Product.php'; ?>
<?php include_once'../classes/Color.php'; ?>
<?php 
$pd=new Product(); 
if ($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['submit'])) {
    $insertProduct=$pd->productInsert($_POST,$_FILES);
}
 ?>

 <main class="main-content bgc-grey-100">
    <div id="mainContent">
        <div class="row gap-20 masonry pos-r">
            <div class="masonry-sizer col-md-12"></div>
            <div class="masonry-item col-md-12">
                <div class="bgc-white p-20 bd">
                    <h1 class="c-grey-900">New Product</h1>
                     <?php if(isset($insertProduct)) {?>
                    <div class="alert alert-success alert-success" data-auto-dismiss="2000" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong style="color: green;">Success!</strong> <?php echo($insertProduct);?>
                    </div>
                  <?php }?>
                
                    <div class="mT-30">
                        <form  method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Product Name&nbsp <span style="color: red;">*</span></label>
                                <input type="text" name="productName" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter product name"> 
                            </div>
                           <div class="form-group">
                                <label for="exampleInputEmail1">Category&nbsp <span style="color: red;">*</span> </label>
                                <select class="form-control" id="sel2" name="catId">
                                <option >Select Category</option>
                                 <?php 
                                $cat=new Catagory();
                                $getCat=$cat->getAllCat();
                                if ($getCat) {
                                    while ($result=$getCat->fetch_assoc()) {  
                                ?>
                                <option value="<?php echo($result['catId']) ?>"><?php echo($result['catName']) ?></option>
                            <?php }}else{echo("Category not found");} ?>
                                
                              </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">City&nbsp <span style="color: red;">*</span> </label>
                                <select class="form-control" id="sel2" name="city">
                                <option >Select City</option>
                                 <?php 
                                $cat=new Catagory();
                                $getCity=$cat->getAllcity();
                                if ($getCity) {
                                    while ($result=$getCity->fetch_assoc()) {  
                                ?>
                                <option value="<?php echo($result['name']) ?>"><?php echo($result['name']) ?></option>
                            <?php }}else{echo("City not found");} ?>
                                
                              </select>
                            </div>
                           <div class="form-group">
                                <label for="exampleInputEmail1">Color </label>
                                <select multiple class="form-control" id="sel2" name="color[]">
                                <option value="null" selected>None</option>
                                <?php 
                                $color=new Color();
                                $getCat=$color->getAllcolor();
                                if ($getCat) {
                                    while ($result=$getCat->fetch_assoc()) {  
                                ?>
                                <option value="<?php echo($result['colorName']) ?>"><?php echo($result['colorName']) ?></option>
                            <?php }}else{echo("Color not found");} ?>
                                
                              </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Size </label>
                                <select multiple class="form-control" id="sel2" name="size[]">
                                <option value="null" selected>None</option>
                                <option value="small">Small</option>
                                <option value="midium">Midium</option>
                                <option value="large">Large</option>
                              </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Content</label>
                                <textarea class="form-control" rows="5" id="comment" name="body"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlFile1"> File input</label>
                                <input type="file" name="image[]" class="form-control-file" id="exampleFormControlFile1" multiple>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Price&nbsp <span style="color: red;">*</span></label>
                                <input type="text" name="price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter product name"> 
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Quantity&nbsp <span style="color: red;">*</span></label>
                                <input type="number" min="1" name="qty" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="1" max="1000" required > 
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Status </label>
                                <select class="form-control" id="sel2" name="status" >
                                <option value="active" selected>Active</option>
                                <option value="inactive" >Inactive</option>
                              </select>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
</main>
<?php include 'inc/footer.php';?> 
