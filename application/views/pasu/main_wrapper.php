<!doctype html>
<html class="no-js" lang="en">
  <head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />    
    <link rel="shortcut icon" href="<?php echo base_url('bmb_assets2/img/Untitled-1.png') ?>"/>
    <title>PA - <?php echo (!empty($page_title)?$page_title:null) ?> </title>    
    <script src="<?php echo base_url();?>assets/dist/js/code_js.js"></script>
    <script src="<?php echo base_url();?>assets/dist/js/code_js1.js"></script>
    
    <link rel="stylesheet" href="<?php echo base_url();?>assets_pa/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets_pa/css/customized.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets_pa/css/dataTables.bootstrap.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets_pa/sweetalerts/sweet-alert.css" />
    <!-- owl carousel css -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets_pa/css/owl/owl.carousel.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets_pa/css/owl/owl.theme.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets_pa/css/owl/owl.transitions.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/jquery-ui.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets_pa/css/themify-icons/themify-icons.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/captain-icons-master/dist/captain-icons.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>bmb_assets2/dist/css/bootstrap-datetimepicker.min.css" media="screen"/>
    <!-- Leaflet GIS -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets_pa/leaflet/leaflet.css" />    
    <script src="<?php echo base_url();?>assets_pa/leaflet/leaflet.js"></script>

    <script src="<?php echo base_url();?>assets_pa/js/jquery.md5.js"></script>
    <script src="<?php echo base_url();?>assets_pa/js/jquery.js"></script>
    <!--This -->
    <link href="<?= base_url('assets_set/css/bootstrap-tabs-x.css') ?>" media="all" rel="stylesheet" type="text/css"/>

    <script src="<?= base_url('assets/dist/js/jquery-1.10.2.js') ?>" type="text/javascript"></script>
    <!--This -->
    <script src="<?= base_url('assets_set/js/bootstrap-tabs-x.js') ?>" type="text/javascript"></script>
    
    <script src="<?php echo base_url();?>assets_pa/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>assets_pa/js/dataTables.bootstrap.js"></script>   
    <script src="<?php echo base_url();?>assets_pa/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets_pa/js/bootstrap.js"></script>     
    <script src="<?php echo base_url();?>assets_pa/js/jquery-ui.min.js"></script> 
    <script src="<?php echo base_url();?>assets_pa/js/jquery.validate.min.js"></script>
    <script src="<?php echo base_url();?>assets_pa/js/additional-methods.min.js"></script>
    <script src="<?php echo base_url();?>assets_pa/sweetalerts/sweet-alert.js"></script>
    <!-- owl carousel js -->
    <script src="<?php echo base_url();?>assets_pa/js/owl/owl.carousel.js"></script>
    <script src="<?php echo base_url();?>assets_pa/js/owl/owl.carousel.min.js"></script>
    <script src="<?php echo base_url();?>assets_pa/js/canvasjs.min.js"></script>
    <script src="<?php echo base_url();?>assets/dist/js/chart_vendor/Chart.min.js"></script>
    <script src="<?php echo base_url('assets_set/scripts/jquery.table.hpaging.min.js') ?>"></script>

    <link rel="stylesheet" href="<?php echo base_url();?>assets/fullcalendar/fullcalendar.min.css" media="screen"/>
    <script src="<?php echo base_url();?>assets/fullcalendar/lib/moment.min.js"></script>
    <script src="<?php echo base_url();?>assets/fullcalendar/fullcalendar.min.js"></script>
    
    <link rel="stylesheet" href="<?php echo base_url();?>bmb_assets2/daterangepicker-master/daterangepicker.css" media="screen"/>
    <script src="<?php echo base_url();?>bmb_assets2/daterangepicker-master/lib/moment.min.js"></script>
    <script src="<?php echo base_url();?>bmb_assets2/daterangepicker-master/daterangepicker.js"></script>

    <!-- Select2 CSS --> 
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" /> 


    <!-- Select2 JS --> 
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

    <script type="text/javascript">
      var BASE_URL = "<?php echo base_url();?>";
    </script>
    <style type="text/css">

.sr-only { 
opacity: 0;
float: right;
}
#getMe2{
  display: none;
}

#iwdiv2{
  display: none;
}
input[type='checkbox'].tags-checkbox:checked + label > i:first-of-type,
input[type='checkbox'].tags-checkbox + label > i:last-of-type{
    display: none;
}
input[type='checkbox'].tags-checkbox:checked + label > i:last-of-type{
    display: inline-block;
}
</style>

</head>
    <body>
        <div id="responseDivMain" class="alert text-center" style="display:none;">
            <button type="button" class="close" id="clearMsg"><span aria-hidden="true">&times;</span></button>
            <span style="color:#000" id="messagemain"></span>
        </div>
        <button onclick="topFunction()" id="myBtn" title="Go to top"></button>
        <?php @$this->load->view('pasu/include/pasu_header') ?>
        <?php echo (!empty($content)?$content:null) ?>
    </div>
    
<!-- </div> -->
  
<script type="text/javascript">
    $(document).ready(function(){
        $('.dropdown-toggle').dropdown();   
    });
    window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("myBtn").style.display = "block";
  } else {
    document.getElementById("myBtn").style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}
</script>
 <style>  
        </style>  
            
        <!-- <script type="text/javascript">  
        $(this).ready( function() {  
            $("#id").autocomplete({  
 
                minLength: 1,  
                source:   
                function(req, add){  
                    $.ajax({  
                        url: "<?php echo base_url(); ?>index.php/autocomplete/lookup",  
                        dataType: 'json',  
                        type: 'POST',  
                        data: req,  
                        success:      
                        function(data){  
                            if(data.response =="true"){  
                                add(data.message);  
                                console.log(data);
                            }  
                        },  
                    });  
                },  
                     
            });  
        });  
        </script>   -->
  </body>
  
    <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script> 
    <script src="<?php echo base_url ('assets/dist/js/index.js') ?>" type="text/javascript"></script>    
    <script src="<?php echo base_url ('assets/dist/js/pamain.js') ?>" type="text/javascript"></script>
    <script src="<?php echo base_url ('assets/insertdata.js') ?>" type="text/javascript"></script>
    <script src="<?php echo base_url ('bmb_assets2/input-mask/jquery.inputmask.js') ?>"></script>
    <script src="<?php echo base_url ('bmb_assets2/input-mask/jquery.inputmask.extensions.js') ?>"></script>
    <script src="<?php echo base_url ('bmb_assets2/input-mask/jquery.inputmask.date.extensions.js') ?>"></script>
    <script src="<?php echo base_url ('bmb_assets2/dist/js/bootstrap-datetimepicker.js') ?>" type="text/javascript" harset="UTF-8"></script>
    <script type="text/javascript">
      $(document).ready(function(){
      $("[data-mask]").inputmask();
    });
    </script>
    
      
</html>

