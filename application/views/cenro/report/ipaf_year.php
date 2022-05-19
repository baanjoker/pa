<div class="content">
	<div class="col-lg-12 col-sm-12">
		<div class="card">
			<!-- <div class="card-header">
				<h4 class="card-title"><i class="ti-notepad"></i> IPAF Quarterly Report</h4>
			</div> -->
			<div class="card-content">
    			<form method="post" class="form-style-7" action="<?php echo base_url()?>cenro/report/pdfipaf/ipafreport" target="_blank">
    				<div class="row">
						<div class="col-lg-4 col-sm-12">
							<div class="form-group">
                        		<?= form_label('Name of Protected Area','','for="searchPaCenro"').form_dropdown('searchpaCenro',$paList,'','class="form-control border-input" id="searchPaCenro"') ?>
							</div>
							<span class="searchError"></span>

						</div>	
						<div class="col-lg-2 col-sm-12">
							<div class="form-group">
                        		<?= form_label('Year','','for="searchYearCenro"').form_dropdown('searchYearCenro','','','class="form-control border-input" id="searchYearCenro"') ?>
							</div>
							<span class="searchError2"></span>
						</div>
						<div class="col-lg-2 col-sm-12">
							<div class="form-group">
                        		<?= form_label('Quarter','','for="searchquarter"').form_dropdown('searchquarter',$quarter,'','class="form-control border-input" id="searchquarter"') ?>
							</div>
							<span class="searchError2"></span>
						</div>											
						<div class="col-lg-2 col-sm-12">
							<div align="left"><br>
			                	<a type="text" id="searchtryYearCenro" class="btn btn-primary">Search</a>
							</div>
						</div>						
					</div>
					<div class="row">
						<div class="col-lg-12 col-sm-12">
							<div class="col-lg-2 col-sm-12" id="pdfid">
								<div align="left">
					               	<button type="submit" class="btn btn-danger" id="pdfsubmit" style="display: none">Export PDF</button>
								</div>
							</div>
							<div class="table-responsive">
				                <table id="tableIpaf" class="table table-hover table-bordered">
				                  	<thead>
				                  	  	<tr>
				                  	    	<th colspan="12" style="text-align:center"><span id="title" ></span></th>
				                  	  	</tr>
				                  	  	<tr>
				                  	  	  	<th colspan="2" style="text-align: center">Date Monitored</th>
				                  	  	  	<th colspan="7" style="text-align: center">Income Generated</th>
				                  	  	  	<th colspan="3" style="text-align: center">Amount / Date Deposited to BTR</th>
				                  	  	</tr>
				                  	  	<tr>
				                  	  	  	<th style="text-align: center" rowspan="2">Month</th>
				                            <th style="text-align: center" rowspan="2">Year</th>
				                            <th style="text-align: center" rowspan="2">Entrance Fee</th>
				                            <th style="text-align: center" rowspan="2">Facilities User Fee</th>
				                            <th style="text-align: center" rowspan="2">Resource User Fee</th>
				                            <th style="text-align: center" rowspan="2">Concession Fee</th>
				                            <th style="text-align: center" rowspan="2">Development Fee</th>
				                            <th style="text-align: center" rowspan="2">Others  (Pls. specify)</th>
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
				            <div class="table-responsive">
				                <table id="tableIpaf" class="table table-hover table-bordered">
				                	<thead>
				                	  	<tr>
				                	  	  	<th colspan="5"><span id="titles"></span></th>
				                	  	</tr>
				                	  	<tr>
				                	  	  	<th colspan="2" style="text-align: center">Date Monitored</th>
				                	  	  	<th colspan="3" style="text-align: center">Income Generated</th>
				                	  	</tr>
				                	  	<tr>
				                	  	  	<th style="text-align: center" rowspan="2">Month</th>
				                	  	  	<th style="text-align: center" rowspan="2">Year</th>
				                	  	  	<!-- <th style="text-align: center" rowspan="2">Development Fee</th> -->
				                	  	  	<th style="text-align: center" rowspan="2">Contribution<br>Donation</th>                      
				                	  	  	<th style="text-align: center" rowspan="2">Fines and Penalties</th>
				                	  	</tr> 
				                	</thead>
				                	<tbody id="tbodyipaf100"></tbody>
				                </table>
				            </div>
						</div>	
					</div>		
    			</form>
			</div>
		</div>
	</div>
</div>
