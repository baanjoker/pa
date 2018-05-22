<?php
$project_name = array(
	'name'	=> 	'projectname',
	'class'	=>	'form-control',
	'type'	=>	'text',
	'placeholder'	=>	'Name of the Project'
);
$funding = array(
	'name'			=> 	'funding',
	'class'			=>	'form-control',
	'type'			=>	'text',
	'placeholder'	=>	'Source of fund',
);
$amount = array(
	'name'			=> 	'amount_fund',
	'class'			=>	'form-control',
	'type'			=>	'text',
	'placeholder'	=>	'Amount of funds (ex. xxx,xxx.xx)',
	'onkeyup'		=>	'run(this)'
);
$implementor = array(
	'name'			=> 	'implementor',
	'class'			=>	'form-control',
	'type'			=>	'text',
	'placeholder'	=>	'Implementor',
);
$remarks = array(
	'name'			=> 	'remarks',
	'class'			=>	'form-control',
	'placeholder'	=>	'Remarks',
	'style'			=>	'height: 150px'
);
$yearstart = array(
	'name'			=> 	'yearstart',
	'class'			=>	'form-control',
);
$yearend = array(
	'name'			=> 	'yearend',
	'class'			=>	'form-control',
);
?>
<div class="tab-pane" id="project">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-info">
				<div class="panel-heading"><div class="panel-title"><i class="fas fa-road"></i> PROJECTS</div></div>
				<div class="panel-body">
					 <div id="responseDivProject" class="alert text-center" style="display:none;">
		                <button type="button" class="close" id="clearMsg"><span aria-hidden="true">&times;</span></button>
		                <span style="color:#000" id="messageproject"></span>
		            </div>
				    <div class="col-md-12">
		          		<div class="form-group">
			          		<div class="col-md-2">
			          			<label for="inputNIP" class="control-label">Project Name</label>
			          		</div>
			          		<div class="col-md-8">
			          			<?php echo form_input($project_name); ?>
			          		</div>
		          		</div>
		          	</div>
		          	<div class="col-md-12">
		          		<div class="form-group">
		          			<div class="col-md-2">
		          				<label for="inputNIP" class="control-label">Year Implement</label>
		          			</div>
		          			<div class="col-sm-3">
		          				<label for="inputNIP" class="control-label">From</label>
		          				<?= form_dropdown($yearstart,$yearList); ?>	   		          				
		          			</div>
		          			<div class="col-sm-3">
		          				<label for="inputNIP" class="control-label">To</label>
		          				<?= form_dropdown($yearend,$yearList); ?>	   		          				
		          			</div>		          			
		          		</div>		          	
		          	</div>
		          	<div class="col-md-12">
		          		<div class="form-group">
		          			<div class="col-md-2">		          				
		          				<label for="inputNIP" class="control-label">Source of Fund</label>
		          			</div>		          		
			          		<div class="col-md-8">			          			
				          		<?php echo form_input($funding); ?>
				          	</div>
			          	</div>
		          	</div>
		          	<div class="col-md-12">
		          		<div class="form-group">
		          			<div class="col-md-2">		          				
		          				<label for="inputNIP" class="control-label"> Project Amount</label>
		          			</div>		          		
			          		<div class="col-md-8">			          			
				          		<?php echo form_input($amount); ?>
				          	</div>
			          	</div>
		          	</div>
		          	<div class="col-md-12">
		          		<div class="form-group">
		          			<div class="col-md-2">		          				
		          				<label for="inputNIP" class="control-label"> Implementor</label>
		          			</div>		          		
			          		<div class="col-md-8">			          			
				          		<?php echo form_input($implementor); ?>
				          	</div>
			          	</div>
		          	</div>
		          	<div class="col-md-12">
		          		<div class="form-group">
		          			<div class="col-md-2">		          				
		          				<label for="inputNIP" class="control-label"> Remarks</label>
		          			</div>		          		
			          		<div class="col-md-8">			          			
				          		<?php echo form_textarea($remarks); ?>
				          	</div>
			          	</div>
		          	</div>
		          	<div class="col-md-12">
			          	<div class="form-group">						       
						    <button type="button" name="btnproject" onclick="insert_projects()" id="submitproject" class="btn btn-success  btn-flat"><i class="fa fa-angle-double-down"> Add to list</i></button>
					    </div>	
			        </div>
			        <div class="col-md-12">
				    	<div class="form-group">
				    		<table id="tablePAProject" class="table table-hover">
				    			<thead>
				    				<tr>
				    					<th>Project Name</th>
				    					<th>Year(Start-End)</th>
				    					<th>Source of Fund</th>
				    					<th>Amount</th>
				    					<th>Implementor</th>
				    					<th>Remarks</th>
				    					<th>Remove?	</th>
				    				</tr>
				    			</thead>
				    			<tbody id="tbodyproject"></tbody>				    			
				    		</table>
				    	</div>
				    </div>
		        </div>
		    </div>
		</div>
	</div>
</div>
