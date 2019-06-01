<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin_sidebar_style.css">
</head>

<body>
    <div class="sidenav" id="theSideNav">
        <a href="javascript:void(0)" id="closebtn" onclick="closeNav()">&times;</a>
        <a href="admin_home.php">Trang chủ</a>
        <a id="label">Thông tin khách hàng</a>
        <a href="customer_add.php">Thêm khách hàng</a>
        <a href="manage_customers.php">Quản lý khách hàng</a>
        <a href="#nx">Danh sách nợ xấu</a>
		<a href="add_kieuvay.php"> thêm kiểu vay</a>
		<a href="manage_kieuvay.php"> quản lý kiểu vay</a>
		<a href="add_kyhanguitien.php"> thêm kỳ hạn gủi tiền</a>
		<a href="manage_kyhanguitien.php"> quản lý kỳ hạn gủi tiền</a>
        <a id="label">Quản lý admin</a>
		<a href="manage_theme.php"> xem theme</a>
        <a href="post_news.php">Đăng bài</a>
		<a href="post_news_manager.php">quản lí bài</a>
		<?php if ($_SESSION["quyen"] == 1 ) { ?>
		<a href="add_admin.php">thêm admin</a>
		<a href="manage_admin.php">quản lí admin</a>
		<?php } ?>
    </div>

<script>

for (var i = 0; i < document.links.length; i++) {
    if (document.URL.indexOf('?') > 0) {
        sanitizedURL = document.URL.substring(0, document.URL.indexOf('?'));
    }
    else {
        sanitizedURL = document.URL;
    }
    if (document.links[i].href == sanitizedURL) {
        document.links[i].className = 'active';
    }
}

function openNav() {
    document.getElementById("theSideNav").style.width = "256px";
    var x = document.getElementById("theSideNav");
    if (x.className === "sidenav sidenav-fixed") {
        x.className += " responsive";
    }
}


function closeNav() {
    if (document.documentElement.clientWidth < 856) {
        document.getElementById("theSideNav").style.width = "0";
    }
}

$(document).ready(function() {
    $(window).resize(function () {
        if ($(window).width() > 855)
            document.getElementById("theSideNav").style.width = "256px";

        if (($(window).width()) < 856){
            $('#closebtn').trigger('click');
        }
    });
});


$(document).ready(function() {
    $(window).scroll(function () {
        var x1 = document.getElementById("theSideNav").style.width;

        if ($(window).scrollTop() > 120) {
          $("#theSideNav").addClass('sidenav-fixed');

            if (($(window).width()) < 856 && x1 == "256px") {
                $('#hamburger').trigger('click');
            }
        }

        if ($(window).scrollTop() < 121) {
          $("#theSideNav").removeClass('sidenav-fixed');
        }
    });
});
</script>

</body>
</html>
