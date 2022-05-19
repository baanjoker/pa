
<?php
$input_commonname = array(
	'name'	=>	'commonname',
	'id'	=>	'commonname',
	'class'	=>	'form-control'
);
?>
<div class="tab-pane" id="biofeature">
    <div class="row">
        <div class="col-md-12">
          <div class="panel panel-info">
            <div class="panel-heading"><div class="panel-title"><i class="fa fa-flask"></i> BIOLOGICAL FEATURES</div></div>
            	<div class="panel-body">
            		<?php echo form_hidden('id_pabiological'); ?>
            		<div id="responseDivBiological" class="alert text-center" style="display:none;">
		                <button type="button" class="close" id="clearMsg"><span aria-hidden="true">&times;</span></button>
		                <span style="color:#000" id="messagebiological"></span>
		            </div>
            		<table width="100%" border="0" class="table4">
				    	<tr valign="top" class="spaceUnder spaceOver">
				    		<td style="width: auto">Wildlife Common Name</td>
				    		<td><?php echo form_dropdown($input_commonname,$commonnameList); ?></td>				    		
				    	</tr><tr><td></td><td></td></tr>
				    </table><br>
				    <button type="button" name="btnbiological" onclick="insert_biological()" id="submitlocationbiological" class="btn btn-success  btn-flat"><i class="fa fa-angle-double-down"> Add to list</i></button>
				    <div id="results"></div>
				    <div class="table-responsive">
				    	<table id="tablePABiolofeature" class="table table-hover">
				    		<thead>
				    			<tr>
				    				<th>Conservation Status</th>
				    				<th>Class</th>
				    				<th>Order</th>
				    				<th>Family Name</th>
				    				<th>Common Name</th>
				    				<th>Option</th>
				    			</tr>
				    		</thead>
				    		<tbody id="tbodybiological"></tbody>				    			
				    	</table>
				    </div>
            	</div>
          	</div>
        </div>
    </div> 
</div>
