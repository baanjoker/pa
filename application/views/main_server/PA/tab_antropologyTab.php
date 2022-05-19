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
				    	<table width="100%" border="0" cellpadding="3" cellspacing="1" class="table4">
				    		<tr valign="top" class="spaceUnder spaceOver">
				    			<!-- <td style="width: 150px">Cultural Resource</td> -->
				    			<td>Cultural Resource<?= form_textarea($data_culturalresource,$pamain->cultural_resource) ?></td>
				    		</tr>
				    		<tr valign="top" class="spaceUnder">
				    			<!-- <td>Politics</td> -->
				    			<td>Politics<?= form_textarea($data_politics,$pamain->politics) ?></td>
				    		</tr>
				    		<tr valign="top" class="spaceUnder">
				    			<!-- <td>Custom Belief</td> -->
				    			<td>Custom Belief<?= form_textarea($data_belief,$pamain->belief) ?></td>
				    		</tr>
				    		<tr valign="top" class="spaceUnder">
				    			<!-- <td>Archeology</td> -->
				    			<td>Archeology<?= form_textarea($data_archeology,$pamain->archeology) ?></td>
				    		</tr>
				    	</table>
		          	</div>
		        </div>
		    </div>
		</div>
	</div>
</div>