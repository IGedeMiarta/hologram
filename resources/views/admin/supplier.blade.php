@extends('layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Master Data</a></li>
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
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Supplier</th>
                                    <th>Kontak</th>
                                    <th>No HP</th>
                                    <th>Alamat</th>
                                    <th>Catatan</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($table as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->contact_name }}</td>
                                        <td>{{ $item->contact }}</td>
                                        <td>{{ $item->alamat ?? '-' }}</td>
                                        <td>{{ $item->notes ?? '-' }}</td>
                                        <td>
                                            <button class="btn btn-warning editSupplier" data-toggle="modal"
                                                data-target="#modalEdit" data-id="{{ $item->id }}"
                                                data-name="{{ $item->name }}"
                                                data-contact_name="{{ $item->contact_name }}"
                                                data-contact="{{ $item->contact }}" data-alamat="{{ $item->alamat }}"
                                                data-notes="{{ $item->notes }}"
                                                data-url="{{ route('admin.supplier.update', $item->id) }}">Edit</button>
                                            {{-- <button class="btn btn-danger">Delete</button> --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- modal add --}}
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
                <form action="{{ route('admin.supplier.post') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Nama Supplier<i class="text-danger">*</i></label>
                            <input type="text" class="form-control" id="name" autocomplete="off"
                                placeholder="Bintang Conveksi" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="contact_name">Nama Kontak<i class="text-danger">*</i></label>
                            <input type="text" class="form-control" id="contact_name" autocomplete="off"
                                placeholder="Pak Agus" name="contact_name" required>
                        </div>
                        <div class="form-group">
                            <label for="contact">Nomer Hp<i class="text-danger">*</i></label>
                            <input type="number" class="form-control" id="contact" autocomplete="off"
                                placeholder="0981 122112" name="contact" required>
                        </div>
                        <div class="form-group">
                            <label for="contact">Alamat</label>
                            <textarea name="alamat" id="" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="contact">Catatan</label>
                            <textarea name="notes" id="" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal"> <i
                                data-feather="x"></i>Close</button>
                        <button type="submit" class="btn btn-primary"> <i data-feather="save"></i>Save changes</button>
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
                <form action="" id="editForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="edit_name">Nama Supplier<i class="text-danger">*</i></label>
                            <input type="text" class="form-control" id="edit_name" autocomplete="off"
                                placeholder="Bintang Conveksi" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_contact_name">Nama Kontak<i class="text-danger">*</i></label>
                            <input type="text" class="form-control" id="edit_contact_name" autocomplete="off"
                                placeholder="Pak Agus" name="contact_name" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_contact">Nomer Hp<i class="text-danger">*</i></label>
                            <input type="number" class="form-control" id="edit_contact" autocomplete="off"
                                placeholder="0981 122112" name="contact" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_alamat">Alamat</label>
                            <textarea name="alamat" id="edit_alamat" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="edit_notes">Catatan</label>
                            <textarea name="notes" id="edit_notes" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal"> <i
                                data-feather="x"></i>Close</button>
                        <button type="submit" class="btn btn-primary"> <i data-feather="save"></i>Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-net-bs4/dataTables.bootstrap4.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('assets/js/data-table.js') }}"></script>
    <script>
        $('.editSupplier').on('click', function() {
            $('#edit_name').val($(this).data('name'));
            $('#edit_contact_name').val($(this).data('contact_name'));
            $('#edit_contact').val($(this).data('contact'));
            $('#edit_alamat').val($(this).data('alamat'));
            $('#edit_notes').val($(this).data('notes'));
            $('#editForm').attr('action', $(this).data('url'))
        })
    </script>
@endpush
