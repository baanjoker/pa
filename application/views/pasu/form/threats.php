<div class="form-style-7">
    <?php echo form_input('threatgencodes','','id="threatgencodes" class="hidden"'); ?>
                    <div class="form-style-6">
                        <h2>Threats</h2>
                    </div>                  
                    <fieldset>   
                    <legend>Threats map image</legend>                 
                    <div class="col-xs-12">                                        
                        <div class="col-xs-12 col-lg-12">
                            <!-- <ul><li> -->
                                <div id="fetch_images_threat"></div>
                                <label>Upload map of threat within PA(<i>*.png,*.jpg,*.jpeg format only</i>)</label>
                                <?php echo form_upload('img_threatmap','','id="img_threatmap"').form_input('img_threatmap_txt','','id="img_threatmap_txt" class="hidden"'); ?>
                                <span id="img_threatmapspan" class="img_threatmapspan hidden">nophoto.jpg</span>
                            <!-- </ul></li> -->
                        </div>
                    </div>                    
                    </fieldset>
                    <fieldset>   
                    <legend>Threats information</legend>   
                    <div class="col-xs-12">
                        <div class="col-xs-12 col-lg-12">
                            <div class="col-xs-12 col-lg-12 hidden">   
                                <ul><li>                                     
                                    <?= form_label('Sub Nature of Threats','','for="nature_threats_sub"').form_dropdown('nature_threats_sub','','','id="nature_threats_sub" '); ?>
                                </li></ul><br>
                            </div>
                            <div class="col-xs-12 col-lg-12 hidden">   
                                <ul><li>                                     
                                    <?= form_label('Status','','for="threats_cat_rank"').form_dropdown('threats_cat_rank',$threats_rank,'','id="threats_cat_rank" '); ?>
                                </li></ul>
                            </div> 
                            <div class="col-xs-12 col-lg-12" id="rank_qualify" style="display:none">   
                                <ul><li>                                     
                                    <?= form_label('Additional Qualifiers/Cut-off','','for="qualifiers"').form_input('qualifiers','','placeholder="Note: To get percentages based on markers identified per threat" id="qualifiers"'); ?>
                                </li></ul>
                            </div>   
                            <!-- <img id="ThreatImg" src="<?php echo base_url("bmb_assets2/upload/img_threat/nophoto.jpg") ?>" alt="your image" /> -->
                            <div id="fetch_images_threat_indi"></div><br>   
                            <div class="col-xs-12 col-lg-12 col-sm-12">
                                <fieldset>
                                    <label>Upload individual map image of threat within PA(<i>*.png,*.jpg,*.jpeg format only</i>)</label>
                                    <input type='file' name="pic_threat" id="pic_threat" />
                                    <input type="hidden" name="pic_threat_text" id="pic_threat_text">  
                                    <span id="img_output" class="img_output hidden"></span><br>
                                </fieldset>
                            </div>
                            <div class="col-xs-12 col-lg-12">
                                <fieldset>
                                    <label>Upload shapefile of threat within PA<i>(*.zip  format, maximum size of 200MB)</i></label>
                                    <input type='file' name="shp_threat" id="shp_threat" onchange="readURLshapefilethreat(this);" />
                                    <input type="hidden" name="shp_threat_txt" id="shp_threat_txt">
                                    <div id="fetch_threat_shpfile"></div>
                                </fieldset> 
                            </div>
                        </div>
                        <fieldset><legend>Threats</legend>
                        <div class="col-xs-12 col-lg-12"> 
                            <div class="col-xs-12 col-lg-4 tooltip">   
                                <ul><li>                                     
                                    <?= form_label('Nature of Threats','','for="nature_threats"').form_dropdown('nature_threats',$nature_threats,'','id="nature_threats" '); ?>
                                    <div class="error_Threats_nature"></div>
                                    <span class="tooltiptext">Select Nature of threats</span>
                                </li></ul>
                            </div> 
                            <div class="col-xs-12 col-lg-4 tooltip">   
                                <ul><li>                                     
                                    <?= form_label('Category','','for="threats_cat"').form_dropdown('threats_cat','','','id="threats_cat" '); ?>
                                    <div class="error_cat"></div>
                                    <span class="tooltiptext">Select category of threats</span>
                                </li></ul>
                            </div>  
                            <div class="col-xs-12 col-lg-4 tooltip">   
                                <ul><li>                                     
                                    <?= form_label('Threat','','for="threats_cat_sub"').form_dropdown('threats_cat_sub','','','id="threats_cat_sub" '); ?>
                                    <span class="tooltiptext">Select threats</span>
                                </li></ul><br>
                            </div>
                            <div class="col-xs-12 col-lg-12">
                                <div class="col-xs-12">
                                    <div class="col-xs-12 col-lg-12 tooltip">
                                        <table class="content-table">                                          
                                            <tbody>
                                                <tr>
                                                    <td>Longitude</td>
                                                    <td width="">
                                                        <table class="content-table">
                                                            <tbody>
                                                                <tr>
                                                                    <td>Decimal Degree</td><td colspan="2"><ul><li><?= form_input('ddlongoutputes','','id="ddlongoutputes"')?></li></ul></td>
                                                                    <td class="hidden"><?php echo form_button('en','Enable/Disable','class="endis"') ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <ul><li>                                                            
                                                                            <?= form_label('Direction','for=""').form_dropdown('threats_longitude_dms_directiones',$direct_long,'',' id="threats_longitude_dms_directiones"'); ?>
                                                                        </li></ul>
                                                                        </td>
                                                                    <td>
                                                                        <ul><li>
                                                                            <?= form_label('Degree (°)','for="threats_longitude_dms_degreeses"').form_input('threats_longitude_dms_degreeses','','id="threats_longitude_dms_degreeses" class="dmstodd"') ?>
                                                                        </li></ul>
                                                                    </td>
                                                                    <td>
                                                                        <ul><li>
                                                                            <?= form_label('Minute (ˈ)','for="threats_longitude_dms_minuteses"').form_input('threats_longitude_dms_minuteses','','id="threats_longitude_dms_minuteses" class="dmstodd"') ?>
                                                                        </li></ul>
                                                                    </td>
                                                                    <td>
                                                                        <ul><li>
                                                                            <?= form_label('Second (")','for="threats_longitude_dms_secondses"').form_input('threats_longitude_dms_secondses','','id="threats_longitude_dms_secondses" class="dmstodd"') ?>
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
                                                                    <td>Decimal Degree</td><td colspan="2"><ul><li><?= form_input('ddlatoutputes','','id="ddlatoutputes"') ?></li></ul></td>
                                                                    <td class="hidden"><?php echo form_button('en','Enable/Disable','class="endiss"') ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <ul><li>
                                                                           <?= form_label('Direction','for=""').form_dropdown('threats_latitude_dms_directiones',$direct_lat,'',' id="threats_latitude_dms_directiones"'); ?>
                                                                        </li></ul>
                                                                        </td>
                                                                    <td>
                                                                        <ul><li>
                                                                            <?= form_label('Degree (°)','for="threats_latitude_dms_degreeses"').form_input('threats_latitude_dms_degreeses','','id="threats_latitude_dms_degreeses" class="dmstodd"') ?>
                                                                        </li></ul>
                                                                    </td>
                                                                    <td>
                                                                        <ul><li>
                                                                            <?= form_label('Minute (ˈ)','for="threats_latitude_dms_minuteses"').form_input('threats_latitude_dms_minuteses','','id="threats_latitude_dms_minuteses" class="dmstodd"') ?>
                                                                        </li></ul>
                                                                    </td>
                                                                    <td>
                                                                        <ul><li>
                                                                            <?= form_label('Second (")','for="threats_latitude_dms_secondses"').form_input('threats_latitude_dms_secondses','','id="threats_latitude_dms_secondses" class="dmstodd"') ?>
                                                                        </li></ul>
                                                                    </td>
                                                                </tr>                                                                
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>                                                
                                            </tbody>
                                        </table>
                                        <span class="tooltiptext">Input centroid of threats in the area</span>
                                    </div>                                    
                                </div>  
                            </div>
                            <div class="col-xs-12 col-lg-12 tooltip" style="margin-top: 30px;">   
                                <ul><li>                                     
                                    <?= form_label('Remarks','','for="threats_desc"').form_textarea('threats_desc','','placeholder=" " id="threats_desc" style="height:100px;"'); ?>
                                    <span class="tooltiptext">Specify other remarks/short description</span>
                                </li></ul>
                            </div> 
                            <div class="col-xs-12 col-lg-12 ">
                                <a type="text" class="btn btn-warning" id="add_data_threat">Add to list</a>
                            </div>
                            <div class="col-xs-12">
                                <br><table id="tblthreatlist" class="content-table">
                                    <thead>
                                        <tr>
                                            <th colspan="5" style="text-align: center; font-size: 24px">List of threats</th>
                                        </tr>  
                                        <tr>
                                            <th>Nature of Threat</th>
                                            <th>Category</th>
                                            <th>Threats</th>
                                            <th>Point location</th>
                                            <th>Action</th>
                                        </tr>                     
                                    </thead>
                                    <tbody id="tbodythreatlist"></tbody>
                                </table>  
                            </div>     
                        </div>
                        </fieldset>
                        <div class="col-xs-12 col-lg-12"> 
                        <br><fieldset>
                            <legend>Location(s)</legend>
                            <div class="col-xs-12 tooltip">
                                <div class="col-xs-6 col-lg-3 ">
                                    <ul><li>
                                        <?php echo form_label('Region *','','for="regidthreat"').form_dropdown('threat_region_id',$regionList,'','class="regid" id="regidthreat"') ?>    
                                        <div class="prov_error"></div>
                                    </li></ul>
                                </div>
                                <div class="col-xs-6 col-lg-3 ">
                                    <ul><li>
                                        <?php echo form_label('Province *','','for="providthreat"').form_dropdown('threat_province_id','','','class="provid" id="providthreat"') ?>
                                        <div class="municipal_error"></div>
                                    </li></ul>
                                </div>
                                <div class="col-xs-6 col-lg-3 ">
                                    <ul><li>
                                        <?php echo form_label('Municipality *','','for="munidthreat"').form_dropdown('threat_municipal_id',$municipal,'','class="munid" id="munidthreat"') ?>
                                        <div class="barangay_error"></div>
                                    </li></ul>
                                </div>
                                <div class="col-xs-6 col-lg-3 ">
                                    <ul><li>
                                        <?php echo form_label('Barangay','','for="baridthreat"').form_dropdown('threat_barangay_id',$barangay,'','class="barid" id="baridthreat"') ?>
                                        <div class="barangay_error"></div>
                                    </li></ul>
                                </div>    
                                <span class="tooltiptext">Select location of threats</span>                           
                            </div>
                            <div class="col-xs-12 hidden">
                                    <div class="col-xs-12 col-lg-12 tooltip">
                                        <table class="content-table">                                          
                                            <tbody>
                                                <tr>
                                                    <td>Longitude</td>
                                                    <td width="">
                                                        <table class="content-table">
                                                            <tbody>
                                                                <tr>
                                                                    <td>Decimal Degree</td><td colspan="2"><ul><li><?= form_input('ddlongoutput','','id="ddlongoutput"')?></li></ul></td>
                                                                    <td class="hidden"><?php echo form_button('en','Enable/Disable','class="endis"') ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <ul><li>                                                            
                                                                            <?= form_label('Direction','for=""').form_dropdown('threats_longitude_dms_direction',$direct_long,'',' id="threats_longitude_dms_direction"'); ?>
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
                                                                    <td>Decimal Degree</td><td colspan="2"><ul><li><?= form_input('ddlatoutput','','id="ddlatoutput"') ?></li></ul></td>
                                                                    <td class="hidden"><?php echo form_button('en','Enable/Disable','class="endiss"') ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <ul><li>
                                                                           <?= form_label('Direction','for=""').form_dropdown('threats_latitude_dms_direction',$direct_lat,'',' id="threats_latitude_dms_direction"'); ?>
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
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>                                                
                                            </tbody>
                                        </table>
                                        <span class="tooltiptext">Input centroid of threats in the area</span>
                                    </div>                                    
                                </div>                             
                        </fieldset> 
                        </div>                   
                        <div class="col-xs-12 col-lg-12"> 
                            
                            <div class="col-xs-12 col-lg-12 hidden">   
                                <ul><li>                                     
                                    <?= form_label('Location','','for="threat_loc"').form_input('threat_loc','','placeholder="" id="threat_loc"'); ?>
                                </li></ul>
                            </div> 
                            <div class="col-xs-12 col-lg-12 tooltip">
                                <div class="col-xs-6 col-lg-6">
                                    <ul><li>
                                        <?= form_label('Date Assessed','','for="threat_dMonth"').form_dropdown('threat_dMonth',$monthList,'','id="threat_dMonth" ') ?>
                                    </li></ul>
                                </div>
                                <div class="col-xs-6 col-lg-6">
                                    <ul><li>
                                        <?= form_label('&nbsp;','','for="threat_dYear"').form_dropdown('threat_dYear',$yearList,'','id="threat_dYear" ') ?>
                                    </li></ul>
                                </div>
                                ,<span class="tooltiptext">Select date of assessed</span>
                            </div>                          
                        </div>
                        <div class="col-xs-12 col-lg-12"> 
                            <fieldset>
                                <label>Upload multiple images <i>(*.png, *.jpeg, *.jpg format, maximum size of 50MB)</i></label>
                                <input type='file' name="threat_multi_img" id="threat_multi_img" onchange="readURLmultipleimagethreat(this);"  />
                                <span id="threat_multi_img_span" class="threat_multi_img_span hidden"></span>
                                <div id="uploadthreat_multi_img"></div>
                            </fieldset>
                        </div>
                        <div class="col-xs-12 col-lg-12">    
                            <a type="text" id="saveThreat" class="btn btn-primary">Add data</a>
                        </div>
                        <div class="col-xs-12 ">   
                            <div class="table-responsive large-tables">
                                <table id="tableThreat" class="content-table">
                                    <thead>
                                         <tr>
                                            <th style="text-align: center; font-size: 24px">Threats</th>
                                        </tr>                                        
                                    </thead>
                                    <tbody id="tbodythreat"></tbody>
                                </table>                             
                            </div>                             
                        </div>      
                    </div>
                    </fieldset>
                </div>

<!-- MODAL FOR EDITTING A THREATS -->
<form method="post" action="" id="ThreatsForm" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-threats" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Threats</h4>
                </div>
                <input type="hidden" id="threats-id" name="threats-id" value="" />
                <input type="hidden" id="threats-gencode" name="threats-gencode" value="" />
                <input type="hidden" id="threats-gencode2" name="threats-gencode2" value="" />
                <div class="modal-body" >
                    <div class="col-xs-12 " style="margin-top:10px">
                        <div class="col-xs-12 col-lg-12 ">
                            <img width="200px" height="180px" id="edit-ThreatImg" src="<?php echo base_url("bmb_assets2/upload/img_threat/nophoto.jpg") ?>" alt="your image" /><br>
                            <input type='file' name="edit-pic_threat" id="edit-pic_threat" onchange="readURLsThreatedit(this);"  /><br>
                            <input type="hidden" name="edit-old_picture-threat" id="edit-old_picture-threat" value="nophoto.jpg">
                            <span id="edit-img_output" class="edit-img_output"></span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-12">
                        <fieldset>
                            <label>Upload Shapefile <i>(*.zip  format, maximum size of 200MB)</i></label>
                            <input type='file' name="edit-shp_threat" id="edit-shp_threat" onchange="readURLshapefilethreatEdit(this);" />
                            <input type="hidden" name="edit-shp_threat_txt" id="edit-shp_threat_txt">
                            <input type="hidden" name="edit-shp_threat_old" id="edit-shp_threat_old">
                            <div id="edit-fetch_threat_shpfile"></div>
                        </fieldset> 
                    </div>
                    <fieldset><legend>Threats</legend>
                        <div class="col-xs-12 col-lg-12">
                            <div class="col-xs-12 col-lg-4">
                                <ul><li>
                                    <?= form_label('Nature of Threats','','for="edit-nature_threats"').form_dropdown('edit-nature_threats',$nature_threats,'','id="edit-nature_threats" '); ?>
                                    <div class="error_Threats_nature"></div>
                                </li></ul>
                            </div>
                            <div class="col-xs-12 col-lg-4">
                                <ul><li>
                                    <?= form_label('Category','','for="edit-threats_cat"').form_dropdown('edit-threats_cat','','','id="edit-threats_cat" '); ?>
                                    <div class="error_cat"></div>
                                </li></ul>
                            </div>
                            <div class="col-xs-12 col-lg-4">
                                <ul><li>
                                    <?= form_label('Threat','','for="edit-threats_cat_sub"').form_dropdown('edit-threats_cat_sub','','','id="edit-threats_cat_sub" '); ?>
                                </li></ul>
                            </div>                            
                            <div class="col-xs-12 col-lg-12">
                                <div class="col-xs-12">
                                    <div class="col-xs-12 col-lg-12 tooltip">
                                        <table class="content-table">                                          
                                            <tbody>
                                                <tr>
                                                    <td>Longitude</td>
                                                    <td width="">
                                                        <table class="content-table">
                                                            <tbody>
                                                                <tr>
                                                                    <td>Decimal Degree</td><td colspan="2"><ul><li><?= form_input('edit-ddlongoutputes','','id="edit-ddlongoutputes"')?></li></ul></td>
                                                                    <td class="hidden"><?php echo form_button('en','Enable/Disable','class="endis"') ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <ul><li>                                                            
                                                                            <?= form_label('Direction','for=""').form_dropdown('edit-threats_longitude_dms_directiones',$direct_long,'',' id="edit-threats_longitude_dms_directiones"'); ?>
                                                                        </li></ul>
                                                                        </td>
                                                                    <td>
                                                                        <ul><li>
                                                                            <?= form_label('Degree (°)','for="edit-threats_longitude_dms_degreeses"').form_input('edit-threats_longitude_dms_degreeses','','id="edit-threats_longitude_dms_degreeses" class="dmstodd"') ?>
                                                                        </li></ul>
                                                                    </td>
                                                                    <td>
                                                                        <ul><li>
                                                                            <?= form_label('Minute (ˈ)','for="edit-threats_longitude_dms_minuteses"').form_input('edit-threats_longitude_dms_minuteses','','id="edit-threats_longitude_dms_minuteses" class="dmstodd"') ?>
                                                                        </li></ul>
                                                                    </td>
                                                                    <td>
                                                                        <ul><li>
                                                                            <?= form_label('Second (")','for="edit-threats_longitude_dms_secondses"').form_input('edit-threats_longitude_dms_secondses','','id="edit-threats_longitude_dms_secondses" class="dmstodd"') ?>
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
                                                                    <td>Decimal Degree</td><td colspan="2"><ul><li><?= form_input('edit-ddlatoutputes','','id="edit-ddlatoutputes"') ?></li></ul></td>
                                                                    <td class="hidden"><?php echo form_button('en','Enable/Disable','class="endiss"') ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <ul><li>
                                                                           <?= form_label('Direction','for=""').form_dropdown('edit-threats_latitude_dms_directiones',$direct_lat,'',' id="edit-threats_latitude_dms_directiones"'); ?>
                                                                        </li></ul>
                                                                        </td>
                                                                    <td>
                                                                        <ul><li>
                                                                            <?= form_label('Degree (°)','for="edit-threats_latitude_dms_degreeses"').form_input('edit-threats_latitude_dms_degreeses','','id="edit-threats_latitude_dms_degreeses" class="dmstodd"') ?>
                                                                        </li></ul>
                                                                    </td>
                                                                    <td>
                                                                        <ul><li>
                                                                            <?= form_label('Minute (ˈ)','for="edit-threats_latitude_dms_minuteses"').form_input('edit-threats_latitude_dms_minuteses','','id="edit-threats_latitude_dms_minuteses" class="dmstodd"') ?>
                                                                        </li></ul>
                                                                    </td>
                                                                    <td>
                                                                        <ul><li>
                                                                            <?= form_label('Second (")','for="edit-threats_latitude_dms_secondses"').form_input('edit-threats_latitude_dms_secondses','','id="edit-threats_latitude_dms_secondses" class="dmstodd"') ?>
                                                                        </li></ul>
                                                                    </td>
                                                                </tr>                                                                
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>                                                
                                            </tbody>
                                        </table>
                                        <span class="tooltiptext">Input centroid of threats in the area</span><br>
                                    </div>                                    
                                </div>  
                            </div>
                            <div class="col-xs-12 col-lg-12">
                                <ul><li>
                                    <?= form_label('Remarks','','for="edit-threats_desc"').form_textarea('edit-threats_desc','','placeholder=" " id="edit-threats_desc" style="height:100px;"'); ?>
                                </li></ul>
                            </div>
                            <div class="col-xs-12 col-lg-12" style="margin-bottom:30px">
                                <a type="text" class="btn btn-primary" id="editdata_threat">Add threat</a>
                            </div>
                            <div class="col-xs-12 col-lg-12" id="threatlistshw"></div>
                        </div>
                        </fieldset>
                            <div class="col-xs-12 col-lg-12">
                            <br><fieldset>
                                <legend>Location(s)</legend>
                                <div class="col-xs-12">
                                    <div class="col-xs-6 col-lg-3 ">
                                        <ul><li>
                                            <?php echo form_label('Region *','','for="edit-regidthreat"').form_dropdown('edit-threat_region_id',$regionList,'','class="regid" id="edit-regidthreat"') ?>
                                            <div class="prov_error"></div>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-6 col-lg-3 ">
                                        <ul><li>
                                            <?php echo form_label('Province *','','for="edit-providthreat"').form_dropdown('edit-threat_province_id','','','class="provid" id="edit-providthreat"') ?>
                                            <div class="municipal_error"></div>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-6 col-lg-3 ">
                                        <ul><li>
                                            <?php echo form_label('Municipality *','','for="edit-munidthreat"').form_dropdown('edit-threat_municipal_id','','','class="munid" id="edit-munidthreat"') ?>
                                            <div class="barangay_error"></div>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-6 col-lg-3 ">
                                        <ul><li>
                                            <?php echo form_label('Barangay','','for="edit-baridthreat"').form_dropdown('edit-threat_barangay_id',$barangay,'','class="barid" id="edit-baridthreat"') ?>
                                            <div class="barangay_error"></div>
                                        </li></ul>
                                    </div>
                                </div>
                                <div class="col-xs-12 hidden">
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
                                                                            <?= form_label('Direction','for=""').form_dropdown('edit-threats_longitude_dms_direction',$direct_long,'',' id="edit-threats_longitude_dms_direction"'); ?>
                                                                        </li></ul>
                                                                        </td>
                                                                    <td>
                                                                        <ul><li>
                                                                            <?= form_label('Degree (°)','for="edit-threats_longitude_dms_degrees"').form_input('edit-threats_longitude_dms_degrees','','id="edit-threats_longitude_dms_degrees" onkeyup="dmstodd();"') ?>
                                                                        </li></ul>
                                                                    </td>
                                                                    <td>
                                                                        <ul><li>
                                                                            <?= form_label('Minute (ˈ)','for="edit-threats_longitude_dms_minutes"').form_input('edit-threats_longitude_dms_minutes','','id="edit-threats_longitude_dms_minutes" onkeyup="dmstodd();"') ?>
                                                                        </li></ul>
                                                                    </td>
                                                                    <td>
                                                                        <ul><li>
                                                                            <?= form_label('Second (")','for="edit-threats_longitude_dms_seconds"').form_input('edit-threats_longitude_dms_seconds','','id="edit-threats_longitude_dms_seconds" onkeyup="dmstodd();"') ?>
                                                                        </li></ul>
                                                                    </td>
                                                                </tr>
                                                                <tr><td>Convert</td><td colspan="3"><?= form_input('edit-ddlongoutput','','id="edit-ddlongoutput"') ?></td></tr>
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
                                                                           <?= form_label('Direction','for=""').form_dropdown('edit-threats_latitude_dms_direction',$direct_lat,'',' id="edit-threats_latitude_dms_direction"'); ?>
                                                                        </li></ul>
                                                                        </td>
                                                                    <td>
                                                                        <ul><li>
                                                                            <?= form_label('Degree (°)','for="edit-threats_latitude_dms_degrees"').form_input('edit-threats_latitude_dms_degrees','','id="edit-threats_latitude_dms_degrees" onkeyup="dmstodd();"') ?>
                                                                        </li></ul>
                                                                    </td>
                                                                    <td>
                                                                        <ul><li>
                                                                            <?= form_label('Minute (ˈ)','for="edit-threats_latitude_dms_minutes"').form_input('edit-threats_latitude_dms_minutes','','id="edit-threats_latitude_dms_minutes" onkeyup="dmstodd();"') ?>
                                                                        </li></ul>
                                                                    </td>
                                                                    <td>
                                                                        <ul><li>
                                                                            <?= form_label('Second (")','for="edit-threats_latitude_dms_seconds"').form_input('edit-threats_latitude_dms_seconds','','id="edit-threats_latitude_dms_seconds" onkeyup="dmstodd();"') ?>
                                                                        </li></ul>
                                                                    </td>
                                                                </tr>
                                                                <tr><td>Convert</td><td colspan="3"><?= form_input('edit-ddlatoutput','','id="edit-ddlatoutput"') ?></td></tr>
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
                            <!-- <div class="col-xs-12 col-lg-12">
                                <ul><li>
                                    <?= form_label('Location','','for="edit-threat_loc"').form_input('edit-threat_loc','','placeholder="" id="edit-threat_loc"'); ?>
                                </li></ul>
                            </div> -->
                            <div class="col-xs-12 col-lg-12">
                                <div class="col-xs-6 col-lg-6">
                                    <ul><li>
                                        <?= form_label('Date Assessed','','for="edit-threat_dMonth"').form_dropdown('edit-threat_dMonth',$monthList,'','id="edit-threat_dMonth" ') ?>
                                    </li></ul>
                                </div>
                                <div class="col-xs-6 col-lg-6">
                                    <ul><li>
                                        <?= form_label('&nbsp;','','for="edit-threat_dYear"').form_dropdown('edit-threat_dYear',$yearList,'','id="edit-threat_dYear" ') ?>
                                    </li></ul>
                                </div>
                            </div>
                            <div class="col-xs-12 col-lg-12"> 
                                <fieldset>
                                    <label>Upload multiple images <i>(*.png, *.jpeg, *.jpg format, maximum size of 50MB)</i></label>
                                    <input type='file' name="edit-threat_multi_img" id="edit-threat_multi_img" onchange="readURLmultipleimagethreatEdit(this);"  />
                                    <span id="edit-threat_multi_img_span" class="edit-threat_multi_img_span hidden"></span>
                                    <div id="edit-uploadthreat_multi_img"></div>
                                </fieldset>
                            </div>
                            <div class="col-xs-12">
                                <fieldset><legend>Date</legend>
                                    <div class="col-xs-6 col-lg-6">
                                        <label>Created : </label>
                                        <span id="threatDateCreated"></span>
                                    </div>
                                    <div class="col-xs-6 col-lg-6">
                                        <label>Last Update : </label>
                                        <span id="threatDateupdate"></span>
                                    </div>
                                </fieldset>
                            </div>
                    <div class="col-xs-12 " style="margin-top:10px">
                        <div class="col-xs-12 ">
                            <div class="modal-footer">
                                <button class="btn btn-info" type="button" onclick="updateThreaten();" />Update
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>