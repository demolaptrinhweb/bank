<?php require_once("DBconnect.php"); ?>
<div id="center">
			<div id="left" style="height: 700px;">
				<div id="left_1">
					
					<iframe src="slide.php" style=" width: 770px;height: 400px; margin: auto; border: 0;" scrolling="no">
					</iframe>
				</div>
				<div id="left_2">
					<div class="left_22">
						<h1>Khách hàng cá nhân</h1>
						<ul>
							<?php $sql = "select id,title from news where theme = 3";
							      $kq  = $control->query($sql);
							      while ($arr = $control->fetch_arr($kq)){		
							?>
							<li><a a href="index.php?ts=cn&id=<?php echo $arr["id"]; ?>"><?php echo $arr["title"] ?></a>  </li>
					      <?php }?>
						</ul>
					</div>
					<div class="left_22">
						<h1>Khách hàng doanh nghiệp</h1>
						<ul>
							<?php $sql = "select id,title from news where theme = 4";
							      $kq  = $control->query($sql);
							      while ($arr = $control->fetch_arr($kq)){		
							?>
							<li><a a href="index.php?ts=dn&id=<?php echo $arr["id"]; ?>"><?php echo $arr["title"] ?></a>  </li>
					      <?php }?>
							
						</ul>
					</div>
					<div class="left_22" >
						<h1>Giới thiệu chung</h1>
						<ul>
							<?php $sql = "select id,title from news where theme = 2";
							      $kq  = $control->query($sql);
							      while ($arr = $control->fetch_arr($kq)){		
							?>
							<li><a a href="index.php?ts=gt&id=<?php echo $arr["id"]; ?>"><?php echo $arr["title"] ?></a>  </li>
					      <?php }?>
							
						</ul>
					</div>
				</div>
				
			</div>
			<div id="right" style="height: 700px">
				
				<div id="right_2">
					<?php  $sql1 = "select url_hinh from news where theme = 10 " ;
					       $kq1 = $control->query($sql1);
				           $arr1 = $control->fetch_arr($kq1);
					?>
					<img src="<?php echo $arr1["url_hinh"]; ?>">
				</div>
				<div id="right_3">
					<div>
						<a href=""><h1>TỶ GIÁ VAY</h1></a>
						<span>&nbsp&nbsptối thiểu&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsptối đa &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp lãi xuất</span>
					</div>
					<div id="right_33">
						<table>
							<?php $sql = "select toida,toithieu,laixuat from kieuvay " ;
	                              $kq = $control->query($sql);
							      while($arr = $control->fetch_arr($kq)){
	
	                       ?>
							<tr class="right_33tr">
								<td><?php echo $arr["toithieu"] ;?> </td>
								<td><?php echo $arr["toida"] ;?></td>
								<td><?php echo $arr["laixuat"] ;?></td>
							</tr>
							<?php }?>
						</table>
					</div>
					<div>
						<a href=""><h1>LÃI SUẤT VND</h1></a>
						<span>&nbsp&nbsp&nbspThời hạn &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp%lãi xuất</span>
					</div>
					<div id="right_333">
						<table>
							
							<?php
							$sql = "select kyhan_chu,laixuat from kyhanguitien ";
							$kq =$control->query($sql);
							while($arr= $control->fetch_arr($kq)){
								
							
							
							?>
							<tr class="right_33tr">
								<td style="min-width: 200px"><?php echo $arr["kyhan_chu"]; ?></td>
								<td style="min-width: 50px"><?php echo $arr["laixuat"]; ?></td>
							</tr>
							<?php } ?>
						</table>
					</div>
				</div>
				
			</div>
		</div>