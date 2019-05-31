 <?php @session_start(); ?>
<?php require("DBconnect.php") ;
      require_once("class_vs_function.php");
?>
				  <?php
$sql = "select taikhoanid from taikhoan where id_khachhang = $_SESSION[id_khachhang] and no > 0";
 $sql0="";
				
				 
				 
				 if (isset($_GET["taikhoan"]) and $_GET["taikhoan"] != "") { 
					 $sql = "select taikhoanid from taikhoan where taikhoanid = '$_GET[taikhoan]' and no > 0";
					
				 }
				 
				 
			
				  if (isset($_GET["timkiem"]) and $_GET["timkiem"] != "" ) { 
					 $sql0 .=  " and vayid like '%$_GET[timkiem]%'";
					
				 }
				 
				 
				 
				 ?> 
				 
				 <?php 
	
	
  $sql1 = "select * from vaytien where taikhoanid in ($sql)".$sql0;
  $kq = $control->query($sql1);
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
	
	$sql1.= " limit $vitri , $sd ";
				  
	$kq = $control->query($sql1);
	
	$dem = $vitri+1 ;
  ?>  
				  
	


<table  border="1"  align="center">
      <tr>
        <th width="105" scope="col">VAY ID</th>
		 <th width="105" scope="col">TÀI KHOẢN VAY</th>
        <th width="93" scope="col">LOAI VAY</th>
        <th width="101" scope="col">SỐ LƯỢNG</th>
        <th width="188" scope="col">LÃI  </th>
        <th width="132" scope="col"><p>NGÀY VAY</p></th>
      </tr>
	 <?php
	
	
	
	   
 while($loan = $control->fetch_arr($kq))
	  {
	  $tam = $loan["kieuvay"];
	$sqlkieuvay = "select kieuvay from kieuvay where id_kieuvay = $tam";
	 $kqkieuvay =$control->query($sqlkieuvay);
	 $arrkieuvay = $control->fetch_arr($kqkieuvay);
	 $kieuvay = $arrkieuvay["kieuvay"];
	 if(isset($_GET["timkiem"]))$HL=highlightKeywords($loan["vayid"],$_GET["timkiem"]);
echo "
      <tr>
        <td>&nbsp;$HL</td>
		<td>&nbsp;$loan[taikhoanid]</td>
        <td>&nbsp;$kieuvay</td>
        <td>&nbsp;$loan[sovay]</td> 
        <td>&nbsp;$loan[laixuat]</td>
        <td>&nbsp;$loan[ngaytao]</td>
        
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
  <p align="center"> trang : <?php  if ($page != 1 ){
	  ?>
      <a href="Javascript:;" onClick="boLoc(1)"> << </a>
      
	  <?php 
  }
  
  for($i=$dau;$i<=$cuoi;$i++){
	     if ($page == $i) echo " <strong> $i </strong> &nbsp;";
		 else {
			 ?>
	             
	       <a href="Javascript:;" onClick="boLoc(<?php echo $i ?>)" ><?php echo $i ; ?> &nbsp;</a>
            
     <?php }
  }
   if ($page != $tst ) {?> <a href="Javascript:;" onClick="boLoc(<?php echo $tst ?>)"> >> </a>  <?php 
   }
  ?></p>
				  </div>
	<?php }  ?>