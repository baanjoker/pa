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
				<div class="panel-heading"><div class="panel-title"><i class="fa fa-home"></i> OCCUPANTS</div></div>
				<div class="panel-body">
					<div id="responseDivTribe" class="alert text-center" style="display:none;">
		                <button type="button" class="close" id="clearMsg"><span aria-hidden="true">&times;</span></button>
		                <span style="color:#000" id="messagetribe"></span>
		            </div>
				    <table width="100%" border="0" class="table4">				    
				    	<tr valign="top" class="spaceUnder spaceOver">
				    		<td style="width: auto;">Household Tag No.</td>
				    		<td colspan="3"><?= form_input($data_tag) ?></td>
				    	</tr>
				    	<tr valign="top" class="spaceUnder spaceOver">
				    		<td style="width: auto;">Date Occupied</td>
				    		<td><?php echo form_dropdown('month_occupied',$monthList,'','class="form-control" id="month_occupied"'); ?></td>
				    		<td><?php echo form_dropdown('day_occupied',$dayList,'','class="form-control" id="day_occupied"'); ?></td>
				    		<td><?php echo form_dropdown('year_occupied',$yearList,'','class="form-control" id="year_occupied"'); ?></td>
				    	</tr>
				    	<tr valign="top" class="spaceUnder spaceOver">
				    		<td>Tribe</td>
				    		<td colspan="3"><?= form_dropdown($data_tribe,$tribelist) ?></td>
				    	</tr>
				    	<tr valign="top" class="spaceUnder spaceOver">
				    		<td>Fullname</td>
				    		<td><?= form_input($data_fname) ?></td>
				    		<td><?= form_input($data_mname) ?></td>
				    		<td><?= form_input($data_lname) ?></td>
				    	</tr>
				    	<tr valign="top" class="spaceUnder spaceOver">
				    		<td>Relationship</td>
				    		<td colspan="3"><?php echo form_dropdown($data_relation,$triberelation); ?></td>
				    	</tr>
				    	<tr valign="top" class="spaceUnder spaceOver">
				    		<td>Gender</td>
				    		<td colspan="3"><?php echo form_dropdown($data_gender,$sexList); ?></td>
				    	</tr>
				    	<tr valign="top" class="spaceUnder spaceOver">
				    		<td>Marital Status</td>
				    		<td colspan="3"><?php echo form_dropdown($data_maritalstatus,$maritalStatus); ?></td>
				    	</tr>
				    </table><br>
				    <button type="button" name="btnproject" onclick="insert_tribes()" id="submitproject" class="btn btn-success  btn-flat"><i class="fa fa-angle-double-down"> Add to list</i></button>
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
							<tbody id="tbodytribe"></tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>