<?php @session_start(); ?>
<?php		if(!isset($_SESSION['id_khachhang'])) {
	header("Location: index.php?ts=bk");
}?>
<!doctype html>

<html>
<head>
<meta charset="utf-8">
	<title>Ngân Hàng STbank</title>
	<link rel="stylesheet" type="text/css" href="index.css">
	<link rel="icon" type="img/ico" href="hinh/logo.ico">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-4.0.0.css">	
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
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
	// gan cac bien can thiet 
$nguoinhan = $control->string_escape($_POST["payto"]);
$payamt = $_POST["pay_amt"];
$taikhoanchuyen = $control->string_escape($_POST["taikhoanid"]);
	$code = taocode(4);
	$mail = new guimail($_SESSION["email"]);
	$mail->gui($conn,$code);
	$passerr ="" ;
	echo $code ;
	$phi = new phichuyentien ($conn);
	$phi->setCon($conn);
    $phichuyentien = $phi->phichuyen($payamt);
	$nguoichiuphi = $_POST["nguoichiuphi"];
	$noidung = $_POST["noidung"];
}
	
?>
		
	<?php 
	$passerr="";

	$loi = 0 ;
	   if(isset($_POST["pay2"]))
  {   
	  $nguoinhan = $_POST["payto3"]	  ; 
	  $sql3 = "SELECT * FROM khachhang where id_khachhang=$_SESSION[id_khachhang]";
	  $results_3 = $control->query($sql3);
      $arrpayment1 = $control->fetch_arr($results_3);
       
   
   //lay tai khoan khach hang muon su dung  
    $sql11 = "select * from taikhoan where taikhoanid = '$_POST[taikhoanid]'" ;
		$j = $control->query($sql11);
		$i = $control->fetch_arr($j);
		   
    //chuyen phai nguoi dung nhap sang harsh-password
	$auth = password_verify($_POST["trpass"],$arrpayment1["passchuyenkhoan"]);
		
		
	if($auth and $_POST["email"] == $_POST["code"] and $i["sodu"] >= $_POST["amt"] and $_SESSION["max"] >= $_POST["amt"] and $_POST["tt"] == 2)
	{  
		//chuyen tien 
		
		$tien = new chuyentien($_POST["taikhoanid"]);
	    $tien->setCon($conn);
	    $tien->setphichuyen($_POST["phichuyentien"]);
	    $a = $tien->chuyen($_POST["payto3"],$_POST["amt"],$_POST["noidung"]);
	    if ($_POST["nguoichiuphi"] == 1)$b = $tien->trutiennguoichuyen();
	    else $b = $tien->trutiennguoinhan($_POST["payto3"]);
	    
	 
	    if ($a == 1 and $b == 1){
			$sql4= "update khachhang set max_chuyentien = max_chuyentien - $_POST[amt] where id_khachhang = $_SESSION[id_khachhang]";
			$control->query($sql4);
			$_SESSION["max"] = $_SESSION["max"] - $_POST["amt"];
			header("Location: formchuyentien3.php?kq=ct");}
		
	}
	else
	{   
		// neu co loi xuat loi ra 
		
		$err1 = "";
		$err2 = "";
	if (!$auth) $passerr.= "<br> <b>mật khẩu chuyển khoản không đúng</b>";
	if ($_POST["email"] != $_POST["code"])	$passerr.= "<br> <b> mã xác nhận email không đúng</b>";
	
    if ($i["sodu"] < $_POST["amt"]) $passerr.="<br> <b> số tiền trong tài khoản không đủ</b>";
	
		if($_SESSION["max"] < $_POST["amt"]) $passerr.="<br> <b> vượt quá số lượng chuyển tối đa trong ngày</b>";
	if ($_POST["tt"] != 2) $passerr .= "<br> <b>tài khoản chuyển không hợp lệ </b>";	
		$passerr .= "<br>vui lòng nhập lại";
		// gan lai bien 
	$nguoinhan = $_POST["payto3"];
	$payamt = $_POST["amt"];
	$taikhoanchuyen = $_POST["taikhoanid"];
	$code = $_POST["code"];
	$phichuyentien = $_POST["phichuyentien"];
	$nguoichiuphi = $_POST["nguoichiuphi"];
	$noidung = $_POST["noidung"];
	}		  
}       
		if(isset($nguoinhan) and $nguoinhan != ""){
		$sql = "SELECT * FROM taikhoan where taikhoanid='$nguoinhan'" ;
		$results_1 = $control->query($sql);
		$array = $control->fetch_arr($results_1);
		if (!isset($array["taikhoanid"]))
		{
			
		$loi++ ;
		}
		else {
			
	   
        $nguoinhan_1 = $array["id_khachhang"];
		$sql2 = "SELECT * FROM khachhang where id_khachhang=$nguoinhan_1" ;
	    $results_2 = $control->query($sql2);	
	    $arrpayment = $control->fetch_arr($results_2);
		}
		}
		else {$loi++;
			  echo "loi 2" ;}
?>
	
   <?php echo $loi ;  
		if ($loi == 0)
{ ?>
	<form id="form1" name="form1" method="post" action="formchuyentien2.php">     
     	<h2>&nbsp;NGƯỜI NHẬN <?php echo $arrpayment["ho"]."  ".$arrpayment["ten"]; ?></h2>
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
                  <td width="203"><strong>THÔNG TIN NGƯỜI NHẬN</strong></td>
                  <td width="322">
				  <?php
				echo "<b>&nbsp;TÊN : </b>".$arrpayment["ho"]."  ".$arrpayment["ten"];
				echo "<br><b>&nbsp;TÀI KHOẢN ID : </b>".$array["taikhoanid"];			
				echo "<br><b>&nbsp;TRẠNG THÁI : </b>".$array["trangthai"];
	
                  ?>
                  
<input type="hidden" name="payto3" value="<?php echo $nguoinhan; ?>"  />
<input type="hidden" name="amt" value="<?php echo $payamt; ?>"  />
<input type="hidden" name="taikhoanid" value="<?php echo $taikhoanchuyen; ?>"  />
<input type="hidden" name="code" value="<?php echo $code; ?>"  />	
<input type="hidden" name="phichuyentien" value="<?php echo $phichuyentien; ?>"  />
<input type="hidden" name="nguoichiuphi" value="<?php echo $nguoichiuphi; ?>"  />
<input type="hidden" name="noidung" value="<?php echo $noidung; ?>"  />	
<input type="hidden" name="tt" value="<?php echo $array["trangthai"];?>"  />	
					  
				  </td>
                </tr>
                <tr>
                  <td><strong>SỐ TIỀN CHUYỀN</strong></td>
                  <td>&nbsp;<?php echo number_format($payamt,2); ?></td>
                </tr>
                 <tr>
                  <td><strong>PHÍ CHUYỂN TIỀN </strong></td>
                  <td>&nbsp;<?php echo number_format($phichuyentien,2); ?>
				  <?php if ($nguoichiuphi == 1 ) $chiu ="<br><b> người chuyển trả</b>";
                                  else $chiu = "<br><b>người nhận trả</b>";
                      echo $chiu ; ?></td>	 
                </tr>
				  <tr>
                  <td><strong>SỐ TIỀN CHUYỀN</strong></td>
                  <td>&nbsp;<?php echo $noidung; ?></td>
                </tr>
                <tr>
                  <td><strong>NHẬP MẬT KHẨU CHUYỂN KHOẢN</strong></td>
                  <td><input name="trpass" type="password" id="trpass" size="35" required /></td>
                </tr>
                <tr>
                  <td><strong>XÁC NHẬN MẬT KHẨU </strong></td>
                  <td><input name="conftrpass" type="password" id="conftrpass" size="35" required /></td>
                </tr>
				  <tr>
                  <td><strong>XÁC NHẬN EMAIL </strong></td>
                  <td><input name="email" type="test" id="email" size="35" required /></td>
                </tr>
                <tr>
                  <td colspan="2"><div align="right">
                    <input type="submit" name="pay2" id="pay2" value="Pay" />
                   
                  </div></td>
                </tr>
              </table>
		<?php }
		else echo " đã xảy ra lỗi xin hãy kiểm tra lại thông tin nhập "; 
		?>
		<?php require("Footer.php") ;?>
 </div>
</body>
</html>
