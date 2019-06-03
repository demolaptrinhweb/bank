<?php  require("DBconnect.php")?>
<script src="index.css"></script>
<?php if (isset($_GET["id"]) and $_GET["id"] != "")  $sql = "select * from news where theme = 5 or theme 6 and id = $_GET[id] ";
       else {
		   $sql = "select * from news where theme = 2 " ;}
					      	?>
<div id="center">
			<div id="lefttin">
				<div id="lefttintuc">
					
				</div>
				<div id="leftnhadautu" style="min-height: 700px">
					<img src="hinh/tintuc.jpg">
					
					<?php if (!isset($_GET["id"]) or $_GET["id"] == "") {?>
					<div id="leftnhadautu1">
						<h1>Nhà đầu tư mới </h1>
						<ul>
							<?php $sql = "select id,title from news where theme = 5  ";
							      $kq  = $control->query($sql);
							      while ($arr = $control->fetch_arr($kq)){		
							?>
							<li><a href="Javascript:;" class ="chuyentrang"  onClick="trang(<?php echo $arr["id"]?>)"><?php echo $arr["title"] ?></a>  </li>
					      <?php }?>
						</ul>
					</div>
					<div id="leftnhadautu1">
						<h1>Nhà đầu tư quan tâm</h1>
						<ul>
							<?php $sql = "select id,title from news where theme = 6 ";
							      $kq  = $control->query($sql);
							      while ($arr = $control->fetch_arr($kq)){		
							?>
							<li><a href="Javascript:;" class ="chuyentrang"  onClick="trang(<?php echo $arr["id"]?>)"><?php echo $arr["title"] ?></a>  </li>
					      <?php }?>
						</ul>
					</div>
					
					<?php } 
					else {
						$sql = "select id,body,theme from news where id = $_GET[id]  ";
					    $kq  = $control->query($sql);
					    $arr = $control->fetch_arr($kq);
						$theme_rem = $arr["theme"];
						echo $arr["body"];
						$id_remem = $arr["id"];
					}
					
					?>
				</div>
			</div>
			<div id="khacright">
				
					<img style ="min-height: 380px"src="hinh/ctg.jpg">
			
				</div>	
			<div 	style="width: 270px;
	                      float: right;
	                      background-color: lightblue;
			              min-height: 315px	
						   " >
	                    <?php if(isset($_GET["id"]) and $_GET["id"] != "") { ?>	<ul style ="list-style-image: url('hinh/gach.jpg');
						padding-left: 25px;	" >
							<?php $sql = "select id,title from news where theme = $theme_rem";
							      $kq  = $control->query($sql);
							      while ($arr = $control->fetch_arr($kq)){		
							?>
				<li style="<?php 
			        if ($id_remem == $arr["id"])	
				    echo "font-style:italic;";?>">
					<a href="Javascript:;" class ="chuyentrang"  onClick="trang(<?php echo $arr["id"]?>)"><?php echo $arr["title"] ?></a>  </li>
					      <?php }?>
				<li style="padding-top: 20px">  <a href="Javascript:;" class ="chuyentrang"  onClick="trang()">  <strong>quay về</strong>   </a>
				</li>
						</ul>
				
				<?php } ?></div>
		</div>