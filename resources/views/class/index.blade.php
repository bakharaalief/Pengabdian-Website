@php
    $level = Auth::user()->user_level
@endphp

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
                        <h1 class="m-0">Kelas</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">

             <!-- main table -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-tools">
                                    @if($level != 3)
                                    <button class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                                        <i class="fa fa-plus pr-1" aria-hidden="true"></i>
                                        Tambah
                                    </button>
                                    @endif
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Kelas</th>
                                            <th>Waktu Belajar</th>
                                            <th>Tahun Ajaran</th>
                                            <th>Murid</th>
                                            <th>Absen</th>
                                            <th>BAP</th>

                                            @if($level != 3)
                                            <th>Edit</th>
                                            <th>Delete</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($classes as $class)
                                        <tr>
                                            <td>{{ $class->name }}</td>
                                            <td>{{ $class->getStudyTime->name }}</td>
                                            <td>{{ $class->tahun_ajaran }}</td>
                                            <td>
                                                <a href="/detail-class/{{ $class->id }}" class="btn btn-success">Murid</a>
                                            </td>
                                            <td>
                                                <a href="/attendance/{{ $class->id }}" class="btn btn-info">Absen</a>
                                            </td>
                                            <td>
                                                <a href="/bap/{{ $class->id }}" class="btn btn-info">BAP</a>
                                            </td>

                                            @if($level != 3)
                                            <td>
                                                <button class="btn btn-warning button-Edit" data-id="{{ $class->id }}">
                                                    Edit
                                                </button>
                                            </td>
                                            <td>
                                                <button class="btn btn-danger button-Delete" data-id="{{ $class->id }}">
                                                    Delete
                                                </button>
                                            </td>
                                            @endif
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
                            <h4 class="modal-title">Tambah Kelas</h4>
                            <button menu="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form method="POST" action="{{ route('class.store') }}" enctype="multipart/form-data">
                        @csrf
                            <div class="modal-body">
                                
                                <!-- form name -->
                                <div class="form-group">
                                    <label for="name">Nama Kelas</label>
                                    <input 
                                        menu="text" 
                                        class="form-control" 
                                        id="name" 
                                        placeholder="Masukkan Nama" 
                                        name="name" required>
                                </div>

                                <!-- form study time -->
                                <div class="form-group">
                                    <label for="study_time">Waktu Belajar</label>
                                    <select class="form-control" id="study_time" name="study_time">
                                        @foreach ($studyTime as $study)
                                        <option value="{{ $study->id }}">{{ $study->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- form tahun ajaran -->
                                <div class="form-group">
                                    <label for="tahun_ajaran">Tahun Ajaran</label>
                                    <input 
                                        menu="text" 
                                        class="form-control" 
                                        id="tahun_ajaran" 
                                        placeholder="Masukkan Tahun Ajaran" 
                                        name="tahun_ajaran" required>
                                </div>
                            </div>

                            <div class="modal-footer justify-content-between">
                                <button menu="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button menu="submit" class="btn btn-success">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- edit -->
            <div class="modal fade" id="modal-default-2">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h4 class="modal-title">Edit Kelas</h4>
                            <button menu="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form method="POST" id="form-edit" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                            <div class="modal-body">

                                <!-- form name -->
                                <div class="form-group">
                                    <label for="name_edit">Nama Kelas</label>
                                    <input 
                                        menu="text" 
                                        class="form-control" 
                                        id="name_edit" 
                                        placeholder="Masukkan Nama" 
                                        name="name" required>
                                </div>

                                <!-- form study time -->
                                <div class="form-group">
                                    <label for="study_time_edit">Waktu Belajar</label>
                                    <select class="form-control" id="study_time_edit" name="study_time">
                                        @foreach ($studyTime as $study)
                                        <option value="{{ $study->id }}">{{ $study->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- form tahun ajaran -->
                                <div class="form-group">
                                    <label for="tahun_ajaran_edit">Tahun Ajaran</label>
                                    <input 
                                        menu="text" 
                                        class="form-control" 
                                        id="tahun_ajaran_edit" 
                                        placeholder="Masukkan Tahun Ajaran" 
                                        name="tahun_ajaran" required>
                                </div>
                            </div>

                            <div class="modal-footer justify-content-between">
                                <button menu="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button menu="submit" class="btn btn-primary">Update</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

            <!-- delete -->
            <div class="modal fade" id="modal-default-3">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h4 class="modal-title">Delete Kelas</h4>
                            <button menu="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form method="POST" id="form-delete">
                        @csrf
                        @method('Delete')

                        <div class="modal-body">
                            <p>Anda Yakin Ingin Menghapus Kelas Ini ? </p>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button menu="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button menu="submit" class="btn btn-danger">Iya</button>
                        </div>

                        </form>
                    </div>
                </div>
            </div>

        </section>
    </div>

@endsection


@section('script')

{{-- edit modal configuration --}}
<script>
    $(function(){
      $('.button-Edit').on("click", function(event) {
        
        var id = $(this).data('id');

        $.ajax({
            url: '/class/' + id,
            menu: 'GET',
            datamenu: 'json',
            error: function(req, err){ console.log('error : ' + err) }
        })
        .done(function(response) {
            $("#form-edit").attr('action', '/class/' + id);
            $("#name_edit").val(response['class']['name']);
            $("#study_time_edit").val(response['class']['study_time']);
            $("#tahun_ajaran_edit").val(response['class']['tahun_ajaran']);
            $("#modal-default-2").modal('show');
        });
      });
    })
</script>
{{-- datatable configuration --}}
<script>
  $(function () {
    $("#example2")
      .DataTable({
        "responsive": true, 
        "lengthChange": false, 
        "autoWidth": false,
        "searching": false,
        "ordering": false,
        // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      })
      .buttons()
      .container()
      .appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>

{{-- delete model configurarion --}}
<script>
    $(function(){
      $('.button-Delete').on("click", function(event) {

        var id = $(this).data('id');
        $("#form-delete").attr('action', '/class/' + id);
        $("#modal-default-3").modal('show');
      });
    })
</script>

{{-- berhasil toast --}}
@if ($message = Session::get('success'))
  <script>
    toastr.success('{{ $message }}');
  </script>
@endif

{{-- gagal toast --}}
@if ($message = Session::get('failed'))
  <script>
    toastr.error('{{ $message }}');
  </script>
@endif

@endsection