 <?php

@session_start();
?>
<?php		if(!isset($_SESSION['id_khachhang'])) {
	header("Location: index.php?ts=bk");
}?>

<?php


include("DBconnect.php");
require_once("class_vs_function.php");


?>	
<script src="js/jquery.js">
</script>
<script> 
 function boLoc(soTrang){
	 soTrang = soTrang?soTrang:0 ;
	
	 var timkiem = $("#timkiem").val();
	 var taikhoan = $("#taikhoan").val();
	 $.ajax({
		 type : "GET",
		 url : "xemno_1_xuly.php",
		 data : "page=" + soTrang + "&timkiem="+ timkiem + "&taikhoan="+ taikhoan ,
		 success : function(dulieu){
			 $("#noidung").html(dulieu);
		 }
	 })
	 
 }
    
</script>	
	
<form id="form1" name="form1" method="get" action="Javascript:;" >
           	  <table width="591"  align="center" style="min-height: 177px ;top: 0">
				  
        	    <tr>
				  <td> <strong> TÌM KIẾM THEO VAY ID</strong></td>
				   <td> <label><input type="input" name ="timkiem" id="timkiem" onKeyUp="boLoc()" value="<?php 
					   if (isset($_GET["timkiem"]) and $_GET["timkiem"] != "" ) echo $_GET["timkiem"]; ?>" > </label></td>
				  </tr>
        	    <tr>
        	      <td><strong> TÀI KHOẢN </strong></td>
        	   <td><label>
        	        <select name="taikhoan" id="taikhoan" onchange="boLoc()" style="top: 0;"  >
                             <option value="">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; </option>
        	 			<?php
						$sql1 = "SELECT * FROM taikhoan where id_khachhang=$_SESSION[id_khachhang]"; 
						
						$results_1 = $control->query($sql1);
						
						
						while($rowsacc = $control->fetch_arr($results_1))
						{ ?>
							
							<option value='<?php echo $rowsacc["taikhoanid"]; ?>' >
								<?php echo  $rowsacc["taikhoanid"];?></option>";
						<?php }
						?>
      	            </select>
      	        </label></td>
      	      </tr>
	</table>
				  </form>
	
				  	<script> 
 
	$(document).ready(function(){
	 	boLoc();
	 
 })
    
</script>	
	
	
	
<div id="noidung"> </div>