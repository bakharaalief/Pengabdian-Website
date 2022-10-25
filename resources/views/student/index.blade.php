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
                        <h1 class="m-0">Murid</h1>
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
                                            <th>Kelas</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Username</td>
                                            <td>
                                                <button class="btn btn-warning">
                                                    Edit
                                                </button>
                                            </td>
                                            <td>
                                                <button class="btn btn-danger">
                                                    Delete
                                                </button>
                                            </td>
                                        </tr>
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