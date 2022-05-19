<div class="col-xs-12 col-md-12 col-lg-12" class="form-style-6">
	<div class="card">
    <fieldset>
      <div class="card-content pdfw" style="margin: 12px 12px 12px 12px;">
        <center><h1>PHYSICAL REPORT OF OPERATION</h1></center>
      </div>
        <div class="tab pdfw">
            <a class="tablinkphysicalreport active" onclick="tabphysicalreport(event, 'quarterlyphyrep')">Quarterly Report</a>
            <a class="tablinkphysicalreport" onclick="tabphysicalreport(event, 'annualphyrep')">Annual Report</a>
        </div>
        <div id="quarterlyphyrep" style="display: block;" class="col-md-12 col-xs-12 col-lg-12 tabcontentphysicalreport">
          <?php echo form_open('pasu/report/ipaf_physical/physicalreport','id="formpgysicalreports" class="form-style-7" autocomplete="off" target="_blank"') ?>
          <div class="col-xs-12 col-lg-4 pdfw">
            <ul><li>
              <?php echo form_label('Protected Area').form_dropdown('searchPAphyrep',$paList,'','id="searchPAphyrep"') ?>
            </li></ul>
          </div>
          <div class="col-xs-12 col-lg-2 pdfw">
            <ul><li>
              <?php echo form_label('Year').form_dropdown('searchPAphyrepyear','','','id="searchPAphyrepyear"') ?>
            </li></ul>
          </div>
          <div class="col-xs-12 col-lg-2 pdfw">
              <ul><li>
                  <?php echo form_label('Quarter').form_dropdown('searchPAphyrepquarter',$quarter,'','id="searchPAphyrepquarter"') ?>
              </li></ul>
          </div>
          <div class="col-xs-12 col-lg-1 pdfw">
            <a type="text" id="btn-searchphysicalrep" class="btn btn-primary" style="height: 53px;padding: 16px;vertical-align: middle;">Search</a>
          </div>
          <div class="col-xs-12 col-lg-1 pdfw">
            <a id ="printbtner" type="button" class="btn btn-success" style="height: 53px;padding: 16px;vertical-align: middle;display: none" onclick="window.print();" >Print this page</a>
            <button type="submit" class="btn btn-danger hidden" id="btn-printphysrep" style="height: 53px;padding: 16px;vertical-align: middle;display: none">Export to PDF</button>
          </div>
          <div class="table-responsive large-tables">
          <table id="tblphysicalreportform" class="content-table table-line-border">
              <thead>
                  <tr>
                      <th colspan="20" style="text-align: left;"><span style="font-size: 24px">DEPARTMENT OF ENVIRONMENT AND NATURAL RESOURCES</span><br>QUARTERLY PHYSICAL REPORT OF OPERATION<span style="font-size:16px;font-style: normal;" id="titleme"></span></th>
                  </tr>
                  <tr>
                      <th rowspan="2">Program/Activity/Project (MFO)</th>
                      <th rowspan="2">Performance Indicator</th>
                      <th rowspan="2">Cost</th>
                      <th rowspan="2">Quantity</th>
                      <th colspan="4">Physical Target</th>
                      <th colspan="4">Physical Accomplishment</th>
                      <th colspan="4">Financial Target</th>
                      <th colspan="4">Financial Accomplishment</th>
                  </tr>
                  <tr>
                      <th>1st Month</th>
                      <th>2nd Month</th>
                      <th>3rd Month</th>
                      <th>Total</th>
                      <th>1st Month</th>
                      <th>2nd Month</th>
                      <th>3rd Month</th>
                      <th>Total</th>
                      <th>1st Month</th>
                      <th>2nd Month</th>
                      <th>3rd Month</th>
                      <th>Total</th>
                      <th>1st Month</th>
                      <th>2nd Month</th>
                      <th>3rd Month</th>
                      <th>Total</th>
                  </tr>
              </thead>
              <tbody id="tbodyphysicalGenreportform"></tbody>
          </table>
          </div>
          <?php echo form_close(); ?>
        </div>
        <div id="annualphyrep" class="col-md-12 col-xs-12 col-lg-12 tabcontentphysicalreport" style="display:none">
          <?php echo form_open('pasu/report/ipaf_physical/physicalreportyearly','id="formpgysicalreportsyearly" class="form-style-7" autocomplete="off" target="_blank"') ?>
          <div class="col-xs-12 col-lg-4 pdfw">
            <ul><li>
              <?php echo form_label('Protected Area').form_dropdown('searchPAphyrepYearly',$paList,'','id="searchPAphyrepYearly"') ?>
            </li></ul>
          </div>
          <div class="col-xs-12 col-lg-2 pdfw">
            <ul><li>
              <?php echo form_label('Year').form_dropdown('searchPAphyyearYearly','','','id="searchPAphyyearYearly"') ?>
            </li></ul>
          </div>
          <div class="col-xs-12 col-lg-1 pdfw">
            <a type="text" id="btn-searchphysicalrepYearly" class="btn btn-primary" style="height: 53px;padding: 16px;vertical-align: middle;">Search</a>
          </div>
          <div class="col-xs-12 col-lg-1 pdfw">
            <button type="submit" class="btn btn-danger hidden" id="btn-printphysrepYearly" style="height: 53px;padding: 16px;vertical-align: middle;display: none">Export to PDF</button>
            <a id ="printbtneryear" type="button" class="btn btn-success" style="height: 53px;padding: 16px;vertical-align: middle;display: none" onclick="window.print();" >Print this page</a>

          </div>
          <div class="table-responsive large-tables">
          <table id="tblphysicalreportyearform" class="content-table table-line-border">
              <thead>
                                <tr>
                                    <th colspan="78" style="text-align: left;">
                                      <span style="font-size: 24px">DEPARTMENT OF ENVIRONMENT AND NATURAL RESOURCES</span><br>ANNUAL PHYSICAL REPORT OF OPERATION<span style="font-size:16px;font-style: normal;" id="titleme211"></span>
                                    </th>
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
              <tbody id="tbodyphysicalGenreportyearform"></tbody>
          </table>
          </div>
          <?php echo form_close(); ?>
        </div>
    </fieldset>
  </div>
</div>
