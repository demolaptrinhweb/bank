<?php @session_start(); ?>
<?php		if(!isset($_SESSION['id_khachhang'])) {
	header("Location: index.php?ts=bk");
}?>
	<?php require("DBconnect.php");
require_once("class_vs_function.php");?>
<script src="js/jquery.js">
</script>

<script> 
 function boLoc(soTrang){
	 soTrang = soTrang?soTrang:0 ;
	
	 var id = $("#id").val();
	 var tt = $("#trangthai").val();
	 var st = $("#sotien").val();
	
	 $.ajax({
		 type : "GET",
		 url : "danhsachthe_xuly.php",
		 data : "page=" + soTrang + "&the="+ id + "&trangthai="+ tt + "&sotien=" + st,
		 success : function(dulieu){
			 $("#noidung").html(dulieu);
		 }
	 })
	 
 }
    
</script>	
	

  
     	
           	  <table width="591" height="177"  align="center">
        	   
        	    <tr>
        	      <td><strong> TÀI KHOẢN </strong></td>
        	   <td><label>
        	        <select name="the" id="id" onChange="boLoc()"  >
                             <option value="">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; </option>
        	 			<?php
						$sql1 = "SELECT id_the,thenganhangid FROM thenganhang where id_khachhang=$_SESSION[id_khachhang]"; ;
						
						$results_1 = $control->query($sql1);
						
						
						while($rowsacc = $control->fetch_arr($results_1))
						{ ?>	
							<option value='<?php echo $rowsacc["id_the"]; ?>'>
								<?php echo $rowsacc["thenganhangid"]; ?>	</option>;
						<?php }
						?>
      	            </select>
      	        </label></td>
      	      </tr>
				  <tr>
        	      <td><strong>TRẠNG THÁI </strong></td>
        	   <td><label>
        	        <select name="trangthai" id="trangthai"  onChange="boLoc()" >
                             <option value="">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; </option>
						
						
        	 			    <option value="1" >
								tạm ngừng</option>
						
						
						    <option value="2"> đang hoạt động</option>
						
						
      	            </select>
      	        </label></td>
      	      </tr>
				  <tr>
        	      <td><strong> SỐ TIỀN </strong></td>
        	   <td><label>
        	        <select name="sotien" id="sotien" onChange="boLoc()"  >
                             <option value="">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; </option>
        	 			     <option value="1" > giảm dần </option>
						    <option value="2" > tăng dần </option>
      	            </select>
      	        </label></td>
      	      </tr> 
	</table>
 			  
<script> 
 
	
	$(document).ready(function(){
	 	boLoc();
	 
 })
    
</script>		
	<div id="noidung"></div>