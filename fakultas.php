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
  <form method='POST' action='?p=fakultas&act=tambah'>
  <button type='submit' class='btn btn-success' name='Tambah' value='Tambah'> <i class='fa fa-plus'></i> Tambah Data</button>
  </form>
		<h3>Data Fakultas</h3>
            <table id='data' class='table table-bordered table-striped'>
                <thead>
                    <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Aksi</th>
                    </tr>
                </thead>";
    $tampil=mysql_query("SELECT * FROM fakultas order by nama_fakultas ASC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){ 
	echo "															
                    <tr>
                    <td>$no</td>
                    <td>$r[nama_fakultas]</td>
                    <td>
				<a class='btn btn-xs btn-warning' href=?p=fakultas&act=edit&id=$r[id_fakultas]><span class='glyphicon glyphicon-edit'></span>Edit</a> 
	            <a class='btn btn-xs btn-danger' href=?p=fakultas&act=hapus&id=$r[id_fakultas] onClick='return confirmSubmit()'>
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
		<h3>Data Fakultas</h3>
            <table id='data' class='table table-bordered table-striped'>
                <thead>
                    <tr>
                    <th>No</th>
                    <th>Nama</th>
                    </tr>
                </thead>";
    $tampil=mysql_query("SELECT * FROM fakultas order by nama_fakultas ASC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){ 
	echo "															
                    <tr>
                    <td>$no</td>
                    <td>$r[nama_fakultas]</td>
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
            <label class="col-sm-3 control-label">Nama Fakultas</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nama_fakultas">
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
$nama_fakultas = $_POST['nama_fakultas'];


 mysql_query("INSERT INTO fakultas(
  nama_fakultas
  ) 
  VALUES(
  '$nama_fakultas'
  )");
		
		echo "<script>alert('Data Telah Disimpan');window.location.href='?p=fakultas';</script>";		
			
			

}

?>

    </div>
<?php
    break;
  case "edit":	
  $edit=mysql_query("SELECT * FROM fakultas where id_fakultas='$_GET[id]'");
  $r=mysql_fetch_array($edit);
?>

<div class="input-states">
<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Nama Fakultas</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nama_fakultas" value="<?php echo $r['nama_fakultas'];?>">
                    <input type="hidden" class="form-control" name="id_fakultas" value="<?php echo $r['id_fakultas'];?>">
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
$id_fakultas = $_POST['id_fakultas'];
$nama_fakultas = $_POST['nama_fakultas'];

		$qupdate2 = mysql_query("UPDATE  fakultas set 
		nama_fakultas='$nama_fakultas'
		where id_fakultas='$id_fakultas'
		");
	
	echo "<script>alert('Data Telah Disimpan!!!')
	location.replace('?p=fakultas')</script>";

}
?>

<?php	
break;
  case "hapus":
  mysql_query("DELETE FROM fakultas WHERE id_fakultas='$_GET[id]'");
	echo "<script>alert('Data Telah Dihapus!!!')
	location.replace('?p=fakultas')</script>"; 
  break;
	}
	?>	