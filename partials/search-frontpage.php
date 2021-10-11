<!DOCTYPE html>
<html lang="<?php echo substr($sysconf['default_lang'], 0, 2); ?>" xmlns="http://www.w3.org/1999/xhtml"
      prefix="og: http://ogp.me/ns#">
<head>
<!-- meta -->
<style>
  .heading1{
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    font-size:1.2rem;
    
  }
  .pig{
    padding:25px 50px 50px;
    
  }
  #content{
    background-color: rgb(229, 229, 229);
  }
</style>
</head>

<body itemscope="itemscope" itemtype="http://schema.org/WebPage">

<?php
include 'nav.php';
?>

<main id="content" class="s-main" role="main">
<div class="search-frontpage">
	<div id="simply-search">
		<form action="index.php" method="get" autocomplete="off">
			<div class="input-group input-group-lg">
				<input type="text" id="keyword" name="keywords" class="form-control" role="search" placeholder="<?php echo __('Search Collection');?>">
				<div class="input-group-append">
					<button class="btn-search" type="submit" name="search" value="search" ><i class="fa fa-search fa-lg" aria-hidden="true"></i></button>
				</div>
			</div>
			
		</form>
		<div class="mt-2">
			<a class="s-search-advances" data-toggle="modal" data-target="#advSearch" title="<?php echo __('Advanced Search');?>"><i class="fa fa-bars mr-2"></i><?php echo __('Advanced Search');?></a>
		</div>
	</div>
</div>
</main>

<?php include "footer.php";?>
</body>
</html>