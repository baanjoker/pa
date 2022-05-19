<?php
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
$sex = array(
	'name' 		=>	'sex',
	'id'		=>	'sex',
	'class' 	=>	'form-control',
	'required'	=>	'required'
);
?>
<section class="content">
	<div class="row">
		<div class="col-md-3">
		</div>
		<div class="col-md-6 col-sm-12">
			<div class="col-md-12">
				<div class="panel panel-info">
		            <div class="panel-heading">
		            	<div class="panel-title"><i class="fa fa-newspaper-o"></i> USER FORM</div>
		            </div>
					<div class="panel-body">
						<div id="responseDiv" class="alert text-center" style="margin-top:20px; display:none;">
                    	<button type="button" class="close" id="clearMsg"><span aria-hidden="true">&times;</span></button>
                    	<span id="message" style="color:#fff;"></span>
	                  	</div>
	                	<?= form_open('#','class="form-horizontal" id="uploadFormUsers"'); ?>
	                	<?php if (!empty($user->user_id)): 
	                    echo form_hidden('user_id',$user->user_id);
	                  	else: 
	                    echo form_hidden('user_id');
	                  	endif; ?>
	                  	<div class="col-md-12 columns">
	                		<?php if (!empty($user->user_id)):	?>    
	                		<div class="col-xs-12 col-sm-12" style="padding: 50px">	                		              		
								<div style="border: 1px solid black;width: 202px;height: 182px;margin: auto;">
									<img width="200px" height="180px" id="blah" src="<?php echo (!empty($user->picture)?base_url('bmb_assets2/img/user_img/').$user->picture :base_url("bmb_assets2/img/user_img/no-img.png")) ?>" alt="your image" />
									<input type='file' name="picture" id="picture" value="<?php echo $user->picture ?>" onchange="readURL(this);" /><br> 
					                <input type="hidden" name="old_picture" value="<?php echo $user->picture ?>">
								</div>
							</div>
	                		
						</div>							
							<?php else: ?>
	                  	<div class="col-md-12 columns">	
	                		<div class="col-xs-12 col-sm-12" style="padding: 50px">  
								<div style="border: 1px solid black;width: 202px;height: 182px;margin: auto;">
									<img width="200px" height="180px" id="blah" src="<?php echo (!empty($user->picture)?base_url('bmb_assets2/img/user_img/').$user->picture :base_url("bmb_assets2/img/user_img/no-img.png")) ?>" alt="your image" />
									<input type='file' name="picture" id="picture" value="" onchange="readURL(this);" />
					                <input type="hidden" name="old_picture" value="">
								</div>
							</div>
	                		
						</div>
						<?php endif; ?>
						
	                  	<div class="col-xs-12 columns">
	                		<div class="col-xs-12 col-sm-2">
	                			<?php echo form_label('Firstname','','style="margin:10px;"') ?>                			
	                		</div>
	                		<div class="col-xs-12 col-sm-4">
	                		<?php if (!empty($user->user_id)):
	                			echo form_input('firstname',$user->firstname,'class="form-control"');
	                		else:
	                			echo form_input('firstname','','class="form-control"');
	                		endif; ?>
	                			
	                		</div>
	                		<div class="col-xs-12 col-sm-2">
	                			<?php echo form_label('Lastname','','style="margin:10px;"') ?>                			
	                		</div>
	                		<div class="col-xs-12 col-sm-4">
	                		<?php if (!empty($user->user_id)):
	                			echo form_input('lastname',$user->lastname,'class="form-control"');
	                		else:
	                			echo form_input('lastname','','class="form-control"');
	                		endif; ?>
	                			
	                		</div>
	                	</div>
	                	<div class="col-xs-12 columns">
	                		<div class="col-xs-12 col-sm-2">
	                			<?php echo form_label('Email','','style="margin:10px;"') ?>                			
	                		</div>
	                		<div class="col-xs-12 col-sm-10">
	                		<?php if (!empty($user->user_id)):
	                			echo form_input('email',$user->email,'class="form-control" readonly="readonly"');
	                		else:
	                			echo form_input('email','','class="form-control"');
	                		endif; ?>
	                			
	                		</div>
	                	</div>
	                	<?php if (empty($user->user_id)):?> 
	                	<div class="col-xs-12 columns">
	                		<div class="col-xs-12 col-sm-2">
	                			<?php echo form_label('Password','','style="margin:10px;"') ?>                			
	                		</div>
	                		<div class="col-xs-12 col-sm-10">
	                			<?php echo form_password('password','','class="form-control" id="pass"'); ?>
	                			<span toggle="#pass" class="fa fa-fw fa-eye field-icon toggle-password" id="passstrength"></span>	 

	                			<!-- <input type="checkbox" class="checkbox" onclick="myFunction()"> -->
	                		</div>	                		
	                	</div>
	                	<div class="col-xs-12 columns">	                	
	                		<div class="col-xs-12 col-sm-2">
	                			<?php echo form_label('Re-type','','style="margin:10px;"') ?> 
	                			               			
	                		</div>
	                		<div class="col-xs-12 col-sm-10">
	                			<?php echo form_password('repassword','','class="form-control" id="repass"'); ?>
	                			<span toggle="#repass" class="fa fa-fw fa-eye field-icon toggle-password" id="passstrengths"></span>
	                		</div>
	                		<div class="col-xs-12 col-sm-2">
              					<!-- <input type="checkbox" class="checkbox" onclick="myFunctions()"> -->
	                		</div>
	                	</div>
	                	<?php endif; ?>
	                	<div class="col-xs-12 columns">
	                        <div class="col-xs-12 col-sm-2">
	                            <?php echo form_label('User role','','style="margin:10px;"') ?>
	                        </div>
	                        <div class="col-xs-12 col-sm-4">
	                            <?php
	                            $role = [
	                                ''  => '',
	                                '1' => 'Administrator',
	                                '2' => 'Regional Officer',
	                                '5' => 'PENR Officer',
	                                '4' => 'CENR Officer',
	                                '3' => 'Protected Area Superintendent',
	                            ];
	                            ?>  
	                        <?php if (!empty($user->user_id)):
	                            echo form_dropdown('user_role',$role,$user->user_role,'class="form-control" id="user_role"');
	                        else:
	                            echo form_dropdown('user_role',$role,'','class="form-control" id="user_role"');
	                        endif; ?>                                                     
	                        </div>
	                    </div>
	                    <div class="col-xs-12 columns" id="regionDiv">
	                        <div class="col-xs-2 col-sm-2" id="labelDiv"> <!-- id="labelDiv" -->
	                            <?php echo form_label('Region','','style="margin:10px;"') ?>
	                        </div>	                                        
	                        <div class="col-xs-10 col-sm-10">	<!-- id="regionDiv" -->                         
		                        <?php if (!empty($user->user_id)):
		                            echo form_dropdown('region',$regionList,$user->region,'class="form-control" id="regid"');
		                        else:
		                            echo form_dropdown('region',$regionList,'','class="form-control" id="regid"');
		                        endif; ?>                                                     
	                        </div>
	                    </div>
	                    <div class="col-xs-12 columns" id="provDiv">
	                        <div class="col-xs-2 col-sm-2" id="labelDiv"> <!-- id="labelDiv" -->
	                            <?php echo form_label('Province','','style="margin:10px;"') ?>
	                        </div>	                     
	                        <div class="col-xs-10 col-sm-10">	<!-- id="provDiv" -->                              
		                        <?php if (!empty($user->user_id)):
		                            echo form_dropdown('province',$provList,$user->province,'class="form-control" id="provid"');
		                        else:
		                            echo form_dropdown('province','','','class="form-control" id="provid"');
		                        endif; ?>                                                     
	                        </div>
	                    </div>
	                    <div class="col-xs-12 columns" id="munDiv">
	                        <div class="col-xs-2 col-sm-2" id="labelDiv"> <!-- id="labelDiv" -->
	                            <?php echo form_label('Municipality','','style="margin:10px;"') ?>
	                        </div>	                    
	                        <div class="col-xs-10 col-sm-10">	<!-- id="munDiv" -->                              
		                        <?php if (!empty($user->user_id)):
		                            echo form_dropdown('municipality',$munList,$user->municipality,'class="form-control" id="munid"');
		                        else:
		                            echo form_dropdown('municipality','','','class="form-control" id="munid"');
		                        endif; ?>                                                     
	                        </div>
	                    </div>
	                    <div class="col-xs-12 columns" id="cenroDiv">
	                        <div class="col-xs-2 col-sm-2" id="labelDiv"> <!-- id="labelDiv" -->
	                            <?php echo form_label('CENRO','','style="margin:10px;"') ?>
	                        </div>	                      
	                        <div class="col-xs-10 col-sm-10">	<!-- id="munDiv" -->                              
		                        <?php if (!empty($user->user_id)):
		                            echo form_dropdown('cenroid',$munList,$user->cenro,'class="form-control" id="cenroid"');
		                        else:
		                            echo form_dropdown('cenroid','','','class="form-control" id="cenroid"');
		                        endif; ?>                                                     
	                        </div>
	                    </div>
	                    <div class="col-xs-12 columns">
	                    	<div class="col-xs-12 col-sm-2">
	                			<?php echo form_label('Office Address','','style="margin:10px;"') ?>                			
	                		</div>
	                		<div class="col-xs-12 col-sm-10">
	                		<?php if (!empty($user->user_id)):
	                			echo form_input('address',$user->address,'class="form-control"');
	                		else:
	                			echo form_input('address','','class="form-control"');
	                		endif; ?>
	                		</div>
	                    </div>	
	                    <div class="col-xs-12 columns">
	                    	<div class="col-xs-12 col-sm-2">
	                			<?php echo form_label('Designation','','style="margin:10px;"') ?>                			
	                		</div>
	                		<div class="col-xs-12 col-sm-10">
	                		<?php if (!empty($user->user_id)):
	                			echo form_input('designation',$user->designation,'class="form-control"');
	                		else:
	                			echo form_input('designation','','class="form-control"');
	                		endif; ?>
	                		</div>
	                    </div>
	                    <div class="col-xs-12 columns">
	                    	<div class="col-xs-12 col-sm-2">
	                			<?php echo form_label('Department','','style="margin:10px;"') ?>                			
	                		</div>
	                		<div class="col-xs-12 col-sm-10">
	                		<?php if (!empty($user->user_id)):
	                			echo form_input('department',$user->department,'class="form-control"');
	                		else:
	                			echo form_input('department','','class="form-control"');
	                		endif; ?>
	                		</div>
	                    </div>	
	                    <div class="col-xs-12 columns">
	                    	<div class="col-xs-12 col-sm-2">
	                			<?php echo form_label('Mobile No.','','style="margin:10px;"') ?>                			
	                		</div>
	                		<div class="col-xs-12 col-sm-4">
	                		<?php if (!empty($user->user_id)):
	                			echo form_input($mobile,$user->mobile,'data-inputmask="&quot;mask&quot;: &quot;+(99) 999-9999-999&quot;" data-mask=""');
	                		else:
	                			echo form_input($mobile,'','data-inputmask="&quot;mask&quot;: &quot;+(99) 999-9999-999&quot;" data-mask=""');
	                		endif; ?>
	                		</div>
	                		<div class="col-xs-12 col-sm-2">
	                			<?php echo form_label('Landline No.','','style="margin:10px;"') ?>                			
	                		</div>
	                		<div class="col-xs-12 col-sm-4">
	                		<?php if (!empty($user->user_id)):
	                			echo form_input($landline,$user->landline,'data-inputmask="&quot;mask&quot;: &quot;(99) 999-9999&quot;" data-mask=""');
	                		else:
	                			echo form_input($landline,'','data-inputmask="&quot;mask&quot;: &quot;(99) 999-9999&quot;" data-mask=""');
	                		endif; ?>
	                		</div>
	                    </div>
	                    <div class="col-xs-12 columns">
	                    	<div class="col-xs-12 col-sm-2">
	                			<?php echo form_label('Birth Date','','style="margin:10px;"') ?>                			
	                		</div>
	                		<div class="col-xs-12 col-sm-4">
	                		<?php if (!empty($user->user_id)):
	                			echo form_input($dob,$user->dob);
	                		else:
	                			echo form_input($dob);
	                		endif; ?>
	                		</div>	                		
	                    </div>
	                    <div class="col-xs-12 columns">
	                    	<div class="col-xs-12 col-sm-2">
	                			<?php echo form_label('Gender','','style="margin:10px;"') ?>                			
	                		</div>
	                		<div class="col-xs-12 col-sm-4">
	                		<?php if (!empty($user->user_id)):
	                			echo form_dropdown($sex,$gender,$user->sex);
	                		else:
	                			echo form_dropdown($sex,$gender);
	                		endif; ?>
	                		</div>
	                    	<div class="col-xs-12 col-sm-2">
	                			<?php echo form_label('Blood Type','','style="margin:10px;"') ?>                			
	                		</div>
	                		<div class="col-xs-12 col-sm-4">
	                		<?php if (!empty($user->user_id)):
	                			echo form_dropdown($blood,$bloodList,$user->blood_type);
	                		else:
	                			echo form_dropdown($blood,$bloodList);
	                		endif; ?>
	                		</div>
	                    </div>	
	                    <div class="col-xs-12 columns">
	                    	<div class="col-xs-12 col-sm-2">
	                			<?php echo form_label('Status','','style="margin:10px;"') ?>                			
	                		</div>
	                		<div class="col-xs-12 col-sm-4">
	                		<?php if (!empty($user->user_id)):
	                			echo form_dropdown($status,$status_m,$user->status);
	                		else:
	                			echo form_dropdown($status,$status_m);
	                		endif; ?>
	                		</div>	                    	
	                    </div>
	                    <div class="col-xs-12 columns">
	                        <?php if (!empty($user->user_id)): ?>
	                        	<hr>
	                        <?php echo form_button(array('name' => 'save_user', 'id' =>'save_user' ,'type' => 'button', 'class' => 'btn btn-success', 'content' => '<i class="fa fa-save fa-fw"></i> Update','onclick' => 'insertUser()')) ?>
	                        <?php else: ?>
	                        	<hr>
	                        <?php echo form_button(array('name' => 'save_user', 'id' =>'save_user' ,'type' => 'button', 'class' => 'btn btn-success', 'content' => '<i class="fa fa-save fa-fw"></i> Add','onclick' => 'insertUser()')) ?> 
	                        <?php endif; ?>
                		</div>                  
	                  	<?= form_close(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<script type="text/javascript">
  function myFunction() {
    var x = document.getElementById("pass");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
} 

function myFunctions() {
    var x = document.getElementById("repass");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
} 

$(document).ready(function(){
    if($('#user_role').val()=='1'){
        $('#provDiv').hide();
        $('#munDiv').hide();
        $('#regionDiv').hide();
        $('#labelDiv').hide();

    }
    else if($('#user_role').val()=='2'){
        $('#regionDiv').show();        
        $('#provDiv').hide();
        $('#munDiv').hide();        
    }
    else if($('#user_role').val()=='3'){
        $('#provDiv').show();
        $('#regionDiv').show();        
        $('#munDiv').show();        
    }
    else if($('#user_role').val()=='4'){
        $('#provDiv').show();
        $('#regionDiv').show();        
        $('#munDiv').show();        
    }
    else if($('#user_role').val()=='5'){
        $('#provDiv').show();
        $('#regionDiv').show();        
        $('#munDiv').hide();        
    }
    else{
        $('#provDiv').hide();
        $('#munDiv').hide();        
        $('#regionDiv').hide();
        $('#labelDiv').hide();
    }

    $(document).on('change', '#user_role', function(e) {
    if(this.options[e.target.selectedIndex].text == "Administrator"){
        $('#provDiv').hide();
        $('#munDiv').hide();
        $('#regionDiv').hide();
        $('#labelDiv').hide();             
        $("#regid")[0].selectedIndex = 0;
        $("#provid")[0].selectedIndex = 0;
        $("#munid")[0].selectedIndex = 0;      

    }else if(this.options[e.target.selectedIndex].text == "Regional Officer"){
        $('#provDiv').hide();
        $('#munDiv').hide();
        $('#regionDiv').show();
        $('#labelDiv').show();             
        $("#provid")[0].selectedIndex = 0;
        $("#munid")[0].selectedIndex = 0;             
    }else if(this.options[e.target.selectedIndex].text == "PENR Officer"){
        $('#provDiv').show();
        $('#munDiv').hide();
        $('#regionDiv').show();
        $('#labelDiv').show();             
        $("#munid")[0].selectedIndex = 0;
    }else if(this.options[e.target.selectedIndex].text == "CENR Officer"){
        $('#provDiv').show();
        $('#munDiv').show();
        $('#regionDiv').show();
        $('#labelDiv').show();             
        
    }else if(this.options[e.target.selectedIndex].text == "Protected Area Superintendent"){
        $('#provDiv').show();
        $('#munDiv').show();
        $('#regionDiv').show();
        $('#labelDiv').show();             
        
    }else{
        $('#provDiv').hide();
        $('#munDiv').hide();
        $('#regionDiv').hide();
        $('#labelDiv').hide();   
    }
    });
});
</script>