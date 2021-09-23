
	<!-- If Member Logged -->
	<div class="mb-5 information">
		<h2 class="sidebar-heading"><?php echo __('Information'); ?></h2>
		<p><?php echo (utility::isMemberLogin()) ? $header_info : $info; ?></p>
	</div>