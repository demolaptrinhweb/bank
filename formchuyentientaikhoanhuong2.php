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
$_SESSION['nguoinhan'] = $_POST["huongid"];
$payamt = $_POST["pay_amt"];
$taikhoanchuyen = $_POST["taikhoanid"];
	$code = taocode(4);
	$mail = new guimail($_SESSION["email"]);
	$mail->gui($conn,$code);
	$passerr ="" ;
	echo $code ;
	$_SESSION["code"] = $code;
	$phi = new phichuyentien ($conn);
	$phi->setCon($conn);
    $phichuyentien = $phi->phichuyen($payamt);
	$nguoichiuphi = $_POST["nguoichiuphi"];
	$noidung = $_POST["noidung"];
}
	
?>
		
	<?php 
	

	$loi = 0 ;
	   if(isset($_POST["pay2"]))
  {   $sql ="SELECT * FROM khachhang where id_khachhang=$_SESSION[id_khachhang]";
      $kq = $control->query($sql);
      $arr1 = $control->fetch_arr($kq);
   
   
   //lay tai khoan khach hang muon su dung  
    $sql11 = "select * from taikhoan where taikhoanid = '$_POST[taikhoanid]'" ;
		$j = $control->query($sql11);
		$i = $control->fetch_arr($j);
		   
  
    //chuyen phai nguoi dung nhap sang harsh-password
	$auth = password_verify($_POST["trpass"],$arr1["passchuyenkhoan"]);	
   $tongtien=0;
		foreach  ($_SESSION['nguoinhan'] as $nguoinhan_1){
			$tongtien = $tongtien + $_POST["amt"] + $_POST["phichuyentien"];
		}
	if($auth and $_POST["email"] == $_SESSION["code"] and $_SESSION["max"] >= $tongtien and $i["sodu"] >= $tongtien and $_POST["trpass"] == $_POST["xntrpass"] )
	{   
		
		$tien = new chuyentien($_POST["taikhoanid"]);
		$tien->setCon($conn);
		$tien->setphichuyen($_POST["phichuyentien"]);
		$demnguoinhan = 0 ;
		$demchuyentienthanhcong = 0 ;
		$demtruphi = 0 ;
		foreach  ($_SESSION['nguoinhan'] as $nguoinhan_1){	
	          if ($nguoinhan_1 != "" ) {
				  $demnguoinhan++;
				  
				 $a= @$tien->chuyen($nguoinhan_1,$_POST["amt"],$_POST["noidung"]);
				 if ($a == 1) $demchuyentienthanhcong++;	
				 if ($_POST["nguoichiuphi"] == 1)$b = @$tien->trutiennguoichuyen();
	             else $b = $tien->trutiennguoinhan($nguoinhan_1);   
	             if (  $b == 1) $demtruphi++;
				  
				  $sql4= "update khachhang set max_chuyentien = max_chuyentien - $_POST[amt] where id_khachhang = $_SESSION[id_khachhang]";
			      $c = $control->query($sql4);
			      $_SESSION["max"] = $_SESSION["max"] - $_POST["amt"];
		            }   
		}
		if ($demchuyentienthanhcong == $demnguoinhan and $demtruphi == $demnguoinhan and $c){
			unset($_SESSION['nguoinhan']);
			
			
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
	$passerr ="";
	if (!$auth) $passerr.= "<b> <br>mật khẩu chuyển khoản không đúng</b>";
	if ($_POST["email"] != $_SESSION["code"])	$passerr.= "<b>  <br>mã xác nhận email không đúng</b>";
    if($_SESSION["max"] < $tongtien) $passerr.=  "<b>  <br>vượt quá số lượng chuyển tối đa trong ngày</b>";
    if ($i["sodu"] < $tongtien ) $passerr.="<br> <b> số tiền trong tài khoản không đủ</b>";
 	if ($_POST["trpass"] != $_POST["xntrpass"])	$passerr .= "<br> <b>pass và xác nhận pass không hợp lệ </b>";	 
	$passerr.=" <br>vui lòng nhập lại";

	
	$payamt = $_POST["amt"];
	$taikhoanchuyen = $_POST["taikhoanid"];
	
	$phichuyentien = $_POST["phichuyentien"];
	$nguoichiuphi = $_POST["nguoichiuphi"];
		$noidung = $_POST["noidung"];
	}		
  /* ngoac cua pay2*/}
      $dem1 =0;
		$dem2=0;
		if(isset($_SESSION['nguoinhan']) ){
		foreach  ($_SESSION['nguoinhan'] as $nguoinhan_1){
			$dem1++;
		if ($nguoinhan_1 != "" )$dem2++; 
			
		}
			if ($dem2 == 0) $loi++;
		}
		else $loi++;
		if (@$payamt == 0) $loi++; 
?>
	
   <?php  if ($loi != 1)
{ ?>
	<form id="form1" name="form1" method="post" action="formchuyentientaikhoanhuong2.php">     
     	
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
                  <td width="203"><strong> NGƯỜI NHẬN</strong></td>
                  <td width="322">
				  <?php
				foreach  ($_SESSION['nguoinhan'] as $nguoinhan_1){
			
	             	if ($nguoinhan_1 != "" ){
                    $sql ="SELECT id_khachhang,taikhoanid FROM taikhoan where taikhoanid = '$nguoinhan_1'"; 	
						$kq = $control->query($sql);
					    $arr = $control->fetch_arr($kq);
					    $sql ="SELECT ho,ten FROM khachhang where id_khachhang=$arr[id_khachhang]"; 	
						$kq = $control->query($sql);
						$arr2 = $control->fetch_arr($kq);
				echo "<br><b>&nbsp;TÊN : </b>".$arr2["ho"]."  ".$arr2["ten"];
				echo "<br><b>&nbsp;TÀI KHOẢN ID : </b>".$arr["taikhoanid"];			
				
				echo "<br>";		
				
						
		            }   
		            }
		      
	
                  ?>
                  

<input type="hidden" name="amt" value="<?php echo $payamt; ?>"  />
<input type="hidden" name="taikhoanid" value="<?php echo $taikhoanchuyen; ?>"  />

<input type="hidden" name="phichuyentien" value="<?php echo $phichuyentien; ?>"  />
<input type="hidden" name="nguoichiuphi" value="<?php echo $nguoichiuphi; ?>"  />						  <input type="hidden" name="noidung" value="<?php echo $noidung; ?>"  />					  

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
                  <td><strong>NHẬP MẬT KHẨU CHUYỂN KHOẢN</strong></td>
                  <td><input name="trpass" type="password"  size="35" required /></td>
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
		else echo " da xay ra loi xin hay kiem tra lai thong tin nhap "; 
		?>
		<?php require("Footer.php") ;?>
</div>
</body>
</html>