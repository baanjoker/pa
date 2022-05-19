<div class="tab">
    <a class="tablinkipaf active" onclick="tabipaf(event, 'monthly')">Monthly Report</a>
    <a class="tablinkipaf" onclick="tabipaf(event, 'weekly')">Weekly Report</a>
</div>
<div id="monthly" style="display: block;" class="col-md-12 col-xs-12 col-lg-12 tabcontentipaf">
    <form method="post" class="form-style-7" action="<?php echo base_url()?>pasu/report/pdfipaflandscape/ipafreportbyYear" target="_blank">
        <div class="col-xs-12"><h1>Integrated Protected Area Fund (IPAF) Monthly Report</h1></div><hr>
        <div class="col-xs-12">                         
            <div class="col-xs-6 col-lg-6">
                <ul>
                    <li>
                        <?= form_label('Name of Protected Area','','for="searchPa"').form_dropdown('searchPa',$paList,'','id="searchPa"') ?>
                        <!-- <span class="searchError"></span> -->
                    </li>
                </ul>
            </div>    
            <div class="col-xs-6 col-lg-3">
                <ul>
                    <li>
                        <?= form_label('Year','','for="searchYear"').form_dropdown('searchYear','','','id="searchYear"') ?>
                        <!-- <span class="searchError"></span> -->
                    </li>
                </ul>
            </div>  
            <div class="col-xs-6 col-lg-3">
                <ul>
                    <li>
                        <?= form_label('Quarter','','for="searchquarter"').form_dropdown('searchquarter',$quarter,'','id="searchquarter"') ?>
                        <!-- <span class="searchError"></span> -->
                    </li>
                </ul>
            </div>                
        </div>
        <div class="col-xs-12">
            <a type="text" id="searchtryYear" class="btn btn-primary">Search</a>
        </div>       
        <div class="col-xs-12">
            <div class="table-responsive"><br>
                <table id="tableIpaf" class="content-table">
                    <thead>
                        <tr>
                            <th colspan="12" style="text-align: center;"><span id="title"></span></th>
                        </tr>
                        <tr>
                            <th colspan="2" style="text-align: center">Date Collected</th>
                            <th colspan="7" style="text-align: center">Income Generated (₱)</th>
                            <th colspan="3" style="text-align: center">Amount (₱)/ Date Deposited to BTR</th>
                        </tr>
                        <tr>
                            <th style="text-align: center" rowspan="2">Month</th>
                            <th style="text-align: center" rowspan="2">Year</th>
                            <th style="text-align: center" rowspan="2">Entrance Fee</th>
                            <th style="text-align: center" rowspan="2">Facilities User Fee</th>
                            <th style="text-align: center" rowspan="2">Resource User Fee</th>
                            <th style="text-align: center" rowspan="2">Concession Fee</th>
                            <th style="text-align: center" rowspan="2">Development Fee</th>
                            <th style="text-align: center" rowspan="2">Others</th>
                            <th style="text-align: center" rowspan="2">Total Income</th>
                            <th style="text-align: center" rowspan="2">Retained Income(75%)</th>
                            <th style="text-align: center" rowspan="2" class="hide">Disbursement (75%)</th>
                            <th style="text-align: center" rowspan="2">SAGF (25%)</th>
                            <th style="text-align: center" rowspan="2" class="hide">Disbursement (25%)</th>
                            <th style="text-align: center" rowspan="2">Total Income</th>
                        </tr> 
                    </thead>
                    <tbody id="tbodyipaf"></tbody>
                </table>
            </div>
        </div>       
        <div class="col-xs-12">
            <div class="table-responsive"><br>
                <table id="tableIpaf" class="content-table">
                    <thead>
                        <tr>
                            <th colspan="4" style="text-align: center;"><span id="titles"></span></th>
                        </tr>
                        <tr>
                            <th colspan="2" style="text-align: center">Date Collected</th>
                            <th style="text-align: center" rowspan="3" class="hide">Distribution Fee (₱)</th>
                            <th style="text-align: center" rowspan="3">Contribution/Donation (₱)</th>                      
                            <th style="text-align: center" rowspan="3">Fines and Penalties (₱)</th>
                        </tr>
                        <tr>
                            <th style="text-align: center" rowspan="2">Month</th>
                            <th style="text-align: center" rowspan="2">Year</th>
                        </tr> 
                    </thead>
                    <tbody id="tbodyipaf100"></tbody>
                </table>
            </div><hr>
        </div>

        <fieldset>
          <legend>Signatory</legend>
          <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="col-xs-6 col-md-6 col-lg-6">
              <ul><li>
                <?= form_label('Special Collection Officer:').form_input('name1','','placeholder="First name, Middle initials, Last name" id="name1"'); ?>
              </li></ul>
            </div> 
            <div class="col-xs-6 col-md-6 col-lg-6">
              <ul><li>
                <?= form_label('Postion/Designation:').form_input('designation1','','placeholder="Designation/Position" id="designation1"'); ?>
              </li></ul>
            </div>          
          </div>
          <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="col-xs-6 col-md-6 col-lg-6">
                <ul><li>
                  <?= form_label('Protected Area Superintendent:').form_input('name2',$completename,'placeholder="First name, Middle initials, Last name" id="name2"'); ?>
                </li></ul>
              </div> 
              <div class="col-xs-6 col-md-6 col-lg-6">
                <ul><li>
                  <?= form_label('Postion/Designation:').form_input('designation2',$designation,'placeholder="Designation/Position" id="designation2"'); ?>
                </li></ul>
              </div>          
            </div>
            <div class="col-xs-12 col-md-12 col-lg-12">
              <div class="col-xs-6 col-md-6 col-lg-6">
                  <ul><li>
                    <?= form_label('CENRO/PENRO Reviewed by:').form_input('name3','','placeholder="First name, Middle initials, Last name" id="name3"'); ?>
                  </li></ul>
                </div> 
                <div class="col-xs-6 col-md-6 col-lg-6">
                  <ul><li>
                    <?= form_label('Postion/Designation:').form_input('designation3','','placeholder="Designation/Position" id="designation3"'); ?>
                  </li></ul>
                </div>          
            </div>
            <button type="submit" class="btn btn-danger" id="pdfsubmit" style="display: none">Export to PDF</button>
        </fieldset> 
    </form>
</div>
<div id="weekly" class="col-md-12 col-xs-12 col-lg-12 tabcontentipaf">
  <form method="post" class="form-style-7" action="<?php echo base_url()?>pasu/report/pdfipaflandscape/ipafreportweekly" target="_blank">
        <div class="col-xs-12"><h1>Integrated Protected Area Fund (IPAF) Weekly Report</h1></div><hr>
        <div class="col-xs-12">                         
            <div class="col-xs-6 col-lg-4">
                <ul>
                    <li>
                        <?= form_label('Name of Protected Area','','for="searchPa2"').form_dropdown('searchPa2',$paList,'','id="searchPa2"') ?>
                        <!-- <span class="searchError_pa"></span> -->
                    </li>
                </ul>
            </div>    
            <div class="col-xs-6 col-lg-2">
                <ul>
                    <li>
                        <?= form_label('Year','','for="searchYear2"').form_dropdown('searchYear2','','','id="searchYear2"') ?>
                        <!-- <span class="searchErro_weekyearr"></span> -->
                    </li>
                </ul>
            </div> 
            <div class="col-xs-6 col-lg-2">
                <ul>
                    <li>
                        <?= form_label('Months','','for="months2"').form_dropdown('months2',$monthListed,'','id="months2"') ?>
                        <!-- <span class="searchError_weekquarter"></span> -->
                    </li>
                </ul>
            </div>  
            <div class="col-xs-6 col-lg-2">
                <ul>
                    <li>
                        <?= form_label('From Day','','for="fdays"').form_dropdown('fdays',$dayList,'','id="fdays"') ?>
                    </li>
                </ul>
            </div> 
             <div class="col-xs-6 col-lg-2">
                <ul>
                    <li>
                        <?= form_label('To Day','','for="tdays"').form_dropdown('tdays',$dayList,'','id="tdays"') ?>
                    </li>
                </ul>
            </div>                 
        </div>
        <div class="col-xs-12">
            <a type="text" id="searchtryYear2" class="btn btn-primary">Search</a>
        </div>       
        <div class="col-xs-12">
            <div class="table-responsive"><br>
                <table id="tableIpaf" class="content-table">
                    <thead>
                        <tr>
                            <th colspan="11"><span id="title2"></span></th>
                        </tr>
                        <tr>
                            <th  rowspan="3" style="text-align: center">Date Collected</th>
                            <th colspan="7" style="text-align: center">Income Generated (₱)</th>
                            <th colspan="3" style="text-align: center">Amount (₱)/ Date Deposited to BTR</th>
                        </tr>
                        <tr>
                           <!--  <th style="text-align: center" rowspan="2">Month</th>
                            <th style="text-align: center" rowspan="2">Day</th> -->
                            <th style="text-align: center" rowspan="2">Entrance Fee</th>
                            <th style="text-align: center" rowspan="2">Facilities User Fee</th>
                            <th style="text-align: center" rowspan="2">Resource User Fee</th>
                            <th style="text-align: center" rowspan="2">Concession Fee</th>
                            <th style="text-align: center" rowspan="2">Development</th>
                            <th style="text-align: center" rowspan="2">Others  (Pls. specify)</th>
                            <th style="text-align: center" rowspan="2">Total Income</th>
                            <th style="text-align: center" rowspan="2">Retained Income(75%)</th>
                            <th style="text-align: center" rowspan="2" class="hide">Disbursement(75%)</th>
                            <th style="text-align: center" rowspan="2">SAGF (25%)</th>
                            <th style="text-align: center" rowspan="2" class="hide">Disbursement (25%)</th>
                            <th style="text-align: center" rowspan="2">Total Income</th>
                        </tr> 
                    </thead>
                    <tbody id="tbodyipaf_month"></tbody>
                </table>
            </div>
        </div>       
        <div class="col-xs-12">
            <div class="table-responsive"><br>
                <table id="tableIpaf" class="content-table">
                    <thead>
                        <tr>
                            <th colspan="3"><span id="titles2"></span></th>
                        </tr>
                        <tr>
                            <th rowspan="3" style="text-align: center">Date Collected</th>
                            <th style="text-align: center" rowspan="3" class="hide">Disbursement (₱)</th>
                            <th style="text-align: center" rowspan="3">Contribution/Donation (₱)</th>                      
                            <th style="text-align: center" rowspan="3">Fines and Penalties (₱)</th>
                        </tr>
                        
                    </thead>
                    <tbody id="tbodyipaf1001"></tbody>
                </table>
            </div><hr>
        </div>

        <fieldset>
          <legend>Signatory</legend>
          <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="col-xs-6 col-md-6 col-lg-6">
              <ul><li>
                <?= form_label('Prepared and Compiled by:').form_input('name11','','placeholder="First name, Middle initials, Last name" id="name11"'); ?>
              </li></ul>
            </div> 
            <div class="col-xs-6 col-md-6 col-lg-6">
              <ul><li>
                <?= form_label('Postion/Designation:').form_input('designation11','','placeholder="Designation/Position" id="designation11"'); ?>
              </li></ul>
            </div>          
          </div>
          <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="col-xs-6 col-md-6 col-lg-6">
                <ul><li>
                  <?= form_label('Reviewed by:').form_input('name21',$completename,'placeholder="First name, Middle initials, Last name" id="name21"'); ?>
                </li></ul>
              </div> 
              <div class="col-xs-6 col-md-6 col-lg-6">
                <ul><li>
                  <?= form_label('Postion/Designation:').form_input('designation21',$designation,'placeholder="Designation/Position" id="designation21"'); ?>
                </li></ul>
              </div>          
            </div>
            <div class="col-xs-12 col-md-12 col-lg-12">
              <div class="col-xs-6 col-md-6 col-lg-6">
                  <ul><li>
                    <?= form_label('Submitted by:').form_input('name31','','placeholder="First name, Middle initials, Last name" id="name31"'); ?>
                  </li></ul>
                </div> 
                <div class="col-xs-6 col-md-6 col-lg-6">
                  <ul><li>
                    <?= form_label('Postion/Designation:').form_input('designation31','','placeholder="Designation/Position" id="designation31"'); ?>
                  </li></ul>
                </div>          
            </div>
            <button type="submit" class="btn btn-danger" id="pdfsubmit2" style="display: none">Export to PDF</button>
        </fieldset> 
    </form>
</div>

                
<!-- <script src="<?php echo base_url().'assets/'; ?>dist/js/chart/chart-area-demo.js"></script> -->