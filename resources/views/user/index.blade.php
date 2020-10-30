@extends('layout.main')
@section('content')
    <h3>{{ $title }}</h3>
    <div class="row">
        <div class="container">
            <div class="card mt-4 shadow-sm">
                <div class="card-body">
                    <button type="button" data-toggle="modal" data-target="#addUserModal" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Add User</button>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th width="7">No</th>
                                    <th>Photo</th>
                                    <th>Full Name</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Last Login</th>
                                    <th width="120">Action</th>
                                </tr>
                            </thead>
                            <tbody id="user-data"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('user.create')
    <script src="{{ url('modjs/Auth.js') }}"></script>
    <script src="{{ url('modjs/User.js') }}"></script>
@endsection