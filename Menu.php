<?php session_start() ?>
<div id="menu">
			<ul type="none">
				<li><a href="Javascript:;" onClick="mucluc()"><b>TRANG CHỦ</b></a></li>
				<li><a href="Javascript:;" onClick="mucluc('gt')"><b>GIỚI THIỆU</b></a></li>
				<li><a href="Javascript:;" onClick="mucluc('cn')"><b>CÁ NHÂN</b></a></li>
				<li><a href="Javascript:;" onClick="mucluc('dn')"><b>DOANH NGHIỆP</b></a></li>
				<li><a href="Javascript:;" onClick="mucluc('ndt')"><b>NHÀ ĐẦU TƯ</b></a></li>
		<?php if(isset($_SESSION['id_khachhang'])) {
	?>
			<li style=" width: 300px"><a href="acctrangchu.php" ><b>INTERNET BANKING</b></a></li>	
				<?php
}else { ?>
				<li style=" width: 300px"><a href="Javascript:;" onClick="mucluc('bk')"><b>INTERNET BANKING</b></a></li>
				<?php } ?>
			</ul>
		</div>