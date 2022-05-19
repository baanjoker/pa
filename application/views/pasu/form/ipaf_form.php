<div class="tab-pane" id="ipaf">
    <div class="form-style-6">
        <h2>Integrated Protected Area Fund (IPAF)</h2>
    </div>
    <div class="col-xs-12">
        <!-- <div class="tab">
            <a class="tablinkipaf active" onclick="tabipaf(event, 'incomes')">Physical Report of Operation, and Actual Income</a>
        </div> -->
    </div>
    <div id="incomes" class="tabcontentipaf" style="display:block">
        <div class="tab">
            <a class="tablinkipaf2 active" onclick="tabipaf2(event, 'physicaltab')" id="loadphysicalre">Physical and Financial Report of Operation</a>
            <a class="tablinkipaf2" onclick="tabipaf2(event, 'incometab')" id="loadincomeid">Actual Income</a>
            <a class="tablinkipaf2" onclick="tabipaf2(event, 'previncometab')" id="loadingprevinc">Disbursement</a>
            <!-- <a class="tablinkipaf2" onclick="tabipaf2(event, 'disbursement')" id="loaddisburstment">Disbursement</a> -->
        </div>
        <div id="disbursement" class="tabcontentipaf2" style="display:none">        
    </div>
        <div id="physicaltab" class="tabcontentipaf2" style="display:block">
            <?php echo form_input('physical_code','','id="physical_code" class="hidden"') ?>
            <fieldset>
                <div class="col-xs-12 col-lg-12">
                    <div class="col-xs-12 col-lg-4">
                        <ul><li>
                            <?php echo form_label('Select Year').form_dropdown('phyquarteryear2',$yearListed,'','id="phyquarteryear2"') ?>
                        </li></ul>
                    </div>
                </div>
                <fieldset>
                     <div class="col-xs-12 col-lg-12">
                        <div class="col-xs-12 col-lg-4">
                            <ul><li>
                                <?php echo form_label('Program/Activity/Project (PAP)').form_textarea('progactproj','','id="progactproj"') ?>
                            </li></ul>
                        </div>   
                        <div class="col-xs-12 col-lg-4">
                            <ul><li>
                                <?php echo form_label('Performance Indicator').form_textarea('physical_perindicator','','id="physical_perindicator"') ?>
                            </li></ul>
                        </div>             
                        <div class="col-xs-12 col-lg-4">
                            <div class="col-xs-12 col-lg-12">
                                <ul><li>
                                    <?php echo form_label('Cost (Php)').form_input('physicalcost','','id="physicalcost" class="number-separator"') ?>
                                </li></ul>
                            </div>
                            <div class="col-xs-12 col-lg-12">
                                <ul><li>
                                    <?php echo form_label('Quantity').form_input('pap_quantity','','id="pap_quantity" class="number-separator"') ?>
                                </li></ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-12 hidden">
                        <div class="col-xs-12 col-lg-12">
                            <ul><li>
                                <?php echo form_label('Performance Measures').form_textarea('physicalpermeasure','','id="physicalpermeasure"') ?>
                            </li></ul>
                        </div>
                        <div class="col-xs-1 col-lg-1">
                            <a type="text" class="btn btn-warning" id="addpeformancemeasures">Add Performance Measures</a>
                        </div>
                        <div class="col-xs-12 col-lg-12">
                            <div class="table-responsive large-tables">
                                <table id="tblperformancemeasure" class="content-table table-line-border">                               
                                    <tbody id="tbodyperformancemeasure"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>                    
                </fieldset>
                <div class="col-xs-12 col-lg-12">
                    <fieldset>
                        <?= form_label('Upload Approved Utilization <i>(*.pdf format, maximum size of 50MB)</i>','','for="approveutilization"')?>
                        <input type='file' name="approveutilization" id="approveutilization" onchange="readURLapputilizeFile(this);" />
                        <input type="hidden" name="approveutilization_span" id="approveutilization_span">
                        <div id="uploadapproveutilization"></div>
                    </fieldset>
                </div>
                <div class="col-xs-12 col-lg-12">
                    <fieldset>
                        <?= form_label('Upload Approved Work and Financial Plan <i>(*.pdf format, maximum size of 50MB)</i>','','for="mfofile"')?>
                        <input type='file' name="mfofile" id="mfofile" onchange="readURLMFOFile(this);" />
                        <input type="hidden" name="old_mfofile" id="old_mfofile">
                        <div id="uploadmfofile"></div>
                    </fieldset>
                </div>
                <div class="col-xs-12 col-lg-12">
                    <fieldset>
                        <?= form_label('Upload Form BAR 1 <i>(*.pdf format, maximum size of 50MB)</i>','','for="far4file"')?>
                        <input type='file' name="far4file" id="far4file" onchange="readURLBAR1ile(this);" />
                        <input type="hidden" name="far4file_span" id="far4file_span">
                        <div id="uploadfar4file"></div>
                    </fieldset>
                </div>
                <div class="col-xs-12 col-lg-12">
                    <ul><li>
                        <?php echo form_label('Remarks').form_textarea('physicalremarks','','id="physicalremarks"') ?>
                    </li></ul>
                </div>
                <div class="col-xs-1 col-lg-1">
                    <a type="text" class="btn btn-primary" id="addphysicalreport">Add data</a>
                </div>
                <div class="col-xs-12 col-lg-12">
                    <div class="table-responsive large-tables">
                        <table id="tblphysicalreportform" class="content-table table-line-border">
                            <thead>
                                <tr>
                                    <th colspan="78" style="text-align: center; font-size: 24px">Physical Report of Operation</th>
                                </tr>
                                <tr>
                                    <th rowspan="2">Program/Activity/Project (MFO)</th>
                                    <th rowspan="2">Performance Indicator</th>
                                    <th rowspan="2">Cost</th>
                                    <th rowspan="2">Quantity</th>
                                    <th colspan="17" style="background-color:#944dff">Physical Target</th>
                                    <th colspan="18" style="background-color:#ff5c33">Physical Accomplishment</th>
                                    <th colspan="17" style="background-color:#944dff">Financial Target</th>
                                    <th colspan="17" style="background-color:#ff5c33">Financial Accomplishment</th>
                                </tr>
                                
                                <tr>
                                    <th style="background-color:#944dff">Jan</th>
                                    <th style="background-color:#944dff">Feb</th>
                                    <th style="background-color:#944dff">Mar</th>
                                    <th style="background-color:#944dff">1Q </th>
                                    <th style="background-color:#944dff">Apr</th>
                                    <th style="background-color:#944dff">May</th>
                                    <th style="background-color:#944dff">Jun</th>
                                    <th style="background-color:#944dff">2Q </th>
                                    <th style="background-color:#944dff">Jul</th>
                                    <th style="background-color:#944dff">Aug</th>
                                    <th style="background-color:#944dff">Sep</th>
                                    <th style="background-color:#944dff">3Q </th>
                                    <th style="background-color:#944dff">Oct</th>
                                    <th style="background-color:#944dff">Nov</th>
                                    <th style="background-color:#944dff">Dec</th>
                                    <th style="background-color:#944dff">4Q </th>
                                    <th style="background-color:#944dff">ANNUAL </th>
                                    <th style="background-color:#ff5c33">Jan</th>
                                    <th style="background-color:#ff5c33">Feb</th>
                                    <th style="background-color:#ff5c33">Mar</th>
                                    <th style="background-color:#ff5c33">1Q </th>
                                    <th style="background-color:#ff5c33">Apr</th>
                                    <th style="background-color:#ff5c33">May</th>
                                    <th style="background-color:#ff5c33">Jun</th>
                                    <th style="background-color:#ff5c33">2Q </th>
                                    <th style="background-color:#ff5c33">Jul</th>
                                    <th style="background-color:#ff5c33">Aug</th>
                                    <th style="background-color:#ff5c33">Sep</th>
                                    <th style="background-color:#ff5c33">3Q </th>
                                    <th style="background-color:#ff5c33">Oct</th>
                                    <th style="background-color:#ff5c33">Nov</th>
                                    <th style="background-color:#ff5c33">Dec</th>
                                    <th style="background-color:#ff5c33">4Q </th>
                                    <th style="background-color:#ff5c33">ANNUAL </th>
                                    <th style="background-color:#ff5c33">% ANNUAL ACCOMPLISHED </th>

                                    <th style="background-color:#944dff">Jan</th>
                                    <th style="background-color:#944dff">Feb</th>
                                    <th style="background-color:#944dff">Mar</th>
                                    <th style="background-color:#944dff">1Q </th>
                                    <th style="background-color:#944dff">Apr</th>
                                    <th style="background-color:#944dff">May</th>
                                    <th style="background-color:#944dff">Jun</th>
                                    <th style="background-color:#944dff">2Q </th>
                                    <th style="background-color:#944dff">Jul</th>
                                    <th style="background-color:#944dff">Aug</th>
                                    <th style="background-color:#944dff">Sep</th>
                                    <th style="background-color:#944dff">3Q </th>
                                    <th style="background-color:#944dff">Oct</th>
                                    <th style="background-color:#944dff">Nov</th>
                                    <th style="background-color:#944dff">Dec</th>
                                    <th style="background-color:#944dff">4Q </th>
                                    <th style="background-color:#944dff">ANNUAL </th>
                                    <th style="background-color:#ff5c33">Jan</th>
                                    <th style="background-color:#ff5c33">Feb</th>
                                    <th style="background-color:#ff5c33">Mar</th>
                                    <th style="background-color:#ff5c33">1Q </th>
                                    <th style="background-color:#ff5c33">Apr</th>
                                    <th style="background-color:#ff5c33">May</th>
                                    <th style="background-color:#ff5c33">Jun</th>
                                    <th style="background-color:#ff5c33">2Q </th>
                                    <th style="background-color:#ff5c33">Jul</th>
                                    <th style="background-color:#ff5c33">Aug</th>
                                    <th style="background-color:#ff5c33">Sep</th>
                                    <th style="background-color:#ff5c33">3Q </th>
                                    <th style="background-color:#ff5c33">Oct</th>
                                    <th style="background-color:#ff5c33">Nov</th>
                                    <th style="background-color:#ff5c33">Dec</th>
                                    <th style="background-color:#ff5c33">4Q </th>
                                    <th style="background-color:#ff5c33">ANNUAL </th>
                                </tr>
                            </thead>
                            <tbody id="tbodyphysicalreportform"></tbody>
                        </table>
                    </div>
                </div>
            </fieldset>
        </div>
        <div id="previncometab" class="tabcontentipaf2" style="display:none">
            <div style="display: none;">
                <fieldset>
                    <div class="col-xs-12 col-lg-12">
                        <div class="col-xs-12 col-lg-4">
                            <ul><li>
                                <?php echo form_label('Select Year').form_dropdown('prevYear',$yearListed,'','id="prevYear"') ?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-12">
                        <div class="col-xs-12 col-lg-4">
                            <ul><li>
                                <?php echo form_label('Annual Income(Php)').form_input('prevAnnualIncome','','id="prevAnnualIncome" class="number-separator"') ?>
                            </li></ul>
                        </div>
                        <div class="col-xs-12 col-lg-4">
                            <ul><li>
                                <?php echo form_label('Starting Balance(Php)').form_input('prevstartingbalance','','id="prevstartingbalance" class="number-separator"') ?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-12 hidden">
                        <div class="col-xs-12 col-lg-4">
                            <ul><li>
                                <?php echo form_label('Income Deposited with AGDB<br><i style="font-size:10px">(PA-RIA-Based on Bank Statement of Account/Deposit Slips)</i>').form_input('incomedepAGDB','','id="incomedepAGDB" class="number-separator"') ?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-12">
                        <ul><li>
                            <?php echo form_label('Remarks').form_textarea('prevAnnualIncomeremarks','','id="prevAnnualIncomeremarks"') ?>
                        </li></ul>
                    </div>
                    <div class="col-xs-12 col-lg-12">
                        <fieldset>
                            <?= form_label('Uploading of RIA Deposit Slip and List of Deposited Collection <i>(*.pdf format, maximum size of 50MB)</i>','','for="riadepositfileprev"')?>
                            <input type='file' name="riadepositfileprev" id="riadepositfileprev" onchange="readURLRAIFilePrevIncome(this);" />
                            <input type="hidden" name="old_riadepositfileprev" id="old_riadepositfileprev">
                            <div id="uploadriadepositfilefileprev"></div>
                        </fieldset>
                    </div>
                    <div class="col-xs-12 col-lg-12">
                        <fieldset>
                            <?= form_label('Uploading of SAGF BTr Certificate and On-Coll Deposit Slip<i>(*.pdf format, maximum size of 50MB)</i>','','for="sagfbtrfileprev"')?>
                            <input type='file' name="sagfbtrfileprev" id="sagfbtrfileprev" onchange="readURLSAGFBTRPrevFile(this);" />
                            <input type="hidden" name="old_sagfbtrfileprev" id="old_sagfbtrfileprev">
                            <div id="uploadsagfbtrfilefileprev"></div>
                        </fieldset>
                    </div>
                    <div class="col-xs-12 col-lg-12">
                       <div class="col-xs-1 col-lg-1">
                           <a type="text" class="btn btn-primary" id="addactualincomeprevyr">Add data</a>
                       </div>
                       <div class="col-xs-12 col-lg-12">
                           <div class="table-responsive large-tables">
                               <table id="tblactualincomeprevform" class="content-table table-line-border">
                                   <thead>
                                       <tr>
                                           <th colspan="6" style="text-align: center; font-size: 24px">Previous Annual Income (₱)</th>
                                       </tr>
                                       <tr>
                                           <th>Year</th>
                                           <th>Annual Income</th>                                       
                                           <th>Starting Balance</th>                                       
                                           <th>75% PA-RIA</th>                                       
                                           <th>25% SAGF</th>                                       
                                           <th>Action</th>
                                       </tr>                                   
                                   </thead>
                                   <tbody id="tbodypreviousincomeform"></tbody>
                                   <tbody id="tbodyactualincomeform2"></tbody>
                               </table>
                           </div>
                       </div>
                   </div>
                </fieldset>
            </div>
            <fieldset>
                <legend>DISBURSEMENT</legend>
                <div class="col-xs-12 col-lg-12">
                    <div class="col-xs-4 tooltip">
                        <ul><li>
                            <?php echo form_label('Year').form_dropdown('disburse_year',$yearListed,'','id="disburse_year"'); ?>
                            <span class="tooltiptext">Fiscal Year of Financial Transaction</span>
                        </li></ul>
                    </div> 
                    <div class="col-xs-4 tooltip">
                        <ul><li>
                            <?php echo form_label('Starting Balance (Previous year)').form_input('remaining_balance','','id="remaining_balance" class="number-separator calcannualdisbursement"') ?>
                        </li></ul>
                    </div>
                </div>
                <div class="col-xs-12 col-lg-12">
                    <div class="col-xs-4 tooltip">
                        <ul><li>
                            <?php echo form_label('Annual Income').form_input('actual_income_annuals','','id="actual_income_annuals" class="number-separator calcannualdisbursement"') ?>
                        </li></ul>
                    </div>
                    <div class="col-xs-4 tooltip">
                        <ul><li>
                            <?php echo form_label('Disbursement(Auto generate)').form_input('annual_disbursements','','id="annual_disbursements" class="number-separator calcannualdisbursement"') ?>
                        </li></ul>
                    </div>
                    <div class="col-xs-4 tooltip">
                        <ul><li>
                            <?php echo form_label('Balance(Auto generate)').form_input('annual_balances','','id="annual_balances" class="number-separator calcannualdisbursement"') ?>
                        </li></ul>
                    </div>
                </div>
                <div class="col-xs-4 tooltip" id="hideselectionsubparia" style="display: none;">
                    <ul><li>
                        <?php echo form_label('75% Old Subfund/PA-RIA').form_dropdown('oldsubparia',$oldsubpariaListed,'','id="oldsubparia"'); ?>
                        <span class="tooltiptext">Select Old Subfund/PA-RIA</span>
                    </li></ul>
                </div> 
                <div class="col-xs-12 col-lg-12" id="hidediv2015below" style="display: none;">
                    <fieldset>
                        <legend>75% Old Subfund</legend>
                        <div class="col-xs-12 col-lg-12">
                            <div class="col-xs-4 tooltip hidden">
                                <ul><li>
                                    <?php echo form_label('Annual Income').form_input('actual_income_oldsub','','id="actual_income_oldsub" class="number-separator calcbalanceoldsub"') ?>
                                    <span class="tooltiptext">Input Annual Income</span>
                                </li></ul>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-12">
                            <div class="col-xs-4 tooltip">
                                <ul><li>
                                    <?php echo form_label('Running balance(Auto generate)').form_input('running_balance2015','','id="running_balance2015" class="number-separator" calcannualdisbursement') ?>
                                    <span class="tooltiptext">Input Annual Income</span>
                                </li></ul>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-12">
                            <div class="col-xs-4 tooltip">
                                <ul><li>
                                    <?php echo form_label('75% Income old subfund').form_input('subfund_disbursement_income','','id="subfund_disbursement_income" class="number-separator calcannualdisbursement"') ?>
                                    <span class="tooltiptext">Input income C.Y. 2015 and below</span>
                                </li></ul>
                            </div>
                            <div class="col-xs-4 tooltip">
                                <ul><li>
                                    <?php echo form_label('Disbursement').form_input('subfund_disbursement','','id="subfund_disbursement" class="number-separator calcannualdisbursement calctotaldisbursement"') ?>
                                    <span class="tooltiptext">Input disbursement on 75% old subfund C.Y. 2015 and below</span>
                                </li></ul>
                            </div>
                            <div class="col-xs-4 tooltip">
                                <ul><li>
                                    <?php echo form_label('Balance(Auto generate)').form_input('subfund_balance','','id="subfund_balance" class="number-separator"') ?>
                                    <span class="tooltiptext">Input balance on 75% old subfund C.Y. 2015 and below <i>(If leave blank, auto-generate 75% old subfund balance)</i></span>
                                </li></ul>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="col-xs-12 col-lg-12" id="hidediv2016above" style="display: none;">
                    <fieldset>
                        <legend>75% Protected Area-Retained Income Account (PA-RIA)</legend>
                        <div class="col-xs-12 col-lg-12">
                            <div class="col-xs-4 tooltip">
                                <ul><li>
                                    <?php echo form_label('Running balance(Auto generate)').form_input('running_balance2016','','id="running_balance2016" class="number-separator calcannualdisbursement"') ?>
                                    <span class="tooltiptext">Input Annual Income</span>
                                </li></ul>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-12">
                            <div class="col-xs-4 tooltip">
                                <ul><li>
                                    <?php echo form_label('75% Actual Income').form_input('income_paria','','id="income_paria" class="number-separator calcannualdisbursement"') ?>
                                    <span class="tooltiptext">Input 75% PARIA annual income</span>
                                </li></ul>
                            </div>
                            <div class="col-xs-4 tooltip">
                                <ul><li>
                                    <?php echo form_label('Disbursement').form_input('paria','','id="paria" class="number-separator calcannualdisbursement"') ?>
                                    <span class="tooltiptext">Input disbursement on 75% PARIA</span>
                                </li></ul>
                            </div>
                            <div class="col-xs-4 tooltip">
                                <ul><li>
                                    <?php echo form_label('Balance(Auto generate)').form_input('paria_balance','','id="paria_balance" class="number-separator"') ?>
                                    <span class="tooltiptext">Input balance on 75% PARIA <i>(If leave blank, auto-generate 75% old subfund balance)</i></span>
                                </li></ul>
                            </div>
                        </div>                        
                    </fieldset>
                </div>
                <div class="col-xs-12 col-lg-12" id="hidedivsagf" style="display: none;">
                    <fieldset>
                        <legend>25% Special Account in the General Fund (SAGF)</legend>
                        <div class="col-xs-12 col-lg-12">
                            <div class="col-xs-4 tooltip">
                                <ul><li>
                                    <?php echo form_label('Running balance(Auto generate)').form_input('running_balancesagf','','id="running_balancesagf" class="number-separator" calcannualdisbursement') ?>
                                    <span class="tooltiptext">Input Annual Income</span>
                                </li></ul>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-12">
                            <div class="col-xs-4 tooltip">
                                <ul><li>
                                    <?php echo form_label('25% Actual Income').form_input('income_sagfs','','id="income_sagfs" class="number-separator calcannualdisbursement"') ?>
                                    <span class="tooltiptext">Input 25% SAGF annual income</span>
                                </li></ul>
                            </div>
                            <div class="col-xs-4 tooltip">
                                <ul><li>
                                    <?php echo form_label('Disbursement').form_input('sagf','','id="sagf" class="number-separator calcannualdisbursement calctotaldisbursement"') ?>
                                    <span class="tooltiptext">Input disbursement on 25% SAGF</span>
                                </li></ul>
                            </div>
                            <div class="col-xs-4 tooltip">
                                <ul><li>
                                    <?php echo form_label('Balance(Auto generate)').form_input('sagf_balance','','id="sagf_balance" class="number-separator"') ?>
                                    <span class="tooltiptext">Input balance on 25% SAGF <i>(If leave blank, auto-generate 75% old subfund balance)</i></span>
                                </li></ul>
                            </div>
                        </div>                        
                    </fieldset>
                </div>
                <div class="col-xs-12 col-lg-12">
                    <fieldset>
                    <div class="col-xs-12">
                        <!-- <ul><li> -->
                            <label>Upload copy of approved WFP PA-RIA<i>(*.pdf,*.csv, minimum size of 50MB)</i></label>
                            <input type='file' name="disburseparia" id="disburseparia" onchange="readURLdisbureparia(this);"/>
                            <input id="disburseparia_span" name="disburseparia_span" type="hidden" />
                            <div id="loadingwfpparia"></div>
                        <!-- </li></ul> -->
                    </div>
                    <div class="col-xs-12">
                        <!-- <ul><li> -->
                            <label>Upload copy of approved WFP SAGF<i>(*.pdf,*.csv, minimum size of 50MB)</i></label>
                            <input type='file' name="disbursesagf" id="disbursesagf" onchange="readURLdisburesagf(this);"/>
                            <input id="disbursesagf_span" name="disbursesagf_span" type="hidden" />
                            <div id="loadingwfpsagf"></div>
                        <!-- </li></ul> -->
                    </div>
                    </fieldset>
                </div>
                <div class="col-xs-12 col-lg-12 hidden">
                    <fieldset>
                        <legend>Total</legend>
                        <div class="col-xs-12">
                            <ul><li>
                                <?php echo form_label(' ').form_input('disrusetotal','','id="disrusetotal" onkeyup="run(this)"') ?>
                            </li></ul>
                        </div>
                    </fieldset>
                </div>
                <div class="col-xs-12">
                    <a type="text" id="adddisbursementfiles"class="btn btn-primary">Add data</a>                              
                </div>
                <div class="col-xs-12 col-lg-12" style="overflow-x:auto;">
                    <!-- <div class="table-responsive large-tables"> -->
                        <table id="tableIncomeDisbursement" class="content-table table-line-border">
                            <thead>
                                <tr>
                                    <th colspan="15"><span id="title_disburse"></span></th>
                                </tr>
                                <tr>
                                    <th rowspan="2" style="text-align: center">Year Disbursed</th>
                                    <th colspan="3" style="text-align: center">Total</th>
                                    <th colspan="3" style="text-align: center">Old IPAF Sub-Fund<br>(75% Prior to PA-RIA)</th>
                                    <th colspan="3" style="text-align: center">Protected Area-Retained Income Account<br>(75% Current Bank Deposits)</th>
                                    <th colspan="3" style="text-align: center">IPAF-Special Account in the General Fund<br>(25% Central Fund)</th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <th>Receipt</th>
                                    <th>Disbursement</th>
                                    <th>Balance</th>
                                    <th>Receipt</th>
                                    <th>Disbursement</th>
                                    <th>Balance</th>
                                    <th class="hidden">Annual Income</th>
                                    <th>Receipt</th>
                                    <th>Disbursement</th>
                                    <th>Balance</th>
                                    <th>Receipt</th>
                                    <th>Disbursement</th>
                                    <th>Balance</th>
                                    <th style="text-align: center">Action</th>
                                </tr>
                            </thead>
                            <tbody id="tbodydisbusermentfile"></tbody>                               
                        </table>                            
                        <table id="tableIncomeDisbursement_sample" class="content-table">                                   
                            <tbody id="tbodydisbusermentfile_sample"></tbody>                              
                        </table><hr>
                    <!-- </div>   -->
                 </div>
            </fieldset>
        </div>
        <div id="incometab" class="tabcontentipaf2" style="display:none">
            <div class="tab-second">
                <a class="tablinkipaf22 active" onclick="tabipaf22(event, 'incometabs2')">Income</a>
                <a class="tablinkipaf22" onclick="tabipaf22(event, 'certificatetab')" id="loadincomeid">Certificate</a>
            </div>
            <div id="incometabs2" class="tabcontentipaf22" style="display:block">
                <input type="hidden" name="incomegens-gencode" id="incomegens-gencode">
                <div class="col-xs-12 col-lg-3">
                    <ul><li>
                        <?php echo form_label('Select Quarter').form_dropdown('phyquarterincome',$quarter,'','id="phyquarterincome"') ?>
                    </li></ul>
                </div>
                <div class="col-xs-12 col-lg-3">
                    <ul><li>
                        <?php echo form_label('Select Month').form_dropdown('phyquartermonth','','','id="phyquartermonth"') ?>
                    </li></ul>
                </div>
                <div class="col-xs-12 col-lg-3">
                    <ul><li>
                        <?php echo form_label('Select Day').form_dropdown('phyquarteday',$dayList,'','id="phyquarteday"') ?>
                    </li></ul>
                </div>
                <div class="col-xs-12 col-lg-3">
                    <ul><li>
                        <?php echo form_label('Select Year').form_dropdown('phyquarteryear',$yearListed,'','id="phyquarteryear"') ?>
                    </li></ul>
                </div>
                <div class="col-xs-12 col-lg-12">
                    <fieldset>
                    <legend>Income from Operations <i>(Subject to 75% PA-RIA Deposit and 25% SAGF Remittance to BTr)</i></legend>
                        <div class="col-xs-12 col-lg-4 tooltip">
                            <ul><li>
                                <?php echo form_label('Entrance fee (Php)').form_input('ipafentrancefee','','id="ipafentrancefee" class="number-separator"') ?>
                                <span class="tooltiptext">Fees to enter in a protected area for purposes of sight-seeing in designated visitor areas, amateur videography and photography, use of common facilities i.e. comfort room, visitor center, view deck</span>
                            </li></ul>
                        </div>
                        <div class="col-xs-12 col-lg-4 tooltip">
                            <ul><li>
                                <?php echo form_label('Facilities User Fee (Php)').form_input('ipaffacilityfee','','id="ipaffacilityfee" class="number-separator"') ?>
                                <span class="tooltiptext">Fees for the use of protected area man-made facilities including short-term rentals of land or facilities</span>
                            </li></ul>
                        </div>
                        <div class="col-xs-12 col-lg-4 tooltip">
                            <ul><li>
                                <?php echo form_label('Recreational Fee (Php)').form_input('ipafrecreationalfee','','id="ipafrecreationalfee" class="number-separator"') ?>
                                <span class="tooltiptext">Fees for the conduct of certain recreational activities i.e. swimming, snorkeling, hiking, biking, trekking, mountain climbing, caving, scuba diving, rafting, etc. including fees for commercial documentation and photography and rentals of devices and equipment</span>
                            </li></ul>
                        </div>
                        <div class="col-xs-12 col-lg-4 tooltip">
                            <ul><li>
                                <?php echo form_label('Resource User Fee (Php)').form_input('ipafresourcefee','','id="ipafresourcefee" class="number-separator"') ?>
                                <span class="tooltiptext">Is a fee paid for the sustainable commercial use of a specified quantity of resources within protected area over a specified period of time. </span>
                            </li></ul>
                        </div>
                        <div class="col-xs-12 col-lg-4 tooltip">
                            <ul><li>
                                <?php echo form_label('SAPA Fee (Php)').form_input('ipafsapafee','','id="ipafsapafee" class="number-separator"') ?>
                                <span class="tooltiptext">Is a fee paid by a proponent for the use and development of land, water and ecosystem resources or facilities within the Multiple Use Zones of the protected area, subject to compliance with the requirements of the PAMP and the EIS System. </span>
                            </li></ul>
                        </div>
                        <div class="col-xs-12 col-lg-4 tooltip">
                            <ul><li>
                                <?php echo form_label('MOA Fee (Php)').form_input('ipafmoafee','','id="ipafmoafee" class="number-separator"') ?>
                                <span class="tooltiptext">Is a fee paid by a proponent for the use and development of land, water and ecosystem resources or facilities within the Multiple Use Zones of the protected area, subject to compliance with the requirements of the PAMP and the EIS System. </span>
                            </li></ul>
                        </div>
                        <div class="col-xs-12 col-lg-4 tooltip">
                            <ul><li>
                                <?php echo form_label('Revenue-Sharing Agreements  (Php)').form_input('ipafrsafee','','id="ipafrsafee" class="number-separator"') ?>
                                <span class="tooltiptext">Are government share from the implementation of eligible projects and activities with other parties that conforms with the objectives of the protected area and its Management Plan</span>
                            </li></ul>
                        </div>
                        <div class="col-xs-12 col-lg-4 tooltip">
                            <ul><li>
                                <?php echo form_label('Clearance, License, Permit, Admin Fee (Php)').form_input('ipafclearancefee','','id="ipafclearancefee" class="number-separator"') ?>
                                <span class="tooltiptext">Are fees paid for the issuance of clearances, licenses, permits, including admin fees through PAMB resolution or existing DENR policies</span>
                            </li></ul>
                        </div>
                        <div class="col-xs-12 col-lg-12">
                            <fieldset>
                                <legend>Other fees</legend>
                                <div class="col-xs-12 col-lg-6 tooltip">
                                    <ul><li>
                                        <?php echo form_label('Amount (Php)').form_input('ipafincomeotherfee','','id="ipafincomeotherfee" class="number-separator"') ?>
                                        <span class="tooltiptext">Other fees as identified by the DENR or the PAMB</span>
                                    </li></ul>
                                </div>
                                <div class="col-xs-12 col-lg-6">
                                    <ul><li>
                                        <?php echo form_label('Specify Others').form_input('ipafincomeotherfee_desc','','id="ipafincomeotherfee_desc"') ?>
                                    </li></ul>
                                </div>
                                <div class="col-xs-12 col-lg-12">
                                    <div class="col-xs-1 col-lg-1">
                                        <a type="text" class="btn btn-warning" id="addotherincomespecify">Add other income</a>
                                    </div>
                                    <div class="col-xs-12 col-lg-12">
                                        <div class="table-responsive large-tables">
                                            <table id="tblincomeotherspec" class="content-table">
                                                <thead>
                                                </thead>
                                                <tbody id="tbodyincomeotherspec"></tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </fieldset>
                </div>
                <div class="col-xs-12 col-lg-12">                
                    <fieldset>
                    <legend>Other Income Sources <i>(100% PA-RIA Deposit)</i></legend>   
                        <fieldset>
                            <div class="col-xs-12 col-lg-4 tooltip">
                               <ul><li>
                                   <?php echo form_label('Grant (Php)').form_input('ipafgrantfee','','id="ipafgrantfee" class="number-separator"') ?>
                                   <span class="tooltiptext">All non-repayable transfers received from other levels of government, or from private individuals, or institutions, foreign or domestic, including reparations and gifts given for particular projects or programs, or for general budget support.<br>(from NEP Glossary)</span>
                               </li></ul>
                            </div>
                            <div class="col-xs-12 col-lg-8">
                               <ul><li>
                                   <?php echo form_label('Source').form_input('ipafgrantfee_source','','id="ipafgrantfee_source"') ?>
                               </li></ul>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="col-xs-12 col-lg-4 tooltip">
                               <ul><li>
                                   <?php echo form_label('Endowment (Php)').form_input('ipafendowmentfee','','id="ipafendowmentfee" class="number-separator"') ?>
                                   <span class="tooltiptext">Gift of money or income producing property to a public organization for a specific purpose. For IPAF, the endowed asset is kept intact and only the income generated by it is utilized.<br>(from http://www.businessdictionary.com/definition/endowment.html)</span>
                               </li></ul>
                            </div>
                            <div class="col-xs-12 col-lg-8">
                               <ul><li>
                                   <?php echo form_label('Source').form_input('ipafendowmentfee_source','','id="ipafendowmentfee_source"') ?>
                               </li></ul>
                            </div>
                        </fieldset>                 
                        <fieldset>
                            <div class="col-xs-12 col-lg-4 tooltip">
                                <ul><li>
                                    <?php echo form_label('Trust Receipts').form_dropdown('ipaffinesfee_dd',$finespelaltiesdamages,'','id="ipaffinesfee_dd"') ?>
                                    <span class="tooltiptext">Incidental revenues from violation, court decisions, and damages to the protected area</span>
                                </li></ul>
                            </div>
                            <div class="col-xs-12 col-lg-4" id="finepenaldamgdivother" style="display: none;">
                                <ul><li>
                                    <?php echo form_label('Specify others').form_input('ipaffinesfee_others','','id="ipaffinesfee_others"') ?>
                                </li></ul>
                            </div>
                            <div class="col-xs-12 col-lg-4">
                               <ul><li>
                                   <?php echo form_label('Amount (Php)').form_input('ipaffinesfee','','id="ipaffinesfee" class="number-separator"') ?>
                               </li></ul>
                            </div>
                            <div class="col-xs-12 col-lg-4">
                               <ul><li>
                                   <?php echo form_label('Source').form_input('ipaffinesfee_source','','id="ipaffinesfee_source"') ?>
                               </li></ul>
                            </div>
                            <div class="col-xs-12 col-lg-12">
                                <a type="text" class="btn btn-warning" id="addpenaltyfinesdmg">Add Fines/Penalties/Damage</a>
                            </div>
                            <div class="col-xs-12 col-lg-12">
                                <div class="table-responsive large-tables">
                                    <table id="tblfinepenaltydamages" class="content-table">
                                        <thead>
                                        </thead>
                                        <tbody id="tbodyfinepenaltydamages"></tbody>
                                    </table>
                                </div>
                            </div>
                        </fieldset>
                        
                        <div class="col-xs-12 col-lg-12">
                            <fieldset>
                                <legend>Donation<i>(multiple)</i></legend>
                                <div class="col-xs-12 col-lg-4 tooltip">
                                    <ul><li>
                                       <?php echo form_label('Donation').form_dropdown('ipafdonationselect',$donate,'','id="ipafdonationselect"') ?>
                                       <span class="tooltiptext">These are voluntary transfers of assets, including cash or other monetary assets, goods in-kind and services in-kind that one entity makes to another, normally free from stipulations. The transferor may be an entity or an individual. For gifts and donations of cash or other monetary assets and goods in-kind, the past event giving rise to the control of resources embodying future economic benefits or service potential is normally the receipt of the gift or donation.<br>(from GAM Volume I, Chapter 5)</span>
                                    </li></ul>
                                </div>
                                <div class="col-xs-12 col-lg-4" id="donatecashdiv" style="display:none">
                                    <ul><li>
                                       <?php echo form_label('Amount (Php)').form_input('ipafdonationcash','','id="ipafdonationcash" class="number-separator"') ?>
                                    </li></ul>
                                </div>
                                <div class="col-xs-12 col-lg-12" id="inkinddiv" style="display:none">
                                    <div class="col-xs-12 col-lg-12">
                                        <ul><li>
                                           <?php echo form_label('Book value').form_input('ipafinkindbookvalue','','id="ipafinkindbookvalue"') ?>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-12 col-lg-12">
                                        <ul><li>
                                           <?php echo form_label('Description').form_textarea('ipafinkinddesc','','id="ipafinkinddesc"') ?>
                                        </li></ul>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-lg-12">
                                    <ul><li>
                                       <?php echo form_label('Source').form_textarea('ipafinkindsource','','id="ipafinkindsource"') ?>
                                    </li></ul>
                                </div>
                                <div class="col-xs-12 col-lg-12">
                                    <div class="col-xs-1 col-lg-1">
                                        <a type="text" class="btn btn-warning" id="adddonation">Add donation</a>
                                    </div>
                                    <div class="col-xs-12 col-lg-12">
                                        <div class="table-responsive large-tables">
                                            <table id="tbldonateform" class="content-table">
                                                <thead>
                                                </thead>
                                                <tbody id="tbodydonateform"></tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-xs-12 col-lg-12">
                            <fieldset>
                                <legend>Other income sources</legend>
                                <div class="col-xs-12 col-lg-6">
                                   <ul><li>
                                       <?php echo form_label('Amount (Php)').form_input('ipafotherincomesourcefee','','id="ipafotherincomesourcefee" class="number-separator"') ?>
                                   </li></ul>
                                </div>
                                <div class="col-xs-12 col-lg-6">
                                   <ul><li>
                                       <?php echo form_label('Specify other income sources').form_input('ipafotherincomesourcefeespec','','id="ipafotherincomesourcefeespec"') ?>
                                   </li></ul>
                                </div>
                                <div class="col-xs-12 col-lg-12">
                                    <div class="col-xs-1 col-lg-1">
                                        <a type="text" class="btn btn-warning" id="adddonationothers">Add other income sources</a>
                                    </div>
                                    <div class="col-xs-12 col-lg-12">
                                        <div class="table-responsive large-tables">
                                            <table id="tblotherincomesourcesother" class="content-table">
                                                <thead>
                                                </thead>
                                                <tbody id="tblotherincomesourcesother"></tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <!-- <div class="col-xs-12 col-lg-12">
                            <fieldset>
                                <?= form_label('Uploading of RIA Deposit Slip and List of Deposited Collection <i>(*.pdf format, maximum size of 50MB)</i>','','for="riadepositfile"')?>
                                <input type='file' name="riadepositfile" id="riadepositfile" onchange="readURLRAIFile(this);" />
                                <input type="hidden" name="old_riadepositfile" id="old_riadepositfile">
                                <div id="uploadriadepositfilefile"></div>
                            </fieldset>
                        </div>
                        <div class="col-xs-12 col-lg-12">
                            <fieldset>
                                <?= form_label('Uploading of SAGF BTr Certificate and On-Coll Deposit Slip <i>(*.pdf format, maximum size of 50MB)</i>','','for="sagfbtrfile"')?>
                                <input type='file' name="sagfbtrfile" id="sagfbtrfile" onchange="readURLSAGFBTRFile(this);" />
                                <input type="hidden" name="old_sagfbtrfile" id="old_sagfbtrfile">
                                <div id="uploadsagfbtrfilefile"></div>
                            </fieldset>
                        </div> -->
                        <div class="col-xs-12 col-lg-12">
                            <div class="col-xs-1 col-lg-1">
                                <a type="text" class="btn btn-primary" id="addactualincome">Add data</a>
                            </div>
                            <div class="col-xs-12 col-lg-12">
                                <div class="table-responsive large-tables">
                                    <table id="tblactualincomeform" class="content-table table-line-border">
                                        <thead>
                                            <tr>
                                                <th colspan="22" style="text-align: center; font-size: 24px">Actual Income (₱)</th>
                                            </tr>
                                            <tr>
                                                <th rowspan="3">Date</th>
                                                <th colspan="10">Income from Operations (AGDB)</th>
                                                <th colspan="7">Other Income Sources (100% PA-RIA Deposit)</th>
                                                <th rowspan="3">Grand Total</th>
                                                <th rowspan="3">75% PA-RIA</th>
                                                <th rowspan="3">25% SAGF</th>
                                                <th rowspan="3">Action</th>
                                            </tr>
                                            <tr>
                                                <!-- <th>Month</th>
                                                <th>Year</th> -->
                                                <th rowspan="2">Entrance Fee</th>
                                                <th rowspan="2">Facilities User Fee</th>
                                                <th rowspan="2">Recreational Fee</th>
                                                <th rowspan="2">Resource User Fee</th>
                                                <th rowspan="2">SAPA Fee</th>
                                                <th rowspan="2">MOA Fee</th>
                                                <th rowspan="2">Revenue-Sharing Agreements</th>
                                                <th rowspan="2">Clearance, License, Permit, Admin Fee</th>
                                                <th rowspan="2">Others</th>
                                                <th rowspan="2">Sub-total</th>
                                                <th rowspan="2">Fines, Penalties, Damage Fee</th>
                                                <th colspan="2">Donation</th>
                                                <th rowspan="2">Grant</th>
                                                <th rowspan="2">Endowment</th>
                                                <th rowspan="2">Others</th>
                                                <th rowspan="3">Sub-total</th>
                                            </tr>
                                            <tr>
                                                <td>Cash</td>
                                                <td>In-kind</td>
                                            </tr>
                                        </thead>
                                        <tbody id="tbodyactualincomeform"></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
            <div id="certificatetab" class="tabcontentipaf22" style="display:none">
                <div class="tab-third">
                    <a class="tablinkipaf3 active" onclick="tabipaf3(event, 'certi1')">Monthly</a>
                    <a class="tablinkipaf3" onclick="tabipaf3(event, 'certi2')">Weekly</a>
                    <a class="tablinkipaf3" onclick="tabipaf3(event, 'certi3')">Daily</a>
                </div>
                <div id="certi1" class="tabcontentipaf3" style="display:block">
                    <fieldset>
                        <div class="col-xs-12 col-lg-12">                           
                            <div class="col-xs-6 col-lg-6">
                                <ul><li>
                                    <?= form_label('Month').form_dropdown('certi_month1',$monthList,'','id="certi_month1"') ?>
                                </li></ul>
                            </div>
                            <div class="col-xs-6 col-lg-6">
                                <ul><li>
                                    <?= form_label('Year').form_dropdown('certi_year1',$yearListed,'','id="certi_year1"') ?>
                                </li></ul>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-12">
                            <fieldset>
                                <?= form_label('Uploading of RIA Deposit Slip and List of Deposited Collection <i>(*.pdf format, maximum size of 50MB)</i>','','for="riadepositfile"')?>
                                <input type='file' name="riadepositfile" id="riadepositfile" onchange="readURLRAIFile(this);" />
                                <input type="hidden" name="old_riadepositfile" id="old_riadepositfile">
                                <div id="uploadriadepositfilefile"></div>
                            </fieldset>
                        </div>
                        <div class="col-xs-12 col-lg-12">
                            <fieldset>
                                <?= form_label('Uploading of SAGF BTr Certificate and On-Coll Deposit Slip <i>(*.pdf format, maximum size of 50MB)</i>','','for="sagfbtrfile"')?>
                                <input type='file' name="sagfbtrfile" id="sagfbtrfile" onchange="readURLSAGFBTRFile(this);" />
                                <input type="hidden" name="old_sagfbtrfile" id="old_sagfbtrfile">
                                <div id="uploadsagfbtrfilefile"></div>
                            </fieldset>
                        </div>
                        <div class="col-xs-12 col-lg-12 tooltip">
                            <ul><li>
                                <?= form_label('Remarks','','for="certi_remarks1"').form_textarea('certi_remarks1','','placeholder="Brief description" id="certi_remarks1" style="height:250px;"');?>
                                <!-- <span class="tooltiptext">Information of the map which includes but not limited to title, summary/description, author, source and date modified</span> -->
                            </li></ul>
                        </div>
                        <div class="col-xs-12 col-lg-12">
                            <div class="col-xs-1 col-lg-1">
                                <a type="text" class="btn btn-primary" id="addcertificatebymonthly">Add data</a>
                            </div>
                            <div class="col-xs-12 col-lg-12">
                                <div class="table-responsive large-tables">
                                    <table id="tblcertificatemonthly" class="content-table table-line-border">
                                        <thead>
                                            <tr>
                                                <th colspan="5" style="text-align: center; font-size: 24px">Certificate</th>
                                            </tr>
                                            <tr>
                                                <th >Date</th>
                                                <th >RIA Deposit Slip and List of Deposited Collection</th>
                                                <th >SAGF BTr Certificate and On-Coll Deposit Slip</th>
                                                <th >Remarks</th>
                                                <th >Action</th>     
                                            </tr>
                                            
                                        </thead>
                                        <tbody id="tbodycertificatemonthly"></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div id="certi2" class="tabcontentipaf3" style="display:none">
                    <fieldset>
                        <div class="col-xs-12 col-lg-12">  
                            <ul><li>
                                <label>Date Range</label><input type="text" name="datetimes" id="datetimes" />
                            </li></ul>                         
                        </div>
                        <div class="col-xs-12 col-lg-12">
                            <fieldset>
                                <?= form_label('Uploading of RIA Deposit Slip and List of Deposited Collection <i>(*.pdf format, maximum size of 50MB)</i>','','for="riadepositfile2"')?>
                                <input type='file' name="riadepositfile2" id="riadepositfile2" onchange="readURLRAIFile2(this);" />
                                <input type="hidden" name="old_riadepositfile2" id="old_riadepositfile2">
                                <div id="uploadriadepositfilefile2"></div>
                            </fieldset>
                        </div>
                        <div class="col-xs-12 col-lg-12">
                            <fieldset>
                                <?= form_label('Uploading of SAGF BTr Certificate and On-Coll Deposit Slip <i>(*.pdf format, maximum size of 50MB)</i>','','for="sagfbtrfile2"')?>
                                <input type='file' name="sagfbtrfile2" id="sagfbtrfile2" onchange="readURLSAGFBTRFile2(this);" />
                                <input type="hidden" name="old_sagfbtrfile2" id="old_sagfbtrfile2">
                                <div id="uploadsagfbtrfilefile2"></div>
                            </fieldset>
                        </div>
                        <div class="col-xs-12 col-lg-12 tooltip">
                            <ul><li>
                                <?= form_label('Remarks','','for="certi_remarks2"').form_textarea('certi_remarks2','','placeholder="Brief description" id="certi_remarks2" style="height:250px;"');?>
                                <!-- <span class="tooltiptext">Information of the map which includes but not limited to title, summary/description, author, source and date modified</span> -->
                            </li></ul>
                        </div>
                        <div class="col-xs-12 col-lg-12">
                            <div class="col-xs-1 col-lg-1">
                                <a type="text" class="btn btn-primary" id="addcertificatebyweekly">Add data</a>
                            </div>
                            <div class="col-xs-12 col-lg-12">
                                <div class="table-responsive large-tables">
                                    <table id="tblcertificateweekly" class="content-table table-line-border">
                                        <thead>
                                            <tr>
                                                <th colspan="5" style="text-align: center; font-size: 24px">Certificate</th>
                                            </tr>
                                            <tr>
                                                <th >Date</th>
                                                <th >RIA Deposit Slip and List of Deposited Collection</th>
                                                <th >SAGF BTr Certificate and On-Coll Deposit Slip</th>
                                                <th >Remarks</th>
                                                <th >Action</th>     
                                            </tr>
                                            
                                        </thead>
                                        <tbody id="tbodycertificateweekly"></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div id="certi3" class="tabcontentipaf3" style="display:none">
                    <fieldset>
                        <div class="col-xs-12 col-lg-12">  
                            <ul><li>
                                <label>Date</label><input type="text" name="datetimes2" id="datetimes2" />
                            </li></ul>                         
                        </div>
                        <div class="col-xs-12 col-lg-12">
                            <fieldset>
                                <?= form_label('Uploading of RIA Deposit Slip and List of Deposited Collection <i>(*.pdf format, maximum size of 50MB)</i>','','for="riadepositfile3"')?>
                                <input type='file' name="riadepositfile3" id="riadepositfile3" onchange="readURLRAIFile3(this);" />
                                <input type="hidden" name="old_riadepositfile3" id="old_riadepositfile3">
                                <div id="uploadriadepositfilefile3"></div>
                            </fieldset>
                        </div>
                        <div class="col-xs-12 col-lg-12">
                            <fieldset>
                                <?= form_label('Uploading of SAGF BTr Certificate and On-Coll Deposit Slip <i>(*.pdf format, maximum size of 50MB)</i>','','for="sagfbtrfile3"')?>
                                <input type='file' name="sagfbtrfile3" id="sagfbtrfile3" onchange="readURLSAGFBTRFile3(this);" />
                                <input type="hidden" name="old_sagfbtrfile3" id="old_sagfbtrfile3">
                                <div id="uploadsagfbtrfilefile3"></div>
                            </fieldset>
                        </div>
                        <div class="col-xs-12 col-lg-12 tooltip">
                            <ul><li>
                                <?= form_label('Remarks','','for="certi_remarks3"').form_textarea('certi_remarks3','','placeholder="Brief description" id="certi_remarks3" style="height:250px;"');?>
                                <!-- <span class="tooltiptext">Information of the map which includes but not limited to title, summary/description, author, source and date modified</span> -->
                            </li></ul>
                        </div>
                        <div class="col-xs-12 col-lg-12">
                            <div class="col-xs-1 col-lg-1">
                                <a type="text" class="btn btn-primary" id="addcertificatebydaily">Add data</a>
                            </div>
                            <div class="col-xs-12 col-lg-12">
                                <div class="table-responsive large-tables">
                                    <table id="tblcertificatedaily" class="content-table table-line-border">
                                        <thead>
                                            <tr>
                                                <th colspan="5" style="text-align: center; font-size: 24px">Certificate</th>
                                            </tr>
                                            <tr>
                                                <th >Date</th>
                                                <th >RIA Deposit Slip and List of Deposited Collection</th>
                                                <th >SAGF BTr Certificate and On-Coll Deposit Slip</th>
                                                <th >Remarks</th>
                                                <th >Action</th>     
                                            </tr>
                                            
                                        </thead>
                                        <tbody id="tbodycertificatedaily"></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <form method="post" action="" id="PhysicalReportForm" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-phyrep" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Physical Report of Operation</h4>
                </div>
                <input type="hidden" id="phyrep-id" name="phyrep-id" value="" />
                <input type="hidden" id="phyrep-gencode" name="phyrep-gencode" value="" />
                <input type="hidden" id="phyrep-gencode2" name="phyrep-gencode2" value="" />
                <div class="modal-body" >
                    <div class="col-xs-12 col-lg-4">
                        <ul><li>
                            <?php echo form_label('Select Quarter').form_dropdown('edit-phyquarter',$quarter,'','id="edit-phyquarter"') ?>
                        </li></ul>
                    </div>
                    <div class="col-xs-12 col-lg-4">
                        <ul><li>
                            <?php echo form_label('Select Month').form_dropdown('edit-phyquartersmonth','','','id="edit-phyquartersmonth"') ?>
                        </li></ul>
                    </div>
                    <div class="col-xs-12 col-lg-4">
                        <ul><li>
                            <?php echo form_label('Select Year').form_dropdown('edit-phyquarteryear2',$yearListed,'','id="edit-phyquarteryear2"') ?>
                        </li></ul>
                    </div>
                    <fieldset>
                        <legend>Physical Target</legend>
                        <div class="col-xs-12 col-lg-12">
                            <ul><li>
                                <?php echo form_label('Program/Activity/Project (PAP)').form_textarea('edit-progactproj','','id="edit-progactproj"') ?>
                            </li></ul>
                        </div>                        
                        <div class="col-xs-12 col-lg-12">
                            <ul><li>
                                <?php echo form_label('Cost (Php)').form_input('edit-physicalcost','','id="edit-physicalcost" class="number-separator"') ?>
                            </li></ul>
                        </div>
                        <div class="col-xs-12 col-lg-12">
                            <ul><li>
                                <?php echo form_label('Performance Measures').form_textarea('edit-physicalpermeasure','','id="edit-physicalpermeasure"') ?>
                            </li></ul>
                        </div>
                        <div class="col-xs-1 col-lg-1">
                            <a type="text" class="btn btn-warning" id="addpeformancemeasuresEdit">Add Performance Measures</a>
                        </div>
                        <div class="col-xs-12 col-lg-12">
                            <div id="performancemeasuresdiv"></div>
                        </div>
                        <div class="col-xs-12 col-lg-12">
                            <fieldset>
                                <?= form_label('Upload Approved Work and Financial Plan <i>(*.pdf format, maximum size of 50MB)</i>','','for="edit-mfofile"')?>
                                <input type='file' name="edit-mfofile" id="edit-mfofile" onchange="readURLMFOFileEdit(this);" />
                                <input type="hidden" name="edit-old_mfofile" id="edit-old_mfofile">
                                <input type="hidden" name="edit-current_mfofile" id="edit-current_mfofile">
                                <div id="edit-uploadmfofile"></div>
                            </fieldset>
                        </div>
                        <div class="col-xs-12 col-lg-12">
                            <fieldset>
                                <?= form_label('Upload Form BAR 1 <i>(*.pdf format, maximum size of 50MB)</i>','','for="edit-far4file"')?>
                                <input type='file' name="edit-far4file" id="edit-far4file" onchange="readURLBAR1ileEdit(this);" />
                                <input type="hidden" name="edit-far4file_span" id="edit-far4file_span">
                                <input type="hidden" name="edit-far4file_old" id="edit-far4file_old">
                                <div id="edit-uploadfar4file"></div>
                            </fieldset>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Summary of Accomplishment</legend>
                        <div class="col-xs-12 col-lg-4">
                            <ul><li>
                                <?php echo form_label('Physical Target').form_input('edit-physicaltarget','','id="edit-physicaltarget" class="number-separator" onkeyup="calculatephysicalrateEdit()"') ?>
                            </li></ul>
                        </div>
                        <div class="col-xs-12 col-lg-4">
                            <ul><li>
                                <?php echo form_label('Accomplishment').form_input('edit-physicalaccomplishment','','id="edit-physicalaccomplishment" class="number-separator" onkeyup="calculatephysicalrateEdit()"') ?>
                            </li></ul>
                        </div>
                        <div class="col-xs-12 col-lg-4">
                            <ul><li>
                                <?php echo form_label('Variance').form_input('edit-physicalvariance','','id="edit-physicalvariance" class="number-separator" readonly') ?>
                            </li></ul>
                        </div>
                    </fieldset>
                    <fieldset>
                    <legend>Financial Target</legend>         
                        <div class="col-xs-12 col-lg-4">
                            <ul><li>
                                <?php echo form_label('Financial Target').form_input('edit-financialtarget','','id="edit-financialtarget" class="number-separator" onkeyup="calculatefinancialrateEdit()"') ?>
                            </li></ul>
                        </div>          
                        <div class="col-xs-12 col-lg-4">
                            <ul><li>
                                <?php echo form_label('Accomplishment').form_input('edit-financialaccomplishment','','id="edit-financialaccomplishment" class="number-separator" onkeyup="calculatefinancialrateEdit()"') ?>
                            </li></ul>
                        </div>
                        <div class="col-xs-12 col-lg-4">
                            <ul><li>
                                <?php echo form_label('Variance').form_input('edit-financialvariance','','id="edit-financialvariance" class="number-separator" readonly') ?>
                            </li></ul>
                        </div>                       
                    </fieldset>
                    <div class="col-xs-12 col-lg-12">
                        <fieldset>
                            <?= form_label('Upload Approved Utilization <i>(*.pdf format, maximum size of 50MB)</i>','','for="edit-approveutilization"')?>
                            <input type='file' name="edit-approveutilization" id="edit-approveutilization" onchange="readURLapputilizeFileEdit(this);" />
                            <input type="hidden" name="edit-approveutilization_span" id="edit-approveutilization_span">
                            <input type="hidden" name="edit-approveutilization_old" id="edit-approveutilization_old">
                            <div id="edit-uploadapproveutilization"></div>
                        </fieldset>
                    </div>
                    <div class="col-xs-12 col-lg-12">
                        <ul><li>
                            <?php echo form_label('Remarks').form_textarea('edit-physicalremarks','','id="edit-physicalremarks"') ?>
                        </li></ul>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="modal-footer">
                            <button class="btn btn-info" type="button" onclick="UpdatePhysicalReport();" />Update
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form> -->
<form method="post" action="" id="ActualIncomeform" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-actincome" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Actual Income</h4>
                </div>
                <input type="hidden" id="actincome-id" name="actincome-id" value="" />
                <input type="hidden" id="actincome-gencode" name="actincome-gencode" value="" />
                <input type="hidden" id="actincome-gencode2" name="actincome-gencode2" value="" />
                <div class="modal-body">
                    <div class="col-xs-12 col-lg-4">
                <ul><li>
                    <?php echo form_label('Select Quarter').form_dropdown('edit-phyquarterincome',$quarter,'','id="edit-phyquarterincome"') ?>
                </li></ul>
            </div>
            <div class="col-xs-12 col-lg-4">
                <ul><li>
                    <?php echo form_label('Select Month').form_dropdown('edit-phyquartermonth','','','id="edit-phyquartermonth"') ?>
                </li></ul>
            </div>
            <div class="col-xs-12 col-lg-3">
                <ul><li>
                    <?php echo form_label('Select Day').form_dropdown('edit-phyquarteday',$dayList,'','id="edit-phyquarteday"') ?>
                </li></ul>
            </div>
            <div class="col-xs-12 col-lg-4">
                <ul><li>
                    <?php echo form_label('Select Year').form_dropdown('edit-phyquarteryear',$yearListed,'','id="edit-phyquarteryear"') ?>
                </li></ul>
            </div>
            <div class="col-xs-12 col-lg-12">
                <fieldset>
                <legend>Income from Operations <i>(Subject to 75% PA-RIA Deposit and 25% SAGF Remittance to BTr)</i></legend>
                    <div class="col-xs-12 col-lg-4">
                        <ul><li>
                            <?php echo form_label('Entrance fee (Php)').form_input('edit-ipafentrancefee','','id="edit-ipafentrancefee" class="number-separator"') ?>
                        </li></ul>
                    </div>
                    <div class="col-xs-12 col-lg-4">
                        <ul><li>
                            <?php echo form_label('Facilities User Fee (Php)').form_input('edit-ipaffacilityfee','','id="edit-ipaffacilityfee" class="number-separator"') ?>
                        </li></ul>
                    </div>
                    <div class="col-xs-12 col-lg-4">
                        <ul><li>
                            <?php echo form_label('Recreational Fee (Php)').form_input('edit-ipafrecreationalfee','','id="edit-ipafrecreationalfee" class="number-separator"') ?>
                        </li></ul>
                    </div>
                    <div class="col-xs-12 col-lg-4">
                        <ul><li>
                            <?php echo form_label('Resource User Fee (Php)').form_input('edit-ipafresourcefee','','id="edit-ipafresourcefee" class="number-separator"') ?>
                        </li></ul>
                    </div>
                    <div class="col-xs-12 col-lg-4">
                        <ul><li>
                            <?php echo form_label('SAPA Fee (Php)').form_input('edit-ipafsapafee','','id="edit-ipafsapafee" class="number-separator"') ?>
                        </li></ul>
                    </div>
                    <div class="col-xs-12 col-lg-4">
                        <ul><li>
                            <?php echo form_label('MOA Fee (Php)').form_input('edit-ipafmoafee','','id="edit-ipafmoafee" class="number-separator"') ?>
                        </li></ul>
                    </div>
                    <div class="col-xs-12 col-lg-4">
                        <ul><li>
                            <?php echo form_label('Revenue-Sharing Agreements  (Php)').form_input('edit-ipafrsafee','','id="edit-ipafrsafee" class="number-separator"') ?>
                        </li></ul>
                    </div>
                    <div class="col-xs-12 col-lg-4">
                        <ul><li>
                            <?php echo form_label('Clearance, License, Permit, Admin Fee (Php)').form_input('edit-ipafclearancefee','','id="edit-ipafclearancefee" class="number-separator"') ?>
                        </li></ul>
                    </div>
                    <div class="col-xs-12 col-lg-12">
                        <fieldset>
                            <legend>Other fees</legend>
                            <div class="col-xs-12 col-lg-6">
                                <ul><li>
                                    <?php echo form_label('Amount (Php)').form_input('edit-ipafincomeotherfee','','id="edit-ipafincomeotherfee" class="number-separator"') ?>
                                </li></ul>
                            </div>
                            <div class="col-xs-12 col-lg-6">
                                <ul><li>
                                    <?php echo form_label('Specify Others').form_input('edit-ipafincomeotherfee_desc','','id="edit-ipafincomeotherfee_desc"') ?>
                                </li></ul>
                            </div>
                            <div class="col-xs-12 col-lg-12">
                                <div class="col-xs-1 col-lg-1">
                                    <a type="text" class="btn btn-warning" id="addotherincomespecifyEdit">Add other income</a>
                                </div>
                                <div class="col-xs-12 col-lg-12" id="currentotherincomelist"></div>
                            </div>
                        </fieldset>
                    </div>
                </fieldset>
            </div>
            <div class="col-xs-12 col-lg-12">
                <fieldset>
                <legend>Other Income Sources <i>(100% PA-RIA Deposit)</i></legend>
                    <fieldset>
                        <div class="col-xs-12 col-lg-4">
                           <ul><li>
                               <?php echo form_label('Grant (Php)').form_input('edit-ipafgrantfee','','id="edit-ipafgrantfee" class="number-separator"') ?>
                           </li></ul>
                        </div>
                        <div class="col-xs-12 col-lg-8">
                           <ul><li>
                               <?php echo form_label('Source').form_input('edit-ipafgrantfee_source','','id="edit-ipafgrantfee_source"') ?>
                           </li></ul>
                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="col-xs-12 col-lg-4">
                           <ul><li>
                               <?php echo form_label('Endowment (Php)').form_input('edit-ipafendowmentfee','','id="edit-ipafendowmentfee" class="number-separator"') ?>
                           </li></ul>
                        </div>
                        <div class="col-xs-12 col-lg-8">
                           <ul><li>
                               <?php echo form_label('Source').form_input('edit-ipafendowmentfee_source','','id="edit-ipafendowmentfee_source"') ?>
                           </li></ul>
                        </div>
                    </fieldset>                    

                    <!-- <div class="col-xs-12 col-lg-4">
                       <ul><li>
                           <?php echo form_label('Fines, Penalties, Damage Fee (Php)').form_input('edit-ipaffinesfee','','id="edit-ipaffinesfee" class="number-separator"') ?>
                       </li></ul>
                    </div> -->
                    <fieldset>
                        <div class="col-xs-12 col-lg-4">
                            <ul><li>
                                <?php echo form_label('Trust Receipts').form_dropdown('edit-ipaffinesfee_dd',$finespelaltiesdamages,'','id="edit-ipaffinesfee_dd"') ?>
                            </li></ul>
                        </div>
                        <div class="col-xs-12 col-lg-4" id="edit-finepenaldamgdivother" style="display: none;">
                            <ul><li>
                                <?php echo form_label('Specify others').form_input('edit-ipaffinesfee_others','','id="edit-ipaffinesfee_others"') ?>
                            </li></ul>
                        </div>
                        <div class="col-xs-12 col-lg-4">
                           <ul><li>
                               <?php echo form_label('Amount (Php)').form_input('edit-ipaffinesfee','','id="edit-ipaffinesfee" class="number-separator"') ?>
                           </li></ul>
                        </div>
                        <div class="col-xs-12 col-lg-4">
                           <ul><li>
                               <?php echo form_label('Source').form_input('edit-ipaffinesfee_source','','id="edit-ipaffinesfee_source"') ?>
                           </li></ul>
                        </div>
                        <div class="col-xs-12 col-lg-12">
                            <a type="text" class="btn btn-warning" id="addpenaltyfinesdmgEdit">Add Fines/Penalties/Damage</a>
                        </div>
                        <div class="col-xs-12 col-lg-12">
                            <div id="penaltydamagefinesdivs"></div>
                    </fieldset>
                    
                    <fieldset>
                        <legend>Donation<i>(multiple)</i></legend>
                        <div class="col-xs-12 col-lg-4">
                            <ul><li>
                               <?php echo form_label('Donation').form_dropdown('edit-ipafdonationselect',$donate,'','id="edit-ipafdonationselect"') ?>
                            </li></ul>
                        </div>
                        <div class="col-xs-12 col-lg-4" id="edit-donatecashdiv" style="display:none">
                            <ul><li>
                               <?php echo form_label('Amount (Php)').form_input('edit-ipafdonationcash','','id="edit-ipafdonationcash" class="number-separator"') ?>
                            </li></ul>
                        </div>
                        <div class="col-xs-12 col-lg-8" id="edit-inkinddiv" style="display:none">
                            <div class="col-xs-12 col-lg-12">
                                <ul><li>
                                   <?php echo form_label('Book value').form_input('edit-ipafinkindbookvalue','','id="edit-ipafinkindbookvalue"') ?>
                                </li></ul>
                            </div>
                            <div class="col-xs-12 col-lg-12">
                                <ul><li>
                                   <?php echo form_label('Description').form_textarea('edit-ipafinkinddesc','','id="edit-ipafinkinddesc"') ?>
                                </li></ul>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-12">
                            <div class="col-xs-1 col-lg-1">
                                <a type="text" class="btn btn-warning" id="adddonationEdit">Add donation</a>
                            </div>
                            <br>
                            <div class="col-xs-12 col-lg-12" id="currentdonationlist"></div>
                        </div>
                    </fieldset>
                    <div class="col-xs-12 col-lg-12">
                        <fieldset>
                            <legend>Other income sources</legend>
                            <div class="col-xs-12 col-lg-6">
                               <ul><li>
                                   <?php echo form_label('Amount (Php)').form_input('edit-ipafotherincomesourcefee','','id="edit-ipafotherincomesourcefee" class="number-separator"') ?>
                               </li></ul>
                            </div>
                            <div class="col-xs-12 col-lg-6">
                               <ul><li>
                                   <?php echo form_label('Specify other income sources').form_input('edit-ipafotherincomesourcefeespec','','id="edit-ipafotherincomesourcefeespec"') ?>
                               </li></ul>
                            </div>
                            <div class="col-xs-12 col-lg-12">
                                <div class="col-xs-1 col-lg-1">
                                    <a type="text" class="btn btn-warning" id="adddonationothersEdit">Add other income sources</a>
                                </div>
                                <div class="col-xs-12 col-lg-12" id="currentothersourceincome"></div>
                            </div>
                        </fieldset>
                    </div>
                    <!-- <div class="col-xs-12 col-lg-12">
                        <fieldset>
                            <?= form_label('RIA-deposit slip/LDC <i>(*.pdf format, maximum size of 50MB)</i>','','for="edit-riadepositfile"')?>
                            <input type='file' name="edit-riadepositfile" id="edit-riadepositfile" onchange="readURLRAIFileEdit(this);" />
                            <input type="hidden" name="edit-current_riadepositfile" id="edit-current_riadepositfile">
                            <input type="hidden" name="edit-old_riadepositfile" id="edit-old_riadepositfile">
                            <div id="edit-uploadriadepositfilefile"></div>
                        </fieldset>
                    </div>
                    <div class="col-xs-12 col-lg-12">
                        <fieldset>
                            <?= form_label('SAGF-on-call DS/BTr cert <i>(*.pdf format, maximum size of 50MB)</i>','','for="edit-sagfbtrfile"')?>
                            <input type='file' name="edit-sagfbtrfile" id="edit-sagfbtrfile" onchange="readURLSAGFBTRFileEdit(this);" />
                            <input type="hidden" name="edit-current_sagfbtrfile" id="edit-current_sagfbtrfile">
                            <input type="hidden" name="edit-old_sagfbtrfile" id="edit-old_sagfbtrfile">
                            <div id="edit-uploadsagfbtrfilefile"></div>
                        </fieldset>
                    </div> -->
                    <div class="col-xs-12 ">
                        <div class="modal-footer">
                            <button class="btn btn-info" type="button" onclick="UpdateActualIncome();" />Update
                        </div>
                    </div>
                </fieldset>
                </div><!-- /.modal-body -->
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>
</form>
<form method="post" action="" id="DisbursementForm" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-disbursement" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Disbursement</h4>
                    <input type="hidden" id="disbursement-id" name="disbursement-id" value="" />
                    <input type="hidden" id="disbursement-gencode" name="disbursement-gencode" value="" />
                    <div class="modal-body" >
                        <fieldset><legend>Disbursement</legend>
                        <div class="col-xs-12 col-lg-12">
                            <div class="col-xs-6 tooltip">
                                <ul><li>
                                    <?php echo form_label('Year').form_dropdown('edit-disburse_year',$yearListed,'','id="edit-disburse_year"'); ?>
                                    <span class="tooltiptext">Disabled</span>
                                </li></ul>
                            </div>
                            <div class="col-xs-6 tooltip">
                                <ul><li>
                                    <?php echo form_label('Starting Balance (Previous year)').form_input('edit-remaining_balance','','id="edit-remaining_balance" class="number-separator calcannualdisbursementEdit"') ?>
                                </li></ul>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-12">
                            <div class="col-xs-4 tooltip">
                                <ul><li>
                                    <?php echo form_label('Annual Income').form_input('edit-actual_income_annuals','','id="edit-actual_income_annuals" class="number-separator calcannualdisbursementEdit"') ?>
                                </li></ul>
                            </div>
                            <div class="col-xs-4 tooltip">
                                <ul><li>
                                    <?php echo form_label('Disbursement(Auto generate)').form_input('edit-annual_disbursements','','id="edit-annual_disbursements" class="number-separator calcannualdisbursementEdit"') ?>
                                </li></ul>
                            </div>
                            <div class="col-xs-4 tooltip">
                                <ul><li>
                                    <?php echo form_label('Balance(Auto generate)').form_input('edit-annual_balances','','id="edit-annual_balances" class="number-separator calcannualdisbursementEdit"') ?>
                                </li></ul>
                            </div>
                        </div>
                        <div class="col-xs-4 tooltip" id="hideselectionsubpariaEdit" style="display: none;">
                            <ul><li>
                                <?php echo form_label('75% Old Subfund/PA-RIA').form_dropdown('edit-oldsubparia',$oldsubpariaListed,'','id="edit-oldsubparia"'); ?>
                                <span class="tooltiptext">Select Old Subfund/PA-RIA</span>
                            </li></ul>
                        </div> 
                        <div class="col-xs-12 col-lg-12" id="hidediv2015belowEdit" style="display: none;">
                            <fieldset>
                                <legend>75% Old Subfund</legend>
                                <div class="col-xs-12 col-lg-12">
                                    <div class="col-xs-12 tooltip hidden">
                                        <ul><li>
                                            <?php echo form_label('Annual Income').form_input('edit-actual_income_oldsub','','id="edit-actual_income_oldsub" class="number-separator calcbalanceoldsubE"') ?>
                                            <span class="tooltiptext">Input Annual Income</span>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-12 col-lg-12">
                                        <div class="col-xs-4 tooltip">
                                            <ul><li>
                                                <?php echo form_label('Running balance(Auto generate)').form_input('edit-running_balance2015','','id="edit-running_balance2015" class="number-separator calcannualdisbursementEdit"') ?>
                                                <span class="tooltiptext">Input Annual Income</span>
                                            </li></ul>
                                        </div>
                                    </div>
                                    <div class="col-xs-4 tooltip">
                                        <ul><li>
                                            <?php echo form_label('75% Income old subfund').form_input('edit-subfund_disbursement_income','','id="edit-subfund_disbursement_income" class="number-separator calcannualdisbursementEdit"') ?>
                                            <span class="tooltiptext">Input income C.Y. 2015 and below</span>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-4 tooltip">
                                        <ul><li>
                                            <?php echo form_label('Disbursement').form_input('edit-subfund_disbursement','','id="edit-subfund_disbursement" class="number-separator calcannualdisbursementEdit calctotaldisbursementEdit"') ?>
                                            <span class="tooltiptext">Input disbursement on 75% old subfund C.Y. 2015 and below</span>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-4 tooltip">
                                        <ul><li>
                                            <?php echo form_label('Balance').form_input('edit-subfund_balance','','id="edit-subfund_balance" class="number-separator" ') ?>
                                            <span class="tooltiptext">Input balance on 75% old subfund C.Y. 2015 and below <i>(If leave blank, auto-generate 75% old subfund balance)</i></span>
                                        </li></ul>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-xs-12 col-lg-12" id="hidediv2016aboveEdit" style="display: none;">
                            <fieldset>
                                <legend>75% Protected Area-Retained Income Account (PA-RIA)</legend>
                                <div class="col-xs-12 col-lg-12">
                                    <div class="col-xs-4 tooltip">
                                        <ul><li>
                                            <?php echo form_label('Running balance(Auto generate)').form_input('edit-running_balance2016','','id="edit-running_balance2016" class="number-separator calcannualdisbursementEdit"') ?>
                                            <span class="tooltiptext">Input Annual Income</span>
                                        </li></ul>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-lg-12">
                                    <div class="col-xs-4 tooltip">
                                        <ul><li>
                                            <?php echo form_label('75% Actual Income').form_input('edit-income_paria','','id="edit-income_paria" class="number-separator calcannualdisbursementEdit"') ?>
                                            <span class="tooltiptext">Input 75% PARIA annual income</span>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-4 tooltip">
                                        <ul><li>
                                            <?php echo form_label('Disbursement').form_input('edit-paria','','id="edit-paria"  class="number-separator calcannualdisbursementEdit"') ?>
                                            <span class="tooltiptext">Input disbursement on 75% PARIA</span>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-4 tooltip">
                                        <ul><li>
                                            <?php echo form_label('Balance').form_input('edit-paria_balance','','id="edit-paria_balance" class="number-separator"') ?>
                                            <span class="tooltiptext">Input balance on 75% PARIA <i>(If leave blank, auto-generate 75% old subfund balance)</i></span>
                                        </li></ul>
                                    </div>
                                </div>                                
                            </fieldset>
                        </div>
                        <div class="col-xs-12 col-lg-12" id="hidedivsagfEdit" style="display: none;">
                            <fieldset>
                                <legend>25% Special Account in the General Fund (SAGF)</legend>
                                <div class="col-xs-12 col-lg-12">
                                    <div class="col-xs-4 tooltip">
                                        <ul><li>
                                            <?php echo form_label('Running balance(Auto generate)').form_input('edit-running_balancesagf','','id="edit-running_balancesagf" class="number-separator calcannualdisbursementEdit"') ?>
                                            <span class="tooltiptext">Input Annual Income</span>
                                        </li></ul>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-lg-12">
                                    <div class="col-xs-4 tooltip">
                                        <ul><li>
                                            <?php echo form_label('25% Actual Income').form_input('edit-income_sagf','','id="edit-income_sagf" class="number-separator calcannualdisbursementEdit"') ?>
                                            <span class="tooltiptext">Input 25% SAGF annual income</span>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-4 tooltip">
                                        <ul><li>
                                            <?php echo form_label('Disbursement').form_input('edit-sagf','','id="edit-sagf"  class="number-separator calcannualdisbursementEdit calctotaldisbursementEdit"') ?>
                                            <span class="tooltiptext">Input disbursement on 25% SAGF</span>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-4 tooltip">
                                        <ul><li>
                                            <?php echo form_label('Balance').form_input('edit-sagf_balance','','id="edit-sagf_balance" class="number-separator"') ?>
                                            <span class="tooltiptext">Input balance on 25% SAGF <i>(If leave blank, auto-generate 75% old subfund balance)</i></span>
                                        </li></ul>
                                    </div>
                                </div>                                
                            </fieldset>
                        </div>
                        <fieldset>
                            <div class="col-xs-12 col-lg-12">
                                <div class="col-xs-12">
                                    <!-- <ul><li> -->
                                        <label>Upload copy of approved WFP SAGF<i>(*.pdf,*.csv, minimum size of 50MB)</i></label>
                                        <input type='file' name="edit-disbursesagf" id="edit-disbursesagf" onchange="readURLdisburesagfEdit(this);"/>
                                        <input type="hidden" name="edit-olddisbursefilesagf" id="edit-olddisbursefilesagf" />
                                        <input id="edit-disbursesagf_span" class="edit-disbursesagf_span" name="edit-disbursesagf_span" type="hidden" /><br>
                                    <!-- </li></ul> -->
                                </div>
                                <div class="col-xs-12 col-lg-12 ">
                                    <!-- <ul><li> -->
                                        <?= form_label('Current file attached','','for="disburementsagffile_upload"')?>
                                        <!-- <a href="" id="disburementsagffile_upload" target="_blank"></a> -->
                                        <div id="disburementsagffile_upload"></div>
                                    <!-- </li></ul>                             -->
                                </div>
                            </div>
                            <div class="col-xs-12 col-lg-12">
                                <div class="col-xs-12">
                                    <!-- <ul><li> -->
                                        <label>Upload copy of Approved WFP PA-RIA<i>(*.pdf,*.csv, minimum size of 50MB)</i></label>
                                        <input type='file' name="edit-disburseparia" id="edit-disburseparia" onchange="readURLdisburepariaEdit(this);"/>
                                        <input type="hidden" name="edit-olddisbursefileparia" id="edit-olddisbursefileparia" />
                                        <input id="edit-disburseparia_span" class="edit-disburseparia_span" name="edit-disburseparia_span" type="hidden" /><br>
                                    <!-- </li></ul> -->
                                </div>
                                <div class="col-xs-12 col-lg-12 ">
                                    <!-- <ul><li> -->
                                        <?= form_label('Current file attached','','for="disburementpariafile_upload"')?>
                                        <!-- <a href="" id="disburementpariafile_upload" target="_blank"></a>  -->
                                        <div id="disburementpariafile_upload"></div>
                                    <!-- </li></ul>                             -->
                                </div>
                            </div>
                        </fieldset>
                        <div class="col-xs-12 col-lg-12 hidden">
                            <fieldset>
                                <legend>Total</legend>
                                <div class="col-xs-12">
                                    <ul><li>
                                        <?php echo form_label(' ').form_input('edit-disrusetotal','','id="edit-disrusetotal" ') ?>
                                    </li></ul>
                                </div>
                            </fieldset>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-info" type="button" onclick="updateDisbursement();" />Update
                        </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<form method="post" action="" id="PrevActualIncome" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-previncome" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Previous Annual Income</h4>
                    <input type="hidden" id="previncome-id" name="previncome-id" value="" />
                    <input type="hidden" id="previncome-gencode" name="previncome-gencode" value="" />
                    <div class="modal-body" >
                        <fieldset>
                            <div class="col-xs-12 col-lg-12">
                                <div class="col-xs-12 col-lg-4">
                                    <ul><li>
                                        <?php echo form_label('Select Year').form_dropdown('edit-prevYear',$yearListed,'','id="edit-prevYear" disabled') ?>
                                    </li></ul>
                                </div>
                            </div>
                            <div class="col-xs-12 col-lg-12">
                                <div class="col-xs-12 col-lg-4">
                                    <ul><li>
                                        <?php echo form_label('Annual Income(Php)').form_input('edit-prevAnnualIncome','','id="edit-prevAnnualIncome" class="number-separator"') ?>
                                    </li></ul>
                                </div>
                                <div class="col-xs-12 col-lg-4">
                                    <ul><li>
                                        <?php echo form_label('Starting Balance(Php)').form_input('edit-prevstartingbalance','','id="edit-prevstartingbalance" class="number-separator"') ?>
                                    </li></ul>
                                </div>
                            </div>
                            <div class="col-xs-12 col-lg-12 hidden">
                                <div class="col-xs-12 col-lg-4">
                                    <ul><li>
                                        <?php echo form_label('Income Deposited with AGDB<br><i style="font-size:10px">(PA-RIA-Based on Bank Statement of Account/Deposit Slips)</i>').form_input('edit-incomedepAGDB','','id="edit-incomedepAGDB" class="number-separator"') ?>
                                    </li></ul>
                                </div>
                            </div>
                            <div class="col-xs-12 col-lg-12">
                                <ul><li>
                                    <?php echo form_label('Remarks').form_textarea('edit-prevAnnualIncomeremarks','','id="edit-prevAnnualIncomeremarks"') ?>
                                </li></ul>
                            </div>
                            <div class="col-xs-12 col-lg-12">
                                <fieldset>
                                    <?= form_label('Uploading of RIA Deposit Slip and List of Deposited Collection <i>(*.pdf format, maximum size of 50MB)</i>','','for="edit-riadepositfileprev"')?>
                                    <input type='file' name="edit-riadepositfileprev" id="edit-riadepositfileprev" onchange="readURLRAIFilePrevIncome(this);" />
                                    <input type="hidden" name="edit-old_riadepositfileprev" id="edit-old_riadepositfileprev">
                                    <input type="hidden" name="edit-disriadepositfileprev" id="edit-disriadepositfileprev">
                                    <div id="edit-uploadriadepositfilefileprev"></div>
                                </fieldset>
                            </div>
                            <div class="col-xs-12 col-lg-12">
                                <fieldset>
                                    <?= form_label('Uploading of SAGF BTr Certificate and On-Coll Deposit Slip <i>(*.pdf format, maximum size of 50MB)</i>','','for="edit-sagfbtrfileprev"')?>
                                    <input type='file' name="edit-sagfbtrfileprev" id="edit-sagfbtrfileprev" onchange="readURLSAGFBTRPrevFile(this);" />
                                    <input type="hidden" name="edit-old_sagfbtrfileprev" id="edit-old_sagfbtrfileprev">
                                    <input type="hidden" name="edit-dissagfbtrfileprev" id="edit-dissagfbtrfileprev">
                                    <div id="edit-uploadsagfbtrfilefileprev"></div>
                                </fieldset>
                            </div>                            
                        </fieldset>
                        <div class="modal-footer">
                            <button class="btn btn-info" type="button" onclick="updatePrevAnnualIncome();" />Update
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<form method="post" action="" id="AddPhysTargetFinancialForm" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-phyfinanphy" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Add Physical and Financial Target/Accomplishment</h4>
                    <input type="hidden" id="phyfinanphy-id" name="phyfinanphy-id" value="" />
                    <input type="hidden" id="phyfinanphy-papid" name="phyfinanphy-papid" value="" />
                    <input type="hidden" id="phyfinanphy-gencode" name="phyfinanphy-gencode" value="" />
                    <input type="hidden" id="phyfinanphy-gencode2" name="phyfinanphy-gencode2" value="" />
                    <input type="hidden" id="phyfinanphy-years" name="phyfinanphy-years" value="" />
                    <input type="hidden" id="phyfinanphy-month" name="phyfinanphy-month" value="" />
                    <div class="modal-body">
                        <div class="col-xs-12 col-lg-12">
                            <h1><div id="divyeardate"></div></h1>
                        </div>
                        <div class="col-xs-12 col-lg-12">
                            <h1><div id="divpapname"></div></h1>
                        </div>                        
                        <div class="col-xs-12 col-lg-12">
                            <div class="col-xs-12 col-lg-6">
                                <ul><li>
                                    <?php echo form_label('Select Quarter').form_dropdown('phyquarter',$quarter,'','id="phyquarter"') ?>
                                </li></ul>
                            </div>
                            <div class="col-xs-12 col-lg-6">
                                <ul><li>
                                    <?php echo form_label('Select Month').form_dropdown('phyquartersmonth','','','id="phyquartersmonth"') ?>
                                </li></ul>
                            </div>
                            <div class="col-xs-12 col-lg-4 hidden">
                                <ul><li>
                                    <?php echo form_label('Select Year').form_dropdown('phyquarteryears',$yearListed,'','id="phyquarteryears"') ?>
                                </li></ul>
                            </div> 
                        </div>                       
                        <fieldset>
                            <legend>Physical Accomplishment</legend>
                            <div class="col-xs-12 col-lg-3">
                                <ul><li>
                                    <?php echo form_label('Physical Target').form_input('physicaltarget','','id="physicaltarget" class="number-separator" onkeyup="calculatephysicalrate()"') ?>
                                </li></ul>
                            </div>
                            <div class="col-xs-12 col-lg-3">
                                <ul><li>
                                    <?php echo form_label('Accomplishment').form_input('physicalaccomplishment','','id="physicalaccomplishment" class="number-separator" onkeyup="calculatephysicalrate()"') ?>
                                </li></ul>
                            </div>
                            <div class="col-xs-12 col-lg-3">
                                <ul><li>
                                    <?php echo form_label('Variance').form_input('physicalvariance','','id="physicalvariance" class="number-separator" readonly') ?>
                                </li></ul>
                            </div>
                            <div class="col-xs-12 col-lg-3">
                                <ul><li>
                                    <?php echo form_label('% of Accomplishment').form_input('physicalvariancepercent','','id="physicalvariancepercent" class="number-separator" readonly') ?>
                                </li></ul>
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend>Financial Accomplishment</legend>         
                            <div class="col-xs-12 col-lg-3">
                                <ul><li>
                                    <?php echo form_label('Financial Target').form_input('financialtarget','','id="financialtarget" class="number-separator" onkeyup="calculatefinancialrate()"') ?>
                                </li></ul>
                            </div>          
                            <div class="col-xs-12 col-lg-3">
                                <ul><li>
                                    <?php echo form_label('Accomplishment').form_input('financialaccomplishment','','id="financialaccomplishment" class="number-separator" onkeyup="calculatefinancialrate()"') ?>
                                </li></ul>
                            </div>
                            <div class="col-xs-12 col-lg-3">
                                <ul><li>
                                    <?php echo form_label('Variance').form_input('financialvariance','','id="financialvariance" class="number-separator" readonly') ?>
                                </li></ul>
                            </div>
                            <div class="col-xs-12 col-lg-3">
                                <ul><li>
                                    <?php echo form_label('% of Accomplishment').form_input('financialvariancepercent','','id="financialvariancepercent" class="number-separator" readonly') ?>
                                </li></ul>
                            </div>
                            <div class="col-xs-1 col-lg-1">
                                <a type="text" class="btn btn-warning" id="addphytargetaccom">Add data</a>
                            </div>
                            <div class="col-xs-12 col-lg-12">
                                <div class="table-responsive large-tables">
                                    <table id="tblphytargetaccom" class="content-table table-line-border">
                                        <thead>
                                            <tr>
                                                <th>Month</th>
                                                <th>Physical Target</th>
                                                <th>Physical Accomplishment</th>
                                                <th>Variance</th>
                                                <th>Financial Target</th>
                                                <th>Financial Accomplishment</th>
                                                <th>Variance</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbodyphytargetaccom"></tbody>
                                    </table>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<form method="post" action="" id="EditsPhysTargetFinancialForm" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-phyfinanphyEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Physical and Financial Target/Accomplishment</h4>
                    <input type="hidden" id="edit-phyfinanphy-id" name="edit-phyfinanphy-id" value="" />                   
                    <input type="hidden" id="edit-phyfinanphy-gencode" name="edit-phyfinanphy-gencode" value="" />
                    <div class="modal-body" >
                        <div class="col-xs-12 col-lg-12">
                            <h1><div id="divdateEdit"></div></h1>
                        </div>                                          
                        <fieldset>
                            <legend>Physical Accomplishment</legend>
                            <div class="col-xs-12 col-lg-3">
                                <ul><li>
                                    <?php echo form_label('Physical Target').form_input('edit-physicaltarget','','id="edit-physicaltarget" class="number-separator" onkeyup="editcalculatephysicalrate()"') ?>
                                </li></ul>
                            </div>
                            <div class="col-xs-12 col-lg-3">
                                <ul><li>
                                    <?php echo form_label('Accomplishment').form_input('edit-physicalaccomplishment','','id="edit-physicalaccomplishment" class="number-separator" onkeyup="editcalculatephysicalrate()"') ?>
                                </li></ul>
                            </div>
                            <div class="col-xs-12 col-lg-3">
                                <ul><li>
                                    <?php echo form_label('Variance').form_input('edit-physicalvariance','','id="edit-physicalvariance" class="number-separator" readonly') ?>
                                </li></ul>
                            </div>
                            <div class="col-xs-12 col-lg-3">
                                <ul><li>
                                    <?php echo form_label('% of Accomplishment').form_input('edit-physicalvariancepercent','','id="edit-physicalvariancepercent" class="number-separator" readonly') ?>
                                </li></ul>
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend>Financial Accomplishment</legend>         
                            <div class="col-xs-12 col-lg-3">
                                <ul><li>
                                    <?php echo form_label('Financial Target').form_input('edit-financialtarget','','id="edit-financialtarget" class="number-separator" onkeyup="editcalculatefinancialrate()"') ?>
                                </li></ul>
                            </div>          
                            <div class="col-xs-12 col-lg-3">
                                <ul><li>
                                    <?php echo form_label('Accomplishment').form_input('edit-financialaccomplishment','','id="edit-financialaccomplishment" class="number-separator" onkeyup="editcalculatefinancialrate()"') ?>
                                </li></ul>
                            </div>
                            <div class="col-xs-12 col-lg-3">
                                <ul><li>
                                    <?php echo form_label('Variance').form_input('edit-financialvariance','','id="edit-financialvariance" class="number-separator" readonly') ?>
                                </li></ul>
                            </div>
                            <div class="col-xs-12 col-lg-3">
                                <ul><li>
                                    <?php echo form_label('% of Accomplishment').form_input('edit-financialvariancepercent','','id="edit-financialvariancepercent" class="number-separator" readonly') ?>
                                </li></ul>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-info" type="button" onclick="updatephyfinancereportaccom();" />Update
                            </div>                          
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<form method="post" action="" id="EditsPhysTargetFinancialMainForm" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-phyfinanphyMainEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Physical and Financial Target/Accomplishment</h4>
                    <input type="hidden" id="edit-phyfin-id" name="edit-phyfin-id" value="" />                   
                    <input type="hidden" id="edit-phyfin-gencode" name="edit-phyfin-gencode" value="" />
                    <input type="hidden" id="edit-phyfin-gencode2" name="edit-phyfin-gencode2" value="" />
                    <div class="modal-body" >
                        <div class="col-xs-12 col-lg-12">
                            <h1><div id="divdateEdit"></div></h1>
                        </div>                                          
                        <fieldset>
                            <div class="col-xs-12 col-lg-12">
                                <div class="col-xs-12 col-lg-4">
                                    <ul><li>
                                        <?php echo form_label('Select Year').form_dropdown('edit-phyquarteryear2',$yearListed,'','id="edit-phyquarteryear2"') ?>
                                    </li></ul>
                                </div>
                            </div>
                            <fieldset>
                                 <div class="col-xs-12 col-lg-12">
                                    <div class="col-xs-12 col-lg-4">
                                        <ul><li>
                                            <?php echo form_label('Program/Activity/Project (PAP)').form_textarea('edit-progactproj','','id="edit-progactproj"') ?>
                                        </li></ul>
                                    </div>   
                                    <div class="col-xs-12 col-lg-4">
                                        <ul><li>
                                            <?php echo form_label('Performance Indicator').form_textarea('edit-physical_perindicator','','id="edit-physical_perindicator"') ?>
                                        </li></ul>
                                    </div>             
                                    <div class="col-xs-12 col-lg-4">
                                        <div class="col-xs-12 col-lg-12">
                                            <ul><li>
                                                <?php echo form_label('Cost (Php)').form_input('edit-physicalcost','','id="edit-physicalcost" class="number-separator"') ?>
                                            </li></ul>
                                        </div>
                                        <div class="col-xs-12 col-lg-12">
                                            <ul><li>
                                                <?php echo form_label('Quantity').form_input('edit-pap_quantity','','id="edit-pap_quantity" class="number-separator"') ?>
                                            </li></ul>
                                        </div>
                                    </div>
                                </div>                
                            </fieldset>
                            <div class="col-xs-12 col-lg-12">
                                <fieldset>
                                    <?= form_label('Upload Approved Utilization <i>(*.pdf format, maximum size of 50MB)</i>','','for="edit-approveutilization"')?>
                                    <input type='file' name="edit-approveutilization" id="edit-approveutilization" onchange="readURLapputilizeFileEdited(this);" />
                                    <input type="hidden" name="edit-approveutilization_span" id="edit-approveutilization_span">
                                    <input type="hidden" name="edit-approveutilization_old" id="edit-approveutilization_old">
                                    <div id="edit-uploadapproveutilization"></div>
                                </fieldset>
                            </div>
                            <div class="col-xs-12 col-lg-12">
                                <fieldset>
                                    <?= form_label('Upload Approved Work and Financial Plan <i>(*.pdf format, maximum size of 50MB)</i>','','for="edit-mfofile"')?>
                                    <input type='file' name="edit-mfofile" id="edit-mfofile" onchange="readURLMFOFileEdit(this);" />
                                    <input type="hidden" name="edit-mfofile_span" id="edit-mfofile_span">
                                    <input type="hidden" name="edit-mfofile_old" id="edit-mfofile_old">
                                    <div id="edit-uploadmfofile"></div>
                                </fieldset>
                            </div>
                            <div class="col-xs-12 col-lg-12">
                                <fieldset>
                                    <?= form_label('Upload Form BAR 1 <i>(*.pdf format, maximum size of 50MB)</i>','','for="edit-far4file"')?>
                                    <input type='file' name="edit-far4file" id="edit-far4file" onchange="readURLBAR1ileEdit(this);" />
                                    <input type="hidden" name="edit-far4file_span" id="edit-far4file_span">
                                    <input type="hidden" name="edit-far4file_old" id="edit-far4file_old">
                                    <div id="edit-uploadfar4file"></div>
                                </fieldset>
                            </div>
                            <div class="col-xs-12 col-lg-12">
                                <ul><li>
                                    <?php echo form_label('Remarks').form_textarea('edit-physicalremarks','','id="edit-physicalremarks"') ?>
                                </li></ul>
                            </div>  
                            <div class="modal-footer">
                                <button class="btn btn-info" type="button" onclick="updatephyfinancereportMain();" />Update
                            </div>                      
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<form method="post" action="" id="StartingBalanceForm" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-sbi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Add Starting Balance</h4>
                    <input type="hidden" id="edit-sbi-id" name="edit-sbi-id" value="" />                   
                    <input type="hidden" id="edit-sbi-ids" name="edit-sbi-ids" value="" />                   
                    <input type="hidden" id="edit-sbi-gencode" name="edit-sbi-gencode" value="" />
                    <input type="hidden" id="edit-sbi-gencode2" name="edit-sbi-gencode2" value="" />
                    <input type="hidden" id="edit-sbi-year" name="edit-sbi-year" value="" />
                    <input type="hidden" id="edit-sbi-income" name="edit-sbi-income" value="" />
                    <div class="modal-body" >
                        <div class="col-xs-12 col-lg-12">
                            <h1><div id="sbyeardiv"></div></h1>
                        </div>
                        <div class="col-xs-12 col-lg-12">
                            <ul><li>
                                <?php echo form_label('Starting Balance (Php)').form_input('edit-prevstartingbalance2','','id="edit-prevstartingbalance2" class="number-separator"') ?>
                            </li></ul>
                        </div>
                        <div class="col-xs-12 col-lg-12">
                            <ul><li>
                                <?php echo form_label('Remarks').form_textarea('edit-prevstartingbalanceremarks','','id="edit-prevstartingbalanceremarks"') ?>
                            </li></ul>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-info" type="button" onclick="updatestaartingbalanceMain();" />Update
                        </div>                      
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<form method="post" action="" id="MonthlyCertificateForm" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-certimonth" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <input type="hidden" id="edit-certi-gencode" name="edit-certi-gencode" value="" />                   
                    <input type="hidden" id="edit-certi-id" name="edit-certi-id" value="" />                   
                    <h4 class="modal-title">Edit Monthly Uploading Certificate</h4>
                    <div class="modal-body" >
                        <fieldset>
                            <div class="col-xs-12 col-lg-12">                           
                                <div class="col-xs-6 col-lg-6">
                                    <ul><li>
                                        <?= form_label('Month').form_dropdown('edit-certi_month1',$monthList,'','id="edit-certi_month1"') ?>
                                    </li></ul>
                                </div>
                                <div class="col-xs-6 col-lg-6">
                                    <ul><li>
                                        <?= form_label('Year').form_dropdown('edit-certi_year1',$yearListed,'','id="edit-certi_year1"') ?>
                                    </li></ul>
                                </div>
                            </div>
                            <div class="col-xs-12 col-lg-12">
                                <fieldset>
                                    <?= form_label('Uploading of RIA Deposit Slip and List of Deposited Collection <i>(*.pdf format, maximum size of 50MB)</i>','','for="edit-riadepositfile"')?>
                                    <input type='file' name="edit-riadepositfile" id="edit-riadepositfile" onchange="readURLRAIFileEdit(this);" />
                                    <input type="hidden" name="edit-old_riadepositfile" id="edit-old_riadepositfile">
                                    <input type="hidden" name="edit-new_riadepositfile" id="edit-new_riadepositfile">
                                    <div id="edit-uploadriadepositfilefile"></div>
                                </fieldset>
                            </div>
                            <div class="col-xs-12 col-lg-12">
                                <fieldset>
                                    <?= form_label('Uploading of SAGF BTr Certificate and On-Coll Deposit Slip <i>(*.pdf format, maximum size of 50MB)</i>','','for="edit-sagfbtrfile"')?>
                                    <input type='file' name="edit-sagfbtrfile" id="edit-sagfbtrfile" onchange="readURLSAGFBTRFileEdit(this);" />
                                    <input type="hidden" name="edit-old_sagfbtrfile" id="edit-old_sagfbtrfile">
                                    <input type="hidden" name="edit-new_sagfbtrfile" id="edit-new_sagfbtrfile">
                                    <div id="edit-uploadsagfbtrfilefile"></div>
                                </fieldset>
                            </div>
                            <div class="col-xs-12 col-lg-12 tooltip">
                                <ul><li>
                                    <?= form_label('Remarks','','for="edit-certi_remarks1"').form_textarea('edit-certi_remarks1','','placeholder="Brief description" id="edit-certi_remarks1" style="height:250px;"');?>
                                    <!-- <span class="tooltiptext">Information of the map which includes but not limited to title, summary/description, author, source and date modified</span> -->
                                </li></ul>
                            </div>
                            <div class="col-xs-12 col-lg-12">
                                <div class="modal-footer">
                                    <button class="btn btn-info" type="button" onclick="updateMonthlyCertificates();" />Update
                                </div>  
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<form method="post" action="" id="WeeklyCertificateForm" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-certiweek" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <input type="hidden" id="edit-certi2-gencode" name="edit-certi2-gencode" value="" />                   
                    <input type="hidden" id="edit-certi2-id" name="edit-certi2-id" value="" />                   
                    <h4 class="modal-title">Edit Weekly Uploading Certificate</h4>
                    <div class="modal-body" >
                        <fieldset>
                            <div class="col-xs-12 col-lg-12">                           
                                <ul><li>
                                    <label>Date Range</label><input type="text" name="edit-datetimes" id="edit-datetimes" />
                                </li></ul>
                            </div>
                            <div class="col-xs-12 col-lg-12">
                                <fieldset>
                                    <?= form_label('Uploading of RIA Deposit Slip and List of Deposited Collection <i>(*.pdf format, maximum size of 50MB)</i>','','for="edit-riadepositfile2"')?>
                                    <input type='file' name="edit-riadepositfile2" id="edit-riadepositfile2" onchange="readURLRAIFile2Edit(this);" />
                                    <input type="hidden" name="edit-old_riadepositfile2" id="edit-old_riadepositfile2">
                                    <input type="hidden" name="edit-new_riadepositfile2" id="edit-new_riadepositfile2">
                                    <div id="edit-uploadriadepositfilefile2"></div>
                                </fieldset>
                            </div>
                            <div class="col-xs-12 col-lg-12">
                                <fieldset>
                                    <?= form_label('Uploading of SAGF BTr Certificate and On-Coll Deposit Slip <i>(*.pdf format, maximum size of 50MB)</i>','','for="edit-sagfbtrfile2"')?>
                                    <input type='file' name="edit-sagfbtrfile2" id="edit-sagfbtrfile2" onchange="readURLSAGFBTRFile2Edit(this);" />
                                    <input type="hidden" name="edit-old_sagfbtrfile2" id="edit-old_sagfbtrfile2">
                                    <input type="hidden" name="edit-new_sagfbtrfile2" id="edit-new_sagfbtrfile2">
                                    <div id="edit-uploadsagfbtrfilefile2"></div>
                                </fieldset>
                            </div>
                            <div class="col-xs-12 col-lg-12 tooltip">
                                <ul><li>
                                    <?= form_label('Remarks','','for="edit-certi_remarks2"').form_textarea('edit-certi_remarks2','','placeholder="Brief description" id="edit-certi_remarks2" style="height:250px;"');?>
                                    <!-- <span class="tooltiptext">Information of the map which includes but not limited to title, summary/description, author, source and date modified</span> -->
                                </li></ul>
                            </div>
                            <div class="col-xs-12 col-lg-12">
                                <div class="modal-footer">
                                    <button class="btn btn-info" type="button" onclick="updateWeeklyCertificates();" />Update
                                </div>  
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<form method="post" action="" id="DailyCertificateForm" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-certiday" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <input type="" id="edit-certi3-gencode" name="edit-certi3-gencode" value="" />                   
                    <input type="" id="edit-certi3-id" name="edit-certi3-id" value="" />                   
                    <h4 class="modal-title">Edit Daily Uploading Certificate</h4>
                    <div class="modal-body" >
                        <fieldset>
                            <div class="col-xs-12 col-lg-12">                           
                                <ul><li>
                                    <label>Date</label><input type="text" name="edit-datetimes2" id="edit-datetimes2" />
                                </li></ul>
                            </div>
                            <div class="col-xs-12 col-lg-12">
                                <fieldset>
                                    <?= form_label('Uploading of RIA Deposit Slip and List of Deposited Collection <i>(*.pdf format, maximum size of 50MB)</i>','','for="edit-riadepositfile3"')?>
                                    <input type='file' name="edit-riadepositfile3" id="edit-riadepositfile3" onchange="readURLRAIFile3Edit(this);" />
                                    <input type="hidden" name="edit-old_riadepositfile3" id="edit-old_riadepositfile3">
                                    <input type="hidden" name="edit-new_riadepositfile3" id="edit-new_riadepositfile3">
                                    <div id="edit-uploadriadepositfilefile3"></div>
                                </fieldset>
                            </div>
                            <div class="col-xs-12 col-lg-12">
                                <fieldset>
                                    <?= form_label('Uploading of SAGF BTr Certificate and On-Coll Deposit Slip <i>(*.pdf format, maximum size of 50MB)</i>','','for="edit-sagfbtrfile3"')?>
                                    <input type='file' name="edit-sagfbtrfile3" id="edit-sagfbtrfile3" onchange="readURLSAGFBTRFile3Edit(this);" />
                                    <input type="hidden" name="edit-old_sagfbtrfile3" id="edit-old_sagfbtrfile3">
                                    <input type="hidden" name="edit-new_sagfbtrfile3" id="edit-new_sagfbtrfile3">
                                    <div id="edit-uploadsagfbtrfilefile3"></div>
                                </fieldset>
                            </div>
                            <div class="col-xs-12 col-lg-12 tooltip">
                                <ul><li>
                                    <?= form_label('Remarks','','for="edit-certi_remarks3"').form_textarea('edit-certi_remarks3','','placeholder="Brief description" id="edit-certi_remarks3" style="height:250px;"');?>
                                </li></ul>
                            </div>
                            <div class="col-xs-12 col-lg-12">
                                <div class="modal-footer">
                                    <button class="btn btn-info" type="button" onclick="updateDailyCertificates();" />Update
                                </div>  
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>