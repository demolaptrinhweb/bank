<?php @session_start(); ?>
<?php		if(!isset($_SESSION['id_khachhang'])) {
	header("Location: index.php?ts=bk");
}?>
<?php 
require ("DBconnect.php");
	    require_once("class_vs_function.php");
		
		$passerr = "";
	if (isset($_POST["pay"])){
		$passerr = "";
		$sql = "select pass from khachhang  where id_khachhang =$_SESSION[id_khachhang]";
		$kq = $control->query($sql);
		$arr = $control->fetch_arr($kq);
		
		$auth = password_verify($_POST["pass"],$arr["pass"]);
		
	 if($auth and  $_POST["passmoi"]==$_POST["passlai"]){	
		 $passmoi = $control->passharsh($_POST["passmoi"]);
		 $sql = "UPDATE khachhang SET pass = '$passmoi' where id_khachhang = $_SESSION[id_khachhang]";
		$a = $control->query($sql);
		if ($control->row_affected() == 1){
			$mail = new guimail ($_SESSION["email"]);
			$mail->guinoidung($conn,"đỗi pass","tài khoản của bạn đã được đổi pass");
			
			
		  	?> <script>
		 location.replace("formchuyentien3.php?kq=dp"); 
</script>
		 <?php 		
		}
																		
																									
																									
		 }
	 else {
		 
		 
		  if (!$auth)$passerr.="mật khẩu cũ sai"."<br>";
		
		 if ($_POST["passmoi"]!=$_POST["passlai"]) $passerr.="nhập lại mật khẩu không trùng";
	 }	
	}
	else {
		$passerr = "";
	
	}
?>


<form id="form1" name="form1" method="post" action="">
  
     	<h2>ĐỔI MẬT KHẨU  </h2>
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
        	      <td><strong>MẬT KHẨU CŨ </strong></td>
        	      <td> <input type="password" name="pass" id="pass" required ></td>			
      	      </tr>
				  <tr>
        	      <td><strong>MẬT KHẨU MỚI </strong></td>
        	      <td> <input type="password" name="passmoi" id="passmoi" required ></td>
				  
				
      	      </tr>
				  <tr>
        	      <td><strong>NHẬP LẠI MẬT KHẨU MỚI </strong></td>
        	      <td> <input type="password" name="passlai" id="passlai" required ></td>		
      	      </tr>
				 </tr>
				  <tr>
        	      
				   
        	    <tr>
        	      <td colspan="2"><div align="right">
        	        <input type="submit" name="pay" id="pay" value="ĐỒNG Ý" />
        	      </div></td>
       	        </tr>
      	    </table>

