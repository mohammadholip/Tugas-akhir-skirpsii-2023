<?php
include "koneksi.php"; 
		$query=mysql_query("select * from profil");
		$bb=mysql_fetch_array($query);
echo $bb['profil'];
		?>
