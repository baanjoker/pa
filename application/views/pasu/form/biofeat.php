<div class="form-style-6">
        <h2>BIOLOGICAL FEATURES </h2>                            
    </div>  
<div class="col-xs-12">
    <div class="tab" id="tabhabeco">
      <a class="tablinkEcon active" onclick="tabEcon(event, 'fformation')" id="defaultOpen">Forest Formation</a>
      <a class="tablinkEcon" id="loadvegetative" onclick="tabEcon(event, 'Vegetative')">Vegetative Cover</a>
      <a class="tablinkEcon" id="loadinwet" onclick="tabEcon(event, 'inland')">Inland/Human-made Wetland</a>
      <a class="tablinkEcon" id="loadcaves" onclick="tabEcon(event, 'cave')">Caves</a>
      <a class="tablinkEcon" onclick="tabEcon(event, 'mariner')" id="coastalc">Coastal/Marine</a>
      <a class="tablinkEcon" id="biospecfauna" onclick="tabEcon(event, 'biospecies')">Flora and Fauna</a>                                  
    </div>
</div>
<div class="col-md-12 col-xs-12 col-lg-12">
    <div id="fformation" class="tabcontentEcon" style="display: block;">
        <fieldset>
            <legend>Forest Formation</legend>
            <div class="col-xs-12">                                        
                <div class="col-xs-12 col-lg-6">   
                    <div id="fetch_images_forestform"></div>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="col-xs-12 col-lg-12">
                    <fieldset>
                        <label>Upload map image of forest formation <i>(*.png, *.jpeg, *.jpg format, maximum size of 50MB)</i></label>
                        <input type='file' name="img_ffmap" id="img_ffmap" />
                        <input type="hidden" name="old_picture" value="nophoto.jpg"> 
                        <span id="img_ffmapspan" class="img_ffmapspan hidden">nophoto.jpg</span>
                    </fieldset>
                </div> 
            </div>
            <div class="col-xs-12"> 
                <div class="col-xs-12 col-lg-6">
                    <fieldset>
                        <label>Upload Shapefile of forest formation<i>(*.rar, *.zip format, maximum size of 200MB)</i></label>
                        <input type='file' name="forestformation_shpfile" id="forestformation_shpfile" />
                        <input type="hidden" name="forestformation_shpfile_text"> 
                        <div id="forestformation_shpfile_div"></div>
                    </fieldset>
                </div>
            </div> 
            <div class="col-xs-12 col-lg-12"> 
                <hr>
                <div class="col-xs-12 col-lg-6 tooltip">
                    <ul><li>
                        <?php echo form_label('Types of Forest formation','','for="forest_formation"').form_dropdown('forest_formation',$fftype,'','id="forest_formation"')?>
                        <span class="tooltiptext">Forest formation follows on the forest classification by Fernando et al. (2008) based on elevation, soil, locality, soil water, and dominant species</span>
                    </li></ul>  
                </div>  
                <div class="col-xs-12 col-lg-6 tooltip">
                    <ul><li>
                        <?php echo form_label('Area','','for="forest_formation_area"').form_input('forest_formation_area','','placeholder="Area" id="forest_formation_area" class="number-separator"'); ?>
                        <span class="tooltiptext">Area (has)</span>
                    </li></ul>
                </div>
                <div class="col-xs-12 col-lg-12 tooltip">
                    <ul><li>
                        <?php echo form_label('Remarks','','for="forest_formation_remarks"').form_textarea('forest_formation_remarks','','placeholder="Brief description" id="forest_formation_remarks"'); ?>
                    </li></ul>
                </div>
                <div class="col-xs-12 col-lg-12">
                    <a type="text" class="btn btn-primary" id="addForestForm">Add data</a>
                </div>
            </div>  
                <div class="col-xs-12 col-lg-12">
                    <div class="table-responsive">
                        <br><table id="tblforestform" class="content-table">
                            <thead>
                                <tr>
                                    <th colspan="4" style="text-align: center; font-size: 24px">Forest Formation</th>
                                </tr>
                                <tr>
                                    <th>Forest Formation</th>                                                        
                                    <th>Area(has)</th> 
                                    <th>Remarks</th> 
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="tbodyforestform"></tbody>
                        </table>
                        <table id="tblforestform_sample" class="content-table">
                            <tbody id="tbodyforestform_sample"></tbody>
                        </table>
                    </div>
                </div>                                
            </fieldset>
        </div>
    <!-- </div> -->
    <div id="Vegetative" class="tabcontentEcon">      
        <fieldset>
            <legend>Vegetative Cover</legend>
            <div class="col-xs-12 ">
                <div class="col-xs-12">                                        
                    <div class="col-xs-12 col-lg-5">                                        
                        <div id="fetch_images_vegetative"></div>
                    </div>
                </div>
                <div class="col-xs-12 col-lg-12">
                    <fieldset>
                        <label>Upload map image of vegetative cover <i>(*.png, *.jpeg, *.jpg format, maximum size of 50MB)</i></label>
                        <input type='file' name="img_vegetative" id="img_vegetative" multiple="" />
                        <input type="hidden" name="old_picture" value="nophoto.jpg"> 
                        <span id="img_vegetativespan" class="img_vegetativespan hide">nophoto.jpg</span>
                    </fieldset>
                </div>
                <div class="col-xs-12"> 
                    <div class="col-xs-12 col-lg-12">
                        <fieldset>
                            <label>Upload Shapefile of vegetative cover<i>(*.rar, *.zip format, maximum size of 200MB)</i></label>
                            <input type='file' name="vegetative_shpfile" id="vegetative_shpfile" />
                            <input type="hidden" name="vegetative_shpfile_text"> 
                            <div id="vegetative_shpfile_div"></div>
                        </fieldset>
                    </div>
                </div> 
            </div>
            <div class="col-xs-12 ">
                <div class="col-xs-12 col-lg-12 tooltip" style="margin-top:30px">
                    <ul><li>                    
                        <?php echo form_label('Land Cover Type','','for="vegetative"').form_dropdown('vegetative',$landcover,'','placeholder="Eg. Forestland, A&D, etc." id="vegetative"'); ?>
                        <span class="tooltiptext">Land cover type is based on the mapping of land cover by the National Mapping and Resource Information Authority</span>
                    </li></ul> 
                </div>
                <div class="col-xs-12 col-lg-6 tooltip">
                    <ul><li>                    
                        <?php echo form_label('Area','','for="vegetative_area"').form_input('vegetative_area','','id="vegetative_area" class="number-separator"') ?>
                        <span class="tooltiptext">Area (has)</span>
                    </li></ul> 
                </div>
                <div class="col-xs-12 col-lg-12 tooltip">
                    <ul><li>                    
                        <?php echo form_label('Remarks','','for="vegetative_remarks"').form_textarea('vegetative_remarks','','id="vegetative_remarks"') ?>
                        <span class="tooltiptext">Brief description</span>
                    </li></ul> 
                </div>
                <div class="col-xs-12 col-lg-12">
                    <a type="text" class="btn btn-primary" id="addimageVegetative">Add data</a>
                </div>   
                <div class="col-xs-12 col-lg-12">
                    <div class="table-responsive">
                        <br><table id="tblvegetative" class="content-table">
                            <thead>
                                <tr>
                                    <th colspan="4" style="text-align: center; font-size: 24px">Vegetative cover</th>
                                </tr>
                                <tr>
                                    <th>Land Cover</th> 
                                    <th>Area(has)</th> 
                                    <th>Remarks</th> 
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="tbodyvegetative"></tbody>
                        </table>
                        <table id="tblvegetative_sample" class="content-table">                                    
                            <tbody id="tbodyvegetative_sample"></tbody>
                        </table>
                    </div>
                </div>                                                    
            </div>                           
        </fieldset>         
    </div>   
    <div id="inland" class="tabcontentEcon">
        <div class="col-xs-12">
            <div class="tab-second">
              <a class="tablinkinland active" onclick="tabinland(event, 'inlandnatural')">Natural Wetland</a>
              <a class="tablinkinland" id="loadhumaninwet" onclick="tabinland(event, 'inlandhumanmade')">Human-made Wetland</a>                     
            </div>
        </div>
        <div id="inlandnatural" class="tabcontentinland" style="display: block;">
            <fieldset>
                <legend>Natural Wetland</legend>
                <div class="col-xs-12 col-lg-12 col-sm-12">
                    <fieldset>
                        <legend style="background-color: transparent;color: black;font-weight: 700">Displays all natural wetlands within the protected area</legend>
                        <div class="col-xs-12">                                        
                            <div class="col-xs-12 col-lg-12 ">                                        
                                <div id="fetch_images_iw"></div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="col-xs-12 col-lg-12 tooltip">
                                <fieldset>
                                    <label>Upload map image of natural wetland<i>(*.png, *.jpeg, *.jpg format, maximum size of 50MB)</i></label>
                                    <input type='file' name="img_iwmap" id="img_iwmap"/>
                                    <input type="hidden" name="old_picture" value="nophoto.jpg"> 
                                    <span id="img_iwmapspan" class="img_iwmapspan hidden">nophoto.jpg</span>
                                    <span class="tooltiptext">Resources map of the PA (ridge-to-reef, if applicable)</span>
                                </fieldset>
                            </div>                        
                        </div>
                    </fieldset>
                </div>
                <div class="col-xs-12 col-lg-12 col-sm-12">
                    <fieldset>
                        <legend style="background-color: transparent;color: black;font-weight: 700">Individual map image</legend>
                            <!-- <img id="blahinland" src="<?php echo base_url("bmb_assets2/upload/iwimg/nophoto.jpg") ?>" alt="your image" class="upload-btn-wrapper" /> -->
                            <div class="col-xs-12">                                        
                                <div class="col-xs-12 col-lg-12">                                        
                                    <div id="fetch_inland_pics"></div>
                                </div>
                            </div>
                            <br>
                            <div class="tooltip">
                                <fieldset>
                                    <label>Upload map images of natural wetland<i>(*.png, *.jpeg, *.jpg format, maximum size of 50MB)</i></label>
                                    <input type='file' name="pic_inlandimg" id="pic_inlandimg" />
                                    <input type="hidden" name="old_pictureinland" value="nophoto.jpg">
                                    <span id="img_inlandspan" class="img_inlandspan"></span>
                                    <span class="tooltiptext">Individual map of wetlands within the PA</span>
                                </fieldset>
                            </div>
                    </fieldset>                  
                    <fieldset>
                        <div class="col-xs-12 col-lg-12 tooltip">
                            <label>Upload Shapefile of natural wetland<i>(*.zip  format, maximum size of 50MB)</i></label>
                            <input type='file' name="zip_shpfile_inland" id="zip_shpfile_inland" onchange="readURLshapefileiw(this);" />
                            <input type="hidden" name="shpzip_iw_text" id="shpzip_iw_text">
                            <div id="fetch_iw_shpfile"></div>
                            <span class="tooltiptext">Total wet area of wetland; for rivers, streams and creeks, polyline shall be used</span>
                        </div>
                    </fieldset> 
                </div>
                <div class="col-xs-12">
                    <hr>
                    <div class="col-xs-12 col-lg-12 tooltip">
                        <ul><li>
                            <?= form_label('Wetland site name').form_input('iwname','','placeholder="Site name" id="iwname"') ?>
                            <span class="tooltiptext">Input wetland site name</span>
                        </li></ul>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="col-xs-6 col-lg-6 tooltip">
                        <ul><li>
                            <?php echo form_label('Province','','for="iwprovid"').form_dropdown('iwprovid',$provinceList,'',' id="iwprovid"') ?>
                            <div class="iwmunicipal_error"></div>
                            <span class="tooltiptext">Select province</span>
                        </li></ul>
                    </div>
                    <div class="col-xs-6 col-lg-6 tooltip">
                        <ul><li>
                            <?php echo form_label('Municipality','','for="iwmunid"').form_dropdown('iwmunid','','',' id="iwmunid"') ?>
                            <span class="tooltiptext">Select municipality</span>
                        </li></ul>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="col-xs-6 col-lg-6 tooltip">
                        <ul><li>
                            <?= form_label('Approximate area (has)','','for="iwarea"').form_input('iwarea','','placeholder="hectares" class="number-separator"  id="iwarea"'); ?>
                            <span class="tooltiptext">Maximum wet area of the wetland during wet season</span>
                        </li></ul>
                    </div>
                    <div class="col-xs-6 col-lg-6 tooltip">
                        <ul><li>
                            <?= form_label('Wetland type','','for="iwtype"').form_dropdown('iwtype',$iwtype,'',' id="iwtype"'); ?>
                            <span class="tooltiptext">The categories listed herein are intended to provide aid on the rapid identification of the main wetland habitats represented at each site.</span>
                        </li></ul>
                    </div>
                </div>
                <div class="col-xs-12">
                    <fieldset><legend style="background-color: transparent;color: #444; font-weight: 700;font-size: 14px;">Water Classification</legend>
                        <div class="col-xs-6 tooltip"> 
                            <ul><li>
                                <?php echo form_label('&nbsp;').form_dropdown('inlandwaterbodyclass',$waterclass,'','id="inlandwaterbodyclass"') ?>
                                <span class="tooltiptext">Freshwater classification based on water quality to identify beneficial use of wetland</span>
                            </li></ul>
                        </div>
                        <div class="col-xs-6 tooltip"> 
                            <ul><li>
                                <?php echo form_label('&nbsp;').form_dropdown('inlandwaterbodyclassSub','','','id="inlandwaterbodyclassSub"') ?>
                                <span class="tooltiptext">Freshwater classification based on water quality to identify beneficial use of wetland</span>
                            </li></ul>
                        </div> 
                    </fieldset>
                </div>
                <div class="col-xs-12">
                    <div class="col-xs-6 col-lg-6 tooltip">
                        <ul><li>
                            <?= form_label('Year assessed', '','for="iwassessed"').form_dropdown('iwassessed', $yearListed,'','id="iwassessed"'); ?>
                            <span class="tooltiptext">Select year assessed wetland site</span>
                        </li></ul>
                    </div>
                </div>  
                <div class="col-xs-12 hide">
                    <fieldset>
                        <legend>Coordinates</legend>
                            <div class="col-xs-4 col-lg-4">
                                <ul><li>
                                <?= form_label('Longitude', '','for="iwlong"').form_input('iwlong', '', 'placeholder="Coordinates(Longitude)" id="iwlong"'); ?>
                                </li></ul>
                            </div>
                            <div class="col-xs-4 col-lg-4">
                                <ul><li>
                                <?= form_label('Latitude', '','for="iwlat"').form_input('iwlat', '', 'placeholder="Coordinates(Latitude)" id="iwlat"'); ?>
                                </li></ul>
                            </div>                            
                    </fieldset>
                </div>
                <fieldset>
                    <legend style="background-color: transparent;color: #000; font-weight: 700;font-size: 14px;">Centroid for Geographic Location</legend>
                        <div class="col-xs-12">
                            <div class="col-xs-12 col-lg-12">
                                <table class="content-table">                                          
                                    <tbody>
                                        <tr>
                                            <td>Longitude</td>
                                            <td width="">
                                                <table class="content-table">
                                                    <tbody>
                                                        <tr>
                                                            <td>Decimal Degree</td><td colspan="2"><ul><li><?= form_input('iwddlongoutput','','id="iwddlongoutput"')?></li></ul></td>
                                                            <td class="hidden"><?php echo form_button('en','Conver to DMS','class="ddtodmsDecimal Degree"') ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <ul><li>                                                            
                                                                    <?= form_label('Direction','for=""').form_dropdown('iw_longitude_dms_direction',$direct_long,'',' id="iw_longitude_dms_direction"'); ?>
                                                                </li></ul>
                                                                </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Degree (°)','for="iw_longitude_dms_degrees"').form_input('iw_longitude_dms_degrees','','id="iw_longitude_dms_degrees" class="dmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Minute (ˈ)','for="iw_longitude_dms_minutes"').form_input('iw_longitude_dms_minutes','','id="iw_longitude_dms_minutes" class="dmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Second (")','for="iw_longitude_dms_seconds"').form_input('iw_longitude_dms_seconds','','id="iw_longitude_dms_seconds" class="dmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                        </tr>
                                                        
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Latitude</td>
                                            <td width="">
                                                <table class="content-table">
                                                    <tbody>
                                                        <tr>
                                                            <td>Decimal Degree</td><td colspan="2"><ul><li><?= form_input('iwddlatoutput','','id="iwddlatoutput"') ?></li></ul></td>
                                                            <td class="hidden"><?php echo form_button('en','Conver to DMS','class="ddtodmsDecimal Degree2"') ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <ul><li>
                                                                   <?= form_label('Direction','for=""').form_dropdown('iw_latitude_dms_direction',$direct_lat,'',' id="iw_latitude_dms_direction"'); ?>
                                                                </li></ul>
                                                                </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Degree (°)','for="iw_latitude_dms_degrees"').form_input('iw_latitude_dms_degrees','','id="iw_latitude_dms_degrees" class="dmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Minute (ˈ)','for="iw_latitude_dms_minutes"').form_input('iw_latitude_dms_minutes','','id="iw_latitude_dms_minutes" class="dmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Second (")','for="iw_latitude_dms_seconds"').form_input('iw_latitude_dms_seconds','','id="iw_latitude_dms_seconds" class="dmstodd"') ?>
                                                                </li></ul>
                                                            </td>
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
                <div class="col-xs-12">
                    <fieldset>
                        <legend style="background-color: transparent;color: #000; font-weight: 700;font-size: 14px;">Centroid (Longitude and Latitude)</legend>
                        <p><i>For rivers/creek provide three (3) coordinates taken from the upstream, midstream and downstream of the river main channel</i></p>
                        <div class="col-xs-12 col-lg-12">
                                <table class="content-table"> 
                                <thead>
                                    <tr>
                                        <td colspan="5" style="font-weight: 700; font-size: 14px">Upstream Coordinates</td>
                                    </tr>
                                </thead>                                         
                                    <tbody>
                                        <tr>
                                            <td>Longitude</td>
                                            <td width="">
                                                <table class="content-table">
                                                    <tbody>
                                                        <tr>
                                                            <td>Decimal Degree</td><td colspan="2"><ul><li><?= form_input('upstreamddlongoutput','','id="upstreamddlongoutput"')?></li></ul></td>
                                                            <td class="hidden"><?php echo form_button('en','Enable/Disable','class="upstreamDecimal Degree"') ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <ul><li>                                                            
                                                                    <?= form_label('Direction','for=""').form_dropdown('upstream_longitude_dms_direction',$direct_long,'',' id="upstream_longitude_dms_direction"'); ?>
                                                                </li></ul>
                                                                </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Degree (°)','for="upstream_longitude_dms_degrees"').form_input('upstream_longitude_dms_degrees','','id="upstream_longitude_dms_degrees" class="dmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Minute (ˈ)','for="upstream_longitude_dms_minutes"').form_input('upstream_longitude_dms_minutes','','id="upstream_longitude_dms_minutes" class="dmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Second (")','for="upstream_longitude_dms_seconds"').form_input('upstream_longitude_dms_seconds','','id="upstream_longitude_dms_seconds" class="dmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                        </tr>                                                        
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Latitude</td>
                                            <td width="">
                                                <table class="content-table">
                                                    <tbody>
                                                        <tr>
                                                            <td>Decimal Degree</td><td colspan="2"><ul><li><?= form_input('upstreamddlatoutput','','id="upstreamddlatoutput"') ?></li></ul></td>
                                                            <td class="hidden"><?php echo form_button('en','Enable/Disable','class="upstreamDecimal Degrees"') ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <ul><li>
                                                                   <?= form_label('Direction','for=""').form_dropdown('upstream_latitude_dms_direction',$direct_lat,'',' id="upstream_latitude_dms_direction"'); ?>
                                                                </li></ul>
                                                                </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Degree (°)','for="upstream_latitude_dms_degrees"').form_input('upstream_latitude_dms_degrees','','id="upstream_latitude_dms_degrees" class="dmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Minute (ˈ)','for="upstream_latitude_dms_minutes"').form_input('upstream_latitude_dms_minutes','','id="upstream_latitude_dms_minutes" class="dmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Second (")','for="upstream_latitude_dms_seconds"').form_input('upstream_latitude_dms_seconds','','id="upstream_latitude_dms_seconds" class="dmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                        </tr>                                                        
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>                                                
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-xs-12 col-lg-12">
                                <table class="content-table"> 
                                <thead>
                                    <tr>
                                        <td colspan="5" style="font-weight: 700; font-size: 14px">Midstream Coordinates</td>
                                    </tr>
                                </thead>                                         
                                    <tbody>
                                        <tr>
                                            <td>Longitude</td>
                                            <td width="">
                                                <table class="content-table">
                                                    <tbody>
                                                        <tr>
                                                            <td>Decimal Degree</td><td colspan="2"><ul><li><?= form_input('midstreamddlongoutput','','id="midstreamddlongoutput"')?></li></ul></td>
                                                            <td class="hidden"><?php echo form_button('en','Enable/Disable','class="midstreamDecimal Degree"') ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <ul><li>                                                            
                                                                    <?= form_label('Direction','for=""').form_dropdown('midstream_longitude_dms_direction',$direct_long,'',' id="midstream_longitude_dms_direction"'); ?>
                                                                </li></ul>
                                                                </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Degree (°)','for="midstream_longitude_dms_degrees"').form_input('midstream_longitude_dms_degrees','','id="midstream_longitude_dms_degrees" class="dmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Minute (ˈ)','for="midstream_longitude_dms_minutes"').form_input('midstream_longitude_dms_minutes','','id="midstream_longitude_dms_minutes" class="dmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Second (")','for="midstream_longitude_dms_seconds"').form_input('midstream_longitude_dms_seconds','','id="midstream_longitude_dms_seconds" class="dmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                        </tr>                                                        
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Latitude</td>
                                            <td width="">
                                                <table class="content-table">
                                                    <tbody>
                                                        <tr>
                                                            <td>Decimal Degree</td><td colspan="2"><ul><li><?= form_input('midstreamddlatoutput','','id="midstreamddlatoutput"') ?></li></ul></td>
                                                            <td class="hidden"><?php echo form_button('en','Enable/Disable','class="midstreamDecimal Degrees"') ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <ul><li>
                                                                   <?= form_label('Direction','for=""').form_dropdown('midstream_latitude_dms_direction',$direct_lat,'',' id="midstream_latitude_dms_direction"'); ?>
                                                                </li></ul>
                                                                </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Degree (°)','for="midstream_latitude_dms_degrees"').form_input('midstream_latitude_dms_degrees','','id="midstream_latitude_dms_degrees" class="dmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Minute (ˈ)','for="midstream_latitude_dms_minutes"').form_input('midstream_latitude_dms_minutes','','id="midstream_latitude_dms_minutes" class="dmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Second (")','for="midstream_latitude_dms_seconds"').form_input('midstream_latitude_dms_seconds','','id="midstream_latitude_dms_seconds" class="dmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                        </tr>                                                        
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>                                                
                                    </tbody>
                                </table>
                            </div>    
                            <div class="col-xs-12 col-lg-12">
                                <table class="content-table"> 
                                <thead>
                                    <tr>
                                        <td colspan="5" style="font-weight: 700; font-size: 14px">Downstream Coordinates</td>
                                    </tr>
                                </thead>                                         
                                    <tbody>
                                        <tr>
                                            <td>Longitude</td>
                                            <td width="">
                                                <table class="content-table">
                                                    <tbody>                                                        
                                                        <tr>
                                                            <td>Decimal Degree</td><td colspan="2"><ul><li><?= form_input('downstreamddlongoutput','','id="downstreamddlongoutput"')?></li></ul></td>
                                                            <td class="hidden"><?php echo form_button('en','Enable/Disable','class="downstreamDecimal Degree"') ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <ul><li>                                                            
                                                                    <?= form_label('Direction','for=""').form_dropdown('downstream_longitude_dms_direction',$direct_long,'',' id="downstream_longitude_dms_direction"'); ?>
                                                                </li></ul>
                                                                </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Degree (°)','for="downstream_longitude_dms_degrees"').form_input('downstream_longitude_dms_degrees','','id="downstream_longitude_dms_degrees" class="dmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Minute (ˈ)','for="downstream_longitude_dms_minutes"').form_input('downstream_longitude_dms_minutes','','id="downstream_longitude_dms_minutes" class="dmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Second (")','for="downstream_longitude_dms_seconds"').form_input('downstream_longitude_dms_seconds','','id="downstream_longitude_dms_seconds" class="dmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Latitude</td>
                                            <td width="">
                                                <table class="content-table">
                                                    <tbody>
                                                        <tr>
                                                            <td>Decimal Degree</td><td colspan="2"><ul><li><?= form_input('downstreamddlatoutput','','id="downstreamddlatoutput"') ?></li></ul></td>
                                                            <td class="hidden"><?php echo form_button('en','Enable/Disable','class="downstreamDecimal Degrees"') ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <ul><li>
                                                                   <?= form_label('Direction','for=""').form_dropdown('downstream_latitude_dms_direction',$direct_lat,'',' id="downstream_latitude_dms_direction"'); ?>
                                                                </li></ul>
                                                                </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Degree (°)','for="downstream_latitude_dms_degrees"').form_input('downstream_latitude_dms_degrees','','id="downstream_latitude_dms_degrees" class="dmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Minute (ˈ)','for="downstream_latitude_dms_minutes"').form_input('downstream_latitude_dms_minutes','','id="downstream_latitude_dms_minutes" class="dmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Second (")','for="downstream_latitude_dms_seconds"').form_input('downstream_latitude_dms_seconds','','id="downstream_latitude_dms_seconds" class="dmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                        </tr>                                                        
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>                                                
                                    </tbody>
                                </table>
                            </div>                                   
                    </fieldset>
                </div>
                <div class="col-xs-12">
                    <div class="col-xs-12 col-lg-12 tooltip">
                        <fieldset>
                            <legend style="background-color: transparent;color: #000; font-weight: 700;font-size: 14px;">Description</legend>
                            <?php echo form_textarea('iw_desc','','id="iw_desc"'); ?>
                            <span class="tooltiptext">Mention whether assessed, date assessed, whether with managment plan, whether with separate management body, if not PAMB; Conservation measures e.g. within Asian Waterfowl Census Site, Ramsar SIte, EAAFP site etc.</span>
                        </fieldset>
                    </div>
                </div>
                <div class="col-xs-12 ">
                    <a type="text" class="btn btn-primary" id="addiwP">Add data</a>
                </div>
                <div class="col-xs-12 "><br>
                    <table id="tbliw_sample" class="content-table">
                        <tbody id="tbodyiw_sample" style="text-align: left;border: 0 none;"></tbody>
                    </table>
                    <div class="content-table" style="overflow-x:auto;">
                        <table id="tbliw" class="content-table" style="z-index: 100">
                            <thead>
                                <tr>
                                    <th colspan="8" style="text-align: center; font-size: 24px">Inland Wetland</th>
                                </tr>                         
                            </thead>
                            <tbody id="tbodyiw"></tbody>
                        </table>                                                
                    </div>
                </div>
            </fieldset>
        </div>   
        <div id="inlandhumanmade" class="tabcontentinland" style="display: none">
            <fieldset>
                <legend>Human-made Wetland</legend>
                <div class="col-xs-12 col-lg-12 col-sm-12">
                    <fieldset>
                        <legend style="background-color: transparent;color: black;font-weight: 700">Displays all human-made wetland within the protected area</legend>
                        <div class="col-xs-12">                                        
                            <div class="col-xs-12 col-lg-12 ">                                        
                                <div id="fetch_images_hiw"></div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="col-xs-12 col-lg-12 tooltip">
                                <fieldset>
                                    <label>Upload map images of human-made wetland<i>(*.png, *.jpeg, *.jpg format, maximum size of 50MB)</i></label>
                                    <input type='file' name="img_hiwmap" id="img_hiwmap"/>
                                    <input type="hidden" name="hold_picture" value="nophoto.jpg"> 
                                    <span id="img_hiwmapspan" class="img_hiwmapspan hidden">nophoto.jpg</span>
                                    <span class="tooltiptext">Resources map of the PA</span>
                                </fieldset>
                            </div>                        
                        </div>
                    </fieldset>
                </div>
                <div class="col-xs-12 col-lg-12 col-sm-12">
                    <fieldset>
                        <legend style="background-color: transparent;color: black;font-weight: 700">Individual Map Image</legend>
                            <div class="col-xs-12">                                        
                                <div class="col-xs-12 col-lg-12">                                        
                                    <div id="fetch_humaninland_pics"></div>
                                </div>
                            </div>
                            <br>
                            <div class="tooltip">
                                <fieldset>
                                    <label>Upload map images of human-made wetland<i>(*.png, *.jpeg, *.jpg format, maximum size of 50MB)</i></label>
                                    <input type='file' name="pic_hinlandimg" id="pic_hinlandimg"/>
                                    <input type="hidden" name="old_pictureinland" value="nophoto.jpg">
                                    <span id="img_hinlandspan" class="img_hinlandspan"></span>
                                    <span class="tooltiptext">Individual map of wetlands wihtin the PA</span>
                                </fieldset>
                            </div>
                    </fieldset>
                    <fieldset>
                        <legend style="background-color: transparent;color: black;font-weight: 700">Upload Shapefile of human-made wetland<i>(note: zip and rar file; and maximum of 200mb only)</i></legend>
                        <div class="tooltip">
                            <input type='file' name="zip_shpfile_hinland" id="zip_shpfile_hinland" onchange="readURLhumanmadeinlandSHP(this);"  />
                            <span id="shpzip_hiw" class="shpzip_hiw hidden"></span><br>
                            <input type="hidden" name="old_shpfilehinland">
                            <span class="tooltiptext">Total wet area of wetland; for rivers, streams and creeks, polyline shall be used</span>
                        </div>
                    </fieldset>
                </div>
                <div class="col-xs-12">
                    <hr>
                    <div class="col-xs-12 col-lg-12 tooltip">
                        <ul><li>
                            <?= form_label('Wetland site name').form_input('hiwname','','placeholder="Site name" id="hiwname"') ?>
                            <span class="tooltiptext">Input human-made wetland site name</span>
                        </li></ul>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="col-xs-6 col-lg-6 tooltip">
                        <ul><li>
                            <?php echo form_label('Province','','for="hiwprovid"').form_dropdown('hiwprovid',$provinceList,'',' id="hiwprovid"') ?>
                            <span class="tooltiptext">Select province</span>
                            <div class="hiwmunicipal_error"></div>
                        </li></ul>
                    </div>
                    <div class="col-xs-6 col-lg-6 tooltip">
                        <ul><li>
                            <?php echo form_label('Municipality','','for="hiwmunid"').form_dropdown('hiwmunid','','',' id="hiwmunid"') ?>
                            <span class="tooltiptext">Select municipality</span>
                        </li></ul>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="col-xs-6 col-lg-6 tooltip">
                        <ul><li>
                            <?= form_label('Approximate area (has)','','for="hiwarea"').form_input('hiwarea','','placeholder="hectares"  id="hiwarea"'); ?>
                            <span class="tooltiptext">Maximum wet area of the wetland during wet season</span>
                        </li></ul>
                    </div>
                    <div class="col-xs-6 col-lg-6 tooltip">
                        <ul><li>
                            <?= form_label('Human-made Wetland type','','for="hiwtype"').form_dropdown('hiwtype',$hmwetland,'',' id="hiwtype"'); ?>
                            <span class="tooltiptext">The categories listed herein are intended to provide aid on the rapid identification of the main wetland habitats represented at each site.</span>
                        </li></ul>
                    </div>
                </div>
                <div class="col-xs-12">  
                    <fieldset><legend style="background-color: transparent;color: #444; font-weight: 700;font-size: 14px;">Water Classification</legend>
                        <div class="col-xs-6 tooltip"> 
                            <ul><li>
                                <?php echo form_label('&nbsp;').form_dropdown('hinlandwaterbodyclass',$waterclass,'','id="hinlandwaterbodyclass"') ?>
                                <span class="tooltiptext">Freshwater classification based on water quality to identify beneficial use of wetland</span>
                            </li></ul>
                        </div>
                        <div class="col-xs-6 tooltip"> 
                            <ul><li>
                                <?php echo form_label('&nbsp;').form_dropdown('hinlandwaterbodyclassSub','','','id="hinlandwaterbodyclassSub"') ?>
                                <span class="tooltiptext">Freshwater classification based on water quality to identify beneficial use of wetland</span>
                            </li></ul>
                        </div> 
                    </fieldset>
                </div>
                <div class="col-xs-12">                
                    <div class="col-xs-6 col-lg-6 tooltip">
                        <ul><li>
                            <?= form_label('Year assessed', '','for="hiwassessed"').form_dropdown('hiwassessed', $yearListed,'',' id="hiwassessed"'); ?>
                            <span class="tooltiptext">Select year assessed human-made wetland site</span>
                        </li></ul>
                    </div>
                </div>  
                <div class="col-xs-12 hide">
                    <fieldset>
                        <legend>Coordinates</legend>
                            <div class="col-xs-4 col-lg-4">
                                <ul><li>
                                <?= form_label('Longitude', '','for="hiwlong"').form_input('hiwlong', '', 'placeholder="Coordinates(Longitude)" id="hiwlong"'); ?>
                                </li></ul>
                            </div>
                            <div class="col-xs-4 col-lg-4">
                                <ul><li>
                                <?= form_label('Latitude', '','for="hiwlat"').form_input('hiwlat', '', 'placeholder="Coordinates(Latitude)" id="hiwlat"'); ?>
                                </li></ul>
                            </div>                            
                    </fieldset>
                </div>
                <fieldset>
                    <legend style="background-color: transparent;color: #000; font-weight: 700;font-size: 14px;">Centroid for Geographic Location</legend>
                        <div class="col-xs-12">
                            <div class="col-xs-12 col-lg-12">
                                <table class="content-table">                                          
                                    <tbody>
                                        <tr>
                                            <td>Longitude</td>
                                            <td width="">
                                                <table class="content-table">
                                                    <tbody>
                                                        <tr>
                                                            <td>Decimal Degree</td><td colspan="2"><ul><li><?= form_input('hiwddlongoutput','','id="hiwddlongoutput"')?></li></ul></td>
                                                            <td class="hidden"><?php echo form_button('en','Enable/Disable','class="hiwendis"') ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <ul><li>                                                            
                                                                    <?= form_label('Direction','for=""').form_dropdown('hiw_longitude_dms_direction',$direct_long,'',' id="hiw_longitude_dms_direction"'); ?>
                                                                </li></ul>
                                                                </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Degree (°)','for="hiw_longitude_dms_degrees"').form_input('hiw_longitude_dms_degrees','','id="hiw_longitude_dms_degrees" class="dmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Minute (ˈ)','for="hiw_longitude_dms_minutes"').form_input('hiw_longitude_dms_minutes','','id="hiw_longitude_dms_minutes" class="dmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Second (")','for="hiw_longitude_dms_seconds"').form_input('hiw_longitude_dms_seconds','','id="hiw_longitude_dms_seconds" class="dmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                        </tr>                                                        
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Latitude</td>
                                            <td width="">
                                                <table class="content-table">
                                                    <tbody>
                                                        <tr>
                                                            <td>Decimal Degree</td><td colspan="2"><ul><li><?= form_input('hiwddlatoutput','','id="hiwddlatoutput"') ?></li></ul></td>
                                                            <td class="hidden"><?php echo form_button('en','Enable/Disable','class="hiwendiss"') ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <ul><li>
                                                                   <?= form_label('Direction','for=""').form_dropdown('hiw_latitude_dms_direction',$direct_lat,'',' id="hiw_latitude_dms_direction"'); ?>
                                                                </li></ul>
                                                                </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Degree (°)','for="hiw_latitude_dms_degrees"').form_input('hiw_latitude_dms_degrees','','id="hiw_latitude_dms_degrees" class="dmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Minute (ˈ)','for="hiw_latitude_dms_minutes"').form_input('hiw_latitude_dms_minutes','','id="hiw_latitude_dms_minutes" class="dmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Second (")','for="hiw_latitude_dms_seconds"').form_input('hiw_latitude_dms_seconds','','id="hiw_latitude_dms_seconds" class="dmstodd"') ?>
                                                                </li></ul>
                                                            </td>
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
                <div class="col-xs-12">
                    <fieldset>
                        <legend style="background-color: transparent;color: #000; font-weight: 700;font-size: 14px;">Centroid (Longitude and Latitude)</legend>
                        <p><i>For rivers/creek provide three (3) coordinates taken from the upstream, midstream and downstream of the river main channel</i></p>
                        <div class="col-xs-12 col-lg-12">
                                <table class="content-table"> 
                                <thead>
                                    <tr>
                                        <td colspan="5" style="font-weight: 700; font-size: 14px">Upstream Coordinates</td>
                                    </tr>
                                </thead>                                         
                                    <tbody>
                                        <tr>
                                            <td>Longitude</td>
                                            <td width="">
                                                <table class="content-table">
                                                    <tbody>
                                                        <tr>
                                                            <td>Decimal Degree</td><td colspan="2"><ul><li><?= form_input('hupstreamddlongoutput','','id="hupstreamddlongoutput"')?></li></ul></td>
                                                            <td class="hidden"><?php echo form_button('en','Enable/Disable','class="hupstreamDecimal Degree"') ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <ul><li>                                                            
                                                                    <?= form_label('Direction','for=""').form_dropdown('hupstream_longitude_dms_direction',$direct_long,'',' id="hupstream_longitude_dms_direction"'); ?>
                                                                </li></ul>
                                                                </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Degree (°)','for="hupstream_longitude_dms_degrees"').form_input('hupstream_longitude_dms_degrees','','id="hupstream_longitude_dms_degrees" class="dmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Minute (ˈ)','for="hupstream_longitude_dms_minutes"').form_input('hupstream_longitude_dms_minutes','','id="hupstream_longitude_dms_minutes" class="dmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Second (")','for="hupstream_longitude_dms_seconds"').form_input('hupstream_longitude_dms_seconds','','id="hupstream_longitude_dms_seconds" class="dmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                        </tr>                                                        
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Latitude</td>
                                            <td width="">
                                                <table class="content-table">
                                                    <tbody>
                                                        <tr>
                                                            <td>Decimal Degree</td><td colspan="2"><ul><li><?= form_input('hupstreamddlatoutput','','id="hupstreamddlatoutput"') ?></li></ul></td>
                                                            <td class="hidden"><?php echo form_button('en','Enable/Disable','class="hupstreamDecimal Degrees"') ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <ul><li>
                                                                   <?= form_label('Direction','for=""').form_dropdown('hupstream_latitude_dms_direction',$direct_lat,'',' id="hupstream_latitude_dms_direction"'); ?>
                                                                </li></ul>
                                                                </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Degree (°)','for="hupstream_latitude_dms_degrees"').form_input('hupstream_latitude_dms_degrees','','id="hupstream_latitude_dms_degrees" class="dmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Minute (ˈ)','for="hupstream_latitude_dms_minutes"').form_input('hupstream_latitude_dms_minutes','','id="hupstream_latitude_dms_minutes" class="dmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Second (")','for="hupstream_latitude_dms_seconds"').form_input('hupstream_latitude_dms_seconds','','id="hupstream_latitude_dms_seconds" class="dmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                        </tr>                                                        
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>                                                
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-xs-12 col-lg-12">
                                <table class="content-table"> 
                                <thead>
                                    <tr>
                                        <td colspan="5" style="font-weight: 700; font-size: 14px">Midstream Coordinates</td>
                                    </tr>
                                </thead>                                         
                                    <tbody>
                                        <tr>
                                            <td>Longitude</td>
                                            <td width="">
                                                <table class="content-table">
                                                    <tbody>
                                                        <tr>
                                                            <td>Decimal Degree</td><td colspan="2"><ul><li><?= form_input('hmidstreamddlongoutput','','id="hmidstreamddlongoutput"')?></li></ul></td>
                                                            <td class="hidden"><?php echo form_button('en','Enable/Disable','class="hmidstreamDecimal Degree"') ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <ul><li>                                                            
                                                                    <?= form_label('Direction','for=""').form_dropdown('hmidstream_longitude_dms_direction',$direct_long,'',' id="hmidstream_longitude_dms_direction"'); ?>
                                                                </li></ul>
                                                                </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Degree (°)','for="hmidstream_longitude_dms_degrees"').form_input('hmidstream_longitude_dms_degrees','','id="hmidstream_longitude_dms_degrees" class="dmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Minute (ˈ)','for="hmidstream_longitude_dms_minutes"').form_input('hmidstream_longitude_dms_minutes','','id="hmidstream_longitude_dms_minutes" class="dmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Second (")','for="hmidstream_longitude_dms_seconds"').form_input('hmidstream_longitude_dms_seconds','','id="hmidstream_longitude_dms_seconds" class="dmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                        </tr>                                                        
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Latitude</td>
                                            <td width="">
                                                <table class="content-table">
                                                    <tbody>
                                                        <tr>
                                                            <td>Decimal Degree</td><td colspan="2"><ul><li><?= form_input('hmidstreamddlatoutput','','id="hmidstreamddlatoutput"') ?></li></ul></td>
                                                            <td class="hidden"><?php echo form_button('en','Enable/Disable','class="hmidstreamDecimal Degrees"') ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <ul><li>
                                                                   <?= form_label('Direction','for=""').form_dropdown('hmidstream_latitude_dms_direction',$direct_lat,'',' id="hmidstream_latitude_dms_direction"'); ?>
                                                                </li></ul>
                                                                </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Degree (°)','for="hmidstream_latitude_dms_degrees"').form_input('hmidstream_latitude_dms_degrees','','id="hmidstream_latitude_dms_degrees" class="dmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Minute (ˈ)','for="hmidstream_latitude_dms_minutes"').form_input('hmidstream_latitude_dms_minutes','','id="hmidstream_latitude_dms_minutes" class="dmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Second (")','for="hmidstream_latitude_dms_seconds"').form_input('hmidstream_latitude_dms_seconds','','id="hmidstream_latitude_dms_seconds" class="dmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                        </tr>                                                        
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>                                                
                                    </tbody>
                                </table>
                            </div>    
                            <div class="col-xs-12 col-lg-12">
                                <table class="content-table"> 
                                <thead>
                                    <tr>
                                        <td colspan="5" style="font-weight: 700; font-size: 14px">Downstream Coordinates</td>
                                    </tr>
                                </thead>                                         
                                    <tbody>
                                        <tr>
                                            <td>Longitude</td>
                                            <td width="">
                                                <table class="content-table">
                                                    <tbody>
                                                        <tr>
                                                            <td>Decimal Degree</td><td colspan="2"><ul><li><?= form_input('hdownstreamddlongoutput','','id="hdownstreamddlongoutput"')?></li></ul></td>
                                                            <td class="hidden"><?php echo form_button('en','Enable/Disable','class="hdownstreamDecimal Degree"') ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <ul><li>                                                            
                                                                    <?= form_label('Direction','for=""').form_dropdown('hdownstream_longitude_dms_direction',$direct_long,'',' id="hdownstream_longitude_dms_direction"'); ?>
                                                                </li></ul>
                                                                </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Degree (°)','for="hdownstream_longitude_dms_degrees"').form_input('hdownstream_longitude_dms_degrees','','id="hdownstream_longitude_dms_degrees" class="dmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Minute (ˈ)','for="hdownstream_longitude_dms_minutes"').form_input('hdownstream_longitude_dms_minutes','','id="hdownstream_longitude_dms_minutes" class="dmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Second (")','for="hdownstream_longitude_dms_seconds"').form_input('hdownstream_longitude_dms_seconds','','id="hdownstream_longitude_dms_seconds" class="dmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                        </tr>                                                        
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Latitude</td>
                                            <td width="">
                                                <table class="content-table">
                                                    <tbody>
                                                        <tr>
                                                            <td>Decimal Degree</td><td colspan="2"><ul><li><?= form_input('hdownstreamddlatoutput','','id="hdownstreamddlatoutput"') ?></li></ul></td>
                                                            <td class="hidden"><?php echo form_button('en','Enable/Disable','class="hdownstreamDecimal Degrees"') ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <ul><li>
                                                                   <?= form_label('Direction','for=""').form_dropdown('hdownstream_latitude_dms_direction',$direct_lat,'',' id="hdownstream_latitude_dms_direction"'); ?>
                                                                </li></ul>
                                                                </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Degree (°)','for="hdownstream_latitude_dms_degrees"').form_input('hdownstream_latitude_dms_degrees','','id="hdownstream_latitude_dms_degrees" class="dmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Minute (ˈ)','for="hdownstream_latitude_dms_minutes"').form_input('hdownstream_latitude_dms_minutes','','id="hdownstream_latitude_dms_minutes" class="dmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Second (")','for="hdownstream_latitude_dms_seconds"').form_input('hdownstream_latitude_dms_seconds','','id="hdownstream_latitude_dms_seconds" class="dmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                        </tr>                                                        
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>                                                
                                    </tbody>
                                </table>
                            </div>                                   
                    </fieldset>
                </div>
                <div class="col-xs-12">
                    <div class="col-xs-12 col-lg-12 tooltip">
                        <fieldset>
                            <legend style="background-color: transparent;color: #000; font-weight: 700;font-size: 14px;">Description</legend>
                            <?php echo form_textarea('hiw_desc','','id="hiw_desc"'); ?>
                            <span class="tooltiptext">Mention whether assessed, date assessed, whether with managment plan, whether with separate management body, if not PAMB; Conservation measures e.g. within Asian Waterfowl Census Site, Ramsar SIte, EAAFP site etc.</span>
                        </fieldset>
                    </div>
                </div>
                <div class="col-xs-12 ">
                    <a type="text" class="btn btn-primary" id="haddhiwP">Add data</a>
                </div>
                <div class="col-xs-12 "><br>
                    <table id="tblhiw_sample" class="content-table">
                        <tbody id="tbodyhiw_sample" style="text-align: left;border: 0 none;"></tbody>
                    </table>
                    <div class="content-table" style="overflow-x:auto;">
                        <table id="tblhiw" class="content-table" style="z-index: 100">
                            <thead>
                                <tr>
                                    <th colspan="8" style="text-align: center; font-size: 24px">Human-made Wetland</th>
                                </tr>                        
                            </thead>
                            <tbody id="tbodyhiw"></tbody>
                        </table>                                                
                    </div>
                </div>
            </fieldset>
        </div>                                     
    </div>
    <div id="cave" class="tabcontentEcon">
        <input type="hidden" name="cavegenerator" id="cavegenerator">
        <fieldset>
            <legend>Caves</legend>
            <div class="col-xs-12">                                        
                <div class="col-xs-12 col-lg-5 ">                                        
                    <div id="fetch_images_cave"></div>
                </div>
            </div>
            <div class="col-xs-12 col-lg-12 tooltip">
                <fieldset>
                    <label>Upload cave map image <i>(*.png, *.jpeg, *.jpg format, maximum size of 50MB)</i></label>
                    <input type='file' name="img_cavemap" id="img_cavemap"/><br>
                    <input type="hidden" name="old_picture" value="nophoto.jpg"> 
                    <span id="img_cavemapspan" class="img_cavemapspan hidden">nophoto.jpg</span>
                    <span class="tooltiptext">Plan and profile view of the cave map in either portrait or landscape view depending on the bearings collected during survey</span>
                </fieldset>
            </div>                        
            <div class="col-xs-12 tooltip">
                <fieldset>
                    <legend style="background-color: transparent;color: black;font-weight: 700">Upload cave shapefile <i>(note: zip and rar file; and maximum of 200mb only)</i></legend>
                    <input type='file' name="zip_shpfile_cave" id="zip_shpfile_cave" onchange="readURLcavesSHP(this);"  />
                    <input type="hidden" name="old_shpfilecave" id="old_shpfilecave">
                    <span class="tooltiptext">Pin point locaiton of cave; upload the shapefile of the whole extent of the cave if available</span>
                </fieldset>
            </div>
            <div class="col-xs-12">
                <hr>
                <div class="col-xs-12 col-lg-6 tooltip">
                    <ul><li>
                        <?= form_label('Cave name', '','for="cave_name"').form_input('cave_name', '', 'placeholder="Name of Cave" id="cave_name"'); ?>
                        <span class="tooltiptext">Input Cave name</span>
                    </li></ul>
                </div> 
                <div class="col-xs-12 col-lg-6 tooltip">
                    <ul><li>
                        <?= form_label('Size of the area (Surveyed length)','','for="caves_area"').form_input('caves_area','','placeholder="Meters" class="number-separator" id="caves_area"'); ?>
                        <span class="tooltiptext">Total surveyed length during the cave assessment</span>
                    </li></ul>
                </div> 
            </div>
            <div class="col-xs-12">
                <div class="col-xs-12 col-lg-4 tooltip">
                    <ul><li>
                        <?php echo form_label('Province','','for="caveprovid"').form_dropdown('caveprovid',$provinceList,'',' id="caveprovid"') ?>
                        <div class="cavemunicipal_error"></div>
                        <span class="tooltiptext">Select province</span>
                    </li></ul>
                </div>
                <div class="col-xs-12 col-lg-4 tooltip">
                    <ul><li>
                        <?php echo form_label('Municipality','','for="cavemunid"').form_dropdown('cavemunid','','',' id="cavemunid"') ?>
                        <div class="cavebarangay_error"></div>
                        <span class="tooltiptext">Select municipality</span>
                    </li></ul>
                </div>
                <div class="col-xs-12 col-lg-4 tooltip">
                    <ul><li>
                        <?php echo form_label('Barangay','','for="cavebarid"').form_dropdown('cavebarid','','',' id="cavebarid"') ?>
                        <span class="tooltiptext">Select barangay</span>
                        <!-- <div class="cavebarangay_error"></div> -->
                    </li></ul>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="col-xs-12 col-lg-4 tooltip">
                    <ul><li>
                        <?php echo form_label('Status','','for="cavestatus"').form_dropdown('cavestatus',$cavestatus,'',' id="cavestatus"') ?>
                        <span class="tooltiptext">Select whether the cave is identified, assessed or classified.</span>
                    </li></ul>
                </div>
            </div>
            <fieldset>
            <legend style="background-color: transparent;color: #000; font-weight: 700;font-size: 14px;">Coordinates of the cave entrance (point location)</legend>
            <div class="col-xs-12">
                <div class="col-xs-12 col-lg-12">
                    <table class="content-table">                                          
                        <tbody>
                            <tr>
                                <td>Longitude</td>
                                <td width="">
                                    <table class="content-table">
                                        <tbody>
                                            <tr>
                                                <td>Decimal Degree</td><td colspan="2"><ul><li><?= form_input('clongoutputdd','','id="clongoutputdd"')?></li></ul></td>
                                                <td class="hidden"><?php echo form_button('en','Enable/Disable','class="clongen"') ?></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <ul><li>                                                            
                                                        <?= form_label('Direction','for=""').form_dropdown('clongdmsdir',$direct_long,'',' id="clongdmsdir"'); ?>
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
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>Latitude</td>
                                <td width="">
                                    <table class="content-table">
                                        <tbody>
                                            <tr>
                                                <td>Decimal Degree</td><td colspan="2"><ul><li><?= form_input('clatoutputdd','','id="clatoutputdd"') ?></li></ul></td>
                                                <td class="hidden"><?php echo form_button('en','Enable/Disable','class="claten"') ?></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <ul><li>
                                                       <?= form_label('Direction','for=""').form_dropdown('clatdmsdir',$direct_lat,'',' id="clatdmsdir"'); ?>
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
                                        </tbody>
                                    </table>
                                </td>
                            </tr>                                                
                        </tbody>
                    </table>
                </div>                                    
            </div>
            </fieldset> 
            <div class="col-xs-12">
                <fieldset>
                    <legend>Cave Classification</legend>
                    <div class="col-xs-12">
                        <div class="col-xs-6 col-lg-6 tooltip">
                            <ul><li>
                            <?= form_label('Classification', '','for="caveclass"').form_dropdown('caveclass',$cave_landstat,'',' id="caveclass"'); ?>
                            <span class="tooltiptext">Clasification based on the results of the cave assessment that would identify allowable activities inside the cave.</span>
                            </li></ul>
                        </div>
                        <div class="col-xs-6 col-lg-6 tooltip">
                            <ul><li>
                            <?= form_label('Sub Classification', '','for="cavesubclass"').form_dropdown('cavesubclass','','',' id="cavesubclass"'); ?>
                            <span class="tooltiptext">Further classfication for Class I Caves based on the presence of geological formations, archaeological values, paleontological values,  threatened species and/or etremely hazardous conditions inside the cave.</span>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="col-xs-12 col-lg-12">
                            <ul><li>
                                <label for="caveclassinfo">Cave classification details</label><textarea id="caveclassinfo" name="caveclassinfo" readonly="readonly"></textarea> 
                            </li></ul>
                        </div>  
                        <div class="col-xs-6 col-lg-6" id="cave_others">
                            <ul><li>
                            <?= form_label('Specify Others', '','for="cave_landstat_others"').form_input('cave_landstat_others', '', 'placeholder="Specify others" id="cave_landstat_others"'); ?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-12 col-md-12">
                        <!-- <ul><li> -->
                            <!-- <input type="file" name="files_species" id="files_species" multiple /> -->
                            <label>Upload multiple cave images <i>(*.png, *.jpeg, *.jpg format, maximum size of 50MB)</i></label>
                            <input type="file" name="files_caves" id="files_caves" multiple />
                        <!-- </li></ul> -->
                        <div id="uploaded_images_caves"></div>
                    </div>
                </fieldset>
            </div>
            <div class="col-xs-12 ">
                <a type="text" class="btn btn-primary" id="addCavesP">Add data</a>
            </div>
            <div class="col-xs-12 "><br>
                <table id="tblcaves_sample" class="content-table">
                    <tbody id="tbodycaves_sample" style="text-align: left;border: 0 none;"></tbody>
                </table>
                <div class="content-table" style="overflow-x:auto;">
                    <table id="tblcaves" class="content-table" style="z-index: 100">
                        <thead>
                            <tr>
                                <th colspan="8" style="text-align: center; font-size: 24px">Cave</th>
                            </tr>
                            <tr class="text-nowrap">
                                <th rowspan="3">Cave Name</th>
                                <th rowspan="3">Area (Meters)</th>
                                <th rowspan="3">Location <br>(Province, Municipality, Barangay)</th>
                                <th colspan="2">Coordinates</th>  
                                <th rowspan="3">Cave Classification</th>
                                <th rowspan="3">Status</th>
                                <th rowspan="3">Action</th>                                             
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
        <div class="tab-second" id="tabhabecosub">
            <a class="tablinkmarine active" onclick="tabmarine(event, 'marinecoralsv2')">Coral Reefs</a>
            <a class="tablinkmarine" onclick="tabmarine(event, 'seagrass2')" id="seagrassclick">Seagrass Beds</a>
            <a class="tablinkmarine" onclick="tabmarine(event, 'mangrove')" id="mangroveclick">Mangrove Forests</a>
            <a class="tablinkmarine" onclick="tabmarine(event, 'fishspecies')" id="fishclick">Fish</a>
        </div>
        <div id="marinecoralsv2" class="tabcontentmarine" style="display: block;"> 
            <input type="hidden" name="genCoral" id="genCoral" value="<?php echo generateRandomStringCoastal(); ?>"/>
            <div id="corald" class="tabcontentmarinecoral" style="display: block;"> 
                <div class="col-xs-12">                                        
                    <div class="col-xs-12 col-lg-12">    
                        <div id="fetch_images_coral"></div>
                    </div>
                    <div class="col-xs-12 col-lg-12 tooltip">  
                        <fieldset>
                            <label>Upload map images of coral reefs<i>(*.png, *.jpeg, *.jpg format, maximum size of 50MB)</i></label>
                            <input type='file' name="img_coralmap" id="img_coralmap"/>
                            <input type="hidden" name="img_coralmaps" id="img_coralmaps">
                            <span class="tooltiptext">"Map showing the whole area of corals within the PA layout in A3 paper size (tabloid size),  with additional map elements:<br>- Map Title<br>- Point location of the assessment sites, with label for reference<br>- Map location (inset)<br>- Legend"</span>
                        </fieldset>
                    </div>
                </div>
                <fieldset>
                    <div class="col-xs-12 col-lg-12 tooltip">
                        <fieldset>
                            <label>Upload Shapefile of coral reefs<i>(*.zip  format, maximum size of 50MB)</i></label>
                            <input type='file' name="shp_corals" id="shp_corals" onchange="readURLshapefileCoral(this);" />
                            <input type="hidden" name="shp_corals_txt" id="shp_corals_txt">
                            <div id="fetch_coral_shpfile"></div>
                            <span class="tooltiptext">Shapefile of uploaded individual map image</span>
                        </fieldset>
                    </div>
                </fieldset>  
                <div class="col-xs-12 col-lg-12">        
                <fieldset>
                    <legend>Coral Reefs</legend> 
                    <div class="col-xs-12">                                        
                        <div class="col-xs-12 col-lg-12">    
                            <div id="fetch_images_coral_indi"></div>
                        </div>
                        <div class="col-xs-12 col-lg-12 tooltip">
                            <fieldset>
                                <label>Upload individual map image of coral reefs<i>(*.png, *.jpeg, *.jpg format, maximum size of 50MB)</i></label>                                
                                <input type='file' name="img_coralmap_indi" id="img_coralmap_indi"/><br>
                                <input type="hidden" name="img_coralmaps_indi" id="img_coralmaps_indi"> 
                                <span class="tooltiptext">Map showing the assessment area conducted, with additional map elements:<br>
                                - Map Title<br>
                                - Location in text (Region, Province, Mun, and Barangay if necessary)<br>
                                - Location Map (inset)<br>
                                - Citation/Sources of Information for reference, e.g. Prepared by:;Approved by:<br>
                                - table for the geolocation (latlong) of the assessment sites. </span>
                            </fieldset>
                        </div>
                    </div>                               
                    <div class="col-xs-12 col-lg-12 tooltip">
                        <ul><li>
                            <?= form_label('Total Coverage(ha.)','for="coral_ha"').form_input('coral_ha','',' id="coral_ha" class="number-separator"') ?>
                            <span class="tooltiptext">Total area of the coral cover present in the NIPAS MPA</span>
                        </li></ul>
                    </div>
                    <div class="col-xs-12 col-lg-12">                    
                        <div class="col-xs-12 col-lg-6 tooltip">                    
                            <ul><li>
                                <?= form_label('% Hard Coral Cover or HCC','for="hcc_value"').form_input('hcc_value','',' id="hcc_value" class="number-separator"') ?>
                                <span class="tooltiptext">Percent value of the hard coral cover assessed in the area</span>
                                <span class="">TB no.2019-04 Licuanan et. al. 2017.</span>
                            </li></ul>
                        </div>
                        <div class="col-xs-12 col-lg-6 tooltip">                    
                            <ul><li>
                                <?= form_label('HCC Category','for="coral_condition"').form_dropdown('coral_condition',$hcccondition,'','id="coral_condition"') ?>
                                <span class="tooltiptext">Corresponding category of the percent Hard coral cover for the assessed area</span>
                                <span class="">TB no.2019-04 Licuanan et. al. 2017.</span>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-12">                    
                        <div class="col-xs-12 col-lg-6 tooltip"> 
                            <ul><li>
                                <?= form_label('No. of Taxonomic Amalgation Units (TAUs)','for="taus_value"').form_input('taus_value','',' id="taus_value" class="number-separator"') ?>
                                <span class="tooltiptext">Identified number of Taxonomic Amalgation Units (TAUs)</span>
                                <span class="">TB no.2019-04 Licuanan et. al. 2019.</span>
                            </li></ul>
                        </div>
                        <div class="col-xs-12 col-lg-6 tooltip"> 
                            <ul><li>
                                <?= form_label('Diversity Category','for="taus_category"').form_dropdown('taus_category',$tauscategory,'','id="taus_category"') ?>
                                <span class="tooltiptext">Corresponding category for the value of TAUs in the assessed area b ased on the scales of Licuanan, et. al</span>
                                <span class="">TB no.2019-04 Licuanan et. al. 2019</span>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-12 tooltip">
                        <div class="col-xs-12 col-lg-4">
                            <ul><li>
                                <?= form_label('Date conducted').form_dropdown('coral_conducted_month',$monthList,'','id="coral_conducted_month"'); ?>
                            </li></ul>
                        </div>
                         <div class="col-xs-12 col-lg-4">
                            <ul><li>
                                <?= form_label('&nbsp;').form_dropdown('coral_conducted_day',$dayList,'','id="coral_conducted_day"'); ?>
                            </li></ul>
                        </div>
                         <div class="col-xs-12 col-lg-4">
                            <ul><li>
                                <?= form_label('&nbsp;').form_dropdown('coral_conducted_year',$yearList,'','id="coral_conducted_year"'); ?>
                            </li></ul>
                        </div>
                        <span class="tooltiptext">Latest assessment or monitoring date conducted</span>
                    </div>
                    <div class="col-xs-12 col-lg-12">                    
                        <ul><li>
                            <?= form_label('Remarks','for="coral_remarks"').form_textarea('coral_remarks','','id="coral_remarks"') ?>
                        </li></ul>
                    </div>
                    <div class="col-xs-12 col-lg-12">  
                        <a type="text" class="btn btn-primary" id="addcoralreefters">Add Coral Reefs</a><br>
                    </div>  
                    <div class="col-xs-12">
                    <br>
                    <table id="tblcoralreefs_samples" class="content-table">                                  
                        <tbody id="tbodycoralreefs_sample"></tbody>
                    </table>                                                                             
                    <table id="tblcoralreefs" class="content-table">
                        <thead>  
                            <tr>
                               <td style="text-align: center; font-size: 24px">Coral Reefs</td> 
                            </tr>  
                        </thead>
                        <tbody id="tbodycoralreefs"></tbody>
                    </table>                                        
                    </div>  
                </fieldset>
                </div>
            </div>
            <div id="corals" class="tabcontentmarinecoral" style="display: none;"> 
                <div class="col-xs-12 col-lg-12">
                    <!-- <fieldset> -->
                        <!-- <legend>Dominant Species</legend> -->
                        <div class="col-xs-12">
                            <div class="col-xs-12 col-lg-12 tooltip">
                                <ul><li>
                                <?php echo form_label('Coral Species','idcoralspecies').form_dropdown('idcoralspecies',$coralspecies,'','id="idcoralspecies" style="font-style: italic;"') ?>
                                <span class="tooltiptext">Select dominant coral species</span>
                                </li></ul>
                                <a type="text" class="btn btn-primary" id="addcoralspecies">Add Coral Reef Species</a>
                            </div>
                            <div class="col-xs-12 col-lg-12 ">
                                <div class="table-responsive"> 
                                <br>
                                    <table id="tblcoralspecies_sample" class="content-table">
                                        <tbody id="tbodycoralspecies_sample"></tbody>
                                    </table>                                           
                                    <table id="tblcoralspecies" class="content-table">
                                        <thead>  
                                            <tr>
                                               <td style="text-align: center; font-size: 24px" colspan="3">Coral Species</td> 
                                            </tr>                                         
                                            <tr>
                                                <td>Species name</td>
                                                <td>Date Uploaded</td>
                                                <td>Action</td>         
                                            </tr>
                                        </thead>
                                        <tbody id="tbodycoralspecies"></tbody>
                                    </table>                                           
                                </div>
                            </div>
                        </div>                                    
                    <!-- </fieldset> -->
                </div>
            <!-- </fieldset> -->
            </div>
        </div>
        <div id="seagrass2" class="tabcontentmarine" style="display: none;"> 
            <input type="hidden" name="genCoralSeagrass" id="genCoralSeagrass" value="<?php echo generateRandomStringCoastal(); ?>">

            <div class="tab-third" id="tabhabecosub">
                <a class="tablinkmarineseagrass active" onclick="tabmarineseagrass(event, 'seagrassd')">Seagrass Beds Information</a>
                <a class="tablinkmarineseagrass" onclick="tabmarineseagrass(event, 'seagrassS')">Seagrass Species</a>
            </div>

            <div id="seagrassd" class="tabcontentmarineseagrass" style="display: block;">                  
                <div class="col-xs-12">                                        
                    <div class="col-xs-12 col-lg-12">   
                        <div id="fetch_images_seagrass"></div>
                    </div>
                    <div class="col-xs-12 col-lg-12 tooltip">   
                        <fieldset>
                            <label>Upload map images of seagrass beds<i>(*.png, *.jpeg, *.jpg format, maximum size of 50MB)</i></label>
                            <input type='file' name="img_seagrassmap" id="img_seagrassmap"/>
                            <input type="hidden" name="old_picture" value="nophoto.jpg"> 
                            <span id="img_seagrassmapspan" class="img_seagrassmapspan hidden">nophoto.jpg</span>
                            <span class="tooltiptext">"Map showing the whole area of corals within the PA layout in A3 paper size (tabloid size),  with additional map elements:<br>- Map Title<br>- Point location of the assessment sites, with label for reference<br>- Map location (inset)<br>- Legend"</span>
                        </fieldset>
                    </div>
                </div>
                <fieldset>
                    <div class="col-xs-12 col-lg-12 tooltip">
                        <fieldset>
                            <label>Upload Shapefile of seagrass beds<i>(*.zip  format, maximum size of 50MB)</i></label>
                            <input type='file' name="shp_seagrass" id="shp_seagrass" onchange="readURLshapefileSeagrass(this);" />
                            <input type="hidden" name="shp_seagrass_txt" id="shp_seagrass_txt">
                            <div id="fetch_seagrass_shpfile"></div>
                            <span class="tooltiptext">Shapefile of the uploaded individual map</span>
                        </fieldset>    
                    </div>
                </fieldset>
                <div class="col-xs-12 col-lg-12">                                        
                    <fieldset>
                        <legend>Seagrass Beds</legend>
                        <div class="col-xs-12">                                        
                            <div class="col-xs-12 col-lg-12">    
                                <div id="fetch_images_seagrass_indi"></div>
                            </div>
                            <div class="col-xs-12 col-lg-12 tooltip"> 
                                <fieldset>   
                                    <label>Upload individual map image <i>(*.png, *.jpeg, *.jpg format, maximum size of 50MB)</i></label>                                
                                    <input type='file' name="img_seagrassmap_indi" id="img_seagrassmap_indi"/><br>
                                    <input type="hidden" name="img_seagrassmaps_indi" id="img_seagrassmaps_indi">
                                    <span class="tooltiptext">Map showing the assessment area conducted, with additional map elements:<br>- Map Title<br>- Location in text (Region, Province, Mun, and Barangay if necessary)<br>- Location Map (inset)<br>- Citation/Sources of Information for reference, e.g. Prepared by:;Approved by:, <br>- table for the geolocation (latlong) of the assessment sites.</span>
                                </fieldset>
                            </div>
                        </div> 
                        <div class="col-xs-12 col-lg-12">
                            <div class="col-xs-12 col-lg-12 tooltip">
                                <ul><li>
                                    <?= form_label('Extent (ha.)','for="seagrass_ha"').form_input('seagrass_ha','',' id="seagrass_ha" class="number-separator"') ?>
                                    <span class="tooltiptext">Total area in hectare of the seagrass beds present in the NIPAS MPA</span>
                                </li></ul>
                            </div>
                            <div class="col-xs-12 col-lg-12">
                                <div class="col-xs-6 col-lg-6 tooltip">
                                    <ul><li>
                                        <?= form_label('Percent Cover','for="cover_value"').form_input('cover_value','',' id="cover_value" class="number-separator"') ?>
                                        <span class="tooltiptext">Average percent seagrass cover of assessed area</span>
                                        <span class="">Amran, 2010, as cited in CMEMP. Reporting Guidelines (2020,2021)</span>
                                    </li></ul>
                                </div>
                                <div class="col-xs-6 col-lg-6 tooltip">
                                    <ul><li>
                                        <?= form_label('Category','for="seagrass_condition"').form_dropdown('seagrass_condition',$seagrasscondition,'','id="seagrass_condition"') ?>
                                        <span class="tooltiptext">Amran Seagrass condition category base on percent seagrass cover</span>
                                        <span class="">Amran, 2010, as cited in CMEMP. Reporting Guidelines (2020,2021)</span>
                                    </li></ul>
                                </div>
                            </div>
                            <div class="col-xs-12 col-lg-12 tooltip">
                                <ul><li>
                                    <?= form_label('Seagrass species composition','for="seagrass_no"').form_input('seagrass_no','',' id="seagrass_no" class="number-separator"') ?>
                                        <span class="tooltiptext">Total number of identified seagrass species in the assessed area</span>
                                        <span class="">No. of seagrass species</span>
                                </li></ul>
                            </div>
                            <div class="col-xs-12 col-lg-12">
                                <div class="col-xs-12 col-lg-6 tooltip">
                                    <ul><li>
                                        <?= form_label('Diversity Index','for="diversity_values"').form_input('diversity_values','',' id="diversity_values" class="number-separator"') ?>
                                        <span class="tooltiptext">Diversity index computed using the Shannon-Wiener Index of Diversity wherein the percent seagrass cover is used instead of individual counts in the analysis</span>
                                    </li></ul>
                                </div>
                                <div class="col-xs-12 col-lg-6 tooltip">
                                    <ul><li>
                                        <?= form_label('Diversity Category','for="diversity_index"').form_dropdown('diversity_index',$seagrassdiversity,'','id="diversity_index"') ?>
                                        <span class="tooltiptext">Category of the seagrass diversity based on Odum, 1983</span>
                                        <span class="">Odum, 1983, as cited in Updated BAMS Seagrass</span>
                                    </li></ul>
                                </div>
                            </div>
                            <div class="col-xs-12 col-lg-12 tooltip">
                                <div class="col-xs-12 col-lg-4">
                                    <ul><li>
                                        <?= form_label('Date conducted').form_dropdown('seagrass_conducted_month',$monthList,'','id="seagrass_conducted_month"'); ?>
                                    </li></ul>
                                </div>
                                 <div class="col-xs-12 col-lg-4">
                                    <ul><li>
                                        <?= form_label('&nbsp;').form_dropdown('seagrass_conducted_day',$dayList,'','id="seagrass_conducted_day"'); ?>
                                    </li></ul>
                                </div>
                                 <div class="col-xs-12 col-lg-4">
                                    <ul><li>
                                        <?= form_label('&nbsp;').form_dropdown('seagrass_conducted_year',$yearList,'','id="seagrass_conducted_year"'); ?>
                                    </li></ul>
                                </div>
                                <span class="tooltiptext">Date of the latest seagrass monitoring or assessment conducted</span>
                            </div>
                            <div class="col-xs-12 col-lg-12 tooltip">
                                <ul><li>
                                    <?= form_label('Remarks','for="seagrass_remarks"').form_textarea('seagrass_remarks','','id="seagrass_remarks"') ?>
                                    <span class="tooltiptext">Observation or indication of the presence of other important marine biodiversity in the area</span>
                                </li></ul>
                            </div>
                            <a type="text" class="btn btn-primary" id="addseagrassreefters">Add Seagrass Beds</a>
                        </div> 
                        <div class="col-xs-12"> 
                        <br>
                         <table id="tblseagrassreefs_samples"  class="content-table">                                  
                             <tbody id="tbodyseagrassreefs_sample"></tbody>
                         </table>                                                                             
                         <table id="tblseagrassreefs" class="content-table">
                             <thead>  
                                 <tr>
                                    <td colspan="3" style="text-align: center; font-size: 24px">Seagrass beds</td> 
                                 </tr> 
                             </thead>
                             <tbody id="tbodyseagrassreefs"></tbody>
                         </table>                                        
                        </div> 
                    </fieldset>     
                </div>
            </div> 
            <div id="seagrassS" class="tabcontentmarineseagrass" style="display: none;"> 
                <div class="col-xs-12 col-lg-12">               
                    <div class="col-xs-12">                                    
                        <div class="col-xs-12 col-lg-12 tooltip">
                            <ul><li>
                                <?php echo form_label('Species name','for="seagrassSpecieses"').form_dropdown('seagrassSpecieses',$seagrasspecies,'','id="seagrassSpecieses"  style="font-style:italic"') ?>
                                <span class="tooltiptext">Determine the seagrass species identified in the area</span>
                            </li></ul>
                            <a type="text" class="btn btn-primary" id="addseagrasses1">Add Seagrass Beds Species</a>                        
                        </div>                   
                        <div class="col-xs-12 col-lg-12">
                            <br>
                            <table id="tblseagrasses_sample"  class="content-table">
                                <tbody id="tbodyseagrasses_sample"></tbody>
                            </table>   
                            <table id="tblseagrasses" class="content-table" style="z-index: 100">
                                <thead>  
                                    <tr>
                                       <td style="text-align: center; font-size: 24px" colspan="3">Seagrass Species</td> 
                                    </tr>                                          
                                    <tr>
                                        <td>Species name</td>
                                        <td>Date Uploaded</td>
                                        <td>Action</td>         
                                    </tr>
                                </thead>
                                <tbody id="tbodyseagrasses"></tbody>
                            </table>                                                                           
                        </div>                                       
                    </div>
                </div>
            </div>
        </div>
        <div id="mangrove" class="tabcontentmarine" style="display: none;">
            <input type="hidden" name="genCoralmangrove" id="genCoralmangrove" value="<?php echo generateRandomStringCoastal(); ?>">  

            <div class="tab-third" id="tabhabecosub">
                <a class="tablinkmarinemangrove active" onclick="tabmarinemangrove(event, 'mangroved')">Mangrove Forests</a>
                <a class="tablinkmarinemangrove" onclick="tabmarinemangrove(event, 'mangroves')">Mangrove Species</a>
            </div>

            <div id="mangroved" class="tabcontentmarinemangrove" style="display: block;">            
                <div class="col-xs-12 col-lg-12">                                        
                    <div class="col-xs-12 col-lg-12 ">   
                        <div id="fetch_images_mangrove"></div>
                    </div>
                    <div class="col-xs-12 col-lg-12 tooltip">   
                        <fieldset>
                            <label>Upload map images of mangrove forest<i>(*.png, *.jpeg, *.jpg format, maximum size of 50MB)</i></label>
                            <input type='file' name="img_mangrovemap" id="img_mangrovemap"/><br>
                            <input type="hidden" name="old_picture" value="nophoto.jpg"> 
                            <span id="img_mangrovemapspan" class="img_mangrovemapspan hidden">nophoto.jpg</span>
                            <span class="tooltiptext">"Map showing the whole area of mangrove within the PA layout in A3 paper size (tabloid size),  with additional map elements:<br>- Map Title<br>- point location of the assessment sites, with label for reference<br>- map location (inset),<br>- legend, "</span>
                        </fieldset>
                    </div>
                </div>
                <fieldset>
                    <div class="col-xs-12 col-lg-12 tooltip">
                        <fieldset>
                            <label>Upload Shapefile of mangrove forest<i>(*.zip  format, maximum size of 50MB)</i></label>
                            <input type='file' name="shp_mangrove" id="shp_mangrove" onchange="readURLshapefileMangrove(this);" />
                            <input type="hidden" name="shp_mangrove_txt" id="shp_mangrove_txt">
                            <div id="fetch_mangrove_shpfile"></div>
                            <span class="tooltiptext">Shapefile of the uploaded individual map</span>
                        </fieldset>
                    </div>
                </fieldset>
                <div class="col-xs-12 col-lg-12">                                        
                    <fieldset>
                        <legend>Mangrove Forests</legend>
                        <div class="col-xs-12">                                        
                            <div class="col-xs-12 col-lg-12">    
                                <div id="fetch_images_mangrove_indi"></div>
                            </div>
                            <div class="col-xs-12 col-lg-12 tooltip">  
                                <fieldset>
                                    <label>Upload individual map image of mangrove forest<i>(*.png, *.jpeg, *.jpg format, maximum size of 50MB)</i></label>                                
                                    <input type='file' name="img_mangrovemap_indi" id="img_mangrovemap_indi"/><br>
                                    <input type="hidden" name="img_mangrovemaps_indi" id="img_mangrovemaps_indi"> 
                                    <span class="tooltiptext">"Map showing the assessment area conducted, with additional map elements:<br>- Map Title<br>- Location in text (Region, Province, Mun, and Barangay if necessary)<br>- Location Map (inset)<br>- Citation/Sources of Information for reference, e.g. Prepared by:;Approved by:, <br>- table for the geolocation (latlong) of the assessment sites. "</span>
                                </fieldset>    
                            </div>
                        </div> 
                        <div class="col-xs-12 col-lg-12">
                            <div class="col-xs-12 col-lg-12 tooltip">
                                <ul><li>
                                    <?= form_label('Total Coverage(ha.)','for="mangrove_ha"').form_input('mangrove_ha','',' id="mangrove_ha" class="number-separator"') ?>
                                        <span class="tooltiptext">Total mangrove cover within the PA</span>
                                </li></ul>
                            </div>
                            <div class="col-xs-12 col-lg-12">
                                 <div class="col-xs-12 col-lg-6 tooltip">
                                    <ul><li>
                                        <?= form_label('Crown Cover(%)','for="crown_cover"').form_input('crown_cover','',' id="crown_cover" class="number-separator"') ?>
                                        <span>PCRA 2004</span>
                                        <span class="tooltiptext">Use the formula to derive the information (Source:PCRA, 2004)<br>Percent crown cover = Total crown cover of all trees/ Total area sampled,2004</span>
                                    </li></ul>
                                </div>
                                <div class="col-xs-12 col-lg-6 tooltip">
                                    <ul><li>
                                        <?= form_label('Crown Condition','for="mangrove_condition"').form_dropdown('mangrove_condition',$mangrovescondition,'','id="mangrove_condition"') ?>
                                        <span>PCRA 2004</span>
                                        <span class="tooltiptext">The conditions of the mangrove area must be analyzed and classified per transect into four categories. excellent, good, fair, and poor (see crown criteria in PCRA, 2004)</span>
                                    </li></ul>
                                </div>                           
                            </div>
                            <div class="col-xs-12 col-lg-12">
                                <div class="col-xs-12 col-lg-6 tooltip">
                                    <ul><li>
                                        <?= form_label('Regeneration per m<sup>2</sup> count','for="regeneration"').form_input('regeneration','',' id="regeneration" class="number-separator"') ?>
                                        <span>PCRA 2004</span>
                                        <span class="tooltiptext">Actual value of regeneration per m<sup>2</sup></span>
                                    </li></ul>
                                </div>
                                <div class="col-xs-12 col-lg-6 tooltip">
                                    <ul><li>
                                        <?= form_label('Regeneration per m<sup>2</sup> Condition','for="mangrove_regen"').form_dropdown('mangrove_regen',$mangroveregen,'','id="mangrove_regen"') ?>
                                        <span>PCRA 2004</span>
                                        <span class="tooltiptext">Use the formula to derive the information (PCRA, 2004)<br>Regeneration per m2 = Total regeneration count Total number of regeneration plots</span>
                                    </li></ul>
                                </div>                            
                            </div>
                            <div class="col-xs-12 col-lg-12">
                                <div class="col-xs-12 col-lg-6 tooltip">
                                    <ul><li>
                                        <?= form_label('Average Height (meter)','for="avg_height"').form_input('avg_height','',' id="avg_height" class="number-separator"') ?>
                                        <span>PCRA 2004</span>
                                        <span class="tooltiptext">Use the formula to derive the information (PCRA, 2004)<br>Average height = Total height of all trees recordedTotal number of trees recorded</span>
                                    </li></ul>                        
                                </div>
                                <div class="col-xs-12 col-lg-6 tooltip">
                                    <ul><li>
                                        <?= form_label('Average Height Condition','for="mangrove_height"').form_dropdown('mangrove_height',$mangrovesaverage,'','id="mangrove_height"') ?>
                                        <span>PCRA 2004</span>
                                        <span class="tooltiptext">The conditions of the mangrove area must be analyzed and classified per transect into four categories. excellent, good, fair, and poor (see height criteria in PCRA, 2004)</span>
                                    </li></ul>
                                </div>                            
                            </div>
                            <div class="col-xs-12 col-lg-12 hidden">
                                <div class="col-xs-12 col-lg-6 tooltip">
                                    <ul><li>
                                        <?= form_label('Observation','for="observation_mangrove"').form_textarea('observation_mangrove','','id="observation_mangrove"') ?>
                                        <span>PCRA 2004</span>
                                        <span class="tooltiptext">Actual value of observation</span>
                                    </li></ul>                        
                                </div>
                                <div class="col-xs-12 col-lg-6 tooltip hidden">
                                    <ul><li>
                                        <?= form_label('Condition','for="mangrove_observe"').form_dropdown('mangrove_observe',$mangrovesobservation,'','id="mangrove_observe"') ?>
                                        <span>PCRA 2004</span>
                                        <span class="tooltiptext">Input observations</span>
                                    </li></ul>
                                </div>                            
                            </div>
                            <div class="col-xs-12 col-lg-12">
                                <div class="col-xs-12 col-lg-6 tooltip">
                                    <ul><li>
                                        <?= form_label('Diversity Value','for="diversity_value"').form_input('diversity_value','','id="diversity_value"') ?>
                                        <span>Fernando et. al, 1998</span>
                                        <span class="tooltiptext">Evaluates the number of species recorded, and the number of endemic and threatened species observed per transect.</span>
                                    </li></ul>                        
                                </div>
                                <div class="col-xs-12 col-lg-6 tooltip">
                                    <ul><li>
                                        <?= form_label('Diversity Condition','for="mangrove_diversity"').form_dropdown('mangrove_diversity',$mangrovesdiversity,'','id="mangrove_diversity"') ?>
                                        <span>Fernando et. al, 1998</span>
                                        <span class="tooltiptext">Follow the belt transect method when sampling the mangrove zones in order to determine the species diversity and their conditions. (Fernando et. al, 1998)</span>
                                    </li></ul>
                                </div>                            
                            </div>
                            <div class="col-xs-12 col-lg-12 tooltip">
                                <div class="col-xs-12 col-lg-4">
                                    <ul><li>
                                        <?= form_label('Date conducted').form_dropdown('mangrove_conducted_month',$monthList,'','id="mangrove_conducted_month"'); ?>
                                    </li></ul>
                                </div>
                                 <div class="col-xs-12 col-lg-4">
                                    <ul><li>
                                        <?= form_label('&nbsp;').form_dropdown('mangrove_conducted_day',$dayList,'','id="mangrove_conducted_day"'); ?>
                                    </li></ul>
                                </div>
                                 <div class="col-xs-12 col-lg-4">
                                    <ul><li>
                                        <?= form_label('&nbsp;').form_dropdown('mangrove_conducted_year',$yearList,'','id="mangrove_conducted_year"'); ?>
                                    </li></ul>
                                </div>
                                <span class="tooltiptext">Date conducted the assessment</span>
                            </div>
                            <div class="col-xs-12 col-lg-12 tooltip">
                                <ul><li>
                                    <?= form_label('Remarks','for="mangrove_remarks"').form_textarea('mangrove_remarks','','id="mangrove_remarks"') ?>
                                    <span class="tooltiptext">Other information/observation during the course of assessment like, cuttings/pollution, rampant conversion to other uses, fauna present</span>
                                </li></ul>
                            </div>
                            <a type="text" class="btn btn-primary" id="addmangrove">Add Mangrove Forests</a>                                           
                        </div>
                        <div class="col-xs-12" style="overflow-x:auto;">                                                                              
                        <table id="tblmangrovereefs" class="content-table">
                           <thead>  
                               <tr>
                                  <td colspan="8" style="text-align: center; font-size: 24px">Mangrove</td> 
                               </tr> 
                           </thead>
                           <tbody id="tbodymangrove"></tbody>
                        </table>                                        
                        </div>   
                    </fieldset>
                </div>
            </div>
            <div id="mangroves" class="tabcontentmarinemangrove" style="display: none;">            
                <div class="col-xs-12 col-lg-12">
                    <div class="col-xs-12">                                    
                        <div class="col-xs-12 col-lg-12 tooltip">
                            <ul><li>
                                <?php echo form_label('Species name','for="mangrovespecies"').form_dropdown('mangrovespecies',$mangrovespecies,'','id="mangrovespecies"  style="font-style:italic"') ?>
                                <span class="tooltiptext">Important mangrove species within the PA</span>
                            </li></ul>
                            <a type="text" class="btn btn-primary" id="addmangrovespecies">Add Mangrove Forests Species</a>
                        </div>
                        <div class="col-xs-12 col-lg-12">
                            <!-- <div class="content-table" style="overflow-x:auto;"> -->
                                <br>
                            <table id="tblmangrovespecies_sample" class="content-table">
                                <tbody id="tbodymangrovespecies_sample"></tbody>
                            </table>   
                            <table id="tblmangrovespecies" class="content-table" style="z-index: 100">
                                <thead>  
                                    <tr>
                                       <td colspan="3" style="text-align: center; font-size: 24px">Mangrove Species</td> 
                                    </tr>                                          
                                    <tr>
                                        <td>Species name</td>
                                        <td>Date Uploaded</td>
                                        <td>Action</td>         
                                    </tr>
                                </thead>
                                <tbody id="tbodymangrovespecies"></tbody>
                            </table>                                                                           
                            <!-- </div> -->
                        </div>                                       
                    </div>   
                </div>                                 
            </div>
        </div>
        <div id="fishspecies" class="tabcontentmarine" style="display: none;">
            <div class="tab-second" id="tabhabecosub">
                <a class="tablinkmarinefish active" onclick="tabmarinefish(event, 'marinefishinfo')">Fish Information</a>
                <a class="tablinkmarinefish" onclick="tabmarinefish(event, 'marinefishspecies')" id="fishspeciesids">Fish Species</a>
            </div>
            <div id="marinefishinfo" class="tabcontentmarinefish" style="display: block;"> 
                <fieldset>
                    <div class="col-xs-12"> 
                    <fieldset>
                        <legend>Date Assessed</legend>                                   
                        <div class="col-xs-4 col-lg-4 tooltip">
                            <ul><li>
                            <?= form_dropdown('fish_month_monitoring',$monthListed,'','class="border-input " id="fish_monitor_months"'); ?>
                            <span class="tooltiptext">Select date assessed</span>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-4 tooltip">
                            <ul><li>
                            <?= form_dropdown('fish_day_monitoring',$dayList,'','class="border-input " id="fish_monitor_day"'); ?>
                            <span class="tooltiptext">Select date assessed</span>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-4 tooltip">
                            <ul><li>
                            <?= form_dropdown('fish_year_monitoring',$yearListed,'','class="border-input " id="fish_monitor_years"'); ?>
                            <span class="tooltiptext">Select date assessed</span>
                            </li></ul>
                        </div>
                    </fieldset>
                    <div class="col-xs-12 hidden">
                         <ul><li>
                            <?= form_label('Fish Category','for="fish_category"').form_dropdown('fish_category',$fishcategorysa,'','id="fish_category"') ?>
                            <span>TB 2019-04, Diversity and density Hilomen, et. al. 2000</span>
                        </li></ul>
                    </div>
                    <div class="col-lg-12 col-xs-12">                    
                        <div class="col-xs-12 col-lg-6 tooltip">
                            <ul><li>
                                <?= form_label('Fish Diversity (# of species/1000m<sup>2</sup>)','for="fish_diversity_value"').form_input('fish_diversity_value','',' id="fish_diversity_value" class="number-separator"') ?>
                                <span class="tooltiptext">Total number of fish species per 1000 m<sup>2</sup> in the assessed area.</span>
                                <span>TB 2019-04, Diversity and density Hilomen, et. al. 2000</span>
                           </li></ul>
                        </div>
                        <div class="col-xs-12 col-lg-6 tooltip">
                            <ul><li>
                                <?= form_label('Diversity Category','for="fish_diversity"').form_dropdown('fish_diversity',$fishdiversity,'','id="fish_diversity"') ?>
                                <span>TB 2019-04, Diversity and density Hilomen, et. al. 2000</span>
                                <span class="tooltiptext">Corresponding Fish diversity category based on the scales of Hilomen, et. al, 2000</span>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-lg-12 col-xs-12">                    
                        <div class="col-xs-12 col-lg-6 tooltip">
                            <ul><li>
                                <?= form_label('Fish Density (# of individual/1000m<sup>2</sup>)','for="density_value"').form_input('density_value','',' id="density_value" class="number-separator"') ?>
                                <span class="tooltiptext">Total number of individual fish per 1000 m<sup>2</sup> in the assessed area</span>
                                <span>TB 2019-04, Diversity and density Hilomen, et. al. 2000</span>
                           </li> </ul>
                        </div>
                        <div class="col-xs-12 col-lg-6 tooltip">
                            <ul><li>
                                <?= form_label('Density Category','for="fishdensity"').form_dropdown('fishdensity',$fishdensity,'','id="fishdensity"') ?>
                            <span>TB 2019-04, Diversity and density Hilomen, et. al. 2000</span>
                            <span class="tooltiptext">Corresponding Fish density category based on the scales of Hilomen, et. al, 2000</span>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-lg-12 col-xs-12">                    
                        <div class="col-xs-12 col-lg-6 tooltip">
                            <ul><li>
                                <?= form_label('Fish Biomass (MT/kg)','for="biomass_value"').form_input('biomass_value','',' id="biomass_value" class="number-separator"') ?>
                                <span class="tooltiptext">Weight in grams equals the Length of the fish in centimeters raised to the power b multiplied by the a value of the fish species</span>
                                <span>TB 2019-04, Nanola, et. al. 2006</span>
                            </li></ul>
                        </div>
                        <div class="col-xs-12 col-lg-6 tooltip">
                            <ul><li>
                                <?= form_label('Fish Biomass Category','for="fishbiomass"').form_dropdown('fishbiomass',$fishbiomass,'','id="fishbiomass"') ?>
                                <span>TB 2019-04, Nanola, et. al. 2006</span>
                                <span class="tooltiptext">Corresponding Fish biomass category based on the scales of Nanola et. al.</span>
                            </li></ul>
                        </div>
                    </div>
                    </div>
                    <a type="text" class="btn btn-primary" id="addfishdata">Add Data</a>
                    <div class="col-xs-12 col-lg-12">
                    <br>  
                    <table id="tblfishdetails" class="content-table" style="z-index: 100">
                        <thead>  
                            <tr>
                               <td colspan="5" style="text-align: center; font-size: 24px">Fish</td> 
                            </tr>                                          
                            <tr>
                                <td>Date Assessed</td>
                                <td>Diversity</td>
                                <td>Density</td>
                                <td>Biomass</td>
                                <td>Action</td>         
                            </tr>
                        </thead>
                        <tbody id="tbodyfishdetails"></tbody>
                    </table>                                                                           
                    </div>  
                </fiedset>
            </div>
            <div id="marinefishspecies" class="tabcontentmarinefish" style="display: none;"> 
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <div class="col-xs-3 col-md-3 col-lg-3">
                        <ul><li>
                        <?php echo form_label('Search by Scientific Name','searchspec','for="fish_species"').form_dropdown('search',$fishspeciesdata,'','id="fish_species" class="fish_species" style="width:100%;font-style:italic"'); ?>
                        </li></ul>
                    </div>
                    <?php echo form_input('idfishspecies','','id="idfishspecies" readonly class="hidden"'); ?>               
                    <div class="col-xs-3 col-md-3 col-lg-2">
                        <ul><li>
                            <label>Family</label>
                            <?php echo form_input('','','id="fishfamily_id" readonly'); ?>
                        </li></ul>
                    </div>
                    <div class="col-xs-3 col-md-3 col-lg-3">
                        <ul><li>
                            <label id="labelswitch">Group</label>
                            <?php echo form_input('','','id="fishgroupid" readonly'); ?>
                        </li></ul>
                    </div>
                    <div class="col-xs-3 col-md-3 col-lg-3">
                        <ul><li>
                            <label id="labelswitch">Trophic Group</label>
                            <?php echo form_input('','','id="trophicgroupid" readonly'); ?>
                        </li></ul>
                    </div>  
                    <a type="text" class="btn btn-primary" id="addfishspeciesdata">Add Data</a>
                    <div class="col-xs-12 col-lg-12">
                        <table id="tblfishspecies" class="content-table" style="z-index: 100">
                            <thead>  
                                <tr>
                                   <td colspan="5" style="text-align: center; font-size: 24px">Fish</td> 
                                </tr>                                          
                                <tr>
                                    <td>Species name</td>
                                    <td>Date Uploaded</td>
                                    <td>Action</td>         
                                </tr>
                            </thead>
                            <tbody id="tbodyfishspecies"></tbody>
                        </table>                                 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="biospecies" class="tabcontentEcon">
    <div class="col-xs-12 ">
        <input type="" name="gencodespecies" id="gencodespecies" class="hidden" value=""/>
                <span id="commonid" class="commonid hidden"></span>                                    
                <span id="order_id" class="orderId hidden"></span>
                <span id="family_id" class="familyId hidden"></span>                             
                <span id="imagespecies_id" class="speciesImage hidden"></span>                
        <input type="text" name="getcommonid" id="getcommonid" class="hidden" style="font-size: 12px;">
        <div class="col-xs-12">
            <div class="tab-second">
              <a class="tablinksbio active" id="loadfauna" onclick="tabSbio(event, 'Fauna')">Fauna</a>
              <a class="tablinksbio" id="loadflora" onclick="tabSbio(event, 'Flora')">Flora</a>
            </div>
        </div>
        <div id="Fauna" class="col-xs-12 tabcontentbio" style="display:block">
            <div class="col-xs-12 col-lg-12 hidden">                
                <tr><td><?php echo form_radio('searchcomspec', '1', TRUE,'id="searchsp1"').form_label('Common Name', 'searchsp1'); ?></td></tr>
                <tr><td><?php echo form_radio('searchcomspec', '2', FALSE,'id="searchsp2"').form_label('Scientific Name', 'searchsp2'); ?></td></tr>
            </div>
            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 hidden">
                <fieldset>
                    <legend>Species Information</legend>
                    <div><label>Category : </label><span id="category_id" class="categoryId"></span>   </div>
                </fieldset>
            </div>
            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12" style="margin-bottom:10px;">
                <a class="btn btn-danger" href="#"  id="switchidspan">Switch to search by Scientific name</a>
            </div>
            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                <div class="col-xs-3 col-md-3 col-lg-3" id="dropdownidmenu1">
                    <ul><li>
                    <label>Search Common name</label>
                    <?php echo form_dropdown('search',$florafuanalist,'','id="searchBoxs" class="searchBoxs" style="width:100%;text-align:left;"') ?>
                    </li></ul>
                </div>
                <div class="col-xs-3 col-md-3 col-lg-3" id="dropdownidmenu2" style="display:none">
                    <ul><li>
                    <?php echo form_label('Search by Scientific Name','searchspec','for="searchBoxs_2"').form_dropdown('search',$florafuanalistScientific,'','id="searchBoxs_2" class="searchBoxs_2" style="width:100%;font-style:italic"'); ?>
                    </li></ul>
                </div>
                <span id="commonname_id" class="commonId hidden"></span>                
                <div class="col-xs-3 col-md-3 col-lg-2">
                    <ul><li>
                    <label>Class</label>
                    <?php echo form_input('','','id="class_id" class="classId" readonly'); ?>
                    </li></ul>
                </div>
                <div class="col-xs-3 col-md-3 col-lg-3" id="identity1">
                    <ul><li>
                    <label id="labelswitch">Scientific name</label>
                    <?php echo form_input('','','id="scientific_id" class="scientificId" style="font-style:italic" readonly'); ?>
                    </li></ul>
                </div>
                <div class="col-xs-3 col-md-3 col-lg-3" id="identity2" style="display:none">
                    <ul><li>
                    <label id="labelswitch">Common name</label>
                    <?php echo form_input('','','id="comm_id" class="comm_id" readonly'); ?>
                    </li></ul>
                </div>
                <div class="col-xs-3 col-md-3 col-lg-2 tooltip">
                    <ul><li>
                    <label>Residency Status</label>
                    <?php echo form_input('','','id="residency_id" class="residency_id" readonly'); ?>
                    <span class="tooltiptext">The category of the species based on their occurrence in the country.</span>
                    </li></ul>
                </div>
                <div class="col-xs-3 col-md-3 col-lg-2 tooltip">
                    <ul><li>
                    <label>Conservation Status</label>
                    <?php echo form_input('','','id="status_id" class="statusId" readonly'); ?>
                    <span class="tooltiptext">The category of the species based on the current list of National threatened species. </span>
                    </li></ul>
                </div>
                
            </div>
            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 hidden">
                <ul><li>
                    <?php echo form_label('Residency Status','','for="residency_conserv"').form_dropdown('residency_conserv',$residency_list_status,'','id="residency_conserv"'); ?>
                </li></ul>
            </div> 
            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 tooltip">
                <ul><li>
                    <?php echo form_label('Local name','','for="locanamespecies"').form_input('locanamespecies','','id="locanamespecies"'); ?>
                    <span class="tooltiptext">The vernacular or colloquial name of a species.</span>
                </li></ul>
            </div>
           <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
               <fieldset>
                   <legend style="background-color: transparent;color: #444; font-weight: 700;font-size: 14px;">Known Habitats/Ecosystem</legend>
                <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                    
                        <input type="checkbox" name="chk_forest" id="chk_forest"> <label for="chk_forest">Forest</label>
                    
                </div>
                <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                  
                        <?php echo form_checkbox('chk_inland','','','id="chk_inland"').form_label('Inland Wetland','','for="chk_inland"') ?>
                    
                </div>
                <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                    
                        <?php echo form_checkbox('chk_cave','','','id="chk_cave"').form_label('Caves','','for="chk_cave"') ?>
                    
                </div>
                <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                   
                        <?php echo form_checkbox('chk_coral','','','id="chk_coral"').form_label('Coral Reefs','','for="chk_coral"') ?>
                   
                </div>
                <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                   
                        <?php echo form_checkbox('chk_seagrass','','','id="chk_seagrass"').form_label('Seagrass Beds','','for="chk_seagrass"') ?>
                    
                </div>
                <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                   
                        <?php echo form_checkbox('chk_mangrove','','','id="chk_mangrove"').form_label('Mangrove Forests','','for="chk_mangrove"') ?>
                    
                </div>
                <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                        <?php echo form_checkbox('chk_tidal','','','id="chk_tidal"').form_label('Tidal flats/Mudflats','','for="chk_tidal"') ?>
                </div>
                <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                        <?php echo form_checkbox('chk_coastalwetland','','','id="chk_coastalwetland"').form_label('Estuarine Habitat','','for="chk_coastalwetland"') ?>
                </div>
                <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                        <?php echo form_checkbox('chk_grassland','','','id="chk_grassland"').form_label('Grassland','','for="chk_grassland"') ?>
                </div>
               </fieldset>
           </div>
           <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 tooltip">
                <ul><li>
                    <?php echo form_label('Estimated Population','','for="populationcount"').form_input('populationcount','','id="populationcount"'); ?>
                    <span class="tooltiptext">The estimated number of individuals of a species based on the most recent survey conducted in the PA.</span>
                </li></ul>
            </div>
            <div class="col-xs-12 col-lg-12 col-md-12 tooltip">
                <ul><li>
                    <label>Upload multiple images <i>(*.png, *.jpeg, *.jpg format, maximum size of 50MB)</i></label>
                    <input type="file" name="files_species" id="files_species" multiple />
                    <span class="tooltiptext">Actual photos taken during survey activities or reference images</span>
                </li></ul>
                <div id="uploaded_images_species"></div>
            </div>
            <div class="col-xs-12 col-lg-12 col-md-12 tooltip">
                <ul><li>
                    <?php echo form_label('References of the photo','','for="reference_photo_ff"').form_input('reference_photo_ff','','id="reference_photo_ff"'); ?>
                    <span class="tooltiptext">Details of the captured photograph (i.e. date and place of capture and information of collectors and collection method/s). Include photo credits if taken from other sources.</span>
                </li></ul>
            </div>
            <a type="text" class="btn btn-primary" id="searchBio">Add data</a> 
            <table id="tablePABiolofeature" class="content-table">
                <thead>
                    <tr>
                        <th style="text-align: center; font-size: 24px">Fauna</th>
                    </tr>
                   
                </thead>
                <tbody id="tbodybiological"></tbody>                                
            </table>            
        </div>
        <div id="Flora" class="col-xs-12 tabcontentbio">                
            <div>
                <div class="col-xs-12 col-lg-12 hidden">                
                    <tr><td><?php echo form_radio('searchcomspec2', '1', TRUE,'id="searchsp12"').form_label('Common Name', 'searchsp12'); ?></td></tr>
                    <tr><td><?php echo form_radio('searchcomspec2', '2', FALSE,'id="searchsp22"').form_label('Scientific Name', 'searchsp22'); ?></td></tr>                    
                </div>

            <input type="text" name="getcommonid2" id="getcommonid2" class="hide" style="font-size: 12px;">

            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12" style="margin-bottom:10px;">
                <a href="#" class="btn btn-danger" id="switchidspan2">Switch to search by Scientific name</a>
            </div>
            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                <div class="col-xs-3 col-md-3 col-lg-3" id="dropdownidmenu11">
                    <ul><li>
                    <label>Search Common name</label>
                    <?php echo form_dropdown('search2',$floralist,'','id="searchBoxs2" style="width:100%;text-align:left;"') ?>
                    </li></ul>
                </div>
                <div class="col-xs-3 col-md-3 col-lg-3" id="dropdownidmenu22" style="display:none">
                    <ul><li>
                    <?php echo form_label('Search by Scientific Name','searchspec','for="searchBoxs_22"').form_dropdown('search2',$floralistScientific,'','id="searchBoxs_22" style="width:100%;font-style:italic"'); ?>
                    </li></ul>
                </div>
                <!-- <span id="commonname_id" class="commonId hidden"></span>                 -->
                <div class="col-xs-3 col-md-3 col-lg-2">
                    <ul><li>
                    <label>Class</label>
                    <?php echo form_input('','','id="class_id2" class="classId2" readonly'); ?>
                    </li></ul>
                </div>
                <div class="col-xs-3 col-md-3 col-lg-3" id="identity11">
                    <ul><li>
                    <label id="labelswitch">Scientific name</label>
                    <?php echo form_input('','','id="scientific_id2" class="scientificId2" style="font-style:italic" readonly'); ?>
                    </li></ul>
                </div>
                <div class="col-xs-3 col-md-3 col-lg-3" id="identity22" style="display:none">
                    <ul><li>
                    <label id="labelswitch">Common name</label>
                    <?php echo form_input('','','id="comm_id2" class="comm_id2" readonly'); ?>
                    </li></ul>
                </div>
                <div class="col-xs-3 col-md-3 col-lg-2 tooltip">
                    <ul><li>
                    <label>Residency Status</label>
                    <?php echo form_input('','','id="residency_id2" class="residency_id2" readonly'); ?>
                    <span class="tooltiptext">The category of the species based on their occurrence in the country.</span>
                    </li></ul>
                </div>
                <div class="col-xs-3 col-md-3 col-lg-2 tooltip">
                    <ul><li>
                    <label>Conservation Status</label>
                    <?php echo form_input('','','id="status_id2" class="statusId2" readonly'); ?>
                    <span class="tooltiptext">The category of the species based on the current list of National threatened species. </span>
                    </li></ul>
                </div>
                
            </div>
            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 hidden">
                <ul><li>
                    <?php echo form_label('Residency Status','','for="residency_conserv2"').form_dropdown('residency_conserv2',$residency_list_status,'','id="residency_conserv2"'); ?>
                </li></ul>
            </div> 
            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 tooltip">
                <ul><li>
                    <?php echo form_label('Local name','','for="locanamespecies2"').form_input('locanamespecies2','','id="locanamespecies2"'); ?>
                    <span class="tooltiptext">The vernacular or colloquial name of a species.</span>
                </li></ul>
            </div>
           <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
               <fieldset>
                   <legend style="background-color: transparent;color: #444; font-weight: 700;font-size: 14px;">Known Habitats/Ecosystem</legend>
                <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                    
                        <input type="checkbox" name="chk_forest2" id="chk_forest2"> <label for="chk_forest2">Forest</label>
                    
                </div>
                <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                  
                        <?php echo form_checkbox('chk_inland2','','','id="chk_inland2"').form_label('Inland Wetland','','for="chk_inland2"') ?>
                    
                </div>
                <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                    
                        <?php echo form_checkbox('chk_cave2','','','id="chk_cave2"').form_label('Caves','','for="chk_cave2"') ?>
                    
                </div>
                <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                   
                        <?php echo form_checkbox('chk_coral2','','','id="chk_coral2"').form_label('Coral Reefs','','for="chk_coral2"') ?>
                   
                </div>
                <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                   
                        <?php echo form_checkbox('chk_seagrass2','','','id="chk_seagrass2"').form_label('Seagrass Beds','','for="chk_seagrass2"') ?>
                    
                </div>
                <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                   
                        <?php echo form_checkbox('chk_mangrove2','','','id="chk_mangrove2"').form_label('Mangrove Forests','','for="chk_mangrove2"') ?>
                    
                </div>
                <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                        <?php echo form_checkbox('chk_tidal2','','','id="chk_tidal2"').form_label('Tidal flats/Mudflats','','for="chk_tidal2"') ?>
                </div>
                <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                        <?php echo form_checkbox('chk_coastalwetland2','','','id="chk_coastalwetland2"').form_label('Estuarine Habitat','','for="chk_coastalwetland2"') ?>
                </div>
                <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                        <?php echo form_checkbox('chk_grassland2','','','id="chk_grassland2"').form_label('Grassland','','for="chk_grassland2"') ?>
                </div>
               </fieldset>
           </div>
           <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 tooltip">
                <ul><li>
                    <?php echo form_label('Estimated Population','','for="populationcount2"').form_input('populationcount2','','id="populationcount2"'); ?>
                    <span class="tooltiptext">Number of individuals counted based on survey conducted in the PA.</span>
                </li></ul>
            </div>
            <div class="col-xs-12 col-lg-12 col-md-12 tooltip">
                <ul><li>
                    <label>Upload multiple images <i>(*.png, *.jpeg, *.jpg format, maximum size of 50MB)</i></label>                    
                    <input type="file" name="files_species2" id="files_species2" multiple />
                    <span class="tooltiptext">Actual photos taken during survey activities or reference images</span>
                </li></ul>
                <div id="uploaded_images_species2"></div>
            </div>
            <div class="col-xs-12 col-lg-12 col-md-12 tooltip">
                <ul><li>
                    <?php echo form_label('References of the photo','','for="reference_photo_ff2"').form_input('reference_photo_ff2','','id="reference_photo_ff2"'); ?>
                    <span class="tooltiptext">Details of the captured photograph (i.e. date and place of capture and information of collectors and collection method/s). Include photo credits if taken from other sources.</span>
                </li></ul>
            </div>
            <!-- <div class="col-xs-12 col-lg-12 "> -->
                <a type="text" class="btn btn-primary" id="searchBio2">Add data</a> 
            <!-- </div> -->
                <table id="tablePABiolofeatureflora" class="content-table">
                    <thead>
                        <tr>
                            <th style="text-align: center; font-size: 24px">Flora</th>
                        </tr>
                    </thead>
                    <tbody id="tbodybiologicalflora"></tbody>                                
                </table>
                
            </div>            
        </div>   
    </div>
</div>
<form method="post" action="" id="ForestFormForm" class="form-style-7" enctype="multipart/form-data" role="form" >
    <div class="modal fade" data-backdrop="static" id="modal-edit-ff" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Forest Formation</h4>
                </div>
                <input type="hidden" id="ff-id" name="ff-id" value="" />
                <input type="hidden" id="ff-gencode" name="ff-gencode" value="" />
                <div class="modal-body" >
                       <div class="col-xs-12 " style="margin-top:10px">
                        <div class="col-xs-12 col-lg-12 ">
                            <ul><li>
                                <?php echo form_label('Forest formation','','').''.form_dropdown('edit-fform-legend',$fftype,'','id="edit-fform-legend"') ?>
                            </li></ul>
                        </div>
                        <div class="col-xs-12 col-lg-12 ">
                            <ul><li>
                                <?php echo form_label('Area','','').''.form_input('edit-fform-area','','class="class="number-separator" id="edit-fform-area" ') ?>
                            </li></ul>
                        </div>
                        <div class="col-xs-12 col-lg-12 ">
                            <ul><li>
                                <?php echo form_label('Remarks','','').''.form_textarea('edit-fform-remarks','',' id="edit-fform-remarks"') ?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-12">
                        <div>
                            <label>Date Created : </label><span id="date_create_div_fform"></span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-12">
                        <div>
                            <label>Date last updated : </label><span id="date_update_div_fform"></span>
                        </div>
                    </div>

                    <div class="col-xs-12 " style="margin-top:10px">
                        <div class="col-xs-12 ">
                            <div class="modal-footer">
                                <!-- <input class="btn btn-info" type="submit" name="submit" value="Update" id="UpdateContri" onclick="UpdateFform();" /> -->
                                 <button class="btn btn-info" type="button" onclick="UpdateFform();" />Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>
<form method="post" action="" id="VegatativeForm" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-vegetative" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Vegetative Cover</h4>
                </div>
                <input type="hidden" id="vegetative-id" name="vegetative-id" value="" />
                <input type="hidden" id="vegetative-gencode" name="vegetative-gencode" value="" />
                <div class="modal-body" >
                    <div class="col-xs-12 " style="margin-top:10px">
                        <div class="col-xs-12 col-lg-12 ">
                        <ul><li>
                            <?php echo form_label('Legend').form_dropdown('edit-vegetative-legend',$landcover,'','id="edit-vegetative-legend"') ?>
                        </li></ul>
                        </div>
                        <div class="col-xs-12 col-lg-12 ">
                        <ul><li>
                            <?php echo form_label('Area').form_input('edit-vegetative-area','','id="edit-vegetative-area" class="number-separator"') ?>
                        </li></ul>
                        </div>
                        <div class="col-xs-12 col-lg-12 ">
                        <ul><li>
                            <?php echo form_label('Remarks').form_textarea('edit-vegetative-remarks','','id="edit-vegetative-remarks"') ?>
                        </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-12">
                        <div>
                            <label>Date Created : </label><span id="date_create_div_vegetative"></span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-12">
                        <div>
                            <label>Date last updated : </label><span id="date_update_div_vegetative"></span>
                        </div>
                    </div>
                    <div class="col-xs-12 " style="margin-top:10px">
                        <div class="col-xs-12 ">
                            <div class="modal-footer">
                                <button class="btn btn-info" type="button" onclick="UpdateEditVege();" />Update
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>

<form method="post" action="" id="hiwForm" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-hiw" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Human-made Wetlands</h4>
                </div>
                <input type="hidden" id="hiw-id" name="hiw-id" value="" />
                <input type="hidden" id="hiw-gencode" name="hiw-gencode" value="" />
                <div class="modal-body" >
                    <div class="col-xs-12 col-lg-12 col-sm-12">
                            <fieldset>
                                <legend style="background-color: transparent;color: black;font-weight: 700">Individual Map Image</legend>
                                    <img id="edit-blahhinlandedit" src="<?php echo base_url("bmb_assets2/upload/humanmade_map/nophoto.jpg") ?>" alt="your image" class="upload-btn-wrapper" />
                                    <br>
                                    <input type='file' name="edit-pic_hinlandimg" id="edit-pic_hinlandimg" onchange="readURLinlandedit(this);"  /><br>
                                    <input type="hidden" name="edit-old_picturehinland" id="edit-old_picturehinland">
                                    <span id="edit-img_hinlandspan" class="edit-img_hinlandspan"></span>
                            </fieldset>
                            <fieldset>
                                <div class="col-xs-12">
                                    <div class="col-xs-12 col-lg-12 ">
                                        <ul><li>
                                            <?= form_label('Current file attached','','for="zip_shp_file_hinland"')?>
                                            <a href="" id="zip_shp_file_hinland" target="_blank"></a>
                                        </li></ul>
                                    </div>
                                </div>
                                <legend style="background-color: transparent;color: black;font-weight: 700">Upload Shapefile <i>(note: zip file)</i></legend>
                                <input type='file' name="edit-zip_shpfile_hinland" id="edit-zip_shpfile_hinland" onchange="readURLinlandSHPedit(this);"  />
                                <span id="edit-shpzip_hiw" class="edit-shpzip_hiw hidden"></span><br>
                                <input type="hidden" id="edit-shpzip_hiwinput" class="edit-shpzip_hiwinput">
                            </fieldset>
                        </div>
                    <div class="col-xs-12">
                        <div class="col-xs-12 col-lg-12">
                            <ul><li>
                                <?= form_label('Wetland site name').form_input('edit-hiwname','','placeholder="Site name" id="edit-hiwname"') ?>
                            </li></ul>
                        </div>
                    </div>
                    <fieldset>
                        <legend>Location</legend>
                        <div class="col-xs-12">
                            <div id="hiwdiv1">
                                <div class="col-xs-6 col-lg-6">
                                    <ul><li>
                                        <?= form_label('Province', '','for="edit-hiwProvText"').form_input('edit-hiwProvText', '', 'placeholder=" " id="edit-hiwProvText"'); ?>
                                    </li></ul>
                                </div>
                                <div class="col-xs-6 col-lg-6">
                                    <ul><li>
                                        <?= form_label('Municipality', '','for="edit-hiwMunicipalText"').form_input('edit-hiwMunicipalText', '', 'placeholder=" " id="edit-hiwMunicipalText"'); ?>
                                    </li></ul>
                                </div>
                            </div>
                            <div id="hiwdiv2">
                                <div class="col-xs-6 col-lg-6">
                                    <ul><li>
                                        <?php echo form_label('Province','','for="edit-hiwprovid"').form_dropdown('edit-hiwprovid',$provinceList,'',' id="edit-hiwprovid"') ?>
                                        <div class="hiwmunicipal_error"></div>
                                    </li></ul>
                                </div>
                                <div class="col-xs-6 col-lg-6">
                                    <ul><li>
                                        <?php echo form_label('Municipality','','for="edit-hiwmunid"').form_dropdown('edit-hiwmunid','','',' id="edit-hiwmunid"') ?>
                                    </li></ul>
                                </div>
                            </div>
                             <input type="hidden" name="hindepiw" id="hindepiw">
                            <?php echo form_input('edit-hprovidsiw', '', 'placeholder=" " id="edit-hprovidsiw" class="hide"'); ?>
                            <?php echo form_input('edit-hmunidsiw', '', 'placeholder=" " id="edit-hmunidsiw" class="hide"'); ?>
                            <input type="button" id="clickmeplshiw" value="Change">
                        </div>
                    </fieldset>
                    <div class="col-xs-12">
                        <div class="col-xs-6 col-lg-6">
                            <ul><li>
                                <?= form_label('Approximate area (has)','','for="edit-hiwarea"').form_input('edit-hiwarea','','placeholder="hectares"  id="edit-hiwarea"'); ?>
                            </li></ul>
                        </div>
                        <div class="col-xs-6 col-lg-6">
                            <ul><li>
                                <?= form_label('Wetland type','','for="edit-hiwtype"').form_dropdown('edit-hiwtype',$iwtype,'',' id="edit-hiwtype"'); ?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <fieldset><legend style="background-color: transparent;color: #444; font-weight: 700;font-size: 14px;">Water Classification</legend>
                            <div class="col-xs-6 col-lg-6">
                                <ul><li>
                                    <?= form_label('&nbsp;','','edit-hinlandwaterbodyclass').form_dropdown('edit-hinlandwaterbodyclass',$waterclass,'','id="edit-hinlandwaterbodyclass"') ?>
                                </li></ul>
                            </div>
                            <div class="col-xs-6">
                                <ul><li>
                                    <?php echo form_label('&nbsp;').form_dropdown('edit-hinlandwaterbodyclassSub','','','id="edit-hinlandwaterbodyclassSub"') ?>
                                </li></ul>
                            </div>
                        </fieldset>                            
                            <div class="col-xs-6 col-lg-6">
                                <ul><li>
                                    <?= form_label('Year assessed', '','for="edit-hiwassessed"').form_dropdown('edit-hiwassessed', $yearListed,'',' id="edit-hiwassessed"'); ?>
                                </li></ul>
                            </div>
                    </div>
                    <div class="col-xs-12 hidden">
                        <fieldset>
                        <legend>Coordinates</legend>
                            <div class="col-xs-6 col-lg-6">
                                <ul><li>
                                    <?= form_label('Longitude', '','for="edit-hiwlong"').form_input('edit-hiwlong', '', 'placeholder="Coordinates(Longitude)" id="edit-hiwlong"'); ?>
                                </li></ul>
                            </div>
                            <div class="col-xs-6 col-lg-6">
                                <ul><li>
                                    <?= form_label('Latitude', '','for="edit-hiwlat"').form_input('edit-hiwlat', '', 'placeholder="Coordinates(Latitude)" id="edit-hiwlat"'); ?>
                                </li></ul>
                            </div>
                        </fieldset>
                    </div>
                    <fieldset>
                    <legend style="background-color: transparent;color: #000; font-weight: 700;font-size: 14px;">Centroid for Geographic Location</legend>
                        <div class="col-xs-12">
                            <div class="col-xs-12 col-lg-12">
                                <table class="content-table">
                                    <tbody>
                                        <tr>
                                            <td>Longitude</td>
                                            <td width="">
                                                <table class="content-table">
                                                    <tbody>
                                                        <tr>
                                                            <td>Decimal Degree</td><td colspan="2"><ul><li><?= form_input('edit-hiwddlongoutput','','id="edit-hiwddlongoutput"')?></li></ul></td>
                                                            <td class="hidden"><?php echo form_button('en','Enable/Disable','class="edit-hiwendis"') ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Direction','for=""').form_dropdown('edit-hiw_longitude_dms_direction',$direct_long,'',' id="edit-hiw_longitude_dms_direction"'); ?>
                                                                </li></ul>
                                                                </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Degree (°)','for="edit-hiw_longitude_dms_degrees"').form_input('edit-hiw_longitude_dms_degrees','','id="edit-hiw_longitude_dms_degrees" class="edmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Minute (ˈ)','for="edit-hiw_longitude_dms_minutes"').form_input('edit-hiw_longitude_dms_minutes','','id="edit-hiw_longitude_dms_minutes" class="edmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Second (")','for="edit-hiw_longitude_dms_seconds"').form_input('edit-hiw_longitude_dms_seconds','','id="edit-hiw_longitude_dms_seconds" class="edmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                        </tr>                                                        
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Latitude</td>
                                            <td width="">
                                                <table class="content-table">
                                                    <tbody>
                                                        <tr>
                                                            <td>Decimal Degree</td><td colspan="2"><ul><li><?= form_input('edit-hiwddlatoutput','','id="edit-hiwddlatoutput"') ?></li></ul></td>
                                                            <td class="hidden"><?php echo form_button('en','Enable/Disable','class="edit-hiwendiss"') ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <ul><li>
                                                                   <?= form_label('Direction','for=""').form_dropdown('edit-hiw_latitude_dms_direction',$direct_lat,'',' id="edit-hiw_latitude_dms_direction"'); ?>
                                                                </li></ul>
                                                                </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Degree (°)','for="edit-hiw_latitude_dms_degrees"').form_input('edit-hiw_latitude_dms_degrees','','id="edit-hiw_latitude_dms_degrees" class="edmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Minute (ˈ)','for="edit-hiw_latitude_dms_minutes"').form_input('edit-hiw_latitude_dms_minutes','','id="edit-hiw_latitude_dms_minutes" class="edmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Second (")','for="edit-hiw_latitude_dms_seconds"').form_input('edit-hiw_latitude_dms_seconds','','id="edit-hiw_latitude_dms_seconds" class="edmstodd"') ?>
                                                                </li></ul>
                                                            </td>
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
                <div class="col-xs-12">
                    <fieldset>
                        <legend style="background-color: transparent;color: #000; font-weight: 700;font-size: 14px;">Centroid (Longitude and Latitude)</legend>
                        <p><i>For rivers/creek provide three (3) coordinates taken from the upstream, midstream and downstream of the river main channel</i></p>
                        <div class="col-xs-12 col-lg-12">
                                <table class="content-table">
                                <thead>
                                    <tr>
                                        <td colspan="5" style="font-weight: 700; font-size: 14px">Upstream Coordinates</td>
                                    </tr>
                                </thead>
                                    <tbody>
                                        <tr>
                                            <td>Longitude</td>
                                            <td width="">
                                                <table class="content-table">
                                                    <tbody>
                                                        <tr>
                                                            <td>Decimal Degree</td><td colspan="2"><ul><li><?= form_input('edit-hupstreamddlongoutput','','id="edit-hupstreamddlongoutput"')?></li></ul></td>
                                                            <td class="hidden"><?php echo form_button('en','Enable/Disable','class="hupstreamDecimal Degree"') ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Direction','for=""').form_dropdown('edit-hupstream_longitude_dms_direction',$direct_long,'',' id="edit-hupstream_longitude_dms_direction"'); ?>
                                                                </li></ul>
                                                                </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Degree (°)','for="edit-hupstream_longitude_dms_degrees"').form_input('edit-hupstream_longitude_dms_degrees','','id="edit-hupstream_longitude_dms_degrees" class="edmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Minute (ˈ)','for="edit-hupstream_longitude_dms_minutes"').form_input('edit-hupstream_longitude_dms_minutes','','id="edit-hupstream_longitude_dms_minutes" class="edmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Second (")','for="edit-hupstream_longitude_dms_seconds"').form_input('edit-hupstream_longitude_dms_seconds','','id="edit-hupstream_longitude_dms_seconds" class="edmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                        </tr>                                                        
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Latitude</td>
                                            <td width="">
                                                <table class="content-table">
                                                    <tbody>
                                                        <tr>
                                                            <td>Decimal Degree</td><td colspan="2"><ul><li><?= form_input('edit-hupstreamddlatoutput','','id="edit-hupstreamddlatoutput"') ?></li></ul></td>
                                                            <td class="hidden"><?php echo form_button('en','Enable/Disable','class="heupstreamDecimal Degrees"') ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <ul><li>
                                                                   <?= form_label('Direction','for=""').form_dropdown('edit-hupstream_latitude_dms_direction',$direct_lat,'',' id="edit-hupstream_latitude_dms_direction"'); ?>
                                                                </li></ul>
                                                                </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Degree (°)','for="edit-hupstream_latitude_dms_degrees"').form_input('edit-hupstream_latitude_dms_degrees','','id="edit-hupstream_latitude_dms_degrees" class="edmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Minute (ˈ)','for="edit-hupstream_latitude_dms_minutes"').form_input('edit-hupstream_latitude_dms_minutes','','id="edit-hupstream_latitude_dms_minutes" class="edmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Second (")','for="edit-hupstream_latitude_dms_seconds"').form_input('edit-hupstream_latitude_dms_seconds','','id="edit-hupstream_latitude_dms_seconds" class="edmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                        </tr>                                                        
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-xs-12 col-lg-12">
                                <table class="content-table">
                                <thead>
                                    <tr>
                                        <td colspan="5" style="font-weight: 700; font-size: 14px">Midstream Coordinates</td>
                                    </tr>
                                </thead>
                                    <tbody>
                                        <tr>
                                            <td>Longitude</td>
                                            <td width="">
                                                <table class="content-table">
                                                    <tbody>
                                                        <tr>
                                                            <td>Decimal Degree</td><td colspan="2"><ul><li><?= form_input('edit-hmidstreamddlongoutput','','id="edit-hmidstreamddlongoutput"')?></li></ul></td>
                                                            <td class="hidden"><?php echo form_button('en','Enable/Disable','class="hemidstreamDecimal Degree"') ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Direction','for=""').form_dropdown('edit-hmidstream_longitude_dms_direction',$direct_long,'',' id="edit-hmidstream_longitude_dms_direction"'); ?>
                                                                </li></ul>
                                                                </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Degree (°)','for="edit-hmidstream_longitude_dms_degrees"').form_input('edit-hmidstream_longitude_dms_degrees','','id="edit-hmidstream_longitude_dms_degrees" class="edmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Minute (ˈ)','for="edit-hmidstream_longitude_dms_minutes"').form_input('edit-hmidstream_longitude_dms_minutes','','id="edit-hmidstream_longitude_dms_minutes" class="edmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Second (")','for="edit-hmidstream_longitude_dms_seconds"').form_input('edit-hmidstream_longitude_dms_seconds','','id="edit-hmidstream_longitude_dms_seconds" class="edmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                        </tr>                                                        
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Latitude</td>
                                            <td width="">
                                                <table class="content-table">
                                                    <tbody>
                                                        <tr>
                                                            <td>Decimal Degree</td><td colspan="2"><ul><li><?= form_input('edit-hmidstreamddlatoutput','','id="edit-hmidstreamddlatoutput"') ?></li></ul></td>
                                                            <td class="hidden"><?php echo form_button('en','Enable/Disable','class="hemidstreamDecimal Degrees"') ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <ul><li>
                                                                   <?= form_label('Direction','for=""').form_dropdown('edit-hmidstream_latitude_dms_direction',$direct_lat,'',' id="edit-hmidstream_latitude_dms_direction"'); ?>
                                                                </li></ul>
                                                                </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Degree (°)','for="edit-hmidstream_latitude_dms_degrees"').form_input('edit-hmidstream_latitude_dms_degrees','','id="edit-hmidstream_latitude_dms_degrees" class="edmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Minute (ˈ)','for="edit-hmidstream_latitude_dms_minutes"').form_input('edit-hmidstream_latitude_dms_minutes','','id="edit-hmidstream_latitude_dms_minutes" class="edmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Second (")','for="edit-hmidstream_latitude_dms_seconds"').form_input('edit-hmidstream_latitude_dms_seconds','','id="edit-hmidstream_latitude_dms_seconds" class="edmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                        </tr>                                                        
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-xs-12 col-lg-12">
                                <table class="content-table">
                                <thead>
                                    <tr>
                                        <td colspan="5" style="font-weight: 700; font-size: 14px">Downstream Coordinates</td>
                                    </tr>
                                </thead>
                                    <tbody>
                                        <tr>
                                            <td>Longitude</td>
                                            <td width="">
                                                <table class="content-table">
                                                    <tbody>
                                                        <tr>
                                                            <td>Decimal Degree</td><td colspan="2"><ul><li><?= form_input('edit-hdownstreamddlongoutput','','id="edit-hdownstreamddlongoutput"')?></li></ul></td>
                                                            <td class="hidden"><?php echo form_button('en','Enable/Disable','class="hedownstreamDecimal Degree"') ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Direction','for=""').form_dropdown('edit-hdownstream_longitude_dms_direction',$direct_long,'',' id="edit-hdownstream_longitude_dms_direction"'); ?>
                                                                </li></ul>
                                                                </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Degree (°)','for="edit-hdownstream_longitude_dms_degrees"').form_input('edit-hdownstream_longitude_dms_degrees','','id="edit-hdownstream_longitude_dms_degrees" class="edmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Minute (ˈ)','for="edit-hdownstream_longitude_dms_minutes"').form_input('edit-hdownstream_longitude_dms_minutes','','id="edit-hdownstream_longitude_dms_minutes" class="edmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Second (")','for="edit-hdownstream_longitude_dms_seconds"').form_input('edit-hdownstream_longitude_dms_seconds','','id="edit-hdownstream_longitude_dms_seconds" class="edmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                        </tr>                                                        
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Latitude</td>
                                            <td width="">
                                                <table class="content-table">
                                                    <tbody>
                                                        <tr>
                                                            <td>Decimal Degree</td><td colspan="2"><ul><li><?= form_input('edit-hdownstreamddlatoutput','','id="edit-hdownstreamddlatoutput"') ?></li></ul></td>
                                                            <td class="hidden"><?php echo form_button('en','Enable/Disable','class="hedownstreamDecimal Degrees"') ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <ul><li>
                                                                   <?= form_label('Direction','for=""').form_dropdown('edit-hdownstream_latitude_dms_direction',$direct_lat,'',' id="edit-hdownstream_latitude_dms_direction"'); ?>
                                                                </li></ul>
                                                                </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Degree (°)','for="edit-hdownstream_latitude_dms_degrees"').form_input('edit-hdownstream_latitude_dms_degrees','','id="edit-hdownstream_latitude_dms_degrees" class="edmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Minute (ˈ)','for="edit-hdownstream_latitude_dms_minutes"').form_input('edit-hdownstream_latitude_dms_minutes','','id="edit-hdownstream_latitude_dms_minutes" class="edmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Second (")','for="edit-hdownstream_latitude_dms_seconds"').form_input('edit-hdownstream_latitude_dms_seconds','','id="edit-hdownstream_latitude_dms_seconds" class="edmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                        </tr>                                                        
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                    </fieldset>
                </div>
                    <div class="col-xs-12">
                        <div class="col-xs-12 col-lg-12">
                            <fieldset>
                                <legend>Description</legend>
                                <?php echo form_textarea('edit-hiw_desc','','id="edit-hiw_desc" placeholder="Biological Features/Physical Features"'); ?>
                            </fieldset>
                        </div>
                    </div>
                    <div class="col-xs-12 " style="margin-top:10px">
                        <div class="col-xs-12 ">
                            <div class="modal-footer">
                                <!-- <input class="btn btn-info" type="submit" name="submit" value="Update" id="UpdatecaveRHuman" onclick="Updatehiw();" /> -->
                                <button class="btn btn-info" type="button" onclick="Updatehiw();" />Update
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>

<form method="post" action="" id="iwForm" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-iw" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Inland Wetland</h4>
                </div>
                <input type="hidden" id="iw-id" name="iw-id" value="" />
                <input type="hidden" id="iw-gencode" name="iw-gencode" value="" />
                <div class="modal-body" >
                    <div class="col-xs-12 col-lg-12 col-sm-12">
                            <fieldset>
                                <legend style="background-color: transparent;color: black;font-weight: 700">Individual Map Image</legend>
                                    <img id="edit-blahinlandedit" src="<?php echo base_url("bmb_assets2/upload/iwimg/nophoto.jpg") ?>" alt="your image" class="upload-btn-wrapper" />
                                    <br>
                                    <input type='file' name="edit-pic_inlandimg" id="edit-pic_inlandimg" onchange="readURLinlandedit(this);"  /><br>
                                    <input type="hidden" name="edit-old_pictureinland" id="edit-old_pictureinland">
                                    <span id="edit-img_inlandspan" class="edit-img_inlandspan"></span>
                            </fieldset>
                            <fieldset>
                                <div class="col-xs-12">
                                    <div class="col-xs-12 col-lg-12 ">
                                        <ul><li>
                                            <?= form_label('Current file attached','','for="zip_shp_file_inland"')?>
                                            <a href="" id="zip_shp_file_inland" target="_blank"></a>
                                        </li></ul>
                                    </div>
                                </div>
                                <legend style="background-color: transparent;color: black;font-weight: 700">Upload Shapefile <i>(note: zip file)</i></legend>
                                <input type='file' name="edit-zip_shpfile_inland" id="edit-zip_shpfile_inland" onchange="readURLinlandSHPedit(this);"  />
                                <span id="edit-shpzip_iw" class="edit-shpzip_iw hidden"></span><br>
                                <input type="hidden" id="edit-shpzip_iwinput" class="edit-shpzip_iwinput">
                            </fieldset>
                        </div>
                    <div class="col-xs-12">
                        <div class="col-xs-12 col-lg-12">
                            <ul><li>
                                <?= form_label('Wetland site name').form_input('edit-iwname','','placeholder="Site name" id="edit-iwname"') ?>
                            </li></ul>
                        </div>
                    </div>
                    <fieldset>
                        <legend>Location</legend>
                        <div class="col-xs-12">
                            <div id="iwdiv1">
                                <div class="col-xs-6 col-lg-6">
                                    <ul><li>
                                        <?= form_label('Province', '','for="edit-iwProvText"').form_input('edit-iwProvText', '', 'placeholder=" " id="edit-iwProvText"'); ?>
                                    </li></ul>
                                </div>
                                <div class="col-xs-6 col-lg-6">
                                    <ul><li>
                                        <?= form_label('Municipality', '','for="edit-iwMunicipalText"').form_input('edit-iwMunicipalText', '', 'placeholder=" " id="edit-iwMunicipalText"'); ?>
                                    </li></ul>
                                </div>
                            </div>
                            <div id="iwdiv2">
                                <div class="col-xs-6 col-lg-6">
                                    <ul><li>
                                        <?php echo form_label('Province','','for="edit-iwprovid"').form_dropdown('edit-iwprovid',$provinceList,'',' id="edit-iwprovid"') ?>
                                        <div class="iwmunicipal_error"></div>
                                    </li></ul>
                                </div>
                                <div class="col-xs-6 col-lg-6">
                                    <ul><li>
                                        <?php echo form_label('Municipality','','for="edit-iwmunid"').form_dropdown('edit-iwmunid','','',' id="edit-iwmunid"') ?>
                                    </li></ul>
                                </div>
                            </div>
                             <input type="hidden" name="indepiw" id="indepiw">
                            <?php echo form_input('edit-providsiw', '', 'placeholder=" " id="edit-providsiw" class="hide"'); ?>
                            <?php echo form_input('edit-munidsiw', '', 'placeholder=" " id="edit-munidsiw" class="hide"'); ?>
                            <input type="button" id="clickmeplsiw" value="change">
                        </div>
                    </fieldset>
                    <div class="col-xs-12">
                        <div class="col-xs-6 col-lg-6">
                            <ul><li>
                                <?= form_label('Approximate area (has)','','for="edit-iwarea"').form_input('edit-iwarea','','placeholder="hectares"  id="edit-iwarea"'); ?>
                            </li></ul>
                        </div>
                        <div class="col-xs-6 col-lg-6">
                            <ul><li>
                                <?= form_label('Wetland type','','for="edit-iwtype"').form_dropdown('edit-iwtype',$iwtype,'',' id="edit-iwtype"'); ?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <fieldset><legend style="background-color: transparent;color: #444; font-weight: 700;font-size: 14px;">Water Classification</legend>
                            <div class="col-xs-6 col-lg-6">
                                <ul><li>
                                    <?= form_label('&nbsp;','','edit-inlandwaterbodyclass').form_dropdown('edit-inlandwaterbodyclass',$waterclass,'','id="edit-inlandwaterbodyclass"') ?>
                                </li></ul>
                            </div>
                            <div class="col-xs-6">
                                <ul><li>
                                    <?php echo form_label('&nbsp;').form_dropdown('edit-inlandwaterbodyclassSub','','','id="edit-inlandwaterbodyclassSub"') ?>
                                </li></ul>
                            </div>
                        </fieldset>
                    <div class="col-xs-12">
                        <div class="col-xs-6 col-lg-6">
                            <ul><li>
                                <?= form_label('Year assessed', '','for="edit-iwassessed"').form_dropdown('edit-iwassessed', $yearListed,'',' id="edit-iwassessed"'); ?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 hidden">
                        <fieldset>
                        <legend>Coordinates</legend>
                            <div class="col-xs-6 col-lg-6">
                                <ul><li>
                                    <?= form_label('Longitude', '','for="edit-iwlong"').form_input('edit-iwlong', '', 'placeholder="Coordinates(Longitude)" id="edit-iwlong"'); ?>
                                </li></ul>
                            </div>
                            <div class="col-xs-6 col-lg-6">
                                <ul><li>
                                    <?= form_label('Latitude', '','for="edit-iwlat"').form_input('edit-iwlat', '', 'placeholder="Coordinates(Latitude)" id="edit-iwlat"'); ?>
                                </li></ul>
                            </div>
                        </fieldset>
                    </div>
                    <fieldset>
                    <legend style="background-color: transparent;color: #000; font-weight: 700;font-size: 14px;">Centroid for Geographic Location</legend>
                        <div class="col-xs-12">
                            <div class="col-xs-12 col-lg-12">
                                <table class="content-table">
                                    <tbody>
                                        <tr>
                                            <td>Longitude</td>
                                            <td width="">
                                                <table class="content-table">
                                                    <tbody>
                                                        <tr>
                                                            <td>Decimal Degree</td><td colspan="2"><ul><li><?= form_input('edit-iwddlongoutput','','id="edit-iwddlongoutput"')?></li></ul></td>
                                                            <td class="hidden"><?php echo form_button('en','Enable/Disable','class="edit-iwendis"') ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Direction','for=""').form_dropdown('edit-iw_longitude_dms_direction',$direct_long,'',' id="edit-iw_longitude_dms_direction"'); ?>
                                                                </li></ul>
                                                                </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Degree (°)','for="edit-iw_longitude_dms_degrees"').form_input('edit-iw_longitude_dms_degrees','','id="edit-iw_longitude_dms_degrees" class="edmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Minute (ˈ)','for="edit-iw_longitude_dms_minutes"').form_input('edit-iw_longitude_dms_minutes','','id="edit-iw_longitude_dms_minutes" class="edmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Second (")','for="edit-iw_longitude_dms_seconds"').form_input('edit-iw_longitude_dms_seconds','','id="edit-iw_longitude_dms_seconds" class="edmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                        </tr>                                                        
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Latitude</td>
                                            <td width="">
                                                <table class="content-table">
                                                    <tbody>
                                                        <tr>
                                                            <td>Decimal Degree</td><td colspan="2"><ul><li><?= form_input('edit-iwddlatoutput','','id="edit-iwddlatoutput"') ?></li></ul></td>
                                                            <td class="hidden"><?php echo form_button('en','Enable/Disable','class="edit-iwendiss"') ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <ul><li>
                                                                   <?= form_label('Direction','for=""').form_dropdown('edit-iw_latitude_dms_direction',$direct_lat,'',' id="edit-iw_latitude_dms_direction"'); ?>
                                                                </li></ul>
                                                                </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Degree (°)','for="edit-iw_latitude_dms_degrees"').form_input('edit-iw_latitude_dms_degrees','','id="edit-iw_latitude_dms_degrees" class="edmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Minute (ˈ)','for="edit-iw_latitude_dms_minutes"').form_input('edit-iw_latitude_dms_minutes','','id="edit-iw_latitude_dms_minutes" class="edmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Second (")','for="edit-iw_latitude_dms_seconds"').form_input('edit-iw_latitude_dms_seconds','','id="edit-iw_latitude_dms_seconds" class="edmstodd"') ?>
                                                                </li></ul>
                                                            </td>
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
                <div class="col-xs-12">
                    <fieldset>
                        <legend style="background-color: transparent;color: #000; font-weight: 700;font-size: 14px;">Centroid (Longitude and Latitude)</legend>
                        <p><i>For rivers/creek provide three (3) coordinates taken from the upstream, midstream and downstream of the river main channel</i></p>
                        <div class="col-xs-12 col-lg-12">
                                <table class="content-table">
                                <thead>
                                    <tr>
                                        <td colspan="5" style="font-weight: 700; font-size: 14px">Upstream Coordinates</td>
                                    </tr>
                                </thead>
                                    <tbody>
                                        <tr>
                                            <td>Longitude</td>
                                            <td width="">
                                                <table class="content-table">
                                                    <tbody>
                                                        <tr>
                                                            <td>Decimal Degree</td><td colspan="2"><ul><li><?= form_input('edit-upstreamddlongoutput','','id="edit-upstreamddlongoutput"')?></li></ul></td>
                                                            <td class="hidden"><?php echo form_button('en','Enable/Disable','class="upstreamDecimal Degree"') ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Direction','for=""').form_dropdown('edit-upstream_longitude_dms_direction',$direct_long,'',' id="edit-upstream_longitude_dms_direction"'); ?>
                                                                </li></ul>
                                                                </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Degree (°)','for="edit-upstream_longitude_dms_degrees"').form_input('edit-upstream_longitude_dms_degrees','','id="edit-upstream_longitude_dms_degrees" class="edmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Minute (ˈ)','for="edit-upstream_longitude_dms_minutes"').form_input('edit-upstream_longitude_dms_minutes','','id="edit-upstream_longitude_dms_minutes" class="edmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Second (")','for="edit-upstream_longitude_dms_seconds"').form_input('edit-upstream_longitude_dms_seconds','','id="edit-upstream_longitude_dms_seconds" class="edmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                        </tr>                                                        
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Latitude</td>
                                            <td width="">
                                                <table class="content-table">
                                                    <tbody>
                                                        <tr>
                                                            <td>Decimal Degree</td><td colspan="2"><ul><li><?= form_input('edit-upstreamddlatoutput','','id="edit-upstreamddlatoutput"') ?></li></ul></td>
                                                            <td class="hidden"><?php echo form_button('en','Enable/Disable','class="eupstreamDecimal Degrees"') ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <ul><li>
                                                                   <?= form_label('Direction','for=""').form_dropdown('edit-upstream_latitude_dms_direction',$direct_lat,'',' id="edit-upstream_latitude_dms_direction"'); ?>
                                                                </li></ul>
                                                                </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Degree (°)','for="edit-upstream_latitude_dms_degrees"').form_input('edit-upstream_latitude_dms_degrees','','id="edit-upstream_latitude_dms_degrees" class="edmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Minute (ˈ)','for="edit-upstream_latitude_dms_minutes"').form_input('edit-upstream_latitude_dms_minutes','','id="edit-upstream_latitude_dms_minutes" class="edmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Second (")','for="edit-upstream_latitude_dms_seconds"').form_input('edit-upstream_latitude_dms_seconds','','id="edit-upstream_latitude_dms_seconds" class="edmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                        </tr>                                                        
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-xs-12 col-lg-12">
                                <table class="content-table">
                                <thead>
                                    <tr>
                                        <td colspan="5" style="font-weight: 700; font-size: 14px">Midstream Coordinates</td>
                                    </tr>
                                </thead>
                                    <tbody>
                                        <tr>
                                            <td>Longitude</td>
                                            <td width="">
                                                <table class="content-table">
                                                    <tbody>
                                                        <tr>
                                                            <td>Decimal Degree</td><td colspan="2"><ul><li><?= form_input('edit-midstreamddlongoutput','','id="edit-midstreamddlongoutput"')?></li></ul></td>
                                                            <td class="hidden"><?php echo form_button('en','Enable/Disable','class="emidstreamDecimal Degree"') ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Direction','for=""').form_dropdown('edit-midstream_longitude_dms_direction',$direct_long,'',' id="edit-midstream_longitude_dms_direction"'); ?>
                                                                </li></ul>
                                                                </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Degree (°)','for="edit-midstream_longitude_dms_degrees"').form_input('edit-midstream_longitude_dms_degrees','','id="edit-midstream_longitude_dms_degrees" class="edmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Minute (ˈ)','for="edit-midstream_longitude_dms_minutes"').form_input('edit-midstream_longitude_dms_minutes','','id="edit-midstream_longitude_dms_minutes" class="edmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Second (")','for="edit-midstream_longitude_dms_seconds"').form_input('edit-midstream_longitude_dms_seconds','','id="edit-midstream_longitude_dms_seconds" class="edmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                        </tr>                                                        
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Latitude</td>
                                            <td width="">
                                                <table class="content-table">
                                                    <tbody>
                                                        <tr>
                                                            <td>Decimal Degree</td><td colspan="2"><ul><li><?= form_input('edit-midstreamddlatoutput','','id="edit-midstreamddlatoutput"') ?></li></ul></td>
                                                            <td class="hidden"><?php echo form_button('en','Enable/Disable','class="emidstreamDecimal Degrees"') ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <ul><li>
                                                                   <?= form_label('Direction','for=""').form_dropdown('edit-midstream_latitude_dms_direction',$direct_lat,'',' id="edit-midstream_latitude_dms_direction"'); ?>
                                                                </li></ul>
                                                                </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Degree (°)','for="edit-midstream_latitude_dms_degrees"').form_input('edit-midstream_latitude_dms_degrees','','id="edit-midstream_latitude_dms_degrees" class="edmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Minute (ˈ)','for="edit-midstream_latitude_dms_minutes"').form_input('edit-midstream_latitude_dms_minutes','','id="edit-midstream_latitude_dms_minutes" class="edmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Second (")','for="edit-midstream_latitude_dms_seconds"').form_input('edit-midstream_latitude_dms_seconds','','id="edit-midstream_latitude_dms_seconds" class="edmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                        </tr>                                                        
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-xs-12 col-lg-12">
                                <table class="content-table">
                                <thead>
                                    <tr>
                                        <td colspan="5" style="font-weight: 700; font-size: 14px">Downstream Coordinates</td>
                                    </tr>
                                </thead>
                                    <tbody>
                                        <tr>
                                            <td>Longitude</td>
                                            <td width="">
                                                <table class="content-table">
                                                    <tbody>
                                                        <tr>
                                                            <td>Decimal Degree</td><td colspan="2"><ul><li><?= form_input('edit-downstreamddlongoutput','','id="edit-downstreamddlongoutput"')?></li></ul></td>
                                                            <td class="hidden"><?php echo form_button('en','Enable/Disable','class="edownstreamDecimal Degree"') ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Direction','for=""').form_dropdown('edit-downstream_longitude_dms_direction',$direct_long,'',' id="edit-downstream_longitude_dms_direction"'); ?>
                                                                </li></ul>
                                                                </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Degree (°)','for="edit-downstream_longitude_dms_degrees"').form_input('edit-downstream_longitude_dms_degrees','','id="edit-downstream_longitude_dms_degrees" class="edmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Minute (ˈ)','for="edit-downstream_longitude_dms_minutes"').form_input('edit-downstream_longitude_dms_minutes','','id="edit-downstream_longitude_dms_minutes" class="edmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Second (")','for="edit-downstream_longitude_dms_seconds"').form_input('edit-downstream_longitude_dms_seconds','','id="edit-downstream_longitude_dms_seconds" class="edmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                        </tr>                                                        
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Latitude</td>
                                            <td width="">
                                                <table class="content-table">
                                                    <tbody>
                                                        <tr>
                                                            <td>Decimal Degree</td><td colspan="2"><ul><li><?= form_input('edit-downstreamddlatoutput','','id="edit-downstreamddlatoutput"') ?></li></ul></td>
                                                            <td class="hidden"><?php echo form_button('en','Enable/Disable','class="edownstreamDecimal Degrees"') ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <ul><li>
                                                                   <?= form_label('Direction','for=""').form_dropdown('edit-downstream_latitude_dms_direction',$direct_lat,'',' id="edit-downstream_latitude_dms_direction"'); ?>
                                                                </li></ul>
                                                                </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Degree (°)','for="edit-downstream_latitude_dms_degrees"').form_input('edit-downstream_latitude_dms_degrees','','id="edit-downstream_latitude_dms_degrees" class="edmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Minute (ˈ)','for="edit-downstream_latitude_dms_minutes"').form_input('edit-downstream_latitude_dms_minutes','','id="edit-downstream_latitude_dms_minutes" class="edmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Second (")','for="edit-downstream_latitude_dms_seconds"').form_input('edit-downstream_latitude_dms_seconds','','id="edit-downstream_latitude_dms_seconds" class="edmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                        </tr>                                                        
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                    </fieldset>
                </div>
                    <div class="col-xs-12">
                        <div class="col-xs-12 col-lg-12">
                            <fieldset>
                                <legend>Description</legend>
                                <?php echo form_textarea('edit-iw_desc','','id="edit-iw_desc" placeholder="Biological Features/Physical Features"'); ?>
                            </fieldset>
                        </div>
                    </div>
                    <div class="col-xs-12 " style="margin-top:10px">
                        <div class="col-xs-12 ">
                            <div class="modal-footer">

                                <button class="btn btn-info" type="button" onclick="Updateiw();" />Update

                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>
</form>

<form method="post" action="" id="cavesForm" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-caves" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Caves</h4>
                </div>
                <input type="hidden" id="caves-id" name="caves-id" value="" />
                <input type="hidden" id="caves-gencode" name="caves-gencode" value="" />
                <input type="hidden" id="caves-gencodex" name="caves-gencodex" value="" />
                <div class="modal-body" >
                        <div class="col-xs-12">
                                <div class="col-xs-12">
                                    <fieldset>
                                        <legend style="background-color: transparent;color: black;font-weight: 700">Upload Shapefile <i>(note: zip and rar file; and maximum of 200mb only)</i></legend>
                                        <input type='file' name="edit-zip_shpfile_cave" id="edit-zip_shpfile_cave" onchange="readURLcavesSHPEdit(this);"  />
                                        <input type="hidden" name="edit-new_shpfilecave" id="edit-new_shpfilecave">
                                        <input type="hidden" name="edit-old_shpfilecave" id="edit-old_shpfilecave">
                                        <div id="caveshpfilediv"></div>
                                    </fieldset>
                                </div>
                                <div class="col-xs-12">
                                    <div class="col-xs-12 col-lg-6">
                                        <ul><li>
                                            <?= form_label('Name of Cave', '','for="edit-cave_name"').form_input('edit-cave_name', '', 'placeholder="Name of Cave" id="edit-cave_name"'); ?>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-12 col-lg-6">
                                        <ul><li>
                                            <?= form_label('Size of the area (meters)','','for="edit-caves_area"').form_input('edit-caves_area','','placeholder="Meters" class="number-separator" id="edit-caves_area"'); ?>
                                        </li></ul>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <fieldset><legend>Existing Location</legend>
                                        <div id="getMe">
                                            <div class="col-xs-12 col-lg-4">
                                                <ul><li>
                                                    <?= form_label('Province', '','for="edit-caveProv"').form_input('edit-caveProv', '', 'placeholder=" " id="edit-caveProv"'); ?>
                                                </li></ul>
                                            </div>
                                            <div class="col-xs-12 col-lg-4">
                                                <ul><li>
                                                    <?= form_label('Municipality', '','for="edit-caveMunicipal"').form_input('edit-caveMunicipal', '', 'placeholder=" " id="edit-caveMunicipal"'); ?>
                                                </li></ul>
                                            </div>
                                            <div class="col-xs-12 col-lg-4">
                                                <ul><li>
                                                    <?= form_label('Barangay', '','for="edit-caveBarangay"').form_input('edit-caveBarangay', '', 'placeholder=" " id="edit-caveBarangay"'); ?>
                                                </li></ul>
                                            </div>
                                        </div>
                                            <div id="getMe2">
                                                <div class="col-xs-12 col-lg-4">
                                                    <ul><li>
                                                        <?php echo form_label('Province','','for="edit-caveprovid"').form_dropdown('edit-caveprovid',$provinceList,'',' id="edit-caveprovid"') ?>
                                                        <div class="edit-cavemunicipal_error"></div>
                                                    </li></ul>
                                                </div>
                                                <div class="col-xs-12 col-lg-4">
                                                    <ul><li>
                                                        <?php echo form_label('Municipality','','for="edit-cavemunid"').form_dropdown('edit-cavemunid','','',' id="edit-cavemunid"')?>
                                                        <div class="edit-cavebarangay_error"></div>
                                                    </li></ul>
                                                </div>
                                                <div class="col-xs-12 col-lg-4">
                                                    <ul><li>
                                                        <?php echo form_label('Barangay','','for="edit-cavebarid"').form_dropdown('edit-cavebarid','','',' id="edit-cavebarid"')?>
                                                    </li></ul>
                                                </div>
                                            </div>
                                            <input type="hidden" name="indep" id="indep">
                                            <?php echo form_input('edit-provids', '', 'placeholder=" " id="edit-provids" class="hide"'); ?>
                                            <?php echo form_input('edit-munids', '', 'placeholder=" " id="edit-munids" class="hide"'); ?>
                                            <?php echo form_input('edit-barids', '', 'placeholder=" " id="edit-barids" class="hide"'); ?>

                                        <input type="button" id="clickmepls" value="change">
                                    </fieldset>
                                </div>
                                <div class="col-xs-12">
                                    <div class="col-xs-12 col-lg-4">
                                        <ul><li>
                                            <?php echo form_label('Status','','for="edit-cavestatus"').form_dropdown('edit-cavestatus',$cavestatus,'',' id="edit-cavestatus"') ?>
                                        </li></ul>
                                    </div>
                                </div>
                                <fieldset>
                                <legend style="background-color: transparent;color: #000; font-weight: 700;font-size: 14px;">Coordinates (point location)</legend>
                                <div class="col-xs-12">
                                    <div class="col-xs-12 col-lg-12">
                                        <table class="content-table">
                                            <tbody>
                                                <tr>
                                                    <td>Longitude</td>
                                                    <td width="">
                                                        <table class="content-table">
                                                            <tbody>
                                                                <tr>
                                                                    <td>Decimal Degree</td><td colspan="3"><ul><li><?= form_input('edit-clongoutputdd','','id="edit-clongoutputdd"')?></li></ul></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <ul><li>
                                                                            <?= form_label('Direction','for=""').form_dropdown('edit-clongdmsdir',$direct_long,'',' id="edit-clongdmsdir"'); ?>
                                                                        </li></ul>
                                                                        </td>
                                                                    <td>
                                                                        <ul><li>
                                                                            <?= form_label('Degree (°)','for="edit-clongdmsdegree"').form_input('edit-clongdmsdegree','','id="edit-clongdmsdegree" class="edmstodd"') ?>
                                                                        </li></ul>
                                                                    </td>
                                                                    <td>
                                                                        <ul><li>
                                                                            <?= form_label('Minute (ˈ)','for="edit-clongdmsminute"').form_input('edit-clongdmsminute','','id="edit-clongdmsminute" class="edmstodd"') ?>
                                                                        </li></ul>
                                                                    </td>
                                                                    <td>
                                                                        <ul><li>
                                                                            <?= form_label('Second (")','for="edit-clongdmssecond"').form_input('edit-clongdmssecond','','id="edit-clongdmssecond" class="edmstodd"') ?>
                                                                        </li></ul>
                                                                    </td>
                                                                </tr>
                                                                
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Latitude</td>
                                                    <td width="">
                                                        <table class="content-table">
                                                            <tbody>
                                                                <tr>
                                                                    <td>Decimal Degree</td><td colspan="3"><ul><li><?= form_input('edit-clatoutputdd','','id="edit-clatoutputdd"') ?></li></ul></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <ul><li>
                                                                           <?= form_label('Direction','for=""').form_dropdown('edit-clatdmsdir',$direct_lat,'',' id="edit-clatdmsdir"'); ?>
                                                                        </li></ul>
                                                                        </td>
                                                                    <td>
                                                                        <ul><li>
                                                                            <?= form_label('Degree (°)','for="edit-clatdmsdegree"').form_input('edit-clatdmsdegree','','id="edit-clatdmsdegree" class="edmstodd"') ?>
                                                                        </li></ul>
                                                                    </td>
                                                                    <td>
                                                                        <ul><li>
                                                                            <?= form_label('Minute (ˈ)','for="edit-clatdmsminute"').form_input('edit-clatdmsminute','','id="edit-clatdmsminute" class="edmstodd"') ?>
                                                                        </li></ul>
                                                                    </td>
                                                                    <td>
                                                                        <ul><li>
                                                                            <?= form_label('Second (")','for="edit-clatdmssecond"').form_input('edit-clatdmssecond','','id="edit-clatdmssecond" class="edmstodd"') ?>
                                                                        </li></ul>
                                                                    </td>
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
                                <div class="col-xs-12">
                                    <!-- <fieldset> -->
                                        <!-- <legend>Cave Classification</legend> -->
                                            <div class="col-xs-12 col-lg-12">
                                                <div class="col-xs-6 col-lg-6">
                                                    <ul><li>
                                                    <?= form_label('Cave Classification', '','for="edit-caveclass"').form_dropdown('edit-caveclass',$cave_landstat,'',' id="edit-caveclass"'); ?>
                                                    </li></ul>
                                                </div>
                                                <div class="col-xs-6 col-lg-6">
                                                    <ul><li>
                                                    <?= form_label('Sub Classification;', '','for="edit-cavesubclass"').form_dropdown('edit-cavesubclass','','',' id="edit-cavesubclass"'); ?>
                                                    <span class="editerror_caveclass"></span>
                                                    </li></ul>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-lg-12">
                                                <div class="col-xs-12 col-lg-12" id="edit-cave_others">
                                                    <ul><li>
                                                    <?= form_label('Cave classification details', '','for="edit-cave_landstat_others"').form_textarea('edit-cave_landstat_others', '', 'placeholder="Specify others" id="edit-cave_landstat_others"'); ?>
                                                    </li></ul>
                                                </div>
                                            </div>
                                    <!-- </fieldset> -->
                                </div>
                                 <div class="col-xs-12 col-lg-12 col-md-12">
                                    <ul><li>
                                        <label>Caves images</label>
                                        <input type="file" name="edit-files_caves" id="edit-files_caves" multiple />
                                    </li></ul>
                                </div>
                                <div class="col-xs-12 col-lg-12">
                                    <label>Caves Images</label>
                                    <div id="caveimagedisplay"></div>
                                </div>
                                <div class="col-xs-12 col-lg-12">
                                    <div>
                                        <label>Date Created : </label><span id="date_create_div_cave"></span>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-lg-12">
                                    <div>
                                        <label>Date last updated : </label><span id="date_update_div_cave"></span>
                                    </div>
                                </div>
                    <div class="col-xs-12 " style="margin-top:10px">
                        <div class="col-xs-12 ">
                            <div class="modal-footer">
                                <button class="btn btn-info" type="button" onclick="Updatecaves();">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>
</form>

<form method="post" action="" id="FormCoralReefedit" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-coralReef" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Coral Reef Ecosystem</h4>
                </div>
                <input type="hidden" id="coralreef-id" name="coralreef-id" value="" />
                <input type="hidden" id="coralreef-gencode" name="coralreef-gencode" value="" />
                <div class="modal-body" >
                    <fieldset>
                        <legend>Coral Reef Area</legend>
                        <div class="col-xs-12">
                            <div class="col-xs-12 col-lg-12">
                                <ul><li>
                                    <?= form_label('Coverage(ha.)','for="edit_coral_has"').form_input('edit_coral_has','',' id="edit_coral_has"') ?>
                                </li></ul>
                            </div>
                            <div class="col-xs-12 col-lg-12">
                                <ul><li>
                                    <?php echo form_label('Hard Coral Cover (%HCC)','edit_hccid').form_dropdown('edit_hccid',$hcc,'','id="edit_hccid" ') ?>
                                </li></ul>
                            </div>
                            <div class="col-xs-12 col-lg-12">
                                <ul><li>
                                    <label for="edit_hccoutput">Hard Coral Cover Condition</label><input type="text" id="edit_hccoutput" name="edit_hccoutput" />
                                </li></ul>
                            </div>
                            <div class="col-xs-12 col-lg-12">
                                <fieldset>
                                    <legend>Coastal Resource Map (kml/kmz)</legend>
                                <div class="col-xs-12">
                                    <div class="col-xs-6 col-lg-6">
                                        <input type='file' name="edit_shpfilecoral" id="edit_shpfilecoral" onchange="readURLReefshpEdit(this);" />
                                        <input type="hidden" name="edit_shpfilecoraltext" id="edit_shpfilecoraltext">
                                        <span id="edit_img_reefshpspan" class="edit_img_reefshpspan "></span><br>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="col-xs-2 col-lg-2">
                                        <a type="text" class="btn btn-primary" id="addcoralkmlkmzedit">Add</a>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="col-xs-12 col-lg-12">
                                    <br>
                                        <table id="tblcoralkmlkmz_edit" class="content-table" style="z-index: 100">
                                            <thead>
                                                <tr style="background: #fcf8e3">
                                                   <td colspan="2">Coastal Resource Map(KML/KMZ) List</td>
                                                </tr>
                                                <tr style="background: #fcf8e3">
                                                    <td>KML/KMZ</td>
                                                    <td>Remove</td>
                                                </tr>
                                            </thead>
                                            <tbody id="tbodycoralkmlkmz_edit"></tbody>
                                        </table>
                                        <table id="tblcoralkmlkmz_edit_sample" class="content-table" style="z-index: 100">
                                            <tbody id="tbodycoralkmlkmz_edit_sample"></tbody>
                                        </table>
                                        <hr>
                                    </div>
                                </div>
                                    <div>
                                        <fieldset>
                                        <legend>Existing file</legend>
                                        <div id="linkcoralkmz"></div>
                                        </fieldset>
                                    </div>
                                </fieldset>
                            </div>
                            <fieldset>
                                <legend>Monitoring station/block</legend>
                                <div id="monitoringstation"></div>
                                <div class="col-xs-12 col-lg-12 hide">
                                    <ul><li>
                                        <?= form_label('Permanent Monitoring Site (point location)','for="edit_coral_pms_points"').form_input('edit_coral_pms_points','','id="edit_coral_pms_points"') ?>
                                    </li></ul>
                                </div>
                                <div class="col-xs-12">
                                    <div class="col-xs-4 col-lg-4">
                                        <ul><li>
                                            <?= form_label('Point Location','for="edit_coral_monitoring_points"').form_input('edit_coral_monitoring_points','','id="edit_coral_monitoring_points"') ?>
                                            <span>(point location)</span>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-1 col-lg-1">
                                        <br>
                                        <a type="text" class="btn btn-primary" id="addmonitoringsiteedit">Add</a>
                                    </div>
                                    <div class="col-xs-7 col-lg-7">
                                        <table id="tblmonitoringsite_edit" class="content-table" style="z-index: 100">
                                            <thead>
                                                <tr style="background: #fcf8e3">
                                                   <td colspan="2">Monitoring station/block List</td>
                                                </tr>
                                                <tr style="background: #fcf8e3">
                                                    <td>Point location</td>
                                                    <td>Option</td>
                                                </tr>
                                            </thead>
                                            <tbody id="tbodymonitoringsite_edit"></tbody>
                                        </table>
                                        <table id="tblmonitoringsite_edit_sample" class="content-table" style="z-index: 100">
                                            <tbody id="tbodymonitoringsite_edit_sample"></tbody>
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
                                    <?php echo form_label('Month','','for="edit_coral_month"').form_dropdown('edit_coral_month',$monthList,'',' id="edit_coral_month"') ?>
                                </li></ul>
                            </div>
                            <div class="col-xs-4 col-lg-4 ">
                                <ul><li>
                                    <?php echo form_label('Day','','for="edit_coral_day"').form_dropdown('edit_coral_day',$dayList,'',' id="edit_coral_day"') ?>
                                </li></ul>
                            </div>
                            <div class="col-xs-4 col-lg-4 ">
                                <ul><li>
                                    <?php echo form_label('Year','','for="edit_coral_year"').form_dropdown('edit_coral_year',$yearListed,'',' id="edit_coral_year"') ?>
                                </li></ul>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Sampling Station/Remarks</legend>
                        <div class="col-xs-12">
                            <ul><li>
                                <?php echo form_textarea('edit_samplingstation','','id="edit_samplingstation" placeholder="Sampling station/remarks"') ?>
                            </li></ul>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Location</legend>
                        <input type="hidden" name="edit_codegen" id="edit_codegen">
                        <input type="hidden" name="edit_genCoral" id="edit_genCoral">
                        <div id="coralLocation"></div>
                        <div class="col-xs-12">
                            <div class="col-xs-4 col-lg-4">
                                <?php echo form_label('Municipality','','for="edit_coral_municipal"').form_dropdown('edit_coral_municipal',$provincesList,'',' id="edit_coral_municipal"') ?>
                            </div>
                            <div class="col-xs-4 col-lg-4">
                                <?php echo form_label('Barangay','','for="edit_coral_barangay"').form_dropdown('edit_coral_barangay','','',' id="edit_coral_barangay"') ?><br>
                            </div>
                            <div class="col-xs-4 col-lg-4">
                                <br>
                                <a type="text" class="btn btn-primary" id="addcorallocEdit">Add</a>
                            </div>
                        </div>
                        <div class="col-xs-12 ">
                            <div class="table-responsive text-nowrap" style="overflow-x:auto;">
                            <table id="edit_tblcorallo" class="content-table" style="z-index: 100">
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
                                <tbody id="edit_tbodycoralloc"></tbody>
                            </table>
                            <table id="edit_tblcorallo_sample" class="table table-bordered tglobal">
                                <tbody id="edit_tbodycoralloc_sample" style="text-align: left;border: 0 none;"></tbody>
                            </table>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Substrate Composition</legend>
                        <div class="col-xs-12">
                            <div class="col-xs-4 col-lg-4">
                                <ul><li>
                                    <?php echo form_label('Hard Coral (HC)','for="edit_hcid"').form_input('edit_hcid','','id="edit_hcid" ')?>
                                    <span>% Composition</span>
                                </li></ul>
                            </div>
                            <div class="col-xs-4 col-lg-4">
                                <ul><li>
                                    <?php echo form_label('Algal Assemblage (AA)','for="edit_aaid"').form_input('edit_aaid','','id="edit_aaid" ')?>
                                    <span>% Composition</span>
                                </li></ul>
                            </div>
                            <div class="col-xs-4 col-lg-4">
                                <ul><li>
                                    <?php echo form_label('Abiotic (AB)','for="edit_abid"').form_input('edit_abid','','id="edit_abid" ')?>
                                    <span>% Composition</span>
                                </li></ul>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="col-xs-4 col-lg-4">
                                <ul><li>
                                    <?php echo form_label('Microalgae (MA)','for="edit_maid"').form_input('edit_maid','','id="edit_maid" ')?>
                                    <span>% Composition</span>
                                </li></ul>
                            </div>
                            <div class="col-xs-4 col-lg-4">
                                <ul><li>
                                    <?php echo form_label('Halimeda (HA)','for="edit_haid"').form_input('edit_haid','','id="edit_haid" ')?>
                                    <span>% Composition</span>
                                </li></ul>
                            </div>
                            <div class="col-xs-4 col-lg-4">
                                <ul><li>
                                    <?php echo form_label('Other Biota (OB)','for="edit_obid"').form_input('edit_obid','','id="edit_obid" ')?>
                                    <span>% Composition</span>
                                </li></ul>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Dominant Species</legend>
                        <div class="col-xs-12">
                            <div id="coralspeciesdiv"></div>
                            <div class="col-xs-6 col-lg-6">
                                <?php echo form_label('Coral Species','edit_idcoralspecies').form_dropdown('edit_idcoralspecies',$coralspecies,'','id="edit_idcoralspecies" ') ?><br>
                            </div>
                            <div class="col-xs-1 col-lg-1"><br>
                                <a type="text" class="btn btn-primary" id="addcoralspeciesEdit">Add</a>
                            </div>
                        </div>
                        <div class="col-xs-12 ">
                            <div class="table-responsive text-nowrap" style="overflow-x:auto;">

                            <table id="edit_tblcoralspecies" class="content-table" style="z-index: 100">
                                <thead>
                                    <tr style="background: #fcf8e3">
                                       <td colspan="3">Coral Species List</td>
                                    </tr>
                                    <tr style="background: #fcf8e3">
                                        <td>Name of Coral Species</td>
                                        <td>Option</td>
                                    </tr>
                                </thead>
                                <tbody id="edit_tbodycoralspecies"></tbody>
                            </table>
                            <table id="edit_tblcoralspecies_sample" class="table table-bordered tglobal">
                                <tbody id="edit_tbodycoralspecies_sample" style="text-align: left;border: 0 none;"></tbody>
                            </table>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Reef Asscociated-Fishes</legend>
                        <div class="col-xs-12">
                            <h1>Species Composition</h1>
                            <div id="reefasodiv"></div>
                            <div class="col-xs-6">
                                <ul><li>
                                    <img width="250px" height="210px" id="edit_imagereef" src="<?php echo base_url("bmb_assets2/upload/coralreef/reef_photo/nophoto.jpg") ?>" alt="your image" /><br>
                                    <input type='file' name="edit_img_reef" id="edit_img_reef" onchange="readURLReefEdit(this);"  /><br>
                                    <input type="hidden" name="edit_old_picture" value="nophoto.jpg">
                                    <span id="edit_img_reefspan" class="edit_img_reefspan hide">nophoto.jpg</span>
                                </li></ul>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="col-xs-7 col-lg-7">
                                <ul><li>
                                    <?php echo form_label('Species name','for="edit_speciesName"').form_input('edit_speciesName','','id="edit_speciesName"') ?>
                                </li></ul>
                            </div>
                            <div class="col-xs-1 col-lg-1"><br>
                                <a type="text" class="btn btn-primary" id="addreefafEdit">Add</a>
                            </div>
                        </div>
                        <div class="col-xs-12 ">
                            <div class="table-responsive text-nowrap" style="overflow-x:auto;">
                            <table id="edit_tblreefaf" class="content-table" style="z-index: 100">
                                <thead>
                                    <tr style="background: #fcf8e3">
                                       <td colspan="3">Reef Asscociated-Fishes List</td>
                                    </tr>
                                    <tr style="background: #fcf8e3">
                                        <td>Species name</td>
                                        <td>Image</td>
                                        <td>Option</td>
                                    </tr>
                                </thead>
                                <tbody id="edit_tbodyreefaf"></tbody>
                            </table>
                            <table id="edit_tblreefaf_sample" class="table table-bordered tglobal">
                                <tbody id="edit_tbodyreefaf_sample" style="text-align: left;border: 0 none;"></tbody>
                            </table>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Density and Biomass</legend>
                        <div class="col-xs-12">
                            <div class="col-xs-6 col-lg-6">
                                <ul><li>
                                    <?php echo form_label('Density','for="edit_coraldensity"').form_input('edit_coraldensity','','id="edit_coraldensity" ') ?>
                                </li></ul>
                            </div>
                            <div class="col-xs-6 col-lg-6">
                                <ul><li>
                                    <?php echo form_label('Biomass','for="edit_coralbiomass"').form_input('edit_coralbiomass','','id="edit_coralbiomass" ') ?>
                                </li></ul>
                            </div>
                        </div>
                    </fieldset>
                    <div class="col-xs-12 ">
                    <div class="modal-footer">
                        <input class="btn btn-info" type="submit" name="submit" value="Update" id="Updatecoralreef" />
                <!-- <button type="button" name="btnlocation" title="Update" id="submitlocation" onclick="Updatecoralreef()" class="btn btn-primary  btn-flat"><i class="glyphicon glyphicon-floppy-open" id="glyphicon"></i></button> -->

                    </div>
                </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>

<form method="post" action="" id="FormSeagrasseditNew" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-seagrassNew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Seagrass Bed</h4>
                </div>
                <input type="hidden" id="seagrassN-id" name="seagrassN-id" value="" />
                <input type="hidden" id="seagrassN-gencode" name="seagrassN-gencode" value="" />
                <input type="hidden" id="seagrassNs-gencode" name="seagrassNs-gencode" value="" />
                <input type="hidden" id="seagrassmap-id" name="seagrassmap-id" value="" />
                <div class="modal-body" >
                    <fieldset>
                        <div class="col-xs-12">
                            <div class="col-xs-12 col-lg-12">
                                <div id="uploadseagrassmapimage"></div>
                            </div>
                            <div class="col-xs-12 col-lg-12">
                                <label>Upload map images <i>(*.png, *.jpeg, *.jpg format, maximum size of 50MB)</i></label>
                                <input type='file' name="edit-img_seagrassmap" id="edit-img_seagrassmap"/><br>
                                <input type="hidden" name="edit-img_seagrassmaptext" id="edit-img_seagrassmaptext">
                                <input type="hidden" id="edit-img_seagrassmapspan" name="edit-img_seagrassmapspan">
                            </div>
                            <fieldset>
                                <div class="col-xs-12 col-lg-12">
                                    <label>Upload Shapefile <i>(*.zip  format, maximum size of 50MB)</i></label>
                                    <input type='file' name="edit-shp_seagrass" id="edit-shp_seagrass" onchange="readURLshapefileSeagrassEdit(this);" />
                                    <input type="hidden" name="edit-shp_seagrass_txt" id="edit-shp_seagrass_txt">
                                    <input type="hidden" name="edit-shp_seagrass_old" id="edit-shp_seagrass_old">
                                    <div id="edit-fetch_seagrass_shpfile"></div>
                                </div>
                            </fieldset>
                            <div class="col-xs-12 col-lg-12">
                                <ul><li>
                                    <?= form_label('Total Coverage(ha.)','for="edit-seagrass_ha"').form_input('edit-seagrass_ha','',' id="edit-seagrass_ha" class="number-separator"') ?>
                                </li></ul>
                                <ul><li>
                                    <?= form_label('Percent Cover','for="edit-cover_value"').form_input('edit-cover_value','',' id="edit-cover_value" class="number-separator"') ?>
                                    <span>Amran, 2010, as cited in CMEMP. Reporting Guidelines (2020,2021)</span>
                                </li></ul>
                                <ul><li>
                                    <?= form_label('Category','for="edit-seagrass_condition"').form_dropdown('edit-seagrass_condition',$seagrasscondition,'','id="edit-seagrass_condition"') ?>
                                    <span>Amran, 2010, as cited in CMEMP. Reporting Guidelines (2020,2021)</span>
                                </li></ul>
                                <ul><li>
                                    <?= form_label('Seagrass species composition','for="edit-seagrass_no"').form_input('edit-seagrass_no','',' id="edit-seagrass_no" class="number-separator" placeholder="No. of seagrass species"') ?>
                                    <span class="">No. of seagrass species</span>
                                </li></ul>
                                <ul><li>
                                    <?= form_label('Diversity Index','for="edit-diversity_values"').form_input('edit-diversity_values','',' id="edit-diversity_values" class="number-separator"') ?>
                                    <span>Odum, 1983, as cited in Updated BAMS Seagrass</span>
                                </li></ul>
                                <ul><li>
                                    <?= form_label('Diversity Category','for="edit-diversity_index"').form_dropdown('edit-diversity_index',$seagrassdiversity,'','id="diversity_index"') ?>
                                    <span>Odum, 1983, as cited in Updated BAMS Seagrass</span>
                                </li></ul>
                                <ul><li>
                                    <?= form_label('Remarks','for="edit-seagrass_remarks"').form_textarea('edit-seagrass_remarks','','id="edit-seagrass_remarks"') ?><br>
                                </li></ul>
                            </div>
                            <div class="col-xs-12 col-lg-12 tooltip">
                                <div class="col-xs-12 col-lg-4">
                                    <ul><li>
                                        <?= form_label('Date conducted').form_dropdown('edit-seagrass_conducted_month',$monthList,'','id="edit-seagrass_conducted_month"'); ?>
                                    </li></ul>
                                </div>
                                 <div class="col-xs-12 col-lg-4">
                                    <ul><li>
                                        <?= form_label('&nbsp;').form_dropdown('edit-seagrass_conducted_day',$dayList,'','id="edit-seagrass_conducted_day"'); ?>
                                    </li></ul>
                                </div>
                                 <div class="col-xs-12 col-lg-4">
                                    <ul><li>
                                        <?= form_label('&nbsp;').form_dropdown('edit-seagrass_conducted_year',$yearList,'','id="edit-seagrass_conducted_year"'); ?>
                                    </li></ul>
                                </div>
                                <span class="tooltiptext">Select date conducted</span>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-info" type="button" onclick="updateseagrassessnew();" />Update
                        </div>
                    </fieldset>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>

<form method="post" action="" id="FormMangroveeditNew" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-MangroveNew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Mangrove Bed</h4>
                </div>
                <input type="hidden" id="MangroveN-id" name="MangroveN-id" value="" />
                <input type="hidden" id="MangroveN-gencode" name="MangroveN-gencode" value="" />
                <input type="hidden" id="MangroveNs-gencode" name="MangroveNs-gencode" value="" />
                <input type="hidden" id="Mangrovemap-id" name="Mangrovemap-id" value="" />
                <div class="modal-body" >
                    <fieldset>
                        <div class="col-xs-12">
                            <div class="col-xs-12 col-lg-12">
                                <div id="uploadmangrovemapimage"></div>
                            </div>
                            <div class="col-xs-12 col-lg-12">
                                <label>Upload map images <i>(*.png, *.jpeg, *.jpg format, maximum size of 50MB)</i></label>
                                <input type='file' name="edit-img_mangrovemap" id="edit-img_mangrovemap"/><br>
                                <input type="hidden" name="edit-img_mangrovemaptext" id="edit-img_mangrovemaptext">
                                <input type="hidden" id="edit-img_mangrovemapspan" name="edit-img_mangrovemapspan">
                            </div>
                            <fieldset>
                                <div class="col-xs-12 col-lg-12">
                                    <label>Upload Shapefile <i>(*.zip  format, maximum size of 50MB)</i></label>
                                    <input type='file' name="edit-shp_mangrove" id="edit-shp_mangrove" onchange="readURLshapefileMangroveEdit(this);" />
                                    <input type="hidden" name="edit-shp_mangrove_txt" id="edit-shp_mangrove_txt">
                                    <input type="hidden" name="edit-shp_mangrove_old" id="edit-shp_mangrove_old">
                                    <div id="edit-fetch_mangrove_shpfile"></div>
                                </div>
                            </fieldset>
                            <div class="col-xs-12 col-lg-12">
                                <div class="col-xs-12 col-lg-12">
                                    <ul><li>
                                        <?= form_label('Total Coverage(ha.)','for="edit-mangrove_ha"').form_input('edit-mangrove_ha','',' id="edit-mangrove_ha" class="number-separator"') ?>
                                    </li></ul>
                                </div>
                                <div class="col-xs-12 col-lg-12">
                                    <div class="col-xs-12 col-lg-6">
                                        <ul><li>
                                            <?= form_label('Crown Cover (%)','for="edit-crown_cover"').form_input('edit-crown_cover','',' id="edit-crown_cover" class="number-separator"') ?>
                                            <span>PCRA 2004</span>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-12 col-lg-6">
                                        <ul><li>
                                            <?= form_label('Crown Condition','for="edit-mangrove_condition"').form_dropdown('edit-mangrove_condition',$mangrovescondition,'','id="edit-mangrove_condition"') ?>
                                            <span>PCRA 2004</span>
                                        </li></ul>
                                    </div>                                    
                                </div>
                                <div class="col-xs-12 col-lg-12">                                    
                                    <div class="col-xs-12 col-lg-6">
                                        <ul><li>
                                            <?= form_label('Regeneration per m<sup>2</sup>','for="edit-regeneration"').form_input('edit-regeneration','',' id="edit-regeneration" class="number-separator"') ?>
                                            <span>PCRA 2004</span>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-12 col-lg-6">
                                        <ul><li>
                                            <?= form_label('Regeneration per m<sup>2</sup> Condition','for="edit-mangrove_regen"').form_dropdown('edit-mangrove_regen',$mangroveregen,'','id="edit-mangrove_regen"') ?>
                                            <span>PCRA 2004</span>
                                        </li></ul>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-lg-12">
                                    <div class="col-xs-12 col-lg-6">
                                        <ul><li>
                                            <?= form_label('Average Height (meter)','for="edit-avg_height"').form_input('edit-avg_height','',' id="edit-avg_height" class="number-separator"') ?>
                                            <span>PCRA 2004</span>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-12 col-lg-6">
                                        <ul><li>
                                            <?= form_label('Average Height Condition','for="edit-mangrove_height"').form_dropdown('edit-mangrove_height',$mangrovesaverage,'','id="edit-mangrove_height"') ?>
                                            <span>PCRA 2004</span>
                                        </li></ul>
                                    </div>                                    
                                </div>
                                <div class="col-xs-12 col-lg-12 hidden">
                                    <div class="col-xs-12 col-lg-6">
                                        <ul><li>
                                            <?= form_label('Actual Observation','for="edit-observation_mangrove"').form_textarea('edit-observation_mangrove','','id="edit-observation_mangrove"') ?>
                                            <span>PCRA 2004</span>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-12 col-lg-6">
                                        <ul><li>
                                            <?= form_label('Condition','for="edit-mangrove_observe"').form_dropdown('edit-mangrove_observe',$mangrovesobservation,'','id="edit-mangrove_observe"') ?>
                                            <span>PCRA 2004</span>
                                        </li></ul>
                                    </div>                                    
                                </div>
                                <div class="col-xs-12 col-lg-12">
                                    <div class="col-xs-12 col-lg-6">
                                        <ul><li>
                                            <?= form_label('Diversity Value','for="edit-diversity_value"').form_input('edit-diversity_value','','id="edit-diversity_value"') ?>
                                            <span>Fernando et. al, 1998</span>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-12 col-lg-6">
                                        <ul><li>
                                            <?= form_label('Diversity Condition','for="edit-mangrove_diversity"').form_dropdown('edit-mangrove_diversity',$mangrovesdiversity,'','id="edit-mangrove_diversity"') ?>
                                            <span>Fernando et. al, 1998</span>
                                        </li></ul>
                                    </div>                                    
                                </div>
                                <div class="col-xs-12 col-lg-12 tooltip">
                                    <div class="col-xs-12 col-lg-4">
                                        <ul><li>
                                            <?= form_label('Date conducted').form_dropdown('edit-mangrove_conducted_month',$monthList,'','id="edit-mangrove_conducted_month"'); ?>
                                        </li></ul>
                                    </div>
                                     <div class="col-xs-12 col-lg-4">
                                        <ul><li>
                                            <?= form_label('&nbsp;').form_dropdown('edit-mangrove_conducted_day',$dayList,'','id="edit-mangrove_conducted_day"'); ?>
                                        </li></ul>
                                    </div>
                                     <div class="col-xs-12 col-lg-4">
                                        <ul><li>
                                            <?= form_label('&nbsp;').form_dropdown('edit-mangrove_conducted_year',$yearList,'','id="edit-mangrove_conducted_year"'); ?>
                                        </li></ul>
                                    </div>
                                    <span class="tooltiptext">Select date conducted</span>
                                </div>
                                <div class="col-xs-12 col-lg-12">
                                    <ul><li>
                                        <?= form_label('Remarks','for="edit-mangrove_remarks"').form_textarea('edit-mangrove_remarks','','id="edit-mangrove_remarks"') ?><br>
                                    </li></ul>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-info" type="button" onclick="updateMangrovesnew();" />Update
                        </div>
                    </fieldset>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>



<form method="post" action="" id="FormCoralReefeditNew" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-coralReefNew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Coral Reef Ecosystem</h4>
                </div>
                <input type="hidden" id="coralreefn-id" name="coralreefn-id" value="" />
                <input type="hidden" id="coralreefn-gencode" name="coralreefn-gencode" value="" />
                <input type="hidden" id="coralreefnSS-gencode" name="coralreefnSS-gencode" value="" />
                <input type="hidden" id="coralreefmap-id" name="coralreefmap-id" value="" />
                <div class="modal-body" >
                    <!-- <fieldset> -->
                        <div class="col-xs-12">
                            <div class="col-xs-12 col-lg-12">
                                <div id="uploadcoralmapimage"></div>
                            </div>
                            <div class="col-xs-12 col-lg-12">
                                <label>Upload map images <i>(*.png, *.jpeg, *.jpg format, maximum size of 50MB)</i></label>
                                <input type='file' name="edit-img_coralmap" id="edit-img_coralmap"/><br>
                                <input type="hidden" name="edit-img_coralmaptext" id="edit-img_coralmaptext">
                                <input type="hidden" id="edit-img_coralmapspan" name="edit-img_coralmapspan">
                            </div>
                            <fieldset>
                                <div class="col-xs-12 col-lg-12">
                                    <label>Upload Shapefile <i>(*.zip  format, maximum size of 50MB)</i></label>
                                    <input type='file' name="edit-shp_corals" id="edit-shp_corals" onchange="readURLshapefileCoralEdit(this);" />
                                    <input type="hidden" name="edit-shp_corals_txt" id="edit-shp_corals_txt">
                                    <input type="hidden" name="edit-shp_corals_old" id="edit-shp_corals_old">
                                    <div id="edit-fetch_coral_shpfile"></div>
                                </div>
                            </fieldset>
                            <div class="col-xs-12 col-lg-12">
                                <ul><li>
                                    <?= form_label('Total Coverage(ha.)','for="edit-coral_ha"').form_input('edit-coral_ha','',' id="edit-coral_ha" class="number-separator"') ?>
                                </li></ul>
                                <ul><li>
                                    <?= form_label('% Hard Coral Cover or HCC','for="edit-hcc_value"').form_input('edit-hcc_value','',' id="edit-hcc_value" class="number-separator"') ?>
                                </li></ul>
                                <ul><li>
                                    <?= form_label('HCC Category','for="edit-coral_condition"').form_dropdown('edit-coral_condition',$hcccondition,'','id="edit-coral_condition"') ?>
                                    <span>TB no.2019-04 Licuanan et. al. 2017</span>
                                </li></ul>
                                <ul><li>
                                    <?= form_label('No. of Taxonomic Amalgation Units (TAUs)','for="edit-taus_value"').form_input('edit-taus_value','',' id="edit-taus_value" class="number-separator"') ?>
                                </li></ul>
                                <ul><li>
                                    <?= form_label('Diversity Category','for="edit-taus_category"').form_dropdown('edit-taus_category',$tauscategory,'','id="edit-taus_category"') ?>
                                    <span>TB no.2019-04 Licuanan et. al. 2019</span>
                                </li></ul>
                                <ul><li>
                                    <?= form_label('Remarks','for="edit-coral_remarks"').form_textarea('edit-coral_remarks','','id="edit-coral_remarks"') ?>
                                </li></ul>
                            </div>
                            <div class="col-xs-12 col-lg-12 tooltip">
                                <div class="col-xs-12 col-lg-4">
                                    <ul><li>
                                        <?= form_label('Date conducted').form_dropdown('edit-coral_conducted_month',$monthList,'','id="edit-coral_conducted_month"'); ?>
                                    </li></ul>
                                </div>
                                 <div class="col-xs-12 col-lg-4">
                                    <ul><li>
                                        <?= form_label('&nbsp;').form_dropdown('edit-coral_conducted_day',$dayList,'','id="edit-coral_conducted_day"'); ?>
                                    </li></ul>
                                </div>
                                 <div class="col-xs-12 col-lg-4">
                                    <ul><li>
                                        <?= form_label('&nbsp;').form_dropdown('edit-coral_conducted_year',$yearList,'','id="edit-coral_conducted_year"'); ?>
                                    </li></ul>
                                </div>
                                <span class="tooltiptext">Select date conducted</span>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-info" type="button" onclick="updatecoralreefnew();" />Update
                        </div>
                    <!-- </fieldset>   -->
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>

<form method="post" action="" id="FormFishDetails" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-fish" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Fish Details</h4>
                </div>
                <input type="hidden" id="fish-ids" name="fish-ids" value="" />
                <div class="modal-body" >
                    <fieldset>
                        <div class="col-xs-12">
                            <h1><div class="col-xs-12 col-lg-12" id="fishspeciesiddisplay"></div></h1><hr>
                            <fieldset>
                                <legend>Date Assessed</legend>                                   
                                <div class="col-xs-4 col-lg-4 tooltip">
                                    <ul><li>
                                    <?= form_dropdown('edit-fish_month_monitoring',$monthListed,'','class="border-input " id="edit-fish_monitor_months"'); ?>
                                    <span class="tooltiptext">Select date assessed</span>
                                    </li></ul>
                                </div>
                                <div class="col-xs-4 col-lg-4 tooltip">
                                    <ul><li>
                                    <?= form_dropdown('edit-fish_day_monitoring',$dayList,'','class="border-input " id="edit-fish_monitor_day"'); ?>
                                    <span class="tooltiptext">Select date assessed</span>
                                    </li></ul>
                                </div>
                                <div class="col-xs-4 col-lg-4 tooltip">
                                    <ul><li>
                                    <?= form_dropdown('edit-fish_year_monitoring',$yearListed,'','class="border-input " id="edit-fish_monitor_years"'); ?>
                                    <span class="tooltiptext">Select date assessed</span>
                                    </li></ul>
                                </div>
                            </fieldset>
                            <div class="col-xs-6 col-lg-6 tooltip hidden">
                                <ul><li>
                                    <?= form_label('Fish Category','for="edit-fish_category"').form_dropdown('edit-fish_category',$fishcategorysa,'','id="edit-fish_category"') ?>
                                    <span class="tooltiptext">TB 2019-04, Diversity and density Hilomen, et. al. 2000</span>
                                </li></ul>
                            </div>
                            <div class="col-xs-6 col-lg-6 tooltip">
                                <ul><li>
                                    <?= form_label('Fish Diversity (# of species/1000m<sup>2</sup>)','for="edit-fish_diversity_value"').form_input('edit-fish_diversity_value','',' id="edit-fish_diversity_value" class="number-separator"') ?>
                                    <span class="tooltiptext">TB 2019-04, Diversity and density Hilomen, et. al. 2000</span>
                                </li></ul>
                            </div>
                            <div class="col-xs-6 col-lg-6 tooltip">
                                <ul><li>
                                    <?= form_label('Diversity Category','for="edit-fish_diversity"').form_dropdown('edit-fish_diversity',$fishdiversity,'','id="edit-fish_diversity"') ?>
                                    <span class="tooltiptext">TB 2019-04, Diversity and density Hilomen, et. al. 2000</span>
                                </li></ul>
                            </div>
                            <div class="col-xs-6 col-lg-6 tooltip">                            
                                <ul><li>
                                    <?= form_label('Fish Density (# of individual/1000m<sup>2</sup>)','for="edit-density_value"').form_input('edit-density_value','',' id="edit-density_value" class="number-separator"') ?>
                                    <span class="tooltiptext">TB 2019-04, Diversity and density Hilomen, et. al. 2000</span>
                                </li></ul>
                            </div>
                            <div class="col-xs-6 col-lg-6 tooltip">
                                <ul><li>
                                    <?= form_label('Density Category','for="edit-fishdensity"').form_dropdown('edit-fishdensity',$fishdensity,'','id="edit-fishdensity"') ?>
                                    <span class="tooltiptext">TB 2019-04, Diversity and density Hilomen, et. al. 2000</span>
                                </li></ul>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="col-xs-6 col-lg-6 tooltip">
                                <ul><li>
                                    <?= form_label('Fish Biomass ((MT/kg)','for="edit-biomass_value"').form_input('edit-biomass_value','',' id="edit-biomass_value" class="number-separator"') ?>
                                    <span class="tooltiptext">MT/km<sup>2</sup></span>
                                </li></ul>
                            </div>
                            <div class="col-xs-6 col-lg-6 tooltip">                            
                                <ul><li>
                                    <?= form_label('Fish Biomass Category','for="edit-fishbiomass"').form_dropdown('edit-fishbiomass',$fishbiomass,'','id="edit-fishbiomass"') ?>
                                    <span class="tooltiptext">TB 2019-04, Nanola, et. al. 2006</span>
                                </li></ul>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-info" type="button" onclick="updateFishdetails();" />Update
                        </div>
                    </fieldset>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>
<form method="post" action="" id="FloraFaunaForm" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-ffb" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit</h4>
                </div>
                <input type="hidden" id="ffb-id" name="ffb-id" value="" />
                <input type="hidden" id="ffb-gencode" name="ffb-gencode" value="" />
                <input type="hidden" id="ffb-gencode-species" name="ffb-gencode-species" value="" />
                <div class="modal-body" >
                    <div class="col-xs-12 col-lg-12">
                        <div class="col-xs-12 col-lg-4">
                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                <fieldset>
                                    <legend style="background-color: transparent;color: #000; font-weight: 700;font-size: 14px;">Picture</legend>
                                    <img width="260px" height="230px" id="edit-florafaunaimg" src="<?php echo base_url("bmb_assets2/upload/sealevel_img/nophoto.jpg") ?>" alt="your image" /><br>
                                </fieldset>
                            </div>
                        </div>
                         <div class="col-xs-12 col-lg-8" style="margin-top:13px">
                            <div class="col-xs-12 col-lg-12">
                                <ul><li>
                                    <?php echo form_label('Conservation Status').form_input('conserve_stat','','id="conserve_stat"') ?>
                                </li></ul>
                            </div>
                            <div class="col-xs-12 col-lg-12">
                                <ul><li>
                                    <?php echo form_label('Residency Status').form_input('resi_stat','','id="resi_stat"') ?>
                                </li></ul>
                            </div>
                            <div class="col-xs-12 col-lg-12">
                                <ul><li>
                                    <?php echo form_label('Class').form_input('bioclass','','id="bioclass"') ?>
                                </li></ul>
                            </div>
                            <div class="col-xs-12 col-lg-12">
                                <ul><li>
                                    <?php echo form_label('Order').form_input('bioorder','','id="bioorder"') ?>
                                </li></ul>
                            </div>
                            <div class="col-xs-12 col-lg-12">
                                <ul><li>
                                    <?php echo form_label('Common Name').form_input('bioname','','id="bioname"') ?>
                                </li></ul>
                            </div>
                            <div class="col-xs-12 col-lg-12">
                                <ul><li>
                                    <?php echo form_label('Scientific Name').form_input('bioscientific','','id="bioscientific"') ?>
                                </li></ul>
                            </div>
                            <!-- <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                <ul><li>
                                    <?php echo form_label('Residency Status','','for="edit-residency_conserv"').form_dropdown('edit-residency_conserv',$residency_list_status,'','id="edit-residency_conserv"'); ?>
                                </li></ul>
                            </div>   -->
                        </div>
                        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 tooltip">
                            <ul><li>
                                <?php echo form_label('Local name','','for="edit-locanamespecies"').form_input('edit-locanamespecies','','id="edit-locanamespecies"'); ?>
                                <span class="tooltiptext">Input fauna species local name</span>
                            </li></ul>
                        </div>
                        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 tooltip">
                            <ul><li>
                                <?php echo form_label('Estimated Population','','for="edit-populationcount"').form_input('edit-populationcount','','id="edit-populationcount"'); ?>
                                <span class="tooltiptext">No. of estimated population per species</span>
                            </li></ul>
                        </div>
                        <div class="col-xs-12 col-lg-12 col-md-12 tooltip">
                            <ul><li>
                                <?php echo form_label('References of the photo','','for="edit-reference_photo_ff"').form_input('edit-reference_photo_ff','','id="edit-reference_photo_ff"'); ?>
                                <span class="tooltiptext">References of the photo</span>
                            </li></ul>
                        </div>
                        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                <fieldset>
                                    <legend style="background-color: transparent;color: #444; font-weight: 700;font-size: 14px;">Habitats/Ecosystem Discovered</legend>
                                    <div class="col-lg-4 col-xs-12">

                                            <input type="checkbox" name="edit-chk_forest" id="edit-chk_forest"><label for="edit-chk_forest">Forest</label>

                                    </div>
                                    <div class="col-lg-4 col-xs-12">

                                            <?php echo form_checkbox('edit-chk_inland','','','id="edit-chk_inland"').form_label('Inland Wetland','','for="edit-chk_inland"') ?>

                                    </div>
                                    <div class="col-lg-4 col-xs-12">

                                            <?php echo form_checkbox('edit-chk_cave','','','id="edit-chk_cave"').form_label('Caves','','for="edit-chk_cave"') ?>

                                    </div>
                                    <div class="col-lg-4 col-xs-12">

                                            <?php echo form_checkbox('edit-chk_coral','','','id="edit-chk_coral"').form_label('Coral Reef','','for="edit-chk_coral"') ?>

                                    </div>
                                    <div class="col-lg-4 col-xs-12">

                                            <?php echo form_checkbox('edit-chk_seagrass','','','id="edit-chk_seagrass"').form_label('Seagrasses','','for="edit-chk_seagrass"') ?>

                                    </div>
                                    <div class="col-lg-4 col-xs-12">

                                            <?php echo form_checkbox('edit-chk_mangrove','','','id="edit-chk_mangrove"').form_label('Mangrove','','for="edit-chk_mangrove"') ?>

                                    </div>
                                    <div class="col-lg-4 col-xs-12">

                                            <?php echo form_checkbox('edit-chk_tidal','','','id="edit-chk_tidal"').form_label('Tidal flats/Mudflats','','for="edit-chk_tidal"') ?>
                                    </div>
                                    <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                                            <?php echo form_checkbox('edit-chk_coastalwetland','','','id="edit-chk_coastalwetland"').form_label('Estuarine Habitat','','for="edit-chk_coastalwetland"') ?>
                                    </div>
                                    <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                                        <?php echo form_checkbox('edit-chk_grassland','','','id="edit-chk_grassland"').form_label('Grassland','','for="edit-chk_grassland"') ?>
                                    </div>
                                </fieldset>
                            </div>
                    </div>
                    <div class="col-xs-12 col-lg-12 col-md-12">
                        <ul><li>
                            <label>Local species image</label>
                            <input type="file" name="files_speciesedit" id="files_speciesedit" multiple />
                        </li></ul>
                        <div id="uploadimagespecies"></div>

                    </div>
                    <div class="col-xs-12" style="margin-top:10px">
                        <div class="col-xs-12">
                            <div class="modal-footer">
                                <button class="btn btn-info" type="button" onclick="updateBioFeature();" />Update
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>