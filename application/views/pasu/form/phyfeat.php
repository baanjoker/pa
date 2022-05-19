<div id="phyfeat" class="tab-pane">
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
      <a class="tablinks" id="loadwatershed" onclick="tabS(event, 'Watershed')">River Basin and Watershed</a>
      <a class="tablinks" id="loadurban" onclick="tabS(event, 'urban')">Urban Ecosystem</a>
      <!-- <a class="tablinks" id="loadvegetative" onclick="tabS(event, 'Vegetative')">Vegetative Cover</a> -->
      <a class="tablinks" id="loadlandslide" onclick="tabS(event, 'Geohazard')">Geohazard Features</a>                  
    </div>
</div>
<div class="col-xs-12">
    <div id="Topo" class="tabcontent" style="display:block">
        <fieldset>
            <legend>Elevation (MASL)</legend>
            <div class="col-xs-12">
                <div class="col-xs-12 col-lg-4 tooltip">
                    <ul><li>
                        <?= form_label('Highest (meters)','','for="highestelev"').form_input('highestelev',number_format($pamain->elevation_highest,2),'placeholder=" " id="highestelev" class="number-separator"'); ?>
                        <span class="tooltiptext">Input highest elavation (meters)</span>
                    </li></ul>
                </div>
                <div class="col-xs-12 col-lg-4 tooltip">
                    <ul><li>
                        <?= form_label('Lowest (meters)','','for="lowestelev"').form_input('lowestelev',number_format($pamain->elevation_lowest,2),'placeholder=" " id="lowestelev" class="number-separator"'); ?>
                        <span class="tooltiptext">Input lowest elavation (meters)</span>
                    </li></ul>
                </div>
                <div class="col-xs-4 col-lg-4 hidden">
                    <button type="button" class="btn btn-primary btn-flat btn-xs" id="submitfrmelivation">Apply changes</button>
                </div>
            </div>
        </fieldset>
        <fieldset>
            <legend>Topography and Slope</legend>
            <div class="col-xs-6 col-lg-12">                                        
                <div class="col-xs-12 col-lg-12">  
                    <div id="fetch_images_topo"></div>
                </div>
                <div class="col-xs-12">
                    <fieldset>
                        <label>Upload map images of topography and slope<i>(*.png, *.jpeg, *.jpg format, maximum size of 50MB)</i></label>
                        <input type='file' name="img_topo" id="img_topo"  />                                   
                        <input type="hidden" name="old_picture" value="nophoto.jpg"> 
                        <span id="img_topospan" class="img_topospan hide">nophoto.jpg</span>
                    </fieldset>
                </div>
                <fieldset>
                    <div class="col-xs-12 col-lg-12">
                        <fieldset>
                            <label>Upload Shapefile of topography and slope<i>(*.zip  format, maximum size of 50MB)</i></label>
                            <input type='file' name="shp_topo" id="shp_topo" onchange="readURLshapefileTopo(this);" />
                            <input type="hidden" name="shp_topo_txt" id="shp_topo_txt">
                            <div id="fetch_topo_shpfile"></div>
                        </fieldset>
                    </div>
                </fieldset> 
            </div>
            <div class="col-xs-12 tooltip">                            
                <ul><li>
                    <?= form_label('Description','','for="topodesc"').form_textarea('topo','','id="topodesc"');?>
                    <span class="tooltiptext">Slope is the gradient or incline of the land</span>
                </li></ul>
                <a type="text" class="btn btn-primary" id="addimagetopo">Add data</a>
            </div>
            <div class="col-xs-12 col-lg-12">
                <table id="tbltopology" class="content-table">
                    <thead>
                        <tr>
                            <th colspan="4" style="text-align: center; font-size: 24px">Topography and Slope</th>
                        </tr>
                    </thead>
                    <tbody id="tbodytopo"></tbody>
                </table>
                <table id="tbltopology_sample" class="content-table">                                        
                    <tbody id="tbodytopo_sample"></tbody>
                </table>
            </div> 
            </div> 
        </fieldset>
    </div>
    <div id="Geology" class="tabcontent">  
        <div class="tab-second">
            <a class="tablinksGS active" id="loadrocks" onclick="tabSGS(event, 'rocks')">Rock Formation</a>
            <a class="tablinksGS" id="loadsoil" onclick="tabSGS(event, 'soils')">Soil Type</a>                                            
        </div>
        <div id="rocks" class="tabcontentgs" style="display:block">                    
            <fieldset>
                <legend>Rock Formation</legend>
                <div class="col-xs-12 ">
                    <div class="col-xs-12 ">                                        
                        <div class="col-xs-12 col-lg-12">                                        
                            <div id="fetch_images_rock"></div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-12">
                        <fieldset>
                            <label>Upload map images of rock formation within PA<i>(*.png, *.jpeg, *.jpg format, maximum size of 50MB)</i></label>
                            <input type='file' name="img_rocks" id="img_rocks" />
                            <input type="hidden" name="old_picture" value="nophoto.jpg"> 
                            <span id="img_rockspan" class="img_rockspan hide">nophoto.jpg</span>
                        </fieldset>
                    </div> 
                    <div class="col-xs-12 col-lg-12">
                        <fieldset>
                            <label>Upload Shapefile of rock formation within PA<i>(*.zip  format, maximum size of 50MB)</i></label>
                            <input type='file' name="shp_rock" id="shp_rock" onchange="readURLshapefilerock(this);" />
                            <input type="hidden" name="shp_rock_txt" id="shp_rock_txt">
                            <div id="fetch_rock_shpfile"></div>
                        </fieldset>
                    </div>
                </div>                                                                           
                <div class="col-xs-12 ">
                    <div class="col-xs-12 col-lg-12 tooltip">
                        <ul><li>                            
                            <?= form_label('Rock Formation','','for="rock"').form_textarea('rock','','placeholder="Brief description" id="rock" style="height:150px"'); ?>
                            <span class="tooltiptext">Unique formation of aesthetic value formed by weathering</span>
                        </li></ul>
                        <a type="text" class="btn btn-primary" id="addimagerock">Add data</a>
                    </div>
                    <div class="col-xs-12 col-lg-12 ">                                
                        <br><table id="tblrock" class="content-table">
                            <thead>
                                <tr>
                                    <th colspan="3" style="text-align: center; font-size: 24px">Rock Formation</th>
                                </tr>
                            </thead>
                            <tbody id="tbodyrock"></tbody>
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
                        <div class="col-xs-12 col-lg-12">                                        
                            <div id="fetch_images_geology"></div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-12">
                        <fieldset>
                            <label>Upload map images of soil type within PA<i>(*.png, *.jpeg, *.jpg format, maximum size of 50MB)</i></label>
                            <input type='file' name="img_soil" id="img_soil" />
                            <input type="hidden" name="old_picture" value="nophoto.jpg"> 
                            <span id="img_soilspan" class="img_soilspan hide">nophoto.jpg</span>
                        </fieldset>
                    </div>
                </div> 
                <fieldset>
                    <div class="col-xs-12 col-lg-12">
                        <fieldset>
                            <label>Upload Shapefile of soil type within PA<i>(*.zip  format, maximum size of 50MB)</i></label>
                            <input type='file' name="shp_soil" id="shp_soil" onchange="readURLshapefileTopo(this);" />
                            <input type="hidden" name="shp_soil_txt" id="shp_soil_txt">
                            <div id="fetch_soil_shpfile"></div>
                        </fieldset>
                    </div>
                </fieldset>                                                                           
                <div class="col-xs-12 ">
                    <div class="col-xs-12 col-lg-12 tooltip">
                        <ul><li>                            
                            <?= form_label('Soil Type','','for="soil_type"').form_textarea('soil_type','','placeholder="Brief description" id="soil_type" style="height:150px"'); ?>
                            <span class="tooltiptext">Taxonomic unit in soil science</span>
                        </li></ul>
                        <a type="text" class="btn btn-primary" id="addimagesoil">Add data</a>
                    </div>
                    <div class="col-xs-12 col-lg-12">                                
                        <br><table id="tblsoil" class="content-table">
                            <thead>
                                <tr>
                                    <th colspan="3" style="text-align: center; font-size: 24px">Soil Type</th>
                                </tr>
                            </thead>
                            <tbody id="tbodysoil"></tbody>
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
                <div class="col-xs-12 col-lg-12">                                        
                    <div id="fetch_images_climate"></div>
                </div>
            </div>                                                                      
            <div class="col-xs-12 col-lg-12">
                <fieldset>
                    <label>Upload map images of climate type within PA<i>(*.png, *.jpeg, *.jpg format, maximum size of 50MB)</i></label>
                    <input type='file' name="img_climate" id="img_climate" />
                    <input type="hidden" name="old_picture" value="nophoto.jpg"> 
                    <span id="img_climatespan" class="img_climatespan hide">nophoto.jpg</span>
                </fieldset>  
            </div>                            
        </div>
        <div class="col-xs-12 col-lg-12">
            <fieldset>
                <label>Upload Shapefile of climate type within PA<i>(*.rar, *.zip format, maximum size of 200MB)</i></label>
                <input type='file' name="climate_shpfile" id="climate_shpfile" />
                <input type="hidden" name="climate_shpfile_text"> 
                <div id="climate_shpfile_div"></div>
            </fieldset>
        </div>
        <div class="col-xs-12 col-lg-6" style="margin-top:15px">                        
            <div class="col-xs-12 col-lg-12 tooltip">
                <ul><li>
                    <?php echo form_label('Climate Type').form_dropdown('climate',$clitype,'','id="climate"'); ?>
                    <span class="tooltiptext">Climate types are based on the distribution of rainfall. Philippines have four (4) climate types.</span>
                </li></ul>                                
            </div>   
            <div class="col-xs-12 col-lg-12 tooltip">
                <ul><li>
                    <?php echo form_label('Remarks').form_textarea('climate_desc','','id="climate_desc"'); ?>
                    <span class="tooltiptext">Input description</span>
                </li></ul>                                
            </div> 
            <div class="col-xs-12 ">  
                <a type="text" class="btn btn-primary" id="addimageClimate">Add data</a>
            </div>
        </div>
        <div class="col-xs-12 col-lg-6">  
            <div class="col-xs-12 col-lg-12">
                <table id="tblclimate" class="content-table">
                    <thead>
                        <tr>
                            <th style="text-align: center; font-size: 24px">Climate Type</th>
                        </tr>
                    </thead>
                    <tbody id="tbodyclimate"></tbody>
                </table>
            </div>
        </div>
    </fieldset>
    </div>
    <div id="Hydrology" class="tabcontent">      
        <input type="hidden" name="hydro-gencode" id="hydro-gencode">
    <fieldset>
        <legend>Hydrology/River system</legend>
        <div class="col-xs-12">
            <div class="col-xs-12 ">                                        
                <div class="col-xs-12 col-lg-12">                                        
                    <div id="fetch_images_hydro"></div>
                </div>
            </div>
             <div class="col-xs-12 col-lg-12 tooltip">
                <fieldset>
                    <label>Upload map images of hydrology/river system<i>(*.png, *.jpeg, *.jpg format, maximum size of 50MB)</i></label>
                    <input type='file' name="img_hydro" id="img_hydro" /><br>
                    <input type="hidden" name="old_picture" value="nophoto.jpg"> 
                    <span id="img_hydrospan" class="img_hydrospan hide">nophoto.jpg</span>
                    <span class="tooltiptext">Resources map of the PA</span>
                </fieldset>    
            </div>
        </div>  
        <div class="col-xs-12 col-lg-12">
            <fieldset>
                <legend style="background-color: transparent;color: black;font-weight: 700">Map of river system and groundwater class</legend>
                <div class="col-xs-12 col-lg-12">
                    <div id="loadingspinhydro"></div>
                </div>
                <div class="col-xs-12 col-lg-12 tooltip">
                    <fieldset>
                        <label>Upload individual map images of hydrology/river system<i>(*.png, *.jpeg, *.jpg format, maximum size of 50MB)</i></label>
                        <input type='file' name="pic_hydromap" id="pic_hydromap" />
                        <input type="hidden" name="old_picture" value="nophoto.jpg">
                        <input type="hidden" name="picdatainsert" id="picdatainsert">
                        <span class="tooltiptext">upload map showing the monitoring stations  with coastal management zones if available) for Marine WQ within the PA</span>
                    </fieldset>
                </div>
            </fieldset>
            <fieldset>
                <div class="col-xs-12 col-lg-12 tooltip">
                    <fieldset>
                        <label>Upload Shapefile of hydrology/river system<i>(*.zip  format, maximum size of 200MB)</i></label>
                        <input type='file' name="zip_shpfile_hydro" id="zip_shpfile_hydro" onchange="readURLshapefileHydrology(this);" />
                        <input type="hidden" name="ziphydrodatainsert" id="ziphydrodatainsert">
                        <div id="fetch_hydro_shpfile"></div>
                        <span class="tooltiptext">Upload  shapefile - spatial data  (point) of the monitoring stations with results reflected in the attribute table following the prescribed water quality parameters; and  polygon of the coastal management zones (if available)</span>
                    </fieldset>
                </div>
            </fieldset>
        </div>
        <div class="col-xs-12 col-lg-12">
            <fieldset><legend style="background-color: transparent;color: #444; font-weight: 700;font-size: 14px;">Water Classification</legend>
                <div class="col-xs-4 tooltip"> 
                    <ul><li>
                        <?php echo form_label('&nbsp;').form_dropdown('waterclass',$waterclass,'','id="waterclassid"') ?>
                        <span class="tooltiptext">Freshwater classification based on water quality to identify beneficial use of wetland</span>
                    </li></ul>
                </div>
                <div class="col-xs-8 tooltip"> 
                    <ul><li>
                        <?php echo form_label('&nbsp;').form_dropdown('waterclasssub','','','id="waterclasssubid"') ?>
                        <span class="tooltiptext">Freshwater classification based on water quality to identify beneficial use of wetland</span>
                    </li></ul>
                </div> 
            </fieldset>
        </div>
        <div class="col-xs-12 col-lg-12" id="riverdivs" style="display: none;">
            <div class="col-xs-12 tooltip"> 
                <ul><li>
                    <?= form_label("River – Inflow",'','for="riverinflow"').form_textarea('riverinflow','','placeholder="" id="riverinflow"') ?>
                    <span class="tooltiptext">Name and/or location of wetland/s which flows into the site; show in map, if possible</span>
                </li></ul>
            </div>
            <div class="col-xs-12 tooltip"> 
                <ul><li>
                    <?= form_label("River – Outflow",'','for="riveroutflow"').form_textarea('riveroutflow','','placeholder="" id="riveroutflow"') ?>
                    <span class="tooltiptext">Name and/or location of wetland/s which flows out of the site; show in map, if possible</span>
                </li></ul>
            </div>
            <div class="col-xs-12 tooltip"> 
                <ul><li>
                    <?= form_textarea('hydro','','id="hydro" placeholder="Brief description" style="height:150px"') ?>
                    <span class="tooltiptext">Mention whether assessed, date assessed, whether with managment plan, whether with separate management body, if not PAMB; Conservation measures e.g. within Asian Waterfowl Census Site, Ramsar SIte, EAAFP site etc.</span>
                </li></ul>                                
            </div>
        </div>        
        <div class="col-xs-12 col-lg-12" id="parameterdivs" style="display: none;">            
            <div class="col-xs-12 tooltip"> 
                <ul><li>
                    <?= form_label("Parameters of water quality",'','for="parameterwater"').form_textarea('parameterwater','','id="parameterwater"') ?>
                    <span class="tooltiptext">Parameters of water quality</span>
                </li></ul>
            </div>
            <div class="col-xs-12 tooltip"> 
                <ul><li>
                    <?php echo form_label('Status').form_dropdown('waterqualitystatus',$waterqualitystatus,'','id="waterqualitystatus"') ?>
                    <span class="tooltiptext">Select status of water quality</span>
                </li></ul>
            </div>            
        </div>  
        <div class="col-xs-12" id="hydroyearassessdiv">
            <div class="col-xs-6 col-lg-6 tooltip">
                <ul><li>
                    <?= form_label('Year assessed', '','for="hydroyearassess"').form_dropdown('hydroyearassess', $yearListed,'','id="hydroyearassess"'); ?>
                    <span class="tooltiptext">Select year assessed</span>
                </li></ul>
            </div>
        </div> 
        <div class="col-xs-12 col-lg-12" id="parameterdivs2" style="display: none;">
            <div class="col-xs-12 col-lg-12">
                <a type="text" class="btn btn-warning" id="addwaterquality">Add Parameter Water Quality</a>
            </div>
            <div class="col-xs-12 col-lg-12">
                <div class="table-responsive large-tables">
                    <table id="tblwaterquality" class="content-table table-line-border">                               
                        <tbody id="tbodywaterquality"></tbody>
                    </table>
                    <hr>
                </div>
            </div>
        </div>  
        <hr>
        <div class="col-xs-12 col-lg-12 tooltip">
            <a type="text" class="btn btn-primary" id="addimageHydro">Add to table</a>
        </div>
            <div class="col-xs-12 col-lg-12"><br>
                <table id="tblhydro" class="content-table">
                    <thead>
                        <tr>
                            <th colspan="3" style="text-align: center; font-size: 24px">Hydrology</th>
                        </tr>
                    </thead>
                    <tbody id="tbodyhydro"></tbody>
                </table>
                <table id="tblhydro_sample" class="content-table">                                    
                    <tbody id="tbodyhydro_sample"></tbody>
                </table>
            </div>                                                    
        </div>
    </fieldset>         
    <div id="Watershed" class="tabcontent">     
    <?php echo form_open_multipart('#','id="watershedsForms" class="form-style-7" autocomplete="off"') ?>
        <input type="text" name="watershedcode" class="hidden" value="<?php echo $pamain->generatedcode; ?>" id="watershedcode">
         <fieldset>
            <legend style="background-color: transparent;color: black;font-weight: 700">Map showing the boundary of Riverbasin and watershed/subwatershed</legend>
                <div class="col-xs-12 col-lg-12">
                    <div id="loadingspinwatersheds"></div>
                </div>
                <div class="col-xs-12 col-lg-12 tooltip">
                    <fieldset>
                        <label>Upload map images of river basin/watershed<i>(*.png, *.jpeg, *.jpg format, maximum size of 50MB)</i></label>
                        <input type='file' name="pic_watershedimg" id="pic_watershedimg" /><br>
                        <input type="hidden" name="old_picture" value="nophoto.jpg">
                        <input type="hidden" name="picdatainsertwatershed" id="picdatainsertwatershed">
                        <span id="img_watershedspan" class="img_watershedspan"></span>
                        <span class="tooltiptext">Upload the boundary of Riverbasin and watershed/subwatershed</span>
                    </fieldset>
                    
                </div>
        </fieldset>
        <fieldset>
            <div class="col-xs-12 col-lg-12">
                <label>Upload Shapefile of river basin/watershed<i>(*.zip  format, maximum size of 50MB)</i></label>
                <input type='file' name="shp_watersheds" id="shp_watersheds" onchange="readURLshapefilewatersheds(this);" />
                <input type="hidden" name="shp_watersheds_txt" id="shp_watersheds_txt">
                <div id="fetch_watersheds_shpfile"></div>
            </div>
        </fieldset>   
        <div class="col-xs-12">
            <div class="col-xs-12 tooltip">
                <ul><li>
                    <?= form_label('River Basin Name','','riverbasinname').form_dropdown('riverbasinname',$riverbasinlist,'','id="riverbasinname"') ?>
                    <span class="tooltiptext">Select river basin</span>
                </li></ul>
            </div>
            <div class="col-xs-12 tooltip">
                <ul><li>
                    <?= form_label('Watershed name','','watershedname').form_dropdown('watershedname','','','id="watershedname"') ?>
                    <span class="tooltiptext">Select watershed name</span>
                </li></ul>
            </div>
            <div class="col-xs-12 tooltip">
                <ul><li>
                    <?= form_label('Sub Watershed Name','','subwatershedname').form_textarea('subwatershedname','','id="subwatershedname"') ?>
                    <span class="tooltiptext">Input sub watershed</span>
                </li></ul>
            </div>
        </div> 
        <div class="col-xs-12 col-lg-12">
            <a type="text" class="btn btn-primary" id="addwatersheddata">Add to table</a>
        </div>
        <div class="col-xs-12 col-lg-12"><br>
            <table id="tblwatershed" class="content-table">
                <thead>
                    <tr>
                        <th colspan="3" style="text-align: center; font-size: 24px">River Basin and Watershed</th>
                    </tr>
                </thead>
                <tbody id="tbodywatershed"></tbody>
            </table>
            <table id="tblwatersheds_samples" class="content-table">                                    
                <tbody id="tbodywatershed_samples"></tbody>
            </table>
        </div>
        <?php echo form_close(); ?>
    </div>
    <div id="urban" class="tabcontent">     
        <fieldset>
            <legend>Urban Ecosystem</legend>
            <fieldset class="hidden">
                <div class="col-xs-12 col-lg-12">
                    <label>Upload Shapefile <i>(*.zip  format, maximum size of 50MB)</i></label>
                    <input type='file' name="shp_urbaneco" id="shp_urbaneco" onchange="readURLshapefileurbaneco(this);" />
                    <input type="hidden" name="shp_urbaneco_txt" id="shp_urbaneco_txt">
                    <div id="fetch_urbaneco_shpfile"></div>
                </div>
            </fieldset> 
            <div class="col-lg-12 col-xs-12">               
                <div class="col-xs-12 col-lg-12">
                    <?php echo form_checkbox('chk_cupa','',FALSE,'id="chk_cupa"').form_label('Cities/Urban area within protected areas','','for="chk_cupa"') ?>
                </div>
                <div class="col-xs-12 col-lg-12 tooltip" id="cupadiv" style="display: none">
                    <ul><li>
                        <?= form_label('Specify Cities/Urban areas','','cupa_details').form_textarea('cupa_details','','id="cupa_details"') ?>
                        <span class="tooltiptext">Input cities/urban area</span>
                    </li></ul>
                </div>
            </div>           
            <div class="col-lg-12 col-xs-12">               
                <div class="col-xs-12 col-lg-12">
                    <?php echo form_checkbox('chk_cbi','',FALSE,'id="chk_cbi"').form_label('City Biodiversity Index (CBI)/Urban Biodiversity Index adopted','','for="chk_cbi"') ?>
                </div>
                <div class="col-xs-12 col-lg-12" id="cbidiv" style="display: none">
                    <!-- <ul><li> -->
                        <?= form_label('Upload LGU Resolution/Ordinance <i>(*.doc, *.docx, *.xls, *.xlsx, *.ppt, *.pptx, *.csv, *.pdf format, maximum size of 50MB)</i>') ?>
                        <input type='file' name="lguresolutions" id="lguresolutions" onchange="readURLUrbanEco(this);"  />
                        <input type="hidden" name="lguresolutiontext" id="lguresolutiontext">
                    <!-- </li></ul> -->
                </div>
                <div class="col-xs-12 col-lg-12">
                    <br><a type="text" class="btn btn-primary" id="addurbaneco">Add to table</a>
                </div>
            </div>
            <div class="col-xs-12 col-lg-12">
                <div class="table-responsive large-tables"><br>
                    <table id="tableurbaneco" class="content-table">      
                    <thead>
                        <tr>
                            <th colspan="4" style="text-align: center; font-size: 24px">Urban Ecotourism</th>
                        </tr>
                    </thead>                              
                        <tbody id="tbodyurbaneco"></tbody>
                    </table>
                    <table id="tableurbaneco_sample" class="content-table">
                        <tbody id="tbodyurbaneco_sample"></tbody>
                    </table>
                </div>  
            </div>
        </fieldset> 
    </div>
    <div id="Landuses" class="tabcontent">     
        <?php echo form_open_multipart('#','id="landusesForms" class="form-style-7" autocomplete="off"') ?>
        <input type="text" name="landgencodes" class="hidden" value="<?php echo $pamain->generatedcode; ?>" id="landgencodes">
        <fieldset>
            <legend>Existing Landuse</legend>
            <div class="col-xs-12">
                <div class="col-xs-12">                                        
                    <div class="col-xs-12 col-lg-5 ">                                        
                        <div id="fetch_images_landuse"></div>
                    </div>
                </div>
                <div class="col-xs-12 col-lg-12 ">
                    <label>Upload map images <i>(*.png, *.jpeg, *.jpg format, maximum size of 50MB)</i></label>
                    <input type='file' name="img_lands" id="img_lands" /><br>
                    <input type="hidden" name="old_picture" value="nophoto.jpg"> 
                    <span id="img_landspan" class="img_landspan hide">nophoto.jpg</span>    
                </div>
            </div>            
            <div class="col-xs-12">
                <div class="col-xs-12 col-lg-12">
                    <div class="col-xs-12 col-lg-4 tooltip">
                        <ul><li>
                            <?php echo form_label('Landuse','','for="existing_landuse"').form_dropdown('existing_landuses',$existlanduse,'','id="existing_landuse"')?>
                            <span class="tooltiptext">Select existing landuse</span>
                        </li></ul>     
                    </div>    
                    <div class="col-xs-12 col-lg-4 tooltip">
                        <ul><li>
                            <?php echo form_label('Sub Landuse','','for="existing_landuse"').form_dropdown('sub_existing_landuse',$existlanduse,'','id="sub_existing_landuse"') ?>
                            <span class="tooltiptext">Select sub existing landuse</span>
                        </li></ul>     
                    </div>  
                    <div class="col-xs-12 col-lg-4 tooltip">
                        <ul><li>
                            <?php echo form_label('Area (has)','','for="existing_landuse_area"').form_input('existing_landuse_area','','placeholder="Area" id="existing_landuse_area" class="number-separator"')?>
                            <span class="tooltiptext">Input area in hectares</span>
                        </li></ul>     
                    </div>                  
                </div>
                <fieldset>
                    <div class="col-xs-12 col-lg-12">
                        <label>Upload Shapefile <i>(*.zip  format, maximum size of 50MB)</i></label>
                        <input type='file' name="shp_landuse" id="shp_landuse" onchange="readURLshapefileLanduses(this);" />
                        <input type="hidden" name="shp_landuse_txt" id="shp_landuse_txt">
                        <div id="fetch_landuse_shpfile"></div>
                    </div>
                </fieldset> 
                <div class="col-xs-12 col-lg-12 tooltip">
                    <ul><li>
                        <?php echo form_label('Remarks','','for="existing_landuse_remarks"').form_textarea('existing_landuse_remarks','','placeholder="" id="existing_landuse_remarks"')?>
                        <span class="tooltiptext">Brief description</span>
                    </li></ul>   
                </div>
                <div class="col-xs-12 col-lg-12">
                    <a type="text" class="btn btn-primary" id="addimageLand">Add data</a>
                </div>
                <div class="col-xs-12 col-lg-12">
                    <div class="table-responsive large-tables"><br>
                        <table id="tblland" class="content-table">
                            <thead>
                                <tr>
                                    <th colspan="5" style="text-align: center; font-size: 24px">Existing Landuse</th>
                                </tr>
                                <tr>
                                    <th>Landuse</th> 
                                    <th>Area(has)</th>
                                    <th>Remarks</th>
                                    <th>Shapefile</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="tbodyland"></tbody>
                        </table>
                        <table id="tblland_sample" class="content-table">                                    
                            <tbody id="tbodyland_sample"></tbody>
                        </table>
                    </div>
                </div>                                                    
            </div>                            
        </fieldset>
        <?php echo form_close(); ?>
    </div>
    <div id="Geohazard" class="tabcontent">
        <!-- <fieldset>
            <legend>Geohazard Features</legend> -->
            <div class="col-xs-12">
                <div class="tab-second">
                  <a class="tablinkss active" onclick="tabSs(event, 'g1')">Landslide Susceptibility</a>
                  <a class="tablinkss" id="loadflooding" onclick="tabSs(event, 'g2')">Flooding Susceptibility</a>
                  <a class="tablinkss" id="loadsealevel" onclick="tabSs(event, 'g3')">Sea Level Rise</a>
                  <a class="tablinkss" id="loadtsunami" onclick="tabSs(event, 'g4')">Storm Surge</a>
                  <a class="tablinkss" id="loadfire" onclick="tabSs(event, 'g6')">Fault Line</a>
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
                    <div class="col-xs-12 col-lg-6">
                        <label>Upload map images <i>(*.png, *.jpeg, *.jpg format, maximum size of 50MB)</i></label>
                        <input type='file' name="img_landslide" id="img_landslide" /><br>
                        <input type="hidden" name="old_picture_landslide" value="nophoto.jpg"> 
                        <span id="img_landslidespan" class="img_landslidespan hide">nophoto.jpg</span>
                    </div>
                </div> 
                <div class="col-xs-12"> 
                    <div class="col-xs-12 col-lg-6">
                        <label>Upload Shapefile <i>(*.rar, *.zip format, maximum size of 200MB)</i></label>
                        <input type='file' name="landslide_shpfile" id="landslide_shpfile" />
                        <input type="hidden" name="landslide_shpfile_text"> 
                        <div id="landslide_shpfile_div"></div>
                    </div>
                </div> 
                <div class="col-xs-12" style="margin-top:30px">                                                                                          
                    <div class="col-xs-12 col-lg-6">
                        <div class="col-xs-12 col-lg-12 tooltip">
                            <ul><li>
                            <?= form_label('Susceptibility','','for="landslide"').form_dropdown('landslide',$landslideLegend,'',' id="landslide"') ?>
                            <span class="tooltiptext">Select landslide susceptibility</span>
                            </li></ul>  
                        </div>
                        <div class="col-xs-12 col-lg-12 tooltip">
                            <ul><li>
                                <?= form_label('Area (has)','','for="landslide_area"').form_input('landslide_area','','placeholder="Area" id="landslide_area" class="number-separator"') ?>
                                <span class="tooltiptext">Input area in hectares</span>
                            </li></ul>
                        </div>
                        <div class="col-xs-12 col-lg-12 tooltip">
                            <ul><li>
                                <?= form_label('Remarks','','for="landslide_remarks"').form_textarea('landslide_remarks','','placeholder="" id="landslide_remarks"') ?>
                                <span class="tooltiptext">Input brief description</span>
                            </li></ul>
                        </div>
                        <a type="text" class="btn btn-primary" id="addimageLandslide">Add data</a>
                    </div>
                    <div class="col-xs-12 col-lg-6">
                        <div class="table-responsive large-tables">
                            <table id="tbllandslide" class="content-table">
                                <thead>
                                    <tr>
                                        <th colspan="3" style="text-align: center; font-size: 24px">Landslide Susceptibility</th>
                                    </tr>
                                    <tr>
                                        <th>Susceptibility</th>                                                        
                                        <th>Area(has)</th> 
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="tbodylandslide"></tbody>
                            </table>
                            <table id="tbllandslide_sample" class="content-table">
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
                    <div class="col-xs-12 col-lg-6">
                        <!-- <ul><li> -->
                            <label>Upload map images <i>(*.png, *.jpeg, *.jpg format, maximum size of 50MB)</i></label>
                            <input type='file' name="img_flooding" id="img_flooding"/><br>
                            <input type="hidden" name="old_picture" value="nophoto.jpg"> 
                            <span id="img_floodingspan" class="img_floodingspan hide">nophoto.jpg</span>
                        <!-- </li></ul>  -->
                    </div>  
                </div>
                <div class="col-xs-12"> 
                    <div class="col-xs-12 col-lg-6">
                        <label>Upload Shapefile <i>(*.rar, *.zip format, maximum size of 200MB)</i></label>
                        <input type='file' name="flooding_shpfile" id="flooding_shpfile" />
                        <input type="hidden" name="flooding_shpfile_text"> 
                        <div id="flooding_shpfile_div"></div>
                    </div>
                </div> 
                <div class="col-xs-12" style="margin-top:30px">   
                    <div class="col-xs-6 col-lg-6">                                        
                        <div class="col-xs-12 col-lg-12 tooltip">                                        
                            <ul><li>
                                <?= form_label('Susceptibility','','for="flooding"').form_dropdown('flooding',$floodingLegend,'','id="flooding"') ?>
                                <span class="tooltiptext">Select flooding susceptibility</span>
                            </li></ul>    
                        </div>
                        <div class="col-xs-12 col-lg-12 tooltip">                                        
                            <ul><li>
                                <?= form_label('Area (has)','','for="flooding_area"').form_input('flooding_area','','placeholder="Area" id="flooding_area" class="number-separator"') ?>
                                <span class="tooltiptext">Input area in hectares</span>
                            </li></ul>
                        </div>
                        <div class="col-xs-12 col-lg-12 tooltip">                                        
                            <ul><li>
                                <?= form_label('Remarks','','for="flooding_remarks"').form_textarea('flooding_remarks','','id="flooding_remarks"') ?>
                                <span class="tooltiptext">Input brief description</span>                                
                            </li></ul>
                        </div>
                        <a type="text" class="btn btn-primary" id="addimageFlooding">Add data</a>
                    </div>
                    <div class="col-xs-6 col-lg-6">
                        <div class="table-responsive large-tables">
                            <table id="tblflooding" class="content-table">
                                <thead>
                                    <tr>
                                        <th colspan="3" style="text-align: center; font-size: 24px">Flooding Susceptibility</th>
                                    </tr>
                                    <tr>
                                        <th>Susceptibility</th>                                                        
                                        <th>Area(has)</th> 
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="tbodyflooding"></tbody>
                            </table>
                            <table id="tblflooding_sample" class="content-table">
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
                    <div class="col-xs-12 col-lg-12 ">                                        
                        <div id="fetch_images_seas"></div>
                    </div> 
                    <div class="col-xs-12 col-lg-12">
                        <fieldset>
                            <label>Upload map images <i>(*.png, *.jpeg, *.jpg format, maximum size of 50MB)</i></label>
                            <input type='file' name="img_sea" id="img_sea"  /><br>
                            <input type="hidden" name="imgseatxt" id="imgseatxt"> 
                        </fieldset>
                    </div>  
                    <div class="col-xs-12 col-lg-12">
                        <fieldset>
                            <div class="col-xs-12 col-lg-12">
                                <label>Upload Shapefile <i>(*.zip  format, maximum size of 50MB)</i></label>
                                <input type='file' name="zip_shpfile_sealevel" id="zip_shpfile_sealevel" onchange="readURLshapefilesealevel(this);" />
                                <input type="hidden" name="shpzip_sealevel_text" id="shpzip_sealevel_text">
                                <div id="fetch_sealevel_shpfile"></div>
                            </div>
                        </fieldset>
                    </div>                     
                    <div class="col-xs-12 col-lg-12 tooltip" style="margin-top:30px">                                                          
                        <ul><li>
                            <?php echo form_label('Remarks').form_textarea('sea','','id="sea" style="height:250px;"'); ?>
                            <span class="tooltiptext">Input remarks/descriptions</span>
                        </li></ul>
                    </div>
                </div>
                <div class="col-xs-12 ">
                    <a type="text" class="btn btn-primary" id="addimageSea">Add data</a>
                </div>
                <div class="col-xs-12">
                    <div class="table-responsive large-tables">
                            <table id="tblsea" class="content-table">
                                <thead>
                                    <tr>
                                        <th colspan="3" style="text-align: center; font-size: 24px">Sea Level Rise</th>
                                    </tr>
                                </thead>
                                <tbody id="tbodysea"></tbody>
                            </table>
                            <table id="tblsea_sample" class="content-table">
                                <tbody id="tbodysea_sample"></tbody>
                            </table>
                        </div>
                    </div>
            </fieldset>
        </div>
        <div id="g4" class="tabcontent-sub">
            <fieldset>
                <legend>Storm Surge</legend>
                 <div class="col-xs-12 "> 
                    <div class="col-xs-12 col-lg-12 ">                                        
                        <div id="fetch_images_storm"></div>
                    </div> 
                    <div class="col-xs-12 col-lg-12">
                        <fieldset>
                            <label>Upload map images <i>(*.png, *.jpeg, *.jpg format, maximum size of 50MB)</i></label>
                            <input type='file' name="img_tsunami" id="img_tsunami" /><br>
                            <input type="hidden" name="imagetsunamitxt" id="imagetsunamitxt" /> 
                        </fieldset>
                    </div>    
                    <div class="col-xs-12 col-lg-12">
                        <fieldset>
                            <div class="col-xs-12 col-lg-12">
                                <label>Upload Shapefile <i>(*.zip  format, maximum size of 50MB)</i></label>
                                <input type='file' name="zip_shpfile_storm" id="zip_shpfile_storm" onchange="readURLshapefilestorm(this);" />
                                <input type="hidden" name="shpzip_storm_text" id="shpzip_storm_text">
                                <div id="fetch_storm_shpfile"></div>
                            </div>
                        </fieldset>
                    </div>                                                         
                    <div class="col-xs-12 col-lg-12 tooltip">
                        <ul><li>                                        
                            <?= form_label('Remarks').form_textarea('tsunami','','id="tsunami" style="height:250px;"') ?>
                            <span class="tooltiptext">Input remarks/descriptions</span>
                        </li></ul>
                    </div>
                </div>
                <div class="col-xs-12 ">
                    <a type="text" class="btn btn-primary" id="addimageTsunami">Add data</a>
                </div>
                <div class="col-xs-12 ">
                    <div class="table-responsive large-tables"><br>
                        <table id="tbltsunami" class="content-table">
                            <thead>
                                <tr>
                                    <th colspan="3" style="text-align: center; font-size: 24px">Storm Surge Susceptibility</th>
                                </tr>
                            </thead>
                            <tbody id="tbodytsunami"></tbody>
                        </table>
                        <table id="tbltsunami_sample" class="content-table">
                            <tbody id="tbodytsunami_sample"></tbody>
                        </table>
                    </div>
                </div>
            </fieldset>       
        </div>
        <div id="g6" class="tabcontent-sub">
            <fieldset>
                <legend>Fault Line</legend>
                 <div class="col-xs-12 "> 
                    <div class="col-xs-12 col-lg-12 ">                                        
                        <div id="fetch_images_fault"></div>
                    </div> 
                    <div class="col-xs-12 col-lg-12">
                        <fieldset>
                            <label>Upload map images <i>(*.png, *.jpeg, *.jpg format, maximum size of 50MB)</i></label>
                            <input type='file' name="img_fire" id="img_fire" /><br>
                            <input type="hidden" name="imgfiretxt" id="imgfiretxt" /> 
                        </fieldset>    
                    </div> 
                    <div class="col-xs-12 col-lg-12">
                        <fieldset>
                            <div class="col-xs-12 col-lg-12">
                                <label>Upload Shapefile <i>(*.zip  format, maximum size of 50MB)</i></label>
                                <input type='file' name="zip_shpfile_fault" id="zip_shpfile_fault" onchange="readURLshapefilefault(this);" />
                                <input type="hidden" name="shpzip_fault_text" id="shpzip_fault_text">
                                <div id="fetch_fault_shpfile"></div>
                            </div>
                        </fieldset>
                    </div>                                                             
                    <div class="col-xs-12 col-lg-12 tooltip">
                        <ul><li>                                        
                            <?= form_label('Remarks').form_textarea('fire','','placeholder="Description" id="fire" style="height:250px;"') ?>
                            <span class="tooltiptext">Input remarks/descriptions</span>
                        </li></ul>
                    </div>
                </div>
                <div class="col-xs-12 ">
                    <a type="text" class="btn btn-primary" id="addimagefire">Add data</a>
                </div>
                <div class="col-xs-12 ">
                    <div class="table-responsive large-tables"><br>
                        <table id="tblfire" class="content-table">
                            <thead>
                                <tr>
                                    <th colspan="3" style="text-align: center; font-size: 24px">Fault Line</th>
                                </tr>
                            </thead>
                            <tbody id="tbodyfire"></tbody>
                        </table>
                        <table id="tblfire_sample" class="content-table">
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
                    <div class="col-xs-12 col-lg-12 ">                                        
                        <div id="fetch_images_othergeo"></div>
                    </div>
                    <div class="col-xs-12 col-lg-12">
                        <fieldset>
                            <label>Upload map images <i>(*.png, *.jpeg, *.jpg format, maximum size of 50MB)</i></label>
                            <input type='file' name="img_geohazard" id="img_geohazard" /><br>
                            <input type="hidden" name="imggeohazardtxt" id="imggeohazardtxt"> 
                        </fieldset>
                    </div> 
                    <div class="col-xs-12 col-lg-12">
                        <fieldset>
                            <div class="col-xs-12 col-lg-12">
                                <label>Upload Shapefile <i>(*.zip  format, maximum size of 50MB)</i></label>
                                <input type='file' name="zip_shpfile_othergeohazard" id="zip_shpfile_othergeohazard" onchange="readURLshapefileothergeohazard(this);" />
                                <input type="hidden" name="shpzip_othergeohazard_text" id="shpzip_othergeohazard_text">
                                <div id="fetch_othergeohazard_shpfile"></div>
                            </div>
                        </fieldset>
                    </div>                                                            
                    <div class="col-xs-12 col-lg-12 tooltip">                                        
                        <ul><li>                                        
                            <?= form_label('Remarks').form_textarea('geohazard','','placeholder="Description" id="geohazard" style="height:250px;"') ?>
                            <span class="tooltiptext">Input remarks/descriptions</span>
                        </li></ul>
                    </div>
                </div>
                <div class="col-xs-12 ">
                        <a type="text" class="btn btn-primary" id="addimageGeohazard">Add data</a>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="table-responsive large-tables"><br>
                            <table id="tblgeohazard" class="content-table">
                                <thead>
                                    <tr>
                                        <th colspan="3" style="text-align: center; font-size: 24px">Other Geohazard</th>
                                    </tr>
                                </thead>
                                <tbody id="tbodygeohazard"></tbody>
                            </table>
                            <table id="tblgeohazard_sample" class="content-table">
                                
                                <tbody id="tbodygeohazard_sample"></tbody>
                            </table>
                    </div>
                </div>
            </fieldset>
        </div>
    <!-- </fieldset> -->
    </div>
</div>

<form method="post" action="" id="TopoForm" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-topo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Topography and Slope</h4>
                </div>
                <input type="hidden" id="topo-id" name="topo-id" value="" />
                <input type="hidden" id="topo-gencode" name="topo-gencode" value="" />
                <div class="modal-body" >
                    <div class="col-xs-12 " style="margin-top:10px">
                        <fieldset>
                            <div class="col-xs-12 col-lg-12">
                                <label>Upload Shapefile <i>(*.zip  format, maximum size of 50MB)</i></label>
                                <input type='file' name="edit-shp_topo" id="edit-shp_topo" onchange="readURLshapefileTopoEdit(this);" />
                                <input type="hidden" name="edit-shp_topo_txt" id="edit-shp_topo_txt">
                                <input type="hidden" name="edit-shp_topo_old" id="edit-shp_topo_old">
                                <div id="edit-fetch_topo_shpfile"></div>
                            </div>
                        </fieldset>
                        <div class="col-xs-12 col-lg-12 ">
                            <ul><li>
                                <?php echo form_label('Description','','').''.form_textarea('edit-topo-desc','',' id="edit-topo-desc" style="height:350px"') ?>                                
                            </li></ul>
                        </div>
                        <div class="col-xs-12 col-lg-12">
                            <div>
                                <label>Date Created : </label><span id="date_create_div"></span>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-12">
                            <div>
                                <label>Last Updated : </label><span id="date_update_div"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="modal-footer">
                            <button class="btn btn-info" type="button" name="submit" value="UpdateTopo" onclick="UpdateEditTopo();" >Update</button>
                        </div>
                    </div>
                    <!-- <div class="col-xs-12 " style="margin-top:10px">
                        <div class="col-xs-12 ">
                            <div class="modal-footer">
                                <input class="btn btn-info" type="submit" name="submit" value="Update" id="UpdateTopo" onclick="UpdateEditTopo();" />
                            </div>
                        </div>
                    </div> -->
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>

<form method="post" action="" id="SoilForm" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-soil" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Soil Type</h4>
                </div>
                <input type="hidden" id="soil-id" name="soil-id" value="" />
                <input type="hidden" id="soil-gencode" name="soil-gencode" value="" />
                <div class="modal-body" >
                    <div class="col-xs-12 " style="margin-top:10px">
                        <fieldset>
                            <div class="col-xs-12 col-lg-12">
                                <label>Upload Shapefile <i>(*.zip  format, maximum size of 50MB)</i></label>
                                <input type='file' name="edit-shp_soil" id="edit-shp_soil" onchange="readURLshapefilesoilEdit(this);" />
                                <input type="hidden" name="edit-shp_soil_txt" id="edit-shp_soil_txt">
                                <input type="hidden" name="edit-shp_soil_old" id="edit-shp_soil_old">
                                <div id="edit-fetch_soil_shpfile"></div>
                            </div>
                        </fieldset> 
                        <div class="col-xs-12 col-lg-12 ">
                            <ul><li>
                                <?php echo form_label('Description','','').''.form_textarea('edit-soil-desc','',' id="edit-soil-desc" style="height:350px"') ?>
                            </li></ul>
                        </div>
                        <div class="col-xs-12 col-lg-12">
                            <div>
                                <label>Date Created : </label><span id="date_create_div_soil"></span>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-12">
                            <div>
                                <label>Date last updated : </label><span id="date_update_div_soil"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="modal-footer">
                            <button class="btn btn-info" type="button" name="submit" value="UpdateSoil" onclick="UpdateEditSoil();" >Update</button>
                        </div>
                    </div>                    
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>

<form method="post" action="" id="RockForm" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-rock" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Rock Formation</h4>
                </div>
                <input type="hidden" id="rock-id" name="rock-id" value="" />
                <input type="hidden" id="rock-gencode" name="rock-gencode" value="" />
                <div class="modal-body" >
                     <div class="col-xs-12 " style="margin-top:10px">
                        <fieldset>
                            <div class="col-xs-12 col-lg-12">
                                <label>Upload Shapefile <i>(*.zip  format, maximum size of 50MB)</i></label>
                                <input type='file' name="edit-shp_rock" id="edit-shp_rock" onchange="readURLshapefilerockEdit(this);" />
                                <input type="hidden" name="edit-shp_rock_txt" id="edit-shp_rock_txt">
                                <input type="hidden" name="edit-shp_rock_old" id="edit-shp_rock_old">
                                <div id="edit-fetch_rock_shpfile"></div>
                            </div>
                        </fieldset> 
                        <div class="col-xs-12 col-lg-12 ">
                            <ul><li>
                                <?php echo form_label('Description','','').''.form_textarea('edit-rock-desc','',' id="edit-rock-desc" style="height:350px"') ?>                                
                            </li></ul>
                        </div>
                        <div class="col-xs-12 col-lg-12">
                            <div>
                                <label>Date Created : </label><span id="date_create_div_rock"></span>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-12">
                            <div>
                                <label>Date last updated : </label><span id="date_update_div_rock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="modal-footer">
                            <button class="btn btn-info" type="button" name="submit" value="UpdateRock" onclick="UpdateEditRock();" >Update</button>
                        </div>
                    </div>
                    <!-- <div class="col-xs-12 " style="margin-top:10px">
                        <div class="col-xs-12 ">
                            <div class="modal-footer">
                                <input class="btn btn-info" type="submit" name="submit" value="Update" id="UpdateRock" onclick="UpdateEditRock();" />
                            </div>
                        </div>
                    </div> -->
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>

<form method="post" action="" id="ClimateForm" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-climate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Climate Type</h4>
                </div>
                <input type="hidden" id="climate-id" name="climate-id" value="" />
                <input type="hidden" id="climate-gencode" name="climate-gencode" value="" />
                <div class="modal-body" >
                    <div class="col-xs-12 ">
                        <div class="col-xs-12 col-lg-12">
                            <ul><li>
                                <?php echo form_label('Climate Type').form_dropdown('edit-climate',$clitype,'','id="edit-climate"'); ?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 " style="margin-top:10px">
                        <div class="col-xs-12 col-lg-12 ">
                            <ul><li>
                            <?php echo form_label('Remarks').form_textarea('edit-climate-desc','',' id="edit-climate-desc"') ?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-12">
                        <div>
                            <label>Date Created : </label><span id="date_create_div_climate"></span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-12">
                        <div>
                            <label>Date last updated : </label><span id="date_update_div_climate"></span>
                        </div>
                    </div>
                    <div class="col-xs-12 " style="margin-top:10px">
                        <div class="col-xs-12 ">
                            <div class="modal-footer">
                                <button class="btn btn-info" type="button" onclick="UpdateEditClimate();" />Update

                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>

<form method="post" action="" id="HydroForm" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-hydro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Hydrology/River system</h4>
                </div>
                <input type="hidden" id="hydro-id" name="hydro-id" value="" />
                <input type="hidden" id="hydro-gencodes" name="hydro-gencodes" value="" />
                <input type="hidden" id="hydro-gencode2" name="hydro-gencode2" value="" />
                <div class="modal-body" >
                    <fieldset>
                        <legend style="background-color: transparent;color: black;font-weight: 700">Map of river system and groundwater class</legend>
                        <div class="col-xs-12 col-lg-12">
                            <div class="col-xs-12 col-lg-4 col-sm-12 col-md-4">                               
                                <div id="fetchHydroImgMapEdit"></div>
                                <input type='file' name="edit-pic_hydromap" id="edit-pic_hydromap" /><br>
                                <input type="hidden" name="edit-img_hydromaptext" id="edit-img_hydromaptext">
                                <input type="hidden" name="edit-img_hydromapold" id="edit-img_hydromapold">
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="col-xs-12 col-lg-12">
                            <label>Upload Shapefile <i>(*.zip  format, maximum size of 50MB)</i></label>
                            <input type='file' name="edit-zip_shpfile_hydro" id="edit-zip_shpfile_hydro" onchange="readURLshapefileHydrologyEdit(this);" />
                            <input type="hidden" name="edit-ziphydrodata_text" id="edit-ziphydrodata_text">
                            <input type="hidden" name="edit-ziphydrodata_old" id="edit-ziphydrodata_old">
                            <div id="edit-fetch_hydro_shpfile"></div>
                        </div>
                    </fieldset>
                    <!-- <fieldset>
                    <div class="col-xs-12">
                        <div class="col-xs-12 col-lg-12 ">
                            <ul><li>
                                <?= form_label('Current file attached','','for="zip_shp_file_hydro"')?>
                                <a href="" id="zip_shp_file_hydro" target="_blank"></a>
                            </li></ul>
                            <span id="edit-shpHydroSpan" class="edit-shpHydroSpan hidden"></span>
                        </div>
                    </div>
                        <legend>Upload Shapefile <i>(note: zip file)</i></legend>
                        <input type='file' name="edit-zip_shpfile_hydro" id="edit-zip_shpfile_hydro" onchange="readURLshpHydroEdit(this);"  />
                        <input type="hidden" name="edit-shpzip_hydro" id="edit-shpzip_hydro">
                        <br>
                    </fieldset> -->
                    <div class="col-xs-12" style="margin-top:10px">
                        <fieldset><legend style="background-color: transparent;color: #444; font-weight: 700;font-size: 14px;">Water Classification</legend>
                            <div class="col-xs-6">
                                <ul><li>
                                    <?php echo form_label('&nbsp;').form_dropdown('edit-waterclass',$waterclass,'','id="edit-waterclassid"') ?>
                                </li></ul>
                            </div>
                            <div class="col-xs-6">
                                <ul><li>
                                    <?= form_label('&nbsp;','','for="edit-waterclasssubid"').form_dropdown('edit-waterclasssubid','','','id="edit-waterclasssubid" '); ?>
                                        <div class="edit-error_catHydro"></div>
                                </li></ul>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-xs-12 col-lg-12" id="riverdivsEdit" style="display: none;">
                        <div class="col-xs-12 tooltip"> 
                            <ul><li>
                                <?= form_label("River – Inflow",'','for="edit-riverinflow"').form_textarea('edit-riverinflow','','placeholder="" id="edit-riverinflow"') ?>
                                <span class="tooltiptext">Name of river which flows into the PA</span>
                            </li></ul>
                        </div>
                        <div class="col-xs-12 tooltip"> 
                            <ul><li>
                                <?= form_label("River – Outflow",'','for="edit-riveroutflow"').form_textarea('edit-riveroutflow','','placeholder="" id="edit-riveroutflow"') ?>
                                <span class="tooltiptext">Name and/or location of river which flows out of the PA</span>
                            </li></ul>
                        </div>
                        <div class="col-xs-12 tooltip"> 
                            <ul><li>
                                <?= form_textarea('edit-hydro-desc','','id="edit-hydro-desc" placeholder="Brief description" style="height:150px"') ?>
                            </li></ul>                                
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-12" id="parameterdivsEdit" style="display: none;">            
                        <div class="col-xs-12 tooltip"> 
                            <ul><li>
                                <?= form_label("Parameters of water quality",'','for="edit-parameterwater"').form_textarea('edit-parameterwater','','id="edit-parameterwater"') ?>
                                <span class="tooltiptext">Parameters of water quality</span>
                            </li></ul>
                        </div>
                        <div class="col-xs-12 tooltip"> 
                            <ul><li>
                                <?php echo form_label('Status').form_dropdown('edit-waterqualitystatus',$waterqualitystatus,'','id="edit-waterqualitystatus"') ?>
                                <span class="tooltiptext">Select status of water quality</span>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12" id="hydroyearassessdivEdit">
                        <div class="col-xs-12 col-lg-12 tooltip">
                            <ul><li>
                                <?= form_label('Year assessed', '','for="edit-hydroyearassess"').form_dropdown('edit-hydroyearassess', $yearListed,'','id="edit-hydroyearassess"'); ?>
                                <span class="tooltiptext">Select year assessed</span>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-12" id="parameterdivs2Edit" style="display: none;">            
                        <div class="col-xs-12 col-lg-12">
                            <a type="text" class="btn btn-warning" id="addwaterqualityEdit">Add Parameter Water Quality</a>
                        </div>
                        <div class="col-xs-12 col-lg-12">
                            <div id="editparameterdata_div"></div>
                        </div>
                    </div>
                    
                    <div class="col-xs-12 col-lg-12">
                        <div>
                            <label>Date Created : </label><span id="date_create_div_hydro"></span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-12">
                        <div>
                            <label>Date last updated : </label><span id="date_update_div_hydro"></span>
                        </div>
                    </div>
                    <div class="col-xs-12 " style="margin-top:10px">
                        <div class="col-xs-12 ">
                            <div class="modal-footer">
                                <button class="btn btn-info" type="button" onclick="UpdateEditHydro();">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>

<form method="post" action="" id="LandForm" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-land" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Existing Landuse</h4>
                </div>
                <input type="hidden" id="land-id" name="land-id" value="" />
                <input type="hidden" id="land-gencode" name="land-gencode" value="" />
                <div class="modal-body" >
                    <fieldset>
                        <div class="col-xs-12 col-lg-12">
                            <label>Upload Shapefile <i>(*.zip  format, maximum size of 50MB)</i></label>
                            <input type='file' name="edit-shp_landuse" id="edit-shp_landuse" onchange="readURLshapefileLandusesEdit(this);" />
                            <input type="hidden" name="edit-shp_landuse_txt" id="edit-shp_landuse_txt">
                            <input type="hidden" name="edit-shp_landuse_old" id="edit-shp_landuse_old">
                            <div id="edit-fetch_landuse_shpfile"></div>
                        </div>
                    </fieldset>
                    <div class="col-xs-12 " style="margin-top:10px">
                        <div class="col-xs-12 col-lg-12 ">
                            <ul><li>
                                <?php echo form_label('Legend','','for="edit-land-legend"').form_dropdown('edit-land-legend',$existlanduse,'','id="edit-land-legend"') ?>
                            </li></ul>
                        </div>
                        <div class="col-xs-12 col-lg-12 ">
                            <ul><li>
                                <?php echo form_label('Sub Legend','','for="edit-sub_existing_landuse"').form_dropdown('edit-sub_existing_landuse','','','id="edit-sub_existing_landuse"') ?>
                            </li></ul>
                        </div>
                        <div class="col-xs-12 col-lg-12 ">
                            <ul><li>
                                <?php echo form_label('Area','','').''.form_input('edit-land-area','',' id="edit-land-area" ') ?>
                            </li></ul>
                        </div>
                        <div class="col-xs-12 col-lg-12 ">
                            <ul><li>
                                <?php echo form_label('Remarks','','').''.form_textarea('edit-land-remarks','',' id="edit-land-remarks"') ?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-12">
                        <div>
                            <label>Date Created : </label><span id="date_create_div_land"></span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-12">
                        <div>
                            <label>Date last updated : </label><span id="date_update_div_land"></span>
                        </div>
                    </div>
                    <div class="col-xs-12 " style="margin-top:10px">
                        <div class="col-xs-12 ">
                            <div class="modal-footer">
                                <button class="btn btn-info" type="button" onclick="UpdateEditLand();" />Update
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>
<form method="post" action="" id="WatershedForm" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-watershed" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Watershed and River Basin</h4>
                </div>
                <input type="hidden" id="watershed-id" name="watershed-id" value="" />
                <input type="hidden" id="watershed-gencode" name="watershed-gencode" value="" />
                <input type="hidden" id="watershed-id_program" name="watershed-id_program" value="" />
                <div class="modal-body" >
                    <fieldset>
                        <legend>Watershed and River Basin</legend>
                        <div class="col-xs-12">
                            <div class="col-xs-12 " style="margin-top:10px">
                                <div class="col-xs-12 col-lg-12 ">
                                    <img width="200px" height="180px" id="edit-blahwatershed" src="<?php echo base_url("bmb_assets2/upload/watershed/nophoto.jpg") ?>" alt="your image" /><br>
                                    <input type='file' name="edit-pic_watershedimg" id="edit-pic_watershedimg" onchange="readURLwatershededit(this);"  /><br>
                                    <input type="hidden" name="edit-old_picture_watershed" id="edit-old_picture_watershed">
                                    <span id="edit-watershedspan" class="edit-watershedspan"></span>
                                </div>
                            </div>
                            <fieldset>
                                <div class="col-xs-12 col-lg-12">
                                    <label>Upload Shapefile <i>(*.zip  format, maximum size of 50MB)</i></label>
                                    <input type='file' name="edit-shp_watersheds" id="edit-shp_watersheds" onchange="readURLshapefilewatershedsEdit(this);" />
                                    <input type="hidden" name="edit-shp_watersheds_txt" id="edit-shp_watersheds_txt">
                                    <input type="hidden" name="edit-shp_watersheds_old" id="edit-shp_watersheds_old">
                                    <div id="edit-fetch_watersheds_shpfile"></div>
                                </div>
                            </fieldset>
                            <div class="col-xs-12">
                                <ul><li>
                                    <?= form_label('River Basin Name','','edit-riverbasinname').form_dropdown('edit-riverbasinname',$riverbasinlist,'','id="edit-riverbasinname"') ?>
                                </li></ul>
                            </div>
                            <div class="col-xs-12">
                                <ul><li>
                                    <?= form_label('Watershed name','','edit-watershedname').form_dropdown('edit-watershedname','','','id="edit-watershedname"') ?>
                                </li></ul>
                            </div>
                            <div class="col-xs-12">
                                <ul><li>
                                    <?= form_label('Sub Watershed Name','','edit-subwatershedname').form_textarea('edit-subwatershedname','','id="edit-subwatershedname"') ?>
                                </li></ul>
                            </div>
                            <div class="col-xs-12 col-lg-12">
                                <div>
                                    <label>Date Created : </label><span id="date_create_watershed"></span>
                                </div>
                            </div>
                            <div class="col-xs-12 col-lg-12">
                                <div>
                                    <label>Last Updated : </label><span id="date_update_watershed"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 " style="margin-top:10px">
                            <div class="col-xs-12 ">
                                <div class="modal-footer">
                                    <button class="btn btn-info" type="button" onclick="UpdateEditwatershed();" />Update
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>

<form method="post" action="" id="FormUrbanEco" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-urbaneco" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Urban Ecosystem</h4>
                </div>
                <input type="hidden" id="urbaneco-id" name="urbaneco-id" value="" />
                <input type="hidden" id="urbaneco-gencode" name="urbaneco-gencode" value="" />
                <div class="modal-body" >
                    <fieldset>
                        <fieldset class="hidden">
                            <div class="col-xs-12 col-lg-12">
                                <label>Upload Shapefile <i>(*.zip  format, maximum size of 50MB)</i></label>
                                <input type='file' name="edit-shp_urbaneco" id="edit-shp_urbaneco" onchange="readURLshapefileurbanecoEdit(this);" />
                                <input type="hidden" name="edit-shp_urbaneco_txt" id="edit-shp_urbaneco_txt">
                                <input type="hidden" name="edit-shp_urbaneco_old" id="edit-shp_urbaneco_old">
                                <div id="edit-fetch_urbaneco_shpfile"></div>
                            </div>
                        </fieldset> 
                        <div class="col-lg-12 col-xs-12">
                            <div class="col-xs-12 col-lg-12">
                                <?php echo form_checkbox('edit-chk_cupa','','','id="edit-chk_cupa"').form_label('Cities/Urban area within protected areas','','for="edit-chk_cupa"') ?>
                            </div>
                            <div class="col-xs-12 col-lg-12" id="cupadivedit">
                                <ul><li>
                                    <?= form_label('Specify Cities/Urban areas','','edit-cupa_details').form_textarea('edit-cupa_details','','id="edit-cupa_details"') ?>
                                </li></ul>
                            </div>
                        </div>
                        <div class="col-lg-12 col-xs-12">
                            <div class="col-xs-12 col-lg-12">
                                <?php echo form_checkbox('edit-chk_cbi','','','id="edit-chk_cbi"').form_label('City Biodiversity Index (CBI)/Urban Biodiversity Index adopted','','for="edit-chk_cbi"') ?>
                            </div>
                            <div class="col-xs-12 col-lg-12" id="cbidivedit">
                                <ul><li>
                                    <?= form_label('Upload LGU Resolution/Ordinance') ?>
                                    <input type='file' name="edit-lguresolutions" id="edit-lguresolutions" onchange="readURLUrbanEcoEdit(this);"  />
                                    <input type="hidden" name="edit-oldlgureso" id="edit-oldlgureso">
                                    <span id="edit-urbaneco_span"></span>
                                </li></ul>
                                <div class="col-xs-12">
                                    <ul><li>
                                        <?= form_label('Current file attached','','for="edit-oldlguresos"')?>
                                        <a href="" id="edit-oldlguresos" target="_blank"></a>
                                    </li></ul>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-info" type="button" onclick="updateurbaneco();" />Update
                        </div>
                    </fieldset>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>

<form method="post" action="" id="LandslideForm" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-landslide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Landslide Susceptibility</h4>
                </div>
                <input type="hidden" id="landslide-id" name="landslide-id" value="" />
                <input type="hidden" id="landslide-gencode" name="landslide-gencode" value="" />
                <div class="modal-body" >
                    <div class="col-xs-12 " style="margin-top:10px">
                        <div class="col-xs-12 col-lg-12 ">
                            <ul><li>
                                <?php echo form_label('Legend','','').''.form_dropdown('edit-landslide-legend',$landslideLegend,'',' id="edit-landslide-legend"'); ?>
                            </li></ul>
                        </div>
                        <div class="col-xs-12 col-lg-12 ">
                            <ul><li>
                                <?php echo form_label('Area','','').''.form_input('edit-landslide-area','',' id="edit-landslide-area" ') ?>
                            </li></ul>
                        </div>
                        <div class="col-xs-12 col-lg-12 ">
                            <ul><li>
                                <?php echo form_label('Remarks','','').''.form_textarea('edit-landslide-remarks','',' id="edit-landslide-remarks"') ?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-12">
                        <div>
                            <label>Date Created : </label><span id="date_create_div_landslide"></span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-12">
                        <div>
                            <label>Date last updated : </label><span id="date_update_div_landslide"></span>
                        </div>
                    </div>
                    <div class="col-xs-12 " style="margin-top:10px">
                        <div class="col-xs-12 ">
                            <div class="modal-footer">
                                <!-- <input class="btn btn-info" type="submit" name="submit" value="Update" id="UpdateTopo" onclick="UpdateEditLandslide();" />   -->
                                <button class="btn btn-info" type="button" onclick="UpdateEditLandslide();" />Update

                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>

<form method="post" action="" id="FloodingForm" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-flooding" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Flooding Susceptibility</h4>
                </div>
                <input type="hidden" id="flooding-id" name="flooding-id" value="" />
                <input type="hidden" id="flooding-gencode" name="flooding-gencode" value="" />
                <div class="modal-body" >
                    <div class="col-xs-12 " style="margin-top:10px">
                        <div class="col-xs-12 col-lg-12 ">
                            <ul><li>
                                <?php echo form_label('Legend','','').''.form_dropdown('edit-flood-legend',$floodingLegend,'',' id="edit-flood-legend"'); ?>
                            </li></ul>
                        </div>
                        <div class="col-xs-12 col-lg-12 ">
                            <ul><li>
                                <?php echo form_label('Area','','').''.form_input('edit-flood-area','',' id="edit-flood-area" ') ?>
                            </li></ul>
                        </div>
                        <div class="col-xs-12 col-lg-12 ">
                            <ul><li>
                                <?php echo form_label('Remarks','','').''.form_textarea('edit-flood-remarks','',' id="edit-flood-remarks"') ?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-12">
                        <div>
                            <label>Date Created : </label><span id="date_create_div_flood"></span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-12">
                        <div>
                            <label>Date last updated : </label><span id="date_update_div_flood"></span>
                        </div>
                    </div>
                    <div class="col-xs-12 " style="margin-top:10px">
                        <div class="col-xs-12 ">
                            <div class="modal-footer">
                                <!-- <input class="btn btn-info" type="submit" name="submit" value="Update" id="UpdateTopo" onclick="UpdateEditFlooding();" />                             -->
                                <button class="btn btn-info" type="button" onclick="UpdateEditFlooding();" />Update
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>

<form method="post" action="" id="SeaForm" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-sea" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Sea level rise</h4>
                </div>
                <input type="hidden" id="sea-id" name="sea-id" value="" />
                <input type="hidden" id="sea-gencode" name="sea-gencode" value="" />
                <div class="modal-body" >
                    <div class="col-xs-12 " style="margin-top:10px">
                        <div class="col-xs-12 col-lg-12 ">
                            <img width="200px" height="180px" id="edit-sea" src="<?php echo base_url("bmb_assets2/upload/sealevel_img/nophoto.jpg") ?>" alt="your image" /><br>
                            <input type='file' name="edit-pic_sea" id="edit-pic_sea" onchange="readURLsSeaedit(this);"  /><br>
                            <input type="hidden" name="edit-old_picture_sea" id="edit-old_picture_sea">
                            <span id="edit-img_output" class="edit-img_output"></span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-12">
                        <fieldset>
                            <div class="col-xs-12 col-lg-12">
                                <label>Upload Shapefile <i>(*.zip  format, maximum size of 50MB)</i></label>
                                <input type='file' name="edit-zip_shpfile_sealevel" id="edit-zip_shpfile_sealevel" onchange="readURLshapefilesealevelEdit(this);" />
                                <input type="hidden" name="edit-shpzip_sealevel_text" id="edit-shpzip_sealevel_text">
                                <input type="hidden" name="edit-shpzip_sealevel_old" id="edit-shpzip_sealevel_old">
                                <div id="edit-fetch_sealevel_shpfile"></div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-xs-12 " style="margin-top:10px">
                        <div class="col-xs-12 col-lg-12 ">
                            <ul><li>
                                <?php echo form_label('Sea level rise description','','').''.form_textarea('edit-sea-desc','',' id="edit-sea-desc"') ?>
                            </li></ul>
                        </div>
                    </div>

                    <div class="col-xs-12 " style="margin-top:10px">
                        <div class="col-xs-12 ">
                            <div class="modal-footer">
                                <!-- <input class="btn btn-info" type="submit" name="submit" value="Update" id="UpdateSea" onclick="UpdateEditSea();" />                             -->
                                <button class="btn btn-info" type="button" onclick="UpdateEditSea();" />Update
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>

<form method="post" action="" id="TsunamiForm" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-tsunami" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Storm Surge</h4>
                </div>
                <input type="hidden" id="tsunami-id" name="tsunami-id" value="" />
                <input type="hidden" id="tsunami-gencode" name="tsunami-gencode" value="" />
                <div class="modal-body" >
                    <div class="col-xs-12 " style="margin-top:10px">
                        <fieldset>
                            <div class="col-xs-12 col-lg-12 ">
                                <img width="200px" height="180px" id="edit-tsunami" src="<?php echo base_url("bmb_assets2/upload/tsunami_img/nophoto.jpg") ?>" alt="your image" /><br>
                                <input type='file' name="edit-pic_tsunami" id="edit-pic_tsunami" onchange="readURLsTsunamiedit(this);"  /><br>
                                <input type="hidden" name="edit-old_picture_tsunami" id="edit-old_picture_tsunami">
                                <span id="edit-img_output" class="edit-img_output"></span>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-xs-12 col-lg-12">
                        <fieldset>
                            <div class="col-xs-12 col-lg-12">
                                <label>Upload Shapefile <i>(*.zip  format, maximum size of 50MB)</i></label>
                                <input type='file' name="edit-zip_shpfile_storm" id="edit-zip_shpfile_storm" onchange="readURLshapefilestormEdit(this);" />
                                <input type="hidden" name="edit-shpzip_storm_text" id="edit-shpzip_storm_text">
                                <input type="hidden" name="edit-shpzip_storm_old" id="edit-shpzip_storm_old">
                                <div id="edit-fetch_storm_shpfile"></div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-xs-12 " style="margin-top:10px">
                        <div class="col-xs-12 col-lg-12 ">
                            <ul><li>
                                <?php echo form_label('Tsunami description','','').''.form_textarea('edit-tsunami-desc','',' id="edit-tsunami-desc"') ?>
                            </li></ul>
                        </div>
                    </div>

                    <div class="col-xs-12 " style="margin-top:10px">
                        <div class="col-xs-12 ">
                            <div class="modal-footer">
                                <!-- <input class="btn btn-info" type="submit" name="submit" value="Update" id="UpdateTsunami" onclick="UpdateEditTsunami();" />                             -->
                                <button class="btn btn-info" type="button" onclick="UpdateEditTsunami();" />Update
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>

<form method="post" action="" id="FireForm" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-fire" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Fault Line</h4>
                </div>
                <input type="hidden" id="fire-id" name="fire-id" value="" />
                <input type="hidden" id="fire-gencode" name="fire-gencode" value="" />
                <div class="modal-body" >
                    <div class="col-xs-12 " style="margin-top:10px">
                        <div class="col-xs-12 col-lg-12 ">
                            <fieldset>
                                <img width="200px" height="180px" id="edit-fire" src="<?php echo base_url("bmb_assets2/upload/fire_img/nophoto.jpg") ?>" alt="your image" /><br>
                                <input type='file' name="edit-pic_fire" id="edit-pic_fire" onchange="readURLsFireedit(this);"  /><br>
                                <input type="hidden" name="edit-old_picture_fire" id="edit-old_picture_fire">
                                <span id="edit-img_output" class="edit-img_output"></span>
                            </fieldset>
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-12">
                        <fieldset>
                            <div class="col-xs-12 col-lg-12">
                                <label>Upload Shapefile <i>(*.zip  format, maximum size of 50MB)</i></label>
                                <input type='file' name="edit-zip_shpfile_fault" id="edit-zip_shpfile_fault" onchange="readURLshapefilefaultEdit(this);" />
                                <input type="hidden" name="edit-shpzip_fault_text" id="edit-shpzip_fault_text">
                                <input type="hidden" name="edit-shpzip_fault_old" id="edit-shpzip_fault_old">
                                <div id="edit-fetch_fault_shpfile"></div>
                            </div>
                        </fieldset>
                    </div> 
                    <div class="col-xs-12 " style="margin-top:10px">
                        <div class="col-xs-12 col-lg-12 ">
                        <ul><li>
                            <?php echo form_label('Fault line description','','').''.form_textarea('edit-fire-desc','',' id="edit-fire-desc"') ?>
                         </li></ul>
                        </div>
                    </div>

                    <div class="col-xs-12 " style="margin-top:10px">
                        <div class="col-xs-12 ">
                            <div class="modal-footer">
                                <!-- <input class="btn btn-info" type="submit" name="submit" value="Update" id="UpdateTsunami" onclick="UpdateEditFire();" />                             -->
                                <button class="btn btn-info" type="button" onclick="UpdateEditFire();" />Update
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>

<form method="post" action="" id="GeohazardForm" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-geohazard" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Other Geohazard</h4>
                </div>
                <input type="hidden" id="geohazard-id" name="geohazard-id" value="" />
                <input type="hidden" id="geohazard-gencode" name="geohazard-gencode" value="" />
                <div class="modal-body" >
                    <div class="col-xs-12 " style="margin-top:10px">
                        <div class="col-xs-12 col-lg-12 ">
                            <fieldset>
                                <img width="200px" height="180px" id="edit-geohazard" src="<?php echo base_url("bmb_assets2/upload/other_geohazard_img/nophoto.jpg") ?>" alt="your image" /><br>
                                <input type='file' name="edit-pic_geohazard" id="edit-pic_geohazard" onchange="readURLsGeoedit(this);"  /><br>
                                <input type="hidden" name="edit-old_picture_geohazard" id="edit-old_picture_geohazard">
                                <span id="edit-img_output" class="edit-img_output"></span>
                            </fieldset>
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-12">
                        <fieldset>
                            <div class="col-xs-12 col-lg-12">
                                <label>Upload Shapefile <i>(*.zip  format, maximum size of 50MB)</i></label>
                                <input type='file' name="edit-zip_shpfile_othergeohazard" id="edit-zip_shpfile_othergeohazard" onchange="readURLshapefileothergeohazardEdit(this);" />
                                <input type="hidden" name="edit-shpzip_othergeohazard_text" id="edit-shpzip_othergeohazard_text">
                                <input type="hidden" name="edit-shpzip_othergeohazard_old" id="edit-shpzip_othergeohazard_old">
                                <div id="edit-fetch_othergeohazard_shpfile"></div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-xs-12 " style="margin-top:10px">
                        <div class="col-xs-12 col-lg-12 ">
                        <ul><li>
                            <?php echo form_label('Description','','').''.form_textarea('edit-geohazard-desc','',' id="edit-geohazard-desc"') ?>
                        </li></ul>
                        </div>
                    </div>

                    <div class="col-xs-12 " style="margin-top:10px">
                        <div class="col-xs-12 ">
                            <div class="modal-footer">
                                <button class="btn btn-info" type="button" onclick="UpdateEditGeohazards();" />Update

                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>