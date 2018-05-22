<?php
$data_ethnicity = array(
	'name'	=>	'ethnicity',
	'class'	=>	'form-control',
	'style'	=>	'height: 150px',
	'placeholder'	=>	'Ethnicity Details'
);
$data_demography = array(
	'name'	=>	'demography',
	'class'	=>	'form-control',
	'style'	=>	'height: 150px',
	'placeholder'	=>	'Demography Details'
);
$data_livelihood = array(
	'name'	=>	'livelihood',
	'class'	=>	'form-control',
	'style'	=>	'height: 150px',
	'placeholder'	=>	'Livelihood Details'
);
$data_socialservice = array(
	'name'	=>	'socialservice',
	'class'	=>	'form-control',
	'style'	=>	'height: 150px',
	'placeholder'	=>	'Social Service Details'
);
?>
<div class="tab-pane" id="economic">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-info">
				<div class="panel-heading"><div class="panel-title"><i class="fas fa-hands"></i> SOCIO-ECONOMIC</div></div>
				<div class="panel-body">
				    <div class="col-md-12">
				    	<div class="row">
		          			<div class="col-md-12">
		          				<div class="col-md-12">
			          				<div class="form-group">
							          	<div class="col-md-6">
							          		<label for="inputClassification" class="control-label">Ethinicity</label>
							          		<?= form_textarea($data_ethnicity) ?>
							          	</div>
							          	<div class="col-md-6">
							          		<label for="inputClassification" class="control-label">Demography</label>
							          		<?= form_textarea($data_demography,$pamain->demography) ?>
							          	</div>
				                  	</div>
			          			</div>
			          			<div class="col-md-12">
			          				<div class="form-group">
							          	<div class="col-md-6">
							          		<label for="inputClassification" class="control-label">Livelihood</label>
							          		<?= form_textarea($data_livelihood,$pamain->livelihood) ?>
							          	</div>
							          	<div class="col-md-6">
							          		<label for="inputClassification" class="control-label">Social Service</label>
							          		<?= form_textarea($data_socialservice,$pamain->social_service) ?>
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
</div>