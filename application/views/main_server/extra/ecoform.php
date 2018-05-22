<?php
$data = array(
	'name' => 'ecocode',
	'id'   => 'ecocode',
	'class'=> 'form-control',
	'type' => 'text',
	'placeholder'=>'Ecosystem Code',
); 
$data2 = array(
	'name' => 'description',
	'id'   => 'description',
	'class'=> 'form-control',
	'type' => 'text',
	'placeholder'=>'Description',
);
?>
<section class="content">
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-info">
				<?php if (!empty($identifier)): ?>
					<div class="panel-heading"><div class="panel-title"><i class="fas fa-handshake"></i><?php echo strtoupper(" EDIT <strong>".$datas->description."</strong> INFORMATION") ?></div></div>
				<?php else: ?>
					<div class="panel-heading"><div class="panel-title"><i class="fas fa-handshake"></i> ADD NEW ECOSYSTEM LIBRARY</div></div>
				<?php endif ?>
				
					<div class="panel-body">
						<div id="diveco" class="alert text-center" style="display:none;">
							<button type="button" class="close" id="clearMsg"><span aria-hidden="true">&times;</span></button>
							<span style="color:#fff" id="messageeco"></span>								
						</div>
						<div class="col-md-12">
					     <?php echo form_open('','class="form-horizontal" id="ecoForm"');
					     if (!empty($identifier)){
						 echo form_hidden('id',$datas->id);
						 } else {
						 echo form_hidden('id');
						 } ?>
							<table width="100%" border="0" cellpadding="3" cellspacing="1" class="table4">
							<?php if (!empty($identifier)): ?>
								<tr valign="top" class="spaceUnder spaceOver">
									<td style="width: 100px">Ecosystem Code</td>
									<td><?= form_input($data,$datas->EcoCode) ?></td>
								</tr>
								<tr valign="top" class="spaceUnder">
									<td style="width: 150px"> Description</td>
									<td><?= form_input($data2,$datas->description) ?></td>	
								</tr>
							<?php else: ?>
								<tr valign="top" class="spaceUnder spaceOver">
									<td style="width: 100px">Ecosystem Code</td>
									<td><?= form_input($data) ?></td>
								</tr>
								<tr valign="top" class="spaceUnder">
									<td style="width: 150px"> Description</td>
									<td><?= form_input($data2) ?></td>	
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
									<button class="btn btn-success btn-flat" id="save_eco"><i class="fa fa-save"> UPDATE</i></button>
								<?php else: ?>
									<button class="btn btn-info btn-flat" id="save_eco"><i class="fa fa-save"> SAVE</i></button>
								<?php endif ?>
								
								<a class="btn btn-danger btn-flat pull-right" href="<?= base_url('main_server/library/ecosystem') ?>"><i class="fa fa-list"> List of Ecosystem Libraries </i></a>
							</div>
						</div>
					</div>
			</div>
		</div>
	</div>
</section>
<script type="text/javascript" src="<?php echo base_url("jquery/extra/ecosystem.js") ?>"></script>