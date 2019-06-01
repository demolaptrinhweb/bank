<?php
    include "validate_admin.php";
    include "user_navbar.php";
    include "admin_sidebar.php";
include "DBconnect.php";
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="customer_add_style.css">
</head>

	
	
<body>
	
	
	<?php 
	if ($_GET["id_kyhan"]){
		$id_kyhan = $_GET["id_kyhan"];
	}
	   if (isset($_POST["submit"])){
	    

$sql = "update kyhanguitien set kyhan_so = $_POST[so],kyhan_chu = '$_POST[chu]',laixuat = $_POST[laixuat]  where id_kyhan = $_POST[id]";
$kq = mysqli_query($conn,$sql);
if (mysqli_affected_rows($conn) == 1) {	?>	
	<script>
  alert("thành công");
</script>
	 <?php  } }?>
	   
	<?php $sql = "select * from kyhanguitien where id_kyhan = $id_kyhan";
	     $kq = mysqli_query($conn,$sql);
	      $arr = mysqli_fetch_assoc($kq);
	
	?>
    <form class="add_customer_form" action="" method="post">
		<input type="hidden" name="id" value="<?php echo $id_kyhan ?>">
        <div class="flex-container-form_header">
            <h1 id="form_header">Hãy điền thông tin vào form dưới . . .</h1>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>kỳ hạn (số) :</label><br>
                <input name="so" size="30" type="number" value="<?php echo $arr["kyhan_so"] ?>" required />
            </div>
            <div  class=container>
                <label>kỳ hạn (chữ) :</b></label><br>
                <input name="chu" size="30" type="text"  value="<?php echo $arr["kyhan_chu"] ?>" required  />
            </div>
		 <div  class=container>
                <label>lãi xuất:</b></label><br>
                <input name="laixuat" size="30" type="number"  value="<?php echo $arr["laixuat"] ?>" required step="0.01"/>
            </div>
	
	
        </div>

        
        

        <div class="flex-container">
            <div class="container">
                <button name= "submit" type="submit">sửa</button>
            </div>

            <div class="container">
                <button type="reset" class="reset" onclick="return confirmReset();">Điền lại</button>
            </div>
        </div>

    </form>

    <script>
    function confirmReset() {
        return confirm('Bạn có muốn điền lại thông tin không?');
    </script>

</body>
</html>
