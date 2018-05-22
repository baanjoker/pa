<input name="municipalid" class="hide" value="<?php echo $mc; ?>" id="municipalid" data-id="<?php echo $mc; ?>">
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-success">
				<div class="panel-heading">
					<div class="panel-title"><i class="fa fa-list"></i><strong> LIST OF BARANGAYS</strong></div>
				</div>
				<br>
				<?php if (!empty($identifybc)): ?>
				<div class="box box-default">
					<div class="col-md-12">
						<div class="form-inline">
							<h3><?php echo "MUNICIPALITY OF <strong>".$identifybc->municipalName."</strong>" ?></h3>
						</div>
					</div>
					<div class="col-md-12">
						<table width="95%" class="table4">
			            	<tbody>
			            		<tr valign="top">
			            			<td class="dataCell"><strong>Region</strong></td>
			            			<td class="dataCell"  style="width:40%">
			            				<a href='<?php echo base_url('main_server/psgc_locations/provinceList/'.$identifybc->id) ?>'><?php echo $identifybc->regionName." - ".$identifybc->regionDesc ?></a>
			            			</td>
			            			<td class="dataCell"><strong>Code</strong></td>
			            			<td class="dataCell"><span><?php echo $identifybc->regionCode ?></span></td>
			            		</tr>
			            		<tr>
			            			<td class="dataCell"><strong>Province</strong></td>
			            			<td class="dataCell">
			            				<a href='<?php echo base_url('main_server/psgc_locations/municipalityList/'.$identifybc->id_p) ?>'><?php echo $identifybc->provinceName ?></a>
			            			</td>
			            			<td class="dataCell"><strong>Code</strong></td>
			            			<td class="dataCell"><span><?php echo $identifybc->provinceCode ?></span></td>
			            		</tr>
			            		<tr>
			            			<td class="dataCell"><strong>Municipality</strong></td>
			            			<td class="dataCell"><strong><?php echo $identifybc->municipalName ?></strong></td>
			            			<td class="dataCell"><strong>Code</strong></td>
			            			<td class="dataCell"><span><?php echo $identifybc->municipalCode ?></span></td>
			            		</tr>
			            		<tr valign="top">
						            <td width="220" class="dataCell"><strong>Number of Barangays</strong></td>
						        	<td class="dataCell"><span><?php echo $totalBararangay['total']; ?></span></td>
						        	<td></td>
						        	<td></td>
					        	</tr>
			            	</tbody>
			            </table>
					</div>
				</div>
				<?php else: ?>
				<div class="box box-default">
			    	<div class="col-md-12 col-xs-12">
				        <div class="form-group">
				            <h3 class="col-sm-12 col-xs-12">There are 				               	
				                <a href='<?php echo base_url('main_server/psgc_locations/barangayList') ?>'><?php echo number_format($countAllbarangay['total']); ?></a> barangays. 
				            </h3>					                
				        </div>
			        </div>
			    </div>
				<?php endif; ?>
			    <div class="col-md-12">
	                <div class="form-group"><br>
						<a href="<?php echo base_url('main_server/psgc_locations/barangay/'.$mc); ?>" class="btn btn-info btn-flat" ><i class="fa fa-plus" name="add"></i> ADD BARANGAY</a>
					</div>
				</div>
				<div class="panel-body">
					<div class="table_view col-xs-12">
						<div class="table-responsive">
							<table id="tableBarangay" class="dataTables-wrapper form-inline dt-bootstrap table-hover">
								<thead>
									<tr>
										<th>#</th>
                    					<th>BARANGAY NAME</th>
                    					<th>BARANGAY CODE</th>              
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

