@extends('layout.layout')

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Laporan Booking Keluar</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="/home">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Laporan Booking Keluar</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Booking Container Keluar</a>
                    </li>
                </ul>
            </div>
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Laporan Booking Container Keluar</h4>
                                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#modalCetak">
                                    <i class="fa fa-print"></i>
                                    Cetak Data
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Modal -->

                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No Container</th>
                                            <th>Tanggal Booking</th>
                                            <th>Customer</th>
                                            <th>Shiper</th>
                                            <th>Tujuan</th>
                                            <th>Type</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no=1; @endphp
                                        @foreach($book_cont_keluar as $row)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$row->no_container}}</td>
                                            <td>{{$row->tgl_book_keluar}}</td>
                                            <td>{{$row->customer}}</td>
                                            <td>{{$row->shiper}}</td>
                                            <td>{{$row->tujuan}}</td>
                                            <td>{{$row->type}}</td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modalCetak" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Cetak Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/lap_book_keluar/cetak_book_keluar" method="GET" target="_blank" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                    <div class="form-grup">
                        <label>Tanggal Mulai</label>
                        <input type="date" class="form-control" name="tgl_mulai" required>
                    </div>

                    <div class="form-grup">
                        <label>Tanggal Selesai</label>
                        <input type="date" class="form-control" name="tgl_selesai" required>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i>Close</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-print"></i> Cetak Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection