<?php
	$data_wCatcode = array(
		'name' 		=>	'wcode',
		'class' 	=>	'form-control',
		'id'		=>	'wcode',
		'required'	=>	'required',
		'placeholder'=> 'Species Category code'
	);
	$data_class = array(
		'name' =>	'wclass',
		'class' 	=>	'form-control',
		'id'		=>	'wclass',
		'required'	=>	'required',
		'placeholder'=> 'Class code'
	);
	$data_wordercode = array(
		'name' 		=>	'worder',
		'class' 	=>	'form-control',
		'id'		=>	'worder',
		'required'	=>	'required',
		'placeholder'=> 'Class code'
	);
	$data_Ordercode = array(
		'name' 		=>	'ordercode',
		'class' 	=>	'form-control',
		'id'		=>	'ordercode',
		'required'	=>	'required',
		'placeholder'=> 'Order code'

	);

	$data_Ordername = array(
		'name' 		=>	'orderdesc',
		'class' 	=>	'form-control',
		'id'		=>	'orderdesc',
		'required'	=>	'required',
		'placeholder'=> 'Order description'

	);
?>
<section class="content">
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-info">
				<?php if (!empty($worder->id_family)): ?>
					<div class="panel-heading"><div class="panel-title"><i class="fas fa-handshake"></i> <?php echo strtoupper(" EDIT <strong>".$worder->OrderDesc."</strong> INFORMATION") ?></div></div>
				<?php else: ?>
					<div class="panel-heading"><div class="panel-title"><i class="fas fa-handshake"></i> ADD NEW ORDER</div></div>
				<?php endif; ?>
				
					<div class="panel-body">
						<div id="divOrder" class="alert text-center" style="display:none;">
							<button type="button" class="close" id="clearMsg"><span aria-hidden="true">&times;</span></button>
							<span style="color:#fff" id="messageorder"></span>								
						</div>
						<div class="col-md-12">
					     <?php echo form_open('','class="form-horizontal" id="orderForm"');
					     if (!empty($worder->id_family)){
						 echo form_hidden('id_family',$worder->id_family);
						 } else {
						 echo form_hidden('id_family');
						 } ?>
							<table width="100%" border="0" cellpadding="3" cellspacing="1" class="table4">
							<?php if (!empty($worder->id_family)): ?>
								<tr valign="top" class="spaceUnder spaceOver">
									<td style="width: 100px">Species Category</td>
									<td><?= form_dropdown($data_wCatcode,$category,$worder->wCategory) ?><span class="error"></span></td>
								</tr>
								<tr valign="top" class="spaceUnder">
									<td style="width: 100px">Class</td>
									<td><?= form_dropdown($data_class,$classListDropdown,$worder->ClassCodes) ?></td>
								</tr>
								<!-- <tr valign="top" class="spaceUnder">
									<td style="width: 150px">Order Code</td>
									<td><?= form_input($data_Ordercode,$worder->OrderCode) ?></td>	
								</tr> -->
								<tr valign="top" class="spaceUnder">
									<td style="width: 150px">Order Description</td>
									<td><?= form_input($data_Ordername,$worder->OrderDesc) ?></td>	
								</tr>
							<?php else: ?>
								<tr valign="top" class="spaceUnder spaceOver">
									<td style="width: 100px">Category</td>
									<td><?= form_dropdown($data_wCatcode,$category) ?></td>
								</tr>
								<tr valign="top" class="spaceUnder">
									<td style="width: 100px">Class</td>
									<td><?= form_dropdown($data_class) ?></td>
								</tr>
								<!-- <tr valign="top" class="spaceUnder">
									<td style="width: 150px">Order Code</td>
									<td><?= form_input($data_Ordercode) ?></td>	
								</tr> -->
								<tr valign="top" class="spaceUnder">
									<td style="width: 150px">Order Description</td>
									<td><?= form_input($data_Ordername) ?></td>	
								</tr>
							<?php endif ?>								
							</table>
						<?php echo form_close(); ?>
						</div>
					</div>
					<div class="box-footer" >
						<div class="col-md-12">	
							<div class="form-group">
								<?php if (!empty($worder->id_family)): ?>
									<button class="btn btn-success btn-flat" id="save_order"><i class="fa fa-save"> UPDATE</i></button>
								<?php else: ?>
									<button class="btn btn-info btn-flat" id="save_order"><i class="fa fa-save"> SAVE</i></button>
								<?php endif ?>
								
								<a class="btn btn-danger btn-flat pull-right" href="<?= base_url('main_server/wildlife/order') ?>"><i class="fa fa-list"> List of Orders</i></a>
							</div>
						</div>
					</div>
			</div>
		</div>
	</div>
</section>
<script type="text/javascript" src="<?php echo base_url("jquery/order.js") ?>"></script>
<script type="text/javascript" src="<?php echo base_url("jquery/selectinorder.js") ?>"></script>
