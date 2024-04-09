@extends('layouts.auth')
@section('title', 'Login')

@section('content')
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand">
                            <img src="{{ asset('/assets/img/brand/ess-logo.jpeg') }}" alt="logo" width="150"
                                class="shadow-light rounded-circle">
                        </div>

                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>{{ config('app.name') }}</h4>
                            </div>

                            <div class="card-body">
                                <form role="form" action="{{ route('login.store') }}" class="needs-validation"
                                    method="POST">
                                    @csrf

                                    <div class="form-group mb-3">
                                        <div class="input-group input-group-merge input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                            <input class="form-control" name="username" placeholder="Username"
                                                type="text" value="{{ old('username') }}">
                                        </div>
                                        @error('username')
                                            <div class="invalid-feedback d-block">*{{ $message }} <i
                                                    class="fas fa-arrow-up"></i></div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group input-group-merge input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                            </div>
                                            <input class="form-control" name="password" placeholder="Password"
                                                type="password" value="{{ old('password') }}" id="password">
                                        </div>
                                        @error('password')
                                            <div class="invalid-feedback d-block">*{{ $message }} <i
                                                    class="fas fa-arrow-up"></i></div>
                                        @enderror
                                    </div>

                                    <div class="custom-control custom-control-alternative custom-checkbox">
                                        <input class="custom-control-input" name="remember" id="customCheckLogin"
                                            type="checkbox">
                                        <label class="custom-control-label" for="customCheckLogin">
                                            <span class="text-muted">Remember me</span>
                                        </label>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary my-4">Sign in</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
