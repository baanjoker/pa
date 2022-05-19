<div class="container">
    <div class="row">
        <section class="content-header">
        <!--  table area -->
        <div class="col-md-12 col-lg-12">
            <!-- <div  class="panel panel-default">  -->
                <div class="panel-body">

                    <div class="row">
                        <div class="col-md-3 col-lg-3 " align="center"> 
                            <img alt="Picture" src="<?php echo (!empty($user->picture)?base_url('bmb_assets2/img/user_img/').$user->picture:base_url("assets/images/no-img.png")) ?>" class="img-thumbnail img-responsive">

                            <h3>
                                <?php echo $this->session->userdata('fullname')." ".$this->session->userdata('lastnames')  ?> 
                                <h6>(
                                <?php 
                                    if ($user->user_role == 1) {
                                        echo "Admin";
                                    } elseif ($user->user_role == 2) {
                                        echo "User";
                                    } else {
                                        echo "Representative";
                                    }  
                                ?>
                                )</h6>
                            </h3>
                        </div>

                        <div class="col-md-9 col-lg-9 "> 
                            <table width="100%" border="0" cellpadding="3" cellspacing="1" class="table4">
                                <tr valign="top" class="spaceUnder spaceOver">
                                    <td>Email</td>
                                    <td><?php echo (!empty($user->email)?$user->email:null) ?></td>
                                </tr>
                                <tr valign="top" class="spaceUnder">
                                    <td>Designation</td>
                                    <td><?php echo (!empty($user->designation)?$user->designation:null) ?></td>
                                </tr>
                                <tr valign="top" class="spaceUnder">
                                    <td>Department</td>
                                    <td><?php echo (!empty($user->department)?$user->department:null) ?></td>
                                </tr>
                                <tr valign="top" class="spaceUnder">
                                    <td>Address</td>
                                    <td><?php echo (!empty($user->address)?$user->address:null) ?></td>
                                </tr>
                                <tr valign="top" class="spaceUnder">
                                    <td>Contact Number</td>
                                    <td><?php echo (!empty($user->mobile)?$user->mobile:null)." / ".(!empty($user->landline)?$user->landline:null); ?>   
                                    </td>
                                </tr>
                                <tr valign="top" class="spaceUnder">
                                    <td>Gender </td>
                                    <td><?php echo (!empty($user->sexdesc)?$user->sexdesc:null); ?>   
                                    </td>
                                </tr>
                                <tr valign="top" class="spaceUnder">
                                    <td>Date of Birth </td>
                                    <td><?php echo (!empty($user->dob)?date('F Y',strtotime($user->dob)):null); ?>   
                                    </td>
                                </tr>
                                <tr valign="top" class="spaceUnder">
                                    <td>Blood Type </td>
                                    <td><?php echo (!empty($user->symbol)?$user->symbol:null); ?>   
                                    </td>
                                </tr>
                                <tr valign="top" class="spaceUnder">
                                    <td>Account Status </td>
                                    <td><?php echo (!empty($user->status)?'<i class="fa fa-circle text-success"></i> Active':'<i class="fa fa-circle text-danger"></i> Deactivate') ?>
                                       
                                    </td>
                                </tr>
                            </table>
                            <br>
                            <table>
                                <tr valign="top" class="spaceUnder">
                                    <td>
                                        <?php if ($this->session->userdata('user_role') == 2) { ?>
                                            <a href="<?php echo base_url('representative/edit/'.$this->session->userdata('user_id')) ?>" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i> Edit Profile</a>
                                        <?php } else { ?>                        
                                            <a href="<?php echo base_url('profile/form/'.$this->session->userdata('user_id')) ?>" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i> Edit Profile</a>
                                        <?php } ?>
                                    </td>
                                    <td></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
        </div>
    </section>
    </div>
</div>