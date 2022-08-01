<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota Booking</title>
    <style>
        .garis{
            border: 1px solid;
            font-size: 12px;
        }
        @page { margin: 1px; }
    </style>

</head>
<body>
    <div class="garis">
    <table>
        <tr>
            <td>
                <center>
                    <font size="3">Kost Bu Tik</font><br>
                    <font size="1"><i>Jl. Margo Tani 01 Sukorame, Kec. Mojoroto, Kota Kediri</i></font><br>
                    <font size="1">BCA 033278142 a.n. Suyatik</font>
                </center>
            </td>
        </tr>
    </table>
    <hr>
    <center><b>NOTA BOOKING</b></center><br>
    <table>
        <tr>
            <td>
                No. Nota
            </td>
            <td>: {{$no}}</td>
        </tr>
        <tr>
            <td>
                Tanggal Booking
            </td>
            <td>: {{ date('d-m-Y') }}</td>
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
            <td>: {{$kost->nama_kost}}</td>
        </tr>
        <tr>
            <td>
                Biaya Booking
            </td>
            <td>: Rp. 50000</td>
        </tr>
    </table>
    </div>
</body>
</html>
