<div class="content">
	<div class="col-lg-12 col-sm-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title"><i class="ti-notepad"></i> RATES OF FEES</h4>
			</div>
			<div class="card-content">
				<div class="row">
					<div class="col-lg-12 col-sm-12">
						<?php echo form_open_multipart('#','id="FormFeeSetting" enctype="multipart/form-data"'); ?>
						<?php echo form_hidden('id_mainfee',$checkfee->id_mainfee);?>
						<?php echo form_hidden('pasu_id',$read->user_id);?>
						<table id="data_table" class="table table-bordered table-bordered" >
							<thead>
															
							</thead>
							<tbody>
								<tr>
									<td colspan="2" style="font-weight: bold; font-size: 18px;">Type of PA Visitors</td>	
									<!-- <td rowspan=""></td> -->
								</tr>
								<tr>
									<td><ul><li>Filipino Adults</ul></li></td>
									<td><?= form_input('fil_adults',$checkfee->fil_adults,'class="form-control border-input" onkeyup="run(this)" placeholder="Amount"') ?></td>
								</tr>
								<tr>
									<td><ul><li>Filipino Students</ul></li></td>
									<td><?= form_input('fil_students',$checkfee->fil_students,'class="form-control border-input" onkeyup="run(this)" placeholder="Amount"') ?></td>
								</tr>
								<tr>
									<td><ul><li>Filipino Person w/ disability and senior citizens</ul></li></td>
									<td><?= form_input('fil_distab',$checkfee->fil_distab,'class="form-control border-input" onkeyup="run(this)" placeholder="Amount"') ?></td>
								</tr>
								<tr>
									<td><ul><li>Foreign Citizens</ul></li></td>
									<td><?= form_input('foreigner',$checkfee->foreigner,'class="form-control border-input" onkeyup="run(this)" placeholder="Amount"') ?></td>
								</tr>
								<tr>
									<td colspan="2" style="font-weight: bold; font-size: 18px;">PA Facilities</td>
								</tr>
								<tr>
									<td><ul><li>Picnic Tables</ul></li></td>
									<td><?= form_input('facility_tables',$checkfee->facility_tables,'class="form-control border-input" onkeyup="run(this)" placeholder="Amount"') ?></td>
								</tr>								
								<tr>
									<td>
										<ul>
											<li>Cottages
												<ul>
													<li>Per day</li>
												</ul>
											</li>
										</ul>
									</td>
									<td><?= form_input('facility_cottages_day',$checkfee->facility_cottages_day,'class="form-control border-input" onkeyup="run(this)" placeholder="Amount"') ?></td>
								</tr>
								<tr>
									<td>
										<ul class="list-cottage">
											<li>
												<ul>
													<li>Per Night</li>
												</ul>
											</li>
										</ul>
									</td>
									<td><?= form_input('facility_cottages_night',$checkfee->facility_cottages_night,'class="form-control border-input" onkeyup="run(this)" placeholder="Amount"') ?></td>
								</tr>
								<tr>
									<td><ul><li>Camping Site</ul></li></td>
									<td><?= form_input('facility_campingsite',$checkfee->facility_campingsite,'class="form-control border-input" onkeyup="run(this)" placeholder="Amount"') ?></td>
								</tr>
								<tr>
									<td><ul><li>Swimming Pool</ul></li></td>
									<td><?= form_input('facility_swimmingpool',$checkfee->facility_swimmingpool,'class="form-control border-input" onkeyup="run(this)" placeholder="Amount"') ?></td>
								</tr>
								<tr>
									<td>
										<ul>
											<li>Sports Facilities
												<ul>
													<li>Daytime</li>
												</ul>
											</li>
										</ul>
									</td>
									<td><?= form_input('facility_bcourt_daytime',$checkfee->facility_bcourt_daytime,'class="form-control border-input" onkeyup="run(this)" placeholder="Amount"') ?></td>
								</tr>
								<tr>
									<td>
										<ul class="list-cottage">
											<li>
												<ul>
													<li>with Lights</li>
												</ul>
											</li>
										</ul>
									</td>
									<td><?= form_input('facility_bcourt_light',$checkfee->facility_bcourt_light,'class="form-control border-input" onkeyup="run(this)" placeholder="Amount"') ?></td>
								</tr>
								<tr>
									<td><ul><li>Docking Area</ul></li></td>
									<td><?= form_input('facility_dockingarea',$checkfee->facility_dockingarea,'class="form-control border-input" onkeyup="run(this)" placeholder="Amount"') ?></td>
								</tr>
								<tr>
									<td><ul><li>Special Docking Area</ul></li></td>
									<td><?= form_input('special_docking_area',$checkfee->special_docking_area,'class="form-control border-input" onkeyup="run(this)" placeholder="Amount"') ?></td>
								</tr>
								<tr>
									<td colspan="2" style="font-weight: bold; font-size: 18px;">Parking Area</td>
								</tr>
								<tr>
									<td><ul><li>Tricycle/Motorcycle</ul></li></td>
									<td><?= form_input('parking_tricycle',$checkfee->parking_tricycle,'class="form-control border-input" onkeyup="run(this)" placeholder="Amount"') ?></td>
								</tr>
								<tr>
									<td><ul><li>Cars/SUV</ul></li></td>
									<td><?= form_input('parking_cars',$checkfee->parking_cars,'class="form-control border-input" onkeyup="run(this)" placeholder="Amount"') ?></td>
								</tr>
								<tr>
									<td><ul><li>Passenger Jeep/Coaster</ul></li></td>
									<td><?= form_input('parking_jeep',$checkfee->parking_jeep,'class="form-control border-input" onkeyup="run(this)" placeholder="Amount"') ?></td>
								</tr>
								<tr>
									<td><ul><li>Mini-bus and Tour bus</ul></li></td>
									<td><?= form_input('parking_bus',$checkfee->parking_bus,'class="form-control border-input" onkeyup="run(this)" placeholder="Amount"') ?></td>
								</tr>
								<tr>
									<td colspan="2" style="font-weight: bold; font-size: 18px;">Recreational Activity</td>
								</tr>
								<tr>
									<td colspan="2">
										Water-based activities
									</td>									
								</tr>
								<tr>
									<td>
										<ul>
											<li>Filipinos</li>
										</ul>
									</td>
									<td><?= form_input('recreational_waterbase_activity_local',$checkfee->recreational_waterbase_activity_local,'class="form-control border-input" onkeyup="run(this)" placeholder="Amount"') ?></td>
								</tr>
								<tr>
									<td>
										<ul>
											<li>Foreigns</li>
											<td><?= form_input('recreational_waterbase_activity_foreign',$checkfee->recreational_waterbase_activity_foreign,'class="form-control border-input" onkeyup="run(this)" placeholder="Amount"') ?></td>
										</ul>
										
									</td>
								</tr>								
								<tr>
									<td colspan="2">Hiking and Biking</td>
								</tr>
								<tr>
									<td>
										<ul>
											<li>Filipinos</li>
											<td><?= form_input('recreational_hiking_local',$checkfee->recreational_hiking_local,'class="form-control border-input" onkeyup="run(this)" placeholder="Amount"') ?></td>
										</ul>
										
									</td>
								</tr>
								<tr>
									<td>
										<ul>
											<li>Foreigns</li>
											<td><?= form_input('recreational_hiking_foreign',$checkfee->recreational_hiking_foreign,'class="form-control border-input" onkeyup="run(this)" placeholder="Amount"') ?></td>
										</ul>
										
									</td>
								</tr>								
								<tr>
									<td colspan="2" style="font-weight: bold; font-size: 18px;">Commercial Documentation and Photography</td>
								</tr>
								<tr>
									<td><ul><li>Documentation and Photography</li></ul></td>
									<td><?= form_input('commercialdoc_photography',$checkfee->commercialdoc_photography,'class="form-control border-input" onkeyup="run(this)" placeholder="Amount"') ?></td>
								</tr>
								<tr>
									<td colspan="2" style="font-weight: bold; font-size: 18px;">Trekking, Biking, Mountain Climbing and Caving</td>
								</tr>
								<tr>
									<td><ul><li>Filipinos</li></ul></td>
									<td><?= form_input('trekking_biking_local',$checkfee->trekking_biking_local,'class="form-control border-input" onkeyup="run(this)" placeholder="Amount"') ?></td>
								</tr>
								<tr>
									<td><ul><li>Foreigns</li></ul></td>
									<td><?= form_input('trekking_biking_foreign',$checkfee->trekking_biking_foreign,'class="form-control border-input" onkeyup="run(this)" placeholder="Amount"') ?></td>
								</tr>
								<tr>
									<td colspan="2" style="font-weight: bold; font-size: 18px;">SCUBA diving, Whitewater Rafting and Non-Motorized Watersports</td>
								</tr>
								<tr>
									<td><ul><li>Filipinos</li></ul></td>
									<td><?= form_input('scuba_local',$checkfee->scuba_local,'class="form-control border-input" onkeyup="run(this)" placeholder="Amount"') ?></td>
								</tr>
								<tr>
									<td><ul><li>Foreigns</li></ul></td>
									<td><?= form_input('scuba_foreign',$checkfee->scuba_foreign,'class="form-control border-input" onkeyup="run(this)" placeholder="Amount"') ?></td>
								</tr>								
							</tbody>
						</table>
						<button type="button" name="btnlocation" id="submitlocation" onclick="insert_fee_setting()" class="btn btn-success  btn-flat"><i class="ti-update"> UPDATE RECORD</i></button>
					</div>
				</div>
				<?php echo form_close(); ?>
				<br>
				<div id="respondsFeeError" class="alert text-center" style="display:none;">
					<button type="button" class="close" id="clearMsgs"><span aria-hidden="true">&times;</span></button>
					<span id="messagemainFee" style="text-align: left;color:#a94442"></span>
				</div>
			</div>
		</div>
	</div>
</div>