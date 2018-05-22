<?php
$data_threat = array(
	'name'	=> 'threat',
	'class'	=> 'form-control',
	'placeholder'	=>	'Threats Detail',
);

?>
<div class="tab-pane" id="threat">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-info">
				<div class="panel-heading"><div class="panel-title"><i class="fas fa-exclamation-triangle"></i> THREATS</div></div>
				<div class="panel-body">
				    <div class="col-md-12">
				    	<div class="form-group">
							<div class="col-md-12">
							    <!-- <label for="inputClassification" class="control-label">Threats</label> -->
							    <?= form_textarea($data_threat,$pamain->threats) ?>
							</div>							          	
				        </div>
				    </div>
				</div>
			</div>
		</div>
	</div>
</div>