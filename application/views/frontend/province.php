<div class="container">	
	<div class="row">		
		<div class="col-md-12 col-sm-12">
			<div class="head">
				<div class="line"></div>
				<div class="ribbonHeadCenter">
					<h1>Protected Area Dashboard<br>PROVINCE</h1>
					<div class="row">
						<div class="col-md-12 col-lg-6">
							<p>This is a realtime data. Count is based on the data encoded on PA System.</p>
							<input type="text" name="paids" id="paids" value="<?php echo $paids; ?>" class="hidden">
							<div class="col-sm-12 col-md-12">
								<table id="tblpadisplay" class="content-table">
									<thead>
										<tr>
											<th colspan="3">Province of <?php 
											foreach ($checkprov as $row) {
												echo $row->provinceName;
											}
											 ?></th>
										</tr>
										<tr>
											<th>Protected Areas</th>
<!-- 											<th>No. of PAs</th>
 -->											<th></th>
										</tr>
									</thead>
	                        		<tbody id="tbodyProtectedAreabyProv"></tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>