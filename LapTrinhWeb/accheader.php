<?php  @session_start();?>
<div>
khách hàng : <strong> <?php echo $_SESSION["ho"]." ".$_SESSION["ten"] ;?></strong> 
<div class="box">
    <a href="logout.php">
        <img src="hinh/logout.png" height="25" width="55" alt="Logout">
    </a>
</div>
	
</div>
