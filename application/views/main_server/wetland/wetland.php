<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-info">
				<div class="panel-heading">
					<div class="panel-title"><i class="fa fa-list"></i><strong> LIST</strong></div>
				</div>
				<div class="col-md-12">
	                <div class="form-group"><br>
						<a href="<?php echo base_url('main_server/wetland/form'); ?>" class="btn btn-info btn-flat" ><i class="fa fa-plus" name="add"></i> ADD WETLAND</a>
					</div>
				</div>
				<div class="panel-body">
					<div class="table_view col-xs-12">
						<div class="table-responsive">
							<table id="tableWetland" class="dataTables-wrapper form-inline dt-bootstrap table-hover">
								<thead>
									<tr>
										<th>#</th>
										<th>WETLAND NAME</th>
										<th>REGION</th>
                    					<th>PROVINCE</th>
                    					<th>MUNICIPAL</th>
                    					<th>BARANGAY</th>
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
<script type="text/javascript" src="<?php echo base_url("jquery/wetland.js") ?>"></script>

