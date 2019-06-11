<?php
 
    if(!isset($_SESSION)) {
        session_start();
    }

    include "validate_admin.php";
    include "DBconnect.php";
    include "user_navbar.php";
    include "admin_sidebar.php";
    include "session_hethan.php";

    if (isset($_GET['cust_id'])) {
        $_SESSION['cust_id'] = $_GET['cust_id'];
    }

   $fname = mysqli_real_escape_string($conn, $_POST["fname"]);
$lname = mysqli_real_escape_string($conn, $_POST["lname"]);
$email = mysqli_real_escape_string($conn, $_POST["email"]);
$o_balance = mysqli_real_escape_string($conn, $_POST["o_balance"]);
$cus_uname = mysqli_real_escape_string($conn, $_POST["cus_uname"]);
$cus_pwd = mysqli_real_escape_string($conn, $_POST["cus_pwd"]);
$cus_pwd_ck = mysqli_real_escape_string($conn, $_POST["cus_pwd_ck"]);
$tt =  mysqli_real_escape_string($conn, $_POST["tt"]);	
$pass = "";
$pass_ck = "";
if ($cus_pwd != ""){
$cus_pwd = $control->passharsh($cus_pwd);
	$pass = "pass = '$cus_pwd',";
}
if ($cus_pwd_ck != ""){
$cus_pwd_ck = $control->passharsh($cus_pwd_ck);	
	$pass_ck = "passchuyenkhoan = '$cus_pwd_ck',";
}
    $sql0 = "UPDATE khachhang SET ho = '$fname',
                                 ten = '$lname',
                                 email = '$email',
                                 trangthai = $tt,
                                 max_chuyentien_quydinh = $o_balance,
                                 ".$pass."
                                 ".$pass_ck."
                                 loginid = '$cus_uname'
                               
                            WHERE id_khachhang =".$_POST['id'];

?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="action_style.css">
</head>

<body>
    <div class="flex-container">
        <div class="flex-item">
            <?php
                if (($conn->query($sql0) === TRUE)) { ?>
                    <p id="info"><?php echo "thành công"; ?></p>
                <?php
                }
                else { ?>
                    <p id="info"><?php echo "Error: " . $sql0 . "<br>" . $conn->error . "<br>"; ?></p>
                <?php
                }
            ?>
        </div>
        <?php $conn->close(); ?>

        <div class="flex-item">
            <a href="manage_customers.php" class="button">Go Back</a>
        </div>

    </div>

</body>
</html>
