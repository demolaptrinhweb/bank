 <?php @session_start(); ?>
<?php require("DBconnect.php") ;
      require_once("class_vs_function.php");
?>
	
<?php 
	    $sql = "SELECT * FROM chuyentien where (id_chuyen = '$_SESSION[taikhoan_id]' or id_nhan = '$_SESSION[taikhoan_id]')";
	?>		



<?php
				
				 
				 
				 if (isset($_GET["taikhoan"]) and $_GET["taikhoan"] != "") { 
					 $sql = "SELECT * FROM chuyentien where (id_chuyen = '$_GET[taikhoan]' or id_nhan = '$_GET[taikhoan]')";
					 
				 }
				 
				 
			
				  if (isset($_GET["timkiem"]) and $_GET["timkiem"] != "" ) { 
					 $sql .=  " and chuyentienid like '%$_GET[timkiem]%'";
					
				 }
				 
				 
				 if (isset($_GET["sotien"]) and $_GET["sotien"] != "") {
					 if ($_GET["sotien"] == 1) {
						 $sql .=  " order by sotien desc";
					
					 }
					 if ($_GET["sotien"] == 2) {
						 $sql .=  " order by sotien ASC";
					
					 }
				 }
				 ?> 


<?php 
	
	
	
  $kq = $control->query($sql);
  $tsp = @mysqli_num_rows($kq);
  $sd = 5 ;
  
  
  $tst = ceil($tsp/$sd);
  
  
  if ($tsp != 0 ){
 
  if (isset($_GET["page"]) and $_GET["page"] != 0){
	  $page = $_GET["page"] ;
	 
	  }
	  else {
		  $gr = $page = 1 ;}
		  
		  
	$vitri = ($page - 1) * $sd ;
	
	$sql.= " limit $vitri , $sd ";
				  
	$kq = $control->query($sql);
	
	$dem = $vitri+1 ;
  ?>  
				  
	
<div align="center" >
	
     		 <h2>&nbsp;CHI TIẾT GIAO DỊNH</h2>
     		 <table   border="1"  align="center">
     		   <tr >
				   <th width="105" scope="col" > ID CHUYỂN TIỀN</th>
     		     <th  width="105" scope="col">NGÀY THỰC HIỆN</th>      
                 <th width="105" scope="col">NGƯỜI CHUYỂN</th>
                 <th width="93" scope="col">NGƯỜI NHẬN</th>
                 <th width="101" scope="col">SỐ TIỀN</th>
                <div style=" width: 100%;max-width:120px;"> <th>NỘI DỤNG</th> </div>
                 
      </tr>			  
				  
				  
  <?php
				 
   while($giaodich = $control->fetch_arr($kq)){
					 
					
					 
					if(isset($_GET["timkiem"]))$HL=highlightKeywords($giaodich["chuyentienid"],$_GET["timkiem"]);
	                else $HL=$giaodich["chuyentienid"];
	   
	   
					 echo "
                   
                   <tr>
				    <td>&nbsp;$HL</td>
                    <td>&nbsp;$giaodich[ngaytao]</td>
                    <td>&nbsp;$giaodich[id_chuyen]</td>
                    <td>&nbsp;$giaodich[id_nhan]</td>
                    <td>&nbsp;$giaodich[sotien]</td>
                    <td style='word-wrap: break-word;max-width:120px;'>&nbsp;$giaodich[noidung]</td>
                   
        
                  </tr>"; }
							 
				 
				 ?>				 
				 
   		   </table>
	</div> 
	<div class="pagination clearfix" >			  
	<?php 

  if ($page != 1 and $page != 2) {
  $dau = $page-2 ;
   
  }
  else $dau = 1;
	$cuoi = $page + 2; 
  if ($cuoi > $tst) $cuoi = $tst ;
  
  
  
  ?>
  <?php  if ($page != 1  ){
	  ?>
      <a href="Javascript:;" onClick="boLoc(1)"> << </a>
      
	  <?php 
  }
  
	   
  for($i=$dau;$i<=$cuoi;$i++){
	     if ($page == $i) echo " <strong> $i </strong> &nbsp;";
		 else {
			 ?>
	             
	       <a href="Javascript:;" onClick="boLoc(<?php echo $i ?>)"><?php echo $i ; ?> &nbsp;</a>
            
     <?php }
  }
   if ($page != $tst ) {?> <a href="Javascript:;" onClick="boLoc(<?php echo $tst ?>)"> >> </a>  <?php 
   }
  ?></p>
		</div>
<?php }
  else  echo "<div align='center' > không có kết quả </div>";?>