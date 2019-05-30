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
		$id_them = $_POST["id_them"];
		$sql= "select trangthai from taikhoan where taikhoanid = '$id_them'";
		$kq =$control->query($sql);
		$arr = $control->fetch_arr($kq);
		
		
		$sql1 = "select taikhoanhuongid from taikhoanhuong where taikhoanhuongid = '$id_them'" ;
		$kq1 = $control->query($sql1);
		$arr1 = $control->fetch_arr($kq1);
		
		
		if($arr and !$arr1 and $arr["trangthai"] == 2){
		$sql = "INSERT INTO taikhoanhuong VALUES('','$id_them','$_SESSION[id_khachhang]')";
		$control->query($sql);	
	    if( $control->row_affected() == 1 ) { ?> <script>
		 location.replace("formchuyentien3.php?kq=tkh"); 
</script>
		 <?php }
		}
		
			
		if (!$arr) $passerr .= "tài khoản thêm không tồn tại";
		else 
		if ($arr1) $passerr .= "tài khoản thêm đã có trong dữ liệu";
	    else 	
		if ($arr["trangthai"] == 1 ) $passerr .= "tài khoản hiện không hoạt động";
 		
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
