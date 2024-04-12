@extends('layout.master2')

@section('content')
    <div class="page-content d-flex align-items-center justify-content-center">

        <div class="row w-100 mx-0 auth-page">
            <div class="col-md-8 col-xl-6 mx-auto">
                <div class="card">
                    <div class="row">
                        <div class="col-md-4 pr-md-0">
                            <div class="auth-left-wrapper"
                                style="background-image: url({{ asset('logo.png') }}); background-position: center;">

                            </div>
                        </div>
                        <div class="col-md-8 pl-md-0">
                            <div class="auth-form-wrapper px-4 py-5">
                                <a href="#" class="noble-ui-logo logo-light d-block mb-2">Hologram<span
                                        class="text-small">APP</span></a>
                                <h5 class="text-muted font-weight-normal mb-4">Create an account.</h5>
                                <form class="forms-sample" method="POST" action="{{ route('register.post') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email"
                                            class="form-control @error('email')
                                            is-invalid
                                        @enderror"
                                            id="exampleInputEmail1" placeholder="Email" name="email"
                                            value="{{ old('email') }}">
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputUsername">Username</label>
                                        <input type="text"
                                            class="form-control @error('username')
                                            is-invalid
                                        @enderror"
                                            id="exampleInputUsername" autocomplete="Username" placeholder="Username"
                                            name="username" value="{{ old('username') }}">
                                        @error('username')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text"
                                            class="form-control @error('name')
                                            is-invalid
                                        @enderror"
                                            id="name" autocomplete="name" placeholder="name" name="name"
                                            value="{{ old('name') }}">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password"
                                            class="form-control @error('password')
                                            is-invalid
                                        @enderror"
                                            id="exampleInputPassword1" autocomplete="current-password"
                                            placeholder="Password" name="password">
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-check form-check-flat form-check-primary">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="remember">
                                            Remember me
                                        </label>
                                    </div>
                                    <div class="mt-3">
                                        <button type="submit" class="btn btn-primary mr-2 mb-2 mb-md-0">Sing up</button>
                                        {{-- <button type="button" class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0">
                                            <i class="btn-icon-prepend" data-feather="twitter"></i>
                                            Sign up with twitter
                                        </button> --}}
                                    </div>
                                    <a href="{{ route('login') }}" class="d-block mt-3 text-muted">Already a user? <span
                                            class="text-primary">Sign
                                            in</span></a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
