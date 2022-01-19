<?php 
$filepath=realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once($filepath.'/../helpers/Format.php'); 
 ?>
 <?php
 
  class Report{
  	private $database;
	private $formatm;
	public function __construct(){

		$this->database=new Database();
		$this->formatm=new Format();	
	}
	public function getMonthStatic($year){
		 $query="SELECT date , SUM(amount) as Year FROM cus_order WHERE date LIKE '%$year%' GROUP BY  date"; 
		$result=$this->database->select($query);
		
			return $result;
	}
	public function getYearStatic(){
     $query = "SELECT DISTINCT YEAR(date) AS date FROM cus_order"; 
	$result=$this->database->select($query);
		
	return $result;
	}

public function todaySalesReport()
{
	$query = "SELECT DISTINCT cus_order.transaction_id,courses.title,COUNT(order_items.course_id) AS sales FROM cus_order LEFT JOIN order_items ON order_items.order_id=cus_order.id LEFT JOIN courses ON courses.id=order_items.course_id WHERE DATE(cus_order.date)=CURRENT_DATE GROUP BY order_items.course_id"; 
	$result=$this->database->select($query);
		
	return $result;
}
		
  } 
  ?>