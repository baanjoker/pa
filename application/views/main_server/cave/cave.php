	    <section class="content-header">
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-info">
						<div class="panel-heading">
							<div class="panel-title"><i class="fa fa-list"></i><strong> CAVE LISTS</strong></div>
						</div>
						<div class="col-md-12">
			                <div class="form-group"><br>
								<a href="<?php echo base_url('main_server/cave/caveForm'); ?>" class="btn btn-info btn-flat" ><i class="fa fa-plus" name="add"></i> ADD RECORD</a>
								<a href="<?php echo base_url('report/cave_report/'); ?>" class="btn btn-success btn-flat" ><i class="fa fa-filter" name="add"></i> ADVANCE FILTER</a>
							</div>
						</div>

						<div class="panel-body">
							<div class="table_view col-xs-12">
								<div class="table-responsive">
									<table id="tableCave" class="dataTables-wrapper form-inline dt-bootstrap table-hover">
										<thead>
											<tr>
												<th>#</th>
												<th>CAVES NAME</th>
		                    					<th>REGION</th>
		                    					<th>PROVINCE</th> 
		                    					<th>MUNICIPALITY</th>                 
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