@extends('layout.layout')

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Booking Container Keluar</h4>
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
                        <a href="#">Booking Container Keluar</a>
                    </li>
                </ul>
            </div>
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Data Booking Keluar</h4>
                                <a class="btn btn-primary btn-round ml-auto" href="/booking_keluar/create">
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
                                            <th>Shiper</th>
                                            <th>Tujuan</th>
                                            <th>Type</th>
                                            <th>Action</th>
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
@foreach($book_cont_keluar as $d)
<div class="modal fade" id="modalEdit{{$d->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Booking Keluar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/booking_keluar/{{$d->id}}/update" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">

                    <div class="form-group">
                        <label>No Container</label>
                        <select class="form-control" name="id_cont_msk" id="id_cont_msk" required>
                            <option value="" hidden="">--Pilih Container--</option>
                            <option value="{{ $d->id }}">{{ $d->no_container }}</option>

                        </select>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Booking Keluar</label>
                        <input type="date" value="{{$d->tgl_book_keluar}}" class="form-control" placeholder="Tanggal Booking Keluar ..." name="tgl_book_keluar" required>
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
                        <label>Shiper</label>
                        <input type="text" value="{{$d->shiper}}" class="form-control" placeholder="Shiper ..." name="shiper" required>
                    </div>

                    <div class="form-group">
                        <label>Vessel</label>
                        <input type="text" value="{{$d->vessel}}" class="form-control" placeholder="Vessel ..." name="vessel" required>
                    </div>

                    <div class="form-group">
                        <label>Voyage</label>
                        <input type="text" value="{{$d->voyage}}" class="form-control" placeholder="Voyage ..." name="voyage" required>
                    </div>

                    <div class="form-group">
                        <label>Tujuan</label>
                        <input type="text" value="{{$d->tujuan}}" class="form-control" placeholder="Tujuan ..." name="Tujuan" required>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i>Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save changes</button>
                </div>


            </form>
        </div>
    </div>
</div>

@endforeach


@endsection