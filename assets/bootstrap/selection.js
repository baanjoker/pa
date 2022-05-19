// var url = '<?php echo base_url(); ?>';

$("#div_id").change(function(){
	var output = $('.section_error');
	var section_list = $('#sec_id');

	$.ajax({
		url	: BASE_URL+'/registration/sections/',
		type : 'post',
		dataType : 'JSON',
		data : {
          '<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
          div_id : $(this).val()},
          success : function(data)
          {
          	if (data.status == true) {
          	section_list.html(data.message);
          	output.html('');
          	}else if(data.status == false){
          		section_list.html('');
          		output.html(data.message).addClass('text-danger').removeClass('text-success');
          	} else {
          		output.html(data.message).addClass('text-danger').removeClass('text-success');
          		section_list.html('');
          	}
      	   },
      	   error : function()
      	   {
            alert('failed');
           }
	});
});

