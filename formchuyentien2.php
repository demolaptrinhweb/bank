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
	// gan cac bien can thiet 
    $nguoinhan = $_POST["payto"];
    $payamt =  mysqli_real_escape_string($conn,$_POST["pay_amt"]);
    $taikhoanchuyen = $_POST["taikhoanid"];
	$code = taocode(4);
	$mail = new guimail($_SESSION["email"]);
	$mail->gui($conn,$code);
	$passerr ="" ;
	$_SESSION["code"] = $code;
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
	  $sql = "SELECT passchuyenkhoan FROM khachhang where id_khachhang=$_SESSION[id_khachhang]";
	  $kq = $control->query($sql);
      $arr1 = $control->fetch_arr($kq);
       
   
   //lay tai khoan khach hang muon su dung  
    $sql11 = "select sodu from taikhoan where taikhoanid = '$_POST[taikhoanid]'" ;
		$j = $control->query($sql11);
		$i = $control->fetch_arr($j);
		   
    //chuyen phai nguoi dung nhap sang harsh-password
	$auth = password_verify($_POST["trpass"],$arr1["passchuyenkhoan"]);
		
	$tienchuyen = floatval(str_replace(',','.',$_POST["amt"]));	
	if($auth and $_POST["email"] == $_SESSION["code"] and $i["sodu"] >= ($tienchuyen + $_POST["phichuyentien"]) and $_SESSION["max"] >= $tienchuyen and $_POST["tt"] == 2 and $_POST["xntrpass"] == $_POST["trpass"])
	{  
		//chuyen tien 
		
		
		$tien = new chuyentien($_POST["taikhoanid"]);
	    $tien->setCon($conn);
	    $tien->setphichuyen($_POST["phichuyentien"]);
	    $a = $tien->chuyen($_POST["payto3"],$_POST["amt"],$_POST["noidung"]);
	    if ($_POST["nguoichiuphi"] == 1)$b = $tien->trutiennguoichuyen();
	    else $b = $tien->trutiennguoinhan($_POST["payto3"]);
	    
	    $sql4= "update khachhang set max_chuyentien = max_chuyentien - $_POST[amt] where id_khachhang = $_SESSION[id_khachhang]";
		
			$c = $control->query($sql4);
		
	    if ($a == 1 and $b == 1 and $c){
			
			$_SESSION["max"] = $_SESSION["max"] - $_POST["amt"];
			
			
			 ?> <script>
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
		// neu co loi xuat loi ra 
		
	if (!$auth) $passerr.= "<br> <b>mật khẩu chuyển khoản không đúng</b>";
	if ($_POST["email"] != $_SESSION["code"])	$passerr.= "<br> <b> mã xác nhận email không đúng</b>";
	
    if ($i["sodu"] < ($_POST["amt"] + $_POST["phichuyentien"])) $passerr.="<br> <b> số tiền trong tài khoản không đủ</b>";
	
		if($_SESSION["max"] < $_POST["amt"]) $passerr.="<br> <b> vượt quá số lượng chuyển tối đa trong ngày</b>";
	if ($_POST["tt"] != 2) $passerr .= "<br> <b>tài khoản chuyển không hợp lệ </b>";	
		
	if ($_POST["xntrpass"] != $_POST["trpass"]) $passerr .= "<br> <b>pass và xác nhận pass không hợp lệ </b>";	
		$passerr .= "<br>vui lòng nhập lại";
		// gan lai bien 
	$nguoinhan = $_POST["payto3"];
	$payamt = $_POST["amt"];
	$taikhoanchuyen = $_POST["taikhoanid"];
	
	$phichuyentien = $_POST["phichuyentien"];
	$nguoichiuphi = $_POST["nguoichiuphi"];
	$noidung = $_POST["noidung"];
	}		  		
}       
		if(isset($nguoinhan) and $nguoinhan != ""){
			
		$sql = "SELECT taikhoanid,id_khachhang,trangthai FROM taikhoan where taikhoanid = '$nguoinhan' " ;
		$kq = $control->query($sql);
		$arr = $control->fetch_arr($kq);
		if (!isset($arr["taikhoanid"]))
		{
		
		$loi++ ;
			
		}
		else {
			
	   
        $nguoinhan_1 = $arr["id_khachhang"];
		$sql2 = "SELECT ho,ten FROM khachhang where id_khachhang=$nguoinhan_1" ;
	    $kq = $control->query($sql2);	
	    $arrpay = $control->fetch_arr($kq);
			
		}
		}
		else {$loi++;
			 
			}
		if (@$payamt == 0) $loi++; 
?>
	
   <?php   
		if ($loi == 0)
{ ?>
		<div align="center" >
	<form id="form1" name="form1" method="post" action="formchuyentien2.php">     
     	
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
				echo "<b>&nbsp;TÊN : </b>".$arrpay["ho"]."  ".$arrpay["ten"];
				echo "<br><b>&nbsp;TÀI KHOẢN ID : </b>".$arr["taikhoanid"];	
                if ($arr["trangthai"] == 2) $tt = "đang hoạt động" ;
                else $tt = "tạm dừng";
				echo "<br><b>&nbsp;TRẠNG THÁI : </b>".$tt;
	       
                  ?>
                  
<input type="hidden" name="payto3" value="<?php echo $nguoinhan; ?>"  />
<input type="hidden" name="amt" value="<?php echo $payamt; ?>"  />
<input type="hidden" name="taikhoanid" value="<?php echo $taikhoanchuyen; ?>"  />

<input type="hidden" name="phichuyentien" value="<?php echo $phichuyentien; ?>"  />
<input type="hidden" name="nguoichiuphi" value="<?php echo $nguoichiuphi; ?>"  />
<input type="hidden" name="noidung" value="<?php echo $noidung; ?>"  />	
<input type="hidden" name="tt" value="<?php echo $arr["trangthai"];?>"  />	
					  
				  </td>
                </tr>
                <tr>
                  <td><strong>SỐ TIỀN CHUYỀN</strong></td>
                  <td>&nbsp;<?php echo @number_format($payamt,2); ?></td>
                </tr>
                 <tr>
                  <td><strong>PHÍ CHUYỂN TIỀN </strong></td>
                  <td>&nbsp;<?php echo @number_format($phichuyentien,2); ?>
				  <?php if (@$nguoichiuphi == 1 ) $chiu ="<br><b> người chuyển trả</b>";
                                  else $chiu = "<br><b>người nhận trả</b>";
                      echo @$chiu ; ?></td>	 
                </tr>
				  <tr>
                  <td><strong>SỐ TIỀN CHUYỀN</strong></td>
                  <td>&nbsp;<?php echo @$noidung; ?></td>
                </tr>
                <tr>
                  <td><strong>NHẬP MẬT KHẨU CHUYỂN KHOẢN</strong></td>
                  <td><input name="trpass" type="password" id="trpass" size="35" required /></td>
                </tr>
                <tr>
                  <td><strong>XÁC NHẬN MẬT KHẨU </strong></td>
                  <td><input name="xntrpass" type="password"  size="35" required /></td>
                </tr>
				  <tr>
                  <td><strong>XÁC NHẬN EMAIL </strong></td>
                  <td><input name="email" type="test" id="email" size="35" required /></td>
                </tr>
                <tr>
                  <td colspan="2"><div align="right">
                    <input type="submit" name="pay2" id="pay2" value="đồng ý" />
                   
                  </div></td>
                </tr>
              </table>
		
		<?php }						
		else echo " đã xảy ra lỗi xin hãy kiểm tra lại thông tin nhập "; 
		?>
		</div>
		<?php require("Footer.php") ;?>
 </div>
</body>
</html>
