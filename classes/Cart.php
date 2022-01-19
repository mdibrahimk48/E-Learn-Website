<?php 
$filepath=realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once($filepath.'/../helpers/Format.php'); 
 ?>
<?php 
class Cart{
	private $db;
	private $fm;
	public function __construct(){
		$this->db=new Database();


		$this->fm=new Format();	
	}
public function addToCart($id){
	$this->auth();
 
	$user_id=Session::get("userId");
	$id=base64_decode(urldecode($id));
	//$_SESSION['error']="<span>Course successfully added to cart. </span>";
	//return $this->rediret();
	$id=$this->fm->validation($id);
	$id=mysqli_real_escape_string($this->db->link,$id);
	$sId=session_id();
	
	$query="select * from courses where id='$id'";
	$result=$this->db->select($query)->fetch_assoc();
	$students     = $result['students'];
	$take_course  = $result['take_course'];

	$chquery="select * from cart where course_id='$id' and session_id='$sId'";
	$getPro=$this->db->select($chquery);
	if ($getPro) {
		$_SESSION['error']="<span>Course already added to cart. </span>";
		return $this->rediret();
	}else{
		if ($students!=$take_course) {
			$query = "INSERT INTO cart(user_id,session_id,course_id)
					 VALUES('$user_id','$sId','$id')";
				$courseInsert=$this->db->insert($query);
				if ($courseInsert) {
					header("Location: cart.php");
				}else{
				header("Location: 404.php");
				}
		}else{
			$_SESSION['error']="<span>Course already fulfill.Please choose another course.</span>";
			return;
		}
 }
}
public function delProductByCart($delId){

	$delId=mysqli_real_escape_string($this->db->link,$delId);
	//echo($delId);//3ra4tde4g87a7mir6v7klcpdj7
	//die();
	$sId=session_id();
	
	$query="delete from cart where session_id='$sId' AND course_id='$delId'";
	$deldata=$this->db->delete($query);
	if ($deldata) {	
		header("Location:course-list.php");
	}else{
		$_SESSION['error']="<span>Course not remove from cart.Try again. </span>";
		return $this->rediret();
 	}
	}
public function courseRating($data)
{
	
	$course_id=mysqli_real_escape_string($this->db->link,$data['course_id']);
	$user_id=Session::get("userId");
	//$name=mysqli_real_escape_string($this->db->link,$data['name']);
	//$email=mysqli_real_escape_string($this->db->link,$data['email']);
	$rating=mysqli_real_escape_string($this->db->link,$data['rating']);
	$review=mysqli_real_escape_string($this->db->link,$data['review']);
	if($rating==""||$review=="") {
		$_SESSION['error-rating']="<span class='error'>Field must not be empty!</span>";
	return $this->rediret();
	}else{
	$query="select * from rating where user_id='$user_id' and course_id='$course_id'";
	$checkrating=$this->db->select($query);
	if ($checkrating) {
		$_SESSION['error-rating']="<span class='error'>Your rating already added to this subject!</span>";
	} else {
			$query ="INSERT INTO rating(user_id,course_id,rating,review)
	              VALUES('$user_id','$course_id', '$rating','$review')";
	              $insertorde=$this->db->insert($query);
          $insertorde=$this->db->insert($query);
          if ($insertorde) {
            $rating_id = mysqli_insert_id($this->db->link);
            $query="delete from rating where id ='$rating_id' LIMIT 1";
		$deldata=$this->db->delete($query);

        $_SESSION['success-rating']="<span class='success'>Rating added</span>";
	return;
	}else{
		$_SESSION['error-rating']="<span class='error'>your rating not added.Please try again!</span>";
	return $this->rediret();
		
	}

	}
	
	
 }
}
public function product_rating($id)
{
	$query="SELECT AVG(rating.rating) avg FROM rating WHERE product_id=$id";
 	$result=$this->db->select($query);
 	return $result;
}
public function course_rating($id)
{
	$query="SELECT AVG(rating.rating) avg_rating,users.* FROM rating,users WHERE rating.user_id=users.id AND rating.course_id='$id' GROUP BY rating.course_id";
 	$result=$this->db->select($query);
 	return $result;
}
public function auth()
{
	$login= Session::get("userlogin");
	if ($login==false) {
	   header("Location:login.php");
	}
}
public function rediret()
{
	header('Location: ' . $_SERVER['HTTP_REFERER']);
		exit();
}
	public function getCartProduct(){
		$this->auth();
		$sId=session_id();
		$user_id=(int)Session::get("userId");
		//$query="select *,courses.* from cart,courses where cart.course_id=courses.id AND session_id='$sId'";
		$query="SELECT cart.*,courses.*
			FROM cart LEFT JOIN courses
			ON cart.course_id = courses.id 
			WHERE cart.user_id='$user_id'";
 	$result=$this->db->select($query);
 	return $result;
	}
	public function checkCartTable(){
		$sId=session_id();
		$query="select * from cart where session_id='$sId'";
		$result=$this->db->select($query);
		return $result;
	}
	public function delUserCart(){
		$sId=session_id();
		$query="delete from cart where session_id='$sId'";
		$this->db->delete($query);
	}

	public function insertBillingAddress($data,$id)
	{
		//var_dump($data);
			//die();
        $sId=session_id();
		$uid=mysqli_real_escape_string($this->db->link,$id);
		$name=mysqli_real_escape_string($this->db->link,$data['name']);
		$mobile=mysqli_real_escape_string($this->db->link,$data['mobile']);
		$email=mysqli_real_escape_string($this->db->link,$data['email']);
		$city=mysqli_real_escape_string($this->db->link,$data['city']);
		$zipcode=mysqli_real_escape_string($this->db->link,$data['zipcode']);
		$address=mysqli_real_escape_string($this->db->link,$data['address']);
		$payment=mysqli_real_escape_string($this->db->link,$data['payment']);
		$transactionid=mysqli_real_escape_string($this->db->link,$data['transactionid']);
		if ($name==""||$mobile==""||$email==""||$city==""||$zipcode==""||$address==""||$payment==""||($payment==='Bkash'? ($transactionid==null?true:false) : false)){
			$_SESSION['error']="<span>Field must not be empty </span>";
			return $this->rediret();

         }elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
		 	$_SESSION['error']="<span>Invalid Email Address!</span>";
			return $this->rediret();

		 }elseif (!preg_match('/^[0-9]{11}+$/', $mobile)) {
		 	$_SESSION['error']="<span>Invaild mobile number</span>";
			return $this->rediret();
	 	}else{
             $query = "INSERT INTO address(name,mobile,email,city,zipcode,address)
                VALUES('$name','$mobile','$email','$city','$zipcode', '$address')";

             $addressInsert=$this->db->insert($query);
             if ($addressInsert) {
             	$address_id = mysqli_insert_id($this->db->link);
             	

             	$totalAmount=$data['amount'];
             	$totalSum=0;
             	$order_id=0;
				$query = "INSERT INTO cus_order( user_id ,address_id,amount,payment_type,transaction_id)
              VALUES('$uid','$address_id','$totalAmount','$payment','$transactionid')";
              	$insertCustomerorde=$this->db->insert($query);

              	if ($insertCustomerorde) {
              		$oid = mysqli_insert_id($this->db->link);
              		$query="select * from cus_order where id='$oid'";
					$getordid=$this->db->select($query)->fetch_assoc();
					$_SESSION['order_id']=$getordid['id'];
				$query="select * from cart where session_id='$sId'";
				$getdata=$this->db->select($query);

              	
				while ($result=$getdata->fetch_assoc()) {
					
				
		      	$course_id=$result['course_id'];
				
				$order_id=$_SESSION['order_id'];
				$query="select * from courses where id='$course_id'";
				$result=$this->db->select($query)->fetch_assoc();
				$take_course = $result['take_course'];
				$ucourse=$take_course+1;
				$qury="update courses set take_course='$ucourse' where id='$course_id'";
 	            $update_row=$this->db->update($qury);

 	            $query = "INSERT INTO order_items( order_id ,course_id)
              VALUES('$order_id','$course_id')";
              	$insertorde=$this->db->insert($query);

				$query="delete from cart where session_id='$sId'";
				$delcart=$this->db->delete($query);

				if ($insertorde) {
					
            	echo("<script>window.location='success.php?smid=$uid & orderId=$order_id';</script>");
            
         		 }

 	          }
 	      }
             	
             }
             
             }

	}
	public function orderProduct($uid){
		$sId=session_id();
		$query="select * from cart where sId='$sId'";
		$result=$this->db->select($query)->fetch_assoc();
		      $productId=$result['productId'];
				$productId=$result['productId'];
				$productName=$result['productName'];
				$quantity=$result['quantity'];
				$price=$result['price']*$quantity;
				$image=$result['image'];
				$vat=$price* .1;
				$total=$price+$vat;

				$query="select * from product where productId='$productId'";
				$result=$this->db->select($query)->fetch_assoc();
				$qty = $result['quantity'];
				$uqty=$qty-$quantity;
				$qury="update product set quantity='$uqty' where productId='$productId'";
 	            $update_row=$this->db->update($qury);

 	            $query="SELECT * FROM users WHERE role='0'";
				$re=$this->db->select($query)->fetch_assoc();
				$fromadminEmail=$re['email'];
				//return $fromadminEmail;

 	            $query="select * from users where userId='$uid'";
				$result=$this->db->select($query)->fetch_assoc();
				$name=$result['name'];
				$to=$result['email'];
				$subject="Your Purchased Details";
				$message="Welcome to visit our website & thankyou for purchasing";
				 include 'mailSender.php';
				 $mail->setFrom($fromadminEmail, 'BD Online Shop & Services');
		         $mail->addReplyTo($fromadminEmail, 'BD Online Shop & Services');
		         $mail->Subject = $subject;
		       	 $mail->Body = 'Dear '.$name.','.$message.'.Your total payable amount(including vat) : '.$total.' We will contact you withing 2 days with delivery details. Thank You.';
		       	 	$mail->addAddress($to, $name);
		       	 	// if(!$mail->send()) {
		          //  echo("<script>alert('Message could not be sent');</script>");
		          //   echo 'Mailer Error: ' . $mail->ErrorInfo;
		          //   } else {
		          //   	echo("<script>alert('Message has been sent');</script>");
 	            $query = "INSERT INTO payment( userId ,productId,quantity,total_amount)
              VALUES('$uid','$productId','$quantity','$price')";
              $insertorde=$this->db->insert($query);

				$query = "INSERT INTO cus_order( userId ,productId,productName,quantity,price,image)
              VALUES('$uid','$productId','$productName','$quantity','$price', '$image')";
              $insertorde=$this->db->insert($query);

              	$sId=session_id();
				$query="delete from cart where sId='$sId'";
				$delcart=$this->db->delete($query);

				 $query="SELECT MAX(orderId) AS id FROM cus_order";
				$result=$this->db->select($query)->fetch_assoc();
				$orderId=$result['id'];
				if ($insertorde) {
            	echo("<script>window.location='success.php?smid=$uid & orderId=$orderId';</script>");
            //}
          }
			
		
	}
	// dummy code for dummy function
	// public function getlastid(){
 //      $query="SELECT MAX(orderId) AS id FROM cus_order";
 //      $result=$this->db->select($query);
 //      //$result=$result['roll'];
 //      return $result; 
	// }



	public function payableAmount($smid,$oid){
		$sId=session_id();
		$query="select amount from cus_order where cusId='$smid' AND orderId='$oid'";
 	$result=$this->db->select($query);
 	return $result;
	}
	public function getOrderProduct($uid){
		$query="SELECT cus_order.orderId,cus_order.status,order_items.* FROM cus_order,order_items WHERE cus_order.orderId=order_items.order_id AND cus_order.cusId='$uid' AND cus_order.status!='3' order BY cus_order.date DESC";
 	$result=$this->db->select($query);
 	return $result;

	}
	public function checkOrder($uid){
	
		$query="select * from cus_order where userId='$uid'";
		$result=$this->db->select($query);
		return $result;
	}
	public function getAllProduct(){
		$query="select * from cus_order order by date desc";
		$result=$this->db->select($query);
		return $result;
	}
	public function getDeliveryProduct(){
		$query="select * from pro_delivery";
		$result=$this->db->select($query);
		return $result;
	}
	public function getSpecificProduct($id){
		$query="select * from cus_order where orderId='$id'";
		$result=$this->db->select($query);
		return $result;
	}
	public function productShift($id,$time,$price){
		$id=mysqli_real_escape_string($this->db->link,$id);
		$time=mysqli_real_escape_string($this->db->link,$time);
		$price=mysqli_real_escape_string($this->db->link,$price);
		$qury="update cus_order set status='1' where  	userId ='$id' and date ='$time' and price ='$price' ";
 	$update_row=$this->db->update($qury);
 	if ($update_row) {
 		$msg="<span class='success'> updated successful</span>";
			return $msg;
 	}else{
 		$msg="<span class='error'>  not updated!</span>";
			return $msg;
 	}
	}
	public function delShiftedOrder($id,$time,$price){
		$id=mysqli_real_escape_string($this->db->link,$id);
		$time=mysqli_real_escape_string($this->db->link,$time);
		$price=mysqli_real_escape_string($this->db->link,$price);
		$query="delete from cus_order where userId ='$id' and date ='$time' and price ='$price'";
	$deldata=$this->db->delete($query);
	if ($deldata) {
		$msg="<span class='success'>data deleted successful</span>";
			return $msg;
}else{
 		$msg="<span class='error'>data  not deleted!</span>";
			return $msg;
 	}
	}
	public function productShiftConfirm($id,$time,$price){
		$id=mysqli_real_escape_string($this->db->link,$id);
		$time=mysqli_real_escape_string($this->db->link,$time);
		$price=mysqli_real_escape_string($this->db->link,$price);
		$qury="update cus_order set status='2' where  	userId ='$id' and date ='$time' and price ='$price' ";
 	$update_row=$this->db->update($qury);
 	if ($update_row) {
 		$msg="<span class='success'> updated successful</span>";
			return $msg;
 	}else{
 		$msg="<span class='error'>  not updated!</span>";
			return $msg;
 	}
	}
	public function insertService($data){
	
		$order_id=$this->fm->validation($data['order_id']);
		$user_id=$this->fm->validation($data['user_id']);
		$delivery_date=$this->fm->validation($data['delivery_date']);
		
		$order_id=mysqli_real_escape_string($this->db->link,$order_id);
		$user_id=mysqli_real_escape_string($this->db->link,$user_id);
		$delivery_date=mysqli_real_escape_string($this->db->link,$delivery_date);
        if ($user_id==""||$delivery_date=="") {
				$msg="<span class='error'> field must not be empty</span>";
				return $msg;

	 }else{
	 	$query="select * from delivery_order where order_id='$order_id'";
         $retruser=$this->db->select($query);
         if ($retruser) {
         	$msg="<span> This order already assigned</span>";
         	return $msg;
 	}
        

	 	$upquery="UPDATE cus_order SET status='1' where orderId='$order_id'";
        $deluserdata=$this->db->update($upquery);
	 	 $query = "INSERT INTO delivery_order(order_id,user_id,delivery_date)
       VALUES('$order_id','$user_id','$delivery_date')";

    	$productInsert=$this->db->insert($query);

		if ($productInsert) {
 		$msg="<span class='success'> Insert successful</span>";
			return 'success';
 	}else{
 		$msg="<span class='error'>  Not Insert!</span>";
			return $msg;
 	}


	 }

		if (empty($delivery)) {
			$msg="<span class='error'> Date Field must not be empty!</span>";
			return $msg;
		}elseif (empty($serviceman)) {
			$msg="<span class='error'>Service & Date Field must not be empty!</span>";
			return $msg;
		}else{

		 $query = "INSERT INTO pro_delivery(orderId,productName,quantity,price, 	total_amount,serviceman,delivery_date)
       VALUES('$orderId','$productName','$quantity','$price','$amount', '$serviceman','$delivery')";

    $productInsert=$this->db->insert($query);
		if ($productInsert) {
 		$msg="<span class='success'> Insert successful</span>";
			return $msg;
 	}else{
 		$msg="<span class='error'>  Not Insert!</span>";
			return $msg;
 	}
	 }
	}
	
}
 ?>