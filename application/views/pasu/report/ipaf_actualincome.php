<div class="col-xs-12 col-md-12 col-lg-12" class="form-style-6">
	<div class="card">
        <fieldset>
            <div class="card-content" style="margin: 12px 12px 12px 12px;">
                <center><h1>ACTUAL INCOME</h1></center>
            </div>
            <div class="tab">
                <a class="tablinkipaf active" onclick="tabipaf(event, 'qurterlyincomer')">Quarterly Report</a>
                <a class="tablinkipaf" onclick="tabipaf(event, 'annualincomer')">Annual Report</a>
            </div>
            <div id="qurterlyincomer" style="display: block;" class="col-md-12 col-xs-12 col-lg-12 tabcontentipaf">
                <form method="post" class="form-style-7" action="<?php echo base_url()?>pasu/report/pdfipaflandscape/ipafreportbyYear" target="_blank">
                    <div class="col-xs-12 col-lg-4">
                        <ul><li>
                            <?= form_label('Name of Protected Area','','for="searchPa"').form_dropdown('searchPa',$paList,'','id="searchPa"') ?>
                        </li></ul>
                    </div>
                    <div class="col-xs-12 col-lg-2">
                        <ul><li>
                            <?= form_label('Year','','for="searchYear"').form_dropdown('searchYear',$yearListed,'','id="searchYear"') ?>
                        </li></ul>
                    </div>
                    <div class="col-xs-12 col-lg-2">
                        <ul><li>
                            <?= form_label('Quarter','','for="searchquarter"').form_dropdown('searchquarter',$quarter,'','id="searchquarter"') ?>
                        </li></ul>
                    </div>
                    <div class="col-xs-12 col-lg-1">
                        <a type="text" id="btn-searchincomerep" class="btn btn-primary" style="height: 53px;padding: 16px;vertical-align: middle;">Search</a>
                    </div>
                    <div class="col-xs-12 col-lg-1">
                        <button type="submit" class="btn btn-danger" id="btn-printactualincome" style="height: 53px;padding: 16px;vertical-align: middle;display: none">Export to PDF</button>
                    </div>
                    <div class="col-xs-12">
                    <div class="table-responsive"><br>
                        <table id="tableIpaf" class="content-table table-line-border">
                            <thead>
                                <tr>
                                    <th colspan="12" style="text-align: center;"><span id="titleincome"></span></th>
                                </tr>
                                <tr>
                                    <th rowspan="2" class="hidden">Classification/Source of Income</th>
                                    <th colspan="4">Actual Income for the Quarter</th>
                                    <th rowspan="2">Cumulative Income Collections to Date<br><i style="font-size:10px">(Start of collection to present)</i></th>
                                    <th rowspan="2">Total Income Deposited with BTR<br><i style="font-size:10px">(SAGF-supported by deposit slips/BTR Certificate of Deposits)</i></th>
                                    <th rowspan="2">Total Income Deposited with AGDB<br><i style="font-size:10px">(PA-RIA-Based on Bank Statement of Account/Deposit Slips)</i></th>
                                    <th rowspan="2">Cumulative Income Deposited with BTR<br><i style="font-size:10px">(SAGF-Start of Collections to Present)</i></th>
                                    <th rowspan="2">Cumulative Income Deposited with AGDB<br><i style="font-size:10px">(RIA-Start of Collections to Present)</i></th>
                                </tr>
                                <tr>
                                    <th>1st Month</th>
                                    <th>2nd Month</th>
                                    <th>3rd Month</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody id="tbodyipafactualincome"></tbody>
                        </table>
                    </div>
                  </div>
                </form>
            </div>
            <div id="annualincomer" style="display: none;" class="col-md-12 col-xs-12 col-lg-12 tabcontentipaf">
                <form method="post" class="form-style-7" action="<?php echo base_url()?>pasu/report/pdfipaflandscape/ipafreportbyYear" target="_blank">
                    <div class="col-xs-12 col-lg-4">
                        <ul><li>
                            <?= form_label('Name of Protected Area','','for="searchPaYear"').form_dropdown('searchPaYear',$paList,'','id="searchPaYear"') ?>
                        </li></ul>
                    </div>
                    <div class="col-xs-12 col-lg-2">
                        <ul><li>
                            <?= form_label('Year','','for="searchYearbyYr"').form_dropdown('searchYearbyYr',$yearListed,'','id="searchYearbyYr"') ?>
                        </li></ul>
                    </div>
                    <div class="col-xs-12 col-lg-1">
                        <a type="text" id="btn-searchincomerepbyYr" class="btn btn-primary" style="height: 53px;padding: 16px;vertical-align: middle;">Search</a>
                    </div>
                    <div class="col-xs-12 col-lg-1">
                        <button type="submit" class="btn btn-danger" id="btn-printactualincomebyYr" style="height: 53px;padding: 16px;vertical-align: middle;display: none">Export to PDF</button>
                    </div>
                    <div class="col-xs-12">
                    <div class="table-responsive"><br>
                        <table id="tableIpafYr" class="content-table table-line-border">
                            <thead>
                                <tr>
                                    <th colspan="8" style="text-align: center;"><span id="titleincomebyYr"></span></th>
                                </tr>
                                <tr>
                                    <!-- <th rowspan="2">Classification/Source of Income</th> -->
                                    <th colspan="5">Quarter Income Collections</th>
                                    <th rowspan="2">Cumulative Income Deposited with BTR<br><i style="font-size:10px">(SAGF-Start of Collections to Present)</i></th>
                                    <th rowspan="2">Cumulative Income Deposited with AGDB<br><i style="font-size:10px">(RIA-Start of Collections to Present)</i></th>
                                </tr>
                                <tr>
                                    <td style="text-align:right">1st</td>
                                    <td style="text-align:right">2nd</td>
                                    <td style="text-align:right">3rd</td>
                                    <td style="text-align:right">4th</td>
                                    <td style="text-align:right">Total</td>
                                </tr>
                            </thead>
                            <tbody id="tbodyipafactualincomeyr"></tbody>
                        </table>
                    </div>
                  </div>
                </form>
            </div>
            <div id="annualincomerbyYr" style="display: block;" class="col-md-12 col-xs-12 col-lg-12 tabcontentipaf">
            </div>      
        </fieldset>
    </div>      
        </fieldset>
    </div>
</div>
