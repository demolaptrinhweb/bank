
    <h2>&nbsp; Transaction Detail:</h2>
              <table width="517" height="220" border="1">
                <tr>
                  <td width="439" align="center"><h4><?php 
					  $tem="";
				  if ($_GET["kq"]){
					  
					  switch($_GET["kq"]){
						  case "ct" : $tem ="giao dịch thanh công";	  
							break;  
						  case "dp"	: $tem ="đổi pass thành công";  
							 break ; 
						  case "tktk" : $tem = "mở tài khoản tiết kiệm thành công";
							 break; 
						  case "tkh"  : $tem = "thêm tài khoản hưởng thành công";  
							  break;
						  case "xtkh" : $tem = "xoá tài khoản hưởng thành công";
							  break ;
					  }  
					  
				  echo $tem ;
				 
				  }
				  ?>
                  <br />
                  
                  </h4>
                  
                  </td>
                </tr>
              </table>
