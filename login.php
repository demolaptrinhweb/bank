<script  src="js/jquery.js"></script>
	<script type="text/javascript" >

</script>
<script  > 
	
	
 function dangnhap(){
	var taikhoan = $("#taikhoan").val();
	 var password = $("#password").val();
	 $.ajax({
		 type : "POST",
		 url : "login_xuly.php",
		 data : "login=" + "&taikhoan="+taikhoan +"&password="+password,
		 success : function(dulieu){
			 
			 var text = dulieu.trim();
			
			 if (text == "dung")  location.replace("acctrangchu.php"); 
			 
			if (text == "sai")	$(".text-danger").html("Sai mật khẩu hoặc email!")
	
 
   
		 }
	 })
	 
 }
    
</script>	

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
				<form onSubmit="dangnhap()" class="login100-form validate-form" method="post" name="loginform" action="Javascript:;"  >
					<span class="login100-form-title p-b-33">
						Đăng nhập tài khoản Online Banking
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Không được bỏ trống ID tài khoản">
						<input class="input100" type="text" id="taikhoan" name="taikhoan" placeholder="Nhập tài khoản">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="wrap-input100 rs1 validate-input" data-validate="Không được bỏ trống mật khẩu">
						<input class="input100" type="password" id="password" name="password" placeholder="Nhập mật khẩu">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="container-login100-form-btn m-t-20">
						<button type="submit" name="login" value="Login" class="login100-form-btn">
							Đăng nhập
						</button>
					</div>
				</form>
				<span class="text-danger"></span>
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

