$(document).on('click', '.delete-alert', function (e) {
    e.preventDefault();
    var id = $(this).closest(".delete-alert").attr("data-id"),
        elem = $(this).parent('td').parent('tr'),
        d_url = $(this).attr('delete_url'),
        access_token = $(this).attr('access_token');
    swal({
        title: 'Are you sure?',
        text: 'You will not be able to recover this imaginary file!',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, keep it'
        }, function (isConfirm) {
            if (isConfirm) {
                $.ajax({
                    type: 'DELETE',
                    headers: {'Authorization': access_token},
                    url: d_url + id,
                    success: function (data) {
                        if (data.statusCode == 200) {
                            elem.fadeOut(1000);
                          showMessage('deleted successfully' , 'success');

                        }
                        if (data.statusCode == 404) {
                          showMessage('not found' , 'error');
                        }
                    },
                    error: function(data) {
                        
                      showMessage('not found' , 'error');
                    }
                });
            } else {
                Swal.fire(
                    'Cancelled',
                    'Your imaginary file is safe :)',
                    'error'
                  )
            }
        });      
});
