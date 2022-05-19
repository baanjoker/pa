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
  <link rel="shortcut icon" href="<?php echo base_url('bmb_assets2/img/Untitled-1.png') ?>"/>
	<title><?php echo $setting->title ?> - <?php echo (!empty($page_title)?$page_title:null) ?></title>
	<link rel="stylesheet" href="<?php echo base_url ('bmb_assets2/css/table-style.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url ('bmb_assets2/dist/css/skins/skin-green-light.min.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url ('bmb_assets2/dist/css/AdminLTE.min.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url ('bmb_assets2/bower_components/bootstrap/dist/css/bootstrap.min.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url ('bmb_assets2/bower_components/font-awesome/css/font-awesome.min.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('bmb_assets2/swal2/sweetalert2.min.css') ?>">
  <script src="<?php echo base_url ('bmb_assets2/resources/jquery/js/jquery-1.12.4.min.js') ?>"></script>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="//code.jquery.com/jquery-1.9.1.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
  <script type="text/javascript">
	    var BASE_URL = "<?php echo base_url();?>";
	</script>
</head>
<body class="skin-green-light layout-top-nav">
	<!-- <div class="wrapper"> -->
		<?php $this->load->view('users/include/navbar') ?>
		<?php echo (!empty($content)?$content:null) ?>		
		</div>
	<!-- </div> -->
</body>
<script src="<?php echo base_url('bmb_assets2/region.js') ?>"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<script src="<?php echo base_url('bmb_assets2/swal2/sweetalert2.min.js') ?>"></script>
<script src="<?php echo base_url('bmb_assets2/js/jquery-1.11.2.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('bmb_assets2/js/bootstrap.min.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
// $(document).ready(function(){
//   $('#myTable').DataTable();
// });
// $("[data-mask]").inputmask();

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
</html>