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
        <link rel="stylesheet" type="text/css" href="css/quiz.css">
        <div class="right_col" role="main">
        



        <div class="quiz-container" id="quiz">  
        <div class="quiz-header">  
            <h2 id="question">Soru yükleniyor...</h2>  
            <ul>  
                <li>  
                    <input type="radio" name="answer" id="a" class="answer" />  
                    <label for="a" id="a_text">Cevap...</label>  
                </li>  
                <li>  
                    <input type="radio" name="answer" id="b" class="answer" />  
                    <label for="b" id="b_text">Cevap...</label>  
                </li>  
                <li>  
                    <input type="radio" name="answer" id="c" class="answer" />  
                    <label for="c" id="c_text">Cevap...</label>  
                </li>  
                <li>  
                    <input type="radio" name="answer" id="d" class="answer" />  
                    <label for="d" id="d_text">Cevap...</label>  
                </li>  
            </ul>  
        </div>  
        <button id="submit">Gönder</button>  
    </div> 
    
    <table id="tablepress-21" class="tablepress tablepress-id-21">
<thead>
<tr class="row-1 odd">
	<th class="column-1">Ektomorf </th><th class="column-2">Mezomorf </th><th class="column-3">Endomorf</th>
</tr>
</thead>
<tbody class="row-hover">
<tr class="row-2 even">
	<td class="column-1">Zayıf, tığ gibi bir yapı</td><td class="column-2">Yağsız bir yapı</td><td class="column-3">Dolgun bir yapı</td>
</tr>
<tr class="row-3 odd">
	<td class="column-1">Hafif kaslı atletik vücut</td><td class="column-2">Kaslı vücut</td><td class="column-3">Kaslı ancak yağlı bir vücut</td>
</tr>
<tr class="row-4 even">
	<td class="column-1">Küçük eklem ve kemikler</td><td class="column-2">Geniş eklem ve kemikler</td><td class="column-3">Geniş eklem ve kemikler</td>
</tr>
<tr class="row-5 odd">
	<td class="column-1">Oldukça düşük yağ oranı</td><td class="column-2">Düşük yağ oranı</td><td class="column-3">Ortalama üstü yağ oranı</td>
</tr>
<tr class="row-6 even">
	<td class="column-1">Dar omuz, göğüs ve kalça</td><td class="column-2">Geniş omuz, orta kalça</td><td class="column-3">Geniş bel bölgesi</td>
</tr>
<tr class="row-7 odd">
	<td class="column-1">Uzun kollar ve bacaklar</td><td class="column-2">Yağ oranı eşit dağılmış gövde ve kol, bacaklar</td><td class="column-3">Kısa görünen kol ve bacaklar</td>
</tr>
<tr class="row-8 even">
	<td class="column-1">Kilo almak zor</td><td class="column-2">Kilo almak veya vermek kolay</td><td class="column-3">Kilo vermek zor</td>
</tr>
<tr class="row-9 odd">
	<td class="column-1">Hızlı metabolizma</td><td class="column-2">Hızlı metabolizma</td><td class="column-3">Yavaş metabolizma</td>
</tr>
<tr class="row-10 even">
	<td class="column-1">Hiperaktif</td><td class="column-2">Ortalama</td><td class="column-3">Ağır - az aktif</td>
</tr>
<tr class="row-11 odd">
	<td class="column-1">Kas kazanmak zor gelir ancak yağsızdır</td><td class="column-2">Kütle kazanmak kolay</td><td class="column-3">Kütle kazanmak kolay ama yağı azaltmak zor gelir</td>
</tr>
</tbody>
</table>
<td style="<?php echo $tableStyle; ?>">
							<a href='guncelle.php?bolgeID=<?php echo $vucuttipiID; ?>&user_id=<?php echo $userID; ?>' style='width:100px; font-size:12px;' class='btn btn-primary btn-xs'><i class='fa-plus
              
              
              
              
              
              
              '></i> Ekle </a>
							
						  </td>
<body>
<?php
$vucuttipi=array("ektomorf","mezomorf","endomorf");
echo "<select name='liste'>";
for ($i=0;$i<=2;$i++)
{
echo "<option value='",$i+1,"'>",$vucuttipi[$i],"</option>";
}
echo "</select>";
?>
</body>
    
    <script src="js/quiz.js"></script>
          <!-- top tiles -->
        </div>
          <!-- /top tiles -->
          

         

				


                <!-- Start to do list -->
                
                <!-- End to do list -->
                
                <!-- start of weather widget -->
               
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
	
	<script type="text/javascript" src="https://fastly.jsdelivr.net/npm/echarts@5.4.0/dist/echarts.min.js"></script>
	
	
	
  </body>
</html>