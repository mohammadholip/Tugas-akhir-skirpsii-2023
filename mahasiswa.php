<?php
session_start();
$level=$_SESSION['level'];
$nama_mahasiswa=$_SESSION['nama_mahasiswa'];
$foto_mahasiswa=$_SESSION['foto_mahasiswa'];
$username_mahasiswa=$_SESSION['username_mahasiswa'];
$password_mahasiswa=$_SESSION['password_mahasiswa'];
$id_mahasiswa=$_SESSION['id_mahasiswa'];
include "koneksi.php";
?>

<?php
switch($_GET[act]){
   //Tampil Data Pelatih
  default:
if ($level==3){
  echo "
		<h3>Data Mahasiswa UIM Pamekasan</h3>
            <table id='data' class='table table-bordered table-striped'>
                <thead>
                    <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                    </tr>
                </thead>";
    $tampil=mysql_query("SELECT * FROM mahasiswa where id_mahasiswa='$id_mahasiswa' order by nama_mahasiswa ASC");
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
		<h3>Data Mahasiswa UIM Pamekasan</h3>
            <table id='data' class='table table-bordered table-striped'>
                <thead>
                    <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                    </tr>
                </thead>";
    $tampil=mysql_query("SELECT * FROM mahasiswa order by nama_mahasiswa ASC");
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
  break;
  case "tambah":	
?>
<div class="input-states">
<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Nama</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nama_mahasiswa">
                </div>
        </div>
    </div>
    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">NPM</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="npm">
                </div>
        </div>
    </div>
    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Tempat Lahir</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="tempat_lahir_mahasiswa">
                </div>
        </div>
    </div>
    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Tanggal Lahir</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="tanggal_lahir_mahasiswa">
                </div>
        </div>
    </div>
    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Alamat</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="alamat_mahasiswa">
                </div>
        </div>
    </div>
    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">No HP</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="no_hp_mahasiswa">
                </div>
        </div>
    </div>
    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Fakultas</label>
                <div class="col-sm-6">
                    <select class="form-control custom-select" name="id_fakultas_mahasiswa">
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
            <label class="col-sm-3 control-label">Jurusan</label>
                <div class="col-sm-6">
                    <select class="form-control custom-select" name="id_jurusan_mahasiswa">
						<option value="">- Pilih Nama Jurusan-</option>
					<?php 
						$tampil=mysql_query("SELECT * FROM jurusan order by nama_jurusan ASC");
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
                    <input type="text" class="form-control" name="username_mahasiswa">
                </div>
        </div>
    </div>

    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Password</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control" name="password_mahasiswa">
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
$nama_mahasiswa = $_POST['nama_mahasiswa'];
$npm = $_POST['npm'];
$tanggal_lahir_mahasiswa = $_POST['tanggal_lahir_mahasiswa'];
$tempat_lahir_mahasiswa = $_POST['tempat_lahir_mahasiswa'];
$alamat_mahasiswa = $_POST['alamat_mahasiswa'];
$no_hp_mahasiswa = $_POST['no_hp_mahasiswa'];
$id_fakultas_mahasiswa = $_POST['id_fakultas_mahasiswa'];
$id_jurusan_mahasiswa = $_POST['id_jurusan_mahasiswa'];
$username_mahasiswa = $_POST['username_mahasiswa'];
$password_mahasiswa = $_POST['password_mahasiswa'];

	$nama_gambar=$_FILES['gambar']['name'];
	$file_type	= array('jpg','jpeg','png','gif','bmp');
	$explode	= explode('.',$nama_gambar);
	$extensi	= $explode[count($explode)-1];
  
		$uploaddir='foto_user/';
		$alamatfile=$uploaddir.$nama_gambar;
	
		if (move_uploaded_file($_FILES['gambar']['tmp_name'],$alamatfile))
		{ 

 mysql_query("INSERT INTO mahasiswa(
  nama_mahasiswa,
  npm,
  tempat_lahir_mahasiswa,
  tanggal_lahir_mahasiswa,
  alamat_mahasiswa,
  no_hp_mahasiswa,
  id_fakultas_mahasiswa,
  id_jurusan_mahasiswa,
  username_mahasiswa,
  password_mahasiswa,
  foto_mahasiswa
  ) 
  VALUES(
  '$nama_mahasiswa',
  '$npm',
  '$tempat_lahir_mahasiswa',
  '$tanggal_lahir_mahasiswa',
  '$alamat_mahasiswa',
  '$no_hp_mahasiswa',
  '$id_fakultas_mahasiswa',
  '$id_jurusan_mahasiswa',
  '$username_mahasiswa',
  '$password_mahasiswa',
  '$alamatfile' 
  )");
		
		echo "<script>alert('Data Telah Disimpan');window.location.href='index.php';</script>";					
			}
}
?>
    </div>
<?php
    break;
  case "detil":	
  $edit=mysql_query("SELECT * FROM mahasiswa,fakultas,jurusan where mahasiswa.id_jurusan_mahasiswa=jurusan.id_jurusan and mahasiswa.id_fakultas_mahasiswa=fakultas.id_fakultas and mahasiswa.id_mahasiswa='$_GET[id]'");
  $r=mysql_fetch_array($edit);
  
  $id_jurusan=$r['id_jurusan_mahasiswa'];
  $nama_jurusan=$r['nama_jurusan'];
  $username_mahasiswa=$r['username_mahasiswa'];
  $password_mahasiswa=$r['password_mahasiswa'];
  $tahun_lulus=$r['tahun_lulus'];
  $foto_mahasiswa=$r['foto_mahasiswa'];
  
?>
<div class="input-states">
<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Nama</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nama_mahasiswa" value="<?php echo $r['nama_mahasiswa'];?>" readonly>
                    <input type="hidden" class="form-control" name="id_mahasiswa" value="<?php echo $r['id_mahasiswa'];?>">
                </div>
        </div>
    </div>
    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">NPM</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="npm" value="<?php echo $r['npm'];?>" readonly>
                </div>
        </div>
    </div>
    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Tempat Lahir</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="tempat_lahir_mahasiswa" value="<?php echo $r['tempat_lahir_mahasiswa'];?>" readonly>
                </div>
        </div>
    </div>
    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Tanggal Lahir</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="tanggal_lahir_mahasiswa" value="<?php echo $r['tanggal_lahir_mahasiswa'];?>" readonly>
                </div>
        </div>
    </div>
    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Alamat</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="alamat_mahasiswa" value="<?php echo $r['alamat_mahasiswa'];?>" readonly>
                </div>
        </div>
    </div>
    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">No HP</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="no_hp_mahasiswa" value="<?php echo $r['no_hp_mahasiswa'];?>" readonly>
                </div>
        </div>
    </div>
    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Fakultas</label>
                <div class="col-sm-6">
                    <select class="form-control custom-select" name="id_fakultas_mahasiswa">
						<option value="<?php echo $r['id_fakultas_mahasiswa'];?>" selected><?php echo $r['nama_fakultas'];?></option>
                    </select>
                </div>
        </div>
    </div>
    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Jurusan</label>
                <div class="col-sm-6">
                    <select class="form-control custom-select" name="id_jurusan_mahasiswa">
						<option value="<?php echo $id_jurusan;?>" selected><?php echo $nama_jurusan;?></option>
                    </select>
                </div>
        </div>
    </div>
    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Username</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="username_mahasiswa" value="<?php echo $username_mahasiswa;?>" readonly>
                </div>
        </div>
    </div>

    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Password</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control" name="password_mahasiswa" value="<?php echo $password_mahasiswa;?>" readonly>
                </div>
        </div>
    </div>
    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Foto</label>
                <div class="col-sm-6">
                    <img src="<?php echo $foto_mahasiswa;?>" width="250" height="350">
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
  $edit=mysql_query("SELECT * FROM mahasiswa,fakultas,jurusan where mahasiswa.id_jurusan_mahasiswa=jurusan.id_jurusan and mahasiswa.id_fakultas_mahasiswa=fakultas.id_fakultas and mahasiswa.id_mahasiswa='$_GET[id]'");
  $r=mysql_fetch_array($edit);
  
  $id_jurusan=$r['id_jurusan_mahasiswa'];
  $nama_jurusan=$r['nama_jurusan'];
  $username_mahasiswa=$r['username_mahasiswa'];
  $password_mahasiswa=$r['password_mahasiswa'];
  $tahun_lulus=$r['tahun_lulus'];
  $foto_mahasiswa=$r['foto_mahasiswa'];
  
?>

<div class="input-states">
<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Nama</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nama_mahasiswa" value="<?php echo $r['nama_mahasiswa'];?>">
                    <input type="hidden" class="form-control" name="id_mahasiswa" value="<?php echo $r['id_mahasiswa'];?>">
                </div>
        </div>
    </div>
    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">NPM</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="npm" value="<?php echo $r['npm'];?>">
                </div>
        </div>
    </div>
    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Tempat Lahir</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="tempat_lahir_mahasiswa" value="<?php echo $r['tempat_lahir_mahasiswa'];?>">
                </div>
        </div>
    </div>
    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Tanggal Lahir</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="tanggal_lahir_mahasiswa" value="<?php echo $r['tanggal_lahir_mahasiswa'];?>">
                </div>
        </div>
    </div>
    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Alamat</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="alamat_mahasiswa" value="<?php echo $r['alamat_mahasiswa'];?>">
                </div>
        </div>
    </div>
    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">No HP</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="no_hp_mahasiswa" value="<?php echo $r['no_hp_mahasiswa'];?>">
                </div>
        </div>
    </div>
    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Fakultas</label>
                <div class="col-sm-6">
                    <select class="form-control custom-select" name="id_fakultas_mahasiswa">
						<option value="<?php echo $r['id_fakultas_mahasiswa'];?>" selected><?php echo $r['nama_fakultas'];?></option>
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
            <label class="col-sm-3 control-label">Jurusan</label>
                <div class="col-sm-6">
                    <select class="form-control custom-select" name="id_jurusan_mahasiswa">
						<option value="<?php echo $id_jurusan;?>" selected><?php echo $nama_jurusan;?></option>
						<option value="">- Pilih Nama Jurusan-</option>
					<?php 
						$tampils=mysql_query("SELECT * FROM jurusan order by nama_jurusan ASC");
						while ($s=mysql_fetch_array($tampils)){ 					
					?>	
						<option value="<?php echo $s['id_jurusan'];?>"><?php echo $s['nama_jurusan'];?></option>
					<?php } ?>	
                    </select>
                </div>
        </div>
    </div>
    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Username</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="username_mahasiswa" value="<?php echo $username_mahasiswa;?>">
                </div>
        </div>
    </div>

    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Password</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control" name="password_mahasiswa" value="<?php echo $password_mahasiswa;?>">
                </div>
        </div>
    </div>
    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Foto</label>
                <div class="col-sm-6">
                    <img src="<?php echo $foto_mahasiswa;?>" width="250" height="350">
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
$id_mahasiswa = $_POST['id_mahasiswa'];
$nama_mahasiswa = $_POST['nama_mahasiswa'];
$npm = $_POST['npm'];
$tempat_lahir_mahasiswa = $_POST['tempat_lahir_mahasiswa'];
$tanggal_lahir_mahasiswa = $_POST['tanggal_lahir_mahasiswa'];
$alamat_mahasiswa = $_POST['alamat_mahasiswa'];
$no_hp_mahasiswa = $_POST['no_hp_mahasiswa'];
$id_fakultas_mahasiswa = $_POST['id_fakultas_mahasiswa'];
$id_jurusan_mahasiswa = $_POST['id_jurusan_mahasiswa'];
$username_mahasiswa= $_POST['username_mahasiswa'];
$password_mahasiswa= $_POST['password_mahasiswa'];

	$nama_gambar=$_FILES['gambar']['name'];
	$file_type	= array('jpg','jpeg','png','gif','bmp');
	$explode	= explode('.',$nama_gambar);
	$extensi	= $explode[count($explode)-1];

	if ($nama_gambar=="" ){
		$qupdate2 = mysql_query("UPDATE  mahasiswa set 
		nama_mahasiswa='$nama_mahasiswa',
		npm='$npm',
		tempat_lahir_mahasiswa='$tempat_lahir_mahasiswa',
		tanggal_lahir_mahasiswa='$tanggal_lahir_mahasiswa',
		alamat_mahasiswa='$alamat_mahasiswa',
		no_hp_mahasiswa='$no_hp_mahasiswa',
		id_fakultas_mahasiswa='$id_fakultas_mahasiswa',
		id_jurusan_mahasiswa='$id_jurusan_mahasiswa',
		username_mahasiswa='$username_mahasiswa',
		password_mahasiswa='$password_mahasiswa'
		
		where id_mahasiswa='$id_mahasiswa'
		");
	}
		$uploaddir='foto_user/';
		$alamatfile=$uploaddir.$nama_gambar;

		if (move_uploaded_file($_FILES['gambar']['tmp_name'],$alamatfile) )
		{ 
		$qupdate2 = mysql_query("UPDATE  mahasiswa set 
		nama_mahasiswa='$nama_mahasiswa',
		npm='$npm',
		tempat_lahir_mahasiswa='$tempat_lahir_mahasiswa',
		tanggal_lahir_mahasiswa='$tanggal_lahir_mahasiswa',
		alamat_mahasiswa='$alamat_mahasiswa',
		no_hp_mahasiswa='$no_hp_mahasiswa',
		id_fakultas_mahasiswa='$id_fakultas_mahasiswa',
		id_jurusan_mahasiswa='$id_jurusan_mahasiswa',
		username_mahasiswa='$username_mahasiswa',
		password_mahasiswa='$password_mahasiswa',
		foto_mahasiswa='$alamatfile'
		
		where id_mahasiswa='$id_mahasiswa'
		");
			
		}
	echo "<script>alert('Data Telah Disimpan!!!')
	location.replace('?p=mahasiswa')</script>";

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