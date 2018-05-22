<?php
	$data_wCatcode = array(
		'name' 		=>	'catid',
		'class' 	=>	'form-control',
		'id'		=>	'catid',
		'required'	=>	'required',
		'placeholder'=> 'Category code'
	);
	$data_class = array(
		'name' =>	'classid',
		'class' 	=>	'form-control',
		'id'		=>	'classid',
		'required'	=>	'required',
		'placeholder'=> 'Class code'
	);
	$data_order = array(
		'name' =>	'orderid',
		'class' 	=>	'form-control',
		'id'		=>	'orderid',
		'required'	=>	'required',
		'placeholder'=> 'Order code'
	);
	$data_wfamilycode = array(
		'name' 		=>	'wfamily',
		'class' 	=>	'form-control',
		'id'		=>	'wfamily',
		'required'	=>	'required',
		'placeholder'=> 'Family code'
	);
	$data_commonname = array(
		'name' 		=>	'commonname',
		'class' 	=>	'form-control',
		'id'		=>	'commonname',
		'required'	=>	'required',
		'placeholder'=> 'Common Name'

	);
	$data_scientific = array(
		'name' 		=>	'scientificname',
		'class' 	=>	'form-control',
		'id'		=>	'scientificname',
		'required'	=>	'required',
		'placeholder'=> 'Scientific Name'

	);

	$data_wCatcodeModal = array(
		'name' 		=>	'wcode',
		'class' 	=>	'form-control',
		'id'		=>	'catid',
		'required'	=>	'required',
		'placeholder'=> 'Category code'
	);
	$data_classModal = array(
		'name' 		=>	'wclass',
		'class' 	=>	'form-control',
		'id'		=>	'classid',
		'required'	=>	'required',
		'placeholder'=> 'Class code'
	);
	$data_wordercodeModal = array(
		'name' 		=>	'worder',
		'class' 	=>	'form-control',
		'id'		=>	'worder',
		'required'	=>	'required',
		'placeholder'=> 'Class code'
	);
	$data_OrdercodeModal = array(
		'name' 		=>	'ordercode',
		'class' 	=>	'form-control',
		'id'		=>	'ordercode',
		'required'	=>	'required',
		'placeholder'=> 'Order code'

	);

	$data_OrdernameModal = array(
		'name' 		=>	'orderdesc',
		'class' 	=>	'form-control',
		'id'		=>	'orderdesc',
		'required'	=>	'required',
		'placeholder'=> 'Order code description'

	);
?>
<section class="content">
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-info">
				<?php if (!empty($wfamily->id_scientific)): ?>
					<div class="panel-heading"><div class="panel-title"><i class="fas fa-handshake"></i> <?php echo strtoupper(" EDIT <strong>".$wfamily->ScientificName."</strong> INFORMATION") ?></div></div>
				<?php else: ?>
					<div class="panel-heading"><div class="panel-title"><i class="fas fa-handshake"></i> ADD NEW ORDER</div></div>
				<?php endif; ?>
				
					<div class="panel-body">
						<div id="divFamily" class="alert text-center" style="display:none;">
							<button type="button" class="close" id="clearMsg"><span aria-hidden="true">&times;</span></button>
							<span style="color:#fff" id="messagefamily"></span>								
						</div>
						<div class="col-md-12">
					     <?php echo form_open('','class="form-horizontal" id="familyForm"');
					     if (!empty($wfamily->id_scientific)){
						 echo form_hidden('id_scientific',$wfamily->id_scientific);
						 } else {
						 echo form_hidden('id_scientific');
						 } ?>
							<table width="100%" border="0" cellpadding="3" cellspacing="1" class="table4">
							<?php if (!empty($wfamily->id_scientific)): ?>
								<tr valign="top" class="spaceUnder spaceOver">
									<td style="width: 100px">Category</td>
									<td><?= form_dropdown($data_wCatcode,$category,$wfamily->WCode) ?><span class="error"></span></td>
								</tr>
								<tr valign="top" class="spaceUnder">
									<td style="width: 100px">Class</td>
									<td><?= form_dropdown($data_class,$classListDropdown,$wfamily->ClassCode) ?><span class="error2"></span></td>
								</tr>
								<tr valign="top" class="spaceUnder">
									<td style="width: 100px">Order</td>
									<td><?= form_dropdown($data_order,$OrderListDropdown,$wfamily->Ordercode) ?><span class="error3"></span> </span></td>
								</tr>
								<tr valign="top" class="spaceUnder">
									<td style="width: 150px">Family Code</td>
									<td><?= form_input($data_wfamilycode,$wfamily->FamilyCode) ?></span> </td>	
								</tr>
								<tr valign="top" class="spaceUnder">
									<td style="width: 150px">Common Name</td>
									<td><?= form_input($data_commonname,$wfamily->CommonName) ?></td>	
								</tr>
								<tr valign="top" class="spaceUnder">
									<td style="width: 150px">Scientific Name</td>
									<td><?= form_input($data_scientific,$wfamily->ScientificName) ?></td>	
								</tr>
							<?php else: ?>
								<tr valign="top" class="spaceUnder spaceOver">
									<td style="width: 100px">Category</td>
									<td><?= form_dropdown($data_wCatcode,$category) ?><span class="error"></span></td>
								</tr>
								<tr valign="top" class="spaceUnder">
									<td style="width: 100px">Class</td>
									<td><?= form_dropdown($data_class) ?><span class="error2"></span></td>
								</tr>
								<tr valign="top" class="spaceUnder">
									<td style="width: 100px">Order</td>
									<td><?= form_dropdown($data_order) ?><span class="error3"></span></td>
								</tr>
								<tr valign="top" class="spaceUnder">
									<td style="width: 150px">Family Code</td>
									<td><?= form_input($data_wfamilycode) ?></span> </td>	
								</tr>
								<tr valign="top" class="spaceUnder">
									<td style="width: 150px">Common Name</td>
									<td><?= form_input($data_commonname) ?></td>	
								</tr>
								<tr valign="top" class="spaceUnder">
									<td style="width: 150px">Scientific Name</td>
									<td><?= form_input($data_scientific) ?></td>	
								</tr>
							<?php endif ?>								
							</table>
						<?php echo form_close(); ?>
						</div>
					</div>
					<div class="box-footer" >
						<div class="col-md-12">	
							<div class="form-group">
								<?php if (!empty($wfamily->id_scientific)): ?>
									<button class="btn btn-success btn-flat" id="save_family"><i class="fa fa-save"> UPDATE</i></button>
								<?php else: ?>
									<button class="btn btn-info btn-flat" id="save_family"><i class="fa fa-save"> SAVE</i></button>
								<?php endif ?>
								
								<a class="btn btn-danger btn-flat pull-right" href="<?= base_url('main_server/wildlife/family') ?>"><i class="fa fa-list"> List of Family</i></a>
							</div>
						</div>
					</div>
			</div>
		</div>
	</div>
</section>
<script type="text/javascript" src="<?php echo base_url("jquery/family.js") ?>"></script>
<script type="text/javascript" src="<?php echo base_url("jquery/selectinfamily.js") ?>"></script>
