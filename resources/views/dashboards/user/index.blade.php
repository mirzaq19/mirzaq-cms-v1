@extends('dashboards.layout')

@section('title','User')
@section('menu','User')
@section('linkmenu',route('user.index'))
@section('submenu','List')

@section('content')
<div class="row justify-content-center">
    <div class="col-md">
        @if (Session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="alert-icon"><i class="ni ni-like-2"></i></span>
            <span class="alert-text"><strong>Berhasil!</strong> {{Session('status')}}</span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-md">
        @if (Session('delete'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <span class="alert-icon"><i class="ni ni-like-2"></i></span>
            <span class="alert-text"><strong>Berhasil!</strong> {{Session('delete')}}</span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-md">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        <h1>List User</h1>
                    </div>
                    <div class="col-6 text-right">
                        <a href="{{route('user.create')}}" class="btn btn-sm btn-primary btn-round btn-icon">
                            <span class="btn-inner--icon">
                                <i class="fas fa-user-edit"></i>
                            </span>
                            <span class="btn-inner--text">Tambah User</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <p>Jumlah user : {{$users->count()}}</p>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead class="thead-light text-center">
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Profil</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key => $user)
                            <tr>
                                <td> {{$key +$users->firstitem()}} </td>
                                <td class="text-center"><img src="{{asset('argon/assets/img/theme/team-4.jpg')}}" alt="profil" class="rounded" width="80px"></td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td class="text-center">
                                    <h3>
                                    @if ($user->role)
                                    <span class="badge badge-info">Administrator</span>
                                    @else
                                        <span class="badge badge-warning">Writer</span>
                                    @endif
                                    </h3>
                                </td>
                                <td>
                                    <a href="{{route('user.edit',$user->id)}}" class="btn btn-warning btn-sm"><i class="fas fa-user-edit"></i> Edit</a>
                                    <form action="{{route('user.destroy',$user->id)}}" method="POST" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus user ini ?')"><i class="fas fa-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @if ($users->count() == 0)
                                <tr class="text-center">
                                    <td colspan="5">Tidak ada data dalam database</td>
                                </tr>
                            @endif
                        </tbody>
                        <thead class="thead-light text-center">
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Profil</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        {{$users->links()}}
    </div>
</div>
@endsection
