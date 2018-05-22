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
				    <div class="col-md-12">
				    	<div class="row">
		          			<div class="col-md-12">			          			
						        <h3 class="box-title" style="color:red">ELEVATION</h3>						       
			          			<div class="form-group">
					            	<label for="inputCategory" class="col-sm-1 col-xs-4 control-label">Highest</label>
					            	<div class="form-group col-sm-3 col-xs-8">
					            		<?= form_input($data_highestelev,$pamain->elevation_highest); ?>
					            	</div>	
					            	<label for="inputCategory" class="col-sm-1 col-xs-4 control-label">Lowest</label>
					            	<div class="form-group col-sm-3 col-xs-8">
					            		<?= form_input($data_lowestelev,$pamain->elevation_lowest); ?>
					            	</div>		            			
					            </div>
					        </div>
					        <!-- <div class="box-header with-border"></div> -->
					    </div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
				          	<div class="col-md-4">
				          		<label for="inputClassification" class="control-label">Topography</label>
				          		<?= form_textarea($data_topo,$pamain->topology) ?>
				          	</div>
				          	<div class="col-md-4">
				          		<label for="inputClassification" class="control-label">Climate</label>
				          		<?= form_textarea($data_climate,$pamain->climate) ?>
				          	</div>
				          	<div class="col-md-4">
				          		<label for="inputClassification" class="control-label">Hydrology/River System</label>
				          		<?= form_textarea($data_hydro,$pamain->hydrology) ?>
				          	</div>
	                  	</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
				          	<div class="col-md-4">
				          		<label for="inputClassification" class="control-label">Location</label>
				          		<?= form_textarea($data_location,$pamain->location_details) ?>
				          	</div>
				          	<div class="col-md-4">
				          		<label for="inputClassification" class="control-label">Existing Land Use</label>
				          		<?= form_textarea($data_landuse,$pamain->existing_landuse) ?>
				          	</div>
				          	<div class="col-md-4">
				          		<label for="inputClassification" class="control-label">Soil</label>
				          		<?= form_textarea($data_soil,$pamain->soil) ?>
				          	</div>
	                  	</div>
					</div>					
				</div>
			</div>
		</div>
	</div>
</div>