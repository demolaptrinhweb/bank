<?php
    include "validate_admin.php";
    include "DBconnect.php";
    include "user_navbar.php";
    include "admin_sidebar.php";
    include "session_hethan.php";
$truyendulieu = "";
    if (isset($_GET['search'])) {
        $back_button = TRUE;
        $search = $_GET['search'];
        $by = $_GET['by'];
          
        if ($by == "acno") {
            $sql0 = "SELECT id_the,thenganhangid FROM thenganhang
            WHERE thenganhangid LIKE '%".$search."%'";
			$truyendulieu .= "&search=$_GET[search]&by=$_GET[by]";
        }
      
    }
    else {
        $back_button = FALSE;

        $sql0 = "SELECT id_the,thenganhangid FROM thenganhang
            ";
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="manage_customers_style.css">
</head>

<body>
    <div class="search-bar-wrapper">
        <div class="search-bar" id="the-search-bar">
            <div class="flex-item-search-bar" id="fi-search-bar">

                <form class="search_form" action="" method="get">
                    <div class="flex-item-search">
                        <input name="search" size="30" type="text" placeholder="tìm kiếm kiểu vay" />
                    </div>

                    <div class="flex-item-search-button">
                        <button type="submit" name="submit" id="search"></button>
                    </div>

                    <div class="flex-item-by">
                        <label>By :</label>
                    </div>

                    <div class="flex-item-search-by">
                        <select name="by">
                            <option value="acno">id</option>
                        </select>
                    </div>
                </form>

            </div>
        </div>
    </div>
 <div class="flex-container">
	  <?php 
	
	
	
  $kq = $control->query($sql0);
  $tsp = @mysqli_num_rows($kq);
  $sd = 5 ;
  
  
  $tst = ceil($tsp/$sd);
  
  
  
 
  if (isset($_GET["page"])){
	  $page = $_GET["page"] ;
	  
	  }
	  else {
		  $page = 1 ;}
		  
		  
	$vitri = ($page - 1) * $sd ;
	
	$sql0.= " limit $vitri , $sd ";
				  
	
  ?>  
				
	 
        <?php
            $result = $conn->query($sql0);

            if ($result->num_rows > 0) {
           
            $i = 0;
            while($row = $result->fetch_assoc()) {
                $i++; ?>

                <div class="flex-item">
                    <div class="flex-item-1">
                        <p id="id"><?php echo $i . "."; ?></p>
                    </div>
                    <div class="flex-item-2">
						   <p id="name"></p>
                        <p id="acno"><?php echo "Ac/No : " . $row["thenganhangid"]; ?></p>
                    </div>
                    <div class="flex-item-1">
                        <div class="dropdown">
                            
                          <button onclick="dropdown_func(<?php echo $i ?>)" class="dropbtn"></button>
                          <div id="dropdown<?php echo $i ?>" class="dropdown-content">
                            <a href="edit_thenganhang.php?id_the=<?php echo $row["id_the"]; ?>">View / Edit</a>
                          
                            <a href="delete_thenganhang.php?id_the=<?php echo $row["id_the"]; ?>"
                                 onclick="return confirm('Bạn có chắc chắn muốn xoá?')">Delete</a>
                          </div>
                        </div>
                    </div>
                </div>	
	 
	 
	 
	  <?php }?>
								  
	<?php 
  
  if ($page != 1 and $page != 2) {
  $dau = $page-2 ;
   
  }
  else $dau = 1;
	$cuoi = $page + 2; 
  if ($cuoi > $tst) $cuoi = $tst ;
  
  
  
  ?>
  <p align="center"> trang : <?php  if ($page != 1  ){
	  ?>
      <a href="manage_thenganhang.php?page=<?php echo 1 ; echo $truyendulieu;?>"> << </a>
      
	  <?php 
  }
  
  for($i=$dau;$i<=$cuoi;$i++){
	     if ($page == $i) echo " <b> <i> $i </i> </b> &nbsp;";
		 else {
			 ?>
	             
	       <a href="manage_thenganhang.php?page=<?php echo $i ; echo $truyendulieu;?> "><?php echo $i ; ?> &nbsp;</a>
            
     <?php }
  }
   if ($page != $tst ) {?> <a href="manage_thenganhang.php?page=<?php echo $tst ;echo $truyendulieu; ?>"> >> </a>  <?php 
   }
  ?></p>
				
           <?php }  else {  ?>
                <p id="none"> No results found :(</p>
            <?php }
            if ($back_button) { ?>
                <div class="flex-container-bb">
                    <div class="back_button">
                        <a href="manage_thenganhang.php" class="button">Go Back</a>
                    </div>
                </div>
            <?php }
             ?>
    </div>

    <script>
   
    function dropdown_func(i) {
      
        var doc_id = "dropdown".concat(i.toString());

        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;

       
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
              openDropdown.classList.remove('show');
            }
        }

        document.getElementById(doc_id).classList.toggle("show");
        return false;
    }

   
    window.onclick = function(event) {
      if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;

        for (i = 0; i < dropdowns.length; i++) {
          var openDropdown = dropdowns[i];
          if (openDropdown.classList.contains('show')) {
            openDropdown.classList.remove('show');
          }
        }
      }
    }


    $(document).ready(function() {
        var curr_scroll;

        $(window).scroll(function () {
            curr_scroll = $(window).scrollTop();

            if ($(window).scrollTop() > 120) {
                $("#the-search-bar").addClass('search-bar-fixed');

              if ($(window).width() > 855) {
                  $("#fi-search-bar").addClass('fi-search-bar-fixed');
              }
            }

            if ($(window).scrollTop() < 121) {
                $("#the-search-bar").removeClass('search-bar-fixed');

              if ($(window).width() > 855) {
                  $("#fi-search-bar").removeClass('fi-search-bar-fixed');
              }
            }
        });

        $(window).resize(function () {
            var class_name = $("#fi-search-bar").attr('class');

            if ((class_name == "flex-item-search-bar fi-search-bar-fixed") && ($(window).width() < 856)) {
                $("#fi-search-bar").removeClass('fi-search-bar-fixed');
            }

            if ((class_name == "flex-item-search-bar") && ($(window).width() > 855) && (curr_scroll > 120)) {
                $("#fi-search-bar").addClass('fi-search-bar-fixed');
            }
        });
    });

    </script>

</body>
</html>