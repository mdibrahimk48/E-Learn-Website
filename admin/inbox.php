<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
$filepath=realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once($filepath.'/../helpers/Format.php'); 
 $db=new Database();
 $fm=new Format();
 ?>
 <style>
    .actiondel{margin-left: 80px;cursor: pointer;}
    .actiondel a,.in{border:1px solid #ddd;color: #444;font-size: 20px;padding: 2px 10px;font-weight: normal;background: #f0f0f0;}
</style>

        <div class="grid_10">
            <div class="box round first grid">
                <strong class="in">Inbox</strong><strong class="actiondel"><a href="#">Trast</a></strong>
                <?php 
					if (isset($_GET['seenid'])) {
						$seenid=$_GET['seenid'];
					$query="update contact
                      set
                     status='1'
                     where contactid='$seenid'";
			             $update_row=$db->update($query);
			             if ($update_row) {
			                echo("<span class='success'> message sent in the seen box!</span>"); 
			             }else{
			                 echo("<span class='success'> message not sent !</span>"); 
			             }
					}
				 ?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Name</th>
							<th>Email</th>
							<th>Message</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php 
					$query="select * from contact where status='0' order by contactid desc";
					$msg=$db->select($query);
					if ($msg) {
						$i=0;
						while ($result=$msg->fetch_assoc()) {
							$i++;
						
					 ?>
						<tr class="odd gradeX">
							<td><?php echo($i) ;?></td>
							<td><?php echo($result['name']) ;?></td>
							<td><?php echo($result['email']); ?></td>
							<td><?php echo($fm->textShorten($result['body'],30)); ?></td>
							<td><?php echo($fm->formatDate($result['date'])); ?></td>
							<td>
							<a href="viewmsg.php?vmsgid=<?php echo($result['contactid']); ?>">View</a> ||
							<a href="replaymsg.php?rmsgid=<?php echo($result['contactid']); ?>">Replay</a>||
							<a onclick=" return confirm('Are you sue to sent msg in the seen box!');" href="?seenid=<?php echo($result['contactid']); ?>">Seen</a>
							</td>
						</tr>
						<?php }} ?>
					</tbody>
				</table>
               </div>
            </div>
            <div class="box round first grid">
                <h2>Seen Message</h2>
                <?php 
                if (isset($_GET['delid'])) {
                	$delid=$_GET['delid'];
                	$delquery="delete from contact where contactid='$delid'";
                	$deldmsg=$db->delete($delquery);
                	if ($deldmsg) {
                       echo("<span class='success'> message deleted successfully!</span>"); 
                    }else{
                       echo("<span class='success'> message not deleted !</span>"); 
                    }
                }
                 ?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Name</th>
							<th>Email</th>
							<th>Message</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php 
					$query="select * from contact where status='1' order by contactid desc";
					$msg=$db->select($query);
					if ($msg) {
						$i=0;
						while ($result=$msg->fetch_assoc()) {
							$i++;
						
					 ?>
						<tr class="odd gradeX">
							<td><?php echo($i) ;?></td>
							<td><?php echo($result['name']) ;?></td>
							<td><?php echo($result['email']); ?></td>
							<td><?php echo($fm->textShorten($result['body'],30)); ?></td>
							<td><?php echo($fm->formatDate($result['date'])); ?></td>
							<td>
							<a href="viewmsg.php?vmsgid=<?php echo($result['contactid']); ?>">View</a> ||
							<a onclick=" return confirm('Are you sue to delete msg from the seened box!');" href="?delid=<?php echo($result['contactid']); ?>">Delete</a> 
						
							</td>
						</tr>
						<?php }} ?>
					</tbody>
				</table>
				</table>
               </div>
            </div>
        </div>
<script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();

            $('.datatable').dataTable();
            setSidebarHeight();
        });
 </script>
 <?php include 'inc/footer.php';?>