<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: sans-serif;
            font-size: 11px
        }

        .center {
            text-align: center
        }

        .right {
            text-align: right
        }
    </style>
</head>

<body>

    <h3 class="center">Kasirku</h3>
    <hr>

    <p>
        Tanggal: {{ $transaction->created_at->format('d/m/Y H:i') }} <br>
        Customer: {{ $transaction->customer->nama_customer ?? 'Umum' }}
    </p>

    <hr>

    <table width="100%">
        <tr>
            <td>{{ $transaction->product->nama_produk }}</td>
            <td class="right">x{{ $transaction->jumlah }}</td>
        </tr>
        <tr>
            <td>Total</td>
            <td class="right">
                Rp {{ number_format($transaction->total_harga, 0, ',', '.') }}
            </td>
        </tr>
    </table>

    <hr>
    <p class="center">Terima kasih</p>

</body>

</html>