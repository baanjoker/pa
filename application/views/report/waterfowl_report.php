<?php
	$field_1 = array(
		'name' 		=>	'c_field1',
		'class' 	=>	'form-control',
		'id'		=>	'c_field1',
	);
	$comparison_1 = array(
		'name' 		=>	'comparison1',
		'class' 	=>	'form-control',
		'id'		=>	'comparison1',
	);
	$value_1 = array(
		'name' 		=>	'c_value1',
		'class' 	=>	'form-control',
		'id'		=>	'c_value1',
		'placeholder'=>	'Comparison value'
	);
	$field_2 = array(
		'name' 		=>	'c_field2',
		'class' 	=>	'form-control',
		'id'		=>	'c_field2',
	);
	$comparison_2 = array(
		'name' 		=>	'comparison2',
		'class' 	=>	'form-control',
		'id'		=>	'comparison2',
	);
	$comparison_and_or_2 = array(
		'name' 		=>	'comparisonandor2',
		'class' 	=>	'form-control',
		'id'		=>	'comparisonandor2',
	);
	$value_2 = array(
		'name' 		=>	'c_value2',
		'class' 	=>	'form-control',
		'id'		=>	'c_value2',
		'placeholder'=>	'Comparison value'
	);

	$field_3 = array(
		'name' 		=>	'c_field3',
		'class' 	=>	'form-control',
		'id'		=>	'c_field3',
	);
	$comparison_3 = array(
		'name' 		=>	'comparison3',
		'class' 	=>	'form-control',
		'id'		=>	'comparison3',
	);
	$comparison_and_or_3 = array(
		'name' 		=>	'comparisonandor3',
		'class' 	=>	'form-control',
		'id'		=>	'comparisonandor3',
	);
	$value_3 = array(
		'name' 		=>	'c_value3',
		'class' 	=>	'form-control',
		'id'		=>	'c_value3',
		'placeholder'=>	'Comparison value'
	);
	$field_4 = array(
		'name' 		=>	'c_field4',
		'class' 	=>	'form-control',
		'id'		=>	'c_field4',
	);
	$order_by = array(
		'name' 		=>	'orderby',
		'class' 	=>	'form-control',
		'id'		=>	'orderby',
	);
?>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-info">
				<div class="panel-heading"><div class="panel-title"><i class="fas fa-handshake"></i>Advance Search</div></div>
				<div class="panel-body">					
					<table width="100%" border="0" cellpadding="3" cellspacing="1" class="table4">
						<?php echo form_open('report/printpdf/waterfowlpdf','id="formSearch"') ?>
						<tr valign="top" class="spaceUnder spaceOver">
							<td>Filter 1</td>
							<td></td>
							<td><?= form_dropdown($field_1,$filter_field) ?></td>
							<td><?= form_dropdown($comparison_1,$filter_comparison) ?></td>
							<td><?= form_input($value_1) ?></td>
							<td><a type='button' class='btn btn-flat btn-warning btn-clearfield1' title='Clear' ><i class='fa fa-eraser'></i></a></td>
						</tr>
						<tr valign="top" class="spaceUnder">
							<td>Filter 2</td>
							<td><?= form_dropdown($comparison_and_or_2,$filter_comparison_and_or) ?></td>
							<td><?= form_dropdown($field_2,$filter_field) ?></td>
							<td><?= form_dropdown($comparison_2,$filter_comparison) ?></td>
							<td><?= form_input($value_2) ?></td>
							<td><a type='button' class='btn btn-flat btn-warning btn-clearfield2' title='Clear' ><i class='fa fa-eraser'></i></a></td>
						</tr>
						<!-- <tr valign="top" class="spaceUnder">
							<td>Filter 3</td>
							<td><?= form_dropdown($comparison_and_or_3,$filter_comparison_and_or) ?></td>
							<td><?= form_dropdown($field_3,$filter_field) ?></td>
							<td><?= form_dropdown($comparison_3,$filter_comparison) ?></td>
							<td><?= form_input($value_3) ?></td>
							<td><a type='button' class='btn btn-flat btn-warning btn-clearfield3' title='Clear' ><i class='fa fa-eraser'></i></a></td>
						</tr> -->
						<tr valign="top" class="spaceUnder">
							<td>Order By</td>
							<td><?= form_dropdown($field_4,$filter_field) ?></td>
							<td><?= form_dropdown($order_by,$sortby) ?></td>
						</tr>
						<tr valign="top" class="spaceUnder">
							<td><button type="button" name="btnfilter" id="btnfilter" onclick="getMewaterfowl();"  class="btn btn-success  btn-flat"><i class="fa fa-search"> Apply Filter</i></button></td>
							<td colspan="5"><?php echo form_submit('', 'Export to PDF','class="btn btn-info btn-flat"'); ?></td>				
						</tr>
					</table>	
					<?php form_close(); ?>
					<div class="table-responsive">
							<table id="TableCaveFiltered" class="table table-hover">
				    		<thead>
				    			<tr>
									<th>WETLAND NAME</th>
                    				<th>REGION</th>
                    				<th>PROVINCE</th> 
                    				<th>Date Census</th>   
                    				<th>Discovered Species</th>                 				
				    			</tr>
				    		</thead>
				    		 <tbody id="tbodywaterfilter"></tbody>				    		
				    	</table>
						</div>
				</div>
			</div>
		</div>
	</div>
</section>
<script type="text/javascript" src="<?php echo base_url("bmb_assets2/search.js") ?>"></script>
