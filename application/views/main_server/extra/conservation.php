<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-success">
				<div class="panel-heading">
					<div class="panel-title"><i class="fa fa-list"></i><strong> LIST</strong></div>
				</div>
				<br>
				<div class="col-md-12">
	                <div class="form-group">
						<a href="<?php echo base_url('main_server/library/conform'); ?>" class="btn btn-info btn-flat" ><i class="fa fa-plus"></i> ADD RECORD</a>
					</div>
				</div>	
				<div class="panel-body">
					<div class="table_view col-xs-12">
						<div class="table-responsive">							
							<table id="tablecon" class="dataTables-wrapper form-inline dt-bootstrap table-hover">
								<thead>
									<tr>
										<th>#</th>	
										<th>CPA CODE</th>
										<th>CPABI CODE</th>	
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
<script type="text/javascript" src="<?php echo base_url("jquery/extra/conservation.js") ?>"></script>