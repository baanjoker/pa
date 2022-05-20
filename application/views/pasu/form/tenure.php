<div class="form-style-6">
    <h2>Tenurial Instrument</h2>
</div>
<div class="col-xs-12">
    <div class="tab">
      <a class="tablinkstenure active" onclick="tabStenure(event, 'sapa')" id="loadsapadata">Special Use Agreement in Protected Area (SAPA)</a>
      <a class="tablinkstenure" onclick="tabStenure(event, 'moa')" id="loadmoadata">Memorandum of Agreement (MOA)</a>
      <a class="tablinkstenure" onclick="tabStenure(event, 'pacbrma')" id="loadpacbrma">Protected Area Community-Based Resource Management Agreement (PACBRMA)</a>
      <a class="tablinkstenure" onclick="tabStenure(event, 'othertenureinstrument')" id="loadothertenure">Other Tenurial Instrument/Agreement</a>
    </div>
</div>
<div class="col-xs-12">
    <input type="text" name="sapaCode" class="hidden" id="sapaCode">
    <div id="sapa" class="tabcontenttenure" style="display:block;">
        <fieldset>
            <legend>Special Use Agreement in Protected Area (SAPA)</legend>
            <div class="col-xs-12 col-lg-12 col-md-12">
                <div class="col-xs-6 col-lg-6 col-md-6 tooltip">
                    <ul><li>
                        <?= form_label('SAPA Number').form_input('sapano','','id="sapano"') ?>
                        <span class="tooltiptext">E.g. SAPA No. 01-2020</span>
                    </li></ul>
                </div>
                <div class="col-xs-6 col-lg-6 col-md-6 tooltip">
                    <ul><li>
                        <?= form_label('SAPA Holder').form_input('sapaproponent','','id="sapaproponent"') ?>
                        <span class="tooltiptext">E.g. Department of Energy</span>                        
                    </li></ul>
                </div>
            </div>
        <div class="col-xs-12">
            <div class="col-xs-6 col-lg-6 col-md-6 tooltip">      
                <ul><li>
                    <?= form_label('Nature of Development').form_dropdown('sapa_development',$sapa_devt,'','id="sapa_development"') ?>
                    <span class="tooltiptext">Type of special uses which are in accordance with the ENIPAS Act and PA Management Plan</span>
                </li></ul>
            </div>
            <div class="col-xs-6 col-lg-6 tooltip" id="chck-otheruses">
                <ul><li>
                    <?php echo form_label('(Specify other uses)','','for="otheruses"').form_input('otheruses','','id="otheruses" placeholder=" "'); ?>
                    <span class="tooltiptext">Specify other Uses</span>
                </li></ul>
            </div>  
        </div>
        <div class="col-xs-12"> 
            <div class="col-xs-6 col-lg-6 col-md-6">  
                <div class="col-xs-6 col-lg-6 col-md-6 tooltip">
                    <ul><li>
                        <?= form_label('Date Approved').form_dropdown('sapa_approve_month',$monthList,'','id="sapa_approve_month"') ?>
                        <span class="tooltiptext">Select date approved</span>
                    </li></ul>
                </div>
                <div class="col-xs-6 col-lg-6 col-md-6 tooltip">
                    <ul><li>
                        <?= form_label('&nbsp;').form_dropdown('sapa_approve_year',$yearList,'','id="sapa_approve_year"') ?>
                        <span class="tooltiptext">Select date approved</span>
                    </li></ul>
                </div> 
            </div>
            <div class="col-xs-6 col-lg-6 col-md-6">                
                <div class="col-xs-6 col-lg-6 col-md-6 tooltip">
                    <ul><li>
                        <?= form_label('Duration From').form_dropdown('sapa_yearstart',$yearListed,'','id="sapa_yearstart"') ?>
                        <span class="tooltiptext">Year duration</span>
                    </li></ul>
                </div>
                <div class="col-xs-6 col-lg-6 col-md-6 tooltip">
                    <ul><li>
                        <?= form_label('Duration To').form_dropdown('sapa_yearend',$yearduration,'','id="sapa_yearend"') ?>
                        <span class="tooltiptext">Year duration</span>
                    </li></ul>
                </div>
            </div>
            
        </div>
        <div class="col-xs-12">
            <div class="col-xs-6 col-lg-3 col-md-6 tooltip">
                <ul><li>
                    <?= form_label('Area').form_input('sapa_area','','id="sapa_area" class="number-separator"') ?>
                    <span class="tooltiptext">SAPA Area (Hectares)</span>                        
                </li></ul>
            </div>
            <div class="col-xs-6 col-lg-3 col-md-6 tooltip">
                <ul><li>
                    <?= form_label('SAPA Fee').form_input('sapa_cost','','id="sapa_cost" class="number-separator"') ?>
                    <span class="tooltiptext">SAPA fee in Peso</span>                        
                </li></ul>
            </div>
            <div class="col-xs-6 col-lg-3 col-md-6 tooltip">
                <ul><li>
                    <?= form_label('Rehabilitation/Bond (in Peso)').form_input('rehabbondcost','','id="rehabbondcost" class="number-separator"') ?>
                    <span class="tooltiptext">Rehabilitation or Bond in Peso</span>                        
                </li></ul>
            </div>
            <div class="col-xs-6 col-lg-3 col-md-6 tooltip">
                <ul><li>
                    <?= form_label('Status').form_dropdown('sapa_status',$tenurestatus,'','id="sapa_status"') ?>
                    <span class="tooltiptext">Current Status of development operation as well as the status of the agreement </span>
                </li></ul>
            </div>
        </div>
            <div class="col-xs-12 col-lg-12 col-md-12 tooltip">
                <ul><li>
                    <?= form_label('SAPA Location').form_input('sapa_location','','id="sapa_location"') ?>
                    <span class="tooltiptext">Exact location with coordinates of the area applied for</span> 
                </li></ul>
            </div>            
            <div class="col-xs-12 col-lg-12 col-md-12">  
                <fieldset>           
                    <?= form_label('Attached approved documents<i>(PDF format, maximum size of 50MB)</i>').form_upload('sapafile','','id="sapafile" onchange="readURLsapafile(this);"');?>
                    <input type="hidden" id="sapafile_span" name="sapafile_span" />
                    <div id="sapafileuploaddiv"></div>   
                </fieldset>                
            </div>            
                <div class="col-xs-12 col-lg-12 col-md-12">
                    <fieldset>
                        <?= form_label('Attached SAPA Rehabilitation Plan<i>(PDF format, maximum size of 50MB)</i>').form_upload('sapamgmtplanfile','','id="sapamgmtplanfile" onchange="readURLsapamgmtplanfile(this);" ');?>
                        <input type="hidden" id="sapamgmtplanfile_span" name="sapamgmtplanfile_span" />
                        <div id="saparehabfileuploaddiv"></div>   
                    </fieldset>  
                </div>
                <div class="col-xs-12 col-lg-12 col-md-12">
                    <fieldset>
                        <?= form_label('Attached Comprehensive Development Management Plan<i>(PDF format, maximum size of 50MB)</i>').form_upload('sapacdmpplanfile','','id="sapacdmpplanfile" onchange="readURLsapacdmpplanfile(this);" ');?>
                        <input type="hidden" id="sapacdmpplanfile_span" name="sapacdmpplanfile_span" />
                        <div id="sapacdmpfileuploaddiv"></div>   
                    </fieldset>
                </div> 
                <div class="col-xs-12 col-lg-12 col-md-12">
                    <fieldset>
                        <?= form_label('Attached PAMB Resolution<i>(PDF format, maximum size of 50MB)</i>').form_upload('sapapambresofile','','id="sapapambresofile" onchange="readURLsapapambresofile(this);" ');?>
                        <input type="hidden" id="sapapambresofile_span" name="sapapambresofile_span" />
                        <div id="sapapambresofileuploaddiv"></div>   
                    </fieldset>
                </div>
                <div class="col-xs-12 col-lg-12">
                    <fieldset>
                        <label>Upload Shapefile <i>(*.zip  format, maximum size of 200MB)</i></label>
                        <input type='file' name="shp_sapa" id="shp_sapa" onchange="readURLshapefilesapa(this);" />
                        <input type="hidden" name="shp_sapa_txt" id="shp_sapa_txt">
                        <div id="fetch_sapa_shpfile"></div>
                    </fieldset> 
                </div>
                <div class="col-xs-12 col-lg-12 col-md-12 hidden">
                    <fieldset>
                        <?= form_label('Attached PAMB Clearance<i>(PDF format, maximum size of 50MB)</i>').form_upload('sapapambclearancefile','','id="sapapambclearancefile" onchange="readURLsapapambclearancefile(this);" ');?>
                        <input type="hidden" id="sapapambclearancefile_span" name="sapapambclearancefile_span" />
                        <div id="sapapambclearancefileuploaddiv"></div>   
                    </fieldset>
                </div>            
            <fieldset>
                <legend>Monitoring Report(multiple upload)</legend>
                <div class="col-xs-12 tooltip">
                    <ul><li>
                        <?php echo form_label('Brief description').form_textarea('sapamonitoringtext','','id="sapamonitoringtext"'); ?>
                        <span class="tooltiptext">Input brief description on monitoring report</span>
                    </li></ul>
                </div>
                <div class="col-xs-12">
                    <div class="col-xs-12 col-lg-12"> 
                        <label>Upload file <i>(*.pdf format, maximum size of 50MB)</i></label>
                        <input type='file' name="sapamonitoringupload" id="sapamonitoringupload" onchange="readURLsapamonitoringupload(this);"  />
                        <input type="hidden" name="old_sapamonitoringupload" id="old_sapamonitoringupload">
                        <span id="sapamonitoringupload_span" class="sapamonitoringupload_span hidden"></span>
                        <div id="sapamonitoringuploadDiv"></div>
                    </div>
                    <div class="col-xs-12 col-lg-12 ">  
                        <br><a type="text" id="addsapamonitor" class="btn btn-warning">Add to list monitoring report</a>
                    </div>
                    <div class="col-xs-12"><br>
                        <table id="tablesapamonitoring" class="temp-content-table">
                            <thead>
                                <tr>
                                    <th>Details</th>
                                    <th>Files</th>
                                    <th>Action</th>
                                </tr>                     
                            </thead>
                            <tbody id="tbody_sapamonitoring">                                             
                            </tbody>
                        </table><hr> 
                    </div> 
                </div>
            </fieldset>   
            <div class="col-xs-12 col-lg-12 col-md-12 tooltip" style="margin-top:30px">
                <ul><li>
                    <?= form_label('Remarks').form_textarea('sapa_remarks','','id="sapa_remarks"') ?>
                    <span class="tooltiptext">Input remarks/other description</span>
                </li></ul>
            </div>  
            <div class="col-xs-12 col-lg-12 ">  
                <a type="text" id="addsapafile" class="btn btn-primary">Add to table</a>
            </div>
            <div class="col-xs-12 col-lg-12 ">
                <div class="table-responsive large-tables">
                    <table id="tablesapa" class="content-table">
                        <thead>
                            <tr>
                                <th colspan="9" style="text-align: center; font-size: 24px">Special Use Agreement in Protected Area</th>
                            </tr>
                            <tr>
                                <th rowspan="2">SAPA Number and Status</th>
                                <th rowspan="2">Name of Holder</th>
                                <th rowspan="2">Nature of Development</th>
                                <th colspan="2">Date of Issuances</th>
                                <th rowspan="2">Location</th>
                                <th rowspan="2">Area (has)</th>
                                <th rowspan="2">Document attached</th>
                                <th rowspan="2"></th>
                            </tr>
                            <tr>
                                <th>From</th>
                                <th>To</th>
                            </tr>
                        </thead>
                        <tbody id="tbodysapafile"></tbody>                               
                    </table>
                </div>  
            </div>
        </fieldset>
    </div>
    <div id="moa" class="tabcontenttenure">
    <input type="text" name="moaCode" class="hidden" id="moaCode">
        <fieldset>
            <legend>Memorandum of Agreement</legend>
            <div class="col-md-12 col-xs-12 col-lg-12">
                <div class="col-md-6 col-xs-6 col-lg-6 tooltip">
                    <ul><li>
                        <?= form_label('MOA Holders').form_input('moa_proponent','','id="moa_proponent"'); ?>
                        <span class="tooltiptext">E.g. Department of Energy</span>  
                    </li></ul>
                </div>
                <div class="col-md-6 col-xs-6 col-lg-6 tooltip">
                    <ul><li>
                        <?= form_label('Represented by').form_input('moa_party','','id="moa_party"'); ?>
                        <span class="tooltiptext">Represented by (Specify name of reprentative)</span>
                    </li></ul>
                </div>
            </div>
            <div class="col-md-12 col-xs-12 col-lg-12">
                <div class="col-md-6 col-xs-6 col-lg-6 tooltip">
                    <fieldset>
                        <legend style="background-color: transparent;color:#000;font-weight: 700;font-size: 14px">Date of Signing</legend>
                        <div class="col-xs-12 col-lg-4">
                            <?= form_dropdown('moa_month',$monthListed,'','id="moa_month"');?>
                        </div>
                         <div class="col-xs-12 col-lg-4">
                            <?= form_dropdown('moa_day',$dayList,'','id="moa_day"');?>
                        </div>
                         <div class="col-xs-12 col-lg-4">
                            <?= form_dropdown('moa_year',$yearListed,'','id="moa_year"');?>
                        </div>
                        <span class="tooltiptext">Select date of signing</span>
                    </fieldset>
                </div>
                <div class="col-md-6 col-xs-6 col-lg-6 tooltip">
                    <fieldset>
                        <legend style="background-color: transparent;color:#000;font-weight: 700;font-size: 14px">Date of Expiration</legend>
                        <div class="col-xs-12 col-lg-4">
                            <?= form_dropdown('moa_exp_month',$monthListed,'','id="moa_exp_month"');?>
                        </div>
                         <div class="col-xs-12 col-lg-4">
                            <?= form_dropdown('moa_exp_day',$dayList,'','id="moa_exp_day"');?>
                        </div>
                         <div class="col-xs-12 col-lg-4">
                            <?= form_dropdown('moa_exp_year',$yearduration,'','id="moa_exp_year"');?>
                        </div>
                        <span class="tooltiptext">Select date of expiration</span>
                    </fieldset>
                </div>
            </div>
            <div class="col-md-12 col-xs-12 col-lg-12">
                <div class="col-md-6 col-xs-6 col-lg-6 tooltip">
                    <ul><li>
                        <?= form_label('Purpose').form_input('moa_development','','id="moa_development"'); ?>
                        <span class="tooltiptext">Purpose of MOA whether for co-management, development, resource use, research, and other activities </span> 
                    </li></ul>
                </div>
                <div class="col-md-6 col-xs-6 col-lg-6 tooltip">
                    <ul><li>
                        <?= form_label('Location').form_input('moa_location','','id="moa_location"'); ?> 
                        <span class="tooltiptext">Input location <i>(Barangay, Municipality, Province)</i></span> 
                    </li></ul>
                </div>
            </div>
            <div class="col-md-12 col-xs-12 col-lg-12">
                <div class="col-xs-6 col-lg-3 col-md-6 tooltip">
                    <ul><li>
                        <?= form_label('Area').form_input('moa_area','','id="moa_area" class="number-separator"') ?>
                        <span class="tooltiptext">Input Area (Hectares)</span>                        
                    </li></ul>
                </div>
                <div class="col-xs-6 col-lg-3 col-md-6 tooltip">
                    <ul><li>
                        <?= form_label('Monetary Value').form_input('moa_cost','','id="moa_cost" class="number-separator"') ?>
                        <span class="tooltiptext">Value of the activity or project translated to Philippine Peso i.e. project cost, opportunity cost</span>                        
                    </li></ul>
                </div>
                <div class="col-xs-6 col-lg-3 col-md-6 tooltip">
                    <ul><li>
                        <?= form_label('Status').form_dropdown('moa_status',$tenurestatus,'','id="moa_status"') ?>
                        <span class="tooltiptext">Current Status of development operation as well as the status of the agreement </span>
                    </li></ul>
                </div>
            </div>     
            <fieldset>
                <?= form_label('Attached approved documents<i>(*.pdf format, maximum size of 50MB)</i>').form_upload('moafile','','id="moafile" onchange="readURLmoafile(this);" ');?>
                <input type="hidden" id="moafile_span" name="moafile_span" />
                <div id="moafileuploaddiv"></div>
            </fieldset>      
            <fieldset>
                <?= form_label('Attached Project Plan<i>(*.pdf format, maximum size of 50MB)</i>').form_upload('moaprojplan','','id="moaprojplan" onchange="readURLmoaprojplanfile(this);" ');?>
                <input type="hidden" id="moaprojplanfile_span" name="moaprojplanfile_span" />
                <div id="moaprojplanfileuploaddiv"></div>
            </fieldset>  
            <fieldset class="hidden">
                <?= form_label('Attached PAMB Approved<i>(*.pdf format, maximum size of 50MB)</i>').form_upload('moapambapprove','','id="moapambapprove" onchange="readURLmoapambapprovefile(this);" ');?>
                <input type="hidden" id="moapambapprovefile_span" name="moapambapprovefile_span" />
                <div id="moapambapprovefileuploaddiv"></div>
            </fieldset>  
            <fieldset>
                <?= form_label('Attached PAMB Resolution<i>(*.pdf format, maximum size of 50MB)</i>').form_upload('moapambreso','','id="moapambreso" onchange="readURLmoapambresofile(this);" ');?>
                <input type="hidden" id="moapambresofile_span" name="moapambresofile_span" />
                <div id="moapambresofileuploaddiv"></div>
            </fieldset> 
            <div class="hidden">
                <fieldset>
                    <?= form_label('Attached PAMB Clearance<i>(PDF format, maximum size of 50MB)</i>').form_upload('moapambclearancefile','','id="moapambclearancefile" onchange="readURLmoapambclearancefile(this);" ');?>
                    <input type="hidden" id="moapambclearancefile_span" name="moapambclearancefile_span" />
                    <div id="moapambclearancefileuploaddiv"></div>   
                </fieldset>
            </div> 
            <div class="col-xs-12 col-lg-12">
                <fieldset>
                    <label>Upload Shapefile <i>(*.zip  format, maximum size of 200MB)</i></label>
                    <input type='file' name="shp_moa" id="shp_moa" onchange="readURLshapefilemoa(this);" />
                    <input type="hidden" name="shp_moa_txt" id="shp_moa_txt">
                    <div id="fetch_moa_shpfile"></div>
                </fieldset> 
            </div>
            <fieldset>
                <legend>Monitoring Report(multiple upload)</legend>
                <div class="col-xs-12">
                    <ul><li>
                        <?php echo form_label('Details').form_textarea('moamonitoringtext','','id="moamonitoringtext"'); ?>
                    </li></ul>
                    <div class="col-xs-12 col-lg-6"> 
                        <input type='file' name="moamonitoringupload" id="moamonitoringupload" onchange="readURLmoamonitoringupload(this);"  />
                        <input type="hidden" name="old_moamonitoringupload" id="old_moamonitoringupload">
                        <div id="moamonitoringuploadDiv"></div>
                    </div>
                    <div class="col-xs-12 col-lg-12 ">  
                        <br><a type="text" id="addmoamonitor" class="btn btn-warning">Add to list monitoring report</a>
                    </div>
                    <div class="col-xs-12">
                        <table id="tablemoamonitoring" class="temp-content-table">
                            <thead>
                                <tr>
                                    <th>Details</th>
                                    <th>Files</th>
                                    <th>Manage</th>
                                </tr>                     
                            </thead>
                            <tbody id="tbody_moamonitoring">                                             
                            </tbody>
                        </table><hr> 
                    </div> 
                </div>
            </fieldset>
            <div class="col-xs-12 col-lg-12 col-md-12 tooltip">
                <ul><li>
                    <?= form_label('Remarks').form_textarea('moa_remarks','','id="moa_remarks"') ?>
                    <span class="tooltiptext">Input remarks/other description</span>
                </li></ul>
            </div>
            <div class="col-xs-12 col-lg-12 ">  
                <a type="text" id="addmoafile" class="btn btn-primary">Add to table</a>
            </div>
            <div class="col-xs-12 col-lg-12 ">
                <div class="table-responsive large-tables">
                    <table id="tablemoa" class="content-table">
                        <thead>
                            <tr>
                                <th colspan="9" style="text-align: center; font-size: 24px">Memorandum of Agreement (MOA)</th>
                            </tr>
                            <tr>
                                <th rowspan="2">Purpose/Name of Holder</th>
                                <th rowspan="2">Second Party</th>
                                <th colspan="2">Date of Issuances</th>
                                <th rowspan="2">Location</th>
                                <th rowspan="2">Area (has)</th>
                                <th rowspan="2">Document attached</th>
                                <th rowspan="2">Status</th>
                                <th rowspan="2"></th>
                            </tr>
                            <tr>
                                <th>Signed</th>
                                <th>Expired</th>
                            </tr>
                        </thead>
                        <tbody id="tbodymoafile"></tbody>                               
                    </table>
                </div>  
            </div>
        </fieldset>
    </div>
    <div id="pacbrma" class="tabcontenttenure">
        <fieldset>
            <legend>Protected Area Community-Based Resource Management Agreement (PACBRMA)</legend>
            <div class="col-md-12 col-xs-12 col-lg-12">
                <div class="col-md-6 col-xs-6 col-lg-6 tooltip">
                    <ul><li>
                        <?= form_label('PACBRMA No.').form_input('pcbrma_no','','id="pcbrma_no"'); ?>
                        <span class="tooltiptext">Input PACBRMA number. (e.g. 01-2021)</span>
                    </li></ul>
                </div>
                <div class="col-md-6 col-xs-6 col-lg-6 tooltip">
                    <ul><li>
                        <?= form_label('Head of Organization').form_input('pcbrma_holder','','id="pcbrma_holder"'); ?>
                        <span class="tooltiptext">Input the head of organization</span>
                    </li></ul>
                </div>
            </div>
            <div class="col-md-12 col-xs-12 col-lg-12">
                <div class="col-md-6 col-xs-6 col-lg-6 tooltip">
                    <ul><li>
                        <?= form_label('Name of PO').form_input('pcbrma_po','','id="pcbrma_po"'); ?>
                        <span class="tooltiptext">Input name of People's Organization</span>
                    </li></ul>
                </div>
                <div class="col-md-6 col-xs-6 col-lg-6 tooltip hide">
                    <ul><li>
                        <?= form_label('Renewable Project').form_input('pcbrma_devt','','id="pcbrma_devt"'); ?>
                        <span class="tooltiptext"></span>
                    </li></ul>
                </div>
            </div>
            <div class="col-md-12 col-xs-12 col-lg-12 tooltip">
                <!-- <div class="col-md-6 col-xs-6 col-lg-6"> -->
                    <ul><li>
                        <?= form_label('Location').form_input('pcbrma_location','','id="pcbrma_location"'); ?>
                        <span class="tooltiptext">Input PACBRMA coverage</span>
                    </li></ul>
                <!-- </div> -->
            </div>            
            <div class="col-md-12 col-xs-12 col-lg-12">
                
                <div class="col-md-6 col-xs-3 col-lg-3 tooltip">
                    <ul><li>
                        <?= form_label('Area (has)').form_input('pcbrma_area','','id="pcbrma_area" class="number-separator"'); ?>
                        <span class="tooltiptext">Input area (has)</span>
                    </li></ul>
                </div>
                <div class="col-md-6 col-xs-3 col-lg-3 tooltip hide">
                    <ul><li>
                        <?= form_label('Project cost').form_input('pcbrma_cost','','id="pcbrma_cost"'); ?>
                        <span class="tooltiptext"></span>
                    </li></ul>
                </div>
                 <div class="col-xs-6 col-lg-6 col-md-6">                    
                    <div class="col-xs-6 col-lg-6 col-md-6 tooltip">
                        <ul><li>
                            <?= form_label('Year start','','for="pcbrma_yearstart"').form_dropdown('pcbrma_yearstart',$yearListed,'','id="pcbrma_yearstart"');?>
                            <span class="tooltiptext">Select PCBRMA year started</span>
                        </li></ul>
                    </div>
                     <div class="col-xs-6 col-lg-6 col-md-6 tooltip">
                        <ul><li>
                            <?= form_label('Year end','','for="pcbrma_yearend"').form_dropdown('pcbrma_yearend',$yearduration,'','id="pcbrma_yearend"');?>
                            <span class="tooltiptext">Select PCBRMA year end</span>
                        </li></ul>
                    </div>
                </div>
                <div class="col-xs-6 col-lg-3 col-md-6 tooltip">
                    <ul><li>
                        <?= form_label('Status').form_dropdown('pcbrma_status',$tenurestatus,'','id="pcbrma_status"') ?>
                        <span class="tooltiptext">Current condition of development in area applied for and and its Agreement whether expired, suspended, for renewal, etc.</span>
                    </li></ul>
                </div>
            </div>
            <div class="col-md-12 col-xs-12 col-lg-12">
                <fieldset>
                    <legend style="background-color: transparent;color:#000;font-weight: 700;font-size: 14px">PO Member</legend>
                    <div class="col-xs-12 col-lg-12 col-md-12">
                        <div class="col-xs-4 col-lg-4 tooltip">
                            <ul><li>
                                <?= form_label('Total male').form_input('pcbrma_member_male','','id="pcbrma_member_male" class="pcbrmacomputation number-separator" onblur="calc_pcbrmamember();"') ?>
                                <span class="tooltiptext">Input total member of male</span>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-4 tooltip">
                            <ul><li>
                                <?= form_label('Total female').form_input('pcbrma_member_female','','id="pcbrma_member_female" class="pcbrmacomputation number-separator" onblur="calc_pcbrmamember();"') ?>
                                <span class="tooltiptext">Input total member of female</span>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-4 tooltip">
                            <ul><li>
                                <?= form_label('Total member').form_input('pcbrma_member','','id="pcbrma_member" readonly="readonly"') ?>
                                <span class="tooltiptext">Auto generate total members</span>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-12 col-md-12">
                        <fieldset>
                            <?= form_label('Upload list of PACBRMA members<i>(*.xls, *.xlsx, *.pdf, *.csv format, maximum size of 50MB)</i>').form_upload('pcbrmamember','','id="pcbrmamember" onchange="readURLpcbrmamember(this);" ');?>
                            <input type="hidden" name="approvepcbrmamember_span" id="approvpcbrmamember_span">
                            <input id="pcbrmamember_span" name="pcbrmamember_span" type="hidden" />
                            <div id="pacbrmamemberuploadfile"></div>
                        </fieldset>
                    </div>
                </fieldset>   
            </div>  
            <div class="col-md-12 col-xs-12 col-lg-12">
                <fieldset>
                    <?= form_label('Attached approved documents<i>(*.pdf format, maximum size of 50MB)</i>').form_upload('approvedocs','','id="approvedocs" onchange="readURLtenurefile(this);" ');?>
                    <input id="approveodcs_span" name="approveodcs_span" type="hidden" />
                    <div id="pacbrmaapprovedocsuploadfile"></div>
                </fieldset>
            </div>
            <div class="col-md-12 col-xs-12 col-lg-12 hidden">
                <fieldset>
                    <?= form_label('Attached PAMB Clearance<i>(PDF format, maximum size of 50MB)</i>').form_upload('pacbrmapambclearancefile','','id="pacbrmapambclearancefile" onchange="readURLpacbrmapambclearancefile(this);" ');?>
                    <input type="hidden" id="pacbrmapambclearancefile_span" name="pacbrmapambclearancefile_span" />
                    <div id="pacbrmapambclearancefileuploaddiv"></div>   
                </fieldset> 
            </div>
            <div class="col-xs-12 col-lg-12">
                <fieldset>
                    <label>Upload Shapefile <i>(*.zip  format, maximum size of 200MB)</i></label>
                    <input type='file' name="shp_pacbrma" id="shp_pacbrma" onchange="readURLshapefilepacbrma(this);" />
                    <input type="hidden" name="shp_pacbrma_txt" id="shp_pacbrma_txt">
                    <div id="fetch_pacbrma_shpfile"></div>
                </fieldset> 
            </div>
            <div class="col-xs-12 col-lg-12 col-md-12 tooltip">
                <ul><li>
                    <?= form_label('Remarks').form_textarea('pcbrma_remarks','','id="pcbrma_remarks"') ?>
                </li></ul>
            </div>          
            <div class="col-xs-12 ">
                <div class="col-xs-12 col-lg-12 ">                                                
                    <a type="text" id="addpcbrmafile" class="btn btn-primary">Add to table</a>
                </div> 
            </div>
            <div class="col-xs-12 col-lg-12 ">
                <div class="table-responsive large-tables">
                    <table id="tablepcbrma" class="content-table">
                        <thead>
                            <tr>
                                <th colspan="14" style="text-align: center; font-size: 24px">Protected Area Community-Based Resource Management Agreement (PACBRMA)</th>
                            </tr>
                            <tr>
                                <th rowspan="2">PACBRMA No.</th>
                                <th rowspan="2">Holder name/People Organization</th>
                                <th colspan="2">Year</th>
                                <th rowspan="2">Location</th>
                                <th rowspan="2">Area (has)</th>
                                <th rowspan="2">Document attached</th>
                                <th colspan="4">PO Member</th>                                
                                <th rowspan="2">Status</th>
                                <th rowspan="2">No. of Activity</th>                                
                                <th rowspan="2"></th>
                            </tr>
                            <tr>
                                <th>Start</th>
                                <th>End</th>
                                <th>Male</th>
                                <th>Female</th>
                                <th>Total</th>
                                <th>PO member document attached</th>

                            </tr>
                        </thead>
                        <tbody id="tbodypcbrmafile"></tbody>                               
                    </table>
                </div>  
            </div>
        </fieldset>
    </div>
    <div id="othertenureinstrument" class="tabcontenttenure" style="display: none">
        <fieldset>
            <legend>Other Tenurial Instruments/Agreement</legend>
            <div class="col-xs-12 col-lg-12 col-sm-12">
                <fieldset>
                        <div class="col-xs-12 col-lg-12 col-sm-12">
                            <div id="fetch_images_othertenure"></div>
                        </div>
                        <div class="col-xs-12 col-lg-12 col-sm-12">
                            <label>Upload map image <i>(*.png, *.jpeg, *.jpg format, maximum size of 50MB)</i></label>
                            <input type='file' name="pic_otother" id="pic_otother" />
                            <input type="hidden" name="old_otother" id="old_otother" />
                        </div>
                </fieldset>
                <fieldset>
                <legend style="background-color: transparent;color: black;font-weight: 700">Upload Shapefile <i>(note: *.zip, *.rar file, maximum file of 200MB)</i></legend>
                    <input type='file' name="zip_shpfile_otherinstrument" id="zip_shpfile_otherinstrument" />
                    <input type="hidden" name="old_shpfileotherinstrument" id="old_shpfileotherinstrument" />
                    <div class="col-xs-12 col-lg-12">
                        <div id="loadingothertenureshpfile"></div>
                    </div>
                </fieldset>
            </div>            
            <div class="col-xs-12 col-lg-12 col-md-12">
                <div class="col-xs-6 col-lg-6 col-md-6 tooltip">
                    <ul><li>
                        <?= form_label('Types of Instrument/Agreement','','for="typesinstrument"').form_dropdown('typesinstrument',$tenurelist,'','id="typesinstrument"') ?>
                        <span class="tooltiptext">Select type of instrument/agreement</span>
                    </li></ul>
                </div>
                <div class="col-xs-6 col-lg-6 col-md-6 tooltip" id="chk-othertenure" style="display: none">
                    <ul><li>
                        <?= form_label('Specify Others','','for="othertenure"').form_input('othertenure','','id="othertenure"') ?>
                        <span class="tooltiptext">Specify other instrument/agreement</span>
                    </li></ul>
                </div>
                <div class="col-xs-6 col-lg-6 col-md-6 tooltip" id="chk-typeinstrument" style="display: none">
                    <ul><li>
                        <?= form_label('Title No','','for="titledinstrument"').form_input('titledinstrument','','id="titledinstrument"') ?>
                        <span class="tooltiptext">Input CADT number</span>
                    </li></ul>
                </div>
            </div>
            <div class="col-xs-12 col-lg-12 col-md-12">
                <div class="col-xs-6 col-lg-6 col-md-6 tooltip">
                    <ul><li>
                        <?= form_label('Tenure holder/proponent name','','for="holderinstrument"').form_input('holderinstrument','','id="holderinstrument"') ?>
                        <span class="tooltiptext">Input tenure holder or name of proponent</span>
                    </li></ul>
                </div>
                <div class="col-xs-6 col-lg-6 col-md-6 tooltip">
                    <ul><li>
                        <?= form_label('Nature of development/purpose','','for="purposeinstrument"').form_input('purposeinstrument','','id="purposeinstrument"') ?>
                        <span class="tooltiptext">types of development, exploration and utilization provided/specified in the tenurial instrument/ agreement</span>
                    </li></ul>
                </div>
            </div>
            <div class="col-xs-12 col-lg-12 col-md-12">
                <div class="col-xs-6 col-lg-6 col-md-6 tooltip">
                    <ul><li>
                        <?= form_label('Location','','otlocation').form_input('otlocation','','id="otlocation"');?>
                        <span class="tooltiptext">Input location</span>
                    </li></ul>
                </div>
                <div class="col-xs-6 col-lg-6 col-md-6 tooltip">
                    <ul><li>
                        <?= form_label('Area (has)','','otarea').form_input('otarea','','id="otarea" class="number-separator"');?>
                        <span class="tooltiptext">Input area (hectares)</span>
                    </li></ul>
                </div>
            </div>     
            <div class="col-xs-12 col-lg-12 col-md-12">
                <fieldset>
                    <legend style="background-color: transparent;color: black;font-weight: 700">Duration</legend>
                    <div class="col-xs-6 col-lg-4 col-md-6 tooltip">
                        <ul><li>
                            <?= form_label('Date Approved','','for="otyearstart"').form_dropdown('otyearstart',$yearListed,'','id="otyearstart"') ?>
                            <span class="tooltiptext">Select date approved</span>
                        </li></ul>
                    </div>
                    <div class="col-xs-6 col-lg-4 col-md-6 tooltip">
                        <ul><li>
                            <?= form_label('Date Expiry','','for="otyearend"').form_dropdown('otyearend',$yearduration,'','id="otyearend"') ?>
                            <span class="tooltiptext">Select date expiry</span>
                        </li></ul>
                    </div>
                    <div class="col-xs-6 col-lg-4 col-md-6 tooltip">
                        <ul><li>
                            <?= form_label('Status','','for="otstatus"').form_dropdown('otstatus',$tenurestatus,'','id="otstatus"') ?>
                            <span class="tooltiptext">Current condition of development in the area as well its tenurial instrument whether expired, cancelled, suspended, etc.</span>
                        </li></ul>
                    </div>
                </fieldset>
            </div>  
            <div class="col-xs-12 col-lg-12 col-md-12"> 
                <fieldset>    
                    <legend style="background-color: transparent;color: black;font-weight: 700">Attached approved documents <i><i>(*.pdf format, maximum size of 50MB)</i></i></legend>
                        <input type='file' name="zip_shpfile_otherinstrumentfile" id="zip_shpfile_otherinstrumentfile" onchange="readURLotherInstrumentfileSHP(this);"  />
                        <input type="hidden" id="shpzip_otherinstrumentfile" name="shpzip_otherinstrumentfile" />
                        <div id="othertenureapprovedocsfileupload"></div>
                </fieldset>
            </div>
            <div class="col-xs-12 col-lg-12 col-md-12 hidden">
                <fieldset>
                    <?= form_label('Attached PAMB Clearance<i>(PDF format, maximum size of 50MB)</i>').form_upload('otherpambclearancefile','','id="otherpambclearancefile" onchange="readURLotherspambclearancefile(this);" ');?>
                    <input type="hidden" id="otherpambclearancefile_span" name="otherpambclearancefile_span" />
                    <div id="otherpambclearancefileuploaddiv"></div>   
                </fieldset>
            </div>
            <div class="col-xs-12 ">
                <div class="col-xs-12 col-lg-12 ">                                                
                    <a type="text" id="addothertenured" class="btn btn-primary">Add to table</a>
                </div> 
            </div>
            <div class="col-xs-12 col-lg-12 ">
                <div class="table-responsive large-tables">
                    <table id="tableothertenure_sub" class="table  table-bordered tglobal">                                    
                        <tbody id="tbodyothertenure_sub"></tbody>                              
                    </table>
                    <table id="tableothertenure" class="content-table">
                        <thead>
                            <tr>
                                <th colspan="9" style="text-align: center; font-size: 24px">Other Tenurial Instrument/Agreement</th>
                            </tr>
                        </thead>
                        <tbody id="tbodyothertenure"></tbody>                               
                    </table>                           
                    
                </div>  
            </div>
        </fieldset>
    </div>
</div>

<form method="post" action="" id="SAPAForm" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-sapa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Special Use Agreement in Protected Area (SAPA)</h4>
                </div>
                <input type="hidden" id="sapa-id" name="sapa-id" value="" />
                <input type="hidden" id="sapa-gencode" name="sapa-gencode" value="" />
                <input type="hidden" id="sapa-gencode2" name="sapa-gencode2" value="" />
                <div class="modal-body" >
                    <fieldset>
                        <div class="col-xs-12 col-lg-12 col-md-12">
                            <div class="col-xs-6 col-lg-6 col-md-6">
                                <ul><li>
                                    <?= form_label('SAPA Number').form_input('edit-sapano','','id="edit-sapano"') ?>
                                    <span>SAPA No. 01-2020</span>
                                </li></ul>
                            </div>
                            <div class="col-xs-6 col-lg-6 col-md-6">
                                <ul><li>
                                    <?= form_label('SAPA Holder').form_input('edit-sapaproponent','','id="edit-sapaproponent"') ?>
                                    <span>Department of Energy</span>
                                </li></ul>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-12 col-md-12">
                            <div class="col-xs-6 col-lg-6 col-md-6">
                                <ul><li>
                                    <?= form_label('Nature of Development').form_dropdown('edit-sapa_development',$sapa_devt,'','id="edit-sapa_development"') ?>
                                </li></ul>
                            </div>
                            <div class="col-xs-6 col-lg-6" id="chck-edit_otheruses1">
                                <ul><li>
                                    <?php echo form_label('(Specify other uses)','','for="edit-otheruses"').form_input('edit-otheruses','','id="edit-otheruses" placeholder=" "'); ?>
                                    <span>Specify other Uses</span>
                                </li></ul>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-12 col-md-12">
                            <div class="col-xs-6 col-lg-6 col-md-6">
                                <div class="col-xs-6 col-lg-6 col-md-6">
                                    <ul><li>
                                        <?= form_label('Date Approved').form_dropdown('edit-sapa_approve_month',$monthList,'',' id="edit-sapa_approve_month"') ?>
                                    </li></ul>
                                </div>
                                <div class="col-xs-6 col-lg-6 col-md-6">
                                    <ul><li>
                                        <?= form_label('&nbsp;').form_dropdown('edit-sapa_approve_year',$yearList,'',' id="edit-sapa_approve_year"') ?>
                                    </li></ul>
                                </div>
                            </div>
                            <div class="col-xs-6 col-lg-6 col-md-6">
                                <div class="col-xs-6 col-lg-6 col-md-6">
                                    <ul><li>
                                        <?= form_label('Duration From').form_dropdown('edit-sapa_yearstart',$yearListed,'',' id="edit-sapa_yearstart"') ?>
                                    </li></ul>
                                </div>
                                <div class="col-xs-6 col-lg-6 col-md-6">
                                    <ul><li>
                                        <?= form_label('Duration To').form_dropdown('edit-sapa_yearend',$yearduration,'',' id="edit-sapa_yearend"') ?>
                                    </li></ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-12 col-md-12">
                             <div class="col-xs-6 col-lg-3 col-md-6">
                                <ul><li>
                                    <?= form_label('Area').form_input('edit-sapa_area','','id="edit-sapa_area" class="number-separator"') ?>
                                    <span>SAPA Area (Hectares)</span>
                                </li></ul>
                            </div>
                            <div class="col-xs-6 col-lg-3 col-md-6">
                                <ul><li>
                                    <?= form_label('SAPA Fee').form_input('edit-sapa_cost','','id="edit-sapa_cost" class="number-separator" ') ?>
                                    <span>Project Cost in Peso</span>
                                </li></ul>
                            </div>
                            <div class="col-xs-6 col-lg-6 col-md-6">
                                <ul><li>
                                    <?= form_label('Rehabilitation/Bond (in Peso)').form_input('edit-rehabbondcost','','id="edit-rehabbondcost" class="number-separator" ') ?>
                                    <span>Rehabilitation or Bond in Peso</span>
                                </li></ul>
                            </div>
                            <div class="col-xs-12 col-lg-12 col-md-12">
                                <ul><li>
                                    <?= form_label('Status').form_dropdown('edit-sapa_status',$tenurestatus,'','id="edit-sapa_status"') ?>
                                </li></ul>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-12 col-md-12">
                            <ul><li>
                                <?= form_label('SAPA Location').form_input('edit-sapa_location','','id="edit-sapa_location"') ?>
                                <span>Barangay, Municipality, Province</span>
                            </li></ul>
                        </div>
                        <div class="col-xs-12 col-lg-12 col-md-12">
                            <fieldset>
                                <?= form_label('Attached approved documents <i>(*.pdf format, maximum size of 50MB)</i>').form_upload('edit-sapafile','','id="edit-sapafile" onchange="readURLsapafileedit(this);"');?>
                                <input type="hidden" name="edit-sapafile_txt" id="edit-sapafile_txt">
                                <input type="hidden" id="edit-sapafile_span" name="edit-sapafile_span" />
                                <div id="editsapafileuploaddiv"></div>
                            </fieldset>
                            <div class="col-xs-12 col-lg-12 ">
                                <fieldset>
                                    <?= form_label('Existing approved documents file attached : ','','for="sapa_file"')?>
                                    <a href="" id="sapa_file" target="_blank"></a>
                                </fieldset>
                            </div>
                        </div>
                    </fieldset>
                    <div class="col-xs-12 col-lg-12 col-md-12">
                        <fieldset>
                            <?= form_label('Attached Rehabilitation plan <i>(*.pdf format, maximum size of 50MB)</i>').form_upload('edit-sapamgmtplanfile','','id="edit-sapamgmtplanfile" onchange="readURLsapamgmtplanfileEdit(this);"');?>
                            <input type="hidden" name="edit-sapamgmtplanfile_txt" id="edit-sapamgmtplanfile_txt">
                            <input type="hidden" id="edit-sapamgmtplanfile_span" name="edit-sapamgmtplanfile_span" />
                            <div id="editsapamngmtfileuploaddiv"></div><hr>
                            <div class="col-xs-12 col-lg-12 ">
                                <fieldset>
                                    <?= form_label('Existing Rehabilitation plan file attached :','','for="sapa_mgmtplanfile"')?>
                                    <a href="" id="sapa_mgmtplanfile" target="_blank"></a>
                                </fieldset>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-xs-12 col-lg-12 col-md-12">
                        <fieldset>
                            <?= form_label('Attached CDMP<i>(*.pdf format, maximum size of 50MB)</i>').form_upload('edit-sapacdmpplanfile','','id="edit-sapacdmpplanfile" onchange="readURLsapacdmpplanfileEdit(this);"');?>
                            <input type="hidden" name="edit-sapacdmpplanfile_txt" id="edit-sapacdmpplanfile_txt">
                            <input type="hidden" id="edit-sapacdmpplanfile_span" name="edit-sapacdmpplanfile_span" />
                            <div id="editsapacdmpfileuploaddiv"></div><hr>
                            <div class="col-xs-12 col-lg-12 ">
                                <fieldset>
                                    <?= form_label('Existing CDMP file attached : ','','for="sapa_cdmpplanfile"')?>
                                    <a href="" id="sapa_cdmpplanfile" target="_blank"></a>
                                </fieldset>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-xs-12 col-lg-12 col-md-12">
                        <fieldset>
                            <?= form_label('Attached PAMB Resolution<i>(*.pdf format, maximum size of 50MB)</i>').form_upload('edit-sapapambresofile','','id="edit-sapapambresofile" onchange="readURLsapapambresofileEdit(this);"');?>
                            <input type="hidden" name="edit-sapapambresofile_txt" id="edit-sapapambresofile_txt">
                            <input type="hidden" id="edit-sapapambresofile_span" name="edit-sapapambresofile_span" />
                            <div id="editsapapambfileuploaddiv"></div><hr>
                            <div class="col-xs-12 col-lg-12 ">
                                <fieldset>
                                    <?= form_label('Existing PAMB resolution file attached : ','','for="sapa_pambresofile"')?>
                                    <a href="" id="sapa_pambresofile" target="_blank"></a>
                                </fieldset>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-xs-12 col-lg-12 col-md-12 hidden">
                        <fieldset>
                            <?= form_label('Attached PAMB Clearance<i>(*.pdf format, maximum size of 50MB)</i>').form_upload('edit-sapapambclearancefile','','id="edit-sapapambclearancefile" onchange="readURLsapapambclearancefileEdit(this);"');?>
                            <input type="hidden" name="edit-sapapambclearancefile_txt" id="edit-sapapambclearancefile_txt">
                            <input type="hidden" id="edit-sapapambclearancefile_span" name="edit-sapapambclearancefile_span" />
                            <div id="sapapambclearancefileuploaddivEdit"></div><hr>
                            <div class="col-xs-12 col-lg-12 ">
                                <fieldset>
                                    <?= form_label('Existing PAMB clearance file attached : ','','for="sapa_pambclearancefile"')?>
                                    <a href="" id="sapa_pambclearancefile" target="_blank"></a>
                                </fieldset>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-xs-12 col-lg-12">
                        <fieldset>
                            <label>Upload Shapefile <i>(*.zip  format, maximum size of 200MB)</i></label>
                            <input type='file' name="edit-shp_sapa" id="edit-shp_sapa" onchange="readURLshapefilesapaEdit(this);" />
                            <input type="hidden" name="edit-shp_sapa_txt" id="edit-shp_sapa_txt">
                            <input type="hidden" name="edit-shp_sapa_old" id="edit-shp_sapa_old">
                            <div id="edit-fetch_sapa_shpfile"></div>
                        </fieldset> 
                    </div>
                    <fieldset>
                        <legend>Monitoring Report</legend>
                        <div class="col-xs-12">
                            <ul><li>
                                <?php echo form_label('Details').form_textarea('edit-sapamonitoringtext','','id="edit-sapamonitoringtext"'); ?>
                            </li></ul>
                            <div class="col-xs-12 col-lg-12">
                                <input type='file' name="edit-sapamonitoringupload" id="edit-sapamonitoringupload" onchange="readURLsapamonitoringuploadEdit(this);"  />
                                <input type="hidden" name="edit-old_sapamonitoringupload" id="edit-old_sapamonitoringupload">
                                <span id="edit-sapamonitoringupload_span" class="edit-sapamonitoringupload_span hidden"></span>
                                <div class="col-xs-12 col-lg-12" style="margin-bottom: 10px; ">
                                    <br><a type="text" id="addsapamonitorEdit" class="btn btn-warning">Add to list monitoring report</a>
                                </div>
                                <div id="edit-sapamonitoringuploadDivNew"></div>
                                <div id="edit-sapamonitoringuploadDiv"></div>
                            </div>
                        </div>
                    </fieldset>
                    <div class="col-xs-12 col-lg-12 col-md-12">
                        <ul><li>
                            <?= form_label('Remarks').form_textarea('edit-sapa_remarks','','id="edit-sapa_remarks"') ?>
                        </li></ul>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="modal-footer">
                            <button class="btn btn-info" type="button" onclick="updatetenuresapa();" />Update
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>

<form method="post" action="" id="MOAForm" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-moa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Memorandum of Agreement (MOA)</h4>
                </div>
                <input type="hidden" id="moa-id" name="moa-id" value="" />
                <input type="hidden" id="moa-gencode" name="moa-gencode" />
                <input type="hidden" id="moa-gencode2" name="moa-gencode2" />
                <div class="modal-body" >
                    <fieldset>
                        <div class="col-md-12 col-xs-12 col-lg-12">
                            <div class="col-md-6 col-xs-6 col-lg-6">
                                <ul><li>
                                    <?= form_label('MOA Holders').form_input('edit-moa_proponent','','id="edit-moa_proponent"'); ?>
                                    <span>Department of Energy</span>
                                </li></ul>
                            </div>
                            <div class="col-md-6 col-xs-6 col-lg-6">
                                <ul><li>
                                    <?= form_label('Represented by').form_input('edit-moa_party','','id="edit-moa_party"'); ?>
                                    <span>Represented by (Specify name of reprentative)</span>
                                </li></ul>
                            </div>
                        </div>
                        <div class="col-md-12 col-xs-12 col-lg-12">
                            <div class="col-md-6 col-xs-6 col-lg-6">
                                <fieldset>
                                    <legend style="background-color: transparent;color:#000;font-weight: 700;font-size: 14px">Date of Signing</legend>
                                    <div class="col-xs-12 col-lg-4">
                                        <?= form_dropdown('edit-moa_month',$monthListed,'',' id="edit-moa_month"');?>
                                    </div>
                                     <div class="col-xs-12 col-lg-4">
                                        <?= form_dropdown('edit-moa_day',$dayList,'',' id="edit-moa_day"');?>
                                    </div>
                                     <div class="col-xs-12 col-lg-4">
                                        <?= form_dropdown('edit-moa_year',$yearListed,'',' id="edit-moa_year"');?>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-md-6 col-xs-6 col-lg-6">
                                <fieldset>
                                    <legend style="background-color: transparent;color:#000;font-weight: 700;font-size: 14px">Date of Expiration</legend>
                                    <div class="col-xs-12 col-lg-4">
                                        <?= form_dropdown('edit-moa_exp_month',$monthListed,'',' id="edit-moa_exp_month"');?>
                                    </div>
                                     <div class="col-xs-12 col-lg-4">
                                        <?= form_dropdown('edit-moa_exp_day',$dayList,'',' id="edit-moa_exp_day"');?>
                                    </div>
                                     <div class="col-xs-12 col-lg-4">
                                        <?= form_dropdown('edit-moa_exp_year',$yearduration,'',' id="edit-moa_exp_year"');?>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-md-12 col-xs-12 col-lg-12">
                            <div class="col-md-6 col-xs-6 col-lg-6">
                                <ul><li>
                                    <?= form_label('Purpose').form_input('edit-moa_development','','id="edit-moa_development"'); ?>
                                    <span>Geothermal Production Field</span>
                                </li></ul>
                            </div>
                            <div class="col-md-6 col-xs-6 col-lg-6">
                                <ul><li>
                                    <?= form_label('Location').form_input('edit-moa_location','','id="edit-moa_location"'); ?>
                                    <span>Barangay, Municipality, Province</span>
                                </li></ul>
                            </div>
                        </div>
                        <div class="col-md-12 col-xs-12 col-lg-12">
                            <div class="col-xs-6 col-lg-6 col-md-6">
                                <ul><li>
                                    <?= form_label('Area').form_input('edit-moa_area','','id="edit-moa_area" ') ?>
                                    <span>Area (Hectares)</span>
                                </li></ul>
                            </div>
                            <div class="col-xs-6 col-lg-6 col-md-6">
                                <ul><li>
                                    <?= form_label('Monetary Value').form_input('edit-moa_cost','','id="edit-moa_cost" ') ?>
                                    <span>Project Cost in Peso</span>
                                </li></ul>
                            </div>
                            <div class="col-xs-6 col-lg-6 col-md-6">
                                <ul><li>
                                    <?= form_label('Status').form_dropdown('edit-moa_status',$tenurestatus,'','id="edit-moa_status"') ?>
                                </li></ul>
                            </div>
                        </div>
                    </fieldset>
                    <div class="col-xs-12 col-lg-12 col-md-12">
                        <fieldset>
                            <?= form_label('Attached approved documents<i>(*.pdf format, maximum size of 50MB)</i>').form_upload('edit-moafile','','id="edit-moafile" onchange="readURLmoafileedit(this);"');?>
                            <input type="hidden" name="edit-moafile_txt" id="edit-moafile_txt" />
                            <input type="hidden" id="edit-moafile_span" name="edit-moafile_span" />
                            <div class="col-xs-12">
                                <div id="moadocapproveduploadedit"></div>
                            </div>
                            <div class="col-xs-12 col-lg-12 ">
                                <?= form_label('Existing approved document file : ','','for="moa_file"')?>
                                <a href="" id="moa_file" target="_blank"></a>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-xs-12 col-lg-12 col-md-12">
                        <fieldset>
                            <?= form_label('Attached Project plan<i>(*.pdf format, maximum size of 50MB)</i>').form_upload('edit-moamgmtplanfile','','id="edit-moamgmtplanfile" onchange="readURLmoamgmtplanfileEdit(this);"');?>
                            <input type="hidden" name="edit-moamgmtplanfile_txt" id="edit-moamgmtplanfile_txt" />
                            <input type="hidden" id="edit-moamgmtplanfile_span" name="edit-moamgmtplanfile_span" />
                            <div class="col-xs-12">
                                <div id="moamgmntplanuploadedit"></div>
                            </div>
                            <div class="col-xs-12 col-lg-12 ">
                                <?= form_label('Existing Project plan file : ','','for="moa_mgmtplanfile"')?>
                                <a href="" id="moa_mgmtplanfile" target="_blank"></a>
                            </div>
                    </div>
                    <div class="col-xs-12 col-lg-12 col-md-12">
                        <fieldset>
                            <?= form_label('Attached PAMB Approved<i>(*.pdf format, maximum size of 50MB)</i>').form_upload('edit-moapambapprovefile','','id="edit-moapambapprovefile" onchange="readURLmoapambapprovefileEdit(this);"');?>
                            <input type="hidden" name="edit-moapambapprovefile_txt" id="edit-moapambapprovefile_txt" />
                            <input type="hidden" id="edit-moapambapprovefile_span" name="edit-moapambapprovefile_span" />
                            <div class="col-xs-12">
                                <div id="moapambapproveuploadedit"></div>
                            </div>
                            <div class="col-xs-12 col-lg-12 ">
                                <?= form_label('Existing  PAMB Approved file : ','','for="moa_pambapprovefile"')?>
                                <a href="" id="moa_pambapprovefile" target="_blank"></a>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-xs-12 col-lg-12 col-md-12">
                        <fieldset>
                            <?= form_label('Attached PAMB Resolution<i>(*.pdf format, maximum size of 50MB)</i>').form_upload('edit-moapambresofile','','id="edit-moapambresofile" onchange="readURLmoapambresofileEdit(this);"');?>
                            <input type="hidden" name="edit-moapambresofile_txt" id="edit-moapambresofile_txt" />
                            <input type="hidden" id="edit-moapambresofile_span" name="edit-moapambresofile_span" />
                            <div class="col-xs-12">
                                <div id="moapambresouploadedit"></div>
                            </div>
                            <div class="col-xs-12 col-lg-12 ">
                                <?= form_label('Existing PAMB Resolution file : ','','for="moa_pambresofile"')?>
                                <a href="" id="moa_pambresofile" target="_blank"></a>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-xs-12 col-lg-12 col-md-12 hidden">
                        <fieldset>
                            <?= form_label('Attached PAMB Clearance<i>(*.pdf format, maximum size of 50MB)</i>').form_upload('edit-moapambclearancefile','','id="edit-moapambclearancefile" onchange="readURLmoapambclearancefileEdit(this);"');?>
                            <input type="hidden" name="edit-moapambclearancefile_text" id="edit-moapambclearancefile_text" />
                            <input type="hidden" id="edit-moapambclearancefile_span" name="edit-moapambclearancefile_span" />
                            <div class="col-xs-12">
                                <div id="moapambclearancefileuploaddivEdit"></div>
                            </div>
                            <div class="col-xs-12 col-lg-12 ">
                                <?= form_label('Existing PAMB Clearance file : ','','for="moa_pambclearancefile"')?>
                                <a href="" id="moa_pambclearancefile" target="_blank"></a>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-xs-12 col-lg-12">
                        <fieldset>
                            <label>Upload Shapefile <i>(*.zip  format, maximum size of 200MB)</i></label>
                            <input type='file' name="edit-shp_moa" id="edit-shp_moa" onchange="readURLshapefilemoaEdit(this);" />
                            <input type="hidden" name="edit-shp_moa_txt" id="edit-shp_moa_txt">
                            <input type="hidden" name="edit-shp_moa_old" id="edit-shp_moa_old">
                            <div id="edit-fetch_moa_shpfile"></div>
                        </fieldset> 
                    </div>
                    <fieldset>
                        <legend>Monitoring Report(multiple upload)</legend>
                        <div class="col-xs-12">
                            <ul><li>
                                <?php echo form_label('Details').form_textarea('edit-moamonitoringtext','','id="edit-moamonitoringtext"'); ?>
                            </li></ul>
                            <div class="col-xs-12 col-lg-12">
                                <input type='file' name="edit-moamonitoringuploads" id="edit-moamonitoringuploads" onchange="readURLmoamonitoringuploadEdit(this);" />
                                <input type="hidden" name="edit-old_moamonitoringupload" id="edit-old_moamonitoringupload">
                                <input type="hidden" id="edit-moamonitoringupload_span" name="edit-moamonitoringupload_span" />
                                <div class="col-xs-12 col-lg-12" style="margin-bottom: 10px; ">
                                    <br><a type="text" id="addmoamonitorEdit" class="btn btn-warning">Add to list monitoring report</a>
                                </div>
                                <div id="edit-moamonitoringuploadDivNew"></div>
                                <div id="edit-moamonitoringuploadDiv"></div>
                            </div>
                        </div>
                    </fieldset>
                    <div class="col-xs-12 col-lg-12 col-md-12">
                        <ul><li>
                            <?= form_label('Remarks').form_textarea('edit-moa_remarks','','id="edit-moa_remarks"') ?>
                        </li></ul>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="modal-footer">
                            <button class="btn btn-info" type="button" onclick="updatetenuremoa();" />Update
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>
<form method="post" action="" id="PACBRMAForm" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-pcbrma" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Protected Area Community-Based Resource Management Agreement (PACBRMA)</h4>
                </div>
                <input type="hidden" id="pcbrma-id" name="pcbrma-id" value="" />
                <input type="hidden" id="pcbrma-gencode" name="pcbrma-gencode" value="" />
                <div class="modal-body" >
                    <fieldset>
                        <div class="col-md-12 col-xs-12 col-lg-12">
                            <div class="col-md-6 col-xs-6 col-lg-6">
                                <ul><li>
                                    <?= form_label('PACBRMA No.').form_input('edit-pcbrma_no','','id="edit-pcbrma_no"'); ?>
                                </li></ul>
                            </div>
                            <div class="col-md-6 col-xs-6 col-lg-6">
                                <ul><li>
                                    <?= form_label('Head of Organization').form_input('edit-pcbrma_holder','','id="edit-pcbrma_holder"'); ?>
                                </li></ul>
                            </div>
                        </div>
                        <div class="col-md-12 col-xs-12 col-lg-12">
                            <div class="col-md-12 col-xs-12 col-lg-12">
                                <ul><li>
                                    <?= form_label('Name of PO').form_input('edit-pcbrma_po','','id="edit-pcbrma_po"'); ?>
                                </li></ul>
                            </div>
                            <div class="col-md-6 col-xs-6 col-lg-6 hide">
                                <ul><li>
                                    <?= form_label('Renewable Projects').form_input('edit-pcbrma_devt','','id="edit-pcbrma_devt"'); ?>
                                </li></ul>
                            </div>
                        </div>
                        <div class="col-md-12 col-xs-12 col-lg-12">
                            <div class="col-md-12 col-xs-12 col-lg-12">
                                <ul><li>
                                    <?= form_label('Location').form_input('edit-pcbrma_location','','id="edit-pcbrma_location"'); ?>
                                </li></ul>
                            </div>
                            <div class="col-md-12 col-xs-12 col-lg-12">
                                <ul><li>
                                    <?= form_label('Area (has)').form_input('edit-pcbrma_area','','id="edit-pcbrma_area" class="number-separator"'); ?>
                                </li></ul>
                            </div>
                            <div class="col-md-6 col-xs-3 col-lg-3 hide">
                                <ul><li>
                                    <?= form_label('Project cost').form_input('edit-pcbrma_cost','','id="edit-pcbrma_cost"'); ?>
                                </li></ul>
                            </div>
                        </div>
                        <div class="col-md-12 col-xs-12 col-lg-12">
                            <div class="col-xs-12 col-lg-12 col-md-12">
                                <div class="col-xs-6 col-lg-6 col-md-6">
                                    <ul><li>
                                        <?= form_label('Year start','','for="pcbrma_yearstart"').form_dropdown('edit-pcbrma_yearstart',$yearListed,'',' id="edit-pcbrma_yearstart"');?>
                                    </li></ul>
                                </div>
                                 <div class="col-xs-6 col-lg-6 col-md-6">
                                    <ul><li>
                                        <?= form_label('Year end','','for="pcbrma_yearend"').form_dropdown('edit-pcbrma_yearend',$yearduration,'',' id="edit-pcbrma_yearend"');?>
                                    </li></ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-xs-12 col-lg-12">
                            <fieldset>
                                <?= form_label('Attached approved documents<i>(*.pdf format, maximum size of 50MB)</i>').form_upload('edit-approvedocs','','id="edit-approvedocs" onchange="readURLtenurefileedit(this);" ');?>
                                <input type="hidden" name="edit-pacbrmafile_txt" id="edit-pacbrmafile_txt">
                                <input type="hidden" id="edit-approveodcs_span" name="edit-approveodcs_span" />
                                <div id="pacbrmamemberuploadfileEdit"></div>
                            </fieldset>
                        </div>
                        <div class="col-md-12 col-xs-12 col-lg-12">
                            <ul><li>
                                <?= form_label('Current file attached','','for="pcbrma_file"')?>
                                <a href="" id="pcbrma_file" target="_blank"></a>
                            </li></ul>
                        </div>
                        <div class="col-md-12 col-xs-12 col-lg-12">
                            <ul><li>
                                <?= form_label('Status').form_dropdown('edit-pcbrma_status',$status_mngmtplan,'','id="edit-pcbrma_status"') ?>
                            </li></ul>
                        </div>
                           <fieldset>
                               <legend style="background-color: transparent;color:#000;font-weight: 700;font-size: 14px">PACBRMA Member</legend>
                                <div class="col-md-12 col-xs-12 col-lg-12">
                                   <div class="col-xs-4 col-lg-4 col-md-4">
                                        <ul><li>
                                            <?= form_label('Total number of male').form_input('edit-pcbrma_member_male','','id="edit-pcbrma_member_male"  class="number-separator" onblur="calc_pcbrmamemberedit();"')?>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-4 col-lg-4">
                                        <ul><li>
                                            <?= form_label('Total number of female').form_input('edit-pcbrma_member_female','','id="edit-pcbrma_member_female"  class="number-separator" onblur="calc_pcbrmamemberedit();"') ?>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-4 col-lg-4">
                                        <ul><li>
                                            <?= form_label('Total number member').form_input('edit-pcbrma_member','','id="edit-pcbrma_member"  readonly="readonly"') ?>
                                        </li></ul>
                                    </div>
                                </div>
                                <div class="col-md-12 col-xs-12 col-lg-12">
                                    <fieldset>
                                        <?= form_label('Upload list of PACBRMA members<i>(*.xlsx, *.xls, *.csv, *.pdf format, maximum size of 50MB)</i>').form_upload('edit-pcbrmamember','','id="edit-pcbrmamember" onchange="readURLpcbrmamemberedit(this);"');?>
                                        <input type="hidden" name="edit-approvepcbrmamember_txt" id="edit-approvpcbrmamember_txt">
                                        <input type="hidden" id="edit-pcbrmamember_span" name="edit-pcbrmamember_span" />
                                        <div id="pacbrmaapprovedocsuploadfileEdit"></div>
                                    </fieldset>
                                </div>
                                <div class="col-md-12 col-xs-12 col-lg-12">
                                    <ul><li>
                                        <?= form_label('Current file attached','','for="edit-pcbrmamember_file"')?>
                                        <a href="" id="edit-pcbrmamember_file" target="_blank"></a>
                                    </li></ul>
                                </div>
                                <div class="col-xs-12 col-lg-12 col-md-12 hidden">
                                    <fieldset>
                                        <?= form_label('Attached PAMB Clearance<i>(*.pdf format, maximum size of 50MB)</i>').form_upload('edit-pacbrmapambclearancefile','','id="edit-pacbrmapambclearancefile" onchange="readURLpacbrmapambclearancefileEdit(this);"');?>
                                        <input type="hidden" name="edit-pacbrmapambclearancefile_text" id="edit-pacbrmapambclearancefile_text" />
                                        <input type="hidden" id="edit-pacbrmapambclearancefile_span" name="edit-pacbrmapambclearancefile_span" />
                                        <div class="col-xs-12">
                                            <div id="pacbrmapambclearancefileuploaddivEdit"></div>
                                        </div>
                                        <div class="col-xs-12 col-lg-12 ">
                                            <?= form_label('Existing PAMB Clearance file : ','','for="pacbrmapambclearancefile"')?>
                                            <a href="" id="pacbrma_pambclearancefile" target="_blank"></a>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-xs-12 col-lg-12">
                                    <fieldset>
                                        <label>Upload Shapefile <i>(*.zip  format, maximum size of 200MB)</i></label>
                                        <input type='file' name="edit-shp_pacbrma" id="edit-shp_pacbrma" onchange="readURLshapefilepacbrmaEdit(this);" />
                                        <input type="hidden" name="edit-shp_pacbrma_txt" id="edit-shp_pacbrma_txt">
                                        <input type="hidden" name="edit-shp_pacbrma_old" id="edit-shp_pacbrma_old">
                                        <div id="edit-fetch_pacbrma_shpfile"></div>
                                    </fieldset> 
                                </div>
                           </fieldset>
                            <div class="col-xs-12 col-lg-12 col-md-12">
                                <ul><li>
                                    <?= form_label('Remarks').form_textarea('edit-pcbrma_remarks','','id="edit-pcbrma_remarks"') ?>
                                </li></ul>
                            </div>
                    </fieldset>
                    <div class="col-xs-12 ">
                        <div class="modal-footer">
                            <button class="btn btn-info" type="button" onclick="updatetenurepcbrma();" />Update
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>
<form method="post" action="" id="CMRPForm" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-crmp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Add Community Resource Management Plan (CRMP)</h4>
                </div>
                <input type="hidden" id="crmp-id" name="crmp-id" value="" />
                <input type="hidden" id="crmp-gencode" name="crmp-gencode" value="" />
                <div class="modal-body" >
                    <fieldset>
                    <div class="col-xs-12">
                       <fieldset>
                               <?= form_label('CRMP approved document <i>(PDF format, maximum size of 50MB)</i>','','for="crmpfile"')?>
                               <input type='file' name="crmpfile" id="crmpfile" onchange="readURLtenurecdmpfile(this);" />
                               <input type="hidden" name="old_crmpfile" id="old_crmpfile">
                               <div id="crmpfileuploadfile"></div>
                       </fieldset>
                    </div>
                    <div class="col-md-12 col-xs-12 col-lg-12">
                        <ul><li>
                            <?= form_label('Activity').form_textarea('crmp_activity','','id="crmp_activity"'); ?>
                        </li></ul>
                    </div>
                    <div class="col-md-12 col-xs-12 col-lg-12">
                        <div class="col-md-6 col-xs-6 col-lg-6">
                            <ul><li>
                                <?= form_label('Area of Development').form_input('crmp_areadevt','','id="crmp_areadevt" class="number-separator"') ?>
                            </li></ul>
                        </div>
                        <div class="col-md-6 col-xs-6 col-lg-6">
                            <ul><li>
                                <?= form_label('Cost of Activity').form_input('crmp_cost','','id="crmp_cost" class="number-separator"') ?>
                            </li></ul>
                        </div>
                    </div>
                    </fieldset>
                    <fieldset class="hidden">
                        <legend>Coordinates</legend>
                        <div class="col-md-12 col-xs-12 col-lg-12">
                            <div class="col-md-6 col-xs-6 col-lg-6">
                                <ul><li>
                                    <?= form_label('Longitude').form_input('crmp_x_coor','','id="crmp_x_coor"') ?>
                                </li></ul>
                            </div>
                            <div class="col-md-6 col-xs-6 col-lg-6">
                                <ul><li>
                                    <?= form_label('Latitude').form_input('crmp_y_coor','','id="crmp_y_coor"') ?>
                                </li></ul>
                            </div>
                        </div>
                    </fieldset>
                    <div class="col-md-12 col-xs-12 col-lg-12">
                        <ul><li>
                            <?= form_label('Output of activity').form_textarea('crmp_output','','id="crmp_output"'); ?>
                        </li></ul>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="modal-footer">
                            <!-- <button class="btn btn-info" type="button" onclick="updatetenuremoa();" />Add -->
                            <!-- <a type="text" id="addcrmp" class="btn btn-primary">Add data</a> -->
                            <a type="text" class="btn btn-primary" id="addimage" onclick="insertcrmpfile()">Add data</a>
                        </div>
                    </div>
                    <div class="col-md-12 col-xs-12 col-lg-12">
                        <table id="tablecrmpactivity" class="table table-bordered tglobal">
                            <thead>
                                <tr>
                                    <th colspan="4" style="text-align: center; font-size: 24px">Existing Activities</th>
                                </tr>
                                <tr>
                                    <th rowspan="2">Activity</th>
                                    <th rowspan="2">Outputs</th>
                                    <th rowspan="2">Attached file</th>
                                    <th rowspan="2"></th>
                                </tr>

                            </thead>
                            <tbody id="tbodyactivitycrmp"></tbody>
                        </table>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>
<form method="post" action="" id="CMRPActivityForm" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-crmpactivity" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit CRMP Activity</h4>
                </div>
                <input type="hidden" id="crmpactivity-id" name="crmpactivity-id" value="" />
                <input type="hidden" id="crmpactivity-gencode" name="crmpactivity-gencode" value="" />
                <input type="hidden" id="crmpactivity-id_pcbrma" name="crmpactivity-id_pcbrma" value="" />
                <div class="modal-body" >
                    <fieldset>
                    <div class="col-md-12 col-xs-12 col-lg-12">
                        <div class="col-xs-12 col-lg-12 ">
                            <fieldset>
                               <?= form_label('CRMP approved document','','for="edit-crmpfile"')?>
                               <input type='file' name="edit-crmpfile" id="edit-crmpfile" onchange="readURLtenurecdmpfileEdit(this);" />
                               <input type="hidden" name="edit-old_crmpfile" id="edit-old_crmpfile">
                               <input type="hidden" name="edit-newcrmpfileupload" id="edit-newcrmpfileupload">
                               <div id="crmpfileuploadfileEdit"></div>
                               <?= form_label('Current file attached','','"')?>
                                <a href="" id="linksscrmp" target="_blank"></a>
                            </fieldset>
                        </div>
                    </div>
                    <div class="col-md-12 col-xs-12 col-lg-12">
                        <ul><li>
                            <?= form_label('Activity').form_textarea('edit-crmp_activity','','id="edit-crmp_activity"'); ?>
                        </li></ul>
                    </div>
                    <div class="col-md-12 col-xs-12 col-lg-12">
                        <div class="col-md-6 col-xs-6 col-lg-6">
                            <ul><li>
                                <?= form_label('Area of Development').form_input('edit-crmp_areadevt','','id="edit-crmp_areadevt" class="number-separator"') ?>
                            </li></ul>
                        </div>
                        <div class="col-md-6 col-xs-6 col-lg-6">
                            <ul><li>
                                <?= form_label('Cost of Activity').form_input('edit-crmp_cost','','id="edit-crmp_cost" class="number-separator"') ?>
                            </li></ul>
                        </div>
                    </div>
                    </fieldset>
                    <fieldset class="hidden">
                        <legend>Coordinates</legend>
                        <div class="col-md-12 col-xs-12 col-lg-12">
                            <div class="col-md-6 col-xs-6 col-lg-6">
                                <ul><li>
                                    <?= form_label('Longitude Coordinates').form_input('edit-crmp_x_coor','','id="edit-crmp_x_coor"') ?>
                                </li></ul>
                            </div>
                            <div class="col-md-6 col-xs-6 col-lg-6">
                                <ul><li>
                                    <?= form_label('Latitude Coordinates').form_input('edit-crmp_y_coor','','id="edit-crmp_y_coor"') ?>
                                </li></ul>
                            </div>
                        </div>
                    </fieldset>
                    <div class="col-md-12 col-xs-12 col-lg-12">
                        <ul><li>
                            <?= form_label('Output of activity').form_textarea('edit-crmp_output','','id="edit-crmp_output"'); ?>
                        </li></ul>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="modal-footer">
                            <button class="btn btn-info" type="button" onclick="updatetenurecrmpactivity();" />Update
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>
