<?php 
$data_culturalresource = array(
	'name'	=>	'culturalresource',
	'class'	=>	'form-control',
	'style'	=>	'height: 150px',
	'placeholder'	=>	'Cultural Resource Details'
);
$data_politics = array(
	'name'	=>	'politics',
	'class'	=>	'form-control',
	'style'	=>	'height: 150px',
	'placeholder'	=>	'Politics Details'
);
$data_belief = array(
	'name'	=>	'belief',
	'class'	=>	'form-control',
	'style'	=>	'height: 150px',
	'placeholder'	=>	'Custom Belief Details'
);
$data_archeology = array(
	'name'	=>	'archeology',
	'class'	=>	'form-control',
	'style'	=>	'height: 150px',
	'placeholder'	=>	'Archeology Details'
);
?>
<div class="tab-pane" id="antropology">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-info">
				<div class="panel-heading"><div class="panel-title"><i class="fas fa-handshake"></i> ANTROPOLOGY</div></div>
				<div class="panel-body">
				    <div class="col-md-12">
				    	<div class="row">
		          			<div class="col-md-12">
		          				<div class="form-group">
						          	<div class="col-md-6">
						          		<label for="inputClassification" class="control-label">Cultural Resource</label>
						          		<?= form_textarea($data_culturalresource,$pamain->cultural_resource) ?>
						          	</div>
						          	<div class="col-md-6">
						          		<label for="inputClassification" class="control-label">Politics</label>
						          		<?= form_textarea($data_politics,$pamain->politics) ?>
						          	</div>
			                  	</div>
		          			</div>
		          			<div class="col-md-12">
		          				<div class="form-group">
						          	<div class="col-md-6">
						          		<label for="inputClassification" class="control-label">Custom Belief</label>
						          		<?= form_textarea($data_belief,$pamain->belief) ?>
						          	</div>
						          	<div class="col-md-6">
						          		<label for="inputClassification" class="control-label">Archeology</label>
						          		<?= form_textarea($data_archeology,$pamain->archeology) ?>
						          	</div>
			                  	</div>
		          			</div>
		          		</div>
		          	</div>
		        </div>
		    </div>
		</div>
	</div>
</div>