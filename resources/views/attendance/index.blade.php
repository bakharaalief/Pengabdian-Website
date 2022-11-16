@extends('layouts.adminv2.adminApp')

@section('content')

<!-- Navbar -->
@include('layouts.adminv2.partials.navbar')

<!-- main sidebar -->
@include('layouts.adminv2.partials.mainSideBar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Attendance</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-tools">
                                <button class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                                    <i class="fa fa-plus pr-1" aria-hidden="true"></i>
                                    Tambah
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>                                    
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($attendances as $attendance)
                                    <tr>
                                        <td>{{ $attendance->tanggal }}</td>
                                        <td>
                                            <a href="/detail-attendance/{{ $attendance->id }}" class="btn btn-info">Absen</a>
                                            <a href="#" class="btn btn-danger">Hapus</a>
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

        <!-- add -->
        <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Tanggal</h4>
                        <button menu="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form method="POST" action="/attendance/" enctype="multipart/form-data">
                    @csrf
                        <div class="modal-body">
                            
                            <!-- form tanggal -->
                            <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <input 
                                    menu="text" 
                                    class="form-control" 
                                    id="tanggal" 
                                    placeholder="Masukkan Tanggal"
                                    type="date" 
                                    name="tanggal" required>
                            </div>

                            <input 
                                    menu="text" 
                                    class="form-control" 
                                    id="class_id" 
                                    value="{{ $attendance->class_id }}"
                                    name="class_id" hidden>
                        </div>

                        <div class="modal-footer justify-content-between">
                            <button menu="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button menu="submit" class="btn btn-success">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection