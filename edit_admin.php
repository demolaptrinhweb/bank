<?php
if(!isset($_SESSION)) {
        session_start();
    }
if ($_SESSION["quyen"] == 1){
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
	
	if ($_GET["id"]){
		$id = $_GET["id"];
	}
	   if (isset($_POST["submit"])){
		
		 $id = $_POST["id"];  	
$ten = mysqli_real_escape_string($conn,$_POST["ten"]);
$sql = "update admin set uname = '$ten', pwd = $_POST[pass],quyen = $_POST[quyen] where id = $_POST[id]";
		   
$kq = mysqli_query($conn,$sql);
if (mysqli_affected_rows($conn) == 1) {	?>	
	<script>
  alert("thành công");
</script>
	 <?php  }
	   }
	?>
	
	<?php $sql = "select * from admin where id = $id";
	     $kq = mysqli_query($conn,$sql);
	      $arr = mysqli_fetch_assoc($kq);
	
	?>
    <form class="add_customer_form" action="" method="post">
		<input name="id" type="hidden" value="<?php echo $id ;?>" >
        <div class="flex-container-form_header">
            <h1 id="form_header">Chỉnh sửa admin . . .</h1>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>	tên đăng nhập :</label><br>
                <input name="ten" size="30" type="text" value="<?php echo $arr["uname"];?>" required />
            </div>
            <div  class=container>
                <label>pass :</b></label><br>
                <input name="pass" size="30" type="password" value="<?php echo $arr["pwd"];?>" required  />
            </div>
		 <div  class=container>
                <label>quyền :</b></label><br>
                <input name="quyen" size="30" type="number" required value="<?php echo $arr["quyen"];?>" />
            </div>
	
     

        <div class="flex-container">
            <div class="container">
                <button name= "submit" type="submit">Thêm </button>
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
<?php }?>