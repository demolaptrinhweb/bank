t<?php

@session_start();
?>
<?php		if(!isset($_SESSION['id_khachhang'])) {
	header("Location: index.php?ts=bk");
}?>
<?php 
require ("DBconnect.php");
	require_once("class_vs_function.php");
	$passerr="";
		
	if (isset($_POST["pay"])){
		$passerr="";
		$id_them = $control->string_escape($_POST["id_them"]);
		$sql= "select * from taikhoan where taikhoanid = '$id_them'";
		$c =$control->query($sql);
		$h = $control->fetch_arr($c);
		
		
		$sql1 = "select taikhoanhuongid from taikhoanhuong where taikhoanhuongid = '$id_them'" ;
		$d = $control->query($sql1);
		$j = $control->fetch_arr($d);
		
		
		if($h and !$j and $h["trangthai"] == 2){
		$a = new themtaikhoanhuong($_SESSION["id_khachhang"]);
		$a->them($conn,$id_them);
	    if( $control->row_affected() == 1 ) header("location:formchuyentien3.php?kq=tkh");
		 
		}
		
			
		if (!$h)$passerr .= "tài khoản thêm không tồn tại";
		if ($j) $passerr .= "tài khoản thêm đã có trong dữ liệu";
		if ($h["trangthai"] == 1 ) $passerr .= "tài khoản hiện không hoạt động";
 		
	}
?>


<form id="form1" name="form1" method="post" action="">
  
     	<h2>THÊM TÀI KHOẢN HƯỞNG </h2>
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
        	      <td><strong>TÀI KHOẢN CẦN THÊM </strong></td>
        	      <td><label>
        	        <input type="text" name="id_them" id="id_them" size="25" required/>
      	        </label></td>
      	      </tr>
        	    <tr>
        	      <td colspan="2"><div align="right">
        	        <input type="submit" name="pay" id="pay" value="ĐỒNG Ý" />
        	      </div></td>
       	        </tr>
      	    </table>
