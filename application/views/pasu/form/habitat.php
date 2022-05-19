<div class="form-style-6">
    <h2>HABITATS AND ECOSYSTEMS</h2>
</div>
<div class="col-xs-12">
    <div class="tab" id="tabhabeco">
      <a class="tablinkEcon active" onclick="tabEcon(event, 'fformation')" id="defaultOpen">Forest Formation</a>
      <a class="tablinkEcon" id="loadinwet" onclick="tabEcon(event, 'inland')">Inland Wetland</a>
      <a class="tablinkEcon" id="loadcaves" onclick="tabEcon(event, 'cave')">Caves</a>
      <a class="tablinkEcon" onclick="tabEcon(event, 'mariner')" id="coastalc">Coastal/Marine</a>                                  
    </div>
</div>
<div class="col-md-12 col-xs-12 col-lg-12">
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
        <div class="tab" id="tabhabecosub">
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

    </div>
</div>