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
				<div class="panel-heading"><div class="panel-title"><i class="fa fa-road"></i> PROJECTS</div></div>
				<div class="panel-body">
					 <div id="responseDivProject" class="alert text-center" style="display:none;">
		                <button type="button" class="close" id="clearMsg"><span aria-hidden="true">&times;</span></button>
		                <span style="color:#000" id="messageproject"></span>
		            </div>
		            <table width="100%" border="0" cellpadding="3" cellspacing="1" class="table4">
				    	<tr valign="top" class="spaceUnder spaceOver">
				    		<td style="width: 100px">Project Name</td>
				    		<td colspan="4"><?php echo form_input($project_name); ?></td>				    		
				    	</tr>
				    	<tr valign="top" class="spaceUnder">
				    		<td style="width: 100px">Year Implement</td>
				    		<td style="width: 50px">From</td>
				    		<td><?= form_dropdown($yearstart,$yearListed); ?></td>
				    		<td style="text-align: center;width: 50px">To</td>
				    		<td><?= form_dropdown($yearend,$yearListed); ?></td>
				    	</tr>
				    	<tr valign="top" class="spaceUnder">
				    		<td>Source of Fund</td>
				    		<td colspan="4"><?php echo form_input($funding); ?></td>
				    	</tr>
				    	<tr valign="top" class="spaceUnder">
				    		<td>Project Amount</td>
				    		<td colspan="4"><?php echo form_input($amount); ?></td>
				    	</tr>
				    	<tr valign="top" class="spaceUnder">
				    		<td>Implementor</td>
				    		<td colspan="4"><?php echo form_input($implementor); ?></td>
				    	</tr>
				    	<tr valign="top" class="spaceUnder">
				    		<td>Remarks</td>
				    		<td colspan="4"><?php echo form_textarea($remarks); ?></td>
				    	</tr>				    	
				    </table><br>
				    <button type="button" name="btnproject" onclick="insert_projects()" id="submitproject" class="btn btn-success  btn-flat"><i class="fa fa-angle-double-down"> Add to list</i></button>
				    <div class="table-responsive">
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
