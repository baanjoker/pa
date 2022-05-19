

   // tabbed content
    // http://www.entheosweb.com/tutorials/css/tabs.asp
    $(".tab_content").hide();
    $(".tab_content:first").show();

  /* if in tab mode */
    $("ul.tabs li").click(function() {
    
      $(".tab_content").hide();
      var activeTab = $(this).attr("rel"); 
      $("#"+activeTab).fadeIn();    
    
      $("ul.tabs li").removeClass("active");
      $(this).addClass("active");

    $(".tab_drawer_heading").removeClass("d_active");
    $(".tab_drawer_heading[rel^='"+activeTab+"']").addClass("d_active");
    
    });
  /* if in drawer mode */
  $(".tab_drawer_heading").click(function() {
      
      $(".tab_content").hide();
      var d_activeTab = $(this).attr("rel"); 
      $("#"+d_activeTab).fadeIn();
    
    $(".tab_drawer_heading").removeClass("d_active");
      $(this).addClass("d_active");
    
    $("ul.tabs li").removeClass("active");
    $("ul.tabs li[rel^='"+d_activeTab+"']").addClass("active");
    });
  
  
  /* Extra class "tab_last" 
     to add border to right side
     of last tab */
  $('ul.tabs li').last().addClass("tab_last");

  
  $("#pambmemberTab").hide();
  $(".pambmemberTab").hide();
  $("#dateOrganized").hide();
  $("#dateApprovePMB").click(function () {
    if ($(this).is(":checked")) {
      $("#dateOrganized").show();
      $("#dateOrganizeds").show();
      $("#pambmemberTab").show();
      $(".pambmemberTab").show();
      $("#pambmemberTabs").show();
    } else {
      $("#dateOrganized").hide();
      $("#dateOrganizeds").hide();
      $("#pambmemberTab").hide();
      $(".pambmemberTab").hide();
      $("#pambmemberTabs").hide();
      $("#dateMonthPAMB")[0].selectedIndex = 0;
      $("#dateDayPAMB")[0].selectedIndex = 0;
      $("#dateYearPAMB")[0].selectedIndex = 0;
    }
  });

var url = '<?php echo base_url(); ?>';
$("#regid").change(function(){
    var output = $('.prov_error'); 
    var prov_list_item = $('#provid');
    var municipal_list_item = $('#municipal_id');
    var barangay_list_item = $('#bar_id');
    var clear1 = $('.municipal_error');
    var clear2 = $('.barangay_error');
                                    
    $.ajax({
        url  : BASE_URL+'/users/protectedarea/pamain/getProv/',
        // url +'/main_server/cave/getProv/',
        // '<?= base_url('index.php/main_server/cave/getProv/') ?>',
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

$("#provid").change(function(){
  var output = $('.municipal_error');
  var prov_list_item = $('#provid');
  var municipal_list_item = $('#municipal_id');
  var barangay_list_item = $('#bar_id');
  var clear2 = $('.barangay_error');
  $.ajax({
    url  : BASE_URL+'/users/protectedarea/pamain/getMunicipal/',
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

$("#municipal_id").change(function(){
  var output = $('.barangay_error');
  var municipal_list_item = $('#municipal_id');
  var barangay_list_item = $('#bar_id');
  $.ajax({
    url  :  BASE_URL+'/users/protectedarea/pamain/getbarangay/',
    // '<?= base_url('index.php/main_server/cave/getbarangay/') ?>',
    type : 'post',
    dataType : 'JSON',
    data : {
      '<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
      municipal_id : $(this).val() 
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

function insert()
    {
       $.ajax({
        url : BASE_URL + 'index.php/users/protectedarea/pamain/location',
        type: "POST",
        data: $('#MainForm').serialize(),
        dataType: "JSON",
        success:function(response){
                    $('#message').html(response.message);
                    if(response.error){
                        $('#responseDiv').removeClass('alert-success').addClass('alert-warning').show();
                         setTimeout(function() {
            // $("#responseDiv").hide();
                       $("#responseDiv").fadeOut();

                    }, 10000);
                    }
                    else{
                        $('#responseDiv').removeClass('alert-warning').addClass('alert-success').show();
                        // $('#MainForm')[0].reset();
                         setTimeout(function() {
            // $("#responseDiv").hide();
                       $("#responseDiv").fadeOut();

                    }, 10000);
                        getTablesLoc();
                    }
                }
       });
        $(document).on('click', '#clearMsg', function(){
            $('#responseDiv').hide();
        });
    }

$(document).ready(function() {
    getTablesLoc();
});
function getTablesLoc(){
    var url = '<?php echo base_url(); ?>';
    var codegen = $('#codegen').val();
    $.ajax({
        type: 'POST',
        data : {codegens:codegen},
        url: BASE_URL + 'index.php/users/protectedarea/pamain/fetchlocation',
        success:function(response){
            $('#tbodylocation').html(response);
        }
    });
}

$(document).on('click', '.removelocations', function(){
    var id = $(this).data('id');
    swal({
        title: 'Remove from the list?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, remove it!',
    }).then((result) => {
        if (result.value){
          $.ajax({
            url: BASE_URL+'/users/protectedarea/pamain/deletelocation/'+id,
            type: 'POST',
              data: 'id='+id,
              dataType: 'json'
          })
          .done(function(response){
            swal('Removed!', response.message, response.status);
            // $('#tablelocation').DataTable().ajax.reload();
            // $('#tbody').html(response);
          getTablesLoc();
          })
          .fail(function(){
            swal('Oops...', 'Something went wrong with ajax !', 'error');
          });
        }

    })
});

// ------------------------------------ LEGISLATION -------------------------------------//

    function insert_legis2()
    {
        // var reader = new FileReader();
        // reader.readAsDataURL(document.getElementById('picture').files[0]);

      var formdata = new FormData();
      formdata.append('picture', document.getElementById('picture').files[0]);

        // var serial = $('#MainForm').serialize();

        var other_data = $('#MainForm').serializeArray();
        $.each(other_data,function(key,input){
            formdata.append(input.name,input.value);
        });

       $.ajax({
        url : BASE_URL + 'index.php/users/protectedarea/pamain/legislation_save',
        method: 'POST',
      contentType: false,
      cache: false,
      processData: false,
      data: formdata,
        dataType: "JSON",
        success:function(response){
                    $('#messagelegis').html(response.messagelegis);
                    if(response.error){
                        $('#responseDivLegis').removeClass('alert-success').addClass('alert-warning').show();
                         setTimeout(function() {
                       $("#responseDivLegis").fadeOut();
                    }, 10000);
                    }
                    else{
                        $('#responseDivLegis').removeClass('alert-warning').addClass('alert-success').show();
                         setTimeout(function() {
                       $("#responseDivLegis").fadeOut();
                    }, 10000);
                        getTablesLegis();
                    }
                }
       });
        $(document).on('click', '#clearMsgLegis', function(){
            $('#responseDivLegis').hide();
        });
    }

    function getTablesLegis(){
        var codegen = $('#codegen').val();
        $.ajax({
            type: 'POST',
            data : {codegens:codegen},
            url: BASE_URL + 'index.php/users/protectedarea/pamain/fetchlegis',
            success:function(response){
                $('#tbodylegis').html(response);
            }
        });
    }


    $(document).ready(function() {
    getTablesLegis();

    $(document).on('click', '.removelegislation', function(){
    var id = $(this).data('id');
    swal({
        title: 'Remove from the list?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, remove it!',
    }).then((result) => {
        if (result.value){
          $.ajax({
            url: BASE_URL+'/users/protectedarea/pamain/deletelegis/'+id,
            type: 'POST',
              data: 'id='+id,
              dataType: 'json'
          })
          .done(function(response){
            swal('Removed!', response.message, response.status);
            // $('#tablelocation').DataTable().ajax.reload();
            // $('#tbody').html(response);
          getTablesLegis();
          })
          .fail(function(){
            swal('Oops...', 'Something went wrong with ajax !', 'error');
          });
        }

    })

    });
  });
//----------------------------------- END LEGISLATION -------------------------------------//

// ------------------------------------ PAMB -------------------------------------//

    function insert_pamb()
    {
       $.ajax({
        url : BASE_URL + 'index.php/users/protectedarea/pamain/pambmember',
        type: "POST",
        data: $('#MainForm').serialize(),
        dataType: "JSON",
        success:function(response){
                    $('#messagepamb').html(response.messagepamb);
                    if(response.error){
                        $('#responseDivPAMB').removeClass('alert-success').addClass('alert-warning').show();
                         setTimeout(function() {
            // $("#responseDiv").hide();
                       $("#responseDivPAMB").fadeOut();

                    }, 10000);
                    }
                    else{
                        $('#responseDivPAMB').removeClass('alert-warning').addClass('alert-success').show();
                        // $('#MainForm')[0].reset();
                         setTimeout(function() {
            // $("#responseDiv").hide();
                       $("#responseDivPAMB").fadeOut();

                    }, 10000);
                        getTabPAMB();
                    }
                }
       });
        $(document).on('click', '#clearMsg', function(){
            $('#responseDivPAMB').hide();
        });
    }

    function getTabPAMB(){
        var url = '<?php echo base_url(); ?>';
        var codegen = $('#codegen').val();
        $.ajax({
            type: 'POST',
            data : {codegens:codegen},
            url: BASE_URL + 'index.php/users/protectedarea/pamain/fetchPAMB',
            success:function(response){
                $('#tbodypamb').html(response);
            }
        });
    }


    $(document).ready(function() {
    getTabPAMB();

    $(document).on('click', '.removepambmember', function(){
    var id = $(this).data('id');
    swal({
        title: 'Remove from the list?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, remove it!',
    }).then((result) => {
        if (result.value){
          $.ajax({
            url: BASE_URL+'/users/protectedarea/pamain/deletepambmember/'+id,
            type: 'POST',
              data: 'id='+id,
              dataType: 'json'
          })
          .done(function(response){
            swal('Removed!', response.message, response.status);
            // $('#tablelocation').DataTable().ajax.reload();
            // $('#tbody').html(response);
          getTabPAMB();
          })
          .fail(function(){
            swal('Oops...', 'Something went wrong with ajax !', 'error');
          });
        }

    })

    });
  });
// ------------------------------------END OF PAMB -------------------------------------//

// ------------------------------------ BIOLOGICAL -------------------------------------//

    function insert_biological()
    {
       $.ajax({
        url : BASE_URL + 'index.php/users/protectedarea/pamain/registerBiological',
        type: "POST",
        data: $('#MainForm').serialize(),
        dataType: "JSON",
        success:function(response){
                    $('#messagebiological').html(response.messagebiological);
                    if(response.error){
                        $('#responseDivBiological').removeClass('alert-success').addClass('alert-warning').show();
                         setTimeout(function() {
            // $("#responseDiv").hide();
                       $("#responseDivBiological").fadeOut();

                    }, 10000);
                    }
                    else{
                        $('#responseDivBiological').removeClass('alert-warning').addClass('alert-success').show();
                        // $('#MainForm')[0].reset();
                         setTimeout(function() {
            // $("#responseDiv").hide();
                       $("#responseDivBiological").fadeOut();

                    }, 10000);
                        getTabBiological();
                    }
                }
       });
        $(document).on('click', '#clearMsg', function(){
            $('#responseDivBiological').hide();
        });
    }

    function getTabBiological(){
        var codegen = $('#codegen').val();
        $.ajax({
            type: 'POST',
            data : {codegens:codegen},
            url: BASE_URL + 'index.php/users/protectedarea/pamain/fetchBiological',
            success:function(response){
                $('#tbodybiological').html(response);
            }
        });
    }


    $(document).ready(function() {
    getTabBiological();

    $(document).on('click', '.removebiological', function(){
    var id = $(this).data('id');
    swal({
        title: 'Remove from the list?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, remove it!',
    }).then((result) => {
        if (result.value){
          $.ajax({
            url: BASE_URL+'/users/protectedarea/pamain/deletebiological/'+id,
            type: 'POST',
              data: 'id='+id,
              dataType: 'json'
          })
          .done(function(response){
            swal('Removed!', response.message, response.status);
            // $('#tablelocation').DataTable().ajax.reload();
            // $('#tbody').html(response);
          getTabBiological();
          })
          .fail(function(){
            swal('Oops...', 'Something went wrong with ajax !', 'error');
          });
        }

    })

    });
  });
// ------------------------------------END OF BIOLOGICAL -------------------------------------//

// ------------------------------------ PROJECTS -------------------------------------//

    function insert_projects()
    {
      var url = '<?php echo base_url(); ?>';
       $.ajax({
        url : BASE_URL + 'index.php/users/protectedarea/pamain/registerProject',
        type: "POST",
        data: $('#MainForm').serialize(),
        dataType: "JSON",
        success:function(response){
                    $('#messageproject').html(response.messageproject);
                    if(response.error){
                        $('#responseDivProject').removeClass('alert-success').addClass('alert-warning').show();
                         setTimeout(function() {
            // $("#responseDiv").hide();
                       $("#responseDivProject").fadeOut();

                    }, 10000);
                    }
                    else{
                        $('#responseDivProject').removeClass('alert-warning').addClass('alert-success').show();
                        // $('#MainForm')[0].reset();
                         setTimeout(function() {
            // $("#responseDiv").hide();
                       $("#responseDivProject").fadeOut();

                    }, 10000);
                        getTabProject();
                    }
                }
       });
        $(document).on('click', '#clearMsg', function(){
            $('#responseDivProject').hide();
        });
    }

    function getTabProject(){
        var url = '<?php echo base_url(); ?>';
        var codegen = $('#codegen').val();
        $.ajax({
            type: 'POST',
            data : {codegens:codegen},
            url: BASE_URL + 'index.php/users/protectedarea/pamain/fetchProject',
            success:function(response){
                $('#tbodyproject').html(response);
            }
        });
    }


    $(document).ready(function() {
    getTabProject();

    $(document).on('click', '.removeproject', function(){
    var id = $(this).data('id');
    swal({
        title: 'Remove from the list?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, remove it!',
    }).then((result) => {
        if (result.value){
          $.ajax({
            url: BASE_URL+'/users/protectedarea/pamain/deleteproject/'+id,
            type: 'POST',
              data: 'id='+id,
              dataType: 'json'
          })
          .done(function(response){
            swal('Removed!', response.message, response.status);
            // $('#tablelocation').DataTable().ajax.reload();
            // $('#tbody').html(response);
          getTabProject();
          })
          .fail(function(){
            swal('Oops...', 'Something went wrong with ajax !', 'error');
          });
        }

    })

    });
  });
// ------------------------------------END OF PROJECTS -------------------------------------//

// ------------------------------------ TRIBES -------------------------------------//

    function insert_tribes()
    {
       $.ajax({
        url : BASE_URL + 'index.php/users/protectedarea/pamain/registerTribe',
        type: "POST",
        data: $('#MainForm').serialize(),
        dataType: "JSON",
        success:function(response){
                    $('#messagetribe').html(response.messagetribe);
                    if(response.error){
                        $('#responseDivTribe').removeClass('alert-success').addClass('alert-warning').show();
                         setTimeout(function() {
            // $("#responseDiv").hide();
                       $("#responseDivTribe").fadeOut();

                    }, 10000);
                    }
                    else{
                        $('#responseDivTribe').removeClass('alert-warning').addClass('alert-success').show();
                        // $('#regFormlocation')[0].reset();
                         setTimeout(function() {
            // $("#responseDiv").hide();
                       $("#responseDivTribe").fadeOut();

                    }, 10000);
                        getTabtribes();
                    }
                }
       });
        $(document).on('click', '#clearMsg', function(){
            $('#responseDivTribe').hide();
        });
    }

    function getTabtribes(){
        var codegen = $('#codegen').val();
        $.ajax({
            type: 'POST',
            data : {codegens:codegen},
            url: BASE_URL + 'index.php/users/protectedarea/pamain/fetchTribe',
            success:function(response){
                $('#tbodytribe').html(response);
            }
        });
    }


    $(document).ready(function() {
    getTabtribes();

    $(document).on('click', '.removetribe', function(){
    var id = $(this).data('id');
    swal({
        title: 'Remove from the list?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, remove it!',
    }).then((result) => {
        if (result.value){
          $.ajax({
            url: BASE_URL+'/users/protectedarea/pamain/deletetribe/'+id,
            type: 'POST',
              data: 'id='+id,
              dataType: 'json'
          })
          .done(function(response){
            swal('Removed!', response.message, response.status);
            // $('#tablelocation').DataTable().ajax.reload();
            // $('#tbody').html(response);
          getTabtribes();
          })
          .fail(function(){
            swal('Oops...', 'Something went wrong with ajax !', 'error');
          });
        }

    })

    });
  });
// ------------------------------------END OF TRIBES -------------------------------------//

// ----------------------------------- INCOME GENERATED ------------------------------------//

function insert_income()
    {
       $.ajax({
        url : BASE_URL + 'index.php/users/protectedarea/pamain/income',
        type: "POST",
        data: $('#MainForm').serialize(),
        dataType: "JSON",
        success:function(response){
                    $('#incomeMessage').html(response.incomeMessage);
                    if(response.error){
                        $('#incomeDiv').removeClass('alert-success').addClass('alert-warning').show();
                         setTimeout(function() {
            // $("#responseDiv").hide();
                       $("#incomeDiv").fadeOut();

                    }, 10000);
                    }
                    else{
                        $('#incomeDiv').removeClass('alert-warning').addClass('alert-success').show();
                        // $('#MainForm')[0].reset();
                         setTimeout(function() {
            // $("#responseDiv").hide();
                       $("#incomeDiv").fadeOut();

                    }, 10000);
                        getTablesincome();
                    }
                }
       });
        $(document).on('click', '#clearMsg', function(){
            $('#incomeDiv').hide();
        });
    }


    function getTablesincome(){
        var codegen = $('#codegen').val();
        $.ajax({
            type: 'POST',
            data : {codegens:codegen},
            url: BASE_URL + 'index.php/users/protectedarea/pamain/fetchincome',
            success:function(response){
                $('#tbodyfee').html(response);
            }
        });
    }

    $(document).ready(function() {
    getTablesincome();

    $(document).on('click', '.removefee', function(){
    var id = $(this).data('id');
    swal({
        title: 'Remove from the list?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, remove it!',
    }).then((result) => {
        if (result.value){
          $.ajax({
            url: BASE_URL+'/users/protectedarea/pamain/deleteincome/'+id,
            type: 'POST',
              data: 'id='+id,
              dataType: 'json'
          })
          .done(function(response){
            swal('Removed!', response.message, response.status);
            // $('#tablelocation').DataTable().ajax.reload();
            // $('#tbody').html(response);
          getTablesincome();
          })
          .fail(function(){
            swal('Oops...', 'Something went wrong with ajax !', 'error');
          });
        }

    })

    });
  });

// ----------------------------------- end of INCOME GENERATED ------------------------------------//

// ----------------------------------- IMAGE UPLOAD ------------------------------------//
function insert_image()
{
  // var clearimage = document.getElementById('picture2');

    var formdata = new FormData();
    formdata.append('picture2', document.getElementById('picture2').files[0]);

    var other_data = $('#MainForm').serializeArray();
    $.each(other_data,function(key,input){
        formdata.append(input.name,input.value);
    });

   $.ajax({
    url : BASE_URL + 'index.php/users/protectedarea/pamain/image_upload_save',
    method: 'POST',
    contentType: false,
    cache: false,
    processData: false,
    data: formdata,
    dataType: "JSON",
    success:function(response){
                $('#messageimage').html(response.messageimage);
                if(response.error){
                    $('#responseDivImage').removeClass('alert-success').addClass('alert-warning').show();
                     setTimeout(function() {
                   $("#responseDivImage").fadeOut();
                }, 10000);
                }
                else{
                    $('#responseDivImage').removeClass('alert-warning').addClass('alert-success').show();
                    document.getElementById('picture').value='';
                    setTimeout(function() {
                   $("#responseDivImage").fadeOut();
                }, 10000);
                    getTabImage();
                }
            }
   });
    $(document).on('click', '#clearMsgImage', function(){
        $('#responseDivImage').hide();
    });
}

 function getTabImage(){
        var codegen = $('#codegen').val();
        $.ajax({
            type: 'POST',
            data : {codegens:codegen},
            url: BASE_URL + 'index.php/users/protectedarea/pamain/fetchImage',
            success:function(response){
                $('#tbodyimage').html(response);
            }
        });
    }

$(document).ready(function() {
    getTabImage();

    $(document).on('click', '.removeimage', function(){
    var id = $(this).data('id');
    swal({
        title: 'Remove from the list?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, remove it!',
    }).then((result) => {
        if (result.value){
          $.ajax({
            url: BASE_URL+'/users/protectedarea/pamain/deleteimages/'+id,
            type: 'POST',
              data: 'id='+id,
              dataType: 'json'
          })
          .done(function(response){
            swal('Removed!', response.message, response.status);
            // $('#tablelocation').DataTable().ajax.reload();
            // $('#tbody').html(response);
          getTabImage();
          })
          .fail(function(){
            swal('Oops...', 'Something went wrong with ajax !', 'error');
          });
        }

    })

    });
  });

function SaveMain()
    {
       $.ajax({
        url : BASE_URL + 'index.php/users/protectedarea/pamain/registerMain',
        type: "POST",
        data: $('#MainForm').serialize(),
        dataType: "JSON",
        success:function(response){
                    $('#messagemain').html(response.messagemain);
                    if(response.error){
                        $('#responseDivMain').removeClass('alert-success').addClass('alert-warning').show();
                         setTimeout(function() {
                       $("#responseDivMain").fadeOut();

                    }, 10000);
                    }
                    else{
                        $('#responseDivMain').removeClass('alert-warning').addClass('alert-success').show();
                         setTimeout(function() {
                       $("#responseDivMain").fadeOut();

                    }, 10000);
                        getTabtribes();
                    }
                }
       });
        $(document).on('click', '#clearMsg', function(){
            $('#responseDivMain').hide();
        });
    }
//------------------------------------END OF IMAGE UPLOAD---------------------------------------------//
$(document).ready(function(){
    $('.calc_local').change(function(){
        var total = 0;
        $('.calc_local').each(function(){
            if($(this).val() != '')
            {
                total += parseInt($(this).val());
            }
        });
        $('#total_local').html(total);
    });

       $('.calc_foreign').change(function(){
        var total = 0;
        $('.calc_foreign').each(function(){
            if($(this).val() != '')
            {
                total += parseInt($(this).val());
            }
        });
        $('#total_foreign').html(total);
    });

       $('.calc_male').change(function(){
        var total = 0;
        $('.calc_male').each(function(){
            if($(this).val() != '')
            {
                total += parseInt($(this).val());
            }
        });
        $('#total_male').html(total);
    });

       $('.calc_female').change(function(){
        var total = 0;
        $('.calc_female').each(function(){
            if($(this).val() != '')
            {
                total += parseInt($(this).val());
            }
        });
        $('#total_female').html(total);
    });

    $('.g_total').change(function(){
        var total = 0;
        $('.g_total').each(function(){
            if($(this).val() != '')
            {
                total += parseInt($(this).val());
            }
        });
        $('#gtotal').html(total);
    });

    $('.total_income').change(function(){
        var total = 0;

        $('.total_income').each(function(){
            if($(this).val() != '')
            {
              if(!isNaN(this.value) && this.value.length!=0) {
                total += parseFloat($(this).val());
            }
                // sub += (Math.floor((number1 / number2) * 100));
            }
        });
        $('#gtotal_income').html(addCommas(total.toFixed(2)));
    });

    $('.total_income').change(function(){
        var total = 0;

        $('.total_income').each(function(){
            if($(this).val() != '')
            {
              if(!isNaN(this.value) && this.value.length!=0) {
                total += (parseFloat($(this).val())*0.75);
            }
                // sub += (Math.floor((number1 / number2) * 100));
            }
        });
        $('#gtotal_sub').html(addCommas(total.toFixed(2)));
    });

    $('.total_income').change(function(){
        var total = 0;

        $('.total_income').each(function(){
            if($(this).val() != '')
            {
              if(!isNaN(this.value) && this.value.length!=0) {
                total += (parseFloat($(this).val())*0.25);
            }
                // sub += (Math.floor((number1 / number2) * 100));
            }
        });
        $('#gtotal_central').html(addCommas(total.toFixed(2)));
    });


})(jQuery);

function addCommas(nStr)
{
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
} 