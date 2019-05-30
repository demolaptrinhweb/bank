<?php @session_start(); ?>
<?php		if(!isset($_SESSION['id_khachhang'])) {
	header("Location: index.php?ts=bk");
}?>
<?php 
require ("DBconnect.php");
	    
		
		
	if (isset($_POST["pay"]) and $_POST["taikhoanid"] != ""){
		
		
		
		
		$sql = "UPDATE khachhang SET taikhoanmacdinh = '$_POST[taikhoanid]' where id_khachhang = '$_SESSION[id_khachhang]'";
		$a = $control->query($sql);
		if ($control->row_affected() == 1) {
			$_SESSION["taikhoanid"] = $_POST["taikhoanid"];
			$sql = " select taikhoanid from taikhoan where id_taikhoan = '$_POST[taikhoanid]' ";
			$kq = $control->query($sql);
			$arr = $control->fetch_arr($kq);
			
			$_SESSION["taikhoan_id"] = $arr["taikhoanid"];
			
			
			echo "success";
		}
	}
		
?>


<form id="form1" name="form1" method="post" action="">
  
     	<h2>CÀI ĐẶT TÀI KHOẢN MẶC DỊNH  </h2>
           	  <table width="591" height="177" border="1">
        	    
        	    <tr>
        	      <td><strong>CHỌN TÀI KHOẢN </strong></td>
        	      <td><label>
        	        <select name="taikhoanid" id="taikhoanid" >
                         <option value="">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; </option>     
        	 			<?php
						$sql = "SELECT id_taikhoan,taikhoanid FROM taikhoan where id_khachhang=$_SESSION[id_khachhang]" ;
						
						$kq = $control->query($sql);
						
						
						while($arr = $control->fetch_arr($kq))
						{
							echo "<option value='$arr[id_taikhoan]'>$arr[taikhoanid]</option>";
						}
						?>
      	            </select>
      	        </label></td>
      	      </tr>
        	    <tr>
        	      <td colspan="2"><div align="right">
        	        <input type="submit" name="pay" id="pay" value="ĐỒNG Ý" />
        	      </div></td>
       	        </tr>
      	    </table>
