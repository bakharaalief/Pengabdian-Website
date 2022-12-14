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
                <!-- Small boxes (Stat box) -->
                <div class="row">

                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ $students_amount }}</h3>
                                <p>Murid</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-android-people"></i>
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->

                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $teachers_amount }}</h3>
                                <p>Guru</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-android-person"></i>
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->

                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{ $sukarelawan_amount }}</h3>
                                <p>Sukarelawan</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-android-person"></i>
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->

                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ $class_amount }}</h3>
                                <p>Kelas</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-university"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection