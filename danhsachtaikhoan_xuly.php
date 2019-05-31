 <?php @session_start(); ?>
<?php require("DBconnect.php") ;
      require_once("class_vs_function.php");
?>
		
<?php 
	    $sql = "SELECT * FROM taikhoan where id_khachhang=$_SESSION[id_khachhang]";
	?>		
<div align="center" >
	
     		 <h2>&nbsp;CHI TIẾT TÀI KHOẢN</h2>
     		 <table width="560" border="1"  align="center">
     		   <tr >
     		     <th  width="105" scope="col">TÀI KHOẢN ID</th>      
                 <th width="105" scope="col">TRANG THÁI</th>
                 <th width="93" scope="col">NGÀY TẠO</th>
                 <th width="101" scope="col">SỐ DƯ</th>
                 <th width="144" scope="col">NỢ</th>
                 
      </tr>
				 
				 
				<?php
				 $truyendulieu ="";
				 
				 
				 if (isset($_GET["taikhoan"]) and $_GET["taikhoan"] != "") { 
					 $sql .=  " and id_taikhoan = $_GET[taikhoan]";
					 $truyendulieu .= "&taikhoan=$_GET[taikhoan]";
				 }
				 
				 if (isset($_GET["trangthai"]) and $_GET["trangthai"] != "") {
				
					 $sql .= " and trangthai = $_GET[trangthai]";
					 
				 }
				 
				 
			
				  if (isset($_GET["timkiem"]) and $_GET["timkiem"] != "" ) { 
					 $sql .=  " and taikhoanid like '%$_GET[timkiem]%'";
					 
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
  
   if ($tsp != 0 ) {
  

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
  <?php
				 echo "$sql";
   while($taikhoan = $control->fetch_arr($kq)){
					 
					 if ($taikhoan["trangthai"] == 2) $trangthai = "đang hoạt động" ;
					 else $trangthai = "tạm ngưng";
					 
					if(isset($_GET["timkiem"]))$tais=highlightKeywords($taikhoan["taikhoanid"],$_GET["timkiem"]);
	                else $tais = $taikhoan["taikhoanid"];
	   
	   
					 echo "
                   <tr>
                    <td>&nbsp;$tais</td>
                    <td>&nbsp;$trangthai</td>
                    <td>&nbsp;$taikhoan[ngaytao]</td>
                    <td>&nbsp;$taikhoan[sodu]</td>
                    <td>&nbsp;$taikhoan[no]</td>
                   
        
                  </tr>";
	  }
				 
				 
				 
				 
				 ?>				 
				 
				 
   		   </table>
	
	<div class="pagination clearfix" >	
	<?php 
  if ($page != 1 and $page != 2) {
  $dau = $page-2 ;
   
  }
  else $dau = 1;
	$cuoi = $page + 2; 
  if ($cuoi > $tst) $cuoi = $tst ;
  
  
  ?>
  <?php  if ($page != 1 ){
	  ?>
      <a href="Javascript:;" onClick="boLoc(1)"> << </a>
      
	  <?php 
  }
  
  for($i=$dau;$i<=$cuoi;$i++){
	     if ($page == $i) echo "<strong> $i </strong> &nbsp;";
		 else {
			 ?>
	             
	       <a href="Javascript:;"  onClick="boLoc(<?php echo $i ?>)" ><?php echo $i ; ?> &nbsp;</a>
            
     <?php }
  }
   if ($page != $tst ) {?> <a href="Javascript:;" onClick="boLoc(<?php echo $tst ?>)" > >> </a>  <?php 
   }
  ?></p>
	</div>
<?php } ?>