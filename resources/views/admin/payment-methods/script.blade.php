<script>

$(document).on('click', '.activate-alert', function (e) {
    e.preventDefault();
    var id = $(this).closest(".activate-alert").attr("data-id"),
        clicked = $(this),
        a_url = $(this).attr('activate_url'); 

        $.ajax({
            type: 'get',       // get Request
            url: a_url + id + '/activate',
            headers: {'Authorization': '{{$access_token}}'},
            data:'',
            dataType: 'json',
            success: function (obj) {
                if(obj.response.is_active == 1){
                        showMessage('payment method activated successfully' , 'success');
                        clicked.parent().prev().children(0).removeClass('badge-warning').addClass('badge-success').text(' فعال');
                        clicked.removeClass('btn-success').addClass('btn-warning').children(0).removeClass().addClass('fa fa-times-circle');

                } else{
                        showMessage('payment method de-activated successfully' , 'success');
                        clicked.parent().prev().children(0).removeClass('badge-success').addClass('badge-warning').text('غير فعال');
                        clicked.removeClass('btn-warning').addClass('btn-success').children(0).removeClass().addClass('fa fa-check-circle');
                }
                // update record in table
                
            },
            error: function (data) {
                // Error while calling the controller (HTTP Response Code different as 200 OK
                showMessage('fail' , 'error');                }
        });

});


    $(document).on('click', '.update-alert', function (e) {
        e.preventDefault();
        var id = $(this).closest(".update-alert").attr("data-id"),
            elem = $(this).parent('td').parent('tr'),
            u_url = $(this).attr('update_url');
            // fill data to update
            $('#PaymentMethodUpdateModal #ar').val(elem.find("td:eq(1)").text());
            $('#PaymentMethodUpdateModal #en').val(elem.find("td:eq(2)").text());

            $('#PaymentMethodUpdateModal #icon').attr('data-default-file', elem.find("td:eq(3)").children(0).attr('src'));
            $('#PaymentMethodUpdateModal').modal('show');
            $('form#paymentmethod_update_form').on('submit', function (e) {
                e.preventDefault();
                var url = $('form#paymentmethod_update_form').attr('action');
                $.ajax({
                    type: 'put',           // put Request
                    url: url + id,
                    headers: {'Authorization': '{{$access_token}}'},
                    data:
                        $("#paymentmethod_update_form").serialize(), // Serialized Data
                    dataType: 'json',
                    success: function (obj) {                    
                        // hide modal
                        setTimeout(function(){
                            $('#paymentmethod_update_form #ar').val('');
                            $('#paymentmethod_update_form #en').val('');
                            $('#PaymentMethodUpdateModal').modal('hide');
                        }, 500);
                        showMessage('payment method updated successfully' , 'success');
                        // update record in table
                        elem.find("td:eq(1)").text(obj.response.ar.name);
                        elem.find("td:eq(2)").text(obj.response.en.name);
                    },
                    error: function (data) {
                    // Error while calling the controller (HTTP Response Code different as 200 OK
                        // validation unique name
                        if(data.responseJSON.statusCode == 422){
                            if(data.responseJSON.response.errors.ar && data.responseJSON.response.errors.en)
                                showMessage('english and arabic name already exist', 'warning');
                            else if(data.responseJSON.response.errors.en)
                                showMessage('english name already exist', 'warning');
                            else if(data.responseJSON.response.errors.ar)
                                showMessage('arabic name already exist', 'warning');
                
                        }else {
                            showMessage('fail' , 'error');
                        }
                    }
                });

        });
    });

    // create new position
    $('form#paymentmethod_store_form').on('submit', function (e) {
            e.preventDefault();
            var url = $('form#paymentmethod_store_form').attr('action');
            var formData = new FormData(this);
              console.log(formData.values());
              for (var value of formData.values()) {
                  console.log(value); 
              }
            $.ajax({
                type: 'post',           // POST Request
                url: url,
                headers: {'Authorization': '{{$access_token}}'},
                data: formData,
                    // $("#paymentmethod_store_form").serialize(), // Serialized Data
                dataType: 'json',
                success: function (obj) {
                    // hide modal
                    setTimeout(function(){
                        $('#paymentmethod_store_form #ar').val('');
                        $('#paymentmethod_store_form #en').val('');
                        $('#PaymentMethodModal').modal('hide');
                    }, 500);
                    showMessage('payment method added successfully' , 'success');

                    // add new record in table
                    var str = `
                        <tr>
                            <td>${Number($('table tr:last-child td:first-child').html()) + 1}</td>
                            <td>${obj.response.ar != null ? obj.response.ar.name : ''}</td>
                            <td>${obj.response.ar != null ? obj.response.en.name : ''}</td>
                            <td>
                                <img class="img-responsive" src="{{substr(app('shared')->get('base_url'), 0, -4)}}${obj.response.icon}" width="50" height="50">
                            </td>
                            <td>${obj.response.is_active == 1 ? '<span class="badge badge-success">فعال</span>' : '<span class="badge badge-danger" >غير فعال </span>'}</td>
                            <td>
                            <a href="" class="btn ${obj.response.is_active == 1 ? 'btn-warning' : 'btn-success' } m-btn activate-alert" data-id="${obj.response.id}" activate_url="{{app('shared')->get('base_url')}}/managment/paymentmethod/"><i class="fa ${obj.response.is_active == 1 ? 'fa-times-circle' : 'fa-check-circle' }"></i></a>
                            <a href="" class="btn btn-brand m-btn update-alert" data-id=${obj.response.id} update_url="{{app('shared')->get('base_url')}}/managment/paymentmethod/"><i class="fa fa-edit"></i></a>
                            <a href="" class="btn btn-danger m-btn delete-alert" data-id=${obj.response.id} delete_url="{{app('shared')->get('base_url')}}/managment/paymentmethod/"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    `;

                    // append data into tbody of table
                    document.getElementById('positions').innerHTML += str;
                },
                error: function (data) {
                    // Error while calling the controller (HTTP Response Code different as 200 OK
                    // validation unique name
                    if(data.responseJSON.statusCode == 422){
                        if(data.responseJSON.response.errors.ar && data.responseJSON.response.errors.en)
                            showMessage('english and arabic name already exist', 'warning');
                        else if(data.responseJSON.response.errors.en)
                            showMessage('english name already exist', 'warning');
                        else if(data.responseJSON.response.errors.ar)
                            showMessage('arabic name already exist', 'warning');
            
                    }else {
                        showMessage('fail' , 'error');
                    }
                }
            });

    });

</script>