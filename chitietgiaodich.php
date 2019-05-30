<?php @session_start(); ?>
<?php		if(!isset($_SESSION['id_khachhang'])) {
	header("Location: index.php?ts=bk");
}?>	
<?php require("DBconnect.php") ;
      require_once("class_vs_function.php");
?>
<script src="js/jquery.js">
</script>
<script> 
 function boLoc(soTrang){
	 soTrang = soTrang?soTrang:0 ;
	
	 var timkiem = $("#timkiem").val();
	 var taikhoan = $("#taikhoan").val();
	 var sotien = $("#sotien").val();
	 $.ajax({
		 type : "GET",
		 url : "chitietgiaodich_xuly.php",
		 data : "page=" + soTrang + "&timkiem="+ timkiem + "&taikhoan="+ taikhoan + "&sotien=" + sotien,
		 success : function(dulieu){
			 $("#noidung").html(dulieu);
		 }
	 })
	 
 }
    
</script>	



<form id="form1" name="form1" method="get" action="acctrangchu.php" >
  
     	
           	  <table width="591" height="177"  align="center">
				  <input type="hidden" name="ts" value="ctgd" > 
        	    <tr>
				  <td> <strong> TÌM KIẾM THEO ID</strong></td>
				   <td> <label><input type="input" name ="timkiem" id ="timkiem"  onKeyUp="boLoc()"  value="<?php 
					   if (isset($_GET["timkiem"]) and $_GET["timkiem"] != "" ) echo $_GET["timkiem"]; ?>"> </label></td>
				  </tr>
        	    <tr>
        	      <td><strong> TÀI KHOẢN </strong></td>
        	   <td><label>
        	        <select name="taikhoan" id="taikhoan" onChange="boLoc()"  >
                             <option value="">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; </option>
        	 			<?php
						$sql1 = "SELECT taikhoanid FROM taikhoan where id_khachhang=$_SESSION[id_khachhang]"; ;
						
						$results_1 = $control->query($sql1);
						
						
						while($rowsacc = $control->fetch_arr($results_1))
						{ ?>
							
							<option value='<?php echo $rowsacc["taikhoanid"]; ?>' 
									<?php if (isset($_GET["taikhoan"]) and $_GET["taikhoan"] != "" and $_GET["taikhoan"] == $rowsacc["taikhoanid"]) echo "selected ='selected'";?>> <?php echo  $rowsacc["taikhoanid"];?></option>";
						<?php }
						?>
      	            </select>
      	        </label></td>
      	      </tr>
				  <tr>
        	      <td><strong> SỐ TIỀN </strong></td>
        	   <td><label>
        	        <select name="sotien" id="sotien" onChange="boLoc()"  >
                             <option value="">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; </option>
        	 			     <option value="1" <?php if (isset($_GET["sotien"]) and $_GET["sotien"] != "" and $_GET["sotien"] == 1) echo "selected ='selected'";?>> giảm dần </option>
						    <option value="2" <?php if (isset($_GET["sotien"]) and $_GET["sotien"] != "" and $_GET["sotien"] == 2) echo "selected ='selected'";?>> tăng dần </option>
      	            </select>
      	        </label></td>
      	      </tr>
	</table>
</form>
				 
				 

		<div id= "noidung"></div>