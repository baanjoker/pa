<div class="content">
	<div class="col-lg-12 col-sm-12">
		<div class="card">
			<!-- <div class="card-header">
				<h4 class="card-title"><i class="ti-notepad"></i> IPAF Yearly Report</h4>
			</div> -->
			<div class="card-content">
				<form method="post" class="" action="<?php echo base_url()?>cenro/report/pdfipaf/ipafreport" target="_blank">
					<div class="row">
						<div class="col-lg-4 col-sm-12">
							<div class="form-group">
								<?php echo form_dropdown('searchpaCenro',$paList,'','class="form-control border-input" id="searchPaCenros"') ?>
							</div>
							<span class="searchError"></span>

						</div>	
						<div class="col-lg-2 col-sm-12">
							<div class="form-group">
								<?php echo form_dropdown('searchyearCenro',$yearduration,'','class="form-control border-input" id="searchYearCenro"') ?>
							</div>
						</div>	
						<div class="col-lg-2 col-sm-12">
							<div class="form-group">
								<?php echo form_dropdown('searchmonthCenro',$yearduration,'','class="form-control border-input" id="searchMonthCenro"') ?>
							</div>
							<span class="searchError2"></span>
						</div>						
						<div class="col-lg-2 col-sm-12">
							<div align="left">
			                	<a type="text" id="searchtryCenro" class="btn btn-primary">Search</a>
							</div>
						</div>
						<div class="col-lg-2 col-sm-12" id="pdfid">
							<div align="left">
			                	<button type="submit" class="btn btn-danger">PDF</button>
							</div>
						</div>
					</div>
				
					<br>
					<div class="row">
						<div class="col-lg-12 col-sm-12">
							<div class="table-responsive"><br>
								<table id="tableFeeQueryReport" class="table table-hover table-bordered">
							    	<thead>
							    	    <tr>
							    	    	<th>Year</th>
							    	    	<th>Visitors</th>
							    	    	<th>Facilities</th>
							    	    	<th>Parking Area</th>
							    	    	<th>Others</th>
							    	    	<th>Sub Total</th>
							    	    </tr>
							    	</thead>
							    	<tbody id="tbodyreportfee"></tbody>
								</table>
							</div>
						</div>	
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>