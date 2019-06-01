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
		
    <textarea name="nd" id="editor"></textarea>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/1.0.0-beta.2/classic/ckeditor.js"></script>
    <script>

$(function(){
let theEditor;

ClassicEditor
    .create( document.querySelector( '#editor' ) )
       

    .then( editor => {
        theEditor = editor; // Save for later use.
    } )
    .catch( error => {
        console.error( error );
    } );

function getDataFromTheEditor() {
    return theEditor.getData();
}

document.getElementById( 'reset' ).addEventListener( 'click', () => {
	form_data = getDataFromTheEditor();

} );
		
		$("#reset").click(function() {
			theEditor.setData( '' );
		});		
});
</script>
		</div>
			</div>	
		
<!--
        </div>	
        <div class="flex-container">
            <div class=container>
                <label>nội dung <o></o>:</label><br>
                <textarea name="nd" style="height: 200px; width: 60vw;"  /></textarea>
            </div>
        </div>
-->
	
	
        <div class="flex-container">
            <div class=container>
                <label>URL Hình ảnh<o></o> :</label><br>
                <input name="url" size="50" type="text"  />
            </div>
        </div>
			
        <div class="flex-container">
            <div class="container">
                <button type="submit">Đăng bài</button><br>
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
