<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0, shink-to-fit=no">
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta content="IE-edge, chrome=1" http-equiv="X-UA-Compatible">	
	<link rel="shortcut icon" href="<?php echo base_url('bmb_assets2/img/Untitled-1.png') ?>"/>
	<title>PA - <?php echo (!empty($page_title)?$page_title:null) ?> </title>
	 <!-- Bootstrap core CSS     -->
	<link href="<?= base_url('assets/dist/css/bootstrap3.min.css') ?>" rel="stylesheet" type="text/css">
	<!--  Paper Dashboard core CSS    -->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/dist/css/paper_dashboard.css') ?>">

	<!--  Fonts and icons     -->
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'> -->
	<link href="<?= base_url('assets/fonts/themify-icons/themify-icons.css') ?>" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('bmb_assets2/swal2/sweetalert2.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('bmb_assets2/datatab/datatables.min.css') ?>"/>
	<script type="text/javascript" src="<?php echo base_url ('assets/dist/js/Chart.js') ?>"></script> 
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

	<link rel="stylesheet" href="<?= base_url('bmb_assets2/carousel/dist/assets/owl.carousel.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('bmb_assets2/carousel/dist/assets/owl.theme.default.min.css') ?>">
    <script src="<?= base_url('bmb_assets2/carousel/dist/owl.carousel.min.js') ?>" type="text/javascript"></script>  

   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://cdn.jsdelivr.net/gh/StephanWagner/jBox@v1.3.3/dist/jBox.all.min.js"></script>
	<link href="https://cdn.jsdelivr.net/gh/StephanWagner/jBox@v1.3.3/dist/jBox.all.min.css" rel="stylesheet">

	<script type="text/javascript">
    	var BASE_URL = "<?php echo base_url();?>";
		    	new jBox('Tooltip', {
		  attach: '.tooltip'
		});
  	</script>
  	<style>
		canvas {
			-moz-user-select: none;
			-webkit-user-select: none;
			-ms-user-select: none;
		}
	</style>
</head>
<body>
	<div id="responseDivMain" class="alert text-center" style="display:none;">
		<button type="button" class="close" id="clearMsg"><span aria-hidden="true">&times;</span></button>
		<span style="color:#000" id="messagemain"></span>
	</div>
		<?php @$this->load->view('pasu/include/header') ?>
		
		<?php echo (!empty($content)?$content:null) ?>
		<footer class="footer">
	            <div class="container-fluid">
	                <nav class="pull-left">	                	
	                    <ul>
	                        <li>
	                        	<label>Protected Area Superintendent (PASu)</label>
	                            <p><?php echo $read->firstname." ".$read->lastname; ?></p>
	                        </li>
	                        <li>
	                            <label>Contact Number</label>
						        <p><?php echo "Mobile No: ".$read->mobile."<br>Landline No.: ".$read->landline ?></p>
	                        </li>
	                        <li>
	                            <label>Email Address</label>
						        <p><?php echo $read->email ?></p>
	                        </li>
	                    </ul>
	                </nav>
	                <div class="copyright pull-right">
	                    © <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by <a href="https://www.gov.ph">Dream Catcher</a>
	                </div>
	            </div>
	        </footer>
	<!--   Core JS Files   -->
	<script src="<?= base_url('assets/dist/js/jquery-1.10.2.js') ?>" type="text/javascript"></script>
	<script src="<?= base_url('assets/dist/js/bootstrap.min.js') ?>" type="text/javascript"></script>

	<!--   Input Mask JS Files   -->
	<script src="<?php echo base_url ('assets/input-mask/jquery.inputmask.js') ?>"></script>
	<script src="<?php echo base_url ('assets/input-mask/jquery.inputmask.extensions.js') ?>"></script>
	<script src="<?php echo base_url ('assets/input-mask/jquery.inputmask.date.extensions.js') ?>"></script>
 -->	<!-- Paper Dashboard Core javascript and methods for Demo purpose -->
	<script src="<?php echo base_url ('assets/dist/js/paper_dashboard.js') ?>" type="text/javascript"></script>
	<script src="<?php echo base_url ('assets/dist/js/bootstrap-notify.js') ?>" type="text/javascript"></script>

	<script type="text/javascript" src="<?php echo base_url("assets/bootstrap/selection.js") ?>"></script>
	<script src="<?php echo base_url ('assets/insertdata.js') ?>" type="text/javascript"></script>

	<!-- SWEET ALERT PLUGINS -->
	<script src="<?php echo base_url('bmb_assets2/swal2/sweetalert2.min.js') ?>"></script>

	<!--  Bootstrap Table Plugin    -->
	<script src="<?php echo base_url ('assets/dist/js/bootstrap-table-master/dist/bootstrap-table.js') ?>" type="text/javascript"></script>

	<!--  Plugin for DataTables.net  -->
	<script src="<?php echo base_url ('assets/dist/js/jquery.datatables.js') ?>" type="text/javascript"></script>

	<script src="<?php echo base_url ('assets/dist/js/pamain.js') ?>" type="text/javascript"></script>
	
	<script type="text/javascript">
	$("[data-mask]").inputmask();
	$('#myModal').on('hidden.bs.modal', function (e) {
  	$(this)
    .find("input,textarea,select,span")
       .val('')
       .end()
    .find("input[type=checkbox], input[type=radio]")
       .prop("checked", "")
       .end();
       $("span").html("");
	})
	</script>
	<script type="text/javascript">
	function run(field) {
    setTimeout(function() {
        var regex = /\d*\.?\d?\d?/g;
        field.value = regex.exec(field.value);
    }, 0);
	}
</script>

</body>
</html>