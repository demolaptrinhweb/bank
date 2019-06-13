<?php
include "validate_admin.php";
include "DBconnect.php";
include "user_navbar.php";
include "admin_sidebar.php";
include "session_hethan.php";
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="action_style.css">
</head>

	<body>
	<?php

if (isset($_POST["submit"])) {
    $khachid    = mysqli_real_escape_string($conn, $_POST["khachid"]);
    $taikhoanid = mysqli_real_escape_string($conn, $_POST["taikhoanid"]);
    $lname      = mysqli_real_escape_string($conn, $_POST["lname"]);
    $fname      = mysqli_real_escape_string($conn, $_POST["fname"]);
    $gioitinh   = mysqli_real_escape_string($conn, $_POST["gioitinh"]);
    $cus_uname  = mysqli_real_escape_string($conn, $_POST["cus_uname"]);
    $cus_pwd    = mysqli_real_escape_string($conn, $_POST["cus_pwd"]);
    $cus_pwd    = password_hash($cus_pwd, PASSWORD_DEFAULT);
    $ct_pwd     = mysqli_real_escape_string($conn, $_POST["ct_pwd"]);
    $ct_pwd     = password_hash($ct_pwd, PASSWORD_DEFAULT);
    $tt         = mysqli_real_escape_string($conn, $_POST["tt"]);
    $day        = mysqli_real_escape_string($conn, $_POST["day"]);
    $email      = mysqli_real_escape_string($conn, $_POST["email"]);
    $maxtien    = mysqli_real_escape_string($conn, $_POST["maxtien"]);
    $maxqd      = mysqli_real_escape_string($conn, $_POST["maxqd"]);
    
    $sql = "INSERT INTO khachhang VALUES (
             '',
			'$khachid',
			'$taikhoanid',
			'$lname',
            '$fname',
            '$gioitinh',
			'$cus_uname',
            '$cus_pwd',
			'$ct_pwd',
            '$tt',
			'$day',
            '$maxtien',
            '$maxqd',
            '$email'

        )";
    
}


?>

    <div class="flex-container">
        <div class="flex-item">
            <?php
if (($conn->query($sql) !== FALSE)) {
?>
                <p id="info"><?php
    echo "Thêm khách hàng thành công !\n";
?></p>
			
        </div>

 
            <?php
}
?>
		  </div>
		
		  <?php
$conn->close();
?>
		<div class="flex-item">
            <a href="customer_add.php" class="button">Quay lại</a>
      
    </div>

</body>
	
</html>
