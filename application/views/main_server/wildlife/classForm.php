<?php
	$data_wCatcode = array(
		'name' 		=>	'wcode',
		'class' 	=>	'form-control',
		'id'		=>	'wcode',
		'required'	=>	'required',
		'placeholder'=> 'Category code'
	);
	$data_code = array(
		'name' 		=>	'classcode',
		'class' 	=>	'form-control',
		'id'		=>	'classcode',
		'required'	=>	'required',
		'placeholder'=> 'Class code'
	);
	$data_name = array(
		'name' 		=>	'classdesc',
		'class' 	=>	'form-control',
		'id'		=>	'classdesc',
		'required'	=>	'required',
		'placeholder'=> 'Class description'

	);
?>
<section class="content">
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-info">
				<?php if (!empty($identifier)): ?>
					<div class="panel-heading"><div class="panel-title"><i class="fas fa-handshake"></i> <?php echo strtoupper(" EDIT <strong>".$wclass->ClassDesc."</strong> INFORMATION") ?></div></div>
				<?php else: ?>
					<div class="panel-heading"><div class="panel-title"><i class="fas fa-handshake"></i> ADD NEW CLASS</div></div>
				<?php endif ?>
				
					<div class="panel-body">
						<div id="divClass" class="alert text-center" style="display:none;">
							<button type="button" class="close" id="clearMsg"><span aria-hidden="true">&times;</span></button>
							<span style="color:#fff" id="messageclass"></span>								
						</div>
						<div class="col-md-12">
					     <?php echo form_open('','class="form-horizontal" id="classForm"');
					     if (!empty($identifier)){
						 echo form_hidden('id_c',$wclass->id_c);
						 } else {
						 echo form_hidden('id_c');
						 } ?>
							<table width="100%" border="0" cellpadding="3" cellspacing="1" class="table4">
							<?php if (!empty($identifier)): ?>
								<tr valign="top" class="spaceUnder spaceOver">
									<td style="width: 100px">Species Category</td>
									<td><?= form_dropdown($data_wCatcode,$category,$wclass->WCode) ?></td>
								</tr>
								<!-- <tr valign="top" class="spaceUnder">
									<td style="width: 100px">Class Code</td>
									<td><?= form_input($data_code,$wclass->ClassCode) ?></td>
								</tr> -->
								<tr valign="top" class="spaceUnder">
									<td style="width: 150px">Class Description</td>
									<td><?= form_input($data_name,$wclass->ClassDesc) ?></td>	
								</tr>
							<?php else: ?>
								<tr valign="top" class="spaceUnder spaceOver">
									<td style="width: 100px">Species Category</td>
									<td><?= form_dropdown($data_wCatcode,$category) ?></td>
								</tr>
								<!-- <tr valign="top" class="spaceUnder">
									<td style="width: 100px">Class Code</td>
									<td><?= form_input($data_code) ?></td>
								</tr> -->
								<tr valign="top" class="spaceUnder">
									<td style="width: 150px">Class Description</td>
									<td><?= form_input($data_name) ?></td>	
								</tr>
							<?php endif ?>								
							</table>
						<?php echo form_close(); ?>
						</div>
					</div>
					<div class="box-footer" >
						<div class="col-md-12">	
							<div class="form-group">
								<?php if (!empty($identifier)): ?>
									<button class="btn btn-success btn-flat" id="btn_save_class"><i class="fa fa-save"> UPDATE</i></button>
								<?php else: ?>
									<button class="btn btn-info btn-flat" id="btn_save_class"><i class="fa fa-save"> SAVE</i></button>
								<?php endif ?>
								
								<a class="btn btn-danger btn-flat pull-right" href="<?= base_url('main_server/wildlife/wclass') ?>"><i class="fa fa-list"> List of Class</i></a>
							</div>
						</div>
					</div>
			</div>
		</div>
	</div>
</section>
<script type="text/javascript" src="<?php echo base_url("jquery/class.js") ?>"></script>