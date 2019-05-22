
<?php 
ob_start();

include_once("DBconnect.php");
session_start();
if(isset($_SESSION['id_khachhang'])!="") {
	header("Location: acctrangchu.php");
}
if (isset($_POST['login'])) {
	$email = mysqli_real_escape_string($conn, $_POST['taikhoan']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	
	
	$result = mysqli_query($conn, "SELECT pass,khachhangid FROM khachhang WHERE loginid = '" . $email."'" );
	
	
	if ($row = mysqli_fetch_array($result)) {
		
	    $auth = password_verify($_POST["password"],$row["pass"]);
		
		if($auth){
		$results = mysqli_query($conn,"SELECT * FROM khachhang where khachhangid='$row[khachhangid]'");
	
     	while($arrow = mysqli_fetch_array($results,MYSQLI_ASSOC)){
		
		if(!isset($_SESSION["khachhangid"])) $_SESSION["khachhangid"] = $arrow["khachhangid"];
			
		if(!isset($_SESSION["id_khachhang"])) $_SESSION["id_khachhang"] = $arrow["id_khachhang"];
		
		if (!isset($_SESSION["taikhoanid"])) $_SESSION["taikhoanid"] =  $arrow["taikhoanmacdinh"];
		
		$sql = "select * from taikhoan where id_taikhoan = $arrow[taikhoanmacdinh]";
		$kq = $control->query($sql);
		$arr = $control->fetch_arr($kq);
		if(!isset($_SESSION["taikhoan_id"])) $_SESSION["taikhoan_id"] = $arr ["taikhoanid"];
		
	    if(!isset($_SESSION["no"])) $_SESSION["no"] = $arr ["no"];
		
		if (!isset($_SESSION["email"])) $_SESSION["email"] = $arrow["email"];	
		
		if(!isset($_SESSION["ho"])) $_SESSION["ho"] = $arrow["ho"];
			
		if(!isset($_SESSION["ten"])) $_SESSION["ten"] = $arrow["ten"];	
			
		if (!isset($_SESSION["max"])) $_SESSION["max"] = $arrow["max_chuyentien"];	
		header("Location: acctrangchu.php");
		}
			
	  }
		
	}
		else {
		$error_message = "Sai mật khẩu hoặc email!";
	}
}



?>

<div class="container" style="min-height: 500px;" align="center">	
	<div class="row">
		<div class="col-md-4 col-md-offset-4 well">
			<form role="form" method="post" name="loginform" style="min-height: 300px; max-width: 500px" >
				<fieldset>
					<legend>Login</legend>						
					<div class="form-group">
						<label for="name">Email</label>
						<input type="text" name="taikhoan" placeholder="Nhập Email của bạn" required class="form-control" />
					</div>	
					<div class="form-group">
						<label for="name">Password</label>
						<input type="password" name="password" placeholder="Nhập mật khẩu" required class="form-control" />
					</div>	
					<div class="form-group">
						<input type="submit" name="login" value="Login" class="btn btn-primary" />
					</div>
				</fieldset>
			</form>
			<span class="text-danger"><?php if (isset($error_message)) { echo $error_message; } ?></span>
		</div>
	</div>

	
		

</div>