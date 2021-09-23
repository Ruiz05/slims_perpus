<?php
	// Generate Output catch empty list
	if(strlen($main_content) == 7) {
		echo '<h2>' . __('No Result') . '</h2><hr/><p>' . __('Please try again') . '</p>';
	} else {
		echo $main_content;
	}
	// Somehow we need to hack the layout
	if(isset($_GET['search']) || (isset($_GET['p']) && $_GET['p'] != 'member')){
		echo '</div>';
	} else {
		if(isset($_SESSION['mid'])) {
			echo  '</div></div>';
		}
	}
?>