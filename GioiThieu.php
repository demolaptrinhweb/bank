<?php  require("DBconnect.php")?>
<script  src="js/jquery.js"></script>
<script>
$(document).ready(function() {
  
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
});
</script>

<?php if (isset($_GET["id"]))  $sql = "select id,body from news where theme = 2 and id = $_GET[id] ";
       else {
		   $sql = "select id,body from news where theme = 2 " ;}
					      	?>

<div id="center">
			<div id="lefttin">
				<div id="lefttintuc">
					
				</div>
				<div id="lefttinchu" class="more">
					<?php 
					      $kq = $control->query($sql);
					      $arr = $control->fetch_arr($kq);
					      $id_remem = $arr["id"];
					?>
					<?php echo $arr["body"]; ?>
				</div>
			</div>
			<div id="khacright">
				<h2>TRANG THÔNG TIN</h2>
				<ul type="none">
					<?php $sql = "select id,title from news where theme = 2 ";
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