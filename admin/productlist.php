<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include 'inc/header-nav.php';?>
<?php include_once '../classes/Color.php'; ?>

<?php 
if (isset($_GET['delpd'])) {
    // $id=$_GET['delete'];
    $id=preg_replace('/[^-a-zA-Z0-9]/', '', $_GET['delpd']);
    $delPd=$pd->delPdById($id);
}
?>
<main class="main-content bgc-grey-100">
    <div id="mainContent">
        <div class="container-fluid">
            <h4 class="c-grey-900 mT-10 mB-30">Product List</h4>
             
          <?php if(isset($delPd) && $delPd!='success') {?>
              <div class="alert alert-warning alert-dismissible" data-auto-dismiss="2000" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <strong style="color: red;">Warning!</strong> <?php echo($delPd);?>
              </div>
            <?php }?>
            <?php if(isset($delPd)&& $delPd=='success') {?>
            <div class="alert alert-success alert-dismissible" data-auto-dismiss="2000" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong style="color: green;">Success!</strong> <?php echo('<span >product deleted successful</span>');?>
              </div>
            <?php }?>
                
            
            <div class="row">
                <div class="col-md-12">
                    <div class="bgc-white bd bdrs-3 p-20 mB-20">
                        <h4 class="c-grey-900 mB-20"> Data Table <span class="pull-right"><a href="catadd.php" class="btn btn-success btn-xs"><i class="fa fa-plus" aria-hidden="true"></i></a></span></h4>
                        <table id="table-datatables" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>ProductName</th>
                                    <th>Category</th>
                                    <th>Color</th>
                                    <th>Size</th>
                                    <th>Content</th>
                                    <th>Price</th>
                                     <th>Quantity</th>
                                     <th>Image</th>
                                     <th>Status</th>
                                    <th>Setting</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ProductName</th>
                                    <th>Category</th>
                                    <th>Color</th>
                                    <th>Size</th>
                                    <th>Content</th>
                                    <th>Price</th>
                                     <th>Quantity</th>
                                     <th>Image</th>
                                     <th>Status</th>
                                    <th>Setting</th>
                                </tr>
                            </tfoot>
                            <tbody>
                               <?php 
                                $getPd=$pd->getAllProduct();
                               
                                
                                if ($getPd) {
                                    $i=0;
                                    while ($result=$getPd->fetch_assoc()) {
                                        $i++;
                                 ?>
                                <tr>
                                    <td><?php echo($result['productName']) ;?></td>
                                    <td><?php echo($result['catName']); ?></td>
                                   
                                    <td>
                                     <?php 
                                        $aa[]=explode(',',$result['colorName']);
                                        
                                        foreach ($aa[0] as $v)
                                        {
                                            echo($v.',');
                                        }
                                     ?>
                                     </td>
                                    <td>
                                        <?php 
                                        $size[]=explode(',',$result['size']);
                                        
                                        foreach ($size[0] as $v)
                                        {
                                            echo($v.',');
                                        }
                                     ?>
                                    </td>
                                    <td><?php echo($fm->textShorten($result['body'],50)); ?></td>
                                    <td>TK<?php echo($result['price']); ?></td>
                                     <td><?php echo($result['qty']); ?></td>
                                     <td><img src="<?php echo($result['image']); ?>" height="40px" width="60px"/></td>
                                     <td><?php echo($result['status']); ?></td>

                                    <td class="pull-right">
                                        <a class="btn btn-primary" href="productedit.php?pdid=<?php echo($result['id']) ;?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                        <?php 
                                        if (Session::get("adminRole")=='0') {
                                         ?>
                                        <a class="btn btn-danger" onclick="return confirm('are you sure delect category!')" href="?delpd=<?php echo($result['id']) ;?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                    <?php } ?>
                                    </td>
                                </tr>
                                <?php }}else{echo("catagory not found");} ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<div class="modal fade" id="modal-1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                <form role="form" method="POST">
                    <input type="hidden" name="_token" value="">
                    <div class="form-group">
                        <label class="control-label">Add Category</label>
                        <div>
                            <input type="text" class="form-control input-lg" name="catname">
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <div class="modal-footer d-flex justify-content-center">
                                
                                <input class="btn btn-primary" type="submit" name="submit" Value="Save" />
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>
