<section class="content">
	<div class="row">
		<div class="col-md-3">
	</div>
		<div class="col-md-6 col-sm-12">
			<div class="form-group">
				<a href="<?php echo base_url('main_server/user/user'); ?>" class="btn btn-info btn-flat" ><i class="fa fa-plus" name="add"></i> ADD USER</a>
			</div>
			<div class="panel panel-info">
				<div class="panel-body">					
					<div class="table-responsive">
						<input type="text" id="myInput" onkeyup="myFunctionusers()" placeholder="Quick search for username.">						

						<table id="tableusers" class="table table-hover table-bordered">
							<thead>
								<tr>
									<th>USERNAME</th>
									<th>PROTECTED AREA</th>
									<th>USER ROLE</th>	
									<th>STATUS</th>								
									<th>OPTION</th>
								</tr>
							</thead>
							<tbody id="tbodyusers">								
							</tbody>
						</table>
					</div>
				</div>										
			</div>
		</div>
	</div>
</section>
<script type="text/javascript" src="<?php echo base_url("jquery/slider/slider.js") ?>"></script>
