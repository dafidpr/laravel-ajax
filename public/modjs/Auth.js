// jQuery for Form Login
$('#login-form').submit(function (e) {
    e.preventDefault();
    setLoadingButton('#btnLogin', 'add');
    $.ajax({
        url: $(this).attr("action"),
        type: "post",
        data: new FormData(this),
        dataType: "json",
        contentType: false,
        processData: false,
        success: function (data) {
            if (data.status == 0) {
                validationCheck(data);

            } else if (data.status == 1) {
                window.location.href = "/dashboard";
            } else {
                $('#alert').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Error!</strong> ' + data.data + '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                validationRemove();
            }
            setLoadingButton('#btnLogin', 'remove', 'Sign in');
        }
    })
});

// jQuery for Show Password
$('.show-password').click(function () {
    if ($('#password').attr('type') == "password") {
        $('.show-password').html('<i class="fas fa-eye-slash"></i>');
        $('#password').attr('type', 'text');
    } else if ($('#password').attr('type') == "text") {
        $('.show-password').html('<i class="fas fa-eye"></i>');
        $('#password').attr('type', 'password');

    }
});
$('.show-password-confirm').click(function () {
    if ($('#password2').attr('type') == "password") {
        $('.show-password-confirm').html('<i class="fas fa-eye-slash"></i>');
        $('#password2').attr('type', 'text');
    } else if ($('#password2').attr('type') == "text") {
        $('.show-password-confirm').html('<i class="fas fa-eye"></i>');
        $('#password2').attr('type', 'password');

    }
});


// Check Validation
function validationCheck(data){
    if (data.username != '') {

        $('#username-invalid').text(data.username);
        $('#username').addClass('is-invalid');

    } else {
        $('#username').removeClass('is-invalid');
    }
    if (data.password != '') {

        $('#password-invalid').text(data.password);
        $('#password').addClass('is-invalid');
    } else {
        $('#password').removeClass('is-invalid');

    }
  }

  function validationRemove(){

    $('#password').removeClass('is-invalid');
    $('#username').removeClass('is-invalid');
  
    $('#password-invalid').text('');
    $('#username-invalid').text('');
  }