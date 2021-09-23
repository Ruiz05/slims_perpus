
	<!-- Show if clustering search is enabled -->
	<?php
		if(isset($_GET['keywords']) && (!empty($_GET['keywords']))) :
		if (($sysconf['enable_search_clustering'])) : 
		?>
	<div class="mb-5">
		<h2 class="sidebar-heading"><?php echo __('Search Cluster'); ?></h2>
		<div id="search-cluster">
			<div class="cluster-loading"><?php echo __('Generating search cluster...');  ?></div>
		</div>
			<script type="text/javascript">
				$('document').ready( function() {
					$.ajax({
						url     : 'index.php?p=clustering&q=<?php echo urlencode($criteria); ?>',
						type    : 'GET',
						success : function(data, status, jqXHR) { $('#search-cluster').html(data); }
					});
				});
			</script>
	</div>
	<?php endif; ?>
	<?php endif; ?>
