<?php
if(!isset($_SESSION)) {
        session_start();
    }
if ($_SESSION["quyen"] == 1){
    include "validate_admin.php";
    include "user_navbar.php";
    include "admin_sidebar.php";
include "DBconnect.php";
	  include "session_hethan.php";
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="customer_add_style.css">
</head>

	
	
<body>
	
	
	<?php 
	   if (isset($_POST["submit"])){
	  
		
$ten = mysqli_real_escape_string($conn,$_POST["ten"]);
$pass = mysqli_real_escape_string($conn,$_POST["pass"]);
$pass = $control->passharsh($pass);		
$sql = "INSERT INTO admin VALUES('','$ten','$pass',$_POST[quyen])";
$kq = mysqli_query($conn,$sql);
if (mysqli_affected_rows($conn) == 1) {	?>	
	<script>
  alert("thành công");
</script>
	 <?php  }
	   }
	?>
    <form class="add_customer_form" action="" method="post">
		
        <div class="flex-container-form_header">
            <h1 id="form_header">Hãy điền thông tin vào form dưới . . .</h1>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>	tên đăng nhập :</label><br>
                <input name="ten" size="30" type="text" required />
            </div>
            <div  class=container>
                <label>pass :</b></label><br>
                <input name="pass" size="30" type="password" required  />
            </div>
		 <div  class=container>
                <label>quyền :</b></label><br>
                <input name="quyen" size="30" type="number" required />
            </div>
	
     

        <div class="flex-container">
            <div class="container">
                <button name= "submit" type="submit">Thêm </button>
            </div>

            <div class="container">
                <button type="reset" class="reset" onclick="return confirmReset();">Điền lại</button>
            </div>
        </div>

    </form>

    <script>
    function confirmReset() {
        return confirm('Bạn có muốn điền lại thông tin không?');
    </script>

</body>
</html>
<?php }?>