		<?php 
		$filepath=realpath(dirname(__FILE__));
		include_once ($filepath.'/../lib/Database.php');
		include_once($filepath.'/../helpers/Format.php'); ?>
		 <?php 
class Course{
	private $db;
private $fm;

public function __construct(){
	$this->db=new Database();
	$this->fm=new Format();	
}
public function insertCoursesInfo($data,$file)
{

	
	$class=mysqli_real_escape_string($this->db->link,$data['class']);
	$title=mysqli_real_escape_string($this->db->link,$data['title']);
	$start=mysqli_real_escape_string($this->db->link,$data['start']);
	$end=mysqli_real_escape_string($this->db->link,$data['end']);
	$period=mysqli_real_escape_string($this->db->link,$data['period']);
	$p_time=mysqli_real_escape_string($this->db->link,$data['p_time']);
	$teacher_id=mysqli_real_escape_string($this->db->link,$data['teacher_id']);
	$students=mysqli_real_escape_string($this->db->link,$data['students']);
	$price=mysqli_real_escape_string($this->db->link,$data['price']);
	$started_at=mysqli_real_escape_string($this->db->link,$data['started_at']);
	$content=mysqli_real_escape_string($this->db->link,$data['content']);
	
	$image=mysqli_real_escape_string($this->db->link,$file['image']['name']);
	if ($class==""||$title==""||$start==""||$end==""||$period==""||$teacher_id==""||$students==""||$price==""||$started_at==""||$content==""||$image=="") {
		$_SESSION['error']= "<span class='error'> Field must not be empty </span>";
		return $this->redirect();
         }

     $duration=$start.'-'.$end;
     $period=$period.' '.$p_time;  
     $permited  = array('jpg', 'jpeg', 'png', 'gif');
	$file_name = $file['image']['name'];
	$file_size = $file['image']['size'];
	$file_temp = $file['image']['tmp_name'];
	$div = explode('.', $file_name);
	$file_ext = strtolower(end($div));
	$unique_image = uniqid() .'-'.rand(1,100).'.'.$file_ext;
	$uploaded_image = "upload/".$unique_image;

    if ($file_size >(1048567*2)) {
     $_SESSION['error']= "<span class='error'>Image Size should be less then 2MB!
     </span>";
     return $this->redirect();
    } elseif (in_array($file_ext, $permited) === false) {
     $_SESSION['error']="<span class='error'>You can upload only:-"
     .implode(', ', $permited)."</span>";
     return $this->redirect();
 	}else{
 	move_uploaded_file($file_temp, $uploaded_image);
 	 $query = "INSERT INTO courses(class,title,duration,period,admin_id,students,price,started_at,content,image)
    VALUES('$class','$title','$duration','$period','$teacher_id','$students','$price','$started_at','$content','$uploaded_image')";

    $courseInsert=$this->db->insert($query);
    if ($courseInsert) {
			$_SESSION['success']="<span class='success'>Course data insert successful plesde login</span>";
			return $this->redirect();
		}else{
			$_SESSION['error']="<span class='error'>Course data  not insert .</span>";
			return $this->redirect();
		}
 	}

}
public function coursesInfoUpdate($data,$file,$id)
{
	
	$class=mysqli_real_escape_string($this->db->link,$data['class']);
	$title=mysqli_real_escape_string($this->db->link,$data['title']);
	$start=mysqli_real_escape_string($this->db->link,$data['start']);
	$end=mysqli_real_escape_string($this->db->link,$data['end']);
	$period=mysqli_real_escape_string($this->db->link,$data['period']);
	$p_time=mysqli_real_escape_string($this->db->link,$data['p_time']);
	$teacher_id=mysqli_real_escape_string($this->db->link,$data['teacher_id']);
	$students=mysqli_real_escape_string($this->db->link,$data['students']);
	$price=mysqli_real_escape_string($this->db->link,$data['price']);
	$started_at=mysqli_real_escape_string($this->db->link,$data['started_at']);
	$content=mysqli_real_escape_string($this->db->link,$data['content']);
	$image=mysqli_real_escape_string($this->db->link,$file['image']['name']);
	if ($class==""||$title==""||$start==""||$end==""||$period==""||$teacher_id==""||$students==""||$price==""||$started_at==""||$content=="") {
		$_SESSION['error']= "<span class='error'> Field must not be empty </span>";
		return $this->redirect();
         }

     $duration=$start.'-'.$end;
     $period=$period.' '.$p_time;  
     $permited  = array('jpg', 'jpeg', 'png', 'gif');
	$courseUpdate='';
     if ($image!="") {
     	$file_name = $file['image']['name'];
	$file_size = $file['image']['size'];
	$file_temp = $file['image']['tmp_name'];
	$div = explode('.', $file_name);
	$file_ext = strtolower(end($div));
	$unique_image = uniqid() .'-'.rand(1,100).'.'.$file_ext;
	$uploaded_image = "upload/".$unique_image;

    if ($file_size >(1048567*2)) {
     echo "<span class='error'>Image Size should be less then 2MB!
     </span>";
    } elseif (in_array($file_ext, $permited) === false) {
     echo "<span class='error'>You can upload only:-"
     .implode(', ', $permited)."</span>";

 	}else{
 		
 	move_uploaded_file($file_temp, $uploaded_image);
    $query="update courses 
		    set
		    class   	  ='$class',
		    title         ='$title',
		    duration      ='$duration',
		    period        ='$period',
		    admin_id      ='$teacher_id',
		    students      ='$students',
		    price         ='$price',
		    started_at    ='$started_at',
		    content       ='$content',
		    image         ='$uploaded_image'
		    where id =$id";

	$courseUpdate=$this->db->update($query);
    
 	}
  }else{
  	
     $query="update courses 
		    set
		    class   	  ='$class',
		    title         ='$title',
		    duration      ='$duration',
		    period        ='$period',
		    admin_id      ='$teacher_id',
		    students      ='$students',
		    price         ='$price',
		    started_at    ='$started_at',
		    content       ='$content'
		    where id='$id'";

	$courseUpdate=$this->db->update($query);
  }
if ($courseUpdate) {
		$_SESSION['success']="<span class='success'>Course data insert successful plesde login</span>";
		return $this->redirect();
	}else{
		$_SESSION['error']="<span class='error'>Course data  not insert .</span>";
		return $this->redirect();
	}

}
public function getCourseById($id)
{
	
	$query="SELECT courses.*,admin.name,admin.subject FROM courses,admin WHERE courses.admin_id=admin.id AND courses.id=$id";
	$result=$this->db->select($query);
	return $result;
}
public function delCourseById($id){
$query="delete from courses where id='$id'";
$deldata=$this->db->delete($query);
if ($deldata) {
	$_SESSION['success']="<span class='success'>Course deleted successful</span>";
	return $this->redirect();
}else{
 		$_SESSION['error']="<span class='error'>Course  not deleted!</span>";
	return $this->redirect();
 	}
}
public function redirect()
{
	header('Location: ' . $_SERVER['HTTP_REFERER']);
		exit();
}
public function auth()
{
	$login= Session::get("userlogin");
	if ($login==false) {
	   header("Location:login.php");
	}
}
public function getAllCourses()
{
	$query="select * from courses order by id DESC";
 	$result=$this->db->select($query);
 	return $result;
}
public function getAllPopularCourses()
{
	$query="SELECT courses.* FROM courses LEFT JOIN rating ON rating.course_id=courses.id WHERE rating.rating >2 GROUP BY rating.course_id";
 	$result=$this->db->select($query);
 	return $result;
}
public function getAllTeachers()
{
	$query="SELECT * FROM admin WHERE role=1 ORDER BY RAND() LIMIT 4";
 	$result=$this->db->select($query);
 	return $result;
}
public function getCourseList()
{
	$query="select courses.*,admin.name,admin.subject,admin.image AS img from courses,admin where courses.admin_id=admin.id order by courses.id DESC";
 	$result=$this->db->select($query);
 	return $result;
}
public function getSingleCourseById($id)
{
	/*
	$query="select lesson.*,courses.* AS course,admin.name,admin.subject,admin.image AS img from lesson,courses,admin where courses.admin_id=admin.id order by courses.id DESC";
	$query="SELECT courses.*,admin.name,admin.subject,admin.image AS img
			FROM courses INNER JOIN admin
			ON courses.admin_id = admin.id 
			WHERE courses.class LIKE '%$class%' AND courses.id <>'$id'";
 	$class_result=$this->db->select($query);
	$query="SELECT lesson.*,courses.*,admin.name,admin.subject,admin.image AS img

			FROM lesson INNER JOIN courses

			ON lesson.course_id = courses.id

			INNER JOIN admin

			ON courses.admin_id = admin.id
			 WHERE lesson.course_id='$id'";
	 */

	$alldata=[];
	$query="SELECT DISTINCT(course_id) 
			FROM lesson 
			WHERE lesson.course_id='$id'";
 	$re=$this->db->select($query);
 	$course_id=false;
 	if ($re) {
 		$course=$re->fetch_assoc();
 		$course_id=$course['course_id'];
 	}

 	$query="SELECT class 
			FROM courses 
			WHERE id='$id'";
 	$cls=$this->db->select($query);
 	$class=false;
 	if ($cls) {
 		$clss=$cls->fetch_assoc();
 		$class=$clss['class'];
 	}
$query="SELECT courses.*,admin.name,admin.subject,admin.image AS img
			FROM courses INNER JOIN admin
			ON courses.admin_id = admin.id 
			WHERE courses.id <>'$id'";
 	$class_result=$this->db->select($query);
 	
 	$alldata['classes']=$class_result;

 	$query="SELECT courses.*,admin.name,admin.subject,admin.image AS img
			FROM courses INNER JOIN admin
			ON courses.admin_id = admin.id 
			WHERE courses.id='$course_id'";
 	$course_result=$this->db->select($query);
 	$alldata['course']=$course_result;
 	$query="SELECT lesson.*
			FROM lesson 
			WHERE lesson.course_id='$id'
			order by id ASC ";
			
 	$lesson_result=$this->db->select($query);
 	$alldata['lessons']=$lesson_result;
 	$query="SELECT lesson.*
			FROM lesson 
			WHERE lesson.course_id='$id'
			order by id ASC limit 0,1";
			
 	$lesson1_result=$this->db->select($query);
 	$alldata['lesson']=$lesson1_result;
 	$alldata['ratings']=$this->avg_rating($id);
 	$alldata['user_rating']=$this->course_rating($id);

 	return $alldata;
}
public function viewCourseLessonById($id)
{
	 $query="update lesson 
		    set
		    complete   	  =1
		    where lesson.course_id='$id' limit 1";

	$courseUpdate=$this->db->update($query);
	$alldata=[];
 	$query="SELECT courses.*,admin.name,admin.subject,admin.image AS img
			FROM courses INNER JOIN admin
			ON courses.admin_id = admin.id 
			WHERE courses.id='$id'";
 	$course_result=$this->db->select($query);
 	$alldata['course']=$course_result;
 	$query="SELECT lesson.*
			FROM lesson 
			WHERE lesson.course_id='$id'
			order by id ASC ";
			
 	$lesson_result=$this->db->select($query);
 	$alldata['lessons']=$lesson_result;
 	$query="SELECT lesson.*
			FROM lesson 
			WHERE lesson.course_id='$id' limit 0,1";
			
 	$lesson1_result=$this->db->select($query);
 	$alldata['lesson']=$lesson1_result;
 	$alldata['ratings']=$this->avg_rating($id);
 	$alldata['user_rating']=$this->course_rating($id);

 	return $alldata;
}
public function viewSingleLessonById($id,$lid)
{
	 $query="update lesson 
		    set
		    complete   	  =1
		    where id='$lid'";

	$courseUpdate=$this->db->update($query);
	$alldata=[];
 	$query="SELECT courses.*,admin.name,admin.subject,admin.image AS img
			FROM courses INNER JOIN admin
			ON courses.admin_id = admin.id 
			WHERE courses.id='$id'";
 	$course_result=$this->db->select($query);
 	$alldata['course']=$course_result;
 	$query="SELECT lesson.*
			FROM lesson 
			WHERE lesson.course_id='$id'
			order by id ASC ";
			
 	$lesson_result=$this->db->select($query);
 	$alldata['lessons']=$lesson_result;
 	$query="SELECT lesson.*
			FROM lesson 
			WHERE lesson.id='$lid' limit 0,1";
			
 	$lesson1_result=$this->db->select($query);
 	$alldata['lesson']=$lesson1_result;
 	$alldata['ratings']=$this->avg_rating($id);
 	$alldata['user_rating']=$this->course_rating($id);

 	return $alldata;
}
public function restart($id)
{
	 $query="update lesson 
		    set
		    complete   	  =0
		    where lesson.course_id='$id'";

	$courseUpdate=$this->db->update($query);
	
}
public function course_rating($id)
{
	//SELECT AVG(rating.rating) avg_rating,rating.rating AS use_rating,users.* FROM rating RIGHT JOIN users ON rating.user_id=users.id WHERE rating.course_id=1 GROUP BY rating.course_id
	//$query="SELECT AVG(rating.rating) avg_rating,users.* FROM rating,users WHERE rating.user_id=users.id AND rating.course_id='$id' GROUP BY rating.course_id";
	$query="SELECT rating.*,(SELECT AVG(rating)  FROM rating WHERE rating.course_id='$id') AS avg,users.* FROM rating LEFT JOIN users ON rating.user_id=users.id WHERE course_id='$id'";
 	$result=$this->db->select($query);
 	return $result;
}
public function avg_rating($id)
{
	//$query="SELECT AVG(rating.rating) avg FROM rating WHERE course_id=$id";
	$query="SELECT COUNT(user_id) as user_rating,(SELECT AVG(rating) FROM rating WHERE course_id='$id') as avg_rating FROM rating WHERE course_id='$id'";
 	$result=$this->db->select($query);
 	
 	return $result;
}
public function Rating($data)
{
	var_dump($data);
	die();
	$login= Session::get("userlogin");
	if ($login==false) {
	   header("Location:login.php");
	}
	$course_id=mysqli_real_escape_string($this->db->link,$data['course_id']);
	$user_id=Session::get("userId");
	//$name=mysqli_real_escape_string($this->db->link,$data['name']);
	//$email=mysqli_real_escape_string($this->db->link,$data['email']);
	$rating=mysqli_real_escape_string($this->db->link,$data['rating']);
	$review=mysqli_real_escape_string($this->db->link,$data['review']);
	if($rating==""||$review=="") {
		$_SESSION['error']="<span class='error'>Field must not be empty!</span>";
	return $this->redirect();
	}else{
	
	$query ="INSERT INTO rating(user_id,course_id,rating,review)
	              VALUES('$user_id','$course_id', '$rating','$review')";
	              $insertorde=$this->db->insert($query);
          $insertorde=$this->db->insert($query);
          if ($insertorde) {
          	$_SESSION['success']="<span class='success'>Rating added</span>";
	return $this->redirect();
	}else{
		$_SESSION['error']="<span class='error'>your rating not added.Please try again!</span>";
	return $this->redirect();
		
	}
		}
}

public function searchCourses($searchid)
{
	
	$query="(SELECT courses.id,title,students,price,courses.image,content,admin.name,admin.subject,admin.image AS img FROM courses LEFT JOIN admin ON courses.admin_id = admin.id WHERE class LIKE'%$searchid%' OR courses.title LIKE'%$searchid%'OR price LIKE'%$searchid%') UNION (SELECT courses.id,courses.title,courses.students,courses.price,courses.image,courses.content,admin.name,admin.subject,admin.image AS img FROM lesson LEFT JOIN courses ON lesson.course_id=courses.id LEFT JOIN admin ON courses.admin_id = admin.id WHERE lesson.title LIKE'%$searchid%')";

	$result=$this->db->select($query);
	return $result;
}

public function getStudentCourseList()
{
	$user_id=Session::get("userId");

	$query="SELECT courses.id,courses.title,courses.image FROM cus_order LEFT JOIN order_items ON order_items.order_id=cus_order.id LEFT JOIN courses ON courses.id=order_items.course_id  WHERE cus_order.user_id='$user_id'";
 	$result=$this->db->select($query);
 	return $result;
}
public function getStudentCourseLessonList($id)
{
	$query="SELECT COUNT(id) as row,(SELECT COUNT(complete) FROM lesson WHERE lesson.complete=1 AND lesson.course_id='$id') AS complete,(SELECT COUNT(complete) FROM lesson WHERE lesson.complete=0 AND lesson.course_id='$id') AS incomplete FROM lesson WHERE lesson.course_id='$id'";
 	$result=$this->db->select($query);
 	return $result;
}
public function getTeacherEnrollCourese()
{
	$admin_id=Session::get("user_id");

	$query="SELECT courses.*,admin.name
			FROM courses INNER JOIN admin
			ON courses.admin_id = admin.id 
			WHERE courses.admin_id='$admin_id'";
 	$result=$this->db->select($query);
 	return $result;
}























			public function catInsert($CatName){
				$CataName=$this->fm->validation($CatName);
				$CataName=mysqli_real_escape_string($this->db->link,$CataName);
				if (empty($CataName)) {
					$msg="<span class='success'>catagory field must not ve empty</span>";
					return $msg;	
			}else{
				$query="insert into category(catName) values('$CataName')";
				$catInsert=$this->db->insert($query);
				if ($catInsert) {
					$msg="<span class='success'>catagory insert successful</span>";
					return $msg;
				}else{
					$msg="<span class='error'>catagory  not insert .</span>";
					return $msg;
				}
			}
		 }
		 public function getAllCat(){
		 	$query="select * from category order by catId DESC";
		 	$result=$this->db->select($query);
		 	return $result;

		 }
		 public function getAllcity(){
		 	$query="select * from district order by id DESC";
		 	$result=$this->db->select($query);
		 	return $result;

		 }
		 public function getCatById($id){
		 	$query="select * from category where catId='$id'";
		 	$result=$this->db->select($query);
		 	return $result;
		 }
		 public function catUpdate($CatName,$id){
		 	$CataName=$this->fm->validation($CatName);
				$CataName=mysqli_real_escape_string($this->db->link,$CataName);
				$id=mysqli_real_escape_string($this->db->link,$id);
				if (empty($CataName)) {
					$msg="<span class='error'>catagory field must not be empty</span>";
					return $msg;

		 }else{
		 	$qury="update category set catName='$CataName' where catId='$id'";
		 	$update_row=$this->db->update($qury);
		 	if ($update_row) {
		 		$msg="<span class='success'>catagory updated successful</span>";
					return $msg;
		 	}else{
		 		$msg="<span class='error'>catagory  not updated!</span>";
					return $msg;
		 	}
		 }
		}
		public function delCatById($id){
			$query="delete from category where catId='$id'";
			$deldata=$this->db->delete($query);
			if ($deldata) {
				$msg="<span class='success'>catagory deleted successful</span>";
					return $msg;
		}else{
		 		$msg="<span class='error'>catagory  not deleted!</span>";
					return $msg;
		 	}
		}
		public function sliderInsert($data,$file)
		{
			
			// $pdata=$this->fm->validation($data);
					$title=mysqli_real_escape_string($this->db->link,$data['title']);
					$status=mysqli_real_escape_string($this->db->link,$data['status']);
					$homeimg=mysqli_real_escape_string($this->db->link,$file['homeimg']['name']);
					
					if ($title==""||$homeimg=="") {
						$msg="<span class='error'> field must not be empty</span>";
						return $msg;

			 		}
			 		$permited  = array('jpg', 'jpeg', 'png', 'gif');
				    $homeimg_name = $file['homeimg']['name'];
				    $homeimg_size = $file['homeimg']['size'];
				    $homeimg_temp = $file['homeimg']['tmp_name'];

				    $otherimg_name = $file['otherimg']['name'];
				    $otherimg_size = $file['otherimg']['size'];
				    $otherimg_temp = $file['otherimg']['tmp_name'];

				    $home_div = explode('.', $homeimg_name);
				    $other_div = explode('.', $otherimg_name);
				    $home_ext = strtolower(end($home_div));
				    $other_ext = strtolower(end($other_div));
				    $home_image =  uniqid() .'-'.rand(1,100).'.'.$home_ext;
				    $other_image =  uniqid() .'-'.rand(1,1000).'.'.$other_ext;
				    $upload_home_image = "upload/".$home_image;
				    $upload_other_image = "upload/".$other_image;

				if ($homeimg_size >(1048567*2)) {
			     echo "<span class='error'>Image Size should be less then 1MB!
			     </span>";
			    } elseif (in_array($home_ext, $permited) === false) {
			     echo "<span class='error'>You can upload only:-"
			     .implode(', ', $permited)."</span>";

			 	}else{
			 		if ($file['otherimg']['name']!=null) {
			 		move_uploaded_file($homeimg_temp, $upload_home_image);
			 		move_uploaded_file($otherimg_temp, $upload_other_image);
			 	 $query = "INSERT INTO slider(title,homeimg,otherimg,status)
			    VALUES('$title','$upload_home_image','$upload_other_image','$status')";

			    $productInsert=$this->db->insert($query);
					if ($productInsert) {
						
						return 'success';
					}else{
						$msg="<span class='error'>Product  not insert .</span>";
						return $msg;
					}
			 		}else{
			 		move_uploaded_file($homeimg_temp, $upload_home_image);
			 	 $query = "INSERT INTO slider(title,homeimg,status)
			    VALUES('$title','$upload_home_image','$status')";

			    $productInsert=$this->db->insert($query);
					if ($productInsert) {
						
						return 'success';
					}else{
						$msg="<span class='error'>Product  not insert .</span>";
						return $msg;
					}
			 	
			 		}
			 		
			 	}
		}
		public function getslider()
		{
			$query="select * from slider where status='active' order by id desc";
		 	$result=$this->db->select($query);
		 	return $result;
		}
		}
		  ?>