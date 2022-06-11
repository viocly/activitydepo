@extends('layout.layout')

@section('content')

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Add Booking Container Masuk</h4>
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
                        <a href="#">Booking Container Masuk</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Add Booking Container Masuk</div>
                        </div>

                        <form action="/booking_masuk/store" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">

                                <div class="form-group">
                                    <label>No Container</label>
                                    <input type="text" class="form-control" placeholder="No Container ..." name="no_container" required>
                                </div>

                                <div class="form-group">
                                    <label>Tanggal Booking Masuk</label>
                                    <input type="date" class="form-control" placeholder="Tanggal Booking Masuk ..." name="tgl_book_msk" required>
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
                                    <label>Consignee</label>
                                    <input type="text" class="form-control" placeholder="Consignee ..." name="consigne" required>
                                </div>

                                <div class="form-group">
                                    <label>Vessel</label>
                                    <input type="text" class="form-control" placeholder="Vessel ..." name="vessel" required>
                                </div>

                                <div class="form-group">
                                    <label>Voyage</label>
                                    <input type="text" class="form-control" placeholder="Voyage ..." name="voyage" required>
                                </div>

                                <div class="form-grup">
                                    <label>Asal</label>
                                    <select class="form-control" name="asal" required>
                                        <option value="" hidden="">-- Asal --</option>
                                        <option value="Interchange">Interchange</option>
                                        <option value="Repo">Repo</option>
                                    </select>
                                </div>

                                <div class="form-grup">
                                    <label>Ukuran</label>
                                    <select class="form-control" name="ukuran" required>
                                        <option value="" hidden="">-- Pilih Ukuran --</option>
                                        <option value="20">20 Feet</option>
                                        <option value="40">40 Feet</option>
                                    </select>
                                </div>

                                <div class="form-grup">
                                    <label>Type</label>
                                    <select class="form-control" name="type" required>
                                        <option value="" hidden="">-- Pilih Type --</option>
                                        <option value="ISO Tank">ISO Tank</option>
                                        <option value="Dry Container">Dry Container</option>
                                    </select>
                                </div>

                                <div class="form-grup">
                                    <label>Status</label>
                                    <select class="form-control" name="status" required>
                                        <option value="" hidden="">-- Pilih Level --</option>
                                        <option value="Empty">Empty</option>
                                        <option value="Full">Full</option>
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




@endsection