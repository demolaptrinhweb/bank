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
if (isset($_POST["submit"])) {
    $khachid    = mysqli_real_escape_string($conn, $_POST["khachid"]);
    $taikhoanid = mysqli_real_escape_string($conn, $_POST["taikhoanid"]);
    $lname      = mysqli_real_escape_string($conn, $_POST["lname"]);
    $fname      = mysqli_real_escape_string($conn, $_POST["fname"]);
    $gioitinh   = mysqli_real_escape_string($conn, $_POST["gioitinh"]);
    $cus_uname  = mysqli_real_escape_string($conn, $_POST["cus_uname"]);
    $cus_pwd    = mysqli_real_escape_string($conn, $_POST["cus_pwd"]);
    $ct_pwd     = mysqli_real_escape_string($conn, $_POST["ct_pwd"]);
    $tt         = mysqli_real_escape_string($conn, $_POST["tt"]);
    $day        = mysqli_real_escape_string($conn, $_POST["day"]);
    $email      = mysqli_real_escape_string($conn, $_POST["email"]);
    $maxtien    = mysqli_real_escape_string($conn, $_POST["maxtien"]);
    $maxqd      = mysqli_real_escape_string($conn, $_POST["maxqd"]);

    $sql0 = "UPDATE khachhang SET khachhangid= '$khachid',
								taikhoanmacdinh= '$taikhoanid',
								ho= '$lname',
								ten= '$fname',
								gioitinh= '$gioitinh',
								loginid= '$cus_uname',
								pass= '$cus_pwd',
								passchuyenkhoan= '$ct_pwd',
								trangthai= '$tt',
								ngaytao= '$day',
								max_chuyentien= '$maxtien',
								max_chuyentien_quydinh= '$maxqd',
								email=	'$email'
								 	

                            WHERE id_khachhang=".$_SESSION['id_khachhang'];
}
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
                    <p id="info"><?php echo "Values Updated Successfully !"; ?></p>
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
