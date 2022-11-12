@extends('layout.layout')

@section('content')

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Add Booking Container Keluar</h4>
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
                        <a href="/booking_keluar">Add</a>
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
                            <div class="card-title">Add Booking Container Keluar</div>
                        </div>

                        <form action="/booking_keluar/store" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">

                                <div class="form-group">
                                    <label>No Container</label>
                                    <select class="form-control" name="id_cont_msk" id="id_cont_msk" required>
                                        <option value="" hidden="">--Pilih Container--</option>
                                        @foreach($cont_msk as $d)
                                        <option value="{{ $d->id }}">{{ $d->no_container }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div id="detail_container">
                                    <div class="form-group">
                                        <label>Ukuran</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" id="detail_container_ukuran" value="" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Type</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" id="detail_container_type" value="" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Status</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" id="detail_container_status" value="" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Tanggal Booking Keluar</label>
                                    <input type="date" class="form-control" placeholder="Tanggal Booking Keluar ..." name="tgl_book_keluar" required>
                                </div>

                                <div class="form-grup">
                                    <label>Customer</label>
                                    <select class="form-control" name="customer" required>
                                        <option value="" hidden="">-- Pilih Customer --</option>
                                        <option value="ONE">ONE</option>
                                        <option value="Evergreen">Evergreen</option>
                                        <option value="CMA">CMA</option>
                                        <option value="Hapag Lloyd">Hapag Lloyd</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Shiper</label>
                                    <input type="text" class="form-control" placeholder="Shiper ..." name="shiper" required>
                                </div>

                                <div class="form-group">
                                    <label>Vessel</label>
                                    <input type="text" class="form-control" placeholder="Vessel ..." name="vessel" required>
                                </div>

                                <div class="form-group">
                                    <label>Voyage</label>
                                    <input type="text" class="form-control" placeholder="Voyage ..." name="voyage" required>
                                </div>

                                <div class="form-group">
                                    <label>Tujuan</label>
                                    <input type="text" class="form-control" placeholder="Tujuan ..." name="tujuan" required>
                                </div>

                            </div>

                            <div class="card-action">
                                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>Submit</button>
                                <a href="/booking_keluar" class="btn btn-danger"><i class="fa fa-undo"></i>Close</a>
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
    $("#id_cont_msk").change(function() {
        var id_cont_msk = $("#id_cont_msk").val();
        $.ajax({
            type: "GET",
            url: `/cont_masuk/id/${id_cont_msk}`,
            cache: false,
            success: function(data) {
                console.log("data::", data);
                $("#detail_container_ukuran").val(data.ukuran);
                $("#detail_container_type").val(data.type);
                $("#detail_container_status").val(data.status);
            }
        })
    });
</script>



@endsection