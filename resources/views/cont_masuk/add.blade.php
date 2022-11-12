@extends('layout.layout')

@section('content')

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Add Container Masuk</h4>
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
                        <a href="/cont_masuk">Add</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Container Masuk</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Add Container Masuk</div>
                        </div>

                        <form action="/cont_masuk/store" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">

                                <div class="form-group">
                                    <label>No Container</label>
                                    <select class="form-control" name="id_book_msk" id="id_book_msk" required>
                                        <option value="" hidden="">--Pilih Container--</option>
                                        @foreach($book_cont_msk as $d)
                                        <option value="{{ $d->id }}">{{ $d->no_container }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div id="detail_container"></div>

                                <div class="form-group">
                                    <label>Tanggal Masuk</label>
                                    <input type="date" class="form-control" placeholder="Tanggal Masuk ..." name="tgl_msk" required>
                                </div>

                                <div class="form-grup">
                                    <label>Kondisi</label>
                                    <select class="form-control" name="kondisi" required>
                                        <option value="" hidden="">-- Kondisi --</option>
                                        <option value="AV">Available</option>
                                        <option value="DM">Damage</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Cargo</label>
                                    <select class="form-control" name="id_cargo" id="nama_cargo" required>
                                        <option value="" hidden="">--Pilih Cargo--</option>
                                        @foreach($cargo as $d)
                                        <option value="{{ $d->id }}">{{ $d->nama_cargo }}</option>
                                        @endforeach
                                    </select>
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
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').str('content')
        }
    });
</script>

<script type="text/javascript">
    $("#id_book_msk").change(function() {
        var id_book_msk = $("#id_book_msk").val();
        $.ajax({
            type: "GET",
            url: "/cont_masuk/ajax",
            data: "id_book_msk=" + id_book_msk,
            cache: false,
            success: function(data) {
                $('#detail_container').html(data);
            }
        })
    });
</script>

@endsection