<?php
$data1 = array(
	'name'	=>	'wetlandname',
	'id'	=>	'wetlandname',
	'class'	=>	'form-control',
	'placeholder'	=>	'Name of Wetland'
);
$data2 = array(
	'name'	=>	'wltype',
	'id'	=>	'wltype',
	'class'	=>	'form-control',
);

$data3 = array(
	'name'	=>	'wldesc',
	'id'	=>	'wldesc',
	'class'	=>	'form-control',
);
$data4 = array(
	'name'	=>	'wetlandpa',
	'id'	=>	'wetlandpa',
	// 'class'	=>	'form-control',
	// 'type'	=>	'checkbox'
);

$datar = array(
	'name'	=>	'regionid',
	'id'	=>	'regid',
	'class'	=>	'form-control',
);
$datap = array(
	'name'	=>	'provinceid',
	'id'	=>	'provid',
	'class'	=>	'form-control',
);
$datam = array(
	'name'	=>	'municipalid',
	'id'	=>	'municipal_id',
	'class'	=>	'form-control',
);
$datab = array(
	'name'	=>	'barangayid',
	'id'	=>	'bar_id',
	'class'	=>	'form-control',
);
$data5 = array(
	'name'	=>	'landuse',
	'id'	=>	'landuse',
	'class'	=>	'form-control',
	'placeholder' => 'Landuse Details',
	'style'	=> 'height:100px'
);
$data6 = array(
	'name'	=>	'status',
	'id'	=>	'status',
	'class'	=>	'form-control',
	'placeholder' => 'Status of the Area',
	'style'	=> 'height:100px'
);
$data7 = array(
	'name'	=>	'remarks',
	'id'	=>	'remarks',
	'class'	=>	'form-control',
	'placeholder' => 'Remarks',
	'style'	=> 'height:100px'
);

$datalatdeg = array(
	'name'	=>	'coor_lat_deg',
	'id'	=>	'coor_lat_deg',
	'class'	=>	'form-control',
	'placeholder' => 'Degree',
);
$datalatmin = array(
	'name'	=>	'coor_lat_min',
	'id'	=>	'coor_lat_min',
	'class'	=>	'form-control',
	'placeholder' => 'Minutes',
);
$datalatsec = array(
	'name'	=>	'coor_lat_sec',
	'id'	=>	'coor_lat_sec',
	'class'	=>	'form-control',
	'placeholder' => 'Seconds',
);

$datalongdeg = array(
	'name'	=>	'coor_long_deg',
	'id'	=>	'coor_long_deg',
	'class'	=>	'form-control',
	'placeholder' => 'Degree',
);
$datalongmin = array(
	'name'	=>	'coor_long_min',
	'id'	=>	'coor_long_min',
	'class'	=>	'form-control',
	'placeholder' => 'Minutes',
);
$datalongsec = array(
	'name'	=>	'coor_long_sec',
	'id'	=>	'coor_long_sec',
	'class'	=>	'form-control',
	'placeholder' => 'Seconds',
);
$datatotalarea = array(
	'name'	=>	'area',
	'id'	=>	'area',
	'class'	=>	'form-control',
	'placeholder' => 'Area(Hectares)',
);
$dataaltitude = array(
	'name'	=>	'altitude',
	'id'	=>	'altitude',
	'class'	=>	'form-control',
	'placeholder' => 'Altitude of the area',
);
$datadepth = array(
	'name'	=>	'depth',
	'id'	=>	'depth',
	'class'	=>	'form-control',
	'placeholder' => 'Depth of the area',
);
?>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-info">
					<?php if (!empty($identifier)): ?>
						<div class="panel-heading"><div class="panel-title"><i class="fas fa-handshake"></i> <?php echo strtoupper(" EDIT <strong>".$records->wetlandname."</strong> INFORMATION") ?></div></div>
					<?php else: ?>
						<div class="panel-heading"><div class="panel-title"><i class="fas fa-handshake"></i> ADD NEW WETLAND AREA</div></div>
					<?php endif ?>
					
					<div class="panel-body">
						<div id="divwetland" class="alert text-center" style="display:none;">
							<button type="button" class="close" id="clearMsg"><span aria-hidden="true">&times;</span></button>
							<span style="color:#fff" id="messagewetland"></span>								
						</div>
						<div class="col-md-12">
					    <?php 
					    echo form_open('','class="form-horizontal" id="wetlandForm"');
					    if (!empty($identifier)):
						echo form_hidden('id_wetland',$records->id_wetland);
						else:
						echo form_hidden('id_wetland');
						endif;
						?>
							<table width="100%" border="0" cellpadding="3" cellspacing="1" class="table4">
							<?php if (!empty($records->id_wetland)): ?>
								<tr valign="top" class="spaceUnder spaceOver">
									<td style="width: 20%">Wetland Name</td>
									<td colspan="3"><?= form_input($data1,$records->wetlandname) ?></td>
								</tr>
								<tr valign="top" class="spaceUnder">
									<td>Wetland Type</td>
									<td colspan="3"><?= form_dropdown($data2,$wtype,$records->wltypeid) ?><span class="error"></span></td>
								</tr>	
								<tr valign="top" class="spaceUnder">
									<td>Wetland Description</td>
									<td colspan="3"><?= form_dropdown($data3,$wldesc,$records->wltypeid) ?></td>
								</tr>	
								<tr valign="top" class="spaceUnder">
									<td></td>
									<td colspan="3">
										<!-- <input type="hidden" name="wetlandpa" value="0"> -->
										<div class="checkbox"><label><?= form_checkbox('wetlandpa',$records->wetlandpa,set_value('wetlandpa',$records->wetlandpa)) ?>Wetland within Protected Area</label></div>
									</td>
								</tr>	
								<tr valign="top" class="spaceUnder">
									<td>Region </td>
									<td colspan="3"><?= form_dropdown($datar,$regionlist,$records->regionid) ?><span class="prov_error"></td>
								</tr>	
								<tr valign="top" class="spaceUnder">
									<td>Province </td>
									<td colspan="3"><?= form_dropdown($datap,$prov_list,$records->provinceid) ?><span class="municipal_error"></span></td>
								</tr>	
								<tr valign="top" class="spaceUnder">
									<td>Municipality </td>
									<td colspan="3"><?= form_dropdown($datam,$mun_list,$records->municipalid) ?><span class="barangay_error"></span></td>
								</tr>
								<tr valign="top" class="spaceUnder">
									<td>Barangay </td>
									<td colspan="3"><?= form_dropdown($datab,$bar_list,$records->barangayid) ?></td>
								</tr>	
								<tr valign="top" class="spaceUnder">
									<td>Longitude </td>
									<td><?= form_input($datalongdeg,$records->coor_lat_deg) ?></td>
									<td><?= form_input($datalongmin,$records->coor_lat_min) ?></td>
									<td><?= form_input($datalongsec,$records->coor_lat_sec) ?></td>
								</tr>	
								<tr valign="top" class="spaceUnder">
									<td>Latitude </td>
									<td><?= form_input($datalatdeg,$records->coor_long_deg) ?></td>
									<td><?= form_input($datalatmin,$records->coor_long_min) ?></td>
									<td><?= form_input($datalatsec,$records->coor_long_sec) ?></td>
								</tr>	
								<tr valign="top" class="spaceUnder">
									<td>Area </td>
									<td colspan="3"><?= form_input($datatotalarea,$records->area) ?></td>
								</tr>
								<tr valign="top" class="spaceUnder">
									<td>Altitude </td>
									<td colspan="3"><?= form_input($dataaltitude,$records->altitude) ?></td>
								</tr>
								<tr valign="top" class="spaceUnder">
									<td>Depth </td>
									<td colspan="3"><?= form_input($datadepth,$records->depth) ?></td>
								</tr>
								<tr valign="top" class="spaceUnder">
									<td>Landuse </td>
									<td colspan="3"><?= form_textarea($data5,$records->landuse) ?></td>
								</tr>	
								<tr valign="top" class="spaceUnder">
									<td>Status of the Area </td>
									<td colspan="3"><?= form_textarea($data6,$records->status) ?></td>
								</tr>	
								<tr valign="top" class="spaceUnder">
									<td>Remarks </td>
									<td colspan="3"><?= form_textarea($data7,$records->remarks) ?></td>
								</tr>
							<?php else: ?>		
								<tr valign="top" class="spaceUnder spaceOver">
									<td style="width: 20%">Wetland Name</td>
									<td colspan="3"><?= form_input($data1) ?></td>
								</tr>
								<tr valign="top" class="spaceUnder">
									<td>Wetland Type</td>
									<td colspan="3"><?= form_dropdown($data2,$wtype) ?><span class="error"></span></td>
								</tr>	
								<tr valign="top" class="spaceUnder">
									<td>Wetland Description</td>
									<td colspan="3"><?= form_dropdown($data3) ?></td>
								</tr>	
								<tr valign="top" class="spaceUnder">
									<td></td>
									<td colspan="3">
										<input type="hidden" name="wetlandpa" value="0">
										<div class="checkbox"><label><?= form_checkbox('wetlandpa','',set_value('wetlandpa')) ?>Wetland within Protected Area</label></div>
									</td>
								</tr>	
								<tr valign="top" class="spaceUnder">
									<td>Region </td>
									<td colspan="3"><?= form_dropdown($datar,$regionlist) ?><span class="prov_error"></td>
								</tr>	
								<tr valign="top" class="spaceUnder">
									<td>Province </td>
									<td colspan="3"><?= form_dropdown($datap) ?><span class="municipal_error"></td>
								</tr>	
								<tr valign="top" class="spaceUnder">
									<td>Municipality </td>
									<td colspan="3"><?= form_dropdown($datam) ?><span class="barangay_error"></td>
								</tr>
								<tr valign="top" class="spaceUnder">
									<td>Barangay </td>
									<td colspan="3"><?= form_dropdown($datab) ?></td>
								</tr>	
								<tr valign="top" class="spaceUnder">
									<td>Longitude </td>
									<td><?= form_input($datalongdeg) ?></td>
									<td><?= form_input($datalongmin) ?></td>
									<td><?= form_input($datalongsec) ?></td>
								</tr>	
								<tr valign="top" class="spaceUnder">
									<td>Latitude </td>
									<td><?= form_input($datalatdeg) ?></td>
									<td><?= form_input($datalatmin) ?></td>
									<td><?= form_input($datalatsec) ?></td>
								</tr>	
								<tr valign="top" class="spaceUnder">
									<td>Area </td>
									<td colspan="3"><?= form_input($datatotalarea) ?></td>
								</tr>
								<tr valign="top" class="spaceUnder">
									<td>Altitude </td>
									<td colspan="3"><?= form_input($dataaltitude) ?></td>
								</tr>
								<tr valign="top" class="spaceUnder">
									<td>Depth </td>
									<td colspan="3"><?= form_input($datadepth) ?></td>
								</tr>
								<tr valign="top" class="spaceUnder">
									<td>Landuse </td>
									<td colspan="3"><?= form_textarea($data5) ?></td>
								</tr>	
								<tr valign="top" class="spaceUnder">
									<td>Status of the Area </td>
									<td colspan="3"><?= form_textarea($data6) ?></td>
								</tr>	
								<tr valign="top" class="spaceUnder">
									<td>Remarks </td>
									<td colspan="3"><?= form_textarea($data7) ?></td>
								</tr>
							<?php endif; ?>								
							</table>
						<?php echo form_close(); ?>
						</div>
					</div>
					<div class="box-footer" >
						<div class="col-md-12">	
							<div class="form-group">
								<?php if (!empty($identifier)): ?>
									<button class="btn btn-success btn-flat" id="save_wetland"><i class="fa fa-save"> UPDATE</i></button>
								<?php else: ?>
									<button class="btn btn-info btn-flat" id="save_wetland"><i class="fa fa-save"> SAVE</i></button>
								<?php endif ?>
								
								<a class="btn btn-danger btn-flat pull-right" href="<?= base_url('main_server/wetland') ?>"><i class="fa fa-list"> List of Wetland</i></a>
							</div>
						</div>
					</div>
			</div>
		</div>
	</div>
</section>
<script type="text/javascript" src="<?php echo base_url("jquery/wetland.js") ?>"></script>