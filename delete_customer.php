<?php
    include "validate_admin.php";
    include "user_navbar.php";
    include "admin_sidebar.php";
include "DBconnect.php";
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php 
	
	if ($_GET["id_khachhang"]){
		$id_khachhang = $_GET["id_khachhang"];
		   	
$sql1 = "delete from vaytien where taikhoanid in (select taikhoanid from taikhoan where id_khachhang = $id_khachhang)";
$sql = "delete from taikhoan where id_khachhang = $id_khachhang";
$sql2 = "delete from khachhang where id_khachhang = $id_khachhang ";		
		
$kq1 = mysqli_query($conn,$sql1);			  
$kq = mysqli_query($conn,$sql);
$kq2 = mysqli_query($conn,$sql2);		
if (mysqli_affected_rows($conn) == 1) {	?>	
	<script>
  alert("thành công");
		 location.replace("manage_customers.php"); 
</script>
	 <?php  }
	else  echo "đã có lỗi xin thử lại";
		
	   }
	?>
</body>
</html>