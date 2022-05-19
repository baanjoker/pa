<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-info">
				<div class="panel-heading">
					<div class="panel-title"><i class="fa fa-list"></i><strong> LIST</strong></div>
				</div>
				<div class="col-md-12">
	                <div class="form-group"><br>
						<a href="<?php echo base_url('main_server/wildlife/classform'); ?>" class="btn btn-info btn-flat" ><i class="fa fa-plus" name="add"></i> ADD CLASS</a>
					</div>
				</div>
				<input name="id_category" class="hidden" value="<?php echo $get_uri_segment_id_category; ?>" id="id_category" data-id="<?php echo $get_uri_segment_id_category; ?>">
				<div class="panel-body">
					<div class="table_view col-xs-12">
						<div class="table-responsive">
							<table id="tablewClass" class="dataTables-wrapper form-inline dt-bootstrap table-hover">
								<thead>
									<tr>
										<th>#</th>
										<th>SPECIES CATEGORY</th>
                    					<!-- <th>CLASS CODE</th> -->
										<th>CLASS DESCRIPTION</th>
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
<script type="text/javascript" src="<?php echo base_url("jquery/class.js") ?>"></script>