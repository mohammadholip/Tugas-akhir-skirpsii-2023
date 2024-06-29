<?php
session_start();	
error_reporting(0);
$level=$_SESSION['level'];
$nama_lengkap=$_SESSION['nama_lengkap'];
$nama_dosen=$_SESSION['nama_dosen'];
$id_dosen=$_SESSION['id_dosen'];
$foto=$_SESSION['foto'];
$id=$_SESSION['id_user'];

$id_mahasiswa=$_SESSION['id_mahasiswa'];
$nama_mahasiswa=$_SESSION['nama_mahasiswa'];
$foto_mahasiswa=$_SESSION['foto_mahasiswa'];
$id_fakultas_mahasiswa=$_SESSION['id_fakultas_mahasiswa'];
$id_jurusan_mahasiswa=$_SESSION['id_jurusan_mahasiswa'];


include "fungsi_indotgl.php";
include "fungsi_rupiah.php";
if ($level==1) { $nama_user=$nama_lengkap;
$ft=$foto;
}
else if ($level==2) { $nama_user=$nama_pengelola;
$ft=$foto;
}

else { $nama_user="Pengunjung";
$ft="foto_user/user.jpg";

}
include "koneksi.php";
$jumlah_fakultas = mysql_num_rows(mysql_query("SELECT * FROM fakultas"));
$jumlah_user = mysql_num_rows(mysql_query("SELECT * FROM admins"));
$jumlah_jurusan = mysql_num_rows(mysql_query("SELECT * FROM jurusan"));
$jumlah_dosen = mysql_num_rows(mysql_query("SELECT * FROM dosen "));
$jumlah_skripsi = mysql_num_rows(mysql_query("SELECT * FROM skripsi"));
$jumlah_mahasiswa = mysql_num_rows(mysql_query("SELECT * FROM mahasiswa"));

?>
<style>
.isi{
	padding: 8px 15px;
	border-radius: 10px;
	border:solid;
	color:#232323;
	font-size:10pt;
}
.tombol{
	padding: 8px 15px;
	border-radius: 8px;
	background:#787878;
	border:solid;
	color:#232323;
	font-size:8pt;
}
.tombol33{
	padding: 8px 15px;
	border-radius: 8px;
	background:#787878;
	border:solid;
	color:#232323;
	font-size:8pt;
	position:fixed;
	margin-top:0px;
	margin-left:20px;

}

</style>
<script type="application/javascript">
  function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if ((charCode == 39) || (charCode == 34))
            return false;         
         return true;
      }
</script>
<script type="application/javascript">
  function isNumberKeyTrue(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 65)
            return false;         
         return true;
      }
</script>
  <script type="text/javascript" charset="utf-8">
            $(document).ready(function(){              
            });
            function confirmSubmit(){
				var msg;
				msg = "Yakin akan menghapus data?";
				var agree = confirm(msg);
				if(agree)
					return true;
				else
					return false;
			}
        </script>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Skripsi UIM</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="css/morris/morris.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- fullCalendar -->
        <link href="css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-black">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="index.php" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                SiAsI UIM
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="index.php" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                        
                        <!-- Notifications: style can be found in dropdown.less -->
                        
                        <!-- Tasks: style can be found in dropdown.less -->
                        
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?php echo $nama_user;?> <i class="caret"></i></span>
                            </a>
                            
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
    	
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="img/avatar3.png" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>Hello, <?php echo $nama_user;?></p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="active">
                            <a href="index.php">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
<?php if($level=="1"){?>

                        <li>
                            <a href="index.php?p=user">
                                <i class="fa fa-th"></i> <span>Data User</span>
                                <small class="badge pull-right bg-yellow"><?php echo $jumlah_user;?></small>

                            </a>
                        </li>
                        <li>
                            <a href="index.php?p=fakultas">
                                <i class="fa fa-edit"></i> <span>Data Fakultas</span>
                                <small class="badge pull-right bg-purple"><?php echo $jumlah_fakultas;?></small>

                            </a>
                        </li>

                        <li class="treeview">
                            <a href="index.php?p=jurusan">
                                <i class="fa fa-bar-chart-o"></i>
                                <span>Data Jurusan</span>
                                <small class="badge pull-right bg-green"><?php echo $jumlah_jurusan;?></small>								
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="index.php?p=dosen">
                                <i class="fa fa-folder"></i><span>Data Dosen</span>
                                <small class="badge pull-right bg-red"><?php echo $jumlah_dosen;?></small>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="index.php?p=mahasiswa">
                                <i class="fa fa-folder"></i><span>Data Mahasiswa</span>
                                <small class="badge pull-right bg-red"><?php echo $jumlah_mahasiswa;?></small>
                            </a>
                        </li>
                        <li>
                            <a href="index.php?p=logout">
                                <i class="fa fa-laptop"></i><span>Logout</span>
                                <small class="badge pull-right bg-yellow"><?php echo $jumlah_user;?></small>

                            </a>
                        </li>

			
									
<?php } else if ($level=="2"){ ?>
                        <li>
                            <a href="index.php?p=user">
                                <i class="fa fa-th"></i> <span>Data User</span>
                                <small class="badge pull-right bg-yellow"><?php echo $jumlah_user;?></small>

                            </a>
                        </li>

                        <li class="treeview">
                            <a href="index.php?p=skripsi">
                                <i class="fa fa-bar-chart-o"></i>
                                <span>Data Skripsi</span>
                                <small class="badge pull-right bg-green"><?php echo $jumlah_skripsi;?></small>								
                            </a>
                        </li>
                        <li>
                            <a href="index.php?p=logout">
                                <i class="fa fa-laptop"></i><span>Logout</span>
                                <small class="badge pull-right bg-yellow"><?php echo $jumlah_user;?></small>

                            </a>
                        </li>

<?php } else if ($level=="3"){ ?>
                        <li>
                            <a href="index.php?p=user">
                                <i class="fa fa-th"></i> <span>Data User</span>
                                <small class="badge pull-right bg-yellow"><?php echo $jumlah_user;?></small>

                            </a>
                        </li>

                        <li class="treeview">
                            <a href="index.php?p=skripsi">
                                <i class="fa fa-bar-chart-o"></i>
                                <span>Data Skripsi</span>
                                <small class="badge pull-right bg-green"><?php echo $jumlah_skripsi;?></small>								
                            </a>
                        </li>
                        <li>
                            <a href="index.php?p=logout">
                                <i class="fa fa-laptop"></i><span>Logout</span>
                                <small class="badge pull-right bg-yellow"><?php echo $jumlah_user;?></small>

                            </a>
                        </li>
						
<?php } else {?>
					   <li>
                            <a href="index.php?p=mahasiswa&act=tambah">
                                <i class="fa fa-calendar"></i> <span>Daftar </span>
                                <small class="badge pull-right bg-orange"><?php echo $jumlah_mahasiswa;?></small>
								
                             </a>
                        </li>

			<li>
                            <a href="index.php?p=login">
                                <i class="fa fa-laptop"></i> <span>Login</span>
                                <small class="badge pull-right bg-yellow"><?php echo $jumlah_user;?></small>

                            </a>
                        </li>

			
			
			<?php } ?>	
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Dashboard
                        <small>Control panel</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                    <!-- Small boxes (Stat box) -->
                    <div class="row">
	
                        <div class="col-lg-4 col-xs-4">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3>
                                        <?php echo $jumlah_skripsi;?>
                                    </h3>
                                    <p>
                                        Skripsi
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-4 col-xs-4">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3>
                                        <?php echo $jumlah_user;?>
                                        
                                    </h3>
                                    <p>
                                        Operator
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="index.php?p=user" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-4 col-xs-4">
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3>
                                        <?php echo $jumlah_mahasiswa;?>
                                    </h3>
                                    <p>
                                        Pengelola
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                    </div><!-- /.row -->

                    <!-- top row -->
                    <div class="row">
                        <div class="col-xs-12 connectedSortable">
                            
                        </div><!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- Main row -->
                    <div class="row">
                        <!-- Left col -->
						               <section class="content">
 
                            <!-- Box (with bar chart) -->
						<?php include "p.php";?>
                                
                                                  
                            <!-- Custom tabs (Charts with tabs)-->
                            
                                                
                            <!-- Calendar -->
                            

                            <!-- quick email widget -->
                            
                        </section><!-- /.Left col -->
                        <!-- right col (We are only adding the ID to make the widgets sortable)-->
                        
                    </div><!-- /.row (main row) -->

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- jQuery UI 1.10.3 -->
        <script src="js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <!-- Morris.js charts -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="js/plugins/morris/morris.min.js" type="text/javascript"></script>
        <!-- Sparkline -->
        <script src="js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
        <!-- jvectormap -->
        <script src="js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
        <script src="js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
        <!-- fullCalendar -->
        <script src="js/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
        <!-- jQuery Knob Chart -->
        <script src="js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

        <!-- AdminLTE App -->
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>
        
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="js/AdminLTE/dashboard.js" type="text/javascript"></script>        
        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="../../js/bootstrap.min.js" type="text/javascript"></script>
        <!-- DATA TABES SCRIPT -->
        <script src="js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>

        <!-- page script -->
        <script type="text/javascript">
            $(function() {
                $("#example1").dataTable();
                $('#example2').dataTable({
                    "bPaginate": true,
                    "bLengthChange": false,
                    "bFilter": false,
                    "bSort": true,
                    "bInfo": true,
                    "bAutoWidth": false
                });
            });
        </script>
<script src="assets/js/bootstrap.js"></script>
<script type="application/javascript" src="assets/js/jquery-1.11.1.js"></script>
<script type="application/javascript" src="datatables/jquery.dataTables.js"></script>

<script type="application/javascript">
	$(document).ready(function(){
		$('#data').DataTable();
	});	
</script>

    </body>
</html>