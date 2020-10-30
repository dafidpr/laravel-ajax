
<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModal" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add {{ $title }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="container">

                <form id="form-register" action="{{ url('/create_user') }}" method="post" class="mt-4" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Full Name <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" placeholder="Full Name" name="full_name" class="form-control p-4 full_name" autocomplete="off">
                            <small class="text-danger full-name-invalid"></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Email <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" name="email" placeholder="Email" class="form-control p-4 email" autocomplete="off">
                            <small class="text-danger email-invalid"></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Username <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" placeholder="Username" name="username" class="form-control p-4 username" autocomplete="off">
                            <small class="text-danger username-invalid"></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Password <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="password" placeholder="Password" id="password" name="password" class="form-control p-4 password">
                                <div class="input-group-prepend">
                                    <div class="input-group-text show-password hover-show-password">
                                        <i class="fas fa-eye"></i>
                                    </div>
                                </div>
                            </div>
                            <small class="text-danger password-invalid"></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label"> Repeat Password <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="password" placeholder="Repeat Password" id="password2" name="password2" class="form-control p-4 password2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text show-password-confirm hover-show-password">
                                        <i class="fas fa-eye"></i>
                                    </div>
                                </div>
                            </div>
                            <small class="text-danger password-invalid2"></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Photo</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input photo p-4" name="photo" id="photo" aria-describedby="photo">
                                  <label class="custom-file-label" for="photo">Choose file</label>
                                </div>
                            </div>
                            <small class="text-danger photo-invalid"></small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default shadow-sm p-2" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary shadow-sm p-2" id="btnRegister" type="submit"> Save changes</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
      </div>
    </div>
  </div>