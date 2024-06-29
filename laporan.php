<?php
session_start();
$level=$_SESSION['level'];
$nama_lengkap=$_SESSION['nama_lengkap'];
$foto=$_SESSION['foto'];
$username=$_SESSION['username'];
$password=$_SESSION['password'];
$id=$_SESSION['id_user'];
$id_pengelola=$_SESSION['id_pengelola'];
$nama_pengelola=$_SESSION['nama_pengelola'];
//$id_user=$_SESSION['id_user'];
include "koneksi.php";
?>

<?php
switch($_GET[act]){
   //Tampil Data Pelatih
  default:
if ($level==2){
  $e=mysql_query("SELECT * FROM bumd where id_pengelola='$id_pengelola'");
  $d=mysql_fetch_array($e);
  $namanya=$d['nama_bumd'];

  echo "
   <form method='POST' action='?p=laporan&act=tambah'>
  <button type='submit' class='btn btn-success' name='Tambah' value='Tambah'> <i class='fa fa-plus'></i> Tambah Data</button>
  </form>
 
		<h3>Data Laporan Keuangan BUMDes <b>$namanya</b>, Pengelola <b>$nama_pengelola</b></h3>
  <form method='POST' action='cetak_laporan.php?id_pengelola=$id_pengelola'>
  <button type='submit' class='btn btn-danger' name='Cetak' value='Cetak'> <i class='fa fa-check'></i> Cetak Data</button>
  </form>
		
            <table id='data' class='table table-bordered table-striped'>
                <thead>
                    <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Uraian</th>
                    <th>Debit</th>
                    <th>Kredit</th>
                    <th>Saldo</th>
                    </tr>
                </thead>";
    $tampil=mysql_query("SELECT * FROM  laporan,bumd,pengelola where laporan.id_pengelola=pengelola.id_pengelola and pengelola.id_pengelola=bumd.id_pengelola and pengelola.id_pengelola='$id_pengelola' order by laporan.id_laporan DESC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){ 
	$tanggal=tgl_indo($r['tanggal_laporan']);
    $debit=format_rupiah($r['debit']);
    $kredit=format_rupiah($r['kredit']);
    $jumlah=format_rupiah($r['jumlah']);

	
	echo "															
                    <tr>
                    <td>$no</td>
                    <td>$tanggal</td>
                    <td>$r[uraian]</td>
                    <td>Rp. $debit</td>
                    <td>Rp. $kredit</td>
                    <td>Rp. $jumlah</td>
                    </tr>
                ";
				$no++;
										}
	echo "</table>";
}
else if ($level==1){
?>
<div class="input-states">
<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Tanggal 1</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="tanggal1">
                </div>
        </div>
    </div>
    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Tanggal 2</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="tanggal2">
                </div>
        </div>
    </div>
    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Nama BUMDes</label>
                <div class="col-sm-6">
				<select class="form-control custom-select" name="id_bumd">
					<option value="">- Pilih Nama BUMDes-</option>
					<?php 
					$tampils=mysql_query("SELECT * FROM bumd order by nama_bumd");
					while ($s=mysql_fetch_array($tampils)){ 
					?>
						<option value="<?php echo $s['id_bumd'];?>"><?php echo $s['nama_bumd'];?></option>
					<?php } ?>	
                    </select>
                </div>
        </div>
    </div>			
    <div class="form-actions">
        <button type="submit" class="btn btn-success" name="Cari" value="Cari"> <i class="fa fa-check"></i> Cari</button>
        <a onclick=self.history.back() ><button type='button' class='btn btn-warning'>Cancel</button></a>
    </div>
</form>
<?php
if (isset($_POST['Cari']))
{
$id_bumd=$_POST['id_bumd'];
$tanggal1=$_POST['tanggal1'];
$tanggal2=$_POST['tanggal2'];
$tgl1=tgl_indo($tanggal1);
$tgl2=tgl_indo($tanggal2);

  $e=mysql_query("SELECT * FROM bumd where id_bumd='$id_bumd'");
  $d=mysql_fetch_array($e);
  $namanya=$d['nama_bumd'];
  $id_pengelola=$d['id_pengelola'];

echo "

		<h3>Data Laporan Keuangan <b>$namanya</b> dari $tgl1 sampai $tgl2</h3>
  <form method='POST' action='cetak_laporan_bidang.php?id_pengelola=$id_pengelola&tgl1=$tanggal1&tgl2=$tanggal2'>
  <button type='submit' class='btn btn-danger' name='Cetak' value='Cetak'> <i class='fa fa-plus'></i> Cetak Data</button>
  </form>
		
            <table id='data' class='table table-bordered table-striped'>
                <thead>
                    <tr>
                    <td align=center>No</td>
                    <td align=center>Tanggal</td>
                    <td align=center>Uraian</td>
                    <td align=center>Debit</td>
                    <td align=center>Kredit</td>
                    <td align=center>Saldo</td>
                    </tr>
                </thead>";
    $tampil=mysql_query("SELECT * FROM  laporan,pengelola where laporan.id_pengelola=pengelola.id_pengelola and pengelola.id_pengelola='$id_pengelola' and tanggal_laporan BETWEEN '$tanggal1' and '$tanggal2' order by laporan.tanggal_laporan DESC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
	$tanggal=tgl_indo($r['tanggal_laporan']);
    $debit=format_rupiah($r['debit']);
    $kredit=format_rupiah($r['kredit']);
    $jumlah=format_rupiah($r['jumlah']);

	
	echo "															
                    <tr>
                    <td align=center>$no</td>
                    <td>$tanggal</td>
                    <td>$r[uraian]</td>
                    <td>Rp. $debit</td>
                    <td>Rp. $kredit</td>
                    <td>Rp. $jumlah</td>
                    </tr>
                ";
				$no++;
										}
	echo "</table>";									

}
else {
echo "

		<h3>Data Laporan Keuangan</h3>
  <form method='POST' action='cetak_laporan_semua.php'>
  <button type='submit' class='btn btn-danger' name='Cetak' value='Cetak'> <i class='fa fa-plus'></i> Cetak Data</button>
  </form>
		
            <table id='data' class='table table-bordered table-striped'>
                <thead>
                    <tr>
                    <td align=center>No</td>
                    <td align=center>BUMDes</td>
                    <td align=center>Pengelola</td>
                    <td align=center>Tanggal</td>
                    <td align=center>Uraian</td>
                    <td align=center>Debit</td>
                    <td align=center>Kredit</td>
                    <td align=center>Saldo</td>
                    </tr>
                </thead>";
    $tampil=mysql_query("SELECT * FROM  laporan,pengelola,bumd where pengelola.id_pengelola=bumd.id_pengelola and laporan.id_pengelola=pengelola.id_pengelola order by laporan.tanggal_laporan DESC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
	$tanggal=tgl_indo($r['tanggal_laporan']);
    $debit=format_rupiah($r['debit']);
    $kredit=format_rupiah($r['kredit']);
    $jumlah=format_rupiah($r['jumlah']);

	
	echo "															
                    <tr>
                    <td align=center>$no</td>
					<td>$r[nama_bumd]</td>
					<td>$r[nama_pengelola]</td>
                    <td>$tanggal</td>
                    <td>$r[uraian]</td>
                    <td>Rp. $debit</td>
                    <td>Rp. $kredit</td>
                    <td>Rp. $jumlah</td>
                    </tr>
                ";
				$no++;
										}
	echo "</table>";									




}
}



else {
  echo "

		<h3>Data Laporan Keuangan BUMDes <b>$namanya</b>, Pengelola <b>$nama_pengelola</b></h3>
            <table id='data' class='table table-bordered table-striped'>
                <thead>
                    <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Uraian</th>
                    <th>Debit</th>
                    <th>Kredit</th>
                    <th>Saldo</th>
                    </tr>
                </thead>";
    $tampil=mysql_query("SELECT * FROM  laporan,bumd,pengelola where laporan.id_pengelola=pengelola.id_pengelola and pengelola.id_pengelola=bumd.id_pengelola order by laporan.id_laporan DESC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){ 
	$tanggal=tgl_indo($r['tanggal_laporan']);
    $debit=format_rupiah($r['debit']);
    $kredit=format_rupiah($r['kredit']);
    $jumlah=format_rupiah($r['jumlah']);

	
	echo "															
                    <tr>
                    <td>$no</td>
                    <td>$tanggal</td>
                    <td>$r[uraian]</td>
                    <td>Rp. $debit</td>
                    <td>Rp. $kredit</td>
                    <td>Rp. $jumlah</td>
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
            <label class="col-sm-3 control-label">Uraian</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="uraian">
                    <input type="hidden" class="form-control" name="id_pengelola" value="<?php echo $id_pengelola;?>">
                </div>
        </div>
    </div>
    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Jenis Transaksi</label>
                <div class="col-sm-6">
                    <select class="form-control custom-select" name="jenis">
						<option value="">- Pilih Jenis Transaksi-</option>
						<option value="Debit">Debit</option>
						<option value="Kredit">Kredit</option>
                    </select>
                </div>
        </div>
    </div>	
    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Jumlah</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="jumlah">
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
$id_pengelola = $_POST['id_pengelola'];
$uraian = $_POST['uraian'];
$jenis = $_POST['jenis'];
$jumlah= $_POST['jumlah'];
$tanggal_laporan= date("Y-m-d");

	$tam2=mysql_query("SELECT * FROM laporan where id_pengelola='$id_pengelola' order by id_laporan DESC LIMIT 1");
    $s2=mysql_fetch_array($tam2);
	$sal=$s2['jumlah'];
	
if ($jenis=="Debit"){$debit=$jumlah;$kredit=0;$saldo=$sal+$debit;}
else{$kredit=$jumlah;$debit=0;$saldo=$sal-$kredit;}

echo $sal;
 mysql_query("INSERT INTO laporan(
  id_pengelola,
  tanggal_laporan,
  uraian,
  jenis,
  debit,
  kredit,
  jumlah
  ) 
  VALUES(
  '$id_pengelola',
  '$tanggal_laporan',
  '$uraian',
  '$jenis',
  '$debit',
  '$kredit',
   '$saldo'
  )");
		echo "<script>alert('Data Telah Disimpan');window.location.href='?p=laporan';</script>";		

}
?>

    </div>
<?php
  break;
  case "edit":	
  $edit=mysql_query("SELECT * FROM laporan where id_laporan='$_GET[id]'");
  $r=mysql_fetch_array($edit);

 
?>

<div class="input-states">
<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Uraian</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="uraian" value="<?php echo $r['uraian'];?>">
                    <input type="hidden" class="form-control" name="id_laporan" value="<?php echo $_GET['id'];?>">
                </div>
        </div>
    </div>	
    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Jenis Transaksi</label>
                <div class="col-sm-6">
                    <select class="form-control custom-select" name="jenis">
						<option value="<?php echo $r['jenis'];?>" selected><?php echo $r['jenis'];?></option>
						<option value="">- Pilih Jenis Transaksi-</option>
						<option value="Debit">Debit</option>
						<option value="Kredit">Kredit</option>
                    </select>
                </div>
        </div>
    </div>	
    <div class="form-group has-success">
        <div class="row">
            <label class="col-sm-3 control-label">Jumlah</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="jumlah" value="<?php echo $r['jumlah'];?>">
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
$id_laporan = $_POST['id_laporan'];
$uraian = $_POST['uraian'];
$jenis = $_POST['jenis'];
$jumlah = $_POST['jumlah'];


	if ($jenis=="Debit"){
		$qupdate2 = mysql_query("UPDATE  laporan set 
		uraian='$uraian',
		jenis='$jenis',
		jumlah='$jumlah',
		debit='$jumlah',
		kredit='0'
		where id_laporan='$id_laporan'
		");
	echo "<script>alert('Data Telah Disimpan!!!')
	location.replace('?p=laporan')</script>";
}
else{
		$qupdate2 = mysql_query("UPDATE  laporan set 
		uraian='$uraian',
		jenis='$jenis',
		jumlah='$jumlah',
		debit='0',
		kredit='$jumlah'
		where id_laporan='$id_laporan'
		");
	echo "<script>alert('Data Telah Disimpan!!!')
	location.replace('?p=laporan')</script>";
}
}
?>

<?php	
break;
  case "hapus":
  mysql_query("DELETE FROM laporan WHERE id_laporan='$_GET[id]'");
	echo "<script>alert('Data Telah Dihapus!!!')
	location.replace('?p=laporan')</script>"; 
  break;
	}
	?>	