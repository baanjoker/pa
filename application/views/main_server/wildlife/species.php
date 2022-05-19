<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-info">
				<div class="panel-heading">
					<div class="panel-title"><i class="fa fa-list"></i><strong> LIST</strong></div>
				</div>
				<div class="col-md-12">
	                <div class="form-group"><br>
						<a href="<?php echo base_url('main_server/wildlife/speciesForm/'); ?>" class="btn btn-info btn-flat" ><i class="fa fa-plus" name="add"></i> ADD SPECIES GENUS</a>
					</div>
				</div>
				<input name="id_family" class="hidden" value="<?php echo $get_uri_segment_id_family; ?>" id="id_family" data-id="<?php echo $get_uri_segment_id_family; ?>">
				<div class="panel-body">
					<div class="table_view col-xs-12">
						<div class="table-responsive">
							<table id="tablewSpecies" class="dataTables-wrapper form-inline dt-bootstrap table-hover">
								<thead>
									<tr>
										<th>#</th>
										<!-- <th>SPECIES CATEGORY</th> -->
										<th>IUCN STATUS</th>
										<th>RESIDENCY STATUS</th>
                    					<th>CLASS</th>
                    					<th>ORDER</th>
                    					<th>FAMILY</th>
                    					<th>COMMON NAME</th>
                    					<th>SCIENTIFIC NAME</th>
                    					<!-- <th>PROTECTED AREA</th> -->
										<th>OPTION</th>
									</tr>
								</thead>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<script type="text/javascript" src="<?php echo base_url("jquery/species.js") ?>"></script>