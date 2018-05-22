<!--change color of theme in  views/main_server/dashboard.php -->
<body class="hold-transition skin-blue-light sidebar-mini">
<!--  -->
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="<?php echo base_url ('index.php/dashboard') ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>BM</b>B</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Biodiversity</b>System</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      
      <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <li class="dropdown user user-menu">
          <a href="" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <img src="<?php echo base_url().$this->session->userdata('picture')?>" class="user-image" alt="User Image">
            <span class="hidden-xs">
              <?php echo $this->session->userdata('fullname') ?>
            </span>
          </a>
          <ul class="dropdown-menu">
            <!-- HEADER -->
            <li class="user-header">
              <img src="<?php echo base_url().$this->session->userdata('picture')?>" class="img-circle" alt="Image User">
              <p><?php echo $this->session->userdata('fullname')." ".$this->session->userdata('lastnames') ?>
                <small>
                  <?php $user_role = $this->session->userdata('user_role') ?>
                <?php 
                if ($user_role == 1) {
                    echo "Admin";
                } elseif ($user_role == 2) {
                    echo "User";
                } else {
                    echo "";
                }  
                ?>  
                </small>
              </p>
            </li>
            <!-- END OF HEADER -->

            <!-- BODY -->
            <li class="user-body">
              <div class="row">
                <div class="col-xs-6 text-center">
                  <p><b>Status</b></p>

                </div> 
                <i class="fa fa-circle text-success"></i> Online               
              </div>
            </li>            
            <!-- END OF BODY -->
            <!-- FOOTER -->
            <li class="user-footer">
              <div class="pull-left">
                <a href="#" class="btn btn-default btn-flat">Profile</a>
              </div>
              <div class="pull-right">
                <a href="<?php echo base_url('logout') ?>" class="btn btn-default btn-flat">Sign out</a>
              </div>
            </li>
            <!-- END OF FOOTER -->
          </ul>
        </li>
        <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
            <small></small>
          </li>
      </ul>
    </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
    <br>
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <!-- <div class="pull-left image">
          <img src="<?php echo base_url('bmb_assets2/dist/img/ic10.png') ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <strong><a href="" class="text-success"><?php echo $this->session->userdata('fullname') ?> </a></strong>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div> -->
        <div class="image">
          <img src="<?php echo base_url('bmb_assets2/img/denr-emb-logo.gif') ?>" class="img-circle">
        </div>
      </div>

      <!-- search form (Optional) -->
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu tree" data-widget="tree">
        <li class="header text-center">MAIN NAVIGATION</li>
        <!-- Optionally, you can add icons to the links -->
        <li class=""><a href="<?php echo base_url ('dashboard') ?>"><i class="fa fa-dashboard"></i> <span>DASHBOARD</span></a></li>
        <li><a href="<?php echo base_url ('main_server/cave') ?>"><i class="fa fa-codiepie"></i><span>CAVE RECORDS</span></a></li>
        <li><a href="<?php echo base_url ('main_server/pamain') ?>"><i class="fa fa-hand-paper-o"></i><span>PROTECTED AREA</span></a></li>
            <li><a href="<?php echo base_url ('main_server/wetland') ?>"><i class="fa fa-area-chart"></i><span>WETLAND RECORDS</span></a></li>
         <li><a href="<?php echo base_url ('main_server/water') ?>"><i class="fa fa-ravelry"></i><span>WATERFOWL RECORDS</span></a></li>

        <li class="treeview">
          <a href=""><i class="fa fa-bug"></i><span>WILDLIFE RECORDS</span>
          <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url ('main_server/wildlife/category') ?>"><i class="fa fa-list"> CATEGORY LIST</i></a></li>
            <li><a href="<?php echo base_url ('main_server/wildlife/wclass') ?>"><i class="fa fa-list"> CLASS LIST</i></a></li>
            <li><a href="<?php echo base_url ('main_server/wildlife/order') ?>"><i class="fa fa-list"> ORDER LIST</i></a></li>
            <li><a href="<?php echo base_url ('main_server/wildlife/family') ?>"><i class="fa fa-list"> FAMILY NAME</i></a></li>
            <li><a href="<?php echo base_url ('main_server/wildlife/species') ?>"><i class="fa fa-list"> SPECIES GENUS</i></a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href=""><i class="fa fa-map-marker"></i><span>PSGC RECORDS</span>
          <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url ('main_server/psgc_locations/regionList') ?>"><i class="fa fa-map"> REGIONS</i></a></li>
            <li><a href="<?php echo base_url ('main_server/psgc_locations/provinceList') ?>"><i class="fa fa-map"> PROVINCES</i></a></li>
            <li><a href="<?php echo base_url ('main_server/psgc_locations/municipalityList') ?>"><i class="fa fa-map"> MUNICIPALITIES</i></a></li>
            <!-- <li><a href="<?php echo base_url ('main_server/psgc_locations/barangayList') ?>"><i class="fa fa-list"> BARANGAYS</i></a></li> -->
          </ul>
        </li>
        <li class="treeview">
          <a href=""><i class="fa fa-cogs"></i> <span> LIBRARY SETTINGS</span>
            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url ('main_server/library/defterm') ?>"><i class="fa fa-file"></i><span>DEFINITION OF TERMS</span></a></li>
            <li><a href="<?php echo base_url ('main_server/library/cite') ?>"><i class="fa fa-file"></i><span> CITE STATUS</span></a></li>
            <li><a href="<?php echo base_url ('main_server/library/cms') ?>"><i class="fa fa-file"></i><span> CMS STATUS</span></a></li>
            <li><a href="<?php echo base_url ('main_server/library/marital') ?>"><i class="fa fa-file"></i><span> MARITAL STATUS</span></a></li>
            <li><a href="<?php echo base_url ('main_server/library/ecosystem') ?>"><i class="fa fa-file"></i><span> ECOSYSTEM LIBRARY</span></a></li>
            <li><a href="<?php echo base_url ('main_server/library/biogeolocation') ?>"><i class="fa fa-file"></i><span> BIOGEOGRAPHIC ZONE</span></a></li>
            <li><a href="<?php echo base_url ('main_server/library/classification') ?>"><i class="fa fa-file"></i><span> P.A. CLASSIFICATION</span></a></li>
            <li><a href="<?php echo base_url ('main_server/library/category') ?>"><i class="fa fa-file"></i><span> P.A. CATEGORY</span></a></li>
            <li><a href="<?php echo base_url ('main_server/library/legislation') ?>"><i class="fa fa-file"></i><span> P.A. LEGISLATION</span></a></li>
            <li><a href="<?php echo base_url ('main_server/library/conservation') ?>"><i class="fa fa-file"></i><span> CONSERVATION AREA</span></a></li>
            <li><a href="<?php echo base_url ('main_server/library/wltype') ?>"><i class="fa fa-file"></i><span> WETLAND TYPE</span></a></li>
            <li><a href="<?php echo base_url ('main_server/library/wldesc') ?>"><i class="fa fa-file"></i><span> WETLAND DESCRIPTION</span></a></li>
          </ul>
        </li>
      </ul>

      <!-- /.sidebar-menu
    </section>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper"><br>
    <section class="content-header">
      <h1><?php echo $page_title; ?><small>Control panel</small>
      </h1>
      <!-- <ol class="breadcrumb">
        <li><a href="<?php echo base_url ('dashboard') ?>"><i class="fa fa-dashboard"></i>
                        <?php $user_role = $this->session->userdata('user_role') ?>
                        <?php 
                        if ($user_role == 1) {
                            echo "Admin";
                        } elseif ($user_role == 2) {
                            echo "User";
                        } else {
                            echo "";
                        }  
                        ?>   </a></li>
        <li class="active">dashboard</li>
      </ol> -->
    </section>

<!-- REQUIRED JS SCRIPTS -->
<!-- jQuery 3 -->
<!--<script src="bower_components/jquery/dist/jquery.min.js"></script>-->
<!-- Bootstrap 3.3.7 -->
<!--<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>-->
<!-- AdminLTE App -->
<script src="<?php echo base_url('bmb_assets2/dist/js/adminlte.min.js') ?>"></script>
<script src="<?php echo base_url('bmb_assets2/resources/lightbox/js/lightbox.min.js') ?>"></script>