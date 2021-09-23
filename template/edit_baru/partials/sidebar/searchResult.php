
	<!-- search result -->
	<?php if(isset($_GET['search'])) : ?>
	<div class="mb-5">
		<h2 class="sidebar-heading"><?php echo __('Search Result'); ?></h2>
		<?php echo $search_result_info; ?>
	</div>
	<?php endif; ?>
	