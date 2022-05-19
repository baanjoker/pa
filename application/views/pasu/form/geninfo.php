<div class="form-style-6">
    <h2>GENERAL INFORMATION</h2>
</div>
<fieldset>
    <legend>Protected Area Image</legend>
    <div class="col-xs-12">
        <div class="col-xs-12 col-lg-12">
            <div id="fetch_images_pa"></div>
        </div>
    </div>

    <div class="col-xs-12 col-lg-12 tooltip">
        <fieldset>
            <label>Upload image of Protected Area <i>(*.png, *.jpeg, *.jpg format, maximum size of 50MB)</i></label>
            <input type='file' name="img_pamap" id="img_pamap"/>
            <span id="img_pamapspan" class="img_pamapspan"></span>
            <input type="hidden" name="old_picture" value="nophoto.jpg">
            <div id="progress-div"><div id="progress-bar"></div></div>
            <div id="targetLayer"></div>
            <span class="tooltiptext">Upload image of Protected Area</span>
        </fieldset>
    </div>
    <div class="col-xs-12 col-lg-12 tooltip"> 
        <div class="col-xs-12 col-lg-12">
            <fieldset>
                <label>Upload Shapefile of Protected Area <i>(*.rar, *.zip format, maximum size of 200MB)</i></label>
                <input type='file' name="pamaps_shpfile" id="pamaps_shpfile" />
                <input type="hidden" name="pamaps_shpfile_text"> 
                <div id="pamaps_shpfile_div"></div>
                <span class="tooltiptext">Upload Shapefile of Protected Area</span>
            </fieldset>
        </div>
    </div> 
    <div class="col-xs-12" style="margin-top: 20px;">
        <div class="col-xs-4 col-lg-6 tooltip">
            <ul>
                <li>
                    <?= form_label('Name of Protected Area *','','for="pa_name"').form_input('pa_name',$pamain->pa_name,'id="pa_name" placeholder=""') ?>
                    <span class="tooltiptext">Name of Protected Area</span>
                    <!-- <a href="#" data-toggle="tooltip" title="Input name of Protected Area!"></a> -->
                </li>
            </ul>
        </div>
        <div class="col-xs-6 col-lg-6 tooltip">
            <ul>
                <li>
                    <?= form_label('Former name of PA (if any)','','for="formerpa_name"').form_input('formerpa_name',$pamain->formerpaname,'id="formerpa_name" placeholder="Former Name"') ?>
                    <span class="tooltiptext">Input former name of Protected Area</span>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-xs-12 col-lg-12 tooltip" id="chck-01">
        <ul><li>
            <label>Key Biodiversity Area</label>
            <?php echo form_dropdown('cpabi_id',$cpabiList,$pamain->cpabi_id,' id="cpabi_id"') ?>
                <span class="tooltiptext">Key Biodiversity Areas are sites contributing significantly to the global persistence of biodiversity, in terrestrial, freshwater and marine ecosystems (Check KBA listings based on  KBA publication)</span>
        </li></ul>
    </div>
    <div class="col-xs-12 col-lg-12">
        <fieldset>
        <!-- <legend>Legal Status</legend> -->
            <?php echo form_input('legalcodegenerated','','id="legalcodegenerated" class="hidden"'); ?>
            <div class="col-xs-12">
                <div class="col-xs-6 col-lg-4 tooltip">
                    <ul><li>
                        <?php echo form_label('Status*','','for="nipid"').form_dropdown('nip_id',$classListsub,'',' id="nipid"') ?>
                        <span class="tooltiptext">Status refers to the legal status of the area, whether as initial component, proclaimed, or legislated</span>
                    </li></ul>
                </div>
                <div class="col-xs-6 col-lg-4 tooltip">
                    <ul><li>
                        <label>Category</label>
                        <?php echo form_dropdown('pacategory_id','','','id="pacategory_id" ') ?>
                        <span class="tooltiptext">Category reflects the principal management objectives of the protected area</span>
                    </li></ul>
                </div>
                <div class="col-xs-6 col-lg-4 tooltip" id="othernipascategoryDiv">
                    <ul><li>
                        <label>Other Category</label>
                        <?php echo form_input('othernipascategory','','id="othernipascategory"') ?>
                        <span class="tooltiptext">Specify other category</span>
                    </li></ul>
                </div>
            </div>
            <!-- </div> -->
            <div class="col-xs-12">
                <div class="col-xs-4 col-lg-4 tooltip">
                    <ul><li>
                        <?= form_label('Legal Basis *','','for="legis_id"').form_dropdown('legis_id','','',' id="legis_id"') ?>
                        <span class="tooltiptext">Select Legal Basis</span>
                    </li></ul>
                </div>
                <div class="col-xs-4 col-lg-4 tooltip">
                    <ul><li>
                       <?= form_label('Number *','','for="legisno"').form_input('legisno','','placeholder=" " id="legisno"') ?>
                       <span class="tooltiptext">e.g. Proclamation No. 2-0001, EO No. 2010-03 </span>
                    </li></ul>
                </div>
                <div class="col-xs-4 col-lg-4 tooltip">
                    <ul><li>
                       <?= form_label('Area(Has)*','','for="legis_area"').form_input('legis_area','','placeholder="" id="legis_area" class="number-separator"') ?>
                       <span class="tooltiptext">Total area (has)</span>
                    </li></ul>
                </div>
            </div>           
            <div class="col-xs-12 col-lg-12" style="display: none;" id="statusofimplementID">
                <fieldset>
                    <legend>Status of Establishment</legend>
                    <div class="col-xs-12 col-lg-12">
                        <div class="col-xs-12 col-lg-12">
                            <?php echo form_checkbox('chk_compileMap','',FALSE,'id="chk_compileMap" onclick="mychkmapcompile();"').form_label('Compilation of Maps','','for="chk_compileMap"') ?>
                        </div>
                        <div class="col-xs-12 col-lg-12 tooltip" id="compileMapdiv" style="display: none">
                            <fieldset>
                            <div class="col-xs-12 col-lg-12">
                                <label>Upload copy of compilation of maps<i>(*.pdf,*.csv, maximum size of 50MB)</i></label>
                                <input type='file' name="legis_compileMap" id="legis_compileMap" onchange="readURLlegismapcompilation(this);"/>
                                <input id="legis_compileMap_span" name="legis_compileMap_span" type="hidden" />
                                <div id="loadinglegis_compileMap"></div>
                            </div>
                            <div class="col-xs-12 col-lg-12">
                            <br>
                                <label>Upload shapefile<i>(*.zip,*.rar, maximum size of 50MB)</i></label>
                                <input type='file' name="legis_compileMapshp" id="legis_compileMapshp" onchange="readURLlegismapcompilationshp(this);"/>
                                <input id="legis_compileMapshp_span" name="legis_compileMapshp_span" type="hidden" />
                                <div id="loadinglegis_compileMapshp"></div>
                            </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-12">
                        <div class="col-xs-12 col-lg-12">
                            <br><?php echo form_checkbox('chk_pasasrpao','',FALSE,'id="chk_pasasrpao" onclick="mychkpasasrpao();"').form_label('Preparation of  PASA and resource profile','','for="chk_pasasrpao"') ?>
                        </div>
                        <div class="col-xs-12 col-lg-12 tooltip" id="compilePASAdiv" style="display: none">
                            <fieldset>
                            <div class="col-xs-12 col-lg-12">
                                <label>Upload copy of PASA and resource profile<i>(*.pdf,*.csv, maximum size of 50MB)</i></label>
                                <input type='file' name="legis_pasasrpao" id="legis_pasasrpao" onchange="readURLlegispasasrpao(this);"/>
                                <input id="legis_pasasrpao_span" name="legis_pasasrpao_span" type="hidden" />
                                <div id="loadinglegis_pasasrpao"></div>
                            </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-12">
                        <div class="col-xs-12 col-lg-12">
                            <br><?php echo form_checkbox('chk_pubconsult','',FALSE,'id="chk_pubconsult" onclick="mychkpubconsult();"').form_label('Public Consultation','','for="chk_pubconsult"') ?>
                        </div>
                        <div class="col-xs-12 col-lg-12 tooltip" id="publicconsultdiv" style="display: none">
                            <fieldset>
                            <div class="col-xs-12 col-lg-12">
                                <label>Upload certificate of proceedings <i>(*.pdf,*.csv, maximum size of 50MB)</i></label>
                                <input type='file' name="legis_certproceed" id="legis_certproceed" onchange="readURLlegiscertproceed(this);"/>
                                <input id="legis_certproceed_span" name="legis_certproceed_span" type="hidden" />
                                <div id="loadinglegis_certproceed"></div>
                            </div>
                            <div class="col-xs-12 col-lg-12"><br>
                                <label>Upload certificate of consultation <i>(*.pdf,*.csv, maximum size of 50MB)</i></label>
                                <input type='file' name="legis_certconsult" id="legis_certconsult" onchange="readURLlegiscertconsult(this);"/>
                                <input id="legis_certconsult_span" name="legis_certconsult_span" type="hidden" />
                                <div id="loadinglegis_certconsult"></div>
                            </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-12">
                        <div class="col-xs-12 col-lg-12">
                            <br><?php echo form_checkbox('chk_initplan','',FALSE,'id="chk_initplan" onclick="mychkpaplan();"').form_label('Preparation of Initial PA Plan','','for="chk_initplan"') ?>
                        </div>
                        <div class="col-xs-12 col-lg-12 tooltip" id="compilepaplandiv" style="display: none">
                            <fieldset>
                            <div class="col-xs-12 col-lg-12">
                                <label>Upload copy of Initial PA Plan<i>(*.pdf,*.csv, maximum size of 50MB)</i></label>
                                <input type='file' name="legis_paplan" id="legis_paplan" onchange="readURLlegispaplan(this);"/>
                                <input id="legis_paplan_span" name="legis_paplan_span" type="hidden" />
                                <div id="loadinglegis_paplan"></div>
                            </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-12">
                        <div class="col-xs-12 col-lg-12">
                            <br><?php echo form_checkbox('chk_regionalreview','',FALSE,'id="chk_regionalreview" onclick="mychkregrev();"').form_label('Regional review and recommendation','','for="chk_regionalreview"') ?>
                        </div>
                        <div class="col-xs-12 col-lg-12 tooltip" id="compileregionalreviewdiv" style="display: none">
                            <fieldset>
                            <div class="col-xs-12 col-lg-12">
                                <label>Upload minutes of meeting<i>(*.pdf,*.csv, maximum size of 50MB)</i></label>
                                <input type='file' name="legis_regionalreview" id="legis_regionalreview" onchange="readURLlegisregionalrev(this);"/>
                                <input id="legis_regionalreview_span" name="legis_regionalreview_span" type="hidden" />
                                <div id="loadinglegis_regionalreview"></div>
                            </div>
                            <div class="col-xs-12 col-lg-12"><br>
                                <label>Upload complete staff work<i>(*.pdf,*.csv, maximum size of 50MB)</i></label>
                                <input type='file' name="legis_regionalreviewstaffwork" id="legis_regionalreviewstaffwork" onchange="readURLlegisregionalrevstaffwork(this);"/>
                                <input id="legis_regionalreviewstaffwork_span" name="legis_regionalreviewstaffwork_span" type="hidden" />
                                <div id="loadinglegis_regionalreviewstaffwork"></div>
                            </div>
                            <div class="col-xs-12 col-lg-12"><br>
                                <label>Upload endorsement<i>(*.pdf,*.csv, maximum size of 50MB)</i></label>
                                <input type='file' name="legis_regionalreviewendorse" id="legis_regionalreviewendorse" onchange="readURLlegisregionalrevendorse(this);"/>
                                <input id="legis_regionalreviewendorse_span" name="legis_regionalreviewendorse_span" type="hidden" />
                                <div id="loadinglegis_regionalreviewendorse"></div>
                            </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-12">
                        <div class="col-xs-12 col-lg-12">
                            <br><?php echo form_checkbox('chk_nationalreview','',FALSE,'id="chk_nationalreview" onclick="mychknatrev();"').form_label('National review and recommendation','','for="chk_nationalreview"') ?>
                        </div>
                        <div class="col-xs-12 col-lg-12 tooltip" id="compilenationalreviewdiv" style="display: none">
                            <fieldset>
                            <div class="col-xs-12 col-lg-12">
                                <label>Upload copy of minutes of meeting<i>(*.pdf,*.csv, maximum size of 50MB)</i></label>
                                <input type='file' name="legis_nationalreview" id="legis_nationalreview" onchange="readURLlegisnationalrev(this);"/>
                                <input id="legis_nationalreview_span" name="legis_nationalreview_span" type="hidden" />
                                <div id="loadinglegis_nationalreview"></div>
                            </div>
                            <div class="col-xs-12 col-lg-12"><br>
                                <label>Upload complete staff work<i>(*.pdf,*.csv, maximum size of 50MB)</i></label>
                                <input type='file' name="legis_nationalreviewstaffwork" id="legis_nationalreviewstaffwork" onchange="readURLlegisnationalrevstaffwork(this);"/>
                                <input id="legis_nationalreviewstaffwork_span" name="legis_nationalreviewstaffwork_span" type="hidden" />
                                <div id="loadinglegis_nationalreviewstaffwork"></div>
                            </div>
                            <div class="col-xs-12 col-lg-12"><br>
                                <label>Upload endorsement<i>(*.pdf,*.csv, maximum size of 50MB)</i></label>
                                <input type='file' name="legis_nationalreviewendorse" id="legis_nationalreviewendorse" onchange="readURLlegisnationalrevendorse(this);"/>
                                <input id="legis_nationalreviewendorse_span" name="legis_nationalreviewendorse_span" type="hidden" />
                                <div id="loadinglegis_nationalreviewendorse"></div>
                            </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-12">
                        <div class="col-xs-12 col-lg-12">
                            <br><?php echo form_checkbox('chk_presproc','',FALSE,'id="chk_presproc" onclick="mychkpresproc();"').form_label('Presidential Proclamation','','for="chk_presproc"') ?>
                        </div>
                        <div class="col-xs-12 col-lg-12 tooltip" id="presprocdiv" style="display: none">
                            <fieldset>
                            <div class="col-xs-12 col-lg-12">
                                <label>Upload copy of draft Presidential Proclamation<i>(*.pdf,*.csv, maximum size of 50MB)</i></label>
                                <input type='file' name="legis_presproc" id="legis_presproc" onchange="readURLlegispresproc(this);"/>
                                <input id="legis_presproc_span" name="legis_presproc_span" type="hidden" />
                                <div id="loadinglegis_presproc"></div>
                            </div>
                            <div class="col-xs-12 col-lg-12"><br>
                                <label>Upload Recommendation<i>(*.pdf,*.csv, maximum size of 50MB)</i></label>
                                <input type='file' name="legis_presprocrecom" id="legis_presprocrecom" onchange="readURLlegispresprocrecom(this);"/>
                                <input id="legis_presprocrecom_span" name="legis_presprocrecom_span" type="hidden" />
                                <div id="loadinglegis_presprocrecom"></div>
                            </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-12">
                        <div class="col-xs-12 col-lg-12">
                            <br><?php echo form_checkbox('chk_congressenact','',FALSE,'id="chk_congressenact" onclick="mychkcongressenact();"').form_label('Congressional Enactment','','for="chk_congressenact"') ?>
                        </div>
                        <div class="col-xs-12 col-lg-12 tooltip" id="congressenactdiv" style="display: none">
                            <fieldset>
                            <div class="col-xs-12 col-lg-12">
                                <label>Upload copy of Republic Act<i>(*.pdf,*.csv, maximum size of 50MB)</i></label>
                                <input type='file' name="legis_congressenact" id="legis_congressenact" onchange="readURLlegiscongressenact(this);"/>
                                <input id="legis_congressenact_span" name="legis_congressenact_span" type="hidden" />
                                <div id="loadinglegis_congressenact"></div>
                            </div>
                            </fieldset>
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class="col-xs-12">
                <fieldset>
                    <legend style="background-color: transparent;color: #000; font-weight: 700;font-size: 14px;">Date Issued</legend>
                    <div class="col-xs-4 col-lg-3 tooltip">
                        <ul><li>
                            <?php echo form_dropdown('date_month',$monthList,'',' id="month"') ?>
                        </li></ul>
                    </div>
                    <div class="col-xs-4 col-lg-3 tooltip">
                        <ul><li>
                            <?php echo form_dropdown('date_day',$dayList,'',' id="day"') ?>
                        </li></ul>
                    </div>
                    <div class="col-xs-4 col-lg-3 tooltip">
                        <ul><li>
                            <?php echo form_dropdown('date_year',$yearListed,'',' id="year"') ?>
                        </li></ul>
                    </div>
                </fieldset>
            </div>
            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12" style="margin-bottom:10px;display: none" id="divestablished">
                <a id="switchidspanestablished"><b>Add history of establishment</b></a>
            </div>
            <div class="col-xs-12 col-lg-12" id="historyestablishid" style="display:none;">
                <fieldset>
                    <legend>History of Establishment</legend>
                    <div class="col-xs-12 col-lg-4 tooltip">
                        <ul><li>
                            <?php echo form_label('Status *','','for="nipsub_id"').form_dropdown('paclasssub',$classList,'',' id="nipsub_id"') ?>
                            <span class="tooltiptext">Status refers to the legal status of the area, whether as initial component, additional site</span>
                        </li></ul>
                    </div>
                    <div class="col-xs-12 col-lg-4 tooltip" id="icapadiv" style="display:none">
                        <ul><li>
                            <label>Category</label>
                            <?php echo form_dropdown('previouscat',$nipselect,'','id="previouscat" ') ?>
                            <span class="tooltiptext">Category reflects the principal management objectives of the protected area.</span>
                        </li></ul>
                    </div>
                    <div class="col-xs-12">
                        <div class="col-xs-4 col-lg-4 tooltip">
                            <ul><li>
                                <?= form_label('Legal Basis *','','for="history-legis_id"').form_dropdown('history-legis_id',$procList,'',' id="history-legis_id"') ?>
                                <span class="tooltiptext">Select Legal Basis</span>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-4 tooltip">
                            <ul><li>
                               <?= form_label('Number *','','for="history-legisno"').form_input('history-legisno','','placeholder=" " id="history-legisno"') ?>
                               <span class="tooltiptext">e.g. Proclamation No. 2-0001, EO No. 2010-03 </span>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-4 tooltip">
                            <ul><li>
                               <?= form_label('Area(Has)*','','for="history-legis_area"').form_input('history-legis_area','','placeholder="" id="history-legis_area" class="number-separator"') ?>
                               <span class="tooltiptext">Total area (has)</span>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <fieldset>
                            <legend style="background-color: transparent;color: #000; font-weight: 700;font-size: 14px;">Date Issued</legend>
                            <div class="col-xs-4 col-lg-3 tooltip">
                                <ul><li>
                                    <?php echo form_dropdown('history-date_month',$monthList,'',' id="history-month"') ?>
                                </li></ul>
                            </div>
                            <div class="col-xs-4 col-lg-3 tooltip">
                                <ul><li>
                                    <?php echo form_dropdown('history-date_day',$dayList,'',' id="history-day"') ?>
                                </li></ul>
                            </div>
                            <div class="col-xs-4 col-lg-3 tooltip">
                                <ul><li>
                                    <?php echo form_dropdown('history-date_year',$yearListed,'',' id="history-year"') ?>
                                </li></ul>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-xs-12 col-lg-12">
                        <div class="col-xs-1 col-lg-1">
                            <a type="text" class="btn btn-warning" id="addhistoryinitailcomp">Add previous category</a>
                        </div>
                        <div class="col-xs-12 col-lg-12">
                            <div class="table-responsive large-tables">
                                <table id="tblinitialcomponent" class="content-table">
                                    <thead>
                                    </thead>
                                    <tbody id="tbodyinitialcomponent"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
            
            <div class="col-xs-12 col-lg-12">
                <a type="text" class="btn btn-primary" id="addLegislation">Add data</a>
            </div>
            <div class="col-xs-12 col-lg-12 ">
                <div class="table-responsive large-tables">
                    <table id="LegislationTable" class="content-table">
                        <thead>
                            <tr>
                                <th colspan="5" style="text-align: center; font-size: 24px">Issuance</th>
                            </tr>
                            <tr>
                                <th>Legal Status</th>
                                <th>NIPAS Category</th>
                                <th>Legal Basis</th>
                                <th>Date</th>
                                <th>Area(ha)</th>
                                <!-- <th></th> -->
                            </tr>
                        </thead>
                        <tbody id="tbody_leg">
                        </tbody>
                    </table>
                    <table id="LegislationTable_sample" class="content-table">
                        <tbody id="tbody_legs">
                        </tbody>
                    </table>
                </div>
            </div>
        </fieldset>
    </div>
</fieldset>
<div class="tab">
    <a class="tablinks_genin active" onclick="tabSGenIn(event, 'areaid')">Area(has)</a>
    <a class="tablinks_genin" onclick="tabSGenIn(event, 'biogeoid')" id="bgter">Biogeographic Regions</a>
    <a class="tablinks_genin" onclick="tabSGenIn(event, 'locid')">Administrative Location</a>
    <a class="tablinks_genin" id="" onclick="tabSGenIn(event, 'glid')">Geographic Location</a>
    <a class="tablinks_genin hidden" id="" onclick="tabSGenIn(event, 'legalid')">Legal Status</a>
    <a class="tablinks_genin hidden" id="" onclick="tabSGenIn(event, 'kbaid')">Key Biodiversity</a>
    <a class="tablinks_genin" id="" onclick="tabSGenIn(event, 'irid')">International Recognition</a>
    <a class="tablinks_genin" id="" onclick="tabSGenIn(event, 'accessid')">Accessibility</a>
    <a class="tablinks_genin" id="" onclick="tabSGenIn(event, 'wdpaids')">World Database of Protected Area</a>
</div>
<div id="areaid" class="tabcontentGenIn" style="display:block">
    <fieldset>
        <legend>Protected Area (has)</legend>
        <div class="col-xs-12 col-lg-4 tooltip">
            <ul><li>
                <label for="op1">Land</label>
                <input type="text" name="terrestrial" class="number-separator textcompute1" id="op1" placeholder="Hectares" value="<?php  echo number_format($pamain->terrestrial,3); ?>" onkeyup="Calculate()"/>
                <span class="tooltiptext">Input land area in hectares, if not applicable leave as blank</span>
            </li></ul>
        </div>
        <div class="col-xs-12 col-lg-4 tooltip">
            <ul><li>
                <label for="op2">Water</label>
                <input type="text" name="marine" class="number-separator textcompute2" id="op2" placeholder="Hectares" value="<?php  echo number_format($pamain->marine_area,3); ?>" onkeyup="Calculate()"/>
                <span class="tooltiptext">Input water area in hectares, if not applicable leave as blank</span>
            </li></ul>
        </div>

        <div class="col-xs-12 col-lg-4 tooltip">
            <ul><li>
                <?php echo form_label('Total Area','','for="area"').form_input('area',number_format($pamain->area,3),'placeholder="Hectares" id="resultArea" readonly="readonly"'); ?>
                <span class="tooltiptext">Auto-generate total area</span>
            </li></ul>
        </div>
    </fieldset>
    <fieldset>
        <legend>Buffer Zone (has)</legend>
        <div class="col-xs-6 col-lg-4 tooltip">
            <ul><li>
                <?php echo form_label('Land Buffer Zone (has)','','for="buffer"').form_input('buffer',number_format($pamain->buffer,3),'class="number-separator" placeholder="Hectares" id="buffer"'); ?>
                <span class="tooltiptext">Input land buffer zone in hectares, if not applicable leave as blank</span>
            </li></ul>
        </div>
        <div class="col-xs-6 col-lg-4 tooltip">
            <ul><li>
                <!-- <?php echo form_label('Water Buffer Zone (has)','','for="marine_buffer"').form_input('marine_buffer',number_format($pamain->marine_buffer,3),'placeholder=" "class="number-separator" id="marine_buffer" onkeyup="run(this)"'); ?> -->
                <?php echo form_label('Water Buffer Zone (has)','','for="marine_buffer"').form_input('marine_buffer',number_format($pamain->marine_buffer,3),'class="number-separator" placeholder="Hectares" id="marine_buffer"'); ?>
                <span class="tooltiptext">Input water buffer zone in hectares, if not applicable leave as blank</span>
            </li></ul>
        </div>
    </fieldset>
</div>
<div id="biogeoid" class="tabcontentGenIn" style="display:none">
    <div class="col-xs-12 col-lg-12">
        <div class="col-lg-6 col-xs-6">
            <fieldset>
                <legend></legend>
                <div class="col-xs-12 col-lg-12 tooltip">
                    <ul><li>
                        <label>Terrestrial</label>
                        <?php echo form_dropdown('tbz_id',$zoneList,'','id="tbz_id"') ?>
                        <span class="tooltiptext">Biogeographic regions as geographically distinct assemblages of species and communities. Terrestrial biogeographic regions of the Philippines were identified based on the geographic distribution patterns of plants, arthropods, amphibians, reptiles, birds and mammals. </span>
                    </li></ul>
                </div>
                <div class="col-xs-12 col-lg-12 ">
                    <a type="text" class="btn btn-primary" id="add_biodiv_ter">Add data</a>
                </div>
                <div class="col-xs-12 col-lg-12 ">
                    <br><table id="tblbiozone" class="content-table">
                        <thead>
                            <tr>
                                <th style="text-align: center; font-size: 24px">Terrestrial</th>
                            </tr>
                        </thead>
                        <tbody id="tbodybiozoneter">
                        </tbody>
                    </table>
                </div>
            </fieldset>
        </div>
        <div class="col-lg-6 col-xs-6">
            <fieldset>
                <legend></legend>
                <div class="col-xs-12 col-lg-12 tooltip">
                    <ul><li>
                        <label>Marine</label>
                        <?php echo form_dropdown('tbz_idm',$zoneListm,'','id="tbz_idm"') ?>
                        <span class="tooltiptext">Biogeographic regions as geographically distinct assemblages of species and communities. Marine biogeographic regions of the Philippines were identified based on the connectivity and dispersal features of ocean circulation.
</span>
                    </li></ul>
                </div>
                <div class="col-xs-12 col-lg-12">
                    <fieldset>
                        <label>Upload shapefile of influencing rivers <i>(*.zip  format, maximum size of 200MB)</i></label>
                        <input type='file' name="shp_influerivers" id="shp_influerivers" onchange="readURLshapemarineinflurivers(this);" />
                        <input type="hidden" name="shp_influerivers_txt" id="shp_influerivers_txt">
                        <div id="fetch_shp_influerivers_shpfile"></div>
                    </fieldset> 
                </div>                
                <div class="col-xs-12 col-lg-12 ">
                    <a type="text" class="btn btn-primary" id="add_biodiv_mar">Add data</a>
                </div>
                <div class="col-xs-12 col-lg-12 ">
                    <br><table id="tblbiozonem" class="content-table">
                        <thead>
                            <tr>
                                <th style="text-align: center; font-size: 24px">Marine</th>
                            </tr>
                        </thead>
                        <tbody id="tbodybiozoneterm">
                        </tbody>
                    </table>
                </div>
            </fieldset>
        </div>
    </div>
</div>
<div id="locid" class="tabcontentGenIn" style="display:none">
    <fieldset>
        <div class="col-xs-12">
            <div class="col-xs-6 col-lg-3 tooltip">
                <ul><li>
                    <?php echo form_label('Region *','','for="regid"').form_dropdown('region_id',$regionList,'','class="regid" id="regid"') ?>
                    <span class="tooltiptext">Select coverage region(s)</span>
                    <div class="prov_error"></div>
                </li></ul>
            </div>
            <div class="col-xs-6 col-lg-3 tooltip">
                <ul><li>
                    <?php echo form_label('Province *','','for="provid"').form_dropdown('province_id',$province,'','class="provid" id="provid"') ?>
                    <span class="tooltiptext">Select coverage province(s)</span>
                    <div class="municipal_error"></div>
                </li></ul>
            </div>
            <div class="col-xs-6 col-lg-3 tooltip">
                <ul><li>
                    <?php echo form_label('Municipality *','','for="munid"').form_dropdown('municipal_id',$municipal,'','class="munid" id="munid"') ?>
                    <span class="tooltiptext">Select coverage municipalities</span>
                    <div class="barangay_error"></div>
                </li></ul>
            </div>
            <div class="col-xs-6 col-lg-3 tooltip">
                <ul><li>
                    <?php echo form_label('Barangay','','for="barid"').form_dropdown('barangay_id',$barangay,'','class="barid" id="barid"') ?>
                    <span class="tooltiptext">Select coverage barangay(s)</span>
                    <div class="barangay_error"></div>
                </li></ul>
            </div>
        </div>
        <div class="col-xs-12 col-lg-12 ">
            <a type="text" class="btn btn-primary" id="add_data">Add data</a>
        </div>
        <div class="col-xs-12">
            <!-- <div class="col-xs-12 col-lg-12 "> -->
                <table id="data_table" class="content-table">
                    <thead>
                        <tr>
                            <th style="text-align: center; font-size: 24px">Administrative location</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                    </tbody>
                </table>
                <table id="table_sample" class="table  table-bordered tglobal">
                    <tbody id="tbodys">
                    </tbody>
                </table>
            <!-- </div> -->
        </div>
    </fieldset>
</div>
<div id="legalid" class="tabcontentGenIn" style="display:none">

</div>
<div id="kbaid" class="tabcontentGenIn" style="display:none">
    <fieldset>
        <legend>Key Biodiversity Area *</legend>
        <div class="col-xs-6 col-lg-6 ">
            <ul><li>
                <?php echo form_dropdown('kba',$kba,$pamain->kba,' id="kba_id"') ?>
            </li></ul>
        </div>

    </fieldset>
</div>
<div id="irid" class="tabcontentGenIn" style="display:none">
    <?php echo form_open_multipart('#','id="formInterRecogs" enctype="multipart/form-data" class="form-style-7" autocomplete="off"') ?>
    <?php echo form_input('recognitioncodes','','id="recognitioncodes" class="hidden"'); ?>
    <fieldset>
        <legend>International Recognition</legend>
        <div class="col-xs-12">
            <div class="col-xs-12 col-lg-4 col-md-4 tooltip">
                <ul><li>
                    <?php echo form_label('International Recognition','','for="recognition"').form_dropdown('recognition',$recognitionList,'',' id="recognition"') ?>
                    <span class="tooltiptext">Designation awarded by international conventions/agreements to protected areas in recognition of their biological, ecological, geological, or cultural importance, or a combination of these</span>
                </li></ul>
            </div>
            <div class="col-xs-8 col-lg-8 col-md-8" id="chck-recogsub">
                <div class="col-xs-12 col-lg-12 tooltip">
                    <fieldset>
                        <legend style="display: block; float: left; margin-top: -19px; background: #fafafa; padding: 2px 5px 2px 5px; color: #444; font-size: 14px; overflow: hidden; border-radius: 10px 10px 10px 10px;font-weight: 700;">Criteria</legend>
                        <?php echo form_label('','','for="int_crit"').form_dropdown('int_crit','','',' id="int_crit" class="select2 narrow wrap" style="width: 100%;"') ?>
                        <span class="tooltiptext">The set of unique biologixal, ecological, geological, cultural and social conditions that characterize the area and make them of outstanding value. These criteria are only applicable to Ramsar sites and World Heritage Sites.</span>
                    </fieldset>                   
                </div>
            </div>
            <div id="listcritdiv" style="display: none;">
                <div class="col-xs-12 col-lg-12 ">
                    <a type="text" class="btn btn-warning" id="add_critlist">Add criteria to table</a>
                </div>
                <div class="col-xs-12 col-lg-12">
                    <table id="tblcitlist" class="content-table">
                        <tbody id="tbodyramsarcriteria"></tbody>
                    </table><br>
                </div>
            </div>
            <div class="col-xs-12 col-lg-12" id="chck-recogsub2" style="display: none">
                <div class="col-xs-12 col-lg-12 tooltip">
                    <ul><li>
                        <?php echo form_label('International Criteria description').form_textarea('int_crit_desc','',' id="int_crit_desc" readonly="readonly"') ?>
                        <span class="tooltiptext">International criteria description</span>
                    </li></ul>
                </div>
            </div>
            <div class="col-xs-12 col-lg-6 tooltip" id="chck-inscribe">
                <ul><li>
                    <?php echo form_label('(Specify others)','','for="inscribe"').form_input('inscribe','','id="inscribe" placeholder=" "'); ?>
                    <span class="tooltiptext">Specify other international recognition</span>
                </li></ul>
            </div>
            <div class="col-xs-12 col-lg-12">
                <div class="col-xs-6 col-lg-6 tooltip" id="sitenodis" style="display:none">
                    <ul><li>
                        <?php echo form_label('Site number/code','','for="sitenumber"').form_input('sitenumber','','id="sitenumber" placeholder=" "'); ?>
                        <span class="tooltiptext">International recognition site number</span>
                    </li></ul>
                </div>
                <div class="col-xs-6 col-lg-6 tooltip" id="recogareahadiv" style="display:none">
                    <ul><li>
                       <?= form_label('Area(sq.km./has)','','for="recog_area_has"').form_input('recog_area_has','','placeholder="" id="recog_area_has" class="number-separator"') ?>
                       <span class="tooltiptext">Area(sq.km./has)</span>
                    </li></ul>
                </div>
                <div class="col-xs-6 col-lg-6 tooltip" id="recogareasqdiv" style="display:none">
                    <ul><li>
                       <?= form_label('Area(sq. km.)','','for="recog_area_sqr"').form_input('recog_area_sqr','','placeholder="" id="recog_area_sqr" class="number-separator"') ?>
                       <span class="tooltiptext">Total area (sq. km.)</span>
                    </li></ul>
                </div>
            </div>            
            <div class="col-lg-12 col-xs-12 tooltip">
                <div class="col-xs-4 col-lg-4">
                    <ul><li>
                        <?php echo form_label('Date Inscribed','','for="date_declared_month" id="dateincribedid"').form_dropdown('date_declared_month',$monthListed,'',' id="date_declared_month"') ?>
                    </li></ul>
                </div>
                <div class="col-xs-4 col-lg-4">
                    <ul><li>
                        <?php echo form_label('&nbsp;','','for="date_declared_day"').form_dropdown('date_declared_day',$dayList,'',' id="date_declared_day"') ?>
                    </li></ul>
                </div>
                <div class="col-xs-4 col-lg-4">
                    <ul><li>
                        <?php echo form_label('&nbsp;','','for="date_declared_year"').form_dropdown('date_declared_year',$yearListed,'',' id="date_declared_year"') ?>
                    </li></ul>
                </div>
                <span class="tooltiptext">Select date inscribed</span>
            </div>
        </div>
        <div class="col-xs-12 col-lg-12 tooltip">
            <fieldset>
            <div class="col-xs-12 col-lg-12">
                <label>Uploading of shapefiles<i>(*.zip,*.rar, maximum size of 50MB)</i></label>
                <input type='file' name="recog_shapefile" id="recog_shapefile" onchange="readURLrecognitionshpfile(this);"/>
                <input id="recog_shapefile_span" name="recog_shapefile_span" type="hidden" />
                <div id="loadingrecog_shapefile"></div>
            </div>
            </fieldset>
        </div>
        <div class="col-xs-12 col-lg-12 ">
            <a type="text" class="btn btn-primary" id="add_recognition">Add data</a>
        </div>
        <div class="col-xs-12 ">
            <div class="col-xs-12 col-lg-12 ">
                <div class="table-responsive large-tables">
                    <table id="tableRecognition" class="content-table">
                        <thead>
                            <tr>
                                <th colspan="3" style="text-align: center; font-size: 24px">International Recognition</th>
                            </tr>
                            <tr>
                                <th>Recognition</th>
                                <th>Inscribed Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="tbody_recognition"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </fieldset>
    <?php echo form_close(); ?>
</div>
<div id="glid" class="tabcontentGenIn" style="display:none">
    <fieldset style="padding-bottom:1px;">
    <legend>Geographic Location (WGS'84 projection)</legend>
    <div class="col-xs-12">
        <div class="col-xs-12 col-lg-6 hide">
            <fieldset>
                <legend>Upper Most Left</legend>
                    <div class="col-xs-12">
                        <div class="col-xs-6 col-lg-6 tooltip">
                            <ul><li>
                                <?= form_label('Longitude','','for="long1"').form_input('long1',$pamain->geographic_long1,'id="long1" placeholder=" "');?>
                                <span class="tooltiptext">Extend upper most left longitude</span>
                            </li></ul>
                        </div>
                         <div class="col-xs-6 col-lg-6 tooltip">
                            <ul><li>
                                <?= form_label('Latitude','','for="lat1"').form_input('lat1',$pamain->geographic_lat1,'id="lat1" placeholder=" "');?>
                                <span class="tooltiptext">Extend upper most left latitude</span>
                            </li></ul>
                        </div>
                    </div>
            </fieldset>
        </div>        
        
        <div class="col-xs-12 col-lg-12">
            <fieldset>
                        <legend style="background-color: transparent;color: #000; font-weight: 700;font-size: 14px;">Upper Most Left</legend>
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
                                                            <td>Decimal Degree</td><td colspan="2"><ul><li><?= form_input('uml2_clongoutputdd',$pamain->uml_long_decimal,'id="uml2_clongoutputdd"')?></li></ul></td>
                                                            <td class="hidden"><?php echo form_button('en','Convert','class="classConvert"') ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <ul><li>                                                            
                                                                    <?= form_label('Direction','for=""').form_dropdown('uml2_clongdmsdir',$direct_long,$pamain->uml_long_direction,' id="uml2_clongdmsdir"'); ?>
                                                                </li></ul>
                                                                </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Degree (°)','for="uml2_clongdmsdegree"').form_input('uml2_clongdmsdegree',$pamain->uml_long_degree,'id="uml2_clongdmsdegree" class="dmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Minute (ˈ)','for="uml2_clongdmsminute"').form_input('uml2_clongdmsminute',$pamain->uml_long_minutes,'id="uml2_clongdmsminute" class="dmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Second (")','for="uml2_clongdmssecond"').form_input('uml2_clongdmssecond',$pamain->uml_long_seconds,'id="uml2_clongdmssecond" class="dmstodd"') ?>
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
                                                            <td>Decimal Degree</td><td colspan="2"><ul><li><?= form_input('uml2_clatoutputdd',$pamain->uml_lat_decimal,'id="uml2_clatoutputdd"') ?></li></ul></td>
                                                            <td class="hidden"><?php echo form_button('en','Convert','class="classConvert2"') ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <ul><li>
                                                                   <?= form_label('Direction','for=""').form_dropdown('uml2_clatdmsdir',$direct_lat,$pamain->uml_lat_direction,' id="uml2_clatdmsdir"'); ?>
                                                                </li></ul>
                                                                </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Degree (°)','for="uml2_clatdmsdegree"').form_input('uml2_clatdmsdegree',$pamain->uml_lat_degree,'id="uml2_clatdmsdegree" class="dmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Minute (ˈ)','for="uml2_clatdmsminute"').form_input('uml2_clatdmsminute',$pamain->uml_lat_minute,'id="uml2_clatdmsminute" class="dmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Second (")','for="uml2_clatdmssecond"').form_input('uml2_clatdmssecond',$pamain->uml_lat_seconds,'id="uml2_clatdmssecond" class="dmstodd"') ?>
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
                    <fieldset>
                        <legend style="background-color: transparent;color: #000; font-weight: 700;font-size: 14px;">Lower Most Right</legend>
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
                                                            <td>Decimal Degree</td><td colspan="2"><ul><li><?= form_input('lmr2_clongoutputdd',$pamain->lmr_long_decimal,'id="lmr2_clongoutputdd"')?></li></ul></td>
                                                            <td class="hidden"><?php echo form_button('en','Convert','class="classConvert3"') ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <ul><li>                                                            
                                                                    <?= form_label('Direction','for=""').form_dropdown('lmr2_clongdmsdir',$direct_long,$pamain->lmr_long_direction,' id="lmr2_clongdmsdir"'); ?>
                                                                </li></ul>
                                                                </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Degree (°)','for="lmr2_clongdmsdegree"').form_input('lmr2_clongdmsdegree',$pamain->lmr_long_degree,'id="lmr2_clongdmsdegree" class="dmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Minute (ˈ)','for="lmr2_clongdmsminute"').form_input('lmr2_clongdmsminute',$pamain->lmr_long_minutes,'id="lmr2_clongdmsminute" class="dmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Second (")','for="lmr2_clongdmssecond"').form_input('lmr2_clongdmssecond',$pamain->lmr_long_seconds,'id="lmr2_clongdmssecond" class="dmstodd"') ?>
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
                                                            <td>Decimal Degree</td><td colspan="2"><ul><li><?= form_input('lmr2_clatoutputdd',$pamain->lmr_lat_decimal,'id="lmr2_clatoutputdd"') ?></li></ul></td>
                                                            <td class="hidden"><?php echo form_button('en','Convert','class="classConvert4"') ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <ul><li>
                                                                   <?= form_label('Direction','for=""').form_dropdown('lmr2_clatdmsdir',$direct_lat,$pamain->lmr_lat_direction,' id="lmr2_clatdmsdir"'); ?>
                                                                </li></ul>
                                                                </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Degree (°)','for="lmr2_clatdmsdegree"').form_input('lmr2_clatdmsdegree',$pamain->lmr_lat_degree,'id="lmr2_clatdmsdegree" class="dmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Minute (ˈ)','for="lmr2_clatdmsminute"').form_input('lmr2_clatdmsminute',$pamain->lmr_lat_minutes,'id="lmr2_clatdmsminute" class="dmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?= form_label('Second (")','for="lmr2_clatdmssecond"').form_input('lmr2_clatdmssecond',$pamain->lmr_lat_seconds,'id="lmr2_clatdmssecond" class="dmstodd"') ?>
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
        </div>

        <div class="col-xs-12 col-lg-6 hide">
            <fieldset>
                <legend>Lower Most Right</legend>
                    <div class="col-xs-12">
                        <div class="col-xs-6 col-lg-6 tooltip">
                            <ul><li>
                                <?= form_label('Longitude','','for="long2"').form_input('long2',$pamain->geographic_long2,'id="long2" placeholder=" "');?>
                                <span class="tooltiptext">Extent lower most right longitude</span>
                            </li></ul>
                        </div>
                         <div class="col-xs-6 col-lg-6 tooltip">
                            <ul><li>
                                <?= form_label('Latitude','','for="lat2"').form_input('lat2',$pamain->geographic_lat2,'id="lat2" placeholder=" "');?>
                                <span class="tooltiptext">Extend lower most right latitude</span>
                            </li></ul>
                        </div>
                    </div>
            </fieldset>
        </div>
    </div>
    <div class="col-xs-12">
    <div class="col-xs-12 col-lg-12 tooltip">        
        <ul><li>
            <?= form_label('Boundary','','for="boundary_upper"').form_textarea('boundary_upper',$pamain->boundary_upper,'id="boundary_upper"');?>
            <span class="tooltiptext">The geographic extent of the area covered by the protected area. Use the cardinal directions to describe the extent of the protected area, including the adjacent locations that can be used as reference.</span>
        </li></ul>        
    </div>
</div>
</fieldset>
</div>
<div id="accessid" class="tabcontentGenIn" style="display:none">
    <fieldset>
    <legend>Accessibility</legend>
    <div class="col-xs-12 col-lg-12 tooltip">
        <ul><li>
            <?= form_label('Brief Description (How to get there)','','for="accessibility"').form_textarea('accessibility',$pamain->accessibility,'id="accessibility" placeholder="Description" style ="height:130px"');?>
            <span class="tooltiptext">Brief description accessibility</span>
        </li></ul>
    </div>
    <div class="col-xs-12 col-lg-12 tooltip">
        <ul><li>
            <?php echo form_label('Insert Where-to (Find your location via'.'<a target="_blank" href="https://www.google.com.ph/maps">&nbsp;Google Map</a>'.')').form_input('embded_map_link',$pamain->embeded_map,'id="embded_map_link" placeholder=""') ?>
            <input type="hidden" value="<?php echo $pamain->embeded_map ?>" name="backup_html_map">
            <span class="tooltiptext">Copy html embeded map from google map.</span>
        </li></ul>
    </div>
    <div id="embeded_maps" class="col-xs-12">
        <div style="width:100%"><?php echo htmlspecialchars_decode($pamain->embeded_map); ?></div>
    </div>
</fieldset>
</div>
<div id="wdpaids" class="tabcontentGenIn" style="display:none">
    <fieldset>
        <legend>World Database Protected Area</legend>
        <div class="col-xs-12 col-lg-12">
            <div class="col-xs-6 hidden">
                <ul><li>
                    <?php echo form_label('WDPA ID').form_input('wdpaid',$pamain->wdpaid,'id="wdpaidy" placeholder="The WDPA_PID is generated by UNEPWCMC"') ?>
                </li></ul>
            </div>
            <div class="col-xs-6 col-lg-6 tooltip">
                <ul><li>
                    <?php echo form_label('Designation Type').form_dropdown('desig_type',$desig_type,$pamain->desig_type,'id="desig_type" ') ?>
                    <span class="tooltiptext">Designation Type distinguishes protected areas established at the national level (national), under regional agreements (regional) or under international conventions and agreements (international). If protected areas were established through non-legal means such as customary laws, Not Applicable is used.</span>
                </li></ul>
            </div>
            <div class="col-xs-12 col-lg-6 tooltip">
                <ul><li>
                    <?php echo form_label('IUCN Category').form_dropdown('iucn_cat',$iucn_category,$pamain->iucn_cat,'id="iucn_cat"') ?>
                    <span class="tooltiptext">IUCN categories represent the principal management objectives of the protected area</span>
                </li></ul>
            </div>
        </div>
        <div class="col-xs-12 col-lg-12">
            <div class="col-xs-12 col-lg-6 tooltip">
                <ul><li>
                    <?php echo form_label('Marine').form_dropdown('wdpamarineid',$wdpamarine,$pamain->wdpamarineid,'id="wdpamarineid" '); ?>
                    <span class="tooltiptext">The proportion of the protected area that is within marine ecosystems. This ranges from completely terrestrial (0) to completely marine (2)</span>
                </li></ul>
            </div>
            <div class="col-xs-12 col-lg-6 tooltip">
                <ul><li>
                    <?php echo form_label('No-take').form_dropdown('wdpanotake',$wdpanotake,$pamain->wdpanotake,'id="wdpanotake" '); ?>
                    <span class="tooltiptext">No-take means that the taking of living or dead natural resources, inclusive of all methods of fishing, extraction, dumping, dredging and construction, is strictly prohibited in all or part of a marine protected area or OECM.</span>
                </li></ul>
            </div>
        </div>
        <div class="col-xs-12 col-lg-12">
            <div class="col-xs-6 hidden">
                <ul><li>
                    <?php echo form_label('OECM Year').form_dropdown('wdpayrstatus',$yearListed,$pamain->wdpayrstatus,'id="wdpayrstatus" '); ?>
                </li></ul>
            </div>
        </div>
        <div class="col-xs-12 col-lg-12 hidden">
            <div class="col-xs-6">
                <ul><li>
                    <?php echo form_label('Governance Type').form_dropdown('wdpagovtype',$wdpagovtype,$pamain->wdpagovtype,'id="wdpagovtype" '); ?>
                </li></ul>
            </div>
            <div class="col-xs-6">
                <ul><li>
                    <?php echo form_label('Ownership Type').form_dropdown('wdpaowntype',$wdpaowntype,$pamain->wdpaowntype,'id="wdpaowntype" '); ?>
                </li></ul>
            </div>
        </div>
        <div class="col-xs-12 col-lg-12">
            <div class="col-xs-4 col-lg-4 tooltip">
                <ul><li>
                    <?php echo form_label('Status').form_dropdown('wdpastatus',$wdpastatus,$pamain->wdpastatus,'id="wdpastatus" '); ?>
                    <span class="tooltiptext">Status distinguishes protected areas on their current place on the estanlishment process, legal basis of their eztablishment and the body/organization that established or recognized the area as a protected area.</span>
                </li></ul>
            </div>
            <div class="col-xs-4 col-lg-4 tooltip">
                <ul><li>
                    <?php echo form_label('Verification').form_dropdown('wdpaverif',$wdpaverif,$pamain->wdpaverif,'id="wdpaverif" '); ?>
                    <span class="tooltiptext">Reflects the veracity of data submitted to the World Conservation Monitoring Centre, as attested by the government, body, or experts on the matter</span>
                </li></ul>
            </div>
            <div class="col-xs-4 col-lg-4">
                <div class="col-xs-12 col-lg-12 tooltip">
                    <ul><li>
                        <?php echo form_label('Sub-national location').form_dropdown('wdpaiso',$wdpaiso,'','id="wdpaiso" '); ?>
                        <span class="tooltiptext">Refers to the province where the protected area is located</span>
                    </li></ul>
                </div>
                <div class="col-xs-12 col-lg-12">
                    <a type="text" class="btn btn-primary" id="addwdpalocations">Add data</a>
                </div>
                <div class="col-xs-12 col-lg-12">
                    <div class="table-responsive">
                        <table id="tblwdpaids" class="content-table">
                            <thead>
                                <tr>
                                    <th style="text-align: center; font-size: 24px">Sub-national location</th>
                                </tr>                           
                            </thead>
                            <tbody id="tbodywdpaids"></tbody>
                        </table>                    
                    </div>
                </div>  
            </div>
        </div>
    </fieldset>
</div>
<hr>
<div class="col-xs-12 col-lg-12 hidden">
    <div class="col-xs-4 col-lg-4 t-Region-buttons-left">
        <a type="button" class="btn btn-primary btn-flat btn-xs" id="submitfrmgeninfo">Apply changes</a>
    </div>
</div>
<form method="post" action="" id="LegisForm" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-legis" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Legal Status</h4>
                </div>
                <input type="hidden" id="legis-id" name="legis-id" value="" />
                <input type="hidden" id="legis-gencode" name="legis-gencode" value="" />
                <input type="hidden" id="legis-gencode2" name="legis-gencode2" value="" />
                <div class="modal-body" >
                    <div class="col-xs-12">
                        <div class="col-xs-12 col-lg-6  edit-chck-02" id="edit-chck-02">
                            <ul><li>
                                <?php echo form_label('Status *','','for="edit-nipsub_id"').form_dropdown('edit-nipsub_id',$classListsub,'','id="edit-nipsub_id"') ?>
                            </li></ul>
                        </div>
                        <div class="col-xs-12 col-lg-6 tooltip">
                            <ul><li>
                                <label>Category</label>
                                <?php echo form_dropdown('edit-pacategory_id',$categoryList,'','id="edit-pacategory_id" ') ?>
                                <span class="tooltiptext">Select Category</span>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-12 col-md-12" id="edit-pacatid">
                        <div class="col-xs-12 col-lg-12 tooltip" id="edit-othernipascategoryDiv" style="display: none">
                            <ul><li>
                                <label>Other Category</label>
                                <?php echo form_input('edit-othernipascategory','','id="edit-othernipascategory"') ?>
                                <span class="tooltiptext">Specify other category</span>
                            </li></ul>
                        </div>
                    </div>
                    <!-- <div class="col-xs-12 col-lg-4">
                        <ul><li>
                             <?php echo form_label('Initial Component/Additional site *','','for="edit-nipid"').form_dropdown('edit-nipid',$classList,'',' id="edit-nipid"') ?>
                        </li></ul>
                    </div>
                    <div class="col-xs-12 col-lg-8 tooltip" id="edit-icapadiv" style="display:none">
                        <ul><li>
                            <label>Previous category</label>
                            <?php echo form_input('edit-previouscat','','id="edit-previouscat"') ?>
                            <span class="tooltiptext">History of Establishment, previous category.</span>
                        </li></ul>
                    </div> -->
                    <div class="col-xs-12">
                        <div class="col-xs-4 col-lg-4">
                            <ul><li>
                                <?= form_label('Legal Basis *','','for="edit-legis_id"').form_dropdown('edit-legis_id',$procList,'',' id="edit-legis_id" style="margin-top:20px;"') ?>
                                    </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-4 tooltip">
                            <ul><li>
                               <?= form_label('Number *','','for="edit-legisno"').form_input('edit-legisno','','placeholder=" " id="edit-legisno"') ?>
                               <span class="tooltiptext">E.g Proclamation No. 2-0001, EO No. 2010-03 </span>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-4 tooltip">
                            <ul><li>
                               <?= form_label('Area(Has)','','for="edit-legis_area"').form_input('edit-legis_area','','placeholder="" class="number-separator" id="edit-legis_area" ') ?>
                                <span class="tooltiptext">Total area</span>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="col-xs-4 col-lg-4">
                            <ul><li>
                                <?php echo form_label('Date Issued *','','for="edit-legis_month"').form_dropdown('edit-legis_month',$monthList,'',' id="edit-legis_month"') ?>
                                    </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-4">
                            <ul><li>
                                <?php echo form_label('&nbsp;','','for="edit-legis_day"').form_dropdown('edit-legis_day',$dayList,'',' id="edit-legis_day"') ?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-4">
                            <ul><li>
                                <?php echo form_label('&nbsp;','','for="edit-legis_year"').form_dropdown('edit-legis_year',$yearListed,'',' id="edit-legis_year"') ?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-12" style="display: none;" id="edit-statusofimplementID">
                                <fieldset>
                                    <legend>Status of Implementation</legend>
                                    <div class="col-xs-12 col-lg-12">
                                        <div class="col-xs-12 col-lg-12">
                                            <?php echo form_checkbox('edit-chk_compileMap','',FALSE,'id="edit-chk_compileMap" onclick="edit_mychkmapcompile();"').form_label('Compilation of Maps','','for="edit-chk_compileMap"') ?>
                                        </div>
                                        <div class="col-xs-12 col-lg-12 tooltip" id="edit-compileMapdiv" style="display: none">
                                            <fieldset>
                                            <div class="col-xs-12 col-lg-12">
                                                <label>Upload copy of compilation of maps<i>(*.pdf,*.csv, maximum size of 50MB)</i></label>
                                                <input type='file' name="edit-legis_compileMap" id="edit-legis_compileMap" onchange="readURLlegismapcompilationEdit(this);"/>
                                                <input id="edit-legis_compileMap_old" name="edit-legis_compileMap_old" type="hidden" />
                                                <input id="edit-legis_compileMap_span" name="edit-legis_compileMap_span" type="hidden" />
                                                <div id="edit-loadinglegis_compileMap"></div>
                                            </div>
                                            <div class="col-xs-12 col-lg-12">
                                            <br>
                                                <label>Upload shapefile<i>(*.zip,*.rar, maximum size of 50MB)</i></label>
                                                <input type='file' name="edit-legis_compileMapshp" id="edit-legis_compileMapshp" onchange="readURLlegismapcompilationshpEdit(this);"/>
                                                <input id="edit-legis_compileMapshp_old" name="edit-legis_compileMapshp_old" type="hidden" />
                                                <input id="edit-legis_compileMapshp_span" name="edit-legis_compileMapshp_span" type="hidden" />
                                                <div id="edit-loadinglegis_compileMapshp"></div>
                                            </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-lg-12">
                                        <div class="col-xs-12 col-lg-12">
                                            <br><?php echo form_checkbox('edit-chk_pasasrpao','',FALSE,'id="edit-chk_pasasrpao" onclick="edit_mychkpasasrpao();"').form_label('Preparation of PASA and resource profile','','for="edit-chk_pasasrpao"') ?>
                                        </div>
                                        <div class="col-xs-12 col-lg-12 tooltip" id="edit-compilePASAdiv" style="display: none">
                                            <fieldset>
                                            <div class="col-xs-12 col-lg-12">
                                                <label>Upload copy of PASA and resource profile<i>(*.pdf,*.csv, maximum size of 50MB)</i></label>
                                                <input type='file' name="edit-legis_pasasrpao" id="edit-legis_pasasrpao" onchange="readURLlegispasasrpaoEdit(this);"/>
                                                <input id="edit-legis_pasasrpao_old" name="edit-legis_pasasrpao_old" type="hidden" />
                                                <input id="edit-legis_pasasrpao_span" name="edit-legis_pasasrpao_span" type="hidden" />
                                                <div id="edit-loadinglegis_pasasrpao"></div>
                                            </div>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-lg-12">
                                        <div class="col-xs-12 col-lg-12">
                                            <br><?php echo form_checkbox('edit-chk_pubconsult','',FALSE,'id="edit-chk_pubconsult" onclick="edit_mychkpubconsult();"').form_label('Public Consultation','','for="edit-chk_pubconsult"') ?>
                                        </div>
                                        <div class="col-xs-12 col-lg-12 tooltip" id="edit-publicconsultdiv" style="display: none">
                                            <fieldset>
                                            <div class="col-xs-12 col-lg-12">
                                                <label>Upload certificate of proceedings <i>(*.pdf,*.csv, maximum size of 50MB)</i></label>
                                                <input type='file' name="edit-legis_certproceed" id="edit-legis_certproceed" onchange="readURLlegiscertproceedEdit(this);"/>
                                                <input id="edit-legis_certproceed_old" name="edit-legis_certproceed_old" type="hidden" />
                                                <input id="edit-legis_certproceed_span" name="edit-legis_certproceed_span" type="hidden" />
                                                <div id="edit-loadinglegis_certproceed"></div>
                                            </div>
                                            <div class="col-xs-12 col-lg-12"><br>
                                                <label>Upload certificate of consultation <i>(*.pdf,*.csv, maximum size of 50MB)</i></label>
                                                <input type='file' name="edit-legis_certconsult" id="edit-legis_certconsult" onchange="readURLlegiscertconsultEdit(this);"/>
                                                <input id="edit-legis_certconsult_old" name="edit-legis_certconsult_old" type="hidden" />
                                                <input id="edit-legis_certconsult_span" name="edit-legis_certconsult_span" type="hidden" />
                                                <div id="edit-loadinglegis_certconsult"></div>
                                            </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-lg-12">
                                        <div class="col-xs-12 col-lg-12">
                                            <br><?php echo form_checkbox('edit-chk_initplan','',FALSE,'id="edit-chk_initplan" onclick="edit_mychkpaplan();"').form_label('Preparation of Initial PA Plan','','for="edit-chk_initplan"') ?>
                                        </div>
                                        <div class="col-xs-12 col-lg-12 tooltip" id="edit-compilepaplandiv" style="display: none">
                                            <fieldset>
                                            <div class="col-xs-12 col-lg-12">
                                                <label>Upload copy of Initial PA Plan<i>(*.pdf,*.csv, maximum size of 50MB)</i></label>
                                                <input type='file' name="edit-legis_paplan" id="edit-legis_paplan" onchange="readURLlegispaplanEdit(this);"/>
                                                <input id="edit-legis_paplan_old" name="edit-legis_paplan_old" type="hidden" />
                                                <input id="edit-legis_paplan_span" name="edit-legis_paplan_span" type="hidden" />
                                                <div id="edit-loadinglegis_paplan"></div>
                                            </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-lg-12">
                                        <div class="col-xs-12 col-lg-12">
                                            <br><?php echo form_checkbox('edit-chk_regionalreview','',FALSE,'id="edit-chk_regionalreview" onclick="edit_mychkregrev();"').form_label('Regional review and recommendation','','for="edit-chk_regionalreview"') ?>
                                        </div>
                                        <div class="col-xs-12 col-lg-12 tooltip" id="edit-compileregionalreviewdiv" style="display: none">
                                            <fieldset>
                                            <div class="col-xs-12 col-lg-12">
                                                <label>Upload minutes of meeting<i>(*.pdf,*.csv, maximum size of 50MB)</i></label>
                                                <input type='file' name="edit-legis_regionalreview" id="edit-legis_regionalreview" onchange="readURLlegisregionalrevEdit(this);"/>
                                                <input id="edit-legis_regionalreview_old" name="edit-legis_regionalreview_old" type="hidden" />
                                                <input id="edit-legis_regionalreview_span" name="edit-legis_regionalreview_span" type="hidden" />
                                                <div id="edit-loadinglegis_regionalreview"></div>
                                            </div>
                                            <div class="col-xs-12 col-lg-12"><br>
                                                <label>Upload complete staff work<i>(*.pdf,*.csv, maximum size of 50MB)</i></label>
                                                <input type='file' name="edit-legis_regionalreviewstaffwork" id="edit-legis_regionalreviewstaffwork" onchange="readURLlegisregionalrevstaffworkEdit(this);"/>
                                                <input id="edit-legis_regionalreviewstaffwork_old" name="edit-legis_regionalreviewstaffwork_old" type="hidden" />
                                                <input id="edit-legis_regionalreviewstaffwork_span" name="edit-legis_regionalreviewstaffwork_span" type="hidden" />
                                                <div id="edit-loadinglegis_regionalreviewstaffwork"></div>
                                            </div>
                                            <div class="col-xs-12 col-lg-12"><br>
                                                <label>Upload endorsement<i>(*.pdf,*.csv, maximum size of 50MB)</i></label>
                                                <input type='file' name="edit-legis_regionalreviewendorse" id="edit-legis_regionalreviewendorse" onchange="readURLlegisregionalrevendorseEdit(this);"/>
                                                <input id="edit-legis_regionalreviewendorse_old" name="edit-legis_regionalreviewendorse_old" type="hidden" />
                                                <input id="edit-legis_regionalreviewendorse_span" name="edit-legis_regionalreviewendorse_span" type="hidden" />
                                                <div id="edit-loadinglegis_regionalreviewendorse"></div>
                                            </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-lg-12">
                                        <div class="col-xs-12 col-lg-12">
                                            <br><?php echo form_checkbox('edit-chk_nationalreview','',FALSE,'id="edit-chk_nationalreview" onclick="edit_mychknatrev();"').form_label('National review and recommendation','','for="edit-chk_nationalreview"') ?>
                                        </div>
                                        <div class="col-xs-12 col-lg-12 tooltip" id="edit-compilenationalreviewdiv" style="display: none">
                                            <fieldset>
                                            <div class="col-xs-12 col-lg-12">
                                                <label>Upload minutes of meeting<i>(*.pdf,*.csv, maximum size of 50MB)</i></label>
                                                <input type='file' name="edit-legis_nationalreview" id="edit-legis_nationalreview" onchange="readURLlegisnationalrevEdit(this);"/>
                                                <input id="edit-legis_nationalreview_old" name="edit-legis_nationalreview_old" type="hidden" />
                                                <input id="edit-legis_nationalreview_span" name="edit-legis_nationalreview_span" type="hidden" />
                                                <div id="edit-loadinglegis_nationalreview"></div>
                                            </div>
                                            <div class="col-xs-12 col-lg-12"><br>
                                                <label>Upload complete staff work<i>(*.pdf,*.csv, maximum size of 50MB)</i></label>
                                                <input type='file' name="edit-legis_nationalreviewstaffwork" id="edit-legis_nationalreviewstaffwork" onchange="readURLlegisnationalrevstaffworkEdit(this);"/>
                                                <input id="edit-legis_nationalreviewstaffwork_old" name="edit-legis_nationalreviewstaffwork_old" type="hidden" />
                                                <input id="edit-legis_nationalreviewstaffwork_span" name="edit-legis_nationalreviewstaffwork_span" type="hidden" />
                                                <div id="edit-loadinglegis_nationalreviewstaffwork"></div>
                                            </div>
                                            <div class="col-xs-12 col-lg-12"><br>
                                                <label>Upload endorsement<i>(*.pdf,*.csv, maximum size of 50MB)</i></label>
                                                <input type='file' name="edit-legis_nationalreviewendorse" id="edit-legis_nationalreviewendorse" onchange="readURLlegisnationalrevendorseEdit(this);"/>
                                                <input id="edit-legis_nationalreviewendorse_old" name="edit-legis_nationalreviewendorse_old" type="hidden" />
                                                <input id="edit-legis_nationalreviewendorse_span" name="edit-legis_nationalreviewendorse_span" type="hidden" />
                                                <div id="edit-loadinglegis_nationalreviewendorse"></div>
                                            </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-lg-12">
                                        <div class="col-xs-12 col-lg-12">
                                            <br><?php echo form_checkbox('edit-chk_presproc','',FALSE,'id="edit-chk_presproc" onclick="edit_mychkpresproc();"').form_label('Presidential Proclamation','','for="edit-chk_presproc"') ?>
                                        </div>
                                        <div class="col-xs-12 col-lg-12 tooltip" id="edit-presprocdiv" style="display: none">
                                            <fieldset>
                                            <div class="col-xs-12 col-lg-12">
                                                <label>Upload copy of draft Presidential Proclamation<i>(*.pdf,*.csv, maximum size of 50MB)</i></label>
                                                <input type='file' name="edit-legis_presproc" id="edit-legis_presproc" onchange="readURLlegispresprocEdit(this);"/>
                                                <input id="edit-legis_presproc_old" name="edit-legis_presproc_old" type="hidden" />
                                                <input id="edit-legis_presproc_span" name="edit-legis_presproc_span" type="hidden" />
                                                <div id="edit-loadinglegis_presproc"></div>
                                            </div>
                                            <div class="col-xs-12 col-lg-12"><br>
                                                <label>Upload Recommendation<i>(*.pdf,*.csv, maximum size of 50MB)</i></label>
                                                <input type='file' name="edit-legis_presprocrecom" id="edit-legis_presprocrecom" onchange="readURLlegispresprocrecomEdit(this);"/>
                                                <input id="edit-legis_presprocrecom_old" name="edit-legis_presprocrecom_old" type="hidden" />
                                                <input id="edit-legis_presprocrecom_span" name="edit-legis_presprocrecom_span" type="hidden" />
                                                <div id="edit-loadinglegis_presprocrecom"></div>
                                            </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-lg-12">
                                        <div class="col-xs-12 col-lg-12">
                                            <br><?php echo form_checkbox('edit-chk_congressenact','',FALSE,'id="edit-chk_congressenact" onclick="edit_mychkcongressenact();"').form_label('Congressional Enactment','','for="edit-chk_congressenact"') ?>
                                        </div>
                                        <div class="col-xs-12 col-lg-12 tooltip" id="edit-congressenactdiv" style="display: none">
                                            <fieldset>
                                            <div class="col-xs-12 col-lg-12">
                                                <label>Upload copy of Republic Act<i>(*.pdf,*.csv, maximum size of 50MB)</i></label>
                                                <input type='file' name="edit-legis_congressenact" id="edit-legis_congressenact" onchange="readURLlegiscongressenactEdit(this);"/>
                                                <input id="edit-legis_congressenact_old" name="edit-legis_congressenact_old" type="hidden" />
                                                <input id="edit-legis_congressenact_span" name="edit-legis_congressenact_span" type="hidden" />
                                                <div id="edit-loadinglegis_congressenact"></div>
                                            </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-xs-12 col-lg-12">
                                <fieldset>
                                    <legend>History of Establishment</legend>
                                    <div class="col-xs-12 col-lg-6 tooltip">
                                        <ul><li>
                                            <?php echo form_label('Status *','','for="edit-nipsub_id"').form_dropdown('edit-paclasssub',$classList,'',' id="edit-nipsub_id"') ?>
                                            <span class="tooltiptext">Select initial component/Additional PA</span>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-12 col-lg-6 tooltip" id="edit-icapadiv" style="display:none">
                                        <ul><li>
                                            <label>Category</label>
                                            <?php echo form_dropdown('edit-previouscat',$nipselect,'','id="edit-previouscat" ') ?>
                                            <span class="tooltiptext">History of Establishment, previous category.</span>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="col-xs-4 col-lg-4 tooltip">
                                            <ul><li>
                                                <?= form_label('Legal Basis *','','for="edit-history-legis_id"').form_dropdown('edit-history-legis_id',$procList,'',' id="edit-history-legis_id"') ?>
                                                <span class="tooltiptext">Select Legal Basis</span>
                                            </li></ul>
                                        </div>
                                        <div class="col-xs-4 col-lg-4 tooltip">
                                            <ul><li>
                                               <?= form_label('Number *','','for="edit-history-legisno"').form_input('edit-history-legisno','','placeholder=" " id="edit-history-legisno"') ?>
                                               <span class="tooltiptext">e.g. Proclamation No. 2-0001, EO No. 2010-03 </span>
                                            </li></ul>
                                        </div>
                                        <div class="col-xs-4 col-lg-4 tooltip">
                                            <ul><li>
                                               <?= form_label('Area(Has)*','','for="edit-history-legis_area"').form_input('edit-history-legis_area','','placeholder="" id="edit-history-legis_area" class="number-separator"') ?>
                                               <span class="tooltiptext">Total area (has)</span>
                                            </li></ul>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <fieldset>
                                            <legend style="background-color: transparent;color: #000; font-weight: 700;font-size: 14px;">Date Issued</legend>
                                            <div class="col-xs-4 col-lg-4 tooltip">
                                                <ul><li>
                                                    <?php echo form_dropdown('edit-history-date_month',$monthList,'',' id="edit-history-month"') ?>
                                                </li></ul>
                                            </div>
                                            <div class="col-xs-4 col-lg-4 tooltip">
                                                <ul><li>
                                                    <?php echo form_dropdown('edit-history-date_day',$dayList,'',' id="edit-history-day"') ?>
                                                </li></ul>
                                            </div>
                                            <div class="col-xs-4 col-lg-4 tooltip">
                                                <ul><li>
                                                    <?php echo form_dropdown('edit-history-date_year',$yearListed,'',' id="edit-history-year"') ?>
                                                </li></ul>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-xs-12 col-lg-12">
                                        <div class="col-xs-1 col-lg-1">
                                            <a type="text" class="btn btn-warning" id="addhistoryinitailcompEdit">Add previous category</a>
                                        </div>
                                        <div class="col-xs-12 col-lg-12">
                                            <hr>
                                            <div id="historyinitialcomp"></div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                    <div class="col-xs-12 ">
                        <div class="modal-footer">
                            <!-- <input class="btn btn-info" type="submit" name="submit" value="Update" id="Updatepenalty" /> -->
                            <!-- <input class="btn btn-info" type="submit" name="submit" value="Update" id="UpdateLegal"/> -->
                            <button class="btn btn-info" type="button" onclick="updatelegalstat();" />Update</button>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>
<form method="post" action="#" id="recognitionForm" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-recog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit International Recognition</h4>
                </div>
                <div class="modal-body" >
                    <div class="col-xs-12 " style="margin-top:10px">
                        <div class="col-xs-6 col-lg-6 ">
                            <input type="hidden" id="recog-id" name="recog-id" value="" />
                            <input type="hidden" id="recog-gencode" name="recog-gencode" value="" />
                            <input type="hidden" id="recog-gencode2" name="recog-gencode2" value="" />
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="col-xs-12 col-lg-12">
                            <ul><li>
                                <?php echo form_label('Recognition','','for="edit-recognition"').form_dropdown('edit-recognition',$recognitionList,'',' id="edit-recognition"') ?>
                            </li></ul>
                        </div>
                        <div class="col-xs-12 col-lg-12" id="chck-recogsubEdit" style="display: none">
                            <!-- <ul><li> -->
                                <fieldset>
                                    <legend style="display: block; float: left; margin-top: -19px; background: #fafafa; padding: 2px 5px 2px 5px; color: #444; font-size: 14px; overflow: hidden; border-radius: 10px 10px 10px 10px;font-weight: 700;">Criteria</legend>
                                <?php echo form_label('').form_dropdown('edit-int_crit','','',' id="edit-int_crit" class="select2 narrow wrap" style="width: auto;"') ?>
                                </fieldset>
                            <!-- </li></ul> -->
                        </div>
                        <div id="listcritdivedit" style="display: none;">
                            <div class="col-xs-12 col-lg-12 ">
                                <a type="text" class="btn btn-warning" id="add_critlistedits">Add criteria to data</a>
                            </div>
                            <div class="col-xs-12 col-lg-12">
                                <div id="listofcriteriadiv"></div>
                            </div>
                        </div>
                        <div class="col-xs-12" id="chck-insEdit" style="display: none">
                            <div class="col-xs-12 col-lg-12">
                                <ul><li>
                                    <?php echo form_label('Specify others','','for="edit-inscribe"').form_input('edit-inscribe','','id="edit-inscribe" placeholder=" "'); ?>

                                </li></ul>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-12">
                            <div class="col-xs-6 col-lg-6 tooltip" id="edit-sitenodis" style="display:none">
                                <ul><li>
                                    <?php echo form_label('Site number/code','','for="edit-sitenumber"').form_input('edit-sitenumber','','id="edit-sitenumber" placeholder=" "'); ?>
                                    <span class="tooltiptext">International recognition site number</span>
                                </li></ul>
                            </div>
                            <div class="col-xs-6 col-lg-6 tooltip" id="edit-recogareahadiv" style="display:none">
                                <ul><li>
                                   <?= form_label('Area(has)','','for="edit-recog_area_has"').form_input('edit-recog_area_has','','placeholder="" id="edit-recog_area_has" class="number-separator"') ?>
                                   <span class="tooltiptext">Total area (has)</span>
                                </li></ul>
                            </div>
                            <div class="col-xs-6 col-lg-6 tooltip" id="edit-recogareasqdiv" style="display:none">
                                <ul><li>
                                   <?= form_label('Area(sqr.km.)','','for="edit-recog_area_sqr"').form_input('edit-recog_area_sqr','','placeholder="" id="edit-recog_area_sqr" class="number-separator"') ?>
                                   <span class="tooltiptext">Total area (sq.km.)</span>
                                </li></ul>
                            </div>  
                        </div>                                             
                        <div class="col-xs-4 col-lg-4 ">
                            <ul><li>
                                <?php echo form_label('Date Declared','','for="edit-date_declared_month" id="edit-dateincribedid"').form_dropdown('edit-date_declared_month',$monthListed,'',' id="edit-date_declared_month"') ?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-4">
                            <ul><li>
                                <?php echo form_label('&nbsp;','','for="edit-date_declared_day"').form_dropdown('edit-date_declared_day',$dayList,'',' id="edit-date_declared_day"') ?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-4 ">
                            <ul><li>
                                <?php echo form_label('&nbsp;','','for="edit-date_declared_year"').form_dropdown('edit-date_declared_year',$yearListed,'',' id="edit-date_declared_year"') ?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-12 tooltip">
                        <fieldset>
                        <div class="col-xs-12 col-lg-12">
                            <label>Uploading of shapefiles<i>(*.zip,*.rar, maximum size of 50MB)</i></label>
                            <input type='file' name="edit-recog_shapefile" id="edit-recog_shapefile" onchange="readURLrecognitionshpfileEdit(this);"/>
                            <input id="edit-recog_shapefile_span" name="edit-recog_shapefile_span" type="hidden" />
                            <input id="recog_shapefile_old" name="recog_shapefile_old" type="hidden" />
                            <div id="edit-loadingrecog_shapefile"></div>
                        </div>
                        </fieldset>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="modal-footer">
                            <button class="btn btn-info" type="button" onclick="Updaterecog();" />Update
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>
