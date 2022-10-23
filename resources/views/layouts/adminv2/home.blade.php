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
                        <h1 class="m-0">Dashboard</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
    
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
            </div>
        </section>
    </div>

@endsection