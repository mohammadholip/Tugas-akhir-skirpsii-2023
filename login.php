<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Login Admin</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<br>
<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
    <div class="card-body">
        <form name="form1" method="post" action="">  
    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Username</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="username">
				</div>
        </div>
    </div>
    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Password</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control" name="password">
				</div>
        </div>
    </div>		
    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Level User</label>
                <div class="col-sm-6">
                    <select class="form-control custom-select" name="level">
						<option value="">- Pilih Level User-</option>
						<option value="1">Admin</option>
						<option value="2">Dosen</option>
						<option value="3">Mahasiswa</option>
                    </select>
                </div>
        </div>
    </div>		
	
		  <div class="form-group">
          </div><input class='btn btn-success' type="submit" name="Login" value="Login">          
		   <a onclick=self.history.back() ><button type='button' class='btn btn-danger'>Batal</button></a>

        </form>
<?php
include "koneksi.php";

if (isset($_POST['Login'])) {
$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];

if ($level==1){
	$login	=mysql_query("SELECT * FROM admins WHERE username='$username' and password='$password'");
	$ketemu	=mysql_num_rows($login);
	$r		=mysql_fetch_array($login);
	if ($ketemu>0){
	//session_start();
		$_SESSION['id_user']=$r['id_user'];
		$_SESSION['level']=1;
		$_SESSION['nama_lengkap']=$r['nama_lengkap'];
		$_SESSION['foto']=$r['foto'];
		$_SESSION['username']=$r['username'];
		$_SESSION['password']=$r['password'];
	echo "
	<script>
	alert('Anda Berhasil Login Sebagai Admin');
	window.location.href='index.php';
	</script>
	";		
	}
	
	else {
	echo "
	<script>
	alert('Data Login Anda Salah');
	window.location.href='index.php?p=login';
	</script>
	";			
	}
}
else if ($level==2){
	$login	=mysql_query("SELECT * FROM dosen WHERE username_dosen='$username' and password_dosen='$password'");
	$ketemu	=mysql_num_rows($login);
	$r		=mysql_fetch_array($login);
	if ($ketemu>0){
	//session_start();
		$_SESSION['id_dosen']=$r['id_dosen'];
		$_SESSION['level']=2;
		$_SESSION['nama_dosen']=$r['nama_dosen'];
		$_SESSION['foto_dosen']=$r['foto_dosen'];
		$_SESSION['username_dosen']=$r['username_dosen'];
		$_SESSION['password_dosen']=$r['password_dosen'];
	echo "
	<script>
	alert('Anda Berhasil Login Sebagai Dosen');
	window.location.href='index.php';
	</script>
	";		
	}
	else {
	echo "
	<script>
	alert('Data Login Anda Salah');
	window.location.href='index.php?p=login';
	</script>
	";		
	
	}


}
else if ($level==3){
	$login	=mysql_query("SELECT * FROM mahasiswa WHERE username_mahasiswa='$username' and password_mahasiswa='$password'");
	$ketemu	=mysql_num_rows($login);
	$r		=mysql_fetch_array($login);
	if ($ketemu>0){
	//session_start();
		$_SESSION['id_mahasiswa']=$r['id_mahasiswa'];
		$_SESSION['level']=3;
		$_SESSION['nama_mahasiswa']=$r['nama_mahasiswa'];
		$_SESSION['foto_mahasiswa']=$r['foto_mahasiswa'];
		$_SESSION['username_mahasiswa']=$r['username_mahasiswa'];
		$_SESSION['password_mahasiswa']=$r['password_mahasiswa'];
		$_SESSION['id_fakultas_mahasiswa']=$r['id_fakultas_mahasiswa'];
		$_SESSION['id_jurusan_mahasiswa']=$r['id_jurusan_mahasiswa'];
	echo "
	<script>
	alert('Anda Berhasil Login Sebagai Mahasiswa');
	window.location.href='index.php';
	</script>
	";		
	}
	else {
	echo "
	<script>
	alert('Data Login Anda Salah');
	window.location.href='index.php?p=login';
	</script>
	";		
	
	}


}
}

?>

      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/popper/popper.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
