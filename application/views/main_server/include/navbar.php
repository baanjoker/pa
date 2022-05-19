<header class="main-header">
    <nav class="navbar navbar-static-top">
      <!-- <div class="container"> -->
        
        <div class="navbar-header">
          <a href="<?php echo base_url ('index.php/dashboard') ?>" class="navbar-brand"><b>DENR</b>-BMB</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="<?php if($this->uri->segment(1) == "dashboard"){echo 'active';} ?>"><a href="<?php echo base_url ('dashboard') ?>">Dashboard</a></li>
            <li class="dropdown <?php if($this->uri->segment(2) == "wildlife"){echo 'active';} ?>">
              <a href="" class="dropdown-toggle" data-toggle="dropdown">Wildlife Resource<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="<?php echo base_url ('main_server/wildlife/category') ?>"><i class="fa fa-list">Species Category</i></a></li>
                  <li><a href="<?php echo base_url ('main_server/wildlife/wclass') ?>"><i class="fa fa-list"> Class</i></a></li>
                  <li><a href="<?php echo base_url ('main_server/wildlife/order') ?>"><i class="fa fa-list"> Order</i></a></li>
                  <li><a href="<?php echo base_url ('main_server/wildlife/family') ?>"><i class="fa fa-list"> Family Name</i></a></li>
                  <li><a href="<?php echo base_url ('main_server/wildlife/species') ?>"><i class="fa fa-list"> Species Genus</i></a></li>
                </ul>
            </li>
            <li class="dropdown <?php if($this->uri->segment(2) == "pamain"){echo 'active';}?>">
              <a href="" class="dropdown-toggle" data-toggle="dropdown">Protected Area<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="<?php echo base_url ('main_server/pamain') ?>"><i class="fa fa-list"> List of Protected Area</i></a></li>
                  <li><a href="<?php echo base_url ('main_server/ipaf_report') ?>"><i class="fa fa-bar-chart-o"> Generate IPAF Report</i></a></li>
                </ul> 
            </li>
            <!-- <li class="dropdown <?php if($this->uri->segment(2) == "cave" || $this->uri->segment(2) == "wetland" || $this->uri->segment(2) == "water"){echo 'active';} ?>">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Caves, Wetland and Other Ecosystem <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?php echo base_url ('main_server/cave') ?>"><i class="fa fa-list"></i>Cave Records</a></li>
                <li class="divider"></li>
                <li><a href="<?php echo base_url ('main_server/wetland') ?>"><i class="fa fa-list"></i>Wetland Records</a></li>
                <li class="divider"></li>
                <li><a href="<?php echo base_url ('main_server/water') ?>"><i class="fa fa-list"></i>Waterfowl Records</a></li>
              </ul>
            </li> -->
            <?php $user_role = $this->session->userdata('user_role');

            if ($user_role == 1) {?>
              <li class="<?php if($this->uri->segment(2) == "library"){echo 'active';}?>"><a href="<?php echo base_url ('main_server/library'); ?>">Libraries</a></li>
            <?php } ?>
              <li class="dropdown <?php if($this->uri->segment(2) == "wsettings" || $this->uri->segment(2) == "wslider"){echo 'active';} ?>">
                <a href="" class="dropdown-toggle" data-toggle="dropdown">Customize Webpage<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="<?php echo base_url ('main_server/wsettings') ?>"><i class="fa fa-wrench"> Website Settings</i></a></li>
                  <li><a href="<?php echo base_url ('main_server/wslider') ?>"><i class="fa fa-reorder"> Website Slider Setting</i></a></li>
                  <li><a href="<?php echo base_url ('main_server/wnews') ?>"><i class="fa fa-newspaper-o"> Website News and Events</i></a></li>                  
                </ul>
              </li>
            <li class="<?php if($this->uri->segment(1) == "user"){echo 'active';} ?>"><a href="<?php echo base_url ('main_server/user') ?>">User</a></li>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- User Account Menu -->
            <li class="dropdown user user-menu <?php if($this->uri->segment(1) == "profile"){echo 'active';}?>">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <img src="<?php echo base_url('bmb_assets2/img/user_img/').$this->session->userdata('picture')?>" class="user-image" alt="User Image">
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs"><?php echo $this->session->userdata('fullname') ?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                  <img src="<?php echo base_url('bmb_assets2/img/user_img/').$this->session->userdata('picture')?>" class="user-image" alt="User Image">                    
                  <p>
                    <?php echo $this->session->userdata('fullname')." ".$this->session->userdata('lastnames') ?>
                  </p>
                  <p>
                  <?php $user_role = $this->session->userdata('user_role') ?>
                  <?php 
                  if ($user_role == 1) {
                      echo "Administrator";
                  } elseif ($user_role == 2) {
                      echo "User";
                  } else {
                      echo "";
                  }  
                  ?>  
                  </p>
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
                  <div class="pull-left">
                    <a href="<?php echo base_url ('profile') ?>" class="btn btn-default btn-flat">Profile</a>
                  </div>
                  <div class="pull-right">
                    <a href="<?php echo base_url('logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      <!-- </div> -->
      <!-- /.container-fluid -->
    </nav>
</header>
<div class="content-wrapper"><br>
  <section class="content-header">
    <center><h1><?php echo $page_title; ?></h1></center>
  </section>
<script src="<?php echo base_url('bmb_assets2/dist/js/adminlte.min.js') ?>"></script>
<script src="<?php echo base_url('bmb_assets2/resources/lightbox/js/lightbox.min.js') ?>"></script>