<?php
function news_list_tpl($title, $path, $date, $summary) {
?>

<div class="news">
	<div class="card p-0 border-0">
		<div class="card-body">
			<h3 class="content-title mb-2"><a href="<?php echo SWB.'index.php?p='.$path ?>"><?php echo $title ?></a></h3>
			<div class="my-2 text-muted font-size-ms"><small><i class="fa fa-calendar mr-2"></i><?php echo $date ?></small></div>
			<p class="content-summary mb-0"><?php echo $summary ?>... 
			<span class="text-small my-0 py-0 d-inline"><a class="my-0 py-0 btn btn-link btn-sm btn-news" href="<?php echo SWB.'index.php?p='.$path ?>"><?php echo __('Read More') ?><i class="fa fa-angle-double-right ml-1"></i></a></span>
			</p>
			
		</div>
	</div>
</div>

<?php
}