<?php echo $map['js']; ?>
<?php
 function generateRandomString($length = 11)
    {
        $char = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charlength = strlen($char);
        $randomString = '';
        for ($i=0; $i < $length; $i++) {
            $randomString .= $char[mt_rand(0, $charlength -1)];
        }
        return $randomString;
    }

$data_boundary = array(
    'name' => 'boundary',
    'id'   => 'boundary',
    'class'=> 'form-control border-input',
    'placeholder'=>'',
    'style' => 'height:130px'
);
$data_boundary_north = array(
    'name' => 'boundary_north',
    'id'   => 'boundary_north',
    'class'=> 'form-control border-input',
    'placeholder'=>'',
);

$data_boundary_east = array(
    'name' => 'boundary_east',
    'id'   => 'boundary_east',
    'class'=> 'form-control border-input',
    'placeholder'=>'',
);

$data_boundary_west = array(
    'name' => 'boundary_west',
    'id'   => 'boundary_west',
    'class'=> 'form-control border-input',
    'placeholder'=>'',
);
$data_boundary_south = array(
    'name' => 'boundary_south',
    'id'   => 'boundary_south',
    'class'=> 'form-control border-input',
    'placeholder'=>'',
);

$data_strict = array(
    'name' => 'strictzone',
    'id'   => 'strictzone',
    'class'=> 'form-control border-input',
    'placeholder'=>'Strict Protected zone',
    'style' => 'height:130px'
);

$data_multiple = array(
    'name' => 'multiplezone',
    'id'   => 'multiplezone',
    'class'=> 'form-control border-input',
    'placeholder'=>'Multiple used zone',
    'style' => 'height:130px'
);

$data_landuses = array(
    'name' => 'landuses',
    'id'   => 'landuses',
    'class'=> 'form-control border-input',
    'placeholder'=>'',
    'style' => 'height:130px'
);
$data_accessibility = array(
    'name' => 'accessibility',
    'id'   => 'accessibility',
    'class'=> 'form-control border-input',
    'placeholder'=>'',
    'style' => 'height:130px'
);
$data_legisno = array(
    'name' => 'legisno',
    'id'   => 'legisno',
    'class'=> 'form-control border-input',
    'type' => 'text',
    'placeholder'=>'Legislation No.');
$data_legisarea = array(
    'name' => 'area',
    'id'   => 'area',
    'class'=> 'form-control border-input',
    'type' => 'text',
    'placeholder'=>'Area (has.)',
	'onkeyup'=>'run(this)');
$data_legisterris = array(
    'name' => 'terrestrial',
    'id'   => 'terrestrial',
    'class'=> 'form-control border-input',
    'type' => 'text',
    'placeholder'=>'Area (has.)',
	'onkeyup'=>'run(this)');
$data_legisbuffer = array(
    'name' => 'buffer',
    'id'   => 'buffer',
    'class'=> 'form-control border-input',
    'type' => 'text',
    'placeholder'=>'Buffer Zone (has.)',
	'onkeyup'=>'run(this)');
$data_legismarinearea = array(
    'name' => 'marine',
    'id'   => 'marine',
    'class'=> 'form-control border-input',
    'type' => 'text',
    'placeholder'=>'Marine Area (has.)',
	'onkeyup'=>'run(this)');
$data_legispdf = array(
    'name' => 'picture',
    'id'   => 'picture',
    'class'=> 'form-control border-input',
    'type' => 'file',
    'placeholder'=>'PDF File');
?>
<div class="content">
		<div class="col-lg-12 col-sm-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title"><i class="ti-notepad"></i> Form</h4>
				</div>
				<div class="card-content">
					<div class="row">
						<div class="left-vertical-tabs center-tabs">
							<ul class="nav nav-stacked" role="tablist">
								<li class="active">
									<a href="#info" role="tab" data-toggle="tab" aria-expanded="true">General Information</a>
								</li>
								<li class="">
									<a href="#location" role="tab" data-toggle="tab" aria-expanded="true">Location</a>
								</li>
								<li class="">
									<a href="#proclamation" role="tab" data-toggle="tab" aria-expanded="true">Legal Basis</a>
								</li>
								<li class="">
									<a href="#biological" role="tab" data-toggle="tab" aria-expanded="true">Biological Features</a>
								</li>

								<?php if ($pamain->pamb_approve == '1'): ?>
								<li class="">
									<a href="#pamb" role="tab" id="pambmemberTabs" data-toggle="tab" aria-expanded="true">PAMB Member</a>
								</li>
								<?php else: ?>
								<li class="">
									<a href="#pamb" role="tab" id="pambmemberTab" data-toggle="tab" aria-expanded="true">PAMB Member</a>
								</li>
								<?php endif ?>

								<li class="">
									<a href="#physical" role="tab" data-toggle="tab" aria-expanded="true">Physical Features</a>
								</li>
								<li class="">
									<a href="#geohazard" role="tab" data-toggle="tab" aria-expanded="true">Geohazard Features</a>
								</li>
								<li class="">
									<a href="#socioeconomic" role="tab" data-toggle="tab" aria-expanded="true">Socio-economic</a>
								</li>
								<li class="">
									<a href="#uses" role="tab" data-toggle="tab" aria-expanded="true">Management Zone</a>
								</li>
								<li class="">
									<a href="#ecotourism" role="tab" data-toggle="tab" aria-expanded="true">Ecotourism</a>
								</li>
								<li class="">
									<a href="#projects" role="tab" data-toggle="tab" aria-expanded="true">Project Established</a>
								</li>
								<li class="">
									<a href="#threats" role="tab" data-toggle="tab" aria-expanded="true">Threats</a>
								</li>
								<!-- <li class="">
									<a href="#occupants" role="tab" data-toggle="tab" aria-expanded="true">Occupants</a>
								</li> -->
								<li class="">
									<a href="#references" role="tab" data-toggle="tab" aria-expanded="true">References</a>
								</li>
								<li class="">
									<a href="#map" role="tab" data-toggle="tab" aria-expanded="true">Map Image</a>
								</li>
								<!-- <li class="">
									<a href="#visitors" role="tab" data-toggle="tab" aria-expanded="true">Visitors Monitoring</a>
								</li> -->
							</ul>
						</div>
						<?php echo form_open_multipart('#','id="regFormMain" enctype="multipart/form-data"'); ?>
						<?php echo form_hidden('id_main',$pamain->id_main);?>
						<?php echo form_hidden('pasu_id',$pamain->pasu_id);?>
						<?php echo form_hidden('pasu_ids',$read->user_id);?>

						<?php if (!empty($pamain->id_main)): ?>
						    <input type="text" name="gencode" class="hide" value="<?php echo $pamain->generatedcode; ?>" id="codegen">
						    <input type="text" name="pasu_idd" class="hide" value="<?php echo $read->user_id; ?>" id="pasu_id">

						<?php else: ?>
							<input type="text" name="gencode" class="hide" value="<?php echo generateRandomString(); ?>" id="codegen">
						    <input type="text" name="pasu_idd" class="hide" value="<?php echo $read->user_id; ?>" id="pasu_id">

						<?php endif ?>
						<?php if (!empty($pamain->id_main)): ?>
					        <div class="col-lg-6">
					          <div class="form-group col-sm-12 col-xs-12">
					              <button type="button" name="btnlocation" id="submitlocation" onclick="insert_Main()" class="btn btn-success  btn-flat"><i class="ti-update"> UPDATE RECORD</i></button>
					          </div>
					        </div>
					        <?php else: ?>
					        <div class="col-lg-6">
					          <div class="form-group col-sm-12 col-xs-12">
					              <button type="button" name="btnlocation" id="submitlocation" onclick="insert_Main()" class="btn btn-primary  btn-flat"><i class="ti-save"> SAVE RECORD</i></button>
					          </div>
					        </div>
				        <?php endif ?>
						<div class="right-text-tabs">
								<div class="tab-content">
									<div class="tab-pane active" id="info">
										<div class="content">											
						                    <div class="row">
						                      	<div class="col-lg-6 col-sm-12">
						                        	<div class="form-group">
						                          		<label>Name of Protected Area</label>
						                          		<?= form_input('pa_name',$pamain->pa_name,'class="form-control border-input" placeholder="Name of Protected Area"') ?>
						                        	</div>
						                      	</div>
						                      	<div class="col-lg-6 col-sm-12">
						                        	<div class="form-group">
						                          		<label>Former name of Protected Area (a.k.a)</label>
						                          		<?= form_input('formerpa_name',$pamain->formerpaname,'class="form-control border-input" placeholder="Former name of Protected Area"') ?>
						                        	</div>
						                      	</div>					                      
						                    </div>
						                    <div class="row">
						                      	<div class="col-lg-6 col-sm-12">
						                        	<div class="form-group">
						                        		<label>Legal Status</label>
						                        		<?php echo form_dropdown('nip_id',$classList,$pamain->nip_id,'class="form-control border-input" id="nipid"') ?>
						                        	</div>
						                        </div>
						                        <div class="col-lg-6 col-sm-12">
						                        	<div class="form-group">
						                        		<label>Sub Legal Status</label>
						                        		<?php echo form_dropdown('paclasssub','',$pamain->nipsub_id,'class="form-control border-input" id="nipsub_id"') ?>
						                        		<span class="nip_error"></span>
						                        	</div>
						                        </div>
						                    </div>
						                    <div class="row">
						                    	<div class="col-lg-6 col-sm-12">
						                        	<div class="form-group">
						                        		<label>Category</label>
						                        		<?php echo form_dropdown('pacategory_id',$categoryList,$pamain->pacategory_id,'class="form-control border-input"') ?>
						                        	</div>
						                        </div>
						                    </div>
						                    <div class="row">
						                      	<div class="col-lg-6 col-sm-12">
						                        	<div class="form-group">
						                        		<label>Conservation Status</label>
						                        		<?php echo form_dropdown('cpabi_id',$cpabiList,$pamain->cpabi_id,'class="form-control border-input"') ?>
						                        	</div>
						                        </div>
						                        <div class="col-lg-6 col-sm-12">
						                        	<div class="form-group">
						                        		<label>Biogeographic Zone</label>
						                        		<?php echo form_dropdown('tbz_id',$zoneList,$pamain->tbz_id,'class="form-control border-input"') ?>
						                        	</div>
						                        </div>
						                    </div>	
						                    <div class="row">
						                    	<div class="col-lg-3 col-sm-12">
		                           					<div class="form-group">
		                           						<?= form_label('Terrestrial Area(has)') ?>
		                           						<?php echo form_input($data_legisterris,$pamain->terrestrial,'onchange="calculate()"'); ?>
		                           					</div>
		                           				</div>		                           								                    
						                    	<div class="col-lg-3 col-sm-12">
		                           					<div class="form-group">
		                           						<?= form_label('Marine Area(has)') ?>
		                           						<?php echo form_input($data_legismarinearea,$pamain->marine_area,'onchange="calculate()"'); ?>
		                           					</div>
		                           				</div>
		                           				<div class="col-lg-3 col-sm-12">
		                           					<div class="form-group">
		                           						<?= form_label('Buffer Zone(has)') ?>
		                           						<?php echo form_input($data_legisbuffer,$pamain->buffer); ?>
		                           					</div>
		                           				</div> 
		                           				<div class="col-lg-3 col-sm-12">
		                           					<div class="form-group">
		                           						<?= form_label('Total Area(has)') ?>
		                           						<?php echo form_input($data_legisarea,$pamain->area); ?>
		                           					</div>
		                           				</div>		                           				
		                           			</div>		                    
						                    
						                    <legend>Status of Accomplishments for NIPAS/ENIPAS Implementation</legend>
						                    <div class="row">					                    	
								                <div class="col-lg-3 col-sm-12">
								                	<div class="form-group">
													   <div class="checkbox checkbox-inline">
														   	<?= form_checkbox('mapstd',$pamain->nipas_mapstd,set_value('mapstd',$pamain->nipas_mapstd),'class="styled-checkbox" id="styled-checkbox-nipas_mapstd"') ?>
		    												<label for="styled-checkbox-nipas_mapstd">Maps and TDs</label>
													   </div>												  
													</div>
		                                        </div>
		                                        <div class="col-lg-3 col-sm-12">
								                	<div class="form-group">
													   <div class="checkbox checkbox-inline">
														   	<?= form_checkbox('pasa',$pamain->nipas_pasa,set_value('pasa',$pamain->nipas_pasa),'class="styled-checkbox" id="styled-checkbox-nipas_pasa"') ?>
		    												<label for="styled-checkbox-nipas_pasa">PASA</label>
													   </div>												  
													</div>
		                                        </div>
		                                        <div class="col-lg-3 col-sm-12">
							                    	<div class="form-group">
														<div class="checkbox checkbox-inline">
															<?= form_checkbox('ipafs',$pamain->nipas_ipaf,set_value('ipafs',$pamain->nipas_ipaf),'class="styled-checkbox" id="styled-checkbox-nipas_ipaf"') ?>
		    											<label for="styled-checkbox-nipas_ipaf">IPAF</label>
														</div>												  
													</div>
												</div>
		                                        <div class="col-lg-3 col-sm-12">
								                	<div class="form-group">
													   <div class="checkbox checkbox-inline">
														   	<?= form_checkbox('delineation',$pamain->nipas_delineation,set_value('delineation',$pamain->nipas_delineation),'class="styled-checkbox" id="styled-checkbox-nipas_delineation"') ?>
		    												<label for="styled-checkbox-nipas_delineation">Boundary Delineation</label>
													   </div>												  
													</div>
		                                        </div>
						                    </div>
						                    <div class="row">
						                    	<div class="col-lg-3 col-sm-12">
							                    	<div class="form-group">
														<div class="checkbox checkbox-inline">
															<?= form_checkbox('proclaimed',$pamain->nipas_proclaimed,set_value('proclaimed',$pamain->nipas_proclaimed),'class="styled-checkbox" id="styled-checkbox-nipas_proclaimed"') ?>
			    											<label for="styled-checkbox-nipas_proclaimed">Proclaimed</label>
														</div>												  
													</div>
												</div>
												<div class="col-lg-3 col-sm-12">
							                    	<div class="form-group">
														<div class="checkbox checkbox-inline">
															<?= form_checkbox('legislated',$pamain->nipas_legislated,set_value('legislated',$pamain->nipas_legislated),'class="styled-checkbox" id="styled-checkbox-nipas_legislated"') ?>
		    											<label for="styled-checkbox-nipas_legislated">Legislated</label>
														</div>												  
													</div>
												</div>
												<div class="col-lg-3 col-sm-12">
							                    	<div class="form-group">
														<div class="checkbox checkbox-inline">
															<?= form_checkbox('demarcation',$pamain->nipas_demarcation,set_value('demarcation',$pamain->nipas_demarcation),'class="styled-checkbox" id="styled-checkbox-nipas_demarcation"') ?>
		    											<label for="styled-checkbox-nipas_demarcation">Boundary Demarcation</label>
														</div>												  
													</div>
												</div>
												<div class="col-lg-3 col-sm-12">
							                    	<div class="form-group">
														<div class="checkbox checkbox-inline">
															<?= form_checkbox('pamp',$pamain->nipas_pamp,set_value('pamp',$pamain->nipas_pamp),'class="styled-checkbox" id="styled-checkbox-nipas_pamp"') ?>
		    												<label for="styled-checkbox-nipas_pamp">PAMP</label>
														</div>												  
													</div>
												</div>
						                    </div>
						                    <div class="row">
						                    	<div class="col-lg-3 col-sm-12">
						                        	<div class="form-group">
														<div class="checkbox checkbox-inline">
															<?php echo form_checkbox('pambcheck',$pamain->pamb_approve,set_value('pambcheck',$pamain->pamb_approve),'id="dateApprovePMB"'); ?>	
														    <label for="dateApprovePMB">
														 		PAMB Members
														    </label>
														</div>
								                    </div>
								                </div>
								                <?php if ($pamain->pamb_approve == TRUE): ?>
								                <div id="dateOrganizeds">
								                	<div class="col-lg-2 col-sm-12">
							                        	<div class="form-group">													
															<label>Date Approved</label>
									                    </div>
									                </div>
									                <div class="col-lg-3 col-sm-12">
							                        	<div class="form-group">
															<?php echo form_dropdown('pamb_month',$monthList,$pamain->pamb_month,'class="form-control border-input" id="dateMonthPAMB"') ?>
									                    </div>
									                </div>
									                <div class="col-lg-2 col-sm-12">
							                        	<div class="form-group">													
															<?php echo form_dropdown('pamb_day',$dayList,$pamain->pamb_day,'class="form-control border-input" id="dateDayPAMB"') ?>
									                    </div>
									                </div>
									                <div class="col-lg-2 col-sm-12">
							                        	<div class="form-group">													
															<?php echo form_dropdown('pamb_year',$yearList,$pamain->pamb_year,'class="form-control border-input" id="dateYearPAMB"') ?>
									                    </div>
									                </div>		
									                <div class="col-lg-12 col-sm-12">
									                		<div class="form-group">
									                			<p>Total PAMB Members: <?php echo $countpamb ?> </p>
									                		</div>
									                	</div>							                
									                <div class="danger">
														<p style="font-style: italic;color: red;background-color: #ffdddd;border-left: 6px solid #f44336;"><strong>Note!</strong> PAMB Members tab appeared.</p>
													</div>
													<div class="row">
									                	
									                </div>
								                </div>
								                <?php else: ?>
								                <div id="dateOrganized">
								                	<div class="col-lg-2 col-sm-12">
							                        	<div class="form-group">													
															<label>Date Approved</label>
									                    </div>
									                </div>
									                <div class="col-lg-3 col-sm-12">
							                        	<div class="form-group">
															<?php echo form_dropdown('pamb_month',$monthList,$pamain->pamb_month,'class="form-control border-input" id="dateMonthPAMB"') ?>
									                    </div>
									                </div>
									                <div class="col-lg-2 col-sm-12">
							                        	<div class="form-group">													
															<?php echo form_dropdown('pamb_day',$dayList,$pamain->pamb_day,'class="form-control border-input" id="dateDayPAMB"') ?>
									                    </div>
									                </div>
									                <div class="col-lg-2 col-sm-12">
							                        	<div class="form-group">													
															<?php echo form_dropdown('pamb_year',$yearList,$pamain->pamb_year,'class="form-control border-input" id="dateYearPAMB"') ?>
									                    </div>
									                </div>
									                <div class="danger">
														<p style="font-style: italic;color: red;background-color: #ffdddd;border-left: 6px solid #f44336;"><strong>Note!</strong> PAMB Members tab appeared.</p>
													</div>
									            </div>
									            <?php endif ?>
						                    </div>	
						                    			                    
						                </div>
									</div><!-- END OF INFO TAB -->
				                    <div class="tab-pane" id="location">
				                    	<div class="content">
				                    		<legend>Location</legend>
			                                <div class="row">
			                                	<div class="col-lg-1 col-sm-12">
			                                		<div class="form-group">
			                                    		<?= form_input('no','','class="form-control border-input hide" id="no" readonly'); ?>
			                                    	</div>
			                                    </div>
			                                </div>
			                                 <div class="row">
				                    			<div class="col-lg-3 col-sm-12">
				                    				<div class="form-group">
				                    					<?php echo form_dropdown('region_id',$regionList,'','class="form-control border-input" id="regid"') ?>
				                    					<span class="prov_error"></span>
				                    				</div>
				                    			</div>
				                    			<div class="col-lg-3 col-sm-12">
				                    				<div class="form-group">
				                    					<?php echo form_dropdown('province_id','','','class="form-control border-input" id="provid"') ?>
				                    					<span class="municipal_error"></span>
				                    				</div>
				                    			</div>
				                    			<div class="col-lg-3 col-sm-12">
				                    				<div class="form-group">
				                    					<?php echo form_dropdown('municipal_id','','','class="form-control border-input" id="munid"') ?>
				                    					<span class="barangay_error"></span>
				                    				</div>
				                    			</div>
				                    			<div class="col-lg-3 col-sm-12">
				                    				<div class="form-group">
				                    					<?php echo form_dropdown('barangay_id','','','class="form-control border-input" id="barid"') ?>
				                    					<span class="barangay_error"></span>
				                    				</div>
				                    			</div>
				                    		</div>
				                    	
		                                	<div align="left">
		                                		<input type="text" id="add_data" value="Add data to Table" class="btn btn-primary">	
										    </div><br>
										     <div class="table-responsive">
												<table id="data_table" class="table table-bordered table-bordered">
													<thead>
														<tr>
															<!-- <th>No.</th> -->
															<th>Region</th>
															<th>Province</th>
															<th>Municipality</th>
															<th>Barangay</th>
															<th class="hide">Status</th>
															<th class="hide">Code</th>
															<th></th>
															<!-- <th>Remove</th> -->
														</tr>
													</thead>
													<tbody id="tbody">
														
													</tbody>
												</table>
											</div>	
											<div class="table-responsive">
												<table id="table_sample" class="table table-bordered table-bordered hide">
													<thead>
														<tr>
															<!-- <th>No.</th> -->
															<th>Region</th>
															<th>Province</th>
															<th>Municipality</th>
															<th>Barangay</th>
															<th class="hide">Status</th>
															<th class="hide">Code</th>
															<th></th>
															<!-- <th>Remove</th> -->
														</tr>
													</thead>
													<tbody id="tbodys">
														
													</tbody>
												</table>
											</div>	
										    <!-- <div align="center">
										    	<button type="button" name="save" id="save" class="btn btn-info">Save</button>
										    </div> -->

										    <legend>Geographic Location</legend>

										    <div class="row">	
										    	<div class="col-lg-2 col-sm-12">
										    		<!-- <div class="form-group"> -->
										    			<?= form_label('Longitude','','class="form-control"') ?>
										    		<!-- </div> -->
										    	</div>							    	
										    	<div class="col-lg-5 col-sm-12">
										    		<div class="form-group">
										    			<?= form_input('long1',$pamain->geographic_long1,'class="form-control border-input"')?>
										    		</div>
										    	</div>
										    	<div class="col-lg-5 col-sm-12">
										    		<div class="form-group">									    			
										    			<?= form_input('long2',$pamain->geographic_long2,'class="form-control border-input"')?>
										    		</div>
										    	</div>
										    </div>

										    <div class="row">	
										    	<div class="col-lg-2 col-sm-12">
										    		<!-- <div class="form-group"> -->
										    			<?= form_label('Latitude','','class="form-control"') ?>
										    		<!-- </div> -->
										    	</div>							    	
										    	<div class="col-lg-5 col-sm-12">
										    		<div class="form-group">
										    			<?= form_input('lat1',$pamain->geographic_lat1,'class="form-control border-input"')?>
										    		</div>
										    	</div>
										    	<div class="col-lg-5 col-sm-12">
										    		<div class="form-group">									    			
										    			<?= form_input('lat2',$pamain->geographic_lat2,'class="form-control border-input"')?>
										    		</div>
										    	</div>
										    </div>

										    <legend>Other Area Information</legend>
										    <div class="row">
										    	<div class="col-lg-6 col-sm-12">
										    		<div class="form-group">
										    			<?= form_label('PA Boundary North')." ".
										    				form_input($data_boundary_north,$pamain->pa_boundary_north,'');
										    			?>
										    		</div>										    		
										    	</div>
										    	<div class="col-lg-6 col-sm-12">										    	
										    		<div class="form-group">
										    			<?= form_label('PA Boundary East')." ".
										    				form_input($data_boundary_east,$pamain->pa_boundary_east,'');
										    			?>
										    		</div>
										    	</div>
										    </div>
										    <div class="row">
										    	<div class="col-lg-6 col-sm-12">
										    		<div class="form-group">
										    			<?= form_label('PA Boundary West')." ".
										    				form_input($data_boundary_west,$pamain->pa_boundary_west,'');
										    			?>
										    		</div>										    		
										    	</div>
										    	<div class="col-lg-6 col-sm-12">										    	
										    		<div class="form-group">
										    			<?= form_label('PA Boundary South')." ".
										    				form_input($data_boundary_south,$pamain->pa_boundary_south,'');
										    			?>
										    		</div>
										    	</div>
										    </div>
										    
										    <div class="row">
										    	<div class="col-lg-12 col-sm-12">
										    		<div class="form-group">
										    			<?= form_label('Vegetative Cover')." ".
										    				form_textarea($data_landuses,$pamain->landuses,'');
										    			?>
										    		</div>
										    	</div>
										    </div>
										    <div class="row">
										    	<div class="col-lg-12 col-sm-12">
										    		<div class="form-group">
										    			<?= form_label('Accessibility')." ".
										    				form_textarea($data_accessibility,$pamain->accessibility,'');
										    			?>
										    		</div>
										    	</div>
										    </div>
										</div>
		                           	</div>		                           	
		                           	<div class="tab-pane" id="proclamation">
		                           		<div class="content">
		                           			<legend>Legal Basis</legend>
		                           			<div class="row">
		                           				<div class="col-lg-4 col-sm-12">
		                           					<div class="form-group">
		                           						<?= form_label('Legislation') ?>
		                           						<?= form_dropdown('legis_id',$procList,'','class="form-control border-input" id="legis_id"') ?>
		                           					</div>
		                           				</div>
		                           				<div class="col-lg-4 col-sm-12">
		                           					<div class="form-group">
		                           						<?= form_label('Legislation No.') ?>
		                           						<?= form_input('legisno','','class="form-control border-input" id="legisno"') ?>
		                           					</div>
		                           				</div>
		                           			</div>
		                           			<div class="row">
		                           				<div class="col-lg-3 col-sm-12">
		                           					<div class="form-group">
		                           						<?= form_label('Dated') ?>
		                           						<?php echo form_dropdown('date_month',$monthList,'','class="form-control border-input" id="month"'); ?>	
		                           					</div>
		                           				</div>
		                           				<div class="col-lg-2 col-sm-12">
		                           					<div class="form-group">
		                           						<?= form_label('&nbsp;') ?>
		                           						<?php echo form_dropdown('date_day',$dayList,'','class="form-control border-input" id="day"'); ?>	
		                           					</div>
		                           				</div>
		                           				<div class="col-lg-3 col-sm-12">
		                           					<div class="form-group">
		                           						<?= form_label('&nbsp;') ?>
		                           						<?php echo form_dropdown('date_year',$yearList,'','class="form-control border-input" id="year"'); ?>
		                           					</div>
		                           				</div>
		                           			</div>
		                           			<!--  -->	                           			
		                           			<div align="left">
		                                		<input type="text" id="addLegislation" value="Add data to Table" class="btn btn-primary">	
										    </div><br>
										     <div class="table-responsive">
												<table id="LegislationTable" class="table table-bordered table-bordered">
													<thead>
														<tr>
															<th>Legal Basis</th>
										    				<th>Dated</th>
														    <!-- <th>Area(hectares)</th> -->
														    <!-- <th>Buffer Zone(hectares)</th> -->
														    <!-- <th>FILE <br> ATTACHED</th> -->
														    <th>Remove</th>
														</tr>
													</thead>
													<tbody id="tbody_leg">													
													</tbody>
												</table>
											</div>	
											<div class="table-responsive">
												<table id="LegislationTable_sample" class="table table-bordered table-bordered hide">
													<thead>
														<tr>
															<th>Legal Basis</th>
										    				<th>Dated</th>
														    <!-- <th>Area(hectares)</th> -->
														    <!-- <th>Buffer Zone(hectares)</th> -->
														    <!-- <th>FILE <br> ATTACHED</th> -->
														    <th>Remove</th>
														</tr>
													</thead>
													<tbody id="tbody_legs">													
													</tbody>
												</table>
											</div>	
										    <!-- <div align="center">
										    	<button type="button" name="saveLegislation" id="saveLegislation" class="btn btn-info">Save</button>
										    </div> -->
		                           		</div>
		                           	</div>
		                           	<div class="tab-pane" id="biological">
		                           		<div class="content">
		                           			<legend>Biological Features</legend>
		                           			<div class="row">
		                           				<div class="col-lg-3 col-sm-12">
		                           					<div class="form-group">Category
		                           						<?php echo form_dropdown('wcategory',$wcategory,'','class="form-control border-input" id="idcat"'); ?>
		                           						<span class="class_error"></span>
		                           					</div>
		                           				</div>

		                           				<div class="col-lg-3 col-sm-12">
		                           					<div class="form-group">Order
		                           						<?php echo form_dropdown('wclass','','','class="form-control border-input" id="idclass"'); ?>
		                           						<span class="order_error"></span>
		                           					</div>
		                           				</div>

		                           				<div class="col-lg-3 col-sm-12">
		                           					<div class="form-group">Family Name
		                           						<?php echo form_dropdown('worder','','','class="form-control border-input" id="idorder"'); ?>
		                           						<span class="family_error"></span>
		                           					</div>
		                           				</div>

		                           				<div class="col-lg-3 col-sm-12">
		                           					<div class="form-group">Common Name
		                           						<?php echo form_dropdown('wfamily','','','class="form-control border-input" id="idfamily"'); ?>
		                           						<span class="common_error"></span>
		                           					</div>
		                           				</div>
		                           			</div>	                           		
		                           			<div class="row">
		                           				<div class="col-lg-3 col-sm-12">
		                           					<div class="form-group">Species Name
		                           						<?php echo form_dropdown('common','','','class="form-control border-input" id="commonid"'); ?>
		                           						<span id="category_id" class="categoryId hide"></span>
		                           						<span id="class_id" class="classId hide"></span>
		                           						<span id="order_id" class="orderId hide"></span>
		                           						<span id="family_id" class="familyId hide"></span>
		                           						<span id="scientific_id" class="scientificId hide"></span>
		                           						<span id="status_id" class="statusId hide">
		                           					</div>
		                           				</div>
		                           			</div>
		                           			<div class="row">
		                           				<div class="col-lg-4 col-sm-12">
		                           					<div align="left">
				                                		<input type="text" id="addbiological" value="Add data to Table" class="btn btn-primary">	
												    </div>
		                           				</div>
		                           			</div>
		                           
		                           			<div class="table-responsive">
										    	<table id="tablePABiolofeature" class="table table-hover table-bordered">
										    		<thead>
										    			<tr>
										    				<th>Conservation<br> Status</th>
										    				<th>Class</th>
										    				<th>Order</th>									    				
										    				<th>Common Name</th>
										    				<th>Scientific Name</th>
										    				<th>Remove</th>
										    			</tr>
										    		</thead>
										    		<tbody id="tbodybiological"></tbody>				    			
										    	</table>
										    </div>
										    <div class="table-responsive">
										    	<table id="tablePABiolofeature_sample" class="table table-hover table-bordered hide">
										    		<thead>
										    			<tr>
										    				<th>Conservation<br> Status</th>
										    				<th>Class</th>
										    				<th>Order</th>									    				
										    				<th>Common Name</th>
										    				<th>Scientific Name</th>
										    				<th>Remove</th>
										    			</tr>
										    		</thead>
										    		<tbody id="tbodybiologicals"></tbody>				    			
										    	</table>
										    </div>
		                           		</div>
		                           		<!-- <div align="center">
										    <button type="button" name="savebiological" id="savebiological" class="btn btn-info">Save</button>
										</div> -->
		                           	</div>
		                           	<div class="tab-pane" id="pamb">
		                           		<div class="content">
		                           			<legend>PAMB Member</legend>
		                           			<div class="row">
		                           				<div class="col-lg-4 col-lg-12">
		                           					<div class="form-group">
		                           						<?= 
		                           							form_label('First Name').''.
		                           							form_input('fname','','class="form-control border-input" id="fname" placeholder="First Name"');
		                           						?>
		                           					</div>
		                           				</div>
		                           				<div class="col-lg-4 col-lg-12">
		                           					<div class="form-group">
		                           						<?= 
		                           							form_label('Middle Name').''.
		                           							form_input('mname','','class="form-control border-input" id="mname" placeholder="Middle Name"');
		                           						?>
		                           					</div>
		                           				</div>
		                           				<div class="col-lg-4 col-lg-12">
		                           					<div class="form-group">
		                           						<?= 
		                           							form_label('Last Name').''.
		                           							form_input('lname','','class="form-control border-input" id="lname" placeholder="Last Name"');
		                           						?>
		                           					</div>
		                           				</div>
		                           			</div>
		                           			<div class="row">
		                           				<div class="col-lg-4 col-lg-12">
		                           					<div class="form-group">
		                           						<?= 
		                           							form_label('Sex').''.
		                           							form_dropdown('sex',$sexList,'','class="form-control border-input" id="sex"');
		                           						?>
		                           					</div>
		                           				</div>
		                           				<div class="col-lg-4 col-lg-12">
		                           					<div class="form-group hide">
		                           						<?= 
		                           							form_label('Marital Status').''.
		                           							form_dropdown('maritalstatus',$maritalStatus,'','class="form-control border-input" id="maritalstatus"');
		                           						?>
		                           					</div>
		                           				</div>
		                           			</div>
		                           			<div class="row hide">
		                           				<div class="col-lg-12 col-sm-12">
		                           					<div class="form-group">
		                           						<?= 
		                           							form_label('Residential Address').''.
		                           							form_input('address','','class="form-control border-input" id="address" placeholder="Residential Address"');
		                           						?>
		                           					</div>
		                           				</div>
		                           			</div>
		                           			<legend>Organization/Offices</legend>
		                           			<div class="row">
		                           				<div class="col-lg-4 col-sm-12">
		                           					<div class="form-group">
		                           						<?= 
		                           							form_label('Position').''.
		                           							// form_dropdown('position',$organizationposition,'','class="form-control border-input" id="position"');
		                           							form_input('position','','class="form-control border-input" id="position" placeholder="Position"');

		                           						?>
		                           					</div>
		                           				</div>		
		                           				<div class="col-lg-4 col-sm-12">
		                           					<div class="form-group">
		                           						<?= 
		                           							form_label('Organization/Offices').''.
		                           							form_input('office','','class="form-control border-input" id="office" placeholder="Organization/Offices"');
		                           						?>
		                           					</div>
		                           				</div>
		                           				<div class="col-lg-4 col-sm-12">
		                           					<div class="form-group">
		                           						<?= 
		                           							form_label('Organization/Offices Address').''.
		                           							form_input('officeaddress','','class="form-control border-input" id="officeaddress" placeholder="Organization/Offices Address"');
		                           						?>
		                           					</div>
		                           				</div>
		                           			</div>
		                           			<div class="row">
		                           				<div class="col-lg-6 col-sm-12">
		                           					Appointment Type
		                           					<div class="form-group">
		                           						Non-elective
		                           						<?php echo form_radio('appointment','','','class=""') ?><br>
		                           						Elective
		                           						<?php echo form_radio('appointment','','','class=""') ?>

		                           						<!-- <input id="appointment" name="appointment" type="radio" class="form-control" value="0" <?php echo $this->form_validation->set_radio('appointment', 0); ?> />
										                <label for="appointment" class="">Non-elective</label>

										                <input id="appointment" name="appointment" type="radio" class="form-control" value="1" <?php echo $this->form_validation->set_radio('appointment', 1); ?> />
										                <label for="appointment" class="">Elective</label> -->

		                           					</div>
		                           				</div>
		                           			</div>
		                           			<div class="row">
		                           				<div class="col-lg-3 col-sm-12">
		                           						Appointment Date
							                        	<div class="form-group">
															<?php echo form_dropdown('appointment_m',$monthList,'','class="form-control border-input" id="appointmentmonth"') ?>
									                    </div>
									                </div>
									                <div class="col-lg-2 col-sm-12">
									                	&nbsp;
							                        	<div class="form-group">													
															<?php echo form_dropdown('appointment_d',$dayList,'','class="form-control border-input" id="appointmentday"') ?>
									                    </div>
									                </div>
									                <div class="col-lg-2 col-sm-12">
									                	&nbsp;
							                        	<div class="form-group">													
															<?php echo form_dropdown('appointment_y',$yearListed,'','class="form-control border-input" id="appointmentyear"') ?>
									                    </div>
									                </div>
		                           			</div>
		                           			<div align="left">
				                                <input type="text" id="addpamb" value="Add data to Table" class="btn btn-primary">	
											</div><br>
											<div class="table-responsive">
										    	<table id="tablePAMBmember" class="table table-hover table-bordered">
							                		<thead>
							                			<tr>
							                				<th>Name</th>
							                				<th>Organization/Offices</th>
							                				<th>Position</th>
							                				<th>Date of Appointment</th>
							                				<th>Remove</th>
							                			</tr>
							                		</thead>
							                		<tbody id="tbodypamb"></tbody>
							                	</table>
										    </div>
										    <div class="table-responsive">
										    	<table id="tablePAMBmember_sample" class="table table-hover table-bordered hide">
							                		<thead>
							                			<tr>
							                				<th>Name</th>
							                				<th>Organization/Offices</th>
							                				<th>Postion</th>
							                				<th>Remove</th>
							                			</tr>
							                		</thead>
							                		<tbody id="tbodypambs"></tbody>
							                	</table>
										    </div>										    
		                           		</div>
		                           	</div>
		                           	<div class="tab-pane" id="physical">
		                           		<div class="content">
		                           			<legend>Physical Features</legend>
		                           			<div class="row">
		                           				<div class="col-lg-6 col-sm-12">
		                           					<div class="form-group">
		                           						<?= form_label('Highest Elevation')?>
		                           						<?= form_input('highestelev',$pamain->elevation_highest,'class="form-control border-input" placeholder="Highest Elevation" onkeyup="run(this)"') ?>
		                           					</div>
		                           				</div>
		                           				<div class="col-lg-6 col-sm-12">
		                           					<div class="form-group">
		                           						<?= form_label('Lowest Elevation')?>
		                           						<?= form_input('lowestelev',$pamain->elevation_lowest,'class="form-control border-input" placeholder="Lowest Elevation" onkeyup="run(this)"') ?>
		                           					</div>
		                           				</div>
		                           			</div>
		                           			<div class="row">
		                           				<div class="col-lg-12 col-sm-12">
		                           					<div class="form-group">
		                           						<div class="panel panel-border panel-default">
					    	                                <a data-toggle="collapse" href="#climate">
					    	                                    <div class="panel-heading">
					    	                                        <h4 class="panel-title">
					    	                                        	Climate Type
					    	                                        	<i class="ti-angle-down" ></i>
					    	                                        </h4>
					    	                                    </div>
					    	                                </a>
					    	                                <div id="climate" class="panel-collapse collapse">
					    	                                	<div class="panel-body">
					    	                                    	<div class="form-group">
						                           						<?= form_textarea('climate',$pamain->climate,'class="form-control border-input" placeholder="Climate Type"') ?>
						                           					</div>
					    	                                    </div>
					    	                                </div>
				    	                                </div>	
		                           					</div>
		                           				</div>
		                           			</div>
		                           			<div class="row">
		                           				<div class="col-lg-12 col-sm-12">
		                           					<div class="form-group">
		                           						<div class="panel panel-border panel-default">
					    	                                <a data-toggle="collapse" href="#topo">
					    	                                    <div class="panel-heading">
					    	                                        <h4 class="panel-title">
					    	                                        	Topology
					    	                                        	<i class="ti-angle-down" ></i>
					    	                                        </h4>
					    	                                    </div>
					    	                                </a>
					    	                                <div id="topo" class="panel-collapse collapse">
					    	                                	<div class="panel-body">
					    	                                    	<div class="form-group">
						                           						<?= form_textarea('topo',$pamain->topology,'class="form-control border-input" placeholder="Topology "') ?>
						                           					</div>
					    	                                    </div>
					    	                                </div>
				    	                                </div>	
		                           					</div>
		                           				</div>
		                           			</div>		                           			
		                           			<div class="row">
		                           				<div class="col-lg-12 col-sm-12">
		                           					<div class="form-group">
		                           						<div class="panel panel-border panel-default">
					    	                                <a data-toggle="collapse" href="#hydro">
					    	                                    <div class="panel-heading">
					    	                                        <h4 class="panel-title">
					    	                                        	Hydrology/River System 
					    	                                        	<i class="ti-angle-down" ></i>
					    	                                        </h4>
					    	                                    </div>
					    	                                </a>
					    	                                <div id="hydro" class="panel-collapse collapse">
					    	                                	<div class="panel-body">
					    	                                    	<div class="form-group">
						                           						<?= form_textarea('hydro',$pamain->hydrology,'class="form-control border-input" placeholder="Hydrology/River System "') ?>
						                           					</div>
					    	                                    </div>
					    	                                </div>
				    	                                </div>	
		                           					</div>
		                           				</div>
		                           			</div>
		                           			<div class="row">
		                           				<div class="col-lg-12 col-sm-12">
		                           					<div class="form-group">
		                           					    <div class="panel panel-border panel-default">
					    	                                <a data-toggle="collapse" href="#locations">
					    	                                    <div class="panel-heading">
					    	                                        <h4 class="panel-title">
					    	                                        	Location 
					    	                                        	<i class="ti-angle-down" ></i>
					    	                                        </h4>
					    	                                    </div>
					    	                                </a>
					    	                                <div id="locations" class="panel-collapse collapse">
					    	                                	<div class="panel-body">
					    	                                    	<div class="form-group">
						                           						<?= form_textarea('location',$pamain->location_details,'class="form-control border-input" placeholder="Location "') ?>
						                           					</div>
					    	                                    </div>
					    	                                </div>
				    	                                </div>      						
		                           					</div>
		                           				</div>
		                           			</div>
		                           			<div class="row">
		                           				<div class="col-lg-12 col-sm-12">
		                           					<div class="form-group">
		                           						<div class="panel panel-border panel-default">
					    	                                <a data-toggle="collapse" href="#landuse">
					    	                                    <div class="panel-heading">
					    	                                        <h4 class="panel-title">
					    	                                        	Existing Land Use 
					    	                                        	<i class="ti-angle-down" ></i>
					    	                                        </h4>
					    	                                    </div>
					    	                                </a>
					    	                                <div id="landuse" class="panel-collapse collapse">
					    	                                	<div class="panel-body">
					    	                                    	<div class="form-group">
						                           						<?= form_textarea('existing_landuse',$pamain->existing_landuse,'class="form-control border-input" placeholder="Existing Land Use "') ?>	
					    	                                    	</div>
					    	                                	</div>
				    	                                	</div>
				    	                                </div>
		                           					</div>
		                           				</div>
		                           			</div>	                           			
		                           			<div class="row">
		                           				<div class="col-lg-12 col-sm-12">
		                           					<div class="form-group">
		                           						<div class="panel panel-border panel-default">
					    	                                <a data-toggle="collapse" href="#soil">
					    	                                    <div class="panel-heading">
					    	                                        <h4 class="panel-title">
					    	                                        	Soil Profile 
					    	                                        	<i class="ti-angle-down" ></i>
					    	                                        </h4>
					    	                                    </div>
					    	                                </a>
					    	                                <div id="soil" class="panel-collapse collapse">
					    	                                	<div class="panel-body">
					    	                                    	<div class="form-group">
						                           						<?= form_textarea('soil',$pamain->soil,'class="form-control border-input" placeholder="Soil Profile"') ?>
						                           					</div>
					    	                                    </div>
					    	                                </div>
				    	                                </div>
		                           					</div>
		                           				</div>
		                           			</div>
		                           		</div>
		                           	</div>
		                           	<div class="tab-pane" id="geohazard">
		                           		<div class="content">
		                           			<legend>Geohazard Features</legend>
		                           			<div class="row">
		                           				<div class="col-lg-12 col-sm-12">
		                           					<div class="form-group">
		                           						<div class="panel panel-border panel-default">
					    	                                <a data-toggle="collapse" href="#landslide">
					    	                                    <div class="panel-heading">
					    	                                        <h4 class="panel-title">
					    	                                        	Landslide Susceptibility
					    	                                        	<i class="ti-angle-down" ></i>
					    	                                        </h4>
					    	                                    </div>
					    	                                </a>
					    	                                <div id="landslide" class="panel-collapse collapse">
					    	                                	<div class="panel-body">
					    	                                    	<div class="form-group">
						                           						<?= form_textarea('landslide',$pamain->landslide,'class="form-control border-input" placeholder="Landslide Susceptibility "') ?>
						                           					</div>
					    	                                    </div>
					    	                                </div>
				    	                                </div>
		                           					</div>
		                           				</div>
		                           			</div>
		                           			<div class="row">
		                           				<div class="col-lg-12 col-sm-12">
		                           					<div class="form-group">
		                           						<div class="panel panel-border panel-default">
					    	                                <a data-toggle="collapse" href="#flooding">
					    	                                    <div class="panel-heading">
					    	                                        <h4 class="panel-title">
					    	                                        	Flooding Susceptibility
					    	                                        	<i class="ti-angle-down" ></i>
					    	                                        </h4>
					    	                                    </div>
					    	                                </a>
					    	                                <div id="flooding" class="panel-collapse collapse">
					    	                                	<div class="panel-body">
					    	                                    	<div class="form-group">
						                           						<?= form_textarea('flooding',$pamain->flooding,'class="form-control border-input" placeholder="Flooding Susceptibility "') ?>
						                           					</div>
					    	                                    </div>
					    	                                </div>
				    	                                </div>
		                           					</div>
		                           				</div>
		                           			</div>
		                           			<div class="row">
		                           				<div class="col-lg-12 col-sm-12">
		                           					<div class="form-group">
		                           						<div class="panel panel-border panel-default">
					    	                                <a data-toggle="collapse" href="#sealevelrise">
					    	                                    <div class="panel-heading">
					    	                                        <h4 class="panel-title">
					    	                                        	Sea Level Rise
					    	                                        	<i class="ti-angle-down" ></i>
					    	                                        </h4>
					    	                                    </div>
					    	                                </a>
					    	                                <div id="sealevelrise" class="panel-collapse collapse">
					    	                                	<div class="panel-body">
					    	                                    	<div class="form-group">
						                           						<?= form_textarea('sealevelrise',$pamain->sealevelrise,'class="form-control border-input" placeholder="Sea Level Rise "') ?>
						                           					</div>
					    	                                    </div>
					    	                                </div>
				    	                                </div>
		                           					</div>
		                           				</div>
		                           			</div>
		                           			<div class="row">
		                           				<div class="col-lg-12 col-sm-12">
		                           					<div class="form-group">
		                           						<div class="panel panel-border panel-default">
					    	                                <a data-toggle="collapse" href="#tsunami">
					    	                                    <div class="panel-heading">
					    	                                        <h4 class="panel-title">
					    	                                        	Tsunami Susceptibility
					    	                                        	<i class="ti-angle-down" ></i>
					    	                                        </h4>
					    	                                    </div>
					    	                                </a>
					    	                                <div id="tsunami" class="panel-collapse collapse">
					    	                                	<div class="panel-body">
					    	                                    	<div class="form-group">
						                           						<?= form_textarea('tsunami',$pamain->tsunami,'class="form-control border-input" placeholder="Tsunami Susceptibility "') ?>
						                           					</div>
					    	                                    </div>
					    	                                </div>
				    	                                </div>
		                           					</div>
		                           				</div>
		                           			</div>
		                           		</div>
		                           	</div>
		                           	<div class="tab-pane" id="socioeconomic">
		                           		<div class="content">
		                           			<legend>Socio-economic</legend>
		                           			<div class="row">
		                           				<div class="col-lg-12 col-sm-12">
		                           					<div class="form-group">
		                           						<div class="panel panel-border panel-default">
					    	                                <a data-toggle="collapse" href="#ethinicity">
					    	                                    <div class="panel-heading">
					    	                                        <h4 class="panel-title">
					    	                                        	Ethinicity
					    	                                        	<i class="ti-angle-down" ></i>
					    	                                        </h4>
					    	                                    </div>
					    	                                </a>
					    	                                <div id="ethinicity" class="panel-collapse collapse">
					    	                                	<div class="panel-body">
					    	                                    	<div class="form-group">
						                           						<?= form_textarea('ethinicity',$pamain->ethinicity,'class="form-control border-input" placeholder="Ethinicity "') ?>
						                           					</div>
					    	                                    </div>
					    	                                </div>
				    	                                </div>
		                           					</div>
		                           				</div>
		                           			</div>
		                           			<div class="row">
		                           				<div class="col-lg-12 col-sm-12">
		                           					<div class="form-group">
		                           						<div class="panel panel-border panel-default">
					    	                                <a data-toggle="collapse" href="#demography">
					    	                                    <div class="panel-heading">
					    	                                        <h4 class="panel-title">
					    	                                        	Demography
					    	                                        	<i class="ti-angle-down" ></i>
					    	                                        </h4>
					    	                                    </div>
					    	                                </a>
					    	                                <div id="demography" class="panel-collapse collapse">
					    	                                	<div class="panel-body">
					    	                                    	<div class="form-group">
						                           						<?= form_textarea('demography',$pamain->demography,'class="form-control border-input" placeholder="Demography "') ?>
						                           					</div>
					    	                                    </div>
					    	                                </div>
				    	                                </div>
		                           					</div>
		                           				</div>
		                           			</div>
		                           			<div class="row">
		                           				<div class="col-lg-12 col-sm-12">
		                           					<div class="form-group">
		                           						<div class="panel panel-border panel-default">
					    	                                <a data-toggle="collapse" href="#livelihood">
					    	                                    <div class="panel-heading">
					    	                                        <h4 class="panel-title">
					    	                                        	Livelihood
					    	                                        	<i class="ti-angle-down" ></i>
					    	                                        </h4>
					    	                                    </div>
					    	                                </a>
					    	                                <div id="livelihood" class="panel-collapse collapse">
					    	                                	<div class="panel-body">
					    	                                    	<div class="form-group">
						                           						<?= form_textarea('livelihood',$pamain->livelihood,'class="form-control border-input" placeholder="Livelihood "') ?>
						                           					</div>
					    	                                    </div>
					    	                                </div>
				    	                                </div>
		                           					</div>
		                           				</div>
		                           			</div>
		                           			<div class="row">
		                           				<div class="col-lg-12 col-sm-12">
		                           					<div class="form-group">
		                           						<div class="panel panel-border panel-default">
					    	                                <a data-toggle="collapse" href="#socialservice">
					    	                                    <div class="panel-heading">
					    	                                        <h4 class="panel-title">
					    	                                        	Social Service
					    	                                        	<i class="ti-angle-down" ></i>
					    	                                        </h4>
					    	                                    </div>
					    	                                </a>
					    	                                <div id="socialservice" class="panel-collapse collapse">
					    	                                	<div class="panel-body">
					    	                                    	<div class="form-group">
						                           						<?= form_textarea('socialservice',$pamain->social_service,'class="form-control border-input" placeholder="Social Service "') ?>
						                           					</div>
					    	                                    </div>
					    	                                </div>
				    	                                </div>
		                           					</div>
		                           				</div>
		                           			</div>		                           			
		                           		</div>
		                           		<div class="content">
		                           			<legend>Anthropology</legend>
		                           			<div class="row">
		                           				<div class="col-lg-12 col-sm-12">
		                           					<div class="form-group">
		                           						<div class="panel panel-border panel-default">
					    	                                <a data-toggle="collapse" href="#Cultural">
					    	                                    <div class="panel-heading">
					    	                                        <h4 class="panel-title">
					    	                                        	Cultural Resource
					    	                                        	<i class="ti-angle-down" ></i>
					    	                                        </h4>
					    	                                    </div>
					    	                                </a>
					    	                                <div id="Cultural" class="panel-collapse collapse">
					    	                                	<div class="panel-body">
					    	                                    	<div class="form-group">
						                           						<?= form_textarea('culturalresource',$pamain->cultural_resource,'class="form-control border-input" placeholder="Cultural Resource "') ?>
						                           					</div>
					    	                                    </div>
					    	                                </div>
				    	                                </div>
		                           					</div>
		                           				</div>
		                           			</div>
		                           			<div class="row">
		                           				<div class="col-lg-12 col-sm-12">
		                           					<div class="form-group">
		                           						<div class="panel panel-border panel-default">
					    	                                <a data-toggle="collapse" href="#politics">
					    	                                    <div class="panel-heading">
					    	                                        <h4 class="panel-title">
					    	                                        	Politics
					    	                                        	<i class="ti-angle-down" ></i>
					    	                                        </h4>
					    	                                    </div>
					    	                                </a>
					    	                                <div id="politics" class="panel-collapse collapse">
					    	                                	<div class="panel-body">
					    	                                    	<div class="form-group">
						                           						<?= form_textarea('politics',$pamain->politics,'class="form-control border-input" placeholder="Politics "') ?>
						                           					</div>
					    	                                    </div>
					    	                                </div>
				    	                                </div>
		                           					</div>
		                           				</div>
		                           			</div>
		                           			<div class="row">
		                           				<div class="col-lg-12 col-sm-12">
		                           					<div class="form-group">
		                           						<div class="panel panel-border panel-default">
					    	                                <a data-toggle="collapse" href="#belief">
					    	                                    <div class="panel-heading">
					    	                                        <h4 class="panel-title">
					    	                                        	Custom Belief
					    	                                        	<i class="ti-angle-down" ></i>
					    	                                        </h4>
					    	                                    </div>
					    	                                </a>
					    	                                <div id="belief" class="panel-collapse collapse">
					    	                                	<div class="panel-body">
					    	                                    	<div class="form-group">
						                           						<?= form_textarea('belief',$pamain->belief,'class="form-control border-input" placeholder="Custom Belief "') ?>
						                           					</div>
					    	                                    </div>
					    	                                </div>
				    	                                </div>
		                           					</div>
		                           				</div>
		                           			</div>
		                           			<div class="row">
		                           				<div class="col-lg-12 col-sm-12">
		                           					<div class="form-group">
		                           						<div class="panel panel-border panel-default">
					    	                                <a data-toggle="collapse" href="#archeology">
					    	                                    <div class="panel-heading">
					    	                                        <h4 class="panel-title">
					    	                                        	Archeology
					    	                                        	<i class="ti-angle-down" ></i>
					    	                                        </h4>
					    	                                    </div>
					    	                                </a>
					    	                                <div id="archeology" class="panel-collapse collapse">
					    	                                	<div class="panel-body">
					    	                                    	<div class="form-group">
						                           						<?= form_textarea('archeology',$pamain->archeology,'class="form-control border-input" placeholder="Archeology "') ?>
						                           					</div>
					    	                                    </div>
					    	                                </div>
				    	                                </div>
		                           					</div>
		                           				</div>
		                           			</div>
		                           		</div>
		                           		<div class="content">
		                           			<legend>Occupants</legend>
		                           			<div class="row">
		                           				<div class="col-lg-6 col-sm-12">
		                           					<div class="form-group">
		                           						<?= 
		                           						form_label('Household Tag No.').''.
		                           						form_input('householdtag','','class="form-control border-input" placeholder="Household Tag No." id="householdtag"');
		                           						?>
		                           					</div>
		                           				</div>
		                           				<div class="col-lg-6 col-sm-12">
		                           					<div class="form-group">
		                           						<?= 
		                           						form_label('Tribe').''.
		                           						form_dropdown('tribe',$tribelist,'','class="form-control border-input" id="tribe"');
		                           						?>
		                           					</div>
		                           				</div>
		                           			</div>
		                           			<div class="row">
		                           				<div class="col-lg-4 col-sm-12">
		                           					<div class="form-group">
		                           						<?= 
		                           						form_label('Date Occupied').''.
		                           						form_dropdown('month_occupied',$monthList,'','class="form-control border-input" id="month_occupied"')
		                           						?>
		                           					</div>
		                           				</div>
		                           				<div class="col-lg-4 col-sm-12">
		                           					<div class="form-group">
		                           						<?= 
		                           						form_label('&nbsp').''.
		                           						form_dropdown('day_occupied',$dayList,'','class="form-control border-input" id="day_occupied"')
		                           						?>
		                           					</div>
		                           				</div>
		                           				<div class="col-lg-4 col-sm-12">
		                           					<div class="form-group">
		                           						<?= 
		                           						form_label('&nbsp').''.
		                           						form_dropdown('year_occupied',$yearList,'','class="form-control border-input" id="year_occupied"');
		                           						?>
		                           					</div>
		                           				</div>
		                           			</div>
		                           			<div class="row">
		                           				<div class="col-lg-4 col-sm-12">
		                           					<div class="form-group">
		                           						<?= 
		                           						form_label('First Name').''.
		                           						form_input('tribe_fname','','class="form-control border-input" placeholder="First Name" id="tribe_fname"');
		                           						?>
		                           					</div>
		                           				</div>
		                           				<div class="col-lg-4 col-sm-12">
		                           					<div class="form-group">
		                           						<?= 
		                           						form_label('Middle Name').''.
		                           						form_input('tribe_mname','','class="form-control border-input" placeholder="Middle Name" id="tribe_mname"');
		                           						?>
		                           					</div>
		                           				</div>
		                           				<div class="col-lg-4 col-sm-12">
		                           					<div class="form-group">
		                           						<?= 
		                           						form_label('Last Name').''.
		                           						form_input('tribe_lname','','class="form-control border-input" placeholder="Last Name" id="tribe_lname"');
		                           						?>
		                           					</div>
		                           				</div>
		                           			</div>
		                           			<div class="row">
		                           				<div class="col-lg-4 col-sm-12">
		                           					<div class="form-group">
		                           						<?= 
		                           						form_label('Relation').''.
		                           						form_dropdown('tribe_relation',$triberelation,'','class="form-control border-input" id="tribe_relation"')
		                           						?>
		                           					</div>
		                           				</div>
		                           				<div class="col-lg-4 col-sm-12">
		                           					<div class="form-group">
		                           						<?= 
		                           						form_label('Sex').''.
		                           						form_dropdown('tribe_gender',$sexList,'','class="form-control border-input" id="tribe_gender"')
		                           						?>
		                           					</div>
		                           				</div>
		                           				<div class="col-lg-4 col-sm-12">
		                           					<div class="form-group">
		                           						<?= 
		                           						form_label('Marital Status').''.
		                           						form_dropdown('tribe_maritalstatus',$maritalStatus,'','class="form-control border-input" id="tribe_maritalstatus"')
		                           						?>
		                           					</div>
		                           				</div>
		                           			</div>
		                           			<div align="left">
		                                		<input type="text" id="addTribe" value="Add data to Table" class="btn btn-primary">	
										    </div><br>
		                           			<div class="table-responsive">   					
												<table id="tabletribe" class="table table-hover table-bordered">
													<thead>
														<tr>
														    <th>Tag no.</th>								           
														    <th>Occupied Date</th>
														    <th>Tribe</th>
														    <th>Fullname</th>
														    <th>Relation</th>
														    <th>Sex</th>
														    <th>Remove</th>
														</tr>
									 				</thead>
													<tbody id="tbodytribe"></tbody>
												</table>
											</div>
											<div class="table-responsive">   					
												<table id="tabletribe_sample" class="table table-hover table-bordered hide">
													<thead>
														<tr>
														    <th>Tag no.</th>								           
														    <th>Occupied Date</th>
														    <th>Tribe</th>
														    <th>Fullname</th>
														    <th>Relation</th>
														    <th>Sex</th>
														    <th>Remove</th>
														</tr>
									 				</thead>
													<tbody id="tbodytribes"></tbody>
												</table>
											</div>
											<!-- <div align="center">
										    	<button type="button" name="saveTribe" id="saveTribe" class="btn btn-info">Save</button>
										    </div> -->
		                           		</div>
		                           	</div>
		                           	<div class="tab-pane" id="uses">
		                           		<div class="content">
		                           			<legend>Management Zone</legend>
		                           			<div class="row">
		                           				<div class="col-lg-12 col-sm-12">
		                           					<div class="form-group">
		                           						<div class="panel panel-border panel-default">
					    	                                <a data-toggle="collapse" href="#tourism">
					    	                                    <div class="panel-heading">
					    	                                        <h4 class="panel-title">
					    	                                        	Tourism Purposes
					    	                                        	<i class="ti-angle-down" ></i>
					    	                                        </h4>
					    	                                    </div>
					    	                                </a>
					    	                                <div id="tourism" class="panel-collapse collapse">
					    	                                	<div class="panel-body">
					    	                                    	<div class="form-group">
						                           						<?= form_textarea('tourism',$pamain->tourism,'class="form-control border-input" placeholder="Tourism "') ?>
						                           					</div>
					    	                                    </div>
					    	                                </div>
				    	                                </div>
		                           					</div>
		                           				</div>
		                           			</div>
		                           			<div class="row">
		                           				<div class="col-lg-12 col-sm-12">
		                           					<div class="form-group">
		                           						<div class="panel panel-border panel-default">
					    	                                <a data-toggle="collapse" href="#facilities">
					    	                                    <div class="panel-heading">
					    	                                        <h4 class="panel-title">
					    	                                        	Facilities Purposes
					    	                                        	<i class="ti-angle-down" ></i>
					    	                                        </h4>
					    	                                    </div>
					    	                                </a>
					    	                                <div id="facilities" class="panel-collapse collapse">
					    	                                	<div class="panel-body">
					    	                                    	<div class="form-group">
						                           						<?= form_textarea('facility',$pamain->facilities,'class="form-control border-input" placeholder="Facilities "') ?>
						                           					</div>
					    	                                    </div>
					    	                                </div>
				    	                                </div>
		                           					</div>
		                           				</div>
		                           			</div>
		                           			<div class="row">
		                           				<div class="col-lg-12 col-sm-12">
		                           					<div class="form-group">
		                           						<div class="panel panel-border panel-default">
					    	                                <a data-toggle="collapse" href="#research">
					    	                                    <div class="panel-heading">
					    	                                        <h4 class="panel-title">
					    	                                        	Science and Research Purposes
					    	                                        	<i class="ti-angle-down" ></i>
					    	                                        </h4>
					    	                                    </div>
					    	                                </a>
					    	                                <div id="research" class="panel-collapse collapse">
					    	                                	<div class="panel-body">
					    	                                    	<div class="form-group">
						                           						<?= form_textarea('research',$pamain->science_research,'class="form-control border-input" placeholder="Science and Research "') ?>
						                           					</div>
					    	                                    </div>
					    	                                </div>
				    	                                </div>
		                           					</div>
		                           				</div>
		                           			</div>
		                           			<div class="row">
		                           				<div class="col-lg-12 col-sm-12">
		                           					<div class="form-group">
		                           						<div class="panel panel-border panel-default">
					    	                                <a data-toggle="collapse" href="#educational">
					    	                                    <div class="panel-heading">
					    	                                        <h4 class="panel-title">
					    	                                        	Educational Purposes
					    	                                        	<i class="ti-angle-down" ></i>
					    	                                        </h4>
					    	                                    </div>
					    	                                </a>
					    	                                <div id="educational" class="panel-collapse collapse">
					    	                                	<div class="panel-body">
					    	                                    	<div class="form-group">
						                           						<?= form_textarea('educational',$pamain->educational,'class="form-control border-input" placeholder="Educational Purposes "') ?>
						                           					</div>
					    	                                    </div>
					    	                                </div>
				    	                                </div>
		                           					</div>
		                           				</div>
		                           			</div>
		                           		</div>
		                           	</div>
		                           	<div class="tab-pane" id="ecotourism">
		                           		<div class="card-content">
		                           			<ul class="nav nav-pills">
		            						<li class="active" style="width: 40%;"><a href="#tab1" data-toggle="tab" aria-expanded="true">Integrated Protected Area Fund</a></li>
		            						<li style="width: 40%;"><a href="#tab2" data-toggle="tab">Ecotourism</a></li>		            						
		            					</ul>
		            					<br>
		            					<div class="tab-content">
		            					    <div class="tab-pane active" id="tab1">
		                                        <legend>Integrated Protected Area Fund</legend>
		                                        <div class="row">
		                           				<h5>Date</h5>
		                           						<div class="col-lg-3 col-sm-12">
				                           					<div class="form-group">
				                           						<?=
				                           						form_label('Month').' '.
				                           						form_dropdown('month_monitoring',$monthListed,'','class="form-control border-input" id="monitor_months"')
				                           						?>				                           						
				                           					</div>
				                           				</div>
				                           				<div class="col-lg-2 col-sm-12">
				                           					<div class="form-group">
				                           						<?= form_label('Day').' '.
				                           						 form_dropdown('date_monitoring',$dayList,'','class="form-control border-input" id="monitor_days"')
				                           						 ?>
				                           					</div>
				                           				</div>	
				                           				<div class="col-lg-3 col-sm-12">
				                           					<div class="form-group">
				                           						<?=
				                           						form_label('Year').' '.
				                           						form_dropdown('year_monitoring',$yearListed,'','class="form-control border-input" id="monitor_years"')
				                           						?>
				                           					</div>
				                           				</div>
		                           			</div><hr>
		                           			<div class="row">
		                           				<h5>No. of Visitors Monitoring</h5>
		                           				<div class="col-lg-2 col-sm-12">
		                           					<div class="form-group">
		                           						<?= 
		                           							form_label('No. of Local Male').' '.
		                           							form_input('locMale','','class="form-control border-input blank" id="locMale"');
		                           						?>
		                           					</div>
		                           				</div>
		                           				<div class="col-lg-2 col-sm-12">
		                           					<div class="form-group">
		                           						<?= 
		                           							form_label('No. of Local Female').' '.
		                           							form_input('locFemale','','class="form-control border-input blank" id="locFemale"');
		                           						?>
		                           					</div>
		                           				</div>
		                           				<div class="col-lg-2 col-sm-12">
		                           					<div class="form-group">
		                           						<?= 
		                           							form_label('No. of Foreign Male').' '.
		                           							form_input('forMale','','class="form-control border-input blank" id="forMale"');
		                           						?>
		                           					</div>
		                           				</div>
		                           				<div class="col-lg-2 col-sm-12">
		                           					<div class="form-group">
		                           						<?= 
		                           							form_label('No. of Foreign Female').' '.
		                           							form_input('forFemale','','class="form-control border-input blank" id="forFemale"');
		                           						?>
		                           					</div>
		                           				</div>
		                           			</div><hr>
		                           			<div class="row">
		                           				<h5>PA Visitors</h5>
		                           				<div class="col-lg-2 col-sm-12">
		                           					<div class="form-group">
		                           						<?= 
		                           							form_label('Adults').' '.
		                           							form_input('fil_adults','','class="form-control border-input blank" id="fil_adults"');
		                           						?>
		                           					</div>
		                           				</div>		                           			
		                           				<div class="col-lg-2 col-sm-12">
		                           					<div class="form-group">
		                           						<?= 
		                           							form_label('Students').' '.
		                           							form_input('fil_students','','class="form-control border-input blank" id="fil_students"');
		                           						?>
		                           					</div>
		                           				</div>		                           			
		                           				<div class="col-lg-2 col-sm-12">
		                           					<div class="form-group">
		                           						<?= 
		                           							form_label('Person with Disability').' '.
		                           							form_input('fil_distab','','class="form-control border-input blank" id="fil_distab"');
		                           						?>
		                           					</div>
		                           				</div>
		                           				<div class="col-lg-2 col-sm-12">
		                           					<div class="form-group">
		                           						<?= 
		                           							form_label('Foreigner').' '.
		                           							form_input('foreigner','','class="form-control border-input blank" id="foreigner"');
		                           						?>
		                           					</div>
		                           				</div>
		                           			</div><hr>

		                           			<div class="row">
		                           				<h5>PA Facilities</h5>
		                           				<div class="col-lg-2 col-sm-12">
		                           					<div class="form-group">
		                           						<?=
		                           							form_label('Picnic Table').' '.
		                           							form_input('picnic_table','','class="form-control border-input blank" id="picnic_table"');
		                           						?>
		                           					</div>
		                           				</div>
		                           				<div class="col-lg-2 col-sm-12">
		                           					<div class="form-group">
		                           						<?=
		                           							form_label('cottages/day').' '.
		                           							form_input('cottages_day','','class="form-control border-input blank" id="cottages_day"').' '.
		                           							form_label('cottages/night').' '.
		                           							form_input('cottages_night','','class="form-control border-input blank" id="cottages_night"');
		                           						?>
		                           					</div>
		                           				</div>
		                           				<div class="col-lg-2 col-sm-12">
		                           					<div class="form-group">
		                           						<?=
		                           							form_label('Camping Site').' '.
		                           							form_input('camping','','class="form-control border-input blank" id="camping"');
		                           						?>
		                           					</div>
		                           				</div>
		                           				<div class="col-lg-2 col-sm-12">
		                           					<div class="form-group">
		                           						<?=
		                           							form_label('Swimming Pool').' '.
		                           							form_input('swimming','','class="form-control border-input blank" id="swimming"');
		                           						?>
		                           					</div>
		                           				</div>
		                           				<div class="col-lg-2 col-sm-12">
		                           					<div class="form-group">
		                           						<?=
		                           							form_label('Sports Facilities/daytime').' '.
		                           							form_input('daytime','','class="form-control border-input blank" id="daytime"').' '.
		                           							form_label('For Lights').' '.
		                           							form_input('lights','','class="form-control border-input blank" id="lights"');
		                           						?>
		                           					</div>
		                           				</div>
		                           				<div class="col-lg-2 col-sm-12">
		                           					<div class="form-group">
		                           						<?=
		                           							form_label('Docking Area').' '.
		                           							form_input('docking','','class="form-control border-input blank" id="docking"').' '.
		                           							form_label('Special Docking Area').' '.
		                           							form_input('sdocking','','class="form-control border-input blank" id="sdocking"');
		                           						?>
		                           					</div>
		                           				</div>
		                           			</div><hr>
		                           			<div class="row">
		                           				<h5>Parking Area</h5>
		                           				<div class="col-lg-2 col-sm-12">
		                           					<div class="form-group">
		                           						<?=
		                           							form_label('Tricycle/Motorcycle').' '.
		                           							form_input('tricycle','','class="form-control border-input blank" id="tricycle"');
		                           						?>
		                           					</div>
		                           				</div>
		                           				<div class="col-lg-2 col-sm-12">
		                           					<div class="form-group">
		                           						<?=
		                           							form_label('Car/SUV').' '.
		                           							form_input('car','','class="form-control border-input blank" id="car"');
		                           						?>
		                           					</div>
		                           				</div>
		                           				<div class="col-lg-2 col-sm-12">
		                           					<div class="form-group">
		                           						<?=
		                           							form_label('Passanger Jeep/Coaster').' '.
		                           							form_input('jeep','','class="form-control border-input blank" id="jeep"');
		                           						?>
		                           					</div>
		                           				</div>
		                           				<div class="col-lg-2 col-sm-12">
		                           					<div class="form-group">
		                           						<?=
		                           							form_label('Mini/Tour Bus').' '.
		                           							form_input('bus','','class="form-control border-input blank" id="bus"');
		                           						?>
		                           					</div>
		                           				</div>
		                           			</div><hr>
		                           			<div class="row">
		                           				<h5>Recreational Activity</h5>
		                           				<div class="col-lg-2 col-sm-12">
		                           					<div class="form-group">
		                           						<?=
		                           							form_label("Water-based activities <br> For Filipinos").' '.
		                           							form_input('waterfil','','class="form-control border-input blank" id="waterfil"').' '.
		                           							form_label('For Foreigners').' '.
		                           							form_input('waterfor','','class="form-control border-input blank" id="waterfor"');
		                           						?>
		                           					</div>
		                           				</div>
		                           				<div class="col-lg-2 col-sm-12">
		                           					<div class="form-group">
		                           						<?=
		                           							form_label("Hiking and biking <br> For Filipinos").' '.
		                           							form_input('hikingfil','','class="form-control border-input blank" id="hikingfil"').' '.
		                           							form_label('For Foreigners').' '.
		                           							form_input('hikingfor','','class="form-control border-input blank" id="hikingfor"');
		                           						?>
		                           					</div>
		                           				</div>
		                           			</div><hr>
		                           			<div class="row">
		                           				<h5>Documentation and Photography</h5>		                           				
		                           				<div class="col-lg-2 col-sm-12">
		                           					<div class="form-group">
		                           						<?=
		                           							form_input('documentation','','class="form-control border-input blank" id="documentation"');		                           							
		                           						?>
		                           					</div>
		                           				</div>		                           				
		                           			</div><hr>
		                           			<div class="row">
		                           				<h5>Trekking, Biking, Mountain Climbing and Caving</h5>		                           				
		                           				<div class="col-lg-2 col-sm-12">
		                           					<div class="form-group">
		                           						<?=
		                           							form_label("For Filipinos").' '.
		                           							form_input('trekkingfil','','class="form-control border-input blank" id="trekkingfil"').' '.
		                           							form_label('For Foreigners').' '.
		                           							form_input('trekkingfor','','class="form-control border-input blank" id="trekkingfor"');                           							
		                           						?>
		                           					</div>
		                           				</div>		                           				
		                           			</div><hr>
		                           			<div class="row">
		                           				<h5>SCUBA diving, Whitewater Rafting and Non-Motorized Watersports</h5>		                           				
		                           				<div class="col-lg-2 col-sm-12">
		                           					<div class="form-group">
		                           						<?=
		                           							form_label("For Filipinos").' '.
		                           							form_input('scubafil','','class="form-control border-input blank" id="scubafil"').' '.
		                           							form_label('For Foreigners').' '.
		                           							form_input('scubafor','','class="form-control border-input blank" id="scubafor"');                           							
		                           						?>
		                           					</div>
		                           				</div>		                           				
		                           			</div><hr>
		                           			<div align="center">
										    	<!-- <button type="button" name="saveecotourism" id="saveecotourism" class="btn btn-info">Add data to Table</button> -->
										    	<input type="text" id="saveecotourism" value="Add data to Table" class="btn btn-primary">
										    </div>
											<div class="table-responsive"><br>
										        <table id="tableEcoTourism" class="table table-hover table-bordered">
											        <thead>
											            <tr>
											            	<th>Date</th>
											            	<th>Visitors</th>
											            	<th>Facilities</th>
											            	<th>Parking Area</th>
											            	<th>Others</th>
											            	<th>Remove</th>
											            </tr>
											        </thead>
											        <tbody id="tbodyeco"></tbody>
										        </table>
									    	</div>
									    	<div class="table-responsive"><br>
										        <table id="tableEcoTourism_sample" class="table table-hover table-bordered hide">
											        <thead>
											            <tr>
											            	<th>Date</th>
											            	<th>Visitors</th>
											            	<th>Facilities</th>
											            	<th>Parking Area</th>
											            	<th>Others</th>
											            	<th>Remove</th>
											            </tr>
											        </thead>
											        <tbody id="tbodyeco_sample"></tbody>
										        </table>
									    	</div>
		                           		</div>
		            					    <div class="tab-pane" id="tab2">
		                                        <legend>Ecotourism</legend>
		                                        <div class="content">
		                           			<legend>Attraction</legend>
		                           			<div class="row">
		                           				<div class="col-lg-4 col-sm-12">
		                           					<div class="form-group">
		                           						<img width="200px" height="180px" id="blahsattr" src="<?php echo base_url("bmb_assets2/upload/attraction_img/nophoto.jpg") ?>" alt="your image" />
		                           						<br>
										                <input type='file' name="pic_attr" id="pic_attr" onchange="readURLattrib(this);"  /><br>
										                <input type="hidden" name="old_picture" value="nophoto.jpg"> 
		                           					</div>
		                           				</div>
		                           				<div class="col-lg-8 col-sm-12">
		                           					<div class="form-group">
		                           						<?=
		                           						form_label('Attraction Title').''.
		                           						form_input('attraction','','class="form-control border-input" placeholder="Attraction Title" id="attraction"').''.
		                           						form_label('Attraction Description').''.
		                           						form_textarea('description2','','class="form-control border-input" placeholder="Attraction " id="description2"') ?>
		                           					</div>
		                           				</div>
		                           			</div>
		                           			<div align="center">
										    	<button type="button" name="saveattr" onclick="insert_attraction()" id="saveattr" class="btn btn-info">Add data to Table</button>
										    </div>
											<div class="table-responsive"><br>
										        <table id="tableAttraction" class="table table-hover table-bordered">
											        <thead>
											            <tr>
											            	<th>Image</th>
											            	<th>Title</th>
											            	<th>Descriptions</th>
											            	<th>Download</th>
											            	<th>REMOVE</th>
											            </tr>
											        </thead>
											        <tbody id="tbodyimageattraction"></tbody>
										        </table>
										        	
		                           		</div>

		                           		<div class="content">
		                           			<legend>Facilities</legend>
		                           			<div class="row">
		                           				<div class="col-lg-4 col-sm-12">
		                           					<div class="form-group">
		                           						<img width="200px" height="180px" id="blahsfacility" src="<?php echo base_url("bmb_assets2/upload/facilities_img/nophoto.jpg") ?>" alt="your image" /><br>
										                <input type='file' name="pic_facilities" id="pic_facilities" onchange="readURLfacility(this);"  /><br>
										                <input type="hidden" name="old_picture" value="nophoto.jpg"> 
		                           					</div>
		                           				</div>
		                           				<div class="col-lg-8 col-sm-12">
		                           					<div class="form-group">
		                           						<?=
		                           						form_label('Facilities').''.
		                           						form_input('facilities','','class="form-control border-input" placeholder="Facilities" id="facilities"').''.
		                           						form_label('Facilities Description').''.
		                           						form_textarea('description3','','class="form-control border-input" placeholder="Facilities " id="description3"') ?>
		                           					</div>
		                           				</div>
		                           			</div>
		                           			<div align="center">
										    	<button type="button" name="savefacilities" onclick="insert_facility()" id="savefacilities" class="btn btn-info">Add data to Table</button>
										    </div>
											<div class="table-responsive"><br>
										        <table id="tableFacilities" class="table table-hover table-bordered">
											        <thead>
											            <tr>
											            	<th>Image</th>
											            	<th>Facilities</th>
											            	<th>Descriptions</th>
											            	<th>Download</th>
											            	<th>REMOVE</th>
											            </tr>
											        </thead>
											        <tbody id="tbodyimagefacilities"></tbody>
										        </table>
									    	</div>	
		                           		</div>
		                           		<div class="content">
		                           			<legend>Activity</legend>
		                           			<div class="row">
		                           				<div class="col-lg-4 col-sm-12">
		                           					<div class="form-group">
		                           						<img width="200px" height="180px" id="blahs" src="<?php echo base_url("bmb_assets2/upload/ecotourism_img/nophoto.jpg") ?>" alt="your image" /><br>
										                <input type='file' name="pic_eco" id="pic_eco" onchange="readURLs(this);"  /><br>
										                <input type="hidden" name="old_picture" value="nophoto.jpg"> 
		                           					</div>
		                           				</div>
		                           				<div class="col-lg-8 col-sm-12">
		                           					<div class="form-group">
		                           						<?=
		                           						form_label('Activity Title').''.
		                           						form_input('activities','','class="form-control border-input" placeholder="Activity Title" id="activityTitle"').''.
		                           						form_label('Activity Description').''.
		                           						form_textarea('description','','class="form-control border-input" placeholder="Activity " id="activityDesc"') ?>
		                           					</div>
		                           				</div>
		                           			</div>
		                           			<div align="center">
										    	<button type="button" name="savetourism" onclick="insert_ecotourisms()" id="savetourism" class="btn btn-info">Add data to Table</button>
										    </div>
											<div class="table-responsive"><br>
										        <table id="tableTourism" class="table table-hover table-bordered">
											        <thead>
											            <tr>
											            	<th>Image</th>
											            	<th>Activities</th>
											            	<th>Descriptions</th>
											            	<th>Download</th>
											            	<th>REMOVE</th>
											            </tr>
											        </thead>
											        <tbody id="tbodyimageecotourism"></tbody>
										        </table>
									    	</div>
		            					    </div>
		            					    </div>
		            						
		            					</div>		                           		
		                           		</div>
		                           	</div>
		                           	<div class="tab-pane" id="projects">
		                           		<div class="content">
		                           			<legend>Existing Project within PA's</legend>
		                           			<div class="row">
		                           				<div class="col-lg-12 col-sm-12">
		                           					<div class="form-group">
		                           						<?= 
		                           						form_label('Project Name').''.
		                           						form_input('projectname','','class="form-control border-input" placeholder="Project Name" id="projectname"') 
		                           						?>
		                           					</div>
		                           				</div>
		                           			</div>
		                           			<div class="row">
		                           				<div class="col-lg-4 col-sm-12">
		                           					<div class="form-group">
		                           						<?= 
		                           						form_label('Year Implemented').'<br>'.
		                           						form_label('From').''.
		                           						form_dropdown('yearstart',$yearListed,'','class="form-control border-input" id="yearstart"');
		                           						?>
		                           					</div>
		                           				</div>
		                           				<div class="col-lg-4 col-sm-12">
		                           					<div class="form-group">
		                           						<?= 
		                           						form_label('&nbsp;').'<br>'.
		                           						form_label('To').''.
		                           						form_dropdown('yearend',$yearListed,'','class="form-control border-input" id="yearend"');
		                           						?>
		                           					</div>
		                           				</div>
		                           			</div>
		                           			<div class="row">
		                           				<div class="col-lg-4 col-sm-12">
		                           					<div class="form-group">
		                           						<?= 
		                           						form_label('Source of Fund').''.
		                           						form_input('funding','','class="form-control border-input" id="funding"');
		                           						?>
		                           					</div>
		                           				</div>
		                           				<div class="col-lg-4 col-sm-12">
		                           					<div class="form-group">
		                           						<?= 
		                           						form_label('Amount of Project').''.
		                           						form_input('amount_fund','','class="form-control border-input" onkeyup="run(this)" id="amount_fund"');
		                           						?>
		                           					</div>
		                           				</div>
		                           				<div class="col-lg-4 col-sm-12">
		                           					<div class="form-group">
		                           						<?= 
		                           						form_label('Impementator').''.
		                           						form_input('implementor','','class="form-control border-input" id="implementor"');
		                           						?>
		                           					</div>
		                           				</div>
		                           			</div>
		                           			<div class="row">
		                           				<div class="col-lg-12 col-sm-12">
		                           					<div class="form-group">
		                           						<?= 
		                           						form_label('Remarks').''.
		                           						form_textarea('remarks','','class="form-control border-input" id="remarks"');
		                           						?>
		                           					</div>
		                           				</div>
		                           			</div>
		                           			<div align="left">
		                                		<input type="text" id="addproject" value="Add data to Table" class="btn btn-primary">	
										    </div><br>
										     <div class="table-responsive">
										    	<table id="tablePAProject" class="table table-hover table-bordered">
										    		<thead>
										    			<tr>
										    				<th>Project Name</th>
										    				<th>Year(Start-End)</th>
										    				<th>Source of Fund</th>
										    				<th>Amount</th>
										    				<th>Implementor</th>
										    				<th>Remarks</th>
										    				<th>Remove?	</th>
										    			</tr>
										    		</thead>
										    		<tbody id="tbodyproject"></tbody>				    			
										    	</table>
										    </div>	
										     <div class="table-responsive">
										    	<table id="tablePAProject_sample" class="table table-hover table-bordered hide">
										    		<thead>
										    			<tr>
										    				<th>Project Name</th>
										    				<th>Year(Start-End)</th>
										    				<th>Source of Fund</th>
										    				<th>Amount</th>
										    				<th>Implementor</th>
										    				<th>Remarks</th>
										    				<th>Remove?	</th>
										    			</tr>
										    		</thead>
										    		<tbody id="tbodyprojects"></tbody>				    			
										    	</table>
										    </div>	
										   <!--  <div align="center">
										    	<button type="button" name="saveProject" id="saveProject" class="btn btn-info">Save</button>
										    </div> -->
		                           		</div>
		                           	</div>
		                           	<div class="tab-pane" id="threats">
		                           		<div class="content">
		                           			<legend>Threats in the Area</legend>
		                           			<div class="row">
		                           				<div class="col-lg-12 col-sm-12">
		                           					<div class="form-group">
		                           						<?= 
		                           						form_textarea('threat','','class="form-control border-input" placeholder="Threats in the area" id="threats"') 
		                           						?>
		                           					</div>
		                           				</div>
		                           			</div>
		                           		</div>
		                           	</div>
		                           	<!-- <div class="tab-pane" id="occupants">
		                           		
		                           	</div> -->
		                           	<div class="tab-pane" id="references">
		                           		<div class="content">
		                           			<legend>References</legend>
		                           			<div class="row">
		                           				<div class="col-lg-12 col-sm-12">
		                           					<div class="form-group">
		                           						<?= form_label('References')." ".
		                           							form_textarea('reference',$pamain->reference,'class="form-control border-input"');
		                           						?>
		                           					</div>
		                           				</div>
		                           			</div>
		                           		</div>
		                           	</div>
									<div class="tab-pane" id="map">
		                           		<div class="content">
		                           			<legend>Map Image</legend>
		                           			<div id="responseDivImage" class="alert text-center" style="display:none;">
							                    <button type="button" class="close" id="clearMsgImage"><span aria-hidden="true">&times;</span></button>
							                    <span style="color:#000" id="messageimage"></span>
							                </div>  
		                           			<div class="row">
		                           				<div class="col-lg-4 col-sm-12">
		                           					<div class="form-group">
		                           						<img width="200px" height="180px" id="blahss" src="<?php echo base_url("bmb_assets2/upload/map_image/nophoto.jpg") ?>" alt="your image" /><br>
										                <input type='file' name="picture2" id="picture2" onchange="readURLss(this);"  /><br>
										                <input type="hidden" name="old_picture" value="nophoto.jpg"> 
		                           					</div>
		                           				</div>
		                           			</div>
		                           			<div class="row">
		                           				<div class="col-lg-12 col-sm-12">
		                           					<div class="form-group">
		                           						<?= form_label('')." ".
		                           							form_textarea('remarks_image','','class="form-control border-input"');
		                           						?>
		                           					</div>
		                           				</div>
		                           			</div>
		                           			<div align="center">
		                           				<input type="button" id="addimage" value="Add data to Table" class="btn btn-primary" onclick="insert_image()">
		                           			</div>
		                           			<div class="table-responsive"><br>
									        <table id="tableimage" class="table table-hover table-bordered">
									          	<thead>
									            	<tr>
									              		<th>Image</th>
									              		<th></th>
									              		<th>Download</th>
									              		<th>REMOVE</th>
									            	</tr>
									          	</thead>
									          	<tbody id="tbodyimage">
									          	</tbody>
									        </table>
									      	</div> 
		                           		</div>
										<!-- <?php echo $map['html']; ?> -->
		                           	</div>
		                           	<div class="tab-pane" id="visitors">
		                           		<div class="content">
		                           			<legend>Visitors Monitoring</legend>
		                           			<div class="row">
		                           				<div class="col-lg-4 col-sm-12">
		                           					<div class="form-group">
		                           						<?=
		                           						form_label('Date Monitoring').' '.
		                           						form_dropdown('month_monitoring',$monthListed,'','class="form-control border-input" id="monitor_month"')
		                           						?>
		                           					</div>
		                           				</div>
		                           				<div class="col-lg-4 col-sm-12">
		                           					<div class="form-group">
		                           						<?=
		                           						form_label('&nbsp;').' '.
		                           						form_dropdown('year_monitoring',$yearListed,'','class="form-control border-input" id="monitor_year"')
		                           						?>
		                           					</div>
		                           				</div>
		                           			</div>
		                           			<div class="row">
		                           				<div class="col-lg-3 col-sm-12">
		                           					<div class="form-group">
		                           						<?=
		                           						form_label('Local Male').''.
		                           						form_input('local_male','','class="form-control border-input calc_local calc_male g_total" id="localmale"')
		                           						?>
		                           					</div>
		                           				</div>
		                           				<div class="col-lg-3 col-sm-12">
		                           					<div class="form-group">
		                           						<?=
		                           						form_label('Local Female').''.
		                           						form_input('local_female','','class="form-control border-input calc_local calc_female g_total" id="localfemale"')
		                           						?>
		                           					</div>
		                           				</div>
		                           				<div class="col-lg-3 col-sm-12">
		                           					<div class="form-group">
		                           						<?=
		                           						form_label('Foreign Male').''.
		                           						form_input('foreign_male','','class="form-control border-input calc_foreign calc_male g_total" id="foreignmale"')
		                           						?>
		                           					</div>
		                           				</div>
		                           				<div class="col-lg-3 col-sm-12">
		                           					<div class="form-group">
		                           						<?=
		                           						form_label('Foreign Female').''.
		                           						form_input('foreign_female','','class="form-control border-input calc_foreign calc_female g_total" id="foreignfemale"')
		                           						?>
		                           					</div>
		                           				</div>
		                           			</div>
		                           			<div class="row">
		                           				<div class="col-lg-3 col-sm-12">
		                           					<div class="form-group">
		                           						<?=
		                           						form_label('Total Entrance Fee').''.
		                           						form_input('entrancefee','','class="form-control border-input total_income" id="entrance"')
		                           						?>
		                           					</div>
		                           				</div>
		                           				<div class="col-lg-3 col-sm-12">
		                           					<div class="form-group">
		                           						<?=
		                           						form_label('Total Parking Fee').''.
		                           						form_input('parkingfee','','class="form-control border-input total_income" id="parking"')
		                           						?>
		                           					</div>
		                           				</div>
		                           				<div class="col-lg-3 col-sm-12">
		                           					<div class="form-group">
		                           						<?=
		                           						form_label('Total Rentals Fee').''.
		                           						form_input('rentalsfee','','class="form-control border-input total_income" id="rentals"')
		                           						?>
		                           					</div>
		                           				</div>
		                           				<div class="col-lg-3 col-sm-12">
		                           					<div class="form-group">
		                           						<?=
		                           						form_label('Other Fees').''.
		                           						form_input('otherfee','','class="form-control border-input total_income" id="other"')		                           						
		                           						?>
		                           					</div>
		                           				</div>
		                           			</div>
		                           			<legend>Total Visitors</legend>
		                           			<div class="row">
		                           				<div class="col-lg-6 col-sm-12">
		                           					<div class="form-group">
		                           						<?= form_label('Total Local Visitors:') ?>
		                           						<span id="total_local"></span><br>
		                           						<?= form_label('Total Foreign Visitors:') ?>
		                           						<span id="total_foreign"></span>
		                           					</div>
		                           				</div>
		                           				<div class="col-lg-6 col-sm-12">
		                           					<div class="form-group">
		                           						<?= form_label('Total Male Visitors:') ?>
		                           						<span id="total_male"></span><br>
		                           						<?= form_label('Total Female Visitors:') ?>
		                           						<span id="total_female"></span>
		                           					</div>
		                           				</div>
		                           			</div>
		                           			<div class="row">
		                           				<div class="col-lg-12 col-sm-12">
		                           					<div class="form-group">
		                           						<?= form_label('GRAND TOTAL VISITORS:') ?>
		                           						<span id="gtotal" style="text-align: center;color:red;font-size: 15px;"></span>
		                           					</div>
		                           				</div>
		                           			</div>
		                           			<legend>Total Income</legend>
		                           			<div class="row">
		                           				<div class="col-lg-12 col-sm-12">
		                           					<div class="form-group">
		                           						<?= form_label('Sub-IPAF :') ?>
		                           						<span id="gtotal_sub"></span><br>
		                           						<?= form_label('Central IPAF :') ?>
		                           						<span id="gtotal_central"></span>
		                           					</div>
		                           				</div>
		                           			</div>
		                           			<div class="row">
		                           				<div class="col-lg-12 col-sm-12">
		                           					<div class="form-group">
		                           						<?= form_label('GRAND TOTAL INCOME:') ?>
		                           						<span id="gtotal_income" style="text-align: center;color:red;font-size: 15px;"></span>
		                           					</div>
		                           				</div>
		                           			</div>
		                           			<div align="left">
		                                		<input type="button" id="addIncome" value="Add data to Table" class="btn btn-primary">	
										    </div><br>
		                           			<div class="table-responsive">
										    	<table id="tablefees" class="table table-hover " style="border: 1px solid black;">
													<thead>
														<tr style="background-color:#ffd9b3;">
															<th>Dated</th>
															<th>Local Visitors</th>
															<th>Foreign Visitors</th>
															<th>Income</th>
															<th>Total</th>
															<th>Remove</th>
														</tr>
													</thead>
													<tbody id="tbodyfee"></tbody>
												</table>
											</div>
											<div class="table-responsive">
										    	<table id="tablefees_sample" class="table table-hover hide" style="border: 1px solid black;">
													<thead>
														<tr style="background-color:#ffd9b3;">
															<th>Dated</th>
															<th>Local Visitors</th>
															<th>Foreign Visitors</th>
															<th>Income</th>
															<th>Total</th>
															<th>Remove</th>
														</tr>
													</thead>
													<tbody id="tbodyfees"></tbody>
												</table>
											</div>
											<!-- <div align="center">
										    	<button type="button" name="saveIncome" id="saveIncome" class="btn btn-info">Save</button>
										    </div> -->
		                           		</div>
		                           	</div>

				                </div>
							</div>
						</div>
						<?php echo form_close();?>
					</div>
				</div>
			</div>
		</div>
	<!-- </div> -->
<!-- </div> -->
<script type="text/javascript">
  function readURLs(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
      $('#blahs').attr('src', e.target.result);
      }
        reader.readAsDataURL(input.files[0]);
      }
  }
  function readURLss(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
      $('#blahss').attr('src', e.target.result);
      }
        reader.readAsDataURL(input.files[0]);
      }
  }

  function readURLfacility(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
      $('#blahsfacility').attr('src', e.target.result);
      }
        reader.readAsDataURL(input.files[0]);
      }
  }
</script>
<script type="text/javascript">
		function calculate() {
		var myBox1 = document.getElementById('terrestrial').value;	
		var myBox2 = document.getElementById('marine').value;
		var myBox3 = document.getElementById('buffer').value;
		var result = document.getElementById('area');	
		var myResult = +myBox1 + +myBox2 + +myBox3;
		result.value = myResult;
      
		
	}
</script>