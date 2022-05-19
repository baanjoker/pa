<?php
$email = array(
    'name' => 'email',
    'id'   => 'email',
    'class'=> 'form-control border-input',
    'type'	=>'email',
);
$landline = array(
	'name' 		=>	'landline',
	'class' 	=>	'form-control',
	'id'		=>	'landline',
	'placeholder' =>'(area code) 123-4567'
);
$mobile = array(
	'name' 		=>	'mobile',
	'class' 	=>	'form-control',
	'id'		=>	'mobile',
	'placeholder' =>'+(63) 123-4567-890'
);
$dob = array(
	'name' 		=>	'dob',
	'type'		=>	'date',
	'class' 	=>	'datepicker form-control',
	'id'		=>	'dob',
	'required'	=>	'required'
);
$sex = array(
	'name' 		=>	'sex',
	'id'		=>	'sex',
	'class' 	=>	'form-control',
	'required'	=>	'required'
);

$ages = array(
    'name'      =>  'age_bracket',
    'id'        =>  'age_bracket',
    'class'     =>  'form-control',
    'required'  =>  'required'
);

$blood = array(
	'name' 		=>	'blood',
	'class' 	=>	'form-control',
	'id'		=>	'blood',
	'required'	=>	'required'
);
?>
<div>
    <?php echo form_open_multipart('#','id="userForm" enctype="multipart/form-data" class="form-style-7"') ?>
        <?php echo form_hidden('user_id',$read->user_id);?> 
         <div class="col-xs-12">
            <div class="form-style-6">
                <h2>Protected Area Superintendent Profile</h2>
            </div>
            <div class="col-xs-12 col-lg-2 col-sm-2 col-md-2">
                <div class="col-xs-12 col-lg-12 col-sm-12 col-md-12">
                    <img width="100%" height="100%" id="blah" src="<?php echo (!empty($read->picture)?base_url('bmb_assets2/img/user_img/').$read->picture :base_url("bmb_assets2/img/user_img/no-img.png")) ?>" alt="your image" /><hr>
                </div>
                <div style="margin: auto;padding: 10px;">                
                    <input type='file' name="picture" id="picture" value="<?php echo $read->picture ?>" onchange="readURL(this);" /> 
                    <input type="hidden" name="old_picture" value="<?php echo $read->picture ?>">
                </div>
            </div>
            <div class="col-xs-12 col-lg-10 col-sm-6 col-md-10">
                <div class="col-xs-12 col-lg-12">
                    <div class="col-xs-3 col-lg-3">
                        <ul><li>
                            <?= form_label('Firstname','','for="firstname"').form_input('firstname',$read->firstname,'id="firstname"');?>
                        </li></ul>
                    </div>
                    <div class="col-xs-3 col-lg-3">
                        <ul><li>
                            <?= form_label('Middlename','','for="mname"').form_input('mname',$read->middlename,'id="mname"');?>
                        </li></ul>
                    </div>
                    <div class="col-xs-3 col-lg-3">
                        <ul><li>
                            <?= form_label('Lastname','','for="plastname"').form_input('plastname',$read->lastname,'id="plastname"');?>
                        </li></ul>
                    </div>
                    <div class="col-xs-3 col-lg-3">
                        <ul><li>
                            <?= form_label('Suffix','','for="suffix"').form_input('suffix',$read->psuffix,'id="suffix"');?>
                        </li></ul>
                    </div>    
                </div>
                <div class="col-xs-6 col-lg-6">
                    <ul><li>
                        <?= form_label('Designation','','for="designation"').form_input('designation',$read->designation,'id="designation"');?>
                    </li></ul>
                </div>
                <div class="col-xs-2 col-lg-2">
                    <ul><li>
                        <?= form_label('Sex','','for="gender"').form_dropdown('gender',$gender,$read->sex,'id="gender"');?>
                    </li></ul>
                </div>
                <div class="col-xs-4 col-lg-4">
                 <ul><li>
                     <?= form_label('Age bracket','','for="landline"').form_dropdown('ages',$agebrcket,$read->age_bracket,'id="ages"');?>
                 </li></ul>
                </div> 
                <div class="col-xs-12 col-lg-12">                
                    <div class="col-xs-6 col-lg-6">
                        <ul><li>
                            <?= form_label('Office','','for="department"').form_input('department',$read->department,'id="department"');?>
                        </li></ul>
                    </div>
                    <div class="col-xs-6 col-lg-6">
                        <ul><li>
                            <?= form_label('Office address','','for="address"').form_input('address',$read->address,'id="address"');?>
                        </li></ul>
                    </div>
                </div>
                <div class="col-xs-12 col-lg-12">
                    <div class="col-xs-6 col-lg-6">
                        <ul><li>
                            <?= form_label('Email address','','for="email"').form_input('email',$read->email,'id="email"');?>
                        </li></ul>
                    </div>
                    <div class="col-xs-6 col-lg-6">
                        <ul><li>
                            <?= form_label('Contact number','','for="landline"').form_input('landline',$read->landline,'id="landline"');?>
                        </li></ul>
                    </div>                    
                </div>
                <button type="button" name="btnprofile" id="submitprofile" onclick="update()" class="btn btn-success  btn-flat"><i class="cap-icon ci-save"> Update</i></button>
                                <button type="button" name="changepass" id="changepass" onclick="directme_url()" class="btn btn-default  btn-flat"><i class="cap-icon ci-key"> Change Password</i></button>
            </div>
            
        </div>
    <?php echo form_close(); ?>
</div>

<script type="text/javascript">
	// ------------------------------------ MAIN -------------------------------------//
    function update()
    {

    	var url = '<?php echo base_url(); ?>';
    	var formprofile = document.getElementById("userForm");

    	var formdata = new FormData();
		formdata.append('picture', document.getElementById('picture').files[0]);

	    var other_data = $('#userForm').serializeArray();
	    $.each(other_data,function(key,input){
	        formdata.append(input.name,input.value);
	    });
    	 $.ajax({
    	 	url : url + 'pasu/profile/create',
    	 	type: "POST",
    	 	contentType: false,
		  	cache: false,
		  	processData: false,
    	 	data: formdata,
    	 	dataType: "JSON",
    	 	success:function(response){
                swal({
                  title: "Successful Update!",
                  text: "Your data has been updated.",
                  type: "success",
                  showConfirmButton: true,
               });
            setTimeout(function() {
                // $("#divuser").fadeOut();
                window.location.href=window.location.href; 
            }, 2000);
              //       $('#messageuser').html(response.messageuser);
              //       if(response.error){
              //           $('#divuser').removeClass('alert-success').addClass('alert-danger').show();
              //            setTimeout(function() {
						        //    $("#divuser").fadeOut();
              //                      window.location.href=window.location.href; 
						        // }, 2000);
              //       }
              //       else{
              //           $('#divuser').removeClass('alert-danger').addClass('alert-success').show();
              //            setTimeout(function() {
						        //    $("#divuser").fadeOut();
              //                      window.location.href=window.location.href; 
						        // }, 2000);
              //          formprofile.reset();
              //       }
                }
    	 });
    	  $(document).on('click', '#clearMsg', function(){
            $('#divuser').hide();
        });
    }
// ------------------------------------END OF MAIN -------------------------------------//

function directme_url(){
window.location.href = BASE_URL + 'pasu/changepass';
}
</script>