<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Rekap Transaksi</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px
        }

        table {
            width: 100%;
            border-collapse: collapse
        }

        th,
        td {
            border: 1px solid #333;
            padding: 6px
        }

        th {
            background: #eee
        }

        .right {
            text-align: right
        }

        .center {
            text-align: center
        }
    </style>
</head>

<body>

    <h2>REKAP TRANSAKSI</h2>
    <p>Tanggal: {{ now()->format('d M Y') }}</p>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Customer</th>
                <th>Produk</th>
                <th>Qty</th>
                <th>Total</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @php $grandTotal = 0; @endphp

            @foreach($transactions as $t)
                @php $grandTotal += $t->total_harga; @endphp

                <tr>
                    <td class="center">{{ $loop->iteration }}</td>
                    <td>{{ $t->customer->nama_customer ?? 'Umum' }}</td>
                    <td>{{ $t->product->nama_produk ?? '-' }}</td>
                    <td class="center">{{ $t->jumlah }}</td>
                    <td class="right">
                        Rp {{ number_format($t->total_harga, 0, ',', '.') }}
                    </td>
                    <td class="center">
                        {{ $t->created_at->format('d/m/Y H:i') }}
                    </td>
                </tr>
            @endforeach

            <tr>
                <th colspan="4" class="right">TOTAL</th>
                <th class="right">
                    Rp {{ number_format($grandTotal, 0, ',', '.') }}
                </th>
                <th></th>
            </tr>
        </tbody>
    </table>

</body>

</html>