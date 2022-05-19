<div id="ecotour" class="tab-pane">
                <div class="form-style-6">
                    <h2>Ecotourism</h2>
                </div>
                <div class="tab">
                    <a class="tablinktourism active" id="loadattractionactivitys" onclick="tabtourism(event, 'tourism_attraction')">Attractions/Activities</a>
                    <a class="tablinktourism" id="loadvisitor" onclick="tabtourism(event, 'visitorlogs')">Visitors Logbook</a>
                    <a class="tablinktourism" id="loadfacility" onclick="tabtourism(event, 'tourism_facility')">Facilities</a>
                    <a class="tablinktourism" id="loadproducts" onclick="tabtourism(event, 'tourism_product')">Products</a>
                    <a class="tablinktourism" id="loadenterprise" onclick="tabtourism(event, 'tourism_enterprise')">Livelihood/Enterprises</a>
                </div>
                <div id="visitorlogs" class="tabcontenttourism" style="display: none;">
                <?php if (preg_match_all('/\b(\w)/',strtoupper($pamain->pa_name),$m)): 
                        $v = implode('',$m[1]);
                        echo form_input('regions_ids',$read->region_abbrevation,'id="regions_ids" class="hide"').form_input('pavisitorscode','','id="pavisitorscode" class="hide"').form_input('paabbrev',$v,'id="paabbrev" class="hidden"').form_input('padatenow',date('Ymd'),'id="padatenow" class="hidden"').form_input('pavisitorscodegenerated','','id="pavisitorscodegenerated" class="hidden"');
                    endif ?>
                <fieldset>
                    <legend>VISITORS LOGBOOK</legend>
                    <fieldset>
                        <legend>Period Covered</legend>                                   
                        <div class="col-xs-4 col-lg-4 tooltip">
                            <ul><li>
                            <?= form_dropdown('month_monitoring_ecotour',$monthList,'','class="border-input " id="monitor_months_ecotour"'); ?>
                            <span class="tooltiptext">Select date period covered</span>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-4 tooltip">
                            <ul><li>
                            <?= form_dropdown('day_monitoring_ecotour',$dayList,'','class="border-input " id="monitor_day_ecotour"'); ?>
                            <span class="tooltiptext">Select date period covered</span>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-4 tooltip">
                            <ul><li>
                            <?= form_dropdown('year_monitoring_ecotour',$yearListed,'','class="border-input " id="monitor_years_ecotour"'); ?>
                            <span class="tooltiptext">Select date period covered</span>
                            </li></ul>
                        </div>
                    </fieldset>
                    <div class="col-xs-12 col-lg-12">
                        <div class="col-xs-12 col-lg-4 tooltip">
                            <ul><li>
                                <?php echo form_label('Visitors category').form_dropdown('visit_cat',$visitcat,'','id="visit_cat"') ?>
                                <span class="tooltiptext">Select visitors category</span>
                            </li></ul>
                        </div>
                        <div class="col-xs-12 col-lg-4 tooltip">
                            <ul><li>
                                <?php echo form_label('Visitors Name').form_input('visitorsname','','id="visitorsname"'); ?>
                                <span class="tooltiptext">Input fullname of a visitors</span>
                            </li></ul>
                        </div>
                         <div class="col-xs-12 col-lg-4 tooltip">
                            <ul><li>
                                <?php echo form_label('Sex').form_dropdown('visitorssex',$sexList,'','id="visitorssex"'); ?>
                                <span class="tooltiptext">Select visitors sex</span>
                            </li></ul>
                        </div>
                        <div class="col-xs-12 col-lg-4 tooltip">
                            <ul><li>
                                <?php echo form_label('Foreign/Local').form_dropdown('visitorsforloc',$visitorsforloc,'','id="visitorsforloc"'); ?>
                                <span class="tooltiptext">Select if local or foreign</span>
                            </li></ul>
                        </div>
                        <div class="col-xs-12 col-lg-4 tooltip" id="visitornationalsdiv">
                            <ul><li>
                                <?php echo form_label('Nationality').form_input('visitorsnationality','','id="visitorsnationality"'); ?>
                                <span class="tooltiptext">Specify nationality</span>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-12 hidden" id="epic1">
                        <!-- <fieldset> -->
                            <div class="col-xs-12 col-lg-12">
                                <div class="col-lg-3 col-sm-12 col-md-12 col-xs-12">
                                    <ul><li>
                                    <?php echo form_label('Children Below 7 years old').form_dropdown('chkv1',$visitoryesno,'','id="chkv1"'); ?>
                                    </li></ul>
                                </div>
                                <div class="col-lg-3 col-sm-12 col-md-12 col-xs-12">
                                    <ul><li>
                                    <?php echo form_label('Student').form_dropdown('visitstud',$visitoryesno,'','id="visitstud"'); ?>
                                    </li></ul>
                                </div>
                                <div class="col-lg-3 col-sm-12 col-md-12 col-xs-12" id="divseniorvisit">
                                    <ul><li>
                                    <?php echo form_label('Senior').form_dropdown('visitsenior',$visitoryesno,'','id="visitsenior"'); ?>
                                    </li></ul>
                                </div>
                                <div class="col-lg-3 col-sm-12 col-md-12 col-xs-12">
                                    <ul><li>
                                    <?php echo form_label('Person with disability').form_dropdown('visitpwd',$visitoryesno,'','id="visitpwd"'); ?>
                                    </li></ul>
                                </div>
                            </div>
                        <!-- </fieldset> -->
                    </div>
                    <div class="col-xs-12 col-lg-12 tooltip">
                        <ul><li>
                            <?php echo form_label('Address').form_textarea('visitorsaddress','','id="visitorsaddress"'); ?>
                            <span class="tooltiptext">Input complete address</span>
                        </li></ul>
                    </div>
                    <div class="col-xs-12 col-md-12 col-lg-12 tooltip">
                        <ul><li>
                            <?php echo form_label('Purpose of visit').form_textarea('visitorpurpose','','id="visitorpurpose"'); ?>
                            <span class="tooltiptext">Purpose of visit whether for recreation, facilities use, commercial photography, seminars, etc.</span>
                        </li></ul>
                    </div>
                    <fieldset class="hidden">
                        <legend>PAYMENT</legend>
                        <div class="col-lg-12 col-xs-12">
                            <div class="col-xs-6 tooltip">
                                <ul><li>
                                    <?php echo form_label('Types of Fee Paid').form_dropdown('visitorsfeetype',$feetype,'','id="visitorsfeetype"'); ?>
                                    <span class="tooltiptext">Select type of fee paid</span>
                                </li></ul>
                            </div>
                            <div id="hidecontridiv" style="display: none">
                                <div class="col-xs-3 tooltip">
                                    <ul><li>
                                        <?php echo form_label('Trust fund').form_dropdown('visitorstrustfund',$vtrustfund,'','id="visitorstrustfund"'); ?>
                                        <span class="tooltiptext">Select type of trust fund</span>
                                    </li></ul>
                                </div>
                                <div class="col-xs-3 tooltip">
                                    <ul><li>
                                        <?php echo form_label('Mode of payment').form_dropdown('visitorsmodeofpayment',$vmodepayment,'','id="visitorsmodeofpayment"'); ?>
                                        <span class="tooltiptext">Select mode of payment</span>
                                    </li></ul>
                                </div>
                            </div>
                            <div class="col-xs-6 tooltip">
                                <ul><li>
                                    <?php echo form_label('Amount').form_input('visitorsfeeamount','','id="visitorsfeeamount" class="number-separator"'); ?>
                                    <span class="tooltiptext">Input amount (Php)</span>
                                </li></ul>
                            </div>
                            <div class="col-lg-12 col-xs-12 tooltip" id="otherfeeid" style="display: none">
                                <ul><li>
                                    <?php echo form_label('Specify other fee').form_input('specify_otherfee','','id="specify_otherfee"') ?>
                                    <span class="tooltiptext">Specify other fee paid</span>
                                </li></ul>
                            </div>
                            <div class="col-lg-12 col-xs-12 tooltip" id="penaltiesdiv" style="display: none">
                                <ul><li>
                                    <?php echo form_label('Specify fines and penalties').form_input('finespenalties','','id="finespenalties"') ?>
                                    <span class="tooltiptext">Specify fines and penalties</span>
                                </li></ul>
                            </div>                     
                        </div>
                        <div class="col-xs-12 col-lg-12">
                            <a type="text" class="btn btn-success" id="addvisitorspayments">Add to list</a>
                        </div>
                        <div class="col-xs-12 col-lg-4">
                            <br><table id="tableVisitorspayment" class="content-table">
                                <tbody style="text-align: left;" id="tbodyvisitorspayment"></tbody>
                            </table>
                        </div>
                    </fieldset>         
                   
                     <div class="col-xs-12 col-lg-12">
                        <a type="text" class="btn btn-primary" id="adddatavisitorslog">Add to table</a>
                    </div>
                    <div class="col-xs-12 col-lg-12" style="margin-top: 30px;">
                        <fieldset>
                            <legend>Import backup</legend>
                            <div class="col-xs-12 col-lg-12">
                                <div class="col-xs-4 col-lg-4 col-md-4" id="visitor_import_show2">
                                    <form action="<?= base_url()?>pasu/pamain/importVisitors3/" method="post" enctype="multipart/form-data">
                                        <input type="file" name="file" />
                                        <input type="text" name="gencode2_1" class="hidden" value="<?php echo $pamain->generatedcode; ?>" id="codegen2_1">
                                        <!-- <button class="btn btn-primary" name="importSubmit">IMPORT</button> -->
                                        <input type="submit" class="btn btn-primary" name="importSubmit" value="IMPORT">
                                    </form>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-xs-12 col-lg-12">
                        <hr>
                        <div class="col-xs-4 col-lg-4">
                            <ul><li>
                            <?= form_dropdown('selectvisitorsLogsMonth',$monthList,'','class="border-input " id="selectvisitorsLogsMonth"'); ?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-4 ">
                            <ul><li>
                                <?= form_dropdown('selectvisitorsLogsYear',$yearListed,'','class="border-input " id="selectvisitorsLogsYear"'); ?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-4">
                            <a type="text" class="btn btn-primary" id="searchdatevisitorLogs">Search</a>
                        </div>                        
                    </div>
                    <hr>                    
                    <div class="col-md-12 col-xs-12 col-lg-12" style="overflow-x:auto;">
                        <table id="tableVisitorsLogs" class="content-table">
                            <thead>
                                <tr>
                                    <th colspan="10" style="text-align: center; font-size: 24px">Visitors Logbooks</th>
                                </tr>
                                <tr>
                                    <th>DATE</th>
                                    <th>NAME</th>
                                    <th>SEX</th>
                                    <th>NATIONALITY</th>
                                    <th>CATEGORY</th>
                                    <th>ADDRESS<br>(City/Municipality and  Province)</th>
                                    <th class="hidden">TYPES OF FEE AND AMOUNT</th>
                                    <th>PURPOSED</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody id="tbodyvisitorslogs"></tbody>
                        </table> 
                    </div>  
                    <table id="tableVisitorsLogs_sample" class="content-table">
                        <tbody id="tbodyvisitorslogs_sample"></tbody>
                    </table>
                </fieldset>
            </div>
                <div id="tourism_attraction" class="tabcontenttourism" style="display:block">
                    <input type="hidden" name="tourism-gencode" id="tourism-gencode">
                    <fieldset>
                        <div class="col-xs-12 col-lg-6 ">   
                            <div id="fetch_images_attraction"></div>
                        </div>
                        <div class="col-xs-12 col-lg-12">  
                            <fieldset>                            
                                <label>Upload point location map image <i>(*.png, *.jpeg, *.jpg format, maximum size of 50MB)</i></label>
                                <input type='file' name="img_attractionmap" id="img_attractionmap"/><br>
                                <input type="hidden" name="old_picture" value="nophoto.jpg"> 
                                <input type="hidden" id="img_attractionmapspan" name="img_attractionmapspan" />
                            </fieldset>     
                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="col-xs-12"> 
                            <div class="col-xs-12 col-lg-6">
                                <label>Upload Shapefile <i>(*.rar, *.zip format, maximum size of 200MB)</i></label>
                                <input type='file' name="attractions_shpfile" id="attractions_shpfile" />
                                <input type="hidden" name="attractions_shpfile_text"> 
                                <div id="attractions_shpfile_div"></div>
                            </div>
                        </div> 
                    </fieldset>
                    <fieldset>
                    <div class="col-xs-12 col-lg-12">
                        <div class="col-xs-12 col-lg-6 col-sm-12 col-md-4">
                            <div id="fetch_images_attraction_indi"></div>
                        </div>
                        <div class="col-xs-12 col-lg-12 col-sm-12">
                            <fieldset>
                            <label>Upload individual Geotagged photos with UTM or DMS <i>(*.png, *.jpeg, *.jpg format, maximum size of 50MB)</i></label>
                            <input type='file' name="pic_attract" id="pic_attract" /><br>
                            <input type="hidden" name="pic_attract_txt" id="pic_attract_txt">
                            <span id="img_attractspan" class="img_attractspan"></span>
                            </fieldset>
                        </div>
                        </div>
                    <div class="col-xs-12 col-lg-12 tooltip">
                        <ul><li>
                        <?= form_label('Source of photo','','for="source_photo"').form_input('source_photo','',' id="source_photo"'); ?>
                        <span class="tooltiptext">Input source of photo</span>
                        </li></ul>
                    </div>
                    <div class="col-xs-12 col-lg-12">                    
                        <div class="col-xs-12 col-lg-12 col-sm-12 col-md-12">
                            <div class="col-xs-12 col-lg-12 tooltip">
                                <ul><li>
                                <?= form_label('Ecotourism Attraction','','for="attraction"').form_input('attraction','','placeholder="eg. Nakayang View Deck" id="attraction"'); ?>
                                <span class="tooltiptext">A nature-based tourism destination</span>
                                </li></ul>
                            </div>
                            <div class="col-xs-12 col-lg-12 hidden">
                                <ul><li>
                                <?= form_label('Ecotourism Activities','','for="eco_activities"').form_dropdown('eco_activities',$ecotourism_activity,'',' id="eco_activities"'); ?>                                
                                </li></ul>
                            </div>
                            <fieldset>
                                <legend>Ecotourism Activity and Upload multiple images <i>(*.png, *.jpeg, *.jpg format, maximum size of 50MB)</i></legend>
                                <div class="col-lg-12 col-md-12 col-xs-12 tooltip">
                                    <div class="col-lg-4 col-md-4 col-xs-6">
                                        <div class="col-xs-12 col-lg-12 col-md-12">
                                            <?php echo form_checkbox('chk_activity1','','','id="chk_activity1" onclick="ecochk_1();"').form_label('Hiking/Trekking/Mountaineering','','for="chk_activity1"') ?>
                                        </div>
                                        <div id="activity1" style="display:none">
                                            <div class="col-xs-12 col-lg-6 col-md-12">
                                                <ul><li>
                                                    <label></label>
                                                    <input type="file" name="attraction_img_file_1" id="attraction_img_file_1" multiple />
                                                </li></ul>
                                                <!-- <div id="upload_img_activity1"></div> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-xs-6">
                                        <div class="col-xs-12 col-lg-12 col-md-12">
                                            <?php echo form_checkbox('chk_activity2','','','id="chk_activity2" onclick="ecochk_1();"').form_label('Caving/Spelunking','','for="chk_activity2"') ?>
                                        </div>
                                        <div id="activity2" style="display:none">
                                            <div class="col-xs-12 col-lg-6 col-md-12">
                                                <ul><li>
                                                    <label></label>
                                                    <input type="file" name="attraction_img_file_2" id="attraction_img_file_2" multiple />
                                                </li></ul>
                                                <!-- <div id="upload_img_activity2"></div> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-xs-6">
                                        <div class="col-xs-12 col-lg-12 col-md-12">
                                            <?php echo form_checkbox('chk_activity3','','','id="chk_activity3" onclick="ecochk_1();"').form_label('Scuba diving','','for="chk_activity3"') ?>
                                        </div>
                                        <div id="activity3" style="display:none">
                                            <div class="col-xs-12 col-lg-6 col-md-12">
                                                <ul><li>
                                                    <label></label>
                                                    <input type="file" name="attraction_img_file_3" id="attraction_img_file_3" multiple />
                                                </li></ul>
                                                <!-- <div id="upload_img_activity2"></div> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-xs-6">
                                        <div class="col-xs-12 col-lg-12 col-md-12">
                                            <?php echo form_checkbox('chk_activity4','','','id="chk_activity4" onclick="ecochk_1();"').form_label('Snorkeling','','for="chk_activity4"') ?>
                                        </div>
                                        <div id="activity4" style="display:none">
                                            <div class="col-xs-12 col-lg-6 col-md-12">
                                                <ul><li>
                                                    <label></label>
                                                    <input type="file" name="attraction_img_file_4" id="attraction_img_file_4" multiple />
                                                </li></ul>
                                                <!-- <div id="upload_img_activity2"></div> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-xs-6">
                                        <div class="col-xs-12 col-lg-12 col-md-12">
                                            <?php echo form_checkbox('chk_activity5','','','id="chk_activity5" onclick="ecochk_1();"').form_label('Swimming','','for="chk_activity5"') ?>
                                        </div>
                                        <div id="activity5" style="display:none">
                                            <div class="col-xs-12 col-lg-6 col-md-12">
                                                <ul><li>
                                                    <label></label>
                                                    <input type="file" name="attraction_img_file_5" id="attraction_img_file_5" multiple />
                                                </li></ul>
                                                <!-- <div id="upload_img_activity2"></div> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-xs-6">
                                        <div class="col-xs-12 col-lg-12 col-md-12">
                                            <?php echo form_checkbox('chk_activity6','','','id="chk_activity6" onclick="ecochk_1();"').form_label('Kayaking','','for="chk_activity6"') ?>
                                        </div>
                                        <div id="activity6" style="display:none">
                                            <div class="col-xs-12 col-lg-6 col-md-12">
                                                <ul><li>
                                                    <label></label>
                                                    <input type="file" name="attraction_img_file_6" id="attraction_img_file_6" multiple />
                                                </li></ul>
                                                <!-- <div id="upload_img_activity2"></div> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-xs-6">
                                        <div class="col-xs-12 col-lg-12 col-md-12">
                                            <?php echo form_checkbox('chk_activity7','','','id="chk_activity7" onclick="ecochk_1();"').form_label('Surfing','','for="chk_activity7"') ?>
                                        </div>
                                        <div id="activity7" style="display:none">
                                            <div class="col-xs-12 col-lg-6 col-md-12">
                                                <ul><li>
                                                    <label></label>
                                                    <input type="file" name="attraction_img_file_7" id="attraction_img_file_7" multiple />
                                                </li></ul>
                                                <!-- <div id="upload_img_activity2"></div> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-xs-6">
                                        <div class="col-xs-12 col-lg-12 col-md-12">
                                            <?php echo form_checkbox('chk_activity8','','','id="chk_activity8" onclick="ecochk_1();"').form_label('Wildlife watching','','for="chk_activity8"') ?>
                                        </div>
                                        <div id="activity8" style="display:none">
                                            <div class="col-xs-12 col-lg-6 col-md-12">
                                                <ul><li>
                                                    <label></label>
                                                    <input type="file" name="attraction_img_file_8" id="attraction_img_file_8" multiple />
                                                </li></ul>
                                                <!-- <div id="upload_img_activity2"></div> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-xs-6">
                                        <div class="col-xs-12 col-lg-12 col-md-12">
                                            <?php echo form_checkbox('chk_activity9','','','id="chk_activity9" onclick="ecochk_1();"').form_label('Bird watching','','for="chk_activity9"') ?>
                                        </div>
                                        <div id="activity9" style="display:none">
                                            <div class="col-xs-12 col-lg-6 col-md-12">
                                                <ul><li>
                                                    <label></label>
                                                    <input type="file" name="attraction_img_file_9" id="attraction_img_file_9" multiple />
                                                </li></ul>
                                                <!-- <div id="upload_img_activity2"></div> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-xs-6">
                                        <div class="col-xs-12 col-lg-12 col-md-12">
                                            <?php echo form_checkbox('chk_activity10','','','id="chk_activity10" onclick="ecochk_1();"').form_label('Village tour','','for="chk_activity10"') ?>
                                        </div>
                                        <div id="activity10" style="display:none">
                                            <div class="col-xs-12 col-lg-6 col-md-12">
                                                <ul><li>
                                                    <label></label>
                                                    <input type="file" name="attraction_img_file_10" id="attraction_img_file_10" multiple />
                                                </li></ul>
                                                <!-- <div id="upload_img_activity2"></div> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-xs-6">
                                        <div class="col-xs-12 col-lg-12 col-md-12">
                                            <?php echo form_checkbox('chk_activity11','','','id="chk_activity11" onclick="ecochk_1();"').form_label('Mangrove tours','','for="chk_activity11"') ?>
                                        </div>
                                        <div id="activity11" style="display:none">
                                            <div class="col-xs-12 col-lg-6 col-md-12">
                                                <ul><li>
                                                    <label></label>
                                                    <input type="file" name="attraction_img_file_11" id="attraction_img_file_11" multiple />
                                                </li></ul>
                                                <!-- <div id="upload_img_activity2"></div> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-xs-6">
                                        <div class="col-xs-12 col-lg-12 col-md-12">
                                            <?php echo form_checkbox('chk_activity12','','','id="chk_activity12" onclick="ecochk_1();"').form_label('Science Museum tours','','for="chk_activity12"') ?>
                                        </div>
                                        <div id="activity12" style="display:none">
                                            <div class="col-xs-12 col-lg-6 col-md-12">
                                                <ul><li>
                                                    <label></label>
                                                    <input type="file" name="attraction_img_file_12" id="attraction_img_file_12" multiple />
                                                </li></ul>
                                                <!-- <div id="upload_img_activity2"></div> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-xs-6">
                                        <div class="col-xs-12 col-lg-12 col-md-12">
                                            <?php echo form_checkbox('chk_activity13','','','id="chk_activity13" onclick="ecochk_1();"').form_label('Biking','','for="chk_activity13"') ?>
                                        </div>
                                        <div id="activity13" style="display:none">
                                            <div class="col-xs-12 col-lg-6 col-md-12">
                                                <ul><li>
                                                    <label></label>
                                                    <input type="file" name="attraction_img_file_13" id="attraction_img_file_13" multiple />
                                                </li></ul>
                                                <!-- <div id="upload_img_activity2"></div> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-xs-6">
                                        <div class="col-xs-12 col-lg-12 col-md-12">
                                            <?php echo form_checkbox('chk_activity14','','','id="chk_activity14" onclick="ecochk_1();"').form_label('Nature photography','','for="chk_activity14"') ?>
                                        </div>
                                        <div id="activity14" style="display:none">
                                            <div class="col-xs-12 col-lg-6 col-md-12">
                                                <ul><li>
                                                    <label></label>
                                                    <input type="file" name="attraction_img_file_14" id="attraction_img_file_14" multiple />
                                                </li></ul>
                                                <!-- <div id="upload_img_activity2"></div> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-xs-6">
                                        <div class="col-xs-12 col-lg-12 col-md-12">
                                            <?php echo form_checkbox('chk_activity15','','','id="chk_activity15" onchange="mychkEco();" onclick="ecochk_1();"').form_label('Others','','for="chk_activity15" ') ?>
                                        </div>
                                        <div id="activity15" style="display:none">
                                            <div class="col-xs-12 col-lg-6 col-md-12">
                                                <ul><li>
                                                    <label></label>
                                                    <input type="file" name="attraction_img_file_15" id="attraction_img_file_15" multiple />
                                                </li></ul>
                                                <!-- <div id="upload_img_activity2"></div> -->
                                            </div>
                                        </div>
                                    </div>
                                    <span class="tooltiptext">Ecotourim is a form of sustainable tourism within a natural and cultural heritage area where community participation, protection and management of natural resources, culture and indigenous knowledge and practices, environmental education and ethics, as well as economic benefits are fostered and pursued for the enrichment of host communities and satisfaction of visitors</span>
                                </div>                   
                                <div class="col-xs-12 col-lg-12 tooltip" id="otherecoactivitydiv" style="display: none">
                                    <ul><li>
                                    <?= form_label('Specify Other Activities','','for="otherecoactivity"').form_input('otherecoactivity','',' id="otherecoactivity"'); ?>        
                                    <span class="tooltiptext">Specify the other name of activities in the area</span>                        
                                    </li></ul>
                                </div>
                            </fieldset>
                            <div class="col-xs-12 col-lg-12 tooltip">
                                <ul><li>
                                <?= form_label('Brief description','','for="description2"').form_textarea('description2','','placeholder="" id="description2"');?>
                                <span class="tooltiptext">Describe what ecotourism destinations/attractions and activities offered by the PAs</span>
                                </li></ul>
                            </div>
                            <div class=" col-xs-12">                        
                                <a type="text" id="addimageattract" class="btn btn-primary">Add to table</a>
                            </div>
                        </div>
                    </div>                    
                    <div class="col-xs-12 ">                                
                        <div class="col-xs-12 col-lg-12 ">
                            <div class="table-responsive large-tables"><br>
                                <table id="tableAttraction" class="content-table">
                                    <thead>
                                        <th style="text-align: center; font-size: 24px">Attractions/Activities</th>
                                    </thead>
                                    <tbody id="tbodyimageattraction"></tbody>
                                </table>
                            </div>  
                        </div>
                    </div>
                    </fieldset>
                </div>
                <div id="tourism_facility" class="tabcontenttourism">
                    <fieldset>
                        <div class="col-xs-12 col-lg-12 col-sm-12">   
                            <div id="fetch_images_facility"></div>
                        </div>  
                        <div class="col-xs-12 col-lg-12 col-sm-12">   
                            <fieldset>
                                <label>Upload point location map image <i>(*.png, *.jpeg, *.jpg format, maximum size of 50MB)</i></label>
                                <input type='file' name="img_facilitymap" id="img_facilitymap"/>
                                <input type="hidden" name="old_picture" value="nophoto.jpg"> 
                            </fieldset>    
                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="col-xs-12"> 
                            <div class="col-xs-12 col-lg-6">
                                <fieldset>
                                    <label>Upload Shapefile <i>(*.rar, *.zip format, maximum size of 200MB)</i></label>
                                    <input type='file' name="facility_shpfile" id="facility_shpfile" />
                                    <input type="hidden" name="facility_shpfile_text"> 
                                    <div id="facility_shpfile_div"></div>
                                </fieldset>    
                            </div>
                        </div> 
                    </fieldset>
                    <fieldset>
                        <div class="col-xs-12 col-lg-12">
                            <div id="fetch_images_facility_indi"></div>
                        </div>
                        <div class="col-xs-12 col-lg-12">
                            <div class="col-xs-12 col-lg-12 col-sm-12">
                                <fieldset>
                                    <label>Upload individual Geotagged photos facility with UTM or DMS  <i>(*.png, *.jpeg, *.jpg format, maximum size of 50MB)</i></label>
                                    <input type='file' name="pic_facilities" id="pic_facilities" />
                                    <input type="hidden" name="pic_facilities_txt" id="pic_facilities_txt"> 
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-12">   
                            <div class="col-xs-12 col-lg-12 col-sm-12">
                                <div class="col-xs-12 col-lg-6 tooltip">  
                                    <ul><li>
                                        <?=  form_label('Ecotourism Facility','','for="facilities"').form_dropdown('facilities',$facilityList,'','placeholder="eg. Picnic Shed, Tea House, Fishing Village" id="facilities"');?>
                                        <span class="tooltiptext">Facilities are man-made structures provided for in the opertaion of protected area</span>
                                </li></ul>
                                </div>
                                <div class="col-xs-12 col-lg-6 tooltip" id="facilityotherdivs" style="display: none">
                                    <ul><li>
                                        <?= form_label('Specify other facilities','','for="ecofacilityother"').form_input('ecofacilityother','','placeholder=" " id="ecofacilityother"'); ?> 
                                        <span class="tooltiptext">Specify other ecotourism facilities</span>
                                        
                                    </li></ul>
                                </div>
                                <div class="col-xs-12 col-lg-6 tooltip">
                                    <ul><li>
                                        <?= form_label('Condition','','for="facility_condition"').form_dropdown('facility_condition',$fcondition,'','placeholder=" " id="facility_condition"'); ?> 
                                        <span class="tooltiptext">Select condition of the facilities</span>
                                    </li></ul>     
                                </div>
                                <div class="col-xs-12 col-lg-12 col-sm-12">
                                    <div class="col-xs-6 col-lg-6 tooltip">   
                                        <ul><li>
                                            <?=  form_label('Constructed/Build Date','','for="facilities_month"').form_dropdown('facilities_month',$monthList,'','id="facilities_month"');?>
                                            <span class="tooltiptext">Date of facility constructed</span>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-6 col-lg-6 tooltip">   
                                        <ul><li>
                                            <?=  form_label('&nbsp;','','for="facilities_year"').form_dropdown('facilities_year',$yearList,'','id="facilities_year"');?>
                                            <span class="tooltiptext">Date of facility constructed</span>
                                        </li></ul>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-lg-12 tooltip">  
                                    <ul><li>
                                        <?=  form_label('Capacity','','for="nopeopleaccom"').form_input('nopeopleaccom','','placeholder="" id="nopeopleaccom"');?>
                                        <span class="tooltiptext">Minimum and maximum capacity of the subject facility with corresponding rates and allowed timeframe</span>
                                </li></ul>
                                </div>
                                <div class="col-xs-12 col-lg-12 tooltip" id="facilityotherdiv">
                                    <ul><li>
                                        <?= form_label('Facilities Description','','for="description3"').form_textarea('description3','','placeholder=" " id="description3"'); ?> 
                                        <span class="tooltiptext">Physical and functional specifications of the subject facility as to count, inventory, uses, including amenities</span>
                                    </li></ul>     
                                </div>
                                <input type="hidden" name="facility-gencode" id="facility-gencode">
                                <fieldset>
                                    <div class="col-xs-12 col-lg-6 ">   
                                        <div id="fetch_images_attraction"></div>
                                    </div>
                                    <div class="col-xs-12 col-lg-12 tooltip">                               
                                        <ul><li>
                                            <label>Upload multiple facility image<i>(*.png, *.jpeg, *.jpg format, maximum size of 50MB)</i></label>
                                            <input type="file" name="facility_img_files" id="facility_img_files" multiple />
                                            <span class="tooltiptext">Ecotourism Product is a combination of ecotourism resources, facilities, activties and services resulting in enhanced commitment to protect the natural and cultural heritage areas.</span>
                                        </li></ul>
                                    </div>
                                </fieldset>
                                <div class="col-xs-12 col-lg-12">  
                                    <a type="text" id="addimageafacility" class="btn btn-primary">Add to table</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 ">                                
                            <div class="table-responsive large-tables"><br>
                                <table id="tableFacilities" class="content-table">
                                    <thead>
                                        <th style="text-align: center; font-size: 24px">Facilities</th>
                                    </thead>
                                    <tbody id="tbodyimagefacilities"></tbody>
                                </table>                              
                            </div>  
                        </div>
                    </fieldset>
                </div>
                <div id="tourism_product" class="tabcontenttourism">                    
                    <fieldset>
                        <legend>Products</legend>
                        <div class="col-xs-12 ">
                            <div class="col-lg-12 col-xs-12">
                                <div id="fetch_images_product"></div>
                            </div>
                            <div class="col-lg-12 col-xs-12">
                                <div class="col-xs-12 col-lg-12 col-sm-12">
                                    <fieldset>
                                        <label>Upload image <i>(*.png, *.jpeg, *.jpg format, maximum size of 50MB)</i></label>
                                        <input type='file' name="pic_products" id="pic_products" />
                                        <input type="hidden" name="pic_products_txt" id="pic_products_txt">
                                    </fieldset>
                                </div>
                            </div>                                
                            <div class="col-xs-12 col-lg-12 ">   
                                <div class="col-xs-12 col-lg-12 tooltip">
                                    <ul><li>
                                        <?= form_label('Product Description','','for="tourism_products"').form_textarea('tourism_products','','id="tourism_products"')?>
                                        <span class="tooltiptext">Specifications of products or services being offered with prices</span>
                                    </li></ul>
                                </div>                                   
                                <a type="text" id="addimageproduct" class="btn btn-primary">Add to table</a>
                            </div>
                        </div>
                        <div class="col-xs-12 ">   
                            <div class="table-responsive large-tables"><br>
                                <table id="tableproduct" class="content-table">
                                    <thead>
                                        <th style="text-align: center; font-size: 24px">Ecotourism Products</th>
                                    </thead>
                                    <tbody id="tbodyimageproduct"></tbody>
                                </table>                                
                            </div>                             
                        </div>
                    </fieldset>
                </div>
                <div id="tourism_enterprise" class="tabcontenttourism">                    
                    <fieldset>
                        <legend>Enterprises</legend>
                        <div class="col-xs-12 ">
                            <div class="col-xs-12 col-lg-12 col-sm-12">
                                <div id="fetch_images_enterprise"></div>
                            </div> 
                            <div class="col-xs-12 col-lg-12 col-sm-12">
                                <fieldset>
                                    <label>Upload image <i>(*.png, *.jpeg, *.jpg format, maximum size of 50MB)</i></label>
                                    <input type='file' name="pic_enterprises" id="pic_enterprises" />
                                    <input type="hidden" name="pic_enterprises_txt" id="pic_enterprises_txt">
                                </fieldset>
                            </div>                                
                            <div class="col-xs-12 col-lg-12 ">   
                                <div class="col-xs-12 col-lg-12 tooltip">
                                    <ul><li>
                                        <?= form_label('Enterprise Description','','for="tourism_enterprises"').form_textarea('tourism_enterprises','','id="tourism_enterprises"')?>
                                        <span class="tooltiptext">Specifications of the nature and business model of the subject enterprise</span>
                                    </li></ul>
                                </div>                                   
                                <a type="text" id="addimageenterprise" class="btn btn-primary">Add to table</a>
                            </div>
                        </div>
                        <div class="col-xs-12 ">   
                            <div class="table-responsive large-tables"><br>
                                <table id="tableenterprise" class="content-table">
                                    <thead>
                                        <th style="text-align: center; font-size: 24px">Ecotourism Enterprises</th>                                        
                                    </thead>
                                    <tbody id="tbodyimageenterprise"></tbody>
                                </table>                                
                            </div>                             
                        </div>
                    </fieldset>
                </div>
            </div>

<script type="text/javascript">
  function readURLs(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
      $('#blahs').attr('src', e.target.result);
      }
        reader.readAsDataURL(input.files[0]);
      }
  }
  function readURLss(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
      $('#blahss').attr('src', e.target.result);
      }
        reader.readAsDataURL(input.files[0]);
      }
  }

  

  function readURLfacility(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
      $('#blahsfacility').attr('src', e.target.result);
      }
        reader.readAsDataURL(input.files[0]);
      }
  }

  function readURLattrib(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
      $('#blahsattrr').attr('src', e.target.result);
      }
        reader.readAsDataURL(input.files[0]);
      }
  }
</script>
<script type="text/javascript">
        function calculate() {
        var myBox1 = document.getElementById('terrestrial').value;  
        var myBox2 = document.getElementById('marine').value;
        var myBox3 = document.getElementById('buffer').value;
        var result = document.getElementById('area');   
        var myResult = +myBox1 + +myBox2 + +myBox3;
        result.value = myResult;
      
        
    }
</script>