

<?php
	/**
	 * Template for visitor counter
	 * name of memberID text field must be: memberID
	 * name of institution text field must be: institution
	 *
	 * Copyright (C) 2015 Arie Nugraha (dicarve@gmail.com)
	 * Create by Eddy Subratha (eddy.subratha@slims.web.id)
	 * 
	 * Slims 8 (Akasia)
	 * 
	 * This program is free software; you can redistribute it and/or modify
	 * it under the terms of the GNU General Public License as published by
	 * the Free Software Foundation; either version 3 of the License, or
	 * (at your option) any later version.
	 *
	 * This program is distributed in the hope that it will be useful,
	 * but WITHOUT ANY WARRANTY; without even the implied warranty of
	 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	 * GNU General Public License for more details.
	 *
	 * You should have received a copy of the GNU General Public License
	 * along with this program; if not, write to the Free Software
	 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
	 */
	
	$main_template_path = $sysconf['template']['dir'].'/'.$sysconf['template']['theme'].'/login_template.inc.php';
	
	?>
	
	<style>
	#mobile-nav-toggle,
	.header-login-admin{display:none}
	</style>
<div class="s-visitor container">
	<header>
		<h2 class="text-uppercase"><?php echo __('Visitor Counter'); ?></h2>
		
	</header>
	<div class="card-visitor mt-5 bg-trans">
		<div class="card-body">
			<form action="index.php?p=visitor" name="visitorCounterForm" id="visitorCounterForm" method="post">
				
				
						<div class="s-visitor-photo">  
							<img id="visitorCounterPhoto" class="rounded-circle shadow-lg mt-3" src="./images/persons/photo.png"/>
						</div>
				<div  id="counterInfo" class="info my-5 text-dark"><?php echo __('Please insert your library member ID otherwise your full name instead'); ?></div>
						<div class="mt-5"> 
						<div class="form-group"> 
							<!--
							<label for="memberID" class="text-dark"><?php echo __('Member ID / Visitor Name'); ?></label>
							-->
							<input type="text" name="memberID" id="memberID"  class="form-control form-control-lg text-center" placeholder="<?php echo __('Member ID / Visitor Name'); ?>"/>
						</div>
						<div class="form-group">
							<!--
							<label for="institution" class="text-dark"><?php echo __('Institution'); ?></label>
							-->
							<input type="text" name="institution" id="institution" class="form-control form-control-lg text-center" placeholder="<?php echo __('Institution'); ?>"/>
						</div>
						<button type="submit" id="counter" name="counter" class="my-3 btn-visitor"><i class="fa fa-sign-in mr-3" aria-hidden="true"></i></span><?php echo __('Add'); ?></button>
				</div>
				
			</form>
		</div>
	</div>
</div>
<script>
	$('#login-page, .s-login').attr('style','margin:0;')
	$('.s-login-content').removeClass('animated flipInY').addClass('animated zoomIn')
</script>

