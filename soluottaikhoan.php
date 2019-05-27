<?php

@session_start();
?>
	<?php		if(!isset($_SESSION['id_khachhang'])) {
	header("Location: index.php?ts=bk");
}?>

	<?php require("DBconnect.php") ;
          require_once("class_vs_function.php"); 
?>
	
	<?php 
        

	    $sql ="SELECT ngaytao,sodu,trangthai,taikhoanid FROM taikhoan where id_taikhoan = $_SESSION[taikhoanid]" ;
		$kq = $control->query($sql);
        
	while( $arr1= $control->fetch_arr($kq)){
		$ngaytao = $arr1["ngaytao"];
		$sodu = $arr1["sodu"];
		
		$trangthai = $arr1["trangthai"];
		$taikhoanid = $arr1["taikhoanid"];
		
	}
	?>	

     <div align="center"  >
     		 <h2>&nbsp;</h2>
     		 <table width="560" border="1"  align="center">
     		   <tr>
     		     <th colspan="2" scope="col">KHÁCH HÀNG </th>
   		     </tr>
     		<tr>
     		     <td height="37">GIỚI HẠN GIAO DỊCH </td>
     		     <td>&nbsp;<?php echo $_SESSION["max"] ; ?></td>
   		     </tr>
     		 
		
	</div> 


	 <div align="center"  >
     		 <h2>&nbsp;</h2>
     		 <table width="560" border="1"  align="center">
     		   <tr>
     		     <th colspan="2" scope="col">TÀI KHOẢN </th>
   		     </tr>
     		<tr>
     		     <td height="37">TÀI KHOẢN MẶC ĐỊNH </td>
     		     <td>&nbsp;<?php echo $taikhoanid ; ?></td>
   		     </tr>
     		   <tr>
     		     <td height="34">NGÀY TẠO</td>
     		     <td>&nbsp;<?php echo $ngaytao ; ?></td>
   		     </tr>
     		   <tr>
     		     <td height="39">SỐ DƯ</td>
     		     <td>&nbsp;<?php echo $sodu ; ?></td>
   		     </tr> 
   		   </table>
		
	</div> 

<div align="center" >
	
     		 <h2>&nbsp;GIAO DỊCH GẦN ĐÂY</h2>
     		 <table width="560" border="1"  align="center">
     		   <tr >
     		     <th  width="105" scope="col"> ID</th>      
                 <th width="105" scope="col">NGÀY TẠO</th>
                 <th width="93" scope="col">NGƯỜI CHUYỂN</th>
                 <th width="101" scope="col">NGƯỜI NHẬN</th>
                 <th width="144" scope="col">SỐ TIỀN</th>
                  <th width="144" scope="col">NỘI DUNG</th>
      </tr>
				<?php
				 $sql ="SELECT * FROM chuyentien where id_nhan = '$_SESSION[taikhoan_id]' or id_chuyen = '$_SESSION[taikhoan_id]' order by ngaytao desc limit 0,3";
					 $results = $control->query($sql);
				 while($taikhoan = $control->fetch_arr($results)){
					 
					
					 
					 echo "
                   <tr>
                    <td>&nbsp;$taikhoan[chuyentienid]</td>     
                    <td>&nbsp;$taikhoan[ngaytao]</td>
                    <td>&nbsp;$taikhoan[id_chuyen]</td>
                    <td>&nbsp;$taikhoan[id_nhan]</td>
                    <td>&nbsp;$taikhoan[sotien]</td>
                     <td>&nbsp;$taikhoan[noidung]</td>
                  </tr>";
	  }
				 
				 
				 
				 
				 ?> 
   		   </table>
	</div> 
