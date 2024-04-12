@extends('layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
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
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div style="display: flex; justify-content: space-between; margin-bottom: 15px;">
                        <h6 class="card-title">Tabel {{ $title }}</h6>
                        <button type="button" class="btn btn-success" class="btn btn-primary" data-toggle="modal"
                            data-target="#modalAdd"><i data-feather="plus"></i> Add {{ $title }}</button>
                    </div>
                    {{-- <p class="card-description">Read the <a href="https://datatables.net/" target="_blank"> Official
                            DataTables Documentation </a>for a full list of instructions and other options.</p> --}}
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Project Name</th>
                                    <th>Project Img</th>
                                    <th>Client name</th>
                                    <th>Client Img</th>
                                    <th>Tanggal Selesai</th>
                                    <th>Status</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($table as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->project_name }}</td>
                                        <td><img src="{{ asset($item->project_img) }}" alt=""
                                                style="width: 150px !important; height: 150px !important;border-radius:0px !important;">
                                        </td>
                                        <td>{{ $item->client_name }}</td>
                                        <td><img src="{{ asset($item->client_img) }}" alt=""
                                                style="width: 100px !important; height: 100px !important;"></td>
                                        <td>{{ date('d M Y', strtotime($item->complate_date)) }}</td>
                                        <td>{!! $item->status ? '<span class="text-success">Active</span>' : '<span class="text-danger">Non Active</span>' !!}</td>
                                        <td>
                                            <button class="btn btn-warning editBtn" data-toggle="modal"
                                                data-target="#modalEdit" data-id="{{ $item->id }}"
                                                data-project_name="{{ $item->project_name }}"
                                                data-project_img="{{ asset($item->project_img) }}"
                                                data-client_name="{{ $item->client_name }}"
                                                data-client_img="{{ asset($item->client_img) }}"
                                                data-date_complate="{{ $item->complate_date }}"
                                                data-status="{{ $item->status }}">Edit</button>
                                        </td>
                                    </tr>
                                @endforeach ($table as $item)

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add {{ $title ?? '' }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.frontend.porto.post') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputUsername1">Project Name</label>
                            <input type="text" class="form-control" id="exampleInputUsername1" autocomplete="off"
                                placeholder="Baju Kelas SMP 3" name="project_name" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Project Image</label>
                            <input type="file" class="dropify" name="project_img" required />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">Client Name</label>
                            <input type="text" class="form-control" id="exampleInputUsername1" autocomplete="off"
                                placeholder="Kelas VII" name="client_name" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Client Image</label>
                            <input type="file" class="dropify" name="client_img" required />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">Tanggal Selesai</label>
                            <input type="date" class="form-control" id="exampleInputUsername1" autocomplete="off"
                                name="date_complate" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add {{ $title ?? '' }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="POST" enctype="multipart/form-data" id="formEdit">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="project_name">Project Name</label>
                            <input type="text" class="form-control" id="project_name" autocomplete="off"
                                placeholder="Baju Kelas SMP 3" name="project_name" required>
                        </div>
                        <div class="form-group">
                            <label for="project_img">Project Image</label>
                            <input type="file" class="dropify" name="project_img" id="project_img" />
                            <span class="text-warning">Biarkan Kosong jika tidak ingin merubah gambar</span>
                        </div>
                        <div class="form-group">
                            <label for="client_name">Client Name</label>
                            <input type="text" class="form-control" id="client_name" autocomplete="off"
                                placeholder="Kelas VII" name="client_name" required>
                        </div>
                        <div class="form-group">
                            <label for="client_img">Client Image</label>
                            <input type="file" class="dropify" name="client_img" id="client_img"
                                data-default-file="" />
                            <span class="text-warning">Biarkan Kosong jika tidak ingin merubah gambar</span>

                        </div>
                        <div class="form-group">
                            <label for="date_complate">Tanggal Selesai</label>
                            <input type="date" class="form-control" id="date_complate" autocomplete="off"
                                name="date_complate" required>
                        </div>
                        <div class="form-group">
                            <label for="date_complate">Status</label>
                            <select name="status" class="form-control" id="status">
                                <option value="1">Active</option>
                                <option value="0">Non Active</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-net-bs4/dataTables.bootstrap4.js') }}"></script>

    <script type="text/javascript" src="{{ asset('dropify/js/dropify.min.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('assets/js/data-table.js') }}"></script>
    <script>
        $('.dropify').dropify();
        $('.editBtn').on('click', function() {
            $('#project_name').val($(this).data('project_name'));
            $('#client_name').val($(this).data('client_name'));
            $('#date_complate').val($(this).data('date_complate'));
            $('#status').val($(this).data('status'));
            $('#project_img').attr('data-default-file', $(this).data('project_img')).dropify();
            $('#client_img').attr('data-default-file', $(this).data('client_img')).dropify();
            var id = $(this).data('id');
            console.log(id);
            var url = `{{ url('admin/porto/${id}') }}`;
            $('#formEdit').attr('action', url);
        });
    </script>
@endpush
