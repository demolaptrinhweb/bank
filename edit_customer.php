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
	if ($_GET["id_khachhang"]){
		$id_khachhang = $_GET["id_khachhang"];
	}
	?>
	<?php $sql = "select * from khachhang where id_khachhang = $id_khachhang";
	     $kq = mysqli_query($conn,$sql);
	      $arr = mysqli_fetch_assoc($kq);
	
	?>
    <form class="add_customer_form" action="edit_customer_action.php" method="post">
        <div class="flex-container-form_header">
            <h1 id="form_header">Hãy điền thông tin vào form dưới . . .</h1>
        </div>
        <input type="hidden" name="id" value="<?php echo $arr["id_khachhang"] ?>" >
        <div class="flex-container">
            <div class=container>
                <label>Họ :</label><br>
                <input name="fname" size="30" type="text" required value="<?php echo $arr["ho"] ?>"/>
            </div>
            <div  class=container>
                <label>Tên :</b></label><br>
                <input name="lname" size="30" type="text" required value="<?php echo $arr["ten"] ?>"/>
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Email :</label><br>
                <input name="email" size="30" type="text" required value="<?php echo $arr["email"] ?>"/>
            </div>
            
        </div>

       <div class="flex-container">
            <div class=container>
                <label>trạng thái :</label><br>
                 <select name="tt">
		          <option  value="2" <?php if ($arr["trangthai"] == 2) echo "selected='selected'"  ?>  >  đang hoạt động</option>
		         <option  value="1" <?php if ($arr["trangthai"] == 1) echo "selected='selected'" ?> >tạm ngừng</option>
		      </select>
            </div>
            
        </div>
        <div class="flex-container">
            <div class=container>
                <label>max chuyển tiền quy định :</label><br>
                <input name="o_balance" size="20" type="text" required value="<?php echo $arr["max_chuyentien_quydinh"] ?>" />
            </div>

        <div class="flex-container">
            <div class=container>
                <label>Tên đăng nhập :</label><br>
                <input name="cus_uname" size="30" type="text" required value="<?php echo $arr["loginid"] ?>" />
            </div>
            <div  class=container>
                <label>Password :</b></label><br>
                <input name="cus_pwd" size="30" type="text"  />
            </div>
			<div  class=container>
                <label>Password chuyển :</b></label><br>
                <input name="cus_pwd_ck" size="30" type="text"  />
            </div>
        </div>
        
        <div class="flex-container">
            <div class="container">
                <button type="submit">Thêm khách hàng</button>
            </div>

            <div class="container">
                <button type="reset" class="reset" onclick="return confirmReset();">Điền lại</button>
            </div>
        </div>

    </form>

    <script>
    function confirmReset() {
        return confirm('Bạn có muốn điền lại thông tin không?')
    }
    </script>

</body>
</html>
