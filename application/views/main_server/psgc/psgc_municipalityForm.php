<?php
$data_regionid = array(
	'name'	=>	'region_id',
	'class'	=>	'form-control hide',
	'id'	=>	'region_id'

);
$data_provinceid = array(
	'name'	=>	'province_id',
	'class'	=>	'form-control hide',
	'id'	=>	'province_id'

);
$data_municipalname = array(
	'name'	=>	'municipalname',
	'class'	=>	'form-control',
	'id'	=>	'municipalname',
	'placeholder'	=>	'Municipal Name'
);
$data_municipalcode = array(
	'name'	=>	'municipalcode',
	'class'	=>	'form-control',
	'id'	=>	'municipalcode',
	'placeholder'	=>	'Municipal Code'	
);
?>
<section class="content">
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-info">
				<div class="panel-heading"><div class="panel-title"> ADD NEW MUNICIPALITY</div></div>
				<div class="panel-body">
					<div id="divMunicipal" class="alert text-center" style="display:none;">
						<button type="button" class="close" id="clearMsg"><span aria-hidden="true">&times;</span></button>
						<span style="color:#fff" id="messageMunicipal"></span>								
					</div>
					<div class="col-md-12">
						<?php echo form_open('','class="form-horizontal" id="MunicipalForm"'); ?>
						<?php echo form_hidden('id_m',$alldata->id_m); ?>
											
							<table width="100%" border="0" cellpadding="3" cellspacing="1" class="table4">
								<tbody>
									<?php if (!empty($alldata->id_m)): ?>
									<tr valign="top" class="spaceUnder spaceOver">
										<td>Region</td>
										<td>
											<?php echo form_input($data_regionid,$alldata->regionid); ?>
											<strong><?= $alldata->regionName." (". $alldata->regionDesc.")"; ?></strong>
										</td>
									</tr>
									<tr>
										<td>Province</td>
										<td>
											<?php echo form_input($data_provinceid,$alldata->provinceid); ?>
											<strong><?= $alldata->provinceName; ?></strong>
										</td>
									</tr>
									<tr valign="top" class="spaceUnder spaceOver">
										<td>Municipal Code</td>
										<td><?php echo form_input($data_municipalcode,$alldata->municipalCode); ?></td>
									</tr>
									<tr valign="top" class="spaceUnder spaceOver">
										<td>Municipal Name</td>
										<td><?php echo form_input($data_municipalname,$alldata->municipalName); ?></td>	
									</tr>
									<?php else: ?>
									
									<tr valign="top" class="spaceUnder spaceOver">
										<td>Region</td>
										<td>
											<?php echo form_input($data_regionid,$identifyRecords->regionid); ?>
											<strong><?= $identifyRecords->regionName." (". $identifyRecords->regionDesc.")"; ?></strong>
										</td>
									</tr>
									<tr>
										<td>Province</td>
										<td>
											<?php echo form_input($data_provinceid,$identifyRecords->id_p); ?>
											<strong><?= $identifyRecords->provinceName; ?></strong>
										</td>
									</tr>
									<tr valign="top" class="spaceUnder spaceOver">
										<td>Municipal Code</td>
										<td><?php echo form_input($data_municipalcode); ?></td>
									</tr>
									<tr valign="top" class="spaceUnder spaceOver">
										<td>Municipal Name</td>
										<td><?php echo form_input($data_municipalname); ?></td>	
									</tr>									
									<?php endif; ?>
								</tbody>
							</table>
						<?php echo form_close(); ?>
					</div>
				</div>
				<div class="box-footer" >
					<div class="col-md-12">
						<?php if (!empty($alldata->id_m)): ?>
							<div class="form-group">									
								<button class="btn btn-info btn-flat" onclick="insert()"><i class="fa fa-save"> UPDATE</i></button>
								<a class="btn btn-danger btn-flat pull-right" href="<?= base_url('main_server/psgc_locations/municipalityList/'.$alldata->id_p) ?>"><i class="fa fa-list"> List of Municipality</i></a>
							</div>
							<?php else: ?>
							<div class="form-group">
								<button class="btn btn-info btn-flat" onclick="insert()"><i class="fa fa-save"> SAVE</i></button>
								<a class="btn btn-danger btn-flat pull-right" href="<?= base_url('main_server/psgc_locations/municipalityList/'.$identifyRecords->id_p) ?>"><i class="fa fa-list"> List of Municipality</i></a>
							</div>
						<?php endif ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<script type="text/javascript">
function insert()
    {
    	 var url = '<?php echo base_url(); ?>';
    	 $.ajax({
    	 	url : url + '/main_server/psgc_locations/save_municipal',
    	 	type: "POST",
    	 	data: $('#MunicipalForm').serialize(),
    	 	dataType: "JSON",
    	 	success:function(response){
                    $('#messageMunicipal').html(response.messageMunicipal);
                    if(response.error){
                        $('#divMunicipal').removeClass('alert-success').addClass('alert-warning').show();
                         setTimeout(function() {
						           $("#divMunicipal").fadeOut();
						        }, 2000);
                    }
                    else{
                        $('#divMunicipal').removeClass('alert-warning').addClass('alert-success').show();
                        $('#MunicipalForm')[0].reset();
                         setTimeout(function() {
						           $("#divMunicipal").fadeOut();
						        }, 2000);
                    }
                }
    	 });
    	  $(document).on('click', '#clearMsg', function(){
            $('#divMunicipal').hide();
        });
    }
</script>