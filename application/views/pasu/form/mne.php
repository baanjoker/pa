<div class="tab-pane">
<div class="form-style-6">
    <h2>Monitoring and Evaluation</h2>                    
</div>
    <div class="col-xs-12">
	    <div class="tab" id="tabhabeco">
	      	<a class="tablinkMnE active" onclick="tabMnE(event, 'bamsr')" id="barssid">BAMS Report</a>
            <a class="tablinkMnE" onclick="tabMnE(event, 'bmsr')" id="bssid">BMS Result</a>
	      	<a class="tablinkMnE" id="" onclick="tabMnE(event, 'seamsr')" id="seamsid">SEAMS Report</a>
            <a class="tablinkMnE" id="" onclick="tabMnE(event, 'mettr')" id="mettid">METT Result</a>                               
            <a class="tablinkMnE" id="" onclick="tabMnE(event, 'ecor')" id="ecorid">Ecotourism Impact Monitoring Report</a>                               
	    </div>
	</div>
    <div id="bamsr" class="tabcontentMnE" style="display: block;">
    	<div class="col-xs-12 col-md-12 col-lg-12">
    		<div class="col-xs-12 col-lg-12 col-md-12">
                <ul><li>
                    <label>Upload BAMS Report <i>(*.pdf format, maximum size of 200MB)</i></label>
                    <input type="file" name="bams_file_attached" id="bams_file_attached" class="pdffiletypes" />
                </li></ul>
                <!-- <div id="uploaded_images_caves"></div> -->
            </div>
            <div class="col-xs-12 col-lg-12">
                <ul><li>
                    <?= form_label('Name of File','','for="bams_filename"').form_input('bams_filename','','placeholder=" "  id="bams_filename"');?>                                
                </li></ul>
            </div> 
            <div class="col-xs-4 col-lg-4">
                <ul><li>
                    <?php echo form_label('Date conducted').form_dropdown('bams_date_month',$monthList,'',' id="bams_date_month"') ?>
                </li></ul>
            </div>
            <div class="col-xs-4 col-lg-4">
                <ul><li>
                    <?php echo form_label('&nbsp;').form_dropdown('bams_date_year',$yearListed,'',' id="bams_date_year"') ?>
                </li></ul>
            </div>
            <div class="col-xs-6 col-lg-3 col-md-6 hidden">
                <ul><li>
                    <?= form_label('Status','','for="bams_status"').form_dropdown('bams_status',$tenurestatus,'','id="bams_status"') ?>
                </li></ul>
            </div>
    	</div>
    	<div class="col-xs-12 col-lg-12 col-md-12 tooltip">
            <ul><li>
                <?= form_label('Remarks').form_textarea('bams_remarks','','id="bams_remarks"') ?>
                <span class="tooltiptext">In cases when catastrophic events occured, monitoring is done immediately. Put in the remarks if ever monitoring is done regularly or due to catastrophic events</span>
            </li></ul>
        </div> 
        <div class="col-xs-12 ">
            <a type="text" class="btn btn-primary" id="addbamsresults">Add BAMS Report</a>
        </div>
        <div class="col-xs-12 "><br>
            <div class="table-responsive text-nowrap" style="overflow-x:auto;">
                <table id="tblabamsresults" class="content-table" style="z-index: 100">
                    <thead>
                        <tr>
                            <th colspan="6" style="text-align: center; font-size: 24px">BAMS Report</th>
                        </tr>
                        <tr class="text-nowrap">                                        
                            <th>Filename</th>
                            <th>Attachement</th>
                            <th>Dated</th>
                            <th class="hidden">Status</th>
                            <th>Remarks</th>
                            <th>Action</th>                                             
                        </tr>                                              
                    </thead>
                    <tbody id="tbodybamsresults1"></tbody>
                </table>                                                
            </div>
        </div>   
    </div>
    <div id="bmsr" class="tabcontentMnE" style="display: none;">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="col-xs-12 col-lg-12 col-md-12">
                <ul><li>
                    <label>Upload BMS result <i>(*.pdf format, maximum size of 200MB)</i></label>
                    <input type="file" name="bms_file_attached" id="bms_file_attached" class="pdffiletypes" />
                </li></ul>
                <!-- <div id="uploaded_images_caves"></div> -->
            </div>
            <div class="col-xs-12 col-lg-12">
                <ul><li>
                    <?= form_label('Name of File','','for="bms_filename"').form_input('bms_filename','','placeholder=" "  id="bms_filename"');?>                                
                </li></ul>
            </div> 
            <div class="col-xs-4 col-lg-4">
                <ul><li>
                    <?php echo form_label('Date conducted').form_dropdown('bms_date_month',$monthList,'',' id="bms_date_month"') ?>
                </li></ul>
            </div>
            <div class="col-xs-4 col-lg-4">
                <ul><li>
                    <?php echo form_label('&nbsp;').form_dropdown('bms_date_year',$yearListed,'',' id="bms_date_year"') ?>
                </li></ul>
            </div>
            <div class="col-xs-6 col-lg-3 col-md-6 hidden">
                <ul><li>
                    <?= form_label('Status','','for="bms_status"').form_dropdown('bms_status',$tenurestatus,'','id="bms_status"') ?>
                </li></ul>
            </div>
        </div>
        <div class="col-xs-12 col-lg-12 col-md-12">
            <ul><li>
                <?= form_label('Remarks').form_textarea('bms_remarks','','id="bms_remarks"') ?>
            </li></ul>
        </div> 
        <div class="col-xs-12 ">
            <a type="text" class="btn btn-primary" id="addbmsresult">Add BAMS Report</a>
        </div>
        <div class="col-xs-12 "><br>
            <div class="table-responsive text-nowrap" style="overflow-x:auto;">
                <table id="tblabmsresults" class="content-table" style="z-index: 100">
                    <thead>
                        <tr>
                            <th colspan="6" style="text-align: center; font-size: 24px">BMS Result</th>
                        </tr>
                        <tr class="text-nowrap">                                        
                            <th>Filename</th>
                            <th>Attachement</th>
                            <th>Dated</th>
                            <th class="hidden">Status</th>
                            <th>Remarks</th>
                            <th>Action</th>                                             
                        </tr>                                              
                    </thead>
                    <tbody id="tbodybmsresults1"></tbody>
                </table>                                                
            </div>
        </div>   
    </div>
    
    <div id="seamsr" class="tabcontentMnE" style="display: none;">
    	<div class="col-xs-12 col-md-12 col-lg-12">
    		<div class="col-xs-12 col-lg-12 col-md-12">
                <ul><li>
                    <label>Upload SEAMS Report <i>(*.pdf format, maximum size of 200MB)</i></label>
                    <input type="file" name="seams_file_attached" id="seams_file_attached" multiple />
                </li></ul>
                <div id="uploaded_result_seams"></div>
            </div>
            <div class="col-xs-12 col-lg-12">
                <ul><li>
                    <?= form_label('Name of File','','for="seams_filename"').form_input('seams_filename','','placeholder=" "  id="seams_filename"');?>                                
                </li></ul>
            </div> 
            <div class="col-xs-4 col-lg-4">
                <ul><li>
                    <?php echo form_label('Date conducted').form_dropdown('seams_date_month',$monthList,'',' id="seams_date_month"') ?>
                </li></ul>
            </div>
            <div class="col-xs-4 col-lg-4">
                <ul><li>
                    <?php echo form_label('&nbsp;').form_dropdown('seams_date_year',$yearListed,'',' id="seams_date_year"') ?>
                </li></ul>
            </div>
            <div class="col-xs-12 col-lg-4 col-md-12">
                <ul><li>
                    <?= form_label('Status','','for="bams_status"').form_dropdown('seams_status',$seams_status,'','id="seams_status"') ?>
                </li></ul>
            </div>
    	</div>
        <div class="col-xs-12 col-lg-12 col-md-12">
            <ul><li>
                <label>Upload SEAMS Automated Utility tool <i>(*.pdf format, maximum size of 200MB)</i></label>
                <input type="file" name="seamsaut" id="seamsaut" multiple />
            </li></ul>
            <div id="uploaded_saut"></div>
        </div>
    	<div class="col-xs-12 col-lg-12 col-md-12 tooltip">
            <ul><li>
                <?= form_label('Remarks').form_textarea('seams_remarks','','id="seams_remarks"') ?>
                <span class="tooltiptext">Final results and recommendations on the SEAMS Report are the information that may be inputted under the Remarks</span>
            </li></ul>
        </div> 
        <div class="col-xs-12 ">
            <a type="text" class="btn btn-primary" id="addseamsresult">Add SEAMS Reports</a>
        </div>
        <div class="col-xs-12 "><br>
            <div class="table-responsive text-nowrap" style="overflow-x:auto;">
                <table id="tblaseamsresult" class="content-table" style="z-index: 100">
                    <thead>
                        <tr>
                            <th colspan="7" style="text-align: center; font-size: 24px">SEAMS Report</th>
                        </tr>
                        <tr class="text-nowrap">                                        
                            <th>Filename</th>
                            <th>SEAMS Report</th>
                            <th>SAUT File</th>
                            <th>Dated</th>
                            <th>Status</th>
                            <th>Remarks</th>
                            <th>Action</th>                                              
                        </tr>                                              
                    </thead>
                    <tbody id="tbodyseamsresult1"></tbody>
                </table>                                                
            </div>
        </div> 
    </div>
    <div class="col-md-12 col-xs-12 col-lg-12">
    	<div id="mettr" class="tabcontentMnE" style="display: none;">
    		<div class="col-xs-12 col-md-12 col-lg-12">
    			<div class="col-xs-12 col-lg-12 col-md-12">
                    <ul><li>
                        <label>Upload METT result <i>(*.pdf format, maximum size of 200MB)</i></label>
                        <input type="file" name="mett_file_attached" id="mett_file_attached" multiple />
                    </li></ul>
                    <!-- <div id="uploaded_images_caves"></div> -->
                </div>
                <div class="col-xs-12 col-lg-12">
                    <ul><li>
                        <?= form_label('Name of File','','for="mett_filename"').form_input('mett_filename','','placeholder=" "  id="mett_filename"');?>                                
                    </li></ul>
                </div> 
                <div class="col-xs-4 col-lg-3">
                    <ul><li>
                        <?php echo form_label('Date conducted').form_dropdown('mett_date_month',$monthList,'',' id="mett_date_month"') ?>
                    </li></ul>
                </div>
                <div class="col-xs-4 col-lg-3">
                    <ul><li>
                        <?php echo form_label('&nbsp;').form_dropdown('mett_date_year',$yearListed,'',' id="mett_date_year"') ?>
                    </li></ul>
                </div>
                <div class="col-xs-6 col-lg-3 col-md-4 hidden">
                    <ul><li>
                        <?= form_label('Status','','for="mettstatus"').form_dropdown('mett_status',$tenurestatus,'','id="mett_status"') ?>
                    </li></ul>
                </div>
                <div class="col-xs-6 col-lg-3 col-md-3">
                    <ul><li>
                        <?= form_label('Management Effectiveness Status','','for="messtatus"').form_dropdown('messtatus',$mett_status,'','id="messtatus"') ?>
                    </li></ul>
                </div>
                <div class="col-xs-12 col-lg-3">
                    <ul><li>
                        <?php echo form_label('Rating').form_input('mesrating','','id="mesrating" class="number-separator"') ?>
                    </li></ul>
                </div>
    		</div>
    		<div class="col-xs-12 col-lg-12 col-md-12 tooltip">
                <ul><li>
                    <?= form_label('Remarks').form_textarea('mett_remarks','','id="mett_remarks"') ?>
                    <!-- <span class="tooltiptext">Put the Rating and the Management Effectiveness Status in the Remarks<br>
                    75%-100% = Excellent<br>51%-74% = Good<br>26%-50% = Fair <br><26% = Poor</span> -->
                </li></ul>
            </div> 
            <div class="col-xs-12 ">
                <a type="text" class="btn btn-primary" id="addmettresult">Add METT Results</a>
            </div>
            <div class="col-xs-12 "><br>
                <div class="table-responsive text-nowrap" style="overflow-x:auto;">
                    <table id="tblamettresult" class="content-table" style="z-index: 100">
                        <thead>
                            <tr>
                                <th colspan="6" style="text-align: center; font-size: 24px">METT Result</th>
                            </tr>
                            <tr class="text-nowrap">                                        
                                <th>Filename</th>
                                <th>Attachement</th>
                                <th>Dated</th>
                                <th>Rating and the Management Effectiveness Status</th>
                                <th>Remarks</th>
                                <th>Action</th>                                               
                            </tr>                                              
                        </thead>
                        <tbody id="tbodymettresult1"></tbody>
                    </table>                                                
                </div>
            </div> 
    	</div>
    </div>
    <div class="col-md-12 col-xs-12 col-lg-12">
        <div id="ecor" class="tabcontentMnE" style="display: none;">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <div class="col-xs-12 col-lg-12 col-md-12">
                    <ul><li>
                        <label>Ecotourism Impact Monitoring Report File <i>(*.pdf format, maximum size of 200MB)</i></label>
                        <input type="file" name="ecor_file_attached" id="ecor_file_attached" multiple />
                    </li></ul>
                    <!-- <div id="uploaded_images_caves"></div> -->
                </div>
                <div class="col-xs-12 col-lg-12">
                    <ul><li>
                        <?= form_label('Name of File','','for="ecor_filename"').form_input('ecor_filename','','placeholder=" "  id="ecor_filename"');?>                                
                    </li></ul>
                </div> 
                <div class="col-xs-4 col-lg-4">
                    <ul><li>
                        <?php echo form_label('Date conducted').form_dropdown('ecor_date_month',$monthList,'',' id="ecor_date_month"') ?>
                    </li></ul>
                </div>
                <div class="col-xs-4 col-lg-4">
                    <ul><li>
                        <?php echo form_label('&nbsp;').form_dropdown('ecor_date_year',$yearListed,'',' id="ecor_date_year"') ?>
                    </li></ul>
                </div>
                <div class="col-xs-6 col-lg-3 col-md-6">
                    <ul><li>
                        <?= form_label('Status','','for="ecorstatus"').form_dropdown('ecor_status',$ecoimpact_status,'','id="ecor_status"') ?>
                    </li></ul>
                </div>
            </div>
            <div class="col-xs-12 col-lg-12 col-md-12 tooltip">
                <ul><li>
                    <?= form_label('Remarks').form_textarea('ecor_remarks','','id="ecor_remarks"') ?>
                    <span class="tooltiptext">Final results and recommendation are the information that may be inputted under the remarks</span>
                </li></ul>
            </div> 
            <div class="col-xs-12 ">
                <a type="text" class="btn btn-primary" id="addecorresult">Add Ecotourism Results</a>
            </div>
            <div class="col-xs-12 "><br>
                <div class="table-responsive text-nowrap" style="overflow-x:auto;">
                    <table id="tblaecorresult" class="content-table" style="z-index: 100">
                        <thead>
                            <tr>
                                <th colspan="6" style="text-align: center; font-size: 24px">Ecotourism Result</th>
                            </tr>
                            <tr class="text-nowrap">                                        
                                <th>Filename</th>
                                <th>Attachement</th>
                                <th>Dated</th>
                                <th>Status</th>
                                <th>Remarks</th>
                                <th>Action</th>
                            </tr>                                              
                        </thead>
                        <tbody id="tbodyecorresult1"></tbody>
                    </table>                                                
                </div>
            </div> 
        </div>
    </div>
</div>