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

<?php
$fname = mysqli_real_escape_string($conn, $_POST["fname"]);
$lname = mysqli_real_escape_string($conn, $_POST["lname"]);
$email = mysqli_real_escape_string($conn, $_POST["email"]);
$o_balance = mysqli_real_escape_string($conn, $_POST["o_balance"]);
$cus_uname = mysqli_real_escape_string($conn, $_POST["cus_uname"]);
$cus_pwd = mysqli_real_escape_string($conn, $_POST["cus_pwd"]);
$cus_pwd_ck = mysqli_real_escape_string($conn, $_POST["cus_pwd_ck"]);
$cus_pwd = $control->passharsh($cus_pwd);
$cus_pwd_ck = $control->passharsh($cus_pwd_ck);	
	
	
$tt =  mysqli_real_escape_string($conn, $_POST["tt"]);	
$sql = "insert into khachhang values ('','','$fname','$lname','$cus_uname','$cus_pwd','$cus_pwd_ck',$tt,now(),$o_balance,$o_balance,'$email')";



?>

<body>
    <div class="flex-container">
        <div class="flex-item">
            <?php
            if (($control->query($sql) === TRUE)) { ?>
                <p id="info"><?php echo "Thêm khách hàng thành công !\n"; }?></p>
        </div>
             
        
        <div class="flex-item">
            <a href="customer_add.php" class="button">Thử lại</a>
        </div>

    </div>

</body>
</html>
