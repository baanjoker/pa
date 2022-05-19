<?php $forms_reference = array(
  'name'  =>  'remarks_image',
  'class' =>  'textarea',
  'style' =>  'width:auto;',
  'placeholder' =>  'Remarks');
?>
<div class="tab-pane" id="map">
    <div class="row">
        <div class="col-md-12">
          <div class="panel panel-info">
              <div class="panel-heading"><div class="panel-title"><i class="fa fa-map"></i> IMAGE</div></div>
              <div class="panel-body">
                <div class="col-md-12">
                  <div id="responseDivImage" class="alert text-center" style="display:none;">
                    <button type="button" class="close" id="clearMsgImage"><span aria-hidden="true">&times;</span></button>
                      <span style="color:#000" id="messageimage"></span>
                  </div>                
                  <?= form_hidden('id_image'); ?>
                  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="table4">                
                    <tr valign="top" class="spaceUnder spaceOver">
                      <td>
                        <img width="200px" height="180px" id="blah" src="<?php echo base_url("bmb_assets2/upload/map_image/nophoto.jpg") ?>" alt="your image" /><br>
                        <input type='file' name="picture2" id="picture2" onchange="readURL(this);" /><br>
                        <input type="hidden" name="old_picture" value="nophoto.jpg">                      
                      </td>                    
                    </tr>
                    <tr>
                      <td><?= form_textarea($forms_reference) ?><br></td>
                    </tr>
                    <tr>
                      <td><button type="button" onclick="insert_image()" class="btn btn-success  btn-flat"><i class="fa fa-save"> Insert</i></button> </td>
                    </tr>
                  </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-xs-12"> 
      <div class="table-responsive"><br>
        <table id="tableimage" class="table table-hover">
          <thead>
            <tr>
              <th>Image</th>
              <th>Details</th>
              <th>Download</th>
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
