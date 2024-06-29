<?php
session_start();
$level=$_SESSION['level'];
$nama_lengkap=$_SESSION['nama_lengkap'];
$foto=$_SESSION['foto'];
$username=$_SESSION['username'];
$password=$_SESSION['password'];
$id=$_SESSION['id_user'];
//$id_user=$_SESSION['id_user'];
include "koneksi.php";
?>

<?php
switch($_GET[act]){
   //Tampil Data Pelatih
  default:
if ($level==1){
  echo "
  <form method='POST' action='?p=jurusan&act=tambah'>
  <button type='submit' class='btn btn-success' name='Tambah' value='Tambah'> <i class='fa fa-plus'></i> Tambah Data</button>
  </form>
		<h3>Data Jurusan</h3>
            <table id='data' class='table table-bordered table-striped'>
                <thead>
                    <tr>
                    <th>No</th>
                    <th>Fakultas</th>
                    <th>Jurusan</th>
                    <th>Aksi</th>
                    </tr>
                </thead>";
    $tampil=mysql_query("SELECT * FROM fakultas,jurusan where fakultas.id_fakultas=jurusan.id_fakultas order by jurusan.nama_jurusan ASC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){ 
	echo "															
                    <tr>
                    <td>$no</td>
                    <td>$r[nama_fakultas]</td>
                    <td>$r[nama_jurusan]</td>
                    <td>
				<a class='btn btn-xs btn-warning' href=?p=jurusan&act=edit&id=$r[id_jurusan]><span class='glyphicon glyphicon-edit'></span>Edit</a> 
	            <a class='btn btn-xs btn-danger' href=?p=jurusan&act=hapus&id=$r[id_jurusan] onClick='return confirmSubmit()'>
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
		<h3>Data Jurusan</h3>
            <table id='data' class='table table-bordered table-striped'>
                <thead>
                    <tr>
                    <th>No</th>
                    <th>Fakultas</th>
                    <th>Jurusan</th>
                    
                    </tr>
                </thead>";
    $tampil=mysql_query("SELECT * FROM fakultas,jurusan where fakultas.id_fakultas=jurusan.id_fakultas order by jurusan.nama_jurusan ASC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){ 
	echo "															
                    <tr>
                    <td>$no</td>
                    <td>$r[nama_fakultas]</td>
                    <td>$r[nama_jurusan]</td>
                    
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
            <label class="col-sm-3 control-label">Jurusan</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nama_jurusan">
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
$id_fakultas = $_POST['id_fakultas'];
$nama_jurusan = $_POST['nama_jurusan'];


 mysql_query("INSERT INTO jurusan(
  id_fakultas,
  nama_jurusan
  ) 
  VALUES(
  '$id_fakultas',
  '$nama_jurusan'
  )");
		
		echo "<script>alert('Data Telah Disimpan');window.location.href='?p=jurusan';</script>";		
			
			

}

?>

    </div>
<?php
    break;
  case "edit":	
  $edit=mysql_query("SELECT * FROM jurusan,fakultas where fakultas.id_fakultas=jurusan.id_fakultas and jurusan.id_jurusan='$_GET[id]'");
  $r=mysql_fetch_array($edit);
?>

<div class="input-states">
<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">

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
            <label class="col-sm-3 control-label">Jurusan</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nama_jurusan" value="<?php echo $r['nama_jurusan'];?>">
                    <input type="hidden" class="form-control" name="id_jurusan" value="<?php echo $r['id_jurusan'];?>">
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
$id_jurusan = $_POST['id_jurusan'];
$nama_jurusan = $_POST['nama_jurusan'];
$id_fakultas = $_POST['id_fakultas'];

		$qupdate2 = mysql_query("UPDATE  jurusan set 
		id_fakultas='$id_fakultas',
		nama_jurusan='$nama_jurusan'
		where id_jurusan='$id_jurusan'
		");
	
	echo "<script>alert('Data Telah Disimpan!!!')
	location.replace('?p=jurusan')</script>";

}
?>

<?php	
break;
  case "hapus":
  mysql_query("DELETE FROM jurusan WHERE id_jurusan='$_GET[id]'");
	echo "<script>alert('Data Telah Dihapus!!!')
	location.replace('?p=jurusan')</script>"; 
  break;
	}
	?>	