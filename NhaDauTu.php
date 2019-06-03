<?php  require("DBconnect.php")?>

<script  src="js/jquery.js"></script>

<script> 
 
	
	$(document).ready(function(){
	
	$(".chuyentrang").click(function(){
		$(".chuyentrang").css("color","gray");
		$(this).css("color","red");
	})	
	
	trang(); 
    
	
 });
    
</script>		
<script  > 
	
	
 function trang(id){
	  id = id?id:"" ;
	
	 $.ajax({
		 type : "GET",
		 url : "NhaDauTu_xuly.php",
		 data : "id=" + id,
		 success : function(dulieu){
			  
			 $("#noidung").html(dulieu);
		
 
        
	 }
	 
 })
	 }
</script>	
<span id="noidung"></span>