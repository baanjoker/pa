<?php 
$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
$this->output->set_header('Pragma: no-cache');
$this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");  
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0, shink-to-fit=no">
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta content="IE-edge, chrome=1" http-equiv="X-UA-Compatible">
	<link rel="shortcut icon" href="<?= (!empty($setting->favicon)?base_url($setting->favicon):base_url('bmb_assets2/img/favicon.ico')) ?>"/>
	<title>eBMS - <?php echo $page_title; ?> </title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600,700|PT+Serif+Caption" rel="stylesheet"> 
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:700,300|Sancreek|Raleway:100' rel='stylesheet' type='text/css' />  
	<link href="<?= base_url('bmb_assets2/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('bmb_assets2/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css"/>
    <link href="<?= base_url('bmb_assets2/css/style.css') ?>" rel="stylesheet" type="text/css">
    
</head>
<body class="well hold-transition login-page">
<?php @$this->load->view('include/header') ?>
<header>
	<div class="container-fluid _auto-960">
        <div class="row">
           	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <h1>BIODIVERSITY DATABASE MANAGEMENT</h1>                
           	</div>
       	</div>
    </div>
</header>
		
	<div class="container">
		<div class="row">
			<div class="col-md-4">
                <img src="<?php echo base_url() ?>bmb_assets2/img/animated-eagle-image-0036.gif">
            </div>					
			<div class="col-md-4">		

				<div class="col-md-12">
					<div class="panel panel-info">
						<div class="panel-heading">
							Sign in to start your session
						</div>
						<div class="panel-body" style="height: 240px">
							<?php echo form_open('index.php/login'); ?>
				            <fieldset>                    	
				                <?php if ($this->session->flashdata('message') != null) {  ?>
				                	<div class="alert alert-info alert-dismissable">
				                    	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				                    	<?php echo $this->session->flashdata('message'); ?>
				                	</div> 
				                <?php } ?>

				                <?php if ($this->session->flashdata('exception') != null) {  ?>
				                    <div class="alert alert-danger alert-dismissable">
				                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				                        <?php echo $this->session->flashdata('exception'); ?>
				                    </div>
				                <?php } ?>
				                            
				                <?php if (validation_errors()) {  ?>
				                    <div class="alert alert-danger alert-dismissable">
				                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				                        <?php echo validation_errors(); ?>
				                    </div>
				                <?php } ?>
				                
				                <div class="form-group has-feedback">									
									<input type="email" class="form-control" placeholder="Email" name="email" required="required" autofocus>
									<span class="glyphicon glyphicon-envelope form-control-feedback"></span>									
								</div>
								
								<div class="form-group has-feedback">
							        <input type="password" class="form-control" placeholder="Password" name="password" required="required">
							        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
							    </div>													
													   
								<div class="form-group has-feedback">									
										<?php
										$userRole = [
										 	''  => 'Select Position',
										 	'1' => 'Admin',
										 	'2' => 'User'						    	 		
										];
										 echo form_dropdown('user_role',$userRole,$user->user_role,'class="form-control" required')
										?>									
								</div>	
							</fieldset>	
							<div class="row">									
								<div class="col-xs-12">
								    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
								</div>
							</div>	
							<?php echo form_close(); ?>	
						</div>								
					</div>				     
				</div>
			</div>
		</div>
</div>
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?= base_url('bmb_assets2/js/jquery-1.11.2.min.js') ?>" type="text/javascript"></script>
    <script src="<?= base_url('bmb_assets2/js/bootstrap.min.js') ?>" type="text/javascript"></script>

</body>
<?php @$this->load->view('include/footer') ?>
</html>