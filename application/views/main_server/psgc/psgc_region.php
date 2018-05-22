<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-success">
				<div class="panel-heading">
					<div class="panel-title"><i class="fa fa-list"></i><strong> LIST OF REGIONS</strong></div>
				</div>
				<br>
			        <div class="col-md-12">
					    <table width="100%" border="0" cellpadding="3" cellspacing="1" class="table4">
					        <tr valign="top">
					        	<td width="220" class="dataCell"><strong>Number of Regions</strong></td>
					        	<td width="200" class="dataCell"><span><?php echo $countAllRegion['total']; ?></span></td>
					        	<td width="220" class="dataCell"><strong>Number of Provinces</strong></td>
					        	<td width="200" class="dataCell"><span><?php echo $countAllProvince['total']; ?></span></td>
					        	<td width="220" class="dataCell"><strong>Number of Municipalities</strong></td>
					        	<td width="200" class="dataCell"><span><?php echo $countAllMunicipalities['total']; ?></span></td>
					            <td width="220" class="dataCell"><strong>Number of Barangays</strong></td>
					        	<td class="dataCell"><span><?php echo $countAllbarangay['total']; ?></span></td>
					        </tr>
					    </table>
			        </div>
				<div class="col-md-12">
	                <div class="form-group"><br>
						<a href="<?php echo base_url('main_server/psgc_locations/region'); ?>" class="btn btn-info btn-flat" ><i class="fa fa-plus" name="add"></i> ADD REGION</a>
					</div>
				</div>

				<div class="panel-body">
					<div class="table_view col-xs-12">
						<div class="table-responsive">
							<table id="tableRegion" class="dataTables-wrapper form-inline dt-bootstrap table-hover">
								<thead>
									<tr>
										<th>#</th>
										<th>REGION NAME</th>
                    					<th>CODE</th>                  
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

