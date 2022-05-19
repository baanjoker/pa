<form method="post" action="#" id="MinutesofMeetingForm" role="form" class="form-style-7">
    <div class="modal fade" id="modal-edit-minutes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Minutes of Meeting</h4>
                </div>
                <div class="modal-body" style="display:grid">
                    <div class="col-xs-12 " style="margin-top:10px">
                        <div class="col-xs-6 col-lg-6 ">
                            <input type="hidden" id="moms-gencode" name="moms-gencode" value="" />
                            <input type="hidden" id="moms-gencode2" name="moms-gencode2" value="" />
                            <input type="hidden" id="moms-id" name="moms-id" value="" />
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-12">
                        <fieldset>
                            <div class="col-xs-4 col-lg-4">
                                <ul><li>
                                    <?= form_label('Date conducted','','for="edit-minutes_bmb_month"').form_dropdown('edit-minutes_bmb_month',$monthList,'','id="edit-minutes_bmb_month" ') ?>
                                </li></ul>
                            </div>
                            <div class="col-xs-4 col-lg-4">
                                <ul><li>
                                    <?= form_label('&nbsp;','','for="edit-minutes_bmb_day"').form_dropdown('edit-minutes_bmb_day',$dayList,'','id="edit-minutes_bmb_day" ') ?>
                                </li></ul>
                            </div>
                            <div class="col-xs-4 col-lg-4">
                                <ul><li>
                                    <?= form_label('&nbsp;','','for="edit-minutes_bmb_year"').form_dropdown('edit-minutes_bmb_year',$yearList,'','id="edit-minutes_bmb_year" ') ?>
                                </li></ul>
                            </div>
                            <div class="col-xs-12 col-lg-12">
                                <ul><li>
                                    <?= form_label('Title of minutes of meeting','','for="edit-title_minutes"').form_input('edit-title_minutes','','id="edit-title_minutes" ') ?>
                                </li></ul>
                            </div>
                            <div class="col-xs-12 col-lg-12">
                                <ul><li>
                                    <?= form_label('Remarks','','for="edit-remarks_minutes"').form_textarea('edit-remarks_minutes','','id="edit-remarks_minutes" ') ?>
                                </li></ul>
                            </div>
                            <div class="col-xs-12 col-lg-12">
                                <label>Upload notice of meeting <i>(*.pdf,*.csv, minimum size of 50MB)</i></label>
                                <input type='file' name="edit-minutesfile" id="edit-minutesfile" onchange="readURLminutesFileEdit(this);" />
                                <input type="hidden" id="edit-minutesfile_text" name="edit-minutesfile_text" />
                                <input type="hidden" id="edit-minutesfile_span" name="edit-minutesfile_span" />
                                <div id="edit-uploadminutesfile_file"></div>
                            </div>
                            <div class="col-xs-12 col-lg-12">
                                <fieldset>
                                    <label>Current file attached</label>
                                    <div id="displayminutesofmeeting"></div>
                                </fieldset>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="modal-footer">
                            <button class="btn btn-info" type="button" onclick="Updateminuteofmeeting();" />Update
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>



