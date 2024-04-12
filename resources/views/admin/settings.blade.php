@extends('layout.master')

@push('plugin-styles')
    <!-- Plugin css import here -->
    <link rel="stylesheet" type="text/css" href="{{ asset('dropify/css/dropify.min.css') }}">
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Frontend</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $title ?? '' }}</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <form class="forms-sample" enctype="multipart/form-data" method="POST"
                    action="{{ route('admin.frontend.settings.post') }}">
                    @csrf
                    <div class="card-body">
                        <h6 class="card-title">Form {{ $title ?? '' }}</h6>
                        <div class="form-group">
                            <label for="exampleInputUsername1">Name</label>
                            <input type="text" class="form-control" id="exampleInputUsername1" autocomplete="off"
                                placeholder="Username" value="{{ $app->name }}" name="name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Logo</label>
                            <input type="file" class="dropify" name="logo"
                                data-default-file="{{ asset($app->logo) }}" />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Phone</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" autocomplete="off"
                                placeholder="Phone" value="{{ $app->phone }}" name="phone">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email"
                                value="{{ $app->mail }}" name="email">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Facebook</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Facebook Url"
                                value="{{ $app->s_fb }}" name="s_fb">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Instagram</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Instagram Url"
                                value="{{ $app->s_ig }}" name="s_ig">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">TikTok</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="TikTok Url"
                                value="{{ $app->s_tt }}" name="s_tt">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary mr-2">Update</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <!-- Page content here -->
@endsection

@push('plugin-scripts')
    <!-- Plugin js import here -->
    <script type="text/javascript" src="{{ asset('dropify/js/dropify.min.js') }}"></script>
@endpush

@push('custom-scripts')
    <!-- Custom js here -->
    <script>
        $('.dropify').dropify();
    </script>
@endpush
