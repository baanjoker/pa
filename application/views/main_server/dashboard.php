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
  <link rel="stylesheet" href="<?php echo base_url ('bmb_assets2/tableJ/tablesaw.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url ('bmb_assets2/bower_components/bootstrap/dist/css/bootstrap.min.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url ('bmb_assets2/bower_components/font-awesome/css/font-awesome.min.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url ('bmb_assets2/bower_components/Ionicons/css/ionicons.min.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url ('bmb_assets2/dist/css/AdminLTE.min.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url ('bmb_assets2/css/table-style.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url ('bmb_assets2/dist/css/skins/skin-blue-light.min.css') ?>">

  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('bmb_assets2/datatab/datatables.min.css') ?>"/>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('bmb_assets2/swal2/sweetalert2.min.css') ?>">
  <script type="text/javascript">
    var BASE_URL = "<?php echo base_url();?>";
  </script>
  <script type="text/javascript" src="<?php echo base_url ('jquery/chart.js') ?>"></script> 
    <!-- <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>  -->
    
</head>
<body class="skin-blue-light layout-top-nav" style="height: auto; min-height: 100%;">
<div class="wrapper">
<?php $this->load->view('main_server/include/navbar') ?>
  <div class="col-sm-12"> 
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
  </div>
<?php echo (!empty($content)?$content:null) ?>
</div>
</body>

<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
 -->
 <script src="<?php echo base_url('bmb_assets2/js/jquery-1.11.2.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('bmb_assets2/js/bootstrap.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('bmb_assets2/datatab/datatables.min.js') ?>" type="text/javascript" ></script>
<script src="<?php echo base_url('bmb_assets2/swal2/sweetalert2.min.js') ?>"></script>
<script src="<?php echo base_url ('bmb_assets2/tableJ/tablesaw.js') ?>"></script>
<script src="<?php echo base_url ('bmb_assets2/tableJ/tablesaw-init.js') ?>"></script>
<script src="<?php echo base_url ('bmb_assets2/input-mask/jquery.inputmask.js') ?>"></script>
<script src="<?php echo base_url ('bmb_assets2/input-mask/jquery.inputmask.extensions.js') ?>"></script>
<script src="<?php echo base_url ('bmb_assets2/input-mask/jquery.inputmask.date.extensions.js') ?>"></script>

 <!-- tinymce texteditor -->
        <script src="<?php echo base_url() ?>assets/tinymce/tinymce.min.js" type="text/javascript"></script> 


<script type="text/javascript">
$(document).ready(function(){
  $('#myTable').DataTable();
});
$("[data-mask]").inputmask();

function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
    $('#blah').attr('src', e.target.result);
    }
      reader.readAsDataURL(input.files[0]);
    }
  }
function readURLs(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
    $('#blahs').attr('src', e.target.result);
    }
      reader.readAsDataURL(input.files[0]);
    }
  }

</script>


<script type="text/javascript" src="<?php echo base_url("bmb_assets2/data-server.js") ?>"></script>
<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url() ?>assets/js/custom.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url("jquery/slider/loader.js") ?>"></script>

</html>