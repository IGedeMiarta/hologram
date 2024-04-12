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
        <div class="col-md-6 mb-3 grid-margin stretch-card">
            <div class="card">
                <form class="forms-sample" enctype="multipart/form-data" method="POST"
                    action="{{ route('admin.frontend.banner.post') }}">
                    @csrf
                    <div class="card-header">
                        <h4>Banner</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="banner">Banner</label>
                            <input type="file" id="banner" class="dropify" name="banner_img"
                                data-default-file="{{ asset($about->banner_img) ?? '' }}" />
                        </div>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" autocomplete="off" placeholder="title"
                                value="{{ $about->title }}" name="title">
                        </div>

                        <div class="form-group">
                            <label for="desc">Description</label>
                            <textarea name="desc" cols="30" rows="10" class="form-control" id="desc" autocomplete="off">{{ $about->desc }}</textarea>
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success"> <i data-feather="save"></i>
                            Update
                            Banner</button>
                    </div>
                </form>
            </div>
        </div>
        {{-- keunggulan --}}
        <div class="col-md-6 mb-3 grid-margin stretch-card">
            <div class="card">
                <form action="{{ route('admin.frontend.benefit.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header">
                        <h4>Keunggulan</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="banefit_img">Keunggulan IMG</label>
                                    <input type="file" id="banefit_img" class="dropify" name="banefit_img"
                                        data-default-file="{{ asset($about->banefit_img) ?? '' }}" />
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="banefit_img">Keunggulan List</label>

                                    @csrf
                                    @foreach ($benefit as $item)
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="text[]"
                                                value="{{ $item->text }}">
                                            <div class="input-group-append">
                                                <a href="{{ route('admin.frontend.benefit.delete', $item->id) }}"
                                                    class="btn btn-outline-danger">Delete</a>
                                            </div>
                                        </div>
                                    @endforeach
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#addBenefit"> <i data-feather="plus"></i> Add
                                        Keunggulan</button>

                                </div>
                            </div>
                        </div>
                        <hr style="border-color: gray;">
                        <button type="submit" class="btn btn-success"> <i data-feather="save"></i>
                            Update
                            Keunggulan</button>
                    </div>

                </form>
            </div>
        </div>
        {{-- service --}}
        <div class="col-md-8 mb-3 grid-margin stretch-card">
            <div class="card">
                <form action="{{ route('admin.frontend.service.title') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header">
                        <h4>Service</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="serviceTitle">Service Title</label>
                                    <input type="text" class="form-control" id="serviceTitle" autocomplete="off"
                                        placeholder="serviceTitle" value="{{ $about->service_title }}"
                                        name="service_title">
                                </div>
                                <div class="form-group">
                                    <label for="serviceSubTitle">Service Sub-Title</label>
                                    <textarea name="service_sub_title" id="serviceSubTitle" class="form-control" cols="30" rows="3">{{ $about->service_sub_title }}</textarea>

                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success"> <i data-feather="save"></i>
                            Update
                            Service</button>
                    </div>
                    <div class="card-footer" style="background-color: #070D19">
                        <div class="col-md-12 mb-2" style="display: flex; justify-content: end">
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#addService"> <i data-feather="plus"></i> Add
                                Service</button>
                        </div>
                        <div class="col-md-12">
                            <div class="row">

                                @foreach ($service as $item)
                                    <div class="col-md-3 grid-margin stretch-card">
                                        <div class="card ">
                                            <div class="text-center mt-3 mb-2">
                                                <img src="{{ asset($item->image) }}" class="card-img-top"
                                                    alt="Image{{ $item->id }}"
                                                    style="width: 100px; justify-content: center; height: 100px;">
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title text-center">{{ $item->title }}</h5>
                                                <p class="card-text text-center">{{ $item->desc }}</p>
                                            </div>
                                            <div class="card-footer">
                                                <button type="button" class="btn btn-warning editService  btn-block"
                                                    data-toggle="modal" data-target="#editService"
                                                    data-url="{{ route('admin.frontend.service.update', $item->id) }}"
                                                    data-image="{{ asset($item->image) }}"
                                                    data-title="{{ $item->title }}"
                                                    data-desc="{{ $item->desc }}">Edit</button>
                                                <a href="{{ route('admin.frontend.service.delete', $item->id) }}"
                                                    class="btn btn-danger  btn-block">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
        {{-- quotes --}}
        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <form class="forms-sample" enctype="multipart/form-data" method="POST"
                    action="{{ route('admin.frontend.quote.post') }}">
                    @csrf
                    <div class="card-header">
                        <h4>Quotes</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="quoteImge">Quote Img</label>
                            <input type="file" id="quoteImge" class="dropify" name="quote_by_img"
                                data-default-file="{{ asset($about->quote_by_img) ?? '' }}" />
                        </div>
                        <div class="form-group">
                            <label for="quote_by_name">Quote By name</label>
                            <input type="text" class="form-control" id="quote_by_name" autocomplete="off"
                                placeholder="Stive Job" value="{{ $about->quote_by_name }}" name="quote_by_name">
                        </div>
                        <div class="form-group">
                            <label for="quote_by_title">Quote By Title</label>
                            <input type="text" class="form-control" id="quote_by_title" autocomplete="off"
                                placeholder="Apple CEO" value="{{ $about->quote_by_title }}" name="quote_by_title">
                        </div>

                        <div class="form-group">
                            <label for="quote">Quote</label>
                            <textarea name="quote" cols="30" rows="5" class="form-control" id="quote" autocomplete="off">{{ $about->quote }}</textarea>
                        </div>
                        <hr style="border-color: gray;">
                        <button type="submit" class="btn btn-success"> <i data-feather="save"></i>
                            Update
                            Quotes</button>
                    </div>
                </form>
            </div>
        </div>
        {{-- testimoni --}}
        <div class="col-md-12">
            <div class="card">
                <form action="{{ route('admin.frontend.testi.title') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header">
                        <h4>Testimonies</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="testiTitle">Testi Title</label>
                                    <input type="text" class="form-control" id="testiTitle" autocomplete="off"
                                        placeholder="testiTitle" value="{{ $about->testi_title }}" name="testi_title">
                                </div>
                                <div class="form-group">
                                    <label for="testiSubTitle">Testi Sub-Title</label>
                                    <textarea name="testi_sub_title" id="testiSubTitle" class="form-control" cols="30" rows="3">{{ $about->testi_sub_title }}</textarea>

                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success"> <i data-feather="save"></i>
                            Update
                            Testimonies</button>
                    </div>
                    <div class="card-footer" style="background-color: #070D19">
                        <div class="col-md-12 mb-2" style="display: flex; justify-content: end">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addTesti">
                                <i data-feather="plus"></i> Add
                                Testimoni</button>
                        </div>
                        <div class="col-md-12">
                            <div class="row">

                                @foreach ($testi as $item)
                                    <div class="col-md-3 grid-margin stretch-card">
                                        <div class="card ">
                                            <div class="text-center mt-3 mb-2">
                                                <img src="{{ asset($item->testi_img) }}" class="card-img-top"
                                                    alt="Image{{ $item->id }}"
                                                    style="width: 100px; justify-content: center; height: 100px; object-fit: cover;">
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title text-center">{{ $item->testi_name }}</h5>
                                                <h6 class=" card-title text-center text-secondary">
                                                    {{ $item->testi_title ?? '-' }}
                                                </h6>
                                                <p class="card-text text-center">{{ $item->testimoni }}</p>
                                            </div>
                                            <div class="card-footer">
                                                <button type="button" class="btn btn-warning editTesti  btn-block"
                                                    data-toggle="modal" data-target="#editTesti"
                                                    data-url="{{ route('admin.frontend.testi.update', $item->id) }}"
                                                    data-image="{{ asset($item->testi_img) }}"
                                                    data-testi_name="{{ $item->testi_name }}"
                                                    data-testimoni="{{ $item->testimoni }}"
                                                    data-testi_title="{{ $item->testi_title }}">Edit</button>
                                                <a href="{{ route('admin.frontend.service.delete', $item->id) }}"
                                                    class="btn btn-danger  btn-block">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    {{-- all modal --}}
    <div class="modal fade" id="addBenefit" tabindex="-1" role="dialog" aria-labelledby="addBenefit"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addBenefit">Add Keunggulan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.frontend.benefit') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="benefit">Keunggulan Name</label>
                            <input type="text" class="form-control" id="benefit" autocomplete="off"
                                placeholder="benefit" name="benefit" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal"> <i
                                data-feather="x"></i>Close</button>
                        <button type="submit" class="btn btn-success"> <i data-feather="save"></i>Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addService" tabindex="-1" role="dialog" aria-labelledby="addBenefit"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addBenefit">Add Service</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.frontend.service.post') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="image">Icon IMG</label>
                            <input type="file" id="image" class="dropify" name="image" data-default-file=""
                                required />
                        </div>
                        <div class="form-group">
                            <label for="inpServiceTitle">Service Title</label>
                            <input type="text" class="form-control" id="inpServiceTitle" autocomplete="off"
                                placeholder="Service Title" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="serviceSubTitleList">Service Sub-Title</label>
                            <textarea name="service_sub_title" id="serviceSubTitleList" class="form-control" cols="30" rows="3"
                                placeholder="Sub Title" required></textarea>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal"> <i
                                data-feather="x"></i>Close</button>
                        <button type="submit" class="btn btn-success"> <i data-feather="save"></i>Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editService" tabindex="-1" role="dialog" aria-labelledby="editService"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editService">Edit Service</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="POST" enctype="multipart/form-data" id="editServiceForm">
                    @csrf
                    @method('PUT');
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="imageServiceEdit">Icon IMG</label>
                            <input type="file" id="imageServiceEdit" class="dropify" name="image"
                                data-default-file="" />
                            <span class="text-warning">Biarkan Kosong jika tidak ingin merubah gambar</span>
                        </div>
                        <div class="form-group">
                            <label for="inpServiceTitleEdit">Service Title</label>
                            <input type="text" class="form-control" id="inpServiceTitleEdit" autocomplete="off"
                                placeholder="Service Title" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="serviceSubTitleListEdit">Service Sub-Title</label>
                            <textarea name="service_sub_title" id="serviceSubTitleListEdit" class="form-control" cols="30" rows="3"
                                placeholder="Sub Title" required></textarea>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal"> <i
                                data-feather="x"></i>Close</button>
                        <button type="submit" class="btn btn-success"> <i data-feather="save"></i>Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addTesti" tabindex="-1" role="dialog" aria-labelledby="addTesti"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTesti">Add Testimoni</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.frontend.testi.add') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="testi_img">Testi Profile</label>
                            <input type="file" id="testi_img" class="dropify" name="testi_img" data-default-file=""
                                required />
                        </div>
                        <div class="form-group">
                            <label for="testi_name">Nama Testimoni</label>
                            <input type="text" class="form-control" id="testi_name" autocomplete="off"
                                placeholder="Komang Agus" name="testi_name" required>
                        </div>
                        <div class="form-group">
                            <label for="testi_title">Testimoni Title</label>
                            <input type="text" class="form-control" id="testi_title" autocomplete="off"
                                placeholder="Pegawai BRI" name="testi_title">
                        </div>
                        <div class="form-group">
                            <label for="testimoni">Testimoni</label>
                            <textarea name="testimoni" id="testimoni" class="form-control" cols="30" rows="3"
                                placeholder="Bahannya berkualitas" required></textarea>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal"> <i
                                data-feather="x"></i>Close</button>
                        <button type="submit" class="btn btn-success"> <i data-feather="save"></i>Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editTesti" tabindex="-1" role="dialog" aria-labelledby="editTesti"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editTesti">Edit Testimoni</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="POST" enctype="multipart/form-data" id="editTestiForm">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="edit_testi_img">Testi Profile</label>
                            <input type="file" id="edit_testi_img" class="dropify" name="testi_img"
                                data-default-file="" required />
                            <span class="text-warning">Biarkan Kosong jika tidak ingin merubah gambar</span>
                        </div>
                        <div class="form-group">
                            <label for="testi_name">Nama Testimoni</label>
                            <input type="text" class="form-control" id="edit_testi_name" autocomplete="off"
                                placeholder="Komang Agus" name="testi_name" required>
                        </div>
                        <div class="form-group">
                            <label for="testi_title">Testimoni Title</label>
                            <input type="text" class="form-control" id="edit_testi_title" autocomplete="off"
                                placeholder="Pegawai BRI" name="testi_title">
                        </div>
                        <div class="form-group">
                            <label for="testimoni">Testimoni</label>
                            <textarea name="testimoni" id="edit_testimoni" class="form-control" cols="30" rows="3"
                                placeholder="Bahannya berkualitas" required></textarea>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal"> <i
                                data-feather="x"></i>Close</button>
                        <button type="submit" class="btn btn-success"> <i data-feather="save"></i>Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('plugin-scripts')
    <!-- Plugin js import here -->
    <script type="text/javascript" src="{{ asset('dropify/js/dropify.min.js') }}"></script>
@endpush

@push('custom-scripts')
    <!-- Custom js here -->
    <script>
        $('.dropify').dropify();
        $('.editService').on('click', function() {
            $('#imageServiceEdit').attr('data-default-file', $(this).data('image')).dropify();
            $('#inpServiceTitleEdit').val($(this).data('title'));
            $('#serviceSubTitleListEdit').val($(this).data('desc'));
            $('#editServiceForm').attr('action', $(this).data('url'));
        });
        $('.editTesti').on('click', function() {
            $('#edit_testi_img').attr('data-default-file', $(this).data('image')).dropify();
            $('#edit_testi_name').val($(this).data('testi_name'));
            $('#edit_testi_title').val($(this).data('testi_title'));
            $('#edit_testimoni').val($(this).data('testimoni'));
            $('#editTestiForm').attr('action', $(this).data('url'));
        });
    </script>
@endpush
