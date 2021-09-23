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
