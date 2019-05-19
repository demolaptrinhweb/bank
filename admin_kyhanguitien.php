<?php @session_start(); ?>
<?php		/*if(!isset($_SESSION['id_khachhang'])) {
	header("Location: index.php?ts=bk");}*/
?>
<?php 
require ("DBconnect.php");
	
	    
		if(isset($_POST["pay"])){
			$dem = 0 ;
			foreach($_POST["taikhoanid"] as $taikhoan){
				if ($_POST["chu"] != ""){
					$sql =  "update kyhanguitien set kyhan_chu = $_POST[chu] where id_kyhan = '$taikhoan'";
					$control->query($sql);
				}
				if ($_POST["so"] != ""){
					$sql =  "update kyhanguitien set kyhan_so = $_POST[so] where id_kyhan = '$taikhoan'";
					$control->query($sql);
				}
				if ($_POST["laixuat"] != ""){
					$sql =  "update kyhanguitien set laixuat = $_POST[laixuat] where id_kyhan = '$taikhoan'";
					$control->query($sql);
				}
				if ($control->row_affected() == 1) $dem++;
			}
			
			if ($dem > 0) header("location : " );
		}
		
?>

<?php ?>






<form id="form1" name="form1" method="post" action="admin_kyhanguitien.php">
  
     	<h2>SỬA </h2>
           	  <table width="591" height="177" border="1">
        	    
        	    <tr>
        	      <td><strong>CHỌN KỲ HẠN</strong></td>
        	      <td><label>
        	        <select name="taikhoanid[]" id="taikhoanid" multiple="multiple">
                             <option value="">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; </option>
        	 			<?php
						$results_1 = mysqli_query($conn,"SELECT * FROM kyhanguitien  ");
						while($rowsacc = mysqli_fetch_array($results_1,MYSQLI_ASSOC))
						{
							
							echo "<option value='$rowsacc[id_kyhan]'>ngày&nbsp;$rowsacc[kyhan_so]&nbsp;&nbsp;   $rowsacc[kyhan_chu]&nbsp;lãi xuất &nbsp;$rowsacc[laixuat]</option>";
						}
						?>
      	            </select>
      	        </label></td>
      	      </tr>
	            </tr>
                  
      	      </tr>
        	    <tr>
        	      <td><strong>ngày (chữ) </strong></td>
        	      <td><label>
        	        
					 <input type="text" name="chu" vaulue="">
      	        </label></td>
      	      </tr>
<tr>
        	      <td><strong>ngày (số)</strong></td>
        	      <td><label>
        	        
					  <input type="number" name="so" value="0" >
      	        </label></td>
      	        </label></td>
      	      </tr>
<tr>
        	      <td><strong>lãi xuất </strong></td>
        	      <td><label>
        	        
					 <input type="number" name="laixuat" value="" >
      	        </label></td>
      	      </tr>
        	    <tr>
        	      <td colspan="2"><div align="right">
        	        <input type="submit" name="pay" id="pay" value="TIẾP THEO" />
        	      </div></td>
       	        </tr>
      	    </table>
            
