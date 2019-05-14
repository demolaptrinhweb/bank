<?php  require("DBconnect.php")?>
<?php if (isset($_GET["id"]))  $sql = "select * from news where theme = 4 and id = $_GET[id] ";
       else {
		   $sql = "select * from news where theme = 4 " ;}
					      	?>
<div id="khaccenter">
			<div id="khacleft">
				
				<div id="khacleft1">
					<img src="hinh/Doanhnghiep.jpg">
				</div>
				<?php   
				$kq = $control->query($sql);
				$arr = $control->fetch_arr($kq);
			     echo $arr["body"];
				?>
			</div>
			<div id="khacright">
				<div style="width: 270px; min-height: 200px"  ;>
					<ul type="none" >
						<?php $sql = "select * from news where theme = 4 ";
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
	"><a href="index.php?ts=dn&id=<?php echo $arr["id"]; ?>"><?php echo $arr["title"] ?></a>  </li>
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