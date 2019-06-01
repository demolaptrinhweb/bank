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
	   if (isset($_POST["submit"])){
	    
  $laixuat = floatval(str_replace(',','.',$_POST["laixuat"]));
$sql = "INSERT INTO kyhanguitien VALUES('',$_POST[so],'$_POST[chu]',$laixuat)";
$kq = mysqli_query($conn,$sql);
if (mysqli_affected_rows($conn) == 1) {	?>	
	<script>
  alert("thành công");
</script>
	 <?php  } }?>
	   
	
    <form class="add_customer_form" action="add_kyhanguitien.php" method="post">
        <div class="flex-container-form_header">
            <h1 id="form_header">Hãy điền thông tin vào form dưới . . .</h1>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>kỳ hạn (số) :</label><br>
                <input name="so" size="30" type="number" required />
            </div>
            <div  class=container>
                <label>kỳ hạn (chữ) :</b></label><br>
                <input name="chu" size="30" type="text" required  />
            </div>
		 <div  class=container>
                <label>lãi xuất:</b></label><br>
                <input name="laixuat" size="30" type="number" required step="0.01"/>
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
