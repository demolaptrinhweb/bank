<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	
  <style type="text/css">
    * {
  box-sizing:border-box
}
h2 {
  text-align: center;
}

.slideshow-container {
  width: 770px;height: 400px;
}

.mySlides {
    display: none;
}

.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}
 

.dot {
  cursor:pointer;
  height: 13px;
  width: 13px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;

}

.active, .dot:hover {
  background-color: #717171;
}
 

.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 3s;
  animation-name: fade;
  animation-duration: 3s;
}
 .dot2{
  text-align: center; 
  padding-top: 380px;
 }
@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}
 
@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}
.img1{
  width: 770px;height: 400px; background-repeat: no-repeat;background-size: cover;z-index: -1;position: absolute;
}
  </style>
</head>

<body style="margin-left: 0;margin-top: 0;">
  
<div class="slideshow-container" >
<?php
	require("DBconnect.php");

	?>
	<?php  
	$sql = "select url_hinh from news where theme = 7  ";
	$kq = $control->query($sql);
	$count = 0 ;
	while ($arr = $control->fetch_arr($kq)){
	$count++;
	?>
  <div class="mySlides fade img1" style="background-image: url(<?php echo $arr["url_hinh"]?>);">
    
  </div>
  <?php }?>
<div class=" dot2" >
	<?php for($i=0;$i<$count;$i++) {?>
  <span class="dot" onclick="currentSlide(<?php echo $i ?>)"></span> 
 <?php } ?>
 </div>
<script>
      
      var slideIndex;
      var start ;
      function showSlides() {
          var i;
          var slides = document.getElementsByClassName("mySlides");
          var dots = document.getElementsByClassName("dot");
          for (i = 0; i < slides.length; i++) {
             slides[i].style.display = "none";  
          }
          for (i = 0; i < dots.length; i++) {
              dots[i].className = dots[i].className.replace(" active", "");
          }

          slides[slideIndex].style.display = "block";  
          dots[slideIndex].className += " active";        
          slideIndex++;          
          if (slideIndex > slides.length - 1) {
            slideIndex = 0
          }    
          
           start = setTimeout(showSlides, 5000);
      }
      showSlides(slideIndex = 0);
      function currentSlide(n) {
        clearTimeout(start) ;
        showSlides(slideIndex = n);

      }
    </script>
</html>