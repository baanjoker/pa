<div id="managementzone" class="tab-pane">
    <div class="form-style-6">
        <h2>Management Planning</h2>
    </div>
    <div class="tab">
        <a class="tablinkmgmtplan active" id="loadmultiple" onclick="tabmanagementplanning(event, 'mgmtzone')">Management Zone</a>
        <a class="tablinkmgmtplan" id="managementplanc" onclick="tabmanagementplanning(event, 'mgmtplan')">Management Plan</a>
        <a class="tablinkmgmtplan" id="othermanagementplanc" onclick="tabmanagementplanning(event, 'mgmtother')">Thematic or Other Plan</a>
    </div>
    <div id="mgmtzone" class="tabcontentplan" style="display: block">
       
        <fieldset>
           <legend>Map image</legend>                   
            <div class="col-xs-12">                                        
                <div class="col-xs-6 col-lg-6 ">   
                    <div id="fetch_images_mgntzone"></div>
                </div>
                <div class="col-xs-12 col-lg-12">
                    <fieldset>  
                        <label>Upload map image of management zone<i>(*.png, *.jpeg, *.jpg format, maximum size of 50MB)</i></label>
                        <input type='file' name="img_mngtzonemap" id="img_mngtzonemap" />
                        <input type="hidden" name="old_picture" value="nophoto.jpg"> 
                        <input type="hidden" id="img_mngtzonemapspan" name="img_mngtzonemapspan">
                    </fieldset> 
                </div>
            </div>
        </fieldset>
        <div class="col-xs-12"> 
            <div class="col-xs-12 col-lg-12">
                <fieldset>
                    <label>Upload shapefile of management zone<i>(*.rar, *.zip format, maximum size of 50MB)</i></label>
                    <input type='file' name="mgmtzone_shpfile" id="mgmtzone_shpfile" />
                    <input type="hidden" name="mgmtzone_shpfile_text"> 
                    <div id="mgmtzone_shpfile_div"></div>
                </fieldset>
            </div>
        </div>
        <div class="col-xs-12" style="margin-top:20px;">    
            <div class="col-xs-12 col-lg-6">
                <fieldset>
                    <legend>Strict Protection Zone</legend>
                    <div class="col-lg-12 tooltip">
                    <ul><li>
                        <?= form_label('Category').form_dropdown('splcat',$splcategory,'','id="splcat"') ?>
                        <span class="tooltiptext">Refers to locations within protected areas that are closed to human activities by virtue of their significant biodiversity value, high susceptibility to geo-hazards, or identification as permanently dangerous. They may also be classified as an SPZ due to the presence of threatened species habitats as well as degraded areas that are designated for restoration and subsequent protection regardless of the current stage of regeneration. [Rule 4.1 (n), DAO 2019-05 or the IRR of RA 7586, as amended by RA 11038)</span>
                    </li></ul>
                    </div>
                    <div class="col-lg-12 tooltip">
                    <ul><li>
                        <?= form_label('Area(has)','','for="stricthas"').form_input('stricthas','','placeholder=" " id="stricthas" class="number-separator"');?>    
                        <span class="tooltiptext">Input area (has)</span>                            
                    </li></ul>
                    </div>
                    <div class="col-lg-12 tooltip">
                    <ul><li>
                        <?= form_label('Archipelagic Sea Lanes','','for="strictarchisea"').form_dropdown('strictarchisea',$kba,'','id="strictarchisea"');?>  
                        <span class="tooltiptext">Select archipelagic sea lanes</span>
                    </li></ul>
                    </div>
                    <div class="col-lg-12 tooltip">
                    <ul><li>
                        <?= form_label('Remarks','','for="strictzone"').form_textarea('strictzone','','id="strictzone"');?>  
                        <span class="tooltiptext">Input brief description</span>                             
                    </li></ul>
                    </div>                
                    <div class="col-xs-12">
                    <a type="text" id="add_strict" class="btn btn-primary">Add to table</a>                           
                </div>
                <div class="col-xs-12">                            
                    <div class="table-responsive large-tables">
                        <table id="table_strict" class="content-table">
                            <thead>
                                <tr>                                                
                                    <th colspan="4" style="text-align: center; font-size: 24px"> Strict Protection Zone data</th>                                           
                                </tr>
                                <tr>
                                    <th style='text-align: center;'>Category</th>
                                    <th style='text-align: center;'>Description</th>
                                    <th style='text-align: center;'>Area (has)</th>
                                    <th style='text-align: center;'>Archipelegic Sea Lanes</th>
                                    <!-- <th></th> -->
                                </tr>
                            </thead>
                            <tbody id="tbodystrict"></tbody>
                        </table>
                        <table id="table_strict_sample" class="content-table">                                       
                            <tbody id="tbodystrict_sample"></tbody>
                        </table>
                    </div> 
                </div>
                </fieldset>
            </div>                        
            <div class="col-xs-12 col-lg-6">
                <fieldset>
                    <legend>Multiple Use Zone</legend>
                    <div class="col-lg-12 tooltip">
                        <ul><li>
                            <?= form_label('Category').form_dropdown('multicat',$splcategory,'','id="multicat"') ?>
                            <span class="tooltiptext">Refers to the area where settlement, traditional and sustainable land use including agriculture, agroforestry, extraction activities, and income generating or livelihood activities may be allowed to the extent prescribed in the protected area management plan. [Section (t), RA 7586, as amended by RA 11038)</span>
                        </li></ul>    
                    </div>            
                    <div class="col-lg-12 tooltip">
                        <ul><li>
                            <?= form_label('Area(has)','','for="multiplehas"').form_input('multiplehas','','placeholder=" " id="multiplehas" class="number-separator"');?>
                            <span class="tooltiptext">Input area (has)</span>                            
                        </li></ul>
                    </div>
                    <div class="col-lg-12 tooltip">
                        <ul><li>
                            <?= form_label('Archipelagic Sea Lanes','','for="multiplearchisea"').form_dropdown('multiplearchisea',$kba,'','id="multiplearchisea"');?>  
                            <span class="tooltiptext">Select archipelagic sea lanes</span>
                        </li></ul>
                    </div>
                    <div class="col-lg-12 tooltip">
                        <ul><li>
                            <?= form_label('Remarks','','for="multiplezone"').form_textarea('multiplezone','','id="multiplezone"');?>
                            <span class="tooltiptext">Input brief description</span>                             
                        </li></ul>     
                    </div>                      
                <div class="col-xs-12">
                    <a type="text" id="add_multipleu" class="btn btn-primary">Add to table</a>                           
                </div>
                <div class="col-xs-12">                            
                    <div class="table-responsive large-tables">
                        <table id="table_multiple" class="content-table">
                            <thead>
                                <tr>                                                
                                    <th colspan="4" style="text-align: center; font-size: 24px"> Multiple Use Zone data</th>                                           
                                </tr>
                                <tr>
                                    <th style='text-align: center;'>Category</th>
                                    <th style='text-align: center;'>Description</th>
                                    <th style='text-align: center;'>Area (has)</th>
                                    <th style='text-align: center;'>Archipelegic Sea Lanes</th>
                                </tr>
                            </thead>
                            <tbody id="tbodymultiple"></tbody>
                        </table>
                        <table id="table_multiple_sample" class="content-table">                                       
                            <tbody id="tbodymultiple_sample"></tbody>
                        </table>
                    </div> 
                </div>
                </fieldset>
            </div>                        
        </div> 
    </div>
    <div id="mgmtplan" class="tabcontentplan" style="display: none;">
        <div class="form-style-6">
                    <!-- <h2>Management Plan</h2> -->
                    <fieldset>
                        <div class="col-xs-12">
                            <div class="col-xs-12 col-lg-12 ">
                                <fieldset>
                                    <label>Attach Management Plan <i>(*.pdf format, maximum size of 50MB)</i></label>
                                    <input type='file' name="mngmtplanfile" id="mngmtplanfile" onchange="insertmngmntfile(this);" />
                                    <input type="hidden" name="old_mngmtplanfile" id="old_mngmtplanfile">
                                    <div id="uploadmngtmplans"></div>
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="col-xs-12 col-lg-12 ">
                                <fieldset>
                                    <label>Copy of PAMB Resolution <i>(*.pdf format, maximum size of 50MB)</i></label>
                                    <input type='file' name="mgmtplanpambreso" id="mgmtplanpambreso" onchange="insertmngmntfilepambreso(this);" />
                                    <input type="hidden" name="old_mgmtplanpambreso" id="old_mgmtplanpambreso">
                                    <div id="uploadmgmtplanpambreso"></div>
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <fieldset>
                                <legend style="background-color: transparent;color: black;font-weight: 700">Upload Shapefile <i>(note: zip and rar file; and maximum of 200mb only)</i></legend>
                                <input type='file' name="zip_shpfile_mgmntplan" id="zip_shpfile_mgmntplan" onchange="readURLmgmntfileSHP(this);"  />
                                <input type="hidden" name="old_shpfilemgmntplan" id="old_shpfilemgmntplan">
                                    <div id="uploadmgmtplanshpfile"></div>
                            </fieldset>
                        </div>
                        <div class="col-xs-12">
                            <div class="col-xs-12 col-lg-12 tooltip">
                                <ul><li>
                                    <?php echo form_label('Objectives').form_textarea('mgmtplanobjective','','id="mgmtplanobjective"') ?>
                                    <span class="tooltiptext">Input brief descriptions</span>
                                </li></ul>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="col-xs-4 col-lg-3 tooltip">
                                <ul><li>
                                    <?= form_label('Date Approved by PAMB','for="mpMonth"').form_dropdown('mpMonth',$monthList,'','id="mpMonth"') ?>
                                    <span class="tooltiptext">Select Date Approved by PAMB</span>
                                </li></ul>
                            </div>
                            <div class="col-xs-4 col-lg-2 tooltip">
                                <ul><li>
                                    <?= form_label('&nbsp;','for="mpDay"').form_dropdown('mpDay',$dayList,'','id="mpDay"') ?>
                                    <span class="tooltiptext">Select Date Approved by PAMB</span>
                                </li></ul>
                            </div>
                            <div class="col-xs-4 col-lg-2 tooltip">
                                <ul><li>
                                    <?= form_label('&nbsp;','for="mpYear"').form_dropdown('mpYear',$yearList,'','id="mpYear"') ?>
                                    <span class="tooltiptext">Select Date Approved by PAMB</span>
                                </li></ul>
                            </div>
                            <div class="col-xs-4 col-lg-2 tooltip">
                                <ul><li>
                                    <?= form_label('Status','for="mpStatus"').form_dropdown('mpStatus',$status_mngmtplan,'','id="mpStatus"') ?>
                                    <span class="tooltiptext">Select management plan status</span>
                                </li></ul>
                            </div>
                            <div class="col-xs-4 col-lg-3 tooltip">
                                <ul><li>
                                    <?= form_label('Duration','for="mpduration"').form_input('mpduration','','id="mpduration" placeholder="Year duration"') ?>
                                    <span class="tooltiptext">Input year duration</span>
                                </li></ul>
                            </div>
                        </div>
                        <div class="col-xs-12 tooltip">
                        <ul><li>
                                <?= form_label('Remarks','','for="mngmtplanremarks"').form_textarea('mngmtplanremarks','','id="mngmtplanremarks" placeholder=" "') ?>
                                <span class="tooltiptext">Input brief description</span>
                        </li></ul>
                        </div>                        
                        <div class="col-xs-12">
                            <a type="text" class="btn btn-primary" id="addmanangemetfileuploads">Add to table</a>                                
                        </div>
                        <div class="col-xs-12 ">                                
                            <div class="table-responsive"><br>
                                <table id="tblmngmtfile" class="content-table">
                                    <thead>
                                        <tr>
                                            <th colspan="3" style="text-align: center; font-size: 24px">Management Plan</th>
                                        </tr>
                                        <tr>
                                            <th>File Uploaded</th> 
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
    <div id="mgmtother" class="tabcontentplan" style="display: none;">
        <!-- <div class="form-style-6"> -->
            <!-- <h2>Thematic or Other Plan</h2> -->
            <div class="tab-second">
                <a class="tablinkmgmtplanthematic active" id="" onclick="tabmanagementplanningthematic(event, 'otherecoplan')">Ecotourism Plan</a>
                <a class="tablinkmgmtplanthematic" id="" onclick="tabmanagementplanningthematic(event, 'otherwetlanplan')">Wetland Plan</a>
                <a class="tablinkmgmtplanthematic" id="" onclick="tabmanagementplanningthematic(event, 'othercaveplan')">Caves Plan</a>
                <a class="tablinkmgmtplanthematic" id="" onclick="tabmanagementplanningthematic(event, 'otherplan')">Other Plan</a>
            </div>
            <div id="otherecoplan" class="tabcontentplanthematic" style="display: block;">
            <fieldset><legend>Ecotourism Plan</legend>                    
                <div class="col-xs-12">
                    <div class="col-xs-12 col-lg-12 ">
                        <fieldset>
                            <div id="fetch_images_ecomgntzone"></div>
                            <?= form_label('Ecotourism Plan file attach <i>(*.pdf format, maximum size of 50MB)</i>','','for="ecoplanfile"')?>
                            <input type='file' name="ecoplanfile" id="ecoplanfile" onchange="readURLEcoPlanfile(this);" />
                            <input type="hidden" name="old_ecoplanfile" id="old_ecoplanfile">
                        </fieldset>                          
                        <div id="uploadecotourmngtmplans"></div>
                    </div>
                    <div class="col-xs-12 col-lg-12 ">
                        <fieldset>
                            <label>Copy of PAMB Resolution <i>(*.pdf format, maximum size of 50MB)</i></label>
                            <input type='file' name="ecomgmtplanpambreso" id="ecomgmtplanpambreso" onchange="insertecomngmntfilepambreso(this);" />
                            <input type="hidden" name="old_ecomgmtplanpambreso" id="old_ecomgmtplanpambreso">
                            <div id="uploadecomgmtplanpambreso"></div>
                        </fieldset>
                    </div>
                    <div class="col-xs-12 col-lg-12 ">
                        <fieldset>
                            <label>Upload Shapefile <i>(*.zip  format, maximum size of 50MB)</i></label>
                            <input type='file' name="shp_mgmteco" id="shp_mgmteco" onchange="readURLshapefilemgmteco(this);" />
                            <input type="hidden" name="shp_mgmteco_txt" id="shp_mgmteco_txt">
                            <div id="fetch_mgmteco_shpfile"></div>
                        </fieldset>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="col-xs-4 col-lg-3 tooltip">
                        <ul><li>
                            <?= form_label('Date Approved by PAMB','for="ecoplanM"').form_dropdown('ecoplanM',$monthList,'','id="ecoplanM"') ?>
                            <span class="tooltiptext">Select Date Approved by PAMB</span>
                        </li></ul>
                    </div>
                    <div class="col-xs-4 col-lg-2 tooltip">
                        <ul><li>
                            <?= form_label('&nbsp;','for="ecoplanD"').form_dropdown('ecoplanD',$dayList,'','id="ecoplanD"') ?>
                            <span class="tooltiptext">Select Date Approved by PAMB</span>
                        </li></ul>
                    </div>
                    <div class="col-xs-4 col-lg-2 tooltip">
                        <ul><li>
                            <?= form_label('&nbsp;','for="ecoplanY"').form_dropdown('ecoplanY',$yearList,'','id="ecoplanY"') ?>
                            <span class="tooltiptext">Select Date Approved by PAMB</span>
                            </li></ul>
                    </div>
                    <div class="col-xs-12 col-lg-5 tooltip">
                        <ul><li>
                            <?= form_label('Ecotourism Plan Status','for="ecoplanStatus"').form_dropdown('ecoplanStatus',$status_mngmtplan,'','id="ecoplanStatus"') ?>
                            <span class="tooltiptext">Select ecoutourism plan status</span>
                        </li></ul>
                    </div> 
                </div>
                 
                <div class="col-xs-12">
                    <a type="text" class="btn btn-primary" id="addecoplan">Add to table</a>                                
                </div>
                <div class="col-xs-12 ">                                
                    <div class="table-responsive"><br>
                        <table id="tblecoplanfile" class="content-table">
                            <thead>
                                <tr>
                                    <th colspan="2" style="text-align: center; font-size: 24px">Ecotourism Plan</th>
                                </tr>
                                <tr>
                                    <th>File Uploaded</th> 
                                    <th>Details</th>
                                </tr>
                            </thead>
                            <tbody id="tbodyecoplanfile"></tbody>
                        </table>
                    </div>
                </div>
            </fieldset>
            </div>
            <div id="otherwetlanplan" class="tabcontentplanthematic" style="display: none;">
            <fieldset><legend>Wetland Plan</legend>                    
                <div class="col-xs-12">
                    <div class="col-xs-12 col-lg-12 ">
                        <fieldset>
                            <?= form_label('Wetland Plan file attach <i>(*.pdf format, maximum size of 50MB)</i>','','for="wetlandplanfile"')?>
                            <input type='file' name="wetlandplanfile" id="wetlandplanfile" onchange="readURLWetlandPlanfile(this);" />
                            <input type="hidden" name="old_wetlandplanfile" id="old_wetlandplanfile">
                        </fieldset>                            
                        <div id="uploadwetlandmngtmplans"></div>
                    </div>
                    <div class="col-xs-12 col-lg-12 tooltip">
                        <fieldset>
                            <label>Copy of PAMB Resolution <i>(*.pdf format, maximum size of 50MB)</i></label>
                            <input type='file' name="wetmgmtplanpambreso" id="wetmgmtplanpambreso" onchange="readURLWetlandpambreso(this);" />
                            <input type="hidden" name="old_wetmgmtplanpambreso" id="old_wetmgmtplanpambreso">
                            <div id="uploadwetmgmtplanpambreso"></div>
                            <span class="tooltiptext">Refers to the PAMB Resolution approving the proposed inland wetland management plan.</span>
                        </fieldset>
                    </div>
                    <div class="col-xs-12 col-lg-12 ">
                        <fieldset>
                            <label>Upload Shapefile <i>(*.zip  format, maximum size of 50MB)</i></label>
                            <input type='file' name="shp_mgmtwetland" id="shp_mgmtwetland" onchange="readURLshapefilemgmteco(this);" />
                            <input type="hidden" name="shp_mgmtwetland_txt" id="shp_mgmtwetland_txt">
                            <div id="fetch_mgmtwetland_shpfile"></div>
                        </fieldset>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="col-xs-4 col-lg-3 tooltip">
                        <ul><li>
                            <?= form_label('Date Approved by PAMB','for="wetlandplanM"').form_dropdown('wetlandplanM',$monthList,'','id="wetlandplanM"') ?>
                            <span class="tooltiptext">Select Date Approved by PAMBd</span>
                        </li></ul>
                    </div>
                    <div class="col-xs-4 col-lg-2 tooltip">
                        <ul><li>
                            <?= form_label('&nbsp;','for="wetlandplanD"').form_dropdown('wetlandplanD',$dayList,'','id="wetlandplanD"') ?>
                            <span class="tooltiptext">Select Date Approved by PAMBd</span>
                        </li></ul>
                    </div>
                    <div class="col-xs-4 col-lg-2 tooltip">
                        <ul><li>
                            <?= form_label('&nbsp;','for="wetlandplanY"').form_dropdown('wetlandplanY',$yearList,'','id="wetlandplanY"') ?>
                            <span class="tooltiptext">Select Date Approved by PAMBd</span>
                        </li></ul>
                    </div>
                    <div class="col-xs-12 col-lg-5 tooltip">
                        <ul><li>
                            <?= form_label('Wetland Plan Status','for="wetlandplanStatus"').form_dropdown('wetlandplanStatus',$status_mngmtplan,'','id="wetlandplanStatus"') ?>
                            <span class="tooltiptext">Select whether the plan is new, for updating or expired. </span>
                        </li></ul>
                    </div>  
                </div>
                
                <div class="col-xs-12">
                    <a type="text" class="btn btn-primary" id="addwetlandplan">Add to table</a>                                
                </div>
                <div class="col-xs-12 ">                                
                    <div class="table-responsive"><br>
                        <table id="tblwetlandplanfile" class="content-table">
                            <thead>
                                <tr>
                                    <th colspan="2" style="text-align: center; font-size: 24px">Wetland Plan</th>
                                </tr>
                                <tr>
                                    <th>File Uploaded</th> 
                                    <th>Details</th>
                                </tr>
                            </thead>
                            <tbody id="tbodywetlandplanfile"></tbody>
                        </table>
                    </div>
                </div>
            </fieldset>
            </div>
            <div id="othercaveplan" class="tabcontentplanthematic" style="display: none;">
            <fieldset><legend>Caves Plan</legend>                    
                <div class="col-xs-12">
                    <div class="col-xs-12 col-lg-12 ">
                        <fieldset>
                            <?= form_label('Cave Plan file attach <i>(*.pdf format, maximum size of 50MB)</i>','','for="caveplanfile"')?>
                            <input type='file' name="caveplanfile" id="caveplanfile" onchange="readURLCavePlanfile(this);" />
                            <input type="hidden" name="old_caveplanfile" id="old_caveplanfile">
                            <div id="uploadcavesmngtmplans"></div>
                        </fieldset>                            
                    </div>
                    <div class="col-xs-12 col-lg-12 tooltip">
                        <fieldset>
                            <label>Copy of PAMB Resolution <i>(*.pdf format, maximum size of 50MB)</i></label>
                            <input type='file' name="cavemgmtplanpambreso" id="cavemgmtplanpambreso" onchange="readURLCavePAMBReso(this);" />
                            <input type="hidden" name="old_cavemgmtplanpambreso" id="old_cavemgmtplanpambreso">
                            <div id="uploadcavemgmtplanpambreso"></div>
                            <span class="tooltiptext">Refers to the PAMB Resolution approving the proposed cave management plan.</span>
                        </fieldset>
                    </div>
                    <div class="col-xs-12 col-lg-12 ">
                        <fieldset>
                            <label>Upload Shapefile <i>(*.zip  format, maximum size of 50MB)</i></label>
                            <input type='file' name="shp_mgmtcave" id="shp_mgmtcave" onchange="readURLshapefilemgmtcave(this);" />
                            <input type="hidden" name="shp_mgmtcave_txt" id="shp_mgmtcave_txt">
                            <div id="fetch_mgmtcave_shpfile"></div>
                        </fieldset>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="col-xs-4 col-lg-3 tooltip">
                        <ul><li>
                            <?= form_label('Date Approved by PAMB','for="caveplanM"').form_dropdown('caveplanM',$monthList,'','id="caveplanM"') ?>
                            <span class="tooltiptext">Select Date Approved by PAMBd</span>
                        </li></ul>
                    </div>
                    <div class="col-xs-4 col-lg-2 tooltip">
                        <ul><li>
                            <?= form_label('&nbsp;','for="caveplanD"').form_dropdown('caveplanD',$dayList,'','id="caveplanD"') ?>
                            <span class="tooltiptext">Select Date Approved by PAMBd</span>
                        </li></ul>
                    </div>
                    <div class="col-xs-4 col-lg-2 tooltip">
                        <ul><li>
                            <?= form_label('&nbsp;','for="caveplanY"').form_dropdown('caveplanY',$yearList,'','id="caveplanY"') ?>
                            <span class="tooltiptext">Select Date Approved by PAMBd</span>
                        </li></ul>
                    </div>
                    <div class="col-xs-12 col-lg-5 tooltip">
                        <ul><li>
                            <?= form_label('Cave Plan Status','for="caveplanStatus"').form_dropdown('caveplanStatus',$status_mngmtplan,'','id="caveplanStatus"') ?>
                            <span class="tooltiptext">Select whether the plan is new, for updating or expired.</span>
                        </li></ul>
                    </div>  
                </div>                
                <div class="col-xs-12">
                    <a type="text" class="btn btn-primary" id="addcaveplan">Add to table</a>                                
                </div>
                <div class="col-xs-12 ">                                
                    <div class="table-responsive"><br>
                        <table id="tblcaveplanfile" class="content-table">
                            <thead>
                                <tr>
                                    <th colspan="2" style="text-align: center; font-size: 24px">Cave Plan</th>
                                </tr>
                                <tr>
                                    <th>File Uploaded</th> 
                                    <th>Details</th>
                                </tr>
                            </thead>
                            <tbody id="tbodycaveplanfile"></tbody>
                        </table>
                    </div>
                </div>
            </fieldset>
            </div>
            <div id="otherplan" class="tabcontentplanthematic" style="display: none;">
            <fieldset><legend>Other Plan</legend>                    
                <div class="col-xs-12">
                    <div class="col-xs-12 col-lg-12 ">
                        <fieldset>
                            <?= form_label('Other Plan file attach <i>(*.pdf format, maximum size of 50MB)</i>','','for="otherplanfile"')?>
                            <input type='file' name="otherplanfile" id="otherplanfile" onchange="readURLotherPlanfile(this);" />
                            <input type="hidden" name="old_otherplanfile" id="old_otherplanfile">                            
                            <div id="uploadothermngtmplans"></div>
                        </fieldset>                           
                    </div>
                    <div class="col-xs-12 col-lg-12 ">
                        <fieldset>
                            <label>Copy of PAMB Resolution <i>(*.pdf format, maximum size of 50MB)</i></label>
                            <input type='file' name="otherplanpambreso" id="otherplanpambreso" onchange="readURLotherPlanPAMBReso(this);" />
                            <input type="hidden" name="old_otherplanpambreso" id="old_otherplanpambreso">
                            <div id="uploadotherplanpambreso"></div>
                        </fieldset>
                    </div>
                    <div class="col-xs-12 col-lg-12 ">
                        <fieldset>
                            <label>Upload Shapefile <i>(*.zip  format, maximum size of 50MB)</i></label>
                            <input type='file' name="shp_mgmtotherplan" id="shp_mgmtotherplan" onchange="readURLshapefilemgmteco(this);" />
                            <input type="hidden" name="shp_mgmtotherplan_txt" id="shp_mgmtotherplan_txt">
                            <div id="fetch_mgmtotherplan_shpfile"></div>
                        </fieldset>
                    </div>
                </div>
                <div class="col-xs-12 tooltip">
                    <ul><li>
                        <?php echo form_label('Specify other plan','','for="sotherplan"').form_input('sotherplan','','id="sotherplan"') ?>
                            <span class="tooltiptext">Specify other plan</span>
                    </li></ul>
                </div>
                <div class="col-xs-12">
                    <div class="col-xs-4 col-lg-3 tooltip">
                        <ul><li>
                            <?= form_label('Date Approved by PAMB','for="otherplanM"').form_dropdown('otherplanM',$monthList,'','id="otherplanM"') ?>
                            <span class="tooltiptext">Select Date Approved by PAMBd</span>
                        </li></ul>
                    </div>
                    <div class="col-xs-4 col-lg-2 tooltip">
                        <ul><li>
                            <?= form_label('&nbsp;','for="otherplanD"').form_dropdown('otherplanD',$dayList,'','id="otherplanD"') ?>
                            <span class="tooltiptext">Select Date Approved by PAMBd</span>
                        </li></ul>
                    </div>
                    <div class="col-xs-4 col-lg-2 tooltip">
                        <ul><li>
                            <?= form_label('&nbsp;','for="otherplanY"').form_dropdown('otherplanY',$yearList,'','id="otherplanY"') ?>
                            <span class="tooltiptext">Select Date Approved by PAMBd</span>
                        </li></ul>
                    </div>
                    <div class="col-xs-12 col-lg-5 tooltip">
                        <ul><li>
                            <?= form_label('Other Plan Status','for="otherplanStatus"').form_dropdown('otherplanStatus',$status_mngmtplan,'','id="otherplanStatus"') ?>
                            <span class="tooltiptext">Select caves plan status</span>
                        </li></ul>
                    </div>
                </div>
                  
                <div class="col-xs-12">
                    <a type="text" class="btn btn-primary" id="addotherplan">Add to table</a>                                
                </div>
                <div class="col-xs-12 ">                                
                    <div class="table-responsive"><br>
                        <table id="tblotherplanfile" class="content-table">
                            <thead>
                                <tr>
                                    <th colspan="2" style="text-align: center; font-size: 24px">Other Plan</th>
                                </tr>
                                <tr>
                                    <th>File Uploaded</th> 
                                    <th>Details</th>
                                </tr>
                            </thead>
                            <tbody id="tbodyotherplanfile"></tbody>
                        </table>
                    </div>
                </div>
            </fieldset>
            </div>
        <!-- </div> -->
    </div>
</div>

<form method="post" action="" id="MgmtPlanForm" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-mgmtplan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Management Plan</h4>
                </div>
                <input type="hidden" id="mgmtplan-id" name="mgmtplan-id" value="" />
                <input type="hidden" id="mgmtplan-gencode" name="mgmtplan-gencode" value="" />
                <div class="modal-body" >
                   <div class="col-xs-12">
                        <div class="col-xs-12 col-lg-12 tooltip">
                            <ul><li>
                                <?php echo form_label('Objectives').form_textarea('edit-mgmtplanobjective','','id="edit-mgmtplanobjective"') ?>
                                <span class="tooltiptext">Input brief descriptions</span>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-3">
                            <ul><li>
                                <?= form_label('Date Approve by PAMB','for="edit-mpMonth"').form_dropdown('edit-mpMonth',$monthList,'','id="edit-mpMonth" ') ?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-2">
                            <ul><li>
                                <?= form_label('&nbsp;','for="edit-mpDay"').form_dropdown('edit-mpDay',$dayList,'','id="edit-mpDay" ') ?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-2">
                            <ul><li>
                                <?= form_label('&nbsp;','for="edit-mpYear"').form_dropdown('edit-mpYear',$yearList,'','id="edit-mpYear" ') ?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-2">
                            <ul><li>
                                <?= form_label('Status','for="edit-mpStatus"').form_dropdown('edit-mpStatus',$status_mngmtplan,'','id="edit-mpStatus" ') ?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-3">
                            <ul><li>
                                <?= form_label('Duration','for="edit-mpduration"').form_input('edit-mpduration','',' id="edit-mpduration" placeholder="Year duration"') ?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <ul><li>
                            <?= form_label('Remarks','','for="edit-mngmtplanremarks"').form_textarea('edit-mngmtplanremarks','','id="edit-mngmtplanremarks" placeholder=" "') ?>
                            <span><!-- Input title of resolution here --></span>
                        </li></ul>
                    </div>
                    <div class="col-xs-12">
                        <div class="col-xs-12 col-lg-12 ">
                            <ul><li>
                                <?= form_label('Current file attached','','for="mgmtplan_file"')?>
                                <a href="" id="mgmtplan_file" target="_blank"></a>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="col-xs-12 col-lg-12 ">
                            <fieldset>
                                <?= form_label('Attach Management Plan','','for="edit-mngmtplanfile"')?>
                                <input type='file' name="edit-mngmtplanfile" id="edit-mngmtplanfile" onchange="uploadmangementplan(this);" />
                                <input type="hidden" name="edit-old_mngmtplanfile" id="edit-old_mngmtplanfile">
                                <input type="hidden" name="old_mngmtplanfile_span" id="old_mngmtplanfile_span">                                                    
                                <div id="divmanagementupload"></div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-12 ">
                        <fieldset>
                                <?= form_label('Copy of PAMB Resolution <i>(*.pdf format, maximum size of 50MB)</i>','','for="edit-mgmtplanpambreso"')?>
                                <input type='file' name="edit-mgmtplanpambreso" id="edit-mgmtplanpambreso" onchange="insertmngmntfilepambresoEdit(this);" />
                                <input type="hidden" name="edit-old_mgmtplanpambreso" id="edit-old_mgmtplanpambreso" />
                                <input type="hidden" name="edit-new_mgmtplanpambreso" id="edit-new_mgmtplanpambreso" />
                                <div id="edit-uploadmgmtplanpambreso"></div>
                        </fieldset>
                    </div>
                    <div class="col-xs-12">
                        <fieldset>
                            <legend style="background-color: transparent;color: black;font-weight: 700">Upload Shapefile <i>(note: zip and rar file; and maximum of 200mb only)</i></legend>
                            <input type='file' name="edit-zip_shpfile_mgmntplan" id="edit-zip_shpfile_mgmntplan" onchange="readURLmgmntfileSHPedit(this);"  />
                            <input type="hidden" name="edit-old_shpfilemgmntplan" id="edit-old_shpfilemgmntplan">
                            <input type="hidden" name="edit-new_shpfilemgmntplan" id="edit-new_shpfilemgmntplan">
                                <div id="edit-uploadmgmtplanshpfile"></div>
                        </fieldset>
                    </div>
                    <div class="col-xs-12">
                        <div class="modal-footer">
                            <button class="btn btn-info" type="button" name="submit" value="Update" onclick="updatemgmtpln();" >Update</button>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>
<form method="post" action="" id="EcoTourMgmtPlanForm" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-ecotourmgmtplan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Ecotourism Plan</h4>
                </div>
                <input type="hidden" id="ecotourmgmtplan-id" name="ecotourmgmtplan-id" value="" />
                <input type="hidden" id="ecotourmgmtplan-gencode" name="ecotourmgmtplan-gencode" value="" />
                <div class="modal-body" >
                    <fieldset><legend>Ecotourism Plan</legend>
                        <div class="col-xs-12">
                            <div class="col-xs-12 col-lg-12 ">
                                <fieldset>
                                        <?= form_label('Ecotourism Plan File attached <i>(*.pdf format, maximum size of 50MB)</i>','','for="edit-ecoplanfile"')?>
                                        <input type='file' name="edit-ecoplanfile" id="edit-ecoplanfile" onchange="readURLEcoPlanFileEdit(this);"/>
                                        <input type="hidden" name="edit-old_ecoplanfile" id="edit-old_ecoplanfile" />
                                        <input type="hidden" name="edit-ecoplanfilesload" id="edit-ecoplanfilesload" />
                                        <div id="edit-uploadecotourmngtmplans"></div>
                                </fieldset>
                            </div>
                            <div class="col-xs-12 col-lg-12 ">
                                <fieldset>
                                    <label>Copy of PAMB Resolution <i>(*.pdf format, maximum size of 50MB)</i></label>
                                    <input type='file' name="edit-ecomgmtplanpambreso" id="edit-ecomgmtplanpambreso" onchange="insertecomngmntfilepambresoEdit(this);" />
                                    <input type="hidden" name="edit-old_ecomgmtplanpambreso" id="edit-old_ecomgmtplanpambreso">
                                        <input type="hidden" name="edit-new_ecoplanfilesload" id="edit-new_ecoplanfilesload" />
                                    <div id="edit-uploadecomgmtplanpambreso"></div>
                                </fieldset>
                            </div>
                            <div class="col-xs-12 col-lg-12 ">
                                <fieldset>
                                    <label>Upload Shapefile <i>(*.zip  format, maximum size of 50MB)</i></label>
                                    <input type='file' name="edit-shp_mgmteco" id="edit-shp_mgmteco" onchange="readURLshapefilemgmtecoEdit(this);" />
                                    <input type="hidden" name="edit-shp_mgmteco_txt" id="edit-shp_mgmteco_txt">
                                    <input type="hidden" name="edit-shp_mgmteco_old" id="edit-shp_mgmteco_old">
                                    <div id="edit-fetch_mgmteco_shpfile"></div>
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="col-xs-4 col-lg-3">
                                <ul><li>
                                    <?= form_label('Date Approved by PAMB','for="edit-ecoplanM"').form_dropdown('edit-ecoplanM',$monthList,'','id="edit-ecoplanM" ') ?>
                                </li></ul>
                            </div>
                            <div class="col-xs-4 col-lg-2">
                                <ul><li>
                                    <?= form_label('&nbsp;','for="edit-ecoplanD"').form_dropdown('edit-ecoplanD',$dayList,'','id="edit-ecoplanD" ') ?>
                                </li></ul>
                            </div>
                            <div class="col-xs-4 col-lg-2">
                                <ul><li>
                                    <?= form_label('&nbsp;','for="edit-ecoplanY"').form_dropdown('edit-ecoplanY',$yearList,'','id="edit-ecoplanY" ') ?>
                                </li></ul>
                            </div>
                        </div>
                        <div class="col-xs-6 col-lg-6">
                            <ul><li>
                                <?= form_label('Ecotourism Plan Status','for="edit-ecoplanStatus"').form_dropdown('edit-ecoplanStatus',$status_mngmtplan,'','id="edit-ecoplanStatus" ') ?>
                            </li></ul>
                        </div>
                    </fieldset>
                    <div class="col-xs-12 ">
                        <div class="modal-footer">
                            <button class="btn btn-info" type="button" name="submit" value="Update" onclick="updateecotourismmgmtpln();" >Update</button>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>

<form method="post" action="" id="WetlandMgmtPlanForm" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-wetlandmgmtplan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Wetland Plan</h4>
                </div>
                <input type="hidden" id="wetlandmgmtplan-id" name="wetlandmgmtplan-id" value="" />
                <input type="hidden" id="wetlandmgmtplan-gencode" name="wetlandmgmtplan-gencode" value="" />
                <div class="modal-body" >
                    <fieldset><legend>Wetland Plan</legend>
                        <div class="col-xs-12">
                            <div class="col-xs-12 col-lg-12 ">
                                <fieldset>
                                    <?= form_label('Wetland Plan File attached <i>(*.pdf format, maximum size of 50MB)</i>','','for="edit-wetlandplanfile"')?>
                                    <input type='file' name="edit-wetlandplanfile" id="edit-wetlandplanfile" onchange="readURLWetlandPlanFileEdit(this);" />
                                    <input type="hidden" name="edit-old_wetlandplanfile" id="edit-old_wetlandplanfile">
                                    <input type="hidden" name="edit-wetlandplanfilesload" id="edit-wetlandplanfilesload" />
                                    <div id="edit-uploadwetlandmngtmplans"></div>
                                </fieldset>
                            </div>
                            <div class="col-xs-12 col-lg-12 ">
                                <fieldset>
                                    <label>Copy of PAMB Resolution <i>(*.pdf format, maximum size of 50MB)</i></label>
                                    <input type='file' name="edit-wetmgmtplanpambreso" id="edit-wetmgmtplanpambreso" onchange="readURLWetlandpambresoEdit(this);" />
                                    <input type="hidden" name="edit-old_wetmgmtplanpambreso" id="edit-old_wetmgmtplanpambreso">
                                    <input type="hidden" name="edit-new_wetmgmtplanpambreso" id="edit-new_wetmgmtplanpambreso">
                                    <div id="edit-uploadwetmgmtplanpambreso"></div>
                                </fieldset>
                            </div>
                            <div class="col-xs-12 col-lg-12 ">
                                <fieldset>
                                    <label>Upload Shapefile <i>(*.zip  format, maximum size of 50MB)</i></label>
                                    <input type='file' name="edit-shp_mgmtwetland" id="edit-shp_mgmtwetland" onchange="readURLshapefilemgmtwetlandEdit(this);" />
                                    <input type="hidden" name="edit-shp_mgmtwetland_txt" id="edit-shp_mgmtwetland_txt">
                                    <input type="hidden" name="edit-shp_mgmtwetland_old" id="edit-shp_mgmtwetland_old">
                                    <div id="edit-fetch_mgmtwetland_shpfile"></div>
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="col-xs-4 col-lg-3">
                                <ul><li>
                                    <?= form_label('Date Approved by PAMB','for="edit-wetlandplanM"').form_dropdown('edit-wetlandplanM',$monthList,'','id="edit-wetlandplanM" ') ?>
                                </li></ul>
                            </div>
                            <div class="col-xs-4 col-lg-2">
                                <ul><li>
                                    <?= form_label('&nbsp;','for="edit-wetlandplanD"').form_dropdown('edit-wetlandplanD',$dayList,'','id="edit-wetlandplanD" ') ?>
                                </li></ul>
                            </div>
                            <div class="col-xs-4 col-lg-2">
                                <ul><li>
                                    <?= form_label('&nbsp;','for="edit-wetlandplanY"').form_dropdown('edit-wetlandplanY',$yearList,'','id="edit-wetlandplanY" ') ?>
                                </li></ul>
                            </div>
                        </div>
                        <div class="col-xs-6 col-lg-6">
                            <ul><li>
                                <?= form_label('Wetland Plan Status','for="edit-wetlandplanStatus"').form_dropdown('edit-wetlandplanStatus',$status_mngmtplan,'','id="edit-wetlandplanStatus" ') ?>
                            </li></ul>
                        </div>
                    </fieldset>
                    <div class="col-xs-12 ">
                        <div class="modal-footer">
                            <button class="btn btn-info" type="button" name="submit" value="Update" onclick="updatewetlandmgmtpln();" >Update</button>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>
<form method="post" action="" id="CavesMgmtPlanForm" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-cavemgmtplan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Cave Plan</h4>
                </div>
                <input type="" id="cavemgmtplan-id" name="cavemgmtplan-id" value="" />
                <input type="hidden" id="cavemgmtplan-gencode" name="cavemgmtplan-gencode" value="" />
                <div class="modal-body" >
                    <fieldset><legend>Cave Plan</legend>
                        <div class="col-xs-12">
                            <div class="col-xs-12 col-lg-12 ">
                                <fieldset>
                                        <?= form_label('Cave Plan File attached <i>(*.pdf format, maximum size of 50MB)</i>','','for="edit-caveplanfile"')?>
                                        <input type='file' name="edit-caveplanfile" id="edit-caveplanfile" onchange="readURLCavePlanFileEdit(this);" />
                                        <input type="hidden" name="edit-old_caveplanfile" id="edit-old_caveplanfile">
                                        <input type="hidden" name="edit-caveplanfilesload" id="edit-caveplanfilesload" />
                                        <div id="edit-uploadcavemngtmplans"></div>
                                </fieldset>
                            </div>
                            <div class="col-xs-12 col-lg-12 ">
                                <fieldset>
                                    <label>Copy of PAMB Resolution <i>(*.pdf format, maximum size of 50MB)</i></label>
                                    <input type='file' name="edit-cavemgmtplanpambreso" id="edit-cavemgmtplanpambreso" onchange="readURLCavePAMBResoEdit(this);" />
                                    <input type="hidden" name="edit-old_cavemgmtplanpambreso" id="edit-old_cavemgmtplanpambreso">
                                    <input type="hidden" name="edit-new_cavemgmtplanpambreso" id="edit-new_cavemgmtplanpambreso">
                                    <div id="edit-uploadcavemgmtplanpambreso"></div>
                                </fieldset>
                            </div>
                            <div class="col-xs-12 col-lg-12 ">
                                <fieldset>
                                    <label>Upload Shapefile <i>(*.zip  format, maximum size of 50MB)</i></label>
                                    <input type='file' name="edit-shp_mgmtcave" id="edit-shp_mgmtcave" onchange="readURLshapefilemgmtcaveEdit(this);" />
                                    <input type="hidden" name="edit-shp_mgmtcave_txt" id="edit-shp_mgmtcave_txt">
                                    <input type="hidden" name="edit-shp_mgmtcave_old" id="edit-shp_mgmtcave_old">
                                    <div id="edit-fetch_mgmtcave_shpfile"></div>
                                </fieldset>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-12 col-lg-12 ">
                                    <ul><li>
                                        <?= form_label('Current file attached','','for="edit-caveplanfile_attached"')?>
                                        <a href="" id="edit-caveplanfile_attached" target="_blank"></a>
                                    </li></ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="col-xs-4 col-lg-3">
                                <ul><li>
                                    <?= form_label('Date Approved by PAMB','for="edit-caveplanM"').form_dropdown('edit-caveplanM',$monthList,'','id="edit-caveplanM" ') ?>
                                </li></ul>
                            </div>
                            <div class="col-xs-4 col-lg-2">
                                <ul><li>
                                    <?= form_label('&nbsp;','for="edit-caveplanD"').form_dropdown('edit-caveplanD',$dayList,'','id="edit-caveplanD" ') ?>
                                </li></ul>
                            </div>
                            <div class="col-xs-4 col-lg-2">
                                <ul><li>
                                    <?= form_label('&nbsp;','for="edit-caveplanY"').form_dropdown('edit-caveplanY',$yearList,'','id="edit-caveplanY" ') ?>
                                </li></ul>
                            </div>
                        </div>
                        <div class="col-xs-6 col-lg-6">
                            <ul><li>
                                <?= form_label('Cave Plan Status','for="edit-caveplanStatus"').form_dropdown('edit-caveplanStatus',$status_mngmtplan,'','id="edit-caveplanStatus" ') ?>
                            </li></ul>
                        </div>
                    </fieldset>
                    <div class="col-xs-12 ">
                        <div class="modal-footer">
                            <button class="btn btn-info" type="button" name="submit" value="Update" onclick="updatecavemgmtpln();" >Update</button>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>

<form method="post" action="" id="OthersMgmtPlanForm" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-othermgmtplan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Other Plan</h4>
                </div>
                <input type="hidden" id="othermgmtplan-id" name="othermgmtplan-id" value="" />
                <input type="hidden" id="othermgmtplan-gencode" name="othermgmtplan-gencode" value="" />
                <div class="modal-body" >
                    <fieldset><legend>Other Plan</legend>
                        <div class="col-xs-12">
                            <div class="col-xs-12 col-lg-12 ">
                                <fieldset>
                                        <?= form_label('Other Plan File attached <i>(*.pdf format, maximum size of 50MB)</i>','','for="edit-otherplanfile"')?>
                                        <input type='file' name="edit-otherplanfile" id="edit-otherplanfile" onchange="readURLeditotherPlanFile(this);" />
                                        <input type="hidden" name="edit-old_otherplanfile" id="edit-old_otherplanfile" />
                                        <input type="hidden" name="edit-current_otherplanfile" id="edit-current_otherplanfile" />
                                        <div id="edit-otherplanfileloadings"></div>
                                </fieldset>
                            </div>        
                            <div class="col-xs-12 col-lg-12 ">
                                <fieldset>
                                    <label>Copy of PAMB Resolution <i>(*.pdf format, maximum size of 50MB)</i></label>
                                    <input type='file' name="edit-otherplanpambreso" id="edit-otherplanpambreso" onchange="readURLotherPlanPAMBResoEdit(this);" />
                                    <input type="hidden" name="edit-old_otherplanpambreso" id="edit-old_otherplanpambreso">
                                    <input type="hidden" name="edit-new_otherplanpambreso" id="edit-new_otherplanpambreso">
                                    <div id="edit-uploadotherplanpambreso"></div>
                                </fieldset>
                            </div>
                            <div class="col-xs-12 col-lg-12 ">
                                <fieldset>
                                    <label>Upload Shapefile <i>(*.zip  format, maximum size of 50MB)</i></label>
                                    <input type='file' name="edit-shp_mgmtotherplan" id="edit-shp_mgmtotherplan" onchange="readURLshapefilemgmtotherplanEdit(this);" />
                                    <input type="hidden" name="edit-shp_mgmtotherplan_txt" id="edit-shp_mgmtotherplan_txt">
                                    <input type="hidden" name="edit-shp_mgmtotherplan_old" id="edit-shp_mgmtotherplan_old">
                                    <div id="edit-fetch_mgmtotherplan_shpfile"></div>
                                </fieldset>
                            </div>                  
                            <div class="col-xs-12">
                                <div class="col-xs-12 col-lg-12 ">
                                    <ul><li>
                                        <?= form_label('Current file attached','','for="edit-otherplanfile_attached"')?>
                                        <a href="" id="edit-otherplanfile_attached" target="_blank"></a>
                                    </li></ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <ul><li>
                                <?php echo form_label('Specify other plan','','for="edit-sotherplan"').form_input('edit-sotherplan','','id="edit-sotherplan"') ?>
                            </li></ul>
                        </div>
                        <div class="col-xs-12">
                            <div class="col-xs-4 col-lg-3">
                                <ul><li>
                                    <?= form_label('Date Approved','for="edit-otherplanM"').form_dropdown('edit-otherplanM',$monthList,'','id="edit-otherplanM" ') ?>
                                </li></ul>
                            </div>
                            <div class="col-xs-4 col-lg-2">
                                <ul><li>
                                    <?= form_label('&nbsp;','for="edit-otherplanD"').form_dropdown('edit-otherplanD',$dayList,'','id="edit-otherplanD" ') ?>
                                </li></ul>
                            </div>
                            <div class="col-xs-4 col-lg-2">
                                <ul><li>
                                    <?= form_label('&nbsp;','for="edit-otherplanY"').form_dropdown('edit-otherplanY',$yearList,'','id="edit-otherplanY" ') ?>
                                </li></ul>
                            </div>
                        </div>
                        <div class="col-xs-6 col-lg-6">
                            <ul><li>
                                <?= form_label('Other Plan Status','for="edit-otherplanStatus"').form_dropdown('edit-otherplanStatus',$status_mngmtplan,'','id="edit-otherplanStatus" ') ?>
                            </li></ul>
                        </div>
                    </fieldset>
                    <div class="col-xs-12 ">
                        <div class="modal-footer">
                            <button class="btn btn-info" type="button" name="submit" value="Update" onclick="updateothermgmtpln();" >Update</button>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>