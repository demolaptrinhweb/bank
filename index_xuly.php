	<?php if (isset($_GET['ts']) and $_GET["ts"] != "")
				  switch($_GET['ts'])
				  {
					  case "gt" : include("GioiThieu.php");break;
					  case "cn" : include("CaNhan.php");break;
					  case "ndt": include("NhaDauTu.php");break;
					  case "dn" : include("DoanhNghiep.php");break;
					 
					 
					  case "bk" : include("internetbanking.php");break;	  
				  }				  
				else  include("Main_index.php")?>