<fieldset>
	<div class="card">
		<div class="card-content" style="margin: 12px 12px 12px 12px;">
	        <center><h1>VISITORS REPORT</h1></center>
	    </div>
		<form method="post" class="form-style-7" action="<?php echo base_url()?>pasu/report/pdfpavisitorslandscape" target="_blank">
			<div class="col-xs-12 col-lg-12">
				<div class="col-lg-4 col-xs-4 pdfw">
					<ul><li>
						<?= form_label('Name of Protected Area','','for="searchPaVisitorlogs"').form_dropdown('searchPaVisitorlogs',$paList,'','class="form-control border-input" id="searchPaVisitorlogs"') ?>
					</li></ul>
				</div>
				<div class="col-lg-4 col-xs-4 pdfw">
					<ul><li>
						<?= form_label('Year','','for="searchYearVisitorLogs"').form_dropdown('searchYearVisitorLogs','','','class="form-control border-input" id="searchYearVisitorLogs"') ?>
					</li></ul>
				</div>
				<div class="col-lg-4 col-xs-4 pdfw">
					<ul><li>
						<?= form_label('Quarter','','for="searchquarterLogs"').form_dropdown('searchquarterLogs',$quarter,'','class="form-control border-input" id="searchquarterLogs"') ?>
					</li></ul>
				</div>
			</div>
			<div class="col-xs-12">
				<a type="text" id="searchVisitorLogs" class="btn btn-primary">Search</a>
				<a id ="printbtn" type="button" class="btn btn-success" onclick="window.print();" >Print this page</a>
				<button type="submit" class="btn btn-danger" id="pdfsubmit" style="display: none">Export to PDF</button>                     
			</div>
			<div class="col-xs-12">
				<div class="table-responsive">
					<table id="tableIpaf" class="table table-hover table-bordered">
						<thead>
							<tr>
								<th colspan="23"><span id="title"></span></th>
							</tr>
							<tr>
								<th style='text-align: center;' rowspan="3">Period Covered</th>
								<th style='text-align: center;' colspan="15">Local Visitors</th>
								<th style='text-align: center;' rowspan="3">Total</th>
								<th style='text-align: center;' colspan="3" rowspan="2">Foreign Visitors</th> 
								<th style='text-align: center;' rowspan="2" colspan="3">Grand Total</th> 
							</tr>
							<tr>
								<th style='text-align: center;background-color: #61d2ff;' colspan="3">Children<br>below 7 y/o</th>
								<th style='text-align: center;background-color: #ad68f2;' colspan="3">PWD</th>
								<th style='text-align: center;background-color: #f2a668;' colspan="3">Senior Citizen</th>
								<th style='text-align: center;background-color: #f268b8;' colspan="3">Student</th>
								<th style='text-align: center;background-color: #f268b8;' colspan="3">Adult</th>
							</tr>
							<tr>
								<th style='text-align: center;'>M</th>
								<th style='text-align: center;'>F</th>
								<th style='text-align: center;'>T</th>
								<th style='text-align: center;'>M</th>
								<th style='text-align: center;'>F</th>
								<th style='text-align: center;'>T</th>
								<th style='text-align: center;'>M</th>
								<th style='text-align: center;'>F</th>
								<th style='text-align: center;'>T</th>
								<th style='text-align: center;'>M</th>
								<th style='text-align: center;'>F</th>
								<th style='text-align: center;'>T</th>
								<th style='text-align: center;'>M</th>
								<th style='text-align: center;'>F</th>
								<th style='text-align: center;'>T</th>
								<th style='text-align: center;'>M</th>
								<th style='text-align: center;'>F</th>
								<th style='text-align: center;'>T</th>
								<th style='text-align: center;'>M</th>
								<th style='text-align: center;'>F</th>
								<th style='text-align: center;'>T</th>
								<!-- <th style='text-align: center;'>M</th>
								<th style='text-align: center;'>F</th> -->
								<!-- <th style='text-align: center;'>T</th> -->
							</tr>
						</thead>
						<tbody id="tbodyvisitorlog"></tbody>
					</table>
				</div>
			</div>
		</form>
	</div>
</fieldset>

<!-- <div class="row">
	<div id="exTab1" class="container"> 
		<form method="post" class="form-style-7" action="<?php echo base_url()?>pasu/report/pdfpavisitorslandscape" target="_blank">
			<div class="col-xs-12 col-lg-12 ">                  
				<div class="element-container">                  
					<div class="tab-content clearfix">
						<div class="col-xs-12">                  
							<h1>Protected Area Visitors Report</h1>
						</div><hr>
						<div class="col-xs-12">                         
							<div class="col-xs-6 col-lg-6">
								<ul>
										<li>
												<?= form_label('Name of Protected Area','','for="searchPaVisitor"').form_dropdown('searchPaVisitor',$paList,'','class="form-control border-input" id="searchPaVisitor"') ?>
												<span class="searchError"></span>
										</li>
								</ul>
							</div>    
							<div class="col-xs-6 col-lg-3">
								<ul>
										<li>
												<?= form_label('Year','','for="searchYearVisitor"').form_dropdown('searchYearVisitor','','','class="form-control border-input" id="searchYearVisitor"') ?>
												<span class="searchError"></span>
										</li>
								</ul>
							</div>  
							<div class="col-xs-6 col-lg-3">
								<ul>
										<li>
												<?= form_label('Quarter','','for="searchquarter"').form_dropdown('searchquarter',$quarter,'','class="form-control border-input" id="searchquarter"') ?>
												<span class="searchError"></span>
										</li>
								</ul>
							</div>                
						</div>
						<div class="col-xs-12">
							<a type="text" id="searchVisitor" class="btn btn-primary">Search</a>
							<button type="submit" class="btn btn-danger" id="pdfsubmit" style="display: none">Export to PDF</button>                     
						</div>
						<div class="col-xs-12">
							<div class="table-responsive">
								<table id="tableIpaf" class="table table-hover table-bordered">
									<thead>
										<tr>
											<th colspan="23"><span id="title"></span></th>
										</tr>
										<tr>
														<th style='text-align: center;' rowspan="3">Period Covered</th>
														<th style='text-align: center;' colspan="15">Local Visitors</th>
														<th style='text-align: center;' colspan="3" rowspan="2">Foreign Visitors</th> 
														<th style='text-align: center;' colspan="3" rowspan="2">Grand Total</th> 
																										 
												</tr>
												<tr>
														<th style='text-align: center;background-color: #61ff66;' colspan="3">Adult</th>
														<th style='text-align: center;background-color: #61d2ff;' colspan="3">Student</th>
														<th style='text-align: center;background-color: #ad68f2;' colspan="3">PWD</th>
														<th style='text-align: center;background-color: #f2a668;' colspan="3">Senior Citizen</th>
														<th style='text-align: center;background-color: #f268b8;' colspan="3">Children</th>
												</tr>
												<tr>
														<th style='text-align: center;'>M</th>
														<th style='text-align: center;'>F</th>
														<th style='text-align: center;'>T</th>
														<th style='text-align: center;'>M</th>
														<th style='text-align: center;'>F</th>
														<th style='text-align: center;'>T</th>
														<th style='text-align: center;'>M</th>
														<th style='text-align: center;'>F</th>
														<th style='text-align: center;'>T</th>
														<th style='text-align: center;'>M</th>
														<th style='text-align: center;'>F</th>
														<th style='text-align: center;'>T</th>
														<th style='text-align: center;'>M</th>
														<th style='text-align: center;'>F</th>
														<th style='text-align: center;'>T</th>
														<th style='text-align: center;'>M</th>
														<th style='text-align: center;'>F</th>
														<th style='text-align: center;'>T</th>
														<th style='text-align: center;'>M</th>
														<th style='text-align: center;'>F</th>
														<th style='text-align: center;'>T</th>
												</tr>
									</thead>
									<tbody id="tbodyvisitor"></tbody>
								</table>
							</div>
						</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div> -->
<script type="text/javascript">
$("#searchVisitorLogs").click(function(){
	var year_list = $('#searchYearVisitorLogs').val();
	var searchPa  = $('#searchPaVisitorlogs').val();
	var quarter  = $('#searchquarterLogs').val();
	var e = document. getElementById('printbtn');  

	var regid = document.getElementById('searchPaVisitorlogs');
	var strreg  = regid.options[regid.selectedIndex].text;


	$.ajax({
			 type: 'POST',
			data : {searchPa:searchPa,year_list:year_list,quarter:quarter},
			url: BASE_URL + 'pasu/report/visitor/searchvisitorLogbyquarter',
			success:function(response,responses){
				$('#tbodyvisitorlog').html(response);
				$('#title').html('PROTECTED AREAS, WILDLIFE AND COASTAL ZONE MANAGEMENT SERVICE <br>Statistics Report<br><u>'+strreg+'</u><br><u>'+quarter+'</u> Quarter CY <u>'+year_list+'</u>');
				 if (searchPa != '' && year_list != '' && quarter != '') {
						// e.style.display = 'inline-block';
					}
	}
	});
});

// $("#searchVisitor").click(function(){
// 	var year_list = $('#searchYearVisitor').val();
// 	var searchPa  = $('#searchPaVisitor').val();
// 	var quarter  = $('#searchquarter').val();
// 	var e = document. getElementById('pdfsubmit');  

// 	var regid = document.getElementById('searchPaVisitor');
// 	var strreg  = regid.options[regid.selectedIndex].text;


// 	$.ajax({
// 			 type: 'POST',
// 			data : {searchPa:searchPa,year_list:year_list,quarter:quarter},
// 			url: BASE_URL + 'pasu/report/visitor/searchvisitorbyquarter',
// 			success:function(response,responses){
// 				$('#tbodyvisitor').html(response);
// 				$('#title').html('PROTECTED AREAS, WILDLIFE AND COASTAL ZONE MANAGEMENT SERVICE <br>Statistics Report<br><u>'+strreg+'</u><br><u>'+quarter+'</u> Quarter CY <u>'+year_list+'</u>');
// 				 if (searchPa != '' && year_list != '' && quarter != '') {
// 						e.style.display = 'inline-block';
// 					}
// 	}
// 	});
// });
</script>
