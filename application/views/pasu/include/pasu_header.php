
<!--- start of navbar-->
      <!-- <div class="container page-container"> --> <!-- Original -->
      <div class="page-container">
        <div class="page-content">

        	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                  <div class="container">
                      <!-- Brand and toggle get grouped for better mobile display -->
                      <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                          <span class="sr-only">Toggle navigation</span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                        </button>
                        <?php if(!$this->session->userdata('email')){?>
                          <a class="navbar-brand" href="<?php echo base_url();?>">
                            <!-- <img src="<?php echo base_url();?>bmb_assets2/img/Untitled-1.png" style="width:45px;" alt="Tooth Logo"> -->
                          </a>
                        <?php } ?>
                        <?php if($this->session->userdata('email')){?>
                          <a class="navbar-brand" href="#">
                            <!-- <img src="<?php echo base_url();?>bmb_assets2/img/Untitled-1.png" style="width:45px;" alt="Tooth Logo"> -->
                          </a>
                        <?php } ?>
                      </div>

                      <!-- Collect the nav links, forms, and other content for toggling -->
                      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            <?php if($this->session->userdata('email')){?>
                            <li class="<?php if($this->uri->segment(2) == "dashboard"){echo 'active';}?>">
                            	<a href="<?php echo base_url('pasu/dashboard'); ?>">Dashboard</a>
                            </li>
                             <?php } ?>
                            <!-- <li class="<?php if($this->uri->segment(2) == "pamain"){echo 'active';}?>">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Protected Area<span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                  <li><a href="<?= base_url('pasu/pamain') ?>"><i class="ti-plus"></i> <strong> New Record</strong></a></li>
                                </ul>
                            </li>      -->
                            <li class="dropdown <?php if($this->uri->segment(2) == "report"){echo 'active';}?>">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Report<span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                  <li><a href="<?= base_url('pasu/report/pareport') ?>"><i class="ti-image"></i> <strong> PA PDF</strong></a></li>
                                  <li><a href="<?= base_url('pasu/report/cepa') ?>"><i class="ti-stats-up"></i> <strong> CEPA Activity Report</strong></a></li>
                                  <li><a href="<?= base_url('pasu/report/ipaf') ?>"><i class="ti-stats-up"></i> <strong> Actual Income Report</strong></a></li>
                                  <li><a href="<?= base_url('pasu/report/ipaf_physical') ?>"><i class="ti-stats-up"></i> <strong> Physical Report of Operation</strong></a></li>
                                  <li><a href="<?= base_url('pasu/report/ipaf_stat') ?>"><i class="ti-stats-up"></i> <strong> IPAF Statistics</strong></a></li>
                                  <li><a href="<?= base_url('pasu/report/ipaf_disbursement') ?>"><i class="ti-stats-up"></i> <strong> IPAF Disbursement</strong></a></li>
                                  <li><a href="<?= base_url('pasu/report/visitor') ?>"><i class="ti-user"></i> <strong> PA Visitor</strong></a></li>
                                </ul>
                            </li>
                            <li class="dropdown <?php if($this->uri->segment(2) == "profile"){echo 'active';}?>">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Account<span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                  <li><a href="<?= base_url('pasu/profile') ?>"><i class="ti-user"></i> <strong> My Profile</strong></a></li>
                                  <li><a href="<?= base_url('pasu/changepass') ?>" ><i class="ti-key"></i> <strong> Change Password</strong></a></li>
                                  <li><a href="<?php echo base_url('logout') ?>"><i class="ti-power-off"></i><strong> Sign out</strong></a></li>
                                </ul>
                            </li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
          </nav>
           <!--- end of navbar -->
