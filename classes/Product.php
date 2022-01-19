	<?php 
	$filepath=realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once($filepath.'/../helpers/Format.php'); 
	 ?>
	<?php 

	class Product{
		
		private $db;
		private $fm;

		public function __construct(){
			$this->db=new Database();
			$this->fm=new Format();	
		}
		public function productInsert($data,$files){
			
			// $pdata=$this->fm->validation($data);
			$productName=mysqli_real_escape_string($this->db->link,$data['productName']);
			$cat_id=mysqli_real_escape_string($this->db->link,$data['catId']);
			$clr=mysqli_real_escape_string($this->db->link,$data['color'][0]);
			$product_size=mysqli_real_escape_string($this->db->link,$data['size'][0]);
			$body=mysqli_real_escape_string($this->db->link,$data['body']);
			$price=mysqli_real_escape_string($this->db->link,$data['price']);
			$qty=mysqli_real_escape_string($this->db->link,$data['qty']);
			$city=mysqli_real_escape_string($this->db->link,$data['city']);
			$status=mysqli_real_escape_string($this->db->link,$data['status']);

			if ($productName==""||$cat_id==""||$clr==""||$product_size==""||$body==""||$price==""||$city=="" ||$qty==""||$status=="") {
				$msg="<span class='error'> field must not be empty</span>";
				return $msg;

	 		}
			$colors=[];
			$sizes=[];
			foreach($data['color'] as  $color) {
				$colors[]=$color;
			}
			$colorName=implode(",",$colors);
			foreach($data['size'] as  $sz) {
				$sizes[]=$sz;
			}
			$size=implode(",",$sizes);
			$images=[];
			$allowed = array('gif', 'png', 'jpg', 'jpeg'); //Extensions which are allowed
			//loop to get individual element from the array
			foreach($files['image']['name'] as $position => $file_name) {
	 			$file_tmp = $files['image']['tmp_name'][$position];//path location
	             $file_size = $files['image']['size'][$position];
	             $file_error = $files['image']['error'][$position];

		    $div = explode('.', $file_name);//explode file name from dot(.)
		    $file_ext = strtolower(end($div));//store extensions in the variable
		   $unique_image = uniqid() .'-'.rand($position,100).'.'.$file_ext;
		    $uploaded_image = "upload/".$unique_image;//Declaring Path for uploaded images

			    if ($file_size <=(1048576*7)) {        //7MB
			    	if(in_array($file_ext, $allowed)){
			    		   if($file_error === 0) {
			    		   	move_uploaded_file($file_tmp, $uploaded_image);
			    			$images[]=$uploaded_image;
			    		   }else{
			    		   	$msg="<span class='error'>errored with code:-"
						     .$file_error."</span>";
						      return $msg;
					   		 break;
			    		   }    		
				    	}else{
			    	$msg="<span class='error'>You can upload only:-"
				     .implode(', ', $allowed)."</span>";
				      return $msg;
			   		 break;
	     	
			    	}
			    }else{
			    $msg="<span class='error'>Image Size should be less then 7MB!
			     </span>";
			     return $msg;
			    break;
			    }
	 		}
	 		
	 		$image=implode(",",$images);
	 		$query = "INSERT INTO product(productName,cat_id,colorName,cityName,size,body,price,qty,image,status)
	   		 VALUES('$productName','$cat_id','$colorName','$city','$size','$body','$price','$qty','$images[0]','$status')";

	     	$productInsert=$this->db->insert($query);
	     	if ($productInsert) {
				
				$msg="<span class='success'>product insert successful</span>";
					return $msg;
				}else{
					$msg="<span class='error'>Product  not insert .</span>";
					return $msg;
				}
				/*
	     	if ($productInsert) {
				$last_id = mysqli_insert_id($this->db->link);
				$imgInsert='';
				foreach ($images as $key => $img) {
					if ($key!=0) {
						$query = "INSERT INTO multi_img(product_id,alt_img)
				   		 VALUES('$last_id','$img')";
				   		$imgInsert=$this->db->insert($query);
					}


	 			}
	 			if ($imgInsert) {
				
				$msg="<span class='success'>product insert successful</span>";
					return $msg;
				}else{
					$msg="<span class='error'>Product  not insert .</span>";
					return $msg;
				}
			}	
			*/
			
		}

	public function mm(){
	$lowStockSql = "SELECT * FROM product";
	$lowStockQuery = $this->db->select($lowStockSql);
	$re = $lowStockQuery->num_rows;
	if ($re<=4){
	$lowStockSql ="SELECT * FROM product WHERE quantity <= 4";
	$lowStockQuery = $this->db->select($lowStockSql);

	return $lowStockQuery;
	}
	// $connect->close();
	}
	public function getAllOrders()
	{
		$query= "SELECT * FROM cus_order order by orderId desc";
    	$result=$this->db->select($query);
    	return $result;
	}
	public function getAllDelivery()
	{
		$adminid=Session::get("adminId");
		$adminid=5;
		$query= "SELECT id, delivery_date, cus_order.* FROM delivery_order,cus_order 
		WHERE delivery_order.order_id=cus_order.orderId AND status='1' AND delivery_order.user_id='$adminid'";
    	$result=$this->db->select($query);
    	
    	
    	return $result;
	}
	public function updateDelivery($id)
	{
		$upquery="UPDATE cus_order SET status='2' where orderId='$id'";
        $deluserdata=$this->db->update($upquery);
	}
	public function deleteOrder($value)
	{
		$delquery="delete from cus_order where orderId='$value'";
		$delquery=$this->db->delete($delquery);
		if ($delquery) {
			$msg="<span class='success'>data deleted successful</span>";
			return $msg;
		}else{
			$msg="<span class='error'>data  not deleted!</span>";
			return $msg;
		}
	}
	public function getAllOrderItems($id)
	{
		$item=(int)$id;
		$query="SELECT * FROM order_items WHERE order_id=$item";
	 	$result=$this->db->select($query);
	 	return $result;
		
	}
		public function getAllProduct(){
			$query="SELECT * FROM product,category WHERE product.cat_id=category.catId order by product.id desc";
			// $query="select * from product order by productId DESC";
			$result=$this->db->select($query);
			return $result;
		}
		public function getAllLowerProduct(){
			$query="select p.*,c.catName,b.brandName
			from product as p,category as c,brand as b
			where p.catId=c.catId and p.brandId=b.brandId and p.quantity <=4
			order by p.productId desc";
			// $query="select * from product order by productId DESC";
			$result=$this->db->select($query);
			return $result;
		}
		public function getPdById($id){
			$query="SELECT * FROM product,category WHERE product.cat_id=category.catId AND product.id='$id'";
	 	$result=$this->db->select($query);
	 	return $result;
		}
		public function productUpdate($data,$files,$id){
			

			$productName=mysqli_real_escape_string($this->db->link,$data['productName']);
			$cat_id=mysqli_real_escape_string($this->db->link,$data['catId']);
			$clr=mysqli_real_escape_string($this->db->link,$data['color'][0]);
			$product_size=mysqli_real_escape_string($this->db->link,$data['size'][0]);
			$body=mysqli_real_escape_string($this->db->link,$data['body']);
			$price=mysqli_real_escape_string($this->db->link,$data['price']);
			$qty=mysqli_real_escape_string($this->db->link,$data['qty']);
			$city=mysqli_real_escape_string($this->db->link,$data['city']);
			$status=mysqli_real_escape_string($this->db->link,$data['status']);

			if ($productName==""||$cat_id==""||$clr==""||$product_size==""||$body==""||$price==""||$city=="" ||$qty==""||$status=="") {
				$msg="<span class='error'> field must not be empty</span>";
				return $msg;

	 		}

			$colors=[];
			$sizes=[];
			foreach($data['color'] as  $color) {
				$colors[]=$color;
			}
			$colorName=implode(",",$colors);
			foreach($data['size'] as  $sz) {
				$sizes[]=$sz;
			}
			$size=implode(",",$sizes);
			$images=[];
			$allowed = array('gif', 'png', 'jpg', 'jpeg'); //Extensions which are allowed
			//loop to get individual element from the array
			if ($files['image']['name'][0]) {
			foreach($files['image']['name'] as $position => $file_name) {
	 			$file_tmp = $files['image']['tmp_name'][$position];//path location
	             $file_size = $files['image']['size'][$position];
	             $file_error = $files['image']['error'][$position];

		    $div = explode('.', $file_name);//explode file name from dot(.)
		    $file_ext = strtolower(end($div));//store extensions in the variable
		   $unique_image = uniqid() .'-'.rand($position,100).'.'.$file_ext;
		    $uploaded_image = "upload/".$unique_image;//Declaring Path for uploaded images

			    if ($file_size <=(1048576*7)) {        //7MB
			    	if(in_array($file_ext, $allowed)){
			    		   if($file_error === 0) {
			    		   	move_uploaded_file($file_tmp, $uploaded_image);
			    			$images[]=$uploaded_image;
			    		   }else{
			    		   	$msg="<span class='error'>errored with code:-"
						     .$file_error."</span>";
						      return $msg;
					   		 break;
			    		   }    		
				    	}else{
			    	$msg="<span class='error'>You can upload only:-"
				     .implode(', ', $allowed)."</span>";
				      return $msg;
			   		 break;
	     	
			    	}
			    }else{
			    $msg="<span class='error'>Image Size should be less then 7MB!
			     </span>";
			     return $msg;
			    break;
			    }
	 		}
	 		
	 			
	 			$image=implode(",",$images);
	 			$query="update product 
				    set
				    productName   ='$productName',
				    cat_id        ='$cat_id',
				    colorName     ='$colorName',
				    cityName      ='$city',
				    size          ='$size',
				    body          ='$body',
				    price         ='$price',
				    qty           ='$qty',
				    image         ='$images[0]',
				    status        ='$status'
				    where id=$id";

			$productUpdate=$this->db->update($query);
	 		
	     	if ($productUpdate) {
					return 'success';
				}else{
					$msg="<span class='error'>Product  not insert .</span>";
					return $msg;
				}
	 		} else {
	 			 $query="update product 
				    set
				    productName   ='$productName',
				    cat_id        ='$cat_id',
				    colorName     ='$colorName',
				    cityName      ='$city',
				    size          ='$size',
				    body          ='$body',
				    price         ='$price',
				    qty           ='$qty',
				    status        ='$status'
				    where id= $id";

			$productUpdate=$this->db->update($query);
			if ($productUpdate) {
				
				
					return 'success';
				}else{
					$msg="<span class='error'>Product  not insert .</span>";
					return $msg;
				}
	 		}
	 		
	 		
		}
		public function searchProduct($searchid){
		   $query="(SELECT id,productName,body,price,image AS img FROM product WHERE productName LIKE'%$searchid%' AND status='active') UNION (SELECT id,productName,body,price,image AS img FROM category AS c,product AS p WHERE p.cat_id=c.catId AND catName LIKE'%$searchid%' AND status='active') UNION (SELECT id,productName,body,price,image AS img FROM product WHERE colorName LIKE'%$searchid%' AND status='active') UNION (SELECT id,productName,body,price,image AS img FROM product WHERE size LIKE'%$searchid%' AND status='active')";

			$result=$this->db->select($query);
			return $result;
	 
		}
		public function delPdById($id){
			$query="select * from product where id='$id'";
			$getData=$this->db->select($query);
			if ($getData) {
				while ($delImg=$getData->fetch_assoc()) {
					$delLink=$delImg['image'];
					unlink($delLink);
				}
			}
			$delquery="delete from product where id='$id'";
			$delquery=$this->db->delete($delquery);
			if ($delquery) {
				return 'success';
	        }else{
	 		$msg="<span>product  not deleted!</span>";
				return $msg;
	 	        }
		}
		public function getFeaturedProduct(){
			$query="select * from product where type='0' order by productId DESC limit 4";
	 	$result=$this->db->select($query);
	 	return $result;

		}
		public function getNewProduct(){
			$query="select * from product where status='active'  order by id DESC limit 12";
	 	$result=$this->db->select($query);
	 	return $result;
		}
		public function course_rating($id)
		{
			$query="SELECT AVG(rating.rating) avg_rating,users.* FROM rating,users WHERE rating.user_id=users.id AND rating.course_id=1 GROUP BY rating.course_id";
			$query="SELECT AVG(rating.rating) avg FROM rating WHERE product_id=$id";
		 	$result=$this->db->select($query);
		 	
		 	return $result;
		}
		public function getAllProducts(){
			$query="select * from product where status='active'  order by id DESC";
	 	$result=$this->db->select($query);
	 	return $result;
		}
		public function getSingleProduct($id){
			$idd=(int)$id;
		$query="select p.*,c.catName
		from product as p,category as c
		where p.cat_id=c.catId and p.id=$idd";
		//$query="select * from product where product.id='$id'";
	 	$result=$this->db->select($query);

	 	return $result;
		}
		public function getMultiImg($id){
		$idd=(int)$id;
		$query="select * from multi_img where multi_img.product_id=$idd";
	 	$result=$this->db->select($query);
	 	return $result;
		}
		public function latestAcer(){
			$query="select * from product where brandId='4'  order by productId DESC limit 1";
	 	$result=$this->db->select($query);
	 	return $result;
		}
		public function latestFromIphone(){
			$query="select * from product where brandId='2'  order by productId DESC limit 1";
	 	$result=$this->db->select($query);
	 	return $result;
		}
		public function latestFromSamsung(){
			$query="select * from product where brandId='1'  order by productId DESC limit 1";
	 	$result=$this->db->select($query);
	 	return $result;
		}
		public function latestCanon(){
			$query="select * from product where brandId='5'  order by productId DESC limit 1";
	 	$result=$this->db->select($query);
	 	return $result;
		}
		public function productByCat($id){
			$catId=mysqli_real_escape_string($this->db->link,$id);
			$id=(int)$catId;
			$query="select * from product where cat_id=$id";
	 	$result=$this->db->select($query);
	 	return $result;
		}
		public function productByCity($id){
			$catId=mysqli_real_escape_string($this->db->link,$id);
			$id=(string)$catId;
			
			$query="select * from product where cityName LIKE'%$id%'";
	 	$result=$this->db->select($query);
	 	
	 	return $result;
		}
		public function insertCompareData($productId,$userId){
			$login= Session::get("userlogin");
			if ($login==false) {
			   header("Location:login.php");
			}
			$userId=mysqli_real_escape_string($this->db->link,$userId);
			$productId=mysqli_real_escape_string($this->db->link,$productId);
			$comQuery="select * from compare where cusId ='$userId' and productId='$productId' ";
			$comCheck=$this->db->select($comQuery);
			if ($comCheck) {
				$msg="<span class='success'>Already Added </span>";
				return $msg;
			}
			$uId=(int)$userId;
			$query="select * from product where id='$productId'";
			$getProduct=$this->db->select($query);
			if ($getProduct) {
				while ($result=$getProduct->fetch_assoc()) {
					$productId=$result['id'];
					$productName=$result['productName'];
					$price=$result['price'];
					$image=$result['image'];

			$query ="INSERT INTO compare(cusId,productId,productName,price,image)
	              VALUES('$uId','$productId','$productName','$price', '$image')";
	              $insertorde=$this->db->insert($query);
	              if ($insertorde) {
				$msg="<span class='success'>Added to compare</span>";
				return $msg;
			}else{
				$msg="<span class='error'>not added</span>";
				return $msg;
			}
				}
			}
		}
		public function getComparedData($uid){
			/*$query="select c.*,p.*
			from compare as c,product as p
			where c.productId=p.id and c.cusId='$uid'";
			$result=$this->db->select($query);*/
			
			$query="select * from compare where cusId ='$uid' order by comId desc";
			$result=$this->db->select($query);
			return $result;
		}
		public function delCompareData($userid){
			$id=(int)$userid;
			$delquery="delete from compare where cusId=$id";
			$delquery=$this->db->delete($delquery);

		}
		public function saveWlistData($id,$userId){
			$login= Session::get("userlogin");
			if ($login==false) {
			   header("Location:login.php");
			}

			$comQuery="select * from wlist where cusId ='$userId' and productId='$id' ";
			$comCheck=$this->db->select($comQuery);
			if ($comCheck) {
				$msg="<span class='success'>Already Added </span>";
				return $msg;
			}
			$query="select * from product where id='$id'";
			$getProduct=$this->db->select($query);
			if ($getProduct) {
				while ($result=$getProduct->fetch_assoc()) {
					$productId=$result['id'];
					$productName=$result['productName'];
					$price=$result['price'];
					$image=$result['image'];

					$query = "INSERT INTO wlist(cusId,productId,productName,price,image)
	              VALUES('$userId','$productId','$productName','$price', '$image')";
	              $insertorde=$this->db->insert($query);
	              if ($insertorde) {
				$msg="<span class='success'>Added data wlist page</span>";
				return $msg;
			}else{
				$msg="<span class='error'>not added(wlist)</span>";
				return $msg;
			}
				}
			}
		}
		public function getkWlistData($uid){
			$query="select * from wlist where cusId ='$uid' order by wId desc";
			$result=$this->db->select($query);
			return $result;
		}
		public function delwlistData($uid,$productId){
			$delquery="delete from wlist where cusId='$uid' and productId='$productId'";
			$delquery=$this->db->delete($delquery);
		}

		public function getAllBrand(){
			$query="select p.*,c.catName,b.brandName
			from product as p,category as c,brand as b
			where p.catId=c.catId and p.brandId=b.brandId 
			order by productId  limit 4";
			// $query="select * from product order by productId DESC";
			$result=$this->db->select($query);
			return $result;

		}
		public function getAllBrandd(){
			$query="select p.*,c.catName,b.brandName
			from product as p,category as c,brand as b
			where p.catId=c.catId and p.brandId=b.brandId
			";
			// $query="select * from product order by productId DESC";
			$result=$this->db->select($query);
			return $result;

		}
		public function productRating($data)
		{
			$login= Session::get("userlogin");
			if ($login==false) {
			   header("Location:login.php");
			}
			$product_id=mysqli_real_escape_string($this->db->link,$data['product-id']);
			$user_id=mysqli_real_escape_string($this->db->link,$data['userId']);
			$name=mysqli_real_escape_string($this->db->link,$data['name']);
			$email=mysqli_real_escape_string($this->db->link,$data['email']);
			$rating=mysqli_real_escape_string($this->db->link,$data['rating']);
			$review=mysqli_real_escape_string($this->db->link,$data['review']);
			if($name==""||$email==""||$rating==""||$review=="") {
				$msg="<span class='error'> field must not be empty</span>";
				return $msg;
 
	 	}else{
			
	$query ="INSERT INTO rating(product_id,user_id,name,email,rating,review)
	              VALUES('$product_id','$user_id','$name','$email', '$rating','$review')";
	              $insertorde=$this->db->insert($query);
	              if ($insertorde) {
				$msg="<span class='success'>Rating added</span>";
				return $msg;
			}else{
				$msg="<span class='error'>not added</span>";
				return $msg;
			}
				}
		}
		public function getAllCity()
		{
			//$query="SELECT cityName FROM product  GROUP  BY cityName LIMIT 30";
			$query="SELECT DISTINCT cityName FROM product  ORDER   BY id DESC LIMIT 30";
			$result=$this->db->select($query);
			return $result;
		}
	}
	 ?>