<?php
$data_tag = array(
	'name'	=> 'householdtag',
	'class'	=> 'form-control',
	'placeholder'	=>	'Household Tag No.',
);
$data_tribe = array(
	'name'	=> 'tribe',
	'class'	=> 'form-control',
);
$data_fname = array(
	'name'	=> 'tribe_fname',
	'class'	=> 'form-control',
	'placeholder'	=>	'First Name'
);
$data_mname = array(
	'name'	=> 'tribe_mname',
	'class'	=> 'form-control',
	'placeholder'	=>	'Middle Name'
);
$data_lname = array(
	'name'	=> 'tribe_lname',
	'class'	=> 'form-control',
	'placeholder'	=>	'Last Name'
);

$data_relation = array(
	'name'	=> 'tribe_relation',
	'class'	=> 'form-control',
);
$data_gender = array(
	'name'	=> 'tribe_gender',
	'class'	=> 'form-control',
);
$data_maritalstatus = array(
	'name'	=> 'tribe_maritalstatus',
	'class'	=> 'form-control',
);
?>
<div class="tab-pane" id="occupant">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-info">
				<div class="panel-heading"><div class="panel-title"><i class="fas fa-home"></i> OCCUPANTS</div></div>
				<div class="panel-body">
					<div id="responseDivTribe" class="alert text-center" style="display:none;">
		                <button type="button" class="close" id="clearMsg"><span aria-hidden="true">&times;</span></button>
		                <span style="color:#000" id="messagetribe"></span>
		            </div>
				    <div class="col-md-12">
				    	<div class="form-group">
							<div class="col-md-2">
							    <label for="inputClassification" class="control-label">Household Tag No.</label>
							</div>
							<div class="col-md-6">
							    <?= form_input($data_tag) ?>
							</div>							          	
				        </div>

					    <div class="form-group">
					    	<div class="col-md-2">
					    		<label for="inputClassification" class="control-label">Date Occupied</label>
					    	</div>
					    	<div class="col-md-2">
					    		<?php echo form_dropdown('month_occupied',$monthList,'','class="form-control" id="month_occupied"'); ?>
					    	</div>
					    	<div class="col-md-2">
					    		<?php echo form_dropdown('day_occupied',$dayList,'','class="form-control" id="day_occupied"'); ?>
					    	</div>
					    	<div class="col-md-2">
					    		<?php echo form_dropdown('year_occupied',$yearList,'','class="form-control" id="year_occupied"'); ?>
					    	</div>						                       			
						</div>	

						<div class="form-group">
							<div class="col-md-2">
							    <label for="inputClassification" class="control-label">Tribe</label>
							</div>
							<div class="col-md-6">
							    <?= form_dropdown($data_tribe,$tribelist) ?>
							</div>							          	
				        </div>	

				        <div class="form-group">
							<div class="col-md-2">
							    <label for="inputClassification" class="control-label">Fullname</label>
							</div>
							<div class="col-md-2">
							    <?= form_input($data_fname) ?>
							</div>	
							<div class="col-md-2">
							    <?= form_input($data_mname) ?>
							</div>	
							<div class="col-md-2">
							    <?= form_input($data_lname) ?>
							</div>					          	
				        </div>
						
						<div class="form-group">
							<div class="col-md-2">
					    		<label for="inputClassification" class="control-label">Relationship</label>
					    	</div>
					    	<div class="col-md-6">
					    		<?php echo form_dropdown($data_relation,$triberelation); ?>
					    	</div>
						</div>
						<div class="form-group">
							<div class="col-md-2">
					    		<label for="inputClassification" class="control-label">Gender</label>
					    	</div>
					    	<div class="col-md-6">
					    		<?php echo form_dropdown($data_gender,$sexList); ?>
					    	</div>
						</div>
						<div class="form-group">
							<div class="col-md-2">
					    		<label for="inputClassification" class="control-label">Marital Status</label>
					    	</div>
					    	<div class="col-md-6">
					    		<?php echo form_dropdown($data_maritalstatus,$maritalStatus); ?>
					    	</div>
						</div>
						<div class="col-md-12">
			          	<div class="form-group">						       
						    <button type="button" name="btnproject" onclick="insert_tribes()" id="submitproject" class="btn btn-success  btn-flat"><i class="fa fa-angle-double-down"> Add to list</i></button>
					    </div>	
			        </div>
				    </div>
				    <div class="col-md-12">	 
			          		<div class="table-responsive">   					
								<table id="tabletribe" class="table table-hover">
								    <thead>
								        <tr>
								            <th>TAG NO.</th>								           
								            <th>DATE OCCUPIED</th>
								            <th>TRIBE</th>
								            <th>FULLNAME</th>
								            <th>RELATIONSHIP</th>
								            <th>GENDER</th>
								            <th>REMOVE</th>
								        </tr>
								    </thead>
								    <tbody id="tbodytribe">
								    </tbody>
								</table>
							</div>							
	          			</div>
				</div>
			</div>
		</div>
	</div>
</div>