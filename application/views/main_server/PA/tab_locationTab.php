<?php
$data_long1 = array(
	'name' => 'long1',
    'id'   => 'long1',
    'class'=> 'form-control',
    'type' => 'text',
    'placeholder'=>'Longitude');
$data_long2 = array(
	'name' => 'long2',
    'id'   => 'long2',
    'class'=> 'form-control',
    'type' => 'text',
    'placeholder'=>'Longitude');
$data_lat1 = array(
	'name' => 'lat1',
    'id'   => 'lat1',
    'class'=> 'form-control',
    'type' => 'text',
    'placeholder'=>'Latitude');
$data_lat2 = array(
	'name' => 'lat2',
    'id'   => 'lat2',
    'class'=> 'form-control',
    'type' => 'text',
    'placeholder'=>'Latitude');
$data_boundary = array(
    'name' => 'boundary',
    'id'   => 'boundary',
    'class'=> 'form-control',
    'placeholder'=>'Details',
    'style' => 'height:130px'
);
$data_landuses = array(
    'name' => 'landuses',
    'id'   => 'landuses',
    'class'=> 'form-control',
    'placeholder'=>'Details',
    'style' => 'height:130px'
);
$data_accessibility = array(
    'name' => 'accessibility',
    'id'   => 'accessibility',
    'class'=> 'form-control',
    'placeholder'=>'Details',
    'style' => 'height:130px'
);
?>
<div class="tab-pane" id="location">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-info">
				<div class="panel-heading"><div class="panel-title"><i class="fa fa-map"></i> Location Information</div></div>
				<div class="panel-body">
				    <table width="100%" border="0" cellpadding="3" cellspacing="1" class="table4">
				    	<tr valign="top" class="spaceUnder spaceOver"><div style="background-color: #ffd9b3"><label>Area Location</label></div>
				    	<div id="responseDiv" class="alert text-center" style="display:none;">
			    			<button type="button" class="close" id="clearMsg"><span aria-hidden="true">&times;</span></button>
			    			<span style="color:#000" id="message"></span>
			    		</div>
				    		<td style="width: 100px">Region</td>
				    		<td colspan="2"><?php echo form_dropdown('region_id',$regionList,'','class="form-control" id="regid"') ?></td><span class="prov_error"></span>
				    	</tr>
				    	<tr valign="top" class="spaceUnder">
				    		<td>Province</td>
				    		<td colspan="2"><?php echo form_dropdown('province_id','','','class="form-control" id="provid"') ?></td><span class="municipal_error"></span>
				    	</tr>
				    	<tr valign="top" class="spaceUnder">
				    		<td>Municipality</td>
				    		<td colspan="2"><?php echo form_dropdown('municipal_id','','','class="form-control action" id="municipal_id"') ?></td>
				    		<span class="barangay_error"></span>
				    	</tr>
				    	<tr valign="top" class="spaceUnder">
				    		<td>Barangay</td>
				    		<td><?php echo form_dropdown('barangay_id','','','class="form-control" id="bar_id"') ?></td>
						</tr>						
				    </table><br>	
				    <button type="button" name="btnlocation" onclick="insert()" id="submitlocation" class="btn btn-success  btn-flat"><i class="fa fa-angle-double-down"> Add to list</i></button>
				    <div class="table-responsive">
						<table id="tablelocation" class="table table-hover">
							<thead>
								<tr>
									<th>Region</th>
									<th>Province</th>
									<th>Municipality</th>
									<th>Barangay</th>
									<th>Remove</th>
								</tr>
							</thead>
							<tbody id="tbody"></tbody>
						</table>
					</div>	
					<table width="100%" border="0" cellpadding="3" cellspacing="1" class="table4">
				    	<tr valign="top" class="spaceUnder spaceOver"><div style="background-color: #ffd9b3"><label>Geographic Location</label></div>
				    		<td style="width: 100px">Longitude</td>
				    		<td><?= form_input($data_long1,$pamain->geographic_long1); ?></td>
				    		<td>-</td>
				    		<td><?= form_input($data_long2,$pamain->geographic_long2); ?></td>
				    	</tr>
				    	<tr valign="top" class="spaceUnder">
				    		<td>Latitude</td>
				    		<td><?= form_input($data_lat1,$pamain->geographic_lat1); ?></td>
				    		<td>-</td>
				    		<td><?= form_input($data_lat2,$pamain->geographic_lat2); ?></td>
				    	</tr>
				    </table>	
				    <table width="100%" border="0" cellpadding="3" cellspacing="1" class="table4">
				    	<tr valign="top" class="spaceUnder spaceOver"><div style="background-color: #ffd9b3"><label>Other Area Information</label></div>
				    		<!-- <td style="width: 100px"></td> -->
				    		<td>Protected Area Boundary<?php echo form_textarea($data_boundary,$pamain->pa_boundary,'') ?></td>				    		
				    	</tr>
				    	<tr valign="top" class="spaceUnder">
				    		<!-- <td></td> -->
				    		<td>Land Uses<?php echo form_textarea($data_landuses,$pamain->landuses,'') ?></td>							
				    	</tr>
				    	<tr valign="top" class="spaceUnder">
				    		<!-- <td></td> -->
				    		<td>Accessibility<?php echo form_textarea($data_accessibility,$pamain->accessibility,'') ?></td>
				    	</tr>
				    </table>		   
		        </div>
		    </div>
		</div>
	</div>
</div>
<script type="text/javascript" src="<?php echo base_url("bmb_assets2/select.js") ?>"></script>