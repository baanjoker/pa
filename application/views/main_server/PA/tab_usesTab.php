<?php
$data_tourism = array(
	'name'	=>	'tourism',
	'class'	=>	'form-control',
	'style'	=>	'height: 150px',
	'placeholder'	=>	'Tourism Details'
);
$data_facilities = array(
	'name'	=>	'facilities',
	'class'	=>	'form-control',
	'style'	=>	'height: 150px',
	'placeholder'	=>	'Facilities Details'
);
$data_research = array(
	'name'	=>	'research',
	'class'	=>	'form-control',
	'style'	=>	'height: 150px',
	'placeholder'	=>	'Science and Research Details'
);
$data_educational = array(
	'name'	=>	'educational',
	'class'	=>	'form-control',
	'style'	=>	'height: 150px',
	'placeholder'	=>	'Educational Details'
);

?>
<div class="tab-pane" id="uses">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-info">
				<div class="panel-heading"><div class="panel-title"><i class="fas fa-warehouse"></i> Uses</div></div>
				<div class="panel-body">
				    <div class="col-md-12">
				    	<div class="row">
		          			<div class="col-md-12">
		          				<div class="col-md-12">
			          				<div class="form-group">
							          	<div class="col-md-6">
							          		<label for="inputClassification" class="control-label"> Tourism</label>
							          		<?= form_textarea($data_tourism,$pamain->tourism) ?>
							          	</div>
							          	<div class="col-md-6">
							          		<label for="inputClassification" class="control-label">Facilities</label>
							          		<?= form_textarea($data_facilities,$pamain->facilities) ?>
							          	</div>
				                  	</div>
			          			</div>
			          			<div class="col-md-12">
			          				<div class="form-group">
							          	<div class="col-md-6">
							          		<label for="inputClassification" class="control-label">Science and Research</label>
							          		<?= form_textarea($data_research,$pamain->science_research) ?>
							          	</div>
							          	<div class="col-md-6">
							          		<label for="inputClassification" class="control-label">Educational Purposes</label>
							          		<?= form_textarea($data_educational,$pamain->educational) ?>
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