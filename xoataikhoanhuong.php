<?php @session_start(); ?>
<?php		if(!isset($_SESSION['id_khachhang'])) {
	header("Location: InDex.php?ts=bk");
}?>
	<?php 
require ("DBconnect.php");
?>
<?php 

   if(isset($_GET["pay"])){

	   $dem=0;
	   $demthanhcong=0;
	  $_SESSION["huongid"] = $_GET["huongid"];
	  foreach  ($_SESSION['huongid'] as $id)	{
		  
		if ( $id != '' ) { 
			 $dem++;
			$sql = "delete from taikhoanhuong where  id_taikhoanhuong = $id "	;
			$control->query($sql);
			if($control->row_affected() == 1 ) $demthanhcong++;
		   
	   }
   }
	   if($dem == $demthanhcong) {
		   unset( $_SESSION["huongid"]);
		   header("Location: formchuyentien3.php?kq=xtkh");
		   }
   
   }

?>

<form id="form1" name="form1" method="get" action="xoataikhoanhuong.php">
  
     	<h2> XOÁ TÀI KHOẢN HƯỞNG </h2>
           	  <table width="591" height="177" border="1">
        	    <tr>
        	   
      	        </label></td>
      	      </tr>
				  <tr>
        	       <td><strong>CHỌN TÀI KHOẢN HƯỞNG</strong></td>
        	      <td><label>
        	        <select name="huongid[]" id="huongid" multiple="multiple"  >
                             <option value="">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; </option>
        	 			<?php
						$sql = "SELECT * FROM taikhoanhuong where id_khachhang=$_SESSION[id_khachhang]" ;
						
						$results_1 = $control->query($sql);
						
						
						while($rowsacc = $control->fetch_arr($results_1))
						{
							
							echo "<option value='$rowsacc[id_taikhoanhuong]'>$rowsacc[taikhoanhuongid]</option>";
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

</form>