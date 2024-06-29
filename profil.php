<?php
session_start();	
error_reporting(0);
$username=$_SESSION['username'];
$password=$_SESSION['password'];
$level=$_SESSION['level'];
$id_user=$_SESSION['id_user'];
$nama_lengkap=$_SESSION['nama_lengkap'];
$foto=$_SESSION['foto'];

//echo $level;

?>
<?php 
if ($level==1){
?>
<?php
$id=$_GET['id'];
//echo $id;
$tp1=mysql_query("SELECT * FROM  profil ");
$r1=mysql_fetch_array($tp1);
?>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>

<link rel="stylesheet" href="style.css" />
<?php include "koneksi.php";  ?>

        <form enctype="multipart/form-data" action="" method="post" enctype="multipart/form-data">
        <table width="100%" border="0" align="center" cellpadding="1" cellspacing="1"> 
		<tr><td colspan="3"><div align="center"><h3>Edit Profil</h3></div></td></tr>   
		<tr class="warning">
	    <td><textarea rows="10" name="profil" class="ckeditor" id="ckeditor" cols="80"><?php echo $r1['profil'];?></textarea> </td>
        </tr>
		<tr class="warning">
					 <td colspan="2">
					 <input class='btn btn-success' type="submit" name="submit" value="Simpan">          
		   <a onclick=self.history.back() ><button type='button' class='btn btn-danger'>Cancel</button></a>
					</td>

					</tr> 
        </table>
        </form>    

<?php
include "koneksi.php";
if (isset($_POST['submit']))
{
	$profil= $_POST['profil'];
    mysql_query("UPDATE profil set profil='$profil'");
								
  	echo "
	<script>
	alert('Data Telah Disimpan');
	window.location.href='index.php?p=profil';
	</script>
	";		
  }
else
{
	unset($_POST['submit']);
}
?>

<?php
}
else {
?>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<?php
include "koneksi.php"; 
		$query=mysql_query("select * from profil");
		$bb=mysql_fetch_array($query);
echo $bb['profil'];
		?>
<?php
}
?>