<?php
    include "DBconnect.php";
  
    if(!isset($_SESSION)) {
        session_start();
    }

    $uname = mysqli_real_escape_string($conn, $_POST["admin_uname"]);
    $pwd = $_POST["admin_psw"] ;

    $sql0 =  "SELECT * FROM admin WHERE uname='".$uname."'";
    $result = $control->query($sql0);

    if ($arr = $control->fetch_arr($result)) {
		$auth = password_verify($pwd,$arr["pwd"]);
		if($auth){
        $_SESSION['isAdminValid'] = true;
        $_SESSION['LAST_ACTIVITY'] = time();
		$_SESSION["quyen"] = $arr["quyen"];
        header("location:admin_home.php");
		}
		else {
			 session_destroy();
        die(header("location:admin_login.php?loginFailed=true"));
		}
    }
    else {
        session_destroy();
        die(header("location:admin_login.php?loginFailed=true"));
    }
?>
