<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-success">
				<div class="panel-heading">
					<div class="panel-title"><i class="fa fa-list"></i><strong> LIST OF MUNICIPALITIES</strong></div>
				</div>
				<br>
				<?php if (!empty($identifymc)): ?>
					<div class="box box-default">
						<div class="col-md-12">
			                <div class="form-inline">
			                	<h3><?php echo "PROVINCE OF <strong>".$identifymc->provinceName."</strong>" ?></h3>
			                </div>
			            </div>
			            <div class="col-md-12">
			            <table width="95%" class="table4">
			            	<tbody>
			            		<tr valign="top">
			            			<td class="dataCell"><strong>Region</strong></td>
			            			<td class="dataCell" style="width:40%"><a href='<?php echo base_url('main_server/psgc_locations/provinceList/'.$identifymc->id) ?>'><?php echo $identifymc->regionName." - ".$identifymc->regionDesc ?></a></td>
			            			<td class="dataCell"><strong>Code</strong></td>
			            			<td class="dataCell"><span><?php echo $identifymc->regionCode ?></span></td>
			            		</tr>
			            		<tr>
			            			<td class="dataCell"><strong>Province</strong></td>
			            			<td class="dataCell"><strong><?php echo $identifymc->provinceName ?></strong></td>
			            			<td class="dataCell"><strong>Code</strong></td>
			            			<td class="dataCell"><span><?php echo $identifymc->provinceCode ?></span></td>
			            		</tr>
			            		<tr valign="top">
						        	<td width="220" class="dataCell"><strong>Number of Municipalities</strong></td>
						        	<td width="200" class="dataCell"><span><?php echo $countMunicipality['total']; ?></span></td>
						            <td width="220" class="dataCell"><strong>Number of Barangays</strong></td>
						        	<td class="dataCell"><span><?php echo $totalBararangay['total']; ?></span></td>
					        	</tr>
			            	</tbody>
			            </table>			           
			        </div>
				<?php else: ?>
				<div class="box box-default">
			    	<div class="col-md-12 col-xs-12">
				        <div class="form-group"><br>
				            <h3 class="col-sm-12 col-xs-12">There are 
				               	<a href='<?php echo base_url('main_server/psgc_locations/municipalityList/'.$pc) ?>'><?php echo number_format($countAllMunicipalities['total']); ?></a> municipalities, 
				                   	<?php echo number_format($countAllbarangay['total']); ?> barangays. 
				            </h3>					                
				        </div>
			        </div>
			    </div>
				<?php endif ?>
				
			    <div class="col-md-12">
	                <div class="form-group"><br>
	                	<?php if (!empty($pc)): ?>
						<a href="<?php echo base_url('main_server/psgc_locations/municipalities/'.$pc); ?>" class="btn btn-info btn-flat" ><i class="fa fa-plus" name="add"></i> ADD MUNICIPALITY</a>
						<?php endif; ?>
					</div>
				</div>
				<input name="provinceid" class="hide" value="<?php echo $pc; ?>" id="provinceid" data-id="<?php echo $pc; ?>">
				<div class="panel-body">
					<div class="table_view col-xs-12">
						<div class="table-responsive">
							<table id="tableMunicipality" class="dataTables-wrapper form-inline dt-bootstrap table-hover">
								<thead>
									<tr>
										<th>#</th>
                    					<th>MUNICIPATY NAME</th> 
                    					<th>MUNICIPALITY CODE</th>              
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

