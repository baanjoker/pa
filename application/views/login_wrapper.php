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
	<title>PADIS - <?php echo $page_title; ?> </title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600,700|PT+Serif+Caption" rel="stylesheet"> 
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:700,300|Sancreek|Raleway:100' rel='stylesheet' type='text/css' />  
	<link href="<?= base_url('bmb_assets2/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('bmb_assets2/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css"/>

    <link href="<?= base_url('bmb_assets2/css/loginStyle.css') ?>" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="container">	
		<div class="row main">	
			<div class="panel-heading">
	           <div class="panel-title text-center">
	           		<!-- <h1 class="title">PA INFORMATION SYSTEM</h1> -->
	           		<img src="<?php echo base_url('bmb_assets2/img/BMB.png') ?>" class="img-denr-bmb" alt="logo of DENR and BMB">
	           	</div>
	        </div> 
				<!-- <div class="col-md-4">
				</div>
				<div class="col-md-8">
            		<img src="<?php echo base_url('bmb_assets2/img/BMB.png') ?>" style="width: 600px;margin: 50px 0px  0px -100px">
					 -->
				<div class="main-login main-center">					 
					<?php echo form_open('index.php/login','class="form-horizontal"'); ?>
					<div class="form-group">
						<label for="username" class="cols-sm-2 control-label">Email address</label>
						<div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
								<input type="email" class="form-control" name="email" id="email"  placeholder="Enter your Email address"/>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="password" class="cols-sm-2 control-label">Password</label>
						<div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
								<input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password"/>
							</div>
						</div>
					</div>
					<div class="form-group ">
						<button type="submit" id="valid" name="valid" class="btn btn-primary btn-lg btn-block login-button">Sign in</button>
					</div>

				    <!-- <div class="admin">
				    	<div class="rota">
				        <h1>DENR</h1>
				        <input type="email" name="email" value="" placeholder="Email Address" required autofocus /><br />
				        <input type="password" name="password" placeholder="Password" required="required"/><br>				        
				    	</div>
				    </div> -->
				   <!--  <div class="cms">
				      <div class="roti">
				        <h1>BMB</h1>
				        <button id="valid" type="submit" name="valid" >Sign In</button><br />
				        <p class="adjust"><a href="#">Reset Password</a></p>
				      </div>
				    </div> -->
				<?php echo form_close(); ?>	
				<?php if ($this->session->flashdata('message') != null) {  ?>
			                	<div class="alert alert-info alert-dismissable">
			                    	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			                    	<div><?php echo $this->session->flashdata('message'); ?></div>
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
			</div>
				  			
					<!-- </div>				 -->
			</div>
		</div>
	</div>
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   
    
</body>
 <script src="<?= base_url('bmb_assets2/js/jquery-1.11.2.min.js') ?>" type="text/javascript"></script>
    <script src="<?= base_url('bmb_assets2/js/bootstrap.min.js') ?>" type="text/javascript"></script>
</html>