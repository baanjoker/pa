<div class="tab-pane" id="map">
    <div class="row">
        <div class="col-md-12">
          <div class="panel panel-info">
              <div class="panel-heading"><div class="panel-title"><i class="fa fa-map"></i> IMAGE</div></div>
              <div class="panel-body">
                <div id="responseDivImage" class="alert text-center" style="display:none;">
                  <button type="button" class="close" id="clearMsgImage"><span aria-hidden="true">&times;</span></button>
                    <span style="color:#000" id="messageimage"></span>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <div class="col-md-2">
                      <label for="inputClassification" class="control-label">Insert Image Map</label>
                    </div>   
                    <div class="col-md-3">                 
                      <?php echo form_upload('picture2','','id="picture2" multiple'); ?><br />                                      
                        <?php echo form_button('upload', 'Upload','onclick="insert_image()" href="javascript:noAction();"');?>   
                        </div>                  
                  </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">  
                    <div class="table-responsive">            
                <table id="tableimage" class="table table-hover">
                    <thead>
                        <tr>
                            <th>Image</th>  
                            <th>REMOVE</th>
                        </tr>
                    </thead>
                    <tbody id="tbodyimage">
                    </tbody>
                </table>
              </div>              
                  </div>
  </div>
</div>
