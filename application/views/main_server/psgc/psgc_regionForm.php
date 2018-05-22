
<?php 
$data_regionCode = array(
	'name' => 'region_code',
	'id'   => 'region_code',
	'class'=> 'form-control',
	'type' => 'number',
	'placeholder'=>'Region Code',
	'maxlength'	=>	'9',		 
);
$data_regionName = array(
	'name' => 'region_name',
	'id'   => 'region_name',
	'class'=> 'form-control',
	'placeholder'=>'Region Name',	
);
$data_regionDesc = array(
	'name' => 'region_desc',
	'id'   => 'region_desc',
	'class'=> 'form-control',
	'placeholder'=>'Region Description',	
);
?>

<section class="content">
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-info">
				<?php if (!empty($psgc->id)): ?>
					<div class="panel-heading"><div class="panel-title"><i class="fas fa-handshake"></i> Edit <?php echo $psgc->regionName." data information" ?></div></div>
				<?php else: ?>
					<div class="panel-heading"><div class="panel-title"><i class="fas fa-handshake"></i> Add new Region</div></div>
				<?php endif ?>
				



				<div class="panel-body">
					<div id="divRegion" class="alert text-center" style="display:none;">
						<button type="button" class="close" id="clearMsg"><span aria-hidden="true">&times;</span></button>
						<span style="color:#fff" id="messageRegion"></span>								
					</div>
				    <div class="col-md-12">
				    	<?php echo form_open('','class="form-horizontal" id="RegionForm"'); ?>
						<?php echo form_hidden('id',$psgc->id);?>
						
						<table width="100%" border="0" cellpadding="3" cellspacing="1" class="table4">
							<tr valign="top" class="spaceUnder spaceOver">
								<td>Region Code</td>
								<td><?php echo form_input($data_regionCode,$psgc->regionCode); ?></td>	
							</tr>
							<tr valign="top" class="spaceUnder">
								<td>Region Name</td>
								<td><?php echo form_input($data_regionName,$psgc->regionName); ?></td>
							</tr>
							<tr valign="top" class="spaceUnder">
								<td>Region Description</td>
								<td><?php echo form_input($data_regionDesc,$psgc->regionDesc); ?></td>
							</tr>
						</table>
		          	</div>
		        </div>
		        <?= form_close(); ?>
		        <div class="box-footer" >
					<div class="col-md-12">				
						<?php if(!empty($psgc->id)): ?>
						<div class="form-group">
							<button class="btn btn-info btn-flat" onclick="insert()"><i class="fa fa-save"> UPDATE</i></button>
							<a class="btn btn-danger btn-flat pull-right" href="<?= base_url('main_server/psgc_locations/regionList') ?>"><i class="fa fa-list"> List of Region</i></a>
						</div>
						<?php else: ?>
						<div class="form-group">
							<button class="btn btn-info btn-flat" onclick="insert()"><i class="fa fa-save"> SAVE</i></button>
							<a class="btn btn-danger btn-flat pull-right" href="<?= base_url('main_server/psgc_locations/regionList') ?>"><i class="fa fa-list"> List of Region</i></a>
						</div>
						<?php endif; ?>
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
    	 	url : url + '/main_server/psgc_locations/save_region',
    	 	type: "POST",
    	 	data: $('#RegionForm').serialize(),
    	 	dataType: "JSON",
    	 	success:function(response){
                    $('#messageRegion').html(response.messageRegion);
                    if(response.error){
                        $('#divRegion').removeClass('alert-success').addClass('alert-warning').show();
                         setTimeout(function() {
						           $("#divRegion").fadeOut();

						        }, 2000);
                    }
                    else{
                        $('#divRegion').removeClass('alert-warning').addClass('alert-success').show();
                        $('#RegionForm')[0].reset();
                         setTimeout(function() {
						// $("#responseDiv").hide();
						           $("#divRegion").fadeOut();

						        }, 2000);
                        getTables();
                    }
                }
    	 });
    	  $(document).on('click', '#clearMsg', function(){
            $('#divRegion').hide();
        });
    }

</script>