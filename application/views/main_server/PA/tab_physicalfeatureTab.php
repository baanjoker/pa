<?php
$data_highestelev = array(
    'name' => 'highestelev',
    'id'   => 'highestelev',
    'class'=> 'form-control',
    'type' => 'text',
    'placeholder'=>'Highest Elevation',
	'onkeyup'=>'run(this)');
$data_lowestelev = array(
    'name' => 'lowestelev',
    'id'   => 'lowestelev',
    'class'=> 'form-control',
    'type' => 'text',
    'placeholder'=>'Lowest Elevation',
	'onkeyup'=>'run(this)');
$data_topo = array(
	'name'	=>	'topo',
	'class'	=>	'form-control',
	'style'	=>	'height: 150px',
	'placeholder'	=>	'Topography Details'
);
$data_climate = array(
	'name'	=>	'climate',
	'class'	=>	'form-control',
	'style'	=>	'height: 150px',
	'placeholder'	=>	'Climate Details'
);
$data_hydro = array(
	'name'	=>	'hydro',
	'class'	=>	'form-control',
	'style'	=>	'height: 150px',
	'placeholder'	=>	'Hydrology/River System Details'
);
$data_location = array(
	'name'	=>	'location',
	'class'	=>	'form-control',
	'style'	=>	'height: 150px',
	'placeholder'	=>	'Location Details'
);
$data_landuse = array(
	'name'	=>	'existing_landuse',
	'class'	=>	'form-control',
	'style'	=>	'height: 150px',
	'placeholder'	=>	'Existing Land Use Details'
);
$data_soil = array(
	'name'	=>	'soil',
	'class'	=>	'form-control',
	'style'	=>	'height: 150px',
	'placeholder'	=>	'Soil Details'
);
?>
<div class="tab-pane" id="physicalfeature">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-info">
				<div class="panel-heading"><div class="panel-title"><i class="fa fa-child"></i> PHYSICAL FEATURE</div></div>
				<div class="panel-body">
				    <table width="100%" border="0" cellpadding="3" cellspacing="1" class="table4">
				    	<tr valign="top" class="spaceUnder spaceOver">
				    		<!-- <td style="width: 100px">Highest Elevation</td> -->
				    		<td>Highest Elevation<?= form_input($data_highestelev,$pamain->elevation_highest); ?></td>
				    	</tr>
				    	<tr valign="top" class="spaceUnder">
				    		<!-- <td>Lowest Elevation</td> -->
				    		<td>Lowest Elevation<?= form_input($data_lowestelev,$pamain->elevation_lowest); ?></td>
				    	</tr>
				    	<tr valign="top" class="spaceUnder">
				    		<!-- <td></td> -->
				    		<td>Topography<?= form_textarea($data_topo,$pamain->topology) ?></td>
				    	</tr>
				    	<tr valign="top" class="spaceUnder">
				    		<!-- <td></td> -->
				    		<td>Climate<?= form_textarea($data_climate,$pamain->climate) ?></td>
				    	</tr>
				    	<tr valign="top" class="spaceUnder">
				    		<!-- <td></td> -->
				    		<td>Hydrology/River System<?= form_textarea($data_hydro,$pamain->hydrology) ?></td>
				    	</tr>
				    	<tr valign="top" class="spaceUnder">
				    		<!-- <td></td> -->
				    		<td>Location<?= form_textarea($data_location,$pamain->location_details) ?></td>
				    	</tr>
				    	<tr valign="top" class="spaceUnder">
				    		<!-- <td></td> -->
				    		<td>Existing Land Use<?= form_textarea($data_landuse,$pamain->existing_landuse) ?></td>
				    	</tr>
				    	<tr valign="top" class="spaceUnder">
				    		<!-- <td></td> -->
				    		<td>Soil<?= form_textarea($data_soil,$pamain->soil) ?></td>
				    	</tr>
				    </table>					
				</div>
			</div>
		</div>
	</div>
</div>