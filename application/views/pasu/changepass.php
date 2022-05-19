<div class="row">
    <div class="col-xs-12">
        <div class="element-container">          	
               <div class="container">
                    <div class="col-xs-10 col-xs-offset-1 ">                  
                         <h1>Change Password</h1><hr>
                    </div>
               </div>
               <div class="row clearfix"> 
                    <?php echo form_open_multipart('#','id="formChangePass"') ?>
	    			<?php echo form_hidden('user_id',$read->user_id);?>                     	               
                    	<div class="col-xs-10 col-xs-offset-1 ">
                            <div class="col-xs-12 col-lg-2 ">
                                <?= form_label('Old password','','style="margin:8px 0 0 0;"'); ?>
                            </div>
                            <div class="col-xs-6 col-lg-10 ">
                            	<div class="input-group">
                            		<div class="input-group-addon reveal_"><i class="glyphicon glyphicon-eye-open"></i></div>
									<?= form_password('oldpass','','type="password" class="form-control border-input oldpass" placeholder="Old password" id="oldpass" data-toggle="oldpassword"') ?>
								</div><br>                            	
                            </div>                            
                        </div>
                    	
                        <div class="col-xs-10 col-xs-offset-1 columns">
                            <div class="col-xs-12 col-lg-2 columns">
                                <?= form_label('New password','','style="margin:8px 0 0 0;"'); ?>
                            </div>                            
                            <div class="col-xs-6 col-lg-10 columns">
                            	<div class="input-group">
                            		<div class="input-group-addon reveal"><i class="glyphicon glyphicon-eye-open"></i></div>
								<?= form_password('newpass','','type="password" class="form-control border-input pwd" placeholder="New password" id="pass" data-toggle="password"') ?>
								</div><br>
                            </div>
                        </div> 

                        <div class="col-xs-10 col-xs-offset-1 columns">
                            <div class="col-xs-12 col-lg-2 columns">
                                <?= form_label('Re-type','','style="margin:8px 0 0 0;"'); ?>
                            </div>                            
                            <div class="col-xs-6 col-lg-10 columns">
                            	<div class="input-group">
                            		<div class="input-group-addon reveals"><i class="glyphicon glyphicon-eye-open"></i></div>
								<?= form_password('retypepass','','type="password" class="form-control border-input repwd" placeholder="Re-type password" id="pass" data-toggle="retypepass"') ?>
								</div><br>
                            </div>
                        </div> 
     
                        <div class="col-xs-10 col-xs-offset-1 ">
                            <button type="button" class="btn btn-info" id="UpdatePass">Update</button>
                        </div>    
	            	<?php echo form_close(); ?>
               	</div> 
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
$(".reveal_").on('click',function() {
    var $pwd = $(".oldpass");
    if ($pwd.attr('type') === 'password') {
        $pwd.attr('type', 'text');
    } else {
        $pwd.attr('type', 'password');
    }
});
$(".reveal").on('click',function() {
    var $pwd = $(".pwd");
    if ($pwd.attr('type') === 'password') {
        $pwd.attr('type', 'text');
    } else {
        $pwd.attr('type', 'password');
    }
});
$(".reveals").on('click',function() {
    var $pwd = $(".repwd");
    if ($pwd.attr('type') === 'password') {
        $pwd.attr('type', 'text');
    } else {
        $pwd.attr('type', 'password');
    }
});
</script>