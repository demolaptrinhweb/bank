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
	 <?php require ("accmenu.php") ;
		  require("accheader.php");
		?>
		
	<?php 
require ("DBconnect.php");	
require_once("class_vs_function.php");	
?>
<?php  
$passerr="";
	if (isset($_POST["pay"])){
	
		$dem=0;
		$sql1 = "select kyhan_so from kyhanguitien where id_kyhan = '$_POST[kyhan]'";
		$a = $control->query($sql1);
		$b = $control->fetch_arr($a);
		
		$sql11 = "select sodu from taikhoan where taikhoanid = '$_POST[taikhoanid]'" ;
		$j = $control->query($sql11);
		$i = $control->fetch_arr($j);
		
		$sql22 = "select taikhoanid from taikhoantietkiem where taikhoanid = '$_POST[taikhoanid]'";
		$h = $control->query($sql22);
		$k = $control->fetch_arr($h);	
			
		if ($i["sodu"] >= $_POST["gui_amt"] and $_POST["gui_amt"] != 0 and !$k){	
			
		$sql = "INSERT INTO taikhoantietkiem VALUES('','$_POST[taikhoanid]',$_POST[kyhan],$_POST[gui_amt],$_POST[hinhthuc],now(),DATE_ADD(
		now(),INTERVAL $b[kyhan_so] DAY))";
			
		$a_resu = $control->query($sql);
		$c = $control->row_affected();
		if($c == 1 ) $dem++; 
		
		
		$trutien = new chuyentien($_POST["taikhoanid"]);
		$trutien->setCon($conn);
		$trutien->setphichuyen($_POST["gui_amt"]);
		$trutien->trutiennguoichuyen();
		
		$c = $control->row_affected();
		if($c == 1 ) $dem++; 
		if ($dem == 2) 
			 {	?>	
	<script>
  
		 location.replace(" formchuyentien3.php?kq=tktk"); 
</script>
	 <?php  }
			
			 else {
			
			?>
		<script>
		alert("có lỗi khi truyền thông tin xin thủ lại");
		</script>
		<?php
			
		}
		}
		
		
		else {
			if ($i["sodu"] < $_POST["gui_amt"]) $passerr.= " tài khoản không có đủ tiền ;";
			if ($_POST["gui_amt"] == 0) $passerr.="chưa nhập số tiền gửi ;";
			if ($k) $passerr.= "tài khoản gủi đã tồn tại";
		}
		
		
		
	}
	?>
<div align="center" >
<form id="form1" name="form1" method="post" action="">
  
     	<h2> MỞ TÀI KHOẢN TIẾT KIỆM </h2>
           	  <table width="591" height="177" border="1">
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
        	      <td><strong>TÀI KHOẢN NGUỒN </strong></td>
        	       <td><label>
        	        <select name="taikhoanid" id="taikhoanid" >
                             <option value="">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; </option>
        	 			<?php
						$sql = "SELECT * FROM taikhoan where id_khachhang=$_SESSION[id_khachhang] and trangthai = 2" ;
						
						$results_1 = $control->query($sql);
						
						
						while($rowsacc = $control->fetch_arr($results_1))
						{
							echo "<option value='$rowsacc[taikhoanid]'>$rowsacc[taikhoanid]; SỐ DƯ   $rowsacc[sodu]</br></option>";
						}
						?>
      	            </select>
      	        </label></td>
      	      </tr>
				<tr>
				  <td>
					<strong> KÌ HẠN GỦI </strong>
				  </td>
					<td>
						<label>
						<select name="kyhan" id="kyhan">
							<option value="">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; </option>
							<?php
						$sql = "SELECT * FROM kyhanguitien " ;
						
						$results_1 = $control->query($sql);
						
						
						while($rowsacc = $control->fetch_arr($results_1))
						{
							echo "<option value='$rowsacc[id_kyhan]'>$rowsacc[kyhan_chu]</br></option>";
						}
						?>
							</select>
						</label> 
					</td>
			    </tr>  
				  <tr>
				  <td><strong> SỐ TIỀN GỬI</strong></td>
					  <td><label>
						  <input type="number" name="gui_amt" id="gui_amt" required >
						  </label>
					  </td>
				  </tr>
				  <tr>
				  <td><strong> HÌNH THỨC TRẢ LÃI</strong></td>
					  <td><label>
						  <select name="hinhthuc" id="hinhthuc">
						  <option value="1"> lãi nhập gốc </option>
						  
							  </select>
						  </label>
					  </td>
				  </tr>
        	    <tr>
        	      <td colspan="2"><div align="right"  >
        	        <input type="submit" name="pay" id="pay" value="ĐỒNG Ý" />
        	      </div></td>
       	        </tr>
      	    </table>
	</div>
	 <?php require("Footer.php") ;?>
	</div>
</body>
</html>