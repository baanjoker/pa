<div class="content">
	<div class="col-lg-12 col-sm-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title"><i class="ti-notepad"></i> IPAF Report</h4>
			</div>
			<div class="card-content">
				<form method="post" class="" action="<?php echo base_url()?>pasu/report/pdfipaf/ipafreportbyYear" target="_blank">
					<div class="row">
						<div class="col-lg-4 col-sm-12">
							<div class="form-group">
								<?php echo form_dropdown('searchpa',$paList,'','class="form-control border-input" id="searchPa"') ?>
							</div>
							<span class="searchError"></span>
						</div>
						<div class="col-lg-2 col-sm-12">
							<div class="form-group">
								<?php echo form_dropdown('searchyear','','','class="form-control border-input" id="searchYear"') ?>
							</div>
						</div>
						<div class="col-lg-2 col-sm-12">
							<div align="left">
			                	<a type="text" id="searchtryYear" class="btn btn-primary">Search</a>
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
							    	    	<th>Month</th>
							    	    	<th>Details</th>
							    	    	<th>Total</th>
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
