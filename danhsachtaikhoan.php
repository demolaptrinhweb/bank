	
<?php @session_start(); ?>
<?php		if(!isset($_SESSION['id_khachhang'])) {
	header("Location: InDex.php?ts=bk");
	
}?>
<?php require("DBconnect.php") ;
	require_once("class_vs_function.php"); ?>


<script src="js/jquery.js">
</script>
<script> 
 function boLoc(soTrang){
	 soTrang = soTrang?soTrang:0 ;
	
	 var timkiem = $("#timkiem").val();
	 var taikhoan = $("#taikhoan").val();
	 var sotien = $("#sotien").val();
	 var trangthai = $("#trangthai").val();
	 $.ajax({
		 type : "GET",
		 url : "danhsachtaikhoan_xuly.php",
		 data : "page=" + soTrang + "&timkiem="+ timkiem + "&taikhoan="+ taikhoan + "&sotien=" + sotien +
		 "&trangthai=" + trangthai,
		 success : function(dulieu){
			 $("#noidung").html(dulieu);
		 }
	 })
	 
 }
    
</script>	




<form id="form1" name="form1" method="get" action="Javascript:;" >
  
     	
           	  <table width="591" height="177"  align="center">
        	    <tr>
					
				  <td> <strong> TÌM KIẾM THEO ID</strong></td>
				   <td> <label><input type="input" name ="timkiem" id="timkiem"  onKeyUp="boLoc()"  value="<?php 
					   if (isset($_GET["timkiem"]) and $_GET["timkiem"] != "" ) echo $_GET["timkiem"]; ?>"> </label></td>
				  </tr>
        	    <tr>
        	      <td><strong> TÀI KHOẢN </strong></td>
        	   <td><label>
        	        <select name="taikhoan" id="taikhoan" onchange="boLoc()"  >
                             <option value="">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; </option>
        	 			<?php
						$sql1 = "SELECT * FROM taikhoan where id_khachhang=$_SESSION[id_khachhang]"; ;
						
						$results_1 = $control->query($sql1);
						
						
						while($rowsacc = $control->fetch_arr($results_1))
						{ ?>
							
							<option value='<?php echo $rowsacc["id_taikhoan"]; ?>' 
									<?php if (isset($_GET["taikhoan"]) and $_GET["taikhoan"] != "" and $_GET["taikhoan"] == $rowsacc["id_taikhoan"]) echo "selected ='selected'";?>> <?php echo  $rowsacc["taikhoanid"];?></option>";
						<?php }
						?>
      	            </select>
      	        </label></td>
      	      </tr>
				  <tr>
        	      <td><strong>TRẠNG THÁI </strong></td>
        	   <td><label>
        	        <select name="trangthai" id="trangthai"  onchange="boLoc()" >
                             <option value="">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; </option>
						
						
        	 			    <option value="1" <?php if( isset($_GET["trangthai"]) and $_GET["trangthai"] != "" and $_GET["trangthai"] == 1 ) echo "selected = 'selected'" ?> >
								tạm ngừng</option>
						
						
						    <option value="2" <?php if (isset($_GET["trangthai"]) and $_GET["trangthai"] != "" and $_GET["trangthai"] == 2 ) echo "selected = 'selected'" ?> > đang hoạt động</option>
						
						
      	            </select>
      	        </label></td>
      	      </tr>
				<tr>
        	      <td><strong> SỐ TIỀN </strong></td>
        	   <td><label>
        	        <select name="sotien" id="sotien" onchange="boLoc()"  >
                             <option value="">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; </option>
        	 			     <option value="1" <?php if (isset($_GET["sotien"]) and $_GET["sotien"] != "" and $_GET["sotien"] == 1) echo "selected ='selected'";?>> giảm dần </option>
						    <option value="2" <?php if (isset($_GET["sotien"]) and $_GET["sotien"] != "" and $_GET["sotien"] == 2) echo "selected ='selected'";?>> tăng dần </option>
      	            </select>
      	        </label></td>
      	      </tr> 
	</table>
</form>	
<script> 
 
	
	$(document).ready(function(){
	 	$.ajax({
		 type : "GET",
		 url : "danhsachtaikhoan_xuly.php",
		 data : "page=" + "&timkiem=" + "&taikhoan=" + "&sotien="  +
		 "&trangthai=" ,
		 success : function(dulieu){
			 $("#noidung").html(dulieu);
		 }
	 })
	 
 })
    
</script>	
<div id="noidung"></div>
	