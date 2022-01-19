<?php 
$filepath=realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once($filepath.'/../helpers/Format.php'); 
require_once './vendor/autoload.php';
require 'credential.php';
 ?>
<?php 
class User{
	private $db;
	private $fm;
	public function __construct(){
		$this->db=new Database();
		$this->fm=new Format();	

	}
	public function userRegtration($data){
		
		$name=mysqli_real_escape_string($this->db->link,$data['name']);
		$email=mysqli_real_escape_string($this->db->link,$data['email']);
		$mobile=mysqli_real_escape_string($this->db->link,$data['mobile']);
		$school=mysqli_real_escape_string($this->db->link,$data['school']);
		$class=mysqli_real_escape_string($this->db->link,$data['class']);
		$password=mysqli_real_escape_string($this->db->link,$data['password']);

		$password2=mysqli_real_escape_string($this->db->link,$data['confirm-password']);
		$gender=mysqli_real_escape_string($this->db->link,$data['gender']);
		$address=mysqli_real_escape_string($this->db->link,$data['address']);
		$typeofuser="General";
		if ($name==""||$email==""||$mobile==""||$school==""||$class==""||$password==""||$password2==""||$address=="") {
			$_SESSION['error']= "<span class='error'> field must not be empty </span>";
			return $this->rediret();
             }
             if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
		         $_SESSION['error']="<span class='error'>Invalid Email</span>";
		        return $this->rediret();
	        }
             if ($password!=$password2) {
             	$_SESSION['error']= "<span>Password not matched </span>";
				return $this->rediret();
             }
             if (!preg_match('/^[0-9]{11}+$/', $mobile)) {
             	$_SESSION['error']= "<span>Invalid number.only accept 11 digit number</span>";
				return $this->rediret();
             }
             $query="SELECT id  FROM users ORDER BY id DESC LIMIT 0,1";
             $lastId=$this->db->select($query)->fetch_assoc();
             $student_id=$class.'-'.($lastId['id']+1);
             
             $eml="select * from users where email='$email' limit 1";
             $emlcheck=$this->db->select($eml);
             if ($emlcheck <> false){
             	$_SESSION['error']="<span class='error'>Email  already exist !</span>";
				return $this->rediret();
             }

             $mailquery="select * from users where mobile='$mobile' limit 1";
             $mailcheck=$this->db->select($mailquery);
             if ($mailcheck <> false) {
             	$_SESSION['error']="<span class='error'>Mobile number already exist !</span>";
				return $this->rediret();
             }else{
             	$pass=md5($password);

             	$subject="Student Login ID";
           		 $message="Your name is " .$name.  " and ID "  .$student_id.  " plz visit website to login using the ID.";
            
			
            // Create the Transport
            $transport = (new Swift_SmtpTransport('smtp.gmail.com', 587,'tls'))
              ->setUsername(EMAIL)
              ->setPassword(PASS)
            ;

            // Create the Mailer using your created Transport
            $mailer = new Swift_Mailer($transport);

            // Create a message
            $message = (new Swift_Message($subject))
              ->setFrom([EMAIL => 'Student Login ID'])
              ->setTo([$email])
              ->setBody($message)
              ;
              $result = $mailer->send($message);
              if(!$result) {
                $_SESSION['error']="<span class='error'>Message could not be sent.Please try again</span>";
				return $this->rediret();
                
            } else {
            	$query = "INSERT INTO users(name,student_id,mobile,school,class,email,password,gender,address)
                VALUES('$name','$student_id','$mobile','$school','$class','$email', '$pass','$gender','$address')";

             $UserInsert=$this->db->insert($query);
				if ($UserInsert) {
					$_SESSION['success']="<span class='success'>user data insert successful plesde login</span>";
					return $this->rediret();
				}else{
					$_SESSION['error']="<span class='error'>user data  not insert .</span>";
					return $this->rediret();
				}
            }
             	
             }


	}
	public function rediret()
	{
		header('Location: ' . $_SERVER['HTTP_REFERER']);
			exit;
	}
	public function userLogin($ldata){
		$student_id=mysqli_real_escape_string($this->db->link,$ldata['student_id']);
		$password=mysqli_real_escape_string($this->db->link,md5($ldata['password']));
		if (empty($student_id)||empty($password)){
			$_SESSION['error']="<span>Field must not be empty</span>";
			return $this->rediret();
		}
		$query = "select * from users where student_id='$student_id' AND password='$password'";
		$result=$this->db->select($query);
		if ($result!=false) {
			$value=$result->fetch_assoc();
			Session::set("userlogin",true);
			Session::set("userId",$value['id']);
			Session::set("student_id",$value['student_id']);
			Session::set("userName",$value['name']);
			Session::set("userEmail",$value['email']);
			Session::set("userImg",$value['img']);
			header("Location: course-list.php");
		}else{
			$_SESSION['error']= "<span class='error'> email or password not matched! </span>";
			return $this->rediret();
		}

	}
	public function getUserData($id){
		$query="select * from address where id=$id";
		$result=$this->db->select($query);
		return $result;
	}
	public function updateUserData($data,$id){
		$name=mysqli_real_escape_string($this->db->link,$data['name']);
		$address=mysqli_real_escape_string($this->db->link,$data['address']);
		$city=mysqli_real_escape_string($this->db->link,$data['city']);
		$country=mysqli_real_escape_string($this->db->link,$data['country']);
		$zip=mysqli_real_escape_string($this->db->link,$data['zip']);
		$phone=mysqli_real_escape_string($this->db->link,$data['phone']);
		$email=mysqli_real_escape_string($this->db->link,$data['email']);
		if ($name==""||$address==""||$city==""||$country==""||$zip==""||$phone==""||$email=="") {
			$msg= "<span class='error'> field must not be empty </span>";
			return $msg;

             }else{

             $qury="update users 
             set 
             name='$name', 
             address='$address',
             city='$city',
             country='$country',
             zip='$zip',
             phone='$phone',
             email='$email'
             where userId='$id'";
 	$update_row=$this->db->update($qury);
 	if ($update_row) {
 		$msg="<span class='success'>user profile updated successful</span>";
			return $msg;
 	}else{
 		$msg="<span class='error'>user profile  not updated!</span>";
			return $msg;
 	}
             }


	}

	
	public function insertBillingAddress($data,$id)
	{
		//var_dump($data);
			//die();

		$id=mysqli_real_escape_string($this->db->link,$id);
		$name=mysqli_real_escape_string($this->db->link,$data['name']);
		$mobile=mysqli_real_escape_string($this->db->link,$data['mobile']);
		$email=mysqli_real_escape_string($this->db->link,$data['email']);
		$city=mysqli_real_escape_string($this->db->link,$data['city']);
		$zipcode=mysqli_real_escape_string($this->db->link,$data['zipcode']);
		$address=mysqli_real_escape_string($this->db->link,$data['address']);
		$payment=mysqli_real_escape_string($this->db->link,$data['payment']);
		$transactionid=mysqli_real_escape_string($this->db->link,$data['transactionid']);
		if ($name==""||$mobile==""||$email==""||$city==""||$zipcode==""||$address==""||$payment==""||($payment==='Bkash'? ($transactionid==null?true:false) : false)){
			$msg= "<span class='error'> field must not be empty </span>";
			return $msg;

             }else{
             	
             $qury="update users 
             set 
             name='$name', 
             address='$address',
             city='$city',
             country='$country',
             zip='$zip',
             phone='$phone',
             email='$email'
             where userId='$id'";
 	$update_row=$this->db->update($qury);
 	if ($update_row) {
 		$msg="<span class='success'>user profile updated successful</span>";
			return $msg;
 	}else{
 		$msg="<span class='error'>user profile  not updated!</span>";
			return $msg;
 	}
             }

	}
	public function getUserProfileData()
	{
		$adminid=Session::get("adminId");
		$adminRole=Session::get("adminRole");
		$query="select * from users where userId='$adminid' and role='$adminRole'";
         $result=$this->db->select($query);
         return $result;
	}
	public function updateUserProfile($data)
	{
		$adminid=Session::get("adminId");
		$adminRole=Session::get("adminRole");
	  $name=$this->fm->validation($data['name']);
      $typeofuser=$this->fm->validation($data['typeofuser']);
      $email=$this->fm->validation($data['email']);
      $details=$this->fm->validation($data['details']);
      
      $name=mysqli_real_escape_string($this->db->link,$name);
      $typeofuser=mysqli_real_escape_string($this->db->link,$typeofuser);
      $email=mysqli_real_escape_string($this->db->link,$email);
      $details=mysqli_real_escape_string($this->db->link,$details);
      $query="update users
               set
                name='$name',
                typeofuser='$typeofuser',
                email='$email',
                address='$details'
                where userId='$adminid' and role='$adminRole'";
      $updated_rows =$this->db->update($query);   
      Session::set("adminName",$name); 
      
      if ($updated_rows) {  
      	header("location: userprofile.php");
        // $msg ="<span class='success'>User updated Successfully.     </span>";    
     	return $msg;
      }else {   
        $msg= "<span class='error'>User Not updated !</span>"; 
        return $msg;  
       }
	}
public function changeUserAccount($data,$file)
	{
		
			$name=mysqli_real_escape_string($this->db->link,$data['name']);
			$mobile=mysqli_real_escape_string($this->db->link,$data['mobile']);
			$email=mysqli_real_escape_string($this->db->link,$data['email']);
			$image=mysqli_real_escape_string($this->db->link,$file['image']['name']);
			if ($name==""||$mobile=="") {
				$_SESSION['error']= "<span class='error'> Field must not be empty </span>";
				return $this->rediret();
	             }
	             if (!preg_match('/^[0-9]{11}+$/', $mobile)) {
	             	$_SESSION['error']= "<span>Invalid number.only accept 11 digit number</span>";
					return $this->rediret();
	             }
	             
		        if ($email!="") {
		        	if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
			         $_SESSION['error']="<span class='error'>Invalid Email</span>";
			        return $this->rediret();
		        }
		        	$mailquery="select * from admin where email='$email' limit 1";
	             $mailcheck=$this->db->select($mailquery);
		        if ($mailcheck <> false) {
		        	$mailcheck=$this->db->select($mailquery)->fetch_assoc();
	             if (Session::get("userEmail")==$mailcheck['email']) {
	             	$_SESSION['error']="<span class='error'>Email already exist !</span>";
					return $this->rediret();
	             }
		        } 
		        } else {
		        	$email=Session::get("userEmail");
		        }
		        
				$user_id=Session::get("userId");
		        $permited  = array('jpg', 'jpeg', 'png', 'gif');
				$userUpdate='';
			     if ($image!="") {
			     	$file_name = $file['image']['name'];
				$file_size = $file['image']['size'];
				$file_temp = $file['image']['tmp_name'];
				$div = explode('.', $file_name);
				$file_ext = strtolower(end($div));
				$unique_image = uniqid() .'-'.rand(1,100).'.'.$file_ext;
				$uploaded_image = "upload/user/".$unique_image;
			    if ($file_size >(1048567*2)) {
			     echo "<span class='error'>Image Size should be less then 2MB!
			     </span>";
			    } elseif (in_array($file_ext, $permited) === false) {
			     echo "<span class='error'>You can upload only:-"
			     .implode(', ', $permited)."</span>";

			 	}else{
			 		
			 	move_uploaded_file($file_temp, $uploaded_image);
			    $query="update users 
					    set
					    name   	  	   ='$name',
					    mobile         ='$mobile',
					    email      	   ='$email',
					    img          ='$uploaded_image'
					    where id =$user_id";

				$userUpdate=$this->db->update($query);
			    Session::set("userImg",$uploaded_image);
			 	}
			  }else{
			    $query="update users 
					    set
					    name   	  	   ='$name',
					    mobile         ='$mobile',
					    email      	   ='$email'
					    where id =$user_id";

				$userUpdate=$this->db->update($query);

			  }
			if ($userUpdate) {
				$_SESSION['success']="<span class='success'>User data update successfully</span>";
				return $this->rediret();
			}else{
				$_SESSION['error']="<span class='error'>User data  not update .</span>";
				return $this->rediret();
			}

		}
public function changePassword($data)
	{

		$old_pass=$this->fm->validation($data['old-pass']);
       $new_pass=$this->fm->validation($data['new-pass']);
        $old_pass=mysqli_real_escape_string($this->db->link,$old_pass);
        $new_pass=mysqli_real_escape_string($this->db->link,$new_pass);
	 if ($old_pass=="" ||$new_pass=="") {
          $_SESSION['error']= "<span class='error'> Field must not be empty </span>";
				return $this->rediret();
       }else{
       	$old=md5($old_pass);
       	$new=md5( $new_pass);
       	$adminid=Session::get("userId");
        $query="select * from users where id='$adminid'";
        $result=$this->db->select($query)->fetch_assoc();
        $pass=$result['password'];
        if ($pass!=$old) {
        	$_SESSION['error']="<span class='error'>Password not match.</span>";
				return $this->rediret();
        }else{
            $query="update users
                 set
                  password='$new'
                 where id='$adminid'";
          $updated_rows = $this->db->update($query);  
          if ( $updated_rows) {
               $_SESSION['success']="<span class='success'>Password Updated successfully</span>";
				return $this->rediret();
            }else{

                $_SESSION['error']="<span class='error'>Password Not Updated .</span>";
				return $this->rediret();
            }  
        }
    }
	}
	public function contactUs($data)
	{
		$name=$this->fm->validation($data['name']);
		$subject=$this->fm->validation($data['subject']);
		$email=$this->fm->validation($data['email']);
		$name=mysqli_real_escape_string($this->db->link,$name);
		$subject=mysqli_real_escape_string($this->db->link,$subject);
		$email=mysqli_real_escape_string($this->db->link,$email);
		$body=mysqli_real_escape_string($this->db->link,$data['message']);
	 if (empty($name)) {
	 	$_SESSION['error']="<span class='error'>name must not be empty</span>";
		return $this->rediret();
	 }elseif (!filter_var($name,FILTER_SANITIZE_SPECIAL_CHARS)) {
	 	$_SESSION['error']="<span class='error'>Invalid Name!</span>";
		return $this->rediret();
	 } elseif (empty($subject)) {
	 	$_SESSION['error']="<span class='error'>subject must not be empty</span>";
		return $this->rediret();
	 }elseif (empty($email)) {
	 	$_SESSION['error']="<span class='error'>emaile must not be empty</span>";
		return $this->rediret();
	 }elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
	 	$_SESSION['error']="<span class='error'>Invalid Email Address!</span>";
		return $this->rediret();
	 }elseif (empty($body)) {
	 	$_SESSION['error']="<span class='error'>message field must not be empty</span>";
		return $this->rediret();
	 }else{
	 	 $query = "INSERT INTO contact(name,subject,email,body)   
           VALUES('$name','$subject','$email','$body')";  
        $inserted_rows = $this->db->insert($query);    
        if ($inserted_rows) { 
        $_SESSION['success']="<span class='error'>message send successfully</span>"; 
        }else { 
        $_SESSION['error']="<span class='error'>message not send</span>";
        return $this->rediret();  
         }
	 }
	 
	}
	public function getAllComments()
	{
		$query = "select * from contact where status ='0' order by contactid desc";
		$result=$this->db->select($query);
		return $result;
	}
	public function getSingleComment($id)
	{
		 $query="select * from contact where contactid=$id";
		$result=$this->db->select($query);
		return $result;
	}
	public function passRecovery($data)
	{
		$email=$this->fm->validation($data['email']);
		$email=mysqli_real_escape_string($this->db->link,$email);
		 if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
         $_SESSION['error']="<span class='error'>Invalid Email</span>";
        return $this->rediret();
        }else{
		 $mailquery="select * from users where email='$email' limit 1";
         $checkmail=$this->db->select($mailquery);
		if ($checkmail !=false) {
			$userid='';
         	$name='';
			while ($value=$checkmail->fetch_assoc()) {
				$userid=$value['id'];
				$name=$value['name'];
			}
			$rand=rand(10000,99999);
		    $newpass="$userid$rand";
		    $pass=md5($newpass);
		    $subject="your password";
            $message="Your name is " .$name.  " and Password "  .$newpass.  " plz visit website to login.";
            // Create the Transport
            $transport = (new Swift_SmtpTransport('smtp.gmail.com', 587,'tls'))
              ->setUsername(EMAIL)
              ->setPassword(PASS)
            ;

            // Create the Mailer using your created Transport
            $mailer = new Swift_Mailer($transport);

            // Create a message
            $message = (new Swift_Message($subject))
              ->setFrom([EMAIL => 'Recovery password'])
              ->setTo([$email])
              ->setBody($message)
              ;

             

            // Send the message
            $result = $mailer->send($message);
            if(!$result) {
            $_SESSION['error']="<span class='error'>Message could not be sent.Try again</span>";
       		return $this->rediret();
            } else {
            	$query="update users
                    set
                     password='$pass'
                     where id='$userid'";
            	 $updated_row=$this->db->update($query);

             $_SESSION['success']="<span class='error'>Password recover success.Please chceck your email to login </span>";
       		return $this->rediret();
            }
			
          }else{
          $_SESSION['error']="<span class='error'>Email not exist!</span>";
       		return $this->rediret();
	  }
	}
	}
}
 ?>