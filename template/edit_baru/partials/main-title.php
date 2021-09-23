<?php
if(isset($_GET['p'])) {
	switch ($_GET['p']) {
		case '' : $page_title = __('Collections'); break;
		case 'show_detail' : $page_title = __("Record Detail"); break;
		case 'member' : $page_title = __("Member Area"); break;
		case 'member' : $page_title = __("Member Area"); break;
		default : $page_title; break; }
	} else {
		$page_title = __('Collections');
	}
?>
<h1 class="s-main-title"><?php echo $page_title ?></h1>