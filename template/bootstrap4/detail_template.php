<div class="s-detail animated delay9 fadeInUp" itemscope itemtype="http://schema.org/Book" vocab="http://schema.org/" typeof="Book">
  
  <!-- Book Cover
  ============================================= -->
  <div class="cover">
    <?php echo $image ?>
  </div>
  
  <!-- Title 
  ============================================= -->
  <h3 class="s-detail-type"><kbd class="bg-secondary"><?php echo $gmd_name ?></kbd></h3>
  <h4 class="s-detail-title" itemprop="name" property="name"><?php echo $title ?></h4>
  
  <div class="s-detail-author" itemprop="author" property="author" itemscope itemtype="http://schema.org/Person">
  <?php echo  $authors ?>
  <br>
  </div>
  <?php echo $social_shares ?>
  <br>
  
  <div class="margin-top-60 mb-3 tabs-isi">
		<!-- Nav tabs -->
		<nav>
		<div class="nav nav-tabs" id="tabDetail" role="tablist">
			<!-- availability tab -->
			<a class="nav-item nav-link active" id="ketersedian-tab" href="#ketersediaan" aria-controls="ketersediaan" role="tab" data-toggle="tab" aria-selected="true"><?php echo __('Availability'); ?></a>
			<!-- notes tab -->
			<a class="nav-item nav-link" id="abstrak-tab" href="#abstrak" aria-controls="abstrak" role="tab" data-toggle="tab" aria-selected="false"><?php echo __('Notes'); ?></a>
			<!-- detail tab -->
			<a class="nav-item nav-link" id="detail-tab" href="#detil-book" aria-controls="detil-book" role="tab" data-toggle="tab" aria-selected="false"><?php echo __('Detail Information'); ?></a>
			<!-- Relation tab -->
			<a class="nav-item nav-link" id="relasi-tab" href="#relasi" aria-controls="relasi" role="tab" data-toggle="tab" aria-selected="false"><?php echo __('Other version/related'); ?></a>
			<!-- Comment Tab Condition -->
			<?php if(isset($_SESSION['mid']) && $sysconf['comment']['enable']) : ?>
			<a class="nav-item nav-link" id="komen-tab" href="#komen" aria-controls="relasi" role="tab" data-toggle="tab" aria-selected="false"><?php echo __('Comments'); ?></a>
			<?php endif ?>
		</div>
		</nav>
		<!-- Tab panes -->
		<div class="tab-content" id="detailContent">
			<!-- Availability Content -->
			<div role="tabpanel" class="tab-pane fade show active" id="ketersediaan" aria-labelledby="ketersediaan-tab">
				<?php if($availability) : ?>
				<div class="mt-3">
					<?php echo $availability; ?>
				</div>
				<?php else : ?>
				<div class="alert alert-danger">
					<?php echo __('No copy data'); ?>
				</div>
				<?php endif ?>
			</div>
			<!-- Notes Content -->
			<div role="tabpanel" class="tab-pane fade" id="abstrak" aria-labelledby="abstrak-tab">
				<?php if($notes != 'Includes index.') : ?>
				<div class="mt-3" itemprop="description" property="description">
					<?php echo $notes; ?>
				</div>
				<?php else : ?>
				<div class="alert alert-danger mt-3">
					<em><?php echo __('Description Not Available'); ?></em>
				</div>
				<?php endif; ?>
			</div>
			<!-- Detail Information Contents -->
			<div role="tabpanel" class="tab-pane fade" id="detil-book" aria-labelledby="detail-tab">
				<table class="table table-responsive table-striped table-condensed mt-3">
					<tbody>
						<tr>
							<td style="width:30%"><?php echo __('Series Title'); ?></td>
							<td><span itemprop="alternativeHeadline" property="alternativeHeadline"><?php echo ($series_title) ? $series_title : '-'; ?></span></td>
						</tr>
						<tr>
							<td><?php echo __('Call Number'); ?></td>
							<td><span><?php echo ($call_number) ? $call_number : '-'; ?></span></td>
						</tr>
						<tr>
							<td><?php echo __('Publisher'); ?></td>
							<td><span itemprop="publisher" property="publisher" itemtype="http://schema.org/Organization" itemscope><?php echo $publisher_name ?></span> :
								<span itemprop="publisher" property="publisher"><?php echo $publish_place ?></span>.,
								<span itemprop="datePublished" property="datePublished"><?php echo $publish_year ?></span>
							</td>
						</tr>
						<tr>
							<td><?php echo __('Collation'); ?></td>
							<td><span itemprop="numberOfPages" property="numberOfPages"><?php echo ($collation) ? $collation : '-'; ?></span></td>
						</tr>
						<tr>
							<td><?php echo __('Language'); ?></td>
							<td>
								<span>
									<meta itemprop="inLanguage" property="inLanguage" content="<?php echo $language_name ?>" />
									<?php echo $language_name ?>
								</span>
							</td>
						</tr>
						<tr>
							<td><?php echo __('ISBN/ISSN'); ?></td>
							<td><span itemprop="isbn" property="isbn"><?php echo ($isbn_issn) ? $isbn_issn : '-'; ?></span></td>
						</tr>
						<tr>
							<td><?php echo __('Classification'); ?></td>
							<td><span><?php echo ($classification) ? $classification : '-'; ?></span></td>
						</tr>
						<tr>
							<td><?php echo __('Content Type'); ?></td>
							<td><span itemprop="bookFormat" property="bookFormat"><?php echo ($content_type) ? $content_type : '-'; ?></span></td>
						</tr>
						<tr>
							<td><?php echo __('Media Type'); ?></td>
							<td><span itemprop="bookFormat" property="bookFormat"><?php echo ($media_type) ? $media_type : '-'; ?></span></td>
						</tr>
						<tr>
							<td><?php echo __('Carrier Type'); ?></td>
							<td><span itemprop="bookFormat" property="bookFormat"><?php echo ($carrier_type) ? $carrier_type : '-'; ?></span></td>
						</tr>
						<tr>
							<td><?php echo __('Edition'); ?></td>
							<td><span itemprop="bookEdition" property="bookEdition"><?php echo ($edition) ? $edition : '-'; ?></span></td>
						</tr>
						<tr>
							<td><?php echo __('Subject(s)'); ?></td>
							<td><span itemprop="keywords" property="keywords"><?php echo ($subjects) ? $subjects : '-'; ?></span></td>
						</tr>
						<tr>
							<td><?php echo __('Specific Detail Info'); ?></td>
							<td><span><?php echo ($spec_detail_info) ? $spec_detail_info : '-'; ?></span></td>
						</tr>
						<tr>
							<td><?php echo __('Statement of Responsibility'); ?></td>
							<td><span itemprop="author" property="author"><?php echo ($sor) ? $sor : '-';  ?></span></td>
						</tr>
						<?php if($file_att) : ?>
						<tr>
							<td><?php echo __('File Attachment'); ?></td>
							<td><?php echo $file_att; ?></td>
						</tr>
						<?php endif ?>
					</tbody>
				</table>
			</div>
			<!-- Related Content -->
			<div role="tabpanel" class="tab-pane fade" id="relasi" aria-labelledby="relasi-tab">
				<?php if($related) : ?>
				<div class="mt-3">
					<?php echo $related; ?>
				</div>
				<?php else : ?>
				<div class="alert alert-danger mt-3">
					<?php echo __('No other version available'); ?>
				</div>
				<?php endif ?>
			</div>
			<!-- Comments content -->
			<div role="tabpanel" class="tab-pane fade" id="komen" aria-labelledby="komen-tab">
				<div class="mt-3">
					<?php echo showComment($biblio_id); ?>
				</div>
			</div>
		</div>
	</div>

	
	
  

</div>



<script>
$('#tabDetail a').on('click', function (e){
  e.preventDefault()
  $(this).tab('show')
})
</script>