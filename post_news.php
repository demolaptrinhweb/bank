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
    <form class="news_form" action="post_news_action.php" method="post">
        <div class="flex-container">
            <div class=container>
                <label>Tiêu đề bài báo<o></o> :</label><br>
                <input name="tt" size="50" type="text" required />
            </div>
        </div>
        <div class="flex-container">
            <div class=container>
                <label>Danh mục (Theo chủ đề quy định)<o></o> :</label><br>
                
				<select name="tm"  required >
					<?php 
					$sql = "select * from theme";
				   $kq = mysqli_query($conn,$sql);
					while($arr = mysqli_fetch_assoc($kq)){
						echo "<option value = '$arr[theme]'> $arr[title]</option>";
					}
					?>
				</select>
            </div>
			</div>	
		
 		<div class="flex-container">
            <div class=container>	
		 		<label>Nhập nội dung <o></o> :</label><br>	<br>
				
<style>
.ck-editor__editable {
    min-height: 500px;
	min-width: 650px;
	}
</style>
		
   
	
	<script type="text/javascript" src="ckeditor_test2/ckeditor.js"> </script>	
	<script type="text/javascript" src="ckfinder/ckfinder.js"> </script>		
	<textarea name="nd" id="content"></textarea>			
		<script>
			 	  CKEDITOR.replace( 'content',
		{
			filebrowserBrowseUrl : 'hinh/ckfinder/ckfinder.html',
			filebrowserImageBrowseUrl : 'hinh/ckfinder/ckfinder.html?type=Images',
			filebrowserFlashBrowseUrl : 'hinh/ckfinder/ckfinder.html?type=Flash',
			filebrowserUploadUrl : 'hinh/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
			filebrowserImageUploadUrl : 'hinh/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
			filebrowserFlashUploadUrl : 'hinh/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
		});
		</script>	
   
		</div>
			</div>	

	
	
        <div class="flex-container">
            <div class=container>
                <label>URL Hình ảnh(dành cho slide)<o></o> :</label><br>
                <input name="url" size="50" type="text"  />
            </div>
        </div>
			
        <div class="flex-container">
            <div class="container">
                <button type="submit" id="pay" name="pay">Đăng bài</button><br>
            </div>

            <div class="container">
                <button type="reset" class="reset" id="reset" onclick="return confirmReset();">Viết lại</button>
            </div>
        </div>

    </form>

    <script>
    function confirmReset() {
        return confirm('Bạn có muốn viết lại từ đầu không?')
    }
    </script>

</body>
</html>
