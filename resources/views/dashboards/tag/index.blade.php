@extends('dashboards.layout')

@section('title','Tags')
@section('menu','Tags')
@section('linkmenu',route('tag.index'))
@section('submenu','List')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
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
    <div class="col-md-10">
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
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        <h1>Tags</h1>
                    </div>
                    <div class="col-6 text-right">
                        <a href="{{route('tag.create')}}" class="btn btn-sm btn-primary btn-round btn-icon">
                            <span class="btn-inner--icon">
                                <i class="fas fa-user-edit"></i>
                            </span>
                            <span class="btn-inner--text">Tambah Tag</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-hover table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th>No.</th>
                            <th>Nama Tag</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tags as $key => $tag)
                        <tr>
                            <td> {{$key +$tags->firstitem()}} </td>
                            <td>{{$tag->name}}</td>
                            <td>
                                <a href="{{route('tag.edit',$tag->id)}}" class="btn btn-warning btn-sm"><i class="fas fa-user-edit"></i> Edit</a>
                                <form action="{{route('tag.destroy',$tag->id)}}" method="POST" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus tag ini ?')"><i class="fas fa-trash"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{$tags->links()}}
    </div>
</div>
@endsection
