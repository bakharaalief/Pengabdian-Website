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

            <!-- main table -->
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
                                            <th>Name</th>
                                            <th>Gender</th>
                                            <th>Lahir</th>
                                            <th>Semester</th>
                                            <th>Sekolah</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($students as $student)
                                        <tr>
                                            <td>{{ $student->name }}</td>
                                            <td>{{ $student->gender }}</td>
                                            <td>{{ $student->birth_date->format('d/m/Y') }}</td>

                                            @if($student->semester != 15)
                                            <td>{{ $student->semester }}</td>
                                            @else 
                                            <td>Lulus</td>
                                            @endif

                                            <td>{{ $student->school }}</td>
                                            <td>
                                                <button class="btn btn-warning button-Edit" data-id="{{ $student->id }}">
                                                    Edit
                                                </button>
                                            </td>
                                            <td>
                                                <button class="btn btn-danger button-Delete" data-id="{{ $student->id }}">
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
                            <h4 class="modal-title">Tambah Murid</h4>
                            <button menu="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form method="POST" action="{{ route('student.store') }}" enctype="multipart/form-data">
                        @csrf
                            <div class="modal-body">

                                <!-- form name -->
                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input 
                                        menu="text" 
                                        class="form-control" 
                                        id="name" 
                                        placeholder="Masukkan Nama" 
                                        name="name" required>
                                </div>

                                <!-- from gender -->
                                <div class="form-group">
                                    <label for="gender">Gender</label>
                                    <select class="form-control" id="gender" name="gender">
                                        <option value="laki-laki">Laki-Laki</option>
                                        <option value="perempuan">Perempuan</option>
                                    </select>
                                </div>

                                <!-- form birth date -->
                                <div class="form-group">
                                    <label for="birth_date">Tanggal Lahir</label>
                                    <input 
                                        menu="text" 
                                        class="form-control" 
                                        id="birth_date" 
                                        placeholder="Masukkan Tanggal Lahir"
                                        type="date" 
                                        name="birth_date" required>
                                </div>

                                <!-- from semester -->
                                <div class="form-group">
                                    <label for="semester">Semester</label>
                                    <select class="form-control" id="semester" name="semester">
                                        @for ($i = 1; $i <= 14; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                        <option value="15">Lulus</option>
                                    </select>
                                </div>

                                <!-- form school -->
                                <div class="form-group">
                                    <label for="school">Sekolah</label>
                                    <input 
                                        menu="text" 
                                        class="form-control" 
                                        id="school" 
                                        placeholder="Masukkan Sekolah" 
                                        name="school" required>
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
                            <h4 class="modal-title">Edit Murid</h4>
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
                                <label for="name_edit">Nama</label>
                                <input 
                                    menu="text" 
                                    class="form-control" 
                                    id="name_edit" 
                                    placeholder="Masukkan Nama" 
                                    name="name" required>
                            </div>

                            <!-- from gender -->
                            <div class="form-group">
                                <label for="gender_edit">Gender</label>
                                <select class="form-control" id="gender_edit" name="gender">
                                    <option value="laki-laki">Laki-Laki</option>
                                    <option value="perempuan">Perempuan</option>
                                </select>
                            </div>

                            <!-- form birth date -->
                            <div class="form-group">
                                <label for="birth_date_edit">Tanggal Lahir</label>
                                <input 
                                    menu="text" 
                                    class="form-control" 
                                    id="birth_date_edit" 
                                    placeholder="Masukkan Tanggal Lahir"
                                    type="date" 
                                    name="birth_date" required>
                            </div>

                            <!-- from semester -->
                            <div class="form-group">
                                <label for="semester_edit">Semester</label>
                                <select class="form-control" id="semester_edit" name="semester">
                                    @for ($i = 1; $i <= 14; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                    <option value="15">Lulus</option>
                                </select>
                            </div>

                            <!-- form school -->
                            <div class="form-group">
                                <label for="school_edit">Sekolah</label>
                                <input 
                                    menu="text" 
                                    class="form-control" 
                                    id="school_edit" 
                                    placeholder="Masukkan Sekolah" 
                                    name="school" required>
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
                            <h4 class="modal-title">Delete Murid</h4>
                            <button menu="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form method="POST" id="form-delete">
                        @csrf
                        @method('Delete')

                        <div class="modal-body">
                            <p>Anda Yakin Ingin Menghapus Murid Ini ? </p>
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

{{-- edit modal configuration --}}
<script>
    $(function(){
      $('.button-Edit').on("click", function(event) {
        
        var id = $(this).data('id');

        $.ajax({
            url: '/student/' + id,
            menu: 'GET',
            datamenu: 'json',
            error: function(req, err){ console.log('error : ' + err) }
        })
        .done(function(response) {
            $("#form-edit").attr('action', '/student/' + id);
            $("#name_edit").val(response['student']['name']);
            $("#gender_edit").val(response['student']['gender']);
            $("#birth_date_edit").val(response['student']['birth_date'].slice(0, 10));
            $("#semester_edit").val(response['student']['semester']);
            $("#school_edit").val(response['student']['school']);
            $("#modal-default-2").modal('show');
        });
      });
    })
</script>

{{-- delete model configurarion --}}
<script>
    $(function(){
      $('.button-Delete').on("click", function(event) {

        var id = $(this).data('id');
        $("#form-delete").attr('action', '/student/' + id);
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