<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-info">
				<div class="panel-heading">
					<div class="panel-title"><i class="fa fa-list"></i><strong> LIST</strong></div>
				</div>
				<div class="col-md-12">
	                <div class="form-group"><br>
						<a href="<?php echo base_url('main_server/library/maritalform'); ?>" class="btn btn-info btn-flat" ><i class="fa fa-plus" name="add"></i> Add Marital Status</a>
					</div>
				</div>
				<div class="panel-body">
					<div class="table_view col-xs-12">
						<div class="table-responsive">
							<table id="tablemarital" class="dataTables-wrapper form-inline dt-bootstrap table-hover">
								<thead>
									<tr>
										<th>#</th>
										<th>MARITAL Code</th>
                    					<th>DESCRIPTION</th>
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
<script type="text/javascript" src="<?php echo base_url("jquery/extra/marital.js") ?>"></script>

