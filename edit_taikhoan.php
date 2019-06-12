<?php
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
	
	if ($_GET["id_taikhoan"]){
		$id_taikhoan = $_GET["id_taikhoan"];
	}
	
	
	   if (isset($_POST["submit"]) ){
  
$sql = "update taikhoan set id_khachhang = $_POST[khachhang],trangthai = $_POST[tt],sodu = $_POST[sodu] where id_taikhoan = $id_taikhoan";
$kq = mysqli_query($conn,$sql);
if (mysqli_affected_rows($conn) == 1) {	?>	
	<script>
  alert("thành công");
</script>
	 <?php  }	
	   } 
	?>
		<?php echo "$id_taikhoan";
	     $sql = "select taikhoanid,id_khachhang,trangthai,sodu from taikhoan where id_taikhoan = $id_taikhoan";
	     $kq = mysqli_query($conn,$sql);
	     $arr1 = mysqli_fetch_array($kq);
	
	?>
	
    <form class="add_customer_form" action="" method="post">
		<input type="hidden" name="id" value="<?php echo $id_taikhoan ?>">
        <div class="flex-container-form_header">
            <h1 id="form_header">Hãy điền thông tin vào form dưới . . .</h1>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>tài khoản id  :</label><br>
                <label><?php echo $arr1["taikhoanid"] ?></label>
            </div>
            <div  class=container>
                <label>khách hàng :</b></label><br>
                <select name="khachhang">
					<?php $sql = "select id_khachhang,khachhangid from khachhang ";
					      $kq = mysqli_query($conn,$sql);
					    while(  $arr = mysqli_fetch_array($kq)){
							$chon = "";
							if ($arr1["id_khachhang"] == $arr["id_khachhang"] ) $chon = "selected ='selected'";
							echo "<option value='$arr[id_khachhang]' $chon >$arr[khachhangid]</option>";
						}
					?>
			</select>
            </div>
		 <div  class=container>
			 <br>
			 <br>
			 <br>
                <label>trạng thái:</b></label><br>
               <select name="tt">
		          <option value="2" <?php if ($arr1["trangthai"] == 2) echo "selected ='selected'" ?> > đang hoạt động</option>
		         <option value="1" <?php if ($arr1["trangthai"] == 1) echo "selected ='selected'" ?> > tạm ngừng</option>
		      </select>
            </div>
	<div  class=container>
                <label>số dư ban đầu:</b></label><br>
                <input name="sodu" size="30" type="number" required  value="<?php echo $arr1["sodu"] ?>" />
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