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

if($userType == 1){ #kullanıcı tipi 1 ise yani normal kullanıcı işe işlemler sütununu gizliyoruz.
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
        <div class="col-md-12 col-sm-12  ">
			  
        <div class="x_panel">
          <div class="x_title">
            <h2>Koçluk Bilgileri <br> </small></h2>
            <div class="clearfix"></div>
<?php

if($_POST){
								
								if(!$kullaniciID || !$mahalleID || !$semtID || !$ilceID || !$ilID ){
									echo "Lütfen boş alan bırakmayınız.";
								}else{
									
										
										$adresEkle = mysqli_query($baglan, "
										INSERT INTO adres (kullaniciID, mahalleID, semtID, ilceID, ilID) 
										VALUES ('$kullaniciID','$mahalleID','$semtID','$ilceID','$ilID')");
										
										if($adresEkle){
											echo "Üyeliğiniz oluşturuldu";
											header('Location:anasayfa.php');
										}else{
											echo "Üyeliğiniz oluşturulamadı";
										}
									}
									
								}
								
							?>
                            
                            <div class="form-group">
                            <div class="form-group">
									<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">il</label>									
									<select class="col-form-label col-md-3 col-sm-3 label-align" for="last-name" name="il" id="il">
									
										<option>Seçiniz..</option>													
										<?php

										$ilAdi='ilAdi';
										$ilID='ilID';

										$ilQuery = mysqli_query($baglan, "select * from iller");
										if(mysqli_num_rows($ilQuery)!=0)	{

											while($readİl = mysqli_fetch_array($ilQuery))	{
												echo "<option value='$readİl[$ilID]'>$readİl[$ilAdi]</option>";
											}
										}

										?>
									</select>
								</div>
                <br>
                <br>
                <br>
                <br>
               


                <div class="form-group">
                                <div class="form-group">
									<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">ilce</label>									
									<select class="col-form-label col-md-3 col-sm-3 label-align" for="last-name" name="ilce" id="ilce">
									
										<option>Seçiniz..</option>													
										<?php

										$ilceAdi='ilceAdi';
										$ilceID='ilceID';

										$ilceQuery = mysqli_query($baglan, "select * from ilceler");
										if(mysqli_num_rows($ilceQuery)!=0)	{

											while($readİlce = mysqli_fetch_array($ilceQuery))	{
												echo "<option value='$readİlce[$ilceID]'>$readİlce[$ilceAdi]</option>";
											}
										}

										?>
									</select>
								</div>
                <br>
                <br>
                <br>
                <br>
                <div class="form-group">
                                <div class="form-group">
									<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">semt</label>									
									<select class="col-form-label col-md-3 col-sm-3 label-align" for="last-name" name="semt" id="semt">
									
										<option>Seçiniz..</option>													
										<?php

										$semtAdi='semtAdi';
										$semtID='semtID';

										$semtQuery = mysqli_query($baglan, "select * from semtler");
										if(mysqli_num_rows($semtQuery)!=0)	{

											while($readSemt = mysqli_fetch_array($semtQuery))	{
												echo "<option value='$readSemt[$semtID]'>$readSemt[$semtAdi]</option>";
											}
										}

										?>
									</select>
								</div>
                <br>
                <br>
                <br>
                <br>
                <div class="form-group">
                            <div class="form-group">
									<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">mahalle</label>									
									<select class="col-form-label col-md-3 col-sm-3 label-align" for="last-name" name="mahalle" id="mahalle">
									
										<option>Seçiniz..</option>													
										<?php

										$mahalleAdi='mahalleAdi';
										$mahalleID='mahalleID';

										$mahalleQuery = mysqli_query($baglan, "select * from mahalleler");
										if(mysqli_num_rows($mahalleQuery)!=0)	{

											while($readMahalle = mysqli_fetch_array($mahalleQuery))	{
												echo "<option value='$readMahalle[$mahalleID]'>$readMahalle[$mahalleAdi]</option>";
											}
										}

										?>
									</select>
								</div>
                <br>
                <br>
                <br>
                <br><br>
                <div class="form-group m-0">
									<button type="submit" class="btn btn-primary btn-block">
                  <a href="adminIndex.php">Adres Ekle
									</button>
								</div>
                                
                                
                                
                               
                                    </div>
                                    </div>
                                    </div>
                                <!-- /top tiles -->

         
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

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
                                    </body>
                                    </html>