	<?php 
	$filepath=realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once($filepath.'/../helpers/Format.php'); 
	 ?>

	<?php 

	class Lesson  
	{
		private $db;
		private $fm;

		public function __construct(){
			$this->db=new Database();
			$this->fm=new Format();	
		}
	public function insertLessonInfo($data,$file){
		$title=mysqli_real_escape_string($this->db->link,$data['title']);
		$course_id=mysqli_real_escape_string($this->db->link,$data['course_id']);
		$url=mysqli_real_escape_string($this->db->link,$data['videourl']);
		$filepath=mysqli_real_escape_string($this->db->link,$file['filepath']['name']);
		$content=mysqli_real_escape_string($this->db->link,$data['content']);
		
		if ($title==""||$course_id==""||$url==""||$filepath==""||$content=="") {
			$_SESSION['error']= "<span class='error'> Field must not be empty </span>";
			return $this->rediret();
	         }
		$videoid=$this->getYouTubeVideoID($url);
		$duration=$this->getYoutubeDuration($videoid);
	    $permited  = array('pdf');
		$file_name = $file['filepath']['name'];
		$file_size = $file['filepath']['size'];
		$file_temp = $file['filepath']['tmp_name'];
		$div = explode('.', $file_name);
		$file_ext = strtolower(end($div));
		$unique_image = uniqid() .'-'.rand(1,100).'.'.$file_ext;
		$uploaded_image = "upload/pdf/".$unique_image;

	    if ($file_size >(1048567*2)) {
	     $_SESSION['error']= "<span class='error'>Image Size should be less then 2MB!
	     </span>";
	     return $this->rediret();
	    } elseif (in_array($file_ext, $permited) === false) {
	     $_SESSION['error']="<span class='error'>You can upload only:- "
	     .implode(', ', $permited)."file</span>";
	     return $this->rediret();
	 	}else{
	 	move_uploaded_file($file_temp, $uploaded_image);
	 	 $query = "INSERT INTO lesson(title,course_id,videourl,duration,pdfpath,content)
	    VALUES('$title','$course_id','$videoid','$duration','$uploaded_image','$content')";

	    $lessonInsert=$this->db->insert($query);
	    if ($lessonInsert) {
				$_SESSION['success']="<span class='success'>Lesson data insert successful plesde login</span>";
				return $this->rediret();
			}else{
				$_SESSION['error']="<span class='error'>Lesson data  not insert .</span>";
				return $this->rediret();
			}
	 	}

	}
public function getAllLesson(){
	$query="select lesson.*,courses.title AS name,courses.image from lesson,courses where lesson.course_id=courses.id order by lesson.id DESC";
 	$result=$this->db->select($query);
 	return $result;
}
public function getLessionById($id){
	$query="select * from lesson where id=$id";
 	$result=$this->db->select($query);
 	return $result;
}
public function updateLessonInfo($data,$file,$id)
{
	$title=mysqli_real_escape_string($this->db->link,$data['title']);
	$course_id=mysqli_real_escape_string($this->db->link,$data['course_id']);
	$url=mysqli_real_escape_string($this->db->link,$data['videourl']);
	$filepath=mysqli_real_escape_string($this->db->link,$file['filepath']['name']);
	$content=mysqli_real_escape_string($this->db->link,$data['content']);
	
	if ($title==""||$course_id==""||$url==""||$content=="") {
		$_SESSION['error']= "<span class='error'> Field must not be empty </span>";
		return $this->rediret();
         }
		$videoid=$this->getYouTubeVideoID($url);
		$duration=$this->getYoutubeDuration($videoid);
	    $permited  = array('pdf');
		
		$lessonUpdate='';
     if ($filepath!="") {
     	$file_name = $file['filepath']['name'];
		$file_size = $file['filepath']['size'];
		$file_temp = $file['filepath']['tmp_name'];
		$div = explode('.', $file_name);
		$file_ext = strtolower(end($div));
		$unique_image = uniqid() .'-'.rand(1,100).'.'.$file_ext;
		$uploaded_image = "upload/pdf/".$unique_image;

    if ($file_size >(1048567*2)) {
     echo "<span class='error'>Image Size should be less then 2MB!
     </span>";
    } elseif (in_array($file_ext, $permited) === false) {
     echo "<span class='error'>You can upload only:- "
     .implode(', ', $permited)."</span>";

 	}else{
 		
 	move_uploaded_file($file_temp, $uploaded_image);
    $query="update lesson 
		    set
		    title          ='$title',
		    course_id      ='$course_id',
		    videourl       ='$videoid',
		    duration       ='$duration',
		    pdfpath        ='$uploaded_image',
		    content        ='$content'
		    where id=$id";
	$lessonUpdate=$this->db->update($query);
    
 	}
  }else{
  	
     $query="update lesson 
		    set
		    title          ='$title',
		    course_id      ='$course_id',
		    videourl       ='$videoid',
		    duration       ='$duration',
		    content        ='$content'
		    where id=$id";

	$lessonUpdate=$this->db->update($query);
  }
if ($lessonUpdate) {
		$_SESSION['success']="<span class='success'>Course data updated successful plesde login</span>";
		return $this->rediret();
	}else{
		$_SESSION['error']="<span class='error'>Course data  not updated .</span>";
		return $this->rediret();
	}

}
public function delLessonById($id){
	$query="delete from lesson where id='$id'";
	$deldata=$this->db->delete($query);
	if ($deldata) {
		$_SESSION['success']="<span class='success'>Lesson deleted successful</span>";
		return $this->rediret();
	}else{
	 		$_SESSION['error']="<span class='error'>Lesson  not deleted!</span>";
		return $this->rediret();
	 	}
}
public function getYouTubeVideoID($url) {
	//AIzaSyDguqKVbN5avuwtSdLAe1It-59Coj0ATbk
   $url_parsed_arr = parse_url($url);
   if ($url_parsed_arr['host'] == "www.youtube.com" && $url_parsed_arr['path'] == "/watch" && substr($url_parsed_arr['query'], 0, 2) == "v=" && substr($url_parsed_arr['query'], 2) != "") {
      $queryString = parse_url($url, PHP_URL_QUERY);
    parse_str($queryString, $params);
    if (isset($params['v']) && strlen($params['v']) > 0) {
        return $params['v'];
    } else {
        return "";
    }
   } else {
      $_SESSION['error']="<span class='error'>Not a valid YouTube link</span>";
	return $this->rediret();
   }
    
}
function getYoutubeDuration($videoid) {
	 	require '../credential.php';
      	$api_key = API_KEY;
	  	$api_url = 'https://www.googleapis.com/youtube/v3/videos?part=snippet%2CcontentDetails%2Cstatistics&id=' .$videoid. '&key=' . $api_key;
        
  		$data = json_decode(file_get_contents($api_url));
  		$dration=$data->items[0]->contentDetails->duration;
  		 preg_match_all('/(\d+)/',$dration,$parts);
  		 var_dump($parts);
  		 $total_duration='';
  		 if (sizeof($parts[0])==2) {
  		 	$total_duration=$parts[0][0].":".$parts[0][1];
  		 } elseif (sizeof($parts[0])==1) {
  		 	$total_duration=$parts[0][0];
  		 }
  		 else {
  		 $total_duration=$parts[0][0].":".$parts[0][1].":".$parts[0][2];
  		 }
  		 
  		

      return $total_duration;
}
public function rediret(){
	header('Location: ' . $_SERVER['HTTP_REFERER']);
		exit();
}


	}
	 ?>