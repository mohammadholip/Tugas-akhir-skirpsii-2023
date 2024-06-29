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
if ($level==2){
  echo "
  <form method='POST' action='?p=skripsi&act=tambah'>
  <button type='submit' class='btn btn-success' name='Tambah' value='Tambah'> <i class='fa fa-plus'></i> Tambah Data</button>
  </form>
		<h3>Data Skripsi UIM Pamekasan</h3>
            <table id='data' class='table table-bordered table-striped'>
                <thead>
                    <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>File</th>
                    <th>Aksi</th>
                    </tr>
                </thead>";
    $tampil=mysql_query("SELECT * FROM skripsi order by tahun_lulus ASC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){ 
	echo "															
                    <tr>
                    <td>$no</td>
                    <td>$r[judul]</td>
                    <td><a href='index.php?p=skripsi&act=lihat&id=$r[id_skripsi]'>Lihat File</a></td>
                    <td>
				<a class='btn btn-xs btn-success' href=?p=skripsi&act=detil&id=$r[id_skripsi]><span class='glyphicon glyphicon-edit'></span>Detil</a> 
				<a class='btn btn-xs btn-warning' href=?p=skripsi&act=edit&id=$r[id_skripsi]><span class='glyphicon glyphicon-edit'></span>Edit</a> 
	            <a class='btn btn-xs btn-danger' href=?p=skripsi&act=hapus&id=$r[id_skripsi] onClick='return confirmSubmit()'>
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
  <form method='POST' action='?p=skripsi&act=tambah'>
  <button type='submit' class='btn btn-success' name='Tambah' value='Tambah'> <i class='fa fa-plus'></i> Tambah Data</button>
  </form>
		<h3>Data Skripsi UIM Pamekasan</h3>
            <table id='data' class='table table-bordered table-striped'>
                <thead>
                    <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>File</th>
                    <th>Aksi</th>
                    </tr>
                </thead>";
    $tampil=mysql_query("SELECT * FROM skripsi order by tahun_lulus ASC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){ 
	echo "															
                    <tr>
                    <td>$no</td>
                    <td>$r[judul]</td>
                    <td><a href='index.php?p=skripsi&act=lihat&id=$r[id_skripsi]'>Lihat File</a></td>
                    <td>
				<a class='btn btn-xs btn-success' href=?p=skripsi&act=detil&id=$r[id_skripsi]><span class='glyphicon glyphicon-edit'></span>Detil</a> 
				<a class='btn btn-xs btn-warning' href=?p=skripsi&act=edit&id=$r[id_skripsi]&id_penulis=$id_mahasiswa><span class='glyphicon glyphicon-edit'></span>Edit</a> 
	            <a class='btn btn-xs btn-danger' href=?p=skripsi&act=hapus&id=$r[id_skripsi]&id_penulis=$id_mahasiswa onClick='return confirmSubmit()'>
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
  if ($level==2){ $id_penulis=$id_dosen;}
  else if ($level==3){ $id_penulis=$id_mahasiswa;}
  
?>
<div class="input-states">
<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Judul</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="judul">
                    <input type="hidden" class="form-control" name="id_penulis" value="<?php echo $id_penulis;?>">
                    <input type="hidden" class="form-control" name="level" value="<?php echo $level;?>">
                </div>
        </div>
    </div>
    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Pembimbing 1</label>
                <div class="col-sm-6">
                    <select class="form-control custom-select" name="id_dosen1">
						<option value="">- Pilih Nama Pembimbing 1-</option>
					<?php 
						$tampil3=mysql_query("SELECT * FROM dosen order by nama_dosen ASC");
						while ($r3=mysql_fetch_array($tampil3)){ 					
					?>	
						<option value="<?php echo $r3['id_dosen'];?>"><?php echo $r3['nama_dosen'];?></option>
					<?php } ?>	
                    </select>
                </div>
        </div>
    </div>
    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Pembimbing 2</label>
                <div class="col-sm-6">
                    <select class="form-control custom-select" name="id_dosen2">
						<option value="">- Pilih Nama Pembimbing 2-</option>
					<?php 
						$tampil4=mysql_query("SELECT * FROM dosen order by nama_dosen ASC");
						while ($r4=mysql_fetch_array($tampil4)){ 					
					?>	
						<option value="<?php echo $r4['id_dosen'];?>"><?php echo $r4['nama_dosen'];?></option>
					<?php } ?>	
                    </select>
                </div>
        </div>
    </div>	
    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Kata Kunci 1</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="kata_kunci1">
                </div>
        </div>
    </div>
    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Kata Kunci 2</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="kata_kunci2">
                </div>
        </div>
    </div>
    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Kata Kunci 3</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="kata_kunci3">
                </div>
        </div>
    </div>
    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Kata Kunci 4</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="kata_kunci4">
                </div>
        </div>
    </div>
	
    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Tahun Lulus</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="tahun_lulus">
                </div>
        </div>
    </div>
    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">File</label>
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
$id_penulis = $_POST['id_penulis'];
$judul = $_POST['judul'];
$level = $_POST['level'];
$id_dosen1 = $_POST['id_dosen1'];
$id_dosen2 = $_POST['id_dosen2'];
$kata_kunci1 = $_POST['kata_kunci1'];
$kata_kunci2 = $_POST['kata_kunci2'];
$kata_kunci3 = $_POST['kata_kunci3'];
$kata_kunci4 = $_POST['kata_kunci4'];
$tahun_lulus = $_POST['tahun_lulus'];

	$nama_gambar=$_FILES['gambar']['name'];
	$file_type	= array('pdf');
	$explode	= explode('.',$nama_gambar);
	$extensi	= $explode[count($explode)-1];
  
		$uploaddir='skripsi/';
		$alamatfile=$uploaddir.$nama_gambar;
	
		if (move_uploaded_file($_FILES['gambar']['tmp_name'],$alamatfile))
		{ 

 mysql_query("INSERT INTO skripsi(
  id_penulis,
  level,
  judul,
  pembimbing1,
  pembimbing2,
  kata_kunci1,
  kata_kunci2,
  kata_kunci3,
  kata_kunci4,
  tahun_lulus,
  file_skripsi
  ) 
  VALUES(
  '$id_penulis',
  '$level',
  '$judul',
  '$id_dosen1',
  '$id_dosen2',
  '$kata_kunci1',
  '$kata_kunci2',
  '$kata_kunci3',
  '$kata_kunci4',
  '$tahun_lulus',
  '$alamatfile' 
  )");
		
		echo "<script>alert('Data Telah Disimpan');window.location.href='?p=skripsi';</script>";					
			}
}
?>
    </div>
<?php
    break;
  case "detil":	
  $edit=mysql_query("SELECT * FROM skripsi where id_skripsi='$_GET[id]'");
  $r=mysql_fetch_array($edit);
  $id_penulis=$r['id_penulis'];
  $pembimbing1=$r['pembimbing1'];
  $pembimbing2=$r['pembimbing2'];
  
  $edit7=mysql_query("SELECT * FROM dosen where id_dosen='$pembimbing1'");
  $r7=mysql_fetch_array($edit7);
$nama_pembimbing1=$r7['nama_dosen'];
  $edit8=mysql_query("SELECT * FROM dosen where id_dosen='$pembimbing2'");
  $r8=mysql_fetch_array($edit8);
$nama_pembimbing2=$r8['nama_dosen'];
  
$levelnya=$r['level'];
if ($levelnya==2){ 
  $edit6=mysql_query("SELECT * FROM dosen where id_dosen='$id_penulis'");
  $r6=mysql_fetch_array($edit6);
  $nama_penulis=$r6['nama_dosen']; 
}  

?>
<div class="input-states">
<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Penulis</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="id_penulis" value="<?php echo $nama_penulis;?>" readonly>
                </div>
        </div>
    </div>
    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Judul</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="judul" value="<?php echo $r['judul'];?>" readonly>
                </div>
        </div>
    </div>    
	<div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Pembimbing 1</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="pembimbing1" value="<?php echo $nama_pembimbing1;?>" readonly>
                </div>
        </div>
    </div>
	<div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Pembimbing 2</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="pembimbing2" value="<?php echo $nama_pembimbing2;?>" readonly>
                </div>
        </div>
    </div>
	<div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Kata Kunci 1</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="kata_kunci1" value="<?php echo $r['kata_kunci1'];?>" readonly>
                </div>
        </div>
    </div>	
	<div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Kata Kunci 2</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="kata_kunci2" value="<?php echo $r['kata_kunci2'];?>" readonly>
                </div>
        </div>
    </div>	
	<div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Kata Kunci 3</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="kata_kunci3" value="<?php echo $r['kata_kunci3'];?>" readonly>
                </div>
        </div>
    </div>	
	<div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Kata Kunci 4</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="kata_kunci4" value="<?php echo $r['kata_kunci4'];?>" readonly>
                </div>
        </div>
    </div>	
	<div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Tahun Lulus</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="tahun_lulus" value="<?php echo $r['tahun_lulus'];?>" readonly>
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
  $edit=mysql_query("SELECT * FROM skripsi where id_skripsi='$_GET[id]'");
  $r=mysql_fetch_array($edit);
  $id_penulis=$r['id_penulis'];
  $pembimbing1=$r['pembimbing1'];
  $pembimbing2=$r['pembimbing2'];
  $id_login=$_GET['id_penulis'];
  if ($id_login==$id_penulis){
  //echo "sama";
  } else {
		echo "<script>alert('Anda Tidak Dapat Mengubah Data Karena Anda Bukan Pemilik Skripsi ini!!!');window.location.href='?p=skripsi';</script>";					  
  }  
  
  $edit7=mysql_query("SELECT * FROM dosen where id_dosen='$pembimbing1'");
  $r7=mysql_fetch_array($edit7);
$nama_pembimbing1=$r7['nama_dosen'];
  $edit8=mysql_query("SELECT * FROM dosen where id_dosen='$pembimbing2'");
  $r8=mysql_fetch_array($edit8);
$nama_pembimbing2=$r8['nama_dosen'];
  
$levelnya=$r['level'];
if ($levelnya==2){ 
  $edit6=mysql_query("SELECT * FROM dosen where id_dosen='$id_penulis'");
  $r6=mysql_fetch_array($edit6);
  $nama_penulis=$r6['nama_dosen'];   
}  
  
?>

<div class="input-states">
<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Penulis</label>
                <div class="col-sm-6">
                    <select class="form-control custom-select" name="id_penulis">
						<option value="<?php echo $id_penulis;?>" selected><?php echo $nama_penulis;?></option>
						<option value="">- Pilih Nama Penulis-</option>
					<?php 
					if ($levelnya==2){
						$tampil8=mysql_query("SELECT * FROM dosen order by nama_dosen ASC");
					} else if ($levelnya==3){	
						$tampil8=mysql_query("SELECT * FROM mahasiswa order by nama_mahasiswa ASC");
					}	
						while ($r8=mysql_fetch_array($tampil8)){ 					
					?>	
						<option value="<?php echo $r8['id_dosen'];?>"><?php echo $r8['nama_dosen'];?></option>
					<?php } ?>	
                    </select>

                </div>
        </div>
    </div>
    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Judul</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="judul" value="<?php echo $r['judul'];?>">
                    <input type="hidden" class="form-control" name="id_skripsi" value="<?php echo $_GET['id'];?>">
                </div>
        </div>
    </div>    
	<div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Pembimbing 1</label>
                <div class="col-sm-6">
                    <select class="form-control custom-select" name="pembimbing1">
						<option value="<?php echo $pembimbing1;?>" selected><?php echo $nama_pembimbing1;?></option>
						<option value="">- Pilih Nama Pembiimbing 1-</option>
					<?php 
						$tampil2=mysql_query("SELECT * FROM dosen order by nama_dosen ASC");
						while ($r2=mysql_fetch_array($tampil2)){ 					
					?>	
						<option value="<?php echo $r2['id_dosen'];?>"><?php echo $r2['nama_dosen'];?></option>
					<?php } ?>	
                    </select>
			    </div>
        </div>
    </div>
	<div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Pembimbing 2</label>
                <div class="col-sm-6">
                    <select class="form-control custom-select" name="pembimbing2">
						<option value="<?php echo $pembimbing2;?>" selected><?php echo $nama_pembimbing2;?></option>
						<option value="">- Pilih Nama Pembimbing 2-</option>
					<?php 
						$tampil3=mysql_query("SELECT * FROM dosen order by nama_dosen ASC");
						while ($r3=mysql_fetch_array($tampil3)){ 					
					?>	
						<option value="<?php echo $r3['id_dosen'];?>"><?php echo $r3['nama_dosen'];?></option>
					<?php } ?>	
                    </select>
                </div>
        </div>
    </div>
	<div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Kata Kunci 1</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="kata_kunci1" value="<?php echo $r['kata_kunci1'];?>">
                </div>
        </div>
    </div>	
	<div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Kata Kunci 2</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="kata_kunci2" value="<?php echo $r['kata_kunci2'];?>">
                </div>
        </div>
    </div>	
	<div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Kata Kunci 3</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="kata_kunci3" value="<?php echo $r['kata_kunci3'];?>">
                </div>
        </div>
    </div>	
	<div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Kata Kunci 4</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="kata_kunci4" value="<?php echo $r['kata_kunci4'];?>">
                </div>
        </div>
    </div>	
	<div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Tahun Lulus</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="tahun_lulus" value="<?php echo $r['tahun_lulus'];?>">
                </div>
        </div>
    </div>	
    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">File</label>
                <div class="col-sm-6">                    
					<?php 
					$data=$r['file_skripsi'];
					$hasil=explode("/", $data);
					echo $hasil[1];
					?>
                </div>
        </div>
    </div>
    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Ganti File</label>
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
$id_skripsi = $_POST['id_skripsi'];
$id_penulis = $_POST['id_penulis'];
$judul = $_POST['judul'];
$pembimbing1 = $_POST['pembimbing1'];
$pembimbing2 = $_POST['pembimbing2'];
$kata_kunci1 = $_POST['kata_kunci1'];
$kata_kunci2 = $_POST['kata_kunci2'];
$kata_kunci3 = $_POST['kata_kunci3'];
$kata_kunci4 = $_POST['kata_kunci4'];
$tahun_lulus = $_POST['tahun_lulus'];

	$nama_gambar=$_FILES['gambar']['name'];
	$file_type	= array('pdf');
	$explode	= explode('.',$nama_gambar);
	$extensi	= $explode[count($explode)-1];

	if ($nama_gambar=="" ){
		$qupdate2 = mysql_query("UPDATE  skripsi set 
		id_penulis='$id_penulis',
		judul='$judul',
		pembimbing1='$pembimbing1',
		pembimbing2='$pembimbing2',
		kata_kunci1='$kata_kunci1',
		kata_kunci2='$kata_kunci2',
		kata_kunci3='$kata_kunci3',
		kata_kunci4='$kata_kunci4',
		tahun_lulus='$tahun_lulus'
		
		where id_skripsi='$id_skripsi'
		");
	}
		$uploaddir='skripsi/';
		$alamatfile=$uploaddir.$nama_gambar;

		if (move_uploaded_file($_FILES['gambar']['tmp_name'],$alamatfile) )
		{ 
		$qupdate2 = mysql_query("UPDATE  skripsi set 
		id_penulis='$id_penulis',
		judul='$judul',
		pembimbing1='$pembimbing1',
		pembimbing2='$pembimbing2',
		kata_kunci1='$kata_kunci1',
		kata_kunci2='$kata_kunci2',
		kata_kunci3='$kata_kunci3',
		kata_kunci4='$kata_kunci4',
		tahun_lulus='$tahun_lulus',
		file_skripsi='$alamatfile'
		
		where id_skripsi='$id_skripsi'
		");
			
		}
	echo "<script>alert('Data Telah Disimpan!!!')
	location.replace('?p=skripsi')</script>";

}
?>

<?php	
break;
  case "lihat":
  $edit=mysql_query("SELECT * FROM skripsi where id_skripsi='$_GET[id]'");
  $r=mysql_fetch_array($edit);

//  echo "lihat pdf";
  ?>
<embed type="application/pdf" src="<?php echo $r['file_skripsi'];?>" height="100%" width="100%"></embed>  
<?php   
  break;
  case "hapus":
  $id_login=$_GET['id_penulis'];
  if ($id_login==$id_penulis){
  //echo "sama";
  } else {
		echo "<script>alert('Anda Tidak Dapat Mengubah Data Karena Anda Bukan Pemilik Skripsi ini!!!');window.location.href='?p=skripsi';</script>";					  
  }  

  mysql_query("DELETE FROM skripsi WHERE id_skripsi='$_GET[id]'");
	echo "<script>alert('Data Telah Dihapus!!!')
	location.replace('?p=skripsi')</script>"; 
  break;
	}
	?>	