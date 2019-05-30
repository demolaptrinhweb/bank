<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<title>Ngân Hàng STbank</title>
	<link rel="stylesheet" type="text/css" href="index.css">
	<link rel="icon" type="img/ico" href="hinh/logo.ico">
	
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="js/jquery-3.4.1.slim.min.map">
</head>
	<body>
	<div id="khung">
	   <?php require("Header.php") 
		?>	
		<?php require("Menu.php")?>
		
		<?php if (isset($_GET['ts']))
				  switch($_GET['ts'])
				  {
					  case "gt" : include("GioiThieu.php");break;
					  case "cn" : include("CaNhan.php");break;
					  case "ndt": include("NhaDauTu.php");break;
					  case "dn" : include("DoanhNghiep.php");break;
					  case "td" : include ("TuyenDung.php");break;
					  case "tt" : include("TinTuc.php");break;	
					  case "bk" : include("internetbanking.php");break;	  
				  }				  
				else  include("Main_index.php")?>
		
	
	
			<?php require("Footer.php") ?>
	</div>	


</body>
</html>
