var url = '<?php echo base_url(); ?>';
$("#wcode").change(function(){
  var output = $('.error'); 
  var ccodes = $('#wclass');
  $.ajax({
  url  : BASE_URL+'/main_server/wildlife/getCat/',
    // url  : '<?= base_url('/main_server/wildlife/getCat/') ?>',
    type : 'POST',
    dataType : 'JSON',
    data : {
      '<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
      wcode : $(this).val()
    },
    success : function(data) 
    {
      if (data.status == true) {
        ccodes.html(data.message);
        output.html('');   
      } else if (data.status == false) {
        ccodes.html('');
        output.html(data.message).addClass('text-danger').removeClass('text-success');
      } else {
        ccodes.html(''); 
        output.html(data.message).addClass('text-danger').removeClass('text-success');
      }
    }, 
    error : function()
    {
      alert('failed');
    }
  });
});