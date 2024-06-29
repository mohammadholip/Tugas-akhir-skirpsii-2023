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
  <form method='POST' action='?p=dosen&act=tambah'>
  <button type='submit' class='btn btn-success' name='Tambah' value='Tambah'> <i class='fa fa-plus'></i> Tambah Data</button>
  </form>
		<h3>Data Dosen UIM Pamekasan</h3>
            <table id='data' class='table table-bordered table-striped'>
                <thead>
                    <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                    </tr>
                </thead>";
    $tampil=mysql_query("SELECT * FROM dosen order by nama_dosen ASC");
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
else {
  echo "
		<h3>Data Dosen UIM Pamekasan</h3>
            <table id='data' class='table table-bordered table-striped'>
                <thead>
                    <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                    </tr>
                </thead>";
    $tampil=mysql_query("SELECT * FROM dosen order by nama_dosen ASC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){ 
	echo "															
                    <tr>
                    <td>$no</td>
                    <td>$r[nama_dosen]</td>
                    <td><img src='$r[foto_dosen]' width=50 height=50></td>
                    <td>
					<a class='btn btn-xs btn-success' href=?p=dosen&act=detil&id=$r[id_dosen]><span class='glyphicon glyphicon-edit'></span>Detil</a> 
					</td>
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
            <label class="col-sm-3 control-label">Nama</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nama_dosen">
                </div>
        </div>
    </div>
    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Tempat Lahir</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="tempat_lahir_dosen">
                </div>
        </div>
    </div>
    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Tanggal Lahir</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="tanggal_lahir_dosen">
                </div>
        </div>
    </div>
    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Alamat</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="alamat">
                </div>
        </div>
    </div>
    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">No HP</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="no_hp">
                </div>
        </div>
    </div>
    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Fakultas</label>
                <div class="col-sm-6">
                    <select class="form-control custom-select" name="id_fakultas">
						<option value="">- Pilih Nama Fakultas-</option>
					<?php 
						$tampil=mysql_query("SELECT * FROM fakultas order by nama_fakultas ASC");
						while ($r=mysql_fetch_array($tampil)){ 					
					?>	
						<option value="<?php echo $r['id_fakultas'];?>"><?php echo $r['nama_fakultas'];?></option>
					<?php } ?>	
                    </select>
                </div>
        </div>
    </div>
    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Username</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="username_dosen">
                </div>
        </div>
    </div>

    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Password</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control" name="password_dosen">
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
$nama_dosen = $_POST['nama_dosen'];
$tanggal_lahir_dosen = $_POST['tanggal_lahir_dosen'];
$tempat_lahir_dosen = $_POST['tempat_lahir_dosen'];
$alamat = $_POST['alamat'];
$no_hp = $_POST['no_hp'];
$id_fakultas = $_POST['id_fakultas'];
$username_dosen = $_POST['username_dosen'];
$password_dosen = $_POST['password_dosen'];

	$nama_gambar=$_FILES['gambar']['name'];
	$file_type	= array('jpg','jpeg','png','gif','bmp');
	$explode	= explode('.',$nama_gambar);
	$extensi	= $explode[count($explode)-1];
  
		$uploaddir='foto_user/';
		$alamatfile=$uploaddir.$nama_gambar;
	
		if (move_uploaded_file($_FILES['gambar']['tmp_name'],$alamatfile))
		{ 

 mysql_query("INSERT INTO dosen(
  nama_dosen,
  tempat_lahir_dosen,
  tanggal_lahir_dosen,
  alamat,
  no_hp,
  id_fakultas,
  username_dosen,
  password_dosen,
  foto_dosen
  ) 
  VALUES(
  '$nama_dosen',
  '$tempat_lahir_dosen',
  '$tanggal_lahir_dosen',
  '$alamat',
  '$no_hp',
  '$id_fakultas',
  '$username_dosen',
  '$password_dosen',
  '$alamatfile' 
  )");
		
		echo "<script>alert('Data Telah Disimpan');window.location.href='?p=dosen';</script>";					
			}
}
?>
    </div>
<?php
    break;
  case "detil":	
  $edit=mysql_query("SELECT * FROM dosen,fakultas where dosen.id_fakultas=fakultas.id_fakultas and dosen.id_dosen='$_GET[id]'");
  $r=mysql_fetch_array($edit);
?>
<div class="input-states">
<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Nama</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nama_dosen" value="<?php echo $r['nama_dosen'];?>" readonly>
                    <input type="hidden" class="form-control" name="id_dosen" value="<?php echo $r['id_dosen'];?>">
                </div>
        </div>
    </div>
    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Tempat Lahir</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="tempat_lahir_dosen" value="<?php echo $r['tempat_lahir_dosen'];?>" readonly>
                </div>
        </div>
    </div>    
	<div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Tanggal Lahir</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="tanggal_lahir_dosen" value="<?php echo $r['tanggal_lahir_dosen'];?>" readonly>
                </div>
        </div>
    </div>
	<div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Alamat</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="alamat" value="<?php echo $r['alamat'];?>" readonly>
                </div>
        </div>
    </div>	
	<div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">No HP</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="no_hp" value="<?php echo $r['no_hp'];?>" readonly>
                </div>
        </div>
    </div>	
	<div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Fakultas</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="id_fakultas" value="<?php echo $r['nama_fakultas'];?>" readonly>
                </div>
        </div>
    </div>
    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Username</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="username_dosen" value="<?php echo $r['username_dosen'];?>" readonly>
                </div>
        </div>
    </div>

    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Password</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control" name="password_dosen" value="<?php echo $r['password_dosen'];?>" readonly>
                </div>
        </div>
    </div>
    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Foto</label>
                <div class="col-sm-6">
                    <img src="<?php echo $r['foto_dosen'];?>" width="100" height="100">
                </div>
        </div>
    </div>

    <div class="form-actions">
        <a onclick=self.history.back() ><button type='button' class='btn btn-danger'>Kembali</button></a>
    </div>
</form>

<?php
    break;
  case "edit":	
  $edit=mysql_query("SELECT * FROM dosen,fakultas where dosen.id_fakultas=fakultas.id_fakultas and dosen.id_dosen='$_GET[id]'");
  $r=mysql_fetch_array($edit);
  
?>

<div class="input-states">
<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Nama</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nama_dosen" value="<?php echo $r['nama_dosen'];?>">
                    <input type="hidden" class="form-control" name="id_dosen" value="<?php echo $r['id_dosen'];?>">
                </div>
        </div>
    </div>
    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Tempat Lahir</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="tempat_lahir_dosen" value="<?php echo $r['tempat_lahir_dosen'];?>">
                </div>
        </div>
    </div>    
	<div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Tanggal Lahir</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="tanggal_lahir_dosen" value="<?php echo $r['tanggal_lahir_dosen'];?>">
                </div>
        </div>
    </div>
	<div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Alamat</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="alamat" value="<?php echo $r['alamat'];?>">
                </div>
        </div>
    </div>	
	<div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">No HP</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="no_hp" value="<?php echo $r['no_hp'];?>">
                </div>
        </div>
    </div>	
    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Fakultas</label>
                <div class="col-sm-6">
                    <select class="form-control custom-select" name="id_fakultas">
						<option value="<?php echo $r['id_fakultas'];?>" selected><?php echo $r['nama_fakultas'];?></option>
						<option value="">- Pilih Nama Fakultas-</option>
					<?php 
						$tampil1=mysql_query("SELECT * FROM fakultas order by nama_fakultas ASC");
						while ($r1=mysql_fetch_array($tampil1)){ 					
					?>	
						<option value="<?php echo $r1['id_fakultas'];?>"><?php echo $r1['nama_fakultas'];?></option>
					<?php } ?>	
                    </select>
                </div>
        </div>
    </div>

    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Username</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="username_dosen" value="<?php echo $r['username_dosen'];?>">
                </div>
        </div>
    </div>

    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Password</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control" name="password_dosen" value="<?php echo $r['password_dosen'];?>" readonly>
                </div>
        </div>
    </div>
    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Foto</label>
                <div class="col-sm-6">
                    <img src="<?php echo $r['foto_dosen'];?>" width="100" height="100">
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
$id_dosen = $_POST['id_dosen'];
$nama_dosen = $_POST['nama_dosen'];
$tempat_lahir_dosen = $_POST['tempat_lahir_dosen'];
$tanggal_lahir_dosen = $_POST['tanggal_lahir_dosen'];
$alamat = $_POST['alamat'];
$no_hp = $_POST['no_hp'];
$id_fakultas = $_POST['id_fakultas'];
$username_dosen= $_POST['username_dosen'];
$password_dosen= $_POST['password_dosen'];

	$nama_gambar=$_FILES['gambar']['name'];
	$file_type	= array('jpg','jpeg','png','gif','bmp');
	$explode	= explode('.',$nama_gambar);
	$extensi	= $explode[count($explode)-1];

	if ($nama_gambar=="" ){
		$qupdate2 = mysql_query("UPDATE  dosen set 
		nama_dosen='$nama_dosen',
		tempat_lahir_dosen='$tempat_lahir_dosen',
		tanggal_lahir_dosen='$tanggal_lahir_dosen',
		alamat='$alamat',
		no_hp='$no_hp',
		id_fakultas='$id_fakultas',
		username_dosen='$username_dosen',
		password_dosen='$password_dosen'
		
		where id_dosen='$id_dosen'
		");
	}
		$uploaddir='foto_user/';
		$alamatfile=$uploaddir.$nama_gambar;

		if (move_uploaded_file($_FILES['gambar']['tmp_name'],$alamatfile) )
		{ 
		$qupdate2 = mysql_query("UPDATE  dosen set 
		nama_dosen='$nama_dosen',
		tempat_lahir_dosen='$tempat_lahir_dosen',
		tanggal_lahir_dosen='$tanggal_lahir_dosen',
		alamat='$alamat',
		no_hp='$no_hp',
		id_fakultas='$id_fakultas',
		username_dosen='$username_dosen',
		password_dosen='$password_dosen',
		foto_dosen='$alamatfile'
		where id_dosen='$id_dosen'

		");
			
		}
	echo "<script>alert('Data Telah Disimpan!!!')
	location.replace('?p=dosen')</script>";

}
?>

<?php	
break;
  case "hapus":
  mysql_query("DELETE FROM dosen WHERE id_dosen='$_GET[id]'");
	echo "<script>alert('Data Telah Dihapus!!!')
	location.replace('?p=dosen')</script>"; 
  break;
	}
	?>	