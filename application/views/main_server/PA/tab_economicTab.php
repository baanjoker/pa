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
					<table width="100%" border="0" cellpadding="3" cellspacing="1" class="table4">
				    	<tr valign="top" class="spaceUnder spaceOver">
				    		<td>Ethinicity<?= form_textarea($data_ethnicity,$pamain->ethinicity) ?></td>				    		
				    	</tr>
				    	<tr valign="top" class="spaceUnder">
				    		<td>Demography<?= form_textarea($data_demography,$pamain->demography) ?></td>				    		
				    	</tr>
				    	<tr valign="top" class="spaceUnder">
				    		<td>Livelihood<?= form_textarea($data_livelihood,$pamain->livelihood) ?></td>				    		
				    	</tr>
				    	<tr valign="top" class="spaceUnder">
				    		<td>Social Service<?= form_textarea($data_socialservice,$pamain->social_service) ?></td>			    		
				    	</tr>
				    </table>				   
		        </div>
		    </div>
		</div>
	</div>
</div>