
// $.ajax({
//     type: 'GET',
//     url: 'http://localhost:9000/api/position',
//     dataType: "JSON",
//     // headers: {"Authorization": localStorage.getItem('access_token')},
//     headers: {"Authorization": 'bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6OTAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU1MTgwNDMyMywiZXhwIjoxNTUxODkwNzIzLCJuYmYiOjE1NTE4MDQzMjMsImp0aSI6IllFcjYyQkZhbUxVRkdWZGEiLCJzdWIiOjEsInBydiI6Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEiLCJpZCI6MSwibmFtZSI6bnVsbCwiZW1haWwiOiJhZG1pbkBzaGFyaW5nZ3JvdXAuY28iLCJyb2xlcyI6WyJhZG1pbiJdLCJwZXJtaXNzaW9ucyI6W3siaWQiOjEsIm5hbWUiOiJ1c2VyX3VzZXJfY3JlYXRlIiwiZ3VhcmRfbmFtZSI6ImFwaSJ9LHsiaWQiOjIsIm5hbWUiOiJ1c2VyX3VzZXJfZWRpdCIsImd1YXJkX25hbWUiOiJhcGkifSx7ImlkIjozLCJuYW1lIjoidXNlcl91c2VyX2RlbGV0ZSIsImd1YXJkX25hbWUiOiJhcGkifSx7ImlkIjo0LCJuYW1lIjoidXNlcl9yb2xlX2NyZWF0ZSIsImd1YXJkX25hbWUiOiJhcGkifSx7ImlkIjo1LCJuYW1lIjoidXNlcl9yb2xlX2VkaXQiLCJndWFyZF9uYW1lIjoiYXBpIn0seyJpZCI6NiwibmFtZSI6InVzZXJfcm9sZV9kZWxldGUiLCJndWFyZF9uYW1lIjoiYXBpIn1dLCJicmFuY2hlcyI6W119.K11TxJaRk8SxXSKDgs2_5IM-cUtcZecAa7nXmOqKrEM'},
//     success: function (result) {
//         console.log(result);
//         //declare variables
//         var obj, str = '', data = result.response.data;
//         // for loop data to desplay
//         for (var i = 0; i < data.length; i++) {
//             obj = data[i];
//             str += `
//                 <tr>
//                     <td>${(i + 1)}</td>
//                     <td>${obj.ar != null ? obj.ar.name : ''}</td>
//                     <td>${obj.en != null ? obj.en.name : ''}</td>
//                     <td>${obj.is_active == 1 ? '<span class="badge badge-success">فعال</span>' : '<span class="badge badge-danger" >غير فعال </span>'}</td>
//                     <td>
//                     <a href="" class="btn btn-brand m-btn update-alert" data-id=${obj.id} update_url="http://localhost:9000/api/position/"><i class="fa fa-edit"></i></a>
//                     <a href="" class="btn btn-danger m-btn delete-alert" data-id=${obj.id} delete_url="http://localhost:9000/api/position/"><i class="fa fa-trash"></i></a>
//                     </td>
//                 </tr>
//             `;
//         }
//         // append data into tbody of table
//         document.getElementById('positions').innerHTML += str;

//     },
//     error: function (XMLHttpRequest, textStatus, errorThrown) {
//         console.log("Request: " + XMLHttpRequest.toString() + "\n\nStatus: " + textStatus + "\n\nError: " + errorThrown);
//     }
// });

$(document).on('click', '.delete-alert', function (e) {
    e.preventDefault();
    var id = $(this).closest(".delete-alert").attr("data-id"),
        elem = $(this).parent('td').parent('tr'),
        d_url = $(this).attr('delete_url');
    
        Swal({
            title: 'Are you sure?',
            text: 'You will not be able to recover this imaginary file!',
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, keep it'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: d_url + id,
                    type: "delete",
                    headers: {
                        "Authorization": 'bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6OTAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU1MTg1OTUwNywiZXhwIjoxNTUxOTQ1OTA3LCJuYmYiOjE1NTE4NTk1MDcsImp0aSI6Ik1QSWJQWXk1eU9rSlNUS0IiLCJzdWIiOjEsInBydiI6Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEiLCJpZCI6MSwibmFtZSI6bnVsbCwiZW1haWwiOiJhZG1pbkBzaGFyaW5nZ3JvdXAuY28iLCJyb2xlcyI6WyJhZG1pbiJdLCJwZXJtaXNzaW9ucyI6W3siaWQiOjEsIm5hbWUiOiJ1c2VyX3VzZXJfY3JlYXRlIiwiZ3VhcmRfbmFtZSI6ImFwaSJ9LHsiaWQiOjIsIm5hbWUiOiJ1c2VyX3VzZXJfZWRpdCIsImd1YXJkX25hbWUiOiJhcGkifSx7ImlkIjozLCJuYW1lIjoidXNlcl91c2VyX2RlbGV0ZSIsImd1YXJkX25hbWUiOiJhcGkifSx7ImlkIjo0LCJuYW1lIjoidXNlcl9yb2xlX2NyZWF0ZSIsImd1YXJkX25hbWUiOiJhcGkifSx7ImlkIjo1LCJuYW1lIjoidXNlcl9yb2xlX2VkaXQiLCJndWFyZF9uYW1lIjoiYXBpIn0seyJpZCI6NiwibmFtZSI6InVzZXJfcm9sZV9kZWxldGUiLCJndWFyZF9uYW1lIjoiYXBpIn1dLCJicmFuY2hlcyI6W119.cY_5wjlYHPqlTj0lnBvfCAKAPJVTiqGM-2l65wh6AXE',
                    },
                    data: "",
                    success: function (result) {
                        Swal.fire(
                            'Deleted!',
                            'Your imaginary file has been deleted.',
                            'success'
                          )
                        elem.hide(1000);
                    },error: function () {
                        swal("عفوا!", "عذرا لا تمتلك صلاحية الحذف ", "warning");
                    }
                });
            // For more information about handling dismissals please visit
            // https://sweetalert2.github.io/#handling-dismissals
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire(
                    'Cancelled',
                    'Your imaginary file is safe :)',
                    'error'
                  )
            }
        });
      
});

$(document).on('click', '.update-alert', function (e) {
    e.preventDefault();
    var id = $(this).closest(".update-alert").attr("data-id"),
        elem = $(this).parent('td').parent('tr'),
        u_url = $(this).attr('update_url');
        // fill data to update
        $('#PositionUpdateModal #ar').val(elem.find("td:eq(1)").text());
        $('#PositionUpdateModal #en').val(elem.find("td:eq(2)").text());
        $('#PositionUpdateModal').modal('show');

    // validation of position_update_form
    $('#position_update_form').validate({
        debug: true,
        rules: {
            ar: {
                required: true,
            },
            en:{
                required: true
            }
        },
        messages: {
            ar: {
                required: "من فضلك هذا الحقل مطلوب",
            },
            en: {
                required: "من فضلك هذا الحقل مطلوب",

            }
        },
        submitHandler: function (form) {
            var url = form.getAttribute('action');
            $.ajax({
                type: 'put',           // put Request
                url: url + id,
                headers: {
                    "Authorization": 'bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6OTAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU1MTg1OTUwNywiZXhwIjoxNTUxOTQ1OTA3LCJuYmYiOjE1NTE4NTk1MDcsImp0aSI6Ik1QSWJQWXk1eU9rSlNUS0IiLCJzdWIiOjEsInBydiI6Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEiLCJpZCI6MSwibmFtZSI6bnVsbCwiZW1haWwiOiJhZG1pbkBzaGFyaW5nZ3JvdXAuY28iLCJyb2xlcyI6WyJhZG1pbiJdLCJwZXJtaXNzaW9ucyI6W3siaWQiOjEsIm5hbWUiOiJ1c2VyX3VzZXJfY3JlYXRlIiwiZ3VhcmRfbmFtZSI6ImFwaSJ9LHsiaWQiOjIsIm5hbWUiOiJ1c2VyX3VzZXJfZWRpdCIsImd1YXJkX25hbWUiOiJhcGkifSx7ImlkIjozLCJuYW1lIjoidXNlcl91c2VyX2RlbGV0ZSIsImd1YXJkX25hbWUiOiJhcGkifSx7ImlkIjo0LCJuYW1lIjoidXNlcl9yb2xlX2NyZWF0ZSIsImd1YXJkX25hbWUiOiJhcGkifSx7ImlkIjo1LCJuYW1lIjoidXNlcl9yb2xlX2VkaXQiLCJndWFyZF9uYW1lIjoiYXBpIn0seyJpZCI6NiwibmFtZSI6InVzZXJfcm9sZV9kZWxldGUiLCJndWFyZF9uYW1lIjoiYXBpIn1dLCJicmFuY2hlcyI6W119.cY_5wjlYHPqlTj0lnBvfCAKAPJVTiqGM-2l65wh6AXE',
                },
                data:
                    $("#position_update_form").serialize(), // Serialized Data
                dataType: 'json',
                success: function (obj) {                    
                    // hide modal
                    setTimeout(function(){
                        $('#position_update_form #ar').val('');
                        $('#position_update_form #en').val('');
                        $('#PositionUpdateModal').modal('hide');
                    }, 500);
                    // update record in table
                    elem.find("td:eq(1)").text(obj.response.ar.name);
                    elem.find("td:eq(2)").text(obj.response.en.name);
                },
                error: function (data) {
                    // Error while calling the controller (HTTP Response Code different as 200 OK
                          // validation unique name
                if(data.responseJSON.response.errors && data.responseJSON.response.errors.ar)
                $('#position_update_form #ar').after('<label id="ar-error1" class="error" for="ar" style="color: #d63c3c;">الاسم موجود بالفعل</label>');
                if(data.responseJSON.response.errors && data.responseJSON.response.errors.en)
                $('#position_update_form #en').after('<label id="en-error1" class="error" for="en" style="color: #d63c3c;">الاسم موجود بالفعل</label>');
       
                }
            });



        }
    });
});

$(document).on('click', '.activate-alert', function (e) {
    e.preventDefault();
    var id = $(this).closest(".activate-alert").attr("data-id"),
        clicked = $(this),
        a_url = $(this).attr('activate_url'); 

            $.ajax({
                type: 'get',       // put Request
                url: a_url + id + '/activate',
                headers: {
                    "Authorization": 'bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6OTAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU1MTg1OTUwNywiZXhwIjoxNTUxOTQ1OTA3LCJuYmYiOjE1NTE4NTk1MDcsImp0aSI6Ik1QSWJQWXk1eU9rSlNUS0IiLCJzdWIiOjEsInBydiI6Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEiLCJpZCI6MSwibmFtZSI6bnVsbCwiZW1haWwiOiJhZG1pbkBzaGFyaW5nZ3JvdXAuY28iLCJyb2xlcyI6WyJhZG1pbiJdLCJwZXJtaXNzaW9ucyI6W3siaWQiOjEsIm5hbWUiOiJ1c2VyX3VzZXJfY3JlYXRlIiwiZ3VhcmRfbmFtZSI6ImFwaSJ9LHsiaWQiOjIsIm5hbWUiOiJ1c2VyX3VzZXJfZWRpdCIsImd1YXJkX25hbWUiOiJhcGkifSx7ImlkIjozLCJuYW1lIjoidXNlcl91c2VyX2RlbGV0ZSIsImd1YXJkX25hbWUiOiJhcGkifSx7ImlkIjo0LCJuYW1lIjoidXNlcl9yb2xlX2NyZWF0ZSIsImd1YXJkX25hbWUiOiJhcGkifSx7ImlkIjo1LCJuYW1lIjoidXNlcl9yb2xlX2VkaXQiLCJndWFyZF9uYW1lIjoiYXBpIn0seyJpZCI6NiwibmFtZSI6InVzZXJfcm9sZV9kZWxldGUiLCJndWFyZF9uYW1lIjoiYXBpIn1dLCJicmFuY2hlcyI6W119.cY_5wjlYHPqlTj0lnBvfCAKAPJVTiqGM-2l65wh6AXE',
                },
                data:'',
                dataType: 'json',
                success: function (obj) {
                    console.log(obj);
                    if(obj.response.is_active == 1){
                        Swal.fire(
                            'activated!',
                            'position activate successfully',
                            'success'
                          )
                          clicked.parent().prev().children(0).removeClass('badge-warning').addClass('badge-success').text(' فعال');
                          clicked.removeClass('btn-success').addClass('btn-warning').children(0).removeClass().addClass('fa fa-times-circle');

                    } else{
                        Swal.fire(
                            'De-activated!',
                            'position deactivate successfully',
                            'success'
                          )
                          clicked.parent().prev().children(0).removeClass('badge-success').addClass('badge-warning').text('غير فعال');
                          clicked.removeClass('btn-warning').addClass('btn-success').children(0).removeClass().addClass('fa fa-check-circle');
                    }
                    // update record in table
                    
                },
                error: function (data) {
                    // Error while calling the controller (HTTP Response Code different as 200 OK
                    console.log('Error:');
                }
            });


});

// validation of position_form
$('#position_form').validate({
    debug: true,
    rules: {
        ar: {
            required: true,
        },
        en:{
            required: true
        }
    },
    messages: {
        ar: {
            required: "من فضلك هذا الحقل مطلوب",
        },
        en: {
            required: "من فضلك هذا الحقل مطلوب",

        }
    },
    submitHandler: function (form) {
        var url = form.getAttribute('action');
        $.ajax({
            type: 'post',           // POST Request
            url: url,
            headers: {
                "Authorization": 'bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6OTAwMFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU1MTg1OTUwNywiZXhwIjoxNTUxOTQ1OTA3LCJuYmYiOjE1NTE4NTk1MDcsImp0aSI6Ik1QSWJQWXk1eU9rSlNUS0IiLCJzdWIiOjEsInBydiI6Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEiLCJpZCI6MSwibmFtZSI6bnVsbCwiZW1haWwiOiJhZG1pbkBzaGFyaW5nZ3JvdXAuY28iLCJyb2xlcyI6WyJhZG1pbiJdLCJwZXJtaXNzaW9ucyI6W3siaWQiOjEsIm5hbWUiOiJ1c2VyX3VzZXJfY3JlYXRlIiwiZ3VhcmRfbmFtZSI6ImFwaSJ9LHsiaWQiOjIsIm5hbWUiOiJ1c2VyX3VzZXJfZWRpdCIsImd1YXJkX25hbWUiOiJhcGkifSx7ImlkIjozLCJuYW1lIjoidXNlcl91c2VyX2RlbGV0ZSIsImd1YXJkX25hbWUiOiJhcGkifSx7ImlkIjo0LCJuYW1lIjoidXNlcl9yb2xlX2NyZWF0ZSIsImd1YXJkX25hbWUiOiJhcGkifSx7ImlkIjo1LCJuYW1lIjoidXNlcl9yb2xlX2VkaXQiLCJndWFyZF9uYW1lIjoiYXBpIn0seyJpZCI6NiwibmFtZSI6InVzZXJfcm9sZV9kZWxldGUiLCJndWFyZF9uYW1lIjoiYXBpIn1dLCJicmFuY2hlcyI6W119.cY_5wjlYHPqlTj0lnBvfCAKAPJVTiqGM-2l65wh6AXE',
            },
            data:
                $("#position_form").serialize(), // Serialized Data
            dataType: 'json',
            success: function (obj) {
                // hide modal
                setTimeout(function(){
                    $('#position_form #ar').val('');
                    $('#position_form #en').val('');
                    $('#PositionModal').modal('hide');
                }, 500);

                // add new record in table
                var str = `
                    <tr>
                        <td>${Number($('table tr:last-child td:first-child').html()) + 1}</td>
                        <td>${obj.response.ar != null ? obj.response.ar.name : ''}</td>
                        <td>${obj.response.ar != null ? obj.response.en.name : ''}</td>
                        <td>${obj.response.is_active == 1 ? '<span class="badge badge-success">فعال</span>' : '<span class="badge badge-danger" >غير فعال </span>'}</td>
                        <td>
                        <a href="" class="btn btn-brand m-btn update-alert" data-id=${obj.response.id} update_url="http://localhost:9000/api/position/"><i class="fa fa-edit"></i></a>
                        <a href="" class="btn btn-danger m-btn delete-alert" data-id=${obj.response.id} delete_url="http://localhost:9000/api/position/"><i class="fa fa-trash"></i></a>
                        <a href="" class="btn ${obj.response.is_active == 1 ? 'btn-warning' : 'btn-success' } m-btn activate-alert" data-id="${obj.response.id}" activate_url="http://localhost:9000/api/position/"><i class="fa ${obj.response.is_active == 1 ? 'fa-times-circle' : 'fa-check-circle' }"></i></a>
                        </td>
                    </tr>
                `;

                // append data into tbody of table
                document.getElementById('positions').innerHTML += str;
            },
            error: function (data) {
                // Error while calling the controller (HTTP Response Code different as 200 OK
                // validation unique name
                if(data.responseJSON.response.errors && data.responseJSON.response.errors.ar)
                    $('#position_form #ar').after('<label id="ar-error1" class="error" for="ar" style="color: #d63c3c;">الاسم موجود بالفعل</label>');
                if(data.responseJSON.response.errors && data.responseJSON.response.errors.en)
                $('#position_form #en').after('<label id="en-error1" class="error" for="en" style="color: #d63c3c;">الاسم موجود بالفعل</label>');
            }
        });



    }
});