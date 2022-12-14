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
                    <h1 class="m-0">Absen {{$class->name}}</h1>
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
                                        <th>Detail</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($attendances as $attendance)
                                    <tr>
                                        <td>{{ $attendance->tanggal->format('d/m/Y') }}</td>
                                        <td><a href="/detail-attendance/{{ $attendance->id }}" class="btn btn-info">Detail</a></td>
                                        <td>
                                            <button class="btn btn-danger button-Delete" data-id="{{ $attendance->id }}">
                                                Delete
                                            </button>
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
                                value="{{ $class->id }}"
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

        <!-- delete -->
        <div class="modal fade" id="modal-default-3">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title">Hapus Tanggal</h4>
                        <button menu="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form method="POST" id="form-delete">
                    @csrf
                    @method('Delete')

                    <div class="modal-body">
                        <p>Anda Yakin Ingin Menghapus Tanggal Ini Dari Kelas ? </p>
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

        $("#form-delete").attr('action', '/attendance/' + id);
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