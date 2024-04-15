@extends('layout.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Order</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $title ?? '' }}</li>
        </ol>
    </nav>
    <div class="row">
        <div class="container-fluid w-100 mb-2">
            <a href="#" class="btn btn-outline-primary float-right mt-4" onclick="printCardContent()"><i
                    data-feather="printer" class="mr-2 icon-md"></i>Print</a>
        </div>
        <div class="col-md-12">
            <div class="card" id="printCardContainer">
                <div class="card-body">
                    <div class="container-fluid d-flex justify-content-between">
                        <div class="col-lg-3 pl-0">
                            {{-- <img src="{{ asset($app->logo) }}" alt="" style="max-width: 50px"> --}}
                            <a href="#" class="noble-ui-logo logo-light d-block mt-3">Hologram<span>.co</span></a>
                            {{-- <p class="mt-1 mb-1"><b>NobleUI Themes</b></p> --}}
                            <p>Jl. Jempiring No.32, <br>
                                Baler Bale Agung, Kec. Negara, <br>
                                Kabupaten Jembrana, Bali <br>
                                82218</p>
                            {{-- <p>108,<br> Great Russell St,<br>London, WC1B 3NA.</p> --}}
                            <h5 class="mt-5 mb-2 text-muted">Teruntuk :</h5>
                            <p>{{ $order->getClient->name }},<br> {{ $order->getClient->address }},<br>
                                {{ $order->getClient->phone }}.</p>
                        </div>
                        <div class="col-lg-3 pr-0">
                            <h4 class="font-weight-medium text-uppercase text-right mt-4 mb-2">invoice</h4>
                            <h6 class="text-right mb-5 pb-4"># {{ $order->trx }}</h6>
                            <p class="text-right mb-1">Sisa Pembayaran</p>
                            <h4 class="text-right font-weight-normal">{{ rp($order->fin_amount - $order->dp_amount) }}</h4>
                            <h6 class="mb-0 mt-3 text-right font-weight-normal mb-2"><span class="text-muted">Tertanggal
                                    :</span> {{ dateFormat(now()) }}</h6>
                            <h6 class="text-right font-weight-normal"><span class="text-muted">Batas
                                    Waktu : </span>{{ dateFormat($order->due_date) }}</h6>
                        </div>
                    </div>
                    <div class="container-fluid mt-5 d-flex justify-content-center w-100">
                        <div class="table-responsive w-100">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Description</th>
                                        <th>Size</th>
                                        <th class="text-right">Jumlah</th>
                                        <th class="text-right">Harga Satuan</th>
                                        <th class="text-right">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($detail as $item)
                                        <tr class="text-right">
                                            <td class="text-left">{{ $loop->iteration }}</td>
                                            <td class="text-left">{{ $item->getProduct->name }}</td>
                                            <td class="text-left">{{ strtoupper($item->getProduct->size) }}</td>
                                            <td>{{ $item->order }}</td>
                                            <td>{{ num($item->getProduct->harga_jual) }}</td>
                                            <td>{{ num($item->getProduct->harga_jual * $item->order) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="5" class="text-right">Sub Total</td>
                                        <td class="text-right">{{ rp($order->total) }}</td>
                                    </tr>
                                    @if ($order->charge_name != null)
                                        <tr>
                                            <td colspan="5" class="text-right">{{ $order->charge_name }}
                                                {{ $order->charge_percent != 0 ? '(' . $order->charge_percent . ')' : '' }}
                                            </td>
                                            <td class="text-success text-right">
                                                (+)
                                                {{ $order->charge_percent != 0 ? ($order->total * $order->charge_percent) / 100 : $order->charge_amount }}
                                            </td>
                                        </tr>
                                    @endif
                                    @if ($order->disc_name != null)
                                        <tr>
                                            <td colspan="5" class="text-right">{{ $order->disc_name }}
                                                {{ $order->disc_percent != 0 ? '(' . $order->disc_percent . ')' : '' }}
                                            </td>
                                            <td class="text-danger text-right">
                                                (-)
                                                {{ $order->disc_percent != 0 ? ($order->total * $order->disc_percent) / 100 : $order->disc_amount }}
                                            </td>
                                        </tr>
                                    @endif
                                    @if ($order->charge_name != null || $order->disc_name != null)
                                        <tr>
                                            <td colspan="5" class="text-bold-800 text-right">Total</td>
                                            <td class="text-bold-800 text-right"> {{ rp($order->fin_amount) }}</td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <td colspan="5" class="text-right">DP</td>
                                        <td class="text-danger text-right">(-) {{ rp($order->dp_amount) }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" class="text-bold-800 text-right">Sisa Pembayaran</td>
                                        <td class="text-bold-800 text-right text-primary">
                                            {{ rp($order->fin_amount - $order->dp_amount) }}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <h5 class="mt-5 mb-2 text-muted">Catatan Pesanan :</h5>
                    <p>{{ $order->notes }}</p>

                </div>
            </div>

        </div>
    </div>
    <script>
        function printCardContent() {
            var printContents = document.getElementById('printCardContainer').innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>
@endsection
