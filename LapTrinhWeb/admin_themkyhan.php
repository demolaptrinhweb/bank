<?php @session_start(); ?>
<?php		/*if(!isset($_SESSION['id_khachhang'])) {
	header("Location: InDex.php?ts=bk");}*/
?>
<?php 
require ("DBconnect.php");
	?>
<?php  $passer="";
               if(isset($_POST["pay"])){
				 if($_POST["chu"] != "" and $_POST["so"] != "" and $_POST["laixuat"] != "") { 
				   $sql = "insert into kyhanguitien values('',$_POST[so],'$_POST[chu]',$_POST[laixuat])";
					$control->query($sql);
					 
				 }
				   
			   }
               else { if(isset($_POST["pay"]))$passer.= "vui lòng nhập đủ thông tin" ; }

?>



<form id="form1" name="form1" method="post" action="">
  
     	<h2>SỬA </h2>
           	  <table width="591" height="177" border="1">
        	<?php  if ($passer != ""){   ?>   	    
      	     <tr>
        	      <strong><?php echo $passer; ?> </strong>
        	      
        	        
					
      	      </tr>
				 <?php }?>
        	    <tr>
        	      <td><strong>ngày (chữ) </strong></td>
        	      <td><label>
        	        
					 <input type="text" name="chu" vaulue="">
      	        </label></td>
      	      </tr>
<tr>
        	      <td><strong>ngày (số)</strong></td>
        	      <td><label>
        	        
					  <input type="number" name="so" value="" >
      	        </label></td>
      	        </label></td>
      	      </tr>
<tr>
        	      <td><strong>lãi xuất </strong></td>
        	      <td><label>
        	        
					 <input type="number" step="0.01" name="laixuat" value="" >
      	        </label></td>
      	      </tr>
        	    <tr>
        	      <td colspan="2"><div align="right">
        	        <input type="submit" name="pay" id="pay" value="TIẾP THEO" />
        	      </div></td>
       	        </tr>
      	    </table>
            