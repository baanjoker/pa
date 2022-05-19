<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="form-group"><br>
				<a href="<?php echo base_url('main_server/wslider/form'); ?>" class="btn btn-info btn-flat" ><i class="fa fa-plus" name="add"></i> ADD RECORD</a>								
			</div>
			<div class="panel panel-info">
				<div class="panel-body">					
					<div class="table-responsive">
						<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Quick search for name.">						

						<table id="tableSlider" class="table table-hover table-bordered">
							<thead>
								<tr>
									<!-- <th>#</th> -->
									<th>IMAGE</th>		
									<th>TITLE</th>									
					                <th>STATUS</th>
									<th>OPTION</th>
								</tr>
							</thead>
							<tbody id="tbodyslider">
								
							</tbody>
						</table>
					</div>
				</div>										
			</div>
		</div>
	</div>	
</section>
<script type="text/javascript" src="<?php echo base_url("jquery/slider/slider.js") ?>"></script>