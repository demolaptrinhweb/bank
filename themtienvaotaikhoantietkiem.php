<?php

@session_start();
?>
<?php		if(!isset($_SESSION['id_khachhang'])) {
	header("Location: index.php?ts=bk");
}?>
<?php 
require ("DBconnect.php");
	
	$passerr="";
	 $dem = 0 ;
if(isset($_GET["taikhoan"]) and $_GET["taikhoan"] != "" ) $taikhoanid =$_GET["taikhoan"];
else {
   	      
	   $taikhoanid =$_SESSION["taikhoan_id"]; 
}

   
    $sql = "select * from taikhoantietkiem where taikhoanid ='$taikhoanid'";		
  
   $results_1 = $control->query($sql);	

   if($rowsacc_1 = $control->fetch_arr($results_1))
	{
					
						
   
	if (isset($_GET["pay"])){
		
		$sql11 = "select * from taikhoan where taikhoanid = '$taikhoanid'" ;
		$j = $control->query($sql11);
		$i = $control->fetch_arr($j);
		
		
		
		
		if ($i["sodu"] >= $_GET["gui_amt"] and $_GET["gui_amt"] != 0 ){
		
		$demthanhcong = 0 ;	
	
		$sql1 = "update taikhoantietkiem set tiengui = tiengui + $_GET[gui_amt] where taikhoanid = '$taikhoanid'" ;
		$d = $control->query($sql1);
	    $c = $control->row_affected();
			if($c == 1 ) $demthanhcong++; 
			
		$sql1 = "update taikhoantietkiem set sodu = sodu - $_GET[gui_amt] where taikhoanid = '$taikhoanid'" ;
		$d = $control->query($sql1);
	    $c = $control->row_affected();
			if($c == 1 )$demthanhchong++ ; 
			
			
		if($demthanhcong == 2 ) header("Location: formchuyentien3.php?kq=ct"); 
		 
		}
		
			
		if ($i["sodu"] < $_GET["gui_amt"]) $passerr .= "số tiền trong tài khoản không đủ";
		if ($_GET["gui_amt"] == 0) $passerr .= "chưa nhập số tiền gửi";
 		
	}
   }
else $dem = 1 ;
?>


          <form id="form2" name="form2" method="get" action="acctrangchu.php">
	  <table>
			<tr>
        	      <td><strong>CHỌN TÀI KHOẢN NGUỒN  </strong></td>
        	   <td><label>
				   <input type="hidden"  name="ts" value="tk2"/>
        	       <select name="taikhoan" id="taikhoan"  onchange="form2.submit()" > 
					        <option value="">tài khoản mặc định &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; </option>
				   <?php  
					    $sql = "SELECT * FROM taikhoan where id_khachhang=$_SESSION[id_khachhang] and trangthai = 2" ;				
                        $results_1 = $control->query($sql);			
                        
					  while ($rowsacc = $control->fetch_arr($results_1)){
						  if (isset($_GET["id_tietkiem"])) echo $_GET["taikhoan"] ;
					     ?>
				   <option value="<?php echo $rowsacc["taikhoanid"];?>" <?php 
						  
						  if (isset($_GET["taikhoan"]) and $_GET["taikhoan"] == $rowsacc['taikhoanid']) echo "selected ='selected'" ;?> > 
					   
					   <?php echo $rowsacc["taikhoanid"] ?>
					   
					   </option>
					   
					   
					 <?php }  ?>
				   </select>
				   
				   
      	           
      	        </label></td>
      	      </tr>  
			  
			  </table>
	</form>
<form id="form1" name="form1" method="get" action="acctrangchu.php">
  
     	<h2>THÊM TIỀN VÀO TÀI KHOẢN TIẾT KIỆM </h2>
	<?php if ($dem != 1){ ?>
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
        	      <td><strong>SỐ TIỀN TRONG TÀI KHOẢN TIẾT KIỆM </strong></td>
        	   <td><label>
        	        <?php echo $rowsacc_1["tiengui"] ;?>
      	        </label>
				    <input type="hidden"  name="ts" value="tk2"/>
					<input type="hidden" name="taikhoan" value="<?php echo $taikhoanid;?>"/>
					
					</td>
      	      </tr>
				  <tr>
				  <td><strong> SỐ TIỀN GỬI</strong></td>
					  <td><label>
						  <input type="number" name="gui_amt" id="gui_amt">
						  </label>
					  </td>
				  </tr>
        	    <tr>
        	      <td colspan="2"><div align="right">
        	        <input type="submit" name="pay" id="pay" value="ĐỒNG Ý" />
        	      </div></td>
       	        </tr>
      	    </table>
<?php }
	else  echo "tài khoản không có tài khoản tiết kiệm";//header("Location:motaikhoantietkiem.php");
	
	
	
	
	
	?>