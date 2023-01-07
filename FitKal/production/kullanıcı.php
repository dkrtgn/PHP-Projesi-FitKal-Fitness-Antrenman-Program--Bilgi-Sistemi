<?php
session_start();
ob_start();
require "settings.php"; // require, include gibi belirtilen dosyayı kodun yazıldığı dosya içerisine eklemek için kullanılır. Ama include gibi uyarı vermek yerine hata verir ve kodun çalışmasını durdurur. require fonksiyonunun da kullanımı include fonksiyonu ile aynıdır.
require "sidebar.php";
require "navbar.php";
require "footer.php";
include_once 'connection.php'; // Bu fonksiyon include fonksiyonu ile aynı şekilde çalışarak dışarıdan dosya dahil etme olanağı sağlar. Tek farkı bir dosya içerisinde aynı dosyanın birden fazla çağrılmasını engeller.

$userID = $_SESSION["kullaniciID"];
$userType = $_SESSION["kullaniciTipi"];

if(!isset($_SESSION["kullaniciID"])) {
	header('Location: login.php');
}

if($userType != 1 and $userType != 2){
    header('Location: login.php');
}

if($userType == 2){ #kullanıcı tipi 1 ise yani normal kullanıcı işe işlemler sütununu gizliyoruz.
	$tableStyle = "display:none;";	
}else{
	$tableStyle = "text-align:center;"; #admin kullanıcısındaki yazıları ortalamak için kullandık
}

ob_end_flush();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="<?php echo $favicon; ?>" type="image/ico" />

    <title><?php echo $siteBasligi; ?></title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">	
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <?php
			
	ustSidebar();

	echo $userID;
			
	?>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->

            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
			<?php
			
			if($userType == 1){
				sidebar();	
			}else{
				adminSidebar();
			}
			?>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->

            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
		
		<?php
		
		navbar();
		
		?>
		
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">

          <div class="row">
			
			<div class="col-md-12 col-sm-12  ">
			  
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Kullanıcı Bilgileri <br><small>Veriler anlık olarak güncellenmektedir. </small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
		
                    <table class="table table-striped jambo_table bulk_action" id="dinamik">
					  <thead>
						<tr>
						  <th>ID</th>
						  <th>Tipi</th>
						  <th>AD </th>
						  <th>Soyad</th>
						  <th>Doğum Tarihi</th>
                          <th>Boy</th>
                          <th>Kilo</th>
                          <th>Cinsiyet</th>
						  
						  <th style="<?php echo $tableStyle; ?>">İşlemler</th>
						</tr>
					  </thead>
            
					  				  
					  <tbody>
					  
					  <?php
					  
					  $kullaniciQuery = mysqli_query($baglan,"
						SELECT kullaniciID, kullaniciTipi, kullaniciAdi, kullaniciSoyadi, dogumTarihi, boyi, kilo, cinsiyet
						FROM kullanicilar, cinsiyet, kullanicitipi
                        WHERE kullanicilar.cinsiyet = cinsiyet.cinsiyetID
                        AND kullanicilar.kullaniciTipi = kullanicitipi.tipID
                        ORDER BY kullaniciID
						
					  ");
					  
					  if(mysqli_num_rows($kullaniciQuery) != 0){
						  
						  while($readKullanici = mysqli_fetch_array($kullaniciQuery)){
							  
							  $kullaniciID = $readKullanici['kullaniciID'];
							  $kullaniciTipi = $readKullanici['kullaniciTipi'];
							  $kullaniciAdi = $readKullanici['kullaniciAdi'];
							  $kullaniciSoyadi = $readKullanici['kullaniciSoyadi'];
							  $dogumTarihi = $readKullanici['dogumTarihi'];
                              $boy = $readKullanici['boy'];
                              $kilo = $readKullanici['kilo'];
                              $cinsiyet = $readKullanici['cinsiyet'];
							  
							  							  					  
					  ?>
					  
						<tr>
						  <td><?php echo $kullaniciID; ?></td>
						  <td><?php echo $kullaniciTipi; ?></td>
						  <td><?php echo $kullaniciAdi; ?></td>
						  <td><?php echo $kullaniciSoyadi; ?></td>
						  <td><?php echo $dogumTarihi; ?></td>
                          <td><?php echo $boy; ?></td>
                          <td><?php echo $kilo; ?></td>
                          <td><?php echo $cinsiyet; ?></td>
						  
						  
						  <!-- işlemsel ayarlarımızı bu kısımda gerçekleştiriyoruz -->
						  <td style="<?php echo $tableStyle; ?>">
							<a href='guncelle.php?kullaniciID=<?php echo $kullaniciID; ?>&user_id=<?php echo $userID; ?>' style='width:100px; font-size:12px;' class='btn btn-primary btn-xs'><i class='fa fa-search'></i> Düzenle </a>
							<a href='sil.php?kullaniciID=<?php echo $kullaniciID; ?>&user_id=<?php echo $userID; ?>' style='width:100px; font-size:12px;' class='btn btn-danger btn-xs'><i class='fa fa-pencil'></i> Sil </a>
						  </td>
						  
						  <!-- get ile bolgeID adında bir değer gönderiyoruz. hangi sayfaya göndereceğimizi belirtmemiz lazım
							bu örnekte Guncelle.php ve Sil.php sayfalarına gönderdik.
							Çünkü hangi id'ye program değerinin silinmesi güncellemesinin bilinebilmesi için
							buna ihtiyaç var.
						  -->

						</tr>
					<?php

						}
						  
					  }
					?>					
									
					  </tbody>
					</table>
                  </div>
                </div>
              </div>

          </div>
		  
		  <br />

        </div>
        <!-- /page content -->

        <!-- footer content -->
		
		<?php
		
		footer();
		
		?>
		
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>

    <!-- gauge.js -->
    <script src="../vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="../vendors/Flot/jquery.flot.js"></script>
    <script src="../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>


	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>



    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
	
	<script>

	$(document).ready( function () {
    $('#dinamik').DataTable();
} );

  </script>
	
  </body>
</html>