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
            $sql0 = "SELECT id_phichuyentien,toithieu,toida FROM phichuyentien
            WHERE id_chuyentien LIKE '%".$search."%'";
			$truyendulieu .= "&search=$_GET[search]&by=$_GET[by]";
        }
      
    }
    else {
        $back_button = FALSE;

        $sql0 = "SELECT id_phichuyentien,toithieu,toida FROM phichuyentien
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
                        <input name="search" size="30" type="text" placeholder="tìm kiếm phi chuyển tiền" />
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
                        <p id="min">tối đa :<?php echo $row["toithieu"] ; ?></p>
						
						<p id="max">tối thiểu :<?php echo $row["toida"] ; ?> </p>
						<br>
                        <p id="acno"><?php echo "Ac/No : " . $row["id_phichuyentien"]; ?></p>
                    </div>
                    <div class="flex-item-1">
                        <div class="dropdown">
                            
                          <button onclick="dropdown_func(<?php echo $i ?>)" class="dropbtn"></button>
                          <div id="dropdown<?php echo $i ?>" class="dropdown-content">
                            <a href="edit_phichuyentien.php?id_phichuyentien=<?php echo $row["id_phichuyentien"]; ?>">View / Edit</a>
                          
                            <a href="delete_phichuyentien.php?id_phichuyentien=<?php echo $row["id_phichuyentien"]; ?>"
                                 onclick="return confirm('Chỗ anh em khuyên thật, bạn đéo nên làm thế, tếp tục?')">Delete</a>
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
      <a href="manage_phichuyentien.php?page=<?php echo 1 ; echo $truyendulieu;?>"> << </a>
      
	  <?php 
  }
  
  for($i=$dau;$i<=$cuoi;$i++){
	     if ($page == $i) echo " <b> <i> $i </i> </b> &nbsp;";
		 else {
			 ?>
	             
	       <a href="manage_phichuyentien.php?page=<?php echo $i ; echo $truyendulieu;?> "><?php echo $i ; ?> &nbsp;</a>
            
     <?php }
  }
   if ($page != $tst ) {?> <a href="manage_phichuyentien.php?page=<?php echo $tst ;echo $truyendulieu; ?>"> >> </a>  <?php 
   }
  ?></p>
				
           <?php }  else {  ?>
                <p id="none"> No results found :(</p>
            <?php }
            if ($back_button) { ?>
                <div class="flex-container-bb">
                    <div class="back_button">
                        <a href="manage_phichuyentien.php" class="button">Go Back</a>
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


  
    </script>

</body>
</html>