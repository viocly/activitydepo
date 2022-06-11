@extends('layout.layout')

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Booking Container Masuk</h4>
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
                        <a href="#">Data</a>
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
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Data Booking Masuk</h4>
                                <a class="btn btn-primary btn-round ml-auto" href="/booking_masuk/create">
                                    <i class="fa fa-plus"></i>
                                    Create
                                </a>
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
                                            <th>Consignee</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no=1; @endphp
                                        @foreach($book_cont_msk as $row)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$row->no_container}}</td>
                                            <td>{{$row->tgl_book_msk}}</td>
                                            <td>{{$row->customer}}</td>
                                            <td>{{$row->consigne}}</td>
                                            <td>{{$row->status}}</td>
                                            <td>
                                                <!-- <a href="#" data-toggle="modal" class="btn btn-primary btn-xs"><i class="fas fa-eye"></i> View</a> -->
                                                <a href="#modalEdit{{$row->id}}" data-toggle="modal" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
                                                <!-- <a href="#" data-toggle="modal" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i>Hapus</a> -->
                                            </td>
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


// edit data
@foreach($book_cont_msk as $d)
<div class="modal fade" id="modalEdit{{$d->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Booking Masuk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/booking_masuk/{{$d->id}}/update" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">

                    <div class="form-group">
                        <label>No Container</label>
                        <input type="text" value="{{$d->no_container}}" class="form-control" name="no_container" placeholder="Container ..." required>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Booking Masuk</label>
                        <input type="date" value="{{$d->tgl_book_msk}}" class="form-control" placeholder="Tanggal Booking Masuk ..." name="tgl_book_msk" required>
                    </div>

                    <div class="form-grup">
                        <label>Customer</label>
                        <select value="{{$d->customer}}" class="form-control" name="customer" required>
                            <option value="" hidden="">-- Pilih Customer --</option>
                            <option value="ONE">ONE</option>
                            <option value="Evergreen">Evergreen</option>
                            <option value="CMA">CMA</option>
                            <option value="Hapag Lloyd">Hapag Lloyd</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Consignee</label>
                        <input type="text" value="{{$d->consigne}}" class="form-control" placeholder="Consignee ..." name="consigne" required>
                    </div>

                    <div class="form-group">
                        <label>Vessel</label>
                        <input type="text" value="{{$d->vessel}}" class="form-control" placeholder="Vessel ..." name="vessel" required>
                    </div>

                    <div class="form-group">
                        <label>Voyage</label>
                        <input type="text" value="{{$d->voyage}}" class="form-control" placeholder="Voyage ..." name="voyage" required>
                    </div>

                    <div class="form-grup">
                        <label>Asal</label>
                        <select value="{{$d->asal}}" class="form-control" name="asal" required>
                            <option value="" hidden="">-- Asal --</option>
                            <option value="Interchange">Interchange</option>
                            <option value="Repo">Repo</option>
                        </select>
                    </div>

                    <div class="form-grup">
                        <label>Ukuran</label>
                        <select value="{{$d->ukuran}}" class="form-control" name="ukuran" required>
                            <option value="" hidden="">-- Pilih Ukuran --</option>
                            <option value="20">20 Feet</option>
                            <option value="40">40 Feet</option>
                        </select>
                    </div>

                    <div class="form-grup">
                        <label>Type</label>
                        <select value="{{$d->type}}" class="form-control" name="type" required>
                            <option value="" hidden="">-- Pilih Type --</option>
                            <option value="ISO Tank">ISO Tank</option>
                            <option value="Dry Container">Dry Container</option>
                        </select>
                    </div>

                    <div class="form-grup">
                        <label>Status</label>
                        <select value="{{$d->status}}" class="form-control" name="status" required>
                            <option value="" hidden="">-- Pilih Level --</option>
                            <option value="Empty">Empty</option>
                            <option value="Full">Full</option>
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i>Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save changes</button>
                </div>


            </form>
            <!-- <form method="POST" enctype="multipart/form-data" action="/cargo/{{$d->id}}/update">
                @csrf

                <div class="modal-body">

                    <input type="hidden" value="{{$d->id}}" name="id" required>

                    <div class="form-grup">
                        <label>Nama Cargo</label>
                        <input type="text" value="{{$d->nama_cargo}}" class="form-control" name="nama_cargo" placeholder="Nama Cargo ..." required>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i>Close</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>Save changes</button>
                    </div>
                </div>
            </form> -->
        </div>
    </div>
</div>

@endforeach

@endsection