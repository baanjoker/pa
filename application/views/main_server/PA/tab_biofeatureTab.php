
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
            <div class="panel-heading"><div class="panel-title"><i class="fas fa-flask"></i> BIOLOGICAL FEATURES</div></div>
            	<div class="panel-body">
		            <div class="col-md-12">
				        <div class="form-group">
				        	 <div id="responseDivBiological" class="alert text-center" style="display:none;">
		                    	<button type="button" class="close" id="clearMsg"><span aria-hidden="true">&times;</span></button>
		                    	<span style="color:#000" id="messagebiological"></span>
		                    </div>
					        <div class="col-md-3">
					        	<label for="input" class="control-label">Wildlife Common Name</label>
					        </div>
					        <div class="form-inline">
						        <div class="col-md-8">
						        	<?php echo form_dropdown($input_commonname,$commonnameList); ?>	
						        	<button type="button" name="btnbiological" onclick="insert_biological()" id="submitlocationbiological" class="btn btn-success  btn-flat"><i class="fa fa-angle-double-down"> Add to list</i></button>
						        </div>	
						        <div id="results"></div>	
					        </div>	

				        </div>
				    </div>
				    <div class="col-md-12">
				    	<div class="form-group">
				    		<table id="tablePABiolofeature" class="table table-hover">
				    			<thead>
				    				<tr>
				    					<th>Category</th>
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
</div>
