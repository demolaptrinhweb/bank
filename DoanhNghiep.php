<?php  require("DBconnect.php")?>
	<script  src="js/jquery.js"></script>
<script type="text/javascript" >

</script>
<script> 
 
	
	$(document).ready(function(){
	
	$(".chuyentrang").click(function(){
		$(".chuyentrang").css("color","white");
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
		 url : "DoanhNghiep_xuly.php",
		 data : "id=" + id,
		 success : function(dulieu){
			  
			 $("#noidung").html(dulieu);
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
	   
<div id="khaccenter">
			<div id="khacleft">
				
				<div id="khacleft1">
					<?php  $sql1 = "select url_hinh from news where theme = 8 " ;
					       $kq1 = $control->query($sql1);
				           $arr1 = $control->fetch_arr($kq1);
					?>
					<img src="<?php echo $arr1["url_hinh"]; ?>">
				</div>
			<span id="noidung"></span>
			</div>
			<div id="khacright">
				<div style="width: 270px; min-height: 200px"  ;>
					<ul type="none" >
						<?php $sql = "select * from news where theme = 4 ";
					      $kq = $control->query($sql);
						 $danhdau = 1 ;
					    while(  $arr = $control->fetch_arr($kq)){
					 
						 if (isset($_GET["id"]) and $_GET["id"] == $arr["id"]){
						 ?>
					<input type="hidden" value="<?php echo $arr["id"] ?>" id="id">
					<?php
					 }	
					?>
					<li style=" border: solid;
	border-color: blue;
	border-width: 1px;
	background-color: #29a0c7;

	text-align: center;
	font-weight: bolder;
	border-radius: 50px;
	
	width: 270px;
	word-wrap: break-word;
	float:right;
					   
	"><a href="Javascript:;" class ="chuyentrang" <?php  if ((isset($_GET["id"]) and $_GET["id"] == $arr["id"]) or (!isset($_GET["id"]) and $danhdau == 1 ))  echo "style='color : red'"; else echo "style='color : white'"; ?> onClick="trang(<?php echo $arr["id"]?>)"><?php echo $arr["title"] ?></a>  </li>
					<?php 
					$danhdau++;		}?>
				</ul>
				</div>	
				<div id="right_2">
					<?php  $sql1 = "select url_hinh from news where theme = 10 " ;
					       $kq1 = $control->query($sql1);
				           $arr1 = $control->fetch_arr($kq1);
					?>
					<img src="<?php echo $arr1["url_hinh"]; ?>">
				</div>
				<div id="right_4">
					
				</div>
			</div>
		</div>	