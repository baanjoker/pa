<?php 
$pambMember_fname = array(
	'name' 	=> 	'fname',
	'id'	=>	'fname',
	'class'	=>	'form-control',
	'placeholder'	=>	'First name'
);
$pambMember_mname = array(
	'name' 	=> 	'mname',
	'id'	=>	'mname',
	'class'	=>	'form-control',
	'placeholder'	=>	'Middle name'
);
$pambMember_lname = array(
	'name' 	=> 	'lname',
	'id'	=>	'lname',
	'class'	=>	'form-control',
	'placeholder'	=>	'Last name'
);
$pambMember_sex = array(
	'name' 	=> 	'sex',
	'id'	=>	'sex',
	'class'	=>	'form-control',
	'placeholder'	=>	'Gender'
);
$pambMember_marital = array(
	'name' 	=> 	'maritalstatus',
	'id'	=>	'maritalstatus',
	'class'	=>	'form-control',
	'placeholder'	=>	'Marital Status'
);
$pambMember_address = array(
	'name' 	=> 	'address',
	'id'	=>	'address',
	'class'	=>	'form-control',
	'placeholder'	=>	'Complete Address',
	'style' => 'height:50px'
);
$pambMember_organization = array(
	'name' 	=> 	'organization',
	'class'	=>	'form-control',
	'placeholder'	=>	'Organization/Offices',
);
$pambMember_position = array(
	'name' 	=> 	'position',
	'class'	=>	'form-control',
	'placeholder'	=>	'Position',
);
$pambMember_officeaddress = array(
	'name' 	=> 	'officeaddress',
	'class'	=>	'form-control',
	'placeholder'	=>	'Office Address',
	'style' => 'height:50px'
);
?>
<div class="tab-pane" id="pambmember">
    <div class="row">
        <div class="col-md-12">
          	<div class="panel panel-info">
            	<div class="panel-heading"><div class="panel-title"><i class="fas fa-odnoklassniki-square"></i> PAMB MEMBER INFORMATION</div></div>
            	<div class="panel-body">
	                <div class="col-md-12">
	                	<div id="responseDivPAMB" class="alert text-center" style="display:none;">
			    			<button type="button" class="close" id="clearMsg"><span aria-hidden="true">&times;</span></button>
			    			<span style="color:#000" id="messagepamb"></span>								
			    		</div>

	                  	<div class="form-group">
				          	<div class="col-md-4">
				          		<label for="inputClassification" class="control-label">First name</label>
				          		<?php echo form_input($pambMember_fname); ?>
				          	</div>
				          	<div class="col-md-4">
				          		<label for="inputClassification" class="control-label">Middle name</label>
				          		<?php echo form_input($pambMember_mname); ?>
				          	</div>
				          	<div class="col-md-4">
				          		<label for="inputClassification" class="control-label">Family Name</label>
				          		<?php echo form_input($pambMember_lname); ?>
				          	</div>
	                  	</div>

	                  	<div class="form-group">
				          	<div class="col-md-4">
				          		<label for="inputClassification" class="control-label">Gender</label>
				          		<?php echo form_dropdown($pambMember_sex,$sexList,'') ?>
				          	</div>
				          	<div class="col-md-4">
				          		<label for="inputClassification" class="control-label">Marital Status</label>
				          		<?php echo form_dropdown($pambMember_marital,$maritalStatus,'') ?>
				          	</div>
			          	</div>
			          	<div class="form-group">
				          	<div class="col-md-12">
				          		<label for="inputClassification" class="control-label">Residential Address</label>
				          		<?php echo form_textarea($pambMember_address,'','') ?>
				          	</div>
				        </div>
				        <div class="form-group">
				          	<div class="col-md-6">
				          		<label for="inputClassification" class="control-label">Organization/Offices</label>
				          		<?php echo form_input($pambMember_organization,'','') ?>
				          	</div>
				          	<div class="col-md-6">
				          		<label for="inputClassification" class="control-label">Position</label>
				          		<?php echo form_dropdown($pambMember_position,$organizationposition,'') ?>
				          	</div>				          	
				        </div>
				        <div class="form-group">
				          	<div class="col-md-12">
				          		<label for="inputClassification" class="control-label">Organization/Offices Address</label>
				          		<?php echo form_textarea($pambMember_officeaddress,'','') ?>
				          	</div>
				        </div>
	                </div>
	                <div class="col-md-12">
					    <div class="form-group col-sm-12 col-xs-12">
					    <button type="button" name="btnlocation" onclick="insert_pamb()" id="submitlocation" class="btn btn-success  btn-flat"><i class="fa fa-angle-double-down"> Add to list</i></button>
					    </div>
					</div>
	                <div class="col-md-12">
	                	<table id="tablePAMBmember" class="table table-hover">
	                		<thead>
	                			<tr>
	                				<th>Name</th>
	                				<th>Organization/Offices</th>
	                				<th>Postion</th>
	                				<th>Option</th>
	                			</tr>
	                		</thead>
	                		<tbody id="tbodypamb"></tbody>
	                	</table>
	                </div>
            	</div>
            </div>
        </div>
    </div>
</div> 