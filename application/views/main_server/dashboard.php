<?php 
$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
$this->output->set_header('Pragma: no-cache');
$this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");  
?>

<!DOCTYPE html>
<html>
<head>
  
	<meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0, shink-to-fit=no">
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta content="IE-edge, chrome=1" http-equiv="X-UA-Compatible">
	<link rel="shortcut icon" href="<?= (!empty($setting->favicon)?base_url($setting->favicon):base_url('bmb_assets2/img/favicon.ico')) ?>"/>
	<title><?php echo $setting->title ?> - <?php echo (!empty($page_title)?$page_title:null) ?></title>
  <script src="<?php echo base_url ('bmb_assets2/resources/jquery/js/jquery-1.12.4.min.js') ?>"></script>

  <link rel="stylesheet" href="<?php echo base_url ('bmb_assets2/bower_components/bootstrap/dist/css/bootstrap.min.css') ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url ('bmb_assets2/bower_components/font-awesome/css/font-awesome.min.css') ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url ('bmb_assets2/bower_components/Ionicons/css/ionicons.min.css') ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url ('bmb_assets2/dist/css/AdminLTE.min.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url ('bmb_assets2/css/table-style.css') ?>">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect..-->
   <link rel="stylesheet" href="<?php echo base_url ('bmb_assets2/dist/css/skins/skin-blue-light.min.css') ?>">
  <!--<![endif]-->
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('bmb_assets2/datatab/datatables.min.css') ?>"/>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('bmb_assets2/swal2/sweetalert2.min.css') ?>">
  <script type="text/javascript">
    var BASE_URL = "<?php echo base_url();?>";
  </script>
  <style type="text/css">


  </style>
</head>
<body>
<?php $this->load->view('main_server/include/navbar') ?>
<?php echo (!empty($content)?$content:null) ?>
</body>
<script src="<?php echo base_url('bmb_assets2/js/jquery-1.11.2.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('bmb_assets2/js/bootstrap.min.js') ?>" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url('bmb_assets2/datatab/datatables.min.js') ?>"></script>
<script src="<?php echo base_url('bmb_assets2/swal2/sweetalert2.min.js') ?>"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#myTable').DataTable();
  });
</script>
<script type="text/javascript" src="<?php echo base_url("bmb_assets2/data-server.js") ?>"></script>
</html>