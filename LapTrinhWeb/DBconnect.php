
<?php
 
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
		return mysqli_fetch_assoc($que);
	}
	public function row_affected(){
		return mysqli_affected_rows($this->getCon());
	}
}
	
$hostname = 'localhost:3306';
$username = 'root';
$password = '';
$dbname = "test";
$conn = mysqli_connect($hostname, $username, $password,$dbname);
if (!$conn) {
 die('Không thể kết nối: ' . mysqli_error($conn));
 exit();
}
 header("Content-type: text/html; charset=utf-8");
        mysqli_set_charset($conn, 'UTF8');
 $control = new control($conn);
	    $control->setCon($conn);
?>
<?php 
 class class_coban {
	 private $khachhangid ;
	 private $phichuyen ;
		public function setid($id){
			$this->khachhangid = $id ;
		}
		public function getid (){
			return $this->khachhangid ;
		}
 }
?>

<?php 
	class chuyentien extends control {
		private $taikhoanid ;
		private $phichuyen ;
		public function setid($id){
			$this->taikhoanid = $id ;
		}
		public function getid (){
			return $this->taikhoanid ;
		}
		function chuyentien($id){
			$this->taikhoanid = $id ;
		}
		public function chuyen ($id_nguoinhan,$tienchuyen,$noidung){
			
			$khach = $this->taikhoanid ;
			$sql1 ="UPDATE taikhoan SET sodu = sodu + $tienchuyen WHERE taikhoanid = '$id_nguoinhan'";
			$sql2 ="UPDATE taikhoan SET sodu = sodu - $tienchuyen WHERE taikhoanid = '$khach'";
			$sql3 ="INSERT INTO chuyentien VALUES('',now(),'$khach','$id_nguoinhan',$tienchuyen,'$noidung')";
			$a = $this->query($sql1);
			$b = $this->query($sql2);
			$c = $this->query($sql3);
			if(mysqli_affected_rows($this->getCon()) == 1)
				  {
					$successresult = 1;	

				  }
				else
				  {
					  $successresult = 0;
				  }
			return $successresult;
		}
		public function setphichuyen($tienchuyen){
			
			$this->phichuyen = $tienchuyen;											 
	}
       public function getphichuyen (){
		   return $this->phichuyen;	   
	   }
		public function trutiennguoichuyen (){
			$khach = $this->taikhoanid ;
			$sql2 ="UPDATE taikhoan SET sodu = sodu - $this->phichuyen WHERE taikhoanid = '$khach'";
			$a = $this->query($sql2);
			if(mysqli_affected_rows($this->getCon()) == 1)
				  {
					$successresult = 1;	

				  }
				else
				  {
					  $successresult = 0;
				  }
			return $successresult;
			
		}
		public function trutiennguoinhan ($id_nguoinhan){
			$sql2 ="UPDATE taikhoan SET sodu = sodu - $this->phichuyen WHERE taikhoanid = '$id_nguoinhan'";
			$a = $this->query($sql2);
			if(mysqli_affected_rows($this->getCon()) == 1)
				  {
					$successresult = 1;	

				  }
				else
				  {
					  $successresult = 0;
				  }
			return $successresult;
		}	
	}
	?>
<?php 
 class guimail {
	 private $khachhangid ;
		public function setid($id){
			$this->khachhangid = $id ;
		}
		public function getid (){
			return $this->khachhangid;
		}
		function guimail($id){
			$this->khachhangid = $id ;
		}
	  public function gui ($con,$maXN){
		  $khach = $this->khachhangid ;
		  $res = mysqli_query($con,"SELECT * FROM khachhang where id_khachhang='$khach'");
          $arrpayment = mysqli_fetch_assoc($res);
		  $to = $arrpayment["email"];
          $subject = "mã xác nhận email";
          $txt = $maXN;
          $headers = "From: STB@mail.com" ;

mail($to,$subject,$txt,$headers);
	  }
 }
?>
<?php 
function taocode($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
?>
<?php 
 class vaytien  {
       private $khachhangid ;
		public function setid($id){
			$this->taikhoanid = $id ;
		}
		public function getid (){
			return $this->taikhoanid ;
		}
		function vaytien($id){
			$this->taikhoanid = $id ;
		}
	  public function vay ($con,$tienvay,$kieuvay){
		  date_default_timezone_set('Asia/Ho_Chi_Minh');
		  $date = date('d-m-Y');
		  $khach = $this->taikhoanid ;
		  $results_4 = mysqli_query($con,"SELECT * FROM kieuvay where id_kieuvay=$kieuvay");
	      $array_4 = mysqli_fetch_assoc($results_4);
		  $b = $array_4["id_kieuvay"];
		  $c = $array_4["laixuat"];
		  $sql1 ="UPDATE taikhoan SET sodu = sodu + $tienvay WHERE taikhoanid = '$khach'";
          $sql2 ="INSERT INTO vaytien VALUES('',$b,$tienvay,$c,now(),$khach)";
          if (!mysqli_query($con,$sql1))
				  {
				  die('Error: ' . mysqli_error($con));
				  }
			if (!mysqli_query($con,$sql2))
				  {
				  die('Error: ' . mysqli_error($con));
				  }
			if(mysqli_affected_rows($con) == 1)
				  {
					$successresult = 1;	
				  
				  }
				else
				  {
					  $successresult = 0;
				  }
			return $successresult;
	  }
 }
?>



<?php 
class themtaikhoanhuong extends class_coban{
	function themtaikhoanhuong ($id){
		$this->setid($id);
	}
	public function them ($con,$id_huong){
		$a = new control ($con);
		$a->setCon($con);
		$idd = $this->getid();
		$sql = "INSERT INTO taikhoanhuong VALUES('',$id_huong,$idd)";
		$b = $a->query($sql);
		if ($b)  header("Location: formchuyentien3.php");
	}
}
?>

<?php class phichuyentien extends control {
	
	public function phichuyen ($sotien){
		
			$sql1 = "select phi from phichuyentien where toithieu <= $sotien and toida >= $sotien";
			$resu = $this->query($sql1);
			$arr = $this->fetch_arr($resu);
			return  $arr["phi"];											 
	
	}
}
?>
<?php 
	function highlightKeywords($text, $keyword) {
		$wordsAry = explode(" ", $keyword);
		$wordsCount = count($wordsAry);
		
		for($i=0;$i<$wordsCount;$i++) {
			$highlighted_text = "<span style='font-weight:bold;'>$wordsAry[$i]</span>";
			$text = str_ireplace($wordsAry[$i], $highlighted_text, $text);
		}

		return $text;
	}
?>
	