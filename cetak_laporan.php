<?php
session_start();
include "koneksi.php";
include "fungsi_indotgl.php";
include "fungsi_rupiah.php";

$tgl=date("Y-m-d");
$tanggal=tgl_indo($tgl);
$id_pengelola=$_GET['id_pengelola'];
  $e=mysql_query("SELECT * FROM bumd where id_pengelola='$id_pengelola'");
  $d=mysql_fetch_array($e);
  $namanya=$d['nama_bumd'];

  $e1=mysql_query("SELECT * FROM pengelola where id_pengelola='$id_pengelola'");
  $d1=mysql_fetch_array($e1);
  $nama_pengelola=$d1['nama_pengelola'];
 
?>
        <style>
            table,tr,td{
                border-collapse: collapse;
            }
        </style>

<?php 
echo "
		<h3>Data Laporan Keuangan BUMDes <b>$namanya</b>, Pengelola <b>$nama_pengelola</b></h3>
		
            <table width='100%' border='1'>
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
    $tampil=mysql_query("SELECT * FROM  laporan,bumd,pengelola where laporan.id_pengelola=pengelola.id_pengelola and pengelola.id_pengelola=bumd.id_pengelola and pengelola.id_pengelola='$id_pengelola' order by laporan.id_laporan DESC");
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
    echo "<br>"; 
    echo "<br>"; 
	echo "<div align=right> Pamekasan, $tanggal</div>";
    echo "<br>"; 
    echo "<br>"; 
    echo "<br>"; 
    echo "<br>"; 
	echo "<div align=right>$nama_pengelola</div>";
	
?>
	<script>
		window.print();
	</script>