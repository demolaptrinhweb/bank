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
		require("accheader.php");?>
	 <?php 
		require ("DBconnect.php");
		require_once("class_vs_function.php");
		?>
		
	<?php 
	$passerr="";
	
	$sql="SELECT * FROM vaytien where ";
		
      if (isset($_GET["taikhoanvay"]))		
	       $sql .= " taikhoanid = '$_GET[taikhoanvay]' " ;	
		
   else {
   if (!isset($_POST["taikhoanvay"]))		
		$sql .=" taikhoanid = '$_SESSION[taikhoanid]'"	;
	else $sql .= " taikhoanid = '$_POST[taikhoanvay]'" ;	
   }
	$kq = $control->query($sql);
	$arr = $control->fetch_arr($kq);
		
		
    
		
		
		
	$loi = 0 ;
		
		
	   if(isset($_POST["pay2"]))
  {   
		   $results_3 = mysqli_query($conn,"SELECT * FROM khachhang where id_khachhang=$_SESSION[id_khachhang]");
		   $arrpayment1 = mysqli_fetch_assoc($results_3);	
   //chuyen pass nguoi dung nhap sang harsh-password
	$auth = password_verify($_POST["trpass"],$arrpayment1["passchuyenkhoan"]);	
		   
	$sql="select no from taikhoan where taikhoanid ='$_POST[taikhoanvay]'";
    $kq2 = $control->query($sql);
	$arr2 = $control->fetch_arr($kq2);	   
	
	$sql = "select sodu from taikhoan where taikhoanid='$_POST[taikhoanid]'"	  ;
	$kq3 = $control->query($sql);
	$arr3 = $control->fetch_arr($kq3);	   
	if($auth and $_POST["trpass"] == $_POST["conftrpass"] and $_POST["payamt"] <= $arr2["no"] and $_POST["payamt"] > 0 and $arr3["sodu"] >= $_POST["payamt"] )
		
		
		
	{   
		$control->query("START TRANSACTION");
		$demthanhcong=0;
		$vay = new chuyentien($_POST["taikhoanid"]);
	    $vay->setCon($conn);
	    $vay->setphichuyen($_POST["payamt"]);
	    $vay->setid($_POST["taikhoanid"]);
		$vay->trutiennguoichuyen();
	    $a = $control->row_affected();
		if ($a == 1)$demthanhcong++;
	   
	    $sql = "update taikhoan set no = no - $_POST[payamt]  where taikhoanid = '$_POST[taikhoanvay]'";
	    $resu = $control->query($sql);
	    $a = $control->row_affected();
		if ($a == 1)$demthanhcong++;
		
		$sql = "insert into trano values ('',now(),$_POST[payamt],'$_POST[taikhoanid]','$_POST[taikhoanvay]','$_SESSION[khachhangid]')";
	     $resu = $control->query($sql);
		
		$a = $control->row_affected();
	    if ($a == 1)$demthanhcong++;
	    
		 $sql = "select no from taikhoan where taikhoanid = '$_POST[taikhoanvay]'";
		 $resu = $control->query($sql);
		 $arr = $control->fetch_arr($resu);
	     
		 if ($arr["no"] == 0) {
	     $sql = "delete from vaytien where taikhoanid = '$_POST[taikhoanvay]'";
		 $resu = $control->query($sql);}
		
		
		
		
	    if ($demthanhcong == 3) {
			
			$control->query("commit");
			header("Location: formchuyentien3.php?kq=ct");		
				}
		else {
			$control->query("rollback");
			?>
		<script>
		alert("có lỗi khi truyền thông tin xin thủ lại");
		</script>
		<?php
			
		}
	}
   
   
   
	else
	{
		
		
		
	if (!$auth) $passerr .= "<b> <br>mật khẩu chuyển khoản không đúng</b>";
	if ($_POST["trpass"] != $_POST["conftrpass"])	$passerr .= "<b> <br> mật khẩu xác nhận không đúng</b>";
		
    if ($_POST["payamt"] > $arr2["no"] or $_POST["payamt"] <= 0) $passerr .="<b><br> số tiền trả phải bé hơn hoặc bằng số nợ và lớn hơn 0 </b>";		
	if ($arr3["sodu"] < $_POST["payamt"] ) $passerr .= "<b><br>số tiền trong tài khoản không đủ </b>";	
	$passerr .= " <br>vui lòng nhập lại";
    
		
		
	
	}		  
    }       
		
	@$results_4 = mysqli_query($conn,"SELECT * FROM kieuvay where id_kieuvay=$arr[kieuvay]");
	@$array_4 = mysqli_fetch_assoc($results_4);
		
		
?>
		<div align="center" >
	<form id="form2" name="form2" method="get" action="">
	  <table>
		  <input type="hidden" name="ts" value="">
			<tr>
        	      <td><strong>CHỌN TÀI KHOẢN  NỢ  </strong></td>
        	   <td><label>
        	       <select name="taikhoanvay" id="taikhoanvay"  onchange="form2.submit()" > 
					        <option value="<?php echo $_SESSION["taikhoan_id"] ?>">tài khoản mặc định &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; </option>
				   <?php  
					    $sql = "SELECT * FROM taikhoan where id_khachhang=$_SESSION[id_khachhang] and no > 0";				
                        $results_1 = $control->query($sql);			
                        
					  while ($rowsacc = $control->fetch_arr($results_1)){
						  
					     ?>
				   <option value="<?php echo $rowsacc["taikhoanid"];?>" <?php 
						  
						  if (isset($_GET["taikhoanvay"]) and $_GET["taikhoanvay"] == $rowsacc['taikhoanid']) echo "selected ='selected'" ;?> > 
					   
					   <?php echo $rowsacc["taikhoanid"] ?>
					   
					   </option>
					   
					   
					 <?php }  ?>
				   </select>
				   
				   
      	           
      	        </label></td>
      	      </tr>  
			  
			  </table>
	</form>
		
   
	<form id="form1" name="form1" method="post" action="">     
     	<h2>THÔNG TIN NỢ</h2>
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
                  <td width="203"><strong>THÔNG TIN NỢ</strong></td>
                  <td width="322">
				  <?php
	
				echo "<b>&nbsp;KIÊU VAY : </b>".$array_4["kieuvay"];
				echo "<br><b>&nbsp;SỐ LƯỢNG VAY : </b>".$arr["sovay"];			
				echo "<br><b>&nbsp;TÀI KHOẢN VAY : </b>".$arr["taikhoanid"];
                echo "<br><b>&nbsp;NGÀY TẠO : </b>".$arr["ngaytao"];	
	
	            $sql = "select no from taikhoan where taikhoanid ='$arr[taikhoanid]'";
	            $kq1 = $control->query($sql);
	            $arr1 = $control->fetch_arr($kq1);
	            echo "<br><b>&nbsp;NỢ : </b>".$arr1["no"];
	            
                  ?>		  
				  </td>
                </tr>   
				  <input type="hidden" name="taikhoanvay" value="<?php echo $arr["taikhoanid"];?>" />
				  <tr>
        	      <td><strong>CHỌN TÀI KHOẢN TRẢ TIỀN</strong></td>
        	      <td><label>
        	        <select name="taikhoanid" id="taikhoanid">
                             <option value="">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; </option>
        	 			<?php
						$results_1 = mysqli_query($conn,"SELECT * FROM taikhoan where id_khachhang=$_SESSION[id_khachhang] and trangthai = 2 ");
						while($rowsacc = mysqli_fetch_array($results_1,MYSQLI_ASSOC))
						{
							
							echo "<option value='$rowsacc[taikhoanid]'>$rowsacc[taikhoanid]</option>";
						}
						?>
      	            </select>
      	        </label></td>
      	      </tr>
				  
				  
				   <tr>
                  <td><strong>SỐ TIỀN TRẢ</strong></td>
                  <td><input name="payamt" type="number" id="payamt" size="35" step="any" required/></td>
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
                  <td colspan="2"><div align="right">
                    <input type="submit" name="pay2" id="pay2" value="Pay" />
                   
                  </div></td>
                </tr>
              </table>
		</div>
		</div>
</body>
</html>
