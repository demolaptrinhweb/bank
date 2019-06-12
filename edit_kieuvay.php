<?php
    include "validate_admin.php";
    include "user_navbar.php";
    include "admin_sidebar.php";
include "DBconnect.php";
include "session_hethan.php";
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="customer_add_style.css">
</head>

	
	
<body>
	
	
	<?php 
	
	if ($_GET["id_kieuvay"]){
		$id_kieuvay = $_GET["id_kieuvay"];
	}
	   if (isset($_POST["submit"])){
		
		   	
$kieu = mysqli_real_escape_string($conn,$_POST["kieu"]);
		     $laixuat = floatval(str_replace(',','.',$_POST["lx"]));
$sql = "update kieuvay set kieuvay = '$kieu',toida = $_POST[td],toithieu = $_POST[tt],laixuat = $laixuat,trangthai = $_POST[tht] where id_kieuvay = $_POST[id]";
		   
$kq = mysqli_query($conn,$sql);
if (mysqli_affected_rows($conn) == 1) {	?>	
	<script>
  alert("thành công");
</script>
	 <?php  }
	   }
	?>
	
	<?php $sql = "select * from kieuvay where id_kieuvay = $id_kieuvay";
	     $kq = mysqli_query($conn,$sql);
	      $arr = mysqli_fetch_assoc($kq);
	
	?>
    <form class="add_customer_form" action="" method="post">
			<input name="id" type="hidden" value="<?php echo $id_kieuvay ;?>" >
        <div class="flex-container-form_header">
            <h1 id="form_header">Hãy điền thông tin vào form dưới . . .</h1>
        </div>
           
        <div class="flex-container">
		  
            <div class=container>
                <label>Kiểu vay :</label><br>
                <input name="kieu" size="30" type="text" required value="<?php echo $arr["kieuvay"] ?>" />
			
            </div>
			
            <div  class=container>
                <label>tối đa :</b></label><br>
                <input name="td" size="30" type="number"  required  value="<?php echo $arr["toida"] ?>" step="0.01" />
            </div>
		 <div  class=container>
                <label>tối thiểu :</b></label><br>
                <input name="tt" size="30" type="number" required  value="<?php echo $arr["toithieu"] ?>" step="0.01"/>
            </div>
	
	<div  class=container>
                <label>lãi xuất :</b></label><br>
                <input name="lx" size="30" type="number" required  value="<?php echo $arr["laixuat"] ?>" step="0.01"/>
            </div>
	<div  class=container>
                <label>trạng thái :</b></label><br>
                <input name="tht" size="30" type="number" required  value="<?php echo $arr["trangthai"] ?>" step="0.01"/>
	           <select name="tht" >
					 <option value="2" <?php if ($arr["trangthai"] == 2)echo "selected='selected'" ?> > đang hoạt động </option>
					 <option value="1" <?php if ($arr["trangthai"] == 1)echo "selected='selected'" ?> > tạm ngừng </option>
	             </select>
            </div>
        </div>

        
        

        <div class="flex-container">
            <div class="container">
                <button name= "submit" type="submit">Thêm kiểu vay</button>
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