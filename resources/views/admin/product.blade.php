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
                                    <th>Nama</th>
                                    <th>Type</th>
                                    <th>Size</th>
                                    <th>Color</th>
                                    <th>Stok</th>
                                    <th>HPP</th>
                                    <th>Harga Jual</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($table as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->productType->name }}</td>
                                        <td>{{ $item->size }}</td>
                                        <td>{{ $item->color }}</td>
                                        <td>{{ $item->stock }}</td>
                                        <td>{{ rp($item->hpp) }}</td>
                                        <td>{{ rp($item->harga_jual) }}</td>
                                        <td>
                                            <button class="btn btn-warning editSupplier" data-toggle="modal"
                                                data-target="#modalEdit" data-name="{{ $item->name }}"
                                                data-type="{{ $item->type }}" data-size="{{ $item->size }}"
                                                data-color="{{ $item->color }}" data-stock="{{ $item->stock }}"
                                                data-hpp="{{ $item->hpp }}" data-harga_jual="{{ $item->harga_jual }}"
                                                data-url="{{ route('admin.product.update', $item->id) }}">Edit</button>
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
                <form action="{{ route('admin.product.post') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Nama<i class="text-danger">*</i></label>
                            <input type="text" class="form-control" id="name" autocomplete="off"
                                placeholder="Kaos Polos Bintang 30S" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="type">Type<i class="text-danger">*</i></label>
                            <select name="type" id="type" class="form-control">
                                @foreach ($type as $item)
                                    <option value="{{ $item->mark }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="size">Size<i class="text-danger">*</i></label>
                            <select name="size" id="size" class="form-control" required>
                                <option value="s">S</option>
                                <option value="m">M</option>
                                <option value="l">L</option>
                                <option value="xl">XL</option>
                                <option value="xxl">XXL</option>
                                <option value="xxxl">XXXL</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="color">Warna<i class="text-danger">*</i></label>
                            <input type="text" name="color" id="color" class="form-control" placeholder="Hitam"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="stok">Stok<i class="text-danger">*</i></label>
                            <input type="number" name="stok" id="stok" class="form-control" placeholder="00"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="hpp">Harga Beli<i class="text-danger">*</i></label>
                            <input class="form-control mb-4 mb-md-0" id="hpp" autocomplete="off" name="hpp"
                                placeholder="1,000,000" required data-inputmask="'alias': 'currency'" />
                        </div>
                        <div class="form-group">
                            <label for="harga_jual">Harga Jual<i class="text-danger">*</i></label>
                            <input class="form-control mb-4 mb-md-0" id="harga_jual" autocomplete="off"
                                name="harga_jual" placeholder="1,000,000" required
                                data-inputmask="'alias': 'currency'" />
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
                    <h5 class="modal-title" id="exampleModalLabel">Edit {{ $title ?? '' }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="POST" id="formEdit">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="_type">Nama<i class="text-danger">*</i></label>
                            <input type="text" class="form-control" id="_name" autocomplete="off"
                                placeholder="Kaos Polos Bintang 30S" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="_type">Type<i class="text-danger">*</i></label>
                            <select name="type" id="_type" class="form-control">
                                @foreach ($type as $item)
                                    <option value="{{ $item->mark }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="_size">Size<i class="text-danger">*</i></label>
                            <select name="size" id="_size" class="form-control" required>
                                <option value="s">S</option>
                                <option value="m">M</option>
                                <option value="l">L</option>
                                <option value="xl">XL</option>
                                <option value="xxl">XXL</option>
                                <option value="xxxl">XXXL</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="_color">Warna<i class="text-danger">*</i></label>
                            <input type="text" name="color" id="_color" class="form-control"
                                placeholder="Hitam" required>
                        </div>
                        <div class="form-group">
                            <label for="_stok">Stok<i class="text-danger">*</i></label>
                            <input type="number" name="stok" id="_stok" class="form-control" placeholder="00"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="_hpp">Harga Beli<i class="text-danger">*</i></label>
                            <input class="form-control mb-4 mb-md-0" id="_hpp" autocomplete="off" name="hpp"
                                placeholder="1,000,000" required data-inputmask="'alias': 'currency'" />
                        </div>
                        <div class="form-group">
                            <label for="_harga_jual">Harga Jual<i class="text-danger">*</i></label>
                            <input class="form-control mb-4 mb-md-0" id="_harga_jual" autocomplete="off"
                                name="harga_jual" placeholder="1,000,000" required
                                data-inputmask="'alias': 'currency'" />
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
            $('#_name').val($(this).data('name'));
            $('#_type').val($(this).data('type'));
            $('#_size').val($(this).data('size'));
            $('#_color').val($(this).data('color'));
            $('#_stok').val($(this).data('stock'));
            $('#_hpp').val($(this).data('hpp'));
            $('#_harga_jual').val($(this).data('harga_jual'));
            $('#formEdit').attr('action', $(this).data('url'));
        })
    </script>
@endpush
