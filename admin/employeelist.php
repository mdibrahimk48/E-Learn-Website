<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include 'inc/header-nav.php';?>
$em=new Employee(); 
?>
 <main class="main-content bgc-grey-100">
    <div id="mainContent">
        <div class="container-fluid">
            <h4 class="c-grey-900 mT-10 mB-30">Category List</h4>
         	<?php 
                if (isset($_GET['deluid'])) {
                	$deluid=$_GET['deluid'];
                	$delemp=$em->deleteEmployee($deluid);
                    
                  }
               ?>
               <?php if(isset($delemp)) {?>
            <div class="alert alert-success alert-dismissible" data-auto-dismiss="2000" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong style="color: green;">Success!</strong> <?php echo($delemp);?>
            </div>
          <?php }?>
          <div class="row">
                <div class="col-md-12">
                    <div class="bgc-white bd bdrs-3 p-20 mB-20">
                        <h4 class="c-grey-900 mB-20"> Data Table <span class="pull-right"><a href="addemployee.php" class="btn btn-success btn-xs"><i class="fa fa-plus" aria-hidden="true"></i></a></span></h4>
                        <table id="table-datatables" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                   <th>Serial No.</th>
									<th> Name</th>
									<th>UserName</th>
									<th>Emai</th>
									<th>Details</th>
									<th>Role</th>
						             <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Serial No.</th>
									<th> Name</th>
									<th>UserName</th>
									<th>Emai</th>
									<th>Details</th>
									<th>Role</th>
						            <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
					    
			                        $allusers=$em->employeeList();
								if ($allusers) {
									$i=0;
									while ($result=$allusers->fetch_assoc()) {
										$i++;
									
								 ?>
                                <tr>
                                    <td><?php echo($i) ;?></td>
									<td><?php echo($result['name']) ;?></td>
									<td> <?php echo($result['typeofuser']) ;?></td>
									<td><?php echo($result['email']) ;?></td>
									<td><?php echo($result['address']) ;?></td>
									<td>
									<?php 
										if ($result['role']=='0') {
											echo("Admin");
										}elseif ($result['role']=='1') {
											echo("Author");
										}elseif ($result['role']=='2') {
											echo("Supplier");
										}
									?>
										
									</td>
                                    <td class="pull-right">
                                        <a class="btn btn-primary" href="viewuser.php?vuserid=<?php echo($result['userId']) ;?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                        <?php 
                                        if (Session::get("adminRole")=='0') {
                                         ?>
                                        <a class="btn btn-danger" onclick="return confirm('are you sure delect category!')" href="?deluid=<?php echo($result['userId']) ;?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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
