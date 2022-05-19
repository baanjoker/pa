<div id="refer" class="tab-pane">
    <div class="form-style-6">
        <h2>References</h2>
    </div>
    <div class="col-xs-12">
        <div class="col-xs-12 tooltip">
            <div class="col-xs-12 col-lg-12">
                <ul><li>
                    <?= form_label('Type of citation').form_dropdown('type_citation',$citationlist,'','id="type_citation"');?>
                </li></ul>
            </div>
            <fieldset>
                <legend style="background-color:#fafafa; color: #444;font-size: 14px;font-weight: 700;">Date published</legend>
                <div class="col-xs-6 col-lg-4" id="refmonthid">
                    <ul><li>
                        <?= form_dropdown('ref_date_month',$monthListed,'','id="ref_date_month"');?>
                     </li></ul>
                </div>
                <div class="col-xs-6 col-lg-4" id="refyearid">
                    <ul><li>
                        <?= form_dropdown('ref_date_year',$yearListed,'','id="ref_date_year"');?>
                    </li></ul>
                </div>
            </fieldset>    
            <span class="tooltiptext">Select date published</span>                                
        </div>
        <div class="col-xs-12">                                    
             <div class="col-xs-12 col-lg-12 tooltip">
                <ul><li>
                    <?= form_label('Author <i>(Last name, First initial. Middle initial)</i>','','for="author"').form_input('author','','placeholder="Name of the author" id="author"');?>
                    <span class="tooltiptext">Input author</span>
                </li></ul>
             </div>
        </div>
        <div class="col-xs-12 col-lg-12" id="divwebsiteRef" style="display:none">
            <div class="col-xs-12 col-lg-12 tooltip">
                <ul><li>
                    <?= form_label('Web page title','','for="webtitleRef"').form_input('webtitleRef','','placeholder="eg. Better Call Saul’ last?" id="webtitleRef"');?>       
                    <span class="tooltiptext">Input title of web page</span>                                 
                </li></ul>
            </div>
            <div class="col-xs-12 col-lg-12 tooltip">
                <ul><li>
                    <?= form_label('Name of website','','for="websiteRef"').form_input('websiteRef','','placeholder="eg. FiveThirtyEight" id="websiteRef"');?>       
                    <span class="tooltiptext">Input name of website</span>                                 
                </li></ul>
            </div>
        </div>
        <div class="col-xs-12 col-lg-12" id="divbookRef" style="display:none">
            <div class="col-xs-12 col-lg-12 tooltip">
                <ul><li>
                    <?= form_label('Title of work','','for="worktitleRef"').form_input('worktitleRef','','placeholder="eg. Big little lies." id="worktitleRef"');?>       
                    <span class="tooltiptext">Input title of work</span>                                 
                </li></ul>
            </div>
            <div class="col-xs-12 col-lg-12 tooltip">
                <ul><li>
                    <?= form_label('Publisher','','for="bookpublisherRef"').form_input('bookpublisherRef','','placeholder="eg. G. P. Putnam’s Sons." id="bookpublisherRef"');?>       
                    <span class="tooltiptext">Input name of publisher</span>                                 
                </li></ul>
            </div>
        </div>                    
        <div class="col-xs-12" id="divjournalRef" style="display:none">
            <div class="col-xs-12 col-lg-12 tooltip">
                <ul><li>
                    <?= form_label('Article title','','for="journaltitleRef"').form_input('journaltitleRef','','placeholder="eg. The forum: The decline of war." id="journaltitleRef"');?>       
                    <span class="tooltiptext">Input title of article</span>                                 
                </li></ul>
            </div>
            <div class="col-xs-12 col-lg-12 tooltip">
                <ul><li>
                    <?= form_label('Title of periodical','','for="periodicalRef"').form_input('periodicalRef','','placeholder="eg. The forum: The decline of war." id="periodicalRef"');?>       
                    <span class="tooltiptext">Input title of periodical</span>                                 
                </li></ul>
            </div>
            <div class="col-xs-12 col-lg-12 tooltip">
                <ul><li>
                    <?= form_label('Volume(Issue)','','for="journalVolRef"').form_input('journalVolRef','','placeholder="eg. W. R. (2013)" id="journalVolRef"');?>       
                    <span class="tooltiptext">Input volume of journal</span>                                 
                </li></ul>
            </div>
            <div class="col-xs-12 col-lg-12 tooltip">
                <ul><li>
                    <?= form_label('Page range','','for="journalpagerangeRef"').form_input('journalpagerangeRef','','placeholder="15(3), 396-419.)" id="journalpagerangeRef"');?>       
                    <span class="tooltiptext">Input page range</span>                                 
                </li></ul>
            </div>

            <div class="col-xs-6 col-lg-6 tooltip hidden">
                <ul><li>
                    <?= form_label('Name of Sponsoring body(if necessary)','','for="sponsoring_body"').form_input('sponsoring_body','','placeholder="eg. Google throws $38.8 million to the wind [Web log post]" id="sponsoring_body"');?>
                    <span class="tooltiptext">Input name of sponsoring body (if any)</span>
                </li></ul>
            </div>
            <div class="col-xs-6 col-lg-6 tooltip hidden">
                <ul><li>
                    <?= form_label('Place of publication(if necessary)','','for="place"').form_input('place','','placeholder="Location" id="place"');?>
                    <span class="tooltiptext">Input place of publication (if any)</span>
                </li></ul>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="col-xs-12 col-lg-12 tooltip">
                <ul><li>
                    <?= form_label('URL/Source','','for="links"').form_input('links','','placeholder="eg. http://socialmediatoday.com" id="links"');?>
                    <span class="tooltiptext">Input link URL/source</span>
                </li></ul>
            </div>
        </div>  
        <div class="col-xs-12">
            <div class="col-xs-12 col-lg-12 tooltip">
                <ul><li>
                    <?= form_label('Description','','for="reference_desc"').form_textarea('reference_desc','','id="reference_desc"');?>
                    <span class="tooltiptext">Input short description</span>
                </li></ul>
            </div>
        </div>  
        <div class="col-xs-12">
            <div class="col-xs-12 col-lg-12 tooltip hidden">
                <ul><li>
                    <?= form_label('Usage of the reference','','for="ref_usage"').form_input('ref_usage','','id="ref_usage"');?>
                    <span class="tooltiptext">Input usage of the reference</span>
                </li></ul>
            </div>
        </div>                         
        <div class="col-xs-12 ">
            <a type="text" id="addref" class="btn btn-primary">Add data</a>
        </div>
        <div class="col-xs-12 ">   
            <div class="table-responsive large-tables"><br>
                <table id="tableRef" class="content-table">
                    <thead>
                        <tr>
                            <th style="text-align: center; font-size: 24px">Reference(s)</th>
                        </tr>
                        <tr>
                            <th>Citation</th>
                        </tr>
                    </thead>
                    <tbody id="tbodyref"></tbody>
                </table>
                <table id="tableRef_sample" class="table  table-bordered tglobal">                              
                    <tbody id="tbodyrefs"></tbody>
                </table><br>
            </div>                             
        </div>      
    </div>
</div>

<!-- MODAL FOR EDITTING A REFERENCES -->
<form method="post" action="#" id="ReferenceForm" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-reference" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Reference</h4>
                </div>
                <input type="hidden" id="reference-id" name="reference-id" value="" />
                <input type="hidden" id="reference-gencode" name="reference-gencode" value="" />
                <div class="modal-body" >                    
                <div class="col-xs-12">
                    <div class="col-xs-12 tooltip">
                        <div class="col-xs-12 col-lg-12">
                            <ul><li>
                                <?= form_label('Type of citation').form_dropdown('edit-type_citation',$citationlist,'','id="edit-type_citation"');?>
                            </li></ul>
                        </div>
                         <fieldset>
                             <legend style="background-color:#fafafa; color: #444;font-size: 14px;font-weight: 700;">Date published</legend>
                             <div class="col-xs-6 col-lg-4" id="edit-refmonthid">
                                <ul><li>
                                    <?= form_dropdown('edit-ref_date_month',$monthListed,'','id="edit-ref_date_month"');?>
                                 </li></ul>
                             </div>
                             <div class="col-xs-6 col-lg-4" id="refyearid">
                                <ul><li>
                                    <?= form_dropdown('edit-ref_date_year',$yearListed,'','id="edit-ref_date_year"');?>
                                </li></ul>
                             </div>
                         </fieldset>    
                         <span class="tooltiptext">Select date published</span>                                
                     </div>
                     <div class="col-xs-12">                                    
                         <div class="col-xs-12 col-lg-12 tooltip">
                            <ul><li>
                                <?= form_label('Author <i>(Last name, First initial. Middle initial)</i>','','for="edit-author"').form_input('edit-author','','placeholder="Name of the author" id="edit-author"');?>
                                <span class="tooltiptext">Input author</span>
                            </li></ul>
                         </div>
                    </div>
                    <div class="col-xs-12 col-lg-12" id="edit-divwebsiteRef" style="display:none">
                        <div class="col-xs-12 col-lg-12 tooltip">
                            <ul><li>
                                <?= form_label('Web page title','','for="edit-webtitleRef"').form_input('edit-webtitleRef','','placeholder="eg. Better Call Saul’ last?" id="edit-webtitleRef"');?>       
                                <span class="tooltiptext">Input title of web page</span>                                 
                            </li></ul>
                        </div>
                        <div class="col-xs-12 col-lg-12 tooltip">
                            <ul><li>
                                <?= form_label('Name of website','','for="edit-websiteRef"').form_input('edit-websiteRef','','placeholder="eg. FiveThirtyEight" id="edit-websiteRef"');?>       
                                <span class="tooltiptext">Input name of website</span>                                 
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-12" id="edit-divbookRef" style="display:none">
                        <div class="col-xs-12 col-lg-12 tooltip">
                            <ul><li>
                                <?= form_label('Title of work','','for="edit-worktitleRef"').form_input('edit-worktitleRef','','placeholder="eg. Big little lies." id="edit-worktitleRef"');?>       
                                <span class="tooltiptext">Input title of work</span>                                 
                            </li></ul>
                        </div>
                        <div class="col-xs-12 col-lg-12 tooltip">
                            <ul><li>
                                <?= form_label('Publisher','','for="edit-bookpublisherRef"').form_input('edit-bookpublisherRef','','placeholder="eg. G. P. Putnam’s Sons." id="edit-bookpublisherRef"');?>       
                                <span class="tooltiptext">Input name of publisher</span>                                 
                            </li></ul>
                        </div>
                    </div>                    
                    <div class="col-xs-12" id="edit-divjournalRef" style="display:none">
                        <div class="col-xs-12 col-lg-12 tooltip">
                            <ul><li>
                                <?= form_label('Article title','','for="edit-journaltitleRef"').form_input('edit-journaltitleRef','','placeholder="eg. The forum: The decline of war." id="edit-journaltitleRef"');?>       
                                <span class="tooltiptext">Input title of article</span>                                 
                            </li></ul>
                        </div>
                        <div class="col-xs-12 col-lg-12 tooltip">
                            <ul><li>
                                <?= form_label('Title of periodical','','for="edit-periodicalRef"').form_input('edit-periodicalRef','','placeholder="eg. The forum: The decline of war." id="edit-periodicalRef"');?>       
                                <span class="tooltiptext">Input title of periodical</span>                                 
                            </li></ul>
                        </div>
                        <div class="col-xs-12 col-lg-12 tooltip">
                            <ul><li>
                                <?= form_label('Volume(Issue)','','for="edit-journalVolRef"').form_input('edit-journalVolRef','','placeholder="eg. W. R. (2013)" id="edit-journalVolRef"');?>       
                                <span class="tooltiptext">Input volume of journal</span>                                 
                            </li></ul>
                        </div>
                        <div class="col-xs-12 col-lg-12 tooltip">
                            <ul><li>
                                <?= form_label('Page range','','for="edit-journalpagerangeRef"').form_input('edit-journalpagerangeRef','','placeholder="15(3), 396-419.)" id="edit-journalpagerangeRef"');?>       
                                <span class="tooltiptext">Input page range</span>                                 
                            </li></ul>
                        </div>

                        <div class="col-xs-6 col-lg-6 tooltip hidden">
                            <ul><li>
                                <?= form_label('Name of Sponsoring body(if necessary)','','for="edit-sponsoring_body"').form_input('edit-sponsoring_body','','placeholder="eg. Google throws $38.8 million to the wind [Web log post]" id="edit-sponsoring_body"');?>
                                <span class="tooltiptext">Input name of sponsoring body (if any)</span>
                            </li></ul>
                        </div>
                        <div class="col-xs-6 col-lg-6 tooltip hidden">
                            <ul><li>
                                <?= form_label('Place of publication(if necessary)','','for="edit-place"').form_input('edit-place','','placeholder="Location" id="edit-place"');?>
                                <span class="tooltiptext">Input place of publication (if any)</span>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="col-xs-12 col-lg-12 tooltip">
                            <ul><li>
                                <?= form_label('URL/Source','','for="edit-links"').form_input('edit-links','','placeholder="eg. http://socialmediatoday.com" id="edit-links"');?>
                                <span class="tooltiptext">Input link URL/source</span>
                            </li></ul>
                        </div>
                    </div>  
                    <div class="col-xs-12">
                        <div class="col-xs-12 col-lg-12 tooltip">
                            <ul><li>
                                <?= form_label('Description','','for="edit-reference_desc"').form_textarea('edit-reference_desc','','id="edit-reference_desc"');?>
                                <span class="tooltiptext">Input short description</span>
                            </li></ul>
                        </div>
                    </div>  
                    <div class="col-xs-12">
                        <div class="col-xs-12 col-lg-12 tooltip hidden">
                            <ul><li>
                                <?= form_label('Usage of the reference','','for="edit-ref_usage"').form_input('edit-ref_usage','','id="edit-ref_usage"');?>
                                <span class="tooltiptext">Input usage of the reference</span>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <fieldset><legend>Date</legend>
                            <div class="col-xs-6 col-lg-6">
                                <label>Created : </label>
                                <span id="refDateCreated"></span>
                            </div>
                            <div class="col-xs-6 col-lg-6">
                                <label>Last Update : </label>
                                <span id="refDateupdate"></span>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="modal-footer">
                            <button class="btn btn-info" type="button" onclick="Updateref();" />Update
                        </div>
                    </div>
                </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>
<!-- END OF MODAL FOR EDITTING A REFERENCES -->
