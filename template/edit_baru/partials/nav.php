<header id="header" class="animated fadeInDown">
	<div id="logo" class="web-logo">
		<a href="index.php">
		<img class="img-logo" src="template/bootstrap4/img/logo.png" alt="<?php echo $sysconf['library_name']; ?>" /></img>
		<div class="text-logo d-none d-lg-inline-block d-md-none d-sm-inline-block">
		<div class="web-name"><?php echo $sysconf['library_name']; ?></div>
		<div class="web-tagline"><?php echo $sysconf['library_subname']; ?></div>
		</div>
		</a>
	</div>
	<nav id="nav-menu-container">
		<div class="logo-mobile">
			<a href="index.php">
				<img class="img-logo" src="template/bootstrap4/img/logo.png" alt="<?php echo $sysconf['library_name']; ?>" /></img>
				<div class="text-logo">
					<div class="web-name"><?php echo $sysconf['library_name']; ?></div>
					<div class="web-tagline"><?php echo $sysconf['library_subname']; ?></div>
				</div>
			</a>
		</div>
		<form action="index.php" class="d-block d-sm-none mt-3" method="get" autocomplete="off">
			<div class="input-group">
				<input type="text" id="keyword" name="keywords" class="form-control" role="search" placeholder="<?php echo __('Search Collection');?>">
				<div class="input-group-append">
					<button class="btn-search" type="submit" name="search" value="search" ><i class="fa fa-search" aria-hidden="true"></i></button>
				</div>
			</div>
			<div class="text-center small mb-2">
			<a class="btn-nav-advanced" data-toggle="modal" data-target="#advSearch" title="<?php echo __('Advanced Search');?>"><i class="fa fa-bars mr-2"></i><?php echo __('Advanced Search');?></a>
		</div>
		</form>
		<ul class="nav-menu">
			<li><a href="index.php"><?php echo __('Home'); ?></a></li>
			<li><a href="index.php?p=news"><?php echo __('Library News'); ?></a></li>
				<li class="menu-has-children">
			<a href="#"><?php echo __('Area Anggota'); ?></a>
				<ul>
					<li><a href="index.php?p=member"><?php echo __('Login Member'); ?></a></li>
					<li><a href="index.php?p=daftar_online"><?php echo __('Registrasi Member');  ?></a></li>
					<li><a href="index.php?p=survei"><?php echo __('Survei'); ?></a></li>
					<li><a href="index.php?p=usul_buku"><?php echo __('Usul Buku'); ?></a></li>
				</ul>
			<li class="menu-has-children">
				<a href="#"><?php echo __('Katalog'); ?></a>
				<ul>
					<li><a href="https://paperless.umkt.ac.id/"><?php echo __('Paperless'); ?></a></li>
					<li><a href="https://dspace.umkt.ac.id/"><?php echo __('Repository');  ?></a></li>
					<li><a href="http://b.id/mobi/"><?php echo __('E-Book'); ?></a></li>
				</ul>
					<li class="menu-has-children">
			<a href="#"><?php echo __('Tentang Kami'); ?></a>
				<ul>
					<li><a href="index.php?p=librarian"><?php echo __('Librarian'); ?></a></li>
					<li><a href="index.php?p=profil"><?php echo __('Profil'); ?></a></li>
					<li><a href="index.php?p=fasilitas"><?php echo __('Fasilitas Perpustakaan'); ?></a></li>
					<li><a href="index.php?p=layanan"><?php echo __('Layanan Perpustakaan'); ?></a></li>
					<li><a href="index.php?p=peta" class="openPopUp" width="600" height="400"><?php echo __('Library Location'); ?></a></li>
				</ul>
			</li>
			<li><a href="https://helpdeskperpusumkt.tawk.help/"><?php echo __('Help Desk'); ?></a></li>
			<li><a href="index.php?p=login"><i class="fa fa-lock mr-2"></i><?php echo __('Librarian LOGIN'); ?></a></li>
		</ul>
		
		<div class="hsr d-block d-sm-none"><a href="http://hsr-share.blogspot.com" id="haeser"><br/></a></div>
	</nav>
</header>