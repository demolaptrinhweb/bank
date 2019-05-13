<?php @session_start();
require ("DBconnect.php");?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<?php	$results = mysqli_query($conn,"SELECT * FROM khachhang where khachhangid='11'");
	
	while($arrow = mysqli_fetch_array($results,MYSQLI_ASSOC)){
		
		if(!isset($_SESSION["khachhangid"])) $_SESSION["id_khachhang"] = $arrow["id_khachhang"];
		
		if (!isset($_SESSION["taikhoanid"])) $_SESSION["taikhoanid"] =  $arrow["taikhoanmacdinh"];
		
		$sql = "select * from taikhoan where id_taikhoan = $arrow[taikhoanmacdinh]";
		$kq = $control->query($sql);
		$arr = $control->fetch_arr($kq);
		if(!isset($_SESSION["taikhoan_id"])) $_SESSION["taikhoan_id"] = $arr ["taikhoanid"];
		
		
	}?>
<body>
</body>
</html>