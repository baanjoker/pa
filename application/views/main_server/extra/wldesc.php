<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-info">
				<div class="panel-heading">
					<div class="panel-title"><i class="fa fa-list"></i><strong> LIST</strong></div>
				</div>
				<div class="col-md-12">
	                <div class="form-group"><br>
						<a href="<?php echo base_url('main_server/library/wldescform'); ?>" class="btn btn-info btn-flat" ><i class="fa fa-plus" name="add"></i> ADD WETLAND DESCRIPTION</a>
					</div>
				</div>
				<input name="id_wltype" class="hidden" value="<?php echo $wltype_id; ?>" id="id_wltype" data-id="<?php echo $wltype_id; ?>">
				<div class="panel-body">
					<div class="table_view col-xs-12">
						<div class="table-responsive">
							<table id="tablewDesc" class="dataTables-wrapper form-inline dt-bootstrap table-hover">
								<thead>
									<tr>
										<th>#</th>
										<th>WETLAND TYPE</th>
                    					<th>WETLAND DESC CODE</th>
										<th>WETLAND DESCRIPTION</th>
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
<script type="text/javascript" src="<?php echo base_url("jquery/extra/wdesc.js") ?>"></script>