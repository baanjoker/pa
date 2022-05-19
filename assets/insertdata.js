
// $(document).ready(function(){
//         $("#pambmemberTab").hide();
//         $("#dateOrganized").hide();
//             $("#dateApprovePMB").click(function () {
//             if ($(this).is(":checked")) {
//                 $("#dateOrganized").show();
//                 $("#dateOrganizeds").show();
//                 $("#pambmemberTab").show();
//                 $("#pambmemberTabs").show();
//             } else {
//                 $("#dateOrganized").hide();
//                 $("#dateOrganizeds").hide();
//                 $("#pambmemberTab").hide();
//                 $("#pambmemberTabs").hide();
//                 $("#dateMonthPAMB")[0].selectedIndex = 0;
//                 $("#dateDayPAMB")[0].selectedIndex = 0;
//                 $("#dateYearPAMB")[0].selectedIndex = 0;
//             }
//         });
//     });

 function create()
    {
    	// var formprofile = document.getElementById("userForm");
    	var formdata = new FormData();
		formdata.append('picture', document.getElementById('picture').files[0]);

	    var other_data = $('#form_registration').serializeArray();
	    $.each(other_data,function(key,input){
	        formdata.append(input.name,input.value);
	    });
    	 $.ajax({
    	 	url : BASE_URL + '/registration/create',
    	 	type: "POST",
    	 	contentType: false,
		  	cache: false,
		  	processData: false,
    	 	data: formdata,
    	 	dataType: "JSON",
    	 	success:function(response){
                $('#messageuser').html(response.messageuser);
                    if(response.error){
                        $('#divuser').removeClass('alert-success').addClass('alert-warning').show();
                         setTimeout(function() {
						           $("#divuser").fadeOut();

						        }, 10000);
                    }
                    else{
                        $('#divuser').removeClass('alert-warning').addClass('alert-success').show();
                         setTimeout(function() {
						           $("#divuser").fadeOut();

						        }, 10000);
                       formprofile.reset();
                    }
                }
    	 });
    	  $(document).on('click', '#clearMsg', function(){
            $('#divuser').hide();
        });
    }

function insert_profile()
    {

        var url = '<?php echo base_url(); ?>';
        var formprofile = document.getElementById("userForm");
        

        var formdata = new FormData();
        formdata.append('file-upload', document.getElementById('file-upload').files[0]);

        var other_data = $('#formprofile').serializeArray();
        $.each(other_data,function(key,input){
            formdata.append(input.name,input.value);
        });
         $.ajax({
            url : BASE_URL + 'pasu/dashboard/update',
            type: "POST",
            contentType: false,
            cache: false,
            processData: false,
            data: formdata,
            dataType: "JSON",
            success:function(response){
                    $('#messageuser').html(response.messageuser);
                    if(response.error){
                        $('#divuser').removeClass('alert-success').addClass('alert-warning').show();
                         setTimeout(function() {
                                   $("#divuser").fadeOut();

                                }, 2000);
                    }
                    else{
                        $('#divuser').removeClass('alert-warning').addClass('alert-success').show();
                         setTimeout(function() {
                                   $("#divuser").fadeOut();

                                }, 2000);
                       formprofile.reset();
                    }
                }
         });
          $(document).on('click', '#clearMsg', function(){
            $('#divuser').hide();
        });
    }

// ===================UPDATE PASSWORD====================//

var myLink = document.getElementById('UpdatePass');

// myLink.onclick = function()
//     { 
//        $.ajax({
//         url : BASE_URL+'pasu/dashboard/update_password',
//         type: "POST",
//         data: $('#formChangePass').serialize(),
//         dataType: "JSON",
//         success:function(response){
//                     $('#messagePass').html(response.messagePass);
//                     if(response.error){
//                         $('#divPass').removeClass('alert-success').addClass('alert-warning').show();
//                          setTimeout(function() {
//                        $("#divPass").fadeOut();

//                     }, 2000);
//                     }
//                     else{
//                         $('#divPass').removeClass('alert-warning').addClass('alert-success').show();
//                         $('#formChangePass')[0].reset();
//                          setTimeout(function() {
//                        $("#divPass").fadeOut();
//                        location.reload();
//                     }, 5000);
//                         // getTables();

//                     }
//                 }
//        });
//         $(document).on('click', '#clearMsg', function(){
//             $('#divPass').hide();
//         });
//     }
$("#UpdatePass").click(function(){
  $.ajax({
    url : BASE_URL+'pasu/changepass/update_password',
    type: "POST",
    data: $('#formChangePass').serialize(),
    dataType: "JSON",
    success:function(response){                   
    if (response.error == true) {
          swal('',response.messagePass,"error");
    }else if(response.message == 'update'){
          swal('',response.messagePass,"success");
          setTimeout(function () {
              location.reload();
          },5000);
      }
    }
  });
});


$('#pass').keyup(function(e) {
     var strongRegex = new RegExp("^(?=.{8,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");
     var mediumRegex = new RegExp("^(?=.{7,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");
     var enoughRegex = new RegExp("(?=.{6,}).*", "g");
     if (false == enoughRegex.test($(this).val())) {
             $('#passstrength').html('More Characters');
     } else if (strongRegex.test($(this).val())) {
             $('#passstrength').className = 'ok';
             $('#passstrength').html('Strong!');
     } else if (mediumRegex.test($(this).val())) {
             $('#passstrength').className = 'alert';
             $('#passstrength').html('Medium!');
     } else {
             $('#passstrength').className = 'error';
             $('#passstrength').html('Weak!');
     }
     return true;
});

var url = '<?php echo base_url(); ?>';
$(".regid").change(function(){
    var output = $('.prov_error'); 
    var prov_list_item = $('.provid');
    var municipal_list_item = $('.munid');
    var barangay_list_item = $('.barid');
    var clear1 = $('.municipal_error');
    var clear2 = $('.barangay_error');
                                    
    $.ajax({
        url  : BASE_URL+'/pasu/pamain/getProv/',
        type : 'post',
        dataType : 'JSON',
        data : {
          '<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
          regid : $(this).val()},
          success : function(data)
          {
            if (data.status == true) {
              prov_list_item.html(data.message); 
              output.html('');
              municipal_list_item.html('');
              barangay_list_item.html('');
              clear1.html('');
              clear2.html('');
            } else if (data.status == false) {
                $(".provid")[0].selectedIndex = 0;

              prov_list_item.html('');
              municipal_list_item.html('');
              barangay_list_item.html('');
              output.html(data.message).addClass('text-danger').removeClass('text-success');
              clear1.html('');
              clear2.html('');
            // } else {
            //   prov_list_item.html('');
            //   municipal_list_item.html('');
            //   barangay_list_item.html('');
            //   output.html(data.message).addClass('text-danger').removeClass('text-success');
            //   clear1.html('');
            //   clear2.html('');
            }
          }, 
          error : function()
          {
            alert('failed');
          }
        });
});

$(".provid").change(function(){
  var output = $('.municipal_error');
  var prov_list_item = $('.provid');
  var municipal_list_item = $('.munid');
  var barangay_list_item = $('.barid');
  var clear2 = $('.barangay_error');
  $.ajax({
    url  : BASE_URL+'/pasu/pamain/getMunicipal/',
    // '<?= base_url('index.php/main_server/cave/getMunicipal/') ?>',
    type : 'post',
    dataType : 'JSON',
    data : {
      '<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
      regid : $(this).val(),
      provid : $(this).val()
    },
    success : function(data)
    {
      if (data.status == true) {
        municipal_list_item.html(data.message);
        barangay_list_item.html('');
        output.html('');
        clear2.html('');
      // } else if (data.status == false) {
      //   municipal_list_item.html('');
      //   barangay_list_item.html(''); 
      //   output.html(data.message).addClass('text-danger').removeClass('text-success')
      //   clear2.html('');
      // } else {
      //   municipal_list_item.html('');
        
      //   output.html(data.message).addClass('text-danger').removeClass('text-success');
      //   clear2.html('');
      }
    },
    error : function()
    {
      alert('failed me');
    }
  });
});

$(".munid").change(function(){
  var output = $('.barangay_error');
  var municipal_list_item = $('.munid');
  var barangay_list_item = $('.barid');
  $.ajax({
    url  :  BASE_URL+'/pasu/pamain/getbarangay/',
    // '<?= base_url('index.php/main_server/cave/getbarangay/') ?>',
    type : 'post',
    dataType : 'JSON',
    data : {
      '<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
      munid : $(this).val() 
    },
    success : function(data) 
    {
      if (data.status == true) {
        barangay_list_item.html(data.message); 
        output.html('');
      // } else if (data.status == false) {
      //   barangay_list_item.html('');
      //   output.html(data.message).addClass('text-danger').removeClass('text-success');
      // } else {
      //   barangay_list_item.html('');
      //   output.html(data.message).addClass('text-danger').removeClass('text-success');
      }
    }, 
    error : function()
    {
      alert('failed');
    }
  });
}); 
// //******** CLASSIFICATION SUB
// $("#nipid").change(function(){
//     var output = $('.nip_error'); 
//     var nip_item = $('#nipsub_id');
                                    
//     $.ajax({
//         url  : BASE_URL+'/pasu/pamain/getnipsub/',
//         type : 'post',
//         dataType : 'JSON',
//         data : {
//           '<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
//           nipid : $(this).val()},
//           success : function(data)
//           {
//              if (data.status == true) {
//               nip_item.html(data.message); 
//               output.html('');             
//             } else if (data.status == false) {
//               nip_item.html('');              
//               output.html(data.message).addClass('text-danger').removeClass('text-success');             
//             } else {
//               nip_item.html('');             
//               output.html(data.message).addClass('text-danger').removeClass('text-success');            
//             }
//           }, 
//           error : function()
//           {
//             alert('failed');
//           }
//         });
// });

//------------------- CATEGORY WILDLIFE ------------------------//
$("#idcat").change(function(){
    var output = $('.class_error'); 
    var item = $('#idclass');
    var item2 = $('#idorder');
    var item3 = $('#idfamily');
    var item4 = $('#commonid');
                                    
    $.ajax({
        url  : BASE_URL+'/pasu/pamain/getwclass/',
        type : 'post',
        dataType : 'JSON',
        data : {
          '<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
          idcat : $(this).val()},
          success : function(data)
          {
             if (data.status == true) {
              item.html(data.message); 
              output.html('');   
              item2.html(''); 
              item3.html(''); 
              item4.html('');     
            } else if (data.status == false) {
              item.html(''); 
              item2.html(''); 
              item3.html(''); 
              item4.html('');
              output.html(data.message).addClass('text-danger').removeClass('text-success');             
            } else {
              item.html('');  
              item2.html(''); 
              item3.html(''); 
              item4.html('');
              output.html(data.message).addClass('text-danger').removeClass('text-success');            
            }
          }, 
          error : function()
          {
            alert('failed');
          }
        });
});

//------------------- ORDER WILDLIFE ------------------------//
$("#idclass").change(function(){
    var output = $('.order_error'); 
    var item = $('#idorder');
    var item3 = $('#idfamily');
    var item4 = $('#commonid');                            
    $.ajax({
        url  : BASE_URL+'/pasu/pamain/getworder/',
        type : 'post',
        dataType : 'JSON',
        data : {
          '<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
          idclass : $(this).val()},
          success : function(data)
          {
             if (data.status == true) {
              item.html(data.message); 
              output.html(''); 
              item3.html(''); 
              item4.html('');     
            } else if (data.status == false) {
              item.html('');  
              item3.html(''); 
              item4.html('');     
              output.html(data.message).addClass('text-danger').removeClass('text-success');             
            } else {
              item.html('');  
              item3.html(''); 
              item4.html('');                
              output.html(data.message).addClass('text-danger').removeClass('text-success');            
            }
          }, 
          error : function()
          {
            alert('failed');
          }
        });
});

//------------------- FAMILY WILDLIFE ------------------------//
$("#idorder").change(function(){
    var output = $('.family_error'); 
    var item = $('#idfamily');
    var item4 = $('#commonid'); 
                                    
    $.ajax({
        url  : BASE_URL+'/pasu/pamain/getwfamily/',
        type : 'post',
        dataType : 'JSON',
        data : {
          '<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
          idorder : $(this).val()},
          success : function(data)
          {
             if (data.status == true) {
              item.html(data.message); 
              output.html('');   
              item4.html('');           
            } else if (data.status == false) {
              item.html('');    
              item4.html('');           
              output.html(data.message).addClass('text-danger').removeClass('text-success');             
            } else {
              item.html('');  
              item4.html('');            
              output.html(data.message).addClass('text-danger').removeClass('text-success');            
            }
          }, 
          error : function()
          {
            alert('failed');
          }
        });
});

//------------------- COMMON WILDLIFE ------------------------//
$("#idfamily").change(function(){
    var output = $('.common_error'); 
    var item = $('#commonid');
    var code = $("#codegen").val();
                     
    $.ajax({
        url  : BASE_URL+'/pasu/pamain/getwcommon/',
        type : 'post',
        dataType : 'JSON',
        data : {
          '<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
          idfamily : $(this).val(),code:code},
          success : function(data)
          {
             if (data.status == true) {
              item.html(data.message); 
              output.html('');             
            } else if (data.status == false) {
              item.html('');              
              output.html(data.message).addClass('text-danger').removeClass('text-success');             
            } else {
              item.html('');             
              output.html(data.message).addClass('text-danger').removeClass('text-success');            
            }
          }, 
          error : function()
          {
            alert('failed');
          }
        });
});


// PROJECT

var url = '<?php echo base_url(); ?>';
$("#proj_regid").change(function(){
    var output = $('.proj_prov_error'); 
    var prov_list_item = $('#proj_provid');
    var municipal_list_item = $('#proj_munid');
    var barangay_list_item = $('#proj_barid');
    var clear1 = $('.proj_municipal_error');
    var clear2 = $('.proj_barangay_error');
                                    
    $.ajax({
        url  : BASE_URL+'/pasu/pamain/proj_getProv/',
        type : 'post',
        dataType : 'JSON',
        data : {
          '<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
          proj_regid : $(this).val()},
          success : function(data)
          {
            if (data.status == true) {
              prov_list_item.html(data.message); 
              output.html('');
              municipal_list_item.html('');
              barangay_list_item.html('');
              clear1.html('');
              clear2.html('');
            } else if (data.status == false) {
              prov_list_item.html('');
              municipal_list_item.html('');
              barangay_list_item.html('');
              output.html(data.message).addClass('text-danger').removeClass('text-success');
              clear1.html('');
              clear2.html('');
            } else {
              prov_list_item.html('');
              municipal_list_item.html('');
              barangay_list_item.html('');
              output.html(data.message).addClass('text-danger').removeClass('text-success');
              clear1.html('');
              clear2.html('');
            }
          }, 
          error : function()
          {
            alert('failed');
          }
        });
});

$("#proj_provid").change(function(){
  var output = $('.proj_municipal_error');
  var prov_list_item = $('#proj_provid');
  var municipal_list_item = $('#proj_munid');
  var barangay_list_item = $('#proj_barid');
  var clear2 = $('.proj_barangay_error');
  $.ajax({
    url  : BASE_URL+'/pasu/pamain/proj_getMunicipal/',
    // '<?= base_url('index.php/main_server/cave/getMunicipal/') ?>',
    type : 'post',
    dataType : 'JSON',
    data : {
      '<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
      regid : $(this).val(),
      provid : $(this).val()
    },
    success : function(data)
    {
      if (data.status == true) {
        municipal_list_item.html(data.message);
        barangay_list_item.html('');
        output.html('');
        clear2.html('');
      } else if (data.status == false) {
        municipal_list_item.html('');
        barangay_list_item.html(''); 
        output.html(data.message).addClass('text-danger').removeClass('text-success')
        clear2.html('');
      } else {
        municipal_list_item.html('');
        
        output.html(data.message).addClass('text-danger').removeClass('text-success');
        clear2.html('');
      }
    },
    error : function()
    {
      alert('failed me');
    }
  });
});

$("#proj_munid").change(function(){
  var output = $('.proj_barangay_error');
  var municipal_list_item = $('#proj_munid');
  var barangay_list_item = $('#proj_barid');
  $.ajax({
    url  :  BASE_URL+'/pasu/pamain/proj_getbarangay/',
    // '<?= base_url('index.php/main_server/cave/getbarangay/') ?>',
    type : 'post',
    dataType : 'JSON',
    data : {
      '<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
      munid : $(this).val() 
    },
    success : function(data) 
    {
      if (data.status == true) {
        barangay_list_item.html(data.message); 
        output.html('');
      } else if (data.status == false) {
        barangay_list_item.html('');
        output.html(data.message).addClass('text-danger').removeClass('text-success');
      } else {
        barangay_list_item.html('');
        output.html(data.message).addClass('text-danger').removeClass('text-success');
      }
    }, 
    error : function()
    {
      alert('failed');
    }
  });
}); 


