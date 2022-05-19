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
				<div class="panel-heading"><div class="panel-title"><i class="fa fa-exclamation-triangle"></i> THREATS</div></div>
				<div class="panel-body">
					<table width="100%" border="0" class="table4">
				    	<tr valign="top" class="spaceUnder spaceOver">
				    		<td>Threats<?= form_textarea($data_threat,$pamain->threats) ?></td>				    		
				    	</tr><tr><td></td><td></td></tr>
				    </table>
				</div>
			</div>
		</div>
	</div>
</div>