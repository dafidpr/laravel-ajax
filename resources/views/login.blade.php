@extends('layout.main')
@section('title', $title)
@section('content')
    <div class="row">
        <div class="container">
            <div class="col-md-5 ml-auto mr-auto mt-5">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h6 class="text-center">Login System</h6>
                        <hr>
                        <div id="alert"></div>
                        <form action="{{ url('/login') }}" method="post" id="login-form" class="mt-5">
                            @csrf
                            <div class="form-group">
                                <input type="text" placeholder="Username" id="username" name="username" class="form-control p-4 " autocomplete="off">
                                <small class="text-danger" id="username-invalid"></small>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="password" placeholder="Password" id="password" name="password" class="form-control p-4" autocomplete="off">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text show-password hover-show-password">
                                            <i class="fas fa-eye"></i>
                                        </div>
                                    </div>
                                </div>
                                <small class="text-danger" id="password-invalid"></small>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="autoSizingCheck">
                                <label class="form-check-label" for="autoSizingCheck">
                                  Remember me
                                </label>
                              </div>
                            <div class="form-group">
                                <button class="btn btn-primary shadow-sm btn-block p-2" id="btnLogin" type="submit">Sign in</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ url('modjs/Auth.js') }}"></script>
@endsection