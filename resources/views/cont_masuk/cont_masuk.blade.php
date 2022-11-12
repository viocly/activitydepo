@extends('layout.layout')

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Container Masuk</h4>
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
                        <a href="#">Container Masuk</a>
                    </li>
                </ul>
            </div>
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Data Container Masuk</h4>
                                <a class="btn btn-primary btn-round ml-auto" href="/cont_masuk/create">
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
                                            <th>Tanggal Masuk</th>
                                            <th>Customer</th>
                                            <th>Asal</th>
                                            <th>Cargo</th>
                                            <th>Kondisi</th>
                                            <th>Type</th>

                                        </tr>
                                    </thead>
                                    <tbody>
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
                                            <!-- <td>
                                                <a href="#" data-toggle="modal" class="btn btn-primary btn-xs"><i class="fas fa-eye"></i> View</a>
                                                <a href="#modalEdit{{$row->id}}" data-toggle="modal" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> View</a>
                                                <a href="#" data-toggle="modal" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i>Hapus</a>
                                            </td> -->
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

@endsection