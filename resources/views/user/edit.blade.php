
@extends('layout.main')
@section('content')
<div class="row">
    <div class="container">
        <h3>{{ $title }}</h3>
         <div class="card mt-4 shadow-sm">
             <div class="card-body">
                
                <form id="form-edit-user" action="{{ url('/edit_user') }}" method="post" class="mt-4">
                    @csrf
                    @method('patch')
                    <div class="form-group row">
                        <input type="hidden" name="id-user" value="{{ $record->id }}" class="form-control" id="id-user">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Full Name <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" placeholder="Full Name" id="full_name" name="full_name" class="form-control p-4 full_name" value="{{ $record->name }}" autocomplete="off">
                            <small class="text-danger full-name-invalid" ></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Email <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" name="email" id="email" value="{{ $record->email }}" placeholder="Email" class="form-control p-4 email" autocomplete="off">
                            <small class="text-danger email-invalid" ></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Username <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" placeholder="Username" value="{{ $record->username }}" id="username" name="username"  class="form-control p-4 username" autocomplete="off">
                            <small class="text-danger username-invalid" ></small>
                        </div>
                    </div>
                    <div class="form-group float-right">
                        <a href="/user"class="btn btn-default shadow-sm p-2" >Cancel</a>
                        <button class="btn btn-primary shadow-sm p-2" id="btnEditUser" type="submit"> Edit data</button>
                    </div>
                </form>
             </div>
         </div>
     </div>
 </div>
 <script src="{{ url('modjs/User.js') }}"></script>
 @endsection