 <?php @session_start(); ?>
<?php require("DBconnect.php") ;
      require_once("class_vs_function.php");
?>
<?php 
	    $sql = "SELECT * FROM thenganhang where id_khachhang=$_SESSION[id_khachhang]";
		
	   
	
	?>		
<div align="center" >
	
     		 <h2>&nbsp;CHI TIẾT THẺ</h2>
     		 <table width="560" border="1"  align="center">
     		   <tr >
     		     <th  width="105" scope="col">THẺ ID</th>      
                 <th width="105" scope="col">SỐ DƯ</th>
               
                 <th width="144" scope="col">TRANG THAI</th>
				
                 
      </tr>
				 
				 <?php
				
				 
				 if (isset($_GET["the"]) and $_GET["the"] != "") { 
					 $sql .=  " and id_the = $_GET[the]";
					
				 }
				 
				 if (isset($_GET["trangthai"]) and $_GET["trangthai"] != "") {
				
					 $sql .= " and trangthai = $_GET[trangthai]";
					  
				 }
				 	 
				   if (isset($_GET["sotien"]) and $_GET["sotien"] != "") {
					 if ($_GET["sotien"] == 1) {
						 $sql .=  " order by sodu desc";
					
					 }
					 if ($_GET["sotien"] == 2) {
						 $sql .=  " order by sodu ASC";
					
					 }
				 }
				 ?> 
				 
				 
				 		 <?php 
	
	
	
  $kq = $control->query($sql);
  $tsp = mysqli_num_rows($kq);
  $sd = 5 ;
 
  $tst = ceil($tsp/$sd);
  
    if ($tsp != 0 ){

 if (isset($_GET["page"]) and $_GET["page"] != 0){
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
	<div class="pagination clearfix" >	
  <p align="center"> trang : <?php  if ($page != 1 ){
	  ?>
      <a href="Javascript:;?>" onClick="boLoc(1)"> << </a>
      
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
 <?php } ?>
				