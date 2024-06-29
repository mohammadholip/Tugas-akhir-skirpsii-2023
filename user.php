<?php
session_start();
$level=$_SESSION['level'];
$nama_lengkap=$_SESSION['nama_lengkap'];
$foto=$_SESSION['foto'];
$username=$_SESSION['username'];
$password=$_SESSION['password'];
$id=$_SESSION['id_user'];
$id_pengelola=$_SESSION['id_pengelola'];
//$id_user=$_SESSION['id_user'];
include "koneksi.php";
?>

<?php
switch($_GET[act]){
   //Tampil Data Pelatih
  default:
if ($level==1){
  echo "
  <form method='POST' action='?p=user&act=tambah'>
  <button type='submit' class='btn btn-success' name='Tambah' value='Tambah'> <i class='fa fa-plus'></i> Tambah Data</button>
  </form>
		<h3>Data User</h3>
            <table id='data' class='table table-bordered table-striped'>
                <thead>
                    <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                    </tr>
                </thead>";
    $tampil=mysql_query("SELECT * FROM admins order by nama_lengkap ASC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){ 
  $level=$r['level'];
  if ($level==1){$nama_level="Admin";}  
  else if ($level==2){$nama_level="Pengelola";}  
	echo "															
                    <tr>
                    <td>$no</td>
                    <td>$r[nama_lengkap]</td>
                    <td><img src='$r[foto]' width=50 height=50></td>
                    <td>
				<a class='btn btn-xs btn-success' href=?p=user&act=detil&id=$r[id_user]><span class='glyphicon glyphicon-edit'></span>Detil</a> 
				<a class='btn btn-xs btn-warning' href=?p=user&act=edit&id=$r[id_user]><span class='glyphicon glyphicon-edit'></span>Edit</a> 
	            <a class='btn btn-xs btn-danger' href=?p=user&act=hapus&id=$r[id_user] onClick='return confirmSubmit()'>
				<span class='glyphicon glyphicon-trash'></span>Hapus</a>
					</td>
                    </tr>
                ";
				$no++;
										}
	echo "</table>";
}
else if ($level==2){
  echo "
		<h3>Data $nama_dosen</h3>
            <table id='data' class='table table-bordered table-striped'>
                <thead>
                    <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                    </tr>
                </thead>";
    $tampil=mysql_query("SELECT * FROM dosen where id_dosen='$id_dosen'");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){ 
	echo "															
                    <tr>
                    <td>$no</td>
                    <td>$r[nama_dosen]</td>
                    <td><img src='$r[foto_dosen]' width=50 height=50></td>
                    <td>
				<a class='btn btn-xs btn-success' href=?p=dosen&act=detil&id=$r[id_dosen]><span class='glyphicon glyphicon-edit'></span>Detil</a> 
				<a class='btn btn-xs btn-warning' href=?p=dosen&act=edit&id=$r[id_dosen]><span class='glyphicon glyphicon-edit'></span>Edit</a> 
	            <a class='btn btn-xs btn-danger' href=?p=dosen&act=hapus&id=$r[id_dosen] onClick='return confirmSubmit()'>
				<span class='glyphicon glyphicon-trash'></span>Hapus</a>
					</td>
                    </tr>
                ";
				$no++;
										}
	echo "</table>";
}
else if ($level==3){
  echo "
		<h3>Data $nama_mahasiswa</h3>
            <table id='data' class='table table-bordered table-striped'>
                <thead>
                    <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                    </tr>
                </thead>";
    $tampil=mysql_query("SELECT * FROM mahasiswa where id_mahasiswa='$id_mahasiswa'");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){ 
	echo "															
                    <tr>
                    <td>$no</td>
                    <td>$r[nama_mahasiswa]</td>
                    <td><img src='$r[foto_mahasiswa]' width=50 height=50></td>
                    <td>
				<a class='btn btn-xs btn-success' href=?p=mahasiswa&act=detil&id=$r[id_mahasiswa]><span class='glyphicon glyphicon-edit'></span>Detil</a> 
				<a class='btn btn-xs btn-warning' href=?p=mahasiswa&act=edit&id=$r[id_mahasiswa]><span class='glyphicon glyphicon-edit'></span>Edit</a> 
	            <a class='btn btn-xs btn-danger' href=?p=mahasiswa&act=hapus&id=$r[id_mahasiswa] onClick='return confirmSubmit()'>
				<span class='glyphicon glyphicon-trash'></span>Hapus</a>
					</td>
                    </tr>
                ";
				$no++;
										}
	echo "</table>";
}

else {
  echo "
		<h3>Data User</h3>
            <table id='data' class='table table-bordered table-striped'>
                <thead>
                    <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Level</th>
                    <th>Foto</th>
                    </tr>
                </thead>";
    $tampil=mysql_query("SELECT * FROM admins order by nama_lengkap ASC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){ 
	$level=$r['level'];
    if ($level==1){$nama_level="Admin";}  
	else if ($level==2){$nama_level="Pengelola";}  

	echo "															
                    <tr>
                    <td>$no</td>
                    <td>$r[nama_lengkap]</td>
                    <td>$r[username]</td>
                    <td>$r[password]</td>
                    <td>$nama_level</td>
                    <td><img src='$r[foto]' width=50 height=50></td>
                    </tr>
                ";
				$no++;
										}
	echo "</table>";

}	
  break;
  case "tambah":	
?>
<div class="input-states">
<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Nama Lengkap</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nama_lengkap">
                </div>
        </div>
    </div>
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
            <label class="col-sm-3 control-label">Level</label>
                <div class="col-sm-6">
                    <select class="form-control custom-select" name="level">
						<option value="" selected>- Pilih Level -</option>
						<option value="1">Admin</option>
                    </select>
                </div>
        </div>
    </div>	
	
    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Foto</label>
                <div class="col-sm-6">
                    <input type="file" class="form-control" name="gambar">
                </div>
        </div>
    </div>
	
    <div class="form-actions">
        <button type="submit" class="btn btn-success" name="Simpan" value="Simpan"> <i class="fa fa-check"></i> Simpan</button>
        <a onclick=self.history.back() ><button type='button' class='btn btn-danger'>Cancel</button></a>
    </div>
</form>

<?php
include "koneksi.php";
if (isset($_POST['Simpan'])) {
$username = $_POST['username'];
$password = $_POST['password'];
$nama_lengkap= $_POST['nama_lengkap'];
$level= $_POST['level'];


	$nama_gambar=$_FILES['gambar']['name'];
	$file_type	= array('jpg','jpeg','png','gif','bmp');
	$explode	= explode('.',$nama_gambar);
	$extensi	= $explode[count($explode)-1];
  
		$uploaddir='foto_user/';
		$alamatfile=$uploaddir.$nama_gambar;
	
		if (move_uploaded_file($_FILES['gambar']['tmp_name'],$alamatfile))
		{ 
 

 mysql_query("INSERT INTO admins(
  nama_lengkap,
  username,
  password,
  level,
  foto
  ) 
  VALUES(
  '$nama_lengkap',
  '$username',
  '$password',
  '$level',
  '$alamatfile' 
  )");
		
		echo "<script>alert('Data Telah Disimpan');window.location.href='?p=user';</script>";		
			
			}

}

?>

    </div>
<?php
    break;
  case "detil":	
  $edit=mysql_query("SELECT * FROM admins where id_user='$_GET[id]'");
  $r=mysql_fetch_array($edit);
  $level=$r['level'];
  if ($level==1){$nama_level="Admin";}  
  else if ($level==2){$nama_level="Pengelola";}  
?>
<div class="input-states">
<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Nama Lengkap</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nama_lengkap" value="<?php echo $r['nama_lengkap'];?>" readonly>
                    <input type="hidden" class="form-control" name="id_user" value="<?php echo $r['id_user'];?>">
                </div>
        </div>
    </div>
    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Username</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="username" value="<?php echo $r['username'];?>" readonly>
                </div>
        </div>
    </div>

    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Password</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control" name="password" value="<?php echo $r['password'];?>" readonly>
                </div>
        </div>
    </div>
    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Level</label>
                <div class="col-sm-6">
                    <select class="form-control custom-select" name="level">
						<option value="<?php echo $r['level'];?>" selected><?php echo $nama_level;?></option>
                    </select>
                </div>
        </div>
    </div>	

    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Foto</label>
                <div class="col-sm-6">
                    <img src="<?php echo $r['foto'];?>" width="100" height="100">
                </div>
        </div>
    </div>

    <div class="form-actions">
        <a onclick=self.history.back() ><button type='button' class='btn btn-danger'>Cancel</button></a>
    </div>
</form>

<?php
    break;
  case "edit":	
  $edit=mysql_query("SELECT * FROM admins where id_user='$_GET[id]'");
  $r=mysql_fetch_array($edit);
  $level=$r['level'];
  if ($level==1){$nama_level="Admin";}  
  else if ($level==2){$nama_level="Pengelola";}  
?>

<div class="input-states">
<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Nama Lengkap</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nama_lengkap" value="<?php echo $r['nama_lengkap'];?>">
                    <input type="hidden" class="form-control" name="id_user" value="<?php echo $r['id_user'];?>">
                </div>
        </div>
    </div>
    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Username</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="username" value="<?php echo $r['username'];?>">
                </div>
        </div>
    </div>

    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Password</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control" name="password" value="<?php echo $r['password'];?>">
                </div>
        </div>
    </div>
    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Level</label>
                <div class="col-sm-6">
                    <select class="form-control custom-select" name="level">
						<option value="<?php echo $r['level'];?>" selected><?php echo $nama_level;?></option>
						<option value="">- Pilih Level -</option>
						<option value="1">Admin</option>
                    </select>
                </div>
        </div>
    </div>	

    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Foto</label>
                <div class="col-sm-6">
                    <img src="<?php echo $r['foto'];?>" width="100" height="100">
                </div>
        </div>
    </div>
    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Ganti Foto</label>
                <div class="col-sm-6">
                    <input type="file" class="form-control" name="gambar">
                </div>
        </div>
    </div>
	
    <div class="form-actions">
        <button type="submit" class="btn btn-success" name="Update" value="Update"> <i class="fa fa-check"></i> Update</button>
        <a onclick=self.history.back() ><button type='button' class='btn btn-danger'>Cancel</button></a>
    </div>
</form>

<?php
include "koneksi.php";
if (isset($_POST['Update'])) {
$id_user = $_POST['id_user'];
$nama_lengkap = $_POST['nama_lengkap'];
$username= $_POST['username'];
$password= $_POST['password'];
$level= $_POST['level'];

$gambar1 = $_POST['gambar'];

	$nama_gambar=$_FILES['gambar']['name'];
	$file_type	= array('jpg','jpeg','png','gif','bmp');
	$explode	= explode('.',$nama_gambar);
	$extensi	= $explode[count($explode)-1];

	if ($nama_gambar=="" ){
		$qupdate2 = mysql_query("UPDATE  admins set 
		nama_lengkap='$nama_lengkap',
		username='$username',
		password='$password',
		level='$level'
		
		where id_user='$id_user'
		");
	}
		$uploaddir='foto_user/';
		$alamatfile=$uploaddir.$nama_gambar;

		if (move_uploaded_file($_FILES['gambar']['tmp_name'],$alamatfile) )
		{ 
		$qupdate2 = mysql_query("UPDATE  admins set 
		nama_lengkap='$nama_lengkap',
		username='$username',
		password='$password',
		level='$level',
		foto='$alamatfile'
		where id_user='$id_user'

		");
			
		}
	echo "<script>alert('Data Telah Disimpan!!!')
	location.replace('?p=user')</script>";

}
?>

<?php	
break;
  case "hapus":
  mysql_query("DELETE FROM admins WHERE id_user='$_GET[id]'");
	echo "<script>alert('Data Telah Dihapus!!!')
	location.replace('?p=user')</script>"; 
  break;
	}
	?>	