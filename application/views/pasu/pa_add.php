
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
$data_legisarea = array(
    'name' => 'area',
    'id'   => 'area',
    'type' => 'text',
    'readonly' => 'readonly'
	);
$data_legisterris = array(
    'name' => 'terrestrial',
    'id'   => 'terrestrial',
    'type' => 'text',
	'onkeyup'=>'run(this)');
$data_legisbuffer = array(
    'name' => 'buffer',
    'id'   => 'buffer',
    'type' => 'text',
	'onkeyup'=>'run(this)');
$data_legismarinearea = array(
    'name' => 'marine',
    'id'   => 'marine',
    'type' => 'text',
	'onkeyup'=>'run(this)');
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
<div class="sidebar">
    <a class="active" href="#1a" data-toggle="tab">General Information</a>
    <a href="#4a" data-toggle="tab">Biological Features</a>
    <a href="#6a" data-toggle="tab">Physical Features</a>
    <a href="#7a" data-toggle="tab">Habitats and Ecosystem</a>         
    <a href="#8a" data-toggle="tab">Socio-cultural and Economic Features</a>
    <a href="#15a" data-toggle="tab">IPAF</a>        
    <a href="#9a" data-toggle="tab">Management Zone</a>
    <a href="#10a" data-toggle="tab">Ecotourism</a>
    <a href="#11a" data-toggle="tab">Projects, Programs and Researches</a>
    <a href="#12a" data-toggle="tab">Threats</a>
    <a href="#5a" data-toggle="tab">Management Board</a>
    <a href="#13a" data-toggle="tab">References</a>
    <a href="#14a" data-toggle="tab">Map Image</a>
    <a href="#16a" data-toggle='tab'>PAMO Members</a>
    <a href="#17a" data-toggle='tab'>Galleries</a>
    
</div>                                
<div class="icon-bars">
    <?php if (!empty($pamain->id_main)): ?>
        <div class="col-lg-12">
          <div class="form-group col-sm-12 col-xs-12">
              <button type="button" name="btnlocation" id="submitlocation" onclick="insert_Main()" class="btn btn-primary  btn-flat"><i class="glyphicon glyphicon-floppy-open" id="glyphicon"></i></button>
              <span class="tooltiptext">Update</span>
          </div>
        </div>
        <?php else: ?>
        <div class="col-lg-12">
          <div class="form-group col-sm-12 col-xs-12">
              <button type="button" name="btnlocation" id="submitlocation" onclick="insert_Main()" class="btn btn-primary  btn-flat"><i class="glyphicon glyphicon-floppy-save" id="glyphicon"></i></button>
              <span class="tooltiptext">Save</span>
          </div>
        </div>
    <?php endif; ?>
</div>
<div class="row">
    <div id="exTab1" class="container"> 
    <?php echo form_open_multipart('#','id="regFormMain" enctype="multipart/form-data" class="form-style-7"') ?>
    <?php echo form_hidden('id_main',$pamain->id_main);?>
    <?php echo form_hidden('pasu_id',$pamain->pasu_id);?>
    <?php echo form_hidden('pasu_ids',$read->user_id);?>
    <div class="col-xs-12 col-lg-12 ">                  
        <div class="element-container">
            <div class="container">
                    <?php if (!empty($pamain->id_main)): ?>
                       <center><h1>Edit <?= $pamain->pa_name ?> </h1></center>
                    <?php else: ?>
                        <center><h1>New Record </h1></center>
                    <?php endif; ?>
            </div>                     
            <ul class="nav nav-pills">
                 
            </ul>                             
            <div class="tab-content clearfix">
                <div class="tab-pane active" id="1a">
                    <div class="row clearfix row-box">  
                    <h3>GENERAL INFORMATION</h3>                        
                        <div class="col-xs-12 "> 
                        <?php if (!empty($pamain->id_main)): ?>
                            <input type="text" name="gencode" class="hidden" value="<?php echo $pamain->generatedcode; ?>" id="codegen">
                            <input type="text" name="pasu_idd" class="hidden" value="<?php echo $read->user_id; ?>" id="pasu_id">
                        <?php else: ?>
                            <input type="text" name="gencode" class="hidden" value="<?php echo generateRandomString(); ?>" id="codegen">
                            <input type="text" name="pasu_idd" class="hidden" value="<?php echo $read->user_id; ?>" id="pasu_id">
                        <?php endif; ?>   
                        <!-- <div class="form-style-6">
                                <h1>Contact Us</h1>
                            
                        </div> -->
                        <!-- <form class="form-style-7">
                            <ul>
                            <li>
                                <label for="name">Name</label>
                                <input type="text" name="name" maxlength="100">
                                <span>Enter your full name here</span>
                            </li>
                            <li>
                                <label for="email">Email</label>
                                <input type="email" name="email" maxlength="100">
                                <span>Enter a valid email address</span>
                            </li>
                            <li>
                                <label for="url">Website</label>
                                <input type="url" name="url" maxlength="100">
                                <span>Your website address (eg: http://www.google.com)</span>
                            </li>
                            <li>
                                <label for="bio">About You</label>
                                <textarea name="bio" onkeyup="adjust_textarea(this)"></textarea>
                                <span>Say something about yourself</span>
                            </li>
                            <li>
                                <input type="submit" value="Send This" >
                            </li>
                                    </ul>
                        </form> -->
                                             
                            <div class="col-xs-12 ">    
                                <div class="col-xs-12 col-lg-12">
                                    <?= form_input('pa_name',$pamain->pa_name,'id="pa_name" placeholder=" "').form_label('Name of Protected Area','','for="pa_name"') ?>
                                </div>
                                <div class="col-xs-12 col-lg-12 field inner-addon left-addon">
                                    <?= form_input('formerpa_name',$pamain->formerpaname,'id="formerpa_name" placeholder=" "').form_label('Former name of PA (if any)','','for="formerpa_name"') ?>
                                </div>

                                <fieldset>
                                    <legend>Legal Status</legend>
                                    <div class="col-xs-12">
                                        <div class="col-xs-6 col-lg-6  field inner-addon left-addon">
                                            <?php echo form_dropdown('nip_id',$classList,$pamain->nip_id,'class="select-css" id="nipid"') ?>
                                        </div>
                                        <?php if (!empty($pamain->id_main)): ?>
                                        <div class="col-xs-6 col-lg-6  field inner-addon left-addon chck-02" id="chck-02">
                                            <?php echo form_dropdown('paclasssub',$subclassList,$pamain->nipsub_id,'class="select-css" id="nipsub_id"') ?>
                                        </div>                                       
                                        <?php else: ?>
                                       <div class="col-xs-6 col-lg-6  field inner-addon left-addon">
                                            <?php echo form_dropdown('paclasssub','',$pamain->nipsub_id,'class="select-css" id="nipsub_id"') ?>
                                        </div>
                                        <?php endif; ?> 
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="col-xs-12  ">
                                            <div class="col-xs-12 ">
                                                <fieldset>
                                                    <legend>Legislation</legend>
                                                    <div class="col-xs-6 col-lg-6 ">
                                                        <?= form_dropdown('legis_id',$procList,'','class="select-css" id="legis_id" style="margin-top:20px;"') ?>
                                                    </div>
                                                    <div class="col-xs-6 col-lg-6 field inner-addon left-addon">
                                                        <?= form_input('legisno','','placeholder=" " id="legisno"').form_label('Numbered or sessional Acts.','','for="legisno"') ?>
                                                    </div>
                                                </fieldset>                                    
                                            </div>
                                            <fieldset>
                                                <legend>Date Issued</legend>
                                                <div class="col-xs-12 ">
                                                    <div class="col-xs-6 col-lg-4 ">
                                                        <?= form_dropdown('date_month',$monthList,'','class="select-css" id="month"'); ?> 
                                                    </div>
                                                    <div class="col-xs-6 col-lg-4 ">
                                                        <?= form_dropdown('date_day',$dayList,'','class="select-css" id="day"'); ?>
                                                    </div>
                                                    <div class="col-xs-6 col-lg-4 ">
                                                        <?= form_dropdown('date_year',$yearListed,'','class="select-css" id="year"'); ?>
                                                    </div>
                                                </div>
                                            </fieldset>
                                         </div>
                                    </div>
                                </fieldset>
                                <div class="col-xs-6 col-lg-6  field inner-addon left-addon">                                
                                    <fieldset>
                                        <legend>Category</legend>
                                        <?php echo form_dropdown('pacategory_id',$categoryList,$pamain->pacategory_id,'class="select-css"') ?>
                                    </fieldset>
                                </div>
                                <div class="col-xs-6 col-lg-6  field inner-addon left-addon">                                
                                    <fieldset>
                                        <legend>Biogeographic Zone</legend>
                                        <?php echo form_dropdown('tbz_id',$zoneList,$pamain->tbz_id,'class="select-css"') ?>
                                    </fieldset>
                                </div>
                                <fieldset>
                                    <legend>Key Biodiversity Area</legend>
                                    <div class="col-xs-6 col-lg-6  field inner-addon left-addon"> 
                                        <?php echo form_dropdown('kba',$kba,$pamain->kba,'class="select-css" id="kba_id"') ?>
                                    </div>
                                    <div class="col-xs-6 col-lg-6  chck-01 field" id="chck-01"> 
                                        <?php echo form_dropdown('cpabi_id',$cpabiList,$pamain->cpabi_id,'class="select-css" id="cpabi_id"') ?>
                                    </div>
                                </fieldset>  
                                <fieldset>
                                    <legend>Area (has)</legend>
                                    <div class="col-xs-6 col-lg-3 field inner-addon left-addon">  
                                        <?php echo form_input($data_legisterris,$pamain->terrestrial,'onchange="calculate()" placeholder=" "').form_label('Terrestrial','','for="terrestrial"'); ?>
                                    </div>
                                    <div class="col-xs-6 col-lg-3 field inner-addon left-addon">  
                                        <?php echo form_input($data_legismarinearea,$pamain->marine_area,'onchange="calculate()" placeholder=" "').form_label('Marine','','for="marine"'); ?>
                                    </div>
                                    <div class="col-xs-6 col-lg-3 field inner-addon left-addon">  
                                        <?php echo form_input($data_legisbuffer,$pamain->buffer,'placeholder=" "').form_label('Buffer Zone','','for="buffer"'); ?>
                                    </div>                       
                                    <div class="col-xs-6 col-lg-3 field inner-addon left-addon">  
                                        <?php echo form_input($data_legisarea,$pamain->area,'placeholder=" "').form_label('Total','','for="area"'); ?>
                                    </div>
                                </fieldset>                            
                            </div>
                        </div> 
                    <!-- </div> -->
                    <!-- <div class="row clearfix row-box"> -->
                    <!-- <h3>LEGAL STATUS</h3>                         -->
                        <div class="row clearfix">
                            <div class="col-xs-12  ">
                                <div class="col-xs-12 ">
                                    <fieldset>
                                        <legend>Legislation</legend>
                                        <div class="col-xs-6 col-lg-6 ">
                                            <?= form_dropdown('legis_id',$procList,'','class="select-css" id="legis_id" style="margin-top:20px;"') ?>
                                        </div>
                                        <div class="col-xs-6 col-lg-6 field inner-addon left-addon">
                                            <?= form_input('legisno','','placeholder=" " id="legisno"').form_label('Numbered or sessional Acts.','','for="legisno"') ?>
                                        </div>
                                    </fieldset>                                    
                                </div>
                                <fieldset>
                                    <legend>Date Issued</legend>
                                    <div class="col-xs-12 ">
                                        <div class="col-xs-6 col-lg-4 ">
                                            <?= form_dropdown('date_month',$monthList,'','class="select-css" id="month"'); ?> 
                                        </div>
                                        <div class="col-xs-6 col-lg-4 ">
                                            <?= form_dropdown('date_day',$dayList,'','class="select-css" id="day"'); ?>
                                        </div>
                                        <div class="col-xs-6 col-lg-4 ">
                                            <?= form_dropdown('date_year',$yearListed,'','class="select-css" id="year"'); ?>
                                        </div>
                                    </div>
                                </fieldset>
                             </div>
                        </div>
                        <br>
                        <div class="row clearfix">
                            <div class="col-xs-12  ">
                                <div class="col-xs-12 ">
                                    <div class="col-xs-6 col-lg-4 ">
                                        <input type="text" id="addLegislation" value="Add to table" class="btn btn-primary">
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <br>
                        <div class="row clearfix">
                            <div class="col-xs-12  ">
                                <div class="col-xs-12 ">
                                    <div class="col-xs-12 col-lg-12 ">
                                        <div class="table-responsive">
                                            <h4>Issuance(s)</h4>
                                            <table id="LegislationTable" class="table table-bordered table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Legal Basis</th>
                                                        <th>Dated</th>                                             
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbody_leg">                                                  
                                                </tbody>
                                            </table>
                                        </div>  
                                        <div class="table-responsive">
                                            <table id="LegislationTable_sample" class="table table-bordered table-bordered hide">
                                                <thead>
                                                    <tr>
                                                        <th>Legal Basis</th>
                                                        <th>Dated</th>
                                                        <th class="glyphicon glyphicon-trash"></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbody_legs">                                                 
                                                </tbody>
                                            </table>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- </div>                     -->
                    <!-- <div class="row clearfix row-box"> -->
                    <h3>LOCATION(s)</h3>                        
                        <div class="col-xs-12  ">
                            <div class="col-xs-12 ">
                                <?= form_input('no','','class="form-control border-input hide" id="no" readonly'); ?>
                                <div class="col-xs-6 col-lg-3 ">
                                    <?php echo form_dropdown('region_id',$regionList,'','class="select-css" id="regid"') ?>
                                    <span class="prov_error"></span>
                                </div>
                                <div class="col-xs-6 col-lg-3 ">
                                    <?php echo form_dropdown('province_id','','','class="select-css" id="provid"') ?>
                                    <span class="municipal_error"></span>
                                </div>
                                <div class="col-xs-6 col-lg-3 ">
                                    <?php echo form_dropdown('municipal_id','','','class="select-css" id="munid"') ?>
                                    <span class="barangay_error"></span>
                                </div>
                                <div class="col-xs-6 col-lg-3 ">
                                    <?php echo form_dropdown('barangay_id','','','class="select-css" id="barid"') ?>
                                <span class="barangay_error"></span><br>
                                </div> 
                            </div> 
                        </div>                         
                        <div class="col-xs-12  ">
                            <div class="col-xs-12 col-lg-12 ">
                                <input type="text" id="add_data" value="Add to table" class="btn btn-primary"> 
                            </div> 
                        </div>
                    <div class="row clearfix">
                        <div class="col-xs-12  ">
                            <div class="col-xs-12 ">
                                <div class="col-xs-12 col-lg-12 ">
                                    <div class="table-responsive large-tables">
                                        <h4>Table Location(s)</h4>
                                        <table id="data_table" class="table table-striped table-bordered table-bordered">
                                            <thead>
                                                <tr>
                                                    <!-- <th>No.</th> -->
                                                    <th>Region</th>
                                                    <th>Province</th>
                                                    <th>Municipality</th>
                                                    <th>Barangay</th>
                                                    <th class="hide">Status</th>
                                                    <th class="hide">Code</th>
                                                    <th></th>
                                                    <!-- <th>Remove</th> -->
                                                </tr>
                                            </thead>
                                            <tbody id="tbody">                                                                                
                                            </tbody>
                                        </table>
                                    </div>  
                                    <div class="table-responsive">
                                        <table id="table_sample" class="table table-bordered table-bordered hide">
                                          <thead>
                                                <tr>
                                                    <!-- <th>No.</th> -->
                                                    <th>Region</th>
                                                    <th>Province</th>
                                                    <th>Municipality</th>
                                                    <th>Barangay</th>
                                                    <th class="hide">Status</th>
                                                    <th class="hide">Code</th>
                                                    <th></th>
                                                    <!-- <th>Remove</th> -->
                                                </tr>
                                            </thead>
                                            <tbody id="tbodys">                                        
                                            </tbody>
                                        </table>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- </div> -->
                    <!-- <div class="row clearfix  row-box"> -->
                    <h3>GEOGRAPHIC LOCATION</h3>                          
                        <div class="col-xs-12  ">
                            <fieldset>
                                <legend>Longitude</legend>
                                <div class="col-xs-6 col-lg-6 field inner-addon left-addon">
                                    <?= form_input('long1',$pamain->geographic_long1,'id="long1" placeholder=" "').form_label('Upper most left','','for="long1"')?>
                                </div> 
                                <div class="col-xs-6 col-lg-6 field inner-addon left-addon">
                                    <?= form_input('long2',$pamain->geographic_long2,'id="long2" placeholder=" "').form_label('Lower most right','','for="long2"')?>
                                </div>                               
                            </fieldset>                           
                        </div>
                        <div class="col-xs-12  ">
                            <fieldset>
                                <legend>Longitude</legend>
                                <div class="col-xs-6 col-lg-6 field inner-addon left-addon">
                                    <?= form_input('lat1',$pamain->geographic_lat1,'id="lat1" placeholder=" "').form_label('Lower most left','','for="lat1"')?>
                                </div> 
                                <div class="col-xs-6 col-lg-6 field inner-addon left-addon">
                                    <?= form_input('lat2',$pamain->geographic_lat2,'id="lat2" placeholder=" "').form_label('Upper most right','','for="lat2"')?>
                                </div>       
                            </fieldset>            
                        </div>
                    <!-- </div>                       -->
                    <!-- <div class="row clearfix row-box"> -->
                    <h3>BOUNDARY</h3>                        
                        <div class="col-xs-12  ">
                            <div class="col-xs-12 ">
                                <div class="col-xs-6 col-lg-6 field inner-addon left-addon">
                                    <?= form_textarea($data_boundary_north,$pamain->pa_boundary_north).form_label('North','','for="boundary_north"');?>
                                </div>
                                <div class="col-xs-6 col-lg-6 field inner-addon left-addon">
                                    <?= form_textarea($data_boundary_east,$pamain->pa_boundary_east).form_label('East','','for="boundary_east"');?>
                                </div>                           
                                <div class="col-xs-6 col-lg-6 field inner-addon left-addon">
                                    <?= form_textarea($data_boundary_west,$pamain->pa_boundary_west).form_label('West','','for="boundary_west"');?>
                                </div>
                                <div class="col-xs-6 col-lg-6 field inner-addon left-addon">
                                    <?= form_textarea($data_boundary_south,$pamain->pa_boundary_south).form_label('South','','for="boundary_south"');?>
                                </div>
                            </div>
                        </div>
                    <!-- </div> -->
                    <!-- <div class="row clearfix row-box"> -->
                    <h3>ACCESSIBILITY</h3>                        
                        <div class="col-xs-12">         
                            <div class="col-xs-12 col-lg-12 field inner-addon left-addon">
                                <?= form_textarea($data_accessibility,$pamain->accessibility).form_label(' ','','for="accessibility"');?>
                            </div>
                        </div>
                    </div>
                    </div>              
                <div class="tab-pane" id="4a">
                    <?php echo form_open_multipart('#','id="formbiological"') ?>
                    <div class="row clearfix row-box">
                    <h3>Biological Features</h3>                         
                        <div class="col-xs-12  ">
                            <div class="col-xs-12 ">
                                <div class="col-xs-12 col-lg-12 field inner-addon left-addon"> 
                                <i class="glyphicon glyphicon-search"></i>                                  
                                    <?= form_input('search','','id="searchBox" placeholder="Species name"').form_label('Search common name species','','for="searchBox"'); ?>
                                    <span id="commonid" class="commonid hide"></span>                                    
                                    <span id="category_id" class="categoryId hide"></span>
                                    <span id="class_id" class="classId hide"></span>
                                    <span id="order_id" class="orderId hide"></span>
                                    <span id="family_id" class="familyId hide"></span>
                                    <span id="scientific_id" class="scientificId hide"></span>
                                    <span id="status_id" class="statusId hide"></span>
                                </div>
                            </div>
                            <div class="col-xs-12 ">
                                <div class="col-xs-12 col-lg-12 ">
                                    <a type="text" class="btn btn-primary" id="searchBio">Add to table</a>                                 
                                </div>
                            </div> 
                        </div>                    
                        <div class="col-xs-12">
                            <div class="table-responsive"><br>   
                                <table id="tablePABiolofeature" class="table table-hover table-bordered tglobal">
                                    <thead>
                                        <tr>
                                            <th>Conservation<br> Status</th>
                                            <th>Class</th>
                                            <th>Order</th>                                                      
                                            <th>Common Name</th>
                                            <th>Scientific Name</th>
                                            <th><span class="glyphicon glyphicon-trash"></span></th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbodybiological"></tbody>                                
                                </table>
                            </div>
                            <div class="table-responsive">
                                <table id="tablePABiolofeature_sample" class="table table-hover table-bordered tglobal hide">
                                    <thead>
                                        <tr>
                                            <th>Conservation<br> Status</th>
                                            <th>Class</th>
                                            <th>Order</th>                                                      
                                            <th>Common Name</th>
                                            <th>Scientific Name</th>
                                            <th><span class="glyphicon glyphicon-trash"></span></th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbodybiologicals"></tbody>                               
                                </table>
                            </div>
                        </div>
                    </div>                                     
                </div>
                <div class="tab-pane" id="5a">
                    <div class="row clearfix row-box">
                    <h3>Management Board</h3>                        
                        <div class="col-xs-12  ">
                            <fieldset>
                                <legend>Date Organized</legend>
                                <div class="col-xs-12 ">
                                    <div class="col-xs-4 col-lg-4 ">
                                            <?php echo form_dropdown('pamb_month',$monthList,$pamain->pamb_month,'class="select-css" id="dateMonthPAMB"') ?>
                                    </div>
                                    <div class="col-xs-4 col-lg-4 ">
                                            <?php echo form_dropdown('pamb_day',$dayList,$pamain->pamb_day,'class="select-css" id="dateDayPAMB"') ?>                                         
                                    </div>
                                    <div class="col-xs-4 col-lg-4 ">
                                            <?php echo form_dropdown('pamb_year',$yearList,$pamain->pamb_year,'class="select-css" id="dateYearPAMB"') ?><br>
                                    </div>
                                </div>  
                            </fieldset>
                            <fieldset>
                                <div class="col-xs-12 ">                               
                                    <div class="col-xs-4 col-lg-4  field inner-addon left-addon">
                                        <?= form_input('fname','','id="fname" placeholder="ex. John, Jane" required').form_label('First Name','','for="fname"');?>
                                    </div>
                                    <div class="col-xs-4 col-lg-4  field inner-addon left-addon">
                                        <?= form_input('mname','','id="mname" placeholder="ex. A., dela Cruz" required').form_label('Middle Name','','for="mname"');?>
                                    </div>
                                    <div class="col-xs-4 col-lg-4  field inner-addon left-addon">
                                        <?= form_input('lname','','id="lname" placeholder="ex. Rodriguez, Espino" required').form_label('Last Name','','for="lname"');?>
                                    </div>
                                </div>  
                                <div class="col-xs-12 ">
                                    <div class="col-xs-6 col-lg-5 ">
                                        <?= form_dropdown('sex',$sexList,'','class="select-css" id="sex" required');?>
                                    </div>
                                    <div class="col-xs-6 col-lg-5 ">
                                        <?= form_dropdown('maritalstatus',$maritalStatus,'','class="select-css" id="maritalstatus" required');?>
                                    </div>
                                </div>
                                <div class="col-xs-12 ">
                                    <div class="col-xs-12 col-lg-12  field inner-addon left-addon">
                                        <?= form_hidden('officeaddress','','class="form-control border-input" id="officeaddress"');?>
                                        <?= form_input('address','','placeholder="Lot no., Block no, Street name, Barangay, Municipal City"  id="address"').form_label('Residential Address','','for="address"');?>
                                    </div>                                    
                                </div>
                           
                                <div class="col-xs-12 ">
                                    <div class="col-xs-12 col-lg-12  field inner-addon left-addon">
                                        <?= form_input('position','','placeholder="ex. Chairman, Vice Chairman, Member" id="position" required').form_label('Designation/Position','','style="margin:4px" for="position"');?>
                                    </div>
                                </div>
                                <div class="col-xs-12 ">                            
                                    <div class="col-xs-12 col-lg-12  field inner-addon left-addon">
                                        <?=form_input('office','','placeholder="Office/Company Name" id="office" required').form_label('Office/Company Name','','style="margin:4px" for="office"');?>
                                    </div>
                                </div>                                
                            </fieldset>
                            <fieldset>
                                <legend>Appointment Info and Date</legend>
                                <div class="col-xs-12 ">
                                    <div class="col-xs-12 col-lg-6 ">
                                        <?= form_dropdown('appointment',$appointment,'','class="select-css" id="appointment" required');?>
                                        <span class="error_appointment"></span>
                                    </div>
                                    <div class="col-xs-12 col-lg-6 ">
                                        <?= form_dropdown('appointment-sub','','','class="select-css" id="appointmentsub" required');?><br>
                                    </div>
                                </div>
                                <div class="col-xs-12 ">                            
                                    <div class="col-xs-12 col-lg-4 ">
                                        <?php echo form_dropdown('appointment_m',$monthList,'','class="select-css" id="appointmentmonth" required') ?>
                                    </div>                                    
                                    <div class="col-xs-12 col-lg-4 ">
                                        <?php echo form_dropdown('appointment_d',$dayList,'','class="select-css" id="appointmentday"') ?>
                                    </div>                                    
                                    <div class="col-xs-12 col-lg-4 ">
                                        <?php echo form_dropdown('appointment_y',$yearListed,'','class="select-css" id="appointmentyear" required') ?>
                                    </div>                                                      
                                </div> 
                            </fieldset>
                            <fieldset>                            
                            <legend>Status</legend>
                                <div class="col-xs-12 ">
                                    <div class="col-xs-12 col-lg-6 ">                                    
                                        <?php echo form_dropdown('appointment_status',$appointment_status,'','class="select-css" id="appointment_status" required') ?>
                                    </div>
                                </div>   
                            </fieldset>

                        </div>                    
                        <br>
                        <div class="row clearfix">
                            <div class="col-xs-12  ">
                                <div class="col-xs-12 ">
                                    <div class="col-xs-6 col-lg-4 ">
                                        <input type="text" id="addpamb" value="Add to table" class="btn btn-primary">  
                                    </div>
                                </div> 
                            </div>
                        </div>                        
                            <div class="col-xs-12  ">
                                <div class="col-xs-12 ">
                                    <div class="col-xs-12 col-lg-12 ">
                                        <div class="table-responsive">
                                            <!-- <h3>List of PAMB Members</h3> -->
                                            <table id="tablePAMBmember" class="table table-hover table-bordered tglobal">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Organization/Offices</th>
                                                        <th>Position & Status</th>
                                                        <th>Date of Appointment</th>
                                                        <th><span class="glyphicon glyphicon-trash"></span></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbodypamb"></tbody>
                                            </table>
                                        </div>
                                        <div class="table-responsive">
                                            <table id="tablePAMBmember_sample" class="table table-hover table-bordered tglobal hide">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Organization/Offices</th>
                                                        <th>Position & Status</th>
                                                        <th>Date of Appointment</th>
                                                        <th><span class="glyphicon glyphicon-trash"></span></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbodypambs"></tbody>
                                            </table>
                                        </div>
                                    </div>  
                                </div>
                            </div>
                        </div> 
                        <div class="row clearfix row-box">
                            <h3>Upload File</h3>  
                            <div class="col-xs-12  ">
                                <div class="col-xs-12 ">
                                    <div class="col-xs-12 col-lg-12 "> 
                                        <div class="form-group">
                                            <label>Choose Files</label>
                                            <input type="file" name="pambFile" id="pambFile" multiple/>
                                            <input type="hidden" name="old_picture" value="nophoto.jpg">
                                        </div>
                                        <div class="form-group">
                                            <button type="button" name="fileSubmit" onclick="insertPambFile()" class="btn btn-info">Upload</button>
                                        </div> 
                                    </div>
                                    <div class="col-xs-12 col-lg-12 "> 
                                        <div class="table-responsive"><br>
                                            <table id="tablepambfileupload" class="table table-hover table-bordered tglobal">
                                                <thead>
                                                    <tr>
                                                        <th>File</th>
                                                        <th>Date Uploaded</th>                                                        
                                                        <th><span class="glyphicon glyphicon-trash"></span></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbodyPambFile"></tbody>
                                            </table>
                                        </div>  
                                    </div>                                    
                                </div> 
                            </div>
                        </div> 
                    </div>
                    <div class="tab-pane" id="6a">                        
                        <div class="row clearfix row-box">
                            <h3>Physical Features</h3> 
                            <div class="col-xs-12  ">
                                <fieldset>
                                    <legend>Elevation:</legend>
                                    <div class="col-xs-12">
                                        <div class="col-xs-12 col-lg-6 field inner-addon left-addon">
                                            <?= form_input('highestelev',$pamain->elevation_highest,'placeholder=" " id="highestelev" onkeyup="run(this)"').form_label('Highest','','for="highestelev"') ?>
                                        </div>
                                        <div class="col-xs-12 col-lg-6 field inner-addon left-addon">
                                            <?= form_input('lowestelev',$pamain->elevation_lowest,'placeholder=" " id="Lowest" onkeyup="run(this)"').form_label('Lowest','','for="Lowest"') ?>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend>Topography and Slope:</legend>
                                    <div class="col-xs-12 ">                                        
                                        <div class="col-xs-12 col-lg-5 ">
                                            <img width="250px" height="210px" id="imageTopo" src="<?php echo base_url("bmb_assets2/upload/topology_img/nophoto.jpg") ?>" alt="your image" /><br>
                                            <input type='file' name="img_topo" id="img_topo" onchange="readURLTopo(this);"  /><br>
                                            <input type="hidden" name="old_picture" value="nophoto.jpg"> 
                                            <span id="img_topospan" class="img_topospan"></span>
                                        </div>
                                        <div class="col-xs-12 col-lg-7 field inner-addon left-addon">
                                            <?= form_textarea('topo','','placeholder="Brief description" id="topodesc"').form_label(' ','','for="topodesc"') ?>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 ">
                                        <input type="button" id="addimagetopo" value="Add to table" class="btn btn-info">
                                    </div>
                                    <div class="col-xs-12 ">
                                        <div class="table-responsive"><br>
                                            <table id="tbltopology" class="table table-hover table-bordered tglobal">
                                                <thead>
                                                    <tr>
                                                        <th>Image</th>                                                        
                                                        <th>Description</th> 
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbodytopo"></tbody>
                                            </table>
                                        </div>
                                        <div class="table-responsive"><br>
                                            <table id="tbltopology_sample" class="table table-hover table-bordered tglobal hide">
                                                <thead>
                                                    <tr>
                                                        <th>Image</th>                                                        
                                                        <th>Description</th> 
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbodytopo_sample"></tbody>
                                            </table>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend>Geology and Soil:</legend>
                                    <div class="col-xs-12 ">
                                        <div class="col-xs-12 col-lg-5 ">
                                            <img width="250px" height="210px" id="imageSoil" src="<?php echo base_url("bmb_assets2/upload/soil_img/nophoto.jpg") ?>" alt="your image" /><br>
                                            <input type='file' name="img_soil" id="img_soil" onchange="readURLsoil(this);"  /><br>
                                            <input type="hidden" name="old_picture" value="nophoto.jpg"> 
                                            <span id="img_soilspan" class="img_soilspan hide"></span>
                                        </div>                                    
                                        <div class="col-xs-12 col-lg-7 field inner-addon left-addon">
                                            <?= form_textarea('soil_type','','placeholder="Brief description" id="soil_type"').form_label('Soil Type','','for="soil_type"') ?>
                                        </div> 
                                        <div class="col-xs-12 col-lg-7 field inner-addon left-addon">
                                            <?= form_textarea('rock','','placeholder="Brief description" id="rock"').form_label('Rock Formation','','for="rock"') ?>
                                        </div>  
                                    </div>                                                                           
                                    <div class="col-xs-12 ">
                                        <input type="button" id="addimagesoil" value="Add to table" class="btn btn-info">
                                    </div>
                                    <div class="col-xs-12 ">
                                        <div class="table-responsive"><br>
                                            <table id="tblsoil" class="table table-hover table-bordered tglobal">
                                                <thead>
                                                    <tr>
                                                        <th>Image</th>                                                       
                                                        <th>Description</th> 
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbodysoil"></tbody>
                                            </table>
                                        </div>
                                        <div class="table-responsive"><br>
                                            <table id="tblsoil_sample" class="table table-hover table-bordered tglobal hide">
                                                <thead>
                                                    <tr>
                                                        <th>Image</th>                                                       
                                                        <th>Description</th> 
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbodysoil_sample"></tbody>
                                            </table>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend>Hydrology/River system</legend>
                                    <div class="col-xs-12 ">
                                        <div class="col-xs-12 col-lg-12 field inner-addon left-addon">
                                        <?= form_textarea('hydro',$pamain->hydrology,'placeholder="Brief description"') ?>                                            
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend>Climate type</legend>
                                    <div class="col-xs-12 ">                                                                           
                                        <div class="col-xs-12 col-lg-5 ">
                                            <img width="250px" height="210px" id="imageclimate" src="<?php echo base_url("bmb_assets2/upload/climate_img/nophoto.jpg") ?>" alt="your image" /><br>
                                            <input type='file' name="img_climate" id="img_climate" onchange="readURLClimate(this);"  /><br>
                                            <input type="hidden" name="old_picture" value="nophoto.jpg"> 
                                            <span id="img_climatespan" class="img_climatespan hide"></span>
                                        </div>
                                        <div class="col-xs-12 col-lg-7 field inner-addon left-addon">
                                            <?= form_textarea('climate','','placeholder="Brief description" id="climate"') ?>
                                        </div> 
                                    </div>
                                    <div class="col-xs-12 ">
                                        <input type="button" id="addimageClimate" value="Add to table" class="btn btn-info">
                                    </div>
                                    <div class="col-xs-12 ">
                                        <div class="table-responsive"><br>
                                            <table id="tblclimate" class="table table-hover table-bordered tglobal">
                                                <thead>
                                                    <tr>
                                                        <th>Image</th>                                                        
                                                        <th>Description</th> 
                                                        <th><span class="glyphicon glyphicon-trash"></span></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbodyclimate"></tbody>
                                            </table>
                                            <table id="tblclimate_sample" class="table table-hover table-bordered tglobal hide">
                                                <thead>
                                                    <tr>
                                                        <th>Image</th>                                                        
                                                        <th>Description</th> 
                                                        <th><span class="glyphicon glyphicon-trash"></span></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbodyclimate_sample"></tbody>
                                            </table>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend>Existing Landuse</legend>
                                    <div class="col-xs-12 ">                                                                           
                                        <div class="col-xs-12 col-lg-12 field inner-addon left-addon">
                                            <?= form_textarea('existing_landuse',$pamain->existing_landuse,'placeholder="Brief description"') ?>
                                        </div>
                                    </div>
                                </fieldset>   
                                <fieldset>
                                    <legend>Vegetative cover</legend>
                                    <div class="col-xs-12 ">                                                                           
                                        <div class="col-xs-12 col-lg-12 field inner-addon left-addon">
                                            <?= form_textarea('vegetative',$pamain->vegetative,'placeholder="Brief description"') ?>
                                        </div>
                                    </div>
                                </fieldset>                               
                            </div>
                        </div>

                        <div class="row clearfix row-box">
                        <h3>Geohazard Features</h3>
                            <div class="col-xs-12  ">  
                            <fieldset>
                                <legend>Landslide Susceptibility</legend>
                                <div class="col-xs-12 "> 
                                    <div class="col-xs-12 col-lg-5 ">
                                        <img width="250px" height="210px" id="imagelandslide" src="<?php echo base_url("bmb_assets2/upload/landslide_img/nophoto.jpg") ?>" alt="your image" /><br>
                                        <input type='file' name="img_landslide" id="img_landslide" onchange="readURLLandslide(this);"  /><br>
                                        <input type="hidden" name="old_picture_landslide" value="nophoto.jpg"> 
                                        <span id="img_landslidespan" class="img_landslidespan hide"></span>

                                    </div>                                                             
                                    <div class="col-xs-12 col-lg-7 field inner-addon left-addon">
                                        <?= form_textarea('landslide','','placeholder="Landslide susceptibility description" id="landslide"') ?>
                                    </div>
                                </div>
                                <div class="col-xs-12 ">
                                        <input type="button" id="addimageLandslide" value="Add to table" class="btn btn-info">
                                    </div>
                                    <div class="col-xs-12 ">
                                        <div class="table-responsive"><br>
                                            <table id="tbllandslide" class="table table-hover table-bordered tglobal">
                                                <thead>
                                                    <tr>
                                                        <th>Image</th>                                                        
                                                        <th>Description</th> 
                                                        <th><span class="glyphicon glyphicon-trash"></span></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbodylandslide"></tbody>
                                            </table>
                                            <table id="tbllandslide_sample" class="table table-hover table-bordered tglobal hide">
                                                <thead>
                                                    <tr>
                                                        <th>Image</th>                                                        
                                                        <th>Description</th> 
                                                        <th><span class="glyphicon glyphicon-trash"></span></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbodylandslide_sample"></tbody>
                                            </table>
                                        </div>
                                    </div>
                            </fieldset>  
                            <fieldset>
                                <legend>Flooding Susceptibility</legend>
                                 <div class="col-xs-12 "> 
                                    <div class="col-xs-12 col-lg-5 ">
                                        <img width="250px" height="210px" id="imageflooding" src="<?php echo base_url("bmb_assets2/upload/flooding_img/nophoto.jpg") ?>" alt="your image" /><br>
                                        <input type='file' name="img_flooding" id="img_flooding" onchange="readURLFlooding(this);"  /><br>
                                        <input type="hidden" name="old_picture" value="nophoto.jpg"> 
                                        <span id="img_floodingspan" class="img_floodingspan hide"></span>

                                    </div>                                                             
                                    <div class="col-xs-12 col-lg-7 field inner-addon left-addon">
                                        <?= form_textarea('flooding','','placeholder="Flooding susceptibility description" id="flooding"') ?>
                                    </div>
                                </div>
                                <div class="col-xs-12 ">
                                        <input type="button" id="addimageFlooding" value="Add to table" class="btn btn-info">
                                    </div>
                                    <div class="col-xs-12 ">
                                        <div class="table-responsive"><br>
                                            <table id="tblflooding" class="table table-hover table-bordered tglobal">
                                                <thead>
                                                    <tr>
                                                        <th>Image</th>                                                        
                                                        <th>Description</th> 
                                                        <th><span class="glyphicon glyphicon-trash"></span></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbodyflooding"></tbody>
                                            </table>
                                            <table id="tblflooding_sample" class="table table-hover table-bordered tglobal hide">
                                                <thead>
                                                    <tr>
                                                        <th>Image</th>                                                        
                                                        <th>Description</th> 
                                                        <th><span class="glyphicon glyphicon-trash"></span></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbodyflooding_sample"></tbody>
                                            </table>
                                        </div>
                                    </div>
                            </fieldset>
                            <fieldset>
                                <legend>Sea Level Rise</legend>
                                 <div class="col-xs-12 "> 
                                    <div class="col-xs-12 col-lg-5 ">
                                        <img width="250px" height="210px" id="imagesea" src="<?php echo base_url("bmb_assets2/upload/sealevel_img/nophoto.jpg") ?>" alt="your image" /><br>
                                        <input type='file' name="img_sea" id="img_sea" onchange="readURLsea(this);"  /><br>
                                        <input type="hidden" name="old_picture" value="nophoto.jpg"> 
                                        <span id="img_sealevelspan" class="img_sealevelspan hide"></span>

                                    </div>                                                             
                                    <div class="col-xs-12 col-lg-7 field inner-addon left-addon">
                                        <?= form_textarea('sea','','placeholder="Sea level rise description" id="sea"') ?>
                                    </div>
                                </div>
                                <div class="col-xs-12 ">
                                        <input type="button" id="addimageSea" value="Add to table" class="btn btn-info" >
                                    </div>
                                    <div class="col-xs-12 ">
                                        <div class="table-responsive"><br>
                                            <table id="tblsea" class="table table-hover table-bordered tglobal">
                                                <thead>
                                                    <tr>
                                                        <th>Image</th>                                                        
                                                        <th>Description</th> 
                                                        <th><span class="glyphicon glyphicon-trash"></span></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbodysea"></tbody>
                                            </table>
                                            <table id="tblsea_sample" class="table table-hover table-bordered tglobal hide">
                                                <thead>
                                                    <tr>
                                                        <th>Image</th>                                                        
                                                        <th>Description</th> 
                                                        <th><span class="glyphicon glyphicon-trash"></span></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbodysea_sample"></tbody>
                                            </table>
                                        </div>
                                    </div>
                            </fieldset>
                            <fieldset>
                                <legend>Tsunami Susceptibility</legend>
                                 <div class="col-xs-12 "> 
                                    <div class="col-xs-12 col-lg-5 ">
                                        <img width="250px" height="210px" id="imagetsunami" src="<?php echo base_url("bmb_assets2/upload/tsunami_img/nophoto.jpg") ?>" alt="your image" /><br>
                                        <input type='file' name="img_tsunami" id="img_tsunami" onchange="readURLtsunami(this);"  /><br>
                                        <input type="hidden" name="old_picture" value="nophoto.jpg"> 
                                        <span id="img_tsunamispan" class="img_tsunamispan hide"></span>

                                    </div>                                                             
                                    <div class="col-xs-12 col-lg-7 field inner-addon left-addon">
                                        <?= form_textarea('tsunami','','placeholder="Tsunami description" id="tsunami"') ?>
                                    </div>
                                </div>
                                <div class="col-xs-12 ">
                                        <input type="button" id="addimageTsunami" value="Add to table" class="btn btn-info" >
                                    </div>
                                    <div class="col-xs-12 ">
                                        <div class="table-responsive"><br>
                                            <table id="tbltsunami" class="table table-hover table-bordered tglobal">
                                                <thead>
                                                    <tr>
                                                        <th>Image</th>                                                        
                                                        <th>Description</th> 
                                                        <th><span class="glyphicon glyphicon-trash"></span></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbodytsunami"></tbody>
                                            </table>
                                            <table id="tbltsunami_sample" class="table table-hover table-bordered tglobal hide">
                                                <thead>
                                                    <tr>
                                                        <th>Image</th>                                                        
                                                        <th>Description</th> 
                                                        <th><span class="glyphicon glyphicon-trash"></span></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbodytsunami_sample"></tbody>
                                            </table>
                                        </div>
                                    </div>
                            </fieldset>                                
                            </div>
                        </div>                        
                    </div>
                    <div class="tab-pane" id="7a">
                        <div class="row clearfix row-box"> 
                        <h3>Habitats and Ecosystem</h3>   
                            <div class="col-xs-12 col-lg-12">
                                <div class="col-xs-12 col-lg-6">
                                    <fieldset>
                                        <legend>Forest Formation</legend>
                                        <div class="col-xs-12 "> 
                                            <div class="col-xs-12 col-lg-12 field inner-addon left-addon">
                                                <?= form_textarea('forest_formation',$pamain->forest_formation,'placeholder="Brief description" id="forest_formation"').form_label('Description','','for="forest_formation"')?>
                                            </div>
                                            <div class="col-xs-12 col-lg-12 field inner-addon left-addon">
                                                <?php echo form_input('forest_formation_area',$pamain->forest_formation_area,'onkeyup="run(this)" id="forest_formation_area" placeholder=" "').form_label('Forest area(has)','','for="forest_formation_area"') ?>
                                            </div>
                                        </div>
                                    </fieldset>                                
                                </div>
                                <div class="col-xs-12 col-lg-6">                            
                                    <fieldset>
                                        <legend>Wetland</legend>
                                        <div class="col-xs-12 "> 
                                            <div class="col-xs-12 col-lg-12 field inner-addon left-addon">
                                                <?= form_textarea('wetland',$pamain->wetland,' placeholder="Brief description" id="wetland"').form_label('Description','','for="wetland"') ?>
                                            </div>
                                            <div class="col-xs-12 col-lg-12 field inner-addon left-addon">
                                                <?= form_input('wetland_area',$pamain->wetland_area,'onkeyup="run(this)" id="wetland_area" placeholder=" "').form_label('Wetland area (has)','','for="wetland_area"') ?>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="col-xs-12 col-lg-12">                        
                                <div class="col-xs-12 col-lg-6"> 
                                    <fieldset>
                                        <legend>Inland</legend>
                                        <div class="col-xs-12"> 
                                            <div class="col-xs-12 col-lg-12 field inner-addon left-addon">
                                                <?= form_textarea('inland',$pamain->inland,'placeholder="Brief description" id="inland"').form_label('Description','','for="inland"') ?>
                                            </div>
                                            <div class="col-xs-12 col-lg-12 field inner-addon left-addon">
                                                <?= form_input('inland_area',$pamain->inland_area,'placeholder=" " onkeyup="run(this)" id="inland_area"').form_label('Inland area (has)','','for="inland_area"') ?>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-xs-12 col-lg-6"> 
                                    <fieldset>
                                        <legend>Caves</legend>
                                        <div class="col-xs-12"> 
                                            <div class="col-xs-12 col-lg-12 field inner-addon left-addon">
                                                <?= form_textarea('caves',$pamain->caves,'placeholder="Brief description" id="caves"').form_label('Description','','for="caves"') ?>
                                            </div>
                                            <div class="col-xs-12 col-lg-12 field inner-addon left-addon">                                        
                                                <?= form_input('caves_area',$pamain->caves_area,'placeholder=" " onkeyup="run(this)" id="caves_area"').form_label('Caves area (has)','','for="caves_area"') ?>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="col-xs-12 col-lg-12">                        
                                <div class="col-xs-12 col-lg-12"> 
                                    <fieldset>
                                    <legend>Marine</legend>
                                    <div class="col-xs-12 col-lg-6"> 
                                        <div class="col-xs-12 col-lg-12 field inner-addon left-addon">
                                            <?= form_textarea('marine_coral',$pamain->marine_coral,'placeholder="Brief description" id="marine_coral"').form_label('Coral Reefs','','for="marine_coral"') ?>
                                        </div>
                                        <div class="col-xs-12 col-lg-12 field inner-addon left-addon">                                         
                                            <?= form_input('marine_coral_area',$pamain->marine_coral_area,'placeholder=" " onkeyup="run(this)" id="marine_coral_area"').form_label('Coral reefs area (has)','','for="marine_coral_area"') ?>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-lg-6"> 
                                        <div class="col-xs-12 col-lg-12 field inner-addon left-addon">
                                            <?= form_textarea('marine_sea_grasses',$pamain->marine_sea_grasses,'placeholder="Brief description" id="marine_sea_grasses"').form_label('Sea Grasses','','for="marine_sea_grasses"') ?>
                                        </div>
                                        <div class="col-xs-12 col-lg-12 field inner-addon left-addon">                                        
                                            <?= form_input('marine_sea_grasses_area',$pamain->marine_sea_grasses_area,'placeholder=" " onkeyup="run(this)" id="marine_sea_grasses_area"').form_label('Sea Grasses area (has)','','for="marine_sea_grasses_area"') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-lg-12">                                     
                                    <div class="col-xs-12 col-lg-6"> 
                                        <div class="col-xs-12 col-lg-12 field inner-addon left-addon">
                                            <?= form_textarea('marine_mangrove',$pamain->marine_mangrove,'placeholder="Brief description" id="marine_mangrove"').form_label('Mangrove','','for="marine_mangrove"') ?>
                                        </div>
                                        <div class="col-xs-12 col-lg-12 field inner-addon left-addon">                                        
                                            <?= form_input('marine_mangrove_area',$pamain->marine_mangrove_area,'placeholder=" " onkeyup="run(this)" id="marine_mangrove_area"').form_label('Mangrove area (has)','','for="marine_mangrove_area"') ?>
                                        </div>
                                    </div>
                                </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="tab-pane" id="8a">                        
                        <div class="row clearfix row-box">
                        <h3>Socio-cultural Features</h3> 
                            <div class="col-xs-12  ">
                                <div class="col-xs-12 ">
                                    <div class="col-xs-12 col-lg-6 field inner-addon left-addon">
                                        <?= form_textarea('demography',$pamain->demography,'placeholder="Brief description" id="demography"').form_label('Demography','','for="demography"') ?>
                                    </div>
                                    <div class="col-xs-12 col-lg-6 field inner-addon left-addon">
                                        <?= form_textarea('ethinicity',$pamain->ethinicity,'placeholder="Brief description" id="ethinicity"').form_label('Ethnicity','','for="ethinicity"') ?>
                                    </div>                                    
                                </div>                                
                                <div class="col-xs-12 ">                                
                                    <div class="col-xs-12 col-lg-6 field inner-addon left-addon">
                                        <?= form_textarea('livelihood',$pamain->livelihood,'placeholder="Brief description" id="livelihood"').form_label('Livelihood/Enterprise','','for="livelihood"') ?>
                                    </div>
                                    <div class="col-xs-12 col-lg-6 field inner-addon left-addon">               
                                        <?= form_textarea('socialservice',$pamain->social_service,'placeholder="Brief description" id="socialservice"').form_label('Basic Social Service','','for="socialservice"') ?>
                                    </div>
                                </div>                            
                                <div class="col-xs-12 ">
                                    <div class="col-xs-12 col-lg-6 field inner-addon left-addon">
                                        <?= form_textarea('culturalresource',$pamain->cultural_resource,'placeholder="Brief description" id="culturalresource"').form_label('Cultural Resources','','for="culturalresource"')  ?>
                                    </div>
                                    <div class="col-xs-12 col-lg-6 field inner-addon left-addon">
                                        <?= form_textarea('belief',$pamain->belief,'placeholder="Brief description" id="belief"').form_label('Customs and Beliefs','','for="belief"')  ?>
                                    </div>
                                    <div class="col-xs-12 col-lg-6 field inner-addon left-addon">
                                        <?= form_textarea('archeology',$pamain->archeology,'placeholder="Brief description" id="archeology"').form_label('Archeology','','for="archeology"')  ?>
                                    </div>
                                    <div class="col-xs-12 col-lg-6 field inner-addon left-addon">
                                        <?= form_textarea('tenured_migrant',$pamain->tenured_migrant,'placeholder="Brief description" id="tenured_migrant"').form_label('Tenured Migrants','','for="tenured_migrant"')  ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix row-box">
                        <h3>Economic Profile</h3> 
                            <div class="col-xs-12">
                                <div class="col-xs-12 ">
                                    <div class="col-xs-12 col-lg-12 field inner-addon left-addon">
                                        <?= form_textarea('economic_profile',$pamain->economic_profile,'placeholder="Input text" id="economic_profile"').form_label('Brief description','','   for="economic_profile"');?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix row-box">
                        <h3>Institutional Profile</h3> 
                            <div class="col-xs-12">
                                <div class="col-xs-12 ">
                                    <div class="col-xs-12 col-lg-12 field inner-addon left-addon">
                                        <?= form_textarea('institutional_profile',$pamain->institutional_profile,'placeholder="Input text" id="institutional_profile"').form_label('Brief description','', 'for="institutional_profile"');?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix row-box">
                        <h3>Uses of the Area</h3>
                            <div class="col-xs-12  ">
                                <div class="col-xs-12 ">
                                    <div class="col-xs-12 col-lg-6 field inner-addon left-addon">
                                        <?= form_textarea('tourism',$pamain->tourism,'placeholder="Brief description" id="tourism"').form_label('Tourism Purposes','','for="tourism"');?>
                                    </div>
                                    <div class="col-xs-12 col-lg-6 field inner-addon left-addon">
                                        <?= form_textarea('facility',$pamain->facilities,'placeholder="Brief description" id="facility"').form_label('Facility Purposes','','for="facility"');?>
                                    </div>
                                    <div class="col-xs-12 col-lg-6 field inner-addon left-addon">
                                        <?= form_textarea('research',$pamain->science_research,'placeholder="Brief description" id="research"').form_label('Science and Research Purposes','','for="research"');?>
                                    </div>
                                    <div class="col-xs-12 col-lg-6 field inner-addon left-addon">
                                        <?= form_textarea('educational',$pamain->educational,'placeholder="Brief description" id="educational"').form_label('Educational Purposes','','for="educational"');?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix row-box">
                        <h3>Occupants</h3>
                            <div class="col-xs-12">
                                <div class="col-xs-6 "> 
                                    <fieldset>
                                    <legend>Total number of</legend>
                                            <div class="col-xs-12 col-lg-4 field inner-addon left-addon">
                                                <?= form_input('occupants_male',$pamain->no_occupant_male,'id="occupants_male" onchange="calc_occupant()" onkeyup=run(this) placeholder=" "').form_label('Male','','for="occupants_male"');?>
                                            </div> 
                                            <div class="col-xs-12 col-lg-4 field inner-addon left-addon">
                                                <?= form_input('occupants_female',$pamain->no_occupant_female,'id="occupants_female" onchange="calc_occupant()" onkeyup=run(this) placeholder=" "').form_label('Female','','for="occupants_female"');?>
                                            </div>
                                            <div class="col-xs-12 col-lg-4 field inner-addon left-addon">
                                                <?= form_input('occupants',$pamain->no_occupants,'id="occupants" placeholder=" " readonly="readonly"').form_label('Occupants','','for="occupants"');?>
                                            </div>  
                                    </fieldset>
                                </div>
                                <div class="col-xs-6 ">
                                    <fieldset>
                                        <legend>Total number of</legend>
                                            <div class="col-xs-12 col-lg-12 field inner-addon left-addon">
                                                <?= form_input('migrant',$pamain->no_tenured_migrant,'placeholder=" " id="migrant" onkeyup=run(this)').form_label('Tenured Migrant','','for="migrant"');?>
                                            </div>
                                    </fieldset>
                                </div>
                                <div class="col-xs-12 ">
                                <fieldset>
                                    <legend>Indigenous Cultural Community/Indigenous People</legend>
                                        <div class="col-xs-12 col-lg-3 ">
                                            <?= form_label('ICCs/IPs Community','','style="margin:20px"') ?>
                                        </div>
                                        <div class="col-xs-12 col-lg-3 field inner-addon left-addon">
                                            <?= form_dropdown('iccsips',$tribelist,'','class="select-css" id="iccsips" style="margin-top:20px;"') ?>
                                        </div>
                                    <!-- </div> -->
                                    <!-- <div class="col-xs-12 "> -->
                                       
                                        <div class="col-xs-12 col-lg-3 field inner-addon left-addon">
                                            <?= form_input('iccip_male','','placeholder=" " id="iccip_male" onkeyup=run(this)').form_label('Male','','for="iccip_male"');?>
                                        </div>                                    
                                       
                                        <div class="col-xs-12 col-lg-3 field inner-addon left-addon">
                                            <?= form_input('iccip_female','','placeholder=" " id="iccip_female" onkeyup=run(this)').form_label('Female','','for="iccip_female"');?>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 ">
                                        <button type="button" name="saveips" id="saveips" class="btn btn-info">Add to table</button>
                                    </div>
                                    <div class="col-xs-12 ">
                                        <div class="table-responsive" id="load_datatable"><br>
                                            <table id="tblip" class="table table-hover table-bordered tglobal">
                                                <thead>
                                                    <tr>
                                                        <th>ICCs/IPs</th>
                                                        <th>No. of Male</th>
                                                        <th>No. of Female</th>
                                                        <th><span class="glyphicon glyphicon-trash"></span></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbodyiccip"></tbody>
                                            </table>
                                            <table id="tblip_sample" class="table table-hover table-bordered tglobal hide">
                                                <thead>
                                                    <tr>
                                                        <th>ICCs/IPs</th>
                                                        <th>No. of Male</th>
                                                        <th>No. of Female</th>
                                                        <th><span class="glyphicon glyphicon-trash"></span></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbodyiccip_sample"></tbody>
                                            </table>
                                        </div>
                                    </div>
                                </fieldset>                                
                            </div>
                        </div>
                        <hr>
                        <div class="row clearfix row-box">
                        <p>Supporting Documents</p>
                            <div class="col-xs-12">
                                <div class="col-xs-12">
                                    <div class="col-xs-12 col-lg-12 ">
                                        <p>Upload Socio-Economic Assessment and Monitoring System (SEAMS) form in <span style="color:red">PDF format</span>.</p>
                                        <ul>
                                            <li>Form 3 : Summary per Municipality</li>
                                            <li>Form 5 : Official List of Tenured Migrants</li>
                                            <li>Form 6 : Questionnaire Form for Indigenous People (IP)</li>
                                        </ul>     
                                        <hr>                            
                                    </div>
                                </div>
                                <div class="col-xs-12 ">                                    
                                    <div class="col-xs-12 col-lg-6 field inner-addon left-addon">
                                        <?= form_input('econdesc','','placeholder=" " id="econdesc"').form_label('Filename','','for="econdesc"') ?>
                                    </div>                                                              
                                    <div class="col-xs-12 col-lg-6 ">
                                        <input type='file' name="economicfile" id="economicfile" style="margin:20px;" /><br>
                                        <input type="hidden" name="old_picture" value="nophoto.jpg"> 
                                    </div>
                                </div>                                
                                <div class="col-xs-12 ">                                
                                    <div class="col-xs-12 col-lg-6 ">
                                        <input type="button" id="addimage" value="Add to table" class="btn btn-info" onclick="inserteconprof()">
                                    </div>
                                </div>
                                <div class="col-xs-12 ">
                                        <div class="table-responsive"><br>
                                            <table id="tblecon" class="table table-hover table-bordered tglobal">
                                                <thead>
                                                    <tr>
                                                        <th>PDF</th>                                                        
                                                        <th>Filename</th> 
                                                        <th><span class="glyphicon glyphicon-trash"></span></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbodyeconprof"></tbody>
                                            </table>
                                        </div>
                                    </div>
                            </div>
                        </div>                         
                    </div>
                    <div class="tab-pane" id="9a">
                        <div class="row clearfix row-box">
                        <h3>Management Zone</h3> 
                            <div class="col-xs-12  ">
                                <div class="col-xs-6 ">
                                    <fieldset>
                                        <legend>Strict Protection Zone</legend>
                                        <div class="col-xs-12 col-lg-12 field inner-addon left-addon">
                                            <?= form_textarea('strictzone','','placeholder="Input text" id="strictzone"').form_label('Brief description','','for="strictzone"');?>
                                        </div>
                                        <div class="col-xs-12 col-lg-12 field inner-addon left-addon">
                                            <?= form_input('stricthas','','placeholder=" " id="stricthas" onkeyup=run(this)').form_label('Area(has)','','for="stricthas"');?>
                                        </div>
                                        <br>
                                            <input type="text" id="add_strict" value="Add to table" class="btn btn-primary">
                                        <hr>
                                        <div class="table-responsive">
                                            <table id="table_strict" class="table table-bordered table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Strict Protection zone</th> 
                                                        <th class="hide">Code</th>
                                                        <th>Area (has)</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbodystrict">                                                                
                                                </tbody>
                                            </table>
                                        </div>  
                                        <div class="table-responsive">
                                            <table id="table_strict_sample" class="table table-bordered table-bordered hide">
                                                <thead>
                                                    <tr>
                                                        <th>Strict Protection zone</th> 
                                                        <th class="hide">Code</th>
                                                        <th>Area (has)</th>                                                        
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbodystrict">                                                                
                                                </tbody>
                                            </table>
                                        </div> 
                                    </fieldset>
                                </div>
                                <div class="col-xs-6 ">
                                    <fieldset>
                                        <legend>Multiple Used Zone</legend>
                                        <div class="col-xs-12 col-lg-12 field inner-addon left-addon">
                                            <?= form_input('multiplehas','','placeholder=" " id="multiplehas" onkeyup=run(this)').form_label('Area(has)','','for="multiplehas"');?>
                                        </div>
                                        <div class="col-xs-12 col-lg-12 field inner-addon left-addon">
                                            <?= form_textarea('multiplezone','','placeholder="Input text" id="multiplezone"').form_label('Brief description','','for="multiplezone"');?>
                                        </div>                                        
                                        <br>
                                            <input type="text" id="add_multiple" value="Add to table" class="btn btn-primary"> 
                                        <hr>
                                        <div class="table-responsive">
                                            <table id="table_multiple" class="table table-bordered table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Multiple used zone</th> 
                                                        <th class="hide">Code</th>
                                                        <th>Area (has)</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbodymultiple">                                                              
                                                </tbody>
                                            </table>
                                        </div>  
                                        <div class="table-responsive">
                                            <table id="table_multiple_sample" class="table table-bordered table-bordered hide">
                                                <thead>
                                                    <tr>
                                                        <th>Multiple used zone</th> 
                                                        <th class="hide">Code</th>
                                                        <th>Area (has)</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbodymultiple">                                                              
                                                </tbody>
                                            </table>
                                        </div> 
                                    </fieldset>
                                </div>                                   
                            </div>
                        </div>                        
                    </div>
                    <div class="tab-pane" id="10a">
                        <div class="row clearfix row-box">
                        <h3>Ecotourism</h3> 
                            <fieldset>
                            <legend>Attraction</legend>
                                <div class=" col-xs-12">
                                    <div class="col-xs-12 col-lg-5 ">
                                        <img width="200px" height="180px" id="blahsattr" class="blahsattr" src="<?php echo base_url("bmb_assets2/upload/attraction_img/nophoto.jpg") ?>" alt="your image" class="upload-btn-wrapper" />
                                        <br>
                                        <input type='file' name="pic_attr" id="pic_attr" onchange="readURLattrib(this);"  /><br>
                                        <input type="hidden" name="old_picture" value="nophoto.jpg">
                                        <span id="img_attractspan" class="img_attractspan hide"></span>
                                    </div>
                                    <div class="col-xs-12 col-lg-7 ">
                                        <div class="col-xs-12 col-lg-12 field inner-addon left-addon">
                                            <?= form_input('attraction','','placeholder=" " id="attraction"').form_label('Attraction title','','for="attraction"') ?>
                                        </div>
                                        <div class="col-xs-12 col-lg-12 field inner-addon left-addon">
                                            <?= form_textarea('description2','','placeholder="Input text" id="description2"').form_label('Brief description','','for="description2"');?>
                                        </div>
                                    <input type="button" id="addimageattract" value="Add to table" class="btn btn-info">

                                    </div>
                                </div>
                                <div class="col-xs-12 ">                                
                                    <div class="col-xs-12 col-lg-12 ">
                                        <div class="table-responsive"><br>
                                            <table id="tableAttraction" class="table table-hover table-bordered tglobal">
                                                <thead>
                                                    <tr>
                                                        <th>Image</th>
                                                        <th>Description</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbodyimageattraction"></tbody>
                                            </table>
                                        </div>  
                                        <div class="table-responsive"><br>
                                            <table id="tableAttraction_sample" class="table table-hover table-bordered tglobal hide">
                                                <thead>
                                                    <tr>
                                                        <th>Image</th>
                                                        <th>Description</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbodyimageattraction"></tbody>
                                            </table><hr>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <legend>Facilities</legend>
                                <div class="col-xs-12  ">
                                    <div class="col-xs-12 col-lg-5 ">
                                        <img width="200px" height="180px" id="blahsfacility" src="<?php echo base_url("bmb_assets2/upload/facilities_img/nophoto.jpg") ?>" alt="your image" /><br>
                                        <input type='file' name="pic_facilities" id="pic_facilities" onchange="readURLfacility(this);"  /><br>
                                        <input type="hidden" name="old_picture" value="nophoto.jpg"> 
                                        <span id="img_facilityspan" class="img_facilityspan hide"></span>

                                    </div>
                                    <div class="col-xs-12 col-lg-7 ">   
                                        <div class="col-xs-12 col-lg-12 field inner-addon left-addon">                                       
                                        <?=  form_input('facilities','','placeholder=" " id="facilities"').form_label('Facilities Title','','for="facilities"')?>
                                        </div>
                                        <div class="col-xs-12 col-lg-12 field inner-addon left-addon">
                                        <?= form_textarea('description3','','placeholder=" " id="description3"').form_label('Facilities Description','','for="description3"') ?> <br>       
                                        </div>
                                    <input type="button" id="addimageafacility" value="Add to table" class="btn btn-info">                                        
                                    </div>
                                </div>
                                <div class="col-xs-12 ">                                
                                    <div class="table-responsive"><br>
                                        <table id="tableFacilities" class="table table-hover table-bordered tglobal">
                                            <thead>
                                                <tr>
                                                    <th>Image</th>
                                                    <th>Descriptions</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbodyimagefacilities"></tbody>
                                        </table>
                                        <table id="tableFacilities_sample" class="table table-hover table-bordered tglobal hide">
                                            <thead>
                                                <tr>
                                                    <th>Image</th>
                                                    <th>Descriptions</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbodyimagefacilities_sample"></tbody>
                                        </table>
                                    </div>  
                                </div>
                            </fieldset>
                            <fieldset>
                                <legend>Activity</legend>
                                <div class="col-xs-12 ">
                                    <div class="col-xs-12 col-lg-5 ">
                                        <img width="200px" height="180px" id="blahactivity" src="<?php echo base_url("bmb_assets2/upload/ecotourism_img/nophoto.jpg") ?>" alt="your image" /><br>
                                        <input type='file' name="pic_activity" id="pic_activity" onchange="readURLs(this);"  /><br>
                                        <input type="hidden" name="old_picture" value="nophoto.jpg">                                    
                                        <span id="img_activityspan" class="img_activityspan hide"></span>
                                    </div>                                
                                    <div class="col-xs-12 col-lg-7 ">   
                                            <div class="col-xs-12 col-lg-12 field inner-addon left-addon">                                       
                                            <?=  form_input('activity_title','','placeholder=" " id="activity_title"').form_label('Activity Title','','for="activity_title"')?>
                                            </div>
                                            <div class="col-xs-12 col-lg-12 field inner-addon left-addon">
                                            <?= form_textarea('description_activity','','placeholder=" " id="description_activity"').form_label('Activity Description','','for="description_activity"') ?> <br>       
                                            </div>
                                        <input type="button" id="addimageaactivity" value="Add to table" class="btn btn-info">                                        
                                    </div>
                                </div>
                                <div class="col-xs-12 ">   
                                    <div class="table-responsive"><br>
                                        <table id="tableActivity" class="table table-hover table-bordered tglobal">
                                            <thead>
                                                <tr>
                                                    <th>Image</th>
                                                    <th>Descriptions</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbodyimageactivity"></tbody>
                                        </table>
                                         <table id="tableActivity_sample" class="table table-hover table-bordered tglobal hide">
                                            <thead>
                                                <tr>
                                                    <th>Image</th>
                                                    <th>Descriptions</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbodyimageactivity_sample"></tbody>
                                        </table>
                                    </div>                             
                                </div>
                            </fieldset>
                        </div>                             
                    </div>
                    <div class="tab-pane" id="11a">
                        <div class="row clearfix row-box">
                        <h3>Project Established</h3> 
                            <div class="col-xs-12  ">
                                <div class="col-xs-12 col-lg-12 ">    
                                    <div class="col-xs-12 ">
                                        <div class="col-xs-12 col-lg-3 ">
                                            <label style="margin:8px 0 0 0;">Tenurial Instrument</label>
                                        </div>
                                        <div class="col-xs-12 col-lg-9 ">
                                            <select id="type" class="form-control border-input select-css" name="type_processing" >
                                                <!-- <option value="" disabled default selected style="display:none;"></option> -->
                                                <option value="" disabled default selected>Select Tenurial Instrument</option>                                                
                                                <option value="sapa">Special Use Agreement in Protected Areas (SAPA)</option>
                                                <option value="moa">Memorandum of Agreement (MOA)</option>
                                                <option value="pacbrma">Protected Area Community Based Resources Agreement (PACBRMA)</option>
                                            </select>  
                                        </div>
                                    </div> <hr> 
                                    <div id="others">
                                        <div class="col-xs-12">                                        
                                        </div>
                                        <div class="col-xs-12">                                           
                                            <div class="col-xs-12 col-lg-12 field">
                                               <?= form_input('projectname','','placeholder=" " id="projectname"').form_label('Name of proponent','','for="projectname"');?>
                                            </div> 
                                        </div>
                                    </div>                                    
                                    <div id="sapa">
                                        <div class="col-xs-12 col-lg-12 field">
                                            <?= form_input('sapa_no','','placeholder=" " id="sapa_no"').form_label('SAPA No.','','for="sapa_no"');?>                                               
                                        </div>                                                
                                    </div>
                                    <div id="moa" class="">  
                                        <div class="col-xs-12 ">
                                            <div class="col-xs-12 col-lg-12 field">
                                                <?= form_input('second_party','','placeholder=" " id="second_party"').form_label('Second Party','','for="second_party"');?>
                                            </div>                                  
                                        </div>                                     
                                        <div class="col-xs-12">
                                            <div class="col-xs-12 col-lg-6 field"><br>
                                                <fieldset>
                                                    <legend>Date of Signing</legend>
                                                    <div class="col-xs-6 col-lg-4 field">
                                                        <?= form_dropdown('moa_month',$monthListed,'','class="select-css" id="moa_month"').form_label(' ','','for="moa_month"');?>
                                                    </div>
                                                     <div class="col-xs-6 col-lg-4 field">
                                                        <?= form_dropdown('moa_day',$dayList,'','class="select-css" id="moa_day"').form_label(' ','','for="moa_day"');?>
                                                    </div>
                                                     <div class="col-xs-6 col-lg-4 field">
                                                        <?= form_dropdown('moa_year',$yearListed,'','class="select-css" id="moa_year"').form_label(' ','','for="moa_year"');?>
                                                    </div>
                                                </fieldset>
                                            </div>                                            
                                            <div class="col-xs-12 col-lg-6 field">
                                                <fieldset>
                                                    <legend>Date of Expiration</legend>
                                                    <div class="col-xs-6 col-lg-4 field">
                                                        <?= form_dropdown('moa_exp_month',$monthListed,'','class="select-css" id="moa_exp_month"').form_label(' ','','for="moa_exp_month"');?>
                                                    </div>
                                                     <div class="col-xs-6 col-lg-4 field">
                                                        <?= form_dropdown('moa_exp_day',$dayList,'','class="select-css" id="moa_exp_day"').form_label(' ','','for="moa_exp_day"');?>
                                                    </div>
                                                     <div class="col-xs-6 col-lg-4 field">
                                                        <?= form_dropdown('moa_exp_year',$yearListed,'','class="select-css" id="moa_exp_year"').form_label(' ','','for="moa_exp_year"');?>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>                                        
                                    </div>
                                    <!-- END OF MOA -->
                                    <div id="pacbrma" class="">   
                                        <div class="col-xs-12">
                                            <div class="col-xs-12 col-lg-12 field">
                                                <?= form_input('pacbrma_no','','placeholder=" " id="pacbrma_no"').form_label('PACBRMA No.','','for="pacbrma_no"');?>
                                            </div> 
                                        </div> 
                                        <div class="col-xs-12">
                                            <div class="col-xs-12 col-lg-12 field">
                                                <?= form_input('po','','placeholder="Name of PO" id="po"').form_label('People Organization','','for="po"');?>
                                            </div> 
                                        </div>                                                                         
                                    </div>
                                    <div id="others_">   
                                        <div class="col-xs-12 ">                                        
                                            <div class="col-xs-12 col-lg-6 field">
                                                <?= form_input('nature_development','','placeholder=" " id="nature_development" style="margin-top:15px"').form_label('Nature of Development','','for="nature_development"');?>
                                            </div>
                                            <legend>Duration</legend>  
                                            <div class="col-xs-6 col-lg-3 field">
                                                <?= form_dropdown('yearstart',$yearListed,'','class="select-css" id="yearstart"').form_label(' ','','for="yearstart"');?>
                                            </div>
                                             <div class="col-xs-6 col-lg-3 field">
                                                <?= form_dropdown('yearend',$yearListed,'','class="select-css" id="yearend"').form_label(' ','','for="yearend"');?>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 ">                                                                      
                                            <div class="col-xs-6 col-lg-6 field">
                                                <?= form_input('proj_location','','placeholder="Complete Address" id="proj_location"').form_label('Project Location','','for="proj_location"');?>
                                            </div> 
                                            <div class="col-xs-6 col-lg-3 field">
                                                <?= form_input('proj_area','','placeholder="Hectares" onkeyup="run(this)"  id="proj_area"').form_label('Area (has)','','for="proj_area"');?>
                                            </div> 
                                            <div class="col-xs-6 col-lg-3 field">
                                                <?= form_input('amount_fund','','placeholder="Amount" onkeyup="run(this)"  id="amount_fund"').form_label('Project Cost','','for="amount_fund"');?>
                                            </div>
                                        </div>                                                                                                          
                                        <div class="col-xs-12 ">
                                            <div class="col-xs-12 col-lg-12 field inner-addon left-addon">
                                                <?= form_textarea('remarks','','placeholder="Brief description" id="remarks" style="height:100px"').form_label('Remarks','','for="remarks"');?>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 ">
                                            <div class="col-xs-12 col-lg-12 ">                                                
                                                    <button type="button" name="addproject" id="addproject" class="btn btn-info">Add to table</button>  
                                                </div> 
                                        </div><br>
                                    </div>
                                    <div class="col-xs-12 col-lg-12 ">
                                        <div class="table-responsive"><br><hr>
                                            <table id="tablePAProject" class="table table-hover table-bordered tglobal">
                                                <thead>
                                                    <tr>
                                                        <th>Project Name</th>
                                                        <th>Year(Start-End)</th>
                                                        <th>Project cost</th>
                                                        <th>Issuance</th>
                                                        <!-- <th>Implementor</th> -->
                                                        <!-- <th>Remarks</th> -->
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbodyproject"></tbody>                               
                                            </table>
                                        </div>  
                                         <div class="table-responsive">
                                            <table id="tablePAProject_sample" class="table table-hover table-bordered tglobal hide">
                                                <thead>
                                                    <tr>
                                                        <th>Project Name</th>
                                                        <th>Year(Start-End)</th>
                                                        <th>Source of Fund</th>
                                                        <th>Issuance</th>
                                                        <!-- <th>Implementor</th> -->
                                                        <!-- <th>Remarks</th> -->
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbodyprojects"></tbody>                              
                                            </table><hr>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <div class="row clearfix row-box">
                        <h3>Programs</h3> 
                            <div class="col-xs-12">
                                <div class="col-xs-12 ">
                                    <div class="col-xs-12 col-lg-12 field">
                                        <?= form_input('program_name','','placeholder=" " id="program_name"').form_label('Program name','','for="program_name"');?>
                                    </div>                                   
                                </div>
                                <div class="col-xs-12 ">
                                    <div class="col-xs-12 col-lg-12 field">
                                        <?= form_input('program_proponent','','placeholder=" " id="program_proponent"').form_label('Proponent','','for="program_proponent"');?>
                                    </div>
                                </div>
                                <div class="col-xs-12 ">
                                    <div class="col-xs-6">
                                        <fieldset>
                                            <legend>Duration From</legend>
                                            <div class="col-xs-12">
                                                <div class="col-xs-12 col-lg-12">  
                                                    <div class="col-xs-6 col-lg-6 field">
                                                        <?= form_dropdown('start_implementation_month',$monthListed,'','class="select-css" id="start_implementation_month"').form_label(' ','','for="start_implementation_month"');?>
                                                    </div>
                                                     <div class="col-xs-6 col-lg-6 field">
                                                        <?= form_dropdown('start_implementation_year',$yearListed,'','class="select-css" id="start_implementation_year"').form_label(' ','','for="start_implementation_year"');?>
                                                    </div>
                                                </div>                                            
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-xs-6">
                                        <fieldset>
                                            <legend>To</legend>
                                            <div class="col-xs-12">
                                                <div class="col-xs-12 col-lg-12">  
                                                    <div class="col-xs-6 col-lg-6 field">
                                                        <?= form_dropdown('end_implementation_month',$monthListed,'','class="select-css" id="end_implementation_month"').form_label(' ','','for="end_implementation_month"');?>
                                                    </div>
                                                     <div class="col-xs-6 col-lg-6 field">
                                                        <?= form_dropdown('end_implementation_year',$yearListed,'','class="select-css" id="end_implementation_year"').form_label(' ','','for="end_implementation_year"');?>
                                                    </div>
                                                </div>                                            
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <legend>Source of Fund</legend>  
                                    <div class="col-xs-6 col-lg-6 field">
                                        <select id="source_fund" class="form-control border-input" name="source_fund" style="margin-top: 15px;" >
                                            <option value="" disabled default selected>Select source of fund</option>                                                
                                            <option value="1">Foreign Assisted</option>
                                            <option value="2">Government Fund</option>
                                            <option value="3">Both: Foreign Assisted and Government Fund</option>    
                                        </select>
                                    </div>
                                    <div class="col-xs-12 col-lg-6 field">
                                        <?= form_input('program_cost','','placeholder="Amount" onkeyup="run(this)"  id="program_cost"').form_label('Program Cost','','for="program_cost"');?>
                                    </div>
                                </div>                                
                               
                                <div class="col-xs-12 ">                                    
                                    <div class="col-xs-12 col-lg-6 field">
                                        <?= form_input('program_location','','placeholder=" " id="program_location"').form_label('Location','','for="program_location"');?>
                                    </div>
                                    <div class="col-xs-12 col-lg-6 field">
                                        <?= form_input('program_area','','placeholder="Hectares" onkeyup="run(this)"  id="program_area"').form_label('Area(has)','','for="program_area"');?>
                                    </div>
                                </div> 
                                <div class="col-xs-12 ">
                                    <div class="col-xs-12 col-lg-12 field inner-addon left-addon">
                                        <?= form_textarea('program_remarks','','placeholder="Brief description" id="program_remarks" style="height:100px"').form_label('Remarks','','for="program_remarks"');?>
                                    </div>
                                </div>                                
                                <div class="col-xs-12 ">
                                    <div class="col-xs-12 col-lg-12 ">                                                
                                            <button type="button" name="addprograms" id="addprograms" class="btn btn-info">Add to table</button>  
                                        </div> 
                                </div><br>  
                                <div class="col-xs-12 col-lg-12 ">
                                    <div class="table-responsive"><br><hr>
                                        <table id="tablePAProgram" class="table table-hover table-bordered tglobal">
                                            <thead>
                                                <tr>
                                                    <th>Program Name</th>
                                                    <th>Proponent</th>
                                                    <th>Year(Start-End)</th>
                                                    <th>Source of Fund</th>
                                                    <th>Area(has)</th>
                                                    <th>Location</th>
                                                    <!-- <th>Remarks</th> -->
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbodyprogram"></tbody>                               
                                        </table>
                                    </div>  
                                     <div class="table-responsive">
                                        <table id="tablePAProgram_sample" class="table table-hover table-bordered tglobal hide">
                                            <thead>
                                                <tr>
                                                    <th>Program Name</th>
                                                    <th>Proponent</th>
                                                    <th>Year(Start-End)</th>
                                                    <th>Source of Fund</th>
                                                    <th>Area(has)</th>
                                                    <th>Location</th>
                                                    <!-- <th>Remarks</th> -->
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbodyprograms"></tbody>                              
                                        </table><hr>
                                    </div>  
                                </div>     
                            </div>                            
                        </div>
                        <div class="row clearfix row-box">
                        <h3>Researchers</h3> 
                            <div class="col-xs-12  ">
                                <div class="col-xs-12 ">
                                    <div class="col-xs-12 col-lg-6 field">
                                        <?= form_input('search_type','','placeholder=" " id="search_type"').form_label('Type of Researches','','for="search_type"');?>
                                    </div>
                                    <div class="col-xs-12 col-lg-6 field">
                                        <?= form_input('search_title','','placeholder=" " id="search_title"').form_label('Title of research','','for="search_title"');?>
                                    </div>
                                </div>                                
                                <div class="col-xs-12 ">
                                    <div class="col-xs-12 col-lg-12 ">                                                
                                            <button type="button" name="addresearch" id="addresearch" class="btn btn-info">Add to table</button>  
                                        </div> 
                                </div><br>  
                                <div class="col-xs-12 col-lg-12 ">
                                    <div class="table-responsive"><br><hr>
                                        <table id="tableSearch" class="table table-hover table-bordered tglobal">
                                            <thead>
                                                <tr>
                                                    <th>Type of Research</th>
                                                    <th>Title of Research</th>                                                   
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbodyresearch"></tbody>                               
                                        </table>
                                    </div>  
                                     <div class="table-responsive">
                                        <table id="tableSearch_sample" class="table table-hover table-bordered tglobal hide">
                                            <thead>
                                                <tr>
                                                    <th>Type of Research</th>
                                                    <th>Title of Research</th>                                                 
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbodyresearchs"></tbody>                              
                                        </table><hr>
                                    </div>  
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix row-box">
                        <h3>Agroforestry</h3>                          
                            <div class="col-xs-12  ">
                                <div class="col-xs-12 ">
                                    <legend>Activity</legend>
                                    <div class="col-xs-12 col-lg-5 ">
                                        <img width="200px" height="180px" id="blahsagro" src="<?php echo base_url("bmb_assets2/upload/agroforestry_img/nophoto.jpg") ?>" alt="your image" /><br>
                                        <input type='file' name="pic_agro" id="pic_agro" onchange="readURLsAgro(this);"  /><br>
                                        <input type="hidden" name="old_picture" value="nophoto.jpg">   
                                        <span id="img_agrospan" class="img_agrospan hide"></span>

                                    </div> 
                                    <div class="col-xs-12 col-lg-7 ">  
                                        <div class="col-xs-12 col-lg-12 field">
                                        <?= form_input('agroforestry','','placeholder=" " id="agroforestry"').form_label('Title','','for="agroforestry"');?>
                                        </div>
                                        <div class="col-xs-12 col-lg-12 field">
                                        <?= form_textarea('descAgro','','placeholder="Brief description" id="descAgro" style="height:100px"').form_label('Description','','for="descAgro"');?>
                                        </div>
                                        <div class="col-xs-12 col-lg-12 field">
                                            <?= form_input('agroHas','','placeholder=" " onkeyup="run(this)" id="agroHas"').form_label('Area(has)','','for="agroHas"');?>
                                        </div>
                                        <input type="button" id="addimageagro" value="Add to table" class="btn btn-info">
                                        
                                            <!-- <button type="button" name="saveAgro" onclick="insert_Agro()" id="saveAgro" class="btn btn-info">Add to table</button> -->
                                    </div>
                                    <div class="col-xs-12 ">   
                                        <div class="table-responsive"><br>
                                            <table id="tableAgro" class="table table-hover table-bordered tglobal">
                                                <thead>
                                                    <tr>
                                                        <th>Image</th>
                                                        <th>Descriptions</th>
                                                        <th>Area (has)</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbodyagro"></tbody>
                                            </table>
                                            <table id="tableAgro_sample" class="table table-hover table-bordered tglobal hide">
                                                <thead>
                                                    <tr>
                                                        <th>Image</th>
                                                        <th>Descriptions</th>
                                                        <th>Area (has)</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbodyagro_sample"></tbody>
                                            </table><br><hr>
                                        </div>                             
                                    </div>                            
                                </div>
                            </div>                    
                        </div>                        
                    </div>

                    <div class="tab-pane" id="12a">
                        <div class="row clearfix row-box ">
                        <h3>Threats</h3> 
                            <div class="col-xs-12  ">
                                <div class="col-xs-12 col-lg-5 ">
                                    <img width="300px" height="280px" id="ThreatImg" src="<?php echo base_url("bmb_assets2/upload/img_threat/nophoto.jpg") ?>" alt="your image" /><br>
                                    <input type='file' name="pic_threat" id="pic_threat" onchange="readURLsThreat(this);"  /><br>
                                    <input type="hidden" name="old_picture" value="nophoto.jpg">  
                                    <span id="img_output" class="img_output"></span>
                                </div>
                                <div class="col-xs-12 ">
                                    <div class="col-xs-12 col-lg-12 field">                                        
                                        <?= form_textarea('threat','','placeholder=" " id="threats" style="height:90px;"').form_label('Description','','for=""'); ?><br>
                                    </div>
                                    <div class="col-xs-12 col-lg-2 field">    
                                        <button type="button" name="saveThreat" id="saveThreat" class="btn btn-info">Add to table</button>                                       
                                    </div>
                                </div>
                                <div class="col-xs-12 ">   
                                        <div class="table-responsive">
                                            <table id="tableThreat" class="table table-hover table-bordered tglobal">
                                                <thead>
                                                    <tr>
                                                        <th>Threat</th>
                                                        <th>Image</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbodythreat"></tbody>
                                            </table>
                                            <table id="tableThreat_sample" class="table table-hover table-bordered tglobal hide">
                                                <thead>
                                                    <tr>
                                                        <th>Threat</th>
                                                        <th>Image</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbodythreats"></tbody>
                                            </table><br>
                                        </div>                             
                                    </div>      
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="13a">
                        <div class="row clearfix row-box">
                        <h3>Reference</h3> 
                            <div class="col-xs-12">
                                <div class="col-xs-12">
                                    <fieldset>
                                        <legend>Date of publication</legend>
                                        <div class="col-xs-6 col-lg-4 field">
                                            <?= form_dropdown('ref_date_month',$monthListed,'','class="select-css" id="ref_date_month"');?>
                                        </div>
                                        <div class="col-xs-6 col-lg-4 field">
                                            <?= form_dropdown('ref_date_year',$yearListed,'','class="select-css" id="ref_date_year"');?>
                                        </div>
                                    </fieldset>                                    
                                </div>
                                <div class="col-xs-12">                                    
                                    <div class="col-xs-12 col-lg-12 field">
                                        <?= form_input('author','','placeholder="Name of the author" id="author"').form_label('Author','','for="author"');?>

                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="col-xs-12 col-lg-12 field">
                                        <?= form_input('title','','placeholder="example: Water aerobics; The Negative effects of Facebook on communication. Social Media Today RSS. " id="title"').form_label('Article title','','for="title"');?>                                        
                                    </div>
                                    <div class="col-xs-6 col-lg-6 field">
                                        <?= form_input('sponsoring_body','','placeholder=" " id="sponsoring_body"').form_label('Name of Sponsoring body(if necessary)','','for="sponsoring_body"');?>
                                    </div>
                                    <div class="col-xs-6 col-lg-6 field">
                                        <?= form_input('place','','placeholder="Location" id="place"').form_label('Place of publication(if necessary)','','for="place"');?>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="col-xs-12 col-lg-12 field">
                                        <?= form_input('links','','placeholder="example: http://socialmediatoday.com" id="links"').form_label('URL/Source)','','for="links"');?>
                                    </div>
                                </div>                        
                                <div class="col-xs-12 ">
                                    <button type="button" name="addref" id="addref" class="btn btn-info">Add to table</button>
                                </div>
                                <div class="col-xs-12 ">   
                                        <div class="table-responsive"><br>
                                            <table id="tableRef" class="table table-hover table-bordered tglobal">
                                                <thead>
                                                    <tr>
                                                        <th>Citation</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbodyref"></tbody>
                                            </table>
                                            <table id="tableRef_sample" class="table table-hover table-bordered tglobal hide">
                                                <thead>
                                                    <tr>
                                                        <th>Citation</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbodyrefs"></tbody>
                                            </table><br>
                                        </div>                             
                                    </div>      
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="14a">
                        <div class="row clearfix row-box">
                        <h3>Map Image</h3>                         
                            <div class="col-xs-12  ">
                                <div class="col-xs-12 ">
                                    <div class="col-xs-12 col-lg-5 ">
                                       <img width="300px" height="280px" id="blahss" src="<?php echo base_url("bmb_assets2/upload/map_image/nophoto.jpg") ?>" alt="your image" /><br>
                                        <input type='file' name="picture2" id="picture2" onchange="readURLss(this);"  /><br>
                                        <input type="hidden" name="old_picture" value="nophoto.jpg"> 
                                        <span id="img_output_map" class="img_output_map hide"></span>
                                    </div>
                                    <div class="col-xs-12 col-lg-7 field">
                                        <?= form_textarea('remarks_image','','placeholder="Input text" id="remarks_image"').form_label('Description','','for="remarks_image"');?><br>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <button type="button" name="addimagemap" id="addimagemap" class="btn btn-info">Add to table</button> 
                                </div>
                                <div class="col-xs-12 ">   
                                    <div class="table-responsive"><br>
                                        <table id="tableimage" class="table table-hover table-bordered tglobal">
                                            <thead>
                                                <tr>
                                                    <th>Image</th>
                                                    <th>Description</th>
                                                    <th>REMOVE</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbodyimage">
                                            </tbody>
                                        </table>
                                        <table id="tableimage_sample" class="table table-hover table-bordered tglobal hide">
                                            <thead>
                                                <tr>
                                                    <th>Image</th>
                                                    <th>Description</th>
                                                    <th>REMOVE</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbodyimage_sample">
                                            </tbody>
                                        </table>
                                    </div>                            
                                </div>      
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="15a">
                        <div class="row clearfix row-box">
                            <h3>Integrated Protected Area Fund</h3>
                            <div class="col-xs-6">
                                <fieldset>
                                    <legend>Date Issued</legend>                                   
                                    <div class="col-xs-6 col-lg-6 ">
                                        <?= form_dropdown('month_monitoring',$monthListed,'','class="form-control border-input select-css" id="monitor_months"'); ?>
                                    </div>
                                    <div class="col-xs-6 col-lg-6 ">
                                        <?= form_dropdown('year_monitoring',$yearListed,'','class="form-control border-input select-css" id="monitor_years"'); ?><br>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-xs-12">
                                <fieldset>
                                    <legend>Monitoring of Protected Area Visitors</legend>
                                    <div class="col-xs-6">
                                        <fieldset>
                                            <legend>Local</legend>
                                            <div class="col-xs-6 col-lg-6 field inner-addon left-addon">                                        
                                            <i class="fa fa-venus"></i>                                  
                                                <?= form_input('no_male_local','','placeholder=" " id="no_male_local" onkeyup="run(this)"').form_label('Male','','for="no_male_local"') ?>
                                            </div>
                                            <div class="col-xs-6 col-lg-6 field inner-addon left-addon">                                        
                                            <i class="fa fa-mars"></i>                                  
                                                <?= form_input('no_female_local','','placeholder=" " id="no_female_local" onkeyup="run(this)"').form_label('Female','','for="no_female_local"') ?>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-xs-6">
                                        <fieldset>
                                            <legend>Foreign</legend>
                                            <div class="col-xs-6 col-lg-6 field inner-addon left-addon">                                        
                                            <i class="fa fa-venus"></i>                                  
                                                <?= form_input('no_male_foreign','','placeholder=" " id="no_male_foreign" onkeyup="run(this)"').form_label('Male','','for="no_male_foreign"') ?>
                                            </div>
                                            <div class="col-xs-6 col-lg-6 field inner-addon left-addon">                                        
                                            <i class="fa fa-mars"></i>                                  
                                                <?= form_input('no_female_foreign','','placeholder=" " id="no_female_foreign" onkeyup="run(this)"').form_label('Female','','for="no_female_foreign"') ?>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-xs-12">
                                        <input type="button" id="addvisitors" value="Add to table" class="btn btn-info">                                
                                    </div>  
                                    <div class="col-xs-12 ">   
                                        <div class="table-responsive"><br>
                                            <table id="tableMonitoringVisitors" class="table table-hover table-bordered tglobal">
                                                <thead>
                                                    <tr>
                                                        <th style='text-align: center;' colspan="2">Date Monitored</th>
                                                        <th style='text-align: center;' colspan="3">Local Visitors</th>
                                                        <th style='text-align: center;' colspan="3">Foreign Visitors</th> 
                                                        <th style='text-align: center;' colspan="2">Total no. by sex</th> 
                                                        <th style='text-align: center;'>Grand Total</th> 
                                                        <th style='text-align: center;' rowspan="2"><i class="fa fa-cog"></i> Option</th>                                           
                                                    </tr>
                                                    <tr>
                                                        <th style='text-align: center;'>Month</th>
                                                        <th style='text-align: center;'>Year</th>
                                                        <th style='text-align: center;'>Male</th>
                                                        <th style='text-align: center;'>Female</th>
                                                        <th style='text-align: center;'>Total</th>
                                                        <th style='text-align: center;'>Male</th>
                                                        <th style='text-align: center;'>Female</th>
                                                        <th style='text-align: center;'>Total</th>
                                                        <th style='text-align: center;'>Male</th>
                                                        <th style='text-align: center;'>Female</th>
                                                        <th style='text-align: center;'></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbodyvisitor"></tbody>
                                            </table>
                                            <table id="tableMonitoringVisitors_sample" class="table table-hover table-bordered tglobal hide">
                                                <thead>
                                                    <tr>
                                                        <th colspan="2">Date Monitored</th>
                                                        <th colspan="3">Local Visitors</th>
                                                        <th colspan="3">Foreign Visitors</th> 
                                                        <th colspan="2">Total no. by sex</th> 
                                                        <th>Grand Total</th> 
                                                        <th rowspan="2"><i class="fa fa-cog"></i> Option</th>                                           
                                                    </tr>
                                                    <tr>
                                                        <th>Month</th>
                                                        <th>Year</th>
                                                        <th>Male</th>
                                                        <th>Female</th>
                                                        <th>Total</th>
                                                        <th>Male</th>
                                                        <th>Female</th>
                                                        <th>Total</th>
                                                        <th>Male</th>
                                                        <th>Female</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbodyvisitor_sample"></tbody>
                                            </table>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-xs-12">
                                <fieldset>
                                    <legend>Monitoring of Income Generated within Protected Area</legend>
                                    <div class="col-xs-12">
                                        <fieldset>
                                            <legend>Income Generated (Peso)</legend>
                                            <div class="col-xs-12 col-lg-12 field inner-addon left-addon">  
                                                <i class="fa fa-rub"></i>                                  
                                                <?= form_input('entrancefee','','placeholder="Amount (Peso)" id="entrancefee" onchange="calculator_ipaf()" onkeyup="run(this)"').form_label('Entrance Fee','','for="entrancefee"') ?>
                                            </div>
                                            <div class="col-xs-12 col-lg-12 field inner-addon left-addon">  
                                                <i class="fa fa-rub"></i>                                  
                                                <?= form_input('income_facilities','','placeholder="Amount (Peso)" id="income_facilities" onchange="calculator_ipaf()" onkeyup="run(this)"').form_label('Facilities User Fee','','for="income_facilities"') ?>
                                            </div>
                                            <div class="col-xs-12 col-lg-12 field inner-addon left-addon">  
                                                <i class="fa fa-rub"></i>                                  
                                                <?= form_input('resource','','placeholder="Amount (Peso)" id="resource" onchange="calculator_ipaf()" onkeyup="run(this)"').form_label('Resource User Fee','','for="resource"') ?>
                                            </div>
                                            <div class="col-xs-12 col-lg-12 field inner-addon left-addon">  
                                                <i class="fa fa-rub"></i>                                  
                                                <?= form_input('concession','','placeholder="Amount (Peso)" id="concession" onchange="calculator_ipaf()" onkeyup="run(this)"').form_label('Concession Fee','','for="concession"') ?>
                                            </div>
                                            <div class="col-xs-12 col-lg-12 field inner-addon left-addon">  
                                                <i class="fa fa-rub"></i>                                  
                                                <?= form_input('development','','placeholder="Amount (Peso)" id="development" onchange="calculator_ipaf()" onkeyup="run(this)"').form_label('Devt Fee/ Royalty','','for="development"') ?>
                                            </div>
                                            <div class="col-xs-12 col-lg-12 field inner-addon left-addon">                                                                                  
                                                <i class="fa fa-rub"></i>                                  
                                                <?= form_input('finespenalties','','placeholder="Amount (Peso)" id="finespenalties" onchange="calculator_ipaf()" onkeyup="run(this)"').form_label('Fines and Penalties','','for="finespenalties"') ?>
                                            </div>
                                            <div class="col-xs-6 col-lg-6 field inner-addon left-addon">                                                                                  
                                                <i class="fa fa-pencil"></i>                                  
                                                <?= form_input('other_specify_title','','placeholder="Description" id="other_specify_title"').form_label('Others(specify)','','for="other_specify_title"') ?>
                                            </div>
                                            <div class="col-xs-6 col-lg-6 field inner-addon left-addon">                                                                                  
                                                <i class="fa fa-rub"></i>                                  
                                                <?= form_input('other_specify_amount','','placeholder="Amount (Peso)" id="other_specify_amount" onchange="calculator_ipaf()" onkeyup="run(this)"').form_label('Amount','','for="other_specify_amount"') ?>
                                            </div>
                                        </fieldset>
                                    </div> 
                                    <div class="col-xs-12">
                                        <input type="button" id="addipafPlus" value="Add to table" class="btn btn-info">                                
                                    </div>  
                                    <div class="col-xs-12 ">   
                                        <div class="table-responsive"><br>
                                            <table id="tableMonitoringIpaf" class="table table-hover table-bordered tglobal">
                                                <thead>
                                                    <tr>
                                                        <th colspan="2" style="text-align: center">Date Monitored</th>
                                                        <!-- <th colspan="6" style="text-align: center">No. Visitors</th> -->
                                                        <th colspan="8" style="text-align: center">Income Generated</th>
                                                        <th colspan="3" style="text-align: center">Amount / Date Deposited to BTR</th>
                                                        <th rowspan="3"><i class="fa fa-cog"></i>Option</th>
                                                    </tr>
                                                    <tr>
                                                        <th style="text-align: center" rowspan="2">Month</th>
                                                        <th style="text-align: center" rowspan="2">Year</th>                                                       
                                                        <th style="text-align: center" rowspan="2">Entrance Fee</th>
                                                        <th style="text-align: center" rowspan="2">Facilities User Fee</th>
                                                        <th style="text-align: center" rowspan="2">Resource User Fee</th>
                                                        <th style="text-align: center" rowspan="2">Concession Fee</th>
                                                        <th style="text-align: center" rowspan="2">Development Fee/ Royalty</th>
                                                        <th style="text-align: center" rowspan="2">Fines and Penalties</th>
                                                        <th style="text-align: center" rowspan="2">Others  (Pls. specify)</th>
                                                        <th style="text-align: center" rowspan="2">Total Income</th>
                                                        <th style="text-align: center" rowspan="2">Retained Income(75%)</th>
                                                        <th style="text-align: center" rowspan="2">SAGF (25%)</th>
                                                        <th style="text-align: center" rowspan="2">Total Income</th>
                                                    </tr> 
                                                </thead>
                                                <tbody id="tbodyIpaf"></tbody>
                                            </table>
                                            <table id="tableMonitoringIpaf_sample" class="table table-hover table-bordered tglobal hide">
                                                <thead>
                                                    <tr>
                                                        <th colspan="2" style="text-align: center">Date Monitored</th>
                                                        <th colspan="8" style="text-align: center">Income Generated</th>
                                                        <th colspan="3" style="text-align: center">Amount / Date Deposited to BTR</th>
                                                        <th rowspan="3"><i class="fa fa-cog"></i></th>
                                                    </tr>
                                                    <tr>
                                                        <th style="text-align: center" rowspan="2">Month</th>
                                                        <th style="text-align: center" rowspan="2">Year</th>
                                                        <th style="text-align: center" rowspan="2">Entrance Fee</th>
                                                        <th style="text-align: center" rowspan="2">Facilities User Fee</th>
                                                        <th style="text-align: center" rowspan="2">Resource User Fee</th>
                                                        <th style="text-align: center" rowspan="2">Concession Fee</th>
                                                        <th style="text-align: center" rowspan="2">Development Fee/ Royalty</th>
                                                        <th style="text-align: center" rowspan="2">Fines and Penalties</th>
                                                        <th style="text-align: center" rowspan="2">Others  (Pls. specify)</th>
                                                        <th style="text-align: center" rowspan="2">Total Income</th>
                                                        <th style="text-align: center" rowspan="2">Retained Income(75%)</th>
                                                        <th style="text-align: center" rowspan="2">SAGF (25%)</th>
                                                        <th style="text-align: center" rowspan="2">Total Income</th>
                                                    </tr>                                                    
                                                </thead>
                                                <tbody id="tbodyIpaf_sample">
                                                </tbody>
                                            </table>
                                        </div>                            
                                    </div>                                   
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-12">
                                    <fieldset>
                                        <legend>Contribution/Donation</legend>
                                        <div class="col-xs-12 col-lg-6 field">     
                                            <?= form_dropdown('contribution',$financialList,'','id="contribution" class="select-css"').form_label('Trust Fund','','for="contribution"'); ?>
                                            <span class="errors"></span><br>
                                        </div>
                                        <div class="col-xs-12 col-lg-6 field" id="donation">     
                                            <?= form_dropdown('mode_donation',$modepayment,'','id="mode_donation" class="select-css"').form_label('Mode of Payment','','for="mode_donation"'); ?><br>
                                        </div>
                                        <div class="col-xs-12 col-lg-12 field inner-addon left-addon">                                                                                  
                                            <i class="fa fa-rub"></i>                                  
                                            <?= form_input('financial_amount','','placeholder="Amount (Peso)" id="financial_amount" onchange="calculator_ipaf()" onkeyup="run(this)"').form_label('Estimated Monitary Value','','for="financial_amount"') ?>
                                        </div>
                                        <div class="col-xs-12 col-lg-12 field inner-addon left-addon">
                                            <?= form_textarea('financial_details','','placeholder="Details" id="financial_details" style="height:100px"').form_label('Remarks','','for="financial_details"') ?>
                                        </div>
                                        <div class="col-xs-12">
                                        <input type="button" id="addcontribution" value="Add to table" class="btn btn-info">                                
                                    </div>  
                                    <div class="col-xs-12 ">   
                                        <div class="table-responsive"><br>
                                            <table id="tableContribution" class="table table-hover table-bordered tglobal">
                                                <thead>
                                                    <tr>
                                                        <th style='text-align: center;' colspan="2">Date Monitored</th>
                                                        <th style='text-align: center;' rowspan="2">Trust fund</th>
                                                        <th style='text-align: center;' rowspan="2">Mode of payment</th> 
                                                        <th style='text-align: center;' rowspan="2">Amount</th> 
                                                        <th style='text-align: center;' rowspan="2">Remarks</th> 
                                                        <th style='text-align: center;' rowspan="2"><i class="fa fa-cog"></i> Option</th>                                           
                                                    </tr>
                                                    <tr>
                                                        <th style='text-align: center;'>Month</th>
                                                        <th style='text-align: center;'>Year</th>                                                        
                                                    </tr>
                                                </thead>
                                                <tbody id="tbodycontri"></tbody>
                                            </table>
                                            <table id="tableContribution_sample" class="table table-hover table-bordered tglobal hide">
                                                <thead>
                                                    <tr>
                                                        <th style='text-align: center;' colspan="2">Date Monitored</th>
                                                        <th style='text-align: center;' rowspan="2">Trust fund</th>
                                                        <th style='text-align: center;' rowspan="2">Mode of payment</th> 
                                                        <th style='text-align: center;' rowspan="2">Amount</th> 
                                                        <th style='text-align: center;' rowspan="2">Remarks</th> 
                                                        <th style='text-align: center;' rowspan="2"><i class="fa fa-cog"></i> Option</th>                                           
                                                    </tr>
                                                    <tr>
                                                        <th style='text-align: center;'>Month</th>
                                                        <th style='text-align: center;'>Year</th>                                                        
                                                    </tr>
                                                </thead>
                                                <tbody id="tbodycontri_sample"></tbody>
                                            </table>
                                        </div>
                                    </div>
                                    </fieldset>
                                    <input type="number" id="total_income" class="hide"></input>
                                    <input type="number" id="total_income75" class="hide"></input>
                                    <input type="number" id="total_income25" class="hide"></input>
                                </div>                                
                            </div>                                                      
                        </div>
                    </div>                    
                    <div class="tab-pane" id="16a">
                        <div class="row clearfix row-box">
                        <h3>Protected Area Management Office</h3> 
                            <div class="col-xs-12  ">                              
                                <fieldset>
                                <legend>PASU Name</legend>
                                <?php if (!empty($pamain->id_main)): ?>
                                <div class="col-xs-12 ">                               
                                    <div class="col-xs-4 col-lg-4  field inner-addon left-addon">
                                        <?= form_input('pasu_fname',$pamain->firstname,'id="pasu_fname" placeholder="ex. John, Jane" required readonly="readonly"').form_label('First Name','','for="pasu_fname"');?>
                                    </div>
                                    <div class="col-xs-4 col-lg-4  field inner-addon left-addon">
                                        <?= form_input('pasu_mname',$pamain->middlename,'id="pasu_mname" placeholder="ex. A., dela Cruz" required readonly="readonly"').form_label('Middle Name','','for="pasu_mname"');?>
                                    </div>
                                    <div class="col-xs-4 col-lg-4  field inner-addon left-addon">
                                        <?= form_input('pasu_lname',$pamain->lastname,'id="pasu_lname" placeholder="ex. Rodriguez, Espino" required readonly="readonly"').form_label('Last Name','','for="pasu_lname"');?>
                                    </div>
                                </div>
                                <?php else: ?>
                                <div class="col-xs-12 ">                               
                                    <div class="col-xs-4 col-lg-4  field inner-addon left-addon">
                                        <?= form_input('pasu_fname',$read->firstname,'id="pasu_fname" placeholder="ex. John, Jane" required readonly="readonly"').form_label('First Name','','for="pasu_fname"');?>
                                    </div>
                                    <div class="col-xs-4 col-lg-4  field inner-addon left-addon">
                                        <?= form_input('pasu_mname',$read->middlename,'id="pasu_mname" placeholder="ex. A., dela Cruz" required readonly="readonly"').form_label('Middle Name','','for="pasu_mname"');?>
                                    </div>
                                    <div class="col-xs-4 col-lg-4  field inner-addon left-addon">
                                        <?= form_input('pasu_lname',$read->lastname,'id="pasu_lname" placeholder="ex. Rodriguez, Espino" required readonly="readonly"').form_label('Last Name','','for="pasu_lname"');?>
                                    </div>
                                </div>
                                <?php endif ?>
                                
                                </fieldset>
                                <fieldset> 
                                <legend>Assistant PASU Name</legend>
                                <div class="col-xs-12 ">                               
                                    <div class="col-xs-4 col-lg-4  field inner-addon left-addon">
                                        <?= form_input('apasu_fname',$pamain->apasu_fname,'id="apasu_fname" placeholder="ex. John, Jane" required').form_label('First Name','','for="apasu_fname"');?>
                                    </div>
                                    <div class="col-xs-4 col-lg-4  field inner-addon left-addon">
                                        <?= form_input('apasu_mname',$pamain->apasu_mname,'id="apasu_mname" placeholder="ex. A., dela Cruz" required').form_label('Middle Name','','for="apasu_mname"');?>
                                    </div>
                                    <div class="col-xs-4 col-lg-4  field inner-addon left-addon">
                                        <?= form_input('apasu_lname',$pamain->apasu_lname,'id="apasu_lname" placeholder="ex. Rodriguez, Espino" required').form_label('Last Name','','for="apasu_lname"');?>
                                    </div>
                                </div>
                                <div class="col-xs-12 ">
                                    <div class="col-xs-12 col-lg-12  field inner-addon left-addon">
                                        <?= form_input('officeAddress',$pamain->apasu_officeaddress,'placeholder="Lot no., Block no, Street name, Barangay, Municipal City"  id="officeAddress"').form_label('Office Address','','for="officeAddress"');?>
                                    </div>                                    
                                </div>
                                <div class="col-xs-12 ">
                                    <div class="col-xs-6 col-lg-4 ">
                                        <?= form_dropdown('apasu_sex',$sexList,$pamain->apasu_sex,'class="select-css" id="apasu_sex" required');?><br>
                                    </div>                                   
                                </div>                           
                                <div class="col-xs-12 ">
                                    <div class="col-xs-6 col-lg-6  field inner-addon left-addon">                                    
                                        <?= form_input('apasu_mobile',$pamain->apasu_mobile,'data-inputmask="&quot;mask&quot;: &quot;+(99) 999-9999-999&quot;" placeholder="+(99) 999-9999-999" data-mask="" id="apasu_mobile"').form_label('Mobile Number','','for="apasu_mobile"'); ?>
                                    </div>    
                                    <div class="col-xs-6 col-lg-6  field inner-addon left-addon">                               
                                        <?= form_input('apasu_email',$pamain->apasu_email,'type="email" placeholder="example@gmail.com, example@yahoo.com" id="apasu_email"').form_label('Email Address','','for="apasu_email"'); ?>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <legend>Technical Staff</legend>
                                <div class="col-xs-12 ">
                                    <div class="col-xs-12 ">                               
                                        <div class="col-xs-4 col-lg-4  field inner-addon left-addon">
                                            <?= form_input('tfname','','id="tfname" placeholder="ex. John, Jane" required').form_label('First Name','','for="tfname"');?>
                                        </div>
                                        <div class="col-xs-4 col-lg-4  field inner-addon left-addon">
                                            <?= form_input('tmname','','id="tmname" placeholder="ex. A., dela Cruz" required').form_label('Middle Name','','for="tmname"');?>
                                        </div>
                                        <div class="col-xs-4 col-lg-4  field inner-addon left-addon">
                                            <?= form_input('tlname','','id="tlname" placeholder="ex. Rodriguez, Espino" required').form_label('Last Name','','for="tlname"');?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 ">
                                    <div class="col-xs-6 col-lg-4 "  style="margin-top: 20px;">
                                        <?= form_dropdown('tsex',$sexList,'','class="select-css" id="tsex" required');?><br>
                                    </div>
                                    <div class="col-xs-6 col-lg-2  field inner-addon left-addon">
                                    </div>
                                    <div class="col-xs-6 col-lg-4  field inner-addon left-addon">
                                        <?= form_input('tage','','id="tage" placeholder="Age" required').form_label('Age','','for="tage"');?>
                                    </div>                                   
                                </div> 
                                <div class="col-xs-12 ">
                                    <div class="col-xs-6 col-lg-4 "  style="margin-top: 20px;">
                                        <?= form_dropdown('tappointment',$tappointment,'','class="select-css" id="tappointment" required');?><br>
                                    </div>
                                    <div class="col-xs-6 col-lg-2  field inner-addon left-addon">
                                    </div>
                                    <div class="col-xs-6 col-lg-6  field inner-addon left-addon">
                                        <?= form_input('tposition','','id="tposition" placeholder="example: Forester I,II,III / EMS I,II,III" required').form_label('Position/Designation','','for="tposition"');?>
                                    </div>                                   
                                </div> 
                                <div class="col-xs-12 ">
                                    <button type="button" name="addtechnical" id="addtechnical" class="btn btn-info">Add to table</button>  
                                </div>
                                <div class="col-xs-12 ">   
                                    <div class="table-responsive"><br>
                                        <table id="tblstaff" class="table table-hover table-bordered tglobal">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Status of appointment</th>
                                                    <th>Position/Designation</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbodytechnical">
                                            </tbody>
                                        </table>
                                        <table id="tblstaff_sample" class="table table-hover table-bordered tglobal hide">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Status of appointment</th>
                                                    <th>Position/Designation</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbodytechnicals">
                                            </tbody>
                                        </table>
                                    </div>                            
                                </div> 
                            </fieldset>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="17a">
                        <h3>Galleries</h3> 
                        <div class="col-xs-12  field inner-addon left-addon">
                            <input type="file" name="files" id="files" multiple />
                        </div>
                        <div style="clear:both"></div>
                         <br />
                         <br />
                         <div id="fetch_images"></div>
                         <div id="uploaded_images"></div>

                    </div>

                    <?php echo form_close(); ?> 
                </div>
            </div> 
        </div>
    </div>
</div>

<!-- MODAL FOR EDITTING A THREATS -->                                    
<form method="post" action="#" id="IpafForm" role="form">  
    <div class="modal fade" id="modal-ipafs" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">            
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit IPAF</h4>
                </div>
                <div class="modal-body" style="display:inline-block">                    
                    <div class="col-xs-12 " style="margin-top:10px">
                        <div class="col-xs-6 col-lg-6 ">       
                            <input type="hidden" id="ipafs-id" name="ipafs-id" value="" />
                            <input type="hidden" id="ipafs-gencode" name="ipafs-gencode" value="" />   
                            <?= form_label('Month').' '.form_dropdown('edit-month_monitoring',$monthListed,'','class="form-control border-input" id="edit-monitor_months"');?>
                        </div>  
                        <div class="col-xs-6 col-lg-6 ">
                            <?= form_label('Year').' '.form_dropdown('edit-year_monitoring',$yearListed,'','class="form-control border-input" id="edit-monitor_years"');?>
                        </div>
                    </div>  
                    <div class="col-xs-12 " style="margin-top:10px">
                        <legend>&nbsp;</legend>
                        <legend>Visitors Monitoring</legend>
                        <div class="col-xs-6 col-lg-6 ">                               
                            <?= form_label('No. of Visitors','','style="margin:4px" for="edit-no_visitors"').''.form_input('edit-no_visitors','','class="form-control border-input" onkeyup="run(this)" id="edit-no_visitors"');?>
                        </div>
                    </div>
                    <div class="col-xs-12 " style="margin-top:10px">  
                        <legend>&nbsp;</legend>
                        <legend>Monthly Income</legend>                  
                        <div class="col-xs-6 col-lg-6 ">                              
                            <?= form_label('Visitors','','style="margin:4px" for="edit-visitors"').''.form_input('edit-visitors','','class="form-control border-input" onkeyup="run(this)" id="edit-visitors"');?>
                        </div>
                        <div class="col-xs-6 col-lg-6 ">                              
                            <?= form_label('Parking Area','','style="margin:4px" for="edit-parking"').''.form_input('edit-parking','','class="form-control border-input" onkeyup="run(this)" id="edit-parking"');?>
                        </div>
                    </div>
                    <div class="col-xs-12 " style="margin-top:10px">                        
                        <div class="col-xs-6 col-lg-6 ">                              
                            <?= form_label('Facilities','','style="margin:4px" for="edit-facilities"').''.form_input('edit-facilities','','class="form-control border-input" onkeyup="run(this)" id="edit-facilities"');?>
                        </div>
                        <div class="col-xs-6 col-lg-6 ">                              
                            <?= form_label('Recreational Activity','','style="margin:4px" for="edit-recreational"').''.form_input('edit-recreational','','class="form-control border-input" onkeyup="run(this)" id="edit-recreational"');?>
                        </div>
                    </div>
                    <div class="col-xs-12 " style="margin-top:10px">                        
                        <div class="col-xs-6 col-lg-6 ">                              
                            <?= form_label('Watersports or other water Activity','','style="margin:4px" for="edit-water"').''.form_input('edit-water','','class="form-control border-input" onkeyup="run(this)" id="edit-water"');?><br>
                        </div>
                    </div>                   
                    <div class="col-xs-12 ">
                        <div class="modal-footer">
                            <input class="btn btn-info" type="submit" name="submit" value="Submit" id="UpdateIpaf" />                            
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>
<!-- END OF MODAL FOR EDITTING A STRICT PROTECTION ZONE -->

<!-- MODAL FOR EDITTING A PAMB MEMBER -->                                    
<form method="post" action="#" id="PambmEmber" role="form">  
    <div class="modal fade" id="modal-edit-service" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">            
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit PAMB Members</h4>
                </div>
                <div class="modal-body" style="display:inline-block"> 
                    <div class="col-xs-12 " style="margin-top:10px">     
                        <div class="col-xs-12 ">
                            <div class="col-xs-4 col-lg-4 ">       
                            <input type="hidden" id="ser-id" name="ser-id" value="" />
                            <input type="hidden" id="ser-gencode" name="ser-gencode" value="" />
                                <?= form_label('First Name','','style="margin:4px" for="edit-fname"').''.form_input('edit-fname','','class="form-control border-input" id="edit-fname" step="1"');?>
                            </div>  
                            <div class="col-xs-4 col-lg-4 ">
                                <?= form_label('Middle Name','','style="margin:4px" for="edit-mname"').''.form_input('edit-mname','','class="form-control border-input" id="edit-mname"');?>
                            </div>  
                            <div class="col-xs-4 col-lg-4 ">
                                <?= form_label('Last Name','','style="margin:4px" for="edit-lname"').''.form_input('edit-lname','','class="form-control border-input" id="edit-lname"');?>
                            </div>  
                        </div>
                        <div class="col-xs-12 ">
                            <div class="col-xs-4 col-lg-4 ">                                    
                                <?= form_label('Gender','','style="margin:4px"').''.form_dropdown('edit-sex',$sexList,'','class="form-control border-input" id="edit-sex"');?>
                            </div>    
                            <div class="col-xs-4 col-lg-4 ">                                    
                                <?=form_label('Marital Status','','style="margin:4px"').''.form_dropdown('edit-maritalstatus',$maritalStatus,'','class="form-control border-input" id="edit-maritalstatus"');?>
                            </div>                                                                                                                                                   
                        </div>
                        <div class="col-xs-12 ">
                            <div class="col-xs-12 col-lg-12 ">                                    
                                <?= form_label('Address','','style="margin:4px"').''.form_input('edit-address','','class="form-control border-input" id="edit-address"');?>
                            </div> 
                        </div>                                    
                        <div class="col-xs-12 ">
                            <div class="col-xs-6 col-lg-6 ">                                    
                                <?= form_label('Position','','style="margin:4px"').''.form_input('edit-position','','class="form-control border-input" id="edit-position"');?> 
                            </div>                                    
                            <div class="col-xs-6 col-lg-6 ">
                                <?=form_label('Organization/Offices','','style="margin:4px"').''.form_input('edit-office','','class="form-control border-input" id="edit-office"');?>
                            </div>
                        </div> 
                        <div class="col-xs-12 ">
                            <div class="col-xs-12 col-lg-6 ">
                                <?= form_label('Appointment Type','','style="margin:4px"').''.form_dropdown('edit-appointment',$appointment,'','class="form-control border-input" id="edit-appointment"');?><span class="edit-error_appointment"></span>
                            </div>
                            <div class="col-xs-12 col-lg-6 ">
                                <?= form_label('&nbsp;','','style="margin:4px"').''.form_dropdown('edit-appointment-sub',$appointmentsub,$pamain->sub_appointment,'class="form-control border-input" id="edit-appointmentsub" required');?><br>
                            </div>
                        </div>
                        <div class="col-xs-12 ">
                            <div class="col-xs-12 col-lg-4 ">
                                <?php echo form_label('Appointment Date','','style="margin:4px"').''.form_dropdown('edit-appointment_m',$monthList,'','class="form-control border-input" id="edit-appointmentmonth"') ?>
                            </div>                                    
                            <div class="col-xs-12 col-lg-4 ">
                                <?php echo form_label('&nbsp;&nbsp;','','style="margin:4px"').''.form_dropdown('edit-appointment_d',$dayList,'','class="form-control border-input" id="edit-appointmentday"') ?>
                            </div>                                    
                            <div class="col-xs-12 col-lg-4 ">
                                <?php echo form_label('&nbsp;&nbsp;','','style="margin:4px"').''.form_dropdown('edit-appointment_y',$yearListed,'','class="form-control border-input" id="edit-appointmentyear"') ?>
                            </div>  
                        </div>
                        <div class="col-xs-12 ">
                            <div class="col-xs-12 col-lg-6 ">                                    
                                <?php echo form_label('Status of Appointment;','','style="margin:4px"').''.form_dropdown('appointment_status',$appointment_status,'','class="form-control border-input" id="status_pamb" required') ?><br>
                            </div>
                        </div>
                        <div class="col-xs-12 ">
                            <div class="modal-footer">
                                <input class="btn btn-info" type="submit" name="submit" value="Submit" id="UpdateMem" name="submit" required />                            
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>
<!-- END OF MODAL FOR EDITTING A PAMB MEMBER -->
<!-- MODAL FOR EDITTING A STRICT PROTECTION ZONE -->                                    
<form method="post" action="#" id="strictProtect" role="form">  
    <div class="modal fade" id="modal-edit-protection" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">            
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Strict Protection Zone</h4>
                </div>
                <input type="hidden" id="strict-id" name="strict-id" value="" />
                <input type="hidden" id="strict-gencode" name="strict-gencode" value="" />
                <div class="modal-body" style="display:inline-block"> 
                    <div class="col-xs-12 " style="margin-top:10px"> 
                        <div class="col-xs-12 col-lg-12 ">
                                <!-- <img width="200px" height="180px" id="edit-protimage" alt="your image"  /><br>
                                <input type="file" name="edit-strict_prot_image" id="edit-strict_prot_image" onchange="readURLstrict2(this);"/>
                                <input type="" name="edit-old_picture" id="edit-old_picture"> -->
                            <?php echo form_label('Description','','style="margin:4px"').''.form_textarea('edit-desc','','class="form-control border-input" id="edit-descs"') ?>
                        </div>
                    </div>
                    <div class="col-xs-12 " style="margin-top:10px">
                        <div class="col-xs-12 col-lg-8 ">
                            <?= form_label('Hectares')." ".form_input('edit-stricthas','','class="form-control border-input" onkeyup="run(this);" id="edit-stricthas"');?>
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="modal-footer">
                            <input class="btn btn-info" type="submit" name="submit" value="Submit" id="UpdateStrict" />                            
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>
<!-- END OF MODAL FOR EDITTING A STRICT PROTECTION ZONE -->

<!-- MODAL FOR EDITTING A STRICT PROTECTION ZONE -->                                    
<form method="post" action="#" id="MultipleUsed" role="form">  
    <div class="modal fade" id="modal-edit-multiple" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">            
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Multiple Used Zone</h4>
                </div>
                <input type="hidden" id="multiple-id" name="multiple-id" value="" />
                <input type="hidden" id="multiple-gencode" name="multiple-gencode" value="" />
                <div class="modal-body" style="display:inline-block"> 
                    <div class="col-xs-12 " style="margin-top:10px"> 
                        <div class="col-xs-12 col-lg-12 ">                               
                            <?php echo form_label('Description','','style="margin:4px"').''.form_textarea('edit-descs-multiple','','class="form-control border-input" id="edit-descs-multiple"') ?>
                        </div>
                    </div>
                    <div class="col-xs-12 " style="margin-top:10px">
                        <div class="col-xs-12 col-lg-8 ">
                            <?= form_label('Hectares')." ".form_input('edit-stricthas-multiple','','class="form-control border-input" onkeyup="run(this);" id="edit-stricthas-multiple"');?>
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="modal-footer">
                            <input class="btn btn-info" type="submit" name="submit" value="Submit" id="UpdateMultiple" />                            
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>
<!-- END OF MODAL FOR EDITTING A STRICT PROTECTION ZONE -->



<!-- MODAL FOR EDITTING A REFERENCES -->                                    
<form method="post" action="#" id="ReferenceForm" role="form">  
    <div class="modal fade" id="modal-edit-reference" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">            
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Reference</h4>
                </div>
                <input type="hidden" id="reference-id" name="reference-id" value="" />
                <input type="hidden" id="reference-gencode" name="reference-gencode" value="" />
                <div class="modal-body" style="display:inline-block">                    
                    <div class="row clearfix">
                            <div class="col-xs-12  ">
                                <div class="col-xs-12 ">
                                    <div class="col-xs-3 col-lg-3 ">
                                        <?= form_label('Author','','style="margin:8px 0 0 0; "');?>
                                    </div>
                                    <div class="col-xs-9 col-lg-9 ">
                                        <?= form_input('edit-author','','class="form-control border-input" id="edit-author"');?><br>
                                    </div>
                                </div>
                                <div class="col-xs-12 ">
                                    <div class="col-xs-3 col-lg-3 ">
                                        <?= form_label('Date of document','','style="margin:8px 0 0 0; "');?>
                                    </div>
                                    <div class="col-xs-9 col-lg-4 ">
                                        <?= form_dropdown('edit-ref_date_month',$monthListed,'','class="form-control border-input" id="edit-ref_date_month"');?><br>
                                    </div>
                                    <div class="col-xs-9 col-lg-4 ">
                                        <?= form_dropdown('edit-ref_date_year',$yearListed,'','class="form-control border-input" id="edit-ref_date_year"');?><br>
                                    </div>
                                </div>
                                <div class="col-xs-12 ">
                                    <div class="col-xs-3 col-lg-3 ">
                                        <?= form_label('Webpage Title','','style="margin:8px 0 0 0; "').'<p><i>(Sentence case)</i></p>';?>
                                    </div>
                                    <div class="col-xs-9 col-lg-9 ">
                                        <?= form_textarea('edit-title','','class="form-control border-input" id="edit-title" style="height:90px;"');?><br>
                                    </div>
                                </div>
                                <div class="col-xs-12 ">
                                    <div class="col-xs-3 col-lg-3 ">
                                        <?= form_label('Name of Sponsoring body','','style="margin:8px 0 0 0; "').'<p>(If applicable)</p>';?>
                                    </div>
                                    <div class="col-xs-9 col-lg-9 ">
                                        <?= form_input('edit-sponsoring_body','','class="form-control border-input" id="edit-sponsoring_body"');?><br>
                                    </div>
                                </div>
                                 <div class="col-xs-12 ">
                                    <div class="col-xs-3 col-lg-3 ">
                                        <?= form_label('Place of publication','','style="margin:8px 0 0 0; "');?>
                                    </div>
                                    <div class="col-xs-9 col-lg-9 ">
                                        <?= form_input('edit-place','','class="form-control border-input" id="edit-place"');?><br>
                                    </div>
                                </div>
                                <div class="col-xs-12 ">
                                    <div class="col-xs-3 col-lg-3 ">
                                        <?= form_label('URL/Source','','style="margin:8px 0 0 0; "').'<p>(Copy the URL website)</p>';?>
                                    </div>
                                    <div class="col-xs-9 col-lg-9 ">
                                        <?= form_input('edit-links','','class="form-control border-input" id="edit-links"');?><br>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    <div class="col-xs-12 ">
                        <div class="modal-footer">
                            <input class="btn btn-info" type="submit" name="submit" value="Submit" id="Updateref" />                            
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>
<!-- END OF MODAL FOR EDITTING A REFERENCES -->

<!-- MODAL FOR EDITTING A THREATS -->                                    
<form method="post" action="" id="ThreatsForm" enctype="multipart/form-data" role="form">  
    <div class="modal fade" id="modal-edit-threats" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">            
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Threats</h4>
                </div>
                <input type="hidden" id="threats-id" name="threats-id" value="" />
                <input type="hidden" id="threats-gencode" name="threats-gencode" value="" />
                <div class="modal-body" style="display:inline-block"> 
                    <div class="col-xs-12 " style="margin-top:10px"> 
                        <div class="col-xs-12 col-lg-12 ">
                            <img width="200px" height="180px" id="edit-ThreatImg" src="<?php echo base_url("bmb_assets2/upload/img_threat/nophoto.jpg") ?>" alt="your image" /><br>
                            <input type='file' name="edit-pic_threat" id="edit-pic_threat" onchange="readURLsThreatedit(this);"  /><br>
                            <input type="hidden" name="edit-old_picture" id="edit-old_picture">  
                            <span id="edit-img_output" class="edit-img_output"></span>
                        </div>
                    </div> 
                    <div class="col-xs-12 " style="margin-top:10px"> 
                        <div class="col-xs-12 col-lg-12 ">                               
                            <?php echo form_label('Threats','','style="margin:4px"').''.form_textarea('edit-threats-desc','','class="form-control border-input" id="edit-threats"') ?>
                        </div>
                    </div>
                    
                    <div class="col-xs-12 " style="margin-top:10px">                                    
                        <div class="col-xs-12 ">
                            <div class="modal-footer">
                                <input class="btn btn-info" type="submit" name="submit" value="Submit" id="UpdateThreats" onclick="ssssss();" />                            
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>
<!-- END OF MODAL FOR EDITTING A THREATS -->
<!-- MODAL FOR EDITTING A PROJECTS -->                                    
<form method="post" action="#" id="ProjectForm" role="form">  
    <div class="modal fade" id="modal-edit-project" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">            
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Project Established</h4>
                </div>
                <input type="hidden" id="project-id" name="project-id" value="" />
                <input type="hidden" id="project-gencode" name="project-gencode" value="" />
                <div class="modal-body" style="display:inline-block"> 
                    <div class="col-xs-12 " style="margin-top:10px"> 
                        <div class="col-xs-12 col-lg-3 ">                               
                            <?php echo form_label('Name of proponent','','style="margin:4px"'); ?>
                        </div>
                        <div class="col-xs-12 col-lg-9 ">                               
                            <?php echo form_input('edit-project-name','','class="form-control border-input" id="edit-project-name"'); ?>
                        </div>
                    </div>    
                    <div class="col-xs-12 " style="margin-top:10px"> 
                         <div class="col-xs-12 col-lg-3 ">                               
                            <?php echo form_label('Tenurial Instrument','','style="margin:4px"'); ?>
                        </div>
                        <div class="col-xs-12 col-lg-9 ">                               
                            <select id="edit-issuance" class="form-control border-input" name="edit-issuance" >
                                <option value="" disabled default selected style="display:none;"></option>
                                <option value="sapa">Special Use Agreement in Protected Areas (SAPA)</option>
                                <option value="moa">Memorandum of Agreement (MOA)</option>
                                <option value="pacbrma">Protected Area Community Based Resources Agreement (PACBRMA)</option>
                            </select>
                        </div>
                    </div>  
                    <!-- SAPA -->
                    <div id="edit-sapa" class="">
                        <div class="col-xs-12 " id="sapa">
                            <div class="col-xs-12 col-lg-3 ">
                                <?= form_label('SAPA No.','','style="margin:8px 0 0 0; "');?><br>
                            </div>
                            <div class="col-xs-12 col-lg-9 ">
                                <?= form_input('edit-sapa_no','','class="form-control border-input" id="edit-sapa_no"');?><br>
                            </div>
                        </div>
                    </div>
                    <!-- END OF SAPA -->
                    <!-- MOA -->
                    <div id="edit-moa" class="">
                        <div class="col-xs-12 ">
                            <div class="col-xs-12 col-lg-3 ">
                                <?= form_label('Date of signing','','style="margin:8px 0 0 0; "');?><br>
                            </div>
                            <div class="col-xs-12 col-lg-3 ">
                                <?= form_dropdown('edit-moa_month',$monthListed,'','class="form-control border-input" id="edit-moa_month"');?><br>
                            </div>
                            <div class="col-xs-12 col-lg-3 ">
                                <?= form_dropdown('edit-moa_day',$dayList,'','class="form-control border-input" id="edit-moa_day"');?><br>
                            </div>
                            <div class="col-xs-12 col-lg-3 ">
                                <?= form_dropdown('edit-moa_year',$yearListed,'','class="form-control border-input" id="edit-moa_year"');?><br>
                            </div>
                        </div>
                        <div class="col-xs-12 ">
                            <div class="col-xs-12 col-lg-3 ">
                                <?= form_label('Date of Expiration','','style="margin:8px 0 0 0; "');?><br>
                            </div>
                            <div class="col-xs-12 col-lg-3 ">
                                <?= form_dropdown('edit-moa_exp_month',$monthListed,'','class="form-control border-input" id="edit-moa_exp_month"');?><br>
                            </div>
                            <div class="col-xs-12 col-lg-3 ">
                                <?= form_dropdown('edit-moa_exp_day',$dayList,'','class="form-control border-input" id="edit-moa_exp_day"');?><br>
                            </div>
                            <div class="col-xs-12 col-lg-3 ">
                                <?= form_dropdown('edit-moa_exp_year',$yearListed,'','class="form-control border-input" id="edit-moa_exp_year"');?><br>
                            </div>
                        </div>                       
                        <div class="col-xs-12 ">
                            <div class="col-xs-12 col-lg-3 ">
                                <?= form_label('Second Party','','style="margin:8px 0 0 0; "');?><br>
                            </div>
                            <div class="col-xs-12 col-lg-9 ">
                                <?= form_input('edit-second_party','','class="form-control border-input" id="edit-second_party"');?><br>
                            </div>                                            
                        </div>                       
                    </div>
                    <div id="edit-pacbrma" class="">                                        
                        <div class="col-xs-12 " id="sapa">
                            <div class="col-xs-12 col-lg-3 ">
                                <?= form_label('PACBRMA No.','','style="margin:8px 0 0 0; "');?><br>
                            </div>
                            <div class="col-xs-12 col-lg-9 ">
                                <?= form_input('edit-pacbrma_no','','class="form-control border-input" id="edit-pacbrma_no" placeholder="Region-Acronym of PA-Year issuence-Agreement no. issued for the PA"');?><br>
                            </div>
                        </div> 
                        <div class="col-xs-12 " id="sapa">
                            <div class="col-xs-12 col-lg-3 ">
                                <?= form_label('People Organization','','style="margin:8px 0 0 0; "');?><br>
                            </div>
                            <div class="col-xs-12 col-lg-9 ">
                                <?= form_input('edit-po','','class="form-control border-input" id="edit-po" placeholder="People Organization"');?><br>
                            </div>
                        </div>                                   
                    </div>
                    <!-- END OF MOA -->
                    <div class="col-xs-12 ">
                        <div class="col-xs-12 ">
                            <div class="col-xs-12 col-lg-3 ">
                                <?= form_label('Nature of Development','','style="margin:8px 0 0 0; "');?><br>
                            </div>
                            <div class="col-xs-12 col-lg-9 ">
                                <?= form_input('edit-nature_development','','class="form-control border-input" id="edit-nature_development"');?><br>
                            </div>    
                        </div>
                        <div class="col-xs-6 col-lg-3 ">
                           <?= form_label('Duration','','style="margin:8px 0 0 0; "')?>
                        </div>
                        <div class="col-xs-6 col-lg-3 ">
                            <?= form_dropdown('edit-yearstart',$yearListed,'','class="form-control border-input" id="edit-yearstart"');?>
                        </div>                                    
                        <div class="col-xs-6 col-lg-1 ">
                            <?= form_label('to','','style="margin:8px 0 0 20px;"');?>
                        </div>
                         <div class="col-xs-6 col-lg-3 ">
                            <?= form_dropdown('edit-yearend',$yearListed,'','class="form-control border-input" id="edit-yearend"');?><br>
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="col-xs-6 col-lg-3 ">
                            <?= form_label('Location','','style="margin:8px 0 0 0; "');?>
                        </div>
                        <div class="col-xs-6 col-lg-9 ">
                            <?= form_input('edit-proj_location','','class="form-control border-input" id="edit-proj_location" placeholder=""');?><br>                            
                        </div>
                    </div>
                     <div class="col-xs-12 ">
                         <div class="col-xs-6 col-lg-3 ">
                            <?= form_label('Area (has)','','style="margin:8px 0 0 0; "');?>
                        </div>
                        <div class="col-xs-6 col-lg-9 ">
                            <?= form_input('edit-area','','class="form-control border-input" id="edit-area" onkeyup="run(this)"');?><br>
                        </div>
                    </div>                     
                    <div class="col-xs-12 ">
                         <div class="col-xs-6 col-lg-3 ">
                            <?= form_label('Project Cost','','style="margin:8px 0 0 0; "');?>
                        </div>
                        <div class="col-xs-6 col-lg-9 ">
                            <?= form_input('edit-amount_fund','','class="form-control border-input" onkeyup="run(this)" id="edit-amount_fund"');?><br>
                        </div>
                    </div>
                                               
                    <div class="col-xs-12 ">
                        <div class="col-xs-12 col-lg-3 ">
                            <?= form_label('Remarks','','style="margin:8px 0 0 0; "');?><br>
                        </div>
                        <div class="col-xs-12 col-lg-9 ">
                            <?= form_textarea('edit-remarks','','class="form-control border-input" id="edit-remarks"');?><br>
                        </div>
                    </div>              
                    <div class="col-xs-12 " style="margin-top:10px">                                    
                        <div class="col-xs-12 ">
                            <div class="modal-footer">
                                <input class="btn btn-info" type="submit" name="submit" value="Update" id="UpdateProject" />                            
                            </div>
                        </div>
                    </div>
                     
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>
<!-- END OF MODAL FOR EDITTING A PROJECTS -->
<!-- MODAL EDITING FOR PROGRAMS -->
<form method="post" action="#" id="ProgramForm" role="form">  
    <div class="modal fade" id="modal-edit-program" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">            
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Programs</h4>
                </div>
                <input type="hidden" id="program-id" name="program-id" value="" />
                <input type="hidden" id="program-gencode" name="program-gencode" value="" />
                <div class="modal-body" style="display:inline-block"> 
                    <div class="col-xs-12 "> 
                        <div class="col-xs-12 col-lg-3">                               
                            <?php echo form_label('Program name','','style="margin:4px"'); ?>
                        </div>
                        <div class="col-xs-12 col-lg-9">                               
                            <?php echo form_input('edit-program-name','','class="form-control border-input" id="edit-program-name"'); ?><br>
                        </div>
                    </div> 
                    <div class="col-xs-12 "> 
                        <div class="col-xs-12 col-lg-3">                               
                            <?php echo form_label('Proponent','','style="margin:4px"'); ?>
                        </div>
                        <div class="col-xs-12 col-lg-9">                               
                            <?php echo form_input('edit-proponent','','class="form-control border-input" id="edit-proponent"'); ?><br>
                        </div>
                    </div>  
                    <div class="col-xs-12 "> 
                        <div class="col-xs-12 col-lg-3">                               
                            <?php echo form_label('Duration','','style="margin:4px"'); ?>
                        </div>
                         <div class="col-xs-12 col-lg-1">                               
                            <?php echo form_label('From','','style="margin:4px"'); ?>
                        </div>
                        <div class="col-xs-12 col-lg-3">                               
                            <?= form_dropdown('edit-start-month',$monthListed,'','class="form-control border-input" id="edit-start-month"');?><br>                
                        </div>
                        <div class="col-xs-12 col-lg-2">                               
                            <?= form_dropdown('edit-start-year',$yearListed,'','class="form-control border-input" id="edit-start-year"');?>                            
                        </div>
                    </div>   
                    <div class="col-xs-12 ">
                        <div class="col-xs-12 col-lg-3">                               
                            <?php echo form_label('&nbsp;','','style="margin:4px"'); ?>
                        </div>
                         <div class="col-xs-12 col-lg-1">                               
                            <?php echo form_label('To','','style="margin:4px"'); ?>
                        </div>
                        <div class="col-xs-12 col-lg-3">                               
                            <?= form_dropdown('edit-end-month',$monthListed,'','class="form-control border-input" id="edit-end-month"');?>                            
                        </div>
                        <div class="col-xs-12 col-lg-2">                               
                            <?= form_dropdown('edit-end-year',$yearListed,'','class="form-control border-input" id="edit-end-year"');?><br>                      
                        </div>
                    </div>  
                    <div class="col-xs-12 ">
                        <div class="col-xs-12 col-lg-3">                               
                            <?php echo form_label('Source of Fund;','','style="margin:4px"'); ?>
                        </div>
                        <div class="col-xs-12 col-lg-9">          
                            <select id="edit-source_fund" class="form-control border-input" name="edit-source_fund" >
                                <option value="" disabled default selected>Select</option>
                                <option value="Foreign Assisted">Foreign Assisted</option>
                                <option value="Government Fund">Government Fund</option>
                                <option value="Both: Foreign Assisted and Government Fund">Both: Foreign Assisted and Government Fund</option>    
                            </select> <br>
                        </div>                       
                    </div>   
                    <div class="col-xs-12 "> 
                        <div class="col-xs-12 col-lg-3">                               
                            <?php echo form_label('Program cost','','style="margin:4px"'); ?>
                        </div>
                        <div class="col-xs-12 col-lg-9">                               
                            <?php echo form_input('edit-cost','','class="form-control border-input" id="edit-cost"'); ?><br>
                        </div>
                    </div>  
                    <div class="col-xs-12 "> 
                        <div class="col-xs-12 col-lg-3">                               
                            <?php echo form_label('Program area(has)','','style="margin:4px"'); ?>
                        </div>
                        <div class="col-xs-12 col-lg-9">                               
                            <?php echo form_input('edit-program-area','','class="form-control border-input" id="edit-program-area"'); ?><br>
                        </div>
                    </div>  
                    <div class="col-xs-12 "> 
                        <div class="col-xs-12 col-lg-3">                               
                            <?php echo form_label('Location','','style="margin:4px"'); ?>
                        </div>
                        <div class="col-xs-12 col-lg-9">                               
                            <?php echo form_input('edit-program-location','','class="form-control border-input" id="edit-program-location"'); ?><br>
                        </div>
                    </div>     
                    <div class="col-xs-12 ">
                        <div class="col-xs-12 col-lg-3 ">
                            <?= form_label('Remarks','','style="margin:8px 0 0 0; "');?><br>
                        </div>
                        <div class="col-xs-12 col-lg-9 ">
                            <?= form_textarea('edit-program-remarks','','class="form-control border-input" id="edit-program-remarks"');?><br>
                        </div>
                    </div>  
                    <div class="col-xs-12 " style="margin-top:10px">                                    
                        <div class="col-xs-12 ">
                            <div class="modal-footer">
                                <input class="btn btn-info" type="submit" name="submit" value="Update" id="UpdateProgram" />                            
                            </div>
                        </div>
                    </div>                  
                </div>
            </div>
        </div>
    </div>
</form>


<!-- MODAL FOR EDITTING A LGU -->                                    
<form method="post" action="#" id="LGUform" role="form">  
    <div class="modal fade" id="modal-edit-lgu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">            
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit LGU Representatives</h4>
                </div>
                <input type="hidden" id="lgu-id" name="lgu-id" value="" />
                <input type="hidden" id="lgu-gencode" name="lgu-gencode" value="" />
                <div class="modal-body" style="display:inline-block"> 
                     <div class="col-xs-12">
                         <div class="col-xs-6 col-lg-3">
                            <?= form_label('Name of LGU','','style="margin:8px 0 0 0; "');?>
                        </div>
                        <div class="col-xs-6 col-lg-9">
                            <?= form_input('edit-lgu','','class="form-control border-input" id="edit-lgu"');?><br>
                        </div>
                    </div> 
                    <div class="col-xs-12" style="margin-top:10px">                                    
                        <div class="col-xs-12">
                            <div class="modal-footer">
                                <input class="btn btn-info" type="submit" name="submit" value="Submit" id="Updatelgu" />                            
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>
<!-- END OF MODAL FOR EDITTING A LGU -->
<form method="post" action="#" id="ResearchForm" role="form">  
    <div class="modal fade" id="modal-edit-research" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">            
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Researchers</h4>
                </div>
                <input type="hidden" id="research-id" name="research-id" value="" />
                <input type="hidden" id="research-gencode" name="research-gencode" value="" />
                <div class="modal-body" style="display:inline-block"> 
                    <div class="col-xs-12 " style="margin-top:10px"> 
                        <div class="col-xs-12 col-lg-12 ">                               
                            <?php echo form_label('Type of Researches','','style="margin:4px"').''.form_input('edit-search_type','','class="form-control border-input" id="edit-search_type"') ?>
                        </div>
                    </div>
                    <div class="col-xs-12 " style="margin-top:10px">                     
                        <div class="col-xs-12 col-lg-12 ">
                            <?= form_label('Title of research','','style="margin:4px"')." ".form_input('edit-search_title','','class="form-control border-input" id="edit-search_title"');?>
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="modal-footer">
                            <input class="btn btn-info" type="submit" name="submit" value="Update" id="UpdateResearch" />                            
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>

 <form method="post" action="#" id="StaffForm" role="form">  
    <div class="modal fade" id="modal-edit-staff" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">            
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Staff</h4>
                </div>
                <input type="hidden" id="staff-id" name="staff-id" value="" />
                <input type="hidden" id="staff-gencode" name="staff-gencode" value="" />
                <div class="modal-body" style="display:inline-block"> 
                    <div class="col-xs-12 ">
                        <legend>Technical Staff</legend>
                        <div class="col-xs-12 ">
                            <div class="col-xs-4 col-lg-4  field inner-addon left-addon">
                                <?= form_input('edit-tfname','','id="edit-tfname" placeholder="ex. John, Jane"').form_label('First Name','','for="edit-tfname"');?>
                            </div>
                            <div class="col-xs-4 col-lg-4  field inner-addon left-addon">
                                <?= form_input('edit-tmname','','id="edit-tmname" placeholder="ex. A., dela Cruz"').form_label('Middle Name','','for="edit-tmname"');?>
                            </div>
                            <div class="col-xs-4 col-lg-4  field inner-addon left-addon">
                                <?= form_input('edit-ttlname','','id="edit-ttlname" placeholder="ex. Rodriguez, Espino"').form_label('Last Name','','for="edit-ttlname"');?>
                            </div>
                        </div>
                        <div class="col-xs-12 ">
                            <div class="col-xs-6 col-lg-4 "  style="margin-top: 20px;">
                                <?= form_dropdown('edit-tsex',$sexList,'','class="select-css" id="edit-tsex"');?><br>
                            </div>
                            <div class="col-xs-6 col-lg-2  field inner-addon left-addon">
                            </div>
                            <div class="col-xs-6 col-lg-4  field inner-addon left-addon">
                                <?= form_input('edit-tage','','id="edit-tage" placeholder="Age"').form_label('Age','','for="edit-tage"');?>
                            </div>                                   
                        </div> 
                        <div class="col-xs-12 ">
                            <div class="col-xs-6 col-lg-4 "  style="margin-top: 20px;">
                                <?= form_dropdown('edit-tappointment',$tappointment,'','class="select-css" id="edit-tappointment"');?><br>
                            </div>
                            <div class="col-xs-6 col-lg-2  field inner-addon left-addon">
                            </div>
                            <div class="col-xs-6 col-lg-6  field inner-addon left-addon">
                                <?= form_input('edit-tposition','','id="edit-tposition" placeholder="example: Forester I,II,III / EMS I,II,III"').form_label('Position/Designation','','for="tposition"');?>
                            </div>                                   
                        </div> 
                        <div class="col-xs-12 ">
                            <div class="modal-footer">
                                <input class="btn btn-info" type="submit" name="submit" value="Update" id="UpdateStaff" />                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<form method="post" action="" id="TopoForm" enctype="multipart/form-data" role="form">  
    <div class="modal fade" id="modal-edit-topo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">            
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Topography and Slope</h4>
                </div>
                <input type="hidden" id="topo-id" name="topo-id" value="" />
                <input type="hidden" id="topo-gencode" name="topo-gencode" value="" />
                <div class="modal-body" style="display:inline-block"> 
                    <div class="col-xs-12 " style="margin-top:10px"> 
                        <div class="col-xs-12 col-lg-12 ">
                            <img width="200px" height="180px" id="edit-topo" src="<?php echo base_url("bmb_assets2/upload/topology_img/nophoto.jpg") ?>" alt="your image" /><br>
                            <input type='file' name="edit-pic_topo" id="edit-pic_topo" onchange="readURLsTopoedit(this);"  /><br>
                            <input type="hidden" name="edit-old_picture_topo" id="edit-old_picture_topo">  
                            <span id="edit-img_output" class="edit-img_output"></span>
                        </div>
                    </div> 
                    <div class="col-xs-12 " style="margin-top:10px"> 
                        <div class="col-xs-12 col-lg-12 ">                               
                            <?php echo form_label('Topology and Slope','','style="margin:4px"').''.form_textarea('edit-topo-desc','','class="form-control border-input" id="edit-topo-desc"') ?>
                        </div>
                    </div>
                    
                    <div class="col-xs-12 " style="margin-top:10px">                                    
                        <div class="col-xs-12 ">
                            <div class="modal-footer">
                                <input class="btn btn-info" type="submit" name="submit" value="Submit" id="UpdateTopo" onclick="UpdateEditTopo();" />                            
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>

<form method="post" action="" id="SoilForm" enctype="multipart/form-data" role="form">  
    <div class="modal fade" id="modal-edit-soil" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">            
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Geology and Slope</h4>
                </div>
                <input type="hidden" id="soil-id" name="soil-id" value="" />
                <input type="hidden" id="soil-gencode" name="soil-gencode" value="" />
                <div class="modal-body" style="display:inline-block"> 
                    <div class="col-xs-12 " style="margin-top:10px"> 
                        <div class="col-xs-12 col-lg-12 ">
                            <img width="200px" height="180px" id="edit-soil" src="<?php echo base_url("bmb_assets2/upload/topology_img/nophoto.jpg") ?>" alt="your image" /><br>
                            <input type='file' name="edit-pic_soil" id="edit-pic_soil" onchange="readURLsSoiledit(this);"  /><br>
                            <input type="" name="edit-old_picture_soil" id="edit-old_picture_soil">  
                            <span id="edit-img_output_soil" class="edit-img_output_soil"></span>
                        </div>
                    </div> 
                    <div class="col-xs-12 " style="margin-top:10px"> 
                        <div class="col-xs-12 col-lg-12 ">                               
                            <?php echo form_label('Soil Type','','style="margin:4px"').''.form_textarea('edit-soil-desc','','class="form-control border-input" id="edit-soil-desc"') ?>
                        </div>
                    </div>
                     <div class="col-xs-12 " style="margin-top:10px"> 
                        <div class="col-xs-12 col-lg-12 ">                               
                            <?php echo form_label('Rock Formation','','style="margin:4px"').''.form_textarea('edit-rock-desc','','class="form-control border-input" id="edit-rock-desc"') ?>
                        </div>
                    </div>
                    <div class="col-xs-12 " style="margin-top:10px">                                    
                        <div class="col-xs-12 ">
                            <div class="modal-footer">
                                <input class="btn btn-info" type="submit" name="submit" value="Submit" id="UpdateSoil" onclick="UpdateEditSoil();" />                            
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>

<form method="post" action="" id="ClimateForm" enctype="multipart/form-data" role="form">  
    <div class="modal fade" id="modal-edit-climate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">            
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Climate Type</h4>
                </div>
                <input type="hidden" id="climate-id" name="climate-id" value="" />
                <input type="hidden" id="climate-gencode" name="climate-gencode" value="" />
                <div class="modal-body" style="display:inline-block"> 
                    <div class="col-xs-12 " style="margin-top:10px"> 
                        <div class="col-xs-12 col-lg-12 ">
                            <img width="200px" height="180px" id="edit-climate" src="<?php echo base_url("bmb_assets2/upload/climate_img/nophoto.jpg") ?>" alt="your image" /><br>
                            <input type='file' name="edit-pic_climate" id="edit-pic_climate" onchange="readURLsClimateedit(this);"  /><br>
                            <input type="hidden" name="edit-old_picture_climate" id="edit-old_picture_climate">  
                            <span id="edit-img_output" class="edit-img_output"></span>
                        </div>
                    </div> 
                    <div class="col-xs-12 " style="margin-top:10px"> 
                        <div class="col-xs-12 col-lg-12 ">                               
                            <?php echo form_label('Climate Type','','style="margin:4px"').''.form_textarea('edit-climate-desc','','class="form-control border-input" id="edit-climate-desc"') ?>
                        </div>
                    </div>
                    
                    <div class="col-xs-12 " style="margin-top:10px">                                    
                        <div class="col-xs-12 ">
                            <div class="modal-footer">
                                <input class="btn btn-info" type="submit" name="submit" value="Submit" id="UpdateTopo" onclick="UpdateEditClimate();" />                            
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>

<form method="post" action="" id="LandslideForm" enctype="multipart/form-data" role="form">  
    <div class="modal fade" id="modal-edit-landslide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">            
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Landslide Susceptibility</h4>
                </div>
                <input type="hidden" id="landslide-id" name="landslide-id" value="" />
                <input type="hidden" id="landslide-gencode" name="landslide-gencode" value="" />
                <div class="modal-body" style="display:inline-block"> 
                    <div class="col-xs-12 " style="margin-top:10px"> 
                        <div class="col-xs-12 col-lg-12 ">
                            <img width="200px" height="180px" id="edit-landslide" src="<?php echo base_url("bmb_assets2/upload/landslide_img/nophoto.jpg") ?>" alt="your image" /><br>
                            <input type='file' name="edit-pic_landslide" id="edit-pic_landslide" onchange="readURLsLandslideedit(this);"  /><br>
                            <input type="hidden" name="edit-old_picture_landslide" id="edit-old_picture_landslide">  
                            <span id="edit-img_output" class="edit-img_output"></span>
                        </div>
                    </div> 
                    <div class="col-xs-12 " style="margin-top:10px"> 
                        <div class="col-xs-12 col-lg-12 ">                               
                            <?php echo form_label('Landslide description','','style="margin:4px"').''.form_textarea('edit-landslide-desc','','class="form-control border-input" id="edit-landslide-desc"') ?>
                        </div>
                    </div>
                    
                    <div class="col-xs-12 " style="margin-top:10px">                                    
                        <div class="col-xs-12 ">
                            <div class="modal-footer">
                                <input class="btn btn-info" type="submit" name="submit" value="Submit" id="UpdateTopo" onclick="UpdateEditLandslide();" />                            
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>

<form method="post" action="" id="FloodingForm" enctype="multipart/form-data" role="form">  
    <div class="modal fade" id="modal-edit-flooding" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">            
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Flooding Susceptibility</h4>
                </div>
                <input type="hidden" id="flooding-id" name="flooding-id" value="" />
                <input type="hidden" id="flooding-gencode" name="flooding-gencode" value="" />
                <div class="modal-body" style="display:inline-block"> 
                    <div class="col-xs-12 " style="margin-top:10px"> 
                        <div class="col-xs-12 col-lg-12 ">
                            <img width="200px" height="180px" id="edit-flooding" src="<?php echo base_url("bmb_assets2/upload/flooding_img/nophoto.jpg") ?>" alt="your image" /><br>
                            <input type='file' name="edit-pic_flooding" id="edit-pic_flooding" onchange="readURLsFloodingedit(this);"  /><br>
                            <input type="hidden" name="edit-old_picture_flooding" id="edit-old_picture_flooding">  
                            <span id="edit-img_output" class="edit-img_output"></span>
                        </div>
                    </div> 
                    <div class="col-xs-12 " style="margin-top:10px"> 
                        <div class="col-xs-12 col-lg-12 ">                               
                            <?php echo form_label('Flooding description','','style="margin:4px"').''.form_textarea('edit-flooding-desc','','class="form-control border-input" id="edit-flooding-desc"') ?>
                        </div>
                    </div>
                    
                    <div class="col-xs-12 " style="margin-top:10px">                                    
                        <div class="col-xs-12 ">
                            <div class="modal-footer">
                                <input class="btn btn-info" type="submit" name="submit" value="Submit" id="UpdateTopo" onclick="UpdateEditFlooding();" />                            
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>

<form method="post" action="" id="SeaForm" enctype="multipart/form-data" role="form">  
    <div class="modal fade" id="modal-edit-sea" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">            
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Sea level rise</h4>
                </div>
                <input type="hidden" id="sea-id" name="sea-id" value="" />
                <input type="hidden" id="sea-gencode" name="sea-gencode" value="" />
                <div class="modal-body" style="display:inline-block"> 
                    <div class="col-xs-12 " style="margin-top:10px"> 
                        <div class="col-xs-12 col-lg-12 ">
                            <img width="200px" height="180px" id="edit-sea" src="<?php echo base_url("bmb_assets2/upload/sealevel_img/nophoto.jpg") ?>" alt="your image" /><br>
                            <input type='file' name="edit-pic_sea" id="edit-pic_sea" onchange="readURLsSeaedit(this);"  /><br>
                            <input type="hidden" name="edit-old_picture_sea" id="edit-old_picture_sea">  
                            <span id="edit-img_output" class="edit-img_output"></span>
                        </div>
                    </div> 
                    <div class="col-xs-12 " style="margin-top:10px"> 
                        <div class="col-xs-12 col-lg-12 ">                               
                            <?php echo form_label('Sea level rise description','','style="margin:4px"').''.form_textarea('edit-sea-desc','','class="form-control border-input" id="edit-sea-desc"') ?>
                        </div>
                    </div>
                    
                    <div class="col-xs-12 " style="margin-top:10px">                                    
                        <div class="col-xs-12 ">
                            <div class="modal-footer">
                                <input class="btn btn-info" type="submit" name="submit" value="Submit" id="UpdateSea" onclick="UpdateEditSea();" />                            
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>

<form method="post" action="" id="TsunamiForm" enctype="multipart/form-data" role="form">  
    <div class="modal fade" id="modal-edit-tsunami" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">            
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Tsunami Susceptibility</h4>
                </div>
                <input type="hidden" id="tsunami-id" name="tsunami-id" value="" />
                <input type="hidden" id="tsunami-gencode" name="tsunami-gencode" value="" />
                <div class="modal-body" style="display:inline-block"> 
                    <div class="col-xs-12 " style="margin-top:10px"> 
                        <div class="col-xs-12 col-lg-12 ">
                            <img width="200px" height="180px" id="edit-tsunami" src="<?php echo base_url("bmb_assets2/upload/tsunami_img/nophoto.jpg") ?>" alt="your image" /><br>
                            <input type='file' name="edit-pic_tsunami" id="edit-pic_tsunami" onchange="readURLsTsunamiedit(this);"  /><br>
                            <input type="hidden" name="edit-old_picture_tsunami" id="edit-old_picture_tsunami">  
                            <span id="edit-img_output" class="edit-img_output"></span>
                        </div>
                    </div> 
                    <div class="col-xs-12 " style="margin-top:10px"> 
                        <div class="col-xs-12 col-lg-12 ">                               
                            <?php echo form_label('Tsunami description','','style="margin:4px"').''.form_textarea('edit-tsunami-desc','','class="form-control border-input" id="edit-tsunami-desc"') ?>
                        </div>
                    </div>
                    
                    <div class="col-xs-12 " style="margin-top:10px">                                    
                        <div class="col-xs-12 ">
                            <div class="modal-footer">
                                <input class="btn btn-info" type="submit" name="submit" value="Submit" id="UpdateTsunami" onclick="UpdateEditTsunami();" />                            
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>

<form method="post" action="" id="AttractionForm" enctype="multipart/form-data" role="form">  
    <div class="modal fade" id="modal-edit-attraction" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">            
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Attraction</h4>
                </div>
                <input type="hidden" id="attraction-id" name="attraction-id" value="" />
                <input type="hidden" id="attraction-gencode" name="attraction-gencode" value="" />
                <div class="modal-body" style="display:inline-block"> 
                    <div class="col-xs-12 " style="margin-top:10px"> 
                        <div class="col-xs-12 col-lg-12 ">
                            <img width="200px" height="180px" id="edit-attraction" src="<?php echo base_url("bmb_assets2/upload/attraction_img/nophoto.jpg") ?>" alt="your image" /><br>
                            <input type='file' name="edit-pic_attraction" id="edit-pic_attraction" onchange="readURLsAttractionsedit(this);"  /><br>
                            <input type="hidden" name="edit-old_picture_attraction" id="edit-old_picture_attraction">  
                            <span id="edit-img_output" class="edit-img_output"></span>
                        </div>
                    </div> 
                    <div class="col-xs-12" style="margin-top:10px"> 
                        <div class="col-xs-12 col-lg-12"> 
                            <?= form_label('Title','','').form_input('edit-attraction-title','','class="form-control border-input" id="edit-attraction-title" placeholder=" "');?>
                        </div>   
                        <div class="col-xs-12 col-lg-12 ">                               
                            <?php echo form_label('Description','','style="margin:4px"').''.form_textarea('edit-attraction-desc','','class="form-control border-input" id="edit-attraction-desc"') ?>
                        </div>
                    </div>
                    
                    <div class="col-xs-12 " style="margin-top:10px">                                    
                        <div class="col-xs-12 ">
                            <div class="modal-footer">
                                <input class="btn btn-info" type="submit" name="submit" value="Submit" id="UpdatAttraction" onclick="UpdateEditAttraction();" />                            
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>

<form method="post" action="" id="FacilityForm" enctype="multipart/form-data" role="form">  
    <div class="modal fade" id="modal-edit-facility" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">            
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Facility</h4>
                </div>
                <input type="hidden" id="facility-id" name="facility-id" value="" />
                <input type="hidden" id="facility-gencode" name="facility-gencode" value="" />
                <div class="modal-body" style="display:inline-block"> 
                    <div class="col-xs-12 " style="margin-top:10px"> 
                        <div class="col-xs-12 col-lg-12 ">
                            <img width="200px" height="180px" id="edit-facility" src="<?php echo base_url("bmb_assets2/upload/facilities_img/nophoto.jpg") ?>" alt="your image" /><br>
                            <input type='file' name="edit-pic_facility" id="edit-pic_facility" onchange="readURLsFacilityedit(this);"  /><br>
                            <input type="hidden" name="edit-old_picture_facility" id="edit-old_picture_facility">  
                            <span id="edit-img_output" class="edit-img_output"></span>
                        </div>
                    </div> 
                    <div class="col-xs-12" style="margin-top:10px"> 
                        <div class="col-xs-12 col-lg-12"> 
                            <?= form_label('Title','','').form_input('edit-facility-title','','class="form-control border-input" id="edit-facility-title" placeholder=" "');?>
                        </div>   
                        <div class="col-xs-12 col-lg-12">                               
                            <?php echo form_label('Description','','style="margin:4px"').''.form_textarea('edit-facility-desc','','class="form-control border-input" id="edit-facility-desc"') ?>
                        </div>
                    </div>
                    
                    <div class="col-xs-12 " style="margin-top:10px">                                    
                        <div class="col-xs-12 ">
                            <div class="modal-footer">
                                <input class="btn btn-info" type="submit" name="submit" value="Submit" id="UpdatAttraction" onclick="UpdateEditFacility();" />                            
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>

<form method="post" action="" id="ActivityForm" enctype="multipart/form-data" role="form">  
    <div class="modal fade" id="modal-edit-activity" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">            
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Activity</h4>
                </div>
                <input type="hidden" id="activity-id" name="activity-id" value="" />
                <input type="hidden" id="activity-gencode" name="activity-gencode" value="" />
                <div class="modal-body" style="display:inline-block"> 
                    <div class="col-xs-12 " style="margin-top:10px"> 
                        <div class="col-xs-12 col-lg-12 ">
                            <img width="200px" height="180px" id="edit-activity" src="<?php echo base_url("bmb_assets2/upload/facilities_img/nophoto.jpg") ?>" alt="your image" /><br>
                            <input type='file' name="edit-pic_activity" id="edit-pic_activity" onchange="readURLsFacilityedit(this);"  /><br>
                            <input type="hidden" name="edit-old_picture_activity" id="edit-old_picture_activity">  
                            <span id="edit-img_output" class="edit-img_output"></span>
                        </div>
                    </div> 
                    <div class="col-xs-12" style="margin-top:10px"> 
                        <div class="col-xs-12 col-lg-12"> 
                            <?= form_label('Title','','').form_input('edit-activity-title','','class="form-control border-input" id="edit-activity-title" placeholder=" "');?>
                        </div>   
                        <div class="col-xs-12 col-lg-12">                               
                            <?php echo form_label('Description','','style="margin:4px"').''.form_textarea('edit-activity-desc','','class="form-control border-input" id="edit-activity-desc"') ?>
                        </div>
                    </div>
                    
                    <div class="col-xs-12 " style="margin-top:10px">                                    
                        <div class="col-xs-12 ">
                            <div class="modal-footer">
                                <input class="btn btn-info" type="submit" name="submit" value="Submit" id="UpdatAttraction" onclick="UpdateEditActivity();" />                            
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>

<form method="post" action="" id="AgroForm" enctype="multipart/form-data" role="form">  
    <div class="modal fade" id="modal-edit-agro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">            
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Agroforestry</h4>
                </div>
                <input type="hidden" id="agro-id" name="agro-id" value="" />
                <input type="hidden" id="agro-gencode" name="agro-gencode" value="" />
                <div class="modal-body" style="display:inline-block"> 
                    <div class="col-xs-12 " style="margin-top:10px"> 
                        <div class="col-xs-12 col-lg-12 ">
                            <img width="200px" height="180px" id="edit-agro" src="<?php echo base_url("bmb_assets2/upload/agroforestry_img/nophoto.jpg") ?>" alt="your image" /><br>
                            <input type='file' name="edit-pic_agro" id="edit-pic_agro" onchange="readURLsAgroedit(this);"  /><br>
                            <input type="hidden" name="edit-old_picture_agro" id="edit-old_picture_agro">  
                            <span id="edit-img_output" class="edit-img_output"></span>
                        </div>
                    </div> 
                    <div class="col-xs-12" style="margin-top:10px"> 
                        <div class="col-xs-12 col-lg-12"> 
                            <?= form_label('Title','','').form_input('edit-agro-title','','class="form-control border-input" id="edit-agro-title" placeholder=" "');?>
                        </div>   
                        <div class="col-xs-12 col-lg-12">                               
                            <?php echo form_label('Description','','style="margin:4px"').''.form_textarea('edit-agro-desc','','class="form-control border-input" id="edit-agro-desc"') ?>
                        </div>
                        <div class="col-xs-12 col-lg-12"> 
                            <?= form_label('Area(has)','','').form_input('edit-agro-area','','class="form-control border-input" onkeyup="run(this);" id="edit-agro-area" placeholder=" "');?>
                        </div>
                    </div>
                    
                    <div class="col-xs-12 " style="margin-top:10px">                                    
                        <div class="col-xs-12 ">
                            <div class="modal-footer">
                                <input class="btn btn-info" type="submit" name="submit" value="Submit" id="UpdatAttraction" onclick="UpdateEditAgro();" />                            
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>

<form method="post" action="" id="MapForm" enctype="multipart/form-data" role="form">  
    <div class="modal fade" id="modal-edit-map" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">            
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Map Image</h4>
                </div>
                <input type="hidden" id="map-id" name="map-id" value="" />
                <input type="hidden" id="map-gencode" name="map-gencode" value="" />
                <div class="modal-body" style="display:inline-block"> 
                    <div class="col-xs-12 " style="margin-top:10px"> 
                        <div class="col-xs-12 col-lg-12 ">
                            <img width="200px" height="180px" id="edit-MapImg" src="<?php echo base_url("bmb_assets2/upload/img_threat/nophoto.jpg") ?>" alt="your image" /><br>
                            <input type='file' name="edit-pic_map" id="edit-pic_map" onchange="readURLsMapedit(this);"  /><br>
                            <input type="hidden" name="edit-old_picture_map" id="edit-old_picture_map">  
                            <span id="edit-img_output" class="edit-img_output"></span>
                        </div>
                    </div> 
                    <div class="col-xs-12 " style="margin-top:10px"> 
                        <div class="col-xs-12 col-lg-12 ">                               
                            <?php echo form_label('Remarks','','style="margin:4px"').''.form_textarea('edit-map-desc','','class="form-control border-input" id="edit-map-desc"') ?>
                        </div>
                    </div>
                    
                    <div class="col-xs-12 " style="margin-top:10px">                                    
                        <div class="col-xs-12 ">
                            <div class="modal-footer">
                                <input class="btn btn-info" type="submit" name="submit" value="Submit" id="UpdateThreats" onclick="UpdateMaps();" />                            
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>

<form method="post" action="" id="IncomeForm" enctype="multipart/form-data" role="form">  
    <div class="modal fade" id="modal-edit-income" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">            
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Monitoring of Income Generated within Protected Area</h4>
                </div>
                <input type="hidden" id="income-id" name="income-id" value="" />
                <input type="hidden" id="income-gencode" name="income-gencode" value="" />
                <div class="modal-body" style="display:inline-block">        
                <fieldset>
                    <legend>Date Issued</legend>                                   
                    <div class="col-xs-6 col-lg-6 ">
                        <?= form_dropdown('edit-monitor_months-inv',$monthListed,'','class="form-control border-input select-css" id="edit-monitor_months-inv"'); ?>
                    </div>
                    <div class="col-xs-6 col-lg-6 ">
                        <?= form_dropdown('edit-monitor_years-inv',$yearListed,'','class="form-control border-input select-css" id="edit-monitor_years-inv"'); ?><br>
                    </div>
                </fieldset>             
                   <fieldset>
                        <legend>Income Generated (Peso)</legend>
                        <div class="col-xs-12 col-lg-12 field inner-addon left-addon">  
                            <i class="fa fa-rub"></i>                                  
                            <?= form_input('edit-entrancefee','','placeholder="Amount (Peso)" id="edit-entrancefee" onchange="calculator_ipaf()" onkeyup="run(this)"').form_label('Entrance Fee','','for="edit-entrancefee"') ?>
                        </div>
                        <div class="col-xs-12 col-lg-12 field inner-addon left-addon">  
                            <i class="fa fa-rub"></i>                                  
                            <?= form_input('edit-income_facilities','','placeholder="Amount (Peso)" id="edit-income_facilities" onchange="calculator_ipaf()" onkeyup="run(this)"').form_label('Facilities User Fee','','for="edit-income_facilities"') ?>
                        </div>
                        <div class="col-xs-12 col-lg-12 field inner-addon left-addon">  
                            <i class="fa fa-rub"></i>                                  
                            <?= form_input('edit-resource','','placeholder="Amount (Peso)" id="edit-resource" onchange="calculator_ipaf()" onkeyup="run(this)"').form_label('Resource User Fee','','for="edit-resource"') ?>
                        </div>
                        <div class="col-xs-12 col-lg-12 field inner-addon left-addon">  
                            <i class="fa fa-rub"></i>                                  
                            <?= form_input('edit-concession','','placeholder="Amount (Peso)" id="edit-concession" onchange="calculator_ipaf()" onkeyup="run(this)"').form_label('Concession Fee','','for="edit-concession"') ?>
                        </div>
                        <div class="col-xs-12 col-lg-12 field inner-addon left-addon">  
                            <i class="fa fa-rub"></i>                                  
                            <?= form_input('edit-development','','placeholder="Amount (Peso)" id="edit-development" onchange="calculator_ipaf()" onkeyup="run(this)"').form_label('Devt Fee/ Royalty','','for="edit-development"') ?>
                        </div>
                        <div class="col-xs-12 col-lg-12 field inner-addon left-addon">                                                                                  
                            <i class="fa fa-rub"></i>                                  
                            <?= form_input('edit-finespenalties','','placeholder="Amount (Peso)" id="edit-finespenalties" onchange="calculator_ipaf()" onkeyup="run(this)"').form_label('Fines and Penalties','','for="edit-finespenalties"') ?>
                        </div>
                        <div class="col-xs-6 col-lg-6 field inner-addon left-addon">                                                                                  
                            <i class="fa fa-pencil"></i>                                  
                            <?= form_input('edit-other_specify_title','','placeholder="Description" id="edit-other_specify_title"').form_label('Others(specify)','','for="edit-other_specify_title"') ?>
                        </div>
                        <div class="col-xs-6 col-lg-6 field inner-addon left-addon">                                                                                  
                            <i class="fa fa-rub"></i>                                  
                            <?= form_input('edit-other_specify_amount','','placeholder="Amount (Peso)" id="edit-other_specify_amount" onchange="calculator_ipaf()" onkeyup="run(this)"').form_label('Amount','','for="edit-other_specify_amount"') ?>
                        </div>
                    </fieldset>
                    <div class="col-xs-12 " style="margin-top:10px">                                    
                        <div class="col-xs-12 ">
                            <div class="modal-footer">
                                <input class="btn btn-info" type="submit" name="submit" value="Submit" id="UpdateThreats" onclick="UpdateIncome();" />                            
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>

<form method="post" action="" id="VisitorsForm" enctype="multipart/form-data" role="form">  
    <div class="modal fade" id="modal-edit-visitors" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">            
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Monitoring of Protected Area Visitors</h4>
                </div>
                <input type="hidden" id="visitors-id" name="visitors-id" value="" />
                <input type="hidden" id="visitors-gencode" name="visitors-gencode" value="" />
                <div class="modal-body" style="display:inline-block">        
                    <fieldset>
                        <legend>Date Issued</legend>                                   
                        <div class="col-xs-6 col-lg-6 ">
                            <?= form_dropdown('edit-monitor_months-visitors',$monthListed,'','class="form-control border-input select-css" id="edit-monitor_months-visitors"'); ?>
                        </div>
                        <div class="col-xs-6 col-lg-6 ">
                            <?= form_dropdown('edit-monitor_years-visitors',$yearListed,'','class="form-control border-input select-css" id="edit-monitor_years-visitors"'); ?><br>
                        </div>
                    </fieldset>             
                    <fieldset>
                        <legend>Local</legend>
                        <div class="col-xs-6 col-lg-6 field inner-addon left-addon">                                        
                        <i class="fa fa-venus"></i>                                  
                            <?= form_input('edit-no_male_local','','placeholder=" " id="edit-no_male_local" onkeyup="run(this)"').form_label('Male','','for="edit-no_male_local"') ?>
                        </div>
                        <div class="col-xs-6 col-lg-6 field inner-addon left-addon">                                        
                        <i class="fa fa-mars"></i>                                  
                            <?= form_input('edit-no_female_local','','placeholder=" " id="edit-no_female_local" onkeyup="run(this)"').form_label('Female','','for="edit-no_female_local"') ?>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Foreign</legend>
                        <div class="col-xs-6 col-lg-6 field inner-addon left-addon">                                        
                        <i class="fa fa-venus"></i>                                  
                            <?= form_input('edit-no_male_foreign','','placeholder=" " id="edit-no_male_foreign" onkeyup="run(this)"').form_label('Male','','for="edit-no_male_foreign"') ?>
                        </div>
                        <div class="col-xs-6 col-lg-6 field inner-addon left-addon">                                        
                        <i class="fa fa-mars"></i>                                  
                            <?= form_input('edit-no_female_foreign','','placeholder=" " id="edit-no_female_foreign" onkeyup="run(this)"').form_label('Female','','for="edit-no_female_foreign"') ?>
                        </div>
                    </fieldset>
                    <div class="col-xs-12 " style="margin-top:10px">                                    
                        <div class="col-xs-12 ">
                            <div class="modal-footer">
                                <input class="btn btn-info" type="submit" name="submit" value="Submit" id="UpdateVisitors" onclick="UpdateVisitor();" />                            
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>
<form method="post" action="" id="ContriForm" enctype="multipart/form-data" role="form">  
    <div class="modal fade" id="modal-edit-contri" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">            
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Contribution/Donation</h4>
                </div>
                <input type="hidden" id="contri-id" name="contri-id" value="" />
                <input type="hidden" id="contri-gencode" name="contri-gencode" value="" />
                <div class="modal-body" style="display:inline-block">        
                    <legend>Contribution/Donation</legend>
                    <fieldset>
                        <legend>Date Issued</legend>                                   
                        <div class="col-xs-6 col-lg-6 ">
                            <?= form_dropdown('edit-monitor_months-contri',$monthListed,'','class="form-control border-input select-css" id="edit-monitor_months-contri"'); ?>
                        </div>
                        <div class="col-xs-6 col-lg-6 ">
                            <?= form_dropdown('edit-monitor_years-contri',$yearListed,'','class="form-control border-input select-css" id="edit-monitor_years-contri"'); ?><br>
                        </div>
                    </fieldset>  
                    <fieldset>
                        <div class="col-xs-12 col-lg-6 field">     
                            <?= form_dropdown('edit-contribution',$financialList,'','id="edit-contribution" class="select-css"').form_label('Trust Fund','','for="edit-contribution"'); ?>
                            <span class="errors"></span><br>
                        </div>
                        <div class="col-xs-12 col-lg-6 field" id="donation">     
                            <?= form_dropdown('edit-mode_donation',$modepayment,'','id="edit-mode_donation" class="select-css"').form_label('Mode of Payment','','for="edit-mode_donation"'); ?><br>
                        </div>
                        <div class="col-xs-12 col-lg-12 field inner-addon left-addon">                                                                                  
                            <i class="fa fa-rub"></i>                                  
                            <?= form_input('edit-financial_amount','','placeholder="Amount (Peso)" id="edit-financial_amount" onchange="calculator_ipaf()" onkeyup="run(this)"').form_label('Estimated Monitary Value','','for="edit-financial_amount"') ?>
                        </div>
                        <div class="col-xs-12 col-lg-12 field inner-addon left-addon">
                            <?= form_textarea('edit-financial_details','','placeholder="Details" id="edit-financial_details" style="height:100px"').form_label('Remarks','','for="edit-financial_details"') ?>
                        </div>
                    </fieldset>
                    <div class="col-xs-12 " style="margin-top:10px">                                    
                        <div class="col-xs-12 ">
                            <div class="modal-footer">
                                <input class="btn btn-info" type="submit" name="submit" value="Submit" id="UpdateContri" onclick="UpdateContris();" />                            
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>
<script type="text/javascript">

var mylinkPAMO = document.getElementById('UpdateStaff');
mylinkPAMO.onclick = function()
    {      
       $.ajax({
        url : BASE_URL+'pasu/pamain/update_staff',
        type: "POST",
        data: $('#StaffForm').serialize(),
        dataType: "JSON",
        success:function(response){
            if(response.error){

            }else{
             alert('Successful Update');
             var res = response.result;
            }
        }
        });
        
    }

var myLinkmulti = document.getElementById('UpdateMultiple');
myLinkmulti.onclick = function()
    {      
       $.ajax({
        url : BASE_URL+'pasu/pamain/update_Multiple',
        type: "POST",
        data: $('#MultipleUsed').serialize(),
        dataType: "JSON",
        success:function(response){
            if(response.error){

            }else{
             alert('Successful Update');
             var res = response.result;
            }
        }
        });
        
    }
var myLinkstrict = document.getElementById('UpdateStrict');
myLinkstrict.onclick = function()
    {      
       $.ajax({
        url : BASE_URL+'pasu/pamain/update_sProt',
        type: "POST",
        data: $('#strictProtect').serialize(),
        dataType: "JSON",
        success:function(response){
            if(response.error){

            }else{
             alert('Successful Update');
             var res = response.result;
            }
        }
        });
        
    }

var myLinkmem = document.getElementById('UpdateMem');
myLinkmem.onclick = function()
    {      
       $.ajax({
        url : BASE_URL+'pasu/pamain/update_service',
        type: "POST",
        data: $('#PambmEmber').serialize(),
        dataType: "JSON",
        success:function(response){
            if(response.error){

            }else{
             alert('Successful Update');
             var res = response.result;
            }
        }
        });
        
    }

var myLinkref = document.getElementById('Updateref');
myLinkref.onclick = function()
    {      
       $.ajax({
        url : BASE_URL+'pasu/pamain/update_reference',
        type: "POST",
        data: $('#ReferenceForm').serialize(),
        dataType: "JSON",
        success:function(response){
            if(response.error){

            }else{
             alert('Successful Update');
             var res = response.result;
            }
        }
        });
        
    }
function ssssss()
{    
    var formdata = new FormData();
    formdata.append('edit-pic_threat', document.getElementById('edit-pic_threat').files[0]);

    var other_data = $('#ThreatsForm').serializeArray();
    $.each(other_data,function(key,input){
        formdata.append(input.name,input.value);
    });

   $.ajax({
    url : BASE_URL + 'pasu/pamain/update_threat',
    method: 'POST',
    contentType: false,
    cache: false,
    processData: false,
    data: formdata,
    dataType: "JSON",
    success:function(response){
                if(response.error){

            }else{
             alert('Successful Update');
             var res = response.result;
            }
        }
   });
}

function UpdateMaps()
{    
    var formdata = new FormData();
    formdata.append('edit-pic_map', document.getElementById('edit-pic_map').files[0]);

    var other_data = $('#MapForm').serializeArray();
    $.each(other_data,function(key,input){
        formdata.append(input.name,input.value);
    });

   $.ajax({
    url : BASE_URL + 'pasu/pamain/update_map',
    method: 'POST',
    contentType: false,
    cache: false,
    processData: false,
    data: formdata,
    dataType: "JSON",
    success:function(response){
                if(response.error){

            }else{
             alert('Successful Update');
             var res = response.result;
            }
        }
   });
}

function UpdateIncome()
{      
   $.ajax({
    url : BASE_URL+'pasu/pamain/update_income',
    type: "POST",
    data: $('#IncomeForm').serialize(),
    dataType: "JSON",    
    success:function(response){
                if(response.error){

            }else{
             alert('Successful Update');
             var res = response.result;
            }
        }
   });
}

function UpdateVisitor()
{      
   $.ajax({
    url : BASE_URL+'pasu/pamain/update_visitors',
    type: "POST",
    data: $('#VisitorsForm').serialize(),
    dataType: "JSON",    
    success:function(response){
                if(response.error){

            }else{
             alert('Successful Update');
             var res = response.result;
            }
        }
   });
}

function UpdateContris()
{      
   $.ajax({
    url : BASE_URL+'pasu/pamain/update_contri',
    type: "POST",
    data: $('#ContriForm').serialize(),
    dataType: "JSON",    
    success:function(response){
                if(response.error){

            }else{
             alert('Successful Update');
             var res = response.result;     
             }           
        }
   });
}

// function UpdateEditTopo()
// {    
//     var formdata = new FormData();
//     formdata.append('edit-pic_topo', document.getElementById('edit-pic_topo').files[0]);

//     var other_data = $('#TopoForm').serializeArray();
//     $.each(other_data,function(key,input){
//         formdata.append(input.name,input.value);
//     });

//    $.ajax({
//     url : BASE_URL + 'pasu/pamain/update_topo',
//     method: 'POST',
//     contentType: false,
//     cache: false,
//     processData: false,
//     data: formdata,
//     dataType: "JSON",
//     success:function(response){
//                 if(response.error){

//             }else{
//              alert('Successful Update');
//              var res = response.result;
//             }
//         }
//    });
// }

function UpdateEditClimate()
{    
    var formdata = new FormData();
    formdata.append('edit-pic_climate', document.getElementById('edit-pic_climate').files[0]);

    var other_data = $('#ClimateForm').serializeArray();
    $.each(other_data,function(key,input){
        formdata.append(input.name,input.value);
    });

   $.ajax({
    url : BASE_URL + 'pasu/pamain/update_climate',
    method: 'POST',
    contentType: false,
    cache: false,
    processData: false,
    data: formdata,
    dataType: "JSON",
    success:function(response){
                if(response.error){

            }else{
             alert('Successful Update');
             var res = response.result;
            }
        }
   });
}

function UpdateEditLandslide()
{    
    var formdata = new FormData();
    formdata.append('edit-pic_landslide', document.getElementById('edit-pic_landslide').files[0]);

    var other_data = $('#LandslideForm').serializeArray();
    $.each(other_data,function(key,input){
        formdata.append(input.name,input.value);
    });

   $.ajax({
    url : BASE_URL + 'pasu/pamain/update_landslide',
    method: 'POST',
    contentType: false,
    cache: false,
    processData: false,
    data: formdata,
    dataType: "JSON",
    success:function(response){
                if(response.error){

            }else{
             alert('Successful Update');
             var res = response.result;

            }
        }
   });

    

}

function UpdateEditFlooding()
{    
    var formdata = new FormData();
    formdata.append('edit-pic_flooding', document.getElementById('edit-pic_flooding').files[0]);

    var other_data = $('#FloodingForm').serializeArray();
    $.each(other_data,function(key,input){
        formdata.append(input.name,input.value);
    });

   $.ajax({
    url : BASE_URL + 'pasu/pamain/update_flooding',
    method: 'POST',
    contentType: false,
    cache: false,
    processData: false,
    data: formdata,
    dataType: "JSON",
    success:function(response){
                if(response.error){

            }else{
             alert('Successful Update');
             var res = response.result;
            }
        }
   });
}

function UpdateEditSea()
{    
    var formdata = new FormData();
    formdata.append('edit-pic_sea', document.getElementById('edit-pic_sea').files[0]);

    var other_data = $('#SeaForm').serializeArray();
    $.each(other_data,function(key,input){
        formdata.append(input.name,input.value);
    });

   $.ajax({
    url : BASE_URL + 'pasu/pamain/update_sea',
    method: 'POST',
    contentType: false,
    cache: false,
    processData: false,
    data: formdata,
    dataType: "JSON",
    success:function(response){
                if(response.error){

            }else{
             alert('Successful Update');
             var res = response.result;
            }
        }
   });
}

function UpdateEditTsunami()
{    
    var formdata = new FormData();
    formdata.append('edit-pic_tsunami', document.getElementById('edit-pic_tsunami').files[0]);

    var other_data = $('#TsunamiForm').serializeArray();
    $.each(other_data,function(key,input){
        formdata.append(input.name,input.value);
    });

   $.ajax({
    url : BASE_URL + 'pasu/pamain/update_tsunami',
    method: 'POST',
    contentType: false,
    cache: false,
    processData: false,
    data: formdata,
    dataType: "JSON",
    success:function(response){
                if(response.error){

            }else{
             alert('Successful Update');
             var res = response.result;
            }
        }
   });
}

function UpdateEditGeohazard()
{    
    var formdata = new FormData();
    formdata.append('edit-pic_geohazard', document.getElementById('edit-pic_geohazard').files[0]);

    var other_data = $('#GeohazardForm').serializeArray();
    $.each(other_data,function(key,input){
        formdata.append(input.name,input.value);
    });

   $.ajax({
    url : BASE_URL + 'pasu/pamain/update_geohazard',
    method: 'POST',
    contentType: false,
    cache: false,
    processData: false,
    data: formdata,
    dataType: "JSON",
    success:function(response){
                if(response.error){

            }else{
             alert('Successful Update');
             var res = response.result;
            }
        }
   });
}


function UpdateEditAttractiond()
{    
    var formdata = new FormData();
    formdata.append('edit-pic_attraction', document.getElementById('edit-pic_attraction').files[0]);

    var other_data = $('#AttractionForm').serializeArray();
    $.each(other_data,function(key,input){
        formdata.append(input.name,input.value);
    });

   $.ajax({
    url : BASE_URL + 'pasu/pamain/update_attraction',
    method: 'POST',
    contentType: false,
    cache: false,
    processData: false,
    data: formdata,
    dataType: "JSON",
    success:function(response){
                if(response.error){

            }else{
             alert('Successful Update');
             var res = response.result;
            }
        }
   });
}

function UpdateEditFacility()
{    
    var formdata = new FormData();
    formdata.append('edit-pic_facility', document.getElementById('edit-pic_facility').files[0]);

    var other_data = $('#FacilityForm').serializeArray();
    $.each(other_data,function(key,input){
        formdata.append(input.name,input.value);
    });

   $.ajax({
    url : BASE_URL + 'pasu/pamain/update_facility',
    method: 'POST',
    contentType: false,
    cache: false,
    processData: false,
    data: formdata,
    dataType: "JSON",
    success:function(response){
                if(response.error){

            }else{
             alert('Successful Update');
             var res = response.result;
            }
        }
   });
}

function UpdateEditActivity()
{    
    var formdata = new FormData();
    formdata.append('edit-pic_activity', document.getElementById('edit-pic_activity').files[0]);

    var other_data = $('#ActivityForm').serializeArray();
    $.each(other_data,function(key,input){
        formdata.append(input.name,input.value);
    });

   $.ajax({
    url : BASE_URL + 'pasu/pamain/update_activity',
    method: 'POST',
    contentType: false,
    cache: false,
    processData: false,
    data: formdata,
    dataType: "JSON",
    success:function(response){
                if(response.error){

            }else{
             alert('Successful Update');
             var res = response.result;
            }
        }
   });
}

function UpdateEditAgro()
{    
    var formdata = new FormData();
    formdata.append('edit-pic_agro', document.getElementById('edit-pic_agro').files[0]);

    var other_data = $('#AgroForm').serializeArray();
    $.each(other_data,function(key,input){
        formdata.append(input.name,input.value);
    });

   $.ajax({
    url : BASE_URL + 'pasu/pamain/update_agro',
    method: 'POST',
    contentType: false,
    cache: false,
    processData: false,
    data: formdata,
    dataType: "JSON",
    success:function(response){
                if(response.error){

            }else{
             alert('Successful Update');
             var res = response.result;
            }
        }
   });
}


function UpdateEditSoil()
{    
    var formdata = new FormData();
    formdata.append('edit-pic_soil', document.getElementById('edit-pic_soil').files[0]);

    var other_data = $('#SoilForm').serializeArray();
    $.each(other_data,function(key,input){
        formdata.append(input.name,input.value);
    });

   $.ajax({
    url : BASE_URL + 'pasu/pamain/update_soil',
    method: 'POST',
    contentType: false,
    cache: false,
    processData: false,
    data: formdata,
    dataType: "JSON",
    success:function(response){
                if(response.error){

            }else{
             alert('Successful Update');
             var res = response.result;
            }
        }
   });
}


var myLinkipaf = document.getElementById('UpdateIpaf');
myLinkipaf.onclick = function()
    {      
       $.ajax({
        url : BASE_URL+'pasu/pamain/update_ipaf',
        type: "POST",
        data: $('#IpafForm').serialize(),
        dataType: "JSON",
        success:function(response){
            if(response.error){

            }else{
             alert('Successful Update');
             var res = response.result;
            }
        }
        });
        
    }

var myLinkipaf = document.getElementById('UpdateProject');
myLinkipaf.onclick = function()
    {      
       $.ajax({
        url : BASE_URL+'pasu/pamain/update_project',
        type: "POST",
        data: $('#ProjectForm').serialize(),
        dataType: "JSON",
        success:function(response){
            if(response.error){

            }else{
             alert('Successful Update');
             var res = response.result;
            }
        }
        });
        
    }

var myLinkipaf = document.getElementById('Updatelgu');
myLinkipaf.onclick = function()
    {      
       $.ajax({
        url : BASE_URL+'pasu/pamain/Updatelgu',
        type: "POST",
        data: $('#LGUform').serialize(),
        dataType: "JSON",
        success:function(response){
            if(response.error){

            }else{
             alert('Successful Update');
             var res = response.result;
            }
        }
        });
        
    }

var myLinkPrograms = document.getElementById('UpdateProgram');
myLinkPrograms.onclick = function()
    {      
       $.ajax({
        url : BASE_URL+'pasu/pamain/update_program',
        type: "POST",
        data: $('#ProgramForm').serialize(),
        dataType: "JSON",
        success:function(response){
            if(response.error){

            }else{
             alert('Successful Update');
             var res = response.result;
            }
        }
        });
        
    }
var myLinkResearch = document.getElementById('UpdateResearch');
myLinkResearch.onclick = function()
    {      
       $.ajax({
        url : BASE_URL+'pasu/pamain/update_search',
        type: "POST",
        data: $('#ResearchForm').serialize(),
        dataType: "JSON",
        success:function(response){
            if(response.error){

            }else{
             alert('Successful Update');
             var res = response.result;
            }
        }
        });
        
    }

</script>

<script type="text/javascript">
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
</script>
<script type="text/javascript">
$(".sidebar a").on("click", function() {
  $(".sidebar").find(".active").removeClass("active");
  // used .parent if have sidebar li a otherwise
  // $(this).parent().addClass("active"); 
  $(this).addClass("active");
});
</script>
<script type="text/javascript">
//auto expand textarea
function adjust_textarea(h) {
    h.style.height = "20px";
    h.style.height = (h.scrollHeight)+"px";
}
</script>