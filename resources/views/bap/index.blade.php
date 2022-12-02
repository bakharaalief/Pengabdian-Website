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
                    {{-- <h1 class="m-0">Absen {{$class->name}}</h1> --}}
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
                                        <th>Materi</th>
                                        <th>Pengisi</th>
                                        <th>Keterangan</th>
                                        <th>Tanggal</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($baps as $bap)
                                    <tr>
                                        <td>{{ $bap->materi }}</td>
                                        <td>{{ $bap->getuser->name }}</td>
                                        <td>{{ $bap->keterangan }}</td>
                                        <td>{{ $bap->tanggal }}</td>
                                        <td>
                                            <button class="btn btn-warning button-Edit" data-id="{{ $bap->id }}">
                                                Edit
                                            </button>
                                        </td>
                                        <td>
                                            <button class="btn btn-danger button-Delete" data-id="{{ $bap->id }}">
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
                        <h4 class="modal-title">Tambah Materi Ajar</h4>
                        <button menu="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form method="POST" action="/bap/" enctype="multipart/form-data">
                    @csrf
                        <div class="modal-body">
                            
                            <div class="form-group">
                                <label for="materi">Materi</label>
                                <input type="text" 
                                class="form-control"
                                id="materi" 
                                placeholder="Materi Hari ini" 
                                name="materi" required
                                >
                            </div>

                            <div class="form-group">
                                <label for="keterangan">Deskripsi</label>
                                <textarea type="text" 
                                class="form-control"
                                id="keterangan" 
                                name="keterangan" required
                                ></textarea>
                            </div>
                            
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

                            <input type="text"
                                class="form-control"
                                id="class_id"
                                value="{{ $class->id }}"
                                name="class_id"
                                hidden
                            >
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
                        <h4 class="modal-title">Edit Materi Ajar</h4>
                        <button menu="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form method="POST" id="form-edit" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                        <div class="modal-body">
                            
                            <div class="form-group">
                                <label for="materi_edit">Materi</label>
                                <input type="text" 
                                class="form-control"
                                id="materi_edit" 
                                placeholder="Materi Hari ini" 
                                name="materi" required
                                >
                            </div>

                            <div class="form-group">
                                <label for="keterangan_edit">Deskripsi</label>
                                <textarea type="text" 
                                class="form-control"
                                id="keterangan_edit" 
                                name="keterangan" required
                                ></textarea>
                            </div>
                            
                            <!-- form tanggal -->
                            <div class="form-group">
                                <label for="tanggal_edit">Tanggal</label>
                                <input 
                                    menu="text" 
                                    class="form-control" 
                                    id="tanggal_edit" 
                                    placeholder="Masukkan Tanggal"
                                    type="date" 
                                    name="tanggal" required>
                            </div>

                            <input type="text"
                                class="form-control"
                                id="class_id"
                                value="{{ $class->id }}"
                                name="class_id"
                                hidden
                            >
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
                        <h4 class="modal-title">Hapus BAP</h4>
                        <button menu="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form method="POST" id="form-delete">
                    @csrf
                    @method('Delete')

                    <div class="modal-body">
                        <p>Anda Yakin Ingin Menghapus BAP Ini Dari Kelas ? </p>
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
            url: '/bap-form/' + id,
            menu: 'GET',
            datamenu: 'json',
            error: function(req, err){ console.log('error : ' + err) }
        })
        .done(function(response) {
            $("#form-edit").attr('action', '/bap/' + id);
            $("#materi_edit").val(response['bap']['materi']);
            $("#keterangan_edit").val(response['bap']['keterangan']);
            $("#tanggal_edit").val(response['bap']['tanggal'].slice(0, 10));
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

        $("#form-delete").attr('action', '/bap/' + id);
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