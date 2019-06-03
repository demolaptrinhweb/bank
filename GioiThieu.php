<?php  require("DBconnect.php")?>
<script  src="js/jquery.js"></script>
<script type="text/javascript" >

</script>
<script> 
 
	
	$(document).ready(function(){
	
	$(".chuyentrang").click(function(){
		$(".chuyentrang").css("color","gray");
		$(this).css("color","red");
	})	
	var danhDauTrang = $("#id").val();
	trang(danhDauTrang); 
    
	
 });
    
</script>		
<script  > 
	
	
 function trang(id){
	  id = id?id:"" ;
	 
	 $.ajax({
		 type : "GET",
		 url : "GioiThieu_xuly.php",
		 data : "id=" + id,
		 success : function(dulieu){
			  
			 $("#lefttinchu").html(dulieu);
			 var showChar =1000;  
    var ellipsestext = "...";
    var moretext = "<b>xem tiếp <b> >";
    var lesstext = "<b>rút gọn<b>";
    
    $('.more').each(function() {
        var content = $(this).html();
 
        if(content.length > showChar) {
 
            var c = content.substr(0, showChar);
            var h = content.substr(showChar, content.length - showChar);
 
            var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span ><span style="display : none" >' + h + '</span>&nbsp;&nbsp;<a href="" style="display: block" class="morelink">' + moretext + '</a></span>';
 
            $(this).html(html);
        }
 
    });
 
    $(".morelink").click(function(){
        if($(this).hasClass("less")) {
            $(this).removeClass("less");
            $(this).html(moretext);
        } else {
            $(this).addClass("less");
            $(this).html(lesstext);
        }
        $(this).parent().prev().toggle();
        $(this).prev().toggle();
        return false;
    });
		 }
	 })
	 
 }
    
</script>	



<div id="center">
			<div id="lefttin">
				<div id="lefttintuc">
					
				</div>
				<div id="lefttinchu" class="more">
					  
				</div>
			</div>
			<div id="khacright">
				<h2>TRANG THÔNG TIN</h2>
				<ul type="none">
					<?php $sql = "select id,title from news where theme = 2 ";
					      $kq = $control->query($sql);
                          $danhdau = 1 ;
					    while(  $arr = $control->fetch_arr($kq)){
					 if (isset($_GET["id"]) and $_GET["id"] == $arr["id"]){
						 ?>
					<input type="hidden" value="<?php echo $arr["id"] ?>" id="id">
					<?php
					 }
					?>
					<li style="<?php 
			
				
	 ?>	"><a href="Javascript:;" class ="chuyentrang" <?php  if ((isset($_GET["id"]) and $_GET["id"] == $arr["id"]) or (!isset($_GET["id"]) and $danhdau == 1 ))  echo "style='color : red'" ?> onClick="trang(<?php echo $arr["id"]?>)"><?php echo $arr["title"] ?></a></li>
					<?php 
						$danhdau++ ;}?>
				
				</ul>
			</div>
		</div>
