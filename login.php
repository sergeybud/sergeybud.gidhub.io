<?php
//подключение сесиии и управление куки
    session_start();
	 foreach($_COOKIE as $ind => $value) {
      setcookie($ind,'',time()-999, "/");
      unset($_COOKIE[$ind]);
   
    }
    session_destroy();
	$url="index.php";
		echo "<script>location.href='".$url."'</script>";



?>