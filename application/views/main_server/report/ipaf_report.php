<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-info">
				<div class="panel-heading">
					<div class="panel-title"><i class="fa fa-list"></i><strong> Report</strong></div>
				</div>
				<div class="panel-body">
					<!-- Nav tabs -->
		            <ul class="nav nav-tabs" role="tablist">
		                <li role="presentation" class="<?= ($this->session->flashdata('p_status')!=2?"active":null) ?>">
		                    <a href="#byYear" aria-controls="byYear" role="tab" data-toggle="tab">Report By Year</a>
		                </li>		                
		            </ul>
		            <!-- Tab panes -->
              		<div class="tab-content">
              			<div role="tabpanel" class="tab-pane <?= ($this->session->flashdata('p_status')!=2?"active":null) ?>" id="byYear">
              				<div id="form" class="form-area">
              					<center><h4>Generate report by Year</h4></center>
		              			<form method="post" class="" action="<?php echo base_url()?>main_server/ipaf_report/ipafreportbyYear" target="_blank">
									<div class="row">
										<div class="col-lg-4 col-sm-12">
											<div class="form-group">
												<?php echo form_dropdown('searchpas',$paList,'','class="form-control border-input" id="searchPas"') ?>
											</div>
											<span class="searchError"></span>
										</div>	
										<div class="col-lg-2 col-sm-12">
											<div class="form-group">
												<?php echo form_dropdown('searchyears','','','class="form-control border-input" id="searchYears"') ?>
											</div>
											<span class="searchError2"></span>
										</div>											
										<div class="col-lg-2 col-sm-12">
											<div align="left">
								               	<a type="text" id="searchtryYear" class="btn btn-primary">Search</a>
											</div>
										</div>										
									</div>
								
									<br>
									<div class="row">
										<div class="col-lg-12 col-sm-12">
											<div align="left">
								               	<button type="submit" class="btn btn-danger" id="pdfsubmit" style="display: none">Export PDF</button>
											</div>
											<div class="table-responsive"><br>
												<table id="tableFeeQueryReport" class="table table-hover table-bordered">
											    	<thead>
											    	    <tr>
											    	    	<th>Month</th>
											    	    	<th>Details</th>							    	    	
											    	    	<th>Total</th>
											    	    </tr>
											    	</thead>
											    	<tbody id="tbodyreportfees"></tbody>
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
		</div>
	</div>
</section>