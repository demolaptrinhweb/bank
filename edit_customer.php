<?php
	/* Avoid multiple sessions warning
	Check if session is set before starting a new one. */
	if(!isset($_SESSION)) {
		session_start();
	}

	include "validate_admin.php";
	include "DBconnect.php";

	include "user_navbar.php";
	include "admin_sidebar.php";
	include "session_hethan.php";

	if (isset($_GET['id_khachhang'])) {
		$_SESSION['id_khachhang'] = $_GET['id_khachhang'];
	}

	$sql0 = "SELECT * FROM khachhang WHERE id_khachhang=".$_SESSION['id_khachhang'];

	$result0 = $conn->query($sql0);

	if ($result0->num_rows > 0) {
		// output data of each row
		while($row = $result0->fetch_assoc()) {
			$khachid = $row["khachid"];
			$taikhoanid = $row["taikhoanid"];
			$lname = $row["ho"];
			$fname = $row["ten"];
			$gioitinh = $row["gioitinh"];
			$cus_uname  = $row["cus_uname"];
			$cus_pwd    = $row["cus_pwd"];
			$ct_pwd     = $row["ct_pwd"];
			$tt         = $row["tt"];
			$day        = $row["day"];
			$email      = $row["email"];
			$maxtien    = $row["maxtien"];
			$maxqd      = $row["maxqd"];
		}
	}

?>







<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="customer_add_style.css">
</head>

<body>
   <form class="add_customer_form" action="customer_add_action.php" method="post">
        <div class="flex-container-form_header">
            <h1 id="form_header">Chỉnh sửa thông tin khách hàng</h1>
        </div>
        <div class="flex-container">
            <div class=container>
                <label>ID : <label id="info_label"> <?php echo $_SESSION['id_khachhang'] ?> </label></label>
            </div>
        </div>
		
		        <div class="flex-container">
            <div class=container>
                <label>Khách hàng ID :</label><br>
                <input name="khachid" size="25" type="text" required />
            </div>
					<div  class=container>
                <label>Tài khoản mặc định :</b></label><br>
                <input name="taikhoanid" size="30" type="number" required step="1" />
            </div>
        </div>
					
			         
        <div class="flex-container">
            <div class=container>
                <label>Tên :</label><br>
                <input name="fname" size="30" type="text" required />
            </div>
            <div  class=container>
                <label>Họ :</b></label><br>
                <input name="lname" size="30" type="text" required />
            </div>
        </div>

	
        <div class="flex-container">
            <div class=container>
                <label>Giới tính :</label>
            </div>
            <div class="flex-container-radio">
                <div class="container">
                    <input type="radio" name="gioitinh" value="nam" id="male-radio" checked>
                    <label id="radio-label" for="male-radio"><span class="radio">Nam</span></label>
                </div>
                <div class="container">
                    <input type="radio" name="gioitinh" value="nu" id="female-radio">
                    <label id="radio-label" for="female-radio"><span class="radio">Nữ</span></label>
                </div>
                <div class="container">
                    <input type="radio" name="gioitinh" value="khac" id="other-radio">
                    <label id="radio-label" for="other-radio"><span class="radio">Giới tính khác</span></label>
                </div>
            </div>
        </div>

	        <div class="flex-container">
            <div class=container>
                <label>Tên đăng nhập :</label><br>
                <input name="cus_uname" size="30" type="text" required />
            </div>
            <div  class=container>
                <label>Password :</b></label><br>
                <input name="cus_pwd" size="30" type="text" required />
            </div>
	
	           <div  class=container>
                <label>Password chuyển tiền:</b></label><br>
                <input name="ct_pwd" size="30" type="text" required />
            </div>
        </div>
        </div>
			
			  <div class="flex-container">

			<div  class=container>
                <label>Trạng thái :</b></label><br>
                <input name="tt" size="30" type="number" required step="1" />
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Ngày tạo tài khoản :</label><br>
                <input name="day" size="30" type="text" placeholder="yyyy-mm-dd" required />
            </div>
        </div>



			
			 <div class="flex-container">
            <div  class=container>
                <label>Max chuyển tiền :</b></label><br>
                <input name="maxtien" size="30" type="text" required />
            </div>
                       <div class=container>
                <label>Max chuyển tiền quy định :</label><br>
                <input name="maxqd" size="30" type="text" required />
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Email :</label><br>
                <input name="email" size="30" type="text" required />
            </div>
			 </div>



        <div class="flex-container">
            <div class="container">
                <a href="manage_customers.php" class="button">Go Back</a>
            </div>
            <div class="container">
                <button type="submit">Update</button>
            </div>
        </div>

    </form>

</body>
</html>
