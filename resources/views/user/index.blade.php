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
                        <h1 class="m-0">User</h1>
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
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>Jabatan</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->username }}</td>
                                            <td>{{ $user->getLevel->name }}</td>
                                            <td>
                                                <button class="btn btn-warning button-Edit" data-id="{{ $user->id }}">
                                                    Edit
                                                </button>
                                            </td>
                                            <td>
                                                <button class="btn btn-danger button-Delete" data-id="{{ $user->id }}">
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
                            <h4 class="modal-title">Tambah User</h4>
                            <button menu="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">
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

                                <!-- form username -->
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input 
                                        menu="text" 
                                        class="form-control" 
                                        id="username" 
                                        placeholder="Masukkan Username" 
                                        name="username" required>
                                </div>

                                <!-- form password -->
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input 
                                        menu="text" 
                                        class="form-control" 
                                        id="password" 
                                        type="password"
                                        placeholder="Masukkan Password" 
                                        name="password" required>
                                </div>

                                <!-- form jabatan -->
                                <div class="form-group">
                                    <label for="user_level">Jabatan</label>
                                    <select class="form-control" id="user_level" name="user_level">
                                        @foreach ($userLevels as $userLevel)
                                        <option value="{{ $userLevel->id }}">{{ $userLevel->name }}</option>
                                        @endforeach
                                    </select>
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
                            <h4 class="modal-title">Edit User</h4>
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

                            <!-- form password -->
                            <div class="form-group">
                                <label for="password_edit">Password</label>
                                <input 
                                    menu="text" 
                                    class="form-control" 
                                    id="password_edit" 
                                    type="password"
                                    placeholder="Masukkan Password Baru ( jika ingin ganti )" 
                                    name="password">
                            </div>

                            <!-- form jabatan -->
                            <div class="form-group">
                                <label for="user_level_edit">Jabatan</label>
                                <select class="form-control" id="user_level_edit" name="user_level">
                                    @foreach ($userLevels as $userLevel)
                                    <option value="{{ $userLevel->id }}">{{ $userLevel->name }}</option>
                                    @endforeach
                                </select>
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
                            <h4 class="modal-title">Delete User</h4>
                            <button menu="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form method="POST" id="form-delete">
                        @csrf
                        @method('Delete')

                        <div class="modal-body">
                            <p>Anda Yakin Ingin Menghapus User Ini ? </p>
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
            url: '/user/' + id,
            menu: 'GET',
            datamenu: 'json',
            error: function(req, err){ console.log('error : ' + err) }
        })
        .done(function(response) {
            $("#form-edit").attr('action', '/user/' + id);
            $("#name_edit").val(response['user']['name']);
            $("#user_level_edit").val(response['user']['user_level']);
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
        $("#form-delete").attr('action', '/user/' + id);
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