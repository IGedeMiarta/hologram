@extends('layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Transaction</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $title ?? '' }}</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline">
                        <h6 class="card-title mb-0">Cost Bulan Ini</h6>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-12 col-xl-7">
                            <h3 class="mb-2">{{ rp($this_month) }}</h3>
                            <div class="d-flex align-items-baseline">
                                @if ($percent < 0)
                                    <p class="text-danger">
                                        <span> {{ $percent }}%</span>
                                        <i data-feather="arrow-down" class="icon-sm mb-1"></i>
                                    </p>
                                @else
                                    <p class="text-success">
                                        <span>{{ $percent }}%</span>
                                        <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                                    </p>
                                @endif
                            </div>
                        </div>
                        <div class="col-6 col-md-12 col-xl-7">
                            <div id="apexChart1" class="mt-md-3 mt-xl-0"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline">
                        <h6 class="card-title mb-0">Cost Bulan Lalu</h6>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-12 col-xl-7">
                            <h3 class="mb-2">{{ rp($last_month) }}</h3>
                            <div class="d-flex align-items-baseline">
                                {{-- <p class="text-success">
                                    <span>+3.3%</span>
                                    <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                                </p> --}}
                            </div>
                        </div>
                        <div class="col-6 col-md-12 col-xl-7">
                            <div id="apexChart1" class="mt-md-3 mt-xl-0"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                                    <th>Nama</th>
                                    <th>Jumlah</th>
                                    <th>Catatan</th>
                                    <th>Tanggal</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($table as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ rp($item->amount) }}</td>
                                        <td>{{ $item->notes ?? '-' }}</td>
                                        <td>{{ dateFormat($item->created_at) }}</td>
                                        <td>
                                            <button class="btn btn-warning editSupplier" data-toggle="modal"
                                                data-target="#modalEdit" data-id="{{ $item->id }}"
                                                data-name="{{ $item->name }}" data-amount="{{ $item->amount }}"
                                                data-notes="{{ $item->notes }}" data-flag="{{ $item->flag }}"
                                                data-url="{{ route('admin.cost.update', $item->id) }}">Edit</button>
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
                <form action="{{ route('admin.cost.post') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Nama<i class="text-danger">*</i></label>
                            <input type="text" class="form-control" id="name" autocomplete="off"
                                placeholder="Gaji Pegawai" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="amount">Jumlah<i class="text-danger">*</i></label>
                            <input class="form-control mb-4 mb-md-0" id="amount" autocomplete="off" name="amount"
                                placeholder="1,000,000" required data-inputmask="'alias': 'currency'" />
                        </div>
                        <div class="form-group">
                            <label for="type">Type<i class="text-danger">*</i></label>
                            <select name="type" id="type" class="form-control">
                                @foreach ($type as $item)
                                    <option value="{{ $item->mark }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            {{-- <a href="#">Tambah Type Pengeluaran</a> --}}
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
                            <label for="edit_name">Nama<i class="text-danger">*</i></label>
                            <input type="text" class="form-control" id="edit_name" autocomplete="off"
                                placeholder="Bintang Conveksi" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_amount">Jumlah<i class="text-danger">*</i></label>
                            <input class="form-control mb-4 mb-md-0" id="edit_amount" autocomplete="off" name="amount"
                                placeholder="1,000,000" required data-inputmask="'alias': 'currency'" />
                        </div>
                        <div class="form-group">
                            <label for="edit_type">Type<i class="text-danger">*</i></label>
                            <select name="type" id="edit_type" class="form-control">
                                @foreach ($type as $item)
                                    <option value="{{ $item->mark }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            {{-- <a href="#">Tambah Type Pengeluaran</a> --}}
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
    <script src="{{ asset('assets/plugins/inputmask/jquery.inputmask.bundle.min.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('assets/js/inputmask.js') }}"></script>
    <script src="{{ asset('assets/js/data-table.js') }}"></script>
    <script>
        $('.editSupplier').on('click', function() {
            $('#edit_name').val($(this).data('name'));
            $('#edit_amount').val($(this).data('amount'));
            $('#edit_type').val($(this).data('flag'));
            $('#edit_notes').val($(this).data('notes'));
            $('#editForm').attr('action', $(this).data('url'))
        })
    </script>
@endpush
