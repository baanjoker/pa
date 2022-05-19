<?php
$dob = array(
  'name'    =>  'dob',
  'type'    =>  'date',
  'class'   =>  'datepicker form-control border-input',
  'id'    =>  'dob',
  'required'  =>  'required'
);
$landline = array(
  'name'    =>  'landline',
  'class'   =>  'form-control border-input',
  'id'    =>  'landline',
  'placeholder' =>'(area code) 123-4567'
);
?>
<!-- Modal -->
<div id="myModal" class="modal fade in" role="dialog">
  <div class="modal-dialog">
  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Change Password</h4>
    </div>
    <div class="modal-body">      
      <p>It's a good idea to use a strong password that you're not using elsewhere</p>
      <hr>
      <?php echo form_open('#','id="formChangePassCENRO"') ?>
      <?php echo form_hidden('user_id',$read->user_id); ?>
      <div class="content">
        <div id="divPass" class="alert text-center" style="display:none;">
          <button type="button" class="close" id="clearMsg"><span aria-hidden="true">&times;</span></button>
          <span style="color:#000" id="messagePass"></span>               
        </div>        
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">   
              <label>New password</label>          
              <?= form_password('newpassword','','class="form-control border-input" placeholder="New password" id="pass"') ?>              
              <input type="checkbox" class="checkbox" onclick="myFunction()">Show Password
              <span id="passstrength"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label>Retype password</label>
              <?= form_password('repassword','','class="form-control border-input" placeholder="Retype password" id="repass"') ?>
              <span id="passstrengths"></span>
              <input type="checkbox" class="checkbox" onclick="myFunctions()">Show Password
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php echo form_close(); ?>
    <div class="modal-footer">
      <button type="button" class="btn btn-info" id="UpdatePass_cenro">Update</button>
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
  </div>
  </div>
</div>


<!-- Modal Profile-->
<div id="myModalProfile" class="modal fade in" role="dialog">
  <div class="modal-dialog">
  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">User Profile</h4>
    </div>
    <div class="modal-body">      
      <div class="content">
        <div class="container-fluid">
          <div class="row">            
            <div class="col-lg-12 col-md-7">
              <div class="card card-user">
                <?= form_open_multipart('','id="formprofile"'); ?>
                <?= form_hidden('user_id',$read->user_id); ?>
                  <div class="image">
                    <img src="<?php echo base_url('assets/img/profile/16766.jpg') ?>" alt="...">
                  </div>
                  <div class="content">
                    <div class="author">
                      <div class="author_hov">
                        <img class="avatar border-white" id="blah" src="<?php echo (!empty($read->picture)?base_url('assets/img/profile/').$read->picture:base_url("assets/img/profile/noimage.png")) ?>" alt="Picture">
                          <div class="button">
                            <label for="file-upload" class="custom-file-upload"><i class="fa fa-cloud-upload"></i>Upload</label>
                              <input id="file-upload" type="file" name="file-upload" class="h_img" onchange="readURL(this);"/>
                              <input type="hidden" name="old_picture" value="<?php echo $read->picture ?>">
                          </div>
                      </div>
                    </div>
                  </div>
                </div> 
                <div class="card">
                  <div class="header">
                    <h4 class="title">Edit Profile</h4>
                  </div>
                  <div class="content">                    
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>First Name</label>
                          <?= form_input('firstname',ucfirst($read->firstname),'class="form-control border-input" placeholder="First Name"') ?>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Last Name</label>
                          <?= form_input('lastname',ucfirst($read->lastname),'class="form-control border-input" placeholder="Last Name"') ?>
                        </div>
                      </div>
                    </div> 
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Email Address</label>
                          <?= form_input('email',$read->email,'class="form-control border-input" placeholder="Email"') ?>
                        </div>
                      </div>
                    </div>                    
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Address</label>
                          <?= form_input('address',ucfirst($read->address),'class="form-control border-input" placeholder="Complete Address"') ?>  
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Date of Birth</label>
                          <?= form_input($dob,$read->dob) ?>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Blood Type</label>
                          <?= form_dropdown('blood',$blood,$read->blood_type,'class="form-control border-input"') ?>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Gender</label>
                          <?= form_dropdown('gender',$gender,$read->id,'class="form-control border-input"') ?>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Mobile No.</label>
                          <?= form_input('mobile',$read->mobile,'class="form-control border-input" data-inputmask="&quot;mask&quot;: &quot;+(99) 999-9999-999&quot;" data-mask=""') ?>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Landline No.</label>
                          <?= form_input('landline',$read->landline,'class="form-control border-input" data-inputmask="&quot;mask&quot;: &quot;(99) 999-9999 Loc. 9999 &quot;" data-mask=""') ?>                         
                        </div>
                      </div>                      
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Region</label>
                          <?= form_dropdown('region',$region,$read->region,'class="form-control border-input" id="reg_id"') ?>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Designation/Position</label>
                          <?= form_input('designation',$read->designation,'class="form-control border-input" placeholder="Designation/Position"') ?>
                        </div>
                      </div>                      
                    </div>
                    <div class="clearfix"></div>
                    <div id="divuser" class="alert text-center" style="display:none;">
                      <button type="button" class="close" id="clearMsg"><span aria-hidden="true">&times;</span></button>
                      <span style="color:#000" id="messageuser"></span>  
                    </div>   
                    <?php echo form_close(); ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    <div class="modal-footer">
      <button type="button" name="btnprofile" id="submitprofile" class="btn btn-info btn-fill btn-wd" onclick="profile_cenro()">Update Profile</button>
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
  </div>
  </div>
</div>

<div class="wrapper">
  <div class="sidebar" data-background-color="black" data-active-color="danger">
    <div class="sidebar-wrapper">
      <div class="logo">
      <a href="" class="simple-text">PENRO-<?php echo $read->provinceName ?> </a>
      </div>

      <ul class="nav">
        <li class="<?php if($this->uri->segment(2) == "dashboard"){echo 'active';}?>">
          <a href="<?php echo base_url('penro/dashboard'); ?>">
            <i class="ti-dashboard"></i>
            <p>Dashboard</p>
          </a>
        </li>        
        <li class="<?php if($this->uri->segment(3) == "ipaf"){echo 'active';}?>">
          <a data-toggle="collapse" href="#mapsExamples">
            <i class="ti-bar-chart"></i>
            <p>IPAF Report<b class="caret"></b></p>
          </a>
          <div class="collapse" id="mapsExamples">
            <ul class="nav">              
              <li>
                <a href="<?php echo base_url('penro/report/ipaf/byYear'); ?>" style="color: #40ff00">
                  <i class="ti-yahoo"></i>
                  <span class="sidebar-mini">By</span>
                  <span class="sidebar-normal">Year</span>
                </a>
              </li>              
            </ul>
          </div>
        </li>
      </ul>

    </div>
  </div>
  <div class="main-panel">
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar bar1"></span>
            <span class="icon-bar bar2"></span>
            <span class="icon-bar bar3"></span>
          </button>
          <p class="navbar-brand"><?php echo $page_title; ?></p>
        </div>        
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right"> 
            <!-- <li><a href="<?php echo base_url('pasu/fee_setting'); ?>" class="btn-rotate"><i class="ti-settings"></i><p class="hidden-md hidden-lg">Fee Settings</p></a></li>                        -->
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="ti-user"></i>
                <p class="notification"></p>
                <?php if ($this->session->userdata('user_role') == 1): ?>                  
                    <p><strong>Administrator </strong></p>                  
                <?php elseif ($this->session->userdata('user_role') == 2): ?>
                  <p><strong>Regions</strong></p>
                <?php elseif ($this->session->userdata('user_role') == 3): ?>
                  <p><strong>Superintendent</strong></p>
                <?php elseif ($this->session->userdata('user_role') == 4): ?>
                  <p><strong>CENR-<?php echo $read->lastname ?></strong></p>
                <?php elseif ($this->session->userdata('user_role') == 5): ?>
                  <p><strong>PENR-<?php echo $read->lastname ?></strong></p>
                <?php endif ?>
                
                <b class="caret"></b>
              </a>
              <ul class="dropdown-menu">
                <li><a href="#" data-toggle="modal" data-target="#myModalProfile"><i class="ti-user"></i> <strong> My Profile</strong></a></li>
                <li><a href="#" data-toggle="modal" data-target="#myModal"><i class="ti-key"></i> <strong> Change Password</strong></a></li>
                <li><a href="<?php echo base_url('logout') ?>"><i class="ti-power-off"></i><strong> Sign out</strong></a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  <!-- </div> -->
<!-- </div> -->

<script type="text/javascript">
  function myFunction() {
    var x = document.getElementById("pass");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
} 

function myFunctions() {
    var x = document.getElementById("repass");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
} 
</script>
