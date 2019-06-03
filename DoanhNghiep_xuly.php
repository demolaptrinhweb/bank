<?php  require("DBconnect.php")?>
<?php if (isset($_GET["id"]) and $_GET["id"] != "")  $sql = "select * from news where theme = 4 and id = $_GET[id] ";
       else {
		   $sql = "select * from news where theme = 4 " ;}
					      	?>	
         <?php   
				$kq = $control->query($sql);
				$arr = $control->fetch_arr($kq);
				$id_remem = $arr["id"];
			     echo $arr["body"];
				?>