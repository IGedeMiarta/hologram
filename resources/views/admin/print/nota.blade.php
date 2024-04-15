<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print {{ $order->trx }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo {
            max-width: 50px;
            margin-bottom: 10px;
        }

        .address {
            margin-bottom: 20px;
        }

        .invoice-details {
            text-align: right;
            margin-bottom: 20px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .table th,
        .table td {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: left;
        }

        .table th {
            background-color: #f2f2f2;
        }

        .notes {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <img src="{{ asset($app->logo) }}" alt="Logo" class="logo">
            <h2>Hologram.co</h2>
            <p>Jl. Jempiring No.32,<br>
                Baler Bale Agung, Kec. Negara,<br>
                Kabupaten Jembrana, Bali 82218</p>
            <p>#{{ $order->trx }}</p>
            <p>{{ dateFormat($order->due_date) }}</p>
        </div>
        <div class="table">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Description</th>
                        <th>Size</th>
                        <th class="text-right">Jml</th>
                        <th class="text-right">Harga</th>
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
                        <td class="text-right">{{ num($order->total) }}</td>
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
                            <td class="text-bold-800 text-right"> {{ num($order->fin_amount) }}</td>
                        </tr>
                    @endif
                    <tr>
                        <td colspan="5" class="text-right">DP</td>
                        <td class="text-danger text-right">(-) {{ num($order->dp_amount) }}</td>
                    </tr>
                    <tr>
                        <td colspan="5" class="text-bold-800 text-right">Sisa Pembayaran</td>
                        <td class="text-bold-800 text-right text-primary">
                            {{ num($order->fin_amount - $order->dp_amount) }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="notes">
            <p style="text-align: justify"><b>Catatan Pesanan:</b> {{ $order->notes ?? '-' }}</p>
        </div>
    </div>

</body>

</html>
