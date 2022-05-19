<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-success">
				<div class="panel-heading">
					<div class="panel-title"><i class="fa fa-list"></i><strong><?php echo " ".$user_region->regionName." (".$user_region->regionDesc.")" ?> LIST</strong></div>
						<input type="text" name="regionId" class="hidden" value="<?php echo $user_region->region ?>" id="regionId">
				</div>
				<br>				
				<div class="panel-body">
					<div class="table_view col-xs-12">
						<div class="table-responsive">	
							<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Quick search for name.">						
							<table id="TablePaMain" width="100%" border="1" cellpadding="3" cellspacing="1" class="table table-hover">
								<thead>
									<tr>
										<th>Protected Area</th>
										<th>Province</th>
										<!-- <th>Municipality</th> -->
										<th>Option</th>
									</tr>
								</thead>
								<tbody id="tbodymain"></tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<script type="text/javascript" src="<?php echo base_url("jquery/user/pa/load.js") ?>"></script>