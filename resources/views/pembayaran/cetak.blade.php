<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota Pembayaran</title>
    <style>
        .garis {
            border: 1px solid;
            font-size: 12px;
        }

        @page {
            margin: 1px;
        }
    </style>

</head>

<body>
    <div class="garis">
        <table>
            <tr>
                <td>
                    <center>
                        <font size="3">Kost Bu Tik</font><br>
                        <font size="1"><i>Jl. Margo Tani 01 Sukorame, Kec. Mojoroto</i></font><br>
                        <font size="1"><i>Kota Kediri</i></font><br>
                        <font size="1">BCA 033278142 a.n. Suyatik</font>
                    </center>
                </td>
            </tr>
        </table>
        <hr>
        <center><b>NOTA PEMBAYARAN</b></center><br>
        <table>
            @php
            $harga_kost = $pembayaran->kost->harga;
            $total_fasilitas = $total_biaya = 0;
            @endphp
            <tr>
                <td>
                    No. Pembayaran
                </td>
                <td>: {{$no}}</td>
            </tr>
            <tr>
                <td>
                    Nama
                </td>
                <td>: {{$nama}}</td>
            </tr>
            <tr>
                <td>
                    Kamar
                </td>
                <td>: {{$pembayaran->nama_kost}}</td>
            </tr>
            <tr>
                <td>
                    Bulan
                </td>
                <td>: {{$pembayaran->bulan}}</td>
            </tr>
            <tr>
                <td>Detail Pembayaran:</td>
            </tr>
            <tr>
                <td>Harga per bulan</td>
                <td style="text-align: end">{{ $harga_kost }}</td>
            </tr>
            @foreach (getsFasilitas($pembayaran->id ) as $item)
            @php
            $total_biaya += $item->harga;
            @endphp
            <tr>
                <td>{{ $item->fasilitas }}</td>
                <td style="text-align: end">{{ $item->harga }}</td>
            </tr>
            @endforeach
            <tr>
                <td><b>Total</b></td>
                <td style="text-align: end"><b>{{ $total_biaya }}</b></td>
            </tr>
        </table>
    </div>
</body>

</html>