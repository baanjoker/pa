	$("#catid").change(function(){
        var output = $('.error');
        var output2 = $('.error2');
        var classId = $('#classid');
        var orderId = $('#orderid');

        $.ajax({
    	    url  :  BASE_URL+'index.php/main_server/wildlife/getClass/',
            type : 'post',
            dataType : 'JSON',
            data : {
            	'<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
            	catid : $(this).val()},
            success : function(data)
            {
            if (data.status == true) {
                classId.html(data.message);
                output.html('');
                output2.html('');
                orderId.html('');
            } else if (data.status == false) {
                classId.html('');
                output.html(data.message).addClass('text-danger').removeClass('text-success');
                orderId.html('');
                output2.html('');
            } else {
                classId.html('');
                output.html(data.message).addClass('text-danger').removeClass('text-success');
                orderId.html('');
                output2.html('');
            }
            },
        error : function()
        {
        alert('failed');
        }
        });
    });

    $("#classid").change(function(){
        var output = $('.error2');
        var classId = $('#classid');
        var orderId = $('#orderid');

        $.ajax({
    	    url  :  BASE_URL+'index.php/main_server/wildlife/getOrder/',
            type : 'post',
            dataType : 'JSON',
            data : {
            	'<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
            	classid : $(this).val()},
            success : function(data)
            {
            if (data.status == true) {
                orderId.html(data.message);
                output.html('');
            } else if (data.status == false) {
                orderId.html('');
                output.html(data.message).addClass('text-danger').removeClass('text-success');
            } else {
                orderId.html('');
                output.html(data.message).addClass('text-danger').removeClass('text-success');
            }
            },
        error : function()
        {
        alert('failed');
        }
        });
    });