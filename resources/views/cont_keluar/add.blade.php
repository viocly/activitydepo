@extends('layout.layout')

@section('content')

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Add Container Keluar</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="#">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Add</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Container Keluar</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Add Container Keluar</div>
                        </div>

                        <form action="/cont_keluar/store" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">

                                <div class="form-group">
                                    <label>No Container</label>
                                    <select class="form-control" name="id_book_keluar" id="id_book_keluar" required>
                                        <option value="" hidden="">--Pilih Container--</option>
                                        @foreach($book_cont_keluar as $d)
                                        <option value="{{ $d->id }}">{{ $d->no_container }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div id="detail_container">
                                    <div class="form-group">
                                        <label>Customer</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" id="detail_container_customer" value="" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Shiper</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" id="detail_container_shiper" value="" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Tujuan</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" id="detail_container_tujuan" value="" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div id="detail_container"></div>

                                <div class="form-group">
                                    <label>Tanggal Keluar</label>
                                    <input type="date" class="form-control" placeholder="Tanggal Keluar ..." name="tgl_keluar" required>
                                </div>


                                <div class="form-group">
                                    <label>Angkutan</label>
                                    <input type="text" class="form-control" placeholder="Angkutan ..." name="angkutan" required>
                                </div>

                                <div class="form-group">
                                    <label>Driver</label>
                                    <input type="text" class="form-control" placeholder="Driver ..." name="driver" required>
                                </div>

                                <div class="form-group">
                                    <label>Nopol</label>
                                    <input type="text" class="form-control" placeholder="Nopol ..." name="nopol" required>
                                </div>


                                <div class="form-group">
                                    <label>Petugas</label>
                                    <select class="form-control" name="id_petugas" id="nama_petugas" required>
                                        <option value="" hidden="">--Pilih Petugas Survey--</option>
                                        @foreach($petugas_survey as $s)
                                        <option value="{{ $s->id }}">{{ $s->nama_petugas }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="card-action">
                                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>Submit</button>
                                <a href="/booking_masuk" class="btn btn-danger"><i class="fa fa-undo"></i>Close</a>
                            </div>


                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>

</div>

<script src="/assets/js/core/jquery.3.2.1.min.js"></script>

<script type="text/javascript">
    $("#id_book_keluar").change(function() {
        var id_book_keluar = $("#id_book_keluar").val();
        $.ajax({
            type: "GET",
            url: `/booking_keluar/id/${id_book_keluar}`,
            cache: false,
            success: function(data) {
                console.log("data::", data);
                $("#detail_container_customer").val(data.customer);
                $("#detail_container_shiper").val(data.shiper);
                $("#detail_container_tujuan").val(data.tujuan);
            }
        })
    });
</script>

@endsection