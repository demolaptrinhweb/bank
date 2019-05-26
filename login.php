
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

<head>
	<title>Internet Banking</title>
	<meta charset="UTF-8">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">

</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
				<form class="login100-form validate-form" method="post" name="loginform">
					<span class="login100-form-title p-b-33">
						Đăng nhập tài khoản Online Banking
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Không được bỏ trống ID tài khoản">
						<input class="input100" type="text" name="taikhoan" placeholder="Nhập tài khoản">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="wrap-input100 rs1 validate-input" data-validate="Không được bỏ trống mật khẩu">
						<input class="input100" type="password" name="password" placeholder="Nhập mật khẩu">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="container-login100-form-btn m-t-20">
						<button type="submit" name="login" value="Login" class="login100-form-btn">
							Đăng nhập
						</button>
					</div>
				</form>
				<span class="text-danger"><?php if (isset($error_message)) { echo $error_message; } ?></span>
			</div>
		</div>
	</div>

	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<script src="js/main.js"></script>

<!--
<div class="container" style="min-height: 500px;" align="center">	
	<div class="row">
		<div class="col-md-4 col-md-offset-4 well">
			<form role="form" method="post" name="loginform" style="min-height: 300px; max-width: 500px" >
				<fieldset>
					<legend>Login</legend>						
					<div class="form-group">
						<label for="name">Email</label>
						<input type="text" name="taikhoan" placeholder="Nhập Email của bạn" required class="form-controla" />
					</div>	
					<div class="form-group">
						<label for="name">Password</label>
						<input type="password" name="password" placeholder="Nhập mật khẩu" required class="form-controla" />
					</div>	
					<div class="form-group">
						<button type="submit" name="login" value="Login" class="btn btn-primary" >Login</button>
					</div>
				</fieldset>
			</form>
				
		<span class="text-danger"><?php if (isset($error_message)) { echo $error_message; } ?></span>
			
		</div>
	</div>
-->

</body>