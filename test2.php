<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">

	<title>Ngân Hàng STbank</title>

	<style >
		.morecontent span {
    display: none;
}
.morelink {
    display: block;
}
	</style>
	
<head>

<body>
<script  src="js/jquery.js"></script>
	<script>
	$(document).ready(function() {
    // Configure/customize these variables.
    var showChar = 100;  // How many characters are shown by default
    var ellipsestext = "...";
    var moretext = "Show more >";
    var lesstext = "Show less";
    

    $('.more').each(function() {
        var content = $(this).html();
 
        if(content.length > showChar) {
 
            var c = content.substr(0, showChar);
            var h = content.substr(showChar, content.length - showChar);
 
            var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span ><span style ="display: none;">' + h + '</span>&nbsp;&nbsp;<a href=""  class="morelink">' + moretext + '</a></span>';
 
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
	
  <span class="more">
      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    </span>
    <br><br>
    <div class="more">
      Morbi placerat imperdiet risus quis blandit. Ut lobortis elit luctus, feugiat erat vitae, interdum diam. Nam sit amet arcu vitae justo lacinia ultricies nec eget tellus. Curabitur id sapien massa. In hac <a href="#">habitasse</a> platea dictumst. Integer tristique leo consectetur libero pretium pretium. Nunc sed mauris magna. Praesent varius purus id turpis iaculis iaculis. Nulla <em>convallis magna nunc</em>, id rhoncus massa ornare in. Donec et feugiat sem, ac rhoncus mauris. Quisque eget tempor massa.
    </div>


</body>
</html>