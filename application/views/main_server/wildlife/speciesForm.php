<?php 
$input_family = array(
	'name'	=>	'familyid',
	'class'	=>	'form-control'
);
$input_speciescode = array(
	'name'	=>	'speciescode',
	'class'	=>	'form-control',
	'type'	=>	'text',
	'placeholder'	=>	'Input Species Code'
);
$input_commonname = array(
	'name'	=>	'commonname',
	'class'	=>	'form-control',
	'type'	=>	'text',
	'placeholder'	=>	'Input Common Name'
);
$input_scientificname = array(
	'name'	=>	'scientificanamegenus',
	'class'	=>	'form-control',
	'type'	=>	'text',
	'placeholder'	=>	'Input Scientific Name'
);
?>
<section class="content">
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-info">
				<?php if (!empty($wspecies->id_genus)): ?>
					<div class="panel-heading"><div class="panel-title"><i class="fas fa-handshake"></i> <?php echo strtoupper(" EDIT <strong>".$wspecies->scientificName_genus."</strong> INFORMATION") ?></div></div>
				<?php else: ?>
					<div class="panel-heading"><div class="panel-title"><i class="fas fa-handshake"></i> ADD NEW SPECIES</div></div>
				<?php endif; ?>
				
					<div class="panel-body">
						<div id="divSpecies" class="alert text-center" style="display:none;">
							<button type="button" class="close" id="clearMsg"><span aria-hidden="true">&times;</span></button>
							<span style="color:#fff" id="messagespecies"></span>								
						</div>
						<div class="col-md-12">
					     <?php echo form_open('','class="form-horizontal" id="speciesForm"');
					     if (!empty($wspecies->id_genus)){
						 echo form_hidden('id_genus',$wspecies->id_genus);
						 } else {
						 echo form_hidden('id_genus');
						 } ?>
							<table width="100%" border="0" cellpadding="3" cellspacing="1" class="table4">
							<?php if (!empty($wspecies->id_genus)): ?>
								<tr valign="top" class="spaceUnder spaceOver">
									<td style="width: 100px">Family Name</td>
									<td><?= form_dropdown($input_family,$family,$wspecies->family_id) ?><span class="error"></span></td>
								</tr>
								<tr valign="top" class="spaceUnder">
									<td>Species Code</td>
									<td><?= form_input($input_speciescode,$wspecies->speciesCode) ?></td>
								</tr>
								<tr valign="top" class="spaceUnder">
									<td>Common Name</td>
									<td><?= form_input($input_commonname,$wspecies->commonNameSpecies) ?></td>
								</tr>
								<tr valign="top" class="spaceUnder">
									<td>Scientific Name</td>
									<td><?= form_input($input_scientificname,$wspecies->scientificName_genus) ?></td>
								</tr>
							<?php else: ?>
								<tr valign="top" class="spaceUnder spaceOver">
									<td style="width: 100px">Family Name</td>
									<td><?= form_dropdown($input_family,$family) ?><span class="error"></span></td>
								</tr>
								<tr valign="top" class="spaceUnder">
									<td>Species Code</td>
									<td><?= form_input($input_speciescode) ?></td>
								</tr>
								<tr valign="top" class="spaceUnder">
									<td>Common Name</td>
									<td><?= form_input($input_commonname) ?></td>
								</tr>
								<tr valign="top" class="spaceUnder">
									<td>Scientific Name</td>
									<td><?= form_input($input_scientificname) ?></td>
								</tr>
							<?php endif; ?>
						</table>
							<?php echo form_close(); ?>
						</div>
					</div>
					<div class="box-footer" >
						<div class="col-md-12">	
							<div class="form-group">
								<?php if (!empty($wspecies->id_genus)): ?>
									<button class="btn btn-success btn-flat" id="save_species"><i class="fa fa-save"> UPDATE</i></button>
								<?php else: ?>
									<button class="btn btn-info btn-flat" id="save_species"><i class="fa fa-save"> SAVE</i></button>
								<?php endif ?>	
								<a class="btn btn-danger btn-flat pull-right" href="<?= base_url('main_server/wildlife/species') ?>"><i class="fa fa-list"> List of Species Genus</i></a>							
							</div>
						</div>
					</div>
			</div>
		</div>
	</div>
</section>
<script type="text/javascript" src="<?php echo base_url("jquery/species.js") ?>"></script>
