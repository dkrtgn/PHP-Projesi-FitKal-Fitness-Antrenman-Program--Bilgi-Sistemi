<?php

function sidebar(){
	
	$sidebar = '
	            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Kullanıcı Paneli</h3>
                <ul class="nav side-menu">
                  <li><a href="anasayfa.php"><i class="fa fa-home"></i> Anasayfa </a></li>
                  <li><a><i class="fa fa-line-chart"></i> Fitness Programları <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="programlistesi.php">Antrenman Listesi</a></li>
                      
                    </ul>
                  </li>
                  <li><a><i class="fa fa-line-chart"></i> Bölgesel Çalışmalar <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="sırt.php">Sırt</a></li>
                      <li><a href="göğüs.php">Göğüs</a></li>
                      <li><a href="karın.php">Karın</a></li>
                      <li><a href="önkol.php">Ön Kol</a></li>
                      <li><a href="arkakol.php">Arka Kol</a></li>
                      <li><a href="omuz.php">Omuz</a></li>
                      <li><a href="bacak.php">Bacak</a></li>
                    </ul>
                  </li>
                  <li><a href="contacts.php"><i class="fa fa-user-plus"></i> Online Koçluk </a></li>
                  <li><a href="quiz.php"><i class="fa fa-file-text"></i> BodyQuiz </a></li>
                  <li><a href="logout.php"><i class="fa fa-power-off"></i> Çıkış </a></li>
                  
                </ul>
              </div>
            </div>
	';
	
	echo $sidebar;
	
}

function adminSidebar(){
	
	$adminSidebar = '
	            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Admin Paneli</h3>
                <ul class="nav side-menu">
                  <li><a href="adminIndex.php"><i class="fa fa-home"></i> Anasayfa </a></li>
                  <li><a><i class="fa fa-line-chart"></i>Fitness Programları <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      
                      <li><a href="programlistesi.php">Program Düzenle</a></li>
                      
                    </ul>
                  </li>
                  
                  <li><a href="quiz.php"><i class="fa fa-file-text"></i> BodyQuiz </a></li>
                  <li><a href="kullanıcı.php"><i class="fa fa-file-text"></i> Kullanıcı Bilgileri </a></li>
                  <li><a href="adress.php"><i class="fa fa-users"></i> Adres Düzenleme </a></li>
                  <li><a href="logout.php"><i class="fa fa-power-off"></i> Çıkış </a></li>
                </ul>
              </div>
            </div>
	';
	
	echo $adminSidebar;
	
}


?>