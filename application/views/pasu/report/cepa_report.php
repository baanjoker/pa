<div class="row">
	<div id="exTab1" class="container">
		<?php echo form_open('pasu/report/cepa/printcepa','id="cepareportform" enctype="multipart/form-data" class="form-style-7" autocomplete="off" target="_blank"') ?>
			<div class="col-xs-12 col-lg-12 ">
                <div class="card">
                	<fieldset>
                		<legend>Communication Education and Public Awareness(CEPA) Activity Report</legend>
                		<div class="col-xs-12 col-lg-12">
                            <ul><li>
                                <?php echo form_label('Select Protected Area').form_dropdown('pacepaid',$paList,'','id="pacepaid"') ?>                				
                            </li></ul>
                		</div>
                		<div class="col-xs-12 col-lg-12">
                			<div class="col-xs-6 col-lg-6">
                				<ul><li>
                					<?= form_label('Prepared by:').form_input('cepapreparedname','','id="cepapreparedname"') ?>
                				</li></ul>
                			</div>
                			<div class="col-xs-6 col-lg-6">
                				<ul><li>
                					<?= form_label('Noted by:').form_input('cepanotedname','','id="cepanotedname"') ?>
                				</li></ul>
                			</div>
                		</div>
                		<div class="col-lg-6 col-sm-6">
                           	<button type="submit" class="btn btn-success" style="height: 50px">GENERATE PDF</button>
                        </div>
                	</fieldset>
                </div>
            </div>
        <?php echo form_close(); ?>
    </div>
</div>