<?php  require("DBconnect.php")?>
<?php if (isset($_GET["id"]) and $_GET["id"] != "")  $sql = "select id,body from news where theme = 2 and id = $_GET[id] ";
       else {
		   $sql = "select id,body from news where theme = 2 " ;}
					      	?>
                  <?php 
                         
					      $kq = $control->query($sql);
					      $arr = $control->fetch_arr($kq);
					      $id_remem = $arr["id"];
					?>
					<?php echo $arr["body"]; ?>