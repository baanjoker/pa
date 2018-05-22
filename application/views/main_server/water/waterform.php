<?php 
$region = array(
	'name'	=>	'regid',
	'id'	=>	'regid',
	'class'	=>	'form-control'
);
$province = array(
	'name'	=>	'provid',
	'id'	=>	'provid',
	'class'	=>	'form-control'
);
$wetland = array(
	'name'	=>	'wetlandid',
	'id'	=>	'wetlandid',
	'class'	=>	'form-control'
);
$year = array(
	'name'	=>	'year',
	'id'	=>	'year',
	'class'	=>	'form-control'
);
$month = array(
	'name'	=>	'month',
	'id'	=>	'month',
	'class'	=>	'form-control'
);
$speciesname = array(
	'name'	=>	'genus_id',
	'id'	=>	'genus_id',
	'class'	=>	'form-control'
);

$total = array(
	'name'	=>	'total',
	'id'	=>	'total',
	'class'	=>	'form-control'
);

?>
<?php
 function generateRandomString($length = 10)
    {
        $char = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $charlength = strlen($char);
        $randomString = '';
        for ($i=0; $i < $length; $i++) {
            $randomString .= $char[mt_rand(0, $charlength -1)];
        }
        return $randomString;
    }
?>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-info">
					<?php if (!empty($identifier)) { ?>
						<div class="panel-heading"><div class="panel-title"><i class="fas fa-handshake"></i> Update <?php echo $records->wetlandname." Information" ?></div></div>
					<?php }else{ ?>
						<div class="panel-heading"><div class="panel-title"><i class="fas fa-handshake"></i> ADD NEW WATERFOWL</div></div>
					<?php } ?>
						
					<div class="panel-body">
						<div id="divwater" class="alert text-center" style="display:none;">
							<button type="button" class="close" id="clearMsg"><span aria-hidden="true">&times;</span></button>
							<span style="color:#fff" id="messagewater"></span>								
						</div>
						<div class="col-md-12">

					    <?php 
					    echo form_open('','class="form-horizontal" id="waterForm"');
					    if (!empty($identifier)) {
					    echo form_hidden('id_wf',$records->id_wf);
					    }else{
						echo form_hidden('id_wf');
						}
						?>
						<?php if (!empty($identifier)) { ?>
							<input type="text" name="gencode" class="hide" value="<?php echo $records->randomcode ?>" id="codegen">
						<?php } else { ?>
							<input type="text" name="gencode" class="hide" value="<?php echo generateRandomString() ?>" id="codegen">
						<?php } ?>
						
							<table width="100%" border="0" cellpadding="3" cellspacing="1" class="table4">
								<?php if (!empty($identifier)) { ?>
								<tr valign="top" class="spaceUnder spaceOver">
									<td style="width: 20%">Region</td>
									<td colspan="3"><?= form_dropdown($region,$regionlist,$records->regionid) ?><span class="prov_error"></span></td>
								</tr>
								<tr valign="top" class="spaceUnder">
									<td style="width: 20%">Province</td>
									<td colspan="3"><?= form_dropdown($province,$plist,$records->provinceid) ?><span class="wetland_error"></span></td>
								</tr>
								<tr valign="top" class="spaceUnder">
									<td style="width: 20%">Wetland Name</td>
									<td colspan="3"><?= form_dropdown($wetland,$wetlandlist,$records->wetlandid) ?></td>
								</tr>
								<tr valign="top" class="spaceUnder">
									<td style="width: 20%">Date of Cencus</td>
									<td><?= form_dropdown($year,$dateyear,$records->year_census) ?></td>
									<td><?= form_dropdown($month,$datemonth,$records->month_census) ?></td>
								</tr>
								<tr>
									<td></td>
									<td> <button type="button" name="btnlocation" id="submitlocation" onclick="insert_Main()" class="btn btn-success  btn-flat"><i class="fa fa-save"> UPDATE</i></button></td>
									<td></td>
								</tr>
								<tr></tr>
							</table><br><label>IDENTIFIED SPECIES</label>
							<table width="100%" border="0" cellpadding="3" cellspacing="1" class="table4">
								<div id="divspecies" class="alert text-center" style="display:none;">
									<button type="button" class="close" id="clearMsg"><span aria-hidden="true">&times;</span></button>
									<span style="color:#fff" id="messagespecies"></span>								
								</div>
								<?php echo form_hidden('id_wfspecies'); ?>
								<tr valign="top" class="spaceUnder spaceOver">
									<td style="width: 20%">Species Name</td>
									<td colspan="3"><?= form_dropdown($speciesname,$speciesList) ?><span class="prov_error"></span></td>
								</tr>
								<tr valign="top" class="spaceUnder">
									<td style="width: 20%">No. of Species</td>
									<td colspan="3"><?= form_input($total) ?><span class="prov_error"></span></td>
								</tr>
								<tr>
									<td></td>
									<td><button type="button" name="btnspecies" onclick="" id="btnspecies" class="btn btn-success btn-flat"><i class="fa fa-angle-double-down"> Add to list and Update</i></button></td>
								</tr>		
								<tr></tr>
								<?php } else { ?>
								<tr valign="top" class="spaceUnder spaceOver">
									<td style="width: 20%">Region</td>
									<td colspan="3"><?= form_dropdown($region,$regionlist) ?><span class="prov_error"></span></td>
								</tr>
								<tr valign="top" class="spaceUnder">
									<td style="width: 20%">Province</td>
									<td colspan="3"><?= form_dropdown($province) ?><span class="wetland_error"></span></td>
								</tr>
								<tr valign="top" class="spaceUnder">
									<td style="width: 20%">Wetland Name</td>
									<td colspan="3"><?= form_dropdown($wetland) ?></td>
								</tr>
								<tr valign="top" class="spaceUnder">
									<td style="width: 20%">Date of Cencus</td>
									<td><?= form_dropdown($year,$dateyear) ?></td>
									<td><?= form_dropdown($month,$datemonth) ?></td>
								</tr>
								<tr>
									<td></td>
									<td> <button type="button" name="btnlocation" id="submitlocation" onclick="insert_Main()" class="btn btn-success  btn-flat"><i class="fa fa-save"> SAVE</i></button></td>
									<td></td>
								</tr>
								<tr></tr>
							</table><br><label>IDENTIFIED SPECIES</label>
							<table width="100%" border="0" cellpadding="3" cellspacing="1" class="table4">
								<div id="divspecies" class="alert text-center" style="display:none;">
									<button type="button" class="close" id="clearMsg"><span aria-hidden="true">&times;</span></button>
									<span style="color:#fff" id="messagespecies"></span>								
								</div>
								<?php echo form_hidden('id_wfspecies'); ?>
								<tr valign="top" class="spaceUnder spaceOver">
									<td style="width: 20%">Species Name</td>
									<td colspan="3"><?= form_dropdown($speciesname,$speciesList) ?><span class="prov_error"></span></td>
								</tr>
								<tr valign="top" class="spaceUnder">
									<td style="width: 20%">No. of Species</td>
									<td colspan="3"><?= form_input($total) ?><span class="prov_error"></span></td>
								</tr>
								<tr>
									<td></td>
										<td><button type="button" name="btnspecies" onclick="" id="btnspecies" class="btn btn-success btn-flat"><i class="fa fa-angle-double-down"> Add to list and Save</i></button></td>
								</tr>		
								<tr></tr>
								<?php } ?>														
							</table>
							<table id="tablespecies" class="table table-hover">
								<thead>
									<tr>
										<th>SPECIES</th>
								        <th>TOTAL</th>								           
								       	<th>Remove</th>
								    </tr>

								</thead>
								<tbody id="tbodyspecies"></tbody>
								<tfoot id="tfootertotal"></tfoot>
							</table>
						<?php echo form_close(); ?>
						</div>
					</div>
					<div class="box-footer" >
						<div class="col-md-12">	
							<div class="form-group">
								<!-- <?php if (!empty($identifier)) { ?>
									<button class="btn btn-info btn-flat" id="save_water"><i class="fa fa-save"> UPDATE</i></button>
								<?php } else { ?>
									<button class="btn btn-info btn-flat" id="save_water"><i class="fa fa-save"> SAVE</i></button>
								<?php } ?>
								 -->
								<a class="btn btn-danger btn-flat pull-left" href="<?= base_url('main_server/water') ?>"><i class="fa fa-list"> List of Waterfowl</i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
</section>
<script type="text/javascript" src="<?php echo base_url("jquery/water.js") ?>"></script>
<script type="text/javascript">
	function fetchspe(){
        var url = '<?php echo base_url(); ?>';
        var codegen = $('#codegen').val();
        $.ajax({
            type: 'POST',
            data : {codegens:codegen},
            url: BASE_URL + 'main_server/water/fetchspecies',
            success:function(response){
                $('#tbodyspecies').html(response);
            }
        });
    }


function fetchgtotal(){
        var url = '<?php echo base_url(); ?>';
        var codegen = $('#codegen').val();
        $.ajax({
            type: 'POST',
            data : {codegens:codegen},
            url: BASE_URL + 'main_server/water/fetchgtotal',
            success:function(response){
                $('#tfootertotal').html(response);
            }
        });
    }

var myLink = document.getElementById('btnspecies');
myLink.addEventListener('click', function() { 
       var url = '<?php echo base_url(); ?>';
       $.ajax({
        url : BASE_URL+'/main_server/water/save_species/',
        type: "POST",
        data: $('#waterForm').serialize(),
        dataType: "JSON",
        success:function(response){
                    $('#messagespecies').html(response.messagespecies);
                    if(response.error){
                        $('#divspecies').removeClass('alert-success').addClass('alert-warning').show();
                         setTimeout(function() {
                       $("#divspecies").fadeOut();                       
                    }, 2000);
                    }
                    else{
                        $('#divspecies').removeClass('alert-warning').addClass('alert-success').show();
                        setTimeout(function() {                         	
                       $("#divspecies").fadeOut();
                    }, 2000);
                        $("#genus_id").each(function() { this.selectedIndex = 0 });
                        document.getElementById('total').value = "";                   
                        fetchspe();
                        fetchgtotal();
                    }
                }
       });
        $(document).on('click', '#clearMsg', function(){
            $('#divspecies').hide();
        });
    });

$(document).ready(function() {
	  fetchspe();
	  fetchgtotal();
    $(document).on('click', '.btn-deleteSpecies', function(){
		var id = $(this).data('id');
		swal({
		  	title: 'Remove from the list?',
		  	text: "You won't be able to revert this!",
		  	type: 'warning',
		  	showCancelButton: true,
		  	confirmButtonColor: '#3085d6',
		  	cancelButtonColor: '#d33',
		  	confirmButtonText: 'Yes, remove it!',
		}).then((result) => {
		  	if (result.value){
		  		$.ajax({
			   		url: BASE_URL+'/main_server/water/delete_species/'+id,
			    	type: 'POST',
			       	data: 'id='+id,
			       	dataType: 'json'
			    })
			    .done(function(response){
			     	swal('Removed!', response.message, response.status);
					  // $('#tablelocation').DataTable().ajax.reload();
					  // $('#tbody').html(response);
					fetchspe();
					fetchgtotal();
			    })
			    .fail(function(){
			     	swal('Oops...', 'Something went wrong with ajax !', 'error');
			    });
		  	}

		})

		});
	});

  function insert_Main()
    {

    	var url = '<?php echo base_url(); ?>';
    	 $.ajax({
    	 	url : url + 'index.php/main_server/water/save_water',
    	 	type: "POST",
    	 	data: $('#waterForm').serialize(),
    	 	dataType: "JSON",
    	 	success:function(response){
                    $('#messagewater').html(response.messagewater);
                    if(response.error){
                        $('#divwater').removeClass('alert-success').addClass('alert-warning').show();
                         setTimeout(function() {
						           $("#divwater").fadeOut();

						        }, 2000);
                    }
                    else{
                        $('#divwater').removeClass('alert-warning').addClass('alert-success').show();
                         setTimeout(function() {
						           $("#divwater").fadeOut();

						        }, 2000);
                        getTabtribes();
                    }
                }
    	 });
    	  $(document).on('click', '#clearMsg', function(){
            $('#divwater').hide();
        });
    }

</script>