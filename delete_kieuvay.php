
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
	
	if ($_GET["id_kieuvay"]){
		$id_kieuvay = $_GET["id_kieuvay"];
	$sql = "select id_vay from vaytien where kieuvay = $id_kieuvay";
	$kq = mysqli_query($conn,$sql);
	$arr = mysqli_fetch_array($kq);	
		
   if (!$arr){
	  
$sql = "delete from kieuvay where id_kieuvay = $id_kieuvay";
		  
$kq = mysqli_query($conn,$sql);
if (mysqli_affected_rows($conn) == 1) {	?>	
	<script>
  alert("thành công");
		 location.replace("manage_kieuvay.php"); 
</script>
	 <?php  }
		
	   }
		else {	?>	
	<script>
  alert("không xoá được dữ liệu đang được sử dụng");
		 location.replace("manage_kieuvay.php"); 
</script>
	 <?php  }
	}
	?>
</body>
</html>