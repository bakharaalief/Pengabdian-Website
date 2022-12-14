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
                        <h1 class="m-0">Kelas {{ $class->name }} ( {{ $class->tahun_ajaran }}  )</h1>
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
                                @if($level != 3)
                                <div class="card-tools">
                                    <button class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                                        <i class="fa fa-plus pr-1" aria-hidden="true"></i>
                                        Tambah
                                    </button>
                                </div>
                                @endif
                            </div>
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Gender</th>
                                            <th>Semester</th>
                                            <th>Sekolah</th>

                                            @if($level != 3)
                                            <th>Delete</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($studentClassData as $studentClass)
                                        <tr>
                                            <td>{{ $studentClass->getStudent->name }}</td>
                                            <td>{{ $studentClass->getStudent->gender }}</td>
                                            <td>{{ $studentClass->getStudent->semester }}</td>
                                            <td>{{ $studentClass->getStudent->school }}</td>

                                            @if($level != 3)
                                            <td>
                                                <button class="btn btn-danger button-Delete" data-id="{{ $studentClass->id }}">
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
                            <h4 class="modal-title">Tambah Murid</h4>
                            <button menu="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form method="POST" action="/detail-class/" enctype="multipart/form-data">
                        @csrf
                            <div class="modal-body">

                                <!-- form jabatan -->
                                <div class="form-group">
                                    <label for="student">Nama Siswa</label>
                                    <select class="form-control" id="student" name="student">
                                        @foreach ($students as $student)
                                        <option value="{{ $student->id }}">{{ $student->name }} ( Semester {{ $student->semester }} )</option>
                                        @endforeach
                                    </select>
                                </div>

                                <input 
                                    menu="text" 
                                    class="form-control" 
                                    id="class" 
                                    value="{{ $class->id }}"
                                    name="class" hidden>
                            </div>

                            <div class="modal-footer justify-content-between">
                                <button menu="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button menu="submit" class="btn btn-success">Tambah</button>
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
                            <h4 class="modal-title">Delete Murid</h4>
                            <button menu="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form method="POST" id="form-delete">
                        @csrf
                        @method('Delete')

                        <div class="modal-body">
                            <p>Anda Yakin Ingin Menghapus Murid Ini Dari Kelas ? </p>
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
        "paging": false,
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

        $("#form-delete").attr('action', '/detail-class/' + id);
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