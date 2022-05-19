<div class="container">	
	<div class="row">
		<div class="col-md-12 col-sm-12">
			<?php foreach ($info as $data): ?>
				<?php foreach ($infoimage as $dataimage): ?>
					<?php if (!empty($dataimage->pa_image)): ?>
						<div><img src="<?php echo base_url('bmb_assets2/upload/pa_profile_pic/'.$dataimage->pa_image) ?>" class="center"></div>
					<?php endif ?>
				<?php endforeach ?>
			<?php endforeach ?>				
			<input type="text" name="gencodespa" id="gencodespa" value="<?php echo $data->generatedcode; ?>" class="hidden">
			<div class="col-md-12 col-lg-12">
				<a href='<?= base_url("/pdfreports/pdffilepa/$data->generatedcode") ?>' class="btn btn-danger" target="_blank"><i class="fa fa-file-pdf-o fa-2x"></i> PDF REPORT</a>
			</div>
			<div class="col-md-12 col-sm-12" style="margin-top:20px">
				<div class="col-xs-12 col-lg-12">
	                <table class="content-table">
	                    <thead>
	                        <tr>
	                            <th colspan="4" style="text-align: center;background-color: #0073e6; font-size: 24px"><?php echo $data->pa_name; ?></th>
	                        </tr>
	                    </thead>
	                    <tbody id="tbodyinfopa"></tbody>
	                </table>	                
	            </div>
			</div>	
			<div class="col-md-12 col-sm-12" style="margin-top:20px">
				<div class="col-xs-12 col-lg-12">
					<table class="content-table">
						<thead>
							<tr>
								<td>Protected Area Event</td>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><div id="calendars"></div></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>	
</div>

<div id="calendarModal" class="modal fade">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">close</span></button>
            <h4 id="modalTitle" class="modal-title"></h4>
        </div>
        <div id="modalBody" class="modal-body"> </div><hr>
        <div id="modalDatestart"></div>
        <div id="modalDateend"></div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>
</div>