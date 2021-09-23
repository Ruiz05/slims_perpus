<footer class="s-footer animated fadeInUp delay-1s" id="hsr">
	<div class="s-footer-content">
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-12">
				<div class="s-footer-tagline">
					<a >© 2021 Perpustakaan Universitas Muhammadiyah Kalimantan Timur</a>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-12">
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
			<nav class="col-lg-6 col-md-6 col-sm-12">
				<ul class="s-footer-menu">
					<li><a href="index.php"><?php echo __('Home'); ?></a></li>
					<li><a target="_blank" rel="archives" href="https://www.facebook.com/perpustakaanUMKT/">Facebook</a></li>
					<li><a target="_blank" rel="archives" href="https://www.instagram.com/perpustakaan_umkt/?igshid=lqft5tbpd92l">Instagram</a></li>
					<li><a target="_blank" rel="archives" href="">Youtube</a></li>
					<li><a target="_blank" rel="archives" href="index.php?rsssalah=true" title="RSS" class="footer-rss" >RSS</a></li>
				</ul>
			</nav>
		</div>
	</div>
</footer>
