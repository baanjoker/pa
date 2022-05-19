<div class="col-xs-12 col-md-12 col-lg-12">
	<div class="card">
		<fieldset>
            <div class="card-content" style="margin: 12px 12px 12px 12px;">
                <center><h1>Disbursement</h1></center>
            </div>
			<?php echo form_open('pasu/report/ipaf_disbursement/ipafdisbursementreport','id="formdisbursementReport" class="form-style-7" autocomplete="off" target="_blank"') ?>
        	<div class="col-xs-12">
        		<div class="col-xs-12 col-lg-6 col-md-6">
        			<ul><li>
	        			<?php echo form_label('Select Protected Area','','for="disburse_pa"').form_dropdown('disburse_pa',$paList,'','id="disburse_pa"'); ?>
	        		</li></ul>
        		</div>
        		<div class="col-xs-12 col-lg-2 col-md-2">
        			<ul><li>
	        			<?php echo form_label('Select Year Duration','','for="disburse_year"').form_dropdown('disburse_year',$yearListed,'','id="disburse_year"'); ?>
	        		</li></ul>
        		</div>
        		<div class="col-xs-12 col-lg-2 col-md-2">
        			<ul><li>
	        			<?php echo form_label('Select Year Duration','','for="disburse_year_to"').form_dropdown('disburse_year_to',$yearListedduration,'','id="disburse_year_to"'); ?>
	        		</li></ul>
        		</div>
        		<div class="btn-group col-xs-6 col-lg-2 col-md-2 ">
					<a type="text" id="btn-searchdisbursement" class="btn btn-primary">Search</a>
					<!-- <a type="text" id="btn-printdisbursement" class="btn btn-success" style="display: none;">Print</a> -->
            		<button type="submit" class="btn btn-danger" id="btn-printdisbursement" style="display: block">Export to PDF</button>

	        	</div>	        	
        	</div>
        	<div class="col-xs-12">
	            <div class="table-responsive"><br>
	                <table id="tabledisbursementlist" class="content-table table-line-border">
	                    <thead>
	                        <tr>
	                            <th colspan="13"><span id="title_disburse"></span></th>
	                        </tr>
	                        <tr>
	                        	<th rowspan="2" style="text-align: center">Year Disbursed</th>
	                        	<th colspan="3" style="text-align: center">Total Income</th>
	                        	<th colspan="3" style="text-align: center">75% Old Subfund</th>
	                        	<th colspan="3" style="text-align: center">75% PA RIA</th>
	                        	<th colspan="3" style="text-align: center">25% Central IPAF/IPAF SAGF</th>
	                        </tr>
	                        <tr>
	                        	<th>Receipt</th>
	                        	<th>Disbursement</th>
	                        	<th>Balance</th>
	                        	<th>Income</th>
	                        	<th>Disbursement</th>
	                        	<th>Balance</th>
	                        	<th>Income</th>
	                        	<th>Disbursement</th>
	                        	<th>Balance</th>
	                        	<th>Income</th>
	                        	<th>Disbursement</th>
	                        	<th>Balance</th>
	                        </tr>
	                    </thead>
	                    <tbody id="tbodydisbursementlists"></tbody>
	                </table>
	                 <span id="val"></span>
	            </div>
	        </div>
        	<?php echo form_close(); ?>
        </fieldset>
	</div>
</div>
