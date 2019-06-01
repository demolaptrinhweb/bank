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
	
	if ($_GET["id_phichuyentien"]){
		$id_phichuyentien = $_GET["id_phichuyentien"];
		   	

$sql = "delete from phichuyentien where id_phichuyentien = $id_phichuyentien";
		  
$kq = mysqli_query($conn,$sql);
if (mysqli_affected_rows($conn) == 1) {	?>	
	<script>
  alert("thành công");
		 location.replace("manage_phichuyentien.php"); 
</script>
	 <?php  }
		
	   }
	?>
</body>
</html>