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
				    <table width="100%" border="0" class="table4">
				    	<tr valign="top" class="spaceUnder spaceOver">
				    		<!-- <td style="width: 100px">Tourism</td> -->
				    		<td>Tourism<?= form_textarea($data_tourism,$pamain->tourism) ?></td>				    		
				    	</tr>
				    	<tr valign="top" class="spaceUnder">
				    		<!-- <td>Facilities</td> -->
				    		<td>Facilities<?= form_textarea($data_facilities,$pamain->facilities) ?></td>
				    	</tr>
				    	<tr valign="top" class="spaceUnder">
				    		<!-- <td>Science and Research</td> -->
				    		<td>Science and Research<?= form_textarea($data_research,$pamain->science_research) ?></td>
				    	</tr>
				    	<tr valign="top" class="spaceUnder">
				    		<!-- <td>Educational Purposes</td> -->
				    		<td>Educational Purposes<?= form_textarea($data_educational,$pamain->educational) ?></td>
				    	</tr>
				    </table>
		        </div>
		    </div>
		</div>
	</div>
</div>