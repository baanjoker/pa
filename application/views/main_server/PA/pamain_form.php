
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
          <li class="active"><a href="#tab_geninfoTab" data-toggle="tab">General Information</a></li>
          <li><a href="#location" data-toggle="tab">Location Information</a></li>
          <li><a href="#ordinance" data-toggle="tab">Proclamation</a></li>
          <li><a href="#biofeature" data-toggle="tab">Biological Feature</a></li>
          <?php if ($pamain->pamb_approve == '1'): ?>
          <li><a href="#pambmember" data-toggle="tab" id="pambmemberTabs">PAMB Member</a></li>
          <?php else: ?>
          <li><a href="#pambmember" data-toggle="tab" id="pambmemberTab">PAMB Member</a></li>
          <?php endif ?>
          <li><a href="#physicalfeature" data-toggle="tab">Physical Feature</a></li>
          <li><a href="#antropology" data-toggle="tab">Antropology</a></li>
          <li><a href="#economic" data-toggle="tab">Socio-economic</a></li>
          <li><a href="#uses" data-toggle="tab">Uses of the Area</a></li>
          <li><a href="#ecotourism" data-toggle="tab">Eco-tourism Activity</a></li>
          <li><a href="#project" data-toggle="tab">Projects</a></li>
          <li><a href="#threat" data-toggle="tab">Threats</a></li>
          <li><a href="#occupant" data-toggle="tab">Occupants</a></li>
          <li><a href="#reference" data-toggle="tab">References</a></li>
          <li><a href="#map" data-toggle="tab">Map Image</a></li>
          <li><a href="#rentals" data-toggle="tab">Visitors Monitoring</a></li>
        </ul>
        <div class="tab-content">
          <?php @$this->load->view('main_server/PA/tab_geninfoTab'); ?>
          <?php @$this->load->view('main_server/PA/tab_locationTab'); ?>
          <?php @$this->load->view('main_server/PA/tab_ordinanceTab'); ?>
          <?php @$this->load->view('main_server/PA/tab_biofeatureTab'); ?>
          <?php @$this->load->view('main_server/PA/tab_pambmemberTab'); ?>
          <?php @$this->load->view('main_server/PA/tab_physicalfeatureTab'); ?>
          <?php @$this->load->view('main_server/PA/tab_antropologyTab'); ?>
          <?php @$this->load->view('main_server/PA/tab_economicTab'); ?>
          <?php @$this->load->view('main_server/PA/tab_usesTab'); ?>
          <?php @$this->load->view('main_server/PA/tab_ecotourismTab'); ?>
          <?php @$this->load->view('main_server/PA/tab_projectTab'); ?>
          <?php @$this->load->view('main_server/PA/tab_threatTab'); ?>
          <?php @$this->load->view('main_server/PA/tab_occupantsTab'); ?>
          <?php @$this->load->view('main_server/PA/tab_referencesTab'); ?>
          <?php @$this->load->view('main_server/PA/tab_mapTab'); ?>
          <?php @$this->load->view('main_server/PA/tab_feeTab'); ?>
        </div>
        </div>
      </div>
    </div>
</section>
<?php echo form_close(); ?>
