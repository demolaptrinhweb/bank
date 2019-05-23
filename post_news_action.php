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
    <div class="flex-container">
        <div class="flex-item">
            <?php
            $tt = mysqli_real_escape_string($conn, $_POST["tt"]);
            $nd = mysqli_real_escape_string($conn, $_POST["nd"]);
            $tm = mysqli_real_escape_string($conn, $_POST["tm"]);
            $url = mysqli_real_escape_string($conn, $_POST["url"]);
           
            $sql0 = "INSERT INTO news 
            VALUES('',$tm,'$tt',NOW(),'$url','$nd')";

            ?>

            <?php
            if (($control->query($sql0) === TRUE)) { ?>
                <p id="info"><?php echo "Đăng báo thành công !\n"; ?></p>
            <?php
            } else { ?>
                <p id="info"><?php
                echo "Lỗi server !<br>";
                echo "Error: " . $sql0 . "<br>" . "<br>";
                 ?></p>
            <?php
            }

            $conn->close();
            ?>
        </div>

        <div class="flex-item">
            <a href="post_news.php" class="button">Đăng lại</a>
        </div>

    </div>

</body>
</html>
