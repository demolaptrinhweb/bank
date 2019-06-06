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
	    
  
$sql = "INSERT INTO thenganhang VALUES('','$_POST[the_id]',$_POST[sodu],'$_POST[ho]','$_POST[ten]',$_POST[khachhangid],$_POST[tt])";
$kq = mysqli_query($conn,$sql);
if (mysqli_affected_rows($conn) == 1) {	?>	
	<script>
  alert("thành công");
</script>
	 <?php  } }?>
	   
	
    <form class="add_customer_form" action="" method="post">
        <div class="flex-container-form_header">
            <h1 id="form_header">Hãy điền thông tin vào form dưới . . .</h1>
        </div>

        <div class="flex-container">	
			<div  class=container>
                <label>thẻ id :</b></label><br>
                <input name="the_id" size="30" type="text" required  />
            </div>
            <div class=container>
                <label>số dư :</label><br>=
                <input name="sodu" size="30" type="number" required />
            </div>
            
	 <div  class=container>
                <label>Họ:</b></label><br>
                <input name="ho" size="30" type="text" required  />
            </div>
     <div  class=container>
                <label>tên :</b></label><br>
                <input name="ten" size="30" type="text" required  />
            </div>
     <div  class=container>
                <label>khách hàng id :</b></label><br>
                <input name="khachhangid" size="30" type="number" required  />
            </div>
     <div  class=container>
                <label>trạng thái :</b></label><br>
                <input name="tt" size="30" type="number" required  />
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
