<section class="content">
	<div class="row">
		<div class="col-md-12 col-sm-12">
			<div class="form-group"><br>
				<a href="<?php echo base_url('main_server/wnews/form'); ?>" class="btn btn-info btn-flat" ><i class="fa fa-plus" name="add"></i> ADD NEWS/EVENTS</a>								
			</div>
			<div class="panel panel-info">
				<div class="panel-body">					
					<div class="table-responsive">
						<input type="text" id="myInput" onkeyup="myFunctionnews()" placeholder="Quick search for name.">						

						<table id="tablenews" class="table table-hover table-bordered">
							<thead>
								<tr>
									<th>CATEGORY</th>
									<th>TITLE</th>										
					                <th>DATE PUBLISHED</th>
					                <th>STATUS</th>
									<th>OPTION</th>
								</tr>
							</thead>
							<tbody id="tbodynews">								
							</tbody>
						</table>
					</div>
				</div>										
			</div>
		</div>
	</div>
</section>
