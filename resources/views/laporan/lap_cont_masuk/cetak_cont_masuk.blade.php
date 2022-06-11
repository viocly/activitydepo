<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cetak Laporan Container Masuk</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body style="background-color: white;" onload="window.print()">

    <style>
        .line-title {
            border: 0;
            border-style: inset;
            border-top: 1px solid #000;
        }
    </style>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table style="width: 100%;">
                        <tr>
                            <td align="center">
                                <span style="line-height: 1.6; font-weight: bold;"></span>
                                SISTEM INFORMASI ACTIVITY DEPO CONTAINER
                                <br>INDOTANK
                            </td>
                        </tr>
                    </table>
                    <hr class="line-title">
                    <p align="center">
                        LAPORAN DATA CONTAINER MASUK
                    </p>
                    <p align="center">
                        Periode Tanggal {{ $tgl_mulai }} s/d {{ $tgl_selesai }}
                    </p>
                    <hr />

                    <table class="table table-bordered">
                        <tr>
                            <th>No</th>
                            <th>No Container</th>
                            <th>Tanggal Masuk</th>
                            <th>Customer</th>
                            <th>Asal</th>
                            <th>Cargo</th>
                            <th>Kondisi</th>
                            <th>Type</th>
                        </tr>

                        @if($sum_total == null)

                        <tr>
                            <td colspan="8">
                                <center>
                                    <b> Data tidak ada Pada Periode Tanggal
                                        {{ date('d f Y', strtotime($tgl_mulai)) }} s/d {{ date('d f Y', strtotime($tgl_selesai)) }}
                                    </b>
                                </center>
                            </td>
                        </tr>

                        @else

                        @php $no=1; @endphp
                        @foreach($cont_msk as $row)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$row->no_container}}</td>
                            <td>{{$row->tgl_msk}}</td>
                            <td>{{$row->customer}}</td>
                            <td>{{$row->asal}}</td>
                            <td>{{$row->nama_cargo}}</td>
                            <td>{{$row->kondisi}}</td>
                            <td>{{$row->type}}</td>
                        </tr>
                        @endforeach
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>

</html>