@extends('dashboards.layout')

@section('title','Post')
@section('menu','Post')
@section('linkmenu',route('post.index'))
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
                        <h1>List Post</h1>
                    </div>
                    <div class="col-6 text-right">
                        <a href="{{route('post.create')}}" class="btn btn-sm btn-primary btn-round btn-icon">
                            <span class="btn-inner--icon">
                                <i class="fas fa-user-edit"></i>
                            </span>
                            <span class="btn-inner--text">Tambah Pos</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <p>Jumlah post : {{$posts->count()}}</p>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead class="thead-light text-center">
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Title Post</th>
                                <th scope="col">Status</th>
                                <th scope="col">Author</th>
                                <th scope="col">Thumbnail</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($posts as $key => $post)
                            <tr>
                                <td> {{$key +$posts->firstitem()}} </td>
                                <td>{{$post->judul}}</td>
                                <td>
                                    @if ($post->status == 0)
                                        <h3><span class="badge badge-danger">Draft</span></h3>
                                    @else
                                        <h3><span class="badge badge-info">Published</span></h3>
                                    @endif
                                </td>
                                {{-- <td>
                                    <ul class="list-unstyled">
                                    @foreach ($post->tags as $tag)
                                    <li>
                                        <span class="badge badge-primary">{{$tag->name}}</span>
                                    </li>
                                    @endforeach
                                    </ul>
                                </td> --}}
                                <td>{{$post->user->name}}</td>
                                <td class="text-center"><img src="{{asset($post->gambar)}}" alt="{{$post->slug}}" class="img-fluid" width="120px"></td>
                                <td>
                                    <a href="{{route('post.edit',$post->id)}}" class="btn btn-warning btn-sm"><i class="fas fa-user-edit"></i> Edit</a>
                                    <form action="{{route('post.destroy',$post->id)}}" method="POST" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @if ($posts->count() == 0)
                                <tr class="text-center">
                                    <td colspan="5">Tidak ada data dalam database</td>
                                </tr>
                            @endif
                        </tbody>
                        <thead class="thead-light text-center">
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Title Post</th>
                                <th scope="col">Status</th>
                                <th scope="col">Author</th>
                                <th scope="col">Thumbnail</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        {{$posts->links()}}
    </div>
</div>
@endsection
