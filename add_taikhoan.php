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
	   if (isset($_POST["submit"]) ){
  $sql = "select id_taikhoan from taikhoan where taikhoanid = '$_POST[taikhoan]'";
  $kq = mysqli_query($conn,$sql);
  $arr = mysqli_fetch_array($kq); 		   
if (!$arr){
$sql = "INSERT INTO taikhoan VALUES('','$_POST[taikhoan]',$_POST[khachhang],$_POST[tt],now(),$_POST[sodu],0)";
$kq = mysqli_query($conn,$sql);
if (mysqli_affected_rows($conn) == 1) {	?>	
	<script>
  alert("thành công");
</script>
	 <?php  }
         }
		else  {	?>	
	<script>
  alert("trùng tài khoản id");
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
                <label>tài khoản id  :</label><br>
                <input name="taikhoan" size="30" type="text" required />
            </div>
            <div  class=container>
                <label>khách hàng :</b></label><br>
                <select name="khachhang">
					<?php $sql = "select id_khachhang,khachhangid from khachhang ";
					      $kq = mysqli_query($conn,$sql);
					    while(  $arr = mysqli_fetch_array($kq)){
							echo "<option value='$arr[id_khachhang]'>$arr[khachhangid]</option>";
						}
					?>
			</select>
            </div>
		 <div  class=container>
                <label>trạng thái:</b></label><br>
               <select name="tt">
		          <option value="2"> đang hoạt động</option>
		         <option value="1"> tạm ngừng</option>
		      </select>
            </div>
	<div  class=container>
                <label>số dư ban đầu:</b></label><br>
                <input name="sodu" size="30" type="number" required />
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