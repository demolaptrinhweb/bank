<?php
    include "validate_admin.php";
    include "user_navbar.php";
    include "admin_sidebar.php";
    include "session_hethan.php";
include "DBconnect.php";
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="customer_add_style.css">
</head>

<body>
	<?php $id = "";
	if (isset ($_GET["id"])){
		$id = $_GET["id"];
	}
	
	if (isset($_POST["id_update"])){
		
	$id = $_POST["id_update"];  	
      
$sql = "update news set theme = $_POST[tm],title = '$_POST[tt]',url_hinh = '$_POST[url]',body = '$_POST[nd]' where id = $_POST[id_update]";
		  
$kq = mysqli_query($conn,$sql);
if (mysqli_affected_rows($conn) == 1) {	?>	
	<script>
  alert("thành công");
</script>
	 <?php  }
	   }
	?>
	<?php   $sql1 = "select * from news where id = $id" ;
					       $kq1 = $control->query($sql1);
				           $arr1 = $control->fetch_arr($kq1);
					       
					?>
					
	
	
    <form class="news_form" action="" method="post">
		
		<input name="id_update" type="hidden" value="<?php echo $id ;?>" >
        <div class="flex-container">
            <div class=container>
                <label>Tiêu đề bài báo<o></o> :</label><br>
                <input name="tt" size="50" type="text" value="<?php echo $arr1["title"]?>" required />
            </div>
        </div>
        <div class="flex-container">
            <div class=container>
                <label>theme<o></o> :</label><br>
                <input name="tm" size="50" type="text" value="<?php echo $arr1["theme"]?>" required />
            </div>
        </div>	
        <div class="flex-container">
            <div class=container>
                <label>nội dung <o></o>:</label><br>
                <textarea name="nd" style="height: 200px; width: 60vw;"  /><?php echo $arr1["body"];?></textarea>
            </div>
        </div>
        <div class="flex-container">
            <div class=container>
                <label>url_hinh<o></o> :</label><br>
                <input name="url" size="50" type="text" value="<?php echo $arr1["url_hinh"]; ?>" />
            </div>
        </div>
        <div class="flex-container">
            <div class="container">
                <button type="submit">Đăng bài</button>
            </div>

          

    </form>

    <script>
    function confirmReset() {
        return confirm('Bạn có muốn viết lại từ đầu không?')
    }
    </script>

</body>
</html>