<?php
$title =array(
	'name' => 'title',
	'class'	=>	'form-control',
	'placeholder'	=>	'Title for the homepage'
);

$description =array(
	'name' => 'description',
	'class'	=>	'form-control',
	'placeholder'	=>	'Description'
);


$email =array(
	'name' => 'email',
	'class'	=>	'form-control',
	'placeholder'	=>	'Email address'
);

$landline = array(
	'name' 		=>	'landline',
	'class' 	=>	'form-control',
	'id'		=>	'landline',
	'placeholder' =>'(area code) 123-4567'
);

$address = array(
	'name' 		=>	'address',
	'class' 	=>	'form-control',
	'id'		=>	'address',
	'placeholder' =>'Mailing address'
);

$facebook = array(
	'name' 		=>	'facebook',
	'class' 	=>	'form-control',
	'id'		=>	'facebook',
	'placeholder' =>'Facebook link'
);

$twitter = array(
	'name' 		=>	'twitter',
	'class' 	=>	'form-control',
	'id'		=>	'twitter',
	'placeholder' =>'Twitter link'
);

$youtube = array(
	'name' 		=>	'youtube',
	'class' 	=>	'form-control',
	'id'		=>	'youtube',
	'placeholder' =>'Youtube link'
);

$status = array(
	'name' 		=>	'status',
	'class' 	=>	'form-control',
	'type'		=>	'checkbox',
	'data-toggle'=>	'toggle'
);

$copyright = array(
	'name' 		=>	'copyright',
	'class' 	=>	'form-control',
	'placeholder' =>'Copyright'
);
?>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-info">				
				<div class="panel-heading"><div class="panel-title"><i class="fa fa-globe"></i> Website Configuration</div></div>
					<div class="panel-body">
						<div class="col-md-2">
							<?php echo form_open_multipart('main_server/wsettings/update','class="form-horizontal"'); ?>
							<?php echo form_hidden('id',$websetting->id) ?>	
							<div class="box box-success">
						    	<li class="list-group-item" style="text-align: center"><b>MAIN BUTTON</b></li>
						    	<button name="btnmain" id="submitlocation" class="btn btn-success  btn-flat btn-block"><i class="fa fa-save"> Update</i></button>						        
						    </div>
						</div>
						
						<div class="col-md-6">
							<table width="100%" class="table4">
				                <tr valign="top" class="spaceUnder spaceOver">  
				                  	<td class="spaceRight">Title</td>
				                  	<td><?php echo form_input($title,$websetting->title); ?></td>
				                </tr>
				                <tr valign="top" class="spaceUnder">  
				                  	<td class="spaceRight">Description</td>
				                  	<td><?php echo form_textarea($description,$websetting->description); ?></td>
				                </tr>
				                <tr valign="top" class="spaceUnder">  
				                  	<td class="spaceRight">Email Address</td>
				                  	<td><div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                        <?= form_input($email,$websetting->email) ?>
                                    </div></td>
				                </tr>
								<tr valign="top" class="spaceUnder">  
				                  	<td class="spaceRight">Landline</td>
				                  	<td><?= form_input($landline,$websetting->landline,'data-inputmask="&quot;mask&quot;: &quot;(99) 999-9999&quot;" data-mask=""') ?></td>
				                </tr>
				                <tr valign="top" class="spaceUnder">  
				                  	<td class="spaceRight">Address</td>
				                  	<td><?= form_input($address,$websetting->address) ?></td>
				                </tr>
				                <tr valign="top" class="spaceUnder">  
				                  	<td class="spaceRight">Copyright</td>
				                  	<td><?= form_textarea($copyright,$websetting->copyright) ?></td>
				                </tr>
				                <tr valign="top" class="spaceUnder">
									<td class="spaceRight">Website logo</td>
									<td><div style="border: 1px solid black;width: 202px;height: 182px;">
									<img width="200px" height="180px" id="blah" src="<?php echo (!empty($websetting->logo)?base_url('bmb_assets2/img/website/logo/').$websetting->logo :base_url("bmb_assets2/img/website/no-img.png")) ?>" alt="your image" />
									</div>
									<div style="width: auto;height: auto;">									
										<input type='file' name="logo" id="logo" onchange="readURL(this);" /> 
						                <input type="hidden" name="old_logo" value="<?php echo $websetting->logo?>">
									</div>
									</td>
								</tr>
								<tr valign="top" class="spaceUnder">
									<td class="spaceRight">Website icon</td>
									<td><div style="border: 1px solid black;width: 62px;height: 52px;">
									<img width="60px" height="50px" id="blahs" src="<?php echo (!empty($websetting->favicon)?base_url('bmb_assets2/img/website/favicon/').$websetting->favicon :base_url("bmb_assets2/img/website/no-img.png")) ?>" alt="your image" />
									</div>
									<div style="width: auto;height: auto;">									
										<input type='file' name="favicon" id="favicon" onchange="readURLs(this);" /> 
						                <input type="hidden" name="old_favicon" value="<?php echo $websetting->favicon?>">
									</div>
									</td>
								</tr>
								<tr valign="top" class="spaceUnder">  
				                  	<td class="spaceRight">Facebook Link</td>
				                  	<td><div class="input-group">
                                        <span class="input-group-addon">https://</span>
				                  		<?= form_input($facebook,$websetting->facebook) ?>
				                  	</div></td>
				                </tr>
				                <tr valign="top" class="spaceUnder">  
				                  	<td class="spaceRight">Twitter Link</td>
				                  	<td><div class="input-group">
                                        <span class="input-group-addon">https://</span>
				                  		<?= form_input($twitter,$websetting->twitter) ?>
				                  	</div></td>
				                </tr>
				                <tr valign="top" class="spaceUnder">  
				                  	<td class="spaceRight">Youtube Link</td>
				                  	<td><div class="input-group">
                                        <span class="input-group-addon">https://</span>
				                  		<?= form_input($youtube,$websetting->youtube) ?>
				                  	</div></td>
				                </tr>
				                <tr valign="top" class="spaceUnder">
							    	<td>Website Status</td>
							    	<td><?= form_checkbox('status',$websetting->status,set_value('status',$websetting->status)) ?></td>
							    </tr>
				            </table>
						</div>
					</div>
			</div>
		</div>
	</div>
</section>
