
<?php 
ob_start();

include_once("DBconnect.php");
session_start();
if(isset($_SESSION['id_khachhang'])!="") {
	header("Location: acctrangchu.php");
}
if (isset($_POST['login'])) {
	$email = mysqli_real_escape_string($conn, $_POST['taikhoan']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	
	$error_message = "dung" ;
	$result = mysqli_query($conn, "SELECT trangthai,pass,id_khachhang FROM khachhang WHERE loginid = '".$email."'" );
	
	
	if (@$row = mysqli_fetch_array($result)) {
		
	    $auth = password_verify($_POST["password"],$row["pass"]);
		
		if($auth and $row["trangthai"] == 2){
		$results = mysqli_query($conn,"SELECT * FROM khachhang where id_khachhang='$row[id_khachhang]'");
	
     	while($arrow = mysqli_fetch_array($results,MYSQLI_ASSOC)){
		
		
			
		if(!isset($_SESSION["id_khachhang"])) $_SESSION["id_khachhang"] = $arrow["id_khachhang"];
		
		if (!isset($_SESSION["taikhoanid"])) $_SESSION["taikhoanid"] =  $arrow["taikhoanmacdinh"];
		
		$sql = "select * from taikhoan where id_taikhoan = $arrow[taikhoanmacdinh]";
		$kq = $control->query($sql);
		$arr = $control->fetch_arr($kq);
		if(!isset($_SESSION["taikhoan_id"])) $_SESSION["taikhoan_id"] = $arr ["taikhoanid"];
		
	    if(!isset($_SESSION["no"])) $_SESSION["no"] = $arr ["no"];
		
		if (!isset($_SESSION["email"])) $_SESSION["email"] = $arrow["email"];	
		
		if(!isset($_SESSION["ho"])) $_SESSION["ho"] = $arrow["ho"];
			
		if(!isset($_SESSION["ten"])) $_SESSION["ten"] = $arrow["ten"];	
			
		if (!isset($_SESSION["max"])) $_SESSION["max"] = $arrow["max_chuyentien"];	
		
		}
			
	  }
		else {
		$error_message = "sai";
		if ($row["trangthai"] != 2) $error_message = "trangthai"; 	
	}
	}
		else {
		$error_message = "sai";
			
	}
}



?>
<?php echo $error_message; ?>
