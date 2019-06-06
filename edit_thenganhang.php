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
	  if ($_GET["id_the"]){
		$id_the = $_GET["id_the"];
	}
	
	
	   if (isset($_POST["submit"])){
	    
  
$sql = "update thenganhang set thenganhangid = '$_POST[the_id]',sodu = $_POST[sodu],Ho = '$_POST[ho]',Ten = '$_POST[ten]',id_khachhang = $_POST[khachhangid],trangthai = $_POST[tt] where id_the = $id_the" ;
$kq = mysqli_query($conn,$sql);
if (mysqli_affected_rows($conn) == 1) {	?>	
	<script>
  alert("thành công");
</script>
	 <?php  } }?>
	
	   <?php $sql = "select * from thenganhang where id_the = $id_the";
	     $kq = mysqli_query($conn,$sql);
	      $arr = mysqli_fetch_assoc($kq);
	
	?>
	
    <form class="add_customer_form" action="" method="post">
		<input type="hidden" name="id" value="<?php echo $id_the ?>">
        <div class="flex-container-form_header">
            <h1 id="form_header">Hãy điền thông tin vào form dưới . . .</h1>
        </div>

        <div class="flex-container">	
			<div  class=container>
                <label>thẻ id :</b></label><br>
                <input name="the_id" size="30" type="text" required value="<?php echo $arr["thenganhangid"]  ?>"  />
            </div>
            <div class=container>
                <label>số dư :</label><br>=
                <input name="sodu" size="30" type="number" required value="<?php echo $arr["sodu"]  ?>" />
            </div>
            
	 <div  class=container>
                <label>Họ:</b></label><br>
                <input name="ho" size="30" type="text" required value="<?php echo $arr["Ho"]  ?>" />
            </div>
     <div  class=container>
                <label>tên :</b></label><br>
                <input name="ten" size="30" type="text" required value="<?php echo $arr["Ten"]  ?>" />
            </div>
     <div  class=container>
                <label>khách hàng id :</b></label><br>
                <input name="khachhangid" size="30" type="number" required value="<?php echo $arr["id_khachhang"]  ?>" />
            </div>
     <div  class=container>
                <label>trạng thái :</b></label><br>
                <input name="tt" size="30" type="number" required value="<?php echo $arr["trangthai"]  ?>" />
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
