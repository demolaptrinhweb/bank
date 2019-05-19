<?php @session_start(); ?>
<?php		if(!isset($_SESSION['id_khachhang'])) {
	header("Location: InDex.php?ts=bk");
}?>
	<?php require("DBconnect.php") ?>
	<?php 
	    $sql = "SELECT * FROM thenganhang where id_khachhang=$_SESSION[id_khachhang]";
		$results = $control->query($sql);
	   
	
	?>		
<form id="form1" name="form1" method="get" action="acctrangchu.php" >
  
     	
           	  <table width="591" height="177"  align="center">
        	    <input type="hidden" name="ts" value="th0" >
        	    <tr>
        	      <td><strong> TÀI KHOẢN </strong></td>
        	   <td><label>
        	        <select name="the" id="the" onchange="form1.submit()"  >
                             <option value="">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; </option>
        	 			<?php
						$sql1 = "SELECT id_the,thenganhangid FROM thenganhang where id_khachhang=$_SESSION[id_khachhang]"; ;
						
						$results_1 = $control->query($sql1);
						
						
						while($rowsacc = $control->fetch_arr($results_1))
						{ ?>
							
							<option value='<?php echo $rowsacc["id_the"]; ?>' 
									<?php if (isset($_GET["the"]) and $_GET["the"] != "" and $_GET["the"] == $rowsacc["id_the"]) echo "selected ='selected'";?>> <?php echo  $rowsacc["thenganhangid"];?></option>";
						<?php }
						?>
      	            </select>
      	        </label></td>
      	      </tr>
				  <tr>
        	      <td><strong>TRẠNG THÁI </strong></td>
        	   <td><label>
        	        <select name="trangthai" id="trangthai"  onchange="form1.submit()" >
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
        	        <select name="sotien" id="sotien" onchange="form1.submit()"  >
                             <option value="">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; </option>
        	 			     <option value="1" <?php if (isset($_GET["sotien"]) and $_GET["sotien"] != "" and $_GET["sotien"] == 1) echo "selected ='selected'";?>> giảm dần </option>
						    <option value="2" <?php if (isset($_GET["sotien"]) and $_GET["sotien"] != "" and $_GET["sotien"] == 2) echo "selected ='selected'";?>> tăng dần </option>
      	            </select>
      	        </label></td>
      	      </tr> 
				  </form>				  



<div align="center" >
	
     		 <h2>&nbsp;CHI TIẾT THẺ</h2>
     		 <table width="560" border="1"  align="center">
     		   <tr >
     		     <th  width="105" scope="col">THẺ ID</th>      
                 <th width="105" scope="col">SỐ DƯ</th>
                 <th width="93" scope="col">MÃ PIN</th>
                 <th width="101" scope="col">CHỨNG MINH NHÂN DÂN</th>
                 <th width="144" scope="col">TRANG THAI</th>
				
                 
      </tr>
				 
				 <?php
				 $truyendulieu ="";
				 
				 
				 if (isset($_GET["the"]) and $_GET["the"] != "") { 
					 $sql .=  " and id_the = $_GET[the]";
					 $truyendulieu .= "&the=$_GET[the]";
				 }
				 
				 if (isset($_GET["trangthai"]) and $_GET["trangthai"] != "") {
				
					 $sql .= " and trangthai = $_GET[trangthai]";
					  $truyendulieu .= "&trangthai=$_GET[trangthai]";
				 }
				 	 
				   if (isset($_GET["sotien"]) and $_GET["sotien"] != "") {
					 if ($_GET["sotien"] == 1) {
						 $sql .=  " order by sodu desc";
					 $truyendulieu .= "&sotien=$_GET[sotien]";
					 }
					 if ($_GET["sotien"] == 2) {
						 $sql .=  " order by sodu ASC";
					 $truyendulieu .= "&sotien=$_GET[sotien]";
					 }
				 }
				 ?> 
				 
				 
				 		 <?php 
	
	
	
  $kq = $control->query($sql);
  $tsp = mysqli_num_rows($kq);
  $sd = 5 ;
  $sn = 5 ;
  
  $tst = ceil($tsp/$sd);
  
  $tsn = ceil($tst/$sn);
  

 if (isset($_GET["page"])){
	  $page = $_GET["page"] ;
	  $gr =  ceil ($page / $sn);
	  }
	  else {
		  $gr = $page = 1 ;}
		  
		  
	$vitri = ($page - 1) * $sd ;
	
	$sql.= " limit $vitri , $sd ";
	$kq = $control->query($sql);
	
	$dem = $vitri+1 ;
  ?>  
  <?php
				 echo "$sql";
   while($the = $control->fetch_arr($kq)){
					 
					 if ($the["trangthai"] == 2) $trangthai = "đang hoạt động" ;
					 else $trangthai = "tạm ngưng";
					 
				 echo "
                   <tr>
                    <td>&nbsp;$the[thenganhangid]</td>
                    <td>&nbsp;$the[sodu]</td>
                    <td>&nbsp;$the[passbin]</td>
                    <td>&nbsp;$the[cmnd]</td>	
					<td>&nbsp;$trangthai</td>	
                    
                   
        
                  </tr>";
	  }
				 
				 
				 
				 
				 ?>				 
				 
				 
   		   </table>
	
	
	<?php 
  
    if ($page != 1 and $page != 2) {
  $dau = $page-2 ;
   
  }
  else $dau = 1;
	$cuoi = $page + 2; 
  if ($cuoi > $tst) $cuoi = $tst ;
  
  
  
  ?>
  <p align="center"> trang : <?php  if ($page != 1 ){
	  ?>
      <a href="acctrangchu.php?ts=th0&page=<?php echo 1 ; echo $truyendulieu;?>"> << </a>
      
	  <?php 
  }
  
  for($i=$dau;$i<=$cuoi;$i++){
	     if ($page == $i) echo " <b> <i> $i </i> </b> &nbsp;";
		 else {
			 ?>
	             
	       <a href="acctrangchu.php?ts=th0&page=<?php echo $i ; echo $truyendulieu;?> "><?php echo $i ; ?> &nbsp;</a>
            
     <?php }
  }
   if ($page != $tsn ) {?> <a href="acctrangchu.php?ts=th0&page=<?php echo $tst ;echo $truyendulieu; ?>"> >> </a>  <?php 
   }
  ?></p>
	
 
				