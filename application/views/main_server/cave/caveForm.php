
<?php
	$data_region = array(
		'name' 		=>	'region',
		'class' 	=>	'form-control',
		'id'		=>	'regid',
		'required'	=>	'required'
	);
	$data_province = array(
		'name' 		=>	'province',
		'class' 	=>	'form-control',
		'id'		=>	'provid',
		'required'	=>	'required',

	);
	$data_municipal = array(
		'name' 		=>	'municipal',
		'class' 	=>	'form-control',
		'id'		=>	'municipal_id',		
		'required'	=>	'required'
	);
	$data_barangay = array(
		'name' 		=>	'barangay',
		'class' 	=>	'form-control',
		'id'		=>	'bar_id',
	);
	$data_sitio = array(
		'name' 		=>	'sitio',
		'class' 	=>	'form-control',
		'placeholder'=>	'Sitio (optional)',
		'id'		=>	'sitio'
	);
	$data_cavename = array(
		'name' 		=>	'cave_name',
		'class' 	=>	'form-control',
		'placeholder'=>	'Name of Cave',
		'id'		=>	'cavename'
	);

	$data_caveid = array(
		'name'	=>	'id_cave',
		'id'	=>	'id_cave',
	);
?>
<section class="content">
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-info">
				<?php if (!empty($cave->id_cave)): ?>
					<div class="panel-heading"><div class="panel-title"><i class="fas fa-handshake"></i> <?php echo " EDIT <strong>".$cave->cave_name."</strong> INFORMATION" ?></div></div>
				<?php else: ?>
					<div class="panel-heading"><div class="panel-title"><i class="fas fa-handshake"></i> ADD NEW RECORD</div></div>
				<?php endif ?>
				
					<div class="panel-body">
						<div id="divCave" class="alert text-center" style="display:none;">
							<button type="button" class="close" id="clearMsg"><span aria-hidden="true">&times;</span></button>
							<span style="color:#fff" id="messageCave"></span>								
						</div>
						<div class="col-md-12">
					    <?php echo form_open('','class="form-horizontal" id="CaveForm"'); ?>
						<?php echo form_hidden('id_cave',$cave->id_cave)?>
							<table width="100%" border="0" cellpadding="3" cellspacing="1" class="table4">
							<?php if (!empty($cave->id_cave)): ?>
								<tr valign="top" class="spaceUnder spaceOver">
									<td style="width: 100px">Cave Name</td>
									<td><?= form_input($data_cavename,$cave->cave_name) ?></td>
								</tr>
								<tr valign="top" class="spaceUnder">
									<td>Region</td>
									<td><?= form_dropdown($data_region,$rlist,$cave->regionCode) ?><span class="prov_error"></span></td>	
								</tr>
								<tr valign="top" class="spaceUnder">
									<td>Province</td>
									<td><?= form_dropdown($data_province,$plist,$cave->provinceCode) ?><span class="municipal_error"></span></td>
								</tr>
								<tr valign="top" class="spaceUnder">
									<td>Municipality</td>
									<td><?= form_dropdown($data_municipal,$mlist,$cave->municipalCode) ?><span class="barangay_error"></span></td>
								</tr>
								<tr valign="top" class="spaceUnder">
									<td>Barangay</td>
									<td><?= form_dropdown($data_barangay,$blist,$cave->barangayCode) ?></td>
								</tr>
								<tr valign="top" class="spaceUnder">
									<td>Sitio</td>
									<td><?= form_input($data_sitio) ?></td>
								</tr>

							<?php else: ?>

								<tr valign="top" class="spaceUnder spaceOver">
									<td style="width: 100px">Cave Name</td>
									<td><?= form_input($data_cavename) ?></td>
								</tr>
								<tr valign="top" class="spaceUnder">
									<td>Region</td>
									<td><?= form_dropdown($data_region,$rlist) ?><span class="prov_error"></span></td>	
								</tr>
								<tr valign="top" class="spaceUnder">
									<td>Province</td>
									<td><?= form_dropdown($data_province) ?><span class="municipal_error"></span></td>
								</tr>
								<tr valign="top" class="spaceUnder">
									<td>Municipality</td>
									<td><?= form_dropdown($data_municipal) ?><span class="barangay_error"></span></td>
								</tr>
								<tr valign="top" class="spaceUnder">
									<td>Barangay</td>
									<td><?= form_dropdown($data_barangay) ?></td>
								</tr>
								<tr valign="top" class="spaceUnder">
									<td>Sitio</td>
									<td><?= form_input($data_sitio) ?></td>
								</tr>

							<?php endif; ?>
								
							</table>
						<?php echo form_close(); ?>
						</div>
					</div>
					<div class="box-footer" >
						<div class="col-md-12">	
							<div class="form-group">
								<?php if (!empty($cave->id_cave)): ?>
									<button class="btn btn-success btn-flat" id="save_cave"><i class="fa fa-save"> UPDATE</i></button>
								<?php else: ?>
									<button class="btn btn-info btn-flat" id="save_cave"><i class="fa fa-save"> SAVE</i></button>
								<?php endif ?>
								
								<a class="btn btn-danger btn-flat pull-right" href="<?= base_url('main_server/cave') ?>"><i class="fa fa-list"> List of Caves</i></a>
							</div>
						</div>
					</div>
			</div>
		</div>
	</div>
</section>
<script type="text/javascript" src="<?php echo base_url("bmb_assets2/select.js") ?>"></script>