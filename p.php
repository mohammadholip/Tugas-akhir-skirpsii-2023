<?php
$p = $_GET[p]; 
switch ($p)
{    

	case 'mahasiswa': 
		if (!file_exists ("mahasiswa.php")) die ("File  kosong!"); 
		include('mahasiswa.php');		
		break;
		
	case 'fakultas': 
		if (!file_exists ("fakultas.php")) die ("File  kosong!"); 
		include('fakultas.php');		
		break;
		
	case 'jurusan': 
		if (!file_exists ("jurusan.php")) die ("File  kosong!"); 
		include('jurusan.php');		
		break;
	case 'dosen': 
		if (!file_exists ("dosen.php")) die ("File  kosong!"); 
		include('dosen.php');		
		break;
	case 'skripsi': 
		if (!file_exists ("skripsi.php")) die ("File  kosong!"); 
		include('skripsi.php');		
		break;
		
	case 'user': 
		if (!file_exists ("user.php")) die ("File  kosong!"); 
		include('user.php');		
		break;

	case 'logout': 
		if (!file_exists ("logout.php")) die ("File  kosong!"); 
		include('logout.php');		
		break;

	case 'login': 
		if (!file_exists ("login.php")) die ("File  kosong!"); 
		include('login.php');		
		break;

//tidak ada parameter yang dikirim ============================
	default :
	if (!file_exists ("profil.php")) die ("File  kosong!"); 
		include('profil.php');
		break;
}
?>
