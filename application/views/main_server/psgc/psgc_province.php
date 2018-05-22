<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-success">
				<div class="panel-heading">
					<div class="panel-title"><i class="fa fa-list"></i><strong> LIST OF PROVINCE</strong></div>
				</div>
				<br>
				<?php if (!empty($provList)): ?>
					<div class="box box-default">
						<div class="col-md-12">
			                <div class="form-inline">
			                	<h3><?php echo "<strong>".$provList->regionName." - ".$provList->regionDesc."</strong>" ?></h3>
			                </div>
			            </div>
			            <div class="col-md-12">
			          	<table width="95%" border="0" cellpadding="3" cellspacing="1" class="table4">
					        <tr valign="top">
					        	<td width="40" class="dataCell"><strong>Code</strong></td>
					        	<td width="200" class="dataCell"><span><?php echo $provList->regionCode; ?></span></td>	
					        	<td width="200" class="dataCell"></td>
					        	<td width="200" class="dataCell"></td>
					        	<td width="200" class="dataCell"></td>
					        	<td width="200" class="dataCell"></td>
					        </tr>
					        <tr valign="top">
					        	<td width="220" class="dataCell"><strong>Number of Province</strong></td>
					        	<td width="200" class="dataCell"><span><?php echo $totalProvince['total']; ?></span></td>
					        	<td width="220" class="dataCell"><strong>Number of Municipalities</strong></td>
					        	<td width="200" class="dataCell"><span><?php echo $totalMunicipality['total']; ?></span></td>
					            <td width="220" class="dataCell"><strong>Number of Barangays</strong></td>
					        	<td class="dataCell"><span><?php echo $totalBararangay['total']; ?></span></td>
					        </tr>
					    </table>
			            </div>
			        </div>
				<?php else: ?>
				<div class="box box-default">
			    			<div class="col-md-12 col-xs-12">
				               	<div class="form-group">
				                   	<h3 class="col-sm-12 col-xs-12">There are 
				                   	<a href='<?php echo base_url('main_server/psgc_locations/provinceList') ?>'><?php echo number_format($countAllProvince['total']); ?></a> provinces, 
				                   	<a href='<?php echo base_url('main_server/psgc_locations/municipalityList') ?>'><?php echo number_format($countAllMunicipalities['total']); ?></a> municipalities, 
				                   	<?php echo number_format($countAllbarangay['total']); ?> barangays. 
				                   </h3>					                
				               	</div>
			            	</div>
			    		</div>
				<?php endif ?>
				
				<div class="col-md-12">
	                <div class="form-group"><br>
	                	<?php if (!empty($rc)): ?>
	                		<a href="<?php echo base_url('main_server/psgc_locations/province/'.$rc); ?>" class="btn btn-info btn-flat" ><i class="fa fa-plus" name="add"></i> ADD PROVINCE</a>	                	
	                	<?php endif ?>
					</div>
				</div>
				<input name="regionid" class="hidden" value="<?php echo $rc; ?>" id="regionid" data-id="<?php echo $rc; ?>">

				<div class="panel-body">
					<div class="table_view col-xs-12">
						<div class="table-responsive">
							<table id="tableProvince" class="dataTables-wrapper form-inline dt-bootstrap table-hover">
								<thead>
									<tr>
										<th>#</th>
										<th>PROVINCE NAME</th>
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

