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
$input_iucn = array(
	'name'	=>	'iucnid',
	'class'	=>	'form-control'
);
$input_residency = array(
	'name'	=>	'residency',
	'class'	=>	'form-control'
);
$input_paname = array(
	'name'	=>	'paname',
	'class'	=>	'form-control'
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
					     <?php echo form_open_multipart('','class="form-horizontal" id="speciesForm"');
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
									<td>Common Name</td>
									<td><?= form_input($input_commonname,$wspecies->commonNameSpecies) ?></td>
								</tr>
								<tr valign="top" class="spaceUnder">
									<td>Scientific Name</td>
									<td><?= form_input($input_scientificname,$wspecies->scientificName_genus) ?></td>
								</tr>
								<tr valign="top" class="spaceUnder spaceOver">
									<td style="width: 100px">Conservation Status</td>
									<td><?= form_dropdown($input_iucn,$iucn,$wspecies->status) ?><span class="error"></span></td>
								</tr>
								<tr valign="top" class="spaceUnder spaceOver">
									<td style="width: 100px">Residency Status</td>
									<td><?= form_dropdown($input_residency,$residency_list_status,$wspecies->residency_status) ?><span class="error"></span></td>
								</tr>
								<tr valign="top" class="spaceUnder spaceOver hide">
									<td style="width: 100px">Name of Protected Area</td>
									<td><?= form_dropdown($input_paname,$panames,$wspecies->generatedcode) ?><span class="error"></span></td>
								</tr>
								<tr>
									<td>Image Edit</td>
									<td>
										<img width="200px" height="180px" id="img_wildlife" src="<?php echo (!empty($wspecies->image)?base_url('bmb_assets2/upload/wildlife_img/').$wspecies->image :base_url("bmb_assets2/upload/wildlife_img/nophoto.jpg")) ?>" alt="your image" /><br>
										<input type="file" name="picture" id="picture" onchange="readURLWild(this);"/>
										<input type="hidden" name="old_picture ?>"> 			 				
									</td>
								</tr>
							<?php else: ?>
								<tr valign="top" class="spaceUnder spaceOver">
									<td style="width: 100px">Family Name</td>
									<td><?= form_dropdown($input_family,$family) ?><span class="error"></span></td>
								</tr>								
								<tr valign="top" class="spaceUnder">
									<td>Common Name</td>
									<td><?= form_input($input_commonname) ?></td>
								</tr>
								<tr valign="top" class="spaceUnder">
									<td>Scientific Name</td>
									<td><?= form_input($input_scientificname) ?></td>
								</tr>
								<tr valign="top" class="spaceUnder spaceOver">
									<td style="width: 100px">Conservation Status</td>
									<td><?= form_dropdown($input_iucn,$iucn) ?><span class="error"></span></td>
								</tr>
								<tr valign="top" class="spaceUnder spaceOver">
									<td style="width: 100px">Residency Status</td>
									<td><?= form_dropdown($input_residency,$residency_list_status) ?><span class="error"></span></td>
								</tr>
								<tr valign="top" class="spaceUnder spaceOver hide">
									<td style="width: 100px">Name of Protected Area</td>
									<td><?= form_dropdown($input_paname,$panames) ?><span class="error"></span></td>
								</tr>
								<tr>
									<td>Image New</td>
									<td>
										<img width="200px" height="180px" id="img_wildlife" src="<?php echo (!empty($wspecies->image)?base_url('bmb_assets2/upload/wildlife_img/').$wspecies->image :base_url("bmb_assets2/upload/wildlife_img/nophoto.jpg")) ?>" alt="your image" /><br>
										<input type="file" name="picture" id="picture" onchange="readURLWild(this);" />
										<input type="hidden" name="old_picture"> 				
																			
									</td>
								</tr>
							<?php endif; ?>
						</table>
							<?php echo form_close(); ?>
						</div>
					</div>
					<div class="box-footer" >
						<div class="col-md-12">	
							<div class="form-group">								
									<a class="btn btn-success btn-flat" id="save_speciess"><i class="fa fa-save"> CONFIRM</i></a>								
								<a class="btn btn-danger btn-flat pull-right" href="<?= base_url('main_server/wildlife/species') ?>"><i class="fa fa-list"> List of Species Genus</i></a>							
							</div>
						</div>
					</div>
			</div>
		</div>
	</div>
</section>
<script type="text/javascript" src="<?php echo base_url("jquery/species.js") ?>"></script>
<script type="text/javascript">
function readURLWild(input) {
    if (input.files && input.files[0]) {
      	var reader = new FileReader();
      		reader.onload = function (e) {
      			$('#img_wildlife').attr('src', e.target.result);
      		}
        reader.readAsDataURL(input.files[0]);
    }
  }
</script>
