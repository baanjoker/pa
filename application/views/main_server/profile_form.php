<?php
$fname = array(
	'name' 		=>	'firstname',
	'class' 	=>	'form-control',
	'id'		=>	'firstname',
	'required'	=>	'required',
	'placeholder'	=>	'First name'
);
$lname = array(
	'name' 		=>	'lastname',
	'class' 	=>	'form-control',
	'id'		=>	'lastname',
	'required'	=>	'required',
	'placeholder'	=>	'Last name'
);
$email = array(
	'name' 		=>	'email',
	'class' 	=>	'form-control',
	'id'		=>	'email',
	'required'	=>	'required',
	'placeholder'	=>	'Email address'
);
$region = array(
	'name' 		=>	'region',
	'class' 	=>	'form-control',
	'id'		=>	'regid',
	'required'	=>	'required'
);
$designation = array(
	'name' 		=>	'designation',
	'class' 	=>	'form-control',
	'id'		=>	'designation',
	'required'	=>	'required'
);
$department = array(
	'name' 		=>	'department',
	'class' 	=>	'form-control',
	'id'		=>	'department',
	'required'	=>	'required'
);
$address = array(
	'name' 		=>	'address',
	'class' 	=>	'form-control',
	'id'		=>	'address',
	'required'	=>	'required',
	'placeholder'	=>	'Complete Address'
);
$landline = array(
	'name' 		=>	'landline',
	'class' 	=>	'form-control',
	'id'		=>	'landline',
	'placeholder' =>'(area code) 123-4567'
);
$mobile = array(
	'name' 		=>	'mobile',
	'class' 	=>	'form-control',
	'id'		=>	'mobile',
	'placeholder' =>'+(63) 123-4567-890'
);
$sex = array(
	'name' 		=>	'sex',
	'id'		=>	'sex',
	'class' 	=>	'form-control',
	'required'	=>	'required'
);

$dob = array(
	'name' 		=>	'dob',
	'type'		=>	'date',
	'class' 	=>	'datepicker form-control',
	'id'		=>	'dob',
	'required'	=>	'required'
);
$blood = array(
	'name' 		=>	'blood',
	'class' 	=>	'form-control',
	'id'		=>	'blood',
	'required'	=>	'required'
);
$status = array(
	'name' 		=>	'status',
	'id'		=>	'status',
	'class' 	=>	'form-control',
	'required'	=>	'required'
);
?>
<div class="container">
	<div class="row" style="background-color: #fff">
    	<section class="content-header">
    		<div id="divuser" class="alert text-center" style="display:none;">
					<button type="button" class="close" id="clearMsg"><span aria-hidden="true">&times;</span></button>
					<span style="color:#fff" id="messageuser"></span>								
				</div>
    	<div class="col-md-4">
    		<?php if (!empty($user->user_id)): ?>
			<div class="panel-heading" style="margin: auto;width: 100%;margin: 0 0 0 40px;padding: 10px;"><div class="panel-title"><i class="fas fa-handshake"></i> <h2>EDIT RECORDS</h2> </div></div>
			<?php else: ?>
			<div class="panel-heading" style="margin: auto;width: 100%;margin: 0 0 0 40px;padding: 10px;"><div class="panel-title"><i class="fas fa-handshake"></i> <h2>ADD NEW RECORD</h2></div></div>
			<?php endif ?>
    	</div>

    	<?= form_open_multipart('#','class="form-horizontal" id="formprofile"'); ?>
		<div class="col-md-4">
			<div style="border: 1px solid black;width: 202px;height: 182px;margin: auto;">
				<img width="200px" height="180px" id="blah" src="<?php echo (!empty($user->picture)?base_url('bmb_assets2/img/user_img/').$user->picture :base_url("bmb_assets2/img/user_img/no-img.png")) ?>" alt="your image" />
			</div>
			<div style="width: auto;height: auto;margin: 0 0 0 50px;padding: 10px">				
				<input type='file' name="picture" id="picture" value="<?php echo $user->picture ?>" onchange="readURL(this);" /> 
                <input type="hidden" name="old_picture" value="<?php echo $user->picture ?>">
			</div>
		</div>
    	<div class="col-md-4">
    	</div>

			<div class="panel-body">				
				<div class="col-md-12">
					<?php echo form_open('','class="form-horizontal" id="userForm"'); ?>
					<?php echo form_hidden('user_id',$user->user_id)?>								
					<table width="100%" border="0" cellpadding="3" cellspacing="1" class="table4">
						<?php if (!empty($user->user_id)): ?>
							<tr valign="top" class="spaceUnder spaceOver">
								<td>First Name</td>
								<td><?= form_input($fname,$user->firstname) ?></td>
							</tr>
							<tr valign="top" class="spaceUnder">
								<td>Last Name</td>
								<td><?= form_input($lname,$user->lastname) ?></td>
							</tr>							
							<tr valign="top" class="spaceUnder">
								<td>Email Address</td>
								<td>
									<div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                        <?= form_input($email,$user->email) ?>
                                    </div>
								</td>
							</tr>
							<tr valign="top" class="spaceUnder">
								<td>Designation</td>
								<td><?= form_input($designation,$user->designation) ?></td>
							</tr>
							<tr valign="top" class="spaceUnder">
								<td>Department</td>
								<td><?= form_input($department,$user->department) ?></td>
							</tr>
							<tr valign="top" class="spaceUnder">
								<td>Complete Address</td>
								<td><?= form_input($address,$user->address) ?></td>
							</tr>
							<tr valign="top" class="spaceUnder">
								<td>Landline Number</td>
								<td><div class="input-group">
										<div class="input-group-addon">
                                        	<i class="fa fa-phone"></i>
                                        </div>
                                        <?= form_input($landline,$user->landline,'data-inputmask="&quot;mask&quot;: &quot;(99) 999-9999&quot;" data-mask=""') ?>
                                    </div>
                                </td>								
							</tr>
							<tr valign="top" class="spaceUnder">
								<td>Mobile Number</td>
								<td><div class="input-group">
										<div class="input-group-addon">
                                        	<i class="fa fa-tablet"> </i>
                                        </div>
                                        <?= form_input($mobile,$user->mobile,'data-inputmask="&quot;mask&quot;: &quot;+(99) 999-9999-999&quot;" data-mask=""') ?>
                                    </div>
                                </td>								
							</tr>
							<tr valign="top" class="spaceUnder">
								<td>Sex</td>
								<td><?= form_dropdown($sex,$gender,$user->sex) ?></td>								
							</tr>
							<tr valign="top" class="spaceUnder">
								<td>Date of Birth</td>
								<td><div class="input-group">
										<div class="input-group-addon">
                                        	<i class="fa fa-calendar"></i>
                                        </div>
										<?= form_input($dob,$user->dob) ?></td>
									</div>
							</tr>
							<tr valign="top" class="spaceUnder">
								<td>Blood Type</td>
								<td><?= form_dropdown($blood,$bloodList,$user->blood_type) ?></td>
							</tr>
							<tr valign="top" class="spaceUnder">
								<td>Status</td>
								<td><?= form_dropdown($status,$status_m,$user->status) ?></td>								
							</tr>				
						<?php else: ?>

						<?php endif; ?>					
					</table>
					<br>
					<?php if (!empty($user->user_id)) {
						echo '<button type="button" name="btnprofile" id="submitprofile" onclick="insert_profile()" class="btn btn-success  btn-flat"><i class="fa fa-save"> UPDATE</i></button>';
					} ?>
				</div>
			</div>
			<?= form_close(); ?>
    	</section>
    </div>
</div>
<script type="text/javascript">
	// ------------------------------------ MAIN -------------------------------------//
    function insert_profile()
    {

    	var url = '<?php echo base_url(); ?>';
    	var formprofile = document.getElementById("userForm");

    	var formdata = new FormData();
		formdata.append('picture', document.getElementById('picture').files[0]);

	    var other_data = $('#formprofile').serializeArray();
	    $.each(other_data,function(key,input){
	        formdata.append(input.name,input.value);
	    });
    	 $.ajax({
    	 	url : url + 'index.php/profile/create',
    	 	type: "POST",
    	 	contentType: false,
		  	cache: false,
		  	processData: false,
    	 	data: formdata,
    	 	dataType: "JSON",
    	 	success:function(response){
                    $('#messageuser').html(response.messageuser);
                    if(response.error){
                        $('#divuser').removeClass('alert-success').addClass('alert-warning').show();
                         setTimeout(function() {
						           $("#divuser").fadeOut();

						        }, 2000);
                    }
                    else{
                        $('#divuser').removeClass('alert-warning').addClass('alert-success').show();
                         setTimeout(function() {
						           $("#divuser").fadeOut();

						        }, 2000);
                       formprofile.reset();
                    }
                }
    	 });
    	  $(document).on('click', '#clearMsg', function(){
            $('#divuser').hide();
        });
    }
// ------------------------------------END OF MAIN -------------------------------------//
</script>