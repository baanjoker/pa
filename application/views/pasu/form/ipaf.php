<div class="tab-pane" id="ipaf">
    <div class="form-style-6">
        <h2>Integrated Protected Area Fund (IPAF)</h2>
    </div>                
    <div class="col-xs-12">
        <div class="tab">
            <!-- <a class="tablinkipaf hidden" id="loadvisitorslogbook" onclick="tabipaf(event, 'visitorlogs')">Visitors Logbook</a> -->
            <!-- <a class="tablinkipaf" id="loadipafacc" onclick="tabipaf(event, 'income')">Income Generated</a> -->
            <!-- <a class="tablinkipaf active" id="loadipafacc" onclick="tabipaf(event, 'income2')">Income Generated</a> --> <!-- LAST TAB -->
            <!-- <a class="tablinkipaf" id="loaddisburstment" onclick="tabipaf(event, 'disbursement')">Disbursement</a> -->
            <!-- <a class="tablinkipaf hidden" id="loadcontribution" onclick="tabipaf(event, 'donate')">Trust Receipt<br><span style="font-size: 12px;">(Contribution/Donation, Development Fee, Fines/Penalties)</span></a> -->
            <!-- <a class="tablinkipaf" id="loadvisitors" onclick="tabipaf(event, 'visitor')">Protected Area Visitors</a> -->


            <a class="tablinkipaf active" id="loadipafaccssss" onclick="tabipaf(event, 'incomes')">Income Generated</a>
            
        </div>
    </div>
    <div id="ipafpercov" style="display:none">
    <fieldset>
        <legend>Period Covered</legend>                                   
        <div class="col-xs-4 col-lg-4 tooltip">
            <ul><li>
            <?= form_dropdown('month_monitoring',$monthListed,'','class="border-input " id="monitor_months"'); ?>
            <span class="tooltiptext">Select date period covered</span>
            </li></ul>
        </div>
        <div class="col-xs-4 col-lg-4 tooltip">
            <ul><li>
            <?= form_dropdown('day_monitoring',$dayList,'','class="border-input " id="monitor_day"'); ?>
            <span class="tooltiptext">Select date period covered</span>
            </li></ul>
        </div>
        <div class="col-xs-4 col-lg-4 tooltip">
            <ul><li>
            <?= form_dropdown('year_monitoring',$yearListed,'','class="border-input " id="monitor_years"'); ?>
            <span class="tooltiptext">Select date period covered</span>
            </li></ul>
        </div>
    </fieldset>
    </div>
    
    <div id="income" class="tabcontentipaf" style="display: none;">
        <div class="col-xs-12">
        <fieldset>
        <legend>Monitoring of Income Generated within Protected Area</legend>
            <div class="col-xs-12 "> 
                <div class="col-xs-12 col-lg-6">
                    <ul><li>
                        <?= form_label('Entrance Fee','','for="entrancefee"').form_input('entrancefee','','placeholder="Amount" id="entrancefee" class="number-separator"'); ?>
                    </li></ul>
                </div>
                <div class="col-xs-12 col-lg-6">
                    <ul><li>
                        <?= form_label('Facilities User Fee','','for="income_facilities"').form_input('income_facilities','','placeholder="Amount" id="income_facilities" class="number-separator"');?>
                    </li></ul>
                </div>
            </div>
            <div class="col-xs-12 ">
                <div class="col-xs-12 col-lg-6">
                    <ul><li>
                        <?= form_label('Resource User Fee','','for="resource"').form_input('resource','','placeholder="Amount" id="resource" class="number-separator"'); ?>
                    </li></ul>
                </div>
                <div class="col-xs-12 col-lg-6">
                    <ul><li>
                    <?= form_label('Concession Fee','','for="concession"').form_input('concession','','placeholder="Amount" id="concession" class="number-separator"'); ?>
                    </li></ul>
                </div>
            </div>   
            <div class="col-xs-12 ">
                <div class="col-xs-12 col-lg-6">
                    <ul><li>
                        <?= form_label('Certificate of 25% Deposit','','for="resource"'); ?>
                        <input type = "file" name = "proofdeposit" id="proofdeposit" /> 
                    </li></ul>
                </div>
                <div class="col-xs-12 col-lg-6">
                    <ul><li>
                        <?= form_label('Bank certification for depository bank','','for="resource"'); ?>
                        <input type = "file" name = "bankdeposit" id="bankdeposit" /> 
                    </li></ul>
                </div>
            </div>                         
            <div class="col-xs-12 hide">
                <div class="col-xs-12 col-lg-6">
                    <ul><li>
                    <?= form_label('Devt Fee/ Royalty','','for="development"').form_input('development','','placeholder="Amount" id="development" onchange="calculator_ipaf()" onkeyup="run(this)"'); ?>
                    </li></ul>
                </div>
                <div class="col-xs-12 col-lg-6">
                    <ul><li>
                    <?= form_label('Fines and Penalties','','for="finespenalties"').form_input('finespenalties','','placeholder="Amount" id="finespenalties" onchange="calculator_ipaf()" onkeyup="run(this)"'); ?>
                    </li></ul>
                </div>            
            </div>                           
        </fieldset>
        <fieldset class="hide">
            <legend>Disbursement</legend>
            <div class="col-xs-4 col-lg-4">
                <div id="disburmentdiv">
                    <button id="add_disbursement"  type="button" class="btn btn-info">Add Disbursement</button>        
                </div><br>
            </div>
        </fieldset>
        <fieldset>
            <legend>Other income</legend>
                <div class="col-xs-6 col-lg-6 hide">
                    <ul><li>
                    <?= form_label(' ','','for="other_specify_title"').form_input('other_specify_title','','placeholder="Description" id="other_specify_title"'); ?>
                    <span>Input some extra income</span>
                    </li></ul>
                </div>
                <div class="col-xs-6 col-lg-6 hide">
                    <ul><li>
                    <?= form_label('Amount','for="other_specify_title"').form_input('other_specify_amount','','placeholder="Amount" id="other_specify_amount" onchange="calculator_ipaf()" onkeyup="run(this)"'); ?>
                    </li></ul>
                </div>
                <div class="col-xs-4 col-lg-4">
                    <div id="incomediv">
                        <button id="add_other_income"  type="button" class="btn btn-info">Add other income</button>        
                    </div><br>
                </div>                               
        </fieldset>                        
        <fieldset>
            <legend>Contribution/Donation</legend>
            <div class="col-xs-4 col-lg-4">
                <div id="donationdiv">
                    <button id="add_contribution_donation"  type="button" class="btn btn-info">Add Contribution/Donation</button>        
                </div><br>
            </div>
        </fieldset>
         <fieldset>
            <legend>Development Fees</legend>
             <div class="col-xs-4 col-lg-4">
                <div id="developmentdiv">
                    <button id="add_development"  type="button" class="btn btn-info">Add Development Fees</button>        
                </div><br>
            </div> 
        </fieldset>
        <fieldset>
            <legend>Fines and Penalties</legend>
            <div class="col-xs-4 col-lg-4">
                <div id="finesdiv">
                    <button id="add_fines"  type="button" class="btn btn-info">Add Fines and Penalties</button>        
                </div><br>
            </div> 
        </fieldset>
        <input type="number" id="total_income" class="hide" />
        <input type="number" id="total_income75" class="hide" />
        <input type="number" id="total_income25" class="hide" />
    </div>
    <div class="col-xs-12">
        <a type="text" class="btn btn-primary" id="addipafPlus">Add data</a>
    </div>
    <div class="col-xs-12 ">   
        <div class="table-responsive large-tables" style="overflow-x: scroll;"><br>
            <div class="col-xs-4 col-lg-4">
                <ul><li>
                    <?= form_dropdown('select_month_monitoring',$monthListed,'','class="border-input " id="select_monitor_months"'); ?>
                </li></ul>
            </div>
            <div class="col-xs-4 col-lg-4 ">
                <ul><li>
                    <?= form_dropdown('select_year_monitoring',$yearListed,'','class="border-input " id="select_monitor_years"'); ?>
                </li></ul>
            </div>
            <div class="col-xs-4 col-lg-4">
                <a type="text" class="btn btn-primary" id="searchdateincome">Search</a>
            </div>       
        </div>
            <table id="tableMonitoringIpaf" class="content-table">
                <thead>
                    <tr>
                        <th colspan="21" style="text-align: center; font-size: 24px">Income Generated (₱)</th>
                    </tr>
                    <tr>
                        <th colspan="3" style="text-align: center">Period Covered</th>
                        <th colspan="7" style="text-align: center">Monitoring of Income Generated</th>                                       
                        <th colspan="3" style="text-align: center">Amount / Date Deposited to BTR</th>
                        <th colspan="3" style="text-align: center">Contribution/Donation</th>
                        <th style='text-align: center;' rowspan="3" class="hide" >Total Disbursement</th>                                               
                        <th style='text-align: center;' rowspan="3" >Fines and Penalties Fee</th>  
                        <th rowspan="3"></th>
                    </tr>
                    <tr>
                        <th style="text-align: center" rowspan="2">Month</th>
                        <th style="text-align: center" rowspan="2">Day</th>                                        
                        <th style="text-align: center" rowspan="2">Year</th>
                        <th style="text-align: center" rowspan="2">Entrance Fee</th>
                        <th style="text-align: center" rowspan="2">Facilities User Fee</th>
                        <th style="text-align: center" rowspan="2">Resource User Fee</th>
                        <th style="text-align: center" rowspan="2">Concession Fee</th>                                        
                        <th style="text-align: center" rowspan="2">Development Fee</th>
                        <th style="text-align: center" rowspan="2">Others  (Pls. specify)</th>
                        <th style="text-align: center" rowspan="2">Total Income</th>                                        
                        <th style="text-align: center" rowspan="2">Retained Income (75%)</th>
                        <th style="text-align: center" rowspan="2" class="hide">Disbursement <br>(75%)</th>
                        <th style="text-align: center" rowspan="2">SAGF (25%)</th>
                        <th style="text-align: center" rowspan="2" class="hide">Disbursement (25%)</th>
                        <th style="text-align: center" rowspan="2">Total Income</th>
                        <th style='text-align: center;' rowspan="2">Trust fund</th>
                        <th style='text-align: center;' rowspan="2">Mode of payment</th> 
                        <th style='text-align: center;' rowspan="2">Amount</th>
                    </tr> 
                </thead>
                <tbody id="tbodyIpafs"></tbody>
            </table>
            <table id="tableMonitoringIpaf_sample" class="content-table">
                <tbody id="tbodyIpaf_sample">
                </tbody>
            </table>
        </div>                            
    </div>
</div><!-- END TAB -->
<div id="income2" class="tabcontentipaf" style="display: none">
    <div class="col-lg-12 col-xs-12">
    <fieldset>
        <legend>Generated Income Protected Area Fund</legend>
            <div class="col-xs-12 col-lg-12">
                <hr>
                <div class="col-xs-4 col-lg-4 tooltip">
                    <ul><li>
                    <?= form_dropdown('sqmonthIncome',$monthListed,'','class="border-input " id="sqmonthIncome"'); ?>
                    <span class="tooltiptext">Select month</span>
                    </li></ul>
                </div>
                <div class="col-xs-4 col-lg-4 tooltip">
                    <ul><li>
                        <?= form_dropdown('sqyearIncome',$yearListed,'','class="border-input " id="sqyearIncome"'); ?>
                        <span class="tooltiptext">Select Year</span>
                    </li></ul>
                </div>
                <div class="col-xs-4 col-lg-4">
                    <a type="text" class="btn btn-primary" id="searchincomeGen">Search</a>
                </div>
            </div>
            <div class="col-xs-12 col-lg-12" style="overflow-x:auto;">
                <table id="tableincomegenerated" class="content-table">
                    <thead>
                        <tr>
                            <th colspan="18" style="text-align: center; font-size: 24px">Income Generated (₱)</th>
                        </tr>
                        <tr>
                            <th colspan="3" style="text-align: center">Period Covered</th>
                            <th colspan="7" style="text-align: center">Monitoring of Income Generated</th>                                       
                            <th colspan="3" style="text-align: center">Amount / Date Deposited to BTR</th>
                            <th rowspan="3" style="text-align: center">Contribution/Donation</th>
                            <th style='text-align: center;' rowspan="3" >Fines and Penalties Fee</th>  
                            <th rowspan="3">BTR/Bank certification</th>
                        </tr>
                        <tr>
                            <th style="text-align: center" rowspan="2">Month</th>
                            <th style="text-align: center" rowspan="2">Day</th>                                        
                            <th style="text-align: center" rowspan="2">Year</th>
                            <th style="text-align: center" rowspan="2">Entrance Fee</th>
                            <th style="text-align: center" rowspan="2">Facilities User Fee</th>
                            <th style="text-align: center" rowspan="2">Resource User Fee</th>
                            <th style="text-align: center" rowspan="2">Concession Fee</th>                                        
                            <th style="text-align: center" rowspan="2">Development Fee</th>
                            <th style="text-align: center" rowspan="2">Others  (Pls. specify)</th>
                            <th style="text-align: center" rowspan="2">Total Income</th>                                        
                            <th style="text-align: center" rowspan="2">Retained Income (75%)</th>
                            <th style="text-align: center" rowspan="2" class="hide">Disbursement <br>(75%)</th>
                            <th style="text-align: center" rowspan="2">SAGF (25%)</th>
                            <th style="text-align: center" rowspan="2" class="hide">Disbursement (25%)</th>
                            <th style="text-align: center" rowspan="2">Total Income</th>
                        </tr> 
                    </thead>
                    <tbody id="tbodyincomegenerated"></tbody>
                </table>
            </div>    
    </fieldset>
    </div>        
</div>