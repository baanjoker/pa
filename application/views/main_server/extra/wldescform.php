<?php
$data = array(
	'name' => 'wtypeid',
	'id'   => 'wtypeid',
	'class'=> 'form-control',
	'type' => 'text',
); 
$data2 = array(
	'name' => 'wdesccode',
	'id'   => 'wdesccode',
	'class'=> 'form-control',
	'type' => 'text',
	'placeholder'=>'Wetland Code',
);
$data3 = array(
	'name' => 'wdescdesc',
	'id'   => 'wdescdesc',
	'class'=> 'form-control',
	'type' => 'text',
	'placeholder'=>'Wetland Description',
);
?>
<section class="content">
	<div class="row">
		<div class="col-md-8">
			<div class="panel panel-info">
				<?php if (!empty($identifier)): ?>
					<div class="panel-heading"><div class="panel-title"><i class="fas fa-handshake"></i><?php echo strtoupper("EDIT INFORMATION") ?></div></div>
				<?php else: ?>
					<div class="panel-heading"><div class="panel-title"><i class="fas fa-handshake"></i> ADD NEW WETLAND DESCRIPTION</div></div>
				<?php endif ?>
				
					<div class="panel-body">
						<div id="divwdesc" class="alert text-center" style="display:none;">
							<button type="button" class="close" id="clearMsg"><span aria-hidden="true">&times;</span></button>
							<span style="color:#fff" id="messagewdesc"></span>								
						</div>
						<div class="col-md-12">
					     <?php echo form_open('','class="form-horizontal" id="wdescForm"');
					     if (!empty($identifier)){
						 echo form_hidden('id_wdesc',$datas->id_wdesc);
						 } else {
						 echo form_hidden('id_wdesc');
						 } ?>
							<table width="100%" border="0" cellpadding="3" cellspacing="1" class="table4">
							<?php if (!empty($identifier)): ?>
								<tr valign="top" class="spaceUnder spaceOver">
									<td style="width: 100px">Wetland Type</td>
									<td><?= form_dropdown($data,$wtypelist,$datas->wtype_id) ?></td>
								</tr>
								<tr valign="top" class="spaceUnder spaceOver">
									<td style="width: 100px">Wetland Code</td>
									<td><?= form_input($data2,$datas->wdesccode) ?></td>
								</tr>
								<tr valign="top" class="spaceUnder">
									<td style="width: 150px">Wetland Description</td>
									<td><?= form_input($data3,$datas->wdescdesc) ?></td>	
								</tr>
							<?php else: ?>
								<tr valign="top" class="spaceUnder spaceOver">
									<td style="width: 100px">Wetland Type</td>
									<td><?= form_dropdown($data,$wtypelist) ?></td>
								</tr>
								<tr valign="top" class="spaceUnder spaceOver">
									<td style="width: 100px">Wetland Code</td>
									<td><?= form_input($data2) ?></td>
								</tr>
								<tr valign="top" class="spaceUnder">
									<td style="width: 150px">Wetland Description</td>
									<td><?= form_input($data3) ?></td>	
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
									<button class="btn btn-success btn-flat" id="save_wldesc"><i class="fa fa-save"> UPDATE</i></button>
								<?php else: ?>
									<button class="btn btn-info btn-flat" id="save_wldesc"><i class="fa fa-save"> SAVE</i></button>
								<?php endif ?>
								
								<a class="btn btn-danger btn-flat pull-right" href="<?= base_url('main_server/library/wldesc') ?>"><i class="fa fa-list"> List of Wetland Description </i></a>
							</div>
						</div>
					</div>
			</div>
		</div>
	</div>
</section>
<script type="text/javascript" src="<?php echo base_url("jquery/extra/wdesc.js") ?>"></script>