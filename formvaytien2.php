<?php

@session_start();
?>
<?php		if(!isset($_SESSION['id_khachhang'])) {
	header("Location: index.php?ts=bk");
}?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="index.css">
	<link rel="icon" type="img/ico" href="hinh/logo.ico">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-4.0.0.css">	
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="sidabar.css">
		<style>	
	.account{border: solid;
	border-color: blue;
	border-width: 1px;
	background-color: #29a0c7;
	padding: 3px;
	text-align: center;
	font-weight: bolder;
	border-radius: 50px;
	color: white;
	width: 290px;
		height: 35px; }
	.account11 a{
			color: aqua;
		}</style>
</head>
	
		<body bgcolor="lightblue" >
	<div id="khung" >
		<?php require("Header.php") ;?>
	 <?php require ("accmenu.php") ;
		require("accheader.php");
		require ("DBconnect.php");
		require_once("class_vs_function.php");
		?>
	<?php	if(isset($_POST["pay"]))
{
    $kieuvay = $_POST["kieuvay"];
    $vayamt = $_POST["vay_amt"];
    $taikhoanvay = $_POST["taikhoanid"];
	$code = taocode(4);
	$_SESSION["code"] = $code;
	$mail = new guimail($_SESSION["email"]);
	$mail->gui($conn,$code);
	$passerr ="" ;
	echo $code ;
}
	
?>
		
	<?php 
	$sql = "SELECT * FROM kieuvay where id_kieuvay=$_POST[kieuvay]";
    $kq = $control->query($sql);
	$arr4 = $control->fetch_arr($kq);
		
	
		
	$loi = 0 ;
		
		
	   if(isset($_POST["pay2"]))
  {   
		   $sql = "SELECT * FROM khachhang where id_khachhang=$_SESSION[id_khachhang]";
           $kq = $control->query($sql);
		   
           $arr1 = $control->fetch_arr($kq);	
   
   //chuyen phai nguoi dung nhap sang harsh-password
	$auth = password_verify($_POST["trpass"],$arr1["passchuyenkhoan"]);	
   
	if($auth and $_POST["email"] == $_SESSION["code"])
		
	{   
		
		$demthanhcong=0;
		$vay = new vaytien($_POST["taikhoanid"]);
	    $vay->setCon($conn);
		$a=$vay->vay($conn,$_POST["amt"],$_POST["kieuvay"]);
		if ($a == 1)$demthanhcong++;
	    
	    
	 
	 
	    if ($demthanhcong == 1){
			
			?>
			
			<script>

		 location.replace("formchuyentien3.php?kq=ct"); 
</script>	
			<?php
		}
		else {
		
			?>
		<script>
		alert("có lỗi khi truyền thông tin xin thủ lại");
		</script>
		<?php
			
		}
		
	}
   
   
   
	else
	{
		$err1 = "";
		$err2 = "";
		
		
	if (!$auth) $err1 = "<b> <br>mật khẩu chuyển khoản không đúng</b>";
	if ($_POST["email"] != $_SESSION["code"])	$err2 = "<b> <br> mã xác nhận email không đúng</b>";
	$passerr = $err1.$err2." <br>vui lòng nhập lại";

		
		
	$kieuvay = $_POST["kieuvay"];
	$vayamt = $_POST["amt"];
	$taikhoanvay = $_POST["taikhoanid"];
	
	}		  
    }       
	
	
		if ($vayamt < $arr4["toithieu"] or $vayamt > $arr4["toida"]) {
			$loi++ ;
		}
		if ($kieuvay == "") $loi++;
?>
	
   <?php  if ($loi < 1)
{ ?>
		<div align="center" >
	<form id="form1" name="form1" method="post" action="">     
     	
              <table width="564" height="220" border="1">
                <?php
				if($passerr != "")
				{
					?>
                <tr>
                  <td colspan="2">&nbsp;<?php echo $passerr; ?></td>
                </tr>
                <?php
				}
				?>
                <tr>
                  <td width="203"><strong>THÔNG TIN VAY</strong></td>
                  <td width="322">
				  <?php
	
				echo "<b>&nbsp;KIÊU VAY : </b>".$arr4["kieuvay"];
				echo "<br><b>&nbsp;SỐ LƯỢNG VAY : </b>".$vayamt;			
				echo "<br><b>&nbsp;TÀI KHOẢN VAYY : </b>".$taikhoanvay;
	
                  ?>
                  
<input type="hidden" name="kieuvay" value="<?php echo $kieuvay; ?>"  />
<input type="hidden" name="amt" value="<?php echo $vayamt; ?>"  />
<input type="hidden" name="taikhoanid" value="<?php echo $taikhoanvay; ?>"  />
				  
				  </td>
                </tr>         
                <tr>
                  <td><strong>NHẬP MẬT KHẨU CHUYỂN KHOẢN</strong></td>
                  <td><input name="trpass" type="password" id="trpass" size="35" required/></td>
                </tr>
                <tr>
                  <td><strong>XÁC NHẬN MẬT KHẨU </strong></td>
                  <td><input name="conftrpass" type="password" id="conftrpass" size="35" required/></td>
                </tr>
				  <tr>
                  <td><strong>XÁC NHẬN EMAIL </strong></td>
                  <td><input name="email" type="test" id="email" size="35" required/></td>
                </tr>
                <tr>
                  <td colspan="2"><div align="right">
                    <input type="submit" name="pay2" id="pay2" value="Pay" />
                   
                  </div></td>
                </tr>
              </table>
		<?php }
		else {
			
		
		
		if ($vayamt < $arr4["toithieu"] or $vayamt > $arr4["toida"]) {
			echo "<br>"."số tiền vay không phù hợp";
		}	
			
			
		} 
		?>
		<?php require("Footer.php") ;?>
		</div>
 </div>
</body>
</html>