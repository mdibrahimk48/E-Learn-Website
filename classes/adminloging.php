<?php
$filepath=realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once($filepath.'/../helpers/Format.php'); 
include_once '../lib/Session.php'; 
Session::init(); 
require_once '../vendor/autoload.php';
require 'credential.php';
 ?>
<?php 
class adminloging{
	private $db;
	private $fm;

	public function __construct(){
		$this->db=new Database();
		$this->fm=new Format();	
	}
		public function adminRegtration($data){
			

			$name=mysqli_real_escape_string($this->db->link,$data['name']);
			$mobile=mysqli_real_escape_string($this->db->link,$data['mobile']);
			$designation=mysqli_real_escape_string($this->db->link,$data['designation']);
			$gender=mysqli_real_escape_string($this->db->link,$data['gender']);
			$email=mysqli_real_escape_string($this->db->link,$data['email']);
			$password=mysqli_real_escape_string($this->db->link,$data['password']);

			$password2=mysqli_real_escape_string($this->db->link,$data['confirm-password']);
			$address=mysqli_real_escape_string($this->db->link,$data['address']);
			$typeofuser="General";
			if ($name==""||$mobile==""||$designation==""||$gender==""||$email==""||$password==""||$password2==""||$address=="") {
				$_SESSION['error']= "<span class='error'> Field must not be empty </span>";
				return $this->rediret();
	             }
	             if (!preg_match('/^[0-9]{11}+$/', $mobile)) {
	             	$_SESSION['error']= "<span>Invalid number.only accept 11 digit number</span>";
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
	             
	             
	             $mailquery="select * from admin where email='$email' limit 1";
	             $mailcheck=$this->db->select($mailquery);
	             if ($mailcheck <> false) {
	             	$_SESSION['error']="<span class='error'>Email number already exist !</span>";
					return $this->rediret();
	             }else{

             	 $query="SELECT id  FROM admin ORDER BY id DESC LIMIT 1";
	             $lastId=$this->db->select($query)->fetch_assoc();
	             $code=mt_rand(1,1000).'-'.($lastId['id']+1);

	             $pass=md5($password);
	             $subject="User Login Code";
           		 $message="Your name is " .$name.  " and Code "  .$code.  " plz verify your account to access using this code.";
            
			
            // Create the Transport
            $transport = (new Swift_SmtpTransport('smtp.gmail.com', 587,'tls'))
              ->setUsername(EMAIL)
              ->setPassword(PASS)
            ;

            // Create the Mailer using your created Transport
            $mailer = new Swift_Mailer($transport);

            // Create a message
            $message = (new Swift_Message($subject))
              ->setFrom([EMAIL => 'User Login Code'])
              ->setTo([$email])
              ->setBody($message)
              ;
              $result = $mailer->send($message);

              if(!$result) {
                $_SESSION['error']="<span class='error'>Message could not be sent.Please try again</span>";
				return $this->rediret();
                
            } else {
	             	$UserInsert='';
	             	if ($designation=='admin') {
	             		
	             	$query = "INSERT INTO admin(name,mobile,designation,gender,email,password,address,image,role,code)
	                VALUES('$name','$mobile','$designation','$gender','$email','$pass','$address','assets/images/github.png','0','$code')";

	             	$UserInsert=$this->db->insert($query);
	             	} else {
	             		$query = "INSERT INTO admin(name,mobile,designation,gender,email,password,address,image,role,code)
	                VALUES('$name','$mobile','$designation','$gender','$email','$pass','$address','assets/images/github.png','1','$code')";

	             	$UserInsert=$this->db->insert($query);
	             	}
	             	
				if ($UserInsert) {
					$_SESSION['success']="<span class='error'>Please check your email to verify account</span>";
					header("Location: verify.php");
					exit();
				}else{
					$_SESSION['error']="<span class='error'>user data  not insert .</span>";
					return $this->rediret();
				}
			}
	      }


}
public function verifyAccount($data)
{
	$code=$this->fm->validation($data['code']);
	if ($code=='') {
		$_SESSION['error']="<span>Field must not be empty</span>";
		return $this->rediret();
	}
	 $query="SELECT code  FROM admin WHERE code='$code' LIMIT 1";
	 if ($this->db->select($query)) {
	 $codeId=$this->db->select($query)->fetch_assoc();
	 	 $oldcode=$codeId['code'];
	 if ($code==$oldcode) {
	 	$null=NULL;
	 	$query="update admin
            set
             code='$null'
             where code='$code'";
    	 $this->db->update($query);
    	 $_SESSION['success']="<span>Your account is active.please login.</span>";
    	 header("Location: login.php");
    	 exit();
	 }else{
	 	$_SESSION['error']="<span>You enter wrong code.please check again.</span>";
		return $this->rediret();
	 }
	 } else {
	 	$_SESSION['error']="<span>You enter code does not exist.please check again.</span>";
		return $this->rediret();
	 }
	 
	
}
public function passRecovery($data)
	{
		$email=$this->fm->validation($data['email']);
		$email=mysqli_real_escape_string($this->db->link,$email);
		if ($email=="") {
			$_SESSION['error']="<span class='error'>Please Enter email address</span>";
        return $this->rediret();
		}
		 if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
         $_SESSION['error']="<span class='error'>Invalid Email</span>";
        return $this->rediret();
        }else{
		 $mailquery="select * from admin where email='$email' limit 1";
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
            	$query="update admin
                    set
                     password='$pass'
                     where id='$userid'";
            	 $updated_row=$this->db->update($query);

             $_SESSION['success']="<span class='error'>Password recover success.Please chceck your email to login </span>";
       		header("Location: login.php");
    		 exit();
            }
			
          }else{
          $_SESSION['error']="<span class='error'>Email not exist!</span>";
       		return $this->rediret();
	  }
	}
	}

	public function adminLogin($data){
		
		$email=$this->fm->validation($data['email']);
		$password=$this->fm->validation($data['password']);
		$designation=$this->fm->validation($data['designation']);
		$email=mysqli_real_escape_string($this->db->link,$email);
		$password=mysqli_real_escape_string($this->db->link,md5($password));
		if ($email==''||$password==''||$designation=='') {
			$_SESSION['error']="<span>Field must not be empty</span>";
			return $this->rediret();
		}else{
			$query="select * from admin where email='$email' and password='$password'";
			$result=$this->db->select($query);
			if ($result!=false) {
				$value=$result->fetch_assoc();
				Session::set("adminlogin",true);
				Session::set("user_id",$value['id']);
				Session::set("user_name",$value['name']);
				Session::set("user_role",$value['role']);
				Session::set("user_email",$value['email']);
				Session::set("user_img",$value['image']);
				Session::set("user_deg",$value['designation']);
				header("Location: dashboard.php");
				exit();
			}else{
				$_SESSION['error']= "<span class='error'> email or password not matched! </span>";
				return $this->rediret();
			}
		   }
        }
	public function getTeachersInfo()
	{
		$query="SELECT * FROM admin WHERE role='1' order by id DESC";
	 	$result=$this->db->select($query);
	 	return $result;
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
	             if (Session::get("user_email")==$mailcheck['email']) {
	             	$_SESSION['error']="<span class='error'>Email already exist !</span>";
					return $this->rediret();
	             }
		        } 
		        } else {
		        	$email=Session::get("user_email");
		        }
		        
		        
		        
	             

				$user_id=Session::get("user_id");
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
			    $query="update admin 
					    set
					    name   	  	   ='$name',
					    mobile         ='$mobile',
					    email      	   ='$email',
					    image          ='$uploaded_image'
					    where id =$user_id";

				$userUpdate=$this->db->update($query);
			    Session::set("user_img",$uploaded_image);
			 	}
			  }else{
			    $query="update admin 
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
       	$adminid=Session::get("user_id");
        $query="select * from admin where id='$adminid'";
        $result=$this->db->select($query)->fetch_assoc();
        $pass=$result['password'];
        if ($pass!=$old) {
        	$_SESSION['error']="<span class='error'>Password not match.</span>";
				return $this->rediret();
        }else{
            $query="update admin
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
public function rediret()
{
	header('Location: ' . $_SERVER['HTTP_REFERER']);
		exit();
}
	}
	 ?>