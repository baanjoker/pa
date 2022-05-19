$(document).ready(function() {
  fetch_pa();
    $(document).on('click', '.btn-deletepamain', function(){
    var id = $(this).data('id');
    swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!',
        },
            function() {
            $.ajax({
              
              data : 'id='+id,
              url: BASE_URL+'/users/protectedarea/pamain/delete/'+id,
              type:'post',
              crossOrigin: false,
              dataType: 'JSON',
              success : function(result){
                // console.log(data.check)
                if (result.status == "success") {
                  swal('Deleted!', result.message, result.status);
                  $('#TablePaMain').DataTable().ajax.reload();
                }else{
                  swal('Oops...', 'Something went wrong with ajax !', 'error');
                }
              }
            });
            }
        );    
  });
});

// $(document).ready(function() {
// 	fetch_pa();

//      $(document).on('click', '.btn-deletepamain', function(){
//         var id = $(this).data('id');
        
//         swal({
//             title: 'Are you sure?',
//             text: "You won't be able to revert this!",
//             type: 'warning',
//             showCancelButton: true,
//             confirmButtonColor: '#3085d6',
//             cancelButtonColor: '#d33',
//             confirmButtonText: 'Yes, delete it!',
//         }).then((result) => {
//             if (result.value){
//                 $.ajax({
//                     url: BASE_URL+'/users/protectedarea/pamain/delete/'+id,
//                     type: 'POST',
//                     data: 'id='+id,
//                     dataType: 'json'
//                 })
//                 .done(function(response){
//                     swal('Deleted!', response.message, response.status);
//                       fetch_pa();
//                       $('#TablePaMain').DataTable().ajax.reload();

//                 })
//                 .fail(function(){
//                     swal('Oops...', 'Something went wrong with ajax !', 'error');
//                 });
//             }
//         })
//     });
// });

function fetch_pa(){
    var url = '<?php echo base_url(); ?>';
    var coderegion = $('#regionId').val();
        $.ajax({
            type: 'POST',
            data : {coderegions:coderegion},
            url: BASE_URL + 'index.php/users/protectedarea/pamain/fetchpamain',
            success:function(response){
                $('#tbodymain').html(response);
            }
    });
}

function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("TablePaMain");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}