<!doctype html>
<?php session_start(); ?>
<html>
<head>
<meta charset="utf-8">

	<title>Ngân Hàng STbank</title>
	<link rel="stylesheet" type="text/css" href="index.css">
	<link rel="icon" type="img/ico" href="hinh/logo.ico">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-4.0.0.css">	
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="sidabar.css">
	<style>.account11{
		border: solid;
	border-color: blue;
	border-width: 1px;
	background-color: #29a0c7;
	padding: 3px;
	text-align: center;
	font-weight: bolder;
	border-radius: 50px;
	color: white;
	width: 290px;
	min-height: 35px;
	word-wrap: break-word;}
	.account11 a{
			color: aqua;
		}</style>
</head>
	
<body bgcolor="lightblue" >
	<div id="khung" >
<?php		if(!isset($_SESSION['id_khachhang'])) {
	header("Location: index.php?ts=bk");
}?>	
	<?php require("Header.php") ;?>
	 <?php require ("accmenu.php") ;?>
		<?php require("accheader.php");?>
    <h2>&nbsp; Transaction Detail:</h2>
		<div align="center" >
              <table width="517" height="220" border="1">
                <tr>
                  <td width="439" align="center"><h4><?php 
					  $tem="";
				  if ($_GET["kq"]){
					  
					  switch($_GET["kq"]){
						  case "ct" : $tem ="giao dịch thanh công";	  
							break;  
						  case "dp"	: $tem ="đổi pass thành công";  
							 break ; 
						  case "tktk" : $tem = "mở tài khoản tiết kiệm thành công";
							 break; 
						  case "tkh"  : $tem = "thêm tài khoản hưởng thành công";  
							  break;
						  case "xtkh" : $tem = "xoá tài khoản hưởng thành công";
							  break ;
					  }  
					  
				  echo $tem ;
				 
				  }
				  ?>
                  <br />
                  
                  </h4>
                  
                  </td>
                </tr>
              </table>
		</div>
<?php require("Footer.php") ;?>
	</div>
</body>
</html>