<?php 
$data_regionid = array(
	'name'	=>	'region_id',
	'class'	=>	'form-control hide',
	'id'	=>	'region_id'

);
$data_provinceName = array(
	'name'	=>	'province_name',
	'class'	=>	'form-control',
	'placeholder'	=>	'Province Name'
);
$data_provinceCode = array(
	'name'	=>	'province_code',
	'class'	=>	'form-control',
	'placeholder'	=>	'Province Code'
);
?>
<section class="content">
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-info">
					<?php if (!empty($alldata->id_p)): ?>
					<div class="panel-heading"><div class="panel-title"><?php echo "EDIT INFORMATION IN THE PROVINCE OF ".$alldata->provinceName; ?></div></div>
					<?php else: ?>
					<div class="panel-heading"><div class="panel-title"></i> ADD NEW PROVINCE</div></div>
					<?php endif; ?>	
				<div class="panel-body">
					<div id="divProvince" class="alert text-center" style="display:none;">
						<button type="button" class="close" id="clearMsg"><span aria-hidden="true">&times;</span></button>
						<span style="color:#fff" id="messageProvince"></span>								
					</div>
				    <div class="col-md-12">
				    	<?php echo form_open('','class="form-horizontal" id="ProvinceForm"'); ?>
						<?php echo form_hidden('id_p',$alldata->id_p);?>

							
							<table width="100%" border="0" cellpadding="3" cellspacing="1" class="table4">
								<tbody>
									<?php if (!empty($alldata->id_p)): ?>
									<tr valign="top" class="spaceUnder spaceOver">
										<td style="width: 150px;">REGION</td>
										<td><?php echo form_input($data_regionid,$alldata->regionid); ?>
											<strong><?= $alldata->regionName." (". $alldata->regionDesc.")"; ?></strong>
										</td>
									</tr>
									<tr valign="top" class="spaceUnder spaceOver">
									<td>Province Code</td>
									<td><?php echo form_input($data_provinceCode,$alldata->provinceCode); ?></td>	
									</tr>
									<tr valign="top" class="spaceUnder">
										<td>Province Name</td>
										<td><?php echo form_input($data_provinceName,$alldata->provinceName); ?></td>
									</tr>
									<?php else: ?>
									<tr valign="top" class="spaceUnder spaceOver">
										<td>REGION</td>
										<td><?php echo form_input($data_regionid,$regionId); ?>
											<?= $provList->regionName." (". $provList->regionDesc.")"; ?>
										</td>
									</tr>
									<tr valign="top" class="spaceUnder spaceOver">
										<td>Province Code</td>
										<td><?php echo form_input($data_provinceCode); ?></td>	
									</tr>
									<tr valign="top" class="spaceUnder">
										<td>Province Name</td>
										<td><?php echo form_input($data_provinceName); ?></td>
									</tr>									
									<?php endif ?>
								</tbody>
							</table>								
		          	</div>
		        </div>
		        <?= form_close(); ?>
		        <div class="box-footer" >
				<div class="col-md-12">				
					<?php if(!empty($alldata->id_p)): ?>
					<div class="form-group">
						<button class="btn btn-info btn-flat" onclick="insert()"><i class="fa fa-save"> UPDATE</i></button>
						<a class="btn btn-danger btn-flat pull-right" href="<?= base_url('main_server/psgc_locations/provinceList/'.$alldata->id) ?>"><i class="fa fa-list"> List of Province in <?php echo $alldata->regionName; ?></i></a>
					</div>
					<?php else: ?>
					<div class="form-group">
						<button class="btn btn-info btn-flat" onclick="insert()"><i class="fa fa-save"> SAVE</i></button>
						<a class="btn btn-danger btn-flat pull-right" href="<?= base_url('main_server/psgc_locations/provinceList/'.$provList->id) ?>"><i class="fa fa-list"> List of Province in <?php echo $provList->regionName; ?></i></a>
					</div>
					<?php endif; ?>
				
				</div>
				<div class="col-md-12">
					<div class="form-group">
						
					</div>
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
    	 	url : url + '/main_server/psgc_locations/save_province',
    	 	type: "POST",
    	 	data: $('#ProvinceForm').serialize(),
    	 	dataType: "JSON",
    	 	success:function(response){
                    $('#messageProvince').html(response.messageProvince);
                    if(response.error){
                        $('#divProvince').removeClass('alert-success').addClass('alert-warning').show();
                         setTimeout(function() {
						// $("#responseDiv").hide();
						           $("#divProvince").fadeOut();

						        }, 2000);
                    }
                    else{
                        $('#divProvince').removeClass('alert-warning').addClass('alert-success').show();
                        $('#ProvinceForm')[0].reset();
                         setTimeout(function() {
						// $("#responseDiv").hide();
						           $("#divProvince").fadeOut();

						        }, 2000);
                        getTables();
                    }
                }
    	 });
    	  $(document).on('click', '#clearMsg', function(){
            $('#divProvince').hide();
        });
    }

</script>