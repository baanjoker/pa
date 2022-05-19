function profile_cenro()
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
            url : BASE_URL + 'cenro/dashboard/update',
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


$(document).on('click', '#UpdatePass_cenro', function(){
  $.ajax({
        url : BASE_URL+'cenro/dashboard/update_password',
        type: "POST",
        data: $('#formChangePassCENRO').serialize(),
        dataType: "JSON",
        success:function(response){
                    $('#messagePass').html(response.messagePass);
                    if(response.error){
                        $('#divPass').removeClass('alert-success').addClass('alert-warning').show();
                         setTimeout(function() {
                       $("#divPass").fadeOut();

                    }, 2000);
                    }
                    else{
                        $('#divPass').removeClass('alert-warning').addClass('alert-success').show();
                        $('#formChangePassCENRO')[0].reset();
                         setTimeout(function() {
                       $("#divPass").fadeOut();
                       location.reload();
                    }, 5000);
                        // getTables();

                    }
                }
       });
        $(document).on('click', '#clearMsg', function(){
            $('#divPass').hide();
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