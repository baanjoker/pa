<header class="main-header">
  <nav class="navbar navbar-static-top">
    <div class="navbar-header">
      <a href="<?php echo base_url ('index.php/dashboard') ?>" class="navbar-brand"><b>DENR-</b><?php echo $regionss->regionName ?></a>
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse"><i class="fa fa-bars"></i></button>
    </div>

    <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
      <ul class="nav navbar-nav">
        <li <?php if($this->uri->segment(2) == "dashboard"){echo 'class="active"';}?>><a href="<?php echo base_url ('dashboard'); ?>">Dashboard</a></li>
        <li class="dropdown <?php if($this->uri->segment(2) == "protectedarea"){echo 'active';}?>">
          <a href="" class="dropdown-toggle" data-toggle="dropdown">Protected Area<span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="<?php echo base_url ('users/protectedarea/pamain') ?>"><i class="fa fa-list"> List of PA</i></a></li>
            </ul>
        </li>
        <li class="dropdown <?php if($this->uri->segment(2) == "report"){echo 'active';}?>">
          <a href="" class="dropdown-toggle" data-toggle="dropdown">IPAF Report<span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="<?php echo base_url ('users/report/ipaf/byYear') ?>"><i class="fa fa-list"> Yearly</i></a></li>

            </ul>
        </li>
      </ul>
    </div>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="<?php echo base_url('bmb_assets2/img/user_img/').$this->session->userdata('picture');?>" class="user-image" alt="User Image">
            <span class="hidden-xs"><?php echo ucfirst($this->session->userdata('fullname')); ?></span>
          </a>
          <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                  <img src="<?php echo base_url('bmb_assets2/img/user_img/').$this->session->userdata('picture'); ?>" class="user-image" alt="User Image">                    
                  <p>
                    <?php echo ucfirst($this->session->userdata('fullname'))." ".ucfirst($this->session->userdata('lastnames')); ?>
                  </p>                  
                  <!-- <p><i class="fa fa-globe"></i> <strong> Region :</strong> <?= $this->session->userdata('region'); ?></p> -->
                </li>
                <!-- Menu Body -->
                <li class="user-body">                  
                  <div class="row">
                    <div class="col-xs-12 text-center">
                        <p><i class="fa fa-calendar"></i> <strong> Last login :</strong> <?= date('F d / g:i a',strtotime($this->session->userdata('last_logs'))) ?></p>
                    </div>
                  </div>
                  <!-- /.row -->
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <!-- <div class="pull-left"> -->
                    <a href="" class="btn btn-default btn-flat" data-toggle="modal" data-backdrop="static" data-target="#modal-info">Profile</a>
                  <!-- <div class="pull-right"> -->
                    <a href="<?php echo base_url('logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                  <!-- </div> -->
                </li>
              </ul>
        </li>
      </ul>
    
  </nav>
</header>
<section class="content-header">
  <center><h1><?php echo $page_title; ?></h1></center>
</section>
<div class="modal modal-info fade" id="modal-info" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
          <div class="col-md-12">
            <div class="col-md-3">
              <div class="modal-image">
                <img src="<?php echo base_url('bmb_assets2/img/user_img/').$this->session->userdata('picture'); ?>" class="user-image" alt="User Image">
              </div>
            </div>
            <div class="col-md-9">
              <p class="modal-title"><?php echo ucfirst($this->session->userdata('fullname'))." ".ucfirst($this->session->userdata('lastnames')); ?></p>
              <p class="modal-region"><?php echo $regionss->regionName; ?></p>
            </div>
          </div>
      </div>
      <div class="modal-body">
        <h3 style="color:#fff;">Personal Information</h3>
        <table width="100%" border="0" cellpadding="3" cellspacing="1" class="tableprofile">
          <tr class="spaceUnder">
            <td>Fullname :</td>
            <td><?php echo ucfirst($this->session->userdata('fullname'))." ".ucfirst($this->session->userdata('lastnames')); ?></td>
          </tr>
          <tr class="spaceUnder">
            <td>Email Address :</td>
            <td><?php echo ucfirst($this->session->userdata('email')); ?></td>
          </tr>          
          <tr class="spaceUnder">
            <td>Home Address :</td>
            <td><?php echo ucfirst($this->session->userdata('address')); ?></td>
          </tr>
          <tr class="spaceUnder">
            <td>Date of Birth :</td>
            <td><?php echo date('F Y',strtotime($this->session->userdata('dob'))); ?></td>
          </tr>
          <tr class="spaceUnder">
            <td>Blood Type :</td>
            <td><?php echo $regionss->symbol; ?></td>
          </tr>
          <tr class="spaceUnder">
            <td>Department :</td>
            <td><?php echo ucfirst($this->session->userdata('department')); ?></td>
          </tr>
          <tr class="spaceUnder">
            <td>Designation :</td>
            <td><?php echo ucfirst($this->session->userdata('designation')); ?></td>
          </tr>
          <tr class="spaceUnder">
            <td>Date Created :</td>
            <td><?php echo date('F d, Y',strtotime($this->session->userdata('create_date'))); ?></td>
          </tr>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-outline">Save changes</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
