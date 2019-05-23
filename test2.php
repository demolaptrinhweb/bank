
   
          
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
	word-wrap: break-word;
		}
		.account11 a{
			color: aqua;
		}
	</style>
</head>
	
<body bgcolor="lightblue" >
	<div id="khung" >

	<?php require("Header.php") ;?>
	 
		
		 <div class="wrapper" >
        <ui class="mainMenu">
            <li class="item" id="account">
                <a href="#account" class="btn"><i class="fas fa-user-circle"></i>TÀI KHOẢN</a>
                <div class="subMenu">
                   <a href="acctrangchu.php?ts=dstk">Danh sách tài khoản </a>
					 <a href="acctrangchu.php?ts=ctkh">Chi tiết khách hàng</a>
					<a href="acctrangchu.php?ts=ctgd">Chi tiết giao dịch</a> 
					 <a href="acctrangchu.php?ts=dp">Đổi pass </a>
					<a href="acctrangchu.php?ts=md">Cài đặt tài khoản mặc định </a>
					 <a href="acctrangchu.php?ts=tkh">Thêm tài khoản hưởng</a>
					<a href="acctrangchu.php?ts=xtkh"> Xoá tài khoản hưởng </a>
                </div>
            </li>
			 <li class="item" id="vay">
                <a href="#vay" class="btn"><i class="fas fa-address-card"></i>VAY TIỀN</a>
                <div class="subMenu">
                    <a href="acctrangchu.php?ts=xn">Xem nợ</a>
					<a href="acctrangchu.php?ts=vt">Vay</a> 
					 <a href="formtrano.php">Trả nợ</a>
                </div>
            </li>
            <li class="item" id="chuyen">
                <a href="#chuyen" class="btn"><i class="fas fa-info"></i>CHUYỂN KHOẢN</a>
                <div class="subMenu">
                  <a href="acctrangchu.php?ts=ct1">Chuyển tiền cho tài khoản khác</a>
					<a href="acctrangchu.php?ts=ct2">Chuyển tiền cho tài khoản hưởng</a>
                </div>
            </li>
			 <li class="item" id="tk">
                <a href="#tk" class="btn"><i class="fas fa-info"></i>TÀI KHOẢN TIẾT KIỆM</a>
                <div class="subMenu">
                 <a href="motaikhoantietkiem.php">Mở tài khoản tiết kiệm</a>
					<a href="acctrangchu.php?ts=tk2">Thêm tiền vào tài khoản tiết kiệm</a> 
					<a href="acctrangchu.php?ts=tk3">Rút tiền tài khoản hưởng </a> 
                </div>
            </li>
			 <li class="item" id="the">
                <a href="#the" class="btn"><i class="fas fa-info"></i>THẺ</a>
                <div class="subMenu">
                 <a href="acctrangchu.php?ts=th0">danh sách thẻ </a>  
					<a href="acctrangchu.php?ts=th1">chuyền tiền vào tài khoản</a>
					<a href="acctrangchu.php?ts=th2">chuyển tiền vào thẻ</a> 
                </div>
            </li>
			
			
			
            <li class="item">
                <a href="#" class="btn"><i class="fas fa-sign-out-alt"></i>Log Out</a>
            </li>
        </ui>
			</div>
		<?php require("accheader.php");?>
	 <?php if (isset($_GET['ts']))
				  switch($_GET['ts']) 
				  {
					  case "tk" : require("chitietkhachhang.php");
						  break ;
					  case "vt" : require("formvaytien.php");
						  break;
					  case "ck" : require("chuyenkhoan.php");
						  break;
					  case "tn"	: require ("formtrano.php");  
						  break;
					  case "md" : require("caitaikhoanmacdinh.php");
						  break;
						  
					  case "dstk" : require("danhsachtaikhoan.php");
						  break ;
					  case "ctkh" : require("chitietkhachhang.php");
						  break;
					  case "ctgd" : require("chitietgiaodich.php");
						  break ;
					  case "xn" : require("xemno_1.php");
						 break ;
					  case "ct1" : require("formchuyentien.php");
						  break ;
					  case "ct2" : require("formchuyentientaikhoanhuong.php");
						  break;
					  
					  case "tk2" : require("themtienvaotaikhoantietkiem.php");
						  break;
					  case "tk3":  require("ruttientaikhoantietkiem.php");
						  break;
					  case "dp" : require("doipass.php");
						 break;
					  case "th1" : require("chuyentientuthevaotaikhoan.php");
						  break ;
					  case "th2" : require("chuyentienvaothe.php");
						  break ;
					  case "th0" : require("danhsachthe.php");
						  break;
					  case "tkh" :require("themtaikhoanhuong.php");
						  break ;
					  case "ttn" :require("formtrano.php");
						  break;
					  case "xtkh" : require("xoataikhoanhuong.php")	  ;
						  break ;
				  }
		 else require("soluottaikhoan.php");
		?>
		
<?php require("Footer.php") ;?>
	</div>
	
 
</body>
</html>
