<?php
 date_default_timezone_set("Asia/Ho_Chi_Minh");
class control {
	private $con ;
	public function setCon ($conn){
		$this->con = $conn ;
	}
	public function getCon (){
		return $this->con ;
	}
	function control ($conn){
		$this->con = $conn ;
	}
	public function query ($que){
		 $conn = $this->con ;
		return mysqli_query($conn,$que) ;
	}
	public function fetch_arr($que){
		return @mysqli_fetch_assoc($que);
	}
	public function row_affected(){
		return mysqli_affected_rows($this->getCon());
	}
	public function passharsh($str){
		 $harsh = password_hash($str, PASSWORD_DEFAULT);
		return $harsh;
	}
	public function real_string_escape($str){
		$conn = $this->con ;
		return mysqli_real_escape_string($conn,$str);
	}
}
	
$hostname = 'localhost:3306';
$username = 'root';
$password = '19990604';
$dbname = "test2";
$conn = mysqli_connect($hostname, $username, $password,$dbname);
if (!$conn) {
 die('Không thể kết nối: ' . mysqli_error($conn));
 exit();
}
 
        mysqli_set_charset($conn, 'UTF8');
 $control = new control($conn);
	    $control->setCon($conn);
?>

