<?php  require("DBconnect.php")?>
<?php if (isset($_GET["id"]))  $sql = "select * from news where theme = 3 and id = $_GET[id] ";
       else {
		   $sql = "select * from news where theme = 3 " ;}
					      	?>
		   
		   
		  
<div id="khaccenter">
	
			<div id="khacleft">
				
				<div id="khacleft1">
					<img src="hinh/canhan.jpg">
				</div>
				<?php   
				$kq = $control->query($sql);
				$arr = $control->fetch_arr($kq);
				$id_remem = $arr["id"];
			     echo $arr["body"];
				?>
			</div>
			<div id="khacright">
				<div style="width: 270px; min-height: 200px"  ;>
					<ul type="none" >
						<?php $sql = "select * from news where theme = 3 ";
					      $kq = $control->query($sql);
					    while(  $arr = $control->fetch_arr($kq)){
					 
					?>
					<li style=" border: solid;
	border-color: blue;
	border-width: 1px;
	background-color: #29a0c7;
	
	text-align: center;
	font-weight: bolder;
	border-radius: 50px;
	color: white;
	min-width: 230px;
	word-wrap: break-word;
	<?php 
			if ($id_remem == $arr["id"])	
				 echo "font-style:italic;";
	 ?>						   
	"><a href="index.php?ts=cn&id=<?php echo $arr["id"]; ?>"><?php echo $arr["title"] ?></a>  </li>
					<?php }?>
				</ul>
				</div>	
				<div id="right_2">
					<img src="hinh/lienhe.jpg">
				</div>
				<div id="right_4">
					
				</div>
			</div>
		</div>	