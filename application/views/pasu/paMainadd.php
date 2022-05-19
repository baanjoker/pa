
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
$data_marinebuffer = array(
    'name' => 'marine_buffer',
    'id'   => 'marine_buffer',
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

<!-- <nav class="sidebar">
    <ul>
        <li>
            <a class="active" href="#generalinfo" data-toggle="tab">
                <i class="fa cap-icon ci-info-circle fa-2x"></i>
                <span class="nav-text">
                    General Information
                </span>
            </a>          
        </li>
        <li>
            <a href="#biological" id="loadbio" data-toggle="tab">
                <i class="fa cap-icon ci-paw fa-2x"></i>
                <span class="nav-text">
                    Biological Features
                </span>
            </a>          
        </li>
        <li>
            <a href="#physical" id="loadtopo" data-toggle="tab">
                <i class="fa cap-icon ci-books fa-2x"></i>
                <span class="nav-text">
                    Physical Features
                </span>
            </a>          
        </li>
        <li>
            <a href="#ecosystem" id="loadhabitat" data-toggle="tab">
                <i class="fa cap-icon ci-home-alt fa-2x"></i>
                <span class="nav-text">
                    Habitats and Ecosystem
                </span>
            </a>          
        </li>
        <li>
            <a href="#economic" data-toggle="tab" id="loadEcotourismSEAMS">
                <i class="fa cap-icon ci-users-alt fa-2x"></i>
                <span class="nav-text">
                    Socio-cultural and Economic Features
                </span>
            </a>          
        </li>
        <li>
            <a href="#ipaf" id="loadincomegenerated" data-toggle="tab">
                <i class="fa cap-icon ci-chart-bar-pie fa-2x"></i>
                <span class="nav-text">
                    Integrated Protected Area Fund
                </span>
            </a>          
        </li>
        <li>
            <a href="#managementzone" id="loadmultiple" data-toggle="tab">
                <i class="fa cap-icon ci-files fa-2x"></i>
                <span class="nav-text">
                    Management Zone
                </span>
            </a>          
        </li>
        <li>
            <a href="#ecotour" id="loadattraction" data-toggle="tab">
                <i class="fa cap-icon ci-binoculars fa-2x"></i>
                <span class="nav-text">
                    Ecotourism
                </span>
            </a>          
        </li>
        <li>
            <a href="#tenurialins" id="loadtenurial" data-toggle="tab">
                <i class="fa cap-icon ci-windmill fa-2x"></i>
                <span class="nav-text">
                    Tenurial Instrument
                </span>
            </a>          
        </li>
        <li>
            <a href="#ppr" id="loadprograms" data-toggle="tab">
                <i class="fa cap-icon ci-notebook fa-2x"></i>
                <span class="nav-text">
                    Programs, Projects, and Researches
                </span>
            </a>          
        </li>
        <li>
            <a href="#threats" id="loadthreat" data-toggle="tab">
                <i class="fa cap-icon ci-fire fa-2x"></i>
                <span class="nav-text">
                    Threats
                </span>
            </a>          
        </li>
        <li>
            <a href="#mboard" id="loadmboard" data-toggle="tab">
                <i class="fa cap-icon ci-eye fa-2x"></i>
                <span class="nav-text">
                    Management Board
                </span>
            </a>          
        </li>
        <li>
            <a href="#pamom" id="loadpamo" data-toggle="tab">
                <i class="fa cap-icon ci-boy fa-2x"></i>
                <span class="nav-text">
                    PAMO
                </span>
            </a>          
        </li>
        <li>
            <a href="#refer" id="loadrefer" data-toggle="tab">
                <i class="fa cap-icon ci-website fa-2x"></i>
                <span class="nav-text">
                    References
                </span>
            </a>          
        </li>
        <li>
            <a href="#mngmtplan" id="managementplanc" data-toggle="tab">
                <i class="fa cap-icon ci-notebook-alt fa-2x"></i>
                <span class="nav-text">
                    Management Plan
                </span>
            </a>          
        </li>
        <li>
            <a href="#mapimge" id="loadmap" data-toggle="tab">
                <i class="fa cap-icon ci-map fa-2x"></i>
                <span class="nav-text">
                    Map Image
                </span>
            </a>          
        </li>        
        <li>
            <a href="#gallery" id="loadgalery" data-toggle="tab">
                <i class="fa cap-icon ci-picture fa-2x"></i>
                <span class="nav-text">
                    Photo Galleries
                </span>
            </a>          
        </li>
    </ul>
</nav> -->
                          
<div class="icon-bars">
    <?php if (!empty($pamain->id_main)): ?>
        <div class="col-lg-12">
            <div class="form-group col-sm-12 col-xs-12">
                <button type="button" name="btnlocation" title="Update" id="submitlocation" onclick="insert_Main()" class="btn btn-primary  btn-flat"><i class="glyphicon glyphicon-floppy-open" id="glyphicon"></i></button>
                <!-- <span class="tooltiptext">Update</span> -->
            </div>         
        </div>
        <div class="col-lg-12">
            <div class="form-group col-sm-12 col-xs-12">
                <a type="button" style="width: 56px; height: 49px;padding: 0;padding-top: 10px;" class="table-btn btn btn-warning pdf" href="../../report/printpdf/pdffilepa/<?php echo $pamain->generatedcode ?>" target="_blank" title='PDF generated report' data-id="<?php echo $pamain->generatedcode ?>">PDF</a>
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
<div class="col-xs-12">    
    <!-- <div class="col-xs-12 col-xs-9"> -->
    <div id="" class="tab-content"> 
    <?php echo form_open_multipart('#','id="regFormMain" enctype="multipart/form-data" class="form-style-7" autocomplete="off"') ?>
    <?php echo form_hidden('id_main',$pamain->id_main);?>
    <?php echo form_hidden('pasu_id',$pamain->pasu_id);?>
    <?php echo form_hidden('pasu_ids',$read->user_id);?>
    <div>                  
        <div class="element-container">
            <?php if (!empty($pamain->id_main)): ?>
               <center><h1>Edit <?= $pamain->pa_name ?> </h1></center>
            <?php else: ?>
                <center><h1>New Record </h1></center>
            <?php endif; ?>                                     
            <div class="tab-content clearfix">
                <div class="tab-pane active" id="generalinfo">
                    <div class="col-xs-12 "> 
                        <?php if (!empty($pamain->id_main)): ?>
                            <input type="text" name="gencode" class="hidden" value="<?php echo $pamain->generatedcode; ?>" id="codegen">
                            <input type="text" name="pasu_idd" class="hidden" value="<?php echo $read->user_id; ?>" id="pasu_id">
                        <?php else: ?>
                            <input type="text" name="gencode" class="hidden" value="<?php echo generateRandomString(); ?>" id="codegen">
                            <input type="text" name="pasu_idd" class="hidden" value="<?php echo $read->user_id; ?>" id="pasu_id">
                        <?php endif; ?> 
                        <div class="form-style-6">
                            <h2>GENERAL INFORMATION</h2>                            
                        </div>
                        <fieldset>
                            <legend>Protected Area Image</legend>
                            <div class="col-xs-12">                                        
                                <div class="col-xs-12 col-lg-5 ">                                        
                                    <div id="fetch_images_pa"></div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-6 col-lg-6">   
                                    <input type='file' name="img_pamap" id="img_pamap"/><br>
                                    <input type="hidden" name="old_picture" value="nophoto.jpg"> 
                                    <span id="img_pamapspan" class="img_pamapspan hidden">nophoto.jpg</span>
                                </div>                        
                            </div>
                        </fieldset>
                        <div class="col-xs-12">                         
                            <div class="col-xs-6 col-lg-6">
                                <ul>
                                    <li>
                                        <?= form_label('Name of Protected Area *','','for="pa_name"').form_input('pa_name',$pamain->pa_name,'id="pa_name" placeholder=" "') ?>
                                        <span>Input name of Protected Area here</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-xs-6 col-lg-6">                                
                                <ul>
                                    <li>
                                        <?= form_label('Former name of PA (if any)','','for="formerpa_name"').form_input('formerpa_name',$pamain->formerpaname,'id="formerpa_name" placeholder=" "') ?>
                                        <span>Input former name of Protected Area here</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <fieldset>
                            <legend>Location(s)</legend>
                            <div class="col-xs-12">
                                <div class="col-xs-6 col-lg-3 ">
                                    <ul><li>
                                        <?php echo form_label('Region *','','for="regid"').form_dropdown('region_id',$regionList,'','class="select-css" id="regid"') ?>    
                                        <div class="prov_error"></div>
                                    </li></ul>
                                </div>
                                <div class="col-xs-6 col-lg-3 ">
                                    <ul><li>
                                        <?php echo form_label('Province *','','for="provid"').form_dropdown('province_id',$province,'','class="select-css" id="provid"') ?>
                                        <div class="municipal_error"></div>
                                    </li></ul>
                                </div>
                                <div class="col-xs-6 col-lg-3 ">
                                    <ul><li>
                                        <?php echo form_label('Municipality *','','for="munid"').form_dropdown('municipal_id',$municipal,'','class="select-css" id="munid"') ?>
                                        <div class="barangay_error"></div>
                                    </li></ul>
                                </div>
                                <div class="col-xs-6 col-lg-3 ">
                                    <ul><li>
                                        <?php echo form_label('Barangay','','for="barid"').form_dropdown('barangay_id',$barangay,'','class="select-css" id="barid"') ?>
                                        <div class="barangay_error"></div>
                                    </li></ul>
                                </div>                               
                            </div>
                            <div class="col-xs-12 col-lg-12 ">
                                <a type="text" class="btn btn-primary" id="add_data">Add data</a>
                            </div>
                            <div class="col-xs-12 ">
                                <div class="col-xs-12 col-lg-12 ">
                                    <div class="table-responsive large-tables">
                                        <table id="data_table" class="table  table-bordered tglobal">
                                            <thead>
                                                <tr>
                                                    <th colspan="4" style="text-align: center; font-size: 24px">Location</th>
                                                </tr>
                                                <tr>
                                                    <th>Region</th>
                                                    <th>Province</th>
                                                    <th>Municipality</th>
                                                    <th>Barangay</th>
                                                    <th class="hide">Status</th>
                                                    <th class="hide">Code</th>
                                                    <!-- <th></th> -->
                                                </tr>
                                            </thead>
                                            <tbody id="tbody">                                                                                
                                            </tbody>
                                        </table>                                   
                                        <table id="table_sample" class="table  table-bordered tglobal">                                         
                                            <tbody id="tbodys">                                        
                                            </tbody>
                                        </table>
                                    </div> 
                                </div>
                            </div> 
                        </fieldset>
                        <fieldset>
                        <legend>Legal Status</legend>
                            <div class="col-xs-12">
                                <div class="col-xs-6 col-lg-6">
                                    <ul><li>
                                            <?php echo form_label('* &nbsp;','','for="nipid"').form_dropdown('nip_id',$classList,'','class="select-css" id="nipid"') ?>
                                    </li></ul>
                                </div>                               
                                <?php if (!empty($pamain->id_main)): ?>
                                    <div class="col-xs-6 col-lg-6  chck-02" id="chck-02">
                                        <ul><li>
                                                <?php echo form_label('Select Initial Component/Additional PA *','','for="nipsub_id"').form_dropdown('paclasssub',$subclassList,'','class="select-css" id="nipsub_id"') ?>
                                        </li></ul>
                                     </div>                                       
                                <?php else: ?>
                                    <div class="col-xs-6 col-lg-6">
                                        <ul><li>
                                                <?php echo form_label('* &nbsp;','','for="nipsub_id"').form_dropdown('paclasssub','','','class="select-css" id="nipsub_id"') ?>
                                        </li></ul>
                                     </div>
                                <?php endif; ?> 
                            </div> 
                            <div class="col-xs-12">
                                <div class="col-xs-4 col-lg-4">
                                    <ul><li>
                                        <?= form_label('Legal Basis *','','for="legis_id"').form_dropdown('legis_id',$procList,'','class="select-css" id="legis_id" style="margin-top:20px;"') ?>
                                    </li></ul>
                                </div>  
                                <div class="col-xs-4 col-lg-4">
                                    <ul><li>
                                       <?= form_label('Number *','','for="legisno"').form_input('legisno','','placeholder=" " id="legisno"') ?>
                                       <span>E.g Proclamation No. 2-0001, EO No. 2010-03 </span>
                                    </li></ul>
                                </div>  
                                <div class="col-xs-4 col-lg-4">
                                    <ul><li>
                                       <?= form_label('Area','','for="legis_area"').form_input('legis_area','','placeholder="" id="legis_area" onkeyup="run(this)"') ?>
                                       <span>Total area</span>
                                    </li></ul>
                                </div> 
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-4 col-lg-4">
                                    <ul><li>
                                        <?php echo form_label('Date Issued *','','for=""').form_dropdown('date_month',$monthList,'','class="select-css" id="month"') ?>
                                    </li></ul>
                                </div>
                                <div class="col-xs-4 col-lg-4">                                
                                    <ul><li>
                                        <?php echo form_label('* &nbsp;','','for=""').form_dropdown('date_day',$dayList,'','class="select-css" id="day"') ?>
                                    </li></ul>
                                </div>
                                <div class="col-xs-4 col-lg-4">                                
                                    <ul><li>
                                        <?php echo form_label('* &nbsp;','','for=""').form_dropdown('date_year',$yearListed,'','class="select-css" id="year"') ?>
                                    </li></ul>
                                </div> 
                            </div>
                            <div class="col-xs-12 col-lg-12">
                                <a type="text" class="btn btn-primary" id="addLegislation">Add data</a>
                            </div>
                            <div class="col-xs-12 col-lg-12 ">
                                <div class="table-responsive large-tables">
                                    <table id="LegislationTable" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th colspan="4" style="text-align: center; font-size: 24px">Issuance</th>
                                            </tr>
                                            <tr>
                                                <th>Legal Status</th>                                                
                                                <th>Legal Basis</th>
                                                <th>Date</th>                                             
                                                <th>Area(ha)</th>
                                                <!-- <th></th> -->
                                            </tr>
                                        </thead>
                                        <tbody id="tbody_leg">                                                  
                                        </tbody>
                                    </table>                              
                                    <table id="LegislationTable_sample" class="table table-bordered">                                        
                                        <tbody id="tbody_legs">                                                 
                                        </tbody>
                                    </table>
                                </div>  
                            </div>
                        </fieldset> 
                        <div class="col-xs-12">
                            <div class="col-xs-6 col-lg-6">
                                <ul><li>
                                    <?php echo form_label('Category *','','for=""').form_dropdown('pacategory_id',$categoryList,$pamain->pacategory_id,'class="select-css" id="pacategory_id"') ?>
                                </li></ul>
                            </div>
                            <div class="col-xs-6 col-lg-6">
                                <ul><li>
                                    <?php echo form_label('Biogeographic Zone *','','for=""').form_dropdown('tbz_id',$zoneList,$pamain->tbz_id,'class="select-css"') ?>                                    
                                </li></ul>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="col-xs-6 col-lg-6 chck-22" id="chck-22">
                                <ul><li>
                                <?php echo form_label('Other category *','','for="other_category"').form_input('other_category',$pamain->other_category,'placeholder="Specify other category" id="other_category"'); ?>
                                </li></ul>
                            </div>
                        </div>  
                        <fieldset>
                            <legend>Key Biodiversity Area *</legend>
                            <div class="col-xs-6 col-lg-6 ">                             
                                <ul><li>
                                    <?php echo form_dropdown('kba',$kba,$pamain->kba,'class="select-css" id="kba_id"') ?>
                                </li></ul>
                            </div>
                            <div class="col-xs-6 col-lg-6 chck-01" id="chck-01">
                                <ul><li>
                                    <?php echo form_dropdown('cpabi_id',$cpabiList,$pamain->cpabi_id,'class="select-css" id="cpabi_id"') ?>                  
                                </li></ul>
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend>Protected Area (has)</legend>
                            <div class="col-xs-6 col-lg-3">  
                                <ul><li>
                                    <?php echo form_label('Terrestrial','','for="terrestrial"').form_input($data_legisterris,$pamain->terrestrial,'onchange="calculate()" placeholder=" "'); ?>
                                    <span>Input terrestrial area in hectares, if not applicable leave as blank</span>
                                </li></ul>
                            </div>
                            <div class="col-xs-6 col-lg-3">                              
                                <ul><li>
                                    <?php echo form_label('Marine','','for="marine"').form_input($data_legismarinearea,$pamain->marine_area,'onchange="calculate()" placeholder=" "'); ?>
                                    <span>Input marine area in hectares, if not applicable leave as blank</span>
                                </li></ul>
                            </div>
                            
                            <div class="col-xs-6 col-lg-3">
                                <ul><li>
                                    <?php echo form_label('Total Area','','for="area"').form_input($data_legisarea,$pamain->area,'placeholder=" "'); ?>                                    
                                    <span>Auto-generate total area</span>
                                </li></ul>
                            </div>                            
                        </fieldset>
                        <fieldset>
                            <legend>Buffer Zone (has)</legend>
                            <div class="col-xs-6 col-lg-3">
                                <ul><li>
                                    <?php echo form_label('Terrestrial Buffer Zone (has)','','for="buffer"').form_input($data_legisbuffer,$pamain->buffer,'placeholder=" "'); ?>
                                    <span>Input buffer zone in hectares, if not applicable leave as blank</span>
                                </li></ul>
                            </div>
                            <div class="col-xs-6 col-lg-3">
                                <ul><li>
                                    <?php echo form_label('Marine Buffer Zone (has)','','for="buffer"').form_input($data_marinebuffer,$pamain->marine_buffer,'placeholder=" "'); ?>
                                    <span>Input buffer zone in hectares, if not applicable leave as blank</span>
                                </li></ul>
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend>International Recognition</legend>
                            <div class="col-xs-12">
                                <div class="col-xs-12 col-lg-3 ">
                                    <ul><li>
                                        <?php echo form_label('&nbsp;','','for="recognition"').form_dropdown('recognition',$recognitionList,'','class="select-css" id="recognition"') ?>  
                                    </li></ul>
                                </div>  
                                <div class="col-xs-12 col-lg-3" id="chck-inscribe">
                                    <ul><li>
                                        <?php echo form_label('(Specify others)','','for="inscribe"').form_input('inscribe','','id="inscribe" placeholder=" "'); ?>
                                        <span></span>
                                    </li></ul>
                                </div>  
                                <div class="col-xs-6 col-lg-3 ">
                                    <ul><li>
                                        <?php echo form_label('Date Inscribe','','for="date_declared_month"').form_dropdown('date_declared_month',$monthListed,'','class="select-css" id="date_declared_month"') ?>  
                                    </li></ul>
                                </div> 
                                <div class="col-xs-6 col-lg-3 ">
                                    <ul><li>
                                        <?php echo form_label('&nbsp;','','for="date_declared_year"').form_dropdown('date_declared_year',$yearListed,'','class="select-css" id="date_declared_year"') ?>  
                                    </li></ul>
                                </div>                                
                            </div>
                            <div class="col-xs-12 col-lg-12 ">
                                <a type="text" class="btn btn-primary" id="add_recognition">Add data</a>
                            </div>
                            <div class="col-xs-12 ">
                                <div class="col-xs-12 col-lg-12 ">
                                    <div class="table-responsive large-tables">
                                        <table id="tableRecognition" class="table table-striped table-bordered table-bordered">
                                            <thead>
                                                <tr>
                                                    <th colspan="2" style="text-align: center; font-size: 24px">International Recognition</th>
                                                </tr>
                                                <tr>
                                                    <th>Recognition</th>
                                                    <th>Date Declared</th>                                                    
                                                </tr>
                                            </thead>
                                            <tbody id="tbody_recognition">                                                                                
                                            </tbody>
                                        </table>                                   
                                        <table id="tableRecognition_sample" class="table table-bordered table-bordered">                                          
                                            <tbody id="tbody_recognition_sample">                                        
                                            </tbody>
                                        </table>
                                    </div> 
                                </div>
                            </div> 
                        </fieldset>                             
                        <fieldset style="padding-bottom:1px;">
                            <legend>Geographic Location</legend>
                            <div class="col-xs-12">
                                <div class="col-xs-12 col-lg-6">
                                    <fieldset>
                                        <legend>Upper Most Left</legend>
                                            <div class="col-xs-12">
                                                <div class="col-xs-6 col-lg-6">
                                                    <ul><li>
                                                            <?= form_label('Longitude','','for="long1"').form_input('long1',$pamain->geographic_long1,'id="long1" placeholder=" "');?>
                                                    </li></ul>
                                                </div> 
                                                 <div class="col-xs-6 col-lg-6">
                                                    <ul><li>
                                                            <?= form_label('Latitude','','for="lat1"').form_input('lat1',$pamain->geographic_lat1,'id="lat1" placeholder=" "');?>
                                                    </li></ul>
                                                </div>                                               
                                            </div>                      
                                    </fieldset>
                                </div>
                                 <div class="col-xs-12 col-lg-6">
                                    <fieldset>
                                        <legend>Lower Most Right</legend>
                                            <div class="col-xs-12">
                                                <div class="col-xs-6 col-lg-6">
                                                    <ul><li>
                                                        <?= form_label('Longitude','','for="long2"').form_input('long2',$pamain->geographic_long2,'id="long2" placeholder=" "');?>
                                                    </li></ul>
                                                </div> 
                                                 <div class="col-xs-6 col-lg-6">
                                                    <ul><li>
                                                            <?= form_label('Latitude','','for="lat2"').form_input('lat2',$pamain->geographic_lat2,'id="lat2" placeholder=" "');?>
                                                    </li></ul>
                                                </div>                                               
                                            </div>                    
                                    </fieldset>
                                </div>
                            </div> 
                            <div class="col-xs-12">  
                                <div class="col-xs-12 col-lg-12">
                                    <fieldset>
                                        <legend>Boundary</legend>
                                        <ul><li>
                                            <?= form_label('Boundary','','for="boundary_upper"').form_textarea($data_boundary_upper,$pamain->boundary_upper);?>
                                        </li></ul>
                                    </fieldset>                                    
                                </div> 
                            </div>                           
                        </fieldset> 
                        <fieldset>
                            <legend>Accessibility</legend>
                            <div class="col-xs-12 col-lg-12">
                                <ul><li>
                                    <?= form_label(' ','','for="accessibility"').form_textarea($data_accessibility,$pamain->accessibility);?>
                                </li></ul>
                            </div>
                        </fieldset>               
                    <?php echo form_close(); ?> 
                </div>
            </div> 
        <div class="tab-pane" id="biological">
            <div class="form-style-6">
                <h2>BIOLOGICAL FEATURES</h2>                            
            </div>  
            <?php echo form_open_multipart('#','id="formbiological"') ?>
                <div class="col-xs-12 ">
                    <div class="col-xs-12 col-lg-12"> 
                    <ul><li>
                        <?= form_label('Search common name','','for="searchBox"').form_input('search','','id="searchBox" placeholder="Common name"'); ?>
                    </li></ul>
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
                        <a type="text" class="btn btn-primary" id="searchBio">Add data</a> 
                    </div>
                </div>
                <div class="col-xs-12"><br>
                    <div class="tab">
                      <a class="tablinksbio active" id="loadfauna" onclick="tabSbio(event, 'Fauna')">Fauna</a>
                      <a class="tablinksbio" id="loadflora" onclick="tabSbio(event, 'Flora')">Flora</a>                                   
                    </div>
                </div>
                <div id="Fauna" class="col-xs-12 tabcontentbio" style="display:block">
                    <div class="table-responsive large-tables">
                        <table id="tablePABiolofeature" class="table  table-bordered tglobal">
                            <thead>
                                <tr>
                                    <th colspan="6" style="text-align: center; font-size: 24px">Fauna</th>
                                </tr>
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
                        <table id="tablePABiolofeature_sample" class="table  table-bordered tglobal">                            
                            <tbody id="tbodybiologicals"></tbody>                               
                        </table>
                    </div>
                </div>
                <div id="Flora" class="col-xs-12 tabcontentbio">                
                    <div class="table-responsive large-tables">
                        <table id="tablePABiolofeatureflora" class="table  table-bordered tglobal">
                            <thead>
                                <tr>
                                    <th colspan="6" style="text-align: center; font-size: 24px">Flora</th>
                                </tr>
                                <tr>
                                    <th>Conservation<br> Status</th>
                                    <th>Class</th>
                                    <th>Order</th>                                                      
                                    <th>Common Name</th>
                                    <th>Scientific Name</th>
                                    <th><span class="glyphicon glyphicon-trash"></span></th>
                                </tr>
                            </thead>
                            <tbody id="tbodybiologicalflora"></tbody>                                
                        </table>
                        <table id="tablePABiolofeatureflora_sample" class="table  table-bordered tglobal">                            
                            <tbody id="tbodybiologicalfloras"></tbody>                               
                        </table>
                    </div>
                        
                </div>
            <?php echo form_close(); ?>
            </div>
           
            <div class="tab-pane" id="physical">
                <div class="form-style-6">
                    <h2>PHYSICAL FEATURES</h2>                            
                </div> 
                <div class="col-xs-12">
                    <div class="tab">
                      <a class="tablinks active" onclick="tabS(event, 'Topo')">Topography and Slope</a>
                      <a class="tablinks" id="loadgeosoil" onclick="tabS(event, 'Geology')">Geology and Soil</a>
                      <a class="tablinks" id="loadclimate" onclick="tabS(event, 'Climate')">Climate Type</a>
                      <a class="tablinks" id="loadhydro" onclick="tabS(event, 'Hydrology')">Hydrology</a>
                      <a class="tablinks" id="loadlanduse" onclick="tabS(event, 'Landuses')">Existing Landuse</a>
                      <a class="tablinks" id="loadvegetative" onclick="tabS(event, 'Vegetative')">Vegetative Cover</a>
                      <a class="tablinks" id="loadlandslide" onclick="tabS(event, 'Geohazard')">Geohazard Features</a>                  
                    </div>
                </div>
                <div class="col-xs-12">
                    <div id="Topo" class="tabcontent" style="display:block">
                        <fieldset>
                            <legend>Elevation:</legend>
                            <div class="col-xs-12">
                                <div class="col-xs-12 col-lg-6">
                                    <ul><li>
                                        <?= form_label('Highest','','for="highestelev"').form_input('highestelev',$pamain->elevation_highest,'placeholder=" " id="highestelev" onkeyup="run(this)"'); ?>
                                    </li></ul>
                                </div>
                                <div class="col-xs-12 col-lg-6">
                                    <ul><li>
                                        <?= form_label('Lowest','','for="Lowest"').form_input('lowestelev',$pamain->elevation_lowest,'placeholder=" " id="Lowest" onkeyup="run(this)"'); ?>
                                    </li></ul>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend>Topography and Slope</legend>
                            <div class="col-xs-12 ">                                        
                                <div class="col-xs-12 col-lg-5 ">  
                                    <div id="fetch_images_topo"></div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <input type='file' name="img_topo" id="img_topo"  /><br>                                       
                                <input type="hidden" name="old_picture" value="nophoto.jpg"> 
                                <span id="img_topospan" class="img_topospan hide">nophoto.jpg</span>
                            </div>
                            <div class="col-xs-12">                            
                                <div class="col-xs-5 col-lg-5">
                                    <ul><li>
                                        <?= form_label(' ','','for="topodesc"').form_textarea('topo','','placeholder="Brief description" id="topodesc" style="height:250px"');?>
                                    </li></ul>                            
                                </div>
                                <div class="col-xs-1 col-lg-1 ">
                                    <a type="text" class="btn btn-primary" id="addimagetopo" style="margin-top:100px">Add ></a>                                 
                                </div>
                                <div class="col-xs-6 col-lg-6">
                                    <table id="tbltopology" class="table-ola">
                                        <thead>
                                            <tr>
                                                <th colspan="2" style="text-align: center; font-size: 24px">Topography and Slope</th>
                                            </tr>
                                            <tr>
                                                <th>Description</th> 
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbodytopo"></tbody>
                                    </table>
                                    <table id="tbltopology_sample" class="table-ola">                                        
                                        <tbody id="tbodytopo_sample"></tbody>
                                    </table>
                                </div> 
                            </div> 
                        </fieldset>
                    </div>
                    <div id="Geology" class="tabcontent">  
                        <div class="tab">
                            <a class="tablinksGS rocks active" id="loadrocks" onclick="tabSGS(event, 'rocks')">Rock Formation</a>
                            <a class="tablinksGS soils" id="loadsoil" onclick="tabSGS(event, 'soils')">Soil Type</a>                                            
                        </div>
                    <div id="rocks" class="tabcontentgs" style="display:block">                    
                        <fieldset>
                            <legend>Rock Formation</legend>
                            <div class="col-xs-12 ">
                                <div class="col-xs-12 ">                                        
                                    <div class="col-xs-12 col-lg-5 ">                                        
                                        <div id="fetch_images_rock"></div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-lg-5 ">
                                    <input type='file' name="img_rocks" id="img_rocks" /><br>
                                    <input type="hidden" name="old_picture" value="nophoto.jpg"> 
                                    <span id="img_rockspan" class="img_rockspan hide">nophoto.jpg</span>
                                </div>                            
                            </div>                                                                           
                            <div class="col-xs-12 ">
                                <div class="col-xs-5 col-lg-5">
                                    <ul><li>                            
                                        <?= form_label('Rock Formation','','for="rock"').form_textarea('rock','','placeholder="Brief description" id="rock" style="height:240px"'); ?>
                                    </li></ul>
                                </div>  
                                <div class="col-xs-1 col-lg-1 ">                        
                                    <a type="text" class="btn btn-primary" id="addimagerock" style="margin-top:100px">Add ></a>
                                </div>
                                <div class="col-xs-6 col-lg-6 ">                                
                                    <table id="tblrock" class="table-ola">
                                        <thead>
                                            <tr>
                                                <th colspan="3" style="text-align: center; font-size: 24px">Rock Formation</th>
                                            </tr>
                                            <tr>
                                                <th>Description</th> 
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbodyrock"></tbody>
                                    </table>                            
                                    <table id="tblrock_sample" class="table-ola">                                   
                                        <tbody id="tbodyrock_sample"></tbody>
                                    </table>                                
                                </div>
                            </div>                        
                        </fieldset> 
                    </div>
                    <div id="soils" class="tabcontentgs" style="display:none"> 
                        <fieldset>
                            <legend>Soil Type</legend>
                            <div class="col-xs-12 ">
                                <div class="col-xs-12 ">                                        
                                    <div class="col-xs-12 col-lg-5 ">                                        
                                        <div id="fetch_images_geology"></div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-lg-5 ">
                                    <input type='file' name="img_soil" id="img_soil" /><br>
                                    <input type="hidden" name="old_picture" value="nophoto.jpg"> 
                                    <span id="img_soilspan" class="img_soilspan hide">nophoto.jpg</span>
                                </div>
                            </div>                                                                           
                            <div class="col-xs-12 ">
                                <div class="col-xs-5 col-lg-5">
                                    <ul><li>                            
                                        <?= form_label('Soil Type','','for="soil_type"').form_textarea('soil_type','','placeholder="Brief description" id="soil_type" style="height:240px"'); ?>
                                    </li></ul>
                                </div>
                                <div class="col-xs-1 col-lg-1 ">                        
                                    <a type="text" class="btn btn-primary" id="addimagesoil" style="margin-top:100px">Add ></a>
                                </div>
                                <div class="col-xs-6 col-lg-6">                                
                                    <table id="tblsoil" class="table-ola">
                                        <thead>
                                            <tr>
                                                <th colspan="3" style="text-align: center; font-size: 24px">Soil Type</th>
                                            </tr>
                                            <tr>
                                                <th>Description</th> 
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbodysoil"></tbody>
                                    </table>                                
                                    <table id="tblsoil_sample" class="table-ola">                                    
                                        <tbody id="tbodysoil_sample"></tbody>
                                    </table>                                
                                </div>
                            </div>                        
                        </fieldset>  
                    </div>               
                    </div>
                    <div id="Climate" class="tabcontent">                    
                    <fieldset>
                        <legend>Climate Type</legend>
                        <div class="col-xs-12 ">     
                            <div class="col-xs-12 ">                                        
                                <div class="col-xs-12 col-lg-5 ">                                        
                                    <div id="fetch_images_climate"></div>
                                </div>
                            </div>                                                                      
                            <div class="col-xs-12 col-lg-5 ">
                                    <input type='file' name="img_climate" id="img_climate" /><br>
                                    <input type="hidden" name="old_picture" value="nophoto.jpg"> 
                                    <span id="img_climatespan" class="img_climatespan hide">nophoto.jpg</span>    
                            </div>                            
                        </div>
                        <div class="col-xs-12 ">                        
                            <div class="col-xs-5 col-lg-5">
                                <ul><li>
                                    <?= form_textarea('climate','','placeholder="Brief description" id="climate" style="height:250px"') ?>
                                </li></ul>                                
                            </div> 
                            <div class="col-xs-1 col-lg-1">
                                <a type="text" class="btn btn-primary" id="addimageClimate" style="margin-top:100px">Add ></a>
                            </div>
                            <div class="col-xs-6 col-lg-6">
                                <table id="tblclimate" class="table-ola">
                                    <thead>
                                        <tr>
                                            <th colspan="3" style="text-align: center; font-size: 24px">Climate Type</th>
                                        </tr>
                                        <tr>
                                            <th>Description</th> 
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbodyclimate"></tbody>
                                </table>
                                <table id="tblclimate_sample" class="table-ola">                                    
                                    <tbody id="tbodyclimate_sample"></tbody>
                                </table>
                            </div>
                        </div>
                    </fieldset>
                    </div>
                    <div id="Hydrology" class="tabcontent">      
                    <fieldset>
                        <legend>Hydrology/River system</legend>
                        <div class="col-xs-12 ">
                            <div class="col-xs-12 ">                                        
                                <div class="col-xs-12 col-lg-5 ">                                        
                                    <div id="fetch_images_hydro"></div>
                                </div>
                            </div>
                             <div class="col-xs-12 col-lg-5 ">
                                <input type='file' name="img_hydro" id="img_hydro" /><br>
                                <input type="hidden" name="old_picture" value="nophoto.jpg"> 
                                <span id="img_hydrospan" class="img_hydrospan hide">nophoto.jpg</span>    
                            </div>
                        </div>
                        <div class="col-xs-12 ">                        
                            <div class="col-xs-5 col-lg-5">
                                <ul><li>
                                    <?= form_textarea('hydro','','id="hydro" placeholder="Brief description" style="height:250px"') ?>
                                </li></ul>                                
                            </div> 
                            <div class="col-xs-1 col-lg-1">
                                <a type="text" class="btn btn-primary" id="addimageHydro" style="margin-top:100px">Add ></a>
                            </div>
                            <div class="col-xs-6 col-lg-6">
                                <table id="tblhydro" class="table-ola">
                                    <thead>
                                        <tr>
                                            <th colspan="3" style="text-align: center; font-size: 24px">Hydrology</th>
                                        </tr>
                                        <tr>
                                            <th>Description</th> 
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbodyhydro"></tbody>
                                </table>
                                <table id="tblhydro_sample" class="table-ola">                                    
                                    <tbody id="tbodyhydro_sample"></tbody>
                                </table>
                            </div>                                                    
                        </div>
                    </fieldset>         
                    </div>  
                    <div id="Landuses" class="tabcontent">      
                        <fieldset>
                            <legend>Existing Landuse</legend>
                            <div class="col-xs-12">
                                <div class="col-xs-12">                                        
                                    <div class="col-xs-12 col-lg-5 ">                                        
                                        <div id="fetch_images_landuse"></div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-lg-5 ">
                                    <input type='file' name="img_land" id="img_land" /><br>
                                    <input type="hidden" name="old_picture" value="nophoto.jpg"> 
                                    <span id="img_landspan" class="img_landspan hide">nophoto.jpg</span>    
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-5 col-lg-5">
                                    <ul><li>
                                    <?= "<ul><li>".form_label('Legend','','for="existing_landuse"').form_input('existing_landuse','','placeholder="Eg. Forestland, A&D, etc." id="existing_landuse"').
                                        "</li></ul><br><ul><li>".form_label('Area','','for="existing_landuse_area"').form_input('existing_landuse_area','','placeholder="Area" id="existing_landuse_area" onkeyup="run(this)"')."</li></ul>".
                                        "<br><ul><li>".form_label('Remarks','','for="existing_landuse_remarks"').form_textarea('existing_landuse_remarks','','placeholder="Brief description" id="existing_landuse_remarks"')."</li></ul>"?>     
                                    </li></ul>                           
                                </div> 
                                <div class="col-xs-1 col-lg-1">
                                    <a type="text" class="btn btn-primary" id="addimageLand" style="margin-top:100px">Add ></a>
                                </div>
                                <div class="col-xs-6 col-lg-6">
                                    <div class="table-responsive large-tables"><br>
                                    <table id="tblland" class="table  table-bordered tglobal">
                                        <thead>
                                            <tr>
                                                <th colspan="3" style="text-align: center; font-size: 24px">Existing Landuse</th>
                                            </tr>
                                            <tr>
                                                <th>Legend</th> 
                                                <th>Area(has)</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbodyland"></tbody>
                                    </table>
                                    <table id="tblland_sample" class="table  table-bordered tglobal">                                    
                                        <tbody id="tbodyland_sample"></tbody>
                                    </table>
                                </div>
                                </div>                                                    
                            </div>                            
                        </fieldset>
                    </div>
                    <div id="Vegetative" class="tabcontent">      
                        <fieldset>
                            <legend>Vegetative Cover</legend>
                            <div class="col-xs-12 ">
                                <div class="col-xs-12">                                        
                                    <div class="col-xs-12 col-lg-5 ">                                        
                                        <div id="fetch_images_vegetative"></div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-lg-5 ">
                                    <input type='file' name="img_vegetative" id="img_vegetative" /><br>
                                    <input type="hidden" name="old_picture" value="nophoto.jpg"> 
                                    <span id="img_vegetativespan" class="img_vegetativespan hide">nophoto.jpg</span>
                                </div>
                            </div>
                            <div class="col-xs-12 ">
                                <div class="col-xs-5 col-lg-5">
                                    <ul><li>
                                    
                                    <?= "<ul><li>".form_label('Legend','','for="vegetative"').form_input('vegetative','','placeholder="Eg. Forestland, A&D, etc." id="vegetative"').
                                        "</li></ul><br><ul><li>".form_label('Area','','for="vegetative_area"').form_input('vegetative_area','','placeholder="Area" id="vegetative_area" onkeyup="run(this)"')."</li></ul>".
                                        "<br><ul><li>".form_label('Remarks','','for="vegetative_remarks"').form_textarea('vegetative_remarks','','placeholder="Brief description" id="vegetative_remarks"')."</li></ul>"?>
                                    </li></ul>                                
                                </div>                                 
                                <div class="col-xs-1 col-lg-1">
                                    <a type="text" class="btn btn-primary" id="addimageVegetative" style="margin-top:100px">Add ></a>
                                </div>
                                <div class="col-xs-6 col-lg-6">
                                    <div class="table-responsive large-tables"><br>
                                        <table id="tblvegetative" class="table  table-bordered tglobal">
                                            <thead>
                                                <tr>
                                                    <th colspan="3" style="text-align: center; font-size: 24px">Vegetative cover</th>
                                                </tr>
                                                <tr>
                                                    <th>Legend</th> 
                                                    <th>Area(has)</th> 
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbodyvegetative"></tbody>
                                        </table>
                                        <table id="tblvegetative_sample" class="table  table-bordered tglobal">                                    
                                            <tbody id="tbodyvegetative_sample"></tbody>
                                        </table>
                                    </div>
                                </div>                                                    
                            </div>                           
                        </fieldset>         
                    </div> 
                    <div id="Geohazard" class="tabcontent">
                        <fieldset>
                            <legend>Geohazard Features</legend>
                            <div class="col-xs-12">
                                <div class="tab">
                                  <a class="tablinkss landslide active" onclick="tabSs(event, 'g1')">Landslide Susceptibility</a>
                                  <a class="tablinkss flood" id="loadflooding" onclick="tabSs(event, 'g2')">Flooding Susceptibility</a>
                                 <!--  <a class="tablinkss" id="loadsealevel" onclick="tabSs(event, 'g3')">Sea Level Rise</a>
                                  <a class="tablinkss" id="loadtsunami" onclick="tabSs(event, 'g4')">Tsunami Susceptibility</a>
                                  <a class="tablinkss" id="loadfire" onclick="tabSs(event, 'g6')">Fire Susceptibility</a> -->
                                  <a class="tablinkss" id="loadothergeo" onclick="tabSs(event, 'g5')">Other Geohazard Features</a>                                       
                                </div>
                            </div>
                            <div id="g1" class="tabcontent-sub" style="display:block">
                            <fieldset>
                                <legend>Landslide Susceptibility</legend>    
                                <div class="col-xs-12">                                        
                                    <div class="col-xs-12 col-lg-5 ">                                        
                                        <div id="fetch_images_landslide"></div>
                                    </div>
                                </div>
                                <div class="col-xs-12 "> 
                                    <div class="col-xs-12 col-lg-5 ">
                                        <input type='file' name="img_landslide" id="img_landslide" /><br>
                                        <input type="hidden" name="old_picture_landslide" value="nophoto.jpg"> 
                                        <span id="img_landslidespan" class="img_landslidespan hide">nophoto.jpg</span>
                                    </div>
                                </div> 
                                <div class="col-xs-12 ">                                                                                          
                                    <div class="col-xs-5 col-lg-5">
                                        <ul><li>
                                            <?= "<ul><li>".form_label('Legend','','for="landslide"').form_dropdown('landslide',$landslideLegend,'','class="select-css" id="landslide"').
                                            "</li></ul><br><ul><li>".form_label('Area','','for="landslide_area"').form_input('landslide_area','','placeholder="Area" id="landslide_area" onkeyup="run(this)"')."</li></ul>".
                                            "<br><ul><li>".form_label('Remarks','','for="landslide_remarks"').form_textarea('landslide_remarks','','placeholder="Brief description" id="landslide_remarks"')."</li></ul>"?>
                                        </li></ul>                                         
                                    </div>
                                    <div class="col-xs-1 col-lg-1">
                                        <a type="text" class="btn btn-primary" id="addimageLandslide" style="margin-top:100px">Add ></a>
                                    </div>
                                    <div class="col-xs-6 col-lg-6">
                                        <div class="table-responsive large-tables"><br>
                                            <table id="tbllandslide" class="table  table-bordered tglobal">
                                                <thead>
                                                    <tr>
                                                        <th colspan="3" style="text-align: center; font-size: 24px">Landslide Susceptibility</th>
                                                    </tr>
                                                    <tr>
                                                        <th>Legend</th>                                                        
                                                        <th>Area(has)</th> 
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbodylandslide"></tbody>
                                            </table>
                                            <table id="tbllandslide_sample" class="table  table-bordered tglobal">
                                                <tbody id="tbodylandslide_sample"></tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>                   
                            </fieldset>
                        </div>
                        <div id="g2" class="tabcontent-sub">
                            <fieldset>
                                <legend>Flooding Susceptibility</legend>
                                <div class="col-xs-12">                                        
                                    <div class="col-xs-12 col-lg-5 ">                                        
                                        <div id="fetch_images_flooding"></div>
                                    </div>
                                </div>
                                 <div class="col-xs-12 "> 
                                    <div class="col-xs-12 col-lg-5 ">
                                        <ul><li>
                                            <input type='file' name="img_flooding" id="img_flooding" onchange="readURLFlooding(this);"  /><br>
                                            <input type="hidden" name="old_picture" value="nophoto.jpg"> 
                                            <span id="img_floodingspan" class="img_floodingspan hide">nophoto.jpg</span>
                                        </li></ul> 
                                    </div>  
                                </div>
                                <div class="col-xs-12 "> 
                                    <div class="col-xs-5 col-lg-5">                                        
                                        <ul><li>
                                            <?= "<ul><li>".form_label('Legend','','for="flooding"').form_dropdown('flooding',$floodingLegend,'','class="select-css" id="flooding"').
                                            "</li></ul><br><ul><li>".form_label('Area','','for="flooding_area"').form_input('flooding_area','','placeholder="Area" id="flooding_area" onkeyup="run(this)"')."</li></ul>".
                                            "<br><ul><li>".form_label('Remarks','','for="flooding_remarks"').form_textarea('flooding_remarks','','placeholder="Brief description" id="flooding_remarks"')."</li></ul>"?>
                                        </li></ul>                                      
                                    </div>
                                     <div class="col-xs-1 col-lg-1">
                                        <a type="text" class="btn btn-primary" id="addimageFlooding" style="margin-top:100px">Add ></a>
                                    </div>
                                    <div class="col-xs-6 col-lg-6">
                                        <div class="table-responsive large-tables"><br>
                                            <table id="tblflooding" class="table table-bordered tglobal">
                                                <thead>
                                                    <tr>
                                                        <th colspan="3" style="text-align: center; font-size: 24px">Flooding Susceptibility</th>
                                                    </tr>
                                                    <tr>
                                                        <th>Legend</th>                                                        
                                                        <th>Area(has)</th> 
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbodyflooding"></tbody>
                                            </table>
                                            <table id="tblflooding_sample" class="table  table-bordered tglobal">
                                                <tbody id="tbodyflooding_sample"></tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div id="g3" class="tabcontent-sub">
                            <fieldset>
                                <legend>Sea Level Rise</legend>
                                 <div class="col-xs-12 "> 
                                    <div class="col-xs-12 col-lg-5 ">
                                        <ul><li>                                        
                                            <img width="250px" height="210px" id="imagesea" src="<?php echo base_url("bmb_assets2/upload/sealevel_img/nophoto.jpg") ?>" alt="your image" /><br>
                                            <input type='file' name="img_sea" id="img_sea" onchange="readURLsea(this);"  /><br>
                                            <input type="hidden" name="old_picture" value="nophoto.jpg"> 
                                            <span id="img_sealevelspan" class="img_sealevelspan hide">nophoto.jpg</span>
                                        </li></ul>
                                    </div>                                                             
                                    <div class="col-xs-12 col-lg-7 ">
                                        <ul><li>
                                            <?= form_textarea('sea','','placeholder="Description" id="sea" style="height:250px;"'); ?>
                                        </li></ul>
                                    </div>
                                </div>
                                <div class="col-xs-12 ">
                                        <a type="text" class="btn btn-primary" id="addimageSea">Add data</a>
                                    </div>
                                    <div class="col-xs-12 ">
                                        <div class="table-responsive large-tables"><br>
                                            <table id="tblsea" class="table  table-bordered tglobal">
                                                <thead>
                                                    <tr>
                                                        <th colspan="3" style="text-align: center; font-size: 24px">Sea Level Rise</th>
                                                    </tr>
                                                    <tr>
                                                        <th>Image</th>                                                        
                                                        <th>Description</th> 
                                                        <th></span></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbodysea"></tbody>
                                            </table>
                                            <table id="tblsea_sample" class="table  table-bordered tglobal">
                                                <tbody id="tbodysea_sample"></tbody>
                                            </table>
                                        </div>
                                    </div>
                            </fieldset>
                        </div>
                        <div id="g4" class="tabcontent-sub">
                            <fieldset>
                                <legend>Tsunami Susceptibility</legend>
                                 <div class="col-xs-12 "> 
                                    <div class="col-xs-12 col-lg-5 ">
                                        <ul><li>
                                            <img width="250px" height="210px" id="imagetsunami" src="<?php echo base_url("bmb_assets2/upload/tsunami_img/nophoto.jpg") ?>" alt="your image" /><br>
                                            <input type='file' name="img_tsunami" id="img_tsunami" onchange="readURLtsunami(this);"  /><br>
                                            <input type="hidden" name="old_picture" value="nophoto.jpg" /> 
                                            <span id="img_tsunamispan" class="img_tsunamispan hide">nophoto.jpg</span>
                                        </li></ul>                                        
                                    </div>                                                             
                                    <div class="col-xs-12 col-lg-7 ">
                                        <ul><li>                                        
                                            <?= form_textarea('tsunami','','placeholder="Description" id="tsunami" style="height:250px;"') ?>
                                        </li></ul>
                                    </div>
                                </div>
                                <div class="col-xs-12 ">
                                    <a type="text" class="btn btn-primary" id="addimageTsunami">Add data</a>
                                </div>
                                <div class="col-xs-12 ">
                                    <div class="table-responsive large-tables"><br>
                                        <table id="tbltsunami" class="table  table-bordered tglobal">
                                            <thead>
                                                <tr>
                                                    <th colspan="3" style="text-align: center; font-size: 24px">Tsunami Susceptibility</th>
                                                </tr>
                                                <tr>
                                                    <th>Image</th>                                                        
                                                    <th>Description</th> 
                                                    <th><span class="glyphicon glyphicon-trash"></span></th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbodytsunami"></tbody>
                                        </table>
                                        <table id="tbltsunami_sample" class="table  table-bordered tglobal">
                                            <tbody id="tbodytsunami_sample"></tbody>
                                        </table>
                                    </div>
                                </div>
                            </fieldset>       
                        </div>
                        <div id="g6" class="tabcontent-sub">
                            <fieldset>
                                <legend>Fire Susceptibility</legend>
                                 <div class="col-xs-12 "> 
                                    <div class="col-xs-12 col-lg-5 ">
                                        <ul><li>
                                            <img width="250px" height="210px" id="imagefire" src="<?php echo base_url("bmb_assets2/upload/fire_img/nophoto.jpg") ?>" alt="your image" /><br>
                                            <input type='file' name="img_fire" id="img_fire" onchange="readURLfire(this);"  /><br>
                                            <input type="hidden" name="old_picture" value="nophoto.jpg" /> 
                                            <span id="img_firespan" class="img_firespan hide">nophoto.jpg</span>
                                        </li></ul>                                        
                                    </div>                                                             
                                    <div class="col-xs-12 col-lg-7 ">
                                        <ul><li>                                        
                                            <?= form_textarea('fire','','placeholder="Description" id="fire" style="height:250px;"') ?>
                                        </li></ul>
                                    </div>
                                </div>
                                <div class="col-xs-12 ">
                                    <a type="text" class="btn btn-primary" id="addimagefire">Add data</a>
                                </div>
                                <div class="col-xs-12 ">
                                    <div class="table-responsive large-tables"><br>
                                        <table id="tblfire" class="table  table-bordered tglobal">
                                            <thead>
                                                <tr>
                                                    <th colspan="3" style="text-align: center; font-size: 24px">Fire Susceptibility</th>
                                                </tr>
                                                <tr>
                                                    <th>Image</th>                                                        
                                                    <th>Description</th> 
                                                    <th><span class="glyphicon glyphicon-trash"></span></th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbodyfire"></tbody>
                                        </table>
                                        <table id="tblfire_sample" class="table  table-bordered tglobal">
                                            <tbody id="tbodyfire_sample"></tbody>
                                        </table>
                                    </div>
                                </div>
                            </fieldset>       
                        </div>
                        <div id="g5" class="tabcontent-sub">
                            <fieldset>
                                <legend>Other Geohazard</legend>
                                <div class="col-xs-12 "> 
                                    <div class="col-xs-12 col-lg-5 ">
                                        <ul><li>
                                            <img width="250px" height="210px" id="imagegeohazard" src="<?php echo base_url("bmb_assets2/upload/other_geohazard_img/nophoto.jpg") ?>" alt="your image" /><br>
                                            <input type='file' name="img_geohazard" id="img_geohazard" onchange="readURLgeohazard(this);"  /><br>
                                            <input type="hidden" name="old_picture" value="nophoto.jpg"> 
                                            <span id="img_geohazardspan" class="img_geohazardspan ">nophoto.jpg</span>
                                        </li></ul>                                        
                                    </div>                                                             
                                    <div class="col-xs-12 col-lg-7 ">                                        
                                        <ul><li>                                        
                                            <?= form_textarea('geohazard','','placeholder="Description" id="geohazard" style="height:250px;"') ?>
                                        </li></ul>
                                    </div>
                                </div>
                                <div class="col-xs-12 ">
                                        <a type="text" class="btn btn-primary" id="addimageGeohazard">Add data</a>
                                    </div>
                                    <div class="col-xs-12 ">
                                        <div class="table-responsive large-tables"><br>
                                            <table id="tblgeohazard" class="table  table-bordered tglobal">
                                                <thead>
                                                    <tr>
                                                        <th colspan="3" style="text-align: center; font-size: 24px">Other Geohazard</th>
                                                    </tr>
                                                    <tr>
                                                        <th>Image</th>                                                        
                                                        <th>Description</th> 
                                                        <th><span class="glyphicon glyphicon-trash"></span></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbodygeohazard"></tbody>
                                            </table>
                                            <table id="tblgeohazard_sample" class="table  table-bordered tglobal">
                                                
                                                <tbody id="tbodygeohazard_sample"></tbody>
                                            </table>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        </fieldset>
                    </div>
                </div>
            </div><!-- END TAB -->
            <div class="tab-pane" id="ecosystem">
                <div class="form-style-6">
                    <h2>HABITATS AND ECOSYSTEMS</h2>
                </div> 
                    <div class="col-xs-12">
                        <div class="tab">
                          <a class="tablinkEcon active" onclick="tabEcon(event, 'fformation')" id="defaultOpen">Forest Formation</a>
                          <a class="tablinkEcon" id="loadinwet" onclick="tabEcon(event, 'inland')">Inland Wetland</a>
                          <a class="tablinkEcon" id="loadcaves" onclick="tabEcon(event, 'cave')">Caves</a>
                          <a class="tablinkEcon" onclick="tabEcon(event, 'mariner')" id="coastalc">Coastal/Marine</a>                                  
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div id="fformation" class="tabcontentEcon" style="display: block;">
                            <fieldset>
                                <legend>Forest Formation</legend>
                                <div class="col-xs-12">                                        
                                    <div class="col-xs-12 col-lg-5 ">   
                                        <div id="fetch_images_forestform"></div>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="col-xs-6 col-lg-6">   
                                        <input type='file' name="img_ffmap" id="img_ffmap" /><br>
                                        <input type="hidden" name="old_picture" value="nophoto.jpg"> 
                                        <span id="img_ffmapspan" class="img_ffmapspan hidden">nophoto.jpg</span>
                                    </div> 
                                </div>
                                <div class="col-xs-12 "> 
                                    <hr>
                                    <div class="col-xs-5 col-lg-5">
                                        <ul><li>
                                        <?= "<ul><li>".form_label('Types of Forest formation','','for="forest_formation"').form_dropdown('forest_formation',$fftype,'','id="forest_formation"').
                                            // "<ul><li>".form_label('Types of Forest formation','','for="forest_formation"').form_input('forest_formation','','placeholder="Eg. Lowland Evergreen Forest, Mangrove Forest, etc." id="forest_formation"').
                                            "</li></ul><br><ul><li>".form_label('Area','','for="forest_formation_area"').form_input('forest_formation_area','','placeholder="Area" id="forest_formation_area" onkeyup="run(this)"')."</li></ul>".
                                            "<br><ul><li>".form_label('Remarks','','for="forest_formation_remarks"').form_textarea('forest_formation_remarks','','placeholder="Brief description" id="forest_formation_remarks"')."</li></ul>"?>                 
                                        </li></ul>                           
                                    </div>  
                                    <div class="col-xs-1 col-lg-1">
                                        <a type="text" class="btn btn-primary" id="addForestForm" style="margin-top:100px">Add ></a><br>
                                    </div>  
                                    <div class="col-xs-6 col-lg-6">
                                        <div class="table-responsive large-tables"><br>
                                            <table id="tblforestform" class="table table-bordered tglobal">
                                                <thead>
                                                    <tr>
                                                        <th colspan="3" style="text-align: center; font-size: 24px">Forest Formation</th>
                                                    </tr>
                                                    <tr>
                                                        <th>Forest Formation</th>                                                        
                                                        <th>Area(has)</th> 
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbodyforestform"></tbody>
                                            </table>
                                            <table id="tblforestform_sample" class="table table-bordered tglobal">
                                                <tbody id="tbodyforestform_sample"></tbody>
                                            </table>
                                        </div>
                                    </div>                                
                                </div>
                            </fieldset>
                        </div>                   
                        <div id="inland" class="tabcontentEcon">
                            <fieldset>
                                <legend>Inland Wetland</legend>
                                <div class="col-xs-12">                                        
                                    <div class="col-xs-12 col-lg-5 ">                                        
                                        <div id="fetch_images_iw"></div>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="col-xs-6 col-lg-6">   
                                        <input type='file' name="img_iwmap" id="img_iwmap"/><br>
                                        <input type="hidden" name="old_picture" value="nophoto.jpg"> 
                                        <span id="img_iwmapspan" class="img_iwmapspan hidden">nophoto.jpg</span>
                                    </div>                        
                                </div>
                                <div class="col-xs-12">
                                    <hr>
                                    <div class="col-xs-12 col-lg-12">
                                        <ul><li>
                                            <?= form_label('Wetland site name').form_input('iwname','','placeholder="Site name" id="iwname"') ?>
                                        </li></ul>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="col-xs-6 col-lg-6">
                                        <ul><li>
                                            <?php echo form_label('Province','','for="iwprovid"').form_dropdown('iwprovid',$provinceList,'','class="select-css" id="iwprovid"') ?>
                                            <div class="iwmunicipal_error"></div>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-6 col-lg-6">
                                        <ul><li>
                                            <?php echo form_label('Municipality','','for="iwmunid"').form_dropdown('iwmunid','','','class="select-css" id="iwmunid"') ?>
                                        </li></ul>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="col-xs-6 col-lg-6">
                                        <ul><li>
                                            <?= form_label('Approximate area (has)','','for="iwarea"').form_input('iwarea','','placeholder="hectares" onkeyup="run(this)" id="iwarea"'); ?>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-6 col-lg-6">
                                        <ul><li>
                                            <?= form_label('Wetland type','','for="iwtype"').form_dropdown('iwtype',$iwtype,'','class="select-css" id="iwtype"'); ?>
                                        </li></ul>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <fieldset>
                                        <legend>Coordinates</legend>
                                            <div class="col-xs-6 col-lg-6">
                                                <ul><li>
                                                <?= form_label('Longitude', '','for="iwlong"').form_input('iwlong', '', 'placeholder="Coordinates(Longitude)" id="iwlong"'); ?>
                                                </li></ul>
                                            </div>
                                            <div class="col-xs-6 col-lg-6">
                                                <ul><li>
                                                <?= form_label('Latitude', '','for="iwlat"').form_input('iwlat', '', 'placeholder="Coordinates(Latitude)" id="iwlat"'); ?>
                                                </li></ul>
                                            </div>
                                    </fieldset>
                                </div>
                                <div class="col-xs-12">
                                    <div class="col-xs-6 col-lg-6">
                                        <ul><li>
                                            <?= form_label('Year assessed', '','for="iwassessed"').form_dropdown('iwassessed', $yearListed,'','class="select-css" id="iwassessed"'); ?>
                                        </li></ul>
                                    </div>
                                </div>
                         
                                <div class="col-xs-12">
                                    <div class="col-xs-12 col-lg-12">
                                        <fieldset>
                                            <legend>Description</legend>
                                            <?php echo form_textarea('iw_desc','','id="iw_desc" placeholder="Biological Features/Physical Features"'); ?>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="col-xs-12 ">
                                    <a type="text" class="btn btn-primary" id="addiwP">Add data</a>
                                </div>
                                <div class="col-xs-12 ">
                                    <table id="tbliw_sample" class="table tglobal">
                                        <tbody id="tbodyiw_sample" style="text-align: left;border: 0 none;"></tbody>
                                    </table>
                                    <div class="table-responsive text-nowrap" style="overflow-x:auto;">
                                        <table id="tbliw" class="table-ola" style="z-index: 100">
                                            <thead>
                                                <tr>
                                                    <th colspan="8" style="text-align: center; font-size: 24px">Inland Wetland</th>
                                                </tr>
                                                <tr class="text-nowrap">
                                                    <th rowspan="3">Name</th>
                                                    <th rowspan="3">Area (has)</th>
                                                    <th rowspan="3">Location <br>(Province, Municipality)</th>
                                                    <th colspan="2">Coordinates</th>  
                                                    <th rowspan="3">Wetland type</th>
                                                    <th rowspan="3">Year assessed</th>
                                                    <th rowspan="3">Option</th>                                             
                                                </tr>
                                                <tr>                                                    
                                                    <th rowspan="2">Northing</th>
                                                    <th rowspan="2">Easting</th>
                                                </tr>                                                
                                            </thead>
                                            <tbody id="tbodyiw"></tbody>
                                        </table>                                                
                                    </div>
                                </div>
                            </fieldset>                        
                        </div>
                        <div id="cave" class="tabcontentEcon">
                            <fieldset>
                                <legend>Caves</legend>
                                <div class="col-xs-12">                                        
                                    <div class="col-xs-12 col-lg-5 ">                                        
                                        <div id="fetch_images_cave"></div>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="col-xs-6 col-lg-6">   
                                        <input type='file' name="img_cavemap" id="img_cavemap"/><br>
                                        <input type="hidden" name="old_picture" value="nophoto.jpg"> 
                                        <span id="img_cavemapspan" class="img_cavemapspan hidden">nophoto.jpg</span>
                                    </div>                        
                                </div>
                                <div class="col-xs-12">
                                    <hr>
                                    <div class="col-xs-12 col-lg-6">
                                        <ul><li>
                                            <?= form_label('Name of Cave', '','for="cave_name"').form_input('cave_name', '', 'placeholder="Name of Cave" id="cave_name"'); ?>
                                        </li></ul>
                                    </div> 
                                    <div class="col-xs-12 col-lg-6">
                                        <ul><li>
                                            <?= form_label('Size of the area (Surveyed length)','','for="caves_area"').form_input('caves_area','','placeholder="Meters" onkeyup="run(this)" id="caves_area"'); ?>
                                        </li></ul>
                                    </div> 
                                </div>
                                <div class="col-xs-12">
                                    <div class="col-xs-12 col-lg-4">
                                        <ul><li>
                                            <?php echo form_label('Province','','for="caveprovid"').form_dropdown('caveprovid',$provinceList,'','class="select-css" id="caveprovid"') ?>
                                            <div class="cavemunicipal_error"></div>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-12 col-lg-4">
                                        <ul><li>
                                            <?php echo form_label('Municipality','','for="cavemunid"').form_dropdown('cavemunid','','','class="select-css" id="cavemunid"') ?>
                                            <div class="cavebarangay_error"></div>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-12 col-lg-4">
                                        <ul><li>
                                            <?php echo form_label('Barangay','','for="cavebarid"').form_dropdown('cavebarid','','','class="select-css" id="cavebarid"') ?>
                                            <!-- <div class="cavebarangay_error"></div> -->
                                        </li></ul>
                                    </div>
                                </div>
                                <fieldset>
                                <legend style="background-color: transparent;color: #000; font-weight: 700;font-size: 14px;">Coordinates (point location)</legend>
                                <div class="col-xs-12">
                                    <div class="col-xs-12 col-lg-12">
                                        <table class="table-ola">                                          
                                            <tbody>
                                                <tr>
                                                    <td>Longitude</td>
                                                    <td width="">
                                                        <table class="table-ola">
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <ul><li>                                                            
                                                                            <?= form_label('Direction','for=""').form_dropdown('clongdmsdir',$direct_long,'','class="select-css" id="clongdmsdir"'); ?>
                                                                        </li></ul>
                                                                        </td>
                                                                    <td>
                                                                        <ul><li>
                                                                            <?= form_label('Degree (°)','for="clongdmsdegree"').form_input('clongdmsdegree','','id="clongdmsdegree" class="dmstodd"') ?>
                                                                        </li></ul>
                                                                    </td>
                                                                    <td>
                                                                        <ul><li>
                                                                            <?= form_label('Minute (ˈ)','for="clongdmsminute"').form_input('clongdmsminute','','id="clongdmsminute" class="dmstodd"') ?>
                                                                        </li></ul>
                                                                    </td>
                                                                    <td>
                                                                        <ul><li>
                                                                            <?= form_label('Second (")','for="clongdmssecond"').form_input('clongdmssecond','','id="clongdmssecond" class="dmstodd"') ?>
                                                                        </li></ul>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Convert</td><td colspan="2"><?= form_input('clongoutputdd','','id="clongoutputdd"')?></td>
                                                                    <td><?php echo form_button('en','Enable/Disable','class="clongen"') ?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Latitude</td>
                                                    <td width="">
                                                        <table class="table-ola">
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <ul><li>
                                                                           <?= form_label('Direction','for=""').form_dropdown('clatdmsdir',$direct_lat,'','class="select-css" id="clatdmsdir"'); ?>
                                                                        </li></ul>
                                                                        </td>
                                                                    <td>
                                                                        <ul><li>
                                                                            <?= form_label('Degree (°)','for="clatdmsdegree"').form_input('clatdmsdegree','','id="clatdmsdegree" class="dmstodd"') ?>
                                                                        </li></ul>
                                                                    </td>
                                                                    <td>
                                                                        <ul><li>
                                                                            <?= form_label('Minute (ˈ)','for="clatdmsminute"').form_input('clatdmsminute','','id="clatdmsminute" class="dmstodd"') ?>
                                                                        </li></ul>
                                                                    </td>
                                                                    <td>
                                                                        <ul><li>
                                                                            <?= form_label('Second (")','for="clatdmssecond"').form_input('clatdmssecond','','id="clatdmssecond" class="dmstodd"') ?>
                                                                        </li></ul>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Convert</td><td colspan="2"><?= form_input('clatoutputdd','','id="clatoutputdd"') ?></td>
                                                                    <td><?php echo form_button('en','Enable/Disable','class="claten"') ?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>                                                
                                            </tbody>
                                        </table>
                                    </div>                                    
                                </div>
                            </fieldset> 
                                <!-- <div class="col-xs-12">
                                    <fieldset>
                                        <legend>Types of Cave</legend>
                                        <div class="col-xs-6 col-lg-6">
                                            <ul><li>
                                                <?= form_label('&nbsp;', '','for="typecave"').form_dropdown('typecave',$cave_type,'','class="select-css" id="typecave"'); ?>
                                            </li></ul>
                                        </div>
                                    </fieldset>
                                </div>  -->
                                <!-- <div class="col-xs-12">
                                    <fieldset>
                                        <legend>Coordinates</legend>
                                            <div class="col-xs-6 col-lg-6">
                                                <ul><li>
                                                <?= form_label('Longitude', '','for="cave_long"').form_input('cave_long', '', 'placeholder="Coordinates(Longitude)" id="cave_long"'); ?>
                                                </li></ul>
                                            </div>
                                            <div class="col-xs-6 col-lg-6">
                                                <ul><li>
                                                <?= form_label('Latitude', '','for="cave_lat"').form_input('cave_lat', '', 'placeholder="Coordinates(Latitude)" id="cave_lat"'); ?>
                                                </li></ul>
                                            </div>
                                    </fieldset>
                                </div> -->
                                <div class="col-xs-12">
                                    <fieldset>
                                        <legend>Cave Classification</legend>
                                            <div class="col-xs-6 col-lg-6">
                                                <ul><li>
                                                <?= form_label('&nbsp;', '','for="caveclass"').form_dropdown('caveclass',$cave_landstat,'','class="select-css" id="caveclass"'); ?>
                                                </li></ul>
                                            </div>
                                            <div class="col-xs-6 col-lg-6">
                                                <ul><li>
                                                    <label for="caveclassinfo">Cave classification details</label><textarea id="caveclassinfo" name="caveclassinfo" readonly="readonly"></textarea> 
                                                </li></ul>
                                            </div>  
                                            <div class="col-xs-6 col-lg-6" id="cave_others">
                                                <ul><li>
                                                <?= form_label('Specify Others', '','for="cave_landstat_others"').form_input('cave_landstat_others', '', 'placeholder="Specify others" id="cave_landstat_others"'); ?>
                                                </li></ul>
                                            </div>
                                    </fieldset>
                                </div>
                                <div class="col-xs-12 ">
                                    <a type="text" class="btn btn-primary" id="addCavesP">Add data</a>
                                </div>
                                <div class="col-xs-12 "><br>
                                    <table id="tblcaves_sample" class="table tglobal">
                                        <tbody id="tbodycaves_sample" style="text-align: left;border: 0 none;"></tbody>
                                    </table>
                                    <div class="table-responsive text-nowrap" style="overflow-x:auto;">
                                        <table id="tblcaves" class="table-ola" style="z-index: 100">
                                            <thead>
                                                <tr>
                                                    <th colspan="7" style="text-align: center; font-size: 24px">Cave</th>
                                                </tr>
                                                <tr class="text-nowrap">
                                                    <th rowspan="3">Cave Name</th>
                                                    <th rowspan="3">Area (Meters)</th>
                                                    <th rowspan="3">Location <br>(Province, Municipality, Barangay)</th>
                                                    <th colspan="2">Coordinates</th>  
                                                    <th rowspan="3">Cave Classification</th>
                                                    <th rowspan="3">Option</th>                                             
                                                </tr>
                                                <tr>
                                                    <th rowspan="2">Longitude</th>
                                                    <th rowspan="2">Latitude</th>                                                    
                                                </tr>                                                
                                            </thead>
                                            <tbody id="tbodycaves"></tbody>
                                        </table>                                                
                                    </div>
                                </div>                                
                            </fieldset>
                        </div>
                        <div id="mariner" class="tabcontentEcon">
                            <div class="tab">
                                <a class="tablinkmarine active" onclick="tabmarine(event, 'marinecoralsv2')">Coral Reef Ecosystem</a>
                                <a class="tablinkmarine" onclick="tabmarine(event, 'seagrass2')" id="seagrassclick">Seagrass Ecosystem</a>
                                <a class="tablinkmarine" onclick="tabmarine(event, 'mangrove')" id="mangroveclick">Mangrove Ecosystem</a>
                            </div>
                            <div id="marinecoralsv2" class="tabcontentmarine" style="display: block;"> 
                                <input type="hidden" name="genCoral" id="genCoral" value="<?php echo generateRandomStringCoastal(); ?>">
                                <fieldset>
                                    <div class="col-xs-12">                                        
                                        <div class="col-xs-6 col-lg-6 ">    
                                        <ul><li>
                                            <div id="fetch_images_coral"></div>
                                            <span>Insert map image</span><br>
                                        </li></ul>                                    
                                            <input type='file' name="img_coralmap" id="img_coralmap"/><br>
                                            <input type="hidden" name="old_picture" value="nophoto.jpg"> 
                                            <span id="img_coralmapspan" class="img_coralmapspan hidden">nophoto.jpg</span>
                                        </div>
                                        <div class="col-xs-6 col-lg-6">
                                            <ul><li>
                                                <?= form_label('Total Coverage(ha.)','for="coral_ha"').form_input('coral_ha','','onkeyup="run(this)" id="coral_ha"') ?>
                                                <span>Information may be provided from NAMRIA Coastal Resource Mapping Project or RS Maps from CARE-CaDRES</span>  <br>                                              
                                            </li></ul>
                                            <ul><li>
                                                <?= form_label('Remarks','for="coral_remarks"').form_textarea('coral_remarks','','id="coral_remarks"') ?><br>
                                                <!-- <span>Information may be provided from NAMRIA Coastal Resource Mapping Project or RS Maps from CARE-CaDRES</span> -->
                                            </li></ul>
                                            <a type="text" class="btn btn-primary" id="addcoralreefters">Add new Coral Reef</a><br>                                            
                                        </div>  
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="table-responsive text-nowrap" style="overflow-x:auto;"><br>                 
                                                <table id="tblcoralreefs_samples" class="table-ola">                                  
                                                    <tbody id="tbodycoralreefs_sample"></tbody>
                                                </table>                                                                             
                                                <table id="tblcoralreefs" class="table-ola">
                                                    <thead>  
                                                        <tr style="background: #fcf8e3">
                                                           <td colspan="3" style="text-align: center; font-size: 24px">Coral Reef</td> 
                                                        </tr>  
                                                        <tr style="background: #fcf8e3">
                                                            <td>Coral Reef Area</td>                                                           
                                                            <td>Remarks</td>
                                                            <td>Option</td>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbodycoralreefs"></tbody>
                                                </table>                                        
                                            </div>
                                    </div>                                    
                                </fieldset>  
                                <hr>                             
                                <fieldset>
                                    <legend>Dominant Species</legend>
                                    <div class="col-xs-12">
                                        <div class="col-xs-4 col-lg-4">
                                            <?php echo form_label('Coral Species','idcoralspecies').form_dropdown('idcoralspecies',$coralspecies,'','id="idcoralspecies" class="select-css" style="font-style: italic;"') ?><br>
                                        </div>
                                        <div class="col-xs-1 col-lg-1"><br>
                                            <a type="text" class="btn btn-primary" id="addcoralspecies">Add</a>
                                        </div>
                                        <div class="col-xs-7 col-lg-7 ">
                                            <div class="table-responsive"> 
                                            <table id="tblcoralspecies_sample" class="table-ola">
                                                <tbody id="tbodycoralspecies_sample"></tbody>
                                            </table>                                           
                                            <table id="tblcoralspecies" class="table-ola">
                                                <thead>  
                                                    <tr style="background: #fcf8e3">
                                                       <td colspan="3">Coral Species</td> 
                                                    </tr>                                         
                                                    <tr style="background: #fcf8e3">
                                                        <td>Species name</td>
                                                        <td>Date Upload</td>
                                                        <td>Option</td>         
                                                    </tr>
                                                </thead>
                                                <tbody id="tbodycoralspecies"></tbody>
                                            </table>                                           
                                            </div>
                                        </div>
                                    </div>                                    
                                </fieldset>
                            </div>
                            <div id="seagrass2" class="tabcontentmarine" style="display: none;"> 
                                <fieldset>          
                                    <div class="col-xs-12">                                        
                                        <div class="col-xs-6 col-lg-6 ">   
                                        <ul><li>
                                            <div id="fetch_images_seagrass"></div><br>
                                            <span>Insert map image</span>
                                        </li></ul>    
                                            <input type='file' name="img_seagrassmap" id="img_seagrassmap"/><br>
                                            <input type="hidden" name="old_picture" value="nophoto.jpg"> 
                                            <span id="img_seagrassmapspan" class="img_seagrassmapspan hidden">nophoto.jpg</span>
                                        </div>
                                        <div class="col-xs-6 col-lg-6">
                                            <ul><li>
                                                <?= form_label('Total Coverage(ha.)','for="seagrass_ha"').form_input('seagrass_ha','','onkeyup="run(this)" id="seagrass_ha"') ?>
                                                <span>Information may be provided from NAMRIA Coastal Resource Mapping Project or RS Maps from CARE-CaDRES</span>  <br>                                              
                                            </li></ul>
                                            <ul><li>
                                                <?= form_label('Remarks','for="seagrass_remarks"').form_textarea('seagrass_remarks','','id="seagrass_remarks"') ?><br>
                                                <!-- <span>Information may be provided from NAMRIA Coastal Resource Mapping Project or RS Maps from CARE-CaDRES</span> -->
                                            </li></ul>
                                            <a type="text" class="btn btn-primary" id="addseagrassreefters">Add</a><br>                                           
                                        </div>  
                                    </div> 
                                    <div class="col-xs-12"> 
                                        <div class="table-responsive text-nowrap" style="overflow-x:auto;"><br>                 
                                            <table id="tblseagrassreefs_samples" class="table-ola">                                  
                                                <tbody id="tbodyseagrassreefs_sample"></tbody>
                                            </table>                                                                             
                                            <table id="tblseagrassreefs" class="table-ola">
                                                <thead>  
                                                    <tr style="background: #fcf8e3">
                                                       <td colspan="3" style="text-align: center; font-size: 24px">Seagrass</td> 
                                                    </tr>  
                                                    <tr style="background: #fcf8e3">
                                                        <td>Seagrass Area</td>                                                           
                                                        <td>Remarks</td>
                                                        <td>Option</td>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbodyseagrassreefs"></tbody>
                                            </table>                                        
                                        </div>      
                                    </div>                   
                                </fieldset>
                                <hr>
                                <fieldset>
                                    <legend>Seagrass Species</legend>
                                    <div class="col-xs-12">                                    
                                        <div class="col-xs-5 col-lg-5">
                                            <ul><li>
                                                <?php echo form_label('Species name','for="seagrassSpecieses"').form_dropdown('seagrassSpecieses',$seagrasspecies,'','id="seagrassSpecieses" class="select-css" style="font-style:italic"') ?>
                                            </li></ul>
                                        </div>
                                        <div class="col-xs-1 col-lg-1"><br>
                                            <a type="text" class="btn btn-primary" id="addseagrasses1">Add</a>
                                        </div> 
                                        <div class="col-xs-6 col-lg-6">
                                            <div class="table-responsive text-nowrap" style="overflow-x:auto;">
                                            <table id="tblseagrasses_sample" class="table-ola">
                                                <tbody id="tbodyseagrasses_sample"></tbody>
                                            </table>   
                                            <table id="tblseagrasses" class="table-ola" style="z-index: 100">
                                                <thead>  
                                                    <tr style="background: #fcf8e3">
                                                       <td colspan="3">Seagrass Species</td> 
                                                    </tr>                                          
                                                    <tr style="background: #fcf8e3">
                                                        <td>Species name</td>
                                                        <td>Date Upload</td>
                                                        <td>Option</td>         
                                                    </tr>
                                                </thead>
                                                <tbody id="tbodyseagrasses"></tbody>
                                            </table>                                                                           
                                            </div>
                                        </div>                                       
                                    </div>                                    
                                </fieldset>
                            </div>
                            <div id="mangrove" class="tabcontentmarine" style="display: none;">
                                <fieldset>          
                                    <div class="col-xs-12">                                        
                                        <div class="col-xs-6 col-lg-6 ">   
                                        <ul><li>
                                            <div id="fetch_images_mangrove"></div><br>
                                            <span>Insert map image</span>
                                        </li></ul>    
                                            <input type='file' name="img_mangrovemap" id="img_mangrovemap"/><br>
                                            <input type="hidden" name="old_picture" value="nophoto.jpg"> 
                                            <span id="img_mangrovemapspan" class="img_mangrovemapspan hidden">nophoto.jpg</span>
                                        </div>
                                        <div class="col-xs-6 col-lg-6">
                                            <ul><li>
                                                <?= form_label('Total Coverage(ha.)','for="mangrove_ha"').form_input('mangrove_ha','','onkeyup="run(this)" id="mangrove_ha"') ?>
                                                <span>Information may be provided from NAMRIA Coastal Resource Mapping Project or RS Maps from CARE-CaDRES</span>  <br>                                              
                                            </li></ul>
                                            <ul><li>
                                                <?= form_label('Remarks','for="mangrove_remarks"').form_textarea('mangrove_remarks','','id="mangrove_remarks"') ?><br>
                                                <!-- <span>Information may be provided from NAMRIA Coastal Resource Mapping Project or RS Maps from CARE-CaDRES</span> -->
                                            </li></ul>
                                            <a type="text" class="btn btn-primary" id="addmangrove">Add</a><br>                                            
                                        </div>  
                                    </div>         
                                    <div class="col-xs-12">
                                        <div class="table-responsive text-nowrap" style="overflow-x:auto;"><br>                 
                                            <table id="tblmangrovereefs_samples" class="table-ola">                                  
                                                <tbody id="tbodymangrovereefs_sample"></tbody>
                                            </table>                                                                             
                                            <table id="tblmangrovereefs" class="table-ola">
                                                <thead>  
                                                    <tr style="background: #fcf8e3">
                                                       <td colspan="3" style="text-align: center; font-size: 24px">Mangrove</td> 
                                                    </tr>  
                                                    <tr style="background: #fcf8e3">
                                                        <td>Mangrove Area</td>                                                           
                                                        <td>Remarks</td>
                                                        <td>Option</td>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbodymangrove"></tbody>
                                            </table>                                        
                                        </div>
                                    </div>                 
                                </fieldset>
                                <hr>
                                <fieldset>
                                    <legend>Mangrove Species</legend>
                                    <div class="col-xs-12">                                    
                                        <div class="col-xs-5 col-lg-5">
                                            <ul><li>
                                                <?php echo form_label('Species name','for="mangrovespecies"').form_dropdown('mangrovespecies',$mangrovespecies,'','id="mangrovespecies" class="select-css" style="font-style:italic"') ?>
                                            </li></ul>
                                        </div>
                                        <div class="col-xs-1 col-lg-1"><br>
                                            <a type="text" class="btn btn-primary" id="addmangrovespecies">Add</a>
                                        </div> 
                                        <div class="col-xs-6 col-lg-6">
                                            <div class="table-responsive text-nowrap" style="overflow-x:auto;">
                                            <table id="tblmangrovespecies_sample" class="table-ola">
                                                <tbody id="tbodymangrovespecies_sample"></tbody>
                                            </table>   
                                            <table id="tblmangrovespecies" class="table-ola" style="z-index: 100">
                                                <thead>  
                                                    <tr style="background: #fcf8e3">
                                                       <td colspan="3">Mangrove Species</td> 
                                                    </tr>                                          
                                                    <tr style="background: #fcf8e3">
                                                        <td>Species name</td>
                                                        <td>Date Upload</td>
                                                        <td>Option</td>         
                                                    </tr>
                                                </thead>
                                                <tbody id="tbodymangrovespecies"></tbody>
                                            </table>                                                                           
                                            </div>
                                        </div>                                       
                                    </div>                                    
                                </fieldset>
                            </div>

                            <!-- OLD CORAL REEF FORM -->
                            <div id="marinecorals" class="tabcontentmarine" style="display: none;"> 
                                <fieldset>                                    
                                    <legend>Coral Reef Area</legend>
                                    <div class="col-xs-12">
                                        <div class="col-xs-3 col-lg-3">
                                            <ul><li>
                                                <?= form_label('Coverage(ha.)','for="coral_has"').form_input('coral_has','','onkeyup="run(this)" id="coral_has"') ?>
                                                <span>Information may be provided from NAMRIA Coastal Resource Mapping Project or RS Maps from CARE-CaDRES</span>                                                
                                            </li></ul>
                                        </div>
                                        <div class="col-xs-3 col-lg-3">
                                            <ul><li>
                                                <?= form_label('Site Assessed-Baseline Assessment','for="coral_saba_point"').form_input('coral_saba_point','','id="coral_saba_point"') ?>
                                                <span>(point location)</span>
                                            </li></ul>
                                        </div>
                                        <div class="col-xs-3 col-lg-3">
                                            <ul><li>
                                                <?php echo form_label('Hard Coral Cover (%HCC)','hccid').form_dropdown('hccid',$hcc,'','id="hccid" class="select-css"') ?>
                                            </li></ul>
                                        </div>
                                        <div class="col-xs-3 col-lg-3">
                                            <ul><li>
                                                <label for="hccoutput">Hard Coral Cover Condition</label><input type="text" id="hccoutput" name="hccoutput" />                                                
                                            </li></ul>
                                        </div>                                        
                                    </div>
                                    <div class="col-xs-12">
                                        <fieldset>
                                            <legend>Coastal Resource Map (kml/kmz) optional</legend>
                                            <div class="col-xs-12">
                                                <div class="col-xs-4 col-lg-4">
                                                    <ul><li>  
                                                        <input type='file' name="shpfilecoral" id="shpfilecoral" onchange="readURLReefshp(this);" />
                                                        <span id="img_reefshpspan" class="img_reefshpspan "></span>       
                                                        <span>Information may be provided from NAMRIA Coastal Resource Mapping Project or RS Maps from CARE-CaDRES</span>
                                                                                                 
                                                    </li></ul>  
                                                </div>
                                                <div class="col-xs-1 col-lg-1">
                                                    <br>
                                                    <a type="text" class="btn btn-primary" id="addcoralkmlkmz">Add</a>
                                                </div>
                                                <div class="col-xs-7 col-lg-7">
                                                    <table id="tblcoralkmlkmz" class="table-ola" style="z-index: 100">
                                                        <thead>  
                                                            <tr style="background: #fcf8e3">
                                                               <td colspan="2">Coastal Resource Map(KML/KMZ) List</td> 
                                                            </tr>                                          
                                                            <tr style="background: #fcf8e3">                                                            
                                                                <td>KML/KMZ</td>
                                                                <td>Remove</td>                                                            
                                                            </tr>
                                                        </thead>
                                                        <tbody id="tbodycoralkmlkmz"></tbody>
                                                    </table>
                                                    <table id="tblcoralkmlkmz_sample" class="table-ola" style="z-index: 100">
                                                        <tbody id="tbodycoralkmlkmz_sample"></tbody>                                                        
                                                    </table>
                                                </div>
                                            </div>
                                        </fieldset>                                        
                                    </div>
                                    <div class="col-xs-12">
                                        <fieldset>
                                            <legend>Monitoring station/block</legend>
                                            <div class="col-xs-12">
                                                <div class="col-xs-4 col-lg-4">
                                                    <ul><li>
                                                        <?= form_label('Point Location','for="coral_monitoring_points"').form_input('coral_monitoring_points','','id="coral_monitoring_points"') ?>
                                                        <span>(point location)</span>
                                                    </li></ul>
                                                </div>
                                                <div class="col-xs-1 col-lg-1">
                                                    <br>
                                                    <a type="text" class="btn btn-primary" id="addmonitoringsite">Add</a>
                                                </div>
                                                <div class="col-xs-7 col-lg-7">
                                                    <table id="tblmonitoringsite" class="table-ola" style="z-index: 100">
                                                        <thead>  
                                                            <tr style="background: #fcf8e3">
                                                               <td colspan="2">Monitoring station/block List</td> 
                                                            </tr>                                          
                                                            <tr style="background: #fcf8e3">                                                            
                                                                <td>Point location</td>
                                                                <td>Remove</td>                                                            
                                                            </tr>
                                                        </thead>
                                                        <tbody id="tbodymonitoringsite"></tbody>
                                                    </table>
                                                    <table id="tblmonitoringsite_sample" class="table-ola" style="z-index: 100">
                                                        <tbody id="tbodymonitoringsite_sample"></tbody>                                                        
                                                    </table>
                                                </div>
                                            </div>                                            
                                        </fieldset>
                                        <div class="col-xs-4 col-lg-4 hidden">
                                            <ul><li>
                                                <?= form_label('Monitoring station/block','for="coral_pms_points"').form_input('coral_pms_points','','id="coral_pms_points"') ?>
                                                <span>(point location)</span>
                                            </li></ul>
                                        </div>                                        
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend>Date Assessed</legend>
                                    <div class="col-xs-12">
                                        <div class="col-xs-4 col-lg-4 ">
                                            <ul><li>
                                                <?php echo form_label('Month','','for="coral_month"').form_dropdown('coral_month',$monthList,'','class="select-css" id="coral_month"') ?>
                                            </li></ul>
                                        </div>
                                        <div class="col-xs-4 col-lg-4 ">
                                            <ul><li>
                                                <?php echo form_label('Day','','for="coral_day"').form_dropdown('coral_day',$dayList,'','class="select-css" id="coral_day"') ?>
                                            </li></ul>
                                        </div>
                                        <div class="col-xs-4 col-lg-4 ">
                                            <ul><li>
                                                <?php echo form_label('Year','','for="coral_year"').form_dropdown('coral_year',$yearListed,'','class="select-css" id="coral_year"') ?>
                                            </li></ul>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend>Sampling Station/Remarks</legend>
                                    <div class="col-xs-12">
                                        <ul><li>
                                            <?php echo form_textarea('samplingstation','','id="samplingstation" placeholder="Sampling station/remarks"') ?>
                                        </li></ul>
                                    </div>
                                </fieldset> 
                                <fieldset>
                                    <legend>Location</legend>
                                    <div class="col-xs-12">                                       
                                        <div class="col-xs-2 col-lg-2">
                                            <?php echo form_label('Municipality','','for="coral_municipal"').form_dropdown('coral_municipal',$provincesList,'','class="select-css" id="coral_municipal"') ?>
                                        </div>
                                        <div class="col-xs-2 col-lg-2">
                                            <?php echo form_label('Barangay','','for="coral_barangay"').form_dropdown('coral_barangay','','','class="select-css" id="coral_barangay"') ?><br>
                                        </div>
                                        <div class="col-xs-1 col-lg-1">
                                            <br>
                                            <a type="text" class="btn btn-primary" id="addcoralloc">Add</a>
                                        </div>
                                        <div class="col-xs-7 col-lg-7">
                                            <table id="tblcorallo" class="table-ola" style="z-index: 100">
                                                <thead>  
                                                    <tr style="background: #fcf8e3">
                                                       <td colspan="3">Coral Reef Ecosystem Location</td> 
                                                    </tr>                                          
                                                    <tr style="background: #fcf8e3">                                                            
                                                        <td>Municipal</td>
                                                        <td>Barangay</td>
                                                        <td>Remove</td>                                                            
                                                    </tr>
                                                </thead>
                                                <tbody id="tbodycoralloc"></tbody>
                                            </table>  
                                            <table id="tblcorallo_edit" class="table-ola" style="z-index: 100">
                                                <tbody id="tbodycoralloc_edit"></tbody>                                                
                                            </table>                                           
                                        </div>
                                    </div> 
                                </fieldset>
                                <fieldset>
                                    <legend>Substrate Composition</legend>
                                    <div class="col-xs-12">
                                        <div class="col-xs-4 col-lg-4">
                                            <ul><li>
                                                <?php echo form_label('Hard Coral (HC)','for="hcid"').form_input('hcid','','id="hcid" onkeyup="run(this)"')?>
                                                <span>% Composition</span>
                                            </li></ul>
                                        </div>
                                        <div class="col-xs-4 col-lg-4">
                                            <ul><li>
                                                <?php echo form_label('Algal Assemblage (AA)','for="aaid"').form_input('aaid','','id="aaid" onkeyup="run(this)"')?>
                                                <span>% Composition</span>
                                            </li></ul>
                                        </div>
                                        <div class="col-xs-4 col-lg-4">
                                            <ul><li>
                                                <?php echo form_label('Abiotic (AB)','for="abid"').form_input('abid','','id="abid" onkeyup="run(this)"')?>
                                                <span>% Composition</span>
                                            </li></ul>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="col-xs-4 col-lg-4">
                                            <ul><li>
                                                <?php echo form_label('Microalgae (MA)','for="maid"').form_input('maid','','id="maid" onkeyup="run(this)"')?>
                                                <span>% Composition</span>
                                            </li></ul>
                                        </div>
                                        <div class="col-xs-4 col-lg-4">
                                            <ul><li>
                                                <?php echo form_label('Halimeda (HA)','for="haid"').form_input('haid','','id="haid" onkeyup="run(this)"')?>
                                                <span>% Composition</span>
                                            </li></ul>
                                        </div>
                                        <div class="col-xs-4 col-lg-4">
                                            <ul><li>
                                                <?php echo form_label('Other Biota (OB)','for="obid"').form_input('obid','','id="obid" onkeyup="run(this)"')?>
                                                <span>% Composition</span>
                                            </li></ul>
                                        </div>
                                    </div>
                                </fieldset>
                                                                                       
                                <fieldset>
                                    <legend>Reef Asscociated-Fishes</legend>
                                    <div class="col-xs-12">
                                        <h1>Species Composition</h1>
                                        <div class="col-xs-4">
                                            <ul><li>                            
                                                <img width="250px" height="210px" id="imagereef" src="<?php echo base_url("bmb_assets2/upload/coralreef/reef_photo/nophoto.jpg") ?>" alt="your image" /><br>
                                                <input type='file' name="img_reef" id="img_reef" onchange="readURLReef(this);"  /><br>
                                                <input type="hidden" name="old_picture" value="nophoto.jpg"> 
                                                <span id="img_reefspan" class="img_reefspan hide">nophoto.jpg</span>
                                            </li></ul>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">                                    
                                        <div class="col-xs-7 col-lg-7">
                                            <ul><li>
                                                <?php echo form_label('Species name','for="speciesName"').form_input('speciesName','','id="speciesName"') ?>
                                            </li></ul>
                                        </div>
                                        <div class="col-xs-1 col-lg-1"><br>
                                            <a type="text" class="btn btn-primary" id="addreefaf">Add</a>
                                        </div>                                        
                                    </div>                                    
                                    <div class="col-xs-12 ">
                                        <div class="table-responsive text-nowrap" style="overflow-x:auto;">
                                        <table id="tblreefaf" class="table-ola" style="z-index: 100">
                                            <thead>  
                                                <tr style="background: #fcf8e3">
                                                   <td colspan="3">Reef Asscociated-Fishes List</td> 
                                                </tr>                                          
                                                <tr style="background: #fcf8e3">                                                            
                                                    <td>Species name</td>
                                                    <td>Image</td>
                                                    <td>Remove</td>                                                            
                                                </tr>
                                            </thead>
                                            <tbody id="tbodyreefaf"></tbody>
                                        </table>
                                        <table id="tblreefaf_sample" class="table table-bordered tglobal">
                                            <tbody id="tbodyreefaf_sample" style="text-align: left;border: 0 none;"></tbody>
                                        </table> 
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend>Density and Biomass</legend>
                                    <div class="col-xs-12">
                                        <div class="col-xs-6 col-lg-6">
                                            <ul><li>
                                                <?php echo form_label('Density','for="coraldensity"').form_input('coraldensity','','id="coraldensity" onkeyup="run(this)"') ?>
                                            </li></ul>
                                        </div>
                                        <div class="col-xs-6 col-lg-6">
                                            <ul><li>
                                                <?php echo form_label('Biomass','for="coralbiomass"').form_input('coralbiomass','','id="coralbiomass" onkeyup="run(this)"') ?>
                                            </li></ul>
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="col-xs-1 col-lg-1"><br>
                                    <a type="text" class="btn btn-primary" id="addcoralreefter">Add new Coral Reef</a>
                                </div>
                                <div class="col-xs-12 ">
                                        <!-- <div class="table-responsive text-nowrap" style="overflow-x:auto;"> --><br>                 
                                        <table id="tblcoralreef_samples" class="table-ola">                                  
                                            <tbody id="tbodycoralreef_sample"></tbody>
                                        </table>                                                                             
                                        <table id="tblcoralreef" class="table-ola">
                                            <thead>  
                                                <tr style="background: #fcf8e3">
                                                   <td colspan="14" style="text-align: center; font-size: 24px">Coral Reef List</td> 
                                                </tr>  
                                                <tr style="background: #fcf8e3">
                                                    <td colspan="2">Coral Reef Area</td>
                                                    <td colspan="2">Hard Coral Cover</td>
                                                    <td colspan="6">Substrate Composition</td> 
                                                    <td colspan="2">Reef Fish</td>  
                                                    <td rowspan="2">Date Assessed</td>
                                                    <td rowspan="2">Option</td>
                                                </tr>                                        
                                                <tr style="background: #fcf8e3">                                                            
                                                    <td>Area</td>
                                                    <td>Site<br>Assessed-Baseline<br>Assessment </td>
                                                    <td class="hidden">Permanent<br>Monitoring<br>Site</td>
                                                    <td>(%HCC)</td>
                                                    <td>Condition</td>
                                                    <td>Hard Coral</td>
                                                    <td>Algal Assemblage</td>
                                                    <td>Abiotic</td>
                                                    <td>Microalgae</td>
                                                    <td>Halimeda</td>
                                                    <td>Other Biota</td>
                                                    <td>Density</td>                                                   
                                                    <td>Biomass</td>
                                                </tr>
                                            </thead>
                                            <tbody id="tbodycoralreef1"></tbody>
                                        </table>                                        
                                        <!-- </div> -->
                                    </div>  
                            </div>
                            <div id="seagrass" class="tabcontentmarine" style="display: none;">
                                <fieldset>                                    
                                    <legend>Seagrass Area</legend>
                                    <div class="col-xs-12">
                                        <div class="col-xs-6 col-lg-6">
                                            <ul><li>
                                                <?= form_label('Coverage(ha.)','for="seagrass_has"').form_input('seagrass_has','','onkeyup="run(this)" id="seagrass_has"') ?>
                                                <span>Information may be provided from NAMRIA Coastal Resource Mapping Project or RS Maps from CARE-CaDRES</span>
                                            </li></ul>
                                        </div>
                                        <div class="col-xs-6 col-lg-6">
                                            <ul><li>
                                                <?= form_label('Site Assessed-Baseline Assessment','for="seagrass_saba_point"').form_input('seagrass_saba_point','','id="seagrass_saba_point"') ?>
                                                <span>(point location)</span>                                                
                                            </li></ul>
                                        </div>                                        
                                    </div>
                                    <div class="col-xs-12">
                                        <fieldset>
                                            <legend>Coastal Resource Map (kml/kmz) optional</legend>
                                            <div class="col-xs-12">
                                                <div class="col-xs-4 col-lg-4">
                                                    <ul><li>  
                                                        <label>Coastal Resource Map (kml/kmz)</label>                          
                                                        <input type='file' name="shpfileseagrass" id="shpfileseagrass" onchange="readURLSeaGrassshp(this);" />
                                                        <span id="img_seagrassshpspan" class="img_seagrassshpspan hide"></span>       
                                                        <span>Information may be provided from NAMRIA Coastal Resource Mapping Project or RS Maps from CARE-CaDRES</span>
                                                    </li></ul>  
                                                </div>
                                                <div class="col-xs-1 col-lg-1">
                                                    <br>
                                                    <a type="text" class="btn btn-primary" id="addseagrasskmlkmz">Add</a>
                                                </div>
                                                <div class="col-xs-7 col-lg-7">
                                                    <table id="tblseagrasskmlkmz" class="table-ola" style="z-index: 100">
                                                        <thead>  
                                                            <tr style="background: #fcf8e3">
                                                               <td colspan="2">Coastal Resource Map(KML/KMZ) List</td> 
                                                            </tr>                                          
                                                            <tr style="background: #fcf8e3">                                                            
                                                                <td>KML/KMZ</td>
                                                                <td>Remove</td>                                                            
                                                            </tr>
                                                        </thead>
                                                        <tbody id="tbodyseagrasskmlkmz"></tbody>
                                                    </table>
                                                    <table id="tblseagrasskmlkmz_sample" class="table-ola" style="z-index: 100">
                                                        <tbody id="tbodyseagrasskmlkmz_sample"></tbody>                                                        
                                                    </table>
                                                </div>
                                            </div>
                                        </fieldset>                                        
                                    </div>
                                    <div class="col-xs-12">
                                        <fieldset>
                                            <legend>Monitoring station/block</legend>
                                            <div class="col-xs-12">
                                                <div class="col-xs-4 col-lg-4">
                                                    <ul><li>
                                                        <?= form_label('Point Location','for="seagrass_monitoring_points"').form_input('seagrass_monitoring_points','','id="seagrass_monitoring_points"') ?>
                                                        <span>(point location)</span>
                                                    </li></ul>
                                                </div>
                                                <div class="col-xs-1 col-lg-1">
                                                    <br>
                                                    <a type="text" class="btn btn-primary" id="addmonitoringsiteseagrass">Add</a>
                                                </div>
                                                <div class="col-xs-7 col-lg-7">
                                                    <table id="tblseagrassmonitoringsite" class="table-ola" style="z-index: 100">
                                                        <thead>  
                                                            <tr style="background: #fcf8e3">
                                                               <td colspan="2">Monitoring station/block List</td> 
                                                            </tr>                                          
                                                            <tr style="background: #fcf8e3">                                                            
                                                                <td>Point location</td>
                                                                <td>Remove</td>                                                            
                                                            </tr>
                                                        </thead>
                                                        <tbody id="tbodyseagrassmonitoringsite"></tbody>
                                                    </table>
                                                    <table id="tblseagrassmonitoringsite_sample" class="table-ola" style="z-index: 100">
                                                        <tbody id="tbodyseagrassmonitoringsite_sample"></tbody>                                                        
                                                    </table>
                                                </div>
                                            </div>                                            
                                        </fieldset>                                                                           
                                    </div>                                    
                                </fieldset>
                                <fieldset>
                                    <legend>Date Assessed</legend>
                                    <div class="col-xs-12">
                                        <div class="col-xs-4 col-lg-4 ">
                                            <ul><li>
                                                <?php echo form_label('Month','','for="seagrass_month"').form_dropdown('seagrass_month',$monthList,'','class="select-css" id="seagrass_month"') ?>
                                            </li></ul>
                                        </div>
                                        <div class="col-xs-4 col-lg-4 ">
                                            <ul><li>
                                                <?php echo form_label('Day','','for="seagrass_day"').form_dropdown('seagrass_day',$dayList,'','class="select-css" id="seagrass_day"') ?>
                                            </li></ul>
                                        </div>
                                        <div class="col-xs-4 col-lg-4 ">
                                            <ul><li>
                                                <?php echo form_label('Year','','for="seagrass_year"').form_dropdown('seagrass_year',$yearListed,'','class="select-css" id="seagrass_year"') ?>
                                            </li></ul>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend>Sampling Station/Remarks</legend>
                                    <div class="col-xs-12">
                                        <ul><li>
                                            <?php echo form_textarea('seagrasssamplingstation','','id="seagrasssamplingstation" placeholder="Sampling station/remarks"') ?>
                                        </li></ul>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend>Location</legend>
                                    <div class="col-xs-12">                                       
                                        <div class="col-xs-2 col-lg-2">
                                            <?php echo form_label('Municipality','','for="seagrass_municipal"').form_dropdown('seagrass_municipal',$provincesList,'','class="select-css" id="seagrass_municipal"') ?>
                                        </div>
                                        <div class="col-xs-2 col-lg-2">
                                            <?php echo form_label('Barangay','','for="seagrass_barangay"').form_dropdown('seagrass_barangay','','','class="select-css" id="seagrass_barangay"') ?><br>
                                        </div>
                                        <div class="col-xs-1 col-lg-1">
                                            <br>
                                            <a type="text" class="btn btn-primary" id="addseagrassloc">Add</a>
                                        </div>
                                        <div class="col-xs-7 col-lg-7 ">
                                            <div class="table-responsive text-nowrap" style="overflow-x:auto;"> 
                                            <table id="tblseagrassloc" class="table-ola" style="z-index: 100">
                                                <thead>  
                                                    <tr style="background: #fcf8e3">
                                                       <td colspan="3">Coral Reef Ecosystem Location</td> 
                                                    </tr>                                          
                                                    <tr style="background: #fcf8e3">                                                            
                                                        <td>Municipal</td>
                                                        <td>Barangay</td>
                                                        <td>Option</td>                                                            
                                                    </tr>
                                                </thead>
                                                <tbody id="tbodyseagrassloc"></tbody>
                                            </table>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend>Species Composition</legend>
                                    <div class="col-xs-12">
                                        <div class="col-xs-6 col-lg-6">
                                            <ul><li>
                                                <?php echo form_label('No. of species observed/recorded','for="noSpecies"').form_input('noSpecies','','id="noSpecies" onkeyup="run(this)"') ?>
                                            </li></ul>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend>Estimated Percent Cover</legend>
                                    <div class="col-xs-12">
                                        <h1>Seagrass Species</h1>
                                        <div class="col-xs-4">
                                            <ul><li>                            
                                                <img width="250px" height="210px" id="imageseagrassSpecies" src="<?php echo base_url("bmb_assets2/upload/coralreef/seagrass_photo/nophoto.jpg") ?>" alt="your image" /><br>
                                                <input type='file' name="img_seagrassSpecies" id="img_seagrassSpecies" onchange="readURLSeagrass(this);"  /><br>
                                                <input type="hidden" name="old_picture" value="nophoto.jpg"> 
                                                <span id="img_seagrassSpeciesspan" class="img_seagrassSpeciesspan hide">nophoto.jpg</span>
                                            </li></ul>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">                                    
                                        <div class="col-xs-4 col-lg-4">
                                            <ul><li>
                                                <?php echo form_label('Species name','for="seagrassSpecies"').form_dropdown('seagrassSpecies',$seagrasspecies,'','id="seagrassSpecies" class="select-css"') ?>
                                            </li></ul>
                                        </div>
                                        <div class="col-xs-1 col-lg-1"><br>
                                            <a type="text" class="btn btn-primary" id="addseagrass">Add</a>
                                        </div>                                        
                                    </div>                                    
                                    <div class="col-xs-12 ">
                                        <div class="table-responsive text-nowrap" style="overflow-x:auto;">
                                        <table id="tblseagrass" class="table-ola" style="z-index: 100">
                                            <thead>  
                                                <tr style="background: #fcf8e3">
                                                   <td colspan="3">Seagrass Species List</td> 
                                                </tr>                                          
                                                <tr style="background: #fcf8e3">                                                            
                                                    <td>Species name</td>
                                                    <td>Image</td>
                                                    <td>Option</td>                                                            
                                                </tr>
                                            </thead>
                                            <tbody id="tbodyseagrass"></tbody>
                                        </table>                                        
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend>Seagrass-associated Fauna</legend>
                                    <div class="col-xs-12">  
                                        <h1>Species Composition</h1>                                                                          
                                        <div class="col-xs-4 col-lg-4">
                                            <ul><li>  
                                                <img width="250px" height="210px" id="imageseagrassSpeciesCompo" src="<?php echo base_url("bmb_assets2/upload/coralreef/seagrasscompo_photo/nophoto.jpg") ?>" alt="your image" /><br>
                                                <input type='file' name="img_seagrassSpeciesCompo" id="img_seagrassSpeciesCompo" onchange="readURLSeagrassCompo(this);"  /><br>
                                                <input type="hidden" name="old_picture" value="nophoto.jpg"> 
                                                <span id="img_seagrassSpeciesCompospan" class="img_seagrassSpeciesCompospan hide">nophoto.jpg</span>    
                                            </li></ul>
                                        </div>                                            
                                    </div>
                                    <div class="col-xs-12">                                    
                                        <div class="col-xs-4 col-lg-4">
                                            <ul><li>
                                                <?php echo form_label('Species name','for="seagrassSpeciesCompoName"').form_input('seagrassSpeciesCompoName','','id="seagrassSpeciesCompoName"') ?>
                                            </li></ul>
                                        </div>
                                        <div class="col-xs-1 col-lg-1"><br>
                                            <a type="text" class="btn btn-primary" id="addseagrassCompo">Add</a>
                                        </div>                                        
                                    </div>                                    
                                    <div class="col-xs-12 ">
                                        <div class="table-responsive text-nowrap" style="overflow-x:auto;">
                                        <table id="tblseagrassCompo" class="table-ola" style="z-index: 100">
                                            <thead>  
                                                <tr style="background: #fcf8e3">
                                                   <td colspan="3">Seagrass Species Composition List</td> 
                                                </tr>                                          
                                                <tr style="background: #fcf8e3">                                                            
                                                    <td>Species name</td>
                                                    <td>Image</td>
                                                    <td>Option</td>                                                            
                                                </tr>
                                            </thead>
                                            <tbody id="tbodyseagrassCompo"></tbody>
                                        </table><hr>                                       
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <h1>Presence of Dugong trails</h1>
                                        <div class="col-xs-4 col-lg-4">
                                            <ul><li>  
                                                <img width="250px" height="210px" id="imageseagrassSpeciesdugong" src="<?php echo base_url("bmb_assets2/upload/coralreef/seagrassdugong_photo/nophoto.jpg") ?>" alt="your image" /><br>
                                                <input type='file' name="img_seagrassSpeciesdugong" id="img_seagrassSpeciesdugong" onchange="readURLSeagrassdugong(this);"  /><br>
                                                <input type="hidden" name="old_picture" value="nophoto.jpg"> 
                                                <span id="img_seagrassSpeciesdugongspan" class="img_seagrassSpeciesdugongspan hide">nophoto.jpg</span>    
                                            </li></ul>
                                        </div>  
                                        <div class="col-xs-8 col-lg-8">
                                            <ul><li>
                                                <?php echo form_textarea('detailsdugong','','id="detailsdugong" placeholder="Details" style="height:auto"') ?>                                                
                                            </li></ul>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="col-xs-1 col-lg-1"><br>
                                            <a type="text" class="btn btn-primary" id="adddugong">Add</a>
                                        </div>                                        
                                    </div> 
                                    <div class="col-xs-12 ">
                                        <div class="table-responsive text-nowrap" style="overflow-x:auto;">
                                        <table id="tbldugong" class="table-ola" style="z-index: 100">
                                            <thead>  
                                                <tr style="background: #fcf8e3">
                                                   <td colspan="3">Seagrass Species Composition List</td> 
                                                </tr>                                          
                                                <tr style="background: #fcf8e3">                                                            
                                                    <td>Details</td>
                                                    <td>Image</td>
                                                    <td>Option</td>                                                            
                                                </tr>
                                            </thead>
                                            <tbody id="tbodydugong"></tbody>
                                        </table><hr>                                       
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend>Presence of sub-tidal seagrass beds</legend>
                                    <div class="col-xs-12">
                                        <ul><li>
                                            <?php echo form_textarea('seagrassbedstxt','','id="seagrassbedstxt" placeholder="Details" style="height:auto"') ?>
                                        </li></ul>
                                    </div>
                                </fieldset>
                                <div class="col-xs-1 col-lg-1"><br>
                                    <a type="text" class="btn btn-primary" id="addseagrasses">Add new Seagrasses</a>
                                </div>
                                <div class="col-xs-12 ">
                                    <div class="table-responsive large-tables">                                        
                                    <table id="tblcoralreef" class="table table-bordered tglobal">
                                        <thead>  
                                            <tr style="background: #fcf8e3">
                                               <td colspan="14" style="text-align: center; font-size: 24px">Seagrass Ecosystem List</td> 
                                            </tr>  
                                            <tr style="background: #fcf8e3">
                                                <td>Seagrass Area</td>
                                                <td>Species Composition</td>
                                                <td>Option</td>
                                            </tr>
                                        </thead>
                                        <tbody id="tbodycoralreef"></tbody>
                                    </table>
                                    <table id="tblcoralreef_sample" class="table table-bordered tglobal">                                            
                                        <tbody id="tbodycoralreef_sample"></tbody>
                                    </table>
                                    </div>
                                </div>                              
                            </div>                            
                        </div>

                </div>
            </div>
            <div class="tab-pane" id="economic">
                <div class="form-style-6">
                    <h2>SOCIO-ECONOMIC AND CULTURAL FEATURES</h2>
                </div>
                <div class="col-xs-12">
                    <div class="tab">
                      <a class="tablinksocio active" onclick="tabsocio(event, 'sociocultural')" id="defaultOpen">Socio-Economic</a>
                      <a class="tablinksocio" id="loadeconomic" onclick="tabsocio(event, 'economicprof')">Cultural Profile</a>
                      <a class="tablinksocio" onclick="tabsocio(event, 'institutionalprof')">Institutional Profile</a>
                      <a class="tablinksocio" id="loadoccupantsfile" onclick="tabsocio(event, 'sociooccupants')">Occupants</a>
                    </div>
                </div>                
                    <div id="sociocultural" class="tabcontentsocio" style="display: block;">                        
                        <div class="tab">
                            <a class="tabrevfirst active" onclick="tabrevfirst(event, 'demoid')" id="defaultOpen">Demographic Information</a>
                            <a class="tabrevfirst" onclick="tabrevfirst(event, 'livelihooid')" id="livelihoodid" >Livelihood/Enterprise</a>
                        </div>
                        <div id="demoid" class="tabcontentRevenuefirst">                           
                            <fieldset>
                               <legend>Demographic Information</legend> 

                                <fieldset>
                                <legend style="background-color: transparent;color: #000; font-weight: 700;font-size: 14px;">Location</legend>
                                <div class="col-xs-12">
                                    <div class="col-xs-6 col-lg-3 ">
                                        <ul><li>
                                            <?php echo form_label('Region','','for="regids_demo"').form_dropdown('region_ids',$region_demoList,'','class="select-css" id="regids_demo"') ?>    
                                            <div class="prov_errors"></div>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-6 col-lg-3 ">
                                        <ul><li>
                                            <?php echo form_label('Province','','for="provids_demo"').form_dropdown('province_ids','','','class="select-css" id="provids_demo"') ?>
                                            <div class="municipal_errors"></div>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-6 col-lg-3 ">
                                        <ul><li>
                                            <?php echo form_label('Municipality','','for="munids_demo"').form_dropdown('municipal_ids','','','class="select-css" id="munids_demo"') ?>
                                            <div class="barangay_errors"></div>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-6 col-lg-3 ">
                                        <ul><li>
                                            <?php echo form_label('Barangay','','for="barids_demo"').form_dropdown('barangay_ids','','','class="select-css" id="barids_demo"') ?>
                                        </li></ul>
                                    </div> 
                                </div>
                            </fieldset>                            
                               <div class="col-xs-12">
                                   <div class="col-xs-6 col-lg-6 ">
                                       <ul><li>
                                           <?php echo form_label('Name of Household Head','','for="seams_name_head"').form_input('seams_name_head','','placeholder="Fullname of household head" id="seams_name_head"') ?> 
                                        </li></ul>                                            
                                    </div>
                                    <div class="col-xs-6 col-lg-6 ">
                                        <ul><li>
                                            <?= form_label('Sex','','for="seams_sex"').form_dropdown('seams_sex',$sexList,'','class="select-css" id="seams_sex" required');?>
                                        </li></ul>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <fieldset>
                                        <legend style="background-color: transparent;color: #000; font-weight: 700;font-size: 14px;">Total Household Member (Including household head)</legend>
                                        <div class="col-xs-6 col-lg-6 ">
                                            <ul><li>
                                                <?php echo form_label('Male','','for="seams_male"').form_input('seams_male','','placeholder="Total Male" id="seams_male"') ?> 
                                            </li></ul>                                            
                                        </div>
                                        <div class="col-xs-6 col-lg-6 ">
                                            <ul><li>
                                                <?= form_label('Female','','for="seams_female"').form_input('seams_female','','placeholder="Total Female" id="seams_female" ');?>
                                            </li></ul>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-xs-6">     
                                    <fieldset>
                                        <legend style="background-color: transparent;color: #000; font-weight: 700;font-size: 14px;">Tenured Migrant? (Y/N)</legend>
                                        <div class="col-xs-12 col-lg-12 ">
                                            <?= form_dropdown('tenure_migrantyn',$kba,'','class="select-css" id="tenure_migrantyn" style="margin-top:20px;"') ?>
                                        </div>     
                                    </fieldset>                               
                                </div>
                                <div class="col-xs-6">                                    
                                    <fieldset>
                                        <legend style="background-color: transparent;color: #000; font-weight: 700;font-size: 14px;">Indigenous Cultural Community/Indigenous People</legend>
                                        <div class="col-xs-12 col-lg-12 ">
                                            <?= form_dropdown('select_iccsips',$tribelist,'','class="select-css" id="select_iccsips" style="margin-top:20px;"') ?>
                                        </div>     
                                    </fieldset>
                                </div>
                                <div class="col-xs-12">                                    
                                    <fieldset>
                                        <legend style="background-color: transparent;color: #000; font-weight: 700;font-size: 14px;">Total Area</legend>
                                        <div class="col-xs-6 col-lg-3 ">
                                            <ul><li>
                                                <?php echo form_label('Farmlot (has)','','for="seams_farmlot"').form_input('seams_farmlot','','placeholder="Total area farmlot" onchange="calculate_seams()" onkeyup="run(this)" id="seams_farmlot"') ?> 
                                            </li><?= form_label('If this homelot within farmlot?(Y/N)','for="whf"');?></ul>                                            
                                        </div>
                                        <div class="col-xs-6 col-lg-3 ">
                                            <ul><li>
                                                <?php echo form_label('Homelot (has)','','for="seams_homelot"').form_input('seams_homelot','','placeholder="Total area homelot" onchange="calculate_seams()" onkeyup="run(this)" id="seams_homelot"') ?> 
                                            </li><li><?= form_dropdown('whf',$whl,'','class="select-css" id="whf"');?></li></ul>                                            
                                        </div>
                                        <div class="col-xs-6 col-lg-3 ">
                                            <ul><li>
                                                <?php echo form_label('Other Uses (has)','','for="seams_otheruses"').form_input('seams_otheruses','','placeholder="Total area other uses" onchange="calculate_seams()" onkeyup="run(this)" id="seams_otheruses"') ?> 
                                            </li></ul>                                            
                                        </div>
                                        <div class="col-xs-6 col-lg-3 ">
                                            <ul><li>
                                                <?php echo form_label('Occupied (has)','','for="seams_occupied"').form_input('seams_occupied','','placeholder="Total area occupied" onkeyup="run(this)" id="seams_occupied" readonly') ?> 
                                            </li></ul>                                            
                                        </div>
                                    </fieldset>
                                </div>
                                <fieldset>
                                <legend style="background-color: transparent;color: #000; font-weight: 700;font-size: 14px;">Coordinates (point location)</legend>
                                <div class="col-xs-12">
                                    <div class="col-xs-12 col-lg-12">
                                        <table class="table-ola">                                          
                                            <tbody>
                                                <tr>
                                                    <td>Longitude</td>
                                                    <td width="">
                                                        <table class="table-ola">
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <ul><li>                                                            
                                                                            <?= form_label('Direction','for=""').form_dropdown('longitude_dms_direction',$direct_long,'','class="select-css" id="longitude_dms_direction"'); ?>
                                                                        </li></ul>
                                                                        </td>
                                                                    <td>
                                                                        <ul><li>
                                                                            <?= form_label('Degree (°)','for="longitude_dms_degrees"').form_input('longitude_dms_degrees','','id="longitude_dms_degrees" class="dmstodd" onkeyup="run(this);"') ?>
                                                                        </li></ul>
                                                                    </td>
                                                                    <td>
                                                                        <ul><li>
                                                                            <?= form_label('Minute (ˈ)','for="longitude_dms_minutes"').form_input('longitude_dms_minutes','','id="longitude_dms_minutes" class="dmstodd" onkeyup="run(this);"') ?>
                                                                        </li></ul>
                                                                    </td>
                                                                    <td>
                                                                        <ul><li>
                                                                            <?= form_label('Second (")','for="longitude_dms_seconds"').form_input('longitude_dms_seconds','','id="longitude_dms_seconds" class="dmstodd" onkeyup="run(this);"') ?>
                                                                        </li></ul>
                                                                    </td>
                                                                </tr>
                                                                <tr><td>Convert</td><td colspan="2"><?php echo form_input('ddlongoutputdemo','','id="ddlongoutputdemo"') ?></td>
                                                                    <td><?php echo form_button('en','Enable/Disable','class="endis_demo"') ?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Latitude</td>
                                                    <td width="">
                                                        <table class="table-ola">
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <ul><li>
                                                                           <?= form_label('Direction','for=""').form_dropdown('latitude_dms_direction',$direct_lat,'','class="select-css" id="latitude_dms_direction"'); ?>
                                                                        </li></ul>
                                                                        </td>
                                                                    <td>
                                                                        <ul><li>
                                                                            <?= form_label('Degree (°)','for="latitude_dms_degrees"').form_input('latitude_dms_degrees','','id="latitude_dms_degrees" class="dmstodd" onkeyup="run(this);"') ?>
                                                                        </li></ul>
                                                                    </td>
                                                                    <td>
                                                                        <ul><li>
                                                                            <?= form_label('Minute (ˈ)','for="latitude_dms_minutes"').form_input('latitude_dms_minutes','','id="latitude_dms_minutes" class="dmstodd" onkeyup="run(this);"') ?>
                                                                        </li></ul>
                                                                    </td>
                                                                    <td>
                                                                        <ul><li>
                                                                            <?= form_label('Second (")','for="latitude_dms_seconds"').form_input('latitude_dms_seconds','','id="latitude_dms_seconds" class="dmstodd" onkeyup="run(this);"') ?>
                                                                        </li></ul>
                                                                    </td>
                                                                </tr>
                                                                <tr><td>Convert</td><td colspan="2"><?= form_input('ddlatoutputdemo','','id="ddlatoutputdemo"') ?></td>
                                                                    <td><?php echo form_button('en','Enable/Disable','class="endis_demos"') ?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>                                                
                                            </tbody>
                                        </table>
                                    </div>                                    
                                </div>
                            </fieldset> 
                            <fieldset>
                                <legend>Upload Shapefile <i>(note: zip file)</i></legend>
                                <input type='file' name="zip_shpfile_demo" id="zip_shpfile_demo" onchange="readURLshpDemo(this);"  />
                                <span id="shpzip_bk" class="shpzip_bk hidden"></span><br>
                            </fieldset>                            
                                <div class="col-xs-12">                                    
                                    <fieldset>
                                        <legend style="background-color: transparent;color: #000; font-weight: 700;font-size: 14px;">Occupancy Date</legend>
                                        <div class="col-xs-6 col-lg-6 ">
                                            <ul><li>
                                                <?php echo form_label('Month','','for=""').form_dropdown('seams_date_month',$monthList,'','class="select-css" id="seams_date_month"') ?>
                                            </li></ul>
                                        </div>
                                        <div class="col-xs-6 col-lg-6 ">
                                            <ul><li>
                                                <?php echo form_label('Year','','for=""').form_dropdown('seams_date_year',$yearListed,'','class="select-css" id="seams_date_year"') ?>
                                            </li></ul>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-xs-12">
                                    <ul><li>
                                        <?= form_label('Remarks','', 'for="seams_remarks"').form_textarea('seams_remarks','','placeholder="Remarks" id="seams_remarks"');?>
                                    </li></ul>
                                </div>
                                <div class="col-xs-12 ">
                                    <a type="text" class="btn btn-primary" id="addseamsdemo">Add data</a>
                                </div>
                                <div class="col-xs-12 ">
                                    <div class="table-responsive"><br>
                                        <table id="tblseamsdemo" class="table-ola">
                                            <thead>
                                                <tr>
                                                    <th colspan="11" style="text-align: center; font-size: 24px">Demographic Information</th>
                                                </tr>
                                                <tr>
                                                    <th rowspan="2">Name of Household head</th>
                                                    <th rowspan="2">Sex</th>
                                                    <th colspan="3">Total Household Member<br>(Including household head)</th>
                                                    <th colspan="4">Total Area (has)</th>
                                                    <th rowspan="2">Date of Occupancy</th>
                                                    <th rowspan="2"></th>
                                                </tr>
                                                <tr style="background: #fcf8e3">
                                                    <td>Male</td>
                                                    <td>Female</td>
                                                    <td>Total</td>
                                                    <td>Farmlot</td>
                                                    <td>Houselot</td>
                                                    <td>Other uses</td>
                                                    <td>Occupied</td>
                                                </tr>
                                            </thead>
                                            <tbody id="tbodyseamsdemo"></tbody>
                                        </table>
                                        <table id="tblseamsdemo_sample" class="table-ola">
                                            <tbody id="tbodyseamsdemo_sample"></tbody>
                                        </table>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div id="livelihooid" class="tabcontentRevenuefirst" style="display: none">
                            <fieldset>
                                <legend style="background-color: transparent;color: #000; font-weight: 700;font-size: 14px;">Name of Enterprise</legend>
                                    <div class="col-xs-12 col-lg-12 ">
                                        <?php echo form_input('lhName','','id="lhName"'); ?>
                                    </div> 
                            </fieldset> 
                            <fieldset>
                                <legend style="background-color: transparent;color: #000; font-weight: 700;font-size: 14px;">Types of Enterprise</legend>
                                <div class="col-xs-12 col-lg-12">
                                    <ul><li>
                                        <?php echo form_label('&nbsp;','for="lh_type"').form_dropdown('lh_type',$lh_type,'','id="lh_type" class="select-css"') ?>
                                    </li></ul>
                                </div>
                                <div class="col-xs-12 col-lg-12">
                                    <ul><li>
                                        <?php echo form_label('Description','for="lh_type_desc"').form_textarea('lh_type_desc','','id="lh_type_desc"') ?>
                                    </li></ul>
                                </div>
                            </fieldset>
                            <fieldset>
                                <legend>Location</legend>
                                <div class="col-xs-12">
                                    <div class="col-xs-6 col-lg-3 ">
                                        <ul><li>
                                            <?php echo form_label('Region','','for="lh_reg"').form_dropdown('lh_reg',$region_demoList,'','class="select-css" id="lh_reg"') ?>    
                                            <div class="lh_prov_errors"></div>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-6 col-lg-3 ">
                                        <ul><li>
                                            <?php echo form_label('Province','','for="lh_prov"').form_dropdown('lh_prov','','','class="select-css" id="lh_prov"') ?>
                                            <div class="lh_municipal_errors"></div>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-6 col-lg-3 ">
                                        <ul><li>
                                            <?php echo form_label('Municipality','','for="lh_mun"').form_dropdown('lh_mun','','','class="select-css" id="lh_mun"') ?>
                                            <div class="lh_barangay_errors"></div>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-6 col-lg-3 ">
                                        <ul><li>
                                            <?php echo form_label('Barangay','','for="lh_barangay"').form_dropdown('lh_barangay','','','class="select-css" id="lh_barangay"') ?>
                                        </li></ul>
                                    </div> 
                                </div>
                            </fieldset>
                            <fieldset>
                                <legend>Coordinates (point location)</legend>
                                <div class="col-xs-12">
                                    <div class="col-xs-12 col-lg-12">
                                        <table class="table-ola">                                          
                                            <tbody>
                                                <tr>
                                                    <td>Longitude</td>
                                                    <td width="">
                                                        <table class="table-ola">
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <ul><li>                                                            
                                                                            <?php echo form_label('Direction','for="lh_long_direction"').form_dropdown('lh_long_direction',$direct_long,'','class="select-css" id="lh_long_direction"'); ?>
                                                                        </li></ul>
                                                                        </td>
                                                                    <td>
                                                                        <ul><li>
                                                                            <?php echo form_label('Degree (°)','for="lh_long_deg"').form_input('lh_long_deg','','id="lh_long_deg" class="dmstodd"') ?>
                                                                        </li></ul>
                                                                    </td>
                                                                    <td>
                                                                        <ul><li>
                                                                            <?php echo form_label('Minute (ˈ)','for="lh_long_min"').form_input('lh_long_min','','id="lh_long_min" class="dmstodd"') ?>
                                                                        </li></ul>
                                                                    </td>
                                                                    <td>
                                                                        <ul><li>
                                                                            <?php echo form_label('Second (")','for="lh_long_sec"').form_input('lh_long_sec','','id="lh_long_sec" class="dmstodd"') ?>
                                                                        </li></ul>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Convert</td><td colspan="2"><?= form_input('lh_dmstodd','','id="lh_dmstodd"')?></td>
                                                                    <td><?php echo form_button('en','Enable/Disable','class="lh_longd"') ?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Latitude</td>
                                                    <td width="">
                                                        <table class="table-ola">
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <ul><li>
                                                                           <?= form_label('Direction','for="lh_lat_direction"').form_dropdown('lh_lat_direction',$direct_lat,'','class="select-css" id="lh_lat_direction"'); ?>
                                                                        </li></ul>
                                                                        </td>
                                                                    <td>
                                                                        <ul><li>
                                                                            <?= form_label('Degree (°)','for="lh_lat_deg"').form_input('lh_lat_deg','','id="lh_lat_deg" class="dmstodd"') ?>
                                                                        </li></ul>
                                                                    </td>
                                                                    <td>
                                                                        <ul><li>
                                                                            <?= form_label('Minute (ˈ)','for="lh_lat_min"').form_input('lh_lat_min','','id="lh_lat_min" class="dmstodd"') ?>
                                                                        </li></ul>
                                                                    </td>
                                                                    <td>
                                                                        <ul><li>
                                                                            <?= form_label('Second (")','for="lh_lat_sec"').form_input('lh_lat_sec','','id="lh_lat_sec" class="dmstodd"') ?>
                                                                        </li></ul>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Convert</td><td colspan="2"><?= form_input('lh_dmstodd2','','id="lh_dmstodd2"') ?></td>
                                                                    <td><?php echo form_button('en','Enable/Disable','class="lh_latd"') ?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>                                                
                                            </tbody>
                                        </table>
                                    </div>                                    
                                </div>
                            </fieldset>  
                            <fieldset>
                                <legend style="background-color: transparent;color: #000; font-weight: 700;font-size: 14px;">Area(has)</legend>
                                <div class="col-xs-6 col-lg-6">
                                    <?php echo form_input('lh_area','','id="lh_area" onkeyup="run(this)"') ?>
                                </div>                                
                            </fieldset>
                            <fieldset>
                                <legend>Date of Assessed</legend>
                                <div class="col-xs-6 ">  
                                    <div class="col-xs-1 col-lg-2 ">
                                        <label>(From)</label>                          
                                    </div>
                                    <div class="col-xs-12 col-lg-4 ">                                    
                                        <?php echo form_dropdown('from_date_assessed_month',$monthList,'','class="select-css" id="from_date_assessed_month" required') ?>
                                    </div>                                    
                                    <div class="col-xs-12 col-lg-2 ">
                                        <?php echo form_dropdown('from_date_assessed_day',$dayList,'','class="select-css" id="from_date_assessed_day"') ?>
                                    </div>                                    
                                    <div class="col-xs-12 col-lg-3 ">
                                        <?php echo form_dropdown('from_date_assessed_year',$yearListed,'','class="select-css" id="from_date_assessed_year" required') ?>
                                    </div>                                                      
                                </div>  
                                <div class="col-xs-6 ">
                                    <div class="col-xs-1 col-lg-1 ">
                                        <label>(To)</label>                          
                                    </div>                            
                                    <div class="col-xs-12 col-lg-4 ">
                                        <?php echo form_dropdown('to_date_assessed_month',$monthList,'','class="select-css" id="to_date_assessed_month" required') ?>
                                    </div>                                    
                                    <div class="col-xs-12 col-lg-2 ">
                                        <?php echo form_dropdown('to_date_assessed_day',$dayList,'','class="select-css" id="to_date_assessed_day"') ?>
                                    </div>                                    
                                    <div class="col-xs-12 col-lg-3 ">
                                        <?php echo form_dropdown('to_date_assessed_year',$yearListed,'','class="select-css" id="to_date_assessed_year" required') ?>
                                    </div>                                                      
                                </div>                            
                            </fieldset>
                            <fieldset>
                                <legend style="background-color: transparent;color: #000; font-weight: 700;font-size: 14px;">Offices/Agencies involved in the Operations</legend>
                                <?php echo form_textarea('lh_agency','','id="lh_agency"') ?>
                            </fieldset>
                            <fieldset>
                                <legend>Number of PO Members</legend>
                                <div class="col-xs-4 col-lg-4">
                                    <ul><li>
                                        <?php echo form_label('Male','form="no_male_lh"').form_input('no_male_lh','','id="no_male_lh" class="nopomem" onblur="calc_nopomem();" onkeyup="run(this);"') ?>
                                    </li></ul>
                                </div>
                                <div class="col-xs-4 col-lg-4">
                                    <ul><li>
                                        <?php echo form_label('Female','form="no_female_lh"').form_input('no_female_lh','','id="no_female_lh" class="nopomem" onblur="calc_nopomem();" onkeyup="run(this);"') ?>
                                    </li></ul>
                                </div>
                                <div class="col-xs-4 col-lg-4">
                                    <ul><li>
                                        <?php echo form_label('Total','form="total_no_po_lh"').form_input('total_no_po_lh','','id="total_no_po_lh"') ?>
                                    </li></ul>
                                </div>
                            </fieldset>
                            <fieldset>
                                <legend style="background-color: transparent;color: #000; font-weight: 700;font-size: 14px;">Other source of assistance</legend>
                                <?php echo form_textarea('lh_assistance','','id="lh_assistance"') ?>
                            </fieldset>
                            <fieldset>
                                <div class="col-xs-12 col-lg-12">
                                    <div class="col-xs-3">
                                        <ul><li>
                                        <?php echo form_label('Project Proposal','for="proj_prop style="text-align:center;""').form_dropdown('proj_prop',$whl,'','id="proj_prop" class="select-css"'); ?>
                                        </li></ul>
                                    </div>  
                                    <div class="col-xs-3">
                                        <ul><li>
                                        <?php echo form_label('Business Plan','for="business_plan" style="text-align:center;"').form_dropdown('business_plan',$whl,'','id="business_plan" class="select-css"'); ?>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-3">
                                        <ul><li>
                                        <?php echo form_label('Regional approved WFP','for="reg_aprvd_wfp"').form_dropdown('reg_aprvd_wfp',$whl,'','id="reg_aprvd_wfp" class="select-css"'); ?>
                                        </li></ul>
                                    </div>
                                     <div class="col-xs-3">
                                        <ul><li>
                                        <?php echo form_label('MOA','for="aprvd_moa"').form_dropdown('aprvd_moa',$whl,'','id="aprvd_moa" class="select-css"'); ?>
                                        </li></ul>
                                    </div>
                                </div>                                
                            </fieldset>
                            <fieldset>
                                <legend>Rating</legend>
                                    <div class="col-xs-6 col-lg-3">
                                        <ul><li>
                                        <?php echo form_label('Ecological (%)','rate_ecological').form_input('rate_ecological','','id="rate_ecological" class="qty" onblur="calc_rate();" onkeyup="run(this)"') ?>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-6 col-lg-3">
                                        <ul><li>
                                        <?php echo form_label('Economic (%)','rate_economic').form_input('rate_economic','','id="rate_economic" class="qty" onblur="calc_rate();" onkeyup="run(this)"') ?>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-6 col-lg-3">
                                        <ul><li>
                                        <?php echo form_label('Equity (%)','rate_equity').form_input('rate_equity','','id="rate_equity" class="qty" onblur="calc_rate();" onkeyup="run(this)"') ?>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-6 col-lg-3">
                                        <ul><li>
                                        <?php echo form_label('Total (%)','total_rate').form_input('total_rate','','id="total_rate"') ?>
                                        </li></ul>
                                    </div>
                            </fieldset>
                             <fieldset>
                                <legend style="background-color: transparent;color: #000; font-weight: 700;font-size: 14px;">Capacity Needs</legend>
                                <?php echo form_textarea('lh_capacity','','id="lh_capacity"') ?>
                            </fieldset>
                            <div class="col-xs-12 ">
                                <a type="text" class="btn btn-primary" id="addbdfe">Add data</a>
                                
                            </div>
                            <div class="col-xs-12 ">
                                <div class="table-responsive"><br>
                                    <table id="tblbdfe_sample" class="table-ola">
                                        <tbody id="tbodybdfe_sample"></tbody>
                                    </table> 
                                    <table id="tblbdfe" class="table-ola">
                                        <thead>
                                            <tr>
                                                <th colspan="13" style="text-align: center; font-size: 24px">Biodiversity-friendly enterprise (BDFE)</th>
                                            </tr>
                                            <tr>
                                                <th rowspan="2">Name of Enterprise</th>
                                                <th rowspan="2">Type of Enterprise</th>
                                                <th rowspan="2">Location</th>
                                                <th rowspan="2">Area(has)</th>
                                                <th colspan="3">Number of PO Member</th>
                                                <th rowspan="2">Date Assessed</th>
                                                <th colspan="4">Rating</th>
                                                <th rowspan="2"></th>
                                            </tr>
                                            <tr style="background-color: #fcf8e3">
                                                <td>Male</td>
                                                <td>Female</td>
                                                <td>Total</td>  
                                                <th>Ecological</th>
                                                <th>Economic</th>
                                                <th>Equity</th>
                                                <th>Total</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody id="tbodybdfe"></tbody>
                                    </table>                                                                       
                                </div>
                            </div>
                        </div>                        
                    </div>                  
                    <div id="economicprof" class="tabcontentsocio">                       
                            <!-- <div class="tab"> -->
                                <!-- <a class="tablinkseams active" onclick="tabseams(event, 'cultural')" id="defaultOpen">Cultural</a> -->
                                <!-- <a class="tablinkseams" id="loadincomesource" onclick="tabseams(event, 'dsi')">Income Source Information</a> -->
                            <!-- </div> -->
                            <hr>
                                <div class="col-xs-12 ">                                    
                                    <div class="col-xs-12 col-lg-6 ">
                                        <ul><li>
                                        <?= form_label('Ethnicity','','for="ethinicity"').form_textarea('ethinicity',$pamain->ethinicity,'placeholder="Brief description" id="ethinicity"') ?>
                                        </li></ul>
                                    </div>  
                                    <div class="col-xs-12 col-lg-6 ">
                                        <ul><li>
                                        <?= form_label('Archeology','','for="archeology"').form_textarea('archeology',$pamain->archeology,'placeholder="Brief description" id="archeology"')  ?>
                                        </li></ul>
                                    </div>                                                                       
                                </div>         
                                <div class="col-xs-12">
                                    <div class="col-xs-12 col-lg-6 ">
                                        <ul><li>
                                        <?= form_label('Cultural Resources','','for="culturalresource"').form_textarea('culturalresource',$pamain->cultural_resource,'placeholder="Brief description" id="culturalresource"')  ?>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-12 col-lg-6 ">
                                        <ul><li>
                                        <?= form_label('Customs and Beliefs','','for="belief"').form_textarea('belief',$pamain->belief,'placeholder="Brief description" id="belief"')  ?>
                                        </li></ul>
                                    </div>                       
                                </div>
                            
                    </div>
                    <div id="institutionalprof" class="tabcontentsocio">
                        <fieldset>
                            <legend>Institutional Profile</legend>
                            <div class="col-xs-12 col-lg-12">
                                <ul><li>
                                    <?= form_label('','', 'for="institutional_profile"').form_textarea('institutional_profile',$pamain->institutional_profile,'placeholder="Brief description" id="institutional_profile"');?>
                                </li></ul>
                            </div>
                        </fieldset>
                    </div>
                    <div id="usesarea" class="tabcontentsocio">                       
                        <fieldset>
                            <legend>Uses of the Area</legend>
                                <div class="col-xs-12 col-lg-12">
                                    <ul><li>
                                        <?= form_label('Tourism Purposes','','for="tourism"').form_textarea('tourism',$pamain->tourism,'placeholder="Brief description" id="tourism"');?>
                                    </li></ul>
                                </div>
                                <div class="col-xs-12 col-lg-12">
                                    <ul><li>
                                        <?= form_label('Facility Purposes','','for="facility"').form_textarea('facility',$pamain->facilities,'placeholder="Brief description" id="facility"');?>
                                    </li></ul>
                                </div>
                                <div class="col-xs-12 col-lg-12">
                                    <ul><li>
                                        <?= form_label('Science and Research Purposes','','for="research"').form_textarea('research',$pamain->science_research,'placeholder="Brief description" id="research"');?>
                                    </li></ul>
                                </div>
                                <div class="col-xs-12 col-lg-12">
                                    <ul><li>
                                        <?= form_label('Educational Purposes','','for="educational"').form_textarea('educational',$pamain->educational,'placeholder="Brief description" id="educational"');?>
                                    </li></ul>
                                </div>
                        </fieldset>
                    </div>
                    <div id="sociooccupants" class="tabcontentsocio">                        
                        <div class="col-xs-6 "> 
                            <fieldset>
                                <legend>Total number of PA occupants</legend>
                                <div class="col-xs-12 col-lg-4">
                                    <ul><li>
                                    <?= form_label('Male','','for="occupants_male"').form_input('occupants_male',$pamain->no_occupant_male,'id="occupants_male" onchange="calc_occupant()" onkeyup=run(this) placeholder=" "');?>
                                    </li></ul>
                                </div> 
                                <div class="col-xs-12 col-lg-4">
                                    <ul><li>
                                    <?= form_label('Female','','for="occupants_female"').form_input('occupants_female',$pamain->no_occupant_female,'id="occupants_female" onchange="calc_occupant()" onkeyup=run(this) placeholder=" "');?>
                                    </li></ul>
                                </div>
                                <div class="col-xs-12 col-lg-4">
                                    <ul><li>
                                    <?= form_label('Total','','for="occupants"').form_input('occupants',$pamain->no_occupants,'id="occupants" placeholder=" " readonly="readonly"');?>
                                    </li></ul>
                                </div> 
                                 <!-- <?= form_label('Male','','for="total_occupants_male"').form_input('total_occupants_male','','id="total_occupants_male" placeholder=" "');?>  -->
                                 <!-- <?= form_label('Female','','for="total_occupants_female"').form_input('total_occupants_female','','id="total_occupants_female" placeholder=" "');?>  -->
                            </fieldset>
                        </div>
                        <div class="col-xs-6 ">
                            <fieldset>
                                <legend>Total number of Tenured Migrant</legend>
                                <div class="col-xs-12 col-lg-4">
                                    <ul><li>
                                    <?= form_label('Male','','for="migrant_male"').form_input('migrant_male',$pamain->no_migrant_male,'id="migrant_male" onchange="calc_migrant()" onkeyup=run(this) placeholder=" "');?>
                                    </li></ul>
                                </div> 
                                <div class="col-xs-12 col-lg-4">
                                    <ul><li>
                                    <?= form_label('Female','','for="migrant_female"').form_input('migrant_female',$pamain->no_migrant_female,'id="migrant_female" onchange="calc_migrant()" onkeyup=run(this) placeholder=" "');?>
                                    </li></ul>
                                </div>
                                <div class="col-xs-12 col-lg-4">
                                    <ul><li>
                                    <?= form_label('Total','','for="migrant"').form_input('migrant',$pamain->no_tenured_migrant,'placeholder=" " id="migrant" onkeyup=run(this) readonly="readonly"');?>
                                    </li></ul>
                                </div>
                            </fieldset>
                        </div>
                        <fieldset>
                            <legend>Indigenous Cultural Community/Indigenous People</legend>
                            <div class="col-xs-12 ">                            
                                <fieldset>
                                    <div class="col-xs-12 col-lg-2 ">
                                        <?= form_label('ICCs/IPs Community','','style="margin:20px"')?>
                                    </div>
                                    <div class="col-xs-12 col-lg-4 ">
                                        <?= form_dropdown('iccsips',$tribelist,'','class="select-css" id="iccsips" style="margin-top:20px;"') ?>
                                    </div>                                       
                                    <div class="col-xs-12 col-lg-3">
                                        <ul><li>
                                            <?= form_label('Male','','for="iccip_male"').form_input('iccip_male','','placeholder=" " id="iccip_male" onkeyup=run(this)');?>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-12 col-lg-3">
                                        <ul><li>
                                            <?= form_label('Female','','for="iccip_female"').form_input('iccip_female','','placeholder=" " id="iccip_female" onkeyup=run(this)');?>
                                        </li></ul>
                                    </div>
                                </fieldset>  
                            </div>
                        <div class="col-xs-12 ">
                            <a type="text" class="btn btn-primary" id="saveips">Add data</a>
                        </div>
                        <div class="col-xs-12 ">
                            <div class="table-responsive large-tables">
                                <table id="tblip" class="table table-bordered tglobal">
                                    <thead>
                                        <tr>
                                            <th>ICCs/IPs</th>
                                            <th>No. of Male</th>
                                            <th>No. of Female</th>
                                            <th>Total</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbodyiccip"></tbody>
                                </table>
                                <table id="tblip_sample" class="table table-bordered tglobal">
                                    <tbody id="tbodyiccip_sample"></tbody>
                                </table>
                            </div>
                        </div>
                        </fieldset>                                        
                        <div class="col-xs-12 hidden">
                        <fieldset>
                        <legend>Supporting Documents</legend>                            
                        <div class="col-xs-12">
                            <div class="col-xs-12">
                                <div class="col-xs-12 col-lg-12 ">
                                    <p>Upload Socio-Economic Assessment and Monitoring System (SEAMS) form with data in <span style="color:red">PDF format</span>.</p>
                                        <li>Form 3 : Summary per Municipality</li>
                                        <li>Form 5 : Official Tenured Migrants</li>
                                        <li>Form 6 : Questionnaire Form for Indigenous People (IP)</li>
                                    <hr>                            
                                </div>
                            </div>
                            <div class="col-xs-12 ">                                    
                                <div class="col-xs-12 col-lg-6">
                                    <ul><li>
                                    <?= form_label('Filename','','for="econdesc"').form_input('econdesc','','placeholder=" " id="econdesc"') ?>
                                    </li></ul>
                                </div>                                                              
                                <div class="col-xs-12 col-lg-6">
                                    <ul><li>                                    
                                    <input type='file' name="economicfile" id="economicfile" style="margin:20px;" /><br>
                                    <input type="hidden" name="old_picture" value="nophoto.jpg">
                                    </li></ul> 
                                </div>
                            </div>                                
                            <div class="col-xs-12 ">                                
                                <div class="col-xs-12 col-lg-6">
                                    <!-- <input type="button" id="addimage" value="Add to table" class="btn btn-info" onclick="inserteconprof()"> -->
                                    <a type="text" class="btn btn-primary" id="addimage" onclick="inserteconprof()">Add data</a>
                                </div>
                            </div>
                            <div class="col-xs-12 ">
                                <div class="table-responsive large-tables"><br>
                                    <table id="tblecon" class="table  table-bordered tglobal">
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
                    </fieldset>
                    </div>
                </div>
            </div><!-- end tab-->
            <div class="tab-pane" id="ipaf">
                <div class="form-style-6">
                    <h2>Integrated Protected Area Fund (IPAF)</h2>
                </div>                
                <div class="col-xs-12">
                    <div class="tab">
                        <a class="tablinkipaf active" onclick="tabipaf(event, 'income')">Income Generated</a>
                        <a class="tablinkipaf hidden" id="loadcontribution" onclick="tabipaf(event, 'donate')">Trust Receipt<br><span style="font-size: 12px;">(Contribution/Donation, Development Fee, Fines/Penalties)</span></a>
                        <a class="tablinkipaf" id="loadvisitors" onclick="tabipaf(event, 'visitor')">Protected Area Visitors</a>
                    </div>
                </div>
                <fieldset>
                    <legend>Period Covered</legend>                                   
                    <div class="col-xs-4 col-lg-4">
                        <ul><li>
                        <?= form_dropdown('month_monitoring',$monthListed,'','class="form-control border-input select-css" id="monitor_months"'); ?>
                        </li></ul>
                    </div>
                    <div class="col-xs-4 col-lg-4">
                        <ul><li>
                        <?= form_dropdown('day_monitoring',$dayList,'','class="form-control border-input select-css" id="day_months"'); ?>
                        </li></ul>
                    </div>
                    <div class="col-xs-4 col-lg-4 ">
                        <ul><li>
                        <?= form_dropdown('year_monitoring',$yearListed,'','class="form-control border-input select-css" id="monitor_years"'); ?>
                        </li></ul>
                    </div>
                </fieldset>                
                <div id="visitor" class="tabcontentipaf">
                    <fieldset>
                        <legend>Monitoring of Protected Area Visitors</legend>
                        <div class="col-xs-6">
                            <fieldset>
                                <legend>Local</legend>
                                <div class="col-xs-6 col-lg-6">   
                                <ul><li>                                     
                                    <?= form_label('Male','','for="no_male_local"').form_input('no_male_local','','placeholder="Total no. of male" id="no_male_local" onkeyup="run(this)"'); ?>
                                </li></ul>
                                </div>
                                <div class="col-xs-6 col-lg-6">    
                                <ul><li>                                    
                                    <?= form_label('Female','','for="no_female_local"').form_input('no_female_local','','placeholder="Total no. of female" id="no_female_local" onkeyup="run(this)"') ?>
                                </li></ul>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-xs-6">
                            <fieldset>
                                <legend>Foreign</legend>
                                <div class="col-xs-6 col-lg-6">   
                                <ul><li>                                     
                                    <?= form_label('Male','','for="no_male_foreign"').form_input('no_male_foreign','','placeholder="Total no. of male" id="no_male_foreign" onkeyup="run(this)"'); ?>
                                </li></ul>
                                </div>
                                <div class="col-xs-6 col-lg-6">    
                                <ul><li>                                    
                                    <?= form_label('Female','','for="no_female_foreign"').form_input('no_female_foreign','','placeholder="Total no. of female" id="no_female_foreign" onkeyup="run(this)"') ?>
                                </li></ul>
                                </div>
                            </fieldset>
                        </div>
                         <div class="col-xs-12">
                            <a type="text" id="addvisitors"class="btn btn-primary">Add data</a>                              
                        </div>
                        <div class="col-xs-12 ">   
                            <div class="table-responsive large-tables"><br>
                                <div class="col-xs-4 col-lg-4 hidden">
                                    <ul><li>
                                    <?= form_dropdown('select_month_visitor',$monthListed,'','class="form-control border-input select-css" id="select_visitor_months"'); ?>
                                    </li></ul>
                                </div>
                                <div class="col-xs-4 col-lg-4 ">
                                    <ul><li>
                                    <?= form_dropdown('select_year_visitor',$yearListed,'','class="form-control border-input select-css" id="select_visitor_years"'); ?>
                                    </li></ul>
                                </div>
                                <div class="col-xs-4 col-lg-4">
                                    <a type="text" class="btn btn-primary" id="searchdatevisitor">Search</a>
                                </div>
                                <table id="tableMonitoringVisitors_sample" class="table-ola">                                    
                                    <tbody id="tbodyvisitor_sample"></tbody>
                                </table>
                                <table id="tableMonitoringVisitors" class="table-ola">
                                    <thead>
                                        <tr>
                                            <th colspan="12" style="text-align: center; font-size: 24px">Protected Area Visitors</th>
                                        </tr>
                                        <tr>
                                            <th style='text-align: center;' colspan="2">Period Covered</th>
                                            <th style='text-align: center;' colspan="3">Local Visitors</th>
                                            <th style='text-align: center;' colspan="3">Foreign Visitors</th> 
                                            <th style='text-align: center;' colspan="2">Total no. by sex</th> 
                                            <th style='text-align: center;' rowspan="2">Grand Total</th> 
                                            <th style='text-align: center;' rowspan="2"></i> Option</th>                                           
                                        </tr>
                                        <tr>
                                            <th style='text-align: center;'>Month</th>
                                            <th class="hidden" style='text-align: center;'>Day</th>
                                            <th style='text-align: center;'>Year</th>
                                            <th style='text-align: center;'>Male</th>
                                            <th style='text-align: center;'>Female</th>
                                            <th style='text-align: center;'>Total</th>
                                            <th style='text-align: center;'>Male</th>
                                            <th style='text-align: center;'>Female</th>
                                            <th style='text-align: center;'>Total</th>
                                            <th style='text-align: center;'>Male</th>
                                            <th style='text-align: center;'>Female</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbodyvisitor"></tbody>
                                </table>                                
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div id="income" class="tabcontentipaf" style="display: block;">
                    <div class="col-xs-12">
                        <fieldset>
                            <legend>Monitoring of Income Generated within Protected Area</legend>
                            <div class="col-xs-12 "> 
                                <div class="col-xs-12 col-lg-6">
                                    <ul><li>
                                        <?= form_label('Entrance Fee','','for="entrancefee"').form_input('entrancefee','','placeholder="Amount" id="entrancefee" onchange="calculator_ipaf()" onkeyup="run(this)"'); ?>
                                    </li></ul>
                                </div>
                                <div class="col-xs-12 col-lg-6">
                                    <ul><li>
                                        <?= form_label('Facilities User Fee','','for="income_facilities"').form_input('income_facilities','','placeholder="Amount" id="income_facilities" onchange="calculator_ipaf()" onkeyup="run(this)"');?>
                                    </li></ul>
                                </div>
                            </div>
                            <div class="col-xs-12 ">
                                <div class="col-xs-12 col-lg-6">
                                    <ul><li>
                                        <?= form_label('Resource User Fee','','for="resource"').form_input('resource','','placeholder="Amount" id="resource" onchange="calculator_ipaf()" onkeyup="run(this)"'); ?>
                                    </li></ul>
                                </div>
                                <div class="col-xs-12 col-lg-6">
                                    <ul><li>
                                    <?= form_label('Concession Fee','','for="concession"').form_input('concession','','placeholder="Amount" id="concession" onchange="calculator_ipaf()" onkeyup="run(this)"'); ?>
                                    </li></ul>
                                </div>
                            </div>                            
                            <div class="col-xs-12 hide">
                                <div class="col-xs-12 col-lg-6">
                                    <ul><li>
                                    <?= form_label('Devt Fee/ Royalty','','for="development"').form_input('development','','placeholder="Amount" id="development" onchange="calculator_ipaf()" onkeyup="run(this)"'); ?>
                                    </li></ul>
                                </div>
                                <div class="col-xs-12 col-lg-6">
                                    <ul><li>
                                    <?= form_label('Fines and Penalties','','for="finespenalties"').form_input('finespenalties','','placeholder="Amount" id="finespenalties" onchange="calculator_ipaf()" onkeyup="run(this)"'); ?>
                                    </li></ul>
                                </div>
                            </div>
                           
                        </fieldset>
                        <fieldset>
                            <legend>Disbursement</legend>
                            <div class="col-xs-4 col-lg-4">
                                <div id="disburmentdiv">
                                    <button id="add_disbursement"  type="button" class="btn btn-info">Add Disbursement</button>        
                                </div><br>
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend>Other income</legend>
                                <div class="col-xs-6 col-lg-6 hide">
                                    <ul><li>
                                    <?= form_label(' ','','for="other_specify_title"').form_input('other_specify_title','','placeholder="Description" id="other_specify_title"'); ?>
                                    <span>Input some extra income</span>
                                    </li></ul>
                                </div>
                                <div class="col-xs-6 col-lg-6 hide">
                                    <ul><li>
                                    <?= form_label('Amount','for="other_specify_title"').form_input('other_specify_amount','','placeholder="Amount" id="other_specify_amount" onchange="calculator_ipaf()" onkeyup="run(this)"'); ?>
                                    </li></ul>
                                </div>
                                <div class="col-xs-4 col-lg-4">
                                    <div id="incomediv">
                                        <button id="add_other_income"  type="button" class="btn btn-info">Add other income</button>        
                                    </div><br>
                                </div>                               
                        </fieldset>                        
                        <fieldset>
                            <legend>Contribution/Donation</legend>
                            <div class="col-xs-4 col-lg-4">
                                <div id="donationdiv">
                                    <button id="add_contribution_donation"  type="button" class="btn btn-info">Add Contribution/Donation</button>        
                                </div><br>
                            </div>
                        </fieldset>
                         <fieldset>
                            <legend>Development Fees</legend>
                             <div class="col-xs-4 col-lg-4">
                                <div id="developmentdiv">
                                    <button id="add_development"  type="button" class="btn btn-info">Add Development Fees</button>        
                                </div><br>
                            </div> 
                        </fieldset>
                        <fieldset>
                            <legend>Fines and Penalties</legend>
                            <div class="col-xs-4 col-lg-4">
                                <div id="finesdiv">
                                    <button id="add_fines"  type="button" class="btn btn-info">Add Fines and Penalties</button>        
                                </div><br>
                            </div> 
                        </fieldset>
                        <input type="number" id="total_income" class="hide"></input>
                        <input type="number" id="total_income75" class="hide"></input>
                        <input type="number" id="total_income25" class="hide"></input>
                    </div>
                    <div class="col-xs-12">
                        <a type="text" class="btn btn-primary" id="addipafPlus">Add data</a>
                    </div>
                    <!-- <?php echo $calendar; ?>    -->
                    <div class="col-xs-12 ">   
                        <div class="table-responsive large-tables" style="overflow-x: scroll;"><br>
                            <div class="col-xs-4 col-lg-4 hidden">
                                <ul><li>
                                <?= form_dropdown('select_month_monitoring',$monthListed,'','class="form-control border-input select-css" id="select_monitor_months"'); ?>
                                </li></ul>
                            </div>
                            <div class="col-xs-4 col-lg-4 ">
                                <ul><li>
                                <?= form_dropdown('select_year_monitoring',$yearListed,'','class="form-control border-input select-css" id="select_monitor_years"'); ?>
                                </li></ul>
                            </div>
                            <div class="col-xs-4 col-lg-4">
                                <a type="text" class="btn btn-primary" id="searchdateincome">Search</a>
                            </div>       
                            <table id="tableMonitoringIpaf" class="table-ola">
                                <thead>
                                    <tr>
                                        <th colspan="19" style="text-align: center; font-size: 24px">Income Generated (₱)</th>
                                    </tr>
                                    <tr>
                                        <th colspan="3" style="text-align: center">Period Covered</th>
                                        <th colspan="7" style="text-align: center">Income Generated</th>                                       
                                        <th colspan="3" style="text-align: center">Amount / Date Deposited to BTR</th>
                                        <th colspan="3" style="text-align: center">Contribution/Donation</th>
                                        <th style='text-align: center;' rowspan="3" >Development Fee</th>                                               
                                        <th style='text-align: center;' rowspan="3" >Fines and Penalties Fee</th>  
                                        <th rowspan="3"></i>Remove</th>
                                    </tr>
                                    <tr>
                                        <th style="text-align: center" rowspan="2">Month</th>
                                        <th style="text-align: center" rowspan="2">Day</th>                                        
                                        <th style="text-align: center" rowspan="2">Year</th>
                                        <th style="text-align: center" rowspan="2">Entrance Fee</th>
                                        <th style="text-align: center" rowspan="2">Facilities User Fee</th>
                                        <th style="text-align: center" rowspan="2">Resource User Fee</th>
                                        <th style="text-align: center" rowspan="2">Concession Fee</th>                                        
                                        <th style="text-align: center" rowspan="2">Disbursement</th>
                                        <th style="text-align: center" rowspan="2">Others  (Pls. specify)</th>
                                        <th style="text-align: center" rowspan="2">Total Income</th>                                        
                                        <th style="text-align: center" rowspan="2">Retained Income(75%)</th>
                                        <th style="text-align: center" rowspan="2">SAGF (25%)</th>
                                        <th style="text-align: center" rowspan="2">Total Income</th>
                                        <th style='text-align: center;' rowspan="2">Trust fund</th>
                                        <th style='text-align: center;' rowspan="2">Mode of payment</th> 
                                        <th style='text-align: center;' rowspan="2">Amount</th>
                                    </tr> 
                                </thead>
                                <tbody id="tbodyIpafs"></tbody>
                            </table>
                            <table id="tableMonitoringIpaf_sample" class="table-ola">
                                <tbody id="tbodyIpaf_sample">
                                </tbody>
                            </table>
                        </div>                            
                    </div>
                </div>
                <div id="donate" class="tabcontentipaf hidden">
                    <div class="col-xs-12">
                        <!-- <fieldset>
                            <legend>Contribution/Donation</legend>
                            <div class="col-xs-4 col-lg-4">
                                <div id="donationdiv">
                                    <button id="add_contribution_donation"  type="button" class="btn btn-info">Add Contribution/Donation</button>        
                                </div><br>
                            </div>
                        </fieldset>
                         <fieldset>
                            <legend>Development Fees</legend>
                             <div class="col-xs-4 col-lg-4">
                                <div id="developmentdiv">
                                    <button id="add_development"  type="button" class="btn btn-info">Add Development Fees</button>        
                                </div><br>
                            </div> 
                        </fieldset>
                        <fieldset>
                            <legend>Fines and Penalties</legend>
                            <div class="col-xs-4 col-lg-4">
                                <div id="finesdiv">
                                    <button id="add_fines"  type="button" class="btn btn-info">Add Fines and Penalties</button>        
                                </div><br>
                            </div> 
                        </fieldset> -->
                            <div class="col-xs-12">
                                <a type="text" id="addcontribution" class="btn btn-primary">Add data</a>                           
                            </div>
                            <div class="col-xs-12 ">   
                                <div class="table-responsive large-tables"><br>
                                    <div class="col-xs-4 col-lg-4 ">
                                        <ul><li>
                                        <?= form_dropdown('select_month_trust',$monthListed,'','class="form-control border-input select-css" id="select_trust_months"'); ?>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-4 col-lg-4 ">
                                        <ul><li>
                                        <?= form_dropdown('select_year_trust',$yearListed,'','class="form-control border-input select-css" id="select_trust_years"'); ?>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-4 col-lg-4">
                                        <a type="text" class="btn btn-primary" id="searchdateincometrust">Search</a>
                                    </div>
                                    <table id="tableContribution" class="table  table-bordered tglobal">
                                        <thead>
                                            <!-- <tr>
                                                <th colspan="7" style="text-align: center; font-size: 24px">Contribution/Donation</th>
                                            </tr> -->
                                            <tr>
                                               <th style='text-align: center;' colspan="3" rowspan="2">Period Covered</th>
                                               <th style='text-align: center;' colspan="3" >Contribution/Donation</th>    
                                               <th style='text-align: center;' rowspan="3" >Development Fee</th>                                               
                                               <th style='text-align: center;' rowspan="3" >Fines and Penalties Fee</th>  
                                                <th style='text-align: center;' rowspan="3"><i class="fa fa-cog"></i> Option</th>
                                            </tr>
                                            <tr>                                                
                                                <th style='text-align: center;' rowspan="2">Trust fund</th>
                                                <th style='text-align: center;' rowspan="2">Mode of payment</th> 
                                                <th style='text-align: center;' rowspan="2">Amount</th> 
                                            </tr>
                                            <tr>
                                                <th style='text-align: center;'>Month</th>
                                                <th style='text-align: center;'>Day</th>                                                
                                                <th style='text-align: center;'>Year</th>                                                        
                                            </tr>
                                        </thead>
                                        <tbody id="tbodycontri"></tbody>
                                    </table>
                                    <table id="tableContribution_sample" class="table  table-bordered tglobal">                                       
                                        <tbody id="tbodycontri_sample"></tbody>
                                    </table>
                                </div>
                            </div>
                    </div>
                </div>
            </div><!-- END TAB -->
            <div id="managementzone" class="tab-pane">
                <div class="form-style-6">
                    <h2>Management Zone</h2>
                </div>
               <fieldset>
                   <legend>Map image</legend>
                   <!-- <div class=" col-xs-12">
                        <div class="col-xs-12 col-lg-12">
                            <div class="center">
                                <input id="id_management" name="id_management" class="hide" value="<?php echo $pamain->id_management; ?>" />                       
                                <p><center>Note: Upload map image of Strict protection zone and Multiple use zone</center></p>
                                <img width="500px" height="480px" id="blahmgnt" class="blahmgnt" src="<?php echo (!empty($pamain->id_management)?base_url('bmb_assets2/upload/managementzone_img/').$pamain->managementzone_image :base_url("bmb_assets2/upload/managementzone_img/nophoto.jpg")) ?>" alt="your image" class="upload-btn-wrapper" />
                                <input type='file' name="pic_mgnts" id="pic_mgnts" onchange="readURLmgnt(this);" />
                                <input type="hidden" name="old_picture_strict" value="nophoto.jpg" />
                                    <input id="mgnt_span" name="mgnt_span" class="hide" value="<?php echo $pamain->managementzone_image; ?>" />
                                    <span id="msg"></span>
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class="col-xs-12">                                        
                        <div class="col-xs-6 col-lg-6 ">   
                            <div id="fetch_images_seagrass"></div><br>
                            <input type='file' name="img_seagrassmap" id="img_seagrassmap"/><br>
                            <input type="hidden" name="old_picture" value="nophoto.jpg"> 
                            <span id="img_seagrassmapspan" class="img_seagrassmapspan hidden">nophoto.jpg</span>
                        </div>
                    </div> -->
                    <div class="col-xs-12">                                        
                        <div class="col-xs-6 col-lg-6 ">   
                            <div id="fetch_images_mgntzone"></div><br>
                            <input type='file' name="img_mngtzonemap" id="img_mngtzonemap"/><br>
                            <input type="hidden" name="old_picture" value="nophoto.jpg"> 
                            <span id="img_mngtzonemapspan" class="img_mngtzonemapspan hidden">nophoto.jpg</span>
                        </div>
                    </div>

                </fieldset>
                <div class="col-xs-12">
                    <div class="col-xs-12 col-lg-12">
                        <fieldset>
                            <legend>Strict Protection Zone</legend>
                            <ul><li>
                                <?= form_label('Category').form_dropdown('splcat',$splcategory,'','id="splcat" class="form-control border-input select-css"') ?>
                            </li></ul>
                            <ul><li>
                                <?= form_label('Area(has)','','for="stricthas"').form_input('stricthas','','placeholder=" " id="stricthas" onkeyup=run(this)');?>                                
                            </li></ul>
                            <ul><li>
                                <?= form_label('Brief description','','for="strictzone"').form_textarea('strictzone','','placeholder="Brief description" id="strictzone"');?>                               
                            </li></ul>
                            <div class="col-xs-12">
                            <a type="text" id="add_strict" class="btn btn-primary">Add data</a>                           
                        </div>
                        <div class="col-xs-12">                            
                            <div class="table-responsive large-tables">
                                <table id="table_strict" class="table  table-bordered tglobal">
                                    <thead>
                                        <tr>                                                
                                            <th colspan="3" style="text-align: center; font-size: 24px"> Strict Protection Zone data</th>                                           
                                        </tr>
                                        <tr>
                                            <th style='text-align: center;'>Category</th>
                                            <th style='text-align: center;'>Description</th>
                                            <th style='text-align: center;'>Area (has)</th>
                                            <!-- <th></th> -->
                                        </tr>
                                    </thead>
                                    <tbody id="tbodystrict"></tbody>
                                </table>
                                <table id="table_strict_sample" class="table  table-bordered tglobal">                                       
                                    <tbody id="tbodystrict_sample"></tbody>
                                </table>
                            </div> 
                        </div>
                        </fieldset>
                    </div>                        
                </div>
                <div class="col-xs-12">
                    <div class="col-xs-12 col-lg-12">
                        <fieldset>
                            <legend>Multiple Use Zone</legend>
                            <ul><li>
                                <?= form_label('Area(has)','','for="multiplehas"').form_input('multiplehas','','placeholder=" " id="multiplehas" onkeyup=run(this)');?>
                            </li></ul>
                            <ul><li>
                                <?= form_label('Brief description','','for="multiplezone"').form_textarea('multiplezone','','placeholder="Brief description" id="multiplezone"');?>
                            </li></ul>                           
                        <div class="col-xs-12">
                            <a type="text" id="add_multiple" class="btn btn-primary">Add data</a>                           
                        </div>
                        <div class="col-xs-12">                            
                            <div class="table-responsive large-tables">
                                <table id="table_multiple" class="table  table-bordered tglobal">
                                    <thead>
                                        <tr>                                                
                                            <th colspan="3" style="text-align: center; font-size: 24px"> Multiple Use Zone data</th>                                           
                                        </tr>
                                        <tr>
                                            <th style='text-align: center;'>Description</th>
                                            <th style='text-align: center;'>Area (has)</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbodymultiple"></tbody>
                                </table>
                                <table id="table_multiple_sample" class="table  table-bordered tglobal">                                       
                                    <tbody id="tbodymultiple_sample"></tbody>
                                </table>
                            </div> 
                        </div>
                        </fieldset>
                    </div>                        
                </div>
            </div>
            <div id="ecotour" class="tab-pane">
                <div class="form-style-6">
                    <h2>Ecotourism</h2>
                </div>
                <div class="tab">
                    <a class="tablinktourism active" onclick="tabtourism(event, 'tourism_attraction')">Attractions</a>
                    <a class="tablinktourism" id="loadfacility" onclick="tabtourism(event, 'tourism_facility')">Facilities</a>
                    <a class="tablinktourism" id="loadactivity" onclick="tabtourism(event, 'tourism_activity')">Activities</a>
                    <a class="tablinktourism" id="loadproducts" onclick="tabtourism(event, 'tourism_product')">Products</a>
                    <a class="tablinktourism" id="loadenterprise" onclick="tabtourism(event, 'tourism_enterprise')">Enterprises</a>
                </div>
                <div id="tourism_attraction" class="tabcontenttourism" style="display:block">
                    <fieldset>
                        <legend>Map image for attraction site</legend>
                        <div class="col-xs-6 col-lg-6 ">   
                        <ul><li>
                            <div id="fetch_images_attraction"></div><br>
                            <span>Map image</span>
                        </li></ul>    
                            <input type='file' name="img_attractionmap" id="img_attractionmap"/><br>
                            <input type="hidden" name="old_picture" value="nophoto.jpg"> 
                            <span id="img_attractionmapspan" class="img_attractionmapspan hidden">nophoto.jpg</span>
                        </div>
                        <span id="error_display"></span>

                    </fieldset>
                    <fieldset>
                        <legend>Attractions (Geotagged photos with UTM or WGS)</legend>
                    <div class="col-xs-12">
                        <div class="col-xs-6 col-xs-6">
                            <img width="500px" height="480px" id="blahsattr" class="blahsattr" src="<?php echo base_url("bmb_assets2/upload/attraction_img/nophoto.jpg") ?>" alt="your image" class="upload-btn-wrapper" />
                            <br>
                            <input type='file' name="pic_attr" id="pic_attr" onchange="readURLattrib(this);"  /><br>
                            <input type="hidden" name="old_picture" value="nophoto.jpg">
                            <span id="img_attractspan" class="img_attractspan hide"></span>
                        </div>
                        <div class="col-xs-6 col-xs-6">
                            <div class="col-xs-12 col-lg-12">
                                <ul><li>
                                <?= form_label('Attraction','','for="attraction"').form_input('attraction','','placeholder="eg. Nakayang View Deck" id="attraction"'); ?>
                                </li></ul>
                            </div>
                            <div class="col-xs-12 col-lg-12">
                                <ul><li>
                                <?= form_label('Brief description','','for="description2"').form_textarea('description2','','placeholder="" id="description2"');?>
                                </li></ul>
                            </div>
                            <div class=" col-xs-12">                        
                                <a type="text" id="addimageattract" class="btn btn-primary">Add data</a>
                            </div>
                        </div>
                    </div>                    
                    <div class="col-xs-12 ">                                
                        <div class="col-xs-12 col-lg-12 ">
                            <div class="table-responsive large-tables"><br>
                                <table id="tableAttraction" class="table  table-bordered tglobal">
                                    <thead></thead>
                                    <tbody id="tbodyimageattraction"></tbody>
                                </table>
                            </div>  
                            <table id="tableAttraction_sample" class="table  table-bordered tglobal">                                    
                                <tbody id="tbodyimageattraction"></tbody>
                            </table><hr>
                        </div>
                    </div>
                    </fieldset>
                </div>
                <div id="tourism_facility" class="tabcontenttourism">
                    <fieldset>
                        <legend>Map image for facility site</legend>
                        <div class="col-xs-6 col-lg-6 ">   
                        <ul><li>
                            <div id="fetch_images_facility"></div><br>
                            <span>Map image</span>
                        </li></ul>    
                            <input type='file' name="img_facilitymap" id="img_facilitymap"/><br>
                            <input type="hidden" name="old_picture" value="nophoto.jpg"> 
                            <span id="img_facilitymapspan" class="img_facilitymapspan hidden">nophoto.jpg</span>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Facilities (Geotagged photos with UTM or WGS)</legend>
                        <div class="col-xs-12">
                            <div class="col-xs-6 col-xs-6">
                                <img width="500px" height="480px" id="blahsfacility" src="<?php echo base_url("bmb_assets2/upload/facilities_img/nophoto.jpg") ?>" alt="your image" /><br>
                                <input type='file' name="pic_facilities" id="pic_facilities" onchange="readURLfacility(this);"  /><br>
                                <input type="hidden" name="old_picture" value="nophoto.jpg"> 
                                <span id="img_facilityspan" class="img_facilityspan hide"></span>
                            </div>
                            <div class="col-xs-6 col-xs-6">
                                <div class="col-xs-12 col-lg-12">   
                                    <ul><li>
                                        <?=  form_label('Facility','','for="facilities"').form_input('facilities','','placeholder="eg. Picnic Shed, Tea House, Fishing Village" id="facilities"');?>
                                </li></ul>
                                </div>
                                <div class="col-xs-12 col-lg-12">
                                    <ul><li>
                                        <?= form_label('Facilities Description','','for="description3"').form_textarea('description3','','placeholder=" " id="description3"'); ?> 
                                    </li></ul>     
                                </div>
                                <div class="col-xs-6 col-lg-6">   
                                    <ul><li>
                                        <?=  form_label('Date Build','','for="facilities_month"').form_dropdown('facilities_month',$monthList,'','id="facilities_month"');?>
                                    </li></ul>
                                </div>
                                <div class="col-xs-6 col-lg-6">   
                                    <ul><li>
                                        <?=  form_label('&nbsp;','','for="facilities_year"').form_dropdown('facilities_year',$yearList,'','id="facilities_year"');?>
                                    </li></ul>
                                </div>
                                <a type="text" id="addimageafacility" class="btn btn-primary">Add data</a>
                            </div>
                        </div>
                        <div class="col-xs-12 ">                                
                            <div class="table-responsive large-tables"><br>
                                <table id="tableFacilities" class="table  table-bordered tglobal">
                                    <!-- <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Descriptions</th>
                                            <th></th>
                                        </tr>
                                    </thead> -->
                                    <tbody id="tbodyimagefacilities"></tbody>
                                </table>
                                <table id="tableFacilities_sample" class="table  table-bordered tglobal">                                    
                                    <tbody id="tbodyimagefacilities_sample"></tbody>
                                </table>
                            </div>  
                        </div>
                    </fieldset>
                </div>
                <div id="tourism_activity" class="tabcontenttourism">
                    <fieldset>
                        <legend>Map image for activity site</legend>
                        <div class="col-xs-6 col-lg-6 ">   
                        <ul><li>
                            <div id="fetch_images_activity"></div><br>
                            <span>Map image</span>
                        </li></ul>    
                            <input type='file' name="img_activitymap" id="img_activitymap"/><br>
                            <input type="hidden" name="old_picture" value="nophoto.jpg"> 
                            <span id="img_activitymapspan" class="img_activitymapspan hidden">nophoto.jpg</span>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Activities (Geotagged photos with UTM or WGS)</legend>
                        <div class="col-xs-12 ">
                            <div class="col-xs-6 col-xs-6">
                                <img width="500px" height="480px" id="blahactivity" src="<?php echo base_url("bmb_assets2/upload/ecotourism_img/nophoto.jpg") ?>" alt="your image" /><br>
                                <input type='file' name="pic_activity" id="pic_activity" onchange="readURLs(this);"  /><br>
                                <input type="hidden" name="old_picture" value="nophoto.jpg">                                    
                                <span id="img_activityspan" class="img_activityspan hide"></span>
                            </div>                                
                            <div class="col-xs-6 col-xs-6 ">   
                                    <div class="col-xs-12 col-lg-12">
                                        <ul><li>
                                            <?= form_label('Activity','','for="activity_title"').form_input('activity_title','','placeholder="Title for activity" id="activity_title"')?>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-12 col-lg-12">
                                        <ul><li>
                                            <?= form_label('Activity Description','','for="description_activity"').form_textarea('description_activity','','placeholder=" " id="description_activity"') ?>
                                        </li></ul>      
                                    </div>
                                <a type="text" id="addimageaactivity" class="btn btn-primary">Add data</a>
                            </div>
                        </div>
                        <div class="col-xs-12 ">   
                            <div class="table-responsive large-tables"><br>
                                <table id="tableActivity" class="table  table-bordered tglobal">                                    
                                    <tbody id="tbodyimageactivity"></tbody>
                                </table>
                                 <table id="tableActivity_sample" class="table  table-bordered tglobal">                                   
                                    <tbody id="tbodyimageactivity_sample"></tbody>
                                </table>
                            </div>                             
                        </div>
                    </fieldset>
                </div>
                <div id="tourism_product" class="tabcontenttourism">                    
                    <fieldset>
                        <legend>Products</legend>
                        <div class="col-xs-12 ">
                            <div class="center">
                                <img width="500px" height="480px" id="blahaproduct" src="<?php echo base_url("bmb_assets2/upload/product_img/nophoto.jpg") ?>" alt="your image" /><br>
                                <input type='file' name="pic_products" id="pic_products" onchange="readURLsProduct(this);"  /><br>
                                <input type="hidden" name="old_picture" value="nophoto.jpg">                                    
                                <span id="img_productsspan" class="img_productsspan hide"></span>
                            </div>                                
                            <div class="col-xs-12 col-lg-12 ">   
                                <div class="col-xs-12 col-lg-12">
                                    <ul><li>
                                        <?= form_label('Product Description','','for="tourism_products"').form_textarea('tourism_products','','id="tourism_products"')?>
                                    </li></ul>
                                </div>                                   
                                <a type="text" id="addimageproduct" class="btn btn-primary">Add data</a>
                            </div>
                        </div>
                        <div class="col-xs-12 ">   
                            <div class="table-responsive large-tables"><br>
                                <table id="tableproduct" class="table  table-bordered tglobal">
                                    <thead>
                                        <!-- <tr>
                                            <th>Details</th>
                                        </tr> -->
                                    </thead>
                                    <tbody id="tbodyimageproduct"></tbody>
                                </table>
                                 <table id="tableproduct_sample" class="table  table-bordered tglobal">                                   
                                    <tbody id="tbodyimageproduct_sample"></tbody>
                                </table>
                            </div>                             
                        </div>
                    </fieldset>
                </div>
                <div id="tourism_enterprise" class="tabcontenttourism">                    
                    <fieldset>
                        <legend>Enterprises</legend>
                        <div class="col-xs-12 ">
                            <div class="center">
                                <img width="500px" height="480px" id="blahaenterprise" src="<?php echo base_url("bmb_assets2/upload/enterprise_img/nophoto.jpg") ?>" alt="your image" /><br>
                                <input type='file' name="pic_enterprises" id="pic_enterprises" onchange="readURLsEnterprise(this);"  /><br>
                                <input type="hidden" name="old_picture" value="nophoto.jpg">                                    
                                <span id="img_enterprisesspan" class="img_enterprisesspan hide"></span>
                            </div>                                
                            <div class="col-xs-12 col-lg-12 ">   
                                <div class="col-xs-12 col-lg-12">
                                    <ul><li>
                                        <?= form_label('Enterprise Description','','for="tourism_enterprises"').form_textarea('tourism_enterprises','','id="tourism_enterprises"')?>
                                    </li></ul>
                                </div>                                   
                                <a type="text" id="addimageenterprise" class="btn btn-primary">Add data</a>
                            </div>
                        </div>
                        <div class="col-xs-12 ">   
                            <div class="table-responsive large-tables"><br>
                                <table id="tableenterprise" class="table  table-bordered tglobal">
                                    <thead>
                                        <!-- <tr>
                                            <th>Details</th>
                                        </tr> -->
                                    </thead>
                                    <tbody id="tbodyimageenterprise"></tbody>
                                </table>
                                 <table id="tableenterprise_sample" class="table  table-bordered tglobal">                                   
                                    <tbody id="tbodyimageenterprise_sample"></tbody>
                                </table>
                            </div>                             
                        </div>
                    </fieldset>
                </div>
            </div>
            <div id="tenurialins" class="tab-pane">
                <div class="form-style-6">
                    <h2>Tenurial Instrument</h2>
                </div>
                <div class="col-xs-12  ">
                    <div class="col-xs-12 col-lg-12 ">    
                        <div class="col-xs-12 ">  
                        <fieldset>
                            <legend> </legend>
                            <div class="col-xs-12 ">  
                                <select id="type" class="form-control border-input select-css" name="type_processing" >
                                    <option value="" disabled default selected>Select Tenurial Instrument</option>                                                
                                    <option value="sapa">Special Use Agreement in Protected Areas (SAPA)</option>
                                    <option value="moa">Memorandum of Agreement (MOA)</option>
                                    <option value="pacbrma">Protected Area Community Based Resources Management Agreement (PACBRMA)</option>
                                </select>  
                            </div>
                        </fieldset>  
                        </div>
                        <div id="others">
                            <div class="col-xs-12">                                           
                                <div class="col-xs-12 col-lg-12">
                                    <ul><li>
                                        <?= form_label('Name of proponent','','for="projectname"').form_input('projectname','','placeholder=" " id="projectname"');?>
                                    </li></ul>
                                </div> 
                            </div>
                        </div>                                    
                        <div id="sapa">
                            <div class="col-xs-12 col-lg-12">
                                <ul><li>
                                <?= form_label('SAPA No.','','for="sapa_no"').form_input('sapa_no','','placeholder=" " id="sapa_no"');?>     
                                </li></ul>                                          
                            </div>                                                
                        </div>
                        <div id="moa">  
                            <div class="col-xs-12 ">
                                <div class="col-xs-12 col-lg-12">
                                    <ul><li>
                                        <?= form_label('Second Party','','for="second_party"').form_input('second_party','','placeholder=" " id="second_party"');?>
                                    </li></ul>
                                </div>                                  
                            </div>                                     
                            <div class="col-xs-12">
                                <div class="col-xs-12 col-lg-6">
                                    <fieldset>
                                        <legend style="background-color: transparent;color:#000;font-weight: 700;font-size: 14px">Date of Signing</legend>
                                        <div class="col-xs-6 col-lg-4">
                                            <?= form_dropdown('moa_month',$monthListed,'','class="select-css" id="moa_month"').form_label(' ','','for="moa_month"');?>
                                        </div>
                                         <div class="col-xs-6 col-lg-4">
                                            <?= form_dropdown('moa_day',$dayList,'','class="select-css" id="moa_day"').form_label(' ','','for="moa_day"');?>
                                        </div>
                                         <div class="col-xs-6 col-lg-4">
                                            <?= form_dropdown('moa_year',$yearListed,'','class="select-css" id="moa_year"').form_label(' ','','for="moa_year"');?>
                                        </div>
                                    </fieldset>
                                </div>                                            
                                <div class="col-xs-12 col-lg-6">
                                    <fieldset>
                                        <legend style="background-color: transparent;color:#000;font-weight: 700;font-size: 14px">Date of Expiration</legend>
                                        <div class="col-xs-6 col-lg-4">
                                            <?= form_dropdown('moa_exp_month',$monthListed,'','class="select-css" id="moa_exp_month"').form_label(' ','','for="moa_exp_month"');?>
                                        </div>
                                         <div class="col-xs-6 col-lg-4">
                                            <?= form_dropdown('moa_exp_day',$dayList,'','class="select-css" id="moa_exp_day"').form_label(' ','','for="moa_exp_day"');?>
                                        </div>
                                         <div class="col-xs-6 col-lg-4">
                                            <?= form_dropdown('moa_exp_year',$yearduration,'','class="select-css" id="moa_exp_year"').form_label(' ','','for="moa_exp_year"');?>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>                                        
                        </div>
                        <!-- END OF MOA -->
                        <div id="pacbrma" class="">   
                            <div class="col-xs-12">
                                <div class="col-xs-12 col-lg-12">
                                    <ul><li>                                    
                                        <?= form_label('PACBRMA No.','','for="pacbrma_no"').form_input('pacbrma_no','','placeholder=" " id="pacbrma_no"');?>
                                    </li></ul>
                                </div> 
                            </div> 
                            <div class="col-xs-12">
                                <div class="col-xs-12 col-lg-12">
                                    <ul><li>                                    
                                        <?= form_label('People Organization','','for="po"').form_input('po','','placeholder="Name of PO" id="po"');?>
                                    </li></ul>
                                </div> 
                            </div>                                                                         
                        </div>
                        <div id="other_duration">
                            <div class="col-xs-12 ">
                                <fieldset>
                                    <legend style="background-color: transparent;color:#000;font-weight: 700;font-size: 14px">Year Duration</legend>  
                                <div class="col-xs-6 col-lg-6">
                                    <?= form_label('From','','for="yearstart"').form_dropdown('yearstart',$yearListed,'','class="select-css" id="yearstart"');?>
                                </div>
                                 <div class="col-xs-6 col-lg-6">
                                    <?= form_label('To','','for="yearend"').form_dropdown('yearend',$yearduration,'','class="select-css" id="yearend"');?>
                                </div>
                                </fieldset>                                
                            </div>
                        </div>
                        <div id="others_">
                            <div class="col-xs-12 "> 
                                <div class="col-xs-12 col-lg-12">
                                    <ul><li>
                                        <?= form_label('Nature of Development','','for="nature_development"').form_input('nature_development','','placeholder="E.g: Nursery Establishment; Road Right-of-Way; Munipality of Tandag Wet Market" id="nature_development" style="margin-top:15px"');?>
                                    </li></ul>
                                </div>                                                                     
                                <div class="col-xs-6 col-lg-6">
                                    <ul><li>
                                        <?= form_label('Project Location','','for="proj_location"').form_input('proj_location','','placeholder="Complete Address" id="proj_location"');?>
                                    </li></ul>
                                </div> 
                                <div class="col-xs-6 col-lg-3">
                                    <ul><li>
                                        <?= form_label('Area (has)','','for="proj_area"').form_input('proj_area','','placeholder="Hectares" onkeyup="run(this)"  id="proj_area"');?>
                                    </li></ul>
                                </div> 
                                <div class="col-xs-6 col-lg-3">
                                    <ul><li>
                                        <?= form_label('Project Cost','','for="amount_fund"').form_input('amount_fund','','placeholder="Amount" onkeyup="run(this)"  id="amount_fund"');?>
                                    </li></ul>
                                </div>
                            </div>                                                                                                          
                            <div class="col-xs-12 ">
                                <div class="col-xs-12 col-lg-12">
                                    <ul><li>
                                        <?= form_label('Remarks','','for="remarks"').form_textarea('remarks','','placeholder="Remarks" id="remarks" style="height:100px"');?>
                                    </li></ul>
                                </div>
                            </div>
                            <div class="col-xs-12 ">
                                <div class="col-xs-12 col-lg-12 ">                                                
                                    <a type="text" id="addproject" class="btn btn-primary">Add data</a>
                                </div> 
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-12 ">
                            <div class="table-responsive large-tables">
                                <table id="tablePAProject" class="table  table-bordered tglobal">
                                    <thead>
                                        <tr>
                                            <th colspan="5" style="text-align: center; font-size: 24px">Tenurial Instrument</th>
                                        </tr>
                                        <tr>
                                            <th>Project Name</th>
                                            <th>Year(Start-End)</th>
                                            <th>Area</th>
                                            <th>Issuance</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbodyproject"></tbody>                               
                                </table>                            
                                <table id="tablePAProject_sample" class="table  table-bordered tglobal">                                    
                                    <tbody id="tbodyprojects"></tbody>                              
                                </table>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
            <div id="ppr" class="tab-pane">
                <div class="form-style-6">
                    <h2>Programs, Projects, and Researches</h2>
                </div>
                <div class="tab">
                    <a class="tablinkppr active" onclick="tabpprm(event, 'programtab')">Program</a>
                    <a class="tablinkppr" id="loadproj" onclick="tabpprm(event, 'projecttab')">Project</a>
                    <a class="tablinkppr" id="loadresearch" onclick="tabpprm(event, 'researchtab')">Research</a>
                </div>
                <div id="programtab" class="tabcontentppr" style="display:block">
                    <fieldset>
                    <legend>Program</legend>
                        <div class="col-xs-12">
                            <div class="col-xs-12 ">
                                <div class="col-xs-12 col-lg-12">
                                    <ul><li>
                                        <?= form_label('Program name','','for="program_name"').form_input('program_name','','placeholder=" " id="program_name"');?>
                                    </li></ul>
                                </div>                                   
                            </div>
                            <div class="col-xs-12 ">
                                <div class="col-xs-12 col-lg-12">
                                    <ul><li>
                                        <?= form_label('Proponent','','for="program_proponent"').form_input('program_proponent','','placeholder=" " id="program_proponent"');?>
                                    </li></ul>
                                </div>
                            </div>
                            <div class="col-xs-12 ">
                                <div class="col-xs-6">
                                    <fieldset>
                                        <legend style="background-color: transparent;color:#000;font-weight: 700;font-size: 14px">Duration From</legend>
                                        <div class="col-xs-12">
                                            <div class="col-xs-12 col-lg-12">  
                                                <div class="col-xs-6 col-lg-6">
                                                    <?= form_dropdown('start_implementation_month',$monthListed,'','class="select-css" id="start_implementation_month"').form_label(' ','','for="start_implementation_month"');?>
                                                </div>
                                                 <div class="col-xs-6 col-lg-6">
                                                    <?= form_dropdown('start_implementation_year',$yearListed,'','class="select-css" id="start_implementation_year"').form_label(' ','','for="start_implementation_year"');?>
                                                </div>
                                            </div>                                            
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-xs-6">
                                    <fieldset>
                                        <legend style="background-color: transparent;color:#000;font-weight: 700;font-size: 14px">To</legend>
                                        <div class="col-xs-12">
                                            <div class="col-xs-12 col-lg-12">  
                                                <div class="col-xs-6 col-lg-6">
                                                    <?= form_dropdown('end_implementation_month',$monthListed,'','class="select-css" id="end_implementation_month"').form_label(' ','','for="end_implementation_month"');?>
                                                </div>
                                                 <div class="col-xs-6 col-lg-6">
                                                    <?= form_dropdown('end_implementation_year',$yearduration,'','class="select-css" id="end_implementation_year"').form_label(' ','','for="end_implementation_year"');?>
                                                </div>
                                            </div>                                            
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="col-xs-12">                            
                                <div class="col-xs-12 col-lg-6">                                    
                                    <ul><li>
                                        <label for="source_fund">Source of fund</label>
                                        <select id="source_fund" class="form-control border-input" name="source_fund" style="margin-top: 15px;" >
                                            <option value="" disabled default selected>Select source of fund</option>                                                
                                            <option value="1">Foreign Assisted</option>
                                            <option value="2">Government Fund</option>
                                            <option value="3">Both: Foreign Assisted and Government Fund</option>    
                                        </select>
                                    </li></ul>
                                </div>
                                <div class="col-xs-12 col-lg-6">
                                    <ul><li>
                                    <?= form_label('Program Cost','','for="program_cost"').form_input('program_cost','','placeholder="Amount" onkeyup="run(this)"  id="program_cost"');?>
                                    </li></ul>
                                </div>
                            </div> 
                            <div class="col-xs-12 ">                                    
                                <div class="col-xs-12 col-lg-6">
                                    <ul><li>
                                    <?= form_label('Location','','for="program_location"').form_input('program_location','','placeholder=" " id="program_location"');?>
                                    </li></ul>
                                </div>
                                <div class="col-xs-12 col-lg-6">
                                    <ul><li>
                                    <?= form_label('Area(has)','','for="program_area"').form_input('program_area','','placeholder="Hectares" onkeyup="run(this)"  id="program_area"');?>
                                    </li></ul>
                                </div>
                            </div> 
                            <div class="col-xs-12 ">
                                <div class="col-xs-12 col-lg-12 inner-addon left-addon">
                                    <ul><li>
                                    <?= form_label('Remarks','','for="program_remarks"').form_textarea('program_remarks','','placeholder="Brief description" id="program_remarks" style="height:100px"');?>
                                    </li></ul>
                                </div>
                            </div>                                
                            <div class="col-xs-12 ">
                                <div class="col-xs-12 col-lg-12 ">                                                
                                        <a type="text" id="addprograms" class="btn btn-primary">Add data</a>
                                    </div> 
                            </div><br>  
                            <div class="col-xs-12 col-lg-12 ">
                                <div class="table-responsive large-tables">
                                    <table id="tablePAProgram" class="table  table-bordered tglobal">
                                        <thead>
                                            <tr>
                                                <th colspan="7" style="text-align: center; font-size: 24px">Programs</th>
                                            </tr>
                                            <tr>
                                                <th>Program Name</th>
                                                <th>Proponent</th>
                                                <th>Year(Start-End)</th>
                                                <th>Source of Fund</th>
                                                <th>Area(has)</th>
                                                <th>Location</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbodyprogram"></tbody>                               
                                    </table>                            
                                    <table id="tablePAProgram_sample" class="table  table-bordered tglobal">                                   
                                        <tbody id="tbodyprograms"></tbody>                              
                                    </table><hr>
                                </div>  
                            </div>     
                        </div>   
                    </fieldset>
                </div>
                 <div id="projecttab" class="tabcontentppr">
                    <fieldset>
                    <legend>Project</legend>
                        <div class="col-xs-12">
                            <div class="col-xs-12 ">
                                <div class="col-xs-12 col-lg-12">
                                    <ul><li>
                                        <?= form_label('Project name','','for="proj_name"').form_input('proj_name','','placeholder=" " id="proj_name"');?>
                                    </li></ul>
                                </div>                                   
                            </div>
                            <div class="col-xs-12 ">
                                <div class="col-xs-12 col-lg-12">
                                    <ul><li>
                                        <?= form_label('Proponent','','for="proj_proponent"').form_input('proj_proponent','','placeholder=" " id="proj_proponent"');?>
                                    </li></ul>
                                </div>
                            </div>
                            <div class="col-xs-12 ">
                                <div class="col-xs-6">
                                    <fieldset>
                                        <legend style="background-color: transparent;color:#000;font-weight: 700;font-size: 14px">Duration From</legend>
                                        <div class="col-xs-12">
                                            <div class="col-xs-12 col-lg-12">  
                                                <div class="col-xs-6 col-lg-6">
                                                    <?= form_dropdown('proj_start_implement_month',$monthListed,'','class="select-css" id="proj_start_implement_month"').form_label(' ','','for="proj_start_implement_month"');?>
                                                </div>
                                                 <div class="col-xs-6 col-lg-6">
                                                    <?= form_dropdown('proj_start_implement_year',$yearListed,'','class="select-css" id="proj_start_implement_year"').form_label(' ','','for="proj_start_implement_year"');?>
                                                </div>
                                            </div>                                            
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-xs-6">
                                    <fieldset>
                                        <legend style="background-color: transparent;color:#000;font-weight: 700;font-size: 14px">To</legend>
                                        <div class="col-xs-12">
                                            <div class="col-xs-12 col-lg-12">  
                                                <div class="col-xs-6 col-lg-6">
                                                    <?= form_dropdown('proj_end_implement_month',$monthListed,'','class="select-css" id="proj_end_implement_month"').form_label(' ','','for="proj_end_implement_month"');?>
                                                </div>
                                                 <div class="col-xs-6 col-lg-6">
                                                    <?= form_dropdown('proj_end_implement_year',$yearduration,'','class="select-css" id="proj_end_implement_year"').form_label(' ','','for="proj_end_implement_year"');?>
                                                </div>
                                            </div>                                            
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="col-xs-12">                            
                                <div class="col-xs-12 col-lg-6">                                    
                                    <ul><li>
                                        <label for="source_fund2">Source of fund</label>
                                        <select id="source_fund2" class="form-control border-input" name="source_fund2" style="margin-top: 15px;" >
                                            <option value="" disabled default selected>Select source of fund</option>                                                
                                            <option value="1">Foreign Assisted</option>
                                            <option value="2">Government Fund</option>
                                            <option value="3">Both: Foreign Assisted and Government Fund</option>    
                                        </select>
                                    </li></ul>
                                </div>
                                <div class="col-xs-12 col-lg-6">
                                    <ul><li>
                                    <?= form_label('Project Cost','','for="proj_cost"').form_input('proj_cost','','placeholder="Amount" onkeyup="run(this)"  id="proj_cost"');?>
                                    </li></ul>
                                </div>
                            </div> 
                            <div class="col-xs-12 ">                                    
                                <div class="col-xs-12 col-lg-6">
                                    <ul><li>
                                    <?= form_label('Location','','for="proj_location2"').form_input('proj_location2','','placeholder=" " id="proj_location2"');?>
                                    </li></ul>
                                </div>
                                <div class="col-xs-12 col-lg-6">
                                    <ul><li>
                                    <?= form_label('Area(has)','','for="proj_area2"').form_input('proj_area2','','placeholder="Hectares" onkeyup="run(this)"  id="proj_area2"');?>
                                    </li></ul>
                                </div>
                            </div> 
                            <div class="col-xs-12 ">
                                <div class="col-xs-12 col-lg-12 inner-addon left-addon">
                                    <ul><li>
                                    <?= form_label('Remarks','','for="proj_remarks"').form_textarea('proj_remarks','','placeholder="Brief description" id="proj_remarks" style="height:100px"');?>
                                    </li></ul>
                                </div>
                            </div>                                
                            <div class="col-xs-12 ">
                                <div class="col-xs-12 col-lg-12 ">                                                
                                        <a type="text" id="addprojects" class="btn btn-primary">Add data</a>
                                    </div> 
                            </div><br>  
                            <div class="col-xs-12 col-lg-12 ">
                                <div class="table-responsive large-tables">
                                    <table id="tablePAProj" class="table  table-bordered tglobal">
                                        <thead>
                                            <tr>
                                                <th colspan="7" style="text-align: center; font-size: 24px">Projects</th>
                                            </tr>
                                            <tr>
                                                <th>Project Name</th>
                                                <th>Proponent</th>
                                                <th>Year(Start-End)</th>
                                                <th>Source of Fund</th>
                                                <th>Area(has)</th>
                                                <th>Location</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbodyproj"></tbody>                               
                                    </table>                            
                                    <table id="tablePAProj_sample" class="table  table-bordered tglobal">                                   
                                        <tbody id="tbodyproj_sample"></tbody>                              
                                    </table><hr>
                                </div>  
                            </div>     
                        </div>   
                    </fieldset>
                    <!-- <fieldset>
                        <legend>Agroforestry</legend>
                        <div class="col-xs-12 ">
                            <div class="col-xs-12 col-lg-5 ">
                                <img width="300px" height="280px" id="blahsagro" src="<?php echo base_url("bmb_assets2/upload/agroforestry_img/nophoto.jpg") ?>" alt="your image" /><br>
                                <input type='file' name="pic_agro" id="pic_agro" onchange="readURLsAgro(this);"  /><br>
                                <input type="hidden" name="old_picture" value="nophoto.jpg">   
                                <span id="img_agrospan" class="img_agrospan hide"></span>
                            </div> 
                            <div class="col-xs-12 col-lg-7 ">  
                                <div class="col-xs-12 col-lg-12">
                                    <ul><li>
                                        <?= form_label('Agroforestry','','for="agroforestry"').form_input('agroforestry','','placeholder="E.g: Production systems involving plantation crops such as coffee, tea, use of woody perennials in soil conservation and improved fallow" id="agroforestry"');?>
                                    </li></ul>
                                </div>
                                <div class="col-xs-12 col-lg-12">
                                    <ul><li>
                                        <?= form_label('Description','','for="descAgro"').form_textarea('descAgro','','placeholder="Brief description" id="descAgro" style="height:100px"');?>
                                    </li></ul>
                                </div>
                                <div class="col-xs-12 col-lg-12">
                                    <ul><li>
                                        <?= form_label('Area(has)','','for="agroHas"').form_input('agroHas','','placeholder=" " onkeyup="run(this)" id="agroHas"');?>
                                    </li></ul>
                                </div>
                                <a type="text" id="addimageagro" class="btn btn-primary">Add data</a>
                            </div>
                            <div class="col-xs-12 ">   
                                <div class="table-responsive large-tables">
                                    <table id="tableAgro" class="table  table-bordered tglobal">
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
                                    <table id="tableAgro_sample" class="table  table-bordered tglobal ">                                       
                                        <tbody id="tbodyagro_sample"></tbody>
                                    </table>
                                </div>                             
                            </div>                            
                        </div>    
                    </fieldset> -->
                </div>
                 <div id="researchtab" class="tabcontentppr">
                    <fieldset>
                        <legend>Researches</legend>
                        <div class="col-xs-12  ">
                            <div class="col-xs-12 ">
                                <!-- <div class="col-xs-12 col-lg-6">
                                    <ul><li>
                                        <?= form_label('Type of Researches','','for="search_type"').form_input('search_type','','placeholder=" " id="search_type"');?>
                                    </li></ul>
                                </div> -->
                                <div class="col-xs-12 col-lg-12">
                                    <ul><li>
                                        <?= form_label('Title of research','','for="search_title"').form_input('search_title','','placeholder=" " id="search_title"');?>
                                    </li></ul>
                                </div>
                            </div>                                
                            <div class="col-xs-12 ">
                                <div class="col-xs-12 col-lg-12 ">                                                
                                    <a type="text" id="addresearch" class="btn btn-primary">Add data</a>
                                </div> 
                            </div>  
                            <div class="col-xs-12 col-lg-12 ">
                                <div class="table-responsive large-tables">
                                    <table id="tableSearch" class="table  table-bordered tglobal">
                                        <thead>
                                             <tr>
                                                <th style="text-align: center; font-size: 24px">Research</th>
                                            </tr>
                                            <!-- <tr>
                                                <th>Type of Research</th>
                                                <th>Title of Research</th>                                                   
                                                <th></th>
                                            </tr> -->
                                        </thead>
                                        <tbody id="tbodyresearch"></tbody>                               
                                    </table>                                
                                    <table id="tableSearch_sample" class="table  table-bordered tglobal ">                                        
                                        <tbody id="tbodyresearchs"></tbody>                              
                                    </table>
                                </div>  
                            </div>
                        </div>
                    </fieldset>
                </div>                
            </div>
            <div id="threats" class="tab-pane">
                <div class="form-style-6">
                    <h2>Threats</h2>                    
                    <fieldset>   
                    <legend>Threats map image</legend>                 
                    <div class="col-xs-12">                                        
                        <div class="col-xs-12 col-lg-5 ">
                            <ul><li>
                                <div id="fetch_images_threat"></div>
                                <input type='file' name="img_threatmap" id="img_threatmap"/><br>
                                <input type="hidden" name="old_picture" value="nophoto.jpg"/> 
                                <span id="img_threatmapspan" class="img_threatmapspan hidden">nophoto.jpg</span>
                                <span>Map image</span>
                            </ul></li>
                        </div>
                    </div>                    
                    </fieldset>
                    <fieldset>   
                    <legend>Threats information</legend>   
                    <div class="col-xs-12">
                        <div class="col-xs-12 col-lg-5 ">
                            <img width="360px" height="300px" id="ThreatImg" src="<?php echo base_url("bmb_assets2/upload/img_threat/nophoto.jpg") ?>" alt="your image" />
                            <input type='file' name="pic_threat" id="pic_threat" onchange="readURLsThreat(this);"  />
                            <input type="hidden" name="old_picture" value="nophoto.jpg">  
                            <span id="img_output" class="img_output hidden"></span><br>
                        </div>
                        <div class="col-xs-12 col-lg-7">
                            <div class="col-xs-12 col-lg-12">   
                                <ul><li>                                     
                                    <?= form_label('Status','','for="threats_cat_rank"').form_dropdown('threats_cat_rank',$threats_rank,'','id="threats_cat_rank" class="select-css"'); ?>
                                </li></ul>
                            </div> 
                            <div class="col-xs-12 col-lg-12" id="rank_qualify" style="display:none">   
                                <ul><li>                                     
                                    <?= form_label('Additional Qualifiers/Cut-off','','for="qualifiers"').form_input('qualifiers','','placeholder="Note: To get percentages based on markers identified per threat" id="qualifiers"'); ?>
                                </li></ul>
                            </div> 
                            <div class="col-xs-12 col-lg-12">   
                                <ul><li>                                     
                                    <?= form_label('Category','','for="threats_cat"').form_dropdown('threats_cat',$threats_cat,'','id="threats_cat" class="select-css"'); ?>
                                    <div class="error_cat"></div>
                                </li></ul>
                            </div>   
                            <div class="col-xs-12 col-lg-12">   
                                <ul><li>                                     
                                    <?= form_label('Threat','','for="threats_cat_sub"').form_dropdown('threats_cat_sub','','','id="threats_cat_sub" class="select-css"'); ?>
                                </li></ul>
                            </div>                             
                            <div class="col-xs-12 col-lg-12">   
                                <ul><li>                                     
                                    <?= form_label('Remarks','','for="threats_desc"').form_textarea('threats_desc','','placeholder=" " id="threats_desc" style="height:100px;"'); ?>
                                </li></ul>
                            </div> 
                            <div class="col-xs-12 col-lg-12">   
                                <ul><li>                                     
                                    <?= form_label('Location','','for="threat_loc"').form_input('threat_loc','','placeholder="" id="threat_loc"'); ?>
                                </li></ul>
                            </div>
                            <fieldset>
                                <legend style="background-color: transparent;color: #000; font-weight: 700;font-size: 14px;">Coordinates (point location)</legend>
                                <div class="col-xs-12">
                                    <div class="col-xs-12 col-lg-12">
                                        <table class="table-ola">                                          
                                            <tbody>
                                                <tr>
                                                    <td>Longitude</td>
                                                    <td width="">
                                                        <table class="table-ola">
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <ul><li>                                                            
                                                                            <?= form_label('Direction','for=""').form_dropdown('threats_longitude_dms_direction',$direct_long,'','class="select-css" id="threats_longitude_dms_direction"'); ?>
                                                                        </li></ul>
                                                                        </td>
                                                                    <td>
                                                                        <ul><li>
                                                                            <?= form_label('Degree (°)','for="threats_longitude_dms_degrees"').form_input('threats_longitude_dms_degrees','','id="threats_longitude_dms_degrees" class="dmstodd"') ?>
                                                                        </li></ul>
                                                                    </td>
                                                                    <td>
                                                                        <ul><li>
                                                                            <?= form_label('Minute (ˈ)','for="threats_longitude_dms_minutes"').form_input('threats_longitude_dms_minutes','','id="threats_longitude_dms_minutes" class="dmstodd"') ?>
                                                                        </li></ul>
                                                                    </td>
                                                                    <td>
                                                                        <ul><li>
                                                                            <?= form_label('Second (")','for="threats_longitude_dms_seconds"').form_input('threats_longitude_dms_seconds','','id="threats_longitude_dms_seconds" class="dmstodd"') ?>
                                                                        </li></ul>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Convert</td><td colspan="2"><?= form_input('ddlongoutput','','id="ddlongoutput"')?></td>
                                                                    <td><?php echo form_button('en','Enable/Disable','class="endis"') ?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Latitude</td>
                                                    <td width="">
                                                        <table class="table-ola">
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <ul><li>
                                                                           <?= form_label('Direction','for=""').form_dropdown('threats_latitude_dms_direction',$direct_lat,'','class="select-css" id="threats_latitude_dms_direction"'); ?>
                                                                        </li></ul>
                                                                        </td>
                                                                    <td>
                                                                        <ul><li>
                                                                            <?= form_label('Degree (°)','for="threats_latitude_dms_degrees"').form_input('threats_latitude_dms_degrees','','id="threats_latitude_dms_degrees" class="dmstodd"') ?>
                                                                        </li></ul>
                                                                    </td>
                                                                    <td>
                                                                        <ul><li>
                                                                            <?= form_label('Minute (ˈ)','for="threats_latitude_dms_minutes"').form_input('threats_latitude_dms_minutes','','id="threats_latitude_dms_minutes" class="dmstodd"') ?>
                                                                        </li></ul>
                                                                    </td>
                                                                    <td>
                                                                        <ul><li>
                                                                            <?= form_label('Second (")','for="threats_latitude_dms_seconds"').form_input('threats_latitude_dms_seconds','','id="threats_latitude_dms_seconds" class="dmstodd"') ?>
                                                                        </li></ul>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Convert</td><td colspan="2"><?= form_input('ddlatoutput','','id="ddlatoutput"') ?></td>
                                                                    <td><?php echo form_button('en','Enable/Disable','class="endiss"') ?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>                                                
                                            </tbody>
                                        </table>
                                    </div>                                    
                                </div>
                            </fieldset>  
                            <div class="col-xs-12 col-lg-12">
                                <div class="col-xs-6 col-lg-6">
                                    <ul><li>
                                        <?= form_label('Date Assessed','','for="threat_dMonth"').form_dropdown('threat_dMonth',$monthList,'','id="threat_dMonth" class="select-css"') ?>
                                    </li></ul>
                                </div>
                                <div class="col-xs-6 col-lg-6">
                                    <ul><li>
                                        <?= form_label('&nbsp;','','for="threat_dYear"').form_dropdown('threat_dYear',$yearList,'','id="threat_dYear" class="select-css"') ?>
                                    </li></ul>
                                </div>
                            </div>                          
                        </div>
                        <div class="col-xs-12 col-lg-12">    
                            <a type="text" id="saveThreat" class="btn btn-primary">Add data</a>
                        </div>
                        <div class="col-xs-12 ">   
                            <div class="table-responsive large-tables">
                                <table id="tableThreat" class="table  table-bordered tglobal">
                                    <thead>
                                         <tr>
                                            <th style="text-align: center; font-size: 24px">Threats</th>
                                        </tr>                                        
                                    </thead>
                                    <tbody id="tbodythreat"></tbody>
                                </table>
                                <table id="tableThreat_sample" class="table  table-bordered tglobal">                                 
                                    <tbody id="tbodythreats"></tbody>
                                </table>
                            </div>                             
                        </div>      
                    </div>
                    </fieldset>
                </div>
            </div>
            <div id="mboard" class="tab-pane">
                <div class="form-style-6">
                    <h2>Management Board</h2>
                </div>
                <div class="tab">
                    <a class="tablinkppr active" onclick="tabpprm(event, 'mngmtmember')">Members</a>
                    <a class="tablinkppr" id="loadproj" onclick="tabpprm(event, 'issuanceboard')">Issuances</a>
                </div>
                <div id="mngmtmember" class="tabcontentppr" style="display:block">
                    <div class="col-xs-12">                        
                        <fieldset>
                            <legend>Date Organized</legend>
                            <div class="col-xs-12 ">
                                <div class="col-xs-4 col-lg-4">
                                        <?php echo form_dropdown('pamb_month',$monthList,$pamain->pamb_month,'class="select-css" id="dateMonthPAMB"') ?>
                                </div>
                                <div class="col-xs-4 col-lg-4">
                                        <?php echo form_dropdown('pamb_day',$dayList,$pamain->pamb_day,'class="select-css" id="dateDayPAMB"') ?>                                         
                                </div>
                                <div class="col-xs-4 col-lg-4">
                                        <?php echo form_dropdown('pamb_year',$yearListed,$pamain->pamb_year,'class="select-css" id="dateYearPAMB"') ?><br>
                                </div>
                            </div>  
                        </fieldset>                    
                        <fieldset>
                            <legend>Personal Information</legend>
                            <div class="col-xs-12 ">                               
                                <div class="col-xs-4 col-lg-4">
                                    <ul><li>
                                        <?= form_label('First Name','','for="fname"').form_input('fname','','id="fname" placeholder="ex. John, Jane" required');?>
                                    </li></ul>
                                </div>
                                <div class="col-xs-4 col-lg-4">
                                    <ul><li>
                                        <?= form_label('Middle Name','','for="mname"').form_input('mname','','id="mname" placeholder="ex. A., dela Cruz" required');?>
                                    </li></ul>
                                </div>
                                <div class="col-xs-4 col-lg-4">
                                    <ul><li>
                                        <?= form_label('Last Name','','for="lname"').form_input('lname','','id="lname" placeholder="ex. Rodriguez, Espino" required');?>
                                    </li></ul>
                                </div>
                            </div>  
                            <div class="col-xs-12">                                                
                                <div class="col-xs-6 col-lg-4">
                                    <ul><li>                                    
                                        <?= form_label('Landline no.','','for="pamo_landline"').form_input('pamo_landline','','data-inputmask="&quot;mask&quot;: &quot;(99) 999-9999&quot;" data-mask="" id="pamo_landline"') ?>
                                    </li></ul>
                                </div>
                                <div class="col-xs-6 col-lg-4">
                                    <ul><li>
                                        <?= form_label('Mobile no.','','for="pamo_mobile"').form_input('pamo_mobile','','data-inputmask="&quot;mask&quot;: &quot;+(99) 999-9999-999&quot;" data-mask="" id="pamo_mobile"') ?>
                                    </li></ul>
                                </div>
                            </div> 
                            <div class="col-xs-12 ">

                                <div class="col-xs-6 col-lg-4 ">
                                    <ul><li>
                                        <?= form_dropdown('sex',$sexList,'','class="select-css" id="sex" required');?>
                                    </li></ul>
                                </div>
                                <div class="col-xs-6 col-lg-4 ">
                                    <ul><li>
                                        <?= form_dropdown('maritalstatus',$maritalStatus,'','class="select-css" id="maritalstatus" required');?>
                                    </li></ul>
                                </div>
                            </div>
                            <div class="col-xs-12 ">
                                <div class="col-xs-12 col-lg-12">
                                    <ul><li>
                                        <?= form_label('Residential Address','','for="address"').form_input('address','','placeholder="Lot no., Block no, Street name, Barangay, Municipal City"  id="address"');?>
                                    </li></ul>
                                </div>                                    
                            </div>
                       
                            <div class="col-xs-12 ">
                                <div class="col-xs-12 col-lg-12">
                                    <ul><li>
                                        <?= form_label('Designation/Position','','style="margin:4px" for="position"').form_input('position','','placeholder="ex. Chairman, Vice Chairman, Member" id="position" required');?>
                                    </li></ul>
                                </div>
                            </div>
                            <div class="col-xs-12 ">                            
                                <div class="col-xs-12 col-lg-12">
                                    <ul><li>
                                        <?= form_label('Office/Company Name','','style="margin:4px" for="office"').form_input('office','','placeholder="Office/Company Name" id="office" required');?>
                                    </li></ul>
                                </div>
                            </div>                                
                        </fieldset>
                        <fieldset>
                            <legend>Status of appointment</legend>
                            <div class="col-xs-12 ">
                                <div class="col-xs-12 col-lg-6 ">
                                    <?= form_dropdown('appointment',$appointment,'','class="select-css" id="appointment" required');?>
                                    <span class="error_appointment"></span>
                                </div>
                                <div class="col-xs-12 col-lg-6 ">
                                    <?= form_dropdown('appointment-sub','','','class="select-css" id="appointmentsub" required');?>
                                </div>
                            </div>                            
                        </fieldset>
                        <fieldset>
                            <legend>Membership</legend>
                            <div class="col-xs-12">
                                <div class="col-xs-4 col-lg-4">
                                    <?= form_label('Member of Technical Working Group','for="twgchck"')?>
                                </div>
                                <div class="col-xs-2 col-lg-2">
                                    <ul><li>
                                        <?= form_dropdown('twgchck',$kba,'','id="twgchck" class="select-css"'); ?>
                                    </li></ul>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-4 col-lg-4">
                                    <?= form_label('Member of Technical Committee','for="techcomchck"')?>
                                </div>
                                <div class="col-xs-2 col-lg-2">
                                    <ul><li>
                                        <?= form_dropdown('techcomchck',$kba,'','id="techcomchck" class="select-css"'); ?>
                                    </li></ul>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-4 col-lg-4">
                                    <?= form_label('Member of Executive Committee','for="execomchck"')?>
                                </div>
                                <div class="col-xs-2 col-lg-2">
                                    <ul><li>
                                        <?= form_dropdown('execomchck',$kba,'','id="execomchck" class="select-css"'); ?>
                                    </li></ul>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend>Date of appointment</legend>
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
                    <div class="col-xs-12  ">
                        <div class="col-xs-12 ">
                            <div class="col-xs-6 col-lg-4 ">
                                <a type="text" id="addpamb" class="btn btn-primary">Add data</a>
                            </div>
                        </div> 
                    </div>
                    <div class="col-xs-12  ">
                        <div class="col-xs-12 ">
                            <div class="col-xs-12 col-lg-12 ">
                                <div class="table-responsive large-tables">
                                    <!-- <h3>PAMB Members</h3> -->
                                    <table id="tablePAMBmember" class="table  table-bordered tglobal">
                                        <thead>
                                            <tr>
                                                <th colspan="6" style="text-align: center; font-size: 24px">Management Board(s)</th>
                                            </tr>
                                            <tr>
                                                <th>Name</th>
                                                <th>Sex</th>
                                                <th>Organization/Offices</th>
                                                <th>Position & Status</th>
                                                <th>Date of Appointment</th>
                                                <th><span class="glyphicon glyphicon-trash"></span></th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbodypamb"></tbody>
                                    </table>                           
                                    <table id="tablePAMBmember_sample" class="table table-bordered tglobal">                                    
                                        <tbody id="tbodypambs"></tbody>
                                    </table>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div> 
                <div id="issuanceboard" class="tabcontentppr">
                    <div class="col-xs-12">
                        <fieldset>
                                <legend>PAMB Resolution</legend>
                                <div class="col-xs-12">
                                    <div class="col-xs-3 col-lg-3">
                                        <ul><li>
                                                <?= form_label('Resolution Number','','for="resono"').form_input('resono','','id="resono" placeholder=" "') ?>
                                            <span>Input Resolution number here</span>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-9 col-lg-9">
                                        <ul><li>
                                                <?= form_label('Title of Resolution','','for="resotitle"').form_input('resotitle','','id="resotitle" placeholder=" "') ?>
                                            <span>Input title of resolution here</span>
                                        </li></ul>                                    
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="col-xs-12 col-lg-12 ">
                                        <ul><li>
                                                <?= form_label('File attached','','for="file_reso"')?>
                                                <input type='file' name="resofile" id="resofile" style="margin:20px;" /><br>
                                                <input type="hidden" name="old_file_reso" value="nophoto.jpg">
                                            <span>Upload file</span>
                                        </li></ul>                            
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <a type="text" class="btn btn-primary" id="addimage" onclick="insertresofile()">Add data</a>                                
                                </div>
                                <div class="col-xs-12 ">                                
                                    <div class="table-responsive" style="overflow-x:auto;"><br>
                                        <table id="tblresofile" class="table  table-bordered tglobal table-ola">
                                            <thead>
                                                <tr>
                                                    <th colspan="4" style="text-align: center; font-size: 24px">PAMB Resolution</th>
                                                </tr>
                                                <tr>
                                                    <th>PDF file</th> 
                                                    <th>Resolution no.</th>
                                                    <th>Title</th> 
                                                    <th><span class="glyphicon glyphicon-trash"></span></th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbodyresofile"></tbody>
                                        </table>
                                    </div>
                                </div>
                            </fieldset>
                    </div>
                </div>
            </div>
            <div id="refer" class="tab-pane">
                <div class="form-style-6">
                    <h2>References</h2>
                </div>
                 <div class="col-xs-12">
                     <div class="col-xs-12">
                         <fieldset>
                             <legend>Date of publication</legend>
                             <div class="col-xs-6 col-lg-4">
                                 <?= form_dropdown('ref_date_month',$monthListed,'','class="select-css" id="ref_date_month"');?>
                             </div>
                             <div class="col-xs-6 col-lg-4">
                                 <?= form_dropdown('ref_date_year',$yearListed,'','class="select-css" id="ref_date_year"');?>
                             </div>
                         </fieldset>                                    
                     </div>
                     <div class="col-xs-12">                                    
                         <div class="col-xs-12 col-lg-12">
                            <ul><li>
                                <?= form_label('Author','','for="author"').form_input('author','','placeholder="Name of the author" id="author"');?>
                            </li></ul>
                         </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="col-xs-12 col-lg-12">
                            <ul><li>
                                <?= form_label('Article title','','for="title"').form_input('title','','placeholder="eg. Water aerobics; The Negative effects of Facebook on communication. Social Media Today RSS. " id="title"');?>                                        
                            </li></ul>
                        </div>
                        <div class="col-xs-6 col-lg-6">
                            <ul><li>
                                <?= form_label('Name of Sponsoring body(if necessary)','','for="sponsoring_body"').form_input('sponsoring_body','','placeholder="eg. Google throws $38.8 million to the wind [Web log post]" id="sponsoring_body"');?>
                            </li></ul>
                        </div>
                        <div class="col-xs-6 col-lg-6">
                            <ul><li>
                                <?= form_label('Place of publication(if necessary)','','for="place"').form_input('place','','placeholder="Location" id="place"');?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="col-xs-12 col-lg-12">
                            <ul><li>
                                <?= form_label('URL/Source','','for="links"').form_input('links','','placeholder="eg. http://socialmediatoday.com" id="links"');?>
                            </li></ul>
                        </div>
                    </div>  
                    <div class="col-xs-12">
                        <div class="col-xs-12 col-lg-12">
                            <ul><li>
                                <?= form_label('Description)','','for="reference_desc"').form_textarea('reference_desc','','id="reference_desc"');?>
                            </li></ul>
                        </div>
                    </div>  
                    <div class="col-xs-12">
                        <div class="col-xs-12 col-lg-12">
                            <ul><li>
                                <?= form_label('Usage of the reference','','for="ref_usage"').form_input('ref_usage','','id="ref_usage"');?>
                            </li></ul>
                        </div>
                    </div>                         
                    <div class="col-xs-12 ">
                        <a type="text" id="addref" class="btn btn-primary">Add data</a>
                    </div>
                    <div class="col-xs-12 ">   
                        <div class="table-responsive large-tables"><br>
                            <table id="tableRef" class="table  table-bordered tglobal">
                                <thead>
                                    <tr>
                                        <th style="text-align: center; font-size: 24px">Reference(s)</th>
                                    </tr>
                                    <tr>
                                        <th>Citation</th>
                                    </tr>
                                </thead>
                                <tbody id="tbodyref"></tbody>
                            </table>
                            <table id="tableRef_sample" class="table  table-bordered tglobal">                              
                                <tbody id="tbodyrefs"></tbody>
                            </table><br>
                        </div>                             
                    </div>      
                </div>
            </div>
            <div id="mapimge" class="tab-pane">
                <div class="form-style-6">
                    <h2>Map Image</h2>
                    <div class="col-xs-12  ">
                        <div class="col-xs-12 ">
                            <div class="col-xs-12 col-lg-5 ">
                               <img width="300px" height="280px" id="blahss" src="<?php echo base_url("bmb_assets2/upload/map_image/nophoto.jpg") ?>" alt="your image" /><br>
                                <input type='file' name="picture2" id="picture2" onchange="readURLss(this);"  /><br>
                                <input type="hidden" name="old_picture" value="nophoto.jpg"> 
                                <span id="img_output_map" class="img_output_map hide"></span>
                            </div>
                            <div class="col-xs-12 col-lg-7">
                                <ul><li>
                                    <?= form_label('Map description','','for="remarks_image"').form_textarea('remarks_image','','placeholder="Brief description" id="remarks_image" style="height:250px;"');?>
                                </li></ul>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <a type="text" id="addimagemap" class="btn btn-primary">Add data</a>
                        </div>
                        <div class="col-xs-12 ">   
                            <div class="table-responsive large-tables"><br>
                                <table id="tableimage" class="table  table-bordered tglobal">
                                    <thead>
                                        <tr>
                                            <th colspan="3" style="text-align: center; font-size: 24px">Map Image</th>
                                        </tr>
                                        <tr>
                                            <th>Image</th>
                                            <th>Description</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbodyimage">
                                    </tbody>
                                </table>
                                <table id="tableimage_sample" class="table  table-bordered tglobal">                                    
                                    <tbody id="tbodyimage_sample">
                                    </tbody>
                                </table>
                            </div>                            
                        </div>      
                    </div>
                </div>
            </div>
            <div id="pamom" class="tab-pane">
                <div class="form-style-6">
                    <h2>Protected Area Management Office</h2>
                </div>
                <div class="col-xs-12  ">                              
                    <fieldset>
                    <legend>Protected Area Superintendent <i class="cap-icon ci-address-card-alt" aria-hidden="true"></i></legend>
                    <?php if (!empty($pamain->id_main)): ?>
                    <div class="col-xs-12 ">                               
                        <div class="col-xs-4 col-lg-4">
                            <ul><li>
                                <?= form_label('First Name','','for="pasu_fname"').form_input('pasu_fname',$pamain->firstname,'id="pasu_fname" placeholder="ex. John, Jane" required readonly="readonly"');?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-4">
                            <ul><li>
                                <?= form_label('Middle Name','','for="pasu_mname"').form_input('pasu_mname',$pamain->middlename,'id="pasu_mname" placeholder="ex. A., dela Cruz" required readonly="readonly"');?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-4">
                            <ul><li>
                                <?= form_label('Last Name','','for="pasu_lname"').form_input('pasu_lname',$pamain->lastname,'id="pasu_lname" placeholder="ex. Rodriguez, Espino" required readonly="readonly"');?>
                            </li></ul>
                        </div>
                    </div>                    
                    <?php else: ?>
                    <div class="col-xs-12 ">                               
                        <div class="col-xs-4 col-lg-4">
                            <ul><li>
                                <?= form_label('First Name','','for="pasu_fname"').form_input('pasu_fname',$read->firstname,'id="pasu_fname" placeholder="ex. John, Jane" required readonly="readonly"');?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-4">
                            <ul><li>
                                <?= form_label('Middle Name','','for="pasu_mname"').form_input('pasu_mname',$read->middlename,'id="pasu_mname" placeholder="ex. A., dela Cruz" required readonly="readonly"');?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-4">
                            <ul><li>
                                <?= form_label('Last Name','','for="pasu_lname"').form_input('pasu_lname',$read->lastname,'id="pasu_lname" placeholder="ex. Rodriguez, Espino" required readonly="readonly"');?>
                            </li></ul>
                        </div>
                    </div>
                    <?php endif ?>
                    <?php if (!empty($pamain->id_main)): ?>
                    <div class="col-xs-12">
                        <div class="col-xs-4 col-lg-4">
                            <ul><li>
                                <?= form_label('Sex','','for="pasu_sex"').form_input('pasu_sex',$pamain->sexdesc,'id="pasu_sex" readonly="readonly"');?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-4">
                            <ul><li>
                                <?= form_label('Designation','','for="pasu_designation"').form_input('pasu_designation',$pamain->designation,'id="pasu_designation" readonly="readonly"');?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="col-xs-4 col-lg-4">
                            <ul><li>
                                <?= form_label('Mobile No.','','for="pasu_mobile"').form_input('pasu_mobile',$pamain->mobile,'id="pasu_mobile" readonly="readonly"');?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-4">
                            <ul><li>
                                <?= form_label('Landline No.','','for="pasu_landline"').form_input('pasu_landline',$pamain->landline,'id="pasu_landline" readonly="readonly"');?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-4">
                            <ul><li>
                                <?= form_label('Email Address','','for="pasu_email"').form_input('pasu_email',$pamain->email,'id="pasu_email" readonly="readonly"');?>
                            </li></ul>
                        </div>
                    </div>
                    <?php else: ?>
                    <div class="col-xs-12">
                        <div class="col-xs-4 col-lg-4">
                            <ul><li>
                                <?= form_label('Sex','','for="pasu_sex"').form_input('pasu_sex',$read->sexdesc,'id="pasu_sex" readonly="readonly"');?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-4">
                            <ul><li>
                                <?= form_label('Designation','','for="pasu_designation"').form_input('pasu_designation',$read->designation,'id="pasu_designation" readonly="readonly"');?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="col-xs-4 col-lg-4">
                            <ul><li>
                                <?= form_label('Mobile No.','','for="pasu_mobile"').form_input('pasu_mobile',$read->mobile,'id="pasu_mobile" readonly="readonly"');?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-4">
                            <ul><li>
                                <?= form_label('Landline No.','','for="pasu_landline"').form_input('pasu_landline',$read->landline,'id="pasu_landline" readonly="readonly"');?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-4">
                            <ul><li>
                                <?= form_label('Email Address','','for="pasu_email"').form_input('pasu_email',$read->email,'id="pasu_email" readonly="readonly"');?>
                            </li></ul>
                        </div>
                    </div>
                    <?php endif ?>
                    </fieldset>
                    <fieldset> 
                    <legend>Assistant PASU</legend>
                    <div class="col-xs-12 ">                               
                        <div class="col-xs-4 col-lg-4">
                            <ul><li>
                                <?= form_label('First Name','','for="apasu_fname"').form_input('apasu_fname',$pamain->apasu_fname,'id="apasu_fname" placeholder="ex. John, Jane" required');?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-4">
                            <ul><li>
                                <?= form_label('Middle Name','','for="apasu_mname"').form_input('apasu_mname',$pamain->apasu_mname,'id="apasu_mname" placeholder="ex. A., dela Cruz" required');?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-4">
                            <ul><li>
                                <?= form_label('Last Name','','for="apasu_lname"').form_input('apasu_lname',$pamain->apasu_lname,'id="apasu_lname" placeholder="ex. Rodriguez, Espino" required');?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="col-xs-12 col-lg-12">
                            <ul><li>
                                <?= form_label('Office Address','','for="apasu_officeAddress"').form_input('apasu_officeAddress',$pamain->apasu_officeaddress,'placeholder="Lot no., Block no, Street name, Barangay, Municipal City"  id="apasu_officeAddress"');?>
                            </li></ul>

                        </div>                                    
                    </div>
                    <div class="col-xs-12 ">
                        <div class="col-xs-6 col-lg-4 ">
                            <ul><li>
                                <?= form_label('Sex','','for="apasu_sex"').form_dropdown('apasu_sex',$sexList,$pamain->apasu_sex,'class="select-css" id="apasu_sex" required');?>
                            </li></ul>
                        </div>  
                        <div class="col-xs-6 col-lg-4 ">
                            <ul><li>
                                <?= form_label('Position/Designtion','','for="apasu_position"').form_input('apasu_position',$pamain->apasu_position,'placeholder=" "  id="apasu_position"');?>                                
                            </li></ul>
                        </div>                                  
                    </div>                           
                    <div class="col-xs-12 ">
                        <div class="col-xs-6 col-lg-6">
                            <ul><li>                                    
                                <?= form_label('Mobile Number','','for="apasu_mobile"').form_input('apasu_mobile',$pamain->apasu_mobile,'data-inputmask="&quot;mask&quot;: &quot;+(99) 999-9999-999&quot;" placeholder="+(99) 999-9999-999" data-mask="" id="apasu_mobile"'); ?>
                            </li></ul>
                        </div>    
                        <div class="col-xs-6 col-lg-6"> 
                            <ul><li>                              
                                <?= form_label('Email Address','','for="apasu_email"').form_input('apasu_email',$pamain->apasu_email,'type="email" placeholder="example@gmail.com, example@yahoo.com" id="apasu_email"'); ?>
                            </li></ul>
                        </div>
                    </div>
                </fieldset>
                            <fieldset>
                                <legend>PAMO Staff</legend>
                                <div class="col-xs-12 ">
                                    <div class="col-xs-12 ">                               
                                        <div class="col-xs-4 col-lg-4">
                                            <ul><li>
                                                <?= form_label('First Name','','for="tfname"').form_input('tfname','','id="tfname" placeholder="ex. John, Jane" required');?>
                                            </li></ul>
                                        </div>
                                        <div class="col-xs-4 col-lg-4">
                                            <ul><li>
                                                <?= form_label('Middle Name','','for="tmname"').form_input('tmname','','id="tmname" placeholder="ex. A., dela Cruz" required');?>
                                            </li></ul>
                                        </div>
                                        <div class="col-xs-4 col-lg-4">
                                            <ul><li>
                                                <?= form_label('Last Name','','for="tlname"').form_input('tlname','','id="tlname" placeholder="ex. Rodriguez, Espino" required');?>
                                            </li></ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 ">
                                    <div class="col-xs-6 col-lg-4">
                                        <ul><li>
                                            <?= form_label('Sex','','for="tsex"').form_dropdown('tsex',$sexList,'','class="select-css" id="tsex" required');?>
                                        </li></ul>                                   
                                    </div>
                                    <div class="col-xs-6 col-lg-4">
                                        <ul><li>
                                            <?= form_label('Age','','for="tage"').form_input('tage','','id="tage" placeholder="Age" required');?>
                                        </li></ul>
                                    </div>   
                                    <div class="col-xs-6 col-lg-4">
                                        <ul><li>
                                            <?= form_label('Position/Designation','','for="tposition"').form_input('tposition','','id="tposition" placeholder="example: Forester I,II,III / EMS I,II,III" required');?>
                                        </li></ul>
                                    </div>                                
                                </div> 
                                <div class="col-xs-12 ">
                                    <div class="col-xs-4 col-lg-4">
                                        <ul><li>
                                            <?= form_label('Appointment','','for="tappointment"').form_dropdown('tappointment',$tappointment,'','class="select-css" id="tappointment" required');?>
                                        </li></ul>
                                    </div>                                    
                                    <div class="col-xs-4 col-lg-4">
                                        <ul><li>                                        
                                        <?= form_label('Date Appointed').form_dropdown('pamb_date_month',$monthList,'','id="pamb_date_month" class="select-css"');?>
                                        </li></ul>
                                    </div>                                   
                                    <div class="col-xs-4 col-lg-4">
                                        <ul><li>                                        
                                        <?= form_label('&nbsp;').form_dropdown('pamb_date_year',$yearList,'','id="pamb_date_year" class="select-css"');?>
                                        </li></ul>
                                    </div>                                
                                </div> 
                                <div class="col-xs-12 ">
                                    <div class="col-xs-4 col-lg-4">
                                        <ul><li>
                                            <?= form_label('Status of Employment','for="status_employment"').form_dropdown('status_employment',$status,'','id="status_employment" class="select-css"'); ?>
                                        </li></ul>
                                    </div>
                                </div>                      
                                <div class="col-xs-12 ">
                                    <a type="text" id="addtechnical" class="btn btn-primary">Add data</a>
                                </div>
                                <div class="col-xs-12 ">   
                                    <div class="table-responsive large-tables"><br>
                                        <table id="tblstaff" class="table  table-bordered tglobal">
                                            <thead>
                                                <tr>
                                                    <th colspan="5" style="text-align: center; font-size: 24px">PAMO Staff</th>
                                                </tr>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Sex</th>
                                                    <th>Status of appointment</th>
                                                    <th>Position/Designation</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbodytechnical">
                                            </tbody>
                                        </table>
                                        <table id="tblstaff_sample" class="table  table-bordered tglobal">                                            
                                            <tbody id="tbodytechnicals">
                                            </tbody>
                                        </table>
                                    </div>                            
                                </div> 
                            </fieldset>
                            </div>
            </div>
            <div id="gallery" class="tab-pane">
                <div class="form-style-6">
                    <h2>Photo Galleries</h2>
                </div>
                <fieldset>
                    <legend>Documents</legend>
                    <div class="col-xs-12">                        
                        <div class="tab">
                            <a class="tablinkfolder active" onclick="tabfolder(event, 'pf')">Physical Feature</a>
                            <a class="tablinkfolder" id="loadmanagement" onclick="tabfolder(event, 'mz')">Management Zone</a>
                            <a class="tablinkfolder" id="loadecotourism" onclick="tabfolder(event, 'eco')">Ecotourism</a>
                            <a class="tablinkfolder" id="loadthreatgal" onclick="tabfolder(event, 'th')">Threats</a>
                            <a class="tablinkfolder" id="loadmaps" onclick="tabfolder(event, 'mi')">Map Image</a>
                            <a class="tablinkfolder" id="loadotherga" onclick="tabfolder(event, 'oi')">Other Image</a>
                        </div>
                        <div id="pf" class="tabcontentfolder" style="display: block">
                            <fieldset>
                                <legend>Physical Feature</legend>
                                <div id="fetchPfTopo"></div>
                                <div id="fetchPfRock"></div>
                                <div id="fetchPfsoil"></div>
                                <div id="fetchPfclimate"></div>
                                <div id="fetchPfhydrology"></div>
                                <div id="fetchPfexland"></div>
                                <div id="fetchPflandslide"></div>
                                <div id="fetchPfflooding"></div>
                                <div id="fetchPfothergeohazard"></div>
                            </fieldset>
                        </div>
                        <div id="mz" class="tabcontentfolder">
                            <fieldset>
                                <legend>Management Zone</legend>
                                <div id="fetchmz"></div>                                
                            </fieldset>
                        </div>
                        <div id="eco" class="tabcontentfolder">
                            <fieldset>
                                <legend>Ecotourism</legend>
                                <div id="fetchattraction"></div>   
                                <div id="fetchfacility"></div>   
                                <div id="fetchactivity"></div>   
                            </fieldset>
                        </div>
                        <div id="th" class="tabcontentfolder">
                            <fieldset>
                                <legend>Threats</legend>
                                <div id="fetchthreat"></div>
                            </fieldset>
                        </div>
                        <div id="mi" class="tabcontentfolder">
                            <fieldset>
                                <legend>Map Image</legend>
                                    <div id="fetchmaps"></div>
                            </fieldset>
                        </div>
                        <div id="oi" class="tabcontentfolder">
                            <fieldset>
                                <legend>Other Images</legend>
                                <div class="col-xs-12  field inner-addon left-addon">
                            <input type="file" name="files" id="files" multiple />
                        </div>
                        <div style="clear:both"></div>
                         <br />
                         <br />
                         <div id="fetch_images"></div>
                         <div id="uploaded_images"></div>
                            </fieldset>
                        </div>
                    </div>
                </fieldset>
            </div>
            <div id="mngmtplan" class="tab-pane">
                <div class="form-style-6">
                    <h2>Management Plan</h2>
                    <fieldset>
                        <div class="col-xs-12">
                            <div class="col-xs-12 col-lg-12 ">
                                <ul><li>
                                        <?= form_label('File attached','','for="mngmtplanfile"')?>
                                        <input type='file' name="mngmtplanfile" id="mngmtplanfile" style="margin:20px;" /><br>
                                        <input type="hidden" name="old_mngmtplanfile" value="nophoto.jpg">
                                    <span>Upload file</span>
                                </li></ul>                            
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="col-xs-4 col-lg-3">
                                <ul><li>
                                    <?= form_label('Date Approve','for="mpMonth"').form_dropdown('mpMonth',$monthList,'','id="mpMonth" class="select-css"') ?>
                                </li></ul>
                            </div>
                            <div class="col-xs-4 col-lg-2">
                                <ul><li>
                                    <?= form_label('&nbsp;','for="mpDay"').form_dropdown('mpDay',$dayList,'','id="mpDay" class="select-css"') ?>
                                </li></ul>
                            </div>
                            <div class="col-xs-4 col-lg-2">
                                <ul><li>
                                    <?= form_label('&nbsp;','for="mpYear"').form_dropdown('mpYear',$yearList,'','id="mpYear" class="select-css"') ?>
                                </li></ul>
                            </div>
                            <div class="col-xs-4 col-lg-2">
                                <ul><li>
                                    <?= form_label('Status','for="mpStatus"').form_dropdown('mpStatus',$status_mngmtplan,'','id="mpStatus" class="select-css"') ?>
                                </li></ul>
                            </div>
                            <div class="col-xs-4 col-lg-3">
                                <ul><li>
                                    <?= form_label('Duration','for="mpduration"').form_input('mpduration','','onkeyup="run(this)" id="mpduration" placeholder="Year duration"') ?>
                                </li></ul>
                            </div>
                        </div>
                        <div class="col-xs-12">
                        <ul><li>
                                <?= form_label('Remarks','','for="mngmtplanremarks"').form_textarea('mngmtplanremarks','','id="mngmtplanremarks" placeholder=" "') ?>
                            <span><!-- Input title of resolution here --></span>
                        </li></ul>
                        </div>                        
                        <div class="col-xs-12">
                            <a type="text" class="btn btn-primary" id="addimage" onclick="insertmngmntfile()">Add data</a>                                
                        </div>
                        <div class="col-xs-12 ">                                
                            <div class="table-responsive"><br>
                                <table id="tblmngmtfile" class="table table-bordered tglobal">
                                    <thead>
                                        <tr>
                                            <th colspan="3" style="text-align: center; font-size: 24px">Management Plan</th>
                                        </tr>
                                        <tr>
                                            <th>PDF file</th> 
                                            <th>Details</th>
                                            <th>Date</th> 
                                        </tr>
                                    </thead>
                                    <tbody id="tbodymngmtfile"></tbody>
                                </table>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
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
