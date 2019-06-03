<?php
    include "validate_admin.php";
    include "user_navbar.php";
    include "admin_sidebar.php";
include "DBconnect.php";
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="customer_add_style.css">
</head>

	
	
<body>
	
	
	<?php 
	   if (isset($_POST["submit"]) and $_POST["min"] < $_POST["max"]){
  

$sql = "INSERT INTO phichuyentien VALUES('',$min,$max,$phi)";
$kq = mysqli_query($conn,$sql);
if (mysqli_affected_rows($conn) == 1) {	?>	
	<script>
  alert("thành công");
</script>
	 <?php  }
	   } 
	?>
	<?php
	 if (isset($_POST["min"]) and $_POST["min"] >= $_POST["max"] )
	{	?>
	<script>
  alert("số lượng tối thiểu , tối đã không hợp lệ");
</script>
<?php }	  ?>
	
    <form class="add_customer_form" action="" method="post">
        <div class="flex-container-form_header">
            <h1 id="form_header">Hãy điền thông tin vào form dưới . . .</h1>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>tối thiểu  :</label><br>
                <input name="min" size="30" type="number" required />
            </div>
            <div  class=container>
                <label>tối đa  :</b></label><br>
                <input name="max" size="30" type="number" required />
            </div>
		 <div  class=container>
                <label>phí:</b></label><br>
                <input name="phi" size="30" type="number" required />
            </div>
	
	
        </div>

        
        

        <div class="flex-container">
            <div class="container">
                <button name= "submit" type="submit">Thêm</button>
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