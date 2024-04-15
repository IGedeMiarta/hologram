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
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div style="display: flex; justify-content: space-between; margin-bottom: 15px;">
                        <h6 class="card-title">Tabel {{ $title }}</h6>
                        <a href="{{ route('admin.order.form') }}" class="btn btn-success"><i data-feather="plus"></i> Add
                            {{ $title }}</a>
                    </div>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>TRX</th>
                                    <th>Customer</th>
                                    <th>Kasir</th>
                                    <th>Deadline</th>
                                    <th>Trx Amount</th>
                                    <th>DP</th>
                                    <th>Catatan</th>
                                    <th>Status</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($table as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->trx }}</td>
                                        <td>{{ $item->getClient->name }}</td>
                                        <td>{{ $item->getKasir->name }}</td>
                                        <td>{{ dateFormat($item->due_date) }}</td>
                                        <td>{{ rp($item->fin_amount) }}</td>
                                        <td>{{ rp($item->dp_amount) }}</td>
                                        <td>{{ $item->notes ?? '-' }}</td>
                                        <td>{!! $item->statusInfo() !!}</td>
                                        <td>
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item">
                                                    <a href="#"> <i class="mdi mdi-eye"></i>Detail</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <a href="{{ route('admin.invoice', $item->id) }}"> <i
                                                            class="mdi mdi-file-check"></i>Invoice</a>
                                                </li>
                                            </ul>
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
@endsection

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-net-bs4/dataTables.bootstrap4.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('assets/js/data-table.js') }}"></script>
@endpush
