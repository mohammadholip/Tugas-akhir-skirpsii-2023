<?php
  session_start();
  session_destroy();
	echo "<script>alert('Anda telah keluar dari menu admin. Silahkan login untuk masuk ke menu admin!!!')
	location.replace('index.php')</script>";
?>