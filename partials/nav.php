<?php
// clean request uri from xss
$request_uri = urlencode(strip_tags(urldecode($_SERVER['REQUEST_URI'])));
?>

<div class="sticky-top"> <!-- Untuk mengatur navbar agar tetap di atas, hanya perlu mengganti class -->

<nav class="navbar-expand-lg" style="background-color: #064e7a">
  <div class="container">
  <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <ul class="navbar-nav me-auto mb-1 mb-lg-0">
        <li class="nav-item">
          <a class="bi-envelope hover" aria-current="page" style="padding-right:10px; text-decoration:none; color:white" href="mailto:perpustakaan@umkt.ac.id"> perpustakaan@umkt.ac.id</a>
        </li>
        <li class="nav-item">
          <a class="bi-whatsapp hover" href="https://wa.me/628115193113" target="_blank" style="padding-left:10px; text-decoration:none; color:white"> 0811 5193 113</a> <!-- Buat ganti nomor WA -->
        </li>

      </ul>
    
				<div class="s-menu-info">
					<form class="language" name="langSelect" action="index.php" method="get">
						<label class="language-info" for="select_lang"><?php echo __('Select Language'); ?></label>
						<span class="custom-dropdown custom-dropdown--white custom-dropdown--small">
							<select name="select_lang" id="select_lang" title="Change language of this site" onchange="document.langSelect.submit();" class="custom-dropdown__select">
								<?php echo $language_select; ?>
							</select>
						</span>
					</form>
				</div>
			</div>
      
    
  </div>
  
  <!-- menu atas -->
  <!--<div class="container-fluid nav-atas text-white align-middle">
    <div class="row" style="background-color:#064e7a; font-color:#ffff; color:#ffff; font-size:110px;">
        <div class="col-auto"><a href="#">menu 1</a></div>
        <div class="col-auto"><a href="#">menu 2</a></div>
        <div class="col-auto"><a href="#">menu 3</a></div>
  </div>
  </div> -->


  <!-- akhir menu atas -->
  <div style="background-color:#042351">
  <div class="container">
  <body>  
   <div class="container-fluid">
     <div class="row" style="padding-top:10px;">
     <div class="col-md-10 col-sm-12"><img class="gambarheader" src="template/slims_perpus/gambar/heder.png"></div>
     <div class="col-md-2 col-sm-12">
     <form style="padding-top:20%;">
                    <div class="input-group mb-3">
                        <input name="keywords" type="text" class="form-control"
                               placeholder="<?= __('Pencarian'); ?>"
                               aria-label="Enter Keywords"
                               aria-describedby="button-addon2">
                            <div class="input-group-append">
                            <button class="btn btn-primary" type="submit" value="search" name="search"
                                    id="button-addon2"><i class="fas fa-search"></i>
                            </button>
                        </div>
</form>
     </div>
     </div>
     
    
    
    <!-- <form>
     
        <div  class=" container">
                    <div id="mencari" class="input-group mb-3">
                        <input name="keywords" type="text" class="form-control"
                               placeholder="<?= __('Enter Keywords'); ?>"
                               aria-label="Enter Keywords"
                               aria-describedby="button-addon2">
                            <div class="input-group-append">
                            <button class="btn btn-primary" type="submit" value="search" name="search"
                                    id="button-addon2"><?= __('Find Collection'); ?>
                            </button>
                        </div>
                    </div>
        </div>
      
</form> -->
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->
    <
  </body>
          <!-- Edit Menu Navigation Bar-->
 <div class="container">
  <nav class="navbar navbar-expand-lg  navbar-dark " aria-labelledby="navbarDropdown" style="background-color: #064e7a">
  <div class="container-fluid">
    <a class="navbar-brand " ></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-5 mb-lg-0">
        <li class="nav-item ">
          <a class=" nav" aria-current="page" href="index.php" ><?php echo "BERANDA" ?></a>
        </li>
        
        <li class="nav-item dropdown ">
          <a class=" dropdown-toggle nav" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" ><?php echo "NEWS" ?>
            
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown"   >
            <li><a  class="dropdown-item " href="index.php?p=news" ><?php echo "Library News" ?></a></li>
            <li><hr class="dropdown-divider"></li>
     

                  <div class="dropdown-item dropend"  >
        <!--<button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="true">
          Dropright
        </button>-->
        <b class="fw-normal dropdown-toggle" href="#" id="navbarDropdown"role="button" data-bs-toggle="dropdown" aria-expanded="false" ><?php echo "Koran" ?>
            
        </b>
        <ul class="dropdown-menu"   >
          <!-- Dropdown menu links -->
          <li><a class="dropdown-item"  href="https://samarinda.prokal.co/" target="_blank"><?php echo "Samarinda Post" ?></a></li>
            <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item"  href="https://korankaltim.com/" target="_blank"><?php echo "Koran Kaltim" ?></a></li>
            <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item"  href="https://kaltim.tribunnews.com/" target="_blank"><?php echo "Tribun Kaltim" ?></a></li>
        </ul>
        

        
      </div>


          <!-- Sub Menu (Menu yang Punya Anakan) -->
          </ul>
        </li>
        <li class="nav-item dropdown  ">
          <a class=" dropdown-toggle nav" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" ><?php echo "AREA ANGGOTA" ?>
            
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown"   >
            <li><a  class="dropdown-item " href="index.php?p=member" ><?php echo "Login Member" ?></a></li>
            <li><hr class="dropdown-divider"></li>
            <!-- <li ><a class="dropdown-item"  href="index.php?p=daftar_online"><?php echo "Registrasi Member" ?></a></li>
            <li><hr class="dropdown-divider"></li> -->
            <li><a class="dropdown-item" href="index.php?p=survei" ><?php echo "Survei" ?></a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="index.php?p=usul_buku" ><?php echo "Usul Buku" ?></a></li>
            <!-- <li><hr class="dropdown-divider"></li>

                  <div class="dropdown-item dropend"  > -->
        
        <!-- <b class="fw-normal dropdown-toggle" href="#" id="navbarDropdown"role="button" data-bs-toggle="dropdown" aria-expanded="false" ><?php echo "kesamping" ?> -->
            
        <!-- </b>
        <ul class="dropdown-menu"   > -->
          
          <!-- Dropdown menu links -->

          <!-- <li><a class="dropdown-item"  href="#"  ><?php echo "Usul Buku" ?></a></li>
        </ul>

        
      </div> -->


      </ul>
        </li>
        <li class="nav-item dropdown  ">
          <a class=" dropdown-toggle nav" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" ><?php echo "KATALOG" ?>
            
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown" >
            <li><a id="fc" class="dropdown-item" href="https://paperless.umkt.ac.id/" ><?php echo "Paperless" ?></a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="https://dspace.umkt.ac.id/" ><?php echo "Repository" ?></a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="http://b.id/mobi/"><?php echo "E-Book" ?></a></li>
            <!-- <li><hr class="dropdown-divider"></li> -->
<!-- Menu kesamping-->
            <!-- <div class="dropdown-item dropend">
        
        <b class="fw-normal dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo "kesamping" ?>
            
        </b>
        <ul class="dropdown-menu">
       
          <li><a class="dropdown-item" href="#" ><?php echo "Usul Buku" ?></a></li>
          <li><a class="dropdown-item" href="#" ><?php echo "Usul Buku" ?></a></li>
          <li><a class="dropdown-item" href="#" ><?php echo "Usul Buku" ?></a></li>
          <li><a class="dropdown-item" href="#" ><?php echo "Usul Buku" ?></a></li>
        </ul>
        
       
       
      </div> -->

<!-- akhir menu kesamping-->
            
          </ul>
        </li>
        <li class="nav-item dropdown ">
          <a class=" dropdown-toggle nav" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" ><?php echo "TENTANG KAMI" ?>
          
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown" >
            <li><a class="dropdown-item" href="index.php?p=librarian" ><?php echo "Librarian" ?></a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="index.php?p=profil"><?php echo "Profil" ?></a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="index.php?p=visimisi"><?php echo "Visi Misi" ?></a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="index.php?p=fasilitas"><?php echo "Fasilitas Perpustakaan" ?></a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="index.php?p=layanan" ><?php echo "Layanan Perpustakaan" ?></a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="https://goo.gl/maps/ZaKSgsuJH3WhZNFM7" target="_blank" class="openPopUp" width="600" height="400"><?php echo "Library Location" ?></a></li>

           
            
          </ul>
        </li>
      <li class="nav-item ">
          <a class="nav bi-file-lock-fill" aria-current="page" href="index.php?p=login" ><?php echo "LOGIN PUSTAKAWAN" ?></a>
        </li>

      </ul>

      
      
      </div>
    </div>
  </div>
</nav>


</div>