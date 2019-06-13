<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>CKEditor 5 Integration Example</title>
</head>
<body>
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
<?php $sql = "select * from admin where uname = 'admin'";
	  $kq = $control->query($sql);
	  $arr = $control->fetch_arr($kq);
	  $pass = $control->passharsh('123');
	echo $arr["pwd"];
	  $auth = password_verify("2",$arr["pwd"]);
	 if($auth){
		 echo "dung";
	 }else echo "sai"; ?>	
<?php }?>
</body>
</html>