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
                        <h1 class="m-0">Tanggal {{ $attendance->tanggal->format('d/m/Y') }}</h1>
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
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($attendanceStudentData as $attendance)
                                        <tr>
                                            <td>{{ $attendance->getStudent->name }}</td>

                                            @if($attendance->status == 0)
                                            <td>Belum di Absen</td>
                                            @elseif($attendance->status == 1)
                                            <td>Hadir</td>
                                            @elseif($attendance->status == 2)
                                            <td>Izin</td>
                                            @else 
                                            <td>Sakit</td>
                                            @endif

                                            <td>
                                                <button class="btn btn-warning button-Edit" data-id="{{ $attendance->id }}">
                                                    Edit
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

            <!-- edit -->
            <div class="modal fade" id="modal-default-2">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h4 class="modal-title">Edit Absen</h4>
                            <button menu="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form method="POST" id="form-edit" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="modal-body">

                           <!-- form absen -->
                           <div class="form-group">
                                <label for="attendance_edit">Jabatan</label>
                                <select class="form-control" id="attendance_edit" name="attendance">
                                    <option value="0">Belum Absen</option>
                                    <option value="1">Hadir</option>
                                    <option value="2">Izin</option>
                                    <option value="3">Sakit</option>
                                </select>
                            </div>

                            <!-- form id absen -->
                            <input 
                                menu="text" 
                                class="form-control" 
                                id="attendance_id_edit" 
                                name="attendance_id" hidden>
                        </div>

                        <div class="modal-footer justify-content-between">
                            <button menu="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button menu="submit" class="btn btn-primary">Update</button>
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
        // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      })
      .buttons()
      .container()
      .appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>

{{-- edit modal configuration --}}
<script>
    $(function(){
      $('.button-Edit').on("click", function(event) {
        
        var id = $(this).data('id');

        $.ajax({
            url: '/detail-attendance-form/' + id,
            menu: 'GET',
            datamenu: 'json',
            error: function(req, err){ console.log('error : ' + err) }
        })
        .done(function(response) {
            $("#form-edit").attr('action', '/detail-attendance/' + id);
            $("#attendance_edit").val(response['attendance']['status']);
            $("#attendance_id_edit").val(response['attendance']['attendance_id']);
            $("#modal-default-2").modal('show');
        });
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