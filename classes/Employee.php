<?php
$filepath=realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once($filepath.'/../helpers/Format.php');  
 ?>
<?php 
class Employee {
	private $db;
	private $fm;
	public function __construct()
	{
		$this->db=new Database();
		$this->fm=new Format();
	}
	public function addEmployee($data){
 			$name=$this->fm->validation($data['name']);
	        $eid=$this->fm->validation($data['eid']);
	       $userName=$this->fm->validation($data['typeofuser']);
	        $email=$this->fm->validation($data['email']);
	       $password=$this->fm->validation(md5($data['password']));
	        $role=$this->fm->validation($data['role']);
	        $name=mysqli_real_escape_string($this->db->link,$name);
	        $eid=mysqli_real_escape_string($this->db->link,$eid);
	        $userName=mysqli_real_escape_string($this->db->link,$userName);
	        $email=mysqli_real_escape_string($this->db->link,$email);
	        $password=mysqli_real_escape_string($this->db->link,$password);
	        $role=mysqli_real_escape_string($this->db->link,$role);
	        if (empty($userName)|| empty($password)||empty($password)||empty($email)||empty($name)||empty($eid)) {
	            $logmsg="<span class='error'>field must not be empty!</span>";
	            return $logmsg;
	        }elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
	         $logmsg="<span class='error'>invalid email!</span>";
	         return $logmsg;
	        }else{
	            $mailquery="select * from users where email='$email' limit 1";
	           $checkmail=$this->db->select($mailquery);
	         
	         if ($checkmail !=false) {
	            $logmsg="<span class='error'>email already exists!</span>";
	             return $logmsg;
	         } else{
	         	 $mailquery="select * from users where employeeid='$eid' limit 1";
	           $checkmail=$this->db->select($mailquery);
	         
	         if ($checkmail !=false) {
	            $logmsg="<span class='error'>Enter Unique ID!</span>";
	             return $logmsg;
	         } else{
	            $query="insert into users(name,employeeid,email,password,typeofuser,role) values('$name','$eid','$email','$password','$userName','$role')";
	             $empnsert=$this->db->insert($query);
	             if ($empnsert) {
	              $logmsg="<span class='success'> user inserted successfully!</span>";
	              return 'success'; 
	             }else{
	                 $logmsg="<span class='success'> user not inserted !</span>"; 
	                 return $logmsg;
	             }
	         }
	         }
	        }
	    

	}

	public function ProfileUpdate($data,$file,$adminid,$adminRole){
		 $name=$this->fm->validation($data['name']);
        $typeofuser=$this->fm->validation($data['typeofuser']);
        $email=$this->fm->validation($data['email']);
        $details=$this->fm->validation($data['details']);
         $name=mysqli_real_escape_string($this->db->link,$name);
        $typeofuser=mysqli_real_escape_string($this->db->link,$typeofuser);
        $email=mysqli_real_escape_string($this->db->link,$email);
        $details=mysqli_real_escape_string($this->db->link,$details);
        
    	$permited  = array('jpg', 'jpeg', 'png', 'gif');
	    $file_name = $file['image']['name'];
	    $file_size = $file['image']['size'];
	    $file_temp = $file['image']['tmp_name'];

    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
    $uploaded_image = "upload/".$unique_image;
		if ($name==""||$typeofuser==""||$email==""||$details=="") {
			$msg="<span class='error'> field must not be empty</span>";
			return $msg;

 }else{
 	if (!empty($file_name)) {
 		
 	
 if ($file_size >1048567) {
     echo "<span class='error'>Image Size should be less then 1MB!
     </span>";
    } elseif (in_array($file_ext, $permited) === false) {
     echo "<span class='error'>You can upload only:-"
     .implode(', ', $permited)."</span>";

 }else{
 	 move_uploaded_file($file_temp, $uploaded_image);
    $query="update users
             set
              name='$name',
              typeofuser='$typeofuser',
              email='$email',
              image='$uploaded_image',
              address='$details'
              where userId='$adminid'";
    $updated_rows = $this->db->update($query);    
    
		if ($updated_rows) {
			$msg="<span class='success'>User updated Successfully.     </span>";
			return $msg;
		}else{
			$msg="<span class='error'>User Not updated !</span>";
			return $msg;
		}

 }
}else{
    $query="update users
             set
              name='$name',
              typeofuser='$typeofuser',
              email='$email',
              address='$details'
              where userId='$adminid'";
    $updated_rows = $this->db->update($query);    
		if ($updated_rows) {
			$msg="<span class='success'>User updated Successfully.     </span>";
			return $msg;
		}else{
			$msg="<span class='error'>User Not updated !</span>";
			return $msg;
		}


 }

 }
	}
	public function attendanceInsert($data,$attend=array()){
		  //  $userId=$this->fm->validation($data['userId']);
 			// $name=$this->fm->validation($data['name']);
	        // $attend=$this->fm->validation($data['attend']);
	        // $attend=array();
	       $txtDate=$this->fm->validation($data['txtDate']);
	        if (empty($txtDate)) {
	            $logmsg="<span class='error'>Date missing!</span>";
	            return $logmsg;
	        }

	        $query="select distinct att_date from attend";
			$getdata=$this->db->select($query) ;
			if ($getdata==true) {
				
			while ($result=$getdata->fetch_assoc()) {

				$data=$result['att_date'];
				if ($txtDate==$data) {
					$msg="<div class='alert alert-danger'><strong>Error!</strong>attendance already taken today </div>";
			     return $msg;
				}
			}
		}
		//$insertatn="";
			foreach ($attend as $atn_key => $atn_value) {
			if ($atn_value=="present") {
				$userId="";
				$name="";
				$query="select * from users where employeeid='$atn_key'";
			   $getdata=$this->db->select($query);
			   if ($getdata==true) {
			   	$getdata=$getdata->fetch_assoc() ;
			   $userId= $getdata['userId'];
			   $name=$getdata['name'];
			}
				$query="insert into attend(userId,name,roll,attend,att_date) values('$userId','$name','$atn_key','present','$txtDate')";
				$insertatn=$this->db->insert($query);
			
			}elseif ($atn_value=="absent") {
				$userID="";
				$Name="";
				$query="select * from users where employeeid='$atn_key'";
			   $getdata=$this->db->select($query) ;
			   if ($getdata==true) {
			   	$getdata=$getdata->fetch_assoc() ;
			   $userID= $getdata['userId'];
			   $Name=$getdata['name'];
			}
				$query="insert into attend(userId,name,roll,attend,att_date) values('$userID','$Name','$atn_key','absent','$txtDate')";
				$insertatn=$this->db->insert($query);
			
					}

				}
			if ($insertatn) {
		 	$msg="<div class='alert alert-success'><strong>Success!</strong>attendance data inserted successfully</div>";
		     return $msg;
		 }else{
		 	$msg="<div class='alert alert-danger'><strong>Error!</strong> attendance data not inserted </div>";
		     return $msg;
		 }

	}
	public function updateAttend($dt,$attend){
		foreach ($attend as $atn_key => $atn_value) {
			if ($atn_value=="present") {
				$query="update attend
				         set attend='present'
				          where roll='".$atn_key."' and att_date='".$dt."'";
				$updatedata=$this->db->update($query);
			}elseif ($atn_value=="absent") {
				$query="update attend
				         set attend='absent'
				          where roll='".$atn_key."' and att_date='".$dt."'";
				$updatedata=$this->db->update($query);
			}

		}
		if ($updatedata) {
		 	$msg="<div class='alert alert-success'><strong>Success!</strong>attendance data updated successfully</div>";
		     return $msg;
		 }else{
		 	$msg="<div class='alert alert-danger'><strong>Error!</strong> attendance data not updated </div>";
		     return $msg;
		 }

	}
	public function getAttendById($date,$eid){
		$query="select * from attend where DATE_FORMAT(att_date,'%m')='$date' and roll='$eid'";
		$result=$this->db->select($query);
		if ($result) {
			return $result;
		}else{
			$msg=false;
			return $msg;
		}
         
	}
	public function getDate(){
		$query="select distinct att_date from attend";
		$result=$this->db->select($query);
         return $result;
	}
	public function getAllDate($dt){
		$query="select * from attend where att_date='$dt'";
		$result=$this->db->select($query);
         return $result;
	}
	public function employeeList(){
	$query="select * from users where typeofuser!='general' order by userId desc";
	$allusers=$this->db->select($query);
	return $allusers;
     }
     public function getEmployeeList(){
	$query="select * from users order by userId desc";
	$allusers=$this->db->select($query);
	return $allusers;
     }
     public function viewEmployee($vuserid){
     	 $query="select * from users where userId='$vuserid'";
         $retruser=$this->db->select($query);
         return $retruser;
     }
     public function deleteEmployee($deluid,$bid){
     	$deluserdata='';
     	if ($bid==0) {
     	$delquery="UPDATE users SET block='1' where userId='$deluid'";
        $deluserdata=$this->db->update($delquery);
     	} else {
     		$delquery="UPDATE users SET block='0' where userId='$deluid'";
        	$deluserdata=$this->db->update($delquery);
     	}
     	
     	
        if ($deluserdata) {
           $msg="<span class='success'> user block successfully!</span>";
           return $msg; 
        }else{
          $msg="<span class='success'> user not block !</span>"; 
          return $msg;
        }
     }
     public function UserList(){
	$query="select * from users where typeofuser ='general' order by userId desc";
	$allusers=$this->db->select($query);
	return $allusers;
     }
      public function getServiceMan(){
	$query="select * from users where role='2'";
	$allusers=$this->db->select($query);
	return $allusers;
     }

}
 ?>