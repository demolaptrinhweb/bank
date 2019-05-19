
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
		   	

$sql = "delete from kieuvay where id_kieuvay = $id_kieuvay";
		  
$kq = mysqli_query($conn,$sql);
if (mysqli_affected_rows($conn) == 1) {	?>	
	<script>
  alert("thành công");
</script>
	 <?php  }
		header("location:manage_kieuvay.php");
	   }
	?>
</body>
</html>