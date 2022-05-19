<?php

    function generateRandomString($length = 11)
    {
        $char = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charlength = strlen($char);
        $randomString = '';
        for ($i=0; $i < $length; $i++) {
            $randomString .= $char[mt_rand(0, $charlength -1)];
        }
        return $randomString;
    }

    function generateRandomStringBiologicalSpecies($length = 11)
    {
        $char = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charlength = strlen($char);
        $randomString = 'species-';
        for ($i=0; $i < $length; $i++) {
            $randomString .= $char[mt_rand(0, $charlength -1)];
        }
        return $randomString;
    }

     function generateRandomStringCoastal($length = 11)
    {
        $char = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charlength = strlen($char);
        $randomString = 'COASTAL-';
        for ($i=0; $i < $length; $i++) {
            $randomString .= $char[mt_rand(0, $charlength -1)];
        }
        return $randomString;
    }

    function generateRandomStringBDFE($length = 11)
    {
        $char = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charlength = strlen($char);
        $randomString = 'BDFE-';
        for ($i=0; $i < $length; $i++) {
            $randomString .= $char[mt_rand(0, $charlength -1)];
        }
        return $randomString;
    }

    function generateRandomStringTourism($length = 11)
    {
        $char = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charlength = strlen($char);
        $randomString = 'ECOT-';
        for ($i=0; $i < $length; $i++) {
            $randomString .= $char[mt_rand(0, $charlength -1)];
        }
        return $randomString;
    }

    function generated_proj_code($length = 10)
    {
        $char = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charlength = strlen($char);
        $randomString = 'PROJ-';
        for ($i=0; $i < $length; $i++) {
            $randomString .= $char[mt_rand(0, $charlength -1)];
        }
        return $randomString;
    }

    function generated_sapa_code($length = 10)
    {
        $char = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charlength = strlen($char);
        $randomString = 'SAPA-';
        for ($i=0; $i < $length; $i++) {
            $randomString .= $char[mt_rand(0, $charlength -1)];
        }
        return $randomString;
    }

    function generated_moa_code($length = 10)
    {
        $char = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charlength = strlen($char);
        $randomString = 'MOA-';
        for ($i=0; $i < $length; $i++) {
            $randomString .= $char[mt_rand(0, $charlength -1)];
        }
        return $randomString;
    }

    $data_boundary = array(
    'name' => 'boundary',
    'id'   => 'boundary',
    'class'=> 'form-control border-input',
    'placeholder'=>'',
    'style' => 'height:130px'
);
$data_boundary_north = array(
    'name' => 'boundary_north',
    'id'   => 'boundary_north',
    'placeholder'=>'Input details',
);

$data_boundary_upper = array(
    'name' => 'boundary_upper',
    'id'   => 'boundary_upper',
    'placeholder'=>'Description ex. Northern part bounded by...',
);

$data_boundary_lower = array(
    'name' => 'boundary_lower',
    'id'   => 'boundary_lower',
    'placeholder'=>'Description ex. Southern part bounded by...',
);

$data_boundary_east = array(
    'name' => 'boundary_east',
    'id'   => 'boundary_east',
    'placeholder'=>'Input details',
);

$data_boundary_west = array(
    'name' => 'boundary_west',
    'id'   => 'boundary_west',
    'placeholder'=>'Input details',
);
$data_boundary_south = array(
    'name' => 'boundary_south',
    'id'   => 'boundary_south',
    'placeholder'=>'Input details',
);

$data_strict = array(
    'name' => 'strictzone',
    'id'   => 'strictzone',
    // 'class'=> 'form-control border-input',
    'style' => 'height:130px',
    'placeholder' => 'Brief description'
);

$data_multiple = array(
    'name' => 'multiplezone',
    'id'   => 'multiplezone',
    'class'=> 'form-control border-input',
    'style' => 'height:130px',
    'placeholder' => 'Brief description'    
);

$data_landuses = array(
    'name' => 'landuses',
    'id'   => 'landuses',
    'class'=> 'form-control border-input',
    'placeholder'=>'',
    'style' => 'height:130px'
);
$data_accessibility = array(
    'name' => 'accessibility',
    'id'   => 'accessibility',
    'placeholder'=>'Input details',
    'style' => 'height:130px'
);
$data_landmark = array(
    'name' => 'landmark',
    'id'   => 'landmark',
    'class'=> 'form-control border-input',
    'placeholder'=>'',
    'style' => 'height:130px'
);
$data_legisno = array(
    'name' => 'legisno',
    'id'   => 'legisno',
    'class'=> 'form-control border-input',
    'type' => 'text',
    'placeholder'=>'Legislation No.');
$data_legispdf = array(
    'name' => 'picture',
    'id'   => 'picture',
    'type' => 'file',
    'placeholder'=>'PDF File');
$data_gal = array(
    'name' => 'fileGal[]',
    'id' => 'fileGal',
    // 'class'=> 'form-control border-input',
    'type' => 'file',
    'placeholder' => 'Image')
?>

<div class="col-sm-12 col-lg-12">
   <div class="col-md-2 col-xs-2 col-lg-2">        

    <div class="tabs-x tabs-left tab-bordered">
        <ul id="myTab-kv-15" class="nav nav-tabs" role="tablist">  
                <center id="headlight"><h2>      
                    <?php if (!empty($pamain->id_main)): ?>
                        Edit Record
                    <?php else: ?>
                        New Record 
                    <?php endif; ?>
                </h2></center>
                <!-- <hr> -->
                <!-- <li><center> -->
                    <!-- <button type="button" name="btnlocation" title="" id="submitlocation" onclick="insert_Main()" class="btn btn-primary  btn-flat btnsavemain">SAVE</button> -->                                
                <!-- </li><hr> -->
                <li class="active"><a href="#geninfo" role="tab" data-toggle="tab"><i class=""></i> General Information</a></li>
                <li><a href="#biofeat" role="tab-kv" data-toggle="tab" id="loadbio"><i class=""></i>Biological Features</a></li>
                <li><a href="#phyfeat" role="tab-kv" data-toggle="tab" id="loadtopo"><i class=""></i>Physical Features</a></li>
               
                <li><a href="#sacfid" role="tab-kv" data-toggle="tab" id="loadEcotourismSEAMS"><i class=""></i>Socio-Economic and Cultural Features</a></li>
                <li><a href="#ipafid" role="tab-kv" data-toggle="tab" id="loadincomegenerated"><i class=""></i>Integrated Protected Area Fund</a></li>
                <li><a href="#mzid" role="tab-kv" data-toggle="tab" id="loadmultiple"><i class=""></i>Management Planning</a></li>

                <li><a href="#ecoid" role="tab-kv" data-toggle="tab" id="loadattraction"><i class=""></i>Ecotourism</a></li>
                <li><a href="#tenureid" role="tab-kv" data-toggle="tab" id="loadtenurial"><i class=""></i>Tenurial Instrument</a></li>
                <li><a href="#programid" role="tab-kv" data-toggle="tab" id="loadprograms"><i class=""></i>Programs, Projects, Research</a></li>

                <li><a href="#threatsid" role="tab-kv" data-toggle="tab" id="loadthreat"><i class=""></i>Threats</a></li>
                <li><a href="#mgmtboardid" role="tab-kv" data-toggle="tab" id="loadmboards"><i class=""></i>Management Board</a></li>
                <li><a href="#pamoid" role="tab-kv" data-toggle="tab" id="loadpamos"><i class=""></i>Protected Area Management Office</a></li>
                
                <li><a href="#gallaryid" role="tab-kv" data-toggle="tab" id="loadgalery"><i class=""></i>Communication Education and Public Awareness</a></li>
                <li><a href="#mande" role="tab-kv" data-toggle="tab" id="loadmne"><i class=""></i>Monitoring and Evaluation (M&E)</a></li>
                <li><a href="#mapimageid" role="tab-kv" data-toggle="tab" id="loadmap"><i class=""></i>Map Image</a></li>
                <li><a href="#referenceid" role="tab-kv" data-toggle="tab" id="loadrefer"><i class=""></i>References</a></li>  
            </ul> 
        </div>    
    </div>
   <div class="col-md-10 col-xs-10 col-lg-10">        
        <?php echo form_open_multipart('#','id="regFormMain" enctype="multipart/form-data" class="form-style-7" autocomplete="off"') ?>
            <?php echo form_hidden('id_main',$pamain->id_main).form_hidden('pasu_id',$pamain->pasu_id).form_hidden('pasu_ids',$read->user_id);?>
            <div id="myTabContent-kv-15" class="tab-content">                
                <div class="tab-pane fade in active" id="geninfo">            
            <?php if (!empty($pamain->id_main)): ?>
                <input type="text" name="gencode" class="hidden" value="<?php echo $pamain->generatedcode; ?>" id="codegen">
                <input type="text" name="pasu_idd" class="hidden" value="<?php echo $read->user_id; ?>" id="pasu_id">
            <?php else: ?>
                <input type="text" name="gencode" class="hidden" value="<?php echo generateRandomString(); ?>" id="codegen">
                <input type="text" name="pasu_idd" class="hidden" value="<?php echo $read->user_id; ?>" id="pasu_id">
            <?php endif; ?>
                    <?php $this->load->view('pasu/form/geninfo'); ?>
                </div>
                <div class="tab-pane fade" id="biofeat">
                    <?php $this->load->view('pasu/form/biofeat'); ?>                    
                </div>
                <div class="tab-pane fade" id="phyfeat">
                    <?php $this->load->view('pasu/form/phyfeat'); ?>
                </div>
          
                <div class="tab-pane fade" id="sacfid">
                    <?php $this->load->view('pasu/form/secfid'); ?>
                </div>
                <div class="tab-pane fade" id="ipafid">
                    <?php $this->load->view('pasu/form/ipaf_form'); ?>
                </div>
                <div class="tab-pane fade" id="mzid">
                    <?php $this->load->view('pasu/form/mgmtzone'); ?>
                </div>
                <div class="tab-pane fade" id="ecoid">
                    <?php $this->load->view('pasu/form/ecotourism'); ?>
                </div>
                <div class="tab-pane fade" id="tenureid">
                    <?php $this->load->view('pasu/form/tenure'); ?>                    
                </div>
                <div class="tab-pane fade" id="programid">
                    <?php $this->load->view('pasu/form/program'); ?>
                </div>
                <div class="tab-pane fade" id="threatsid">
                    <?php $this->load->view('pasu/form/threats'); ?>
                </div>
                <div class="tab-pane fade" id="mgmtboardid">
                    <?php $this->load->view('pasu/form/mgmtboard'); ?>                    
                </div>
                <div class="tab-pane fade" id="pamoid">
                    <?php $this->load->view('pasu/form/pamo'); ?>
                </div> 
                <div class="tab-pane fade" id="referenceid">
                    <?php $this->load->view('pasu/form/references'); ?>
                </div> 
                <div class="tab-pane fade" id="mgmtplanid">
                    <?php $this->load->view('pasu/form/mgmtplan'); ?>
                </div>  
                <div class="tab-pane fade" id="mgmtplanid">
                    <?php $this->load->view('pasu/form/mgmtplan'); ?>
                </div> 
                <div class="tab-pane fade" id="mapimageid">
                    <?php $this->load->view('pasu/form/map'); ?>
                </div>
                
                <div class="tab-pane fade" id="mande">
                    <?php $this->load->view('pasu/form/mne'); ?>
                </div>       
                <div class="tab-pane fade" id="gallaryid">
                    <?php $this->load->view('pasu/form/gallary'); ?>
                </div>                
            </div>
        <?php echo form_close(); ?>
    </div>
</div>



<!-- End of Script -->
<!-- <script type="text/javascript">
        $(document).ready(function(){

            var categoryId = $('.categoryId');
            var classId = $('.classId');
            var orderId = $('.orderId');
            var familyId = $('.familyId');
            var scientificId = $('.scientificId');
            var statusId = $('.statusId');
            var commonid = $('.commonid');


            $('#searchBox').autocomplete({
                source: "<?php echo base_url('pasu/pamain/GetName');?>",
     
                select: function (event, ui) {
                    $(this).val(ui.item.label);

                    $.ajax({
                        url : BASE_URL+'/pasu/pamain/getDataBiosss/',
                        type : 'POST',
                        dataType: 'JSON',
                        data: {searchbox : $(this).val()},
                            success : function(data)
                                {
                                if (data.status == true) {
                                  categoryId.html(data.messagecat);
                                  classId.html(data.messageclass);
                                  orderId.html(data.messageorder);
                                  familyId.html(data.messagefamily);
                                  scientificId.html(data.messagescientific);
                                  statusId.html(data.messagestatus);
                                  commonid.html(data.messagecommon);
                                }else if (data.status == false){
                                  categoryId.html('');
                                  classId.html('');
                                  orderId.html('');
                                  familyId.html('');
                                  scientificId.html('');
                                  statusId.html('');
                                  commonid.html('');
                                }else{
                                  categoryId.html('');
                                  classId.html('');
                                  orderId.html('');
                                  familyId.html('');
                                  scientificId.html('');
                                  statusId.html('');
                                  commonid.html('');
                                }
                            },
                            error : function()
                            {
                              alert('failed');
                            }
                      });

                }
            });
        });
</script> -->
<script type="text/javascript">
$(".sidebar a").on("click", function() {
  $(".sidebar").find(".active").removeClass("active"); 
  $(this).addClass("active");
});
</script>
<script type="text/javascript">
//auto expand textarea
function adjust_textarea(h) {
    h.style.height = "20px";
    h.style.height = (h.scrollHeight)+"px";
}
function openTab(th)
{
    window.open(th.name,'_blank');
}
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "tabs-x") {
    x.className += " responsive";
  } else {
    x.className = "tabs-x";
  }
}
</script>
<script type="text/javascript">
    $(document).ready(function () {
  var elem = document.getElementById('chk_cupa');
  elem.addEventListener('click', function() {
        var divElem = document.getElementById('cupadiv'); 
      if( this.checked){
          divElem.style.display = 'block'  ; 
      }
      else{
          divElem.style.display = 'none'  ;
      }
  });
  var elem = document.getElementById('chk_cbi');
  elem.addEventListener('click', function() {
        var divElem = document.getElementById('cbidiv'); 
      if( this.checked){
          divElem.style.display = 'block'  ; 
      }
      else{
          divElem.style.display = 'none'  ;
      }
  });

   var elem = document.getElementById('edit-chk_cupa');
  elem.addEventListener('click', function() {
        var divElem = document.getElementById('cupadivedit'); 
      if( this.checked){
          divElem.style.display = 'block'  ; 
      }
      else{
          divElem.style.display = 'none'  ;
      }
  });
  
  var elem = document.getElementById('edit-chk_cbi');
  elem.addEventListener('click', function() {
        var divElem = document.getElementById('cbidivedit'); 
      if( this.checked){
          divElem.style.display = 'block'  ; 
      }
      else{
          divElem.style.display = 'none'  ;
      }
  }); 
});
</script>