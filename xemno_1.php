 <?php

@session_start();
?>
<?php		if(!isset($_SESSION['id_khachhang'])) {
	header("Location: index.php?ts=bk");
}?>

<?php


include("DBconnect.php");
require_once("class_vs_function.php");
$sql = "select * from taikhoan where id_khachhang = $_SESSION[id_khachhang] and no > 0";
$sql0="";


?>	

	


<form id="form1" name="form1" method="get" action="acctrangchu.php" >
  
     	
           	  <table width="591"  align="center" style="min-height: 177px ;top: 0">
				  <input type="hidden" name="ts" value="xn" > 
        	    <tr>
				  <td> <strong> TÌM KIẾM THEO VAY ID</strong></td>
				   <td> <label><input type="input" name ="timkiem" onChange="form1.submit()" value="<?php 
					   if (isset($_GET["timkiem"]) and $_GET["timkiem"] != "" ) echo $_GET["timkiem"]; ?>" > </label></td>
				  </tr>
        	    <tr>
        	      <td><strong> TÀI KHOẢN </strong></td>
        	   <td><label>
        	        <select name="taikhoan" id="taikhoan" onchange="form1.submit()" style="top: 0;"  >
                             <option value="">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; </option>
        	 			<?php
						$sql1 = "SELECT * FROM taikhoan where id_khachhang=$_SESSION[id_khachhang]"; 
						
						$results_1 = $control->query($sql1);
						
						
						while($rowsacc = $control->fetch_arr($results_1))
						{ ?>
							
							<option value='<?php echo $rowsacc["taikhoanid"]; ?>' 
									<?php if (isset($_GET["taikhoan"]) and $_GET["taikhoan"] != "" and $_GET["taikhoan"] == $rowsacc["taikhoanid"]) echo "selected ='selected'";?>> <?php echo  $rowsacc["taikhoanid"];?></option>";
						<?php }
						?>
      	            </select>
      	        </label></td>
      	      </tr>

				  <?php
				 $truyendulieu ="";
				 
				 
				 if (isset($_GET["taikhoan"]) and $_GET["taikhoan"] != "") { 
					 $sql = "select * from taikhoan where taikhoanid = '$_GET[taikhoan]' and no > 0";
					 $truyendulieu .= "&taikhoan=$_GET[taikhoan]";
				 }
				 
				 
			
				  if (isset($_GET["timkiem"]) and $_GET["timkiem"] != "" ) { 
					 $sql0 .=  " and vayid like '%$_GET[timkiem]%'";
					 $truyendulieu .= "&timkiem=$_GET[timkiem]";
				 }
				 
				 
				 
				 ?> 
				 
				 <?php 
	
	
	
  $kq = $control->query($sql);
  $tsp = @mysqli_num_rows($kq);
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
	
	
	while($arr = $control->fetch_arr($kq)){
		
  $loanarray = @mysqli_query($conn,"select * from vaytien where taikhoanid='$arr[taikhoanid]'".$sql0);
		
 while($loan = $control->fetch_arr($loanarray))
	  {
	  $tam = $loan["kieuvay"];
	$sqlkieuvay = "select kieuvay from kieuvay where id_kieuvay = $tam";
	 $kqkieuvay =$control->query($sqlkieuvay);
	 $arrkieuvay = $control->fetch_arr($kqkieuvay);
	 $kieuvay = $arrkieuvay["kieuvay"];
echo "
      <tr>
        <td>&nbsp;$loan[vayid]</td>
		<td>&nbsp;$loan[taikhoanid]</td>
        <td>&nbsp;$kieuvay</td>
        <td>&nbsp;$loan[sovay]</td> 
        <td>&nbsp;$loan[laixuat]</td>
        <td>&nbsp;$loan[ngaytao]</td>
        
      </tr>";
	  }
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
      <a href="acctrangchu.php?ts=xn&page=<?php echo 1 ; echo $truyendulieu;?>"> << </a>
      
	  <?php 
  }
  
  for($i=$dau;$i<=$cuoi;$i++){
	     if ($page == $i) echo " <strong> $i </strong> &nbsp;";
		 else {
			 ?>
	             
	       <a href="acctrangchu.php?ts=xn&page=<?php echo $i ; echo $truyendulieu;?> "><?php echo $i ; ?> &nbsp;</a>
            
     <?php }
  }
   if ($page != $tsn ) {?> <a href="acctrangchu.php?ts=xn&page=<?php echo $tst ;echo $truyendulieu; ?>"> >> </a>  <?php 
   }
  ?></p>
				  </div>
	