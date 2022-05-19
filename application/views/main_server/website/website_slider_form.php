<?php $title = array(
  'name'  =>  'title',
  'class' =>  'form-control',
  'style' =>  'width:auto;',
  'placeholder' =>  'Title');
?>
<?php $remarks = array(
  'name'  =>  'remarks',
  'class' =>  'form-control',
  'style' =>  'width:auto;',
  'placeholder' =>  'Remarks');
?>
<div class="row">
        <div class="col-md-12">
          <div class="panel panel-info">
              <div class="panel-heading"><div class="panel-title"><i class="fa fa-reorder"></i> Website Slider Form</div></div>
              <div class="panel-body">
                <div class="col-md-3"></div>
                <div class="col-md-6">                  
                  <?php echo form_open('#','class="form-horizontal" id="uploadForm"'); ?>
                  <?php if (!empty($image->id)): ?>
                    <?= form_hidden('id',$image->id); ?>
                  <?php else: ?>
                    <?= form_hidden('id'); ?>
                  <?php endif; ?>
                  
                  <div id="responseDiv" class="alert text-center" style="margin-top:20px; display:none;">
                    <button type="button" class="close" id="clearMsg"><span aria-hidden="true">&times;</span></button>
                    <span id="message" style="color:#fff;"></span>
                  </div>
                  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="table4">                
                    <tr valign="top" class="spaceUnder spaceOver">
                      <td>Image Upload <br> (1024 x 460)</td>
                      <td>
                        <?php if (!empty($image->id)): ?>
                          <img width="360px" height="250px" id="blah"
                          src="<?php echo (!empty($image->image)?base_url('bmb_assets2/img/website/slider/').$image->image :base_url("bmb_assets2/img/website/slider/no-img.png")) ?>"alt="your image" /><br>
                          <input type='file' name="upload" id="file" value="<?php echo $image->image ?>" onchange="readURL(this);" /><br>
                          <input type="" name="old_picture" value="<?php echo $image->image ?>" class="hide">                           
                        <?php else: ?>
                            <img width="360px" height="250px" id="blah"
                              src="<?php echo base_url("bmb_assets2/img/website/slider/no-img.png") ?>"alt="your image" /><br>
                              <input type='file' name="upload" id="file" onchange="readURL(this);" /><br>
                              <input type="hidden" name="old_picture" value="no-img.png">
                        <?php endif; ?>
                                             
                      </td>                    
                    </tr>
                    <tr valign="top" class="spaceUnder">                    
                      <td>Image title</td>
                      <?php if (!empty($image->id)): ?>
                        <td><?= form_input($title,$image->title) ?><br></td>
                      <?php else: ?>
                        <td><?= form_input($title) ?><br></td>
                      <?php endif; ?>
                      
                    </tr>
                    <tr valign="top" class="spaceUnder">                   
                      <td>Description</td>
                      <?php if (!empty($image->id)): ?>
                        <td><?= form_textarea($remarks,$image->remarks) ?></td>
                      <?php else: ?>
                        <td><?= form_textarea($remarks) ?></td>
                      <?php endif; ?>                      
                    </tr>
                    <tr valign="top" class="spaceUnder">
                      <td>Status</td>
                      <?php if (!empty($image->id)): 
                      $userRole = [
                        ''  => 'Select Status',
                        '1' => 'Show',
                        '2' => 'Hide'                     
                      ];                     
                      ?>
                        <td><?php  echo form_dropdown('status',$userRole,$image->status,'class="form-control" required') ?></td>
                      <?php else: ?>
                        <td><?php  
                        $userRole = [
                        ''  => 'Select Status',
                        '1' => 'Show',
                        '2' => 'Hide'                     
                      ]; 
                      echo form_dropdown('status',$userRole,'','class="form-control" required') ?></td>
                      <?php endif; ?>
                      
                    </tr>                    
                    <tr valign="top" class="spaceUnder">
                      <td></td>
                      <td><button type="button" id="save_slide" class="btn btn-success  btn-flat"><i class="fa fa-save"> Save</i></button></td>
                    </tr>
                  </table>
                  <?php echo form_close(); ?>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo base_url("jquery/slider/loader.js") ?>"></script>