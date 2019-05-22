<?php
if(!isset($_SESSION)) {
        session_start();
    }
if ($_SESSION["quyen"] == 1){
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
	if ($_GET["id"]){
		$id = $_GET["id"];	   	
$sql = "delete from admin where id = $id";		  
$kq = mysqli_query($conn,$sql);
if (mysqli_affected_rows($conn) == 1) {	?>	
	<script>
  alert("thành công");
		 location.replace("manage_admin.php"); 
</script>
	 <?php  }
		
	   }
	?>
</body>
</html>
<?php } ?>
