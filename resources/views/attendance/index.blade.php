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
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>                                    
                                    <tr>
                                        <th>Kelas</th>
                                        <th>Waktu Belajar</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($classes as $class)
                                    <tr>
                                        <td>{{ $class->name }}</td>
                                        <td>{{ $class->getStudyTime->name }}</td>
                                        <td>
                                            <a href="/detail-attendance/{{ $class->id }}" class="btn btn-info">Absen</a>
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
    </section>
</div>
@endsection