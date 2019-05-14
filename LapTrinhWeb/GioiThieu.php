<?php  require("DBconnect.php")?>
<?php if (isset($_GET["id"]))  $sql = "select * from news where theme = 2 and id = $_GET[id] ";
       else {
		   $sql = "select * from news where theme = 2 " ;}
					      	?>
<div id="center">
			<div id="lefttin">
				<div id="lefttintuc">
					
				</div>
				<div id="lefttinchu">
					<?php 
					      $kq = $control->query($sql);
					      $arr = $control->fetch_arr($kq);
					      $id_remem = $arr["id"];
					
					?>
					<img src="<?php echo $arr["url_hinh"]; ?>">
					<?php echo $arr["body"]; ?>
				</div>
			</div>
			<div id="khacright">
				<h2>TRANG THÔNG TIN</h2>
				<ul type="none">
					<?php $sql = "select * from news where theme = 2 ";
					      $kq = $control->query($sql);
					    while(  $arr = $control->fetch_arr($kq)){
					 
					?>
					<li style="<?php 
			if ($id_remem == $arr["id"])	
				 echo "font-style:italic;";
	 ?>	"><a href="index.php?ts=gt&id=<?php echo $arr["id"]; ?>"><?php echo $arr["title"] ?></a></li>
					<?php }?>
				
				</ul>
			</div>
		</div>