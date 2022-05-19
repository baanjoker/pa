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
    <link href="<?= base_url('bmb_assets2/css/loginStyle.css') ?>" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="container  center_div">
	  	<!-- <div class="row"> -->
			<div class="col-sm-12 col-md-12">
				<?php echo (!empty($content)?$content:null) ?>									
			</div>			
		<!-- </div>	 -->
	</div>
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?= base_url('bmb_assets2/js/jquery-1.11.2.min.js') ?>" type="text/javascript"></script>
    <script src="<?= base_url('bmb_assets2/js/bootstrap.min.js') ?>" type="text/javascript"></script>
    
</body>
</html>