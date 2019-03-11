<script>
// login form
    $('form#form_login').on('submit', function (e) {
        if($('#form_login #email').val() != '' && $('#form_login #password').val() != ''){
            e.preventDefault();
        var url = $('form#form_login').attr('action'); // api login route

        // get access token from login api
        var a1 = $.ajax({
            method: 'post',
            url: url,
            dataType: 'json',
            data: $("#form_login").serialize(), // Serialized Data,
            }),
            // success get access token to save it in cookie
        a2 = a1.then(function(data) {
                // .then() returns a new promise
                return $.ajax({
                    method: 'post',
                    url: '/admincp/login',
                    dataType: 'json',
                    data: {
                        'access_token' : data.response.access_token,
                        "_token": "{{ csrf_token() }}"
                    }
                });
        });

        a2.done(function(data) {
            // access token saved in cookie then go to admin panel successfully
            window.location.href = "/admincp/positions";
        });
        a2.fail(function(jqXHR, textStatus, errorThrown) {
            // If fail
            // console.log(textStatus + ': ' + errorThrown);
            $('#alert_login_error').remove();
            $('#form_login').prepend(
                `
                <div class="m-alert m-alert--outline alert alert-danger alert-dismissible animated fadeIn" id="alert_login_error" role="alert">			
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>			
                    <span>Incorrect username or password. Please try again.</span>		
                </div>
                `
            );
        });
        }

        
    });
</script>