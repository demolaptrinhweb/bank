
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
function id ($type){
	
	 $characters = '0123456789qwertyuiopasdfghjklzxcvbnm';
    $charactersLength = strlen($characters);
	$date = getdate();
	
	for($i=1;$i<=10;$i++){
		if($date["mday"] == $i) $date["mday"] = '0'.$date["mday"];
	}
	for($i=1;$i<=10;$i++){
		if($date["mon"] == $i) $date["mon"] = '0'.$date["mon"];
	}
    if($type == 1)$randomString = 'VT'.$date["mday"].$date["mon"];
	else if ($type == 2) $randomString = 'GD'.$date["mday"].$date["mon"];
    for ($i = 0; $i < 5; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
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
			
			//sinh id tu dong
			do {$id = id(2);
			$sql= "select id_chuyentien from chuyentien where chuyentien='$id'";
			$kq = $this->query($sql);
			   }
			while($arr = $this->fetch_arr($kq));
			
			
			$sql3 ="INSERT INTO chuyentien VALUES('','$id',now(),'$khach','$id_nguoinhan',$tienchuyen,'$noidung')";
			$a = $this->query($sql1);
			$b = $this->query($sql2);
			$c = $this->query($sql3);
			
			if($a and $b and $c )
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
			if($a)
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
			if($a)
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
		public function setemail($id){
			$this->khachhangemail = $id ;
		}
		public function getemail (){
			return $this->khachhangemail;
		}
		function guimail($id){
			$this->khachhangemail = $id ;
		}
	  public function gui ($con,$maXN){
		  $khach = $this->khachhangemail ;
		  
		  $to = $khach;
          $subject = "mã xác nhận email";
          $txt = $maXN;
          $headers = "From: STB@mail.com" ;

mail($to,$subject,$txt,$headers);
	  }
	 public function guinoidung ($con,$tieude,$noidung){
		 $khach = $this->khachhangemail ;
		  
		  $to = $khach;
          $subject = $tieude;
          $txt = $noidung;
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
 class vaytien extends control {
       private $taikhoanid ;
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
		  
		 
		  $khach = $this->taikhoanid ;
		  $results_4 = mysqli_query($con,"SELECT laixuat FROM kieuvay where id_kieuvay=$kieuvay");
	      $array_4 = mysqli_fetch_assoc($results_4);
		  $laixuat = $array_4["laixuat"];
		  $sql1 ="UPDATE taikhoan SET sodu = sodu + $tienvay WHERE taikhoanid = '$khach'";
		  
		  $id = id(1);
			$sql = "select id_vay from vaytien where vayid = '$id'";
			$kq = $this->query($sql);
			while($arr = $this->fetch_arr($kq)){
				$id = id(1);
				$sql= "select id_vay from vaytien where vayid = '$id'";
			    $kq = $this->query($sql);
			}
		  
          $sql2 ="INSERT INTO vaytien VALUES('','$id',$kieuvay,$tienvay,$laixuat,now(),'$khach')";
		  $sql = "update taikhoan set no = $tienvay + ($tienvay*$laixuat) where taikhoanid = '$khach'";
		
	  
		  
             $a = $this->query($sql1);
		     $b = $this->query($sql2);
		     $c = $this->query($sql);
			if($a and $b and $c)
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




<?php class phichuyentien extends control {
	
	public function phichuyen ($sotien){
		
			$sql1 = "select phi from phichuyentien where toithieu <= $sotien and toida >= $sotien";
			$resu = $this->query($sql1);
			if($arr = $this->fetch_arr($resu)){
			return  $arr["phi"];			
				}
		    else return 0 ;
	
	}
}
?>
<?php 
	function highlightKeywords($text, $keyword) {
		$wordsAry = explode(" ", $keyword);
		$wordsCount = count($wordsAry);
		
		for($i=0;$i<$wordsCount;$i++) {
			$highlighted_text = "<span style='color : blue;'>$wordsAry[$i]</span>";
			$text = str_ireplace($wordsAry[$i], $highlighted_text, $text);
		}

		return $text;
	}
?>