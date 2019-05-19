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
	   if (isset($_POST["submit"]))
	      if ($_POST["tt"] <= $_POST["td"])
	   {
		
$kieu = mysqli_real_escape_string($conn,$_POST["kieu"]);
		   echo $kieu;
$sql = "INSERT INTO kieuvay VALUES('','$kieu',$_POST[td],$_POST[tt],$_POST[lx],'$_POST[tht]')";
$kq = mysqli_query($conn,$sql);
if (mysqli_affected_rows($conn) == 1) {	?>	
	<script>
  alert("thành công");
</script>
	 <?php  }
	   }
	else if ($_POST["tt"] > $_POST["td"]){
	?>
	<script>
  alert("tối thiểu phải bé hơn tối đa");
</script>
	<?php } ?>
    <form class="add_customer_form" action="add_kieuvay.php" method="post">
        <div class="flex-container-form_header">
            <h1 id="form_header">Hãy điền thông tin vào form dưới . . .</h1>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Kiểu vay :</label><br>
                <input name="kieu" size="30" type="text" required />
            </div>
            <div  class=container>
                <label>tối đa :</b></label><br>
                <input name="td" size="30" type="number" required step="0.01" />
            </div>
		 <div  class=container>
                <label>tối thiểu :</b></label><br>
                <input name="tt" size="30" type="number" required step="0.01"/>
            </div>
	
	<div  class=container>
                <label>lãi xuất :</b></label><br>
                <input name="lx" size="30" type="number" required step="0.01"/>
            </div>
	<div  class=container>
                <label>trạng thái :</b></label><br>
                <input name="tht" size="30" type="number" required step="0.01"/>
            </div>
        </div>

        
        

        <div class="flex-container">
            <div class="container">
                <button name= "submit" type="submit">Thêm kiểu vay</button>
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
