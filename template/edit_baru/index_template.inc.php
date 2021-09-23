<?php


// be sure that this file not accessed directly
if (!defined('INDEX_AUTH')) {
	die("can not access this file directly");
	} elseif (INDEX_AUTH != 1) {
		die("can not access this file directly");
	}
?>

<!DOCTYPE html>
<html lang="<?php echo substr($sysconf['default_lang'], 0, 2); ?>" xmlns="http://www.w3.org/1999/xhtml" prefix="og: http://ogp.me/ns#">
<head>
	<!-- meta -->
	<?php include "partials/meta.php";?>
<!-- </head> -->
</head>

<body itemscope="itemscope" itemtype="http://schema.org/WebPage">
	<!--[if lt IE 9]>
	<div class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</div>
	<![endif]-->
	
	<?php 
	
	// Header and Menu
	include "partials/nav.php";
	
	// Advance Search Modal
	include "partials/advsearch.php"; 
	// social side-menu
	// include "partials/social-sideMenu.php";
	?>
	
	<?php
	// Content
	?>
	
	<?php if(isset($_GET['search']) || isset($_GET['p'])): ?>
	<section  id="content" class="s-main-page" role="main">
		<div class="top-section">
			<div class="row">
				<div class="col-xl-8 col-lg-8 col-md-6 col-sm-12 animated fadeInDown">
					<!-- Main Title -->
					<?php include "partials/main-title.php";?>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 animated fadeInDown">
					<!-- Main Search -->
					<?php include "partials/main-search.php";?>
				</div>
			</div>
		</div>
		
		<!-- Main -->
		<div class="s-main-content">
			<div class="container">
				<div class="row">
					<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 animated fadeInUp">
						<!-- Main content -->
						<?php include "partials/main-content.php";?>
						<!-- </div> include on main-content.php -->
					<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 animated fadeInUp">
						<div class="sidebar animated fadeInUp">
						<?php 
						
						// sidebar search result information
						include "partials/sidebar/searchResult.php";
						
						// sidebar information
						include "partials/sidebar/info.php";
						
						// sidebar main menu
						//include "partials/sidebar/sideMenu.php";
						
						// sidebar promo
						include "partials/sidebar/promo.php";
						
						// search cluster
						include "partials/sidebar/searchCluster.php";
						
						?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php 
	
	
	
	else: ?>
	<!-- Homepage -->
	<main id="content" class="s-main animated fadeInDown" role="main">
		<!-- Search form on frontpage -->
		<?php include "partials/search-frontpage.php";?>
	</main>
	
	<?php endif; ?>
	
	<?php
	
	// Featured-promoted Books
	include "partials/feature.php";
	// Footer Upper
	include "partials/footer-upper.php";
	// Footer
	include "partials/footer.php";
	// Chat Engine
	include LIB."contents/chat.php";
	// Background
	include "partials/bg.php";
	?>
	
	<script>
		<?php if(isset($_GET['search']) && (isset($_GET['keywords'])) && ($_GET['keywords'] != ''))   : ?>
		$('.biblioRecord .detail-list, .biblioRecord .title, .biblioRecord .abstract, .biblioRecord .controls').highlight(<?php echo $searched_words_js_array; ?>);
		<?php endif; ?>
		
		//Replace blank cover
		$('.book img').error(function(){
			var title = $(this).parent().attr('title').split(' ');
			$(this).parent().append('<div class="s-feature-title">' + title[0] + '<br/>' + title[1] + '<br/>... </div>');
			$(this).attr({
				src   : './template/bootstrap4/img/book.png',
				title : title + title[0] + ' ' + title[1]
			});
		});
		
		//Replace blank photo
		$('.librarian-image img').error(function(){
			$(this).attr('src','./template/bootstrap4/img/avatar.jpg');
		});
		
		//Feature list slider
		function mycarousel_initCallback(carousel){
			carousel.buttonNext.bind('click', function() {
				carousel.startAuto(0);
			});
			carousel.buttonPrev.bind('click', function() {
				carousel.startAuto(0);
			});
			carousel.clip.hover(function() {
				carousel.stopAuto();
			}, 
			function() {
				carousel.startAuto();
			});
		};
		jQuery('#topbook').jcarousel({
			auto: 5,
			wrap: 'last',
			initCallback: mycarousel_initCallback
		});
		
		// Back to Top Button 
		$(document).ready(function($){
			var offset = 300,
			offset_opacity = 1200,
			scroll_top_duration = 700,
			$back_to_top = $('.js-back-to-top');
			
			$(window).scroll(function(){
				( $(this).scrollTop() > offset ) ? $back_to_top.addClass('back-to-top-is-visible') : $back_to_top.removeClass('back-to-top-is-visible back-to-top-fade-out');
				if( $(this).scrollTop() > offset_opacity ) {
					$back_to_top.addClass('back-to-top-fade-out');
				}
			});
			$back_to_top.on('click', function(event){
				event.preventDefault();
				$('body,html').animate({scrollTop: 0 ,}, 
				scroll_top_duration);
			});
		});
	</script> 
	<a href="javascript:void(0);" class="js-back-to-top back-to-top"><i class="fa fa-chevron-up"></i></a>
	<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/61385f04d6e7610a49b4309d/1ff236b5i';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
</body>
</html>