<?php
$data_legisno = array(
    'name' => 'legisno',
    'id'   => 'legisno',
    'class'=> 'form-control',
    'type' => 'text',
    'placeholder'=>'Legislation No.');
$data_legisarea = array(
    'name' => 'area',
    'id'   => 'area',
    'class'=> 'form-control',
    'type' => 'text',
    'placeholder'=>'Area (has.)',
	'onkeyup'=>'run(this)');
$data_legisbuffer = array(
    'name' => 'buffer',
    'id'   => 'buffer',
    'class'=> 'form-control',
    'type' => 'text',
    'placeholder'=>'Buffer Zone (has.)',
	'onkeyup'=>'run(this)');
$data_legispdf = array(
    'name' => 'picture',
    'id'   => 'picture',
    'class'=> 'form-control',
    'type' => 'file',
    'placeholder'=>'PDF File');
?>
<div class="tab-pane" id="ordinance">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-info">
				<div class="panel-heading"><div class="panel-title"><i class="fa fa-map"></i> Other Proclamation</div></div>
				<div class="panel-body">
					<table width="100%" border="0" cellpadding="3" cellspacing="1" class="table4">
				    	<tr valign="top" class="spaceUnder spaceOver">
				    	<div id="responseDivLegis" class="alert text-center" style="display:none;">
			    			<button type="button" class="close" id="clearMsgLegis"><span aria-hidden="true">&times;</span></button>
			    			<span style="color:#000" id="messagelegis"></span>
			    		</div>
				    		<td style="width: 100px">Legislation</td>
				    		<td colspan="3"><?php echo form_dropdown('legis_id',$procList,'','class="form-control" id="legis_id"') ?></td>
				    	</tr>
				    	<tr valign="top" class="spaceUnder">
				    		<td>Legislation No.</td>
				    		<td colspan="3"><?php echo form_input($data_legisno); ?></td></span>
				    	</tr>	
				    	<tr valign="top" class="spaceUnder">
				    		<td>Dated</td>
				    		<td><?php echo form_dropdown('date_month',$monthList,'','class="form-control"'); ?></td>
				    		<td><?php echo form_dropdown('date_day',$dayList,'','class="form-control"'); ?></td>
				    		<td><?php echo form_dropdown('date_year',$yearList,'','class="form-control"'); ?></td>
				    	</tr>
				    	<tr valign="top" class="spaceUnder">
				    		<td>Area (hectare)</td>
				    		<td colspan="3"><?php echo form_input($data_legisarea); ?></td>
						</tr>
						<tr valign="top" class="spaceUnder">
							<td>Buffer Zone (hectare)</td>
							<td colspan="3"><?php echo form_input($data_legisbuffer); ?></td>
						</tr>
						<tr valign="top" class="spaceUnder hide">
							<td>PDF File</td>
							<td colspan="3"><input type="file" name="picture" id="picture"><input type="hidden" name="old_file"></td>
						</tr>
				    </table><br>
				    <button type="button" name="btnlegislation" onclick="insert_legis2()" id="btnlegislation" class="btn btn-success btn-flat"><i class="fa fa-angle-double-down"> Add to list</i></button>
				    <div class="table-responsive">
				    	<table id="tableLegislation" class="table table-hover">
				    		<thead>
				    			<tr>
				    				<th>LEGISLATION</th>
				    				<th>DATED</th>
								    <th>AREA(ha.)</th>
								    <th>BUFFER ZONE(ha.)</th>
								    <th>Remove</th>
								    </tr>
							</thead>
							<tbody id="tbodylegis"></tbody>
						</table>
					</div>	
				</div>
			</div>
		</div>
	</div>
</div>
