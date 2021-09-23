<div class="modal fade animated pulse" id="advSearch" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content">
			<form action="index.php" method="get">
				<div class="modal-header">
					<h5 class="modal-title text-dark"><?php echo __('Advanced Search');?></h5>
					<button type="button" class="btn btn-light rounded-circle" data-dismiss="modal" aria-label="Close">
					<i class="fa fa-times" aria-hidden="true"></i>
					</button>
				</div>
				<div class="modal-body animated fadeIn">
					<div class="row">
						<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
							<div class="form-group">
								<label class="label text-dark"><?php echo __('Title');?></label>
								
									<input type="text" name="title" class="form-control" placeholder="<?php echo __('Title');?>"/>
								
							</div>
							<div class="form-group">
								<label class="label text-dark"><?php echo __('Author(s)');?></label>
								
									<input type="text" name="author" class="form-control" placeholder="<?php echo __('Author(s)');?>"/>
								
							</div>
							
						</div>
						<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
							<div class="form-group">
								<label class="label text-dark"><?php echo __('Subject(s)');?></label>
								
									<input type="text" name="subject" class="form-control" placeholder="<?php echo __('Subject(s)');?>"/>
								
							</div>
							<div class="form-group">
								<label class="label text-dark"><?php echo __('ISBN/ISSN');?></label>
								
									<input type="text" name="isbn" class="form-control" placeholder="<?php echo __('ISBN/ISSN');?>" />
								
							</div>
						</div>
						<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
							
							<div class="form-group">
								<label class="label text-dark"><?php echo __('GMD');?></label>
								
									<select name="gmd" class="custom-select"><?php echo $gmd_list;?></select>
								
							</div>
							<div class="form-group">
								<label class="label text-dark"><?php echo __('Collection Type');?></label>
								
									<select name="colltype" class="custom-select"><?php echo $colltype_list;?></select>
								
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<!--
					<button type="button" class="btn btn-light left" data-dismiss="modal"><?php echo __('Cancel');?></button>
					-->
					<input type="hidden" name="searchtype" value="advance" />
					<button type="submit" name="search" value="search" class="btn btn-dark btn-shadow btn-labeled "><span class="btn-label"><i class="fa fa-search" aria-hidden="true"></i></span><?php echo __('Search');?></button>
				</div>
			</form>
		</div>
	</div>
</div>