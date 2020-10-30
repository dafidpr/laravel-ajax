// jQurey for Form Create Users
$('#form-register').submit(function(e){
    e.preventDefault();
    setLoadingButton('#btnRegister', 'add');
  
    $.ajax({
        url: $(this).attr("action"),
        type: "post",
        data: new FormData(this),
        dataType: "json",
        contentType: false,
        processData: false,
        success:function(data){
            if(data.status == 0){
                validationCheck(data);
                
            } else {
                 $('#addUserModal').modal('hide');
                  validationRemove();

                  Swal.fire({
                    title: 'Success',
                    text: "New user successfuly added!",
                    icon: 'success',
                    confirmButtonText: 'Ok',
                    showConfirmButton: true
                  }).then((result) => {
                      loadData();
                  })
            }
            setLoadingButton('#btnRegister', 'remove', 'Save changes');
        }

    });

});

// Delete Users
function deleteUser(e){
  const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: 'btn btn-success ml-2',
        cancelButton: 'btn btn-danger'
      },
      buttonsStyling: false
    })
    
    swalWithBootstrapButtons.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes, delete it!',
      cancelButtonText: 'No, cancel!',
      reverseButtons: true,
      showConfirmButton: true
    }).then((result) => {
      if (result.value == true) {
          $.ajax({
              headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              method: "delete",
              url: "/destroy_user/" + e,
              dataType: "json",
              success: function (response) {
                Swal.fire({
                  title: 'Success',
                  text: "New user successfuly addes!",
                  icon: 'success',
                  confirmButtonText: 'Ok',
                  showConfirmButton: true
                }).then((result) => {
                    loadData();
                })
              }
          });
        
      } else if (
        /* Read more about handling dismissals below */
        result.dismiss === Swal.DismissReason.cancel
      ) {
        swalWithBootstrapButtons.fire(
          'Cancelled',
          'Your imaginary file is safe :)',
          'error'
        )
      }
    })
}

// Detail Users
function detailUser(e){

    $.ajax({
      headers:{
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type: "post",
      url: "/detail_user/" + e,
      dataType: "json",
      success: function (response) {
        $('#id-user').val(response.id);
        $('#full_name').val(response.name);
        $('#username').val(response.username);
        $('#email').val(response.email);
        $('#editUserModal').modal('show');
        document.title = "Detail User";
        window.history.pushState(null,'','edit_user');
      }
    });
}


// Update User
$('#form-edit-user').submit(function(e){
    e.preventDefault();
    let id = $('#id-user').val();
    setLoadingButton('#btnEditUser', 'add');
    $.ajax({
        type: $(this).attr('method'),
        url: '/edit_user/' + id,
        data: new FormData(this),
        dataType: "json",
        contentType: false,
        processData: false,
        success: function (response) {
            if(response.status == 0){

               validationCheck(response);
              } else {
                $('#editUserModal').modal('hide');
                validationRemove();

                Swal.fire({
                  title: 'Success',
                  text: "User has ben updated!",
                  icon: 'success',
                  confirmButtonText: 'Ok',
                  showConfirmButton: true
                }).then((result) => {
                    window.location.href = '/user';
                    loadData();
                })
              }
              setLoadingButton('#btnEditUser', 'remove', 'Edit data')
          }
     });
});


// Check Validation
function validationCheck(data){
  if(data.name != ''){

    $('.full-name-invalid').text(data.name);
    $('.full_name').addClass('is-invalid');
    
    } else {
        $('.full_name').removeClass('is-invalid');
    }
    if(data.email != ''){
        $('.email-invalid').text(data.email);
        $('.email').addClass('is-invalid');
    } else {
        $('.email').removeClass('is-invalid');
    }
    if(data.username != ''){
        $('.username-invalid').text(data.username);
        $('.username').addClass('is-invalid');
    } else {
        $('.username').removeClass('is-invalid');

    }
    if (data.password != ''){
        
        $('.password-invalid').text(data.password);
        $('.password').addClass('is-invalid');
    } else {
        $('.password').removeClass('is-invalid');

    }
    if(data.password2 != ''){
        $('.password-invalid2').text(data.password2);
        $('.password2').addClass('is-invalid');
    } else {
        $('.password2').removeClass('is-invalid');

    }
    if(data.photo != ''){
        $('.photo-invalid').text(data.photo);
        $('.photo').addClass('is-invalid');
    } else {
        $('.photo').removeClass('is-invalid');
    }

}


// Remove validation if success
function validationRemove(){

  $('.full_name').removeClass('is-invalid');
  $('.email').removeClass('is-invalid');
  $('.username').removeClass('is-invalid');
  $('.password').removeClass('is-invalid');
  $('.password2').removeClass('is-invalid');
  $('.photo').removeClass('is-invalid');

  $('.full-name-invalid').html('');
  $('.email-invalid').html('');
  $('.username-invalid').html('');
  $('.password-invalid').html('');
  $('.password-invalid2').html('');
  $('.photo-invalid2').html('');
}


// LoadData
function loadData(){
      $.ajax({
        type: "get",
        url: "/loadData",
        success: function (response) {
              $('#user-data').html(response);
          }
    });
}
loadData();
