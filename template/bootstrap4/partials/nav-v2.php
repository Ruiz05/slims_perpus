<header id="header" class="animated fadeInDown">
	<div id="logo " class="pull-left">
		<a href="index.php"><img src="template/bootstrap4/img/nav-logo.png" alt="<?php echo $sysconf['library_name']; ?>" /></img></a>
	</div>
	<nav id="nav-menu-container">
		<div class="logo-mobile">
			<a href="index.php"><img src="template/bootstrap4/img/nav-logo.png" class="w3-hover-sepia" title="<?php echo $sysconf['library_name']; ?> <?php echo $sysconf['library_subname']; ?>" /></img></a>
		</div>
		<form action="index.php" class="d-block d-sm-none mt-3" method="get" autocomplete="off">
			<div class="input-group">
				<input type="text" id="keyword" name="keywords" class="form-control" role="search" placeholder="<?php echo __('Search Collection');?>">
				<div class="input-group-append">
					<button class="btn-search" type="submit" name="search" value="search" ><i class="fa fa-search" aria-hidden="true"></i></button>
				</div>
			</div>
		</form>
		<ul class="nav-menu">
			<li><a href="index.php"><?php echo __('Home'); ?></a></li>
			<li><a href="index.php?p=news"><?php echo __('Library News'); ?></a></li>
			<li><a href="index.php?p=member"><?php echo __('Member Area'); ?></a></li>
			<li class="menu-has-children">
				<a href="#"><?php echo __('Others'); ?></a>
				<ul>
					<li><a href="index.php?p=librarian"><?php echo __('Librarian'); ?></a></li>
					<li><a href="index.php?p=libinfo"><?php echo __('Library Information'); ?></a></li>
					<li><a href="index.php?p=peta" class="openPopUp" width="600" height="400"><?php echo __('Library Location'); ?></a></li>
					<li><a href="index.php?p=help"><?php echo __('Help on Search'); ?></a></li>
				</ul>
			</li>
			<li><a href="index.php?p=login"><i class="fa fa-lock mr-2"></i><?php echo __('Librarian LOGIN'); ?></a></li>
		</ul>
	</nav>
</header>