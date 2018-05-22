<?php echo form_open_multipart('#','class="form-horizontal" id="regFormlocation" enctype="multipart/form-data"'); ?>
<?php echo form_hidden('id_main',$pamain->id_main);?>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="nav-tabs-custom">
         <div id="responseDivMain" class="alert text-center" style="display:none;">
            <button type="button" class="close" id="clearMsg"><span aria-hidden="true">&times;</span></button>
            <span style="color:#fff" id="messagemain"></span>
          </div>
        <br>
        <?php if (!empty($pamain->id_main)): ?>
        <div class="col-md-12">
          <div class="form-group col-sm-12 col-xs-12">
              <button type="button" name="btnlocation" id="submitlocation" onclick="insert_Main()" class="btn btn-success  btn-flat"><i class="fa fa-save"> UPDATE</i></button>
          </div>
        </div>
        <?php else: ?>
        <div class="col-md-12">
          <div class="form-group col-sm-12 col-xs-12">
              <button type="button" name="btnlocation" id="submitlocation" onclick="insert_Main()" class="btn btn-primary  btn-flat"><i class="fa fa-save"> SAVE</i></button>
          </div>
        </div>
        <?php endif ?>

        <ul class="nav nav-tabs">
          <li class="active"><a href="#tab_geninfoTab" data-toggle="tab">GENERAL INFO</a></li>
          <li><a href="#biofeature" data-toggle="tab">BIOLOGICAL FEATURES</a></li>
          <?php if ($pamain->pamb_approve == '1'): ?>
          <li><a href="#pambmember" data-toggle="tab" id="pambmemberTabs">PAMB MEMBER</a></li>
          <?php else: ?>
          <li><a href="#pambmember" data-toggle="tab" id="pambmemberTab">PAMB MEMBER</a></li>
          <?php endif ?>
          <li><a href="#physicalfeature" data-toggle="tab">PHYSICAL FEATURE</a></li>
          <li><a href="#antropology" data-toggle="tab">ANTROPOLOGY</a></li>
          <li><a href="#economic" data-toggle="tab">SOCIO-ECONOMIC</a></li>
          <li><a href="#uses" data-toggle="tab">USES</a></li>
          <li><a href="#project" data-toggle="tab">PROJECTS</a></li>
          <li><a href="#threat" data-toggle="tab">THREATS</a></li>
          <li><a href="#occupant" data-toggle="tab">OCCUPANTS</a></li>
          <li><a href="#reference" data-toggle="tab">REFERENCES</a></li>
          <li><a href="#map" data-toggle="tab">IMAGE</a></li>
        </ul>
        <div class="tab-content">
          <?php @$this->load->view('main_server/PA/tab_geninfoTab'); ?>
          <?php @$this->load->view('main_server/PA/tab_biofeatureTab'); ?>
          <?php @$this->load->view('main_server/PA/tab_pambmemberTab'); ?>
          <?php @$this->load->view('main_server/PA/tab_physicalfeatureTab'); ?>
          <?php @$this->load->view('main_server/PA/tab_antropologyTab'); ?>
          <?php @$this->load->view('main_server/PA/tab_economicTab'); ?>
          <?php @$this->load->view('main_server/PA/tab_usesTab'); ?>
          <?php @$this->load->view('main_server/PA/tab_projectTab'); ?>
          <?php @$this->load->view('main_server/PA/tab_threatTab'); ?>
          <?php @$this->load->view('main_server/PA/tab_occupantsTab'); ?>
          <?php @$this->load->view('main_server/PA/tab_referencesTab'); ?>
          <?php @$this->load->view('main_server/PA/tab_mapTab'); ?>
        </div>
        </div>
      </div>
    </div>
</section>
<?php echo form_close(); ?>
